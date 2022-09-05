<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertPatient($data) {
        $data1 = array(
            'hospital_id' => $this->session->userdata('hospital_id'),
            'visited_provider_id' => $this->session->userdata('hospital_id'),
            'isolated_provider_id' => $this->session->userdata('hospital_id'),
        );
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient', $data2);
    }

    function insertPatientInSystemHospital($data) {
        $hospital_id = 1;
        $data1 = array(
            'hospital_id' => $hospital_id,
            'visited_provider_id' => $hospital_id,
            'isolated_provider_id' => $hospital_id,
        );
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient', $data2);
    }

    function getPatient() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByVisitedProviderId() {
        $provider = $this->session->userdata('hospital_id');
        $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientListByDoctorId($id) {
        $this->db->where("FIND_IN_SET($id,doctor) > 0");
        $this->db->order_by('id','desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientListByDoctorIdByVisitedProviderId($id) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
        $this->db->where("FIND_IN_SET($id,doctor) > 0");
        $this->db->order_by('id','desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientListByVisitedProviderId($id) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
        $this->db->order_by('id','desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient');
        return $query->num_rows();
    }

    function getLimit() {
        $current = $this->db->get_where('patient', array('hospital_id' => $this->session->userdata('hospital_id')))->num_rows();
        $limit = $this->db->get_where('hospital', array('id' => $this->session->userdata('hospital_id')))->row()->p_limit;
        if (!is_numeric($limit)) {
            $limit = 0;
        }
        return $limit - $current;
    }

    function getPatientBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('patient')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientBySearchByVisitedProviderId($search) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('patient')
                ->where("FIND_IN_SET($provider,visited_provider_id) > 0")
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientListBySearchByDoctorId($search, $id) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('patient')
                ->where("FIND_IN_SET($id,doctor) > 0")
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientListBySearchByDoctorIdByVisitedProviderId($search, $id) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('patient')
                ->where("FIND_IN_SET($provider,visited_provider_id) > 0")
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('patient')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->num_rows();
    }

    function getPatientByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByLimitByVisitedProviderId($limit, $start) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByLimitByDoctorId($limit, $start, $id) {
        $this->db->where("FIND_IN_SET($id,doctor) > 0");
        $this->db->order_by('id','desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByLimitByDoctorIdByVisitedProviderId($limit, $start, $id) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
        $this->db->where("FIND_IN_SET($id,doctor) > 0");
        $this->db->order_by('id','desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('patient')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientByLimitBySearchByVisitedProviderId($limit, $start, $search) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('patient')
                ->where("FIND_IN_SET($provider,visited_provider_id) > 0")
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientByLimitBySearchByDoctorId($limit, $start, $search, $id) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('patient')
                ->where("FIND_IN_SET($id,doctor) > 0")
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientByLimitBySearchByDoctorIdByVisitedProviderId($limit, $start, $search, $id) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('patient')
                ->where("FIND_IN_SET($provider,visited_provider_id) > 0")
                ->where("FIND_IN_SET($id,doctor) > 0")
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientById($id, $provider = null) {
        if ($provider !== 0) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getPatientByIdByVisitedProviderId($id) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
        $this->db->where('id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getPatientByPatientNumber($id) {
        $this->db->where('patient_id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getDocumentCategory($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('document_upload_category');
        return $query->row();
    }

    function getDocumentCategories() {        
        $query = $this->db->get('document_upload_category');
        return $query->result();
    }

    function getPatientByIonUserId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getPatientByEmail($email) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('email', $email);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function updatePatient($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient');
    }

    function insertMedicalHistory($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('case_note', $data2);
    }

    function getMedicalHistoryByPatientId($id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getMedicalHistoryByPatientIdByEncounterId($id, $encounter_id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $this->db->where('encounter_id', $encounter_id);
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getLatestMedicalHistoryByPatientId($id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getMedicalHistory() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getMedicalHistoryBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('case_note')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getMedicalHistoryByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getMedicalHistoryByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('case_note')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getMedicalHistoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('case_note');
        return $query->row();
    }

    function getMedicalHistoryByCaseNoteNumber($case_note_number) {
        $this->db->where('case_note_number', $case_note_number);
        $query = $this->db->get('case_note');
        return $query->row();
    }

    function getMedicalHistoryByEncounterId($id) {
        $this->db->where('encounter_id', $id);
        $query = $this->db->get('case_note');
        return $query->row();
    }

    function updateMedicalHistory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('case_note', $data);
    }

    function insertDiagnosticReport($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('diagnostic_report', $data2);
    }

    function updateDiagnosticReport($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('diagnostic_report', $data);
    }

    function getDiagnosticReport() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('diagnostic_report');
        return $query->result();
    }

    function getDiagnosticReportById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->row();
    }

    function getDiagnosticReportByInvoiceId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('invoice', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->row();
    }

    function getDiagnosticReportByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->result();
    }

    function insertPatientMaterial($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient_material', $data2);
    }

    function updatePatientMaterial($id, $data) {
        $this->db->where('id',$id);
        $this->db->update('patient_material', $data);
    }

    function getPatientMaterial() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getPatientMaterialCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient_material');
        return $query->num_rows();
    }

    function getDocumentBySearch($search) {       
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('patient_material')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR title LIKE '%" . $search . "%' OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();            
    }

    function getDocumentBySearchCount($search) {       
        $query = $this->db->select('id')
                ->from('patient_material')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR title LIKE '%" . $search . "%' OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->num_rows();            
    }

    function getDocumentByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getDocumentByLimitBySearch($limit, $start, $search) {               
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('patient_material')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR title LIKE '%" . $search . "%' OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();       
    }

    function getPatientMaterialById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('patient_material');
        return $query->row();
    }

    function getPatientMaterialByDocumentNumber($document_number) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_document_number', $document_number);
        $query = $this->db->get('patient_material');
        return $query->row();
    }

    function getPatientMaterialByEncounterId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('encounter_id', $id);
        $query = $this->db->get('patient_material');
        return $query->row();
    }

    function getPatientMaterialByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getPatientMaterialByPatientIdByEncounterId($id, $encounter_id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $this->db->where('encounter_id', $encounter_id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function deletePatientMaterial($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient_material');
    }

    function deleteMedicalHistory($id) {
        $this->db->where('id', $id);
        $this->db->delete('case_note');
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        if (!empty($password)) {
            $uptade_ion_user = array(
                'username' => $username,
                'email' => $email,
                'password' => $password
            );
        } else {
            $uptade_ion_user = array(
                'username' => $username,
                'email' => $email,
            );
        }
        // $uptade_ion_user = array(
        //     'username' => $username,
        //     'email' => $email,
        //     'password' => $password
        // );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    function getDueBalanceByPatientId($patient) {
        $query = $this->db->get_where('invoice', array('patient' => $patient))->result();
        $deposits = $this->db->get_where('patient_deposit', array('patient' => $patient))->result();
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

    function getDueBalanceByPatientIdByProviderId($patient, $provider) {
        if (!empty($provider)) {
            $query = $this->db->get_where('invoice', array('patient' => $patient, 'hospital_id' => $provider))->result();
            $deposits = $this->db->get_where('patient_deposit', array('patient' => $patient, 'hospital_id' => $provider))->result();
        } else {
            $query = $this->db->get_where('invoice', array('patient' => $patient))->result();
            $deposits = $this->db->get_where('patient_deposit', array('patient' => $patient))->result();
        }
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

    function getDueBalanceByPatientIdByDoctorIdByProviderId($patient, $doctor, $provider) {
        $query = $this->db->get_where('invoice', array('patient' => $patient, 'hospital_id' => $this->session->userdata('hospital_id')))->result();
        $invoice_id = [];
        foreach($query as $que) {
            $invoice_id[] = $que->id;
        }
        $deposits = [];
        foreach($invoice_id as $invoice) {
            $this->db->where('payment_id', $invoice);
            $deposits[] = $this->db->get('patient_deposit')->row();
        }
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

    function getPatientInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getIdType($provider_country) {
        $this->db->where('applicable_country_id', $provider_country);
        $this->db->or_where('applicable_country_id', null);
        $query = $this->db->get('id_type');
        return $query->result();
    }

    function getIdTypeInfo($searchTerm, $provider_country) {

        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where('applicable_country_id', $provider_country);
            $this->db->or_where('applicable_country_id', null);
            $this->db->where("display_name_ph like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('id_type');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('applicable_country_id', $provider_country);
            $this->db->or_where('applicable_country_id', null);
            $this->db->limit(10);
            $fetched_records = $this->db->get('id_type');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['display_name_ph']);
        }
        return $data;
    }

    function getPatientInfoByVisitedProviderId($searchTerm) {
        $provider = $this->session->userdata('hospital_id');
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("FIND_IN_SET($provider,visited_provider_id) > 0");
            $this->db->limit(10);
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getPatientinfoWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getDocumentUploadCategory($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('document_upload_category')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $categories = $query->result_array();
        } else {
            $this->db->select('*');
            $fetched_records = $this->db->get('document_upload_category');
            $categories = $fetched_records->result_array();
        }

        $display = ['' ,lang('valid_id'), lang('prescription'), lang('medical_certificate'), lang('vaccination_record'), lang('wound_injury_image'), lang('referral_provider'), lang('lab_result'), lang('radiology_result'), lang('charts'), lang('doctor_notes'), lang('nurse_notes'), lang('medical_history'), lang('insurance_policy'), lang('health_card'), lang('family_records'), lang('other_medical_documents')];

        $data = array();
        foreach ($categories as $category) {
            $data[] = array("id" => $category['id'], "text" => $category['display_name']);
        }
        return $data;
    }

    function getPatientVitalById($id) {
        $this->db->order_by('last_modified', 'asc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $query = $this->db->get('vital');
        return $query->result();
    }

    function getPatientVitalByIdByEncounterId($id, $encounter_id) {
        $this->db->order_by('last_modified', 'asc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $this->db->where('encounter_id', $encounter_id);
        $query = $this->db->get('vital');
        return $query->result();
    }

    function insertPatientVital($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('vital', $data2);
    }

    function getVitalById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('vital');
        return $query->row();
    }

    function updatePatientVital($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('vital', $data);
    }

    function deleteVital($id, $user) {
        $this->db->where('id', $id);
        $this->db->where('recorded_user_id', $user);
        $this->db->delete('vital');
    }

    function getCivilStatus() {
        $this->db->order_by('id','asc');
        $query = $this->db->get('civil_status');
        return $query->result();
    }

    function getBloodGroup() {
        $this->db->order_by('id','asc');
        $query = $this->db->get('blood_group');
        return $query->result();
    }

    function validateCaseNumber($case_number) {
        $this->db->where('case_note_number', $case_number);
        $query = $this->db->get('case_note');
        return $query->row();
    }

    function validateDocumentNumber($document_number) {
        $this->db->where('patient_document_number', $document_number);
        $query = $this->db->get('patient_material');
        return $query->row();
    }

    function searchPatientByPatientNumberFirstnameLastname($patient_number, $f_name, $l_name, $details) {
        $data_exploded = explode(",", $details);

        if (!empty($details)) {
            if (!empty($data_exploded[1])) {
                $m_name = $data_exploded[1];
            }
            if (!empty($data_exploded[3])) {
                $suffix = $data_exploded[3];
            }
            if (!empty($data_exploded[4])) {
                $sex = $data_exploded[4];
            }
            if (!empty($data_exploded[5])) {
                $bdate = $data_exploded[5];
            }
            if (!empty($data_exploded[6])) {
                $country = $data_exploded[6];
            }
            if (!empty($data_exploded[7])) {
                $state = $data_exploded[7];
            }
            if (!empty($data_exploded[0])) {
                if (empty($f_name)) {
                    $f_name = $data_exploded[0];
                }
            }
            if (!empty($data_exploded[2])) {
                if (empty($l_name)) {
                    $l_name = $data_exploded[2];
                }
            }

            if ($country === "null") {
                $country = null;
            }
            if ($state === "null") {
                $state = null;
            }
        }

        if (!empty($patient_number)) {
            $this->db->where('patient_id', $patient_number);
        }
        if (!empty($f_name)) {
            $this->db->where('firstname', $f_name);
        }
        if (!empty($m_name)) {
            $this->db->where('middlename', $m_name);
        }
        if (!empty($l_name)) {
            $this->db->where('lastname', $l_name);
        }
        if (!empty($suffix)) {
            $this->db->where('suffix', $suffix);
        }
        if (!empty($sex)) {
            $this->db->where('sex', $sex);
        }
        if (!empty($bdate)) {
            $this->db->where('birthdate', $bdate);
        }
        if (!empty($country)) {
            $this->db->where('country_id', $country);
        }
        if (!empty($state)) {
            $this->db->where('state_id', $state);
        }
        $query = $this->db->get('patient');

        return $query->result();
    }

    function getPrivacyLevelById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('privacy_level');
        return $query->row();
    }

    function getEducationalAttainmentInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('educational_attainment')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $educational_attainment = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('educational_attainment');
            $educational_attainment = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($educational_attainment as $educational) {
            $data[] = array("id" => $educational['id'], "text" => $educational['display_name'] );
        }
        return $data;
    }

    function getReligionInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('profile_religion')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $religions = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('profile_religion');
            $religions = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($religions as $religion) {
            $data[] = array("id" => $religion['id'], "text" => $religion['display_name'] );
        }
        return $data;
    }

    function getReligion() {
        $this->db->select('*');
        $query = $this->db->get('profile_religion');
        return $query->result();
    }

    function getEducationalAttainmentById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('educational_attainment');
        return $query->row();
    }

    function getEducationalAttainment() {
        $this->db->select('*');
        $query = $this->db->get('educational_attainment');
        return $query->result();
    }

    function getFamilyHeadByProfileIdByFirstNameByMiddleNameByLastName($profile, $fname, $mname, $lname) {
        $this->db->where('family_profile_id', $profile);
        $this->db->where('firstname', $fname);
        $this->db->where('middlename', $mname);
        $this->db->where('lastname', $lname);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getRelationInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('pophealth_relation_to_family_head')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $relations = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('pophealth_relation_to_family_head');
            $relations = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($relations as $relation) {
            $data[] = array("id" => $relation['id'], "text" => $relation['display_name'] );
        }
        return $data;
    }

    function getPatientRelationToHeadById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('pophealth_relation_to_family_head');
        return $query->row();
    }

    function getPatientRelationToHead() {
        $this->db->select('*');
        $query = $this->db->get('pophealth_relation_to_family_head');
        return $query->result();
    }

    function getSanitaryToiletInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('pophealth_sanitary_toilet')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $sanitary_toilets = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('pophealth_sanitary_toilet');
            $sanitary_toilets = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($sanitary_toilets as $sanitary_toilet) {
            $data[] = array("id" => $sanitary_toilet['id'], "text" => $sanitary_toilet['display_name'] );
        }
        return $data;
    }

    function getSanitaryToiletById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('pophealth_sanitary_toilet');
        return $query->row();
    }

    function getSanitaryToilet() {
        $this->db->select('*');
        $query = $this->db->get('pophealth_sanitary_toilet');
        return $query->result();
    }

    function getMonthlyFamilyIncomeInfo() {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('pophealth_monthly_family_income')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $monthly_family_income = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('pophealth_monthly_family_income');
            $monthly_family_income = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($monthly_family_income as $mfi) {
            $data[] = array("id" => $mfi['id'], "text" => $mfi['display_name'] );
        }
        return $data;
    }

    function getMonthlyFamilyIncomeById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('pophealth_monthly_family_income');
        return $query->row();
    }

    function getSafeWaterSupply() {
        $query = $this->db->get('pophealth_safe_water_supply_level');
        return $query->result();
    }

    function getSafeWaterSupplyById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('pophealth_safe_water_supply_level');
        return $query->row();
    }

    function getUnmetNeed() {
        $query = $this->db->get('pophealth_unmet_need');
        return $query->result();
    }

    function getUnmetNeedById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('pophealth_unmet_need');
        return $query->row();
    }

    function getPatientByFamilyProfileId($id){
        $this->db->where('family_profile_id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getPatientListByFamilyProfileId($id){
        $this->db->where('family_profile_id', $id);
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientCountByFamilyProfileId($id) {
        $this->db->where('family_profile_id', $id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient');
        return $query->num_rows();
    }

    function insertPatientHealthDeclaration($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('medical_history', $data2);
    }

    function updatePatientHealthDeclaration($id, $data) {
        $this->db->where('id', $id);
        $this->db->insert('medical_history', $data);
    }

    function getMedicationHistoryById($patient_id) {
        $this->db->select('*');
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function updatePatientHealthDeclarationById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('medical_history', $data);
    }

    function getPatientHealthDeclarationByPatientId($id) {
        $this->db->where('patient_id', $id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('medical_history');
        return $query->row();
    }
}
