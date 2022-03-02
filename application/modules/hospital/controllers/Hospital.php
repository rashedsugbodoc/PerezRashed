<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hospital extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('hospital_model');
        $this->load->model('hospital/package_model');
        $this->load->model('country/country_model');
        $this->load->model('donor/donor_model');
        $this->load->model('pgateway/pgateway_model');
        $this->load->model('sms/sms_model');
        $this->load->model('location/location_model');
        $this->load->model('settings/settings_model');
        $this->load->model('email/email_model');
        $this->load->helper(array('string','language'));
        if (!$this->ion_auth->in_group('superadmin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data['hospitals'] = $this->hospital_model->getHospital();
        $data['packages'] = $this->package_model->getPackage();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('hospital', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $data['packages'] = $this->package_model->getPackage();
        $data['entities'] = $this->settings_model->getEntityType();
        $data['zones'] = timezone_identifiers_list();
        $data['countries'] = $this->country_model->getCountry();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $data['packages'] = $this->package_model->getPackage();
        $data['zones'] = timezone_identifiers_list();
        $data['entities'] = $this->settings_model->getEntityType();
        $data['countries'] = $this->country_model->getCountry();
        $id = $this->input->post('id');
        $entity_type = $this->input->post('entity_type');
        $group_name = $this->input->post('group_name');
        $title = $this->input->post('title');
        $name = $this->input->post('name');
        $firstname = $this->input->post('firstname');
        $middlename = $this->input->post('middlename');
        $lastname = $this->input->post('lastname');
        $password = $this->input->post('password');
        $provider_email = $this->input->post('provider_email');
        $admin_email = $this->input->post('admin_email');
        $provider_address = $this->input->post('provider_address');
        $admin_address = $this->input->post('admin_address');
        $provider_phone = $this->input->post('provider_phone');
        $admin_phone = $this->input->post('admin_phone');
        $package = $this->input->post('package');
        $language = $this->input->post('language');
        $country_id = $this->input->post('country_id');
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $barangay_id = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $company_name = $this->input->post('company_name');
        $company_vat_number = $this->input->post('company_vat_number');
        $currency = $this->input->post('currency');
        $timezone = $this->input->post('timezone');
        $time_format = $this->input->post('time_format');
        $date_format = $this->input->post('date_format');
        $date_format_long = $this->input->post('date_format_long');
        $is_public = $this->input->post('is_public');

        if (!empty($package)) {
            $module = $this->package_model->getPackageById($package)->module;
            $p_limit = $this->package_model->getPackageById($package)->p_limit;
            $d_limit = $this->package_model->getPackageById($package)->d_limit;
            $loc_limit = $this->package_model->getPackageById($package)->loc_limit;
            $platform_percent_fee = $this->package_model->getPackageById($package)->platform_percent_fee;
            $platform_flat_fee = $this->package_model->getPackageById($package)->platform_flat_fee;

        } else {
            $p_limit = $this->input->post('p_limit');
            $d_limit = $this->input->post('d_limit');
            $loc_limit = $this->input->post('loc_limit');
            $platform_percent_fee = $this->input->post('platform_percent_fee');
            $platform_flat_fee = $this->input->post('platform_flat_fee');
            $module = $this->input->post('module');
            if (!empty($module)) {
                $module = implode(',', $module);
            }
        }

        $language_array = array('english', 'arabic', 'spanish', 'french', 'italian', 'portuguese');

        if (!in_array($language, $language_array)) {
            $language = 'english';
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Healthcare Provider Name Field
        $this->form_validation->set_rules('name', 'Healthcare Provider Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Healthcare Provider Display Name Field
        $this->form_validation->set_rules('title', 'Healthcare Provider Display Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Healthcare Provider Email Field
        $this->form_validation->set_rules('provider_email', 'Healthcare Provider Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]');
        // Validating Provider Address Field   
        $this->form_validation->set_rules('provider_address', 'Healthcare Provider Street Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');
        // Validating Healthcare Provider Phone Field           
        $this->form_validation->set_rules('provider_phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');        
        // Validating Administrator First Name Field
        $this->form_validation->set_rules('firstname', 'Administrator First Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Administrator Middle Name Field
        $this->form_validation->set_rules('middlename', 'Administrator Middle Name', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Administrator Last Name Field
        $this->form_validation->set_rules('lastname', 'Administrator Last Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Administrator Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Administrator Email Field
        $this->form_validation->set_rules('admin_email', 'Administrator Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]');
        // Validating Admin Address Field   
        $this->form_validation->set_rules('admin_address', 'Administrator Street Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');        

        // Validating Administrator Phone Field           
        $this->form_validation->set_rules('admin_phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');        

        // Validating Phone Field           
        $this->form_validation->set_rules('p_limit', 'Patient Limit', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Phone Field           
        $this->form_validation->set_rules('language', 'Language', 'trim|required|min_length[1]|max_length[50]|xss_clean');

        $this->form_validation->set_rules('country_id', 'Country ID', 'trim|required|min_length[1]|max_length[4]|xss_clean');
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('company_vat_number','Company VAT Number', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('entity_type', 'Healthcare Provider Type', 'trim|required|xss_clean');
        
        $country = $this->country_model->getCountryById($country_id);
        $hospital_password = $this->ion_auth->hash_code(random_string('alnum', 8));
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("hospital/editHospital?id=$id");
            } else {
                $data['packages'] = $this->package_model->getPackage();
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'name' => $name,
                'email' => $provider_email,
                'address' => $provider_address,
                'phone' => $provider_phone,
                'package' => $package,
                'p_limit' => $p_limit,
                'd_limit' => $d_limit,
                'loc_limit' => $loc_limit,
                'module' => $module
            );

            $fullname = $firstname . ' ' . $middlename . ' ' . $lastname;
            $data_admin = array();
            $data_admin = array(
                'name' => $fullname,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'lastname' => $lastname,
                'email' => $admin_email,
                'address' => $admin_address,
                'country_id' => $country_id,
                'phone' => $admin_phone
            );

            if (empty($id)) {     // Adding New Hospital
                if ($this->ion_auth->email_check($provider_email) || $this->ion_auth->email_check($admin_email)) {
                    $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                    redirect('hospital/addNewView');
                } else {
                    $dfg = 14;
                    $this->ion_auth->register($name, $hospital_password, $provider_email, $dfg);
                    $hospital_ion_user_id = $this->db->get_where('users', array('email' => $provider_email))->row()->id;
                    $data_with_date = array_merge(array('created_at' => gmdate('Y-m-d H:i:s')), $data);
                    $this->hospital_model->insertHospital($data_with_date);
                    $hospital_user_id = $this->db->get_where('hospital', array('email' => $provider_email))->row()->id;
                    $id_info = array('ion_user_id' => $hospital_ion_user_id);
                    $this->hospital_model->updateHospital($hospital_user_id, $id_info);

                    $dfg = 11;
                    $this->ion_auth->register($fullname, $password, $admin_email, $dfg);
                    $admin_ion_user_id = $this->db->get_where('users', array('email' => $admin_email))->row()->id;
                    $data_admin_with_date = array_merge(array('created_at' => gmdate('Y-m-d H:i:s')), $data_admin);
                    $this->hospital_model->insertHospitalAdmin($data_admin_with_date);
                    $admin_user_id = $this->db->get_where('admin', array('email' => $admin_email))->row()->id;
                    $id_info = array(
                        'ion_user_id' => $admin_ion_user_id,
                        'hospital_id' => $hospital_user_id
                    );
                    $this->hospital_model->updateHospitalAdmin($admin_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($admin_ion_user_id, $hospital_user_id);

                    $hospital_settings_data = array();
                    $hospital_settings_data = array('hospital_id' => $hospital_user_id,
                        'entity_type_id' => $entity_type,
                        'group_name' => $group_name,
                        'title' => $title,
                        'email' => $provider_email,
                        'address' => $provider_address,
                        'phone' => $provider_phone,
                        'language' => $language,
                        'country_id' => $country_id,
                        'state_id' => $state_id,
                        'city_id' => $city_id,
                        'barangay_id' => $barangay_id,
                        'postal' => $postal,
                        'company_name' => $company_name,
                        'company_vat_number' => $company_vat_number,
                        'timezone' => $timezone,
                        'time_format' => $time_format,
                        'date_format' => $date_format,
                        'date_format_long' => $date_format_long,
                        'system_vendor' => 'SugboDoc',
                        'sms_gateway' => 'Semaphore',
                        'currency' => $country->currency_symbol,
                        'currency_code' => $country->currency,
                        'platform_percent_fee' => $platform_percent_fee,
                        'platform_flat_fee' => $platform_flat_fee,
                        'is_public' => $is_public,
                        'created_at' => gmdate('Y-m-d H:i:s')
                    );
                    $this->settings_model->insertSettings($hospital_settings_data);
                    $hospital_blood_bank = array();
                    $hospital_blood_bank = array('Not Specified' => '0 Bags', 'A+' => '0 Bags', 'A-' => '0 Bags', 'B+' => '0 Bags', 'B-' => '0 Bags', 'AB+' => '0 Bags', 'AB-' => '0 Bags', 'O+' => '0 Bags', 'O-' => '0 Bags');
                    foreach ($hospital_blood_bank as $key => $value) {
                        $data_bb = array('group' => $key, 'status' => $value, 'hospital_id' => $hospital_user_id);
                        $this->donor_model->insertBloodBank($data_bb);
                        $data_bb = NULL;
                    }

                    $data_sms_clickatell = array();
                    $data_sms_clickatell = array(
                        'name' => 'Clickatell',
                        'username' => 'Your ClickAtell Username',
                        'password' => 'Your ClickAtell Password',
                        'api_id' => 'Your ClickAtell Api Id',
                        'user' => $this->ion_auth->get_user_id(),
                        'hospital_id' => $hospital_user_id
                    );

                    $this->sms_model->addSmsSettings($data_sms_clickatell);

                    $data_sms_semaphore = array(
                        'name' => 'Semaphore',
                        'username' => 'Your Semaphore Username',
                        'api_id' => '',
                        'sender' => 'Your Semaphore SenderName',
                        'authkey' => 'Your Semaphore API Key',
                        'user' => $this->ion_auth->get_user_id(),
                        'hospital_id' => $hospital_user_id
                    );

                    $this->sms_model->addSmsSettings($data_sms_semaphore);



                    $data_sms_twilio = array(
                        'name' => 'Twilio',
                        'sid' => 'SID Number',
                        'token' => 'Token Number',
                        'sendernumber' => 'Sender Number',
                        'user' => $this->ion_auth->get_user_id(),
                        'hospital_id' => $hospital_user_id
                    );

                    $this->sms_model->addSmsSettings($data_sms_twilio);

                    $data_pgateway_paypal = array(
                        'name' => 'PayPal', // Sandbox / testing mode option.
                        'APIUsername' => 'PayPal API Username', // PayPal API username of the API caller
                        'APIPassword' => 'PayPal API Password', // PayPal API password of the API caller
                        'APISignature' => 'PayPal API Signature', // PayPal API signature of the API caller
                        'status' => 'test',
                        'hospital_id' => $hospital_user_id
                    );

                    $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_paypal);

                    $data_pgateway_payumoney = array(
                        'name' => 'Pay U Money', // Sandbox / testing mode option.
                        'merchant_key' => 'Merchant key', // PayPal API username of the API caller
                        'salt' => 'Salt', // PayPal API password of the API caller
                        'status' => 'test',
                        'hospital_id' => $hospital_user_id
                    );

                    $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_payumoney);

                    $data_pgateway_stripe = array(
                        'name' => 'Stripe', // Sandbox / testing mode option.
                        'secret' => 'Secret', // Sandbox / testing mode option.
                        'publish' => 'Publish', // PayPal API username of the API caller
                        'hospital_id' => $hospital_user_id
                    );

                    $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_stripe);

                    $data_pgateway_payumoney = array(
                        'name' => 'Paystack', // Sandbox / testing mode option.
                        'public_key' => 'Public key', // PayPal API username of the API caller
                        'secret' => 'secret', // PayPal API password of the API caller
                        'status' => 'test',
                        'hospital_id' => $hospital_user_id
                    );

                    $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_payumoney);

                    $data_pgateway_paymongo = array(
                        'name' => 'Paymongo', // Sandbox / testing mode option.
                        'public_key' => 'Public Key', // Paymongo API username of the API caller
                        'secret' => 'Secret Key', // Paymongo API password of the API caller
                        'status' => 'test',
                        'hospital_id' => $hospital_user_id
                    );

                    $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_paymongo);                    

                    $data_email_settings = array(
                        'admin_email' => 'team@sugbodoc.com', // Sandbox / testing mode option.
                        'admin_email_display_name' => 'SugboDoc Team',
                        'hospital_id' => $hospital_user_id
                    );

                    $this->email_model->addEmailSettings($data_email_settings);

                    $this->hospital_model->createAutoSmsTemplate($hospital_user_id);
                    $this->hospital_model->createAutoEmailTemplate($hospital_user_id);
                    $this->hospital_model->createPersonalAccount($hospital_user_id);


                    $this->session->set_flashdata('feedback', lang('new_hospital_created'));
                    redirect('hospital');
                }
            } else { // Updating Hospital
                $hospital = $this->db->get_where('hospital', array('id' => $id))->row();
                $admin_user = $this->db->get_where('admin', array('hospital_id' => $id))->row();
                if ($hospital->email != $provider_email) {
                    if ($this->ion_auth->email_check($provider_email)) {
                    $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                    redirect('hospital/editHospital?id=' . $id);
                    }    
                }
                if (!empty($admin_user)) {
                    if ($admin_user->email != $admin_email) {
                        if ($this->ion_auth->email_check($admin_email)) {
                        $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                        redirect('hospital/editHospital?id=' . $id);
                        }
                    }
                }
                
                $hospital_ion_user_id = $hospital->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $hospital_ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth->hash_password($hospital_password);
                }
                $this->hospital_model->updateIonUser($name, $provider_email, $password, $hospital_ion_user_id);
                $data_with_date = array_merge(array('updated_at' => gmdate('Y-m-d H:i:s')), $data);
                $this->hospital_model->updateHospital($id, $data_with_date);

                //start of updating admin
                $data_admin_with_date = array_merge(array('updated_at' => gmdate('Y-m-d H:i:s')), $data_admin);
                if (empty($admin_user)) {
                    $dfg = 11;
                    $this->ion_auth->register($fullname, $password, $admin_email, $dfg);
                    $admin_ion_user_id = $this->db->get_where('users', array('email' => $admin_email))->row()->id;
                    $data_admin_with_date = array_merge(array('created_at' => gmdate('Y-m-d H:i:s')), $data_admin);
                    $this->hospital_model->insertHospitalAdmin($data_admin_with_date);
                    $admin_user_id = $this->db->get_where('admin', array('email' => $admin_email))->row()->id;
                    $id_info = array(
                        'ion_user_id' => $admin_ion_user_id,
                        'hospital_id' => $id
                    );
                    $this->hospital_model->updateHospitalAdmin($admin_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($admin_ion_user_id, $id);
                } else {
                    $this->hospital_model->updateHospitalAdmin($admin_user->id, $data_admin_with_date);
                    $this->hospital_model->updateIonUser($fullname, $admin_email, $password, $admin_user->ion_user_id);
                }
                


                $hospital_settings_data = array();
                $hospital_settings_data = array(
                    'entity_type_id' => $entity_type,
                    'group_name' => $group_name,
                    'title' => $title,
                    'email' => $provider_email,
                    'address' => $provider_address,
                    'phone' => $provider_phone,
                    'language' => $language,
                    'country_id' => $country_id,
                    'state_id' => $state_id,
                    'city_id' => $city_id,
                    'barangay_id' => $barangay_id,
                    'postal' => $postal,
                    'company_name' => $company_name,
                    'company_vat_number' => $company_vat_number,
                    'timezone' => $timezone,
                    'time_format' => $time_format,
                    'date_format' => $date_format,
                    'date_format_long' => $date_format_long,
                    'system_vendor' => 'SugboDoc',
                    'sms_gateway' => 'Semaphore',
                    'currency' => $country->currency_symbol,
                    'currency_code' => $country->currency,
                    'platform_percent_fee' => $platform_percent_fee,
                    'platform_flat_fee' => $platform_flat_fee,
                    'is_public' => $is_public,
                    'updated_at' => gmdate('Y-m-d H:i:s')
                );
                $this->settings_model->updateHospitalSettings($id, $hospital_settings_data);


                $this->session->set_flashdata('feedback', lang('updated'));
                redirect('hospital/editHospital?id=' . $id);
            }
            // Loading View
        }
    }

    function getHospital() {
        $data['hospitals'] = $this->hospital_model->getHospital();
        $this->load->view('hospital', $data);
    }

    function activate() {
        $hospital_id = $this->input->get('hospital_id');
         $redirect = $this->input->get('redirect');
        $data = array('is_active' => 1, 'updated_at' => gmdate('Y-m-d H:i:s'));
        $this->hospital_model->activate($hospital_id, $data);
        $this->session->set_flashdata('feedback', lang('activated'));
         if ($redirect == 'deactivated') {
            redirect('hospital/deactivated');
        } elseif ($redirect == 'activated') {
            redirect('hospital/activated');
        } else {
            redirect('hospital');
        }
        
    }

    function deactivate() {
        $hospital_id = $this->input->get('hospital_id');
        $redirect = $this->input->get('redirect');
        $data = array('is_active' => 0, 'updated_at' => gmdate('Y-m-d H:i:s'));
        $this->hospital_model->deactivate($hospital_id, $data);
        $this->session->set_flashdata('feedback', lang('deactivated'));
        if ($redirect == 'deactivated') {
            redirect('hospital/deactivated');
        } elseif ($redirect == 'activated') {
            redirect('hospital/activated');
        } else {
            redirect('hospital');
        }
    }

    function enablelogin() {
        $hospital_id = $this->input->get('hospital_id');
         $redirect = $this->input->get('redirect');
        $data = array('active' => 1, 'updated_at' => gmdate('Y-m-d H:i:s'));
        $this->hospital_model->enablelogin($hospital_id, $data);
        $this->session->set_flashdata('feedback', lang('login_enabled'));
         if ($redirect == 'deactivated') {
            redirect('hospital/deactivated');
        } elseif ($redirect == 'activated') {
            redirect('hospital/activated');
        } else {
            redirect('hospital');
        }
        
    }

    function disablelogin() {
        $hospital_id = $this->input->get('hospital_id');
        $redirect = $this->input->get('redirect');
        $data = array('active' => 0, 'updated_at' => gmdate('Y-m-d H:i:s'));
        $this->hospital_model->disablelogin($hospital_id, $data);
        $this->session->set_flashdata('feedback', lang('login_disabled'));
        if ($redirect == 'deactivated') {
            redirect('hospital/deactivated');
        } elseif ($redirect == 'activated') {
            redirect('hospital/activated');
        } else {
            redirect('hospital');
        }
    }

    function editHospital() {
        $data = array();
        $id = $this->input->get('id');
        $data['zones'] = timezone_identifiers_list();
        $data['countries'] = $this->country_model->getCountry();
        $data['packages'] = $this->package_model->getPackage();
        $data['hospital'] = $this->hospital_model->getHospitalById($id);
        $data['entities'] = $this->settings_model->getEntityType();
        $data['settings'] = $this->settings_model->getSettingsByHospitalId($id);
        $data['admin'] = $this->hospital_model->getHospitalAdminByHospitalId($id);

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editHospitalByJason() {
        $id = $this->input->get('id');
        $data['hospital'] = $this->hospital_model->getHospitalById($id);
        $data['settings'] = $this->settings_model->getSettingsByHId($id);
        echo json_encode($data);
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('hospital', array('id' => $id))->row();
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->hospital_model->delete($id);
        redirect('hospital');
    }

    public function activated() {
        $data['hospitals'] = $this->hospital_model->getActiveHospital();
        $data['packages'] = $this->package_model->getPackage();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('activated_hospital', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function deactivated() {
        $data['hospitals'] = $this->hospital_model->getDeactivatedHospital();
        $data['packages'] = $this->package_model->getPackage();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('deactivated_hospital', $data);
        $this->load->view('home/footer'); // just the header file
    }

}

/* End of file hospital.php */
/* Location: ./application/modules/hospital/controllers/hospital.php */
