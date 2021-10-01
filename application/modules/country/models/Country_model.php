<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertCountry($data) {
        $this->db->insert('country',$data);
    }

    function getCountry() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('country');
        return $query->result();
    }

    function getCountryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('country');
        return $query->row();
    }

    function updateCountry($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('country', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('country');
    }

}
