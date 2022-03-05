<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getAdmin() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('admin');
        return $query->result();
    }


    function getAdminCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('admin');
        return $query->num_rows();
    }


    function getAdminById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('admin');
        return $query->row();
    }

    function getAdminByIonUserId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('admin');
        return $query->row();
    }

    function updateAdmin($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
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

}
