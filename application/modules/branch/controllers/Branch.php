<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branch extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('branch_model');
        $this->load->model('location/location_model');
        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data['branches'] = $this->branch_model->getBranches();
        // $country_id = $data['branches']->country_id;
        // $state_id = $data['branches']->state_id;
        // $city_id = $data['branches']->city_id;
        // $barangay_id = $data['branches']->barangay_id;

        // $data['country'] = $this->location_model->getCountryById($country_id);
        // $data['state'] = $this->location_model->getStateById($state_id);
        // $data['city'] = $this->location_model->getCityById($city_id);
        // $data['barangay'] = $this->location_model->getBarangayById($barangay_id);
        $this->load->view('home/dashboardv2');
        $this->load->view('branch', $data);
    }

    public function addNewView() {
        $data['countries'] = $this->location_model->getCountry();
        $data['states'] = $this->location_model->getState();
        $data['cities'] = $this->location_model->getCity();
        $data['barangays'] = $this->location_model->getBarangay();
        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    public function addNew() {
        $id = $this->input->post('id');
        $display_name = $this->input->post('display_name');
        $address = $this->input->post('address');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $status = 'Active';

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Password Field
        $this->form_validation->set_rules('display_name', 'Display Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('country', 'Country', 'trim|min_length[2]|max_length[8]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('state', 'State', 'trim|min_length[2]|max_length[8]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('city', 'City', 'trim|min_length[2]|max_length[8]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('barangay', 'Barangay', 'trim|min_length[2]|max_length[8]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('postal', 'Postal', 'trim|required|min_length[2]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();

                $data['countries'] = $this->location_model->getCountry();
                $data['states'] = $this->location_model->getState();
                $data['cities'] = $this->location_model->getCity();
                $data['barangays'] = $this->location_model->getBarangay();
                $this->load->view('home/dashboardv2');
                $this->load->view('add_new', $data);
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();

                $data['countries'] = $this->location_model->getCountry();
                $data['states'] = $this->location_model->getState();
                $data['cities'] = $this->location_model->getCity();
                $data['barangays'] = $this->location_model->getBarangay();
                $this->load->view('home/dashboardv2');
                $this->load->view('add_new', $data);
            }
        } else {
            $data = array(
                'display_name' => $display_name,
                'street_address' => $address,
                'country_id' => $country,
                'state_id' => $state,
                'city_id' => $city,
                'barangay_id' => $barangay,
                'postal_code' => $postal,
                'status' => $status,
            );
            if (empty($id)) {
                $this->branch_model->insertBranch($data);
                $this->session->set_flashdata('success', lang('record_added'));
            } else {
                $this->branch_model->updateBranch($data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }

        redirect('branch');
        }
    }    


}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
