<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertCountry($data) {
        $this->db->insert('countries',$data);
    }

    function getCountry() {
        $this->db->order_by('name', 'asc');
        $query = $this->db->get('countries');
        return $query->result();
    }

    function getCountryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('countries');
        return $query->row();
    }

    function updateCountry($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('countries', $data);
    }

    function insertState($data) {
        $this->db->insert('states',$data);
    }

    function getState() {
        $this->db->order_by('name', 'asc');
        $query = $this->db->get('states');
        return $query->result();
    }

    function getStateByCountryId($countryId) {
        $this->db->order_by('name', 'asc');
        $this->db->select('id, name');
        $this->db->where('country_id', $countryId);
        $query = $this->db->get('states');
        return $query->result();

    }

    function getStateByCountryName($countryName) {
        $this->db->order_by('name', 'asc');
        $this->db->where('country', $countryName);
        $query = $this->db->get('states');
        return $query->result();

    }

    function getStateById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('states');
        return $query->row();
    }

    function updateState($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('states', $data);
    }

    function insertCity($data) {
        $this->db->insert('cities',$data);
    }

    function getCity() {
        $this->db->order_by('name', 'asc');
        $query = $this->db->get('cities');
        return $query->result();
    }

    function getCityByStateId($stateId) {
        $this->db->order_by('name', 'asc');
        $this->db->where('state_id', $stateId);
        $query = $this->db->get('cities');
        return $query->result();
    }

    function getCityById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('cities');
        return $query->row();
    }

    function updateCity($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('cities', $data);
    }

    function insertBarangay($data) {
        $this->db->insert('barangays',$data);
    }

    function getBarangay() {
        $this->db->order_by('name', 'asc');
        $query = $this->db->get('barangays');
        return $query->result();
    }

    function getBarangayByCityId($cityId) {
        $this->db->order_by('name', 'asc');
        $this->db->where('city_id', $cityId);
        $query = $this->db->get('barangays');
        return $query->result();
    }

    function getBarangayById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('barangays');
        return $query->row();
    }

    function updateBarangay($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('barangays', $data);
    }

}
