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
    }

    function getLabrequestInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("loinc_num LIKE '%" . $searchTerm . "%' OR component LIKE '%" . $searchTerm . "%' OR long_common_name LIKE '%" . $searchTerm . "%'");
            $this->db->where("status", "ACTIVE");
            $fetched_records = $this->db->get('lab_loinc');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
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

    function getLabrequestBySearch($search) {       
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('lab_request')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();            
    }

    function getLabrequest() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('lab_request');
        return $query->result();
    }

    function getLabrequestByLimitBySearch($limit, $start, $search) {               
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('lab_request')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();       
    }

    function getLabrequestByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('lab_request');
        return $query->result();
    }

    function getlabrequestCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('lab_request');
        return $query->num_rows();
    }

    function getLabrequestBySearchCount($search) {       
        $query = $this->db->select('id')
                ->from('lab_request')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR long_common_name LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%' OR loinc_num LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->num_rows();            
    }

}
