<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Finance extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('finance_model');
        $this->load->model('encounter/encounter_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('finance/pharmacy_model');
        $this->load->model('accountant/accountant_model');
        $this->load->model('receptionist/receptionist_model');
        $this->load->model('pgateway/pgateway_model');
        $this->load->model('company/company_model');
        $this->load->model('settings/settings_model');
        $this->load->model('companyuser/companyuser_model');
        $this->load->model('branch/branch_model');
        $this->load->model('location/location_model');
        $this->load->module('sms');
        require APPPATH . 'third_party/stripe/stripe-php/init.php';
        $this->load->module('paypal');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Doctor', 'Patient', 'CompanyUser', 'Clerk', 'Midwife'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        redirect('finance/financial_report');
    }

    public function invoices() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist', 'CompanyUser', 'Clerk'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $data['settings'] = $this->settings_model->getSettings();

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('paymentv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function invoiceGroupList() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist', 'CompanyUser', 'Clerk'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $data['settings'] = $this->settings_model->getSettings();

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('paymentv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function amountDistribution() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['payments'] = $this->finance_model->getPayment();

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('amount_distribution', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addPaymentView() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant', 'Receptionist', 'Clerk'))) {
            redirect('home/permission');
        }
        $data = array();
        $id = $this->input->get('id');
        $data['id'] = $id;
        $encounter_id = $this->input->get('encounter_id');
        $data['patient_id'] = $this->input->get('patient_id');
        $data['staffs'] = $this->encounter_model->getUser();
        if (!empty($encounter_id)) {
            $data['encounter_id'] = $encounter_id;
            $data['encounter'] = $this->encounter_model->getEncounterById($encounter_id);
            $data['encounter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
            $data['doctorr'] = $this->doctor_model->getDoctorById($data['encounter']->doctor);
            $data['patientt'] = $this->patient_model->getPatientById($data['encounter']->patient_id);
        }
        
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->finance_model->getPaymentCategoryByServiceGroup();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();

        $charges = $this->finance_model->getChargesWithCopay();

        $charges_with_copay = [];
        $charges_without_copay = [];

        foreach($charges as $charge) {
            if ($charge->total >= 2) {
                $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                // foreach($charges_copay_lists as $charges_copay_list) {
                //     $charges_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                // }
                if (!empty($charges_copay_lists)) {
                    $charges_with_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_lists[0]->id);
                }
            }
        }

        foreach($charges as $charge) {
            if ($charge->total <= 1) {
                $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                foreach($charges_copay_lists as $charges_copay_list) {
                    $charges_without_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                }
            }
        }

        $data['charges_with_copay'] = $charges_with_copay;
        $data['charges_without_copay'] = $charges_without_copay;

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_payment_viewv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function getOutstandingBalanceByPatientIdByEncounterId($encounter_id, $patient_id) {
        $invoices_by_encounter = $this->finance_model->getPaymentByEncounterIdByPatientId($encounter_id, $patient_id);

        $invoices = [];
        $invoices_amount = [];
        foreach($invoices_by_encounter as $invoice_encounter) {
            $invoices[] = $invoice_encounter->id;
            $invoices_amount[] = $invoice_encounter->gross_total;
        }

        $total_invoices_amount = array_sum($invoices_amount);

        $deposits = [];
        foreach($invoices as $invoice) {
            $deposits_details = [];
            $deposits_details[] = $this->finance_model->getDepositByPaymentId($invoice);
            foreach($deposits_details as $dep_details) {
                $deposits_amount = $dep_details->deposited_amount;
                foreach($dep_details as $details) {
                    $deposits[] = $details->deposited_amount;
                }
            }
        }

        $deposit = array_sum($deposits);

        $outstanding_balance = $total_invoices_amount - $deposit;

        return $outstanding_balance;
    }

    public function addPayment2() {
        $charge_id = $this->input->post('charge_id');
        $amount = $this->input->post('amount');
        $quantity = $this->input->post('quantity');
        // $subtotal = $this->input->post('subtotal');
        $discount = $this->input->post('discount');
        $gross = $this->input->post('grsss');
        $remarks = $this->input->post('remarks');
        $amount_received = $this->input->post('amount_received');
        $deposit_type = $this->input->post('deposit_type');
        $patient = $this->input->post('patient');
        $patient_details = $this->patient_model->getPatientById($patient);
        $doctor = $this->input->post('doctor');
        $encounter_id = $this->input->post('encounter_id');
        $current_user_group = $this->ion_auth->get_users_groups()->row()->name;
        $tax = $this->input->post('tax');
        $discount_total = $this->input->post('discount_total');
        $discount_input = $this->input->post('discount_input');
        $payer_item_total = $this->input->post('item_total');
        $discount_type = $this->input->post('discount_type');
        $datetime = gmdate('Y-m-d H:i:s');
        $data['settings'] = $this->settings_model->getSettings();
        $user = $this->ion_auth->get_user_id();
        $id = $this->input->post('id');
        $item_id = $this->input->post('item_id');
        // $deposit_edit_amount = $this->input->post('deposit_edit_amount');
        // $item_total_price = $this->input->post('amount_input');
        $date = time();

        $new_discount_type = [];
        foreach($discount_type as $dis_type) {
            if ($dis_type == '0' || $dis_type == 0) {
                $new_discount_type[] = null;
            } else {
                $new_discount_type[] = $dis_type;
            }
        }

        $discount_type = $new_discount_type;

        if (empty($id)) {

            do {
                $raw_invoice_group_number = 'G'.random_string('alnum', 6);
                $validate_number = $this->finance_model->validateInvoiceGroupNumber($raw_invoice_group_number);
            } while($validate_number != 0);

            $invoice_group_number = strtoupper($raw_invoice_group_number);

            $charge_details = [];
            $payer_details = [];
            foreach($charge_id as $key => $value) {
                $payer_id = $this->finance_model->getPaymentCategoryById($value)->payer_account_id;
                $payer_details[] = $this->company_model->getCompanyById($payer_id);

                /*Front-End to Back-End Data Validation Start*/
                    $charge_details[] = $this->finance_model->getPaymentCategoryById($value);
                /*End*/

            }

            $payer_id = [];
            foreach($payer_details as $payer_detail) {
                $payer_id[] = $payer_detail->id;
            }

            $payer_id_unique = array_values(array_unique($payer_id));

            // $payer_ids = $payer_id;

            // $payer_details_unique = array_unique($payer_details);

            // $this->finance_model->insertPayment($invoice_data);
            // $inserted_id = $this->db->insert_id();

            $invoices = [];
            foreach($payer_id_unique as $key => $value) {
                $charges = [];
                $extras = [];
                $discount = [];
                $c_price = [];
                foreach($charge_details as $charge_detail_key => $charge_detail) {
                    if ($charge_detail->type === "fixed") {
                        $c_price[] = $charge_detail->c_price;
                    } elseif ($charge_detail->type === "variable") {
                        $c_price[] = $amount[$charge_detail_key];
                    } else {
                        $c_price[] = null;
                    }

                    $item_total = $quantity[$charge_detail_key] * $c_price[$charge_detail_key];

                    if ($value === $charge_detail->payer_account_id) {
                        $charges[] = array(
                            'id' => $charge_detail->id,
                            'description' => $charge_detail->category,
                            'price' => $c_price[$charge_detail_key],
                            'charge_code' => $charge_detail->charge_code,
                            'quantity' => $quantity[$charge_detail_key],
                            'item_total_price' => $item_total,
                        );
                        $extras[] = array(
                            'tax_id' => $charge_detail->tax_id,
                            'tax_amount' => $charge_detail->tax_amount,
                        );
                        $discount[] = array(
                            'discount_id' => $discount_type[$key],
                        );

                        $invoices[$value] = array(
                            'charges' => $charges,
                            'extras' => $extras,
                            'discount' => array(
                                'discount_id' => $discount_type[$key],
                            ),
                        );
                    }

                    $array_charge_id = $invoices[$value]['charges'][0]['id'];
                    $array_charge_description = $invoices[$value]['charges'][0]['description'];
                }

                // $invoice_data = array();

                // $invoice_data = array(
                //     'patient' => $patient,
                //     'doctor' => $doctor,
                //     'date' => $date,
                //     'amount' => $subtotal,
                //     'discount' => $discount_total[$key],
                //     'gross_total' => $gross_total,
                //     'remarks' => $remarks,
                //     'amount_received' => $amount_received,
                //     'deposit_type' => $deposit_type,
                //     'payment_status' => $payment_status,
                //     'company_id' => $payer_id_unique_single,
                //     'encounter_id' => $encounter_id,
                //     'invoice_number' => $invoice_number,
                //     'discount_id' => $discount_type[$key],
                //     'invoice_tax_amount' => $tax[$key],
                // );

            }

            $invoice_unique = array_values($invoices);

            foreach($invoice_unique as $key => $value) {
                $invoice_payer_id = $payer_id_unique[$key];
                $item_subtotal = [];

                do {
                    $raw_invoice_number = 'I'.random_string('alnum', 6);
                    $validate_number = $this->finance_model->validateInvoiceNumber($raw_invoice_number);
                } while($validate_number != 0);

                $invoice_number = strtoupper($raw_invoice_number);

                foreach($value['charges'] as $charges_key => $charges) {
                    $item_subtotal[] = $charges['price'] * $charges['quantity'];
                }

                $item_tax = [];
                foreach($value['extras'] as $extras_key => $extras) {
                    $tax_details = $this->finance_model->getTaxById($extras['tax_id']);
                    if (!empty($extras['tax_amount'])) {
                        $item_tax[] = $extras['tax_amount'] * $value['charges'][$extras_key]['quantity'];
                    } else {
                        $item_tax[] = ($value['charges'][$extras_key]['price'] * (($tax_details->rate/100)/(($tax_details->rate/100)+1))) * $value['charges'][$extras_key]['quantity'];
                    }
                }

                $discount_details = $this->finance_model->getDiscountById($value['discount']['discount_id']);
                $discount_type_details = $this->finance_model->getDiscountTypeById($discount_details->discount_type_id);

                $subtotal = array_sum($item_subtotal);
                $total_tax = array_sum($item_tax);

                if (!empty($discount_type_details)) {
                    if ($discount_type_details->name === FIXED_PERCENTAGE) {
                        $payer_discount_total = $subtotal*($discount_details->rate/100);
                    } elseif ($discount_type_details->name === FIXED_AMOUNT) {
                        $payer_discount_total = $discount_details->amount;
                    } elseif ($discount_type_details->name === VARIABLE_PERCENTAGE) {
                        $payer_discount_total = $subtotal*($discount_input[$key]/100);
                    } elseif ($discount_type_details->name === VARIABLE_AMOUNT) {
                        $payer_discount_total = $discount_input[$key];
                    }
                } else {
                    $payer_discount_total = 0;
                }

                $invoice_gross_total = $subtotal - $payer_discount_total;

                $company_classification = $this->company_model->getClassificationByCompanyId($invoice_payer_id);
                $classification = $this->company_model->getCompanyClassificationById($company_classification->classification_id);
                $payment_status_list = $this->finance_model->getInvoiceStatusByCompanyClassificationName($classification->name, $current_user_group);

                foreach ($payment_status_list as $status_list) {
                    if ($status_list->name === "paid") {
                        $paid_status = $status_list->id;
                    } elseif ($status_list->name === "unpaid") {
                        $unpaid_status = $status_list->id;
                    } elseif ($status_list->name === "overdue") {
                        $overdue_status = $status_list->id;
                    }
                }

                if (empty($payment_status)) {
                    $deposit_amount = array_sum($this->input->post('deposit_edit_amount'));
                    $received_deposit_amount = $amount_received + $deposit_amount;

                    if ($received_deposit_amount >= $invoice_gross_total) {
                        $payment_status = $paid_status;
                    } else {
                        $payment_status = $unpaid_status;
                    }
                }

                if ($invoice_payer_id != '1' || $invoice_payer_id != 1) {
                    $amount_received = null;
                }

                $invoice_data = array();

                $invoice_data = array(
                    'patient' => $patient,
                    'doctor' => $doctor,
                    'date' => $date,
                    'amount' => $subtotal,
                    'discount' => $payer_discount_total,
                    'gross_total' => $invoice_gross_total,
                    'remarks' => $remarks,
                    'amount_received' => $amount_received,
                    'deposit_type' => $deposit_type,
                    'payment_status' => $payment_status,
                    'company_id' => $invoice_payer_id,
                    'encounter_id' => $encounter_id,
                    'invoice_group_number' => $invoice_group_number,
                    'invoice_number' => $invoice_number,
                    'discount_id' => $value['discount']['discount_id'],
                    'invoice_tax_amount' => $total_tax,
                    'total_without_tax' => ($subtotal + $total_tax) - $payer_discount_total,
                );

                $this->finance_model->insertPayment($invoice_data);
                $inserted_id = $this->db->insert_id();

                foreach($value['charges'] as $item_charges_key => $item_charges_value) {

                    $tax_details = $this->finance_model->getTaxById($value['extras'][$item_charges_key]['tax_id']);

                    if (!empty($value['extras'][$item_charges_key]['tax_amount'])) {
                        $extras_tax_amount = $value['extras'][$item_charges_key]['tax_amount'];
                    } else {
                        $extras_tax_amount = ((($extras_tax_details->rate/100)/(($extras_tax_details->rate/100)+1))*$item_charges_value['item_total_price'])*$item_charges_value['quantity'];
                    }

                    $invoice_item_data = array(
                        'charge_id' => $item_charges_value['id'],
                        'description' => $item_charges_value['description'],
                        'invoice_id' => $inserted_id,
                        'price' => $item_charges_value['price'],
                        'tax_id' => $value['extras'][$item_charges_key]['tax_id'],
                        'charge_code' => $item_charges_value['charge_code'],
                        'created_at' => $datetime,
                        'quantity' => $item_charges_value['quantity'],
                        'item_total_price' => $item_charges_value['item_total_price'],
                        'price_without_tax' => $item_charges_value['item_total_price'] - $extras_tax_amount,
                    );

                    $this->finance_model->insertInvoiceItem($invoice_item_data);

                }

                if ($invoice_payer_id == '1') {
                    $data1 = array(
                        'date' => $date,
                        'patient' => $patient_details->id,
                        'company_id' => $invoice_payer_id,
                        'deposited_amount' => $amount_received,
                        'payment_id' => $inserted_id,
                        'amount_received_id' => $inserted_id . '.' . 'gp',
                        'deposit_type' => $deposit_type,
                        'user' => $user,
                    );

                    $this->finance_model->insertDeposit($data1);
                }

            }
        } else {
            /*New*/
                // $invoice_list_by_group_number = $this->finance_model->getInvoiceByGroupNumber($id);

                // foreach($invoice_list_by_group_number as $invoice_single) {
                //     $invoice_company_id = intval($invoice_single->company_id);
                //     foreach($invoices as $key => $value) {
                //         $invoice_payer_id = $key;
                //         $item_subtotal = [];

                //         do {
                //             $raw_invoice_number = 'I'.random_string('alnum', 6);
                //             $validate_number = $this->finance_model->validateInvoiceNumber($raw_invoice_number);
                //         } while($validate_number != 0);

                //         $invoice_number = strtoupper($raw_invoice_number);

                //         foreach($value['charges'] as $charges_key => $charges) {
                //             $item_subtotal[] = $charges['price'] * $charges['quantity'];
                //         }

                //         $item_tax = [];
                //         foreach($value['extras'] as $extras_key => $extras) {
                //             $tax_details = $this->finance_model->getTaxById($extras['tax_id']);
                //             if (!empty($extras['tax_amount'])) {
                //                 $item_tax[] = $extras['tax_amount'] * $value['charges'][$extras_key]['quantity'];
                //             } else {
                //                 $item_tax[] = ($value['charges'][$extras_key]['price'] * ($tax_details->rate/100)) * $value['charges'][$extras_key]['quantity'];
                //             }
                //         }

                //         $discount_details = $this->finance_model->getDiscountById($value['discount']['discount_id']);
                //         $discount_type_details = $this->finance_model->getDiscountTypeById($discount_details->discount_type_id);

                //         $subtotal = array_sum($item_subtotal);
                //         $total_tax = array_sum($item_tax);

                //         if ($discount_type_details->name === FIXED_PERCENTAGE) {
                //             $payer_discount_total = $subtotal*($discount_details->rate/100);
                //         } elseif ($discount_type_details->name === FIXED_AMOUNT) {
                //             $payer_discount_total = $discount_details->amount;
                //         } elseif ($discount_type_details->name === VARIABLE_PERCENTAGE) {
                //             $payer_discount_total = $subtotal*($discount_input[$key]/100);
                //         } elseif ($discount_type_details->name === VARIABLE_AMOUNT) {
                //             $payer_discount_total = $discount_input[$key];
                //         }

                //         $invoice_gross_total = $subtotal - $payer_discount_total;

                //         $company_classification = $this->company_model->getClassificationByCompanyId($invoice_payer_id);
                //         $classification = $this->company_model->getCompanyClassificationById($company_classification->classification_id);
                //         $payment_status_list = $this->finance_model->getInvoiceStatusByCompanyClassificationName($classification->name, $current_user_group);

                //         foreach ($payment_status_list as $status_list) {
                //             if ($status_list->name === "paid") {
                //                 $paid_status = $status_list->id;
                //             } elseif ($status_list->name === "unpaid") {
                //                 $unpaid_status = $status_list->id;
                //             } elseif ($status_list->name === "overdue") {
                //                 $overdue_status = $status_list->id;
                //             }
                //         }

                //         if (empty($payment_status)) {
                //         $deposit_amount = array_sum($this->input->post('deposit_edit_amount'));
                //             $received_deposit_amount = $amount_received + $deposit_amount;

                //             if ($received_deposit_amount >= $invoice_gross_total) {
                //                 $payment_status = $paid_status;
                //             } else {
                //                 $payment_status = $unpaid_status;
                //             }
                //         }

                //         if ($invoice_payer_id != '1' || $invoice_payer_id != 1) {
                //             $amount_received = null;
                //             $deposit_amount = null;
                //         }

                //         if ($key === $invoice_company_id) { //Update
                //             $invoice_update = array();
                //             $invoice_update = array(
                //                 'patient' => $patient,
                //                 'doctor' => $doctor,
                //                 'date' => $date,
                //                 'amount' => $subtotal,
                //                 'discount' => $payer_discount_total,
                //                 'gross_total' => $invoice_gross_total,
                //                 'remarks' => $remarks,
                //                 'amount_received' => $deposit_amount,
                //                 'deposit_type' => $deposit_type,
                //                 'payment_status' => $payment_status,
                //                 'company_id' => $invoice_payer_id,
                //                 'encounter_id' => $encounter_id,
                //                 'invoice_group_number' => $id,
                //                 'invoice_number' => $invoice_number,
                //                 'discount_id' => $value['discount']['discount_id'],
                //                 'invoice_tax_amount' => $total_tax,
                //             );
                //             $this->finance_model->updatePayment($invoice_single->id, $invoice_update);
                //         } else { //Delete

                //         }
                //     }
                // }
            /*New*/

            /*Old*/
                // $deposit_amount = array_sum($this->input->post('deposit_edit_amount'));
                // $invoice_list_by_group_number = $this->finance_model->getInvoiceByGroupNumber($id);


                // $items = [];
                // $to_be_updated = [];
                // $to_be_deleted = [];
                // $group_invoices_id = [];
                // foreach($invoice_list_by_group_number as $invoice) {
                //     $invoice_items = $this->finance_model->getInvoiceItemsByPaymentId($invoice->id);
                //     foreach($invoice_items as $invoice_item) {
                //         $items[] = $invoice_item->charge_id;
                //         if (in_array($invoice_item->id, $item_id) === TRUE) {
                //             $to_be_updated[$invoice_item->id] = $invoice_item->charge_id;
                //         } elseif (in_array($invoice_item->id, $item_id) === FALSE) {
                //             $to_be_deleted[] = $invoice_item->id; /*Delete*/
                //             $invoice_item_delete_data = array();
                //             $invoice_item_delete_data = array(
                //                 'deleted' => 1,
                //             );
                //             $this->finance_model->deleteInvoiceItem($invoice_item->id, $invoice_item_delete_data);
                //         }
                //     }
                // }

                // $to_be_added = [];
                // foreach($charge_id as $charge) {
                //     if (in_array($charge, $items) === FALSE) {
                //         $to_be_added[] = $charge;
                //     }
                // }

                // $data_added = [];
                // $data_updated = [];
                // $data_deleted = [];
                // foreach($invoices as $key => $value) {
                //     $invoice_payer_id = $payer_id_unique[$key];
                //     foreach($value['charges'] as $charges_key => $charges) {
                //         if (in_array($charges['id'], $to_be_added)) { /*Insert*/
                //             $data_added[] = $charges['id'];
                //         } elseif (in_array($charges['id'], $to_be_updated)) { /*Update*/
                //             $data_updated[] = $charges['id'];
                //         } elseif (in_array($charges['id'], $to_be_deleted)) { /*Delete*/
                //             $data_deleted[] = $charges['id'];
                //         }
                //     }
                // }
            /*Old*/

            $invoices_from_db = $this->finance_model->getInvoiceByGroupNumber($id);

            do {
                $raw_invoice_number = 'I'.random_string('alnum', 6);
                $validate_number = $this->finance_model->validateInvoiceNumber($raw_invoice_number);
            } while($validate_number != 0);

            $invoice_number = strtoupper($raw_invoice_number);

            $charge_details = [];
            $payer_details = [];
            // $invoice_item_to_be_deleted = [];
            $current_charges_id = [];
            foreach($charge_id as $key => $value) {
                $payer_id = $this->finance_model->getPaymentCategoryById($value)->payer_account_id;
                $payer_details[] = $this->company_model->getCompanyById($payer_id);

                /*Front-End to Back-End Data Validation Start*/
                    $charge_details[] = $this->finance_model->getPaymentCategoryById($value);
                    $current_charges_id[] = $charge_id->id;
                /*End*/

            }

            $payer_id = [];
            foreach($payer_details as $payer_detail) {
                $payer_id[] = $payer_detail->id;
            }

            $payer_id_unique = array_values(array_unique($payer_id));

            $invoice_to_be_updated = [];
            $invoice_to_be_added = [];
            foreach($payer_id_unique as $payer_single_key => $payer_single_value) {
                // foreach($invoices_from_db as $invoice_from_db_key => $invoice_from_db_value) {
                //     if (in_array($payer_single_value, $invoice_from_db_value->company_id)) { /*Update*/
                //         $invoice_details = $this->finance_model->getPaymentByInvoiceGroupNumberByCompanyId($id, $invoice_from_db_value->company_id);
                //         $invoice_detail_id = $invoice_details->id;
                //         $invoice_to_be_updated[] = array(
                //             'id' => $invoice_detail_id,
                //         );
                //     } else { /*Insert*/
                //         $invoice_to_be_added[] = $payer_single_value;
                //     }
                // }

                $invoice_details = $this->finance_model->getPaymentByInvoiceGroupNumberByCompanyId($id, $payer_single_value);

                if (!empty($invoice_details)) { /*Update*/
                    $invoice_to_be_updated[] = $invoice_details->id.'-'.$invoice_details->company_id;

                    $c_price = [];
                    $invoice_items = [];
                    foreach($charge_details as $charge_detail_key => $charge_detail_value) {

                        if ($charge_detail_value->payer_account_id == $payer_single_value) {

                            if ($data['settings']->is_display_prices_with_tax_included == 1) {
                                // $price = $charge_detail_value->c_price;
                                if ($charge_detail_value->type == "fixed") {
                                    $price = $charge_detail_value->c_price;
                                    $total_price = $price * $quantity[$charge_detail_key];
                                    $price_without_tax = $charge_detail_value->c_price_without_tax;
                                } else {
                                    $price = $amount[$charge_detail_key];
                                    $total_price = $amount[$charge_detail_key] * $quantity[$charge_detail_key];
                                    $price_without_tax = $amount[$charge_detail_key];
                                }
                            } elseif ($data['settings']->is_display_prices_with_tax_included == 0) {
                                if ($charge_detail_value->type == "fixed") {
                                    $price = $charge_detail_value->c_price;
                                    $total_price = $price * $quantity[$charge_detail_key];
                                    $price_without_tax = $charge_detail_value->c_price_without_tax;
                                } else {
                                    $price = $amount[$charge_detail_key];
                                    $total_price = $amount[$charge_detail_key] * $quantity[$charge_detail_key];
                                    $price_without_tax = $amount[$charge_detail_key];
                                }
                            }

                            // if ($charge_detail_value->type == "fixed") {
                            //     $total_price = $price * $quantity[$charge_detail_key];
                            // } else {
                            //     $total_price = $amount[$charge_detail_key] * $quantity[$charge_detail_key];
                            // }

                            $invoice_items[] = array(
                                'charge_details' => $charge_detail_value,
                                'item_details' => array(
                                    'charge_id' => $charge_detail_value->id,
                                    'description' => $charge_detail_value->description,
                                    'invoice_id' => $invoice_details->id,
                                    'price' => $price,
                                    'tax_id' => $charge_detail_value->tax_id,
                                    'charge_code' => $charge_detail_value->charge_code,
                                    'quantity' => $quantity[$charge_detail_key],
                                    'item_total_price' => $total_price,
                                    'price_without_tax' => $price_without_tax,
                                ),
                            );

                            $c_price[] = $total_price;
                        }

                    }

                    $discount_details = $this->finance_model->getDiscountById($discount_type[$payer_single_key]);
                    $discount_type_details = $this->finance_model->getDiscountTypeById($discount_details->discount_type_id);

                    $total_c_price = array_sum($c_price);

                    if ($discount_type_details->name === FIXED_PERCENTAGE) {
                        $payer_discount_total = $total_c_price*($discount_details->rate/100);
                    } elseif ($discount_type_details->name === FIXED_AMOUNT) {
                        $payer_discount_total = $discount_details->amount;
                    } elseif ($discount_type_details->name === VARIABLE_PERCENTAGE) {
                        $payer_discount_total = $total_c_price*($discount_input[$payer_single_key]/100);
                    } elseif ($discount_type_details->name === VARIABLE_AMOUNT) {
                        $payer_discount_total = $discount_input[$payer_single_key];
                    }

                    $invoice_gross_total = $total_c_price - $payer_discount_total;

                    $company_classification = $this->company_model->getClassificationByCompanyId($payer_single_value);
                    $classification = $this->company_model->getCompanyClassificationById($company_classification->classification_id);
                    $payment_status_list = $this->finance_model->getInvoiceStatusByCompanyClassificationName($classification->name, $current_user_group);

                    foreach ($payment_status_list as $status_list) {
                        if ($status_list->name === "paid") {
                            $paid_status = $status_list->id;
                        } elseif ($status_list->name === "unpaid") {
                            $unpaid_status = $status_list->id;
                        } elseif ($status_list->name === "overdue") {
                            $overdue_status = $status_list->id;
                        }
                    }

                    if (empty($payment_status)) {
                        $deposit_amount = array_sum($this->input->post('deposit_edit_amount'));
                        $received_deposit_amount = $amount_received + $deposit_amount;

                        if ($received_deposit_amount >= $invoice_gross_total) {
                            $payment_status = $paid_status;
                        } else {
                            $payment_status = $unpaid_status;
                        }
                    }

                    if ($payer_single_value != '1' || $payer_single_value != 1) {
                        $deposit_amount = null;
                    }

                    $update_invoice_data = array();

                    $update_invoice_data = array(
                        'patient' => $patient,
                        'doctor' => $doctor,
                        'last_modified' => $datetime,
                        'amount' => $total_c_price,
                        'discount' => $payer_discount_total,
                        'gross_total' => $invoice_gross_total,
                        'remarks' => $remarks,
                        'amount_received' => $deposit_amount,
                        'payment_status' => $payment_status,
                        'encounter_id' => $encounter_id,
                        'invoice_group_number' => $id,
                        'invoice_number' => $invoice_number,
                        'discount_id' => $discount_type[$payer_single_key],
                        'invoice_tax_amount' => $tax[$payer_single_key],
                        'total_without_tax' => ($total_c_price + $tax[$payer_single_key]) - $payer_discount_total,
                    );

                    $this->finance_model->updatePayment($invoice_details->id, $update_invoice_data);

                    $invoice_items_details = $this->finance_model->getInvoiceItemsByPaymentId($invoice_details->id);

                    $company_items = [];
                    foreach($charge_details as $charge_detail) {
                        if ($payer_single_value == $charge_detail->payer_account_id) {
                            $company_items[] = $charge_detail;
                        }
                    }

                    // $invoice_item_to_be_added = [];
                    $invoice_item_to_be_updated = [];
                    foreach($company_items as $company_item_key => $company_item_value) {

                        $check_invoice_item_exist = $this->finance_model->getInvoiceItemByChargeIdByInvoiceId($company_item_value->id, $invoice_details->id);

                        if (empty($check_invoice_item_exist)) {
                            $invoice_item_to_be_added = $invoice_items[$company_item_key];
                            $last_modified = array(
                                'last_modified' => $datetime,
                            );
                            $insert_invoice_item_data = array_merge($invoice_item_to_be_added['item_details'], $last_modified);
                            $this->finance_model->insertInvoiceItem($insert_invoice_item_data);
                        }

                        foreach($invoice_items_details as $i_i_d_key => $i_i_d_value) {
                            if ($company_item_value->id == $i_i_d_value->charge_id) {
                                $invoice_item_to_be_updated[] = $invoice_items[$company_item_key];
                                $created_at = array(
                                    'created_at' => $datetime,
                                );
                                $update_invoice_item_data = array_merge($invoice_item_to_be_updated[$company_item_key]['item_details'], $created_at);
                                $this->finance_model->updateInvoiceItem($i_i_d_value->id, $update_invoice_item_data);
                            }
                        }
                    }

                } else { /*Add*/
                    $invoice_to_be_added[] = $payer_single_value;

                    $c_price = [];
                    $invoice_items = [];
                    foreach($charge_details as $charge_detail_key => $charge_detail_value) {

                        if ($charge_detail_value->payer_account_id == $payer_single_value) {
                            
                            if ($data['settings']->is_display_prices_with_tax_included == 1) {
                                // $price = $charge_detail_value->c_price;
                                if ($charge_detail_value->type == "fixed") {
                                    $price = $charge_detail_value->c_price;
                                    $total_price = $price * $quantity[$charge_detail_key];
                                } else {
                                    $price = $amount[$charge_detail_key];
                                    $total_price = $amount[$charge_detail_key] * $quantity[$charge_detail_key];
                                }
                            } elseif ($data['settings']->is_display_prices_with_tax_included == 0) {
                                if ($charge_detail_value->type == "fixed") {
                                    $price = $charge_detail_value->c_price_without_tax;
                                    $total_price = $price * $quantity[$charge_detail_key];
                                } else {
                                    $price = $amount[$charge_detail_key];
                                    $total_price = $amount[$charge_detail_key] * $quantity[$charge_detail_key];
                                }
                            }

                            $invoice_items[] = array(
                                'charge_details' => $charge_detail_value,
                                'item_details' => array(
                                    'charge_id' => $charge_detail_value->id,
                                    'description' => $charge_detail_value->description,
                                    'price' => $price,
                                    'tax_id' => $charge_detail_value->tax_id,
                                    'charge_code' => $charge_detail_value->charge_code,
                                    'quantity' => $quantity[$charge_detail_key],
                                    'item_total_price' => $total_price,
                                    'price_without_tax' => $charge_detail_value->c_price_without_tax,
                                ),
                            );

                            $c_price[] = $total_price;

                        }

                    }

                    $discount_details = $this->finance_model->getDiscountById($discount_type[$payer_single_key]);
                    $discount_type_details = $this->finance_model->getDiscountTypeById($discount_details->discount_type_id);

                    $total_c_price = array_sum($c_price);

                    if ($discount_type_details->name === FIXED_PERCENTAGE) {
                        $payer_discount_total = $total_c_price*($discount_details->rate/100);
                    } elseif ($discount_type_details->name === FIXED_AMOUNT) {
                        $payer_discount_total = $discount_details->amount;
                    } elseif ($discount_type_details->name === VARIABLE_PERCENTAGE) {
                        $payer_discount_total = $total_c_price*($discount_input[$payer_single_key]/100);
                    } elseif ($discount_type_details->name === VARIABLE_AMOUNT) {
                        $payer_discount_total = $discount_input[$payer_single_key];
                    }

                    $invoice_gross_total = $total_c_price - $payer_discount_total;

                    $company_classification = $this->company_model->getClassificationByCompanyId($payer_single_value);
                    $classification = $this->company_model->getCompanyClassificationById($company_classification->classification_id);
                    $payment_status_list = $this->finance_model->getInvoiceStatusByCompanyClassificationName($classification->name, $current_user_group);

                    foreach ($payment_status_list as $status_list) {
                        if ($status_list->name === "paid") {
                            $paid_status = $status_list->id;
                        } elseif ($status_list->name === "unpaid") {
                            $unpaid_status = $status_list->id;
                        } elseif ($status_list->name === "overdue") {
                            $overdue_status = $status_list->id;
                        }
                    }

                    if (empty($payment_status)) {
                        $deposit_amount = array_sum($this->input->post('deposit_edit_amount'));
                        $received_deposit_amount = $amount_received + $deposit_amount;

                        if ($received_deposit_amount >= $invoice_gross_total) {
                            $payment_status = $paid_status;
                        } else {
                            $payment_status = $unpaid_status;
                        }
                    }

                    if ($invoice_payer_id != '1' || $invoice_payer_id != 1) {
                        $amount_received = null;
                    }

                    $insert_invoice_data = array();

                    $insert_invoice_data = array(
                        'patient' => $patient,
                        'doctor' => $doctor,
                        'created_at' => $datetime,
                        'company_id' => $payer_single_value,
                        'amount' => $total_c_price,
                        'discount' => $payer_discount_total,
                        'gross_total' => $invoice_gross_total,
                        'remarks' => $remarks,
                        'amount_received' => $amount_received,
                        'payment_status' => $payment_status,
                        'encounter_id' => $encounter_id,
                        'invoice_group_number' => $id,
                        'invoice_number' => $invoice_number,
                        'discount_id' => $discount_type[$payer_single_key],
                        'invoice_tax_amount' => $tax[$payer_single_key],
                        'deposit_type' => $invoices_from_db[0]->deposit_type,
                    );

                    $this->finance_model->insertPayment($insert_invoice_data);
                    $inserted_id = $this->db->insert_id();

                    foreach($invoice_items as $invoice_item) {
                        $invoice_id = array(
                            'invoice_id' => $inserted_id,
                        );
                        $insert_invoice_item_data = array_merge($invoice_item['item_details'], $invoice_id);
                        $this->finance_model->insertInvoiceItem($insert_invoice_item_data);
                    }

                }

            }

            $invoice_item_list = [];
            $invoice_item_list_id = [];
            foreach($invoices_from_db as $invoice_from_db) {
                $invoice_items = $this->finance_model->getInvoiceItemsByPaymentId($invoice_from_db->id);
                foreach($invoice_items as $invoice_item) {
                    $invoice_item_list[] = $invoice_item;
                    $invoice_item_list_id[$invoice_item->id] = $invoice_item->charge_id;
                }
            }

            $invoice_item_to_be_deleted = array_diff($invoice_item_list_id, $charge_id);

            foreach($invoice_item_to_be_deleted as $to_be_deleted_key => $to_be_deleted_value) {
                $this->finance_model->deleteInvoiceItem($to_be_deleted_key);
            }

            // $to_be_deleted = [];
            // foreach($invoices_from_db as $invoice_from_db) {
            //     $invoice_items_from_db_details = $this->finance_model->getInvoiceItemsByPaymentId($invoice_from_db->id);
            //     foreach($invoice_items_from_db_details as $invoice_item_from_db_details) {
            //         foreach($charge_details as $charge_detail) {
            //             if ($invoice_item_from_db_details->charge_id != $charge_detail->id) {
            //                 $to_be_deleted[] = $invoice_item_from_db_details;
            //             }
            //         }
            //     }
            // }

        }
        /**/
            // foreach($payer_id_unique as $key => $value) {
            //     $payer_id_unique_single = $value;
            //     $subtotal = $payer_item_total[$key];
            //     $gross_total = $subtotal - $discount_total[$key];

            //     do {
            //         $raw_invoice_number = 'I'.random_string('alnum', 6);
            //         $validate_number = $this->finance_model->validateInvoiceNumber($raw_invoice_number);
            //     } while($validate_number != 0);

            //     $invoice_number = strtoupper($raw_invoice_number);

            //     $charge_detail = [];
            //     $invoice_item_data = array();

            //     $company_classification = $this->company_model->getClassificationByCompanyId($payer_id_unique_single);
            //     $classification = $this->company_model->getCompanyClassificationById($company_classification->classification_id);
            //     $payment_status_list = $this->finance_model->getInvoiceStatusByCompanyClassificationName($classification->name, $current_user_group);

            //     foreach ($payment_status_list as $status_list) {
            //         if ($status_list->name === "paid") {
            //             $paid_status = $status_list->id;
            //         } elseif ($status_list->name === "unpaid") {
            //             $unpaid_status = $status_list->id;
            //         } elseif ($status_list->name === "overdue") {
            //             $overdue_status = $status_list->id;
            //         }
            //     }

            //     if (empty($payment_status)) {
            //         $deposit_amount = array_sum($this->input->post('deposit_edit_amount'));
            //         $received_deposit_amount = $amount_received + $deposit_amount;

            //         if ($received_deposit_amount >= $gross) {
            //             $payment_status = $paid_status;
            //         } else {
            //             $payment_status = $unpaid_status;
            //         }
            //     }

            //     $invoice_data = array();

            //     $invoice_data = array(
            //         'patient' => $patient,
            //         'doctor' => $doctor,
            //         'date' => $date,
            //         'amount' => $subtotal,
            //         'discount' => $discount_total[$key],
            //         'gross_total' => $gross_total,
            //         'remarks' => $remarks,
            //         'amount_received' => $amount_received,
            //         'deposit_type' => $deposit_type,
            //         'payment_status' => $payment_status,
            //         'company_id' => $payer_id_unique_single,
            //         'encounter_id' => $encounter_id,
            //         'invoice_number' => $invoice_number,
            //         'discount_id' => $discount_type[$key],
            //         'invoice_tax_amount' => $tax[$key],
            //     );
            //     // $this->finance_model->insertPayment($invoice_data);
            //     $inserted_id = $this->db->insert_id();
            //     foreach($charge_id as $key => $value) {
            //         $charge_detail[] = $this->finance_model->getPaymentCategoryById($value);

            //         if ($charge_detail[$key]->payer_account_id === $payer_id_unique_single) {
            //             $item_total_price = $amount[$key] * $quantity[$key];

            //             $invoice_item_data = array( 
            //                 'charge_id' => $charge_detail[$key]->id,
            //                 'description' => $charge_detail[$key]->category,
            //                 'invoice_id' => $inserted_id,
            //                 'price' => $amount[$key],
            //                 'tax_id' => $charge_detail[$key]->tax_id,
            //                 'charge_code' => $charge_detail[$key]->charge_code,
            //                 'quantity' => $quantity[$key],
            //                 'item_total_price' => $item_total_price,
            //             );
            //             // $this->finance_model->insertInvoiceItem($invoice_item_data);
            //         }
            //         // $this->finance_model->insertInvoiceItem($invoice_item_data);
            //     }
            // }
        /**/
        redirect('finance/invoices');

    }

    public function addPayment() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant', 'Receptionist', 'Clerk'))) {
            redirect('home/permission');
        }
        $id = $this->input->post('id');
        $item_selected = array();
        $quantity = array();
        $category_selected = array();
        // $amount_by_category = $this->input->post('category_amount');
        $payment_status = (int)$this->input->post('payment_status');
        $encounter_id = $this->input->post('encounter_id');
        $category_selected = $this->input->post('category_name');
        $item_selected = $this->input->post('category_id');
        $quantity = $this->input->post('quantity');
        $remarks = $this->input->post('remarks');
        $completion_status = $this->input->post('completion_status');
        $company_id = $this->input->post('company_id');

        $doctor_item_selected_explode = [];
        foreach ($item_selected as $selected) {
            $doctor_item_selected_explode[] = explode('-', $selected);
        }
        $doctor_selected = [];
        $items_selected = [];
        foreach ($doctor_item_selected_explode as $doctor_item_selected) {
            $items_selected[] = $doctor_item_selected[0];
            $doctor_selected[] = $doctor_item_selected[1];
        }

        // $doctor_items = array_combine($items_selected, $doctor_selected);

        $item_quantity_array = array();
        // $item_quantity_array = array_combine($items_selected, $quantity);
        $item_quantity_array = $items_selected;
        $cat_and_price = array();
        if (!empty($item_quantity_array)) {
            foreach ($item_quantity_array as $key => $value) {
                $current_item = $this->finance_model->getPaymentCategoryById($value);
                $items_service_type = $this->finance_model->getServiceCategoryGroupById($current_item->service_category_group_id);
                if(!empty($items_service_type->is_virtual)) {
                    $doctor_fee = $this->doctor_model->getDoctorByIonUserId($doctor_selected[$key])->virtual_consultation_fee;
                } else {
                    $doctor_fee = $this->doctor_model->getDoctorByIonUserId($doctor_selected[$key])->physical_consultation_fee;
                }
                $category_price = $current_item->c_price;
                $category_id = $current_item->category_id;
                $qty = $quantity[$key];
                $cat_and_price[] = $value . '-' . $doctor_selected[$key] . '*' . $category_price . '*' . $category_id . '*' . $qty;
                $amount_by_category[] = $category_price * $qty;
            }
            $category_name = implode(',', $cat_and_price);
        }

        $patient = $this->input->post('patient');

        $p_name = $this->input->post('p_name');
        $p_email = $this->input->post('p_email');
        if (empty($p_email)) {
            $p_email = $p_name . '-' . rand(1, 1000) . '-' . $p_name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($p_name)) {
            $password = $p_name . '-' . rand(1, 100000000);
        }
        $p_phone = $this->input->post('p_phone');
        $p_age = $this->input->post('p_age');
        $p_gender = $this->input->post('p_gender');
        $add_date = date('m/d/y');


        $patient_id = rand(10000, 1000000);



        $d_name = $this->input->post('d_name');
        $d_email = $this->input->post('d_email');
        if (empty($d_email)) {
            $d_email = $d_name . '-' . rand(1, 1000) . '-' . $d_name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($d_name)) {
            $password = $d_name . '-' . rand(1, 100000000);
        }
        $d_phone = $this->input->post('d_phone');

        $doctor = $this->input->post('doctor');
        $rendering_user = $this->input->post('rendering_user');
        if ($rendering_user === "add_new") {
            $rendering_user = null;
        }
        $date = time();
        $today_date_time = gmdate('Y-m-d H:i:s');
        $date_string = date('d-m-y', $date);
        $discount = $this->input->post('discount');
        if (empty($discount)) {
            $discount = 0;
        }
        $amount_received = $this->input->post('amount_received');
        $deposit_type = $this->input->post('deposit_type');
        $user = $this->ion_auth->get_user_id();
        $current_user_group = $this->ion_auth->get_users_groups()->row()->name;

        $company_classification = $this->company_model->getClassificationByCompanyId($company_id);
        $classification = $this->company_model->getCompanyClassificationById($company_classification->classification_id);
        $payment_status_list = $this->finance_model->getInvoiceStatusByCompanyClassificationName($classification->name, $current_user_group);

        do {
            $raw_invoice_number = 'I'.random_string('alnum', 6);
            $validate_number = $this->finance_model->validateInvoiceNumber($raw_invoice_number);
        } while($validate_number != 0);

        $invoice_number = strtoupper($raw_invoice_number);

        foreach ($payment_status_list as $status_list) {
            if ($status_list->name === "paid") {
                $paid_status = $status_list->id;
            } elseif ($status_list->name === "unpaid") {
                $unpaid_status = $status_list->id;
            } elseif ($status_list->name === "overdue") {
                $overdue_status = $status_list->id;
            }
        }
        // $payment_status_list = $this->

        if (empty($payment_status)) {
            $deposit_amount = array_sum($this->input->post('deposit_edit_amount'));
            $gross = $this->input->post('grsss');
            $received_deposit_amount = $amount_received + $deposit_amount;

            if ($received_deposit_amount >= $gross) {
                $payment_status = $paid_status;
            } else {
                $payment_status = $unpaid_status;
            }
        }

        $outstanding_balance = $this->getOutstandingBalanceByPatientIdByEncounterId($encounter_id, $patient) - $amount_received;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Category Field
        // $this->form_validation->set_rules('category_amount[]', 'Category', 'min_length[1]|max_length[100]');
        // Validating Price Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Price Field
        $this->form_validation->set_rules('company_id', 'Company', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        $this->form_validation->set_rules('category_name[]', 'Charge', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        $this->form_validation->set_rules('quantity[]', 'Quantity', 'trim|required|is_natural_no_zero|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', lang('validation_error'));
            $data = array();
            $data['discount_type'] = $this->finance_model->getDiscountType();
            $data['settings'] = $this->settings_model->getSettings();
            $data['categories'] = $this->finance_model->getPaymentCategory();
            $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);
            $data['patients'] = $this->patient_model->getPatient();
            $data['doctors'] = $this->doctor_model->getDoctor();
            $data['company'] = $this->company_model->getCompany();
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('add_payment_viewv2', $data);
            // $this->load->view('home/footer'); // just the header file
        } else {
            if (!empty($p_name)) {

                $limit = $this->patient_model->getLimit();
                if ($limit <= 0) {
                    $this->session->set_flashdata('warning', lang('patient_limit_exceed'));
                    redirect('patient');
                }

                $data_p = array(
                    'patient_id' => $patient_id,
                    'name' => $p_name,
                    'email' => $p_email,
                    'phone' => $p_phone,
                    'sex' => $p_gender,
                    'age' => $p_age,
                    'add_date' => $add_date,
                    'how_added' => 'from_pos'
                );
                $username = $this->input->post('p_name');
        // Adding New Patient
                if ($this->ion_auth->email_check($p_email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                } else {
                    $dfg = 5;
                    $this->ion_auth->register($username, $password, $p_email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $p_email))->row()->id;
                    $this->patient_model->insertPatient($data_p);
                    $patient_user_id = $this->db->get_where('patient', array('email' => $p_email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->patient_model->updatePatient($patient_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                }
        //    }
            }

            if (!empty($d_name)) {

                $limit = $this->doctor_model->getLimit();
                if ($limit <= 0) {
                    $this->session->set_flashdata('warning', lang('doctor_limit_exceed'));
                    redirect('doctor');
                }

                $data_d = array(
                    'name' => $d_name,
                    'email' => $d_email,
                    'phone' => $d_phone,
                );
                $username = $this->input->post('d_name');
        // Adding New Patient
                if ($this->ion_auth->email_check($d_email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                } else {
                    $dfgg = 4;
                    $this->ion_auth->register($username, $password, $d_email, $dfgg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $d_email))->row()->id;
                    $this->doctor_model->insertDoctor($data_d);
                    $doctor_user_id = $this->db->get_where('doctor', array('email' => $d_email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->doctor_model->updateDoctor($doctor_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                }
            }


            if ($patient == 'add_new') {
                $patient = $patient_user_id;
            }

            if ($doctor == 'add_new') {
                $doctor = $doctor_user_id;
            }

            $amount = array_sum($amount_by_category);
            $sub_total = $amount;
            $discount_type = $this->finance_model->getDiscountType();
            if (!empty($doctor)) {
                $all_cat_name = explode(',', $category_name);
                foreach ($all_cat_name as $indiviual_cat_nam) {
                    $indiviual_cat_nam1 = explode('*', $indiviual_cat_nam);
                    $qty = $indiviual_cat_nam1[3];
                    $d_commission = $this->finance_model->getPaymentCategoryById($indiviual_cat_nam1[0])->d_commission;
                    $h_commission = 100 - $d_commission;
                    $hospital_amount_per_unit = $indiviual_cat_nam1[1] * $h_commission / 100;
                    $hospital_amount_by_category[] = $hospital_amount_per_unit * $qty;
                }
                $hospital_amount = array_sum($hospital_amount_by_category);
                if ($discount_type == 'flat') {
                    $flat_discount = $discount;
                    $gross_total = $sub_total - $flat_discount;
                    $doctor_amount = $amount - $hospital_amount - $flat_discount;
                } else {
                    $flat_discount = $sub_total * ($discount / 100);
                    $gross_total = $sub_total - $flat_discount;
                    $doctor_amount = $amount - $hospital_amount - $flat_discount;
                }
            } else {
                $doctor_amount = '0';
                if ($discount_type == 'flat') {
                    $flat_discount = $discount;
                    $gross_total = $sub_total - $flat_discount;
                    $hospital_amount = $gross_total;
                } else {
                    $flat_discount = $amount * ($discount / 100);
                    $gross_total = $sub_total - $flat_discount;
                    $hospital_amount = $gross_total;
                }
            }

            $unpaid_total = $gross_total - $amount_received;
            $data = array();

            if (!empty($patient)) {
                $patient_details = $this->patient_model->getPatientById($patient);
                $patient_name = $patient_details->name;
                $patient_phone = $patient_details->phone;
                $patient_address = $patient_details->address;
                $patient_email = $patient_details->email;
            } else {
                $patient_name = 0;
                $patient_phone = 0;
                $patient_address = 0;
            }

            if (!empty($doctor)) {
                $doctor_details = $this->doctor_model->getDoctorById($doctor);
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = 0;
            }

            if (empty($id)) {
                $data = array(
                    'category_name' => $category_name,
                    'patient' => $patient,
                    'date' => $date,
                    'created_at' => $today_date_time,
                    'amount' => $sub_total,
                    'doctor' => $doctor,
                    'rendering_staff_id' => $rendering_user,
                    'discount' => $discount,
                    'flat_discount' => $flat_discount,
                    'gross_total' => $gross_total,
                    'hospital_amount' => $hospital_amount,
                    'doctor_amount' => $doctor_amount,
                    'user' => $user,
                    'patient_name' => $patient_name,
                    'patient_phone' => $patient_phone,
                    'patient_address' => $patient_address,
                    'doctor_name' => $doctor_name,
                    'date_string' => $date_string,
                    'remarks' => $remarks,
                    'completion_status' => $completion_status,
                    'company_id' => $company_id,
                    'payment_status' => $payment_status,
                    'encounter_id' => $encounter_id,
                    'invoice_number' => $invoice_number,
                );


                $this->finance_model->insertPayment($data);
                $inserted_id = $this->db->insert_id();

                $encounter_data = $this->encounter_model->getEncounterById($encounter_id);
                $encounter_payment_status = $encounter_data->payment_status;
                $encounter_invoice_id = $encounter_data->invoice_id;

                if (empty($encounter_invoice_id)) {
                    $finance_encounter = array(
                        'payment_status' => $payment_status,
                        'invoice_id' => $inserted_id,
                    );

                    $this->encounter_model->updateEncounter($encounter_id, $finance_encounter);
                }

                if ($outstanding_balance <= 0) {
                    $payment_status = $paid_status;
                    $finance_encounter = array(
                        'payment_status' => $payment_status,
                    );
                    $this->encounter_model->updateEncounter($encounter_id, $finance_encounter);
                } elseif ($outstanding_balance > 0) {
                    $payment_status = $unpaid_status;
                    $finance_encounter = array(
                        'payment_status' => $payment_status,
                    );
                    $this->encounter_model->updateEncounter($encounter_id, $finance_encounter);
                }

                //sms
                $set['settings'] = $this->settings_model->getSettings();
                $autosms = $this->sms_model->getAutoSmsByType('bill');
                $message = $autosms->message;
                $to = $patient_phone;
                $name1 = explode(' ', $patient_name);
                if (!isset($name1[1])) {
                    $name1[1] = null;
                }
                $data1 = array(
                    'firstname' => $name1[0],
                    'lastname' => $name1[1],
                    'name' => $patient_name,
                    'amount' => number_format($gross_total,2),
                    'unpaid_amount' => number_format($unpaid_total,2),
                    'date' => date('F j, Y',$date),
                    'hospital_name' => $set['settings']->title,
                    'hospital_contact' => $set['settings']->phone,
                    'currency_symbol' => $set['settings']->currency,
                    'base_url' => base_url(),
                    'invoice_id' => $inserted_id
                );

                if ($autosms->status == 'Active') {
                    $messageprint = $this->parser->parse_string($message, $data1);
                    $data2[] = array($to => $messageprint);
                    $this->sms->sendSms($to, $message, $data2);
                }
                //end
                //email 

                $autoemail = $this->email_model->getAutoEmailByType('bill');
                if ($autoemail->status == 'Active') {
                    $emailSettings = $this->email_model->getEmailSettings();
                    $message1 = $autoemail->message;
                    $messageprint1 = $this->parser->parse_string($message1, $data1);
                    $this->email->from($emailSettings->admin_email, $emailSettings->admin_email_display_name);
                    $this->email->to($patient_email);
                    $this->email->subject(lang('bill_generated_subject').' '.$set['settings']->title);
                    $this->email->message($messageprint1);
                    $this->email->send();
                }

                //end


                if ($deposit_type == 'Card') {
                    $gateway = $this->settings_model->getSettings()->payment_gateway;
                    if ($gateway == 'PayPal') {

                        $card_type = $this->input->post('card_type');
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv');

                        $all_details = array(
                            'patient' => $patient,
                            'date' => $date,
                            'amount' => $sub_total,
                            'doctor' => $doctor,
                            'discount' => $discount,
                            'flat_discount' => $flat_discount,
                            'gross_total' => $gross_total,
                            'hospital_amount' => $hospital_amount,
                            'doctor_amount' => $doctor_amount,
                            'patient_name' => $patient_name,
                            'patient_phone' => $patient_phone,
                            'patient_address' => $patient_address,
                            'doctor_name' => $doctor_name,
                            'date_string' => $date_string,
                            'remarks' => $remarks,
                            'completion_status' => $completion_status,
                            'company_id' => $company_id,
                            'deposited_amount' => $amount_received,
                            'payment_id' => $inserted_id,
                            'card_type' => $card_type,
                            'card_number' => $card_number,
                            'expire_date' => $expire_date,
                            'cvv' => $cvv,
                            'from' => 'pos',
                            'user' => $user,
                            'cardholdername' => $this->input->post('cardholder'),
                            'payment_status' => $payment_status
                        );
                        //    $data_payments['all_details'] = $all_details;
                        //    $this->load->view('home/dashboard'); // just the header file
                        //    $this->load->view('paypal/confirmation', $data_payments);
                        //    $this->load->view('home/footer'); // just the header file
                        $this->paypal->paymentPaypal($all_details);
                    } elseif ($gateway == 'Paystack') {


                        $ref = date('Y') . '-' . rand() . date('d') . '-' . date('m');
                        $amount_in_kobo = $amount_received;
                        $this->load->module('paystack');
                        $this->paystack->paystack_standard($amount_in_kobo, $ref, $patient, $inserted_id, $user, '0');

                        // $email=$patient_email;
                    } elseif ($gateway == 'Stripe') {
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv');
                        $token = $this->input->post('token');
                        $stripe = $this->pgateway_model->getPaymentGatewaySettingsByName('Stripe');
                        // $stripe = $this->db->get_where('paymentGateway', array('name =' => 'Stripe','hospital_id', $this->session->userdata('hospital_id')))->row();
                        \Stripe\Stripe::setApiKey($stripe->secret);
                        $charge = \Stripe\Charge::create(array(
                                    "amount" => $amount_received * 100,
                                    "currency" => "usd",
                                    "source" => $token
                        ));
                        $chargeJson = $charge->jsonSerialize();
                        if ($chargeJson['status'] == 'succeeded') {
                            $data1 = array(
                                'date' => $date,
                                'patient' => $patient,
                                'payment_id' => $inserted_id,
                                'company_id' => $company_id,
                                'deposited_amount' => $amount_received,
                                'amount_received_id' => $inserted_id . '.' . 'gp',
                                'gateway' => 'Stripe',
                                'user' => $user,
                                'hospital_id' => $this->session->userdata('hospital_id')
                            );
                            $this->finance_model->insertDeposit($data1);
                            $data_payment = array('amount_received' => $amount_received, 'deposit_type' => $deposit_type);
                            $this->finance_model->updatePayment($inserted_id, $data_payment);
                        } else {
                            $this->session->set_flashdata('error', lang('transaction_failed'));
                        }
                        redirect("finance/invoice?id=" . "$inserted_id");
                    } elseif ($gateway == 'Pay U Money') {
                        redirect("payu/check1?deposited_amount=" . "$amount_received" . '&payment_id=' . $inserted_id);
                    } else {
                        $this->session->set_flashdata('error', lang('payment_failed_no_gateway_selected'));
                        redirect("finance/invoice?id=" . "$inserted_id");
                    }
                } else {
                    $data1 = array(
                        'date' => $date,
                        'patient' => $patient,
                        'company_id' => $company_id,
                        'deposited_amount' => $amount_received,
                        'payment_id' => $inserted_id,
                        'amount_received_id' => $inserted_id . '.' . 'gp',
                        'deposit_type' => $deposit_type,
                        'user' => $user
                    );

                    if (!empty($amount_received)) {
                        $this->finance_model->insertDeposit($data1);
                        $data_payment = array('amount_received' => $amount_received, 'deposit_type' => $deposit_type);
                        $this->finance_model->updatePayment($inserted_id, $data_payment);
                    }

                    $this->session->set_flashdata('success', lang('record_added'));

                    redirect("finance/invoice?id=" . "$invoice_number");
                }
            } else {
                $deposit_edit_amount = $this->input->post('deposit_edit_amount');
                $deposit_edit_id = $this->input->post('deposit_edit_id');
                if (!empty($deposit_edit_amount)) {
                    $deposited_edit = array_combine($deposit_edit_id, $deposit_edit_amount);
                    foreach ($deposited_edit as $key_deposit => $value_deposit) {
                        $data_deposit = array(
                            'company_id' => $company_id,
                            'deposited_amount' => $value_deposit
                        );
                        $this->finance_model->updateDeposit($key_deposit, $data_deposit);
                    }
                }


                $a_r_i = $id . '.' . 'gp';
                $deposit_id = $this->db->get_where('patient_deposit', array('amount_received_id' => $a_r_i))->row();

                $data = array(
                    'category_name' => $category_name,
                    'patient' => $patient,
                    'doctor' => $doctor,
                    'amount' => $sub_total,
                    'discount' => $discount,
                    'flat_discount' => $flat_discount,
                    'gross_total' => $gross_total,
                    'amount_received' => $amount_received,
                    'hospital_amount' => $hospital_amount,
                    'doctor_amount' => $doctor_amount,
                    'user' => $user,
                    'patient_name' => $patient_details->name,
                    'patient_phone' => $patient_details->phone,
                    'patient_address' => $patient_details->address,
                    'doctor_name' => $doctor_details->name,
                    'remarks' => $remarks,
                    'last_modified' => $today_date_time,
                    'completion_status' => $completion_status,
                    'company_id' => $company_id,
                    'payment_status' => $payment_status
                );

                // if (!empty($deposit_id->id)) {
                //     $data1 = array(
                //         'date' => $date,
                //         'patient' => $patient,
                //         'payment_id' => $id,
                //         'company_id' => $company_id,
                //         'deposited_amount' => $amount_received,
                //         'user' => $user
                //     );
                //     $this->finance_model->updateDeposit($deposit_id->id, $data1);
                // } else {
                //     $data1 = array(
                //         'date' => $date,
                //         'patient' => $patient,
                //         'payment_id' => $id,
                //         'company_id' => $company_id,
                //         'deposited_amount' => $amount_received,
                //         'amount_received_id' => $id . '.' . 'gp',
                //         'user' => $user
                //     );
                //     $this->finance_model->insertDeposit($data1);
                // }
                $invoice_number = $this->finance_model->getPaymentById($id)->invoice_number;
                $this->finance_model->updatePayment($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
                redirect("finance/invoice?id=" . "$invoice_number");
            }
        }
    }

    function editPayment() {
        if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Clerk'))) {
            $data = array();
            $data['discount_type'] = $this->finance_model->getDiscountType();
            $data['settings'] = $this->settings_model->getSettings();
            $data['categories'] = $this->finance_model->getPaymentCategoryByServiceGroup();
            // $data['patients'] = $this->patient_model->getPatient();
            //  $data['doctors'] = $this->doctor_model->getDoctor();
            $invoice_number = $this->input->get('finance_id');
            $id = $this->input->get('id');
            $finance_id = $this->finance_model->getPaymentByFinanceNumber($invoice_number)->id;

            if (!empty($id)) {
                $payment_details = $this->finance_model->getPaymentById($finance_id);
                if ($payment_details->hospital_id != $this->session->userdata('hospital_id')) {
                    redirect('home/permission');
                }
            }

            $data['encounter'] = $this->encounter_model->getEncounterById($id);
            $data['staffs'] = $this->encounter_model->getUser();
            $data['payment'] = $this->finance_model->getPaymentById($finance_id);
            // $data['patients'] = $this->patient_model->getPatientById($data['payment']->patient);
            // $data['doctors'] = $this->doctor_model->getDoctorById($data['payment']->doctor);
            $data['encounters'] = $this->encounter_model->getEncounter();
            $data['patients'] = $this->patient_model->getPatient();
            $data['doctors'] = $this->doctor_model->getDoctor();
            $data['companies'] = $this->company_model->getCompany();
            $data['company'] = $this->company_model->getCompanyById($data['payment']->company_id);

            $charges = $this->finance_model->getChargesWithCopay();

            $charges_with_copay = [];
            $charges_without_copay = [];

            foreach($charges as $charge) {
                if ($charge->total >= 2) {
                    $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                    // foreach($charges_copay_lists as $charges_copay_list) {
                    //     $charges_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                    // }
                    $charges_with_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_lists[0]->id);
                }
            }

            foreach($charges as $charge) {
                if ($charge->total <= 1) {
                    $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                    foreach($charges_copay_lists as $charges_copay_list) {
                        $charges_without_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                    }
                }
            }

            $data['charges_with_copay'] = $charges_with_copay;
            $data['charges_without_copay'] = $charges_without_copay;
            $data['invoice_items'] = $this->finance_model->getInvoiceItemsByPaymentId($data['payment']->id);

            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('add_payment_viewv2', $data);
            // $this->load->view('home/footer'); // just the footer file
        } else {
            redirect('home/permission');
        }
    }

    function editInvoiceGroup() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Clerk'))) {
            redirect('home/permission');
        }
        $data = array();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->finance_model->getPaymentCategoryByServiceGroup();
        $invoice_group_id = $this->input->get('invoice_group_id');
        $id = $this->input->get('id');
        $data['invoice_details'] = $this->finance_model->getInvoiceByGroupNumber($invoice_group_id);
        // $something = $invoice_details[0]->id;
        $finance_id = $this->finance_model->getPaymentByFinanceNumber($data['invoice_details'][0]->invoice_number)->id;


        $data['invoice_group_id'] = $invoice_group_id;
        $data['encounter'] = $this->encounter_model->getEncounterById($id);
        $data['staffs'] = $this->encounter_model->getUser();
        $data['payment'] = $this->finance_model->getPaymentById($finance_id);
        $data['encounters'] = $this->encounter_model->getEncounter();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['companies'] = $this->company_model->getCompany();

        $charges = $this->finance_model->getChargesWithCopay();

        $charges_with_copay = [];
        $charges_without_copay = [];

        foreach($charges as $charge) {
            if ($charge->total >= 2) {
                $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                // foreach($charges_copay_lists as $charges_copay_list) {
                //     $charges_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                // }
                if (!empty($charges_copay_lists)) {
                    $charges_with_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_lists[0]->id);
                }
            }
        }

        foreach($charges as $charge) {
            if ($charge->total <= 1) {
                $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                foreach($charges_copay_lists as $charges_copay_list) {
                    $charges_without_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                }
            }
        }

        $data['charges_with_copay'] = $charges_with_copay;
        $data['charges_without_copay'] = $charges_without_copay;
        $data['invoice_items'] = $this->finance_model->getInvoiceItemsByPaymentId($data['payment']->id);
        $invoice_item_group = [];
        foreach($data['invoice_items'] as $invoice_items) {
            $invoice_item_group[] = $this->finance_model->getPaymentCategoryById($invoice_items->charge_id)->group_id;
        }
        $data['invoice_item_group'] = $invoice_item_group;

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_payment_viewv2', $data);
    }

    function editInvoicesByInvoiceGroupIdByJson() {
        $group = $this->input->get('group');
        $settings = $this->settings_model->getSettings();
        $invoices = $this->finance_model->getInvoiceByGroupNumber($group);

        $data['discount'] = $this->finance_model->getDiscount();

        $new_invoices = [];

        foreach($invoices as $invoice) {
            $invoice_items = $this->finance_model->getInvoiceItemsByPaymentId($invoice->id);
            $company_details = $this->company_model->getCompanyById($invoice->company_id);
            $items = [];
            $total_tax_amount = [];
            $discount_detail = $this->finance_model->getDiscountById($invoice->discount_id);

            if ($settings->is_display_prices_with_tax_included == "1") {
                $gross_total = $invoice->gross_total;
            } else {
                $gross_total = $invoice->total_without_tax;
            }

            foreach($invoice_items as $invoice_item) {
                $charge_details = $this->finance_model->getPaymentCategoryById($invoice_item->charge_id);
                $tax_details = $this->finance_model->getTaxById($invoice_item->tax_id);
                // if ($settings->is_display_prices_with_tax_included == 1) {
                //     $tax_amount = (($tax_details->rate/100)*$invoice_item->item_total_price)*$invoice_item->quantity;
                // } elseif ($settings->is_display_prices_with_tax_included == 0) {
                //     $tax_amount = (($tax_details->rate/100)*$invoice_item->price_without_tax)*$invoice_item->quantity;
                // }
                if ($settings->is_display_prices_with_tax_included == "1") {
                    $tax_amount = ((($tax_details->rate/100)/(($tax_details->rate/100)+1))*$invoice_item->price)*$invoice_item->quantity;
                } else {
                    $tax_amount = ((($tax_details->rate/100)/(($tax_details->rate/100)+1))*$invoice_item->price_without_tax)*$invoice_item->quantity;
                }
                
                $item_total = $invoice_item->price * $invoice_item->quantity;

                $total_tax_amount[] = $tax_amount;
                $items[] = array(
                    'id' => $invoice_item->id,
                    'charge_id' => $invoice_item->charge_id,
                    'description' => $invoice_item->description,
                    'c_price' => $invoice_item->price,
                    'item_total' => $item_total,
                    'tax_id' => $invoice_item->tax_id,
                    'tax_amount' => $tax_amount,
                    'tax_percentage' => $tax_details->rate,
                    'quantity' => $invoice_item->quantity,
                    'remarks' => $invoice->remarks,
                    'charge_type' => $charge_details->type,
                    'charge_group_id' => $charge_details->group_id,
                    'fixed_limit' => $charge_details->copay_share_fixed,
                    'percentage_limit' => $charge_details->copay_share_percentage,
                );
            }

            $total_tax_amount = array_sum($total_tax_amount);

            $new_invoices[$invoice->company_id] = array(
                'items' => $items,
                'company' => array(
                    'name' => $company_details->display_name,
                ),
                'discount' => array(
                    'id' => $invoice->discount_id,
                    'amount' => $invoice->discount,
                    'discount_type' => $discount_detail->discount_type_id,
                    'discount_data' => $discount_detail,
                ),
                'total' => array(
                    'subtotal' => $invoice->amount,
                    'tax' => $total_tax_amount,
                    'gross_total' => $gross_total,
                ),
                'received' => $invoice->amount_received,
            );
        }

        $data['invoices'] = $new_invoices;

        echo json_encode($data);

    }

    function editPaymentByJson() {
        $id = $this->input->get('id');

        $data['invoice_details'] = $this->finance_model->getPaymentById($id);
        $data['invoice_item_list'] = $this->finance_model->getInvoiceItemsByPaymentId($data['invoice_details']->id);

        echo json_encode($data);
    }

    function delete() {
        if ($this->ion_auth->in_group(array('admin'))) {
            $id = $this->input->get('id');

            if (!empty($id)) {
                $payment_details = $this->finance_model->getPaymentById($id);
                if ($payment_details->hospital_id != $this->session->userdata('hospital_id')) {
                    redirect('home/permission');
                }
            }

            $this->finance_model->deletePayment($id);
            $this->finance_model->deleteDepositByInvoiceId($id);
            $this->session->set_flashdata('success', lang('record_deleted'));
            redirect('finance/invoices');
        } else {
            redirect('home/permission');
        }
    }

    function deleteInvoice() {
        if ($this->ion_auth->in_group(array('admin'))) {
            $id = $this->input->get('id');

            if (!empty($id)) {
                $payment_details = $this->finance_model->getInvoiceByGroupNumber($id);
                foreach($payment_details as $payment_detail) {
                    if ($payment_detail->hospital_id != $this->session->userdata('hospital_id')) {
                        redirect('home/permission');
                    }

                    $invoice_data = array(
                        'deleted' => 1,
                    );

                    $this->finance_model->deleteInvoice($payment_detail->id, $invoice_data);

                    $invoice_items = $this->finance_model->getInvoiceItemsByPaymentId($payment_detail->id);

                    foreach($invoice_items as $invoice_item) {
                        $invoice_item_data = array(
                            'deleted' => 1,
                        );

                        $this->finance_model->updateInvoiceItemDeleteStatus($invoice_item->id, $invoice_item_data);

                    }

                }
            }

            $this->session->set_flashdata('success', lang('record_deleted'));
            redirect('finance/invoices');
        } else {
            redirect('home/permission');
        }
    }

    public function otPayment() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['ot_payments'] = $this->finance_model->getOtPayment();

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('ot_payment', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addOtPaymentView() {
        $data = array();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->finance_model->getPaymentCategory();
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_ot_payment', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addOtPayment() {
        $id = $this->input->post('id');
        $patient = $this->input->post('patient');
        $doctor_c_s = $this->input->post('doctor_c_s');
        $doctor_a_s_1 = $this->input->post('doctor_a_s_1');
        $doctor_a_s_2 = $this->input->post('doctor_a_s_2');
        $doctor_anaes = $this->input->post('doctor_anaes');
        $n_o_o = $this->input->post('n_o_o');

        $c_s_f = $this->input->post('c_s_f');
        $a_s_f_1 = $this->input->post('a_s_f_1');
        $a_s_f_2 = $this->input->post('a_s_f_2');
        $anaes_f = $this->input->post('anaes_f');
        $ot_charge = $this->input->post('ot_charge');
        $cab_rent = $this->input->post('cab_rent');
        $seat_rent = $this->input->post('seat_rent');
        $others = $this->input->post('others');

        $discount = $this->input->post('discount');
        $vat = $this->input->post('vat');
        $amount_received = $this->input->post('amount_received');

        $date = time();
        $user = $this->ion_auth->get_user_id();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

// Validating Patient Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[2]|max_length[100]|xss_clean');
// Validating Consultant surgeon Field
        $this->form_validation->set_rules('doctor_c_s', 'Consultant surgeon', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Assistant Surgeon Field
        $this->form_validation->set_rules('doctor_a_s_1', 'Assistant Surgeon (1)', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Assistant Surgeon Field
        $this->form_validation->set_rules('doctor_a_s_2', 'Assistant Surgeon(2)', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Anaesthisist Field
        $this->form_validation->set_rules('doctor_anaes', 'Anaesthisist', 'trim|min_length[2]|max_length[100]|xss_clean');
// Validating Nature Of Operation Field
        $this->form_validation->set_rules('n_o_o', 'Nature Of Operation', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Consultant Surgeon Fee Field
        $this->form_validation->set_rules('c_s_f', 'Consultant Surgeon Fee', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Assistant surgeon fee Field
        $this->form_validation->set_rules('a_s_f_1', 'Assistant surgeon fee', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Assistant surgeon fee Field
        $this->form_validation->set_rules('a_s_f_2', 'Assistant surgeon fee', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Anaesthesist Field
        $this->form_validation->set_rules('anaes_f', 'Anaesthesist', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating OT Charge Field
        $this->form_validation->set_rules('ot_charge', 'OT Charge', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Cabin Rent Field
        $this->form_validation->set_rules('cab_rent', 'Cabin Rent', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Seat Rent Field
        $this->form_validation->set_rules('seat_rent', 'Seat Rent', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Others Field
        $this->form_validation->set_rules('others', 'Others', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Discount Field
        $this->form_validation->set_rules('discount', 'Discount', 'trim|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo 'form validate noe nai re';
// redirect('accountant/add_new'); 
        } else {
            $doctor_fees = $c_s_f + $a_s_f_1 + $a_s_f_2 + $anaes_f;
            $hospital_fees = $ot_charge + $cab_rent + $seat_rent + $others;
            $amount = $doctor_fees + $hospital_fees;
            $discount_type = $this->finance_model->getDiscountType();

            if ($discount_type == 'flat') {
                $amount_with_discount = $amount - $discount;
                $gross_total = $amount_with_discount + $amount_with_discount * ($vat / 100);
                $flat_discount = $discount;
                $flat_vat = $amount_with_discount * ($vat / 100);
                $hospital_fees = $hospital_fees - $flat_discount;
            } else {
                $flat_discount = $amount * ($discount / 100);
                $amount_with_discount = $amount - $amount * ($discount / 100);
                $gross_total = $amount_with_discount + $amount_with_discount * ($vat / 100);
                $discount = $discount . '*' . $amount * ($discount / 100);
                $flat_vat = $amount_with_discount * ($vat / 100);
                $hospital_fees = $hospital_fees - $flat_discount;
            }

            $data = array();


            if (empty($id)) {
                $data = array(
                    'patient' => $patient,
                    'doctor_c_s' => $doctor_c_s,
                    'doctor_a_s_1' => $doctor_a_s_1,
                    'doctor_a_s_2' => $doctor_a_s_2,
                    'doctor_anaes' => $doctor_anaes,
                    'n_o_o' => $n_o_o,
                    'c_s_f' => $c_s_f,
                    'a_s_f_1' => $a_s_f_1,
                    'a_s_f_2' => $a_s_f_2,
                    'anaes_f' => $anaes_f,
                    'ot_charge' => $ot_charge,
                    'cab_rent' => $cab_rent,
                    'seat_rent' => $seat_rent,
                    'others' => $others,
                    'discount' => $discount,
                    'date' => $date,
                    'amount' => $amount,
                    'doctor_fees' => $doctor_fees,
                    'hospital_fees' => $hospital_fees,
                    'gross_total' => $gross_total,
                    'flat_discount' => $flat_discount,
                    'amount_received' => $amount_received,
                    'status' => 'unpaid',
                    'user' => $user
                );
                $this->finance_model->insertOtPayment($data);
                $inserted_id = $this->db->insert_id();
                $data1 = array(
                    'date' => $date,
                    'patient' => $patient,
                    'deposited_amount' => $amount_received,
                    'amount_received_id' => $inserted_id . '.' . 'ot',
                    'user' => $user
                );
                $this->finance_model->insertDeposit($data1);

                $this->session->set_flashdata('success', lang('record_added'));
                redirect("finance/otInvoice?id=" . "$inserted_id");
            } else {
                $a_r_i = $id . '.' . 'ot';
                $deposit_id = $this->db->get_where('patient_deposit', array('amount_received_id' => $a_r_i))->row()->id;
                $data = array(
                    'patient' => $patient,
                    'doctor_c_s' => $doctor_c_s,
                    'doctor_a_s_1' => $doctor_a_s_1,
                    'doctor_a_s_2' => $doctor_a_s_2,
                    'doctor_anaes' => $doctor_anaes,
                    'n_o_o' => $n_o_o,
                    'c_s_f' => $c_s_f,
                    'a_s_f_1' => $a_s_f_1,
                    'a_s_f_2' => $a_s_f_2,
                    'anaes_f' => $anaes_f,
                    'ot_charge' => $ot_charge,
                    'cab_rent' => $cab_rent,
                    'seat_rent' => $seat_rent,
                    'others' => $others,
                    'discount' => $discount,
                    'amount' => $amount,
                    'doctor_fees' => $doctor_fees,
                    'hospital_fees' => $hospital_fees,
                    'gross_total' => $gross_total,
                    'flat_discount' => $flat_discount,
                    'amount_received' => $amount_received,
                    'user' => $user
                );
                $data1 = array(
                    'date' => $date,
                    'patient' => $patient,
                    'deposited_amount' => $amount_received,
                    'user' => $user
                );
                $this->finance_model->updateDeposit($deposit_id, $data1);
                $this->finance_model->updateOtPayment($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
                redirect("finance/otInvoice?id=" . "$id");
            }
        }
    }

    function editOtPayment() {
        if ($this->ion_auth->in_group(array('admin', 'Accountant'))) {
            $data = array();
            $data['discount_type'] = $this->finance_model->getDiscountType();
            $data['settings'] = $this->settings_model->getSettings();
            $data['patients'] = $this->patient_model->getPatient();
            $id = $this->input->get('id');
            $data['ot_payment'] = $this->finance_model->getOtPaymentById($id);
            $data['doctors'] = $this->doctor_model->getDoctor();
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_ot_payment', $data);
            $this->load->view('home/footer'); // just the footer file
        }
    }

    function otInvoice() {
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['ot_payment'] = $this->finance_model->getOtPaymentById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('ot_invoice', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function otPaymentDetails() {
        $id = $this->input->get('id');
        $patient = $this->input->get('patient');
        $data['patient'] = $this->patient_model->getPatientByid($patient);
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['ot_payment'] = $this->finance_model->getOtPaymentById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('ot_payment_details', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function otPaymentDelete() {
        if ($this->ion_auth->in_group(array('admin', 'Accountant'))) {
            $id = $this->input->get('id');
            $this->finance_model->deleteOtPayment($id);
            $this->session->set_flashdata('success', lang('record_deleted'));
            redirect('finance/otPayment');
        }
    }

    function addPaymentByPatient() {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('choose_payment_type', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function addPaymentByPatientView() {
        $id = $this->input->get('id');
        $type = $this->input->get('type');
        $data = array();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->finance_model->getPaymentCategory();
        $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);
        $data['doctors'] = $this->doctor_model->getDoctor();

        $data['patient'] = $this->patient_model->getPatientById($id);
        if ($type == 'gen') {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_payment_view_single', $data);
            $this->load->view('home/footer'); // just the footer fi
        } else {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_ot_payment_view_single', $data);
            $this->load->view('home/footer'); // just the footer fi
        }
    }

    public function paymentCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist', 'Clerk'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['categories'] = $this->finance_model->getPaymentCategory();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('payment_categoryv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addPaymentCategoryView() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Clerk'))) {
            redirect('home/permission');
        }
        $hospital_id = $this->session->userdata('hospital_id');
        $provider_country = $this->settings_model->getSettingsByHospitalId($hospital_id)->country_id;
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->finance_model->getServiceCategory();
        $data['payer_accounts'] = $this->company_model->getCompanyWithoutAddNewOption(null, $provider_country);
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_payment_categoryv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addPaymentCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Clerk'))) {
            redirect('home/permission');
        }
        $id = $this->input->post('id');
        $service_type = $this->input->post('service_type');
        $name = $this->input->post('name');
        $category_id = $this->input->post('category_id');
        $description = $this->input->post('description');
        $c_price = $this->input->post('c_price');
        $d_commission = $this->input->post('d_commission');
        $s_commission = $this->input->post('s_commission');
        $staff = $this->input->post('staffs');
        $company = $this->input->post('company');
        $type = $this->input->post('price_type');
        $tax = $this->input->post('tax');
        $price_includes_tax = $this->input->post('is_taxable');
        $co_payer_limit_amount = $this->input->post('co_payer_limit_amount');
        $co_payer_payment_limit_type = $this->input->post('co_payer_payment_limit_type');
        $deleted_company = $this->input->post('deleted_company');
        $charge_copayer = $this->input->post('charge_copayer');
        $redirect = $this->input->post('redirect');

        $non_duplicate_deleted_company = implode(',', array_keys(array_flip(explode(',', $deleted_company))));

        if (empty($d_commission)) {
            $d_commission = 0;
        }

        if (empty($s_commission)) {
            $s_commission = 0;
        }

        if ($staff == "") {
            $staff = null;
        }

        if ($staff == 0) {
            $staff = null;
        }

        $group = $this->ion_auth->get_users_groups($staff)->row()->name;

        if (empty($c_price)) {
            $c_price = 0;
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
// Validating Category Name Field
        $this->form_validation->set_rules('name', 'Service Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Description Field
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Description Field
        // $this->form_validation->set_rules('c_price', 'Price', 'trim|min_length[1]|required|numeric|max_length[100]|xss_clean');
// Validating Doctor Commission Rate Field
        $this->form_validation->set_rules('d_commission', 'Doctor Commission rate', 'trim|numeric|min_length[1]|max_length[100]|xss_clean');
// Validating Service Category Name Field
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required|min_length[1]|max_length[100]|xss_clean');        

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                // $id = $this->input->get('id');
                $data['service'] = $this->finance_model->getPaymentCategoryById($id);
                $data['categories'] = $this->finance_model->getServiceCategory();
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_payment_categoryv2', $data);
                // $this->load->view('home/footer'); // just the footer file
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $data['categories'] = $this->finance_model->getServiceCategory();
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_payment_categoryv2', $data);
                // $this->load->view('home/footer'); // just the header file
            }
        } else {
            $data = array();
            $data2 = array();
            $data = array('category' => $name,
                'description' => $description,
                'category_id' => $category_id,
                'd_commission' => $d_commission,
                'staff_commission' => $s_commission,
                'service_category_group_id' => $service_type,
                'applicable_staff_id' => $staff,
                'deleted' => null
            );

            if ($group == "Doctor") {
                $doctor_details = $this->doctor_model->getDoctorByIonUserId($staff);
                if ($service_type == 9) {
                    $doctor_data = array(
                        'physical_consultation_fee' => $c_price
                    );
                } elseif ($service_type == 10) {
                    $doctor_data = array(
                        'virtual_consultation_fee' => $c_price
                    );
                }
            }

            if (empty($id)) {
                if ($group == "Doctor") {
                    if ($service_type == 9) {
                        $this->doctor_model->updateDoctor($doctor_details->id, $doctor_data);
                    } elseif ($service_type == 10) {
                        $this->doctor_model->updateDoctor($doctor_details->id, $doctor_data);
                    }
                }

                $data2 = array();
                $data1 = array();
                $data3 = array();
                $co_payer_data = array();

                foreach($company as $key => $value) {

                    $category_name = $this->finance_model->getServiceCategoryById($category_id)->category;
                    $category_f_letter = $category_name[0];
                    $charge_code = count($this->finance_model->getChargeCount());
                    $charge_increment = $charge_code+=1;
                    $charge_code_final = $category_f_letter . format_number_with_digits($charge_increment, 4);

                    if ($tax[$key] == "0") {
                        $tax[$key] = null;
                        $price_includes_tax[$key] = null;
                    }

                    if (!empty($c_price[$key])) {
                        $tax_details = $this->finance_model->getTaxById($tax[$key]);
                        // $tax_amount = ($c_price[$key]*($tax_details->rate/100));
                        $tax_amount_rate = ($tax_details->rate+100)/100;

                        if ($price_includes_tax[$key] == 1) {
                            $c_price_without_tax = $c_price[$key]/$tax_amount_rate;
                            $tax_amount = $c_price_without_tax*($tax_details->rate/100);
                            $c_price_result = $c_price[$key];
                        } else {
                            $c_price_without_tax = $c_price[$key];
                            $tax_amount = $c_price_without_tax*($tax_details->rate/100);
                            $c_price_result = $c_price_without_tax + $tax_amount;
                        }
                    } else {
                        $c_price_without_tax = null;
                        $tax_amount = null;
                        $c_price_result = null;
                    }

                    if ($type[$key] == "fixed") {
                        $co_payer_limit_amount[$key] = $c_price_result;
                        if ($co_payer_payment_limit_type[$key] == "percentage") {
                            $co_payer_data[$value] = array(
                                'copay_share_fixed' => $co_payer_limit_amount[$key],
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        } elseif ($co_payer_payment_limit_type[$key] == "fixed") {
                            $co_payer_data[$value] = array(
                                'copay_share_fixed' => $co_payer_limit_amount[$key],
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        }
                    } elseif ($type[$key] == "variable") {
                        if ($co_payer_payment_limit_type[$key] == "percentage") {
                            $co_payer_data[$value] = array(
                                'copay_share_percentage' => $co_payer_limit_amount[$key],
                                'copay_share_fixed' => null,
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        } elseif ($co_payer_payment_limit_type[$key] == "fixed") {
                            $co_payer_data[$value] = array(
                                'copay_share_fixed' => $co_payer_limit_amount[$key],
                                'copay_share_percentage' => null,
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        }
                    }

                    $data1[$value] = array(
                        'payer_account_id' => $value,
                        'charge_code' => $charge_code_final,
                    );

                    $data2 = array_merge($data, $data1[$value]);

                    $data3 = array_merge($data2, $co_payer_data[$value]);

                    $this->finance_model->insertPaymentCategory($data3);

                    if ($charge_copayer == "yes") {
                        if (empty($inserted_id)) {
                            $inserted_id = $this->db->insert_id();
                            $group_id_data = array('group_id'=>$inserted_id);
                            $this->finance_model->updatePaymentCategory($inserted_id, $group_id_data);
                        } else {
                            $added_id = $this->db->insert_id();
                            $group_id_data = array('group_id'=>$inserted_id);
                            $this->finance_model->updatePaymentCategory($added_id, $group_id_data);
                        }
                    } else {
                        $inserted_id = $this->db->insert_id();
                        $group_id_data = array('group_id'=>$inserted_id);
                        $this->finance_model->updatePaymentCategory($inserted_id, $group_id_data);
                    }

                }

                $this->session->set_flashdata('success', lang('record_added'));
            } else {
                $service_details = $this->finance_model->getPaymentCategoryByGroupId($id);
                $service_payer_account = [];

                if ($group == "Doctor") {
                    $this->doctor_model->updateDoctor($doctor_details->id, $doctor_data);
                    if ($service_type == 9) {
                        $this->doctor_model->updateDoctor($doctor_details->id, $doctor_data);
                    } elseif ($service_type == 10) {
                        $this->doctor_model->updateDoctor($doctor_details->id, $doctor_data);
                    }
                }

                foreach($service_details as $service_detail) {
                    $service_payer_account[] = $service_detail->payer_account_id;
                }

                $deleted_items = explode(',', $non_duplicate_deleted_company);

                foreach($deleted_items as $deleted_item) {
                    $deleted_item_details = $this->finance_model->getPaymentCategoryByGroupIdByPayerId($id, $deleted_item);
                    $delete_data = array(
                        'deleted' => 1,
                    );
                    $this->finance_model->updatePaymentCategory($deleted_item_details->id, $delete_data);
                }

                // if ($service_payer_account > $company) {
                //     $deleted = array_diff($service_payer_account, $company);
                // } elseif ($service_payer_account < $company) {
                //     $deleted = array_diff($company, $service_payer_account);
                // }

                // foreach($deleted as $deleted_item) {
                //     $deleted_item_details = $this->finance_model->getPaymentCategoryByGroupIdByPayerId($id, $deleted_item);
                //     if (!empty($deleted_item_details)) {
                //         if ($deleted_item_details->deleted == 1) {
                //             $delete_data = array(
                //                 'deleted' => null,
                //             );
                //             // $this->finance_model->updatePaymentCategory($deleted_item_details->id, $delete_data);
                //         } else {
                //             $delete_data = array(
                //                 'deleted' => 1,
                //             );
                //             // $this->finance_model->updatePaymentCategory($deleted_item_details->id, $delete_data);
                //         }
                //     }
                // }

                foreach($company as $key => $value) {
                    $category_name = $this->finance_model->getServiceCategoryById($category_id)->category;
                    $category_f_letter = $category_name[0];
                    $charge_code = count($this->finance_model->getChargeCount());
                    $charge_increment = $charge_code+=1;
                    $charge_code_final = $category_f_letter . format_number_with_digits($charge_increment, 4);

                    if ($tax[$key] == "0") {
                        $tax[$key] = null;
                    }

                    if (!empty($c_price[$key])) {
                        $tax_details = $this->finance_model->getTaxById($tax[$key]);
                        // $tax_amount = ($c_price[$key]*($tax_details->rate/100));
                        $tax_amount_rate = ($tax_details->rate+100)/100;

                        if ($price_includes_tax[$key] == 1) {
                            $c_price_without_tax = $c_price[$key]/$tax_amount_rate;
                            $tax_amount = $c_price_without_tax*($tax_details->rate/100);
                            $c_price_result = $c_price[$key];
                        } else {
                            $c_price_without_tax = $c_price[$key];
                            $tax_amount = $c_price_without_tax*($tax_details->rate/100);
                            $c_price_result = $c_price_without_tax + $tax_amount;
                        }
                    } else {
                        $c_price_without_tax = null;
                        $tax_amount = null;
                        $c_price_result = null;
                    }

                    if ($type[$key] == "fixed") {
                        $co_payer_limit_amount[$key] = $c_price_result;
                        if ($co_payer_payment_limit_type[$key] == "percentage") {
                            $co_payer_data[$value] = array(
                                'copay_share_fixed' => $co_payer_limit_amount[$key],
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        } elseif ($co_payer_payment_limit_type[$key] == "fixed") {
                            $co_payer_data[$value] = array(
                                'copay_share_fixed' => $co_payer_limit_amount[$key],
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        }
                    } elseif ($type[$key] == "variable") {
                        if ($co_payer_payment_limit_type[$key] == "percentage") {
                            $co_payer_data[$value] = array(
                                'copay_share_percentage' => $co_payer_limit_amount[$key],
                                'copay_share_fixed' => null,
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        } elseif ($co_payer_payment_limit_type[$key] == "fixed") {
                            $co_payer_data[$value] = array(
                                'copay_share_fixed' => $co_payer_limit_amount[$key],
                                'copay_share_percentage' => null,
                                'c_price' => $c_price_result,
                                'c_price_without_tax' => $c_price_without_tax,
                                'tax_amount' => $tax_amount,
                                'type' => $type[$key],
                                'tax_id' => $tax[$key],
                                'is_price_includes_tax' => $price_includes_tax[$key],
                            );
                        }
                    }

                    $data2 = array_merge($data, $co_payer_data[$value]);

                    $payer_id = $this->finance_model->getPaymentCategoryByGroupIdByPayerId($id, $company[$key]);

                    if ($charge_copayer == "yes") {
                        if(!empty($payer_id)) {
                            $this->finance_model->updatePaymentCategory($payer_id->id, $data2);
                        } else {
                            $group_id_data = array(
                                'group_id'=>$id,
                                'payer_account_id'=>$company[$key],
                                'charge_code' => $charge_code_final,
                            );
                            $data3 = array_merge($data2, $group_id_data);
                            $this->finance_model->insertPaymentCategory($data3);
                        }
                    } else {
                        if(!empty($payer_id)) {
                            $this->finance_model->updatePaymentCategory($payer_id->id, $data2);
                        } else {
                            $group_id_data = array(
                                'payer_account_id'=>$company[$key],
                                'charge_code' => $charge_code_final,
                            );
                            $data3 = array_merge($data2, $group_id_data);
                            $this->finance_model->insertPaymentCategory($data3);
                            $inserted_id = $this->db->insert_id();
                            $group_id_data = array('group_id'=>$inserted_id);
                            $this->finance_model->updatePaymentCategory($inserted_id, $group_id_data);
                        }
                    }
                    
                }

                // $this->finance_model->updatePaymentCategory($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }

            if (!empty($redirect)) {
                redirect($redirect);
            } else {
                redirect('finance/chargeGroupList');
            }

        }
    }

    function editPaymentCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Clerk'))) {
            redirect('home/permission');
        }
        $data = array();
        $group_id = $this->input->get('group_id');
        $charge_id = $this->input->get('charge_id');

        if (!empty($charge_id)) {
            $data['redirect'] = 'finance/paymentCategory';
        }

        $hospital_id = $this->session->userdata('hospital_id');
        $provider_country = $this->settings_model->getSettingsByHospitalId($hospital_id)->country_id;
        $data['payer_accounts'] = $this->company_model->getCompanyWithoutAddNewOption(null, $provider_country);
        $data['service'] = $this->finance_model->getPaymentCategoryByGroupId($group_id);
        $data['categories'] = $this->finance_model->getServiceCategory();
        $data['settings'] = $this->settings_model->getSettings();
        $data['taxes'] = $this->finance_model->getTax();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_payment_categoryv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editPaymentCategoryByJson() {
        $group = $this->input->get('group');

        $services = $this->finance_model->getPaymentCategoryByGroupId($group);
        $company = [];
        $tax = [];
        // $data['tax'] = $this->finance_model->getTax();
        foreach($services as $service) {
            $company[] = $this->company_model->getCompanyById($service->payer_account_id);
            if (empty($service->tax_id)) {
                $tax[] = array(
                    'id' => '0',
                    'name' => 'None',
                );
            } else {
                $tax[] = $this->finance_model->getTaxById($service->tax_id);
            }
        }

        $data['tax'] = $tax;
        $data['company'] = $company;
        $data['service'] = $services;

        // $data['company'] = $this->company_model->getCompanyById($id);

        echo json_encode($data);
    }

    function deletePaymentCategory() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $id = $this->input->get('id');
        $this->finance_model->deletePaymentCategory($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('finance/paymentCategory');
    }

    function deleteCharge() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $id = $this->input->get('id');
        $data = array();
        $data = array(
            'deleted' => 1,
        );
        $this->finance_model->deleteCharge($id, $data);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('finance/paymentCategory');
    }

    public function expense() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist', 'Clerk'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['expense'] = $this->finance_model->getExpense();

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('expensev2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addExpenseView() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Clerk', 'Doctor'))) {
            redirect('home/permission');
        }
        $data = array();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->finance_model->getExpenseCategory();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_expense_viewv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addExpense() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Clerk', 'Doctor'))) {
            redirect('home/permission');
        }
        $id = $this->input->post('id');
        $expense_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('expense_date')));
        $date = gmdate('Y-m-d H:i:s');
        $category = $this->input->post('category');
        $amount = $this->input->post('amount');
        $user = $this->ion_auth->get_user_id();
        $note = $this->input->post('note');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

// Validating Category Field
        $this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Generic Name Field
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|min_length[1]|max_length[100]|xss_clean');
// Validating Note Field
        $this->form_validation->set_rules('note', 'Note', 'trim|min_length[1]|max_length[1000]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                redirect('finance/editExpense?id=' . $id);
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $data['settings'] = $this->settings_model->getSettings();
                $data['categories'] = $this->finance_model->getExpenseCategory();
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_expense_viewv2', $data);
                // $this->load->view('home/footer'); // just the header file
            }
        } else {
            $data = array();
            if (empty($id)) {
                $data = array(
                    'category_id' => $category,
                    'date' => $date,
                    'datestring' => date('d/m/y', $date),
                    'amount' => $amount,
                    'note' => $note,
                    'user' => $user,
                    'expense_date' => $expense_date,
                    'created_at' => $date,
                );
            } else {
                $data = array(
                    'category_id' => $category,
                    'amount' => $amount,
                    'note' => $note,
                    'user' => $user,
                    'expense_date' => $expense_date,
                    'last_modified' => $date,
                );
            }
            if (empty($id)) {
                $this->finance_model->insertExpense($data);
                $this->session->set_flashdata('success', lang('record_added'));
            } else {
                $this->finance_model->updateExpense($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            redirect('finance/expense');
        }
    }

    function editExpense() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Clerk', 'Doctor'))) {
            redirect('home/permission');
        }
        $data = array();
        $data['categories'] = $this->finance_model->getExpenseCategory();
        $data['settings'] = $this->settings_model->getSettings();
        $id = $this->input->get('id');

        if (!empty($id)) {
            $expense_details = $this->finance_model->getExpenseById($id);
            if ($expense_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $data['expense'] = $this->finance_model->getExpenseById($id);
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_expense_viewv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function deleteExpense() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $id = $this->input->get('id');

        if (!empty($id)) {
            $expense_details = $this->finance_model->getExpenseById($id);
            if ($expense_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $this->session->set_flashdata('success', lang('record_deleted'));
        $this->finance_model->deleteExpense($id);
        redirect('finance/expense');
    }

    public function expenseCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist', 'Clerk'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['categories'] = $this->finance_model->getExpenseCategory();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('expense_categoryv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addExpenseCategoryView() {
        if (!$this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant', 'Clerk', 'Doctor'))) {
            redirect('home/permission');
        }
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_expense_categoryv2');
        // $this->load->view('home/footer'); // just the header file
    }

    public function addExpenseCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant', 'Clerk', 'Doctor'))) {
            redirect('home/permission');
        }

        $id = $this->input->post('id');
        $category = $this->input->post('category');
        $description = $this->input->post('description');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
// Validating Category Name Field
        $this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Description Field
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                redirect('finance/editExpenseCategory?id=' . $id);
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_expense_categoryv2', $data);
                // $this->load->view('home/footer'); // just the header file
            }
        } else {
            $data = array();
            $data = array('category' => $category,
                'description' => $description
            );
            if (empty($id)) {
                $this->finance_model->insertExpenseCategory($data);
                $this->session->set_flashdata('success', lang('record_added'));
            } else {
                $this->finance_model->updateExpenseCategory($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            redirect('finance/expenseCategory');
        }
    }

    function editExpenseCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Clerk', 'Doctor'))) {
            redirect('home/permission');
        }
        $data = array();
        $id = $this->input->get('id');

        if (!empty($id)) {
            $expense_category_details = $this->finance_model->getExpenseCategoryById($id);
            if ($expense_category_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $data['category'] = $this->finance_model->getExpenseCategoryById($id);
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_expense_categoryv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function deleteExpenseCategory() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $id = $this->input->get('id');

        if (!empty($id)) {
            $expense_category_details = $this->finance_model->getExpenseCategoryById($id);
            if ($expense_category_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $this->session->set_flashdata('success', lang('record_deleted'));
        $this->finance_model->deleteExpenseCategory($id);
        redirect('finance/expenseCategory');
    }

    //start service category
    public function serviceCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist', 'Clerk'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['categories'] = $this->finance_model->getServiceCategory();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('service_categoryv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addServiceCategoryView() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Clerk'))) {
            redirect('home/permission');
        }
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_service_categoryv2');
        // $this->load->view('home/footer'); // just the header file
    }

    public function addServiceCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Clerk'))) {
            redirect('home/permission');
        }
        $id = $this->input->post('id');
        $category = $this->input->post('category');
        $description = $this->input->post('description');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
// Validating Category Name Field
        $this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Description Field
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                redirect('finance/editServiceCategory?id=' . $id);
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_service_categoryv2', $data);
                // $this->load->view('home/footer'); // just the header file
            }
        } else {
            $data = array();
            $data = array('category' => $category,
                'description' => $description
            );
            if (empty($id)) {
                $this->finance_model->insertServiceCategory($data);
                $this->session->set_flashdata('success', lang('record_added'));
            } else {
                $this->finance_model->updateServiceCategory($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            redirect('finance/serviceCategory');
        }
    }

    function editServiceCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Clerk'))) {
            redirect('home/permission');
        }
        $data = array();
        $id = $this->input->get('id');

        if (!empty($id)) {
            $service_category_details = $this->finance_model->getServiceCategoryById($id);
            if ($service_category_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $data['category'] = $this->finance_model->getServiceCategoryById($id);
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_service_categoryv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function deleteServiceCategory() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $id = $this->input->get('id');

        if (!empty($id)) {
            $service_category_details = $this->finance_model->getServiceCategoryById($id);
            if ($service_category_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $this->session->set_flashdata('success', lang('record_deleted'));
        $this->finance_model->deleteServiceCategory($id);
        redirect('finance/serviceCategory');
    }

    //end service category

    function invoice() {
        $invoice_number = $this->input->get('id');
        $id = $this->finance_model->getPaymentByFinanceNumber($invoice_number)->id;
        $data['payment'] = $this->finance_model->getPaymentById($id);
        $data['patient'] = $this->patient_model->getPatientById($data['payment']->patient);
        $data['encounter'] = $this->encounter_model->getEncounterByInvoiceId($id);
        $patient_hospital_id = $data['patient']->hospital_id;
        $limit = 4;
        $data['branches'] = $this->branch_model->getBranchesByLimit($limit);

        if (!empty($data['patient']->birthdate)) {
            $birthDate = strtotime($data['patient']->birthdate);
            $birthDate = date('m/d/Y', $birthDate);
            $birthDate = explode("/", $birthDate);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
            $data['age'] = $age;
        }


        if ($patient_hospital_id != $this->session->userdata('hospital_id')) {
            redirect('home/permission');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['payment'] = $this->finance_model->getPaymentById($id);
        $this->load->view('home/dashboardv2');
        $this->load->view('invoicev2', $data);
        //$this->load->view('home/footer'); // just the footer fi
    }

    function printInvoice() {
        $invoice_number = $this->input->get('id');
        $id = $this->finance_model->getPaymentByFinanceNumber($invoice_number)->id;
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['payment'] = $this->finance_model->getPaymentById($id);

        $patient_hospital_id = $this->patient_model->getPatientById($data['payment']->patient)->hospital_id;
        if ($patient_hospital_id != $this->session->userdata('hospital_id')) {
            redirect('home/permission');
        }

        $this->load->view('home/dashboardv3'); // just the header file
        $this->load->view('print_invoicev2', $data);
        //$this->load->view('home/footer'); // just the footer fi
    }

    function expenseInvoice() {
        $id = $this->input->get('id');

        if (!empty($id)) {
            $expense_details = $this->finance_model->getExpenseById($id);
            if ($expense_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $data['settings'] = $this->settings_model->getSettings();
        $data['expense'] = $this->finance_model->getExpenseById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('expense_invoice', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function amountReceived() {
        $id = $this->input->post('id');
        $amount_received = $this->input->post('amount_received');
        $previous_amount_received = $this->db->get_where('invoice', array('id' => $id))->row()->amount_received;
        $amount_received = $amount_received + $previous_amount_received;
        $data = array();
        $data = array('amount_received' => $amount_received);
        $this->finance_model->amountReceived($id, $data);
        redirect('finance/invoice?id=' . $id);
    }

    function otAmountReceived() {
        $id = $this->input->post('id');
        $amount_received = $this->input->post('amount_received');
        $previous_amount_received = $this->db->get_where('ot_payment', array('id' => $id))->row()->amount_received;
        $amount_received = $amount_received + $previous_amount_received;
        $data = array();
        $data = array('amount_received' => $amount_received);
        $this->finance_model->otAmountReceived($id, $data);
        redirect('finance/oTinvoice?id=' . $id);
    }

    function patientPaymentHistory() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $patient_number = $this->input->get('patient');
        if (empty($patient_number)) {
            $patient_number = $this->input->post('patient');
        }
        $patient = $this->patient_model->getPatientByPatientNumber($patient_number)->id;
        $provider_logged = $this->session->userdata('hospital_id');
        $patient_details = $this->patient_model->getPatientById($patient, 0);
        $patient_isolated_provider = explode(',', $patient_details->isolated_provider_id);
        $patient_unrestricted_provider = explode(',', $patient_details->unrestricted_provider_id);
        $patient_authorized_provider = explode(',', $patient_details->authorized_provider_id);
        $patient_privacy_level_id = $this->patient_model->getPrivacyLevelById($patient_details->privacy_level_id);
        $user = $this->ion_auth->get_user_id();

        // if ($this->ion_auth->in_group(array('admin'))) {
        //     if ($provider_logged !== $patient_details->hospital_id) {
        //         redirect('home/permission');
        //     }
        // }

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_id = $this->doctor_model->getDoctorByIonUserId($user)->id;
            $visited_provider = explode(',', $patient_details->visited_provider_id);
            $privacy = in_array($provider_logged, $visited_provider);
            if ($privacy === FALSE) {
                redirect('home/permission');
            }
        }

        // if ($patient_hospital_id != $this->session->userdata('hospital_id')) {
        //     redirect('home/permission');
        // }



        $data['settings'] = $this->settings_model->getSettings();
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
            if (empty($date_from)) {
                $date_from = 0;
            }
        } else {
            if (!empty($date_from)) {
                $date_to = strtotime(date('Y-m-d')) + 86399;
            }
        }



        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;

        if (empty($date_from) && empty($date_to)) {
            if ($this->ion_auth->in_group(array('Doctor'))) {
                $data['payments'] = $this->finance_model->getPaymentByPatientIdByDoctorId($patient, $doctor_id);
            } else {
                $data['payments'] = $this->finance_model->getPaymentByPatientId($patient);
            }
            $data['pharmacy_payments'] = $this->pharmacy_model->getPaymentByPatientId($patient);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByPatientId($patient);
            $data['deposits'] = $this->finance_model->getDepositByPatientId($patient);
            if (!empty($data['settings']->payment_gateway)) {
                $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);    
            }
            
        } else {
            $data['payments'] = $this->finance_model->getPaymentByPatientIdByDate($patient, $date_from, $date_to);
            $data['deposits'] = $this->finance_model->getDepositByPatientIdByDate($patient, $date_from, $date_to);
            if (!empty($data['settings']->payment_gateway)) {
                $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);    
            }
        }



        $data['patient'] = $this->patient_model->getPatientById($patient, 0);




        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('patient_depositv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function deposit() {
        $id = $this->input->post('id');
        $patient = $this->input->post('patient');
        $patient_details = $this->patient_model->getPatientById($patient);
        $payment_id = $this->input->post('payment_id');
        $date = time();

        $deposited_amount = $this->input->post('deposited_amount');

        $deposit_type = $this->input->post('deposit_type');
        //echo $this->input->post('deposit_type');
        // die();
        if (empty($deposit_type)) {
            $deposit_type = 'Cash';
        }
        $payment_details = $this->finance_model->getPaymentById($payment_id);
        $user = $this->ion_auth->get_user_id();

        $payment_details = $this->finance_model->getPaymentById($payment_id);
        $encounter_id = $payment_details->encounter_id;

        $current_user_group = $this->ion_auth->get_users_groups()->row()->name;
        $company_classification = $this->company_model->getClassificationByCompanyId($payment_details->company_id);
        $classification = $this->company_model->getCompanyClassificationById($company_classification->classification_id);
        $payment_status_list = $this->finance_model->getInvoiceStatusByCompanyClassificationName($classification->name, $current_user_group);

        foreach ($payment_status_list as $status_list) {
            if ($status_list->name === "paid") {
                $paid_status = $status_list->id;
            } elseif ($status_list->name === "unpaid") {
                $unpaid_status = $status_list->id;
            } elseif ($status_list->name === "overdue") {
                $overdue_status = $status_list->id;
            }
        }

        $outstanding_balance = $this->getOutstandingBalanceByPatientIdByEncounterId($encounter_id, $patient) - $deposited_amount;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
// Validating Patient Name Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Deposited Amount Field
        $this->form_validation->set_rules('deposited_amount', 'Deposited Amount', 'trim|min_length[1]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            redirect('finance/patientPaymentHistory?patient=' . $patient);
        } else {
            $data = array();
            $data = array('patient' => $patient,
                'date' => $date,
                'payment_id' => $payment_id,
                'company_id' => $payment_details->company_id,
                'deposited_amount' => $deposited_amount,
                'deposit_type' => $deposit_type,
                'user' => $user
            );
            if (empty($id)) {
                if ($deposit_type == 'Card') {
                    $gateway = $this->settings_model->getSettings()->payment_gateway;
                    if ($gateway == 'PayPal') {
                        $card_type = $this->input->post('card_type');
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv');

                        $all_details = array(
                            'patient' => $payment_details->patient,
                            'date' => $payment_details->date,
                            'amount' => $payment_details->amount,
                            'doctor' => $payment_details->doctor_name,
                            'discount' => $payment_details->discount,
                            'flat_discount' => $payment_details->flat_discount,
                            'gross_total' => $payment_details->gross_total,
                            'status' => 'unpaid',
                            'patient_name' => $payment_details->patient_name,
                            'patient_phone' => $payment_details->patient_phone,
                            'patient_address' => $payment_details->patient_address,
                            'deposited_amount' => $deposited_amount,
                            'payment_id' => $payment_details->id,
                            'company_id' => $payment_details->company_id,
                            'card_type' => $card_type,
                            'card_number' => $card_number,
                            'expire_date' => $expire_date,
                            'cvv' => $cvv,
                            'from' => 'patient_payment_details',
                            'user' => $user,
                            'cardholdername' => $this->input->post('cardholder')
                        );
                        $this->paypal->paymentPaypal($all_details);
                    } elseif ($gateway == 'Paystack') {
                        $ref = date('Y') . '-' . rand() . date('d') . '-' . date('m');
                        $amount_in_kobo = $deposited_amount;
                        $this->load->module('paystack');
                        $this->paystack->paystack_standard($amount_in_kobo, $ref, $patient, $payment_id, $user, '1');
                    } elseif ($gateway == 'Stripe') {
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv');
                        $token = $this->input->post('token');
                        $stripe = $this->pgateway_model->getPaymentGatewaySettingsByName('Stripe');
                        \Stripe\Stripe::setApiKey($stripe->secret);
                        $charge = \Stripe\Charge::create(array(
                                    "amount" => $deposited_amount * 100,
                                    "currency" => "usd",
                                    "source" => $token
                        ));
                        $chargeJson = $charge->jsonSerialize();

                        if ($chargeJson['status'] == 'succeeded') {
                            $data1 = array(
                                'date' => $date,
                                'patient' => $patient,
                                'payment_id' => $payment_id,
                                'company_id' => $payment_details->company_id,
                                'deposited_amount' => $deposited_amount,
                                'gateway' => 'Stripe',
                                'deposit_type' => 'Card',
                                'user' => $user,
                                'hospital_id' => $this->session->userdata('hospital_id')
                            );
                            $this->finance_model->insertDeposit($data1);

                            $this->session->set_flashdata('success', lang('added'));
                        } else {
                            $this->session->set_flashdata('error', lang('transaction_failed'));
                        }
                        redirect('finance/patientPaymentHistory?patient=' . $patient);
                        // redirect("finance/invoice?id=" . "$inserted_id");
                    } elseif ($gateway == 'Pay U Money') {
                        redirect("payu/check?deposited_amount=" . "$deposited_amount" . '&payment_id=' . $payment_id);
                    } else {
                        $this->session->set_flashdata('error', lang('payment_failed_no_gateway_selected'));
                        redirect('finance/patientPaymentHistory?patient=' . $patient);
                    }
                } else {
                    $this->finance_model->insertDeposit($data);
                    $this->session->set_flashdata('success', lang('added'));

                    if ($outstanding_balance <= 0) {
                        $payment_status = $paid_status;
                        $finance_encounter = array(
                            'payment_status' => $payment_status,
                        );
                        $this->encounter_model->updateEncounter($encounter_id, $finance_encounter);
                    } elseif ($outstanding_balance > 0) {
                        $payment_status = $unpaid_status;
                        $finance_encounter = array(
                            'payment_status' => $payment_status,
                        );
                        $this->encounter_model->updateEncounter($encounter_id, $finance_encounter);
                    }
                }
            } else {
                $this->finance_model->updateDeposit($id, $data);

                $amount_received_id = $this->finance_model->getDepositById($id)->amount_received_id;
                if (!empty($amount_received_id)) {
                    $amount_received_payment_id = explode('.', $amount_received_id);
                    $payment_id = $amount_received_payment_id[0];
                    $data_amount_received = array('amount_received' => $deposited_amount);
                    $this->finance_model->updatePayment($amount_received_payment_id[0], $data_amount_received);
                }

                $this->session->set_flashdata('success', lang('updated'));
            }
            redirect('finance/patientPaymentHistory?patient=' . $patient_details->patient_id);
        }
    }

    function editDepositByJason() {
        $id = $this->input->get('id');
        $data['deposit'] = $this->finance_model->getDepositById($id);
        echo json_encode($data);
    }

    function getDepositsByInvoiceIdByJason() {
        $id = $this->input->get('invoice_id');
        $data['deposit'] = $this->finance_model->getDepositByPaymentId($id);

        $date = [];
        foreach ($data['deposit'] as $deposit) {
            $date[] = date('Y-m-d', $deposit->date.' UTC');
        }

        $data['date'] = $date;

        echo json_encode($data);
    }

    function getDeposit() {
        $invoice_id = $this->input->get('invoice_id');
        $requestData = $_REQUEST;

        $data['deposit'] = $this->finance_model->getDepositByPaymentId($invoice_id);

        foreach ($data['deposit'] as $deposit) {
            $options1 = '<button type="button" class="btn btn-info deposit-list"><i class="fa fa-eye"></i></button>';

            $info[] = array(
                date('Y-m-d' ,$deposit->date.' UTC'),
                $deposit->payment_id,
                $deposit->receipt_number,
                $deposit->deposited_amount,
                $deposit->status,
                $options1,
            );
        }

        if (!empty($data['deposit'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                // "recordsTotal" => $this->finance_model->getDepositCount(),
                // "recordsFilterd" => $this->finance_model->getDepositBySeachCount($search),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => $info
            );
        } else {
            $output = array(
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function deleteDeposit() {
        $id = $this->input->get('id');

        if (!empty($id)) {
            $deposit_details = $this->finance_model->getDepositById($id);
            if ($deposit_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $patient = $this->input->get('patient');

        $amount_received_id = $this->finance_model->getDepositById($id)->amount_received_id;
        if (!empty($amount_received_id)) {
            $amount_received_payment_id = explode('.', $amount_received_id);
            $payment_id = $amount_received_payment_id[0];
            $data_amount_received = array('amount_received' => NULL);
            $this->finance_model->updatePayment($amount_received_payment_id[0], $data_amount_received);
        }

        $this->finance_model->deleteDeposit($id);

        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('finance/patientPaymentHistory?patient=' . $patient);
    }

    function invoicePatientTotal() {
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['payments'] = $this->finance_model->getPaymentByPatientIdByStatus($id);
        $data['ot_payments'] = $this->finance_model->getOtPaymentByPatientIdByStatus($id);
        $data['patient_id'] = $id;
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('invoicePT', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function lastPaidInvoice() {
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['payments'] = $this->finance_model->lastPaidInvoice($id);
        $data['ot_payments'] = $this->finance_model->lastOtPaidInvoice($id);
        $data['patient_id'] = $id;
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('LPInvoice', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function makePaid() {
        $id = $this->input->get('id');
        $patient_id = $this->finance_model->getPaymentById($id)->patient;
        $data = array();
        $data = array('status' => 'paid');
        $data1 = array();
        $data1 = array('status' => 'paid-last');
        $this->finance_model->makeStatusPaid($id, $patient_id, $data, $data1);
        $this->session->set_flashdata('feedback', lang('paid'));
        redirect('finance/invoice?id=' . $id);
    }

    function makePaidByPatientIdByStatus() {
        $id = $this->input->get('id');
        $data = array();
        $data = array('status' => 'paid-last');
        $data1 = array();
        $data1 = array('status' => 'paid');
        $this->finance_model->makePaidByPatientIdByStatus($id, $data, $data1);
        $this->session->set_flashdata('feedback', lang('paid'));
        redirect('patient');
    }

    function makeOtStatusPaid() {
        $id = $this->input->get('id');
        $this->finance_model->makeOtStatusPaid($id);
        $this->session->set_flashdata('feedback', lang('paid'));
        redirect("finance/otInvoice?id=" . "$id");
    }

    function doctorsCommission() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) {
            redirect('home/permission');
        }
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['payments'] = $this->finance_model->getPaymentByDate($date_from, $date_to);
        $data['ot_payments'] = $this->finance_model->getOtPaymentByDate($date_from, $date_to);
        $data['settings'] = $this->settings_model->getSettings();
        $data['from'] = $this->input->post('date_from');
        $data['to'] = $this->input->post('date_to');
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('doctors_commissionv2', $data);
        // $this->load->view('home/footer'); // just the footer fi
    }

    function docComDetails() {
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }
        $doctor = $this->input->get('id');
        if (empty($doctor)) {
            $doctor = $this->input->post('doctor');
        }
        $data['doctor'] = $doctor;
        if (!empty($date_from)) {
            $data['payments'] = $this->finance_model->getPaymentByDoctorDate($doctor, $date_from, $date_to);
        } else {
            $data['payments'] = $this->finance_model->getPaymentByDoctor($doctor);
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['from'] = $this->input->post('date_from');
        $data['to'] = $this->input->post('date_to');
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('doc_com_viewv2', $data);
        // $this->load->view('home/footer'); // just the footer fi
    }

    function financialReport() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) {
            redirect('home/permission');
        }
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }
        $data = array();
        $data['payment_categories'] = $this->finance_model->getPaymentCategory();
        $data['expense_categories'] = $this->finance_model->getExpenseCategory();


// if(empty($date_from)&&empty($date_to)) {
//    $data['payments']=$this->finance_model->get_payment();
//     $data['ot_payments']=$this->finance_model->get_ot_payment();
//     $data['expenses']=$this->finance_model->get_expense();
// }
// else{

        $data['payments'] = $this->finance_model->getPaymentByDate($date_from, $date_to);
        $data['ot_payments'] = $this->finance_model->getOtPaymentByDate($date_from, $date_to);
        $data['deposits'] = $this->finance_model->getDepositsByDate($date_from, $date_to);
        $data['expenses'] = $this->finance_model->getExpenseByDate($date_from, $date_to);
// } 
        $data['from'] = $this->input->post('date_from');
        $data['to'] = $this->input->post('date_to');
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('financial_reportv2', $data);
        // $this->load->view('home/footer'); // just the footer fi
    }

    function UserActivityReport() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if ($this->ion_auth->in_group(array('Accountant'))) {
            $user = $this->ion_auth->get_user_id();
            $data['user'] = $this->accountant_model->getAccountantByIonUserId($user);
        }
        if ($this->ion_auth->in_group(array('Receptionist'))) {
            $user = $this->ion_auth->get_user_id();
            $data['user'] = $this->receptionist_model->getReceptionistByIonUserId($user);
        }
        $hour = 0;
        $TODAY_ON = $this->input->get('today');
        $YESTERDAY_ON = $this->input->get('yesterday');
        $ALL = $this->input->get('all');

        $today = strtotime($hour . ':00:00');
        $today_last = strtotime($hour . ':00:00') + 86399;
        $data['payments'] = $this->finance_model->getPaymentByUserIdByDate($user, $today, $today_last);
        $data['ot_payments'] = $this->finance_model->getOtPaymentByUserIdByDate($user, $today, $today_last);
        $data['deposits'] = $this->finance_model->getDepositByUserIdByDate($user, $today, $today_last);
        $data['day'] = 'Today';
        if (!empty($YESTERDAY_ON)) {
            $today = strtotime($hour . ':00:00');
            $yesterday = strtotime('-1 day', $today);
            $data['day'] = 'Yesterday';
            $data['payments'] = $this->finance_model->getPaymentByUserIdByDate($user, $yesterday, $today);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByUserIdByDate($user, $yesterday, $today);
            $data['deposits'] = $this->finance_model->getDepositByUserIdByDate($user, $yesterday, $today);
        }
        if (!empty($ALL)) {
            $data['day'] = 'All';
            $data['payments'] = $this->finance_model->getPaymentByUserId($user);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByUserId($user);
            $data['deposits'] = $this->finance_model->getDepositByUserId($user);
        }
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('user_activity_report', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function accountActivityReport() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if ($this->ion_auth->in_group(array('Doctor', 'Receptionist', 'Nurse', 'Laboratorist', 'Patient'))) {
            redirect('home/permission');
        }
        $account = $this->input->get('account');
        $data['company'] = $this->company_model->getCompanyById($account);
        $hour = 0;
        $TODAY_ON = $this->input->get('today');
        $YESTERDAY_ON = $this->input->get('yesterday');
        $ALL = $this->input->get('all');

        $today = strtotime($hour . ':00:00');
        $today_last = strtotime($hour . ':00:00') + 86399;
        $data['payments'] = $this->finance_model->getPaymentByCompanyIdByDate($account, $today, $today_last);
        $data['ot_payments'] = $this->finance_model->getOtPaymentByCompanyIdByDate($account, $today, $today_last);
        $data['deposits'] = $this->finance_model->getDepositByCompanyIdByDate($account, $today, $today_last);
        $data['day'] = 'Today';
        if (!empty($YESTERDAY_ON)) {
            $today = strtotime($hour . ':00:00');
            $yesterday = strtotime('-1 day', $today);
            $data['day'] = 'Yesterday';
            $data['payments'] = $this->finance_model->getPaymentByCompanyIdByDate($account, $yesterday, $today);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByCompanyIdByDate($account, $yesterday, $today);
            $data['deposits'] = $this->finance_model->getDepositByCompanyIdByDate($account, $yesterday, $today);
        }
        if (!empty($ALL)) {
            $data['day'] = 'All';
            $data['payments'] = $this->finance_model->getPaymentByCompanyId($account);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByCompanyId($account);
            $data['deposits'] = $this->finance_model->getDepositByCompanyId($account);
        }
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('account_activity_report', $data);
        $this->load->view('home/footer'); // just the header file
    }    

    function UserActivityReportDateWise() {
        $data = array();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if ($this->ion_auth->in_group(array('Accountant'))) {
            $user = $this->input->post('user');
            $data['user'] = $this->accountant_model->getAccountantByIonUserId($user);
        }
        if ($this->ion_auth->in_group(array('Receptionist'))) {
            $user = $this->input->post('user');
            $data['user'] = $this->receptionist_model->getReceptionistByIonUserId($user);
        }
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }

        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;

        $data['payments'] = $this->finance_model->getPaymentByUserIdByDate($user, $date_from, $date_to);
        $data['ot_payments'] = $this->finance_model->getOtPaymentByUserIdByDate($user, $date_from, $date_to);
        $data['deposits'] = $this->finance_model->getDepositByUserIdByDate($user, $date_from, $date_to);
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('user_activity_report', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function accountActivityReportDateWise() {
        $data = array();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ($this->ion_auth->in_group(array('Doctor', 'Receptionist', 'Nurse', 'Laboratorist', 'Patient'))) {
            redirect('home/permission');
        }

        $account = $this->input->post('account');
        $data['company'] = $this->company_model->getCompanyById($account);
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }

        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;

        $data['payments'] = $this->finance_model->getPaymentByCompanyIdByDate($account, $date_from, $date_to);
        $data['ot_payments'] = $this->finance_model->getOtPaymentByUserIdByDate($account, $date_from, $date_to);
        $data['deposits'] = $this->finance_model->getDepositByUserIdByDate($account, $date_from, $date_to);
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('account_activity_report', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function allAccountActivityReport() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ($this->ion_auth->in_group(array('Receptionist', 'Nurse', 'Laboratorist', 'Patient'))) {
            redirect('home/permission');
        }

        $account = $this->input->get('account');

        if (!empty($account)) {
            $data['company'] = $this->company_model->getCompanyById($account);
            
            $hour = 0;
            $TODAY_ON = $this->input->get('today');
            $YESTERDAY_ON = $this->input->get('yesterday');
            $ALL = $this->input->get('all');

            $today = strtotime($hour . ':00:00');
            $today_last = strtotime($hour . ':00:00') + 86399;
            $data['payments'] = $this->finance_model->getPaymentByCompanyIdByDate($account, $today, $today_last);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByCompanyIdByDate($account, $today, $today_last);
            $data['deposits'] = $this->finance_model->getDepositByCompanyIdByDate($account, $today, $today_last);
            $data['day'] = 'Today';

            if (!empty($YESTERDAY_ON)) {
                $today = strtotime($hour . ':00:00');
                $yesterday = strtotime('-1 day', $today);
                $data['payments'] = $this->finance_model->getPaymentByCompanyIdByDate($account, $yesterday, $today);
                $data['ot_payments'] = $this->finance_model->getOtPaymentByCompanyIdByDate($account, $yesterday, $today);
                $data['deposits'] = $this->finance_model->getDepositByCompanyIdByDate($account, $yesterday, $today);
                $data['day'] = 'Yesterday';
            }

            if (!empty($ALL)) {
                $data['payments'] = $this->finance_model->getPaymentByCompanyId($account);
                $data['ot_payments'] = $this->finance_model->getOtPaymentByCompanyId($account);
                $data['deposits'] = $this->finance_model->getDepositByCompanyId($account);
                $data['day'] = 'All';
            }

            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('account_activity_reportv2', $data);
            // $this->load->view('home/footer'); // just the header file
        }

        if (empty($account)) {
            $hour = 0;
            $today = strtotime($hour . ':00:00');
            $today_last = strtotime($hour . ':00:00') + 86399;
            $data['companies'] = $this->company_model->getCompany();
            //$data['receptionists'] = $this->receptionist_model->getReceptionist();
            $data['settings'] = $this->settings_model->getSettings();
            $data['payments'] = $this->finance_model->getPaymentByDate($today, $today_last);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByDate($today, $today_last);
            $data['deposits'] = $this->finance_model->getDepositsByDate($today, $today_last);
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('all_account_activity_reportv2', $data);
            // $this->load->view('home/footer'); // just the header file
        }
    }

    function AllUserActivityReportDateWise() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $user = $this->input->post('user');

        if (!empty($user)) {
            $user_group = $this->db->get_where('users_groups', array('user_id' => $user))->row()->group_id;
            if ($user_group == '3') {
                $data['user'] = $this->accountant_model->getAccountantByIonUserId($user);
            }
            if ($user_group == '10') {
                $data['user'] = $this->receptionist_model->getReceptionistByIonUserId($user);
            }
            $date_from = strtotime($this->input->post('date_from'));
            $date_to = strtotime($this->input->post('date_to'));
            if (!empty($date_to)) {
                $date_to = $date_to + 86399;
            }

            $data['settings'] = $this->settings_model->getSettings();
            $data['date_from'] = $date_from;
            $data['date_to'] = $date_to;
            $data['payments'] = $this->finance_model->getPaymentByUserIdByDate($user, $date_from, $date_to);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByUserIdByDate($user, $date_from, $date_to);
            $data['deposits'] = $this->finance_model->getDepositByUserIdByDate($user, $date_from, $date_to);



            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('user_activity_report', $data);
            $this->load->view('home/footer'); // just the header file
        }

        if (empty($user)) {
            $hour = 0;
            $today = strtotime($hour . ':00:00');
            $today_last = strtotime($hour . ':00:00') + 86399;
            $data['accountants'] = $this->accountant_model->getAccountant();
            $data['receptionists'] = $this->receptionist_model->getReceptionist();
            $data['settings'] = $this->settings_model->getSettings();
            $data['payments'] = $this->finance_model->getPaymentByDate($today, $today_last);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByDate($today, $today_last);
            $data['deposits'] = $this->finance_model->getDepositsByDate($today, $today_last);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('all_user_activity_report', $data);
            $this->load->view('home/footer'); // just the header file
        }
    }

    function allAccountActivityReportDateWise() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $account = $this->input->post('account');

        if (!empty($account)) {
            $data['company'] = $this->company_model->getCompanyById($account);

            $date_from = strtotime($this->input->post('date_from'));
            $date_to = strtotime($this->input->post('date_to'));
            if (!empty($date_to)) {
                $date_to = $date_to + 86399;
            }

            $data['settings'] = $this->settings_model->getSettings();
            $data['date_from'] = $date_from;
            $data['date_to'] = $date_to;
            $data['payments'] = $this->finance_model->getPaymentByCompanyIdByDate($account, $date_from, $date_to);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByCompanyIdByDate($account, $date_from, $date_to);
            $data['deposits'] = $this->finance_model->getDepositByCompanyIdByDate($account, $date_from, $date_to);

            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('account_activity_report', $data);
            $this->load->view('home/footer'); // just the header file
        }

        if (empty($account)) {
            $hour = 0;
            $today = strtotime($hour . ':00:00');
            $today_last = strtotime($hour . ':00:00') + 86399;
            $data['companies'] = $this->company_model->getCompany();
            $data['settings'] = $this->settings_model->getSettings();
            $data['payments'] = $this->finance_model->getPaymentByDate($today, $today_last);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByDate($today, $today_last);
            $data['deposits'] = $this->finance_model->getDepositsByDate($today, $today_last);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('all_account_activity_report', $data);
            $this->load->view('home/footer'); // just the header file
        }
    }

    function AllUserActivityReport() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $user = $this->input->get('user');

        if (!empty($user)) {
            $user_group = $this->db->get_where('users_groups', array('user_id' => $user))->row()->group_id;
            if ($user_group == '3') {
                $data['user'] = $this->accountant_model->getAccountantByIonUserId($user);
            }
            if ($user_group == '10') {
                $data['user'] = $this->receptionist_model->getReceptionistByIonUserId($user);
            }
            $data['settings'] = $this->settings_model->getSettings();
            $hour = 0;
            $TODAY_ON = $this->input->get('today');
            $YESTERDAY_ON = $this->input->get('yesterday');
            $ALL = $this->input->get('all');

            $today = strtotime($hour . ':00:00');
            $today_last = strtotime($hour . ':00:00') + 86399;
            $data['payments'] = $this->finance_model->getPaymentByUserIdByDate($user, $today, $today_last);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByUserIdByDate($user, $today, $today_last);
            $data['deposits'] = $this->finance_model->getDepositByUserIdByDate($user, $today, $today_last);
            $data['day'] = 'Today';

            if (!empty($YESTERDAY_ON)) {
                $today = strtotime($hour . ':00:00');
                $yesterday = strtotime('-1 day', $today);
                $data['payments'] = $this->finance_model->getPaymentByUserIdByDate($user, $yesterday, $today);
                $data['ot_payments'] = $this->finance_model->getOtPaymentByUserIdByDate($user, $yesterday, $today);
                $data['deposits'] = $this->finance_model->getDepositByUserIdByDate($user, $yesterday, $today);
                $data['day'] = 'Yesterday';
            }

            if (!empty($ALL)) {
                $data['payments'] = $this->finance_model->getPaymentByUserId($user);
                $data['ot_payments'] = $this->finance_model->getOtPaymentByUserId($user);
                $data['deposits'] = $this->finance_model->getDepositByUserId($user);
                $data['day'] = 'All';
            }


            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('user_activity_reportv2', $data);
            // $this->load->view('home/footer'); // just the header file
        }

        if (empty($user)) {
            $hour = 0;
            $today = strtotime($hour . ':00:00');
            $today_last = strtotime($hour . ':00:00') + 86399;
            $data['accountants'] = $this->accountant_model->getAccountant();
            $data['receptionists'] = $this->receptionist_model->getReceptionist();
            $data['settings'] = $this->settings_model->getSettings();
            $data['payments'] = $this->finance_model->getPaymentByDate($today, $today_last);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByDate($today, $today_last);
            $data['deposits'] = $this->finance_model->getDepositsByDate($today, $today_last);
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('all_user_activity_reportv2', $data);
            // $this->load->view('home/footer'); // just the header file
        }
    }
    function getPayment() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $settings = $this->settings_model->getSettings();
        $user_id = $this->ion_auth->get_user_id();
        //First Check if Company Administrator is logged in and only show their company's invoices
        if ($this->ion_auth->in_group(array('CompanyUser'))) {
            $company_user = $this->companyuser_model->getCompanyUserByIonUserId($user_id);
            $company_id = $company_user->company_id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['payments'] = $this->finance_model->getPaymentByCompanyIdBySearch($company_id, $search);
                } else {
                    $data['payments'] = $this->finance_model->getPaymentByCompanyId($company_id);
                }
            } else {
                if (!empty($search)) {
                    $data['payments'] = $this->finance_model->getPaymentByCompanyIdByLimitBySearch($company_id, $limit, $start, $search);
                } else {
                    $data['payments'] = $this->finance_model->getPaymentByCompanyIdByLimit($company_id, $limit, $start);
                }
            }

        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['payments'] = $this->finance_model->getPaymentBySearch($search);
                } else {
                    $data['payments'] = $this->finance_model->getPayment();
                }
            } else {
                if (!empty($search)) {
                    $data['payments'] = $this->finance_model->getPaymentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['payments'] = $this->finance_model->getPaymentByLimit($limit, $start);
                }
            }

        }



        //  $data['payments'] = $this->finance_model->getPayment();

        foreach ($data['payments'] as $payment) {
            $date = date('Y-m-d', $payment->date);

            $flat_discount = $payment->flat_discount;
            if (empty($flat_discount)) {
                $flat_discount = 0;
            }

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist', 'Clerk'))) {
                // $options1 = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('edit') . '" href="finance/editPayment?finance_id=' . $payment->invoice_number . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
                $options1 = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('edit') . '" href="finance/editInvoiceGroup?invoice_group_id=' . $payment->invoice_group_number . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }

            $options2 = '<a class="btn btn-info btn-xs" title="' . lang('details') . '" href="finance/invoice?id=' . $payment->invoice_number . '"><i class="fa fa-file-text-o"></i> ' . lang('details') . '</a>';
            $options4 = '<a class="btn btn-info btn-xs" title="' . lang('print') . '" href="finance/printInvoice?id=' . $payment->invoice_number . '"target="_blank"> <i class="fa fa-print"></i> ' . lang('print') . '</a>';
            if ($this->ion_auth->in_group(array('admin'))) {
                $options3 = '<a class="btn btn-danger btn-xs" title="' . lang('delete') . '" href="finance/deleteInvoice?id=' . $payment->invoice_group_number . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>';
            }

            if (empty($options1)) {
                $options1 = '';
            }

            if (empty($options3)) {
                $options3 = '';
            }

            $doctor_details = $this->doctor_model->getDoctorById($payment->doctor);

            if (!empty($doctor_details)) {
                $doctor = $doctor_details->name;
            } else {
                if (!empty($payment->doctor_name)) {
                    $doctor = $payment->doctor_name;
                } else {
                    $doctor = $payment->doctor_name;
                }
            }

            $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row();
            if (!empty($patient_info)) {
                $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
            } else {
                $patient_details = ' ';
            }

            $invoice_details = $this->finance_model->getInvoiceByGroupNumber($payment->invoice_group_number);

            $subtotal = [];
            $discount = [];
            $grand_total = [];
            foreach($invoice_details as $invoice_detail) {
                $discount[] = $invoice_detail->discount;
                if ($settings->is_display_prices_with_tax_included == "1") {
                    $subtotal[] = $invoice_detail->amount;
                    $grand_total[] = $invoice_detail->gross_total;
                } else {
                    $subtotal[] = $invoice_detail->total_without_tax;
                    $grand_total[] = $invoice_detail->total_without_tax;
                }
            }

            $subtotal = array_sum($subtotal);
            $discount = array_sum($discount);
            $grand_total = array_sum($grand_total);

            $info[] = array(
                $date,
                $payment->invoice_group_number,
                $patient_details,
                $doctor,
                '<div class="text-right">'.number_format($subtotal,2).'</div>',
                '<div class="text-right">'.number_format($discount,2).'</div>',
                '<div class="text-right">'.number_format($grand_total,2).'</div>',
                '<div class="text-right">'.number_format(($this->finance_model->getDepositAmountByPaymentId($payment->id)),2).'</div>',
                '<div class="text-right">'.number_format(($grand_total - $this->finance_model->getDepositAmountByPaymentId($payment->id)),2).'</div>',
                $payment->remarks,
                $options1 . ' ' . $options2 . ' ' . $options4 . ' ' . $options3,
                    //  $options2
            );
        }







        if (!empty($data['payments'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->finance_model->getPaymentCount(), 
                "recordsFiltered" => count($data['payments']),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }




        echo json_encode($output);
    }

    function previousInvoice() {
        $id = $this->input->get('id');
        $data1 = $this->finance_model->getFirstRowPaymentById();
        if ($id == $data1->id) {
            $data = $this->finance_model->getLastRowPaymentById();
            redirect('finance/invoice?id=' . $data->id);
        } else {
            for ($id1 = $id - 1; $id1 >= $data1->id; $id1--) {

                $data = $this->finance_model->getPreviousPaymentById($id1);
                if (!empty($data)) {
                    redirect('finance/invoice?id=' . $data->id);
                    break;
                } elseif ($id1 == $data1->id) {
                    $data = $this->finance_model->getLastRowPaymentById();
                    redirect('finance/invoice?id=' . $data->id);
                } else {
                    continue;
                }
            }
        }
    }

    function nextInvoice() {
        $id = $this->input->get('id');


        $data1 = $this->finance_model->getLastRowPaymentById();
        //  echo $data1->id;
        //  echo $id;
        //  die();
        //$id1 = $id + 1;
        if ($id == $data1->id) {
            $data = $this->finance_model->getFirstRowPaymentById();
            redirect('finance/invoice?id=' . $data->id);
        } else {
            for ($id1 = $id + 1; $id1 <= $data1->id; $id1++) {

                $data = $this->finance_model->getNextPaymentById($id1);


                if (!empty($data)) {
                    redirect('finance/invoice?id=' . $data->id);
                    break;
                } elseif ($id1 == $data1->id) {
                    $data = $this->finance_model->getFirstRowPaymentById();
                    redirect('finance/invoice?id=' . $data->id);
                } else {
                    continue;
                }
            }
        }
    }

    function daily() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) {
            redirect('home/permission');
        }
        $data = array();
        $year = $this->input->get('year');
        $month = $this->input->get('month');

        if (empty($year)) {
            $year = date('Y');
        }
        if (empty($month)) {
            $month = date('m');
        }

        $first_minute = mktime(0, 0, 0, $month, 1, $year);
        $last_minute = mktime(23, 59, 59, $month, date("t", $first_minute), $year);

        $payments = $this->finance_model->getPaymentByDate($first_minute, $last_minute);
        $all_payments = array();
        foreach ($payments as $payment) {
            $date = date('D d-m-y', $payment->date);
            if (array_key_exists($date, $all_payments)) {
                $all_payments[$date] = $all_payments[$date] + $payment->gross_total;
            } else {
                $all_payments[$date] = $payment->gross_total;
            }
        }

        $data['year'] = $year;
        $data['month'] = $month;
        $data['first_minute'] = $first_minute;
        $data['last_minute'] = $last_minute;
        $data['all_payments'] = $all_payments;

        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('dailyv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function dailyExpense() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) {
            redirect('home/permission');
        }
        $data = array();
        $year = $this->input->get('year');
        $month = $this->input->get('month');

        if (empty($year)) {
            $year = date('Y');
        }
        if (empty($month)) {
            $month = date('m');
        }

        $first_minute = mktime(0, 0, 0, $month, 1, $year);
        $last_minute = mktime(23, 59, 59, $month, date("t", $first_minute), $year);

        $expenses = $this->finance_model->getExpenseByDate($first_minute, $last_minute);
        $all_expenses = array();
        foreach ($expenses as $expense) {
            $date = date('D d-m-y', $expense->date);
            if (array_key_exists($date, $all_expenses)) {
                $all_expenses[$date] = $all_expenses[$date] + $expense->amount;
            } else {
                $all_expenses[$date] = $expense->amount;
            }
        }

        $data['year'] = $year;
        $data['month'] = $month;
        $data['first_minute'] = $first_minute;
        $data['last_minute'] = $last_minute;
        $data['all_expenses'] = $all_expenses;



        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('daily_expensev2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function monthly() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) {
            redirect('home/permission');
        }
        $data = array();
        $year = $this->input->get('year');

        if (empty($year)) {
            $year = date('Y');
        }


        $first_minute = mktime(0, 0, 0, 1, 1, $year);
        $last_minute = mktime(23, 59, 59, 12, 31, $year);

        $payments = $this->finance_model->getPaymentByDate($first_minute, $last_minute);
        $all_payments = array();
        foreach ($payments as $payment) {
            $month = date('m-Y', $payment->date);
            if (array_key_exists($month, $all_payments)) {
                $all_payments[$month] = $all_payments[$month] + $payment->gross_total;
            } else {
                $all_payments[$month] = $payment->gross_total;
            }
        }

        $data['year'] = $year;
        $data['first_minute'] = $first_minute;
        $data['last_minute'] = $last_minute;
        $data['all_payments'] = $all_payments;

        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('monthlyv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function monthlyExpense() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) {
            redirect('home/permission');
        }
        $data = array();
        $year = $this->input->get('year');

        if (empty($year)) {
            $year = date('Y');
        }


        $first_minute = mktime(0, 0, 0, 1, 1, $year);
        $last_minute = mktime(23, 59, 59, 12, 31, $year);

        $expenses = $this->finance_model->getExpenseByDate($first_minute, $last_minute);
        $all_expenses = array();
        foreach ($expenses as $expense) {
            $month = date('m-Y', $expense->date);
            if (array_key_exists($month, $all_expenses)) {
                $all_expenses[$month] = $all_expenses[$month] + $expense->amount;
            } else {
                $all_expenses[$month] = $expense->amount;
            }
        }

        $data['year'] = $year;
        $data['first_minute'] = $first_minute;
        $data['last_minute'] = $last_minute;
        $data['all_expenses'] = $all_expenses;

        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('monthly_expensev2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function getExpense() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $settings = $this->settings_model->getSettings();
        
        if ($limit == -1) {
            if (!empty($search)) {
                $data['expenses'] = $this->finance_model->getExpenseBysearch($search);
            } else {
                $data['expenses'] = $this->finance_model->getExpense();
            }
        } else {
            if (!empty($search)) {
                $data['expenses'] = $this->finance_model->getExpenseByLimitBySearch($limit, $start, $search);
            } else {
                $data['expenses'] = $this->finance_model->getExpenseByLimit($limit, $start);
            }
        }
        //  $data['payments'] = $this->finance_model->getPayment();

        foreach ($data['expenses'] as $expense) {
            $category_name = $this->finance_model->getExpenseCategoryById($expense->category_id);

            if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Clerk'))) {
                $options1 = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('') . '" href="finance/editExpense?id=' . $expense->id . '"><i class="fa fa-edit"> </i>'.' '.lang('edit').'</a>';
            }

            $options2 = '<a class="btn btn-info btn-xs" title="' . lang('') . '" style="color: #fff;" href="finance/expenseInvoice?id=' . $expense->id . '"><i class="fa fa-file-text-o"></i> '.' '.lang('details').'</a>';
            //$options4 = '<a class="btn btn-info btn-xs invoicebutton" title="' . lang('print') . '" style="color: #fff;" href="finance/printInvoice?id=' . $payment->id . '"target="_blank"> <i class="fa fa-print"></i> ' . lang('print') . '</a>';
            if ($this->ion_auth->in_group(array('admin'))) {
                $options3 = '<a class="btn btn-danger btn-xs" title="' . lang('delete') . '" href="finance/deleteExpense?id=' . $expense->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> '. lang('delete'). '</a>';
            }

            if (empty($options1)) {
                $options1 = '';
            }

            if (empty($options3)) {
                $options3 = '';
            }


            $info[] = array(
                date('Y-m-d', strtotime($expense->expense_date.' UTC')),
                $this->finance_model->getExpenseCategoryById($expense->category_id)->category,
                $expense->note,
                '<div class="text-right">'.number_format($expense->amount,'2','.',',').'</div>',
                $options1 . ' ' . $options2 . ' ' . $options3,
                    //  $options2
            );
        }







        if (!empty($data['expenses'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->finance_model->getExpenseCount(),
                "recordsFiltered" => $this->finance_model->getExpenseBySearchCount($search),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }




        echo json_encode($output);
    }

    public function getServiceCategoryGroupByEntityType() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->finance_model->getServiceCategoryGroupByEntityType($searchTerm);

        echo json_encode($response);
    }

    public function getTaxByApplicableCountryId() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->finance_model->getTaxByApplicableCountryId($searchTerm);

        echo json_encode($response);
    }

    public function getStaffInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->finance_model->getStaffInfo($searchTerm);

        echo json_encode($response);
    }

    public function getInvoiceStatusByCompanyClassificationName() {
        $data = array();
        $id = $this->input->get('id');

        $companyId = $this->company_model->getClassificationByCompanyId($id);
        $companyClassificationName = $this->company_model->getCompanyClassificationById($companyId->classification_id);
        $current_user = $this->ion_auth->get_users_groups()->row()->name;
        $data['name'] = $this->finance_model->getInvoiceStatusByCompanyClassificationName($companyClassificationName->name, $current_user);
        $data['company_name'] = $companyClassificationName->name;
        

        echo json_encode($data);        
    }

    public function getChargesByCompanyId() {
        $id = $this->input->get('id');

        $data['charge'] = $this->finance_model->getChargesByCompanyId($id);

        echo json_encode($data);
    }

    public function getChargesByCopay() {
        $copay = $this->input->get('copay');

        $charges = $this->finance_model->getChargesWithCopay();

        $charges_copay = [];

        if (!empty($copay)) {
            foreach($charges as $charge) {
                if ($charge->total >= 2) {
                    $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                    // foreach($charges_copay_lists as $charges_copay_list) {
                    //     $charges_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                    // }
                    $charges_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_lists[0]->id);
                }
            }
        } else {
            foreach($charges as $charge) {
                if ($charge->total <= 1) {
                    $charges_copay_lists = $this->finance_model->getPaymentCategoryByGroupId($charge->group_id);
                    foreach($charges_copay_lists as $charges_copay_list) {
                        $charges_copay[] = $this->finance_model->getPaymentCategoryById($charges_copay_list->id);
                    }
                }
            }
        }

        $data['charges'] = $charges_copay;

        echo json_encode($data);
    }

    public function getPayersByChargePayerGroup() {
        $group = $this->input->get('group');
        $group_array = explode(',', $group);

        $charges = [];
        $payer_accounts = [];

        foreach ($group_array as $group_arr) {
            $payer_groups = $this->finance_model->getPaymentCategoryByGroupId($group_arr);
            foreach ($payer_groups as $payer_group) {
                $charges[] = $payer_group;
                $payer_accounts[] = $this->company_model->getCompanyById($payer_group->payer_account_id);
            }
        }

        $data['charges'] = $charges;
        $data['payer_accounts'] = $payer_accounts;

        echo json_encode($data);
    }

    public function getPayersByChargePayerGroup2() {
        $group = $this->input->get('group');
        $charge_group = explode(',', $group);

        $charges_c_price = [];
        $charges_quantity = [];
        $charges_payer_account = [];
        $charges_sub_total = [];
        $payer_details_result = [];

        // foreach($charge_group as $group_member) {
        //     $group_details = $this->finance_model->getPaymentCategoryByGroupId($group_member);
        //     foreach($group_details as $key => $value) {
        //         $charges_c_price[] = $value->c_price;
        //         $charges_quantity[] = 1;
        //         $charges_sub_total[] = $charges_c_price[$key] * $charges_quantity[$key];
        //         $charges_payer_account[] = $value->payer_account_id;

        //         $payer_details_data = array_merge($charges_c_price, $charges_quantity, $charges_sub_total, $charges_payer_account);
        //         $payer_details_result[] = array($charges_payer_account[$key] => $payer_details_data);
        //     }
        // }

        foreach($charge_group as $group_member) {
            $charge_details = $this->finance_model->getPaymentCategoryByGroupId($group_member);
            $payers = [];
            foreach($charge_details as $k => $v) {
                $payers[] = $v->payer_account_id;
                // $invoice = [];
            }

            $subtotal = 0;
            $total = 0;
            foreach($payers as $k2 => $v2) {
                $subtotal += ($charge_details[$k2]->c_price_without_tax * 1);
                $total += ($charge_details[$k2]->c_price * 1);
                $invoice_component = array(
                    'charges' => array(
                        'id' => $charge_details[$k2]->id,
                        'price_wo_tax' => $charge_details[$k2]->c_price_without_tax,
                        'price_with_tax' => $charge_details[$k2]->c_price,
                        'quantity' => 1,
                        'amount' => $charge_details[$k2]->c_price_without_tax * 1,
                        'group_id' => $charge_details[$k2]->group_id,
                        'category' => $charge_details[$k2]->category,
                        'type' => $charge_details[$k2]->type,
                        'fixed_limit' => $charge_details[$k2]->copay_share_fixed,
                        'percentage_limit' => $charge_details[$k2]->copay_share_percentage,
                    ),
                    'company' => array(
                        'id' => $v2,
                        'display_name' => $this->company_model->getCompanyById($v2)->display_name,
                    ),
                    'tax' => array(
                        'id' => $charge_details[$k2]->tax_id,
                        'percentage' => $this->finance_model->getTaxById($charge_details[$k2]->tax_id)->rate,
                        'amount' => $charge_details[$k2]->tax_amount,
                    ),
                    'total' => array(
                        'subtotal' => $subtotal,
                        'total' => $total,
                    ),
                );
                $invoice[$v2] = $invoice_component;
            }
        }
        $data['discount'] = $this->finance_model->getDiscount();

        $data['invoice'] = $invoice;

        echo json_encode($data);
    }

    public function getDiscountInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->finance_model->getDiscountInfo($searchTerm);

        echo json_encode($response);
    }

    public function getExtrasByDiscountIdByChargeIdByJason() {
        $discount = $this->input->get('discount');
        $charge = $this->input->get('charge');

        $charge_details = [];

        $charges = explode(',', $charge);

        foreach($charges as $key => $value) {
            $charge_details[] = $this->finance_model->getPaymentCategoryById($value);
        }

        $taxes_details = [];
        foreach($charge_details as $charge_detail) {
            $taxes_details[] = $this->finance_model->getTaxById($charge_detail->tax_id);
        }

        $data['taxes'] = $taxes_details;

        $data['charge_details'] = $charge_details;
        $data['discount_details'] = $this->finance_model->getDiscountById($discount);


        echo json_encode($data);
    }



}

/* End of file finance.php */
/* Location: ./application/modules/finance/controllers/finance.php */