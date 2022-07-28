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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Doctor', 'Patient', 'CompanyUser'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        redirect('finance/financial_report');
    }

    public function invoices() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist', 'CompanyUser'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant', 'Receptionist'))) {
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

    public function addPayment() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant', 'Receptionist'))) {
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
        if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) {
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
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('add_payment_viewv2', $data);
            // $this->load->view('home/footer'); // just the footer file
        } else {
            redirect('home/permission');
        }
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) {
            redirect('home/permission');
        }
        $data['categories'] = $this->finance_model->getServiceCategory();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_payment_categoryv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addPaymentCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) {
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
        $this->form_validation->set_rules('c_price', 'Price', 'trim|min_length[1]|required|numeric|max_length[100]|xss_clean');
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
            $data = array('category' => $name,
                'description' => $description,
                'category_id' => $category_id,
                'c_price' => $c_price,
                'd_commission' => $d_commission,
                'staff_commission' => $s_commission,
                'service_category_group_id' => $service_type,
                'applicable_staff_id' => $staff,
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

                $this->finance_model->insertPaymentCategory($data);
                $this->session->set_flashdata('success', lang('record_added'));
            } else {
                if ($group == "Doctor") {
                    $this->doctor_model->updateDoctor($doctor_details->id, $doctor_data);
                }

                $this->finance_model->updatePaymentCategory($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            redirect('finance/paymentCategory');
        }
    }

    function editPaymentCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) {
            redirect('home/permission');
        }
        $data = array();
        $id = $this->input->get('id');
        $data['service'] = $this->finance_model->getPaymentCategoryById($id);
        $data['categories'] = $this->finance_model->getServiceCategory();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_payment_categoryv2', $data);
        // $this->load->view('home/footer'); // just the footer file
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

    public function expense() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist'))) {
            redirect('home/permission');
        }
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['expenses'] = $this->finance_model->getExpense();

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('expensev2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addExpenseView() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
            redirect('home/permission');
        }
        $id = $this->input->post('id');
        $category = $this->input->post('category');
        $date = time();
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
                    'category' => $category,
                    'date' => $date,
                    'datestring' => date('d/m/y', $date),
                    'amount' => $amount,
                    'note' => $note,
                    'user' => $user
                );
            } else {
                $data = array(
                    'category' => $category,
                    'amount' => $amount,
                    'note' => $note,
                    'user' => $user,
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant'))) {
            redirect('home/permission');
        }
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_expense_categoryv2');
        // $this->load->view('home/footer'); // just the header file
    }

    public function addExpenseCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Laboratorist'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
            redirect('home/permission');
        }
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_service_categoryv2');
        // $this->load->view('home/footer'); // just the header file
    }

    public function addServiceCategory() {
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
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
        if (!$this->ion_auth->in_group(array('admin', 'Accountant'))) {
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
            redirect('finance/patientPaymentHistory?patient=' . $patient);
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

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor'))) {
                $options1 = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('edit') . '" href="finance/editPayment?finance_id=' . $payment->invoice_number . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }

            $options2 = '<a class="btn btn-success btn-xs" title="' . lang('invoice') . '" href="finance/invoice?id=' . $payment->invoice_number . '"><i class="fa fa-file-invoice"></i> ' . lang('invoice') . '</a>';
            $options4 = '<a class="btn btn-info btn-xs" title="' . lang('print') . '" href="finance/printInvoice?id=' . $payment->invoice_number . '"target="_blank"> <i class="fa fa-print"></i> ' . lang('print') . '</a>';
            if ($this->ion_auth->in_group(array('admin'))) {
                $options3 = '<a class="btn btn-danger btn-xs" title="' . lang('delete') . '" href="finance/delete?id=' . $payment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>';
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

            $info[] = array(
                $date,
                $payment->invoice_number,
                $patient_details,
                $doctor,
                $settings->currency . '' . number_format($payment->amount,2),
                $settings->currency . '' . number_format($flat_discount,2),
                $settings->currency . '' . number_format($payment->gross_total,2),
                $settings->currency . '' . number_format(($this->finance_model->getDepositAmountByPaymentId($payment->id)),2),
                $settings->currency . '' . number_format(($payment->gross_total - $this->finance_model->getDepositAmountByPaymentId($payment->id)),2),
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


            if ($this->ion_auth->in_group(array('admin'))) {
                $options1 = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('edit') . '" href="finance/editExpense?id=' . $expense->id . '"><i class="fa fa-edit"> </i></a>';
            }

            $options2 = '<a class="btn btn-info btn-xs" title="' . lang('invoice') . '" style="color: #fff;" href="finance/expenseInvoice?id=' . $expense->id . '"><i class="fa fa-file"></i> </a>';
            //$options4 = '<a class="btn btn-info btn-xs invoicebutton" title="' . lang('print') . '" style="color: #fff;" href="finance/printInvoice?id=' . $payment->id . '"target="_blank"> <i class="fa fa-print"></i> ' . lang('print') . '</a>';
            if ($this->ion_auth->in_group(array('admin'))) {
                $options3 = '<a class="btn btn-danger btn-xs" title="' . lang('delete') . '" href="finance/deleteExpense?id=' . $expense->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> </a>';
            }

            if (empty($options1)) {
                $options1 = '';
            }

            if (empty($options3)) {
                $options3 = '';
            }


            $info[] = array(
                $expense->category,
                date('d/m/y', $expense->date),
                $expense->note,
                $settings->currency . '' . $expense->amount,
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

}

/* End of file finance.php */
/* Location: ./application/modules/finance/controllers/finance.php */