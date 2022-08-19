<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companyuser extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('companyuser/companyuser_model');
        $this->load->model('company/company_model');
        $this->load->model('location/location_model');
        $this->load->helper('string');
 
        if (!$this->ion_auth->in_group(array('admin','CompanyUser'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        //$data['company'] = $this->company_model->getCompany();
        $data['companyusers'] = $this->companyuser_model->getCompanyUser();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('companyuserv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $data['companies'] = $this->company_model->getCompany();
        $data['countries'] = $this->location_model->getCountry();
        // $data['companyusers'] = $this->companyuser_model->getCompanyUser();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {

        $id = $this->input->post('id');
        $fname = $this->input->post('fname');
        $mname = $this->input->post('mname');
        $lname = $this->input->post('lname');
        $suffix = $this->input->post('suffix');
        $password = random_string('alnum', 8);
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $company_id = $this->input->post('company_id');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $scope_level = $this->input->post('scope_level');
        $scope_array = $this->input->post('scope');

        $redirect = $this->input->post('redirect');

        $scope = implode(",", $scope_array);

        $emailById = $this->companyuser_model->getCompanyUserById($id)->email;

        if ($suffix === '0') {
            $suffix = null;
        }

        $name = $fname.' '.$mname.' '.$lname.' '.$suffix;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Name Field
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Name Field
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Password Field

        if (empty($id)) {
            if ($email !== $emailById) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|is_unique[users.email]|max_length[100]|xss_clean');
            } else {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|max_length[100]|xss_clean');
            }
        }

        $this->form_validation->set_message('is_unique',lang('this_email_address_is_already_registered'));
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[500]|xss_clean');
         // Validating Address Field   
        $this->form_validation->set_rules('country_id', 'Country', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('state_id', 'State', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('city_id', 'City', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('scope_level', 'Scope Level', 'trim|required|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company', 'trim|required|min_length[1]|max_length[50]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                // $id = $this->input->get('id');
                if (!$this->ion_auth->in_group(('CompanyUser'))) {
                    $data['companies'] = $this->company_model->getCompany();
                    $data['countries'] = $this->location_model->getCountry();
                    $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                    $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    redirect($redirect);
                }
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                if (!$this->ion_auth->in_group(('CompanyUser'))) {
                    $data['companies'] = $this->company_model->getCompany();
                    $data['countries'] = $this->location_model->getCountry();
                    $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                    $data['setval'] = 'setval';
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the header file
                } else {
                    redirect($redirect);
                }
            }
        } else {
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False,
                'max_size' => "2048", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                if (!empty($id)) {
                    $data = array(
                        'img_url' => $img_url,
                        'name' => $name,
                        'firstname' => $fname,
                        'middlename' => $mname,
                        'lastname' => $lname,
                        'suffix' => $suffix,
                        'address' => $address,
                        'phone' => $phone,
                        'company_id' => $company_id,
                        'country_id' => $country,
                        'state_id' => $state,
                        'city_id' => $city,
                        'barangay_id' => $barangay,
                        'postal' => $postal,
                        'scope_level' => $scope_level,
                        'scope_id' => $scope,
                    );
                } else {
                    $data = array(
                        'img_url' => $img_url,
                        'name' => $name,
                        'firstname' => $fname,
                        'middlename' => $mname,
                        'lastname' => $lname,
                        'suffix' => $suffix,
                        'email' => $email,
                        'address' => $address,
                        'phone' => $phone,
                        'company_id' => $company_id,
                        'country_id' => $country,
                        'state_id' => $state,
                        'city_id' => $city,
                        'barangay_id' => $barangay,
                        'postal' => $postal,
                        'scope_level' => $scope_level,
                        'scope_id' => $scope,
                    );
                }
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                if (!empty($id)) {
                    $data = array(
                        'name' => $name,
                        'firstname' => $fname,
                        'middlename' => $mname,
                        'lastname' => $lname,
                        'suffix' => $suffix,
                        'address' => $address,
                        'phone' => $phone,
                        'company_id' => $company_id,
                        'country_id' => $country,
                        'state_id' => $state,
                        'city_id' => $city,
                        'barangay_id' => $barangay,
                        'postal' => $postal,
                        'scope_level' => $scope_level,
                        'scope_id' => $scope,
                    );
                } else {
                    $data = array(
                        'name' => $name,
                        'firstname' => $fname,
                        'middlename' => $mname,
                        'lastname' => $lname,
                        'suffix' => $suffix,
                        'email' => $email,
                        'address' => $address,
                        'phone' => $phone,
                        'company_id' => $company_id,
                        'country_id' => $country,
                        'state_id' => $state,
                        'city_id' => $city,
                        'barangay_id' => $barangay,
                        'postal' => $postal,
                        'scope_level' => $scope_level,
                        'scope_id' => $scope,
                    );
                }
                
            }

            $username = $name;

            if (empty($id)) {     // Adding New Company User
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                    $data = array();
                    $data['setval'] = 'setval';
                    $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                    $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        $dfg = 12;
                        $this->ion_auth->register($username, $password, $email, $dfg);
                        $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                        $this->companyuser_model->insertCompanyUser($data);
                        $companyuser_user_id = $this->db->get_where('companyuser', array('email' => $email))->row()->id;
                        $id_info = array('ion_user_id' => $ion_user_id);
                        $this->companyuser_model->updateCompanyUser($companyuser_user_id, $id_info);
                        $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                        $set['settings'] = $this->settings_model->getSettings();
                        $data1 = array(
                            'firstname' => $fname,
                            'lastname' => $lname,
                            'name' => $name,
                            'email' => $email,
                            'password' => $password,
                            'company' => $set['settings']->system_vendor,
                            'hospital_name' => $set['settings']->title,
                            'hospital_contact' => $set['settings']->phone
                        );

                        $autoemail = $this->email_model->getAutoEmailByType('companyuser');
                        if ($autoemail->status == 'Active') {
                            $emailSettings = $this->email_model->getEmailSettings();
                            $message1 = $autoemail->message;
                            $messageprint1 = $this->parser->parse_string($message1, $data1);
                            $this->email->from($emailSettings->admin_email, $emailSettings->admin_email_display_name);
                            $this->email->to($email);
                            $this->email->subject(lang('welcome_to').$set['settings']->title);
                            $this->email->message($messageprint1);
                            $this->email->send();
                        }
                        $this->session->set_flashdata('success', lang('record_added'));
                        if (empty($redirect)) {
                            redirect('companyuser');
                        } else {
                            redirect($redirect);
                        }
                    } else {
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            // $id = $this->input->get('id');
                            if (!$this->ion_auth->in_group(('CompanyUser'))) {
                                $data['setval'] = 'setval';
                                $data['companies'] = $this->company_model->getCompany();
                                $data['countries'] = $this->location_model->getCountry();
                                $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                                $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                                $this->load->view('home/dashboardv2'); // just the header file
                                $this->load->view('add_newv2', $data);
                                // $this->load->view('home/footer'); // just the footer file
                            } else {
                                redirect($redirect);
                            }
                        } else {
                            $dfg = 12;
                            $this->ion_auth->register($username, $password, $email, $dfg);
                            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                            $this->companyuser_model->insertCompanyUser($data);
                            $companyuser_user_id = $this->db->get_where('companyuser', array('email' => $email))->row()->id;
                            $id_info = array('ion_user_id' => $ion_user_id);
                            $this->companyuser_model->updateCompanyUser($companyuser_user_id, $id_info);
                            $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                            $set['settings'] = $this->settings_model->getSettings();
                            $data1 = array(
                                'firstname' => $fname,
                                'lastname' => $lname,
                                'name' => $name,
                                'email' => $email,
                                'password' => $password,
                                'company' => $set['settings']->system_vendor,
                                'hospital_name' => $set['settings']->title,
                                'hospital_contact' => $set['settings']->phone
                            );

                            $autoemail = $this->email_model->getAutoEmailByType('companyuser');
                            if ($autoemail->status == 'Active') {
                                $emailSettings = $this->email_model->getEmailSettings();
                                $message1 = $autoemail->message;
                                $messageprint1 = $this->parser->parse_string($message1, $data1);
                                $this->email->from($emailSettings->admin_email, $emailSettings->admin_email_display_name);
                                $this->email->to($email);
                                $this->email->subject(lang('welcome_to').$set['settings']->title);
                                $this->email->message($messageprint1);
                                $this->email->send();
                            }
                            $this->session->set_flashdata('success', lang('record_added'));
                            if (empty($redirect)) {
                                redirect('companyuser');
                            } else {
                                redirect($redirect);
                            }
                        }
                    }
                }
            } else { // Updating Company User
                // $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                // $this->session->set_flashdata('fileError', $fileError);
                if ($email !== $emailById) {
                    if ($this->ion_auth->email_check($email)) {
                        $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                        $data = array();
                        $data['setval'] = 'setval';
                        $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                        $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('add_newv2', $data);
                        // $this->load->view('home/footer'); // just the footer file
                    } else {
                        if ($this->upload->do_upload('img_url')) {
                            // $ion_user_id = $this->db->get_where('companyuser', array('id' => $id))->row()->ion_user_id;
                            // if (empty($password)) {
                            //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            // } else {
                            //     $password = $this->ion_auth_model->hash_password($password);
                            // }
                            // $this->companyuser_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->companyuser_model->updateCompanyUser($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (empty($redirect)) {
                                redirect('companyuser');
                            } else {
                                redirect($redirect);
                            }
                        } else {
                            if ($_FILES['img_url']['size'] > $config['max_size']) {
                                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                                $this->session->set_flashdata('fileError', $fileError);
                                $this->session->set_flashdata('error', lang('validation_error'));
                                $data = array();
                                // $id = $this->input->get('id');
                                if (!$this->ion_auth->in_group(('CompanyUser'))) {
                                    $data['setval'] = 'setval';
                                    $data['companies'] = $this->company_model->getCompany();
                                    $data['countries'] = $this->location_model->getCountry();
                                    $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                                    $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                                    $this->load->view('home/dashboardv2'); // just the header file
                                    $this->load->view('add_newv2', $data);
                                    // $this->load->view('home/footer'); // just the footer file
                                } else {
                                    redirect($redirect);
                                }
                            } else {
                                // $ion_user_id = $this->db->get_where('companyuser', array('id' => $id))->row()->ion_user_id;
                                // if (empty($password)) {
                                //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                                // } else {
                                //     $password = $this->ion_auth_model->hash_password($password);
                                // }
                                // $this->companyuser_model->updateIonUser($username, $email, $password, $ion_user_id);
                                $this->companyuser_model->updateCompanyUser($id, $data);
                                $this->session->set_flashdata('success', lang('record_updated'));
                                if (empty($redirect)) {
                                    redirect('companyuser');
                                } else {
                                    redirect($redirect);
                                }
                            }
                        }
                    }
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        // $ion_user_id = $this->db->get_where('companyuser', array('id' => $id))->row()->ion_user_id;
                        // if (empty($password)) {
                        //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        // } else {
                        //     $password = $this->ion_auth_model->hash_password($password);
                        // }
                        // $this->companyuser_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->companyuser_model->updateCompanyUser($id, $data);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        if (empty($redirect)) {
                            redirect('companyuser');
                        } else {
                            redirect($redirect);
                        }
                    } else {
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            $this->session->set_flashdata('fileError', $fileError);
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            // $id = $this->input->get('id');
                            if (!$this->ion_auth->in_group(('CompanyUser'))) {
                                $data['setval'] = 'setval';
                                $data['companies'] = $this->company_model->getCompany();
                                $data['countries'] = $this->location_model->getCountry();
                                $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                                $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                                $this->load->view('home/dashboardv2'); // just the header file
                                $this->load->view('add_newv2', $data);
                                // $this->load->view('home/footer'); // just the footer file
                            } else {
                                redirect($redirect);
                            }
                        } else {
                            // $ion_user_id = $this->db->get_where('companyuser', array('id' => $id))->row()->ion_user_id;
                            // if (empty($password)) {
                            //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            // } else {
                            //     $password = $this->ion_auth_model->hash_password($password);
                            // }
                            // $this->companyuser_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->companyuser_model->updateCompanyUser($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (empty($redirect)) {
                                redirect('companyuser');
                            } else {
                                redirect($redirect);
                            }
                        }
                    }
                }
            }
            // Loading View
            // redirect('companyuser');
        }
    }

    function getCompanyUser() {
        $data['companyusers'] = $this->companyuser_model->getCompanyUser();
        $this->load->view('companyuser', $data);
    }

    function editCompanyUser() {
        $data = array();
        $id = $this->input->get('id');
        $data['id'] = $this->input->get('id');
        $data['companies'] = $this->company_model->getCompany();
        $data['countries'] = $this->location_model->getCountry();
        $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
        // $data['scopes'] = explode(',', $data['companyuser']->scope_id);

        if ($data['companyuser']->scope_level === "country") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getCountryById($scope);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "state") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getStateInfoWithCountryName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getStateByIdWithCountryName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "city") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getCityInfoWithStateName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getCityByIdWithStateName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "barangay") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getBarangayInfoWithCityName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getBarangayByIdWithCityName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        $data['scopes'] = $scopes;

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editProfile() {
        $data = array();
        $user = $this->ion_auth->get_user_id();
        $id = $this->companyuser_model->getCompanyUserByIonUserId($user)->id;
        $data['id'] = $id;
        $data['companies'] = $this->company_model->getCompany();
        $data['countries'] = $this->location_model->getCountry();
        $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
        $data['card_header'] = lang('edit').' '.lang('profile');
        $data['redirect'] = 'companyuser/editProfile';
        // $data['scopes'] = explode(',', $data['companyuser']->scope_id);

        if ($data['companyuser']->scope_level === "country") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getCountryById($scope);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "state") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getStateInfoWithCountryName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getStateByIdWithCountryName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "city") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getCityInfoWithStateName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getCityByIdWithStateName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "barangay") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getBarangayInfoWithCityName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getBarangayByIdWithCityName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        $data['scopes'] = $scopes;

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editCompanyUserByJason() {
        $id = $this->input->get('id');
        $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
        $data['company'] = $this->company_model->getCompanyById($data['companyuser']->company_id);

        if ($data['companyuser']->scope_level === "country") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getCountryById($scope);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "state") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getStateByIdWithCountryName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getStateByIdWithCountryName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "city") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getCityByIdWithStateName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getCityByIdWithStateName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        if ($data['companyuser']->scope_level === "barangay") {
            $scope_array = explode(',', $data['companyuser']->scope_id);
            $data['scopeState'] = $this->location_model->getBarangayByIdWithCityName(null, $data['companyuser']->country_id);
            $scopes = [];
            foreach ($scope_array as $scope) {
                $scope_data = $this->location_model->getBarangayByIdWithCityName($scope, $data['companyuser']->country_id);
                $scopes[] = $scope_data;
            }
        }
        $data['scopes'] = $scopes;
        $country_id = $data['companyuser']->country_id;
        $state_id = $data['companyuser']->state_id;
        $city_id = $data['companyuser']->city_id;
        $barangay_id = $data['companyuser']->barangay_id;

        $data['country']= $this->location_model->getCountryById($country_id);
        $data['state']= $this->location_model->getStateById($state_id);
        $data['city']= $this->location_model->getCityById($city_id);
        $data['barangay']= $this->location_model->getBarangayById($barangay_id);
        echo json_encode($data);
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('companyuser', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->companyuser_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('companyuser');
    }

    public function getCompanyInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->company_model->getCompanyInfo($searchTerm);

        echo json_encode($response);
    }

    function getStateByCountryIdByJason() {
        $data = array();
        $country_id = $this->input->get('country');

        $data['state'] = $this->location_model->getStateByCountryId($country_id);
        
        echo json_encode($data);        
    }

    public function getCityByStateIdByJason() {
        $data = array();
        $state_id = $this->input->get('state');

        $data['city'] = $this->location_model->getCityByStateId($state_id);

        echo json_encode($data);        
    }

    public function getBarangayByCityIdByJason() {
        $data = array();
        $city_id = $this->input->get('city');

        $data['barangay'] = $this->location_model->getBarangayByCityId($city_id);

        echo json_encode($data);        
    }

    public function getCountryInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->location_model->getCountryInfo($searchTerm);

        echo json_encode($response);
    }

    public function getStateInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');
        $country = $this->input->get('country');

// Get users
        $response = $this->location_model->getStateInfoWithCountryName($searchTerm, $country);

        echo json_encode($response);
    }

    public function getCityInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');
        $country = $this->input->get('country');

// Get users
        $response = $this->location_model->getCityInfoWithStateName($searchTerm, $country);

        echo json_encode($response);
    }

    public function getBarangayInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');
        $country = $this->input->get('country');

// Get users
        $response = $this->location_model->getBarangayInfoWithCityName($searchTerm, $country);

        echo json_encode($response);
    }

}

/* End of file companyuser.php */
/* Location: ./application/modules/companyuser/controllers/companyuser.php */
