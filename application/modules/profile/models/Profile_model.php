<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getProfileById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    function updateProfile($id, $data, $group_name) {
        $this->db->where('ion_user_id', $id);
        $this->db->update($group_name, $data);
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    function getUsersGroups($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users_groups');
        return $query;
    }

    function getUsersGroupsById($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users_groups');
        return $query->row();
    }

    function getGroups($group_id) {
        $this->db->where('id', $group_id);
        $query = $this->db->get('groups');
        return $query;
    }

    function getGroupsById($group_id) {
        $this->db->where('id', $group_id);
        $query = $this->db->get('groups');
        return $query->row();
    }

    function getUserWithoutAddNewOption($searchTerm) {
        $valid_users = '4,6,7,8,10';
        // $user_groups = $this->getUsersByValidUsers($valid_users);

        if (!empty($searchTerm)) {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->where("(a.user_id LIKE '%" . $searchTerm . "%' OR b.username LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->limit(10);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        }

        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('a.user_id, a.group_id, b.username, c.name');
        //     $this->db->from('users_groups a');
        //     $this->db->join('users b', 'b.id=a.user_id', 'left');
        //     $this->db->join('groups c', 'c.id=a.group_id', 'left');
        //     $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get();
        //     $users = $fetched_records->result_array();
        // }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['user_id'], "text" => $user['username']);
        }
        return $data;
    }

}
