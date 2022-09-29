<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Casenote_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertMedicalHistory($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('case_note', $data2);
    }

    function updateMedicalHistory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('case_note', $data);
    }

    function getMedicalHistory($patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getMyCaseNote($patient_id = null, $current_user) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('created_user_id', $current_user);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getMedicalHistoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('case_note');
        return $query->row();
    }

    function getMedicalHistoryByCaseNoteNumber($case_note_number) {
        $this->db->where('case_note_number', $case_note_number);
        $query = $this->db->get('case_note');
        return $query->row();
    }

    function getMedicalHistoryBySearch($search, $patient_id = null) {
        $this->db->order_by('id', 'desc');
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        } else {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        }
        return $query->result();
    }

    function getMyCaseNoteBySearch($search, $patient_id = null, $current_user) {
        $this->db->order_by('id', 'desc');
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('patient_id', $patient_id)
                    ->where('created_user_id', $current_user)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        } else {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('created_user_id', $current_user)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        }
        return $query->result();
    }

    function getMedicalHistoryByLimitBySearch($limit, $start, $search, $patient_id = null) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        } else {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        }
        return $query->result();
    }

    function getMyCaseNoteByLimitBySearch($limit, $start, $search, $patient_id = null, $current_user) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('patient_id', $patient_id)
                    ->where('created_user_id', $current_user)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        } else {
            $query = $this->db->select('*')
                    ->from('case_note')
                    ->where('created_user_id', $current_user)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        }
        return $query->result();
    }

    function getMedicalHistoryByLimit($limit, $start, $patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function getMyCaseNoteByLimit($limit, $start, $patient_id = null, $current_user) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('created_user_id', $current_user);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('case_note');
        return $query->result();
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('case_note');
    }

    function validateCaseNumber($case_number) {
        $this->db->where('case_note_number', $case_number);
        $query = $this->db->get('case_note');
        return $query->row();
    }

}
