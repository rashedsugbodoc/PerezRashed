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
        $this->load->view('home/dashboardv2');
        $this->load->view('branch', $data);
    }

    public function addNewView() {
        $data['countries'] = $this->location_model->getCountry();
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
        $phone = $this->input->post('phone');
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
        // Validating Password Field
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[11]|max_length[100]|xss_clean');

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
                'phone' => $phone,
                'status' => $status,
            );
            if (empty($id)) {
                $this->branch_model->insertBranch($data);
                $this->session->set_flashdata('success', lang('record_added'));
            } else {
                $this->branch_model->updateBranch($data, $id);
                $this->session->set_flashdata('success', lang('record_updated'));
            }

        redirect('branch');
        }
    }    

    public function editBranch() {
        $data['id'] = $this->input->get('id');
        if (!empty($data['id'])) {
            $data['branch'] = $this->branch_model->getBranchById($data['id']);
        }
        $data['countries'] = $this->location_model->getCountry();
        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    public function editBranchByJason() {
        $id = $this->input->get('id');
        $data['branch'] = $this->branch_model->getBranchById($id);

        echo json_encode($data);
    }

    public function getStateByIdByJason() {
        $id = $this->input->get('id');
        $data['state'] = $this->location_model->getStateById($id);

        echo json_encode($data);
    }

    public function getStateByCountryIdByJason() {
        $country = $this->input->get('country');
        $id = $this->input->get('id');
        $data['state'] = $this->location_model->getStateByCountryId($country);
        $data['branch'] = $this->branch_model->getBranchById($id);

        echo json_encode($data);
    }

    public function getCityByIdByJason() {
        $id = $this->input->get('id');
        $data['city'] = $this->location_model->getCityById($id);

        echo json_encode($data);
    }

    public function getCityByStateIdByJason() {
        $state = $this->input->get('state');
        $id = $this->input->get('id');
        $data['city'] = $this->location_model->getCityByStateId($state);
        $data['branch'] = $this->branch_model->getBranchById($id);

        echo json_encode($data);
    }

    public function getBarangayByIdByJason() {
        $id = $this->input->get('id');
        $data['barangay'] = $this->location_model->getBarangayById($id);

        echo json_encode($data);
    }

    public function getBarangayByCityIdByJason() {
        $city = $this->input->get('city');
        $id = $this->input->get('id');
        $data['barangay'] = $this->location_model->getBarangayByCityId($city);
        $data['branch'] = $this->branch_model->getBranchById($id);

        echo json_encode($data);
    }


}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
