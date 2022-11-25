<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Finance_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertPayment($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('invoice', $data2);
    }

    function insertInvoiceItem($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('invoice_item', $data2);
    }

    function getInvoiceItemsByPaymentId($id) {
        $this->db->where('invoice_id', $id);
        $query = $this->db->get('invoice_item');
        return $query->result();
    }

    function getPayment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_by('invoice_group_number');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getInvoiceByGrouoNumber($group) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('invoice_group_number', $group);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getPaymentCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('invoice');
        return $query->num_rows();
    }    

    function getPaymentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('invoice')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR amount LIKE '%" . $search . "%' OR gross_total LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%'OR patient_phone LIKE '%" . $search . "%'OR patient_address LIKE '%" . $search . "%'OR remarks LIKE '%" . $search . "%'OR doctor_name LIKE '%" . $search . "%'OR flat_discount LIKE '%" . $search . "%'OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->group_by('invoice_group_number')
                ->get();

        return $query->result();
    }

    function getPaymentByCompanyIdBySearch($company_id, $search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('invoice')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('company_id', $company_id)
                ->where("(id LIKE '%" . $search . "%' OR amount LIKE '%" . $search . "%' OR gross_total LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%'OR patient_phone LIKE '%" . $search . "%'OR patient_address LIKE '%" . $search . "%'OR remarks LIKE '%" . $search . "%'OR doctor_name LIKE '%" . $search . "%'OR flat_discount LIKE '%" . $search . "%'OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->group_by('invoice_group_number')
                ->get();

        return $query->result();
    }

    function getPaymentByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_by('invoice_group_number');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getPaymentByCompanyIdByLimit($company_id, $limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('company_id', $company_id);
        $this->db->group_by('invoice_group_number');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getGatewayByName($name) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('name', $name);
        $query = $this->db->get('paymentGateway')->row();
        return $query;
    }

    function getPaymentByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('invoice')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR amount LIKE '%" . $search . "%' OR gross_total LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%'OR patient_phone LIKE '%" . $search . "%'OR patient_address LIKE '%" . $search . "%'OR remarks LIKE '%" . $search . "%'OR doctor_name LIKE '%" . $search . "%'OR flat_discount LIKE '%" . $search . "%'OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->group_by('invoice_group_number')
                ->get();

        return $query->result();
    }

    function getPaymentByCompanyIdByLimitBySearch($company_id, $limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('invoice')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('company_id', $company_id)
                ->where("(id LIKE '%" . $search . "%' OR amount LIKE '%" . $search . "%' OR gross_total LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%'OR patient_phone LIKE '%" . $search . "%'OR patient_address LIKE '%" . $search . "%'OR remarks LIKE '%" . $search . "%'OR doctor_name LIKE '%" . $search . "%'OR flat_discount LIKE '%" . $search . "%'OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->group_by('invoice_group_number')
                ->get();

        return $query->result();
    }
    function getPaymentById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('invoice');
        return $query->row();
    }

    function getPaymentByFinanceNumber($invoice_number) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('invoice_number', $invoice_number);
        $query = $this->db->get('invoice');
        return $query->row();
    }

    function getPaymentByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getPaymentByPatientIdByDoctorId($id, $doctor_id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $this->db->where('doctor', $doctor_id);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getPaymentByPatientIdByVisitedProviderId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $query = $this->db->get('invoice');
        return $query->result();
    }



    function getPaymentByPatientIdByDate($id, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient', $id);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getPaymentByUserId($id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('user', $id);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getPaymentByCompanyId($id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('company_id', $id);
        $this->db->group_by('invoice_group_number');
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function thisMonthPayment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('invoice')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('m/Y', time()) == date('m/Y', $q->date)) {
                $total[] = $q->gross_total;
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisMonthExpense() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('expense')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('m/Y', time()) == date('m/Y', $q->date)) {
                $total[] = $q->amount;
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisMonthAppointment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('appointment')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('m/Y', time()) == date('m/Y', $q->date)) {
                $total[] = '1';
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisDayPayment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('invoice')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('d/m/Y', time()) == date('d/m/Y', $q->date)) {
                $total[] = $q->gross_total;
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisDayExpense() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('expense')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('d/m/Y', time()) == date('d/m/Y', $q->date)) {
                $total[] = $q->amount;
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisDayAppointment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('appointment')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('d/m/Y', time()) == date('d/m/Y', $q->date)) {
                $total[] = '1';
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisYearPayment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('invoice')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('Y', time()) == date('Y', $q->date)) {
                $total[] = $q->gross_total;
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisYearExpense() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('expense')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('Y', time()) == date('Y', $q->date)) {
                $total[] = $q->amount;
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisYearAppointment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('appointment')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('Y', time()) == date('Y', $q->date)) {
                $total[] = '1';
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisMonthAppointmentTreated() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('appointment')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('m/Y', time()) == date('m/Y', $q->date)) {
                if ($q->status == 'Treated') {
                    $total[] = '1';
                }
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function thisMonthAppointmentCancelled() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('appointment')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('m/Y', time()) == date('m/Y', $q->date)) {
                if ($q->status == 'Cancelled') {
                    $total[] = '1';
                }
            }
        }
        if (!empty($total)) {
            return array_sum($total);
        } else {
            return 0;
        }
    }

    function getPaymentPerMonthThisYear() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('invoice')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('Y', time()) == date('Y', $q->date)) {
                if (date('m', $q->date) == '01') {
                    $total['january'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '02') {
                    $total['february'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '03') {
                    $total['march'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '04') {
                    $total['april'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '05') {
                    $total['may'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '06') {
                    $total['june'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '07') {
                    $total['july'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '08') {
                    $total['august'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '09') {
                    $total['september'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '10') {
                    $total['october'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '11') {
                    $total['november'][] = $q->gross_total;
                }
                if (date('m', $q->date) == '12') {
                    $total['december'][] = $q->gross_total;
                }
            }
        }


        if (!empty($total['january'])) {
            $total['january'] = array_sum($total['january']);
        } else {
            $total['january'] = 0;
        }
        if (!empty($total['february'])) {
            $total['february'] = array_sum($total['february']);
        } else {
            $total['february'] = 0;
        }
        if (!empty($total['march'])) {
            $total['march'] = array_sum($total['march']);
        } else {
            $total['march'] = 0;
        }
        if (!empty($total['april'])) {
            $total['april'] = array_sum($total['april']);
        } else {
            $total['april'] = 0;
        }
        if (!empty($total['may'])) {
            $total['may'] = array_sum($total['may']);
        } else {
            $total['may'] = 0;
        }
        if (!empty($total['june'])) {
            $total['june'] = array_sum($total['june']);
        } else {
            $total['june'] = 0;
        }
        if (!empty($total['july'])) {
            $total['july'] = array_sum($total['july']);
        } else {
            $total['july'] = 0;
        }
        if (!empty($total['august'])) {
            $total['august'] = array_sum($total['august']);
        } else {
            $total['august'] = 0;
        }
        if (!empty($total['september'])) {
            $total['september'] = array_sum($total['september']);
        } else {
            $total['september'] = 0;
        }
        if (!empty($total['october'])) {
            $total['october'] = array_sum($total['october']);
        } else {
            $total['october'] = 0;
        }
        if (!empty($total['november'])) {
            $total['november'] = array_sum($total['november']);
        } else {
            $total['november'] = 0;
        }
        if (!empty($total['december'])) {
            $total['december'] = array_sum($total['december']);
        } else {
            $total['december'] = 0;
        }

        return $total;
    }

    function getExpensePerMonthThisYear() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('expense')->result();
        $total = array();
        foreach ($query as $q) {
            if (date('Y', time()) == date('Y', $q->date)) {
                if (date('m', $q->date) == '01') {
                    $total['january'][] = $q->amount;
                }
                if (date('m', $q->date) == '02') {
                    $total['february'][] = $q->amount;
                }
                if (date('m', $q->date) == '03') {
                    $total['march'][] = $q->amount;
                }
                if (date('m', $q->date) == '04') {
                    $total['april'][] = $q->amount;
                }
                if (date('m', $q->date) == '05') {
                    $total['may'][] = $q->amount;
                }
                if (date('m', $q->date) == '06') {
                    $total['june'][] = $q->amount;
                }
                if (date('m', $q->date) == '07') {
                    $total['july'][] = $q->amount;
                }
                if (date('m', $q->date) == '08') {
                    $total['august'][] = $q->amount;
                }
                if (date('m', $q->date) == '09') {
                    $total['september'][] = $q->amount;
                }
                if (date('m', $q->date) == '10') {
                    $total['october'][] = $q->amount;
                }
                if (date('m', $q->date) == '11') {
                    $total['november'][] = $q->amount;
                }
                if (date('m', $q->date) == '12') {
                    $total['december'][] = $q->amount;
                }
            }
        }


        if (!empty($total['january'])) {
            $total['january'] = array_sum($total['january']);
        } else {
            $total['january'] = 0;
        }
        if (!empty($total['february'])) {
            $total['february'] = array_sum($total['february']);
        } else {
            $total['february'] = 0;
        }
        if (!empty($total['march'])) {
            $total['march'] = array_sum($total['march']);
        } else {
            $total['march'] = 0;
        }
        if (!empty($total['april'])) {
            $total['april'] = array_sum($total['april']);
        } else {
            $total['april'] = 0;
        }
        if (!empty($total['may'])) {
            $total['may'] = array_sum($total['may']);
        } else {
            $total['may'] = 0;
        }
        if (!empty($total['june'])) {
            $total['june'] = array_sum($total['june']);
        } else {
            $total['june'] = 0;
        }
        if (!empty($total['july'])) {
            $total['july'] = array_sum($total['july']);
        } else {
            $total['july'] = 0;
        }
        if (!empty($total['august'])) {
            $total['august'] = array_sum($total['august']);
        } else {
            $total['august'] = 0;
        }
        if (!empty($total['september'])) {
            $total['september'] = array_sum($total['september']);
        } else {
            $total['september'] = 0;
        }
        if (!empty($total['october'])) {
            $total['october'] = array_sum($total['october']);
        } else {
            $total['october'] = 0;
        }
        if (!empty($total['november'])) {
            $total['november'] = array_sum($total['november']);
        } else {
            $total['november'] = 0;
        }
        if (!empty($total['december'])) {
            $total['december'] = array_sum($total['december']);
        } else {
            $total['december'] = 0;
        }

        return $total;
    }

    function getOtPaymentByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $query = $this->db->get('ot_payment');
        return $query->result();
    }

    function getOtPaymentByUserId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('user', $id);
        $query = $this->db->get('ot_payment');
        return $query->result();
    }

    function getOtPaymentByCompanyId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('company_id', $id);
        $query = $this->db->get('ot_payment');
        return $query->result();
    }

    function insertDeposit($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient_deposit', $data2);
    }

    function getDeposit() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('patient_deposit');
        return $query->result();
    }

    function updateDeposit($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('patient_deposit', $data);
    }

    function getDepositById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('patient_deposit');
        return $query->row();
    }

    function getDepositByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $query = $this->db->get('patient_deposit');
        return $query->result();
    }

    function getDepositByPatientIdByDate($id, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient', $id);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get('patient_deposit');
        return $query->result();
    }

    function getDepositByUserId($id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('user', $id);
        $query = $this->db->get('patient_deposit');
        return $query->result();
    }

    function getDepositByCompanyId($id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('company_id', $id);
        $query = $this->db->get('patient_deposit');
        return $query->result();
    }    

    function deleteDeposit($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient_deposit');
    }

    function deleteDepositByInvoiceId($id) {
        $this->db->where('payment_id', $id);
        $this->db->delete('patient_deposit');
    }

    function getPaymentByPatientIdByStatus($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient', $id);
        $this->db->where('status', 'unpaid');
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function getOtPaymentByPatientIdByStatus($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient', $id);
        $this->db->where('status', 'unpaid');
        $query = $this->db->get('ot_payment');
        return $query->result();
    }

    function updatePayment($id, $data) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $this->db->update('invoice', $data);
    }

    function insertOtPayment($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('ot_payment', $data2);
    }

    function getOtPayment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('ot_payment');
        return $query->result();
    }

    function getOtPaymentById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('ot_payment');
        return $query->row();
    }

    function updateOtPayment($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('ot_payment', $data);
    }

    function deleteOtPayment($id) {
        $this->db->where('id', $id);
        $this->db->delete('ot_payment');
    }

    function insertPaymentCategory($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('charge', $data2);
    }

    function getPaymentCategory() {
        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        // $this->db->where('deleted', null);
        // $query = $this->db->get('charge');
        $query = $this->db->select('*')
                ->from('charge')
                ->group_start()
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where('deleted', null)
                    ->or_where('deleted', 0)
                ->group_end()
                ->group_by('group_id')
                ->get();
        return $query->result();
    }

    function getChargesByCompanyId($payer_accounts) {
        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        // $this->db->where('deleted', null);
        // $query = $this->db->get('charge');
        $query = $this->db->select('*')
                ->from('charge')
                ->group_start()
                    ->where('payer_account_id', $payer_accounts)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where('deleted', null)
                    ->or_where('deleted', 0)
                ->group_end()
                ->get();
        return $query->result();
    }

    function getPaymentCategoryByServiceGroup() {
        // $valid_group_display = 'clinic_consultation_service,doctor_teleconsult_service';
        // $this->db->where("FIND_IN_SET(name, '".$valid_group_display."')");
        $group_details = $this->db->get('service_category_group')->result();
        $group_id = [];
        foreach ($group_details as $group_detail) {
            $group_id[] = $group_detail->id;
        }
        $valid_group = implode(',', $group_id);

        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        // $this->db->where("FIND_IN_SET(service_category_group_id, '".$valid_group."')");
        // $query = $this->db->get('charge');

        $query = $this->db->select('*')
                ->from('charge')
                ->group_start()
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("FIND_IN_SET(service_category_group_id, '".$valid_group."')")
                    ->where('deleted', null)
                    ->or_where('deleted', 0)
                ->group_end()
                ->get();
        return $query->result();
    }

    function getChargeCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('charge');
        return $query->result();
    }
    
    function getPaymentCategoryById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('charge');
        return $query->row();
    }

    function getPaymentCategoryByGroupId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_start();
            $this->db->where('deleted', null);
            $this->db->or_where('deleted', 0);
        $this->db->group_end();
        $this->db->where('group_id', $id);
        $query = $this->db->get('charge');
        return $query->result();
    }

    function getPaymentCategoryByGroupIdByPayerId($id, $payer) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('group_id', $id);
        $this->db->where('payer_account_id', $payer);
        $query = $this->db->get('charge');
        return $query->row();
    }

    function getDoctorCommissionByCategory($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('charge');
        return $query->row();
    }

    function getChargesWithCopay() {
        $this->db->select('group_id, COUNT(group_id) as total');
        $this->db->group_by('group_id'); 
        $this->db->order_by('total', 'desc'); 
        $query = $this->db->get('charge');
        return $query->result();
    }

    function updatePaymentCategory($id, $data) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $this->db->update('charge', $data);
    }

    function deletePayment($id) {
        $this->db->where('id', $id);
        $this->db->delete('invoice');
    }

    function deletePaymentCategory($id) {
        $this->db->where('id', $id);
        $this->db->delete('charge');
    }

    function deleteCharge($id, $data) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $this->db->update('charge', $data);
    }

    function insertExpense($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('expense', $data2);
    }

    function getExpense() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('expense');
        return $query->result();
    }

    function getExpenseCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('expense');
        return $query->num_rows();
    }

    function getExpenseBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('expense')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR amount LIKE '%" . $search . "%' OR datestring LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getExpenseBySearchCount($search) {
        $query = $this->db->select('*')
                ->from('expense')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR amount LIKE '%" . $search . "%' OR datestring LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getExpenseByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('expense');
        return $query->result();
    }

    function getExpenseByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('expense')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR amount LIKE '%" . $search . "%' OR datestring LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getExpenseById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('expense');
        return $query->row();
    }

    function updateExpense($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('expense', $data);
    }

    function insertExpenseCategory($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('expense_category', $data2);
    }

    function getExpenseCategory() {
        $query = $this->db->select('*')
                ->from('expense_category')
                ->group_start()
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->or_where(array('hospital_id'=> NULL))
                ->group_end()
                ->get();
        return $query->result();
    }

    function getExpenseCategoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('expense_category');
        return $query->row();
    }

    function insertServiceCategory($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('service_category', $data2);
    }

    function getServiceCategory() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->or_where(array('hospital_id'=> NULL));
        $query = $this->db->get('service_category');
        return $query->result();
    }

    function getServiceCategoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('service_category');
        return $query->row();
    }

    function getServiceCategoryGroupByEntityType($searchTerm) {
        $settings = $this->settings_model->getSettings()->entity_type_id;
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('service_category_group')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $this->db->where("FIND_IN_SET($settings, applicable_entity_type)");
            $fetched_records = $this->db->get('service_category_group');
            $users = $fetched_records->result_array();
        }


        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('*');
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get('doctor');
        //     $users = $fetched_records->result_array();
        // }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['display_name']);
        }
        return $data;
    }

    function getTaxById($id) {
        $this->db->group_start();
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->or_where('hospital_id', null);
        $this->db->group_end();
        $this->db->where('id', $id);
        $query = $this->db->get('tax');
        return $query->row();
    }

    function getTax() {
        $country = $this->settings_model->getSettings()->country_id;
        $query = $this->db->select('*')
                ->from('tax')
                ->group_start()
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->or_where('hospital_id', null)
                ->group_end()
                ->group_start()
                    ->where('applicable_country_id', $country)
                    ->or_where('applicable_country_id', null)
                ->group_end()
                ->get();

        return $query->result();
    }

    function getTaxByApplicableCountryId($searchTerm) {
        $country = $this->settings_model->getSettings()->country_id;
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('tax')
                    ->group_start()
                        ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                        ->where('applicable_country_id', $country)
                        ->or_where('applicable_country_id', null)
                    ->group_end()
                    ->group_start()
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->or_where('hospital_id', null)
                    ->group_end()
                    ->get();
            $taxes = $query->result_array();
        } else {
            $query = $this->db->select('*')
                    ->from('tax')
                    ->group_start()
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->or_where('hospital_id', null)
                    ->group_end()
                    ->group_start()
                        ->where('applicable_country_id', $country)
                        ->or_where('applicable_country_id', null)
                    ->group_end()
                    ->get();
            $taxes = $query->result_array();
        }


        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('*');
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get('doctor');
        //     $users = $fetched_records->result_array();
        // }


        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => "0", "text" => "None");
        foreach ($taxes as $tax) {
            $data[] = array("id" => $tax['id'], "text" => $tax['name']);
        }
        return $data;
    }

    function getStaffInfo($searchTerm) {
        // $settings = $this->settings_model->getSettings()->entity_type_id;
        // if (!empty($searchTerm)) {
        //     $query = $this->db->select('a.id as user_id, a.username as user_username')
        //             ->from('users a')
        //             ->join('users_groups')
        //             ->where("(a.id LIKE '%" . $searchTerm . "%' OR a.username LIKE '%" . $searchTerm . "%')", NULL, FALSE)
        //             ->get();
        //     $users = $query->result_array();
        // } else {
        //     $this->db->select('a.id as user_id, a.username as user_username');
        //     $this->db->from('users a');
        //     $this->db->limit(10);
        //     $fetched_records = $this->db->get();
        //     $users = $fetched_records->result_array();
        // }


        // // if ($this->ion_auth->in_group(array('Doctor'))) {
        // //     $doctor_ion_id = $this->ion_auth->get_user_id();
        // //     $this->db->select('*');
        // //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        // //     $this->db->where('ion_user_id', $doctor_ion_id);
        // //     $fetched_records = $this->db->get('doctor');
        // //     $users = $fetched_records->result_array();
        // // }


        // // Initialize Array with fetched data
        // $data = array();
        // foreach ($users as $user) {
        //     $data[] = array("id" => $user['user_id'], "text" => $user['user_username']);
        // }
        // return $data;

        $valid_users = '4,6';
        $user = $this->ion_auth->get_user_id();
        $user_hospital_ion = $this->db->select('hospital_ion_id')
                                    ->where('id', $user)
                                    ->get('users')
                                    ->row();
        // $user_groups = $this->getUsersByValidUsers($valid_users);

        if (!empty($searchTerm)) {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->where('hospital_ion_id', $user_hospital_ion->hospital_ion_id);
            $this->db->where("(a.user_id LIKE '%" . $searchTerm . "%' OR b.username LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->where('hospital_ion_id', $user_hospital_ion->hospital_ion_id);
            $this->db->limit(10);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        }

        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('a.user_id, a.group_id, b.username, c.name');
        //     $this->db->from('users_groups a');
        //     $this->db->join('users b', 'b.id=a.user_id', 'left');
        //     $this->db->join('groups c', 'c.id=a.group_id', 'left');
        //     $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get();
        //     $users = $fetched_records->result_array();
        // }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['user_id'], "text" => $user['username'].' ('.$user['name'].')');
        }
        return $data;
    }

    function getServiceCategoryGroupById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('service_category_group');
        return $query->row();
    }

    function updateExpenseCategory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('expense_category', $data);
    }

    function updateServiceCategory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('service_category', $data);
    }

    function deleteExpense($id) {
        $this->db->where('id', $id);
        $this->db->delete('expense');
    }

    function deleteExpenseCategory($id) {
        $this->db->where('id', $id);
        $this->db->delete('expense_category');
    }

    function deleteServiceCategory($id) {
        $this->db->where('id', $id);
        $this->db->delete('service_category');
    }

    function getDiscountType() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('settings');
        return $query->row()->discount;
    }

    function getPaymentByDoctor($doctor) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $doctor);
        $query = $this->db->get();
        return $query->result();
    }

    function getDepositAmountByPaymentId($payment_id) {
        $this->db->select('*');
        $this->db->from('patient_deposit');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('payment_id', $payment_id);
        $query = $this->db->get();
        $total = array();
        $deposited_total = array();
        $total = $query->result();

        foreach ($total as $deposit) {
            $deposited_total[] = $deposit->deposited_amount;
        }

        if (!empty($deposited_total)) {
            $deposited_total = array_sum($deposited_total);
        } else {
            $deposited_total = 0;
        }

        return $deposited_total;
    }

    function getPaymentByDate($date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getPaymentByDoctorDate($doctor, $date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $doctor);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getDepositByPaymentId($payment_id) {
        $this->db->select('*');
        $this->db->from('patient_deposit');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('payment_id', $payment_id);
        $query = $this->db->get();
        $total = array();
        $deposited_total = array();
        $total = $query->result();
        return $total;
    }

    function getOtPaymentByDate($date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('ot_payment');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getDepositsByDate($date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('patient_deposit');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getExpenseByDate($date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function makeStatusPaid($id, $patient_id, $data, $data1) {
        $this->db->where('patient', $patient_id);
        $this->db->where('status', 'paid-last');
        $this->db->update('invoice', $data);
        $this->db->where('id', $id);
        $this->db->update('invoice', $data1);
    }

    function makePaidByPatientIdByStatus($id, $data, $data1) {
        $this->db->where('patient', $id);
        $this->db->where('status', 'paid-last');
        $this->db->update('invoice', $data1);

        $this->db->where('patient', $id);
        $this->db->where('status', 'paid-last');
        $this->db->update('ot_payment', $data1);

        $this->db->where('patient', $id);
        $this->db->where('status', 'unpaid');
        $this->db->update('invoice', $data);

        $this->db->where('patient', $id);
        $this->db->where('status', 'unpaid');
        $this->db->update('ot_payment', $data);
    }

    function makeOtStatusPaid($id) {
        $this->db->where('id', $id);
        $this->db->update('ot_payment', array('status' => 'paid'));
    }

    function lastPaidInvoice($id) {
        $this->db->where('patient', $id);
        $this->db->where('status', 'paid-last');
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function lastOtPaidInvoice($id) {
        $this->db->where('patient', $id);
        $this->db->where('status', 'paid-last');
        $query = $this->db->get('ot_payment');
        return $query->result();
    }

    function amountReceived($id, $data) {
        $this->db->where('id', $id);
        $query = $this->db->update('invoice', $data);
    }

    function otAmountReceived($id, $data) {
        $this->db->where('id', $id);
        $query = $this->db->update('ot_payment', $data);
    }

    function getThisMonth() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $payments = $this->db->get('invoice')->result();
        foreach ($payments as $payment) {
            if (date('m/y', $payment->date) == date('m/y', time())) {
                $this_month_payment[] = $payment->gross_total;
            }
        }
        if (!empty($this_month_payment)) {
            $this_month_payment = array_sum($this_month_payment);
        } else {
            $this_month_payment = 0;
        }

        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $expenses = $this->db->get('expense')->result();
        foreach ($expenses as $expense) {
            if (date('m/y', $expense->date) == date('m/y', time())) {
                $this_month_expense[] = $expense->amount;
            }
        }

        if (!empty($this_month_expense)) {
            $this_month_expense = array_sum($this_month_expense);
        } else {
            $this_month_expense = 0;
        }

        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $appointments = $this->db->get('appointment')->result();
        foreach ($appointments as $appointment) {
            if (date('m/y', $appointment->date) == date('m/y', time())) {
                $this_month_appointment[] = 1;
            }
        }

        if (!empty($this_month_appointment)) {
            $this_month_appointment = array_sum($this_month_appointment);
        } else {
            $this_month_appointment = 0;
        }

        $this_month_details = array($this_month_payment, $this_month_expense, $this_month_appointment);
        return $this_month_details;
    }

    function getPaymentByUserIdByDate($user, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('user', $user);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getPaymentByCompanyIdByDate($company, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('company_id', $company);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getOtPaymentByUserIdByDate($user, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('ot_payment');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('user', $user);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getOtPaymentByCompanyIdByDate($company, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('ot_payment');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('company_id', $company);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getDepositByUserIdByDate($user, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('patient_deposit');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('user', $user);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getDepositByCompanyIdByDate($company, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('patient_deposit');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('company_id', $company);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getDueBalanceByPatientId($patient) {
        $query = $this->db->get_where('invoice', array('patient' => $patient->id))->result();
        $deposits = $this->db->get_where('patient_deposit', array('patient' => $patient->id))->result();
        $balance = array();
        $deposit_balance = array();
        foreach ($query as $gross) {
            $balance[] = $gross->gross_total;
        }
        $balance = array_sum($balance);


        foreach ($deposits as $deposit) {
            $deposit_balance[] = $deposit->deposited_amount;
        }
        $deposit_balance = array_sum($deposit_balance);



        $bill_balance = $balance;

        return $due_balance = $bill_balance - $deposit_balance;
    }

    function getFirstRowPaymentById() {

        //  $this->load->database();
        $last = $this->db->order_by('id', "asc")
                ->limit(1)
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->get('invoice')
                ->row();
        return $last;
    }

    function getLastRowPaymentById() {

        // $this->load->database();
        $last = $this->db->order_by('id', "desc")
                ->limit(1)
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->get('invoice')
                ->row();
        return $last;
    }

    function getPreviousPaymentById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('invoice');
        return $query->previous_row();
    }

    function getNextPaymentById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('invoice');
        return $query->row();
    }

    function getInvoiceStatusByCompanyClassificationName($name, $user) {
        $this->db->where('applicable_account_classification', $name);
        $this->db->where("FIND_IN_SET('".$user."', applicable_user_group)");
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('invoice_payment_status');
        return $query->result();

    }

    function getInvoicePaymentStatusById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('invoice_payment_status');
        return $query->row();
    }

    function getPaymentByEncounterIdByPatientId($encounter_id, $patient_id) {
        $this->db->where('encounter_id', $encounter_id);
        $this->db->where('patient', $patient_id);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    function validateInvoiceNumber($invoice_number) {
        $this->db->where('invoice_number', $invoice_number);
        $query = $this->db->get('invoice');
        return $query->row();
    }

    function validateInvoiceGroupNumber($invoice_group_number) {
        $this->db->where('invoice_group_number', $invoice_group_number);
        $query = $this->db->get('invoice');
        return $query->row();
    }

    function checkPhysicalChargesListByApplicableStaffId($id) {
        $this->db->where('service_category_group_id', 9);
        $this->db->where('applicable_staff_id', $id);
        $query = $this->db->get('charge');
        return $query->num_rows();
    }

    function checkVirtualChargesListByApplicableStaffId($id) {
        $this->db->where('service_category_group_id', 10);
        $this->db->where('applicable_staff_id', $id);
        $query = $this->db->get('charge');
        return $query->num_rows();
    }

    function getDiscountById($id) {
        $this->db->group_start();
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->or_where('hospital_id', null);
        $this->db->group_end();
        $this->db->where('id', $id);
        $query = $this->db->get('discount');
        return $query->row();
    }

    function getDiscountInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('discount')
                    // ->where('hospital_id', $this->session->userdata('hospital_id'))
                    // ->or_where('hospital_id', null)
                    //->where('is_invoice_visible', 1)
                    ->group_start()
                        ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%' OR description LIKE '%" . $searchTerm . "%')", NULL, TRUE)
                    ->group_end()
                    ->group_start()
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->or_where('hospital_id', null)
                    ->group_end()
                    ->get();
            $discounts = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->group_start();
                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                $this->db->or_where('hospital_id', null);
            $this->db->group_end();
            $this->db->limit(10);
            $fetched_records = $this->db->get('discount');
            $discounts = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($discounts as $discount) {
            $rate = $discount['rate'];
            $amount = $discount['amount'];
            $discount_type_id = $discount['discount_type_id'];
            // if (empty($rate)) {
            //     $rate = $discount['amount'];
            // }
            $data[] = array("id" => $discount['id'], "text" => $discount['name'], "rate" => $rate, "amount" => $amount, "discount_type_id" => $discount_type_id);
        }
        return $data;
    } 

    function getDiscountTypeById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('discount_type');
        return $query->row();
    }

}
