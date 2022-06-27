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

    function getCountryInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('countries')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $countries = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('countries');
            $countries = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($countries as $country) {
            $data[] = array("id" => $country['id'], "text" => $country['name'] );
        }
        return $data;
    }

    function getStateInfo($searchTerm, $country) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('states')
                    ->where("country_id", $country)
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $states = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("country_id", $country);
            $this->db->limit(10);
            $fetched_records = $this->db->get('states');
            $states = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($states as $state) {
            $data[] = array("id" => $state['id'], "text" => $state['name'] );
        }
        return $data;
    }

    function getCityInfo($searchTerm, $country) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('cities')
                    ->where("country_id", $country)
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $cities = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("country_id", $country);
            $this->db->limit(10);
            $fetched_records = $this->db->get('cities');
            $cities = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($cities as $city) {
            $data[] = array("id" => $city['id'], "text" => $city['name'] );
        }
        return $data;
    }

    function getBarangayInfo($searchTerm, $country) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('barangays')
                    ->where("country_id", $country)
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $barangays = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("country_id", $country);
            $this->db->limit(10);
            $fetched_records = $this->db->get('barangays');
            $barangays = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($barangays as $barangay) {
            $data[] = array("id" => $barangay['id'], "text" => $barangay['name'] );
        }
        return $data;
    }

}
