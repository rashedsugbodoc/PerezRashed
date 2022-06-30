<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertCompany($data) {
        if ($this->ion_auth->in_group(array('admin'))) {
            $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        }
        $data2 = array_merge($data, $data1);
        $this->db->insert('company', $data2);
    }

    function getCompany() {
        $query = $this->db->get('company');
        return $query->result();
    }

    function getCompanyByCompanyUserId($company_id) {
        $this->db->where('id', $company_id);
        $query = $this->db->get('company');
        return $query->result();
    }

    function getCompanyCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('company');
        return $query->num_rows();
    }

    function getLimit() {
        $current = $this->db->get_where('company', array('hospital_id' => $this->hospital_id))->num_rows();
        $limit = $this->db->get_where('hospital', array('id' => $this->hospital_id))->row()->d_limit;
        return $limit - $current;
    }

    function getCompanyBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('company')
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%'OR email LIKE '%" . $search . "%'OR profile LIKE '%" . $search . "%' OR display_name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCompanyByCompanyuserIdBySearch($search, $company_id) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('company')
                ->where('id', $company_id)
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%'OR email LIKE '%" . $search . "%'OR profile LIKE '%" . $search . "%' OR display_name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCompanyBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('company')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%'OR email LIKE '%" . $search . "%'OR profile LIKE '%" . $search . "%' OR display_name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getCompanyByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('company');
        return $query->result();
    }

    function getCompanyByCompanyUserIdByLimit($limit, $start, $company_id) {
        $this->db->where('id', $company_id);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('company');
        return $query->result();
    }

    function getCompanyByLimitBySearch($limit, $start, $search) {
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('company')
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%'OR email LIKE '%" . $search . "%'OR profile LIKE '%" . $search . "%' OR display_name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();

        return $query->result();
    }

    function getCompanyByCompanyUserIdByLimitBySearch($limit, $start, $search, $company_id) {
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('company')
                ->where('id', $company_id)
                ->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%'OR email LIKE '%" . $search . "%'OR profile LIKE '%" . $search . "%' OR display_name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();

        return $query->result();
    }

    function getCompanyById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('company');
        return $query->row();
    }

    function getCompanyByIonUserId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('company');
        return $query->row();
    }

    function updateCompany($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('company', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('company');
    }

    function getCompanyInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('company')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('company');
            $companies = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($companies as $company) {
            $data[] = array("id" => $company['id'], "text" => format_number_with_digits($company['id'], COMPANY_ID_LENGTH) . ' - ' .$company['display_name'] );
        }
        return $data;
    }

    function getCompanyType() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('company_type');
        return $query->result();
    }

    function getCompanyTypeById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('company_type');
        return $query->row();
    }

    function getCompanyClassification() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('company_classification');
        return $query->result();
    }

    function getCompanyClassificationById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('company_classification');
        return $query->row();
    }

    function getClassificationByCompanyId($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('company');
        return $query->row();
    }

    function getCompanyWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('company')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $companies = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('company');
            $companies = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($companies as $company) {
            $data[] = array("id" => $company['id'], "text" => format_number_with_digits($company['id'], COMPANY_ID_LENGTH) . ' - ' .$company['display_name'] );
        }
        return $data;
    }

    function getCompanyWithoutAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('company')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $companies = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('company');
            $companies = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($companies as $company) {
            $data[] = array("id" => $company['id'], "text" => format_number_with_digits($company['id'], COMPANY_ID_LENGTH) . ' - ' .$company['display_name'] );
        }
        return $data;
    }    

}
