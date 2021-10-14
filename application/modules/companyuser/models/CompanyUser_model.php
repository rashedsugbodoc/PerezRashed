<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CompanyUser_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertCompanyUser($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('companyuser', $data2);
    }

    function getCompanyUser() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('companyuser');
        return $query->result();
    }

    function getCompanyUserById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('companyuser');
        return $query->row();
    }

    function updateCompanyUser($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('companyuser', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('companyuser');
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    function getCompanyUserByIonUserId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('accountant');
        return $query->row();
    }

}
