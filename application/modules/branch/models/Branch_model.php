<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branch_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getBranches() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('location');
        return $query->result();
    }

    function getBranchesByLimit($limit) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'asc');
        $this->db->limit($limit);
        $query = $this->db->get('location');
        return $query->result();
    }

    function insertBranch($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('location', $data2);
    }

    function updateBranch($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('location', $data);
    }

    function getBranchById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('location');
        return $query->row();
    }

    function getBranchInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('location')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('location');
            $users = $fetched_records->result_array();
        }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['display_name']);
        }
        return $data;
    }

    function getBranchInfoWithHospital($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('location')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('location');
            $users = $fetched_records->result_array();
        }


        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 0, "text" => lang('online'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['display_name']);
        }
        return $data;
    }

}
