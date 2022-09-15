<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Labrequest_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertLabrequest($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('lab_request', $data2);
        return $this->db->affected_rows() > 0;
    }

    function updateLabrequestNumberById($id, $data2) {
        $this->db->where('id', $id);
        $this->db->update('lab_request', $data2);
        return $this->db->affected_rows() > 0;
    }

    function updateLabrequestById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('lab_request', $data);
        return $this->db->affected_rows() > 0;
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

    function getLabrequestBySearch($search, $patient_id = null) {       
        $this->db->order_by('id', 'desc');
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('lab_request')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                    ->group_by('lab_request_number')
                    ->get();
            ;
        } else {
            $query = $this->db->select('*')
                    ->from('lab_request')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                    ->group_by('lab_request_number')
                    ->get();
            ;
        }
        return $query->result();            
    }

    function getLabrequest($patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->group_by('lab_request_number');
        $query = $this->db->get('lab_request');
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

    function getLabrequestByLabrequestNumber($id) {
        $this->db->where("lab_request_number", $id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('lab_request');
        return $query->result();
    }

    function getLabLoinc() {
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->limit(10);
        $query = $this->db->get('lab_loinc');
        return $query->result();
    }

    function getLabrequestByLimitBySearch($limit, $start, $search, $patient_id = null) {               
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('lab_request')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                    ->group_by('lab_request_number')
                    ->get();
            ;
        } else {
            $query = $this->db->select('*')
                    ->from('lab_request')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                    ->group_by('lab_request_number')
                    ->get();
            ;
        }
        return $query->result();       
    }

    function getLabrequestByLimit($limit, $start, $patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->group_by('lab_request_number');
        $this->db->limit($limit, $start);
        $query = $this->db->get('lab_request');
        return $query->result();
    }

    function getlabrequestCount($patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('lab_request');
        return $query->num_rows();
    }

    function getLabrequestBySearchCount($search, $patient_id = null) {       
        if (!empty($patient_id)) {
            $query = $this->db->select('id')
                    ->from('lab_request')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        } else {
            $query = $this->db->select('id')
                    ->from('lab_request')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        }
        return $query->num_rows();            
    }

    function validateLabRequestNumber($lab_request_number) {
        $this->db->where('lab_request_number', $lab_request_number);
        $query = $this->db->get('lab_request');
        return $query->row();
    }

}
