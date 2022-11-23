<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Midwife_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertMidwife($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('midwife', $data2);
    }

    function getMidwife() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('midwife');
        return $query->result();
    }

    function getMidwifeById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('midwife');
        return $query->row();
    }

    function updateMidwife($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('midwife', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('midwife');
    }

    function updateIonUser($username, $email, $password = null, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    function getMidwifeByIonUserId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('midwife');
        return $query->row();
    }

    function getAllMidwivesInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('midwife')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('midwife');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

}
