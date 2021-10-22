<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admission_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertBed($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('bed', $data2);
    }

    function getBed() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getAdmissionCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('admission');
        return $query->num_rows();
    }    

    function getBedBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('bed')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR bed_id LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getBedByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getBedByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('bed')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR bed_id LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getBedById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('bed');
        return $query->row();
    }

    function updateBed($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('bed', $data);
    }

    function updateBedByBedId($bed_id, $data) {
        $this->db->where('bed_id', $bed_id);
        $this->db->update('bed', $data);
    }

    function insertBedCategory($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('bed_category', $data2);
    }

    function getBedCategory() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('bed_category');
        return $query->result();
    }

    function getBedAllotmentsByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient', $id);
        $query = $this->db->get('alloted_bed');
        return $query->result();
    }

    function getBedCategoryById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('bed_category');
        return $query->row();
    }

    function updateBedCategory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('bed_category', $data);
    }

    function deleteBed($id) {
        $this->db->where('id', $id);
        $this->db->delete('bed');
    }

    function deleteBedCategory($id) {
        $this->db->where('id', $id);
        $this->db->delete('bed_category');
    }

    function insertAdmission($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('admission', $data2);
    }

    function getAdmission() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('admission');
        return $query->result();
    }

    function getAdmissionBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('admission')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR bed_id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getAdmissionByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('admission');
        return $query->result();
    }

    function getAdmissionByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('admission')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR bed_id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getAdmissionById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('admission');
        return $query->row();
    }

    function updateAdmission($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('admission', $data);
    }

    function deleteAdmission($id) {
        $this->db->where('id', $id);
        $this->db->delete('alloted_bed');
    }

}
