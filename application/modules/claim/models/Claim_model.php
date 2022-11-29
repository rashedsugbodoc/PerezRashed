<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claim_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertClaimSettings($data){
        $this->db->insert('claim_settings', $data);
    }

    function insertClaimEligibilityQuery($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('claim_philhealth_eligibility_query', $data2);
    }

    function getClaimSettingsByCompanyId($id){
        $this->db->where('company_id', $id);
        $query = $this->db->get('claim_settings');
        return $query->row();
    }

    function getPhilhealthClaimEligibilityByPatientId($id){
        $this->db->where('patient_id', $id);
        $query = $this->db->get('claim_philhealth_eligibility_query');
        return $query->row();
    }

    function updatePhilhealthClaimEligibilityByPatientId($data, $id){
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->where('patient_id', $id);
        $this->db->update('claim_philhealth_eligibility_query', $data2);
    }

    

}
