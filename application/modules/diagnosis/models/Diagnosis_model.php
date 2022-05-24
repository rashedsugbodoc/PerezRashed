<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diagnosis_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertDiagnosis($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient_diagnosis', $data2);
    }

    function updateDiagnosis($number, $data) {
        $this->db->where('id', $number);
        $this->db->update('patient_diagnosis', $data);
    }

    function getDiagnosisById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('diagnosis_icd10');
        return $query->row();
    }

    function getPatientDiagnosisById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('patient_diagnosis');
        return $query->row();
    }

    function getPatientDiagnosisByNumber($number) {
        $this->db->where('patient_diagnosis_number', $number);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosisInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("code LIKE '%" . $searchTerm . "%' OR long_description LIKE '%" . $searchTerm . "%'");
            $this->db->where("header_indicator", 1);
            $fetched_records = $this->db->get('diagnosis_icd10');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("header_indicator", 1);
            $this->db->limit(10);
            $fetched_records = $this->db->get('diagnosis_icd10');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'] . '*' . $user['long_description'], "text" => $user['long_description']);
        }
        return $data;
    }

    function getDiagnosis() {
        $this->db->select('*');
        $this->db->where("header_indicator", 1);
        $this->db->limit(10);
        $query = $this->db->get('diagnosis_icd10');
        return $query->result();
    }

    function validateDiagnosisNumber($diagnosis_number) {
        $this->db->where('patient_diagnosis_number', $diagnosis_number);
        $query = $this->db->get('patient_diagnosis');
        return $query->row();
    }

    function getDiagnosisByPatient($patient) {
        $this->db->where('patient_id', $patient);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosisByPatientByEncounterId($patient, $encounter_id) {
        $this->db->where('patient_id', $patient);
        $this->db->where('encounter_id', $encounter_id);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

}
