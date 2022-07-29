<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('hospital/hospital_model');
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;

    }

    public function index() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['profile'] = $this->profile_model->getProfileById($id);
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('profilev2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');

        $data['profile'] = $this->profile_model->getProfileById($id);
        if ($data['profile']->email != $email) {
            if ($this->ion_auth->email_check($email)) {
                $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                redirect('profile');
            }
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (!empty($password)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', lang('validation_error'));
            $data = array();
            $id = $this->ion_auth->get_user_id();
            $data['profile'] = $this->profile_model->getProfileById($id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('profile', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();
            $data = array(
                'name' => $name,
                'email' => $email,
            );

            $username = $this->input->post('name');
            $ion_user_id = $this->ion_auth->get_user_id();
            $group_id = $this->profile_model->getUsersGroups($ion_user_id)->row()->group_id;
            $group_name = $this->profile_model->getGroups($group_id)->row()->name;
            $group_name = strtolower($group_name);
            if (empty($password)) {
                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
            } else {
                $password = $this->ion_auth_model->hash_password($password);
            }
            $this->profile_model->updateIonUser($username, $email, $password, $ion_user_id);
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                $this->profile_model->updateProfile($ion_user_id, $data, $group_name);
                // if ($this->ion_auth->in_group(array('admin'))) {
                //     $this->hospital_model->updateHospitalByIonId($ion_user_id, $data);
                // } else {
                //     $this->profile_model->updateProfile($ion_user_id, $data, $group_name);
                // }
            }
            $this->session->set_flashdata('success', lang('record_updated'));

            // Loading View
            redirect('profile');
        }
    }

    public function changePassword() {
        $id = $this->ion_auth->get_user_id();
        $data = array();
        $data['profile'] = $this->profile_model->getProfileById($id);
        if (empty($_POST)) {
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('change_passwordv2', $data);
        } else {

            $password = $this->input->post('password');
            $confirm_passwords = $this->input->post('confirm_password');
            $current_password = $this->input->post('current_password');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            // Validating Password Field
            $this->form_validation->set_rules('current_password', 'Current Password', 'callback_current_password');
            $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', lang('validation_error'));

                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('change_passwordv2', $data);
            } else {

                $group_id = $this->profile_model->getUsersGroups($id)->row()->group_id;
                $group_name = $this->profile_model->getGroups($group_id)->row()->name;
                $group_name = strtolower($group_name);
                $password = $this->ion_auth_model->hash_password($password);

                $this->profile_model->updateIonUserPassword($password, $id);

                $this->session->set_flashdata('success', lang('password_changed_successfully'));

                // Loading View
                redirect('profile/changePassword');
            }
        }
    }

    public function getUserWithoutAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users

        $response = $this->profile_model->getUserWithoutAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function current_password($str) {
        $id = $this->ion_auth->get_user_id();
        $password_matches = $this->ion_auth->hash_password_db($id, $str);
        if ($password_matches === FALSE) {
            $this->form_validation->set_message('current_password', 'The {field} field does not match your current password.');
        }
        return $password_matches;
    }

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
