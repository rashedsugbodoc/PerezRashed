<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clerk_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertClerk($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('clerk', $data2);
    }

    function getClerk() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('clerk');
        return $query->result();
    }

    function getClerkById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('clerk');
        return $query->row();
    }

    function updateClerk($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('clerk', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('clerk');
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

    function getClerkByIonUserId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('clerk');
        return $query->row();
    }

}
