<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Specialty_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertSpecialty($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $this->db->insert('department', $data1);
    }

    function getSpecialty() {
        $this->db->where("display_name_ph is NOT NULL");
        $query = $this->db->get('specialty');
        return $query->result();
    }

    function getSpecialtyById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('specialty');
        return $query->row();
    }

    function updateSpecialty($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('specialty', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('specialty');
    }

    function getSpecialtyInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('specialty')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name_ph LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $where = "display_name_ph is NOT NULL";
            $this->db->where($where);
            $fetched_records = $this->db->get('specialty');
            $users = $fetched_records->result_array();
        }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['display_name_ph']);
        }
        return $data;
    }

}
