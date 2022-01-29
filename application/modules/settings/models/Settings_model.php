<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertSettings($hospital_settings_data) {
        $this->db->insert('settings', $hospital_settings_data);
    }

    function getSettings() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('settings');
        return $query->row();
    }

    function getSettingsByJason($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->Where('id', $id);
        $query = $this->db->get('settings');
        return $query->row();
    }

    function updateSettings($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('settings', $data);
    }

    function updateHospitalSettings($id, $data) {
        $this->db->where('hospital_id', $id);
        $this->db->update('settings', $data);
    }

    function getSubscription() {
        $this->db->where('id', $this->hospital_id);
        $query = $this->db->get('hospital');
        return $query->row();
    }

    function getEntityType() {
        $this->db->order_by('name', 'asc');
        $query = $this->db->get('entity_type');
        return $query->result();
    }

}
