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
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('location');
        return $query->result();
    }

    function insertBranch($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('location', $data2);
    }

    

}
