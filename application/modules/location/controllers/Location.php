<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('country_model');
        $this->load->model('location_model');

        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data['countries'] = $this->country_model->getCountry();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('country', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new');
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $currency_code = $this->input->post('currency_code');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field    
        // Validating Email Field
        $this->form_validation->set_rules('currency_code', 'Currency Code', 'trim|required|min_length[2]|max_length[255]|xss_clean');
        // Validating Address Field   
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();
                $data['country'] = $this->country_model->getCountryById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $data['setval'] = 'setval';
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'name' => $name,
                'currency_code' => $currency_code
            );
            if (empty($id)) {     // Adding New country
                $this->country_model->insertCountry($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else { // Updating country
                $this->country_model->updateCountry($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect('country');
        }
    }

    function getCountry() {
        $data['countries'] = $this->country_model->getCountry();
        $this->load->view('country', $data);
    }

    function getLocation() {
        $data = array();

        $country = $this->input->get('country');
        $state = $this->input->get('state');
        $city = $this->input->get('city');
        $barangay = $this->input->get('barangay');

        $data['country'] = $this->location_model->getCountryById($country);
        $data['state'] = $this->location_model->getStateById($state);
        $data['city'] = $this->location_model->getCountryById($city);
        $data['barangay'] = $this->location_model->getCountryById($barangay);

        echo json_encode($data);
    }

    function editCountry() {
        $data = array();
        $id = $this->input->get('id');
        $data['country'] = $this->country_model->getCountryById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editCountryByJason() {
        $id = $this->input->get('id');
        $data['country'] = $this->country_model->getCountryById($id);
        echo json_encode($data);
    }

    function delete() {
        $id = $this->input->get('id');
        $this->country_model->delete($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('country');
    }

}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
