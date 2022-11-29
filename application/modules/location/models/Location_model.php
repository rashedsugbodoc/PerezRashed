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

    public function getCountryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('countries');
        return $query->row();
    }

    public function getCountryByName($name) {
        $this->db->where('name', $name);
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

    function getStateByIdWithCountryName($id, $country) {
        $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.country_id, b.id as secondary_location_id, b.name as secondary_location_name');
        $this->db->from('states a');
        $this->db->join('countries b', 'b.id=a.country_id', 'right');
        $this->db->where('a.id', $id);
        $this->db->where("a.country_id", $country);
        $fetched_records = $this->db->get();
        $states = $fetched_records->row();
        return $states;
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

    function getCityByIdWithStateName($id, $country) {
        $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.state_id, a.country_id, b.id as secondary_location_id, b.name as secondary_location_name');
        $this->db->from('cities a');
        $this->db->join('states b', 'b.id=a.state_id', 'right');
        $this->db->where('a.id', $id);
        $this->db->where("a.country_id", $country);
        $fetched_records = $this->db->get();
        $cities = $fetched_records->row();
        return $cities;
    }

    // function getCityByIdWithStateName($searchTerm, $state) {
    //     if (!empty($searchTerm)) {
    //         $this->db->select('a.id as cityid, a.name as cityname, a.state_id, b.id as stateid, b.name as statename');
    //         $this->db->from('cities a');
    //         $this->db->join('states b', 'b.id=a.state_id', 'right');
    //         $this->db->where("a.state_id", $state);
    //         $this->db->where("(a.id LIKE '%" . $searchTerm . "%' OR a.name LIKE '%" . $searchTerm . "%')", NULL, FALSE);
    //         $this->db->limit(15);
    //         $query = $this->db->get();
    //         $cities = $query->result_array();
    //     } else {
    //         $this->db->select('a.id as cityid, a.name as cityname, a.state_id, b.id as stateid, b.name as statename');
    //         $this->db->from('cities a');
    //         $this->db->join('states b', 'b.id=a.state_id', 'right');
    //         $this->db->where("a.state_id", $state);
    //         $this->db->limit(10);
    //         $fetched_records = $this->db->get();
    //         $cities = $fetched_records->result_array();
    //     }

    //     $data = array();
    //     foreach ($cities as $city) {
    //         $data[] = array("id" => $city['cityid'], "text" => $city['cityname'] . ' (' . $city['statename'] . ')' );
    //     }
    //     return $data;
    // }

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

    function getBarangayByIdWithCityName($id, $country) {
        $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.city_id, a.country_id, b.id as secondary_location_id, b.name as secondary_location_name');
        $this->db->from('barangays a');
        $this->db->join('cities b', 'b.id=a.city_id', 'right');
        $this->db->where('a.id', $id);
        $this->db->where("a.country_id", $country);
        $fetched_records = $this->db->get();
        $barangays = $fetched_records->row();
        return $barangays;
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
            $data[] = array("id" => $state['id'], "text" => $state['name']);
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
            $data[] = array("id" => $city['id'], "text" => $city['name']);
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
            $data[] = array("id" => $barangay['id'], "text" => $barangay['name']);
        }
        return $data;
    }

    function getStateInfoWithCountryName($searchTerm, $country) {
        if (!empty($searchTerm)) {
            $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.country_id, b.id as secondary_location_id, b.name as secondary_location_name');
            $this->db->from('states a');
            $this->db->join('countries b', 'b.id=a.country_id', 'right');
            $this->db->where("a.country_id", $country);
            $this->db->where("(a.id LIKE '%" . $searchTerm . "%' OR a.name LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $this->db->limit(15);
            $query = $this->db->get();
            $states = $query->result_array();
        } else {
            $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.country_id, b.id as secondary_location_id, b.name as secondary_location_name');
            $this->db->from('states a');
            $this->db->join('countries b', 'b.id=a.country_id', 'right');
            $this->db->where("a.country_id", $country);
            $this->db->limit(10);
            $fetched_records = $this->db->get();
            $states = $fetched_records->result_array();
        }

        $data = array();
        foreach ($states as $state) {
            $data[] = array("id" => $state['primary_location_id'], "text" => $state['primary_location_name'] . ' (' . $state['secondary_location_name'] . ')' );
        }
        return $data;
    }

    function getCityInfoWithStateName($searchTerm, $country) {
        if (!empty($searchTerm)) {
            $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.country_id, a.state_id, b.id as secondary_location_id, b.name as secondary_location_name');
            $this->db->from('cities a');
            $this->db->join('states b', 'b.id=a.state_id', 'right');
            $this->db->where("a.country_id", $country);
            $this->db->where("(a.id LIKE '%" . $searchTerm . "%' OR a.name LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $this->db->limit(15);
            $query = $this->db->get();
            $cities = $query->result_array();
        } else {
            $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.country_id, a.state_id, b.id as secondary_location_id, b.name as secondary_location_name');
            $this->db->from('cities a');
            $this->db->join('states b', 'b.id=a.state_id', 'right');
            $this->db->where("a.country_id", $country);
            $this->db->limit(10);
            $fetched_records = $this->db->get();
            $cities = $fetched_records->result_array();
        }

        $data = array();
        foreach ($cities as $city) {
            $data[] = array("id" => $city['primary_location_id'], "text" => $city['primary_location_name'] . ' (' . $city['secondary_location_name'] . ')' );
        }
        return $data;
    }

    function getBarangayInfoWithCityName($searchTerm, $country) {
        if (!empty($searchTerm)) {
            $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.country_id, a.city_id, b.id as secondary_location_id, b.name as secondary_location_name');
            $this->db->from('barangays a');
            $this->db->join('cities b', 'b.id=a.city_id', 'right');
            $this->db->where("a.country_id", $country);
            $this->db->where("(a.id LIKE '%" . $searchTerm . "%' OR a.name LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $this->db->limit(15);
            $query = $this->db->get();
            $barangays = $query->result_array();
        } else {
            $this->db->select('a.id as primary_location_id, a.name as primary_location_name, a.country_id, a.city_id, b.id as secondary_location_id, b.name as secondary_location_name');
            $this->db->from('barangays a');
            $this->db->join('cities b', 'b.id=a.city_id', 'right');
            $this->db->where("a.country_id", $country);
            $this->db->limit(10);
            $fetched_records = $this->db->get();
            $barangays = $fetched_records->result_array();
        }

        $data = array();
        foreach ($barangays as $barangay) {
            $data[] = array("id" => $barangay['primary_location_id'], "text" => $barangay['primary_location_name'] . ' (' . $barangay['secondary_location_name'] . ')' );
        }
        return $data;
    }

}
