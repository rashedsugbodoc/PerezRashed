<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Encounter_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getEncounter() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterType() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('encounter_type');
        return $query->result();
    }

    function insertEncounter($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('encounter', $data2);
    }

    function updateEncounter($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('encounter', $data);
    }

    function getEncounterById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('encounter');
        return $query->row();
    }

    function getEncounterByAppointmentId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('appointment_id', $id);
        $query = $this->db->get('encounter');
        return $query->row();
    }

    function getEncounterByVitalId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('start_vital_id', $id);
        $query = $this->db->get('encounter');
        return $query->row();
    }

    function getEncounterTypeIdByName($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('encounter_type');
        return $query->row();
    }

    function getEncounterBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('encounter')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getEncounterBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('encounter')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getEncounterByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('encounter')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getEncounterByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('encounter');
        return $query->num_rows();
    }

    function getEncounterTypeInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('encounter_type')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('encounter_type');
            $users = $fetched_records->result_array();
        }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['display_name']);
        }
        return $data;
    }

    function getEncounterStatusByEncounterType($id) {
        $this->db->where("FIND_IN_SET($id, applicable_encounter_type)");
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('encounter_status');
        return $query->result();

    }

    function getEncounterStatusById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('encounter_status');
        return $query->row();
    }

    function getProviderinfoWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getProviderinfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name'] . ' (' . lang('id') . ': ' . $user['id'] . ')');
        }
        return $data;
    }

}
