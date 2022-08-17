<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customform_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertCustomForm($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('custom_form', $data2);
    }

    function getDiseasesInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('pophealth_medication_availment_status')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $diseases = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('pophealth_medication_availment_status');
            $diseases = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($diseases as $disease) {
            $data[] = array("id" => $disease['id'], "text" => $disease['display_name'] );
        }
        return $data;
    }

    function getDiseases() {
        $this->db->select('*');
        $query = $this->db->get('pophealth_medication_availment_status');
        return $query->result();
    }

    function getCovidInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('pophealth_covid_status')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $covid_status = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('pophealth_covid_status');
            $covid_status = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($covid_status as $status) {
            $data[] = array("id" => $status['id'], "text" => $status['display_name'] );
        }
        return $data;
    }

    function getCovidStatus() {
        $this->db->select('*');
        $query = $this->db->get('pophealth_covid_status');
        return $query->result();
    }

    function getCustomFormByPatientId($id) {
        $this->db->where('patient', $id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('custom_form');
        return $query->row();
    }

}
