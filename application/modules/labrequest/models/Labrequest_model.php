<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Labrequest_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertServiceRequest($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('service_request', $data2);
        return $this->db->affected_rows() > 0;
    }

    function insertServiceRequestItem($data) {
        $this->db->insert('service_request_item', $data);
        return $this->db->affected_rows() > 0;
    }

    function updateLabrequestNumberById($id, $data2) {
        $this->db->where('id', $id);
        $this->db->update('lab_request', $data2);
        return $this->db->affected_rows() > 0;
    }

    function updateServiceRequestById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('service_request', $data);
        return $this->db->affected_rows() > 0;
    }

    function updateServiceRequestItemById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('service_request_item', $data);
        return $this->db->affected_rows() > 0;
    }

    function deleteServiceRequestItemById($id) {
        $this->db->where('id', $id);
        $this->db->delete('service_request_item');
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('lab_request');
    }

    function deleteLabrequestByRequestNumber($number) {
        $this->db->where('lab_request_number', $number);
        $this->db->delete('lab_request');
        return $this->db->affected_rows() > 0;
    }

    function getLabrequestInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("classtype", 1);
            $this->db->where("status", "ACTIVE");
            $this->db->where("(loinc_num LIKE '%" . $searchTerm . "%' OR component LIKE '%" . $searchTerm . "%' OR long_common_name LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $fetched_records = $this->db->get('lab_loinc');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("classtype", 1);
            $this->db->where("status", "ACTIVE");
            $this->db->limit(10);
            $fetched_records = $this->db->get('lab_loinc');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'] . '*' . $user['long_common_name'] . '*' . $user['loinc_num'], "text" => $user['long_common_name']);
        }
        return $data;
    }

    function getServiceRequestCategoryInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("(id LIKE '%" . $searchTerm . "%' OR hl7_code LIKE '%" . $searchTerm . "%' OR hl7_display LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $fetched_records = $this->db->get('service_request_category');
            $category = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('service_request_category');
            $category = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($category as $cat) {
            $data[] = array("id" => $cat['id'], "text" => $cat['hl7_display']);
        }
        return $data;
    }

    function getServiceRequestCategoryList() {
        $this->db->select('*');
        $query = $this->db->get('service_request_category');
        return $query->result();
    }

    function getServiceRequestCategoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('service_request_category');
        return $query->row();
    }

    function getServiceRequestBySearch($search, $patient_id = null, $doctor_id = null) {       
        $this->db->order_by('id', 'desc');
        if (!empty($patient_id)) {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('service_request')
                        ->where('patient_id', $patient_id)
                        ->where('doctor_id', $doctor_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                    ->from('service_request')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            }
        } else {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('service_request')
                        ->where('doctor_id', $doctor_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                        ->from('service_request')
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            }
        }
        return $query->result();            
    }

    function getServiceRequest($patient_id = null, $doctor_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        if (!empty($doctor_id)) {
            $this->db->where('doctor_id', $doctor_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('service_request');
        return $query->result();
    }

    // function getLabrequest() {
    //     $this->db->select('*');
    //     $this->db->from('lab_request');
    //     $this->db->group_by('lab_request_number');
    //     $this->db->having('count(lab_request_number) > 1');
    //     $where_clause = $this->db->get_compiled_select();

    //     $this->db->get('lab_request');
    //     $this->db->where('`id` IN ($where_clause)', NULL, FALSE);
    // }

    function getLabrequestByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $this->db->order_by('id', 'desc');
        $this->db->group_by('lab_request_number');
        $query = $this->db->get('lab_request');
        return $query->result();
    }

    function getLabrequestByPatientIdByEncounterId($id, $encounter_id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $this->db->where('encounter_id', $encounter_id);
        $this->db->order_by('id', 'desc');
        $this->db->group_by('lab_request_number');
        $query = $this->db->get('lab_request');
        return $query->result();
    }

    function getLabrequestById($id) {
        $this->db->where("id", $id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('lab_request');
        return $query->row();
    }

    function getServiceRequestByServiceRequestNumber($number) {
        $this->db->where("service_request_number", $number);
        $query = $this->db->get('service_request');
        return $query->row();
    }

    function getServiceRequestItemById($id) {
        $this->db->where('service_request_id', $id);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('service_request_item');
        return $query->result();
    }

    function getLabLoinc() {
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->limit(10);
        $query = $this->db->get('lab_loinc');
        return $query->result();
    }

    function getLabLoincById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('lab_loinc');
        return $query->row();
    }

    function getServiceRequestByLimitBySearch($limit, $start, $search, $patient_id = null, $doctor_id = null) {               
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!empty($patient_id)) {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('service_request')
                        ->where('doctor_id', $doctor_id)
                        ->where('patient_id', $patient_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                        ->from('service_request')
                        ->where('patient_id', $patient_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            }
        } else {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('service_request')
                        ->where('doctor_id', $doctor_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                        ->from('service_request')
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            }
        }
        return $query->result();       
    }

    function getServiceRequestByLimit($limit, $start, $patient_id = null, $doctor_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        if (!empty($doctor_id)) {
            $this->db->where('doctor_id', $doctor_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('service_request');
        return $query->result();
    }

    function getlabrequestCount($patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('service_request');
        return $query->num_rows();
    }

    function getLabrequestBySearchCount($search, $patient_id = null) {       
        if (!empty($patient_id)) {
            $query = $this->db->select('id')
                    ->from('service_request')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        } else {
            $query = $this->db->select('id')
                    ->from('service_request')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR service_request_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        }
        return $query->num_rows();            
    }

    function validateLabRequestNumber($lab_request_number) {
        $this->db->where('service_request_number', $lab_request_number);
        $query = $this->db->get('service_request');
        return $query->row();
    }

    function checkLabRequestItemByServiceRequestIdByLabLoincId($service_request_id, $lab_loinc_id) {
        $this->db->where('service_request_id', $service_request_id);
        $this->db->where('lab_loinc_id', $lab_loinc_id);
        $query = $this->db->get('service_request_item');
        return $query->row();
    }

    function checkProcedureRequestItemByServiceRequestIdByProcedureCptCodeId($service_request_id, $procedure_cpt_code_id) {
        $this->db->where('service_request_id', $service_request_id);
        $this->db->where('procedure_cpt_code_id', $procedure_cpt_code_id);
        $query = $this->db->get('service_request_item');
        return $query->row();
    }

    function getServiceRequestCategoryByName($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('service_request_category');
        return $query->row();
    }

}
