<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('patient_model');
        $this->load->model('donor/donor_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('bed/bed_model');
        $this->load->model('lab/lab_model');
        $this->load->model('finance/finance_model');
        $this->load->model('finance/pharmacy_model');
        $this->load->model('sms/sms_model');
        $this->load->model('company/company_model');
        $this->load->module('sms');
        $this->load->model('prescription/prescription_model');
        require APPPATH . 'third_party/stripe/stripe-php/init.php';
        $this->load->model('medicine/medicine_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('department/department_model');
        $this->load->module('paypal');
        $this->load->model('location/location_model');
        $this->load->model('branch/branch_model');
        if (!$this->ion_auth->in_group(array('admin', 'Nurse', 'Patient', 'Doctor', 'Laboratorist', 'Accountant', 'Receptionist','Pharmacist','CompanyUser'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        if ($this->ion_auth->in_group(array('Patient', 'Pharmacist', 'Accountant', 'CompanyUser'))) {
            redirect('home/permission');
        }
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['settings'] = $this->settings_model->getSettings();
        $data['countries'] = $this->location_model->getCountry();
        $data['states'] = $this->location_model->getState();
        $data['cities'] = $this->location_model->getCity();
        $data['barangays'] = $this->location_model->getBarangay();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('patientv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function findDoctors(){
        $data['departments'] = $this->department_model->getDepartment();
        // $data['doctors'] = $this->doctor_model->getDoctor();
        $data['doctors'] = $this->doctor_model->getAllDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2');
        $this->load->view('find_doctors', $data);
    }

    public function calendar() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist', 'Patient'))) {
            redirect('home/permission');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('calendar', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function getStateByCountryIdByJason() {
        $data = array();
        $country_id = $this->input->get('country');
        $patient_id = $this->input->get('patient');

        $data['state'] = $this->location_model->getStateByCountryId($country_id);
        $data['patient'] = $this->patient_model->getPatientById($patient_id);
        

        echo json_encode($data);        
    }

    public function getCityByStateIdByJason() {
        $data = array();
        $state_id = $this->input->get('state');
        $patient_id = $this->input->get('patient');

        $data['city'] = $this->location_model->getCityByStateId($state_id);
        $data['patient'] = $this->patient_model->getPatientById($patient_id);

        echo json_encode($data);        
    }

    public function getBarangayByCityIdByJason() {
        $data = array();
        $city_id = $this->input->get('city');
        $patient_id = $this->input->get('patient');

        $data['barangay'] = $this->location_model->getBarangayByCityId($city_id);
        $data['patient'] = $this->patient_model->getPatientById($patient_id);

        echo json_encode($data);        
    }

    public function addNewView() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) {
            redirect('home/permission');
        }
        $data = array();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) {
            redirect('home/permission');
        }

        $id = $this->input->post('id');


        if (empty($id)) {
            $limit = $this->patient_model->getLimit();
            if ($limit <= 0) {
                $this->session->set_flashdata('warning', lang('patient_limit_exceed'));
                redirect('patient');
            }
            
        }


        $redirect = $this->input->get('redirect');
        if (empty($redirect)) {
            $redirect = $this->input->post('redirect');
        }
        $fname = $this->input->post('f_name');
        $lname = $this->input->post('l_name');
        $mname = $this->input->post('m_name');
        $suffix = $this->input->post('suffix');
        $password = $this->input->post('password');
        $sms = $this->input->post('sms');
        $doctor = $this->input->post('doctor');
        $address = $this->input->post('address');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');

        $phone = $this->input->post('phone');
        $sex = $this->input->post('sex');
        $birthdate = $this->input->post('birthdate');
        $bloodgroup = $this->input->post('bloodgroup');
        $patient_id = $this->input->post('p_id');

        $name = $fname . ' ' . $mname . ' ' . $lname . ' ' . $suffix;
        if (!empty($doctor)) {
            $data['doctorNames'] = implode(',', $doctor);
        }
        $doctor = $data['doctorNames'];
        if (empty($patient_id)) {
            $patient_id = rand(10000, 1000000);
        }
        if ((empty($id))) {
            $add_date = date('m/d/y');
            $registration_time = time();
        } else {
            $add_date = $this->patient_model->getPatientById($id)->add_date;
            $registration_time = $this->patient_model->getPatientById($id)->registration_time;
        }


        $email = $this->input->post('email');
        if (empty($email)) {
            $email = $name . '@' . $phone . '.com';
        }

        $emailById = $this->patient_model->getPatientById($id)->email;


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Fname Field
        $this->form_validation->set_rules('f_name', 'First Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Lname Field
        $this->form_validation->set_rules('l_name', 'Last Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Mname Field
        $this->form_validation->set_rules('m_name', 'Middle Name', 'trim|min_length[2]|max_length[100]|xss_clean');
        // Validating Suffix Field
        $this->form_validation->set_rules('suffix', 'Suffix', 'trim|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[3]|max_length[100]|xss_clean');
        }

        if ($email !== $emailById) {
            $this->form_validation->set_rules('email', 'Email', 'trim|min_length[2]|valid_email|is_unique[patient.email]|max_length[100]|xss_clean');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|min_length[2]|valid_email|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_message('is_unique',lang('this_email_address_is_already_registered'));
        // Validating Doctor Field
        //   $this->form_validation->set_rules('doctor', 'Doctor', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('country', 'Country', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('state', 'State', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('city', 'City', 'trim|max_length[100]|xss_clean');
        // Validating Postal Field   
        $this->form_validation->set_rules('postal', 'Postal', 'trim|alpha_numeric|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|min_length[2]|max_length[50]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('sex', 'Sex', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'trim|min_length[2]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('bloodgroup', 'Blood Group', 'trim|max_length[15]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();

                // $id = $this->input->get('id');
                $data['patient'] = $this->patient_model->getPatientById($id);
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['groups'] = $this->donor_model->getBloodBank();
                $data['countries'] = $this->location_model->getCountry();
                $data['states'] = $this->location_model->getState();
                $data['cities'] = $this->location_model->getCity();
                $data['barangays'] = $this->location_model->getBarangay();
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_newv2', $data);
                // $this->load->view('home/footer'); // just the footer file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['setval'] = 'setval';
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['groups'] = $this->donor_model->getBloodBank();
                $data['countries'] = $this->location_model->getCountry();
                $data['states'] = $this->location_model->getState();
                $data['cities'] = $this->location_model->getCity();
                $data['barangays'] = $this->location_model->getBarangay();
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_newv2', $data);
                // $this->load->view('home/footer'); // just the header file
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
                'encrypt_name' => True,
                'upload_path' => "./uploads/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "10000",
                'max_width' => "10000"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            $username = $name;

            $path = $this->upload->data();
            if (!empty($path['file_name'])) {
                $img_url = "uploads/" . $path['file_name'];
            } else {
                $img_url = $this->patient_model->getPatientById($id)->img_url;
            }

            $data = array();

            $data = array(
                'patient_id' => $patient_id,
                'img_url' => $img_url,
                'name' => $name,
                'firstname' => $fname,
                'lastname' => $lname,
                'middlename' => $mname,
                'suffix' => $suffix,
                'email' => $email,
                'address' => $address,
                'country_id' => $country,
                'state_id' => $state,
                'city_id' => $city,
                'barangay_id' => $barangay,
                'postal' => $postal,
                'doctor' => $doctor,
                'phone' => $phone,
                'sex' => $sex,
                'birthdate' => $birthdate,
                'bloodgroup' => $bloodgroup,
                'add_date' => $add_date,
                'registration_time' => $registration_time
            );

            if (empty($id)) {     // Adding New Patient
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                    $data = array();
                    $data['patient'] = $this->patient_model->getPatientById($id);
                    $data['doctors'] = $this->doctor_model->getDoctor();
                    $data['groups'] = $this->donor_model->getBloodBank();
                    $data['countries'] = $this->location_model->getCountry();
                    $data['states'] = $this->location_model->getState();
                    $data['cities'] = $this->location_model->getCity();
                    $data['barangays'] = $this->location_model->getBarangay();
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        

                        $dfg = 5;
                        $this->ion_auth->register($username, $password, $email, $dfg);
                        $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                        $this->patient_model->insertPatient($data);
                        $patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
                        $id_info = array('ion_user_id' => $ion_user_id);
                        $this->patient_model->updatePatient($patient_user_id, $id_info);
                        $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                        //sms
                        $set['settings'] = $this->settings_model->getSettings();
                        $autosms = $this->sms_model->getAutoSmsByType('patient');
                        $message = $autosms->message;
                        $to = $phone;
                        $name1 = explode(' ', $name);
                        if (!isset($name1[1])) {
                            $name1[1] = null;
                        }
                        $data1 = array(
                            'firstname' => $name1[0],
                            'lastname' => $name1[1],
                            'name' => $name,
                            'email' => $email,
                            'password' => $password,
                            'doctor' => $doctor_name,
                            'company' => $set['settings']->system_vendor,
                            'hospital_name' => $set['settings']->title,
                            'hospital_contact' => $set['settings']->phone
                        );
                        //   if (!empty($sms)) {
                        // $this->sms->sendSmsDuringPatientRegistration($patient_user_id);
                        if ($autosms->status == 'Active') {
                            $messageprint = $this->parser->parse_string($message, $data1);
                            $data2[] = array($to => $messageprint);
                            $this->sms->sendSms($to, $message, $data2);
                        }
                        //end
                        //  }
                        //email

                        $autoemail = $this->email_model->getAutoEmailByType('patient');
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

                        //end



                        $this->session->set_flashdata('success', lang('record_added'));
                        redirect('patient');

                    } else {
                        //additional validation for uploading file in add modal
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            $this->session->set_flashdata('fileError', $fileError);
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            $data['setval'] = 'setval';
                            $data['patient'] = $this->patient_model->getPatientById($id);
                            $data['doctors'] = $this->doctor_model->getDoctor();
                            $data['groups'] = $this->donor_model->getBloodBank();
                            $data['countries'] = $this->location_model->getCountry();
                            $data['states'] = $this->location_model->getState();
                            $data['cities'] = $this->location_model->getCity();
                            $data['barangays'] = $this->location_model->getBarangay();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            $dfg = 5;
                            $this->ion_auth->register($username, $password, $email, $dfg);
                            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                            $this->patient_model->insertPatient($data);
                            $patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
                            $id_info = array('ion_user_id' => $ion_user_id);
                            $this->patient_model->updatePatient($patient_user_id, $id_info);
                            $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                            //sms
                            $set['settings'] = $this->settings_model->getSettings();
                            $autosms = $this->sms_model->getAutoSmsByType('patient');
                            $message = $autosms->message;
                            $to = $phone;
                            $name1 = explode(' ', $name);
                            if (!isset($name1[1])) {
                                $name1[1] = null;
                            }
                            $data1 = array(
                                'firstname' => $name1[0],
                                'lastname' => $name1[1],
                                'name' => $name,
                                'email' => $email,
                                'password' => $password,
                                'doctor' => $doctor_name,
                                'company' => $set['settings']->system_vendor,
                                'hospital_name' => $set['settings']->title,
                                'hospital_contact' => $set['settings']->phone
                            );
                            //   if (!empty($sms)) {
                            // $this->sms->sendSmsDuringPatientRegistration($patient_user_id);
                            if ($autosms->status == 'Active') {
                                $messageprint = $this->parser->parse_string($message, $data1);
                                $data2[] = array($to => $messageprint);
                                $this->sms->sendSms($to, $message, $data2);
                            }
                            //end
                            //  }
                            //email

                            $autoemail = $this->email_model->getAutoEmailByType('patient');
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

                            //end



                            $this->session->set_flashdata('success', lang('record_added'));
                            redirect('patient');
                        }
                    }
                    
                }
                //    }
            } else { // Updating Patient
                
                if ($email !== $emailById) {
                    if ($this->ion_auth->email_check($email)) {
                        $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                        $data = array();
                        $data['patient'] = $this->patient_model->getPatientById($id);
                        $data['doctors'] = $this->doctor_model->getDoctor();
                        $data['groups'] = $this->donor_model->getBloodBank();
                        $data['countries'] = $this->location_model->getCountry();
                        $data['states'] = $this->location_model->getState();
                        $data['cities'] = $this->location_model->getCity();
                        $data['barangays'] = $this->location_model->getBarangay();
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('add_newv2', $data);
                        // $this->load->view('home/footer'); // just the footer file
                    } else {
                        if ($this->upload->do_upload('img_url')) {
                            

                            $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                            if (empty($password)) {
                                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            } else {
                                $password = $this->ion_auth_model->hash_password($password);
                            }
                            $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->patient_model->updatePatient($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            redirect('patient');
                        } else {
                            //additional validation for uploading file in update modal if email not exist
                            if ($_FILES['img_url']['size'] > $config['max_size']) {
                                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                                $this->session->set_flashdata('fileError', $fileError);
                                $this->session->set_flashdata('error', lang('validation_error'));
                                $data = array();
                                $data['setval'] = 'setval';
                                $data['patient'] = $this->patient_model->getPatientById($id);
                                $data['doctors'] = $this->doctor_model->getDoctor();
                                $data['groups'] = $this->donor_model->getBloodBank();
                                $data['countries'] = $this->location_model->getCountry();
                                $data['states'] = $this->location_model->getState();
                                $data['cities'] = $this->location_model->getCity();
                                $data['barangays'] = $this->location_model->getBarangay();
                                $this->load->view('home/dashboardv2'); // just the header file
                                $this->load->view('add_newv2', $data);
                                // $this->load->view('home/footer'); // just the footer file
                            } else {
                                $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                                if (empty($password)) {
                                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                                } else {
                                    $password = $this->ion_auth_model->hash_password($password);
                                }
                                $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                                $this->patient_model->updatePatient($id, $data);
                                $this->session->set_flashdata('success', lang('record_updated'));
                            }
                        }

                    }
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        
                        $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                        if (empty($password)) {
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        } else {
                            $password = $this->ion_auth_model->hash_password($password);
                        }
                        $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->patient_model->updatePatient($id, $data);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        redirect('patient');
                    } else {
                        //additional validation for uploading file in update modal if email exist
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            $this->session->set_flashdata('fileError', $fileError);
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            $data['setval'] = 'setval';
                            $data['patient'] = $this->patient_model->getPatientById($id);
                            $data['doctors'] = $this->doctor_model->getDoctor();
                            $data['groups'] = $this->donor_model->getBloodBank();
                            $data['countries'] = $this->location_model->getCountry();
                            $data['states'] = $this->location_model->getState();
                            $data['cities'] = $this->location_model->getCity();
                            $data['barangays'] = $this->location_model->getBarangay();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                            if (empty($password)) {
                                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            } else {
                                $password = $this->ion_auth_model->hash_password($password);
                            }
                            $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->patient_model->updatePatient($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            redirect('patient');
                        }
                    }
                }
            }
            // Loading View
            // if (!empty($redirect)) {
            //     redirect($redirect);
            // } else {
            //     redirect('patient');
            // }
        }
    }

    function editPatient() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) {
            redirect('home/permission');
        }
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editPatientByJason() {
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $patient_doctor = $data['patient']->doctor;
        // $data['doctor'] = $this->getDoctorName($patient_doctor);
        $data['doctors'] = $this->getDoctorListArray($patient_doctor);

        $country_id = $data['patient']->country_id;
        $state_id = $data['patient']->state_id;
        $city_id = $data['patient']->city_id;
        $barangay_id = $data['patient']->barangay_id;

        $data['country']= $this->location_model->getCountryById($country_id);
        $data['state']= $this->location_model->getStateById($state_id);
        $data['city']= $this->location_model->getCityById($city_id);
        $data['barangay']= $this->location_model->getBarangayById($barangay_id);
        echo json_encode($data);
    }

    function getPatientByJason() {
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);

        $country_id = $data['patient']->country_id;
        $state_id = $data['patient']->state_id;
        $city_id = $data['patient']->city_id;
        $barangay_id = $data['patient']->barangay_id;

        $data['country']= $this->location_model->getCountryById($country_id);
        $data['state']= $this->location_model->getStateById($state_id);
        $data['city']= $this->location_model->getCityById($city_id);
        $data['barangay']= $this->location_model->getBarangayById($barangay_id);

        $doctor = $data['patient']->doctor;
        $data['doctorNames'] = $this->getDoctorList($doctor);

        if (!empty($data['patient']->birthdate)) {
            $birthDate = strtotime($data['patient']->birthdate);
            $birthDate = date('m/d/Y', $birthDate);
            $birthDate = explode("/", $birthDate);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
            $data['age'] = $age . ' ' . lang('years_old');
            $data['birthdate'] = $data['patient']->birthdate;
        } else if (!empty($data['patient']->age)) {
            $data['age'] = $data['patient']->age . ' ' . lang('years_old');
            $data['birthdate'] = lang('not_provided');
        } else if (empty($data['patient']->age) && empty($data['patient']->birthdate)) {
            $data['birthdate'] = lang('not_provided');
            $data['age'] = lang('not_provided');
        } else {
            $data['birthdate'] = lang('not_provided');
        }



        echo json_encode($data);
    }

    function patientDetails() {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function report() {
        $data = array();
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['payment'] = $this->finance_model->getPaymentById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('diagnostic_report_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function addDiagnosticReport() {
        $id = $this->input->post('id');
        $invoice = $this->input->post('invoice');
        $patient = $this->input->post('patient');
        $report = $this->input->post('report');

        $date = time();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


        // Validating Name Field
        $this->form_validation->set_rules('invoice', 'Invoice', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Password Field

        $this->form_validation->set_rules('report', 'Report', 'trim|min_length[1]|max_length[10000]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('feedback', lang('validation_error'));
            redirect('patient/report?id=' . $invoice);
        } else {

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'invoice' => $invoice,
                'date' => $date,
                'report' => $report
            );

            if (empty($id)) {     // Adding New department
                $this->patient_model->insertDiagnosticReport($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else { // Updating department
                $this->patient_model->updateDiagnosticReport($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect('patient/report?id=' . $invoice);
        }
    }

    function patientPayments() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) {
            redirect('home/permission');
        }
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['settings'] = $this->settings_model->getSettings();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['countries'] = $this->location_model->getCountry();
        $data['states'] = $this->location_model->getState();
        $data['cities'] = $this->location_model->getCity();
        $data['barangays'] = $this->location_model->getBarangay();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('patient_paymentsv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function caseList() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Patient', 'Nurse', 'Receptionist'))) {
            redirect('home/permission');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['patients'] = $this->patient_model->getPatient();
        $data['medical_histories'] = $this->patient_model->getMedicalHistory();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('case_listv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function documents() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Patient', 'DoctorAdmin'))) {
            redirect('home/permission');
        }
        $data['patients'] = $this->patient_model->getPatient();
        $data['files'] = $this->patient_model->getPatientMaterial();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('documentsv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function myCaseList() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['medical_histories'] = $this->patient_model->getMedicalHistoryByPatientId($patient_id);
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('my_case_listv2', $data);
            // $this->load->view('home/footer'); // just the footer file
        }
    }

    function myDocuments() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['files'] = $this->patient_model->getPatientMaterialByPatientId($patient_id);
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('my_documentsv2', $data);
            // $this->load->view('home/footer'); // just the footer file
        }
    }

    function myPrescription() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['doctors'] = $this->doctor_model->getDoctor();
            $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientId($patient_id);
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/dashboardv2', $data); // just the header file
            $this->load->view('my_prescriptionv2', $data);
            // $this->load->view('home/footer'); // just the header file
        }
    }

    public function myPayment() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['settings'] = $this->settings_model->getSettings();
            $data['payments'] = $this->finance_model->getPaymentByPatientId($patient_id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('my_payment', $data);
            $this->load->view('home/footer'); // just the header file
        }
    }

    function myPaymentHistory() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if (!$this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        }
        $data['settings'] = $this->settings_model->getSettings();
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to;
        }

        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;

        if (!empty($date_from)) {
            $data['payments'] = $this->finance_model->getPaymentByPatientIdByDate($patient, $date_from, $date_to);
            $data['deposits'] = $this->finance_model->getDepositByPatientIdByDate($patient, $date_from, $date_to);
            $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);
        } else {
            $data['payments'] = $this->finance_model->getPaymentByPatientId($patient);
            $data['pharmacy_payments'] = $this->pharmacy_model->getPaymentByPatientId($patient);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByPatientId($patient);
            $data['deposits'] = $this->finance_model->getDepositByPatientId($patient);
            $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);
        }



        $data['patient'] = $this->patient_model->getPatientByid($patient);
        $country = $data['patient']->country_id;
        $state = $data['patient']->state_id;
        $city = $data['patient']->city_id;
        $barangay = $data['patient']->barangay_id;
        $data['patientCountry'] = $this->location_model->getCountryById($country);
        $data['patientState'] = $this->location_model->getStateById($state);
        $data['patientCity'] = $this->location_model->getCityById($city);
        $data['patientBarangay'] = $this->location_model->getBarangayById($barangay);
        $data['settings'] = $this->settings_model->getSettings();



        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('my_payments_historyv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function deposit() {
        $id = $this->input->post('id');


        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_details = $this->patient_model->getPatientByIonUserId($patient_ion_id);
            $patient = $patient_details->id;
        } else {
            $this->session->set_flashdata('error', lang('undefined_patient_id'));
            redirect('patient/myPaymentsHistory');
        }



        $payment_id = $this->input->post('payment_id');
        $date = time();

        $deposited_amount = $this->input->post('deposited_amount');

        $deposit_type = $this->input->post('deposit_type');

        if ($deposit_type != 'Card') {
            $this->session->set_flashdata('error', lang('undefined_payment_type'));
            redirect('patient/myPaymentsHistory');
        }

        $user = $this->ion_auth->get_user_id();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
// Validating Patient Name Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|min_length[1]|max_length[100]|xss_clean');
// Validating Deposited Amount Field
        $this->form_validation->set_rules('deposited_amount', 'Deposited Amount', 'trim|min_length[1]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            redirect('patient/myPaymentsHistory');
        } else {
            $data = array();
            $data = array('patient' => $patient,
                'date' => $date,
                'payment_id' => $payment_id,
                'deposited_amount' => $deposited_amount,
                'deposit_type' => $deposit_type,
                'user' => $user
            );
            if (empty($id)) {
                if ($deposit_type == 'Card') {
                    $payment_details = $this->finance_model->getPaymentById($payment_id);
                    $gateway = $this->settings_model->getSettings()->payment_gateway;
                    if ($gateway == 'PayPal') {
                        $card_type = $this->input->post('card_type');
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv_number');

                        $all_details = array(
                            'patient' => $payment_details->patient,
                            'date' => $payment_details->date,
                            'amount' => $payment_details->amount,
                            'doctor' => $payment_details->doctor_name,
                            'discount' => $payment_details->discount,
                            'flat_discount' => $payment_details->flat_discount,
                            'gross_total' => $payment_details->gross_total,
                            'status' => 'unpaid',
                            'patient_name' => $payment_details->patient_name,
                            'patient_phone' => $payment_details->patient_phone,
                            'patient_address' => $payment_details->patient_address,
                            'deposited_amount' => $deposited_amount,
                            'payment_id' => $payment_details->id,
                            'card_type' => $card_type,
                            'card_number' => $card_number,
                            'expire_date' => $expire_date,
                            'cvv' => $cvv,
                            'from' => 'patient_payment_details',
                            'user' => $user,
                            'cardholdername' => $this->input->post('cardholder')
                        );
                        $this->paypal->paymentPaypal($all_details);
                    } elseif ($gateway == 'Paystack') {
                        $ref = date('Y') . '-' . rand() . date('d') . '-' . date('m');
                        $amount_in_kobo = $deposited_amount;
                        $this->load->module('paystack');
                        $this->paystack->paystack_standard($amount_in_kobo, $ref, $patient, $payment_id, $user, '2');
                    }elseif ($gateway == 'Stripe') {
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv_number');
                        $token = $this->input->post('token');

                        $stripe = $this->db->get_where('paymentGateway', array('name =' => 'Stripe'))->row();
                        \Stripe\Stripe::setApiKey($stripe->secret);
                        $charge = \Stripe\Charge::create(array(
                                    "amount" => $deposited_amount * 100,
                                    "currency" => "usd",
                                    "source" => $token
                        ));
                        $chargeJson = $charge->jsonSerialize();
                         if ($chargeJson['status'] == 'succeeded') {
                            $data1 = array(
                                'date' => $date,
                                'patient' => $patient,
                                'payment_id' => $payment_id,
                                'deposited_amount' => $deposited_amount,
                                'deposit_type' => $deposit_type,                                
                                'gateway' => 'Stripe',
                                'user' => $user,
                                'hospital_id' => $this->session->userdata('hospital_id')
                            );
                            $this->finance_model->insertDeposit($data1);
                            $inserted_id = $this->db->insert_id();
                            $this->session->set_flashdata('feedback', lang('payment_successful'));

                            //Credit card payment was successful so send payment receipt by email and sms notification
                            //sms
                            $set['settings'] = $this->settings_model->getSettings();
                            $autosms = $this->sms_model->getAutoSmsByType('payment');
                            $message = $autosms->message;
                            $to = $patient_details->phone;
                            $name1 = explode(' ', $patient_details->name);
                            if (!isset($name1[1])) {
                                $name1[1] = null;
                            }
                            $data1 = array(
                                'firstname' => $name1[0],
                                'lastname' => $name1[1],
                                'name' => $patient_details->name,
                                'amount' => number_format($deposited_amount,2),
                                'date' => date('F j, Y',$date),
                                'hospital_name' => $set['settings']->title,
                                'hospital_contact' => $set['settings']->phone,
                                'currency_symbol' => $set['settings']->currency,
                                'base_url' => base_url(),
                                'receipt_id' => $inserted_id,
                                'invoice_id' => $payment_id
                            );

                            if ($autosms->status == 'Active') {
                                $messageprint = $this->parser->parse_string($message, $data1);
                                $data2[] = array($to => $messageprint);
                                $this->sms->sendSms($to, $message, $data2);
                            }
                            //end
                            //email 

                            $autoemail = $this->email_model->getAutoEmailByType('payment');
                            if ($autoemail->status == 'Active') {
                                $emailSettings = $this->email_model->getEmailSettings();
                                $message1 = $autoemail->message;
                                $messageprint1 = $this->parser->parse_string($message1, $data1);
                                $this->email->from($emailSettings->admin_email, $emailSettings->admin_email_display_name);
                                $this->email->to($patient_details->email);
                                $this->email->subject(lang('payment_successful_subject'));
                                $this->email->message($messageprint1);
                                $this->email->send();
                            }

                            //end
                            //End email and sms
                        } else {
                            $this->session->set_flashdata('feedback', lang('transaction_failed'));
                        }
                      //  redirect("finance/invoice?id=" . "$inserted_id");
                        redirect('patient/myPaymentHistory');
                    } elseif ($gateway == 'Pay U Money') {
                        redirect("payu/check?deposited_amount=" . "$deposited_amount" . '&payment_id=' . $payment_id);
                    } else {
                        $this->session->set_flashdata('feedback', lang('payment_failed_no_gateway_selected'));
                        redirect('patient/myPaymentHistory');
                    }
                } else {
                    $this->finance_model->insertDeposit($data);
                    $this->session->set_flashdata('feedback', lang('added'));
                }
            } else {
                $this->finance_model->updateDeposit($id, $data);

                $amount_received_id = $this->finance_model->getDepositById($id)->amount_received_id;
                if (!empty($amount_received_id)) {
                    $amount_received_payment_id = explode('.', $amount_received_id);
                    $payment_id = $amount_received_payment_id[0];
                    $data_amount_received = array('amount_received' => $deposited_amount);
                    $this->finance_model->updatePayment($amount_received_payment_id[0], $data_amount_received);
                }

                $this->session->set_flashdata('feedback', lang('updated'));
            }
            redirect('patient/myPaymentHistory');
        }
    }

    function myInvoice() {
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['payment'] = $this->finance_model->getPaymentById($id);
        $data['patient'] = $this->patient_model->getPatientById($data['payment']->patient);
        if ($this->ion_auth->in_group(array('Patient'))) {
            $current_patient = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($current_patient)->id;
            //if patient logged in isn't the owner of the invoice being viewed, then prohibit him from viewing invoice
            if ($patient_id != $data['payment']->patient) {
                redirect('home/permission');
            }
        }

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('myInvoicev2', $data);
        //$this->load->view('home/footer'); // just the footer fi
    }

    public function addVitals() {
        if (!$this->ion_auth->in_group(array('Receptionist', 'Nurse', 'Doctor', 'DoctorAdmin', 'Patient', 'Laboratorist'))) {
            redirect('home/permission');
        }

        $data = array();

        $data['settings'] = $this->settings_model->getSettings();
        $id = $this->input->post('patient');
        $patient_id = (int)$id;
        $date_measured = $this->input->post('date');
        $time_measured = $this->input->post('time');
        $systolic = $this->input->post('systolic');
        if(empty($systolic)) {
            $systolic = null;
        }
        $diastolic = $this->input->post('diastolic');
        if(empty($diastolic)) {
            $diastolic = null;
        }
        $temperature = $this->input->post('temperature');
        if(empty($temperature)) {
            $temperature = null;
        }
        $temperatureUnit = $this->input->post('temperature_unit');
        if(empty($temperatureUnit)) {
            $temperatureUnit = null;
        }
        $heartrate = $this->input->post('heartrate');
        if(empty($heartrate)) {
            $heartrate = null;
        }
        $spo2 = $this->input->post('spo2');
        if(empty($spo2)) {
            $spo2 = null;
        }
        $respiration_rate = $this->input->post('respiration_rate');
        if(empty($respiration_rate)) {
            $respiration_rate = null;
        }
        $current_user = (int)$this->ion_auth->get_user_id();
        $date = date("Y-m-d H:i:s", now('UTC'));
        $weightUnit = $this->input->post('weight_unit');
        if(empty($weightUnit)) {
            $weightUnit = null;
        }
        $heightUnit = $this->input->post('height_unit');
        if(empty($heightUnit)) {
            $heightUnit = null;
        }
        $temperature_site = $this->input->post('temp_site');
        if(empty($temperature_site)) {
            $temperature_site = null;
        }
        $weight = $this->input->post('weight');
        if(empty($weight)) {
            $weight = null;
        }
        $height = $this->input->post('height');
        if(empty($height)) {
            $height = null;
        }
        $note = $this->input->post('note');
        if(empty($note)) {
            $note = null;
        }
        $date_time_combined = strtotime($date_measured . ' ' . $time_measured);
        $measured_at = date($data['settings']->date_format . ' ' . $data['settings']->time_format, $date_time_combined);
        $measured_at_datetime = gmdate("Y-m-d H:i:s", strtotime('+1 hour', $date_time_combined));

        if ($this->ion_auth->in_group(array('Doctor', 'DoctorAdmin'))) {
            $doctor_id = (int)$this->doctor_model->getDoctorByIonUserId($current_user)->id;
        }


        //Reading Weight Unit Start

            if ($weightUnit == 'kg') {
                $weightKg = $weight;
                $weightLbs = convertkgTolbs($weightKg);
            } else if ($weightUnit == 'lbs') {
                $weightLbs = $weight;
                $weightKg = convertlbsTokg($weightLbs);
            }

        //Reading Weight Unit End

        //Reading Height Unit Start

            if ($heightUnit == 'cm') {
                $heightCm = $height;
                $heightIn = convertcmToin($heightCm);
            } else if ($heightUnit == 'inches') {
                $heightIn = $height;
                $heightCm = convertinTocm($heightIn);
            }

        //Reading Height Unit End

        //Computing BMI start
            $bmi = computeBmi($heightCm, $weightKg);
        //Computing BMI end

        //Comvert C to F Start

            if ($temperatureUnit == 'celsius') {
                $celsiusTemp = $temperature;
                $fahrenheitTemp = convertcelsiusTofahrenheit($celsiusTemp);
            } else if ($temperatureUnit == 'fahrenheit') {
                $fahrenheitTemp = $temperature;
                $celsiusTemp = convertfahrenheitTocelsius($fahrenheitTemp);
            }

        //Comvert C to F End

        //form validation start
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // Validating Date Measured Field
            $this->form_validation->set_rules('date_measured', 'Date Measured', 'trim|min_length[2]|max_length[100]|xss_clean');
            // Validating Time Measured Field   
            $this->form_validation->set_rules('time_measured', 'Time Measured', 'trim|min_length[2]|max_length[100]|xss_clean');
            // Validating Weight Field   
            $this->form_validation->set_rules('weight', 'Weight', 'trim|numeric|max_length[500]|xss_clean');
            // Validating height Field           
            $this->form_validation->set_rules('height', 'Height', 'trim|numeric|max_length[50]|xss_clean');
            // Validating systolic Field
            $this->form_validation->set_rules('systolic', 'Systolic', 'trim|max_length[100]|xss_clean');
            // Validating diastolic Field   
            $this->form_validation->set_rules('diastolic', 'Diastolic', 'trim|max_length[500]|xss_clean');
            // Validating temperature Field           
            $this->form_validation->set_rules('temperature', 'Temperature', 'trim|max_length[15]|xss_clean');
            // Validating heartrate Field           
            $this->form_validation->set_rules('heartrate', 'Heartrate', 'trim|max_length[15]|xss_clean');
            // Validating spo2 Field           
            $this->form_validation->set_rules('spo2', 'Spo2', 'trim|max_length[15]|xss_clean');
            // Validating Respiration Field           
            $this->form_validation->set_rules('respiration_rate', 'Respiration', 'trim|max_length[15]|xss_clean');
            // Validating Note Field           
            $this->form_validation->set_rules('note', 'Note', 'trim|max_length[1000]|xss_clean');
        //form validation end


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                redirect('patient/medicalHistory?id=' . $id);
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                redirect('patient/medicalHistory?id=' . $id);
            }
        } else {
            $data = array();

            $data = array(
                'recorded_user_id' => $current_user,
                'patient_id' => $patient_id,
                'doctor_id' => $doctor_id,
                'last_modified' => $date,
                'measured_at' => $measured_at_datetime,
                'temperature_celsius' => $celsiusTemp,
                'temperature_fahrenheit' => $fahrenheitTemp,
                'systolic' => $systolic,
                'diastolic' => $diastolic,
                'heart_rate' => $heartrate,
                'height_cm' => $heightCm,
                'weight_kg' => $weightKg,
                'temperature_site' => $temperature_site,
                'height_in' => $heightIn,
                'weight_lbs' => $weightLbs,
                'respiration_rate' => $respiration_rate,
                'created_at' => $date,
                'bmi' => $bmi,
                'spo2' => $spo2,
                'note' => $note,
            );

            $this->patient_model->insertPatientVital($data);
            $this->session->set_flashdata('success', lang('record_added'));
            
            redirect('patient/medicalHistory?id=' . $id);
        }

    }

    function editVitalByJason() {
        $id = $this->input->get('id');
        $data['vital'] = $this->patient_model->getVitalById($id);
        echo json_encode($data);
    }

    function addMedicalHistory() {
        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $current_doctor = $this->ion_auth->get_user_id();
            $current_user = $this->doctor_model->getDoctorByIonUserId($current_doctor)->id;
        }
        
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');

        $date = $this->input->post('date');

        $title = $this->input->post('title');

        if (!empty($date)) {
            $date = strtotime($date);
        } else {
            $date = time();
        }

        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="margin-top:15px;">', '</div>');

        $redirect = $this->input->post('redirect');
        if (empty($redirect)) {
            $redirect = 'patient/medicalHistory?id=' . $patient_id;
        }

        // Validating patient Field
        $this->form_validation->set_rules('patient_id', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Name Field
        $this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Title Field
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Password Field
        $this->form_validation->set_rules('description', 'Case', 'trim|required|max_length[10000]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('case_listv2');
                // $this->load->view('home/footer'); // just the header file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('case_listv2');
                // $this->load->view('home/footer'); // just the header file
            }
        } else {

            if (!empty($patient_id)) {
                $patient_details = $this->patient_model->getPatientById($patient_id);
                $patient_name = $patient_details->name;
                $patient_phone = $patient_details->phone;
                $patient_address = $patient_details->address;
            } else {
                $patient_name = 0;
                $patient_phone = 0;
                $patient_address = 0;
            }

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'patient_id' => $patient_id,
                'date' => $date,
                'title' => $title,
                'description' => $description,
                'patient_name' => $patient_name,
                'patient_phone' => $patient_phone,
                'patient_address' => $patient_address,
                'doctor_id' => $current_user,
            );

            if (empty($id)) {     // Adding New department
                // $data['setval'] = 'setval';
                $this->patient_model->insertMedicalHistory($data);
                $this->session->set_flashdata('success', lang('record_added'));
                // $lastId = $this->db->insert_id();
                // $this->load->view('home/dashboardv2'); // just the header file
                // $this->load->view('jitsiv2', $data);
            } else { // Updating department
                $this->patient_model->updateMedicalHistory($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            // Loading View
            // echo json_encode(array('last_id' => $lastId));
            redirect($redirect);
            // redirect("form/addMedicalHistory?id=" . "$lastId");
        }
    }

    public function diagnosticReport() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ($this->ion_auth->in_group(array('Patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $patient_user_id = $this->patient_model->getPatientByIonUserId($current_user)->id;
            $data['payments'] = $this->finance_model->getPaymentByPatientId($patient_user_id);
        } else {
            $data['payments'] = $this->finance_model->getPayment();
        }

        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('diagnostic_report', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function medicalHistory() {
        $data = array();
        $id = $this->input->get('id');

        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        }

        if ($this->ion_auth->in_group(array('Laboratorist', 'Receptionist', 'Accountant', 'CompanyUser'))) {
            redirect('home/permission');
        }

        $patient_hospital_id = $this->patient_model->getPatientById($id)->hospital_id;
        if ($patient_hospital_id != $this->session->userdata('hospital_id')) {
            redirect('home/permission');
        }

        $data['vitals'] = $this->patient_model->getPatientVitalById($id);
        $data['settings'] = $this->settings_model->getSettings();
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['appointments'] = $this->appointment_model->getAppointmentByPatient($data['patient']->id);
        $data['appointments_location'] = $this->appointment_model->getAppointmentByPatientForLocation($data['patient']->id);
        // $data['service_category_group'] = $this->appointment_model->getServiceCategoryById($data['appointments_location']->service_category_group_id);
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientId($id);
        $data['labs'] = $this->lab_model->getLabByPatientId($id);
        $data['beds'] = $this->bed_model->getBedAllotmentsByPatientId($id);
        $data['medical_histories'] = $this->patient_model->getMedicalHistoryByPatientId($id);
        $data['patient_materials'] = $this->patient_model->getPatientMaterialByPatientId($id);
        $data['countries'] = $this->location_model->getCountry();
        $data['states'] = $this->location_model->getState();
        $data['cities'] = $this->location_model->getCity();
        $data['barangays'] = $this->location_model->getBarangay();



        foreach ($data['appointments'] as $appointment) {
            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            

            $timeline[$appointment->date + 1] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long, $appointment->date) . '</span></li>
                                                <li>
                                                    <i class="fa fa-download bg-success"></i>
                                                    <div class="timelineleft-item">
                                                        <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . $doctor_name . '</span>
                                                        <h3 class="timelineleft-header"><span>' . lang('appointment') . '</span></h3>
                                                        <div class="timelineleft-body">
                                                            <p>' . $appointment->s_time . ' - ' . $appointment->e_time . '</p>
                                                        </div>
                                                        <div class="timelineleft-footer">
                                                        </div>
                                                    </div>
                                                </li>';
        }

        foreach ($data['prescriptions'] as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            

            $timeline[strtotime($prescription->date) + 2] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long, $prescription->date) . '</span></li>
                                                    <li><i class="fa fa-download bg-cyan"></i>
                                                    <div class="timelineleft-item">
                                                        <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . $doctor_name . '</span>
                                                        <h3 class="timelineleft-header"><span>' . lang('prescription') . '</span></h3>
                                                        <div class="timelineleft-body">
                                                            <h4><i class=" fa fa-calendar"></i>' . date('d-m-Y', strtotime($prescription->date)) . '</h4>
                                                        </div>
                                                        <div class="timelineleft-footer">
                                                        </div>
                                                    </div></li>';
        }

        foreach ($data['labs'] as $lab) {

            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = '';
            }

            

            $timeline[$lab->date + 3] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long, $lab->date) . '</span></li>
                                        <li>
                                            <i class="fa fa-envelope bg-primary"></i>
                                            <div class="timelineleft-item">
                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . $lab_doctor . '</span>
                                                <h3 class="timelineleft-header"><span>Lab</span></h3>
                                                <div class="timelineleft-body">
                                                    <h4><i class=" fa fa-calendar"></i>' . date('d-m-Y', $lab->date) . '</h4>
                                                </div>
                                                <div class="timelineleft-footer">
                                                    <a class="btn btn-xs btn-info" title="Lab" style="color: #fff;" href="lab/invoice?id=' . $lab->id . '" target="_blank"><i class="fa fa-file-text"></i>' . lang('view') . '</a>
                                                </div>
                                            </div>
                                        </li>';
        }

        foreach ($data['medical_histories'] as $medical_history) {
            

            $timeline[$medical_history->date + 4] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long, $medical_history->date) . '</span></li>
                                                    <li>
                                                        <i class="fa fa-download bg-info"></i>
                                                        <div class="timelineleft-item">
                                                            <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . date('d-m-Y', $medical_history->date) . '</span>
                                                            <h3 class="timelineleft-header"><span>' . lang('case_history') . '</span></h3>
                                                            <div class="timelineleft-body">
                                                                <p>' . $medical_history->description . '</p>
                                                            </div>
                                                            <div class="timelineleft-footer">
                                                            </div>
                                                        </div>
                                                    </li>';
        }

        foreach ($data['patient_materials'] as $patient_material) {
            

            $timeline[$patient_material->date + 5] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long, $patient_material->date) . ' </span></li>
                                                        <li>
                                                            <i class="fa fa-download bg-secondary"></i>
                                                            <div class="timelineleft-item">
                                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . date('d-m-Y', $patient_material->date) . ' </span>
                                                                <h3 class="timelineleft-header"><span>' . lang('documents') . '</span></h3>
                                                                <div class="timelineleft-body">
                                                                    <h4>' . $patient_material->title . '</h4>
                                                                </div>
                                                                <div class="timelineleft-footer">
                                                                    <a class="btn btn-xs btn-info" title="' . lang('view') . '" style="color: #fff;" href="' . $patient_material->url . '" target="_blank"><i class="fa fa-file-text"></i>' . ' ' . lang('view') . '</a>
                                                                    <a class="btn btn-xs btn-info" title="' . lang('download') . '" style="color: #fff;" href="' . $patient_material->url . '" download=""><i class="fa fa-file-text"></i>' . ' ' . lang('download') . '</a>
                                                                </div>
                                                            </div>
                                                        </li>';

        }

        if (!empty($timeline)) {
            $data['timeline'] = $timeline;
        }
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('medical_historyv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editMedicalHistoryByJason() {
        $id = $this->input->get('id');
        $data['medical_history'] = $this->patient_model->getMedicalHistoryById($id);
        $data['patient'] = $this->patient_model->getPatientById($data['medical_history']->patient_id);
        echo json_encode($data);
    }

    function getCaseDetailsByJason() {
        $id = $this->input->get('id');
        $data['case'] = $this->patient_model->getMedicalHistoryById($id);
        $patient = $data['case']->patient_id;
        $data['patient'] = $this->patient_model->getPatientById($patient);
        echo json_encode($data);
    }

    function getPatientByAppointmentByDctorId($doctor_id) {
        $data = array();
        $appointments = $this->appointment_model->getAppointmentByDoctor($doctor_id);
        foreach ($appointments as $appointment) {
            $patient_exists = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patient_exists)) {
                $patients[] = $appointment->patient;
            }
        }

        if (!empty($patients)) {
            $patients = array_unique($patients);
        } else {
            $patients = '';
        }

        return $patients;
    }

    function patientMaterial() {
        $data = array();
        $id = $this->input->get('patient');
        $data['settings'] = $this->settings_model->getSettings();
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['patient_materials'] = $this->patient_model->getPatientMaterialByPatientId($id);
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('patient_material', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function addPatientMaterial() {
        $title = $this->input->post('title');
        $patient_id = $this->input->post('patient');
        $img_url = $this->input->post('img_url');
        $description = $this->input->post('description');
        $category = $this->input->post('category');
        $redirect = $this->input->post('redirect');
        $date = date("Y-m-d H:i:s", now('UTC'));

        if ($this->ion_auth->in_group(array('Patient'))) {
            if (empty($patient_id)) {
                $current_patient = $this->ion_auth->get_user_id();
                $patient_id = $this->patient_model->getPatientByIonUserId($current_patient)->id;
            }
        } else {
            $current_user = $this->ion_auth->get_user_id();
        }


        if (empty($redirect)) {
            $redirect = "patient/medicalHistory?id=" . $patient_id;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Patient Field
        if (!$this->ion_auth->in_group(array('Patient'))) {
            $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }

        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if ($this->ion_auth->in_group(array('Patient'))) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $patient_ion_id = $this->ion_auth->get_user_id();
                $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
                $data['files'] = $this->patient_model->getPatientMaterialByPatientId($patient_id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('my_documents', $data);
                $this->load->view('home/footer'); // just the footer file
            } elseif ($this->ion_auth->in_group(array('admin' ,'Doctor', 'Nurse', 'Laboratorist', 'Receptionist'))) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('documents');
                $this->load->view('home/footer'); // just the header file
            } else {
                redirect('home/permission');
            }
            
        } else {

            if (!empty($patient_id)) {
                $patient_details = $this->patient_model->getPatientById($patient_id);
                $patient_name = $patient_details->name;
                $patient_phone = $patient_details->phone;
                $patient_address = $patient_details->address;
            } else {
                $patient_name = 0;
                $patient_phone = 0;
                $patient_address = 0;
            }


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
                'max_size' => "10000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "10000",
                'max_width' => "10000"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);


            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'created_at' => $date,
                    'title' => $title,
                    'category_id' => $category,
                    'url' => $img_url,
                    'patient' => $patient_id,
                    'patient_name' => $patient_name,
                    'patient_address' => $patient_address,
                    'patient_phone' => $patient_phone,
                    'created_user_id' => $current_user,
                    'description' => $description,
                );

                $this->patient_model->insertPatientMaterial($data);
                $this->session->set_flashdata('success', lang('record_added'));

                redirect($redirect);
            } else {
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                if ($this->ion_auth->in_group(array('Patient'))) {
                    $this->session->set_flashdata('error', lang('validation_error'));
                    $patient_ion_id = $this->ion_auth->get_user_id();
                    $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
                    $data['files'] = $this->patient_model->getPatientMaterialByPatientId($patient_id);
                    $this->load->view('home/dashboard'); // just the header file
                    $this->load->view('my_documents', $data);
                    $this->load->view('home/footer'); // just the footer file
                } elseif ($this->ion_auth->in_group(array('admin' ,'Doctor', 'Nurse', 'Laboratorist', 'Receptionist'))) {
                    $this->session->set_flashdata('error', lang('validation_error'));
                    $this->load->view('home/dashboard'); // just the header file
                    $this->load->view('documents');
                    $this->load->view('home/footer'); // just the header file
                } else {
                    redirect('home/permission');
                }
                
            }

            


            
        }
    }

    function deleteCaseHistory() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $id = $this->input->get('id');
        $redirect = $this->input->get('redirect');
        $case_history = $this->patient_model->getMedicalHistoryById($id);
        $this->patient_model->deleteMedicalHistory($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        if ($redirect == 'case') {
            redirect('patient/caseList');
        } else {
            redirect("patient/MedicalHistory?id=" . $case_history->patient_id);
        }
    }

    function deletePatientMaterial() {
        $id = $this->input->get('id');
        $redirect = $this->input->get('redirect');
        $patient_material = $this->patient_model->getPatientMaterialById($id);
        $path = $patient_material->url;
        if (!empty($path)) {
            unlink($path);
        }
        $this->patient_model->deletePatientMaterial($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        if ($redirect == 'documents') {
            redirect('patient/documents');
        } else {
            redirect("patient/MedicalHistory?id=" . $patient_material->patient);
        }
    }

    function delete() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $data = array();
        $id = $this->input->get('id');

        $patient_hospital_id = $this->patient_model->getPatientById($id)->hospital_id;
        if ($patient_hospital_id != $this->session->userdata('hospital_id')) {
            redirect('home/permission');
        }

        $user_data = $this->db->get_where('patient', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->patient_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('patient');
    }

    function getPatient() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor = $this->doctor_model->getDoctorByIonUserId($this->session->userdata('user_id'))->id;
        }

        if ($limit == -1) {
            if (!empty($search)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientListBySearchByDoctorId($search, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientBySearch($search);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientListByDoctorId($doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatient();
                }
            }
        } else {
            if (!empty($search)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientByLimitBySearchByDoctorId($limit, $start, $search, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByLimitBySearch($limit, $start, $search);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientByLimitByDoctorId($limit, $start, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByLimit($limit, $start);
                }
                
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['patients'] as $patient) {

            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Doctor'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = ' <a class="btn btn-info editbutton" title="' . lang('edit') . '" data-toggle = "modal" data-id="' . $patient->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }

            $options2 = '<a class="btn btn-info" title="' . lang('info') . '" style="color: #fff;" href="patient/patientDetails?id=' . $patient->id . '"><i class="fa fa-info"></i> ' . lang('info') . '</a>';

            if (!$this->ion_auth->in_group(array('Laboratorist', 'Receptionist', 'Accountant', 'CompanyUser'))) {
                $options3 = '<a class="btn btn-secondary" title="' . lang('history') . '" style="color: #fff;" href="patient/medicalHistory?id=' . $patient->id . '"><i class="fa fa-stethoscope"></i> ' . lang('history') . '</a>';
            }

            $options4 = '<a class="btn btn-success" title="' . lang('payment') . '" style="color: #fff;" href="finance/patientPaymentHistory?patient=' . $patient->id . '"><i class="fa fa-money-bill-alt"></i> ' . lang('payment') . '</a>';

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options5 = '<a class="btn btn-danger" title="' . lang('delete') . '" href="patient/delete?id=' . $patient->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>';
            }

            $options6 = ' <a type="button" class="btn btn-info inffo" title="' . lang('info') . '" data-toggle = "modal" data-id="' . $patient->id . '"><i class="fa fa-info"> </i> ' . lang('info') . '</a>';


            if ($this->ion_auth->in_group('Doctor')) {
                $options7 = '<a class="btn btn-cyan" title="' . lang('instant_meeting') . '" style="color: #fff;" href="meeting/instantLive?id=' . $patient->id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
            } else {
                $options7 = '';
            }

            $doctorNames = $this->getDoctorList($patient->doctor);


            if ($this->ion_auth->in_group(array('admin'))) {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $doctorNames,
                    $this->settings_model->getSettings()->currency . $this->patient_model->getDueBalanceByPatientId($patient->id),
                    $options1 . ' ' . $options6 . ' ' . $options4 . ' ' . $options5,
                        //  $options2
                );
            }

            if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $doctorNames,
                    $this->settings_model->getSettings()->currency . $this->patient_model->getDueBalanceByPatientId($patient->id),
                    $options1 . ' ' . $options6 . ' ' . $options4,
                        //  $options2
                );
            }

            if ($this->ion_auth->in_group(array('Laboratorist', 'Nurse', 'Doctor'))) {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $doctorNames,
                    $options1 . ' ' . $options6 . ' ' . $options3,
                        //  $options2
                );
            }
        }

        if (!empty($data['patients'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->patient_model->getPatientCount(),
                "recordsFiltered" => $this->patient_model->getPatientBySearchCount($search),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getPatientPayments() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['patients'] = $this->patient_model->getPatientBysearch($search);
            } else {
                $data['patients'] = $this->patient_model->getPatient();
            }
        } else {
            if (!empty($search)) {
                $data['patients'] = $this->patient_model->getPatientByLimitBySearch($limit, $start, $search);
            } else {
                $data['patients'] = $this->patient_model->getPatientByLimit($limit, $start);
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['patients'] as $patient) {

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = ' <a type="button" class="btn btn-info editbutton" title="' . lang('edit') . '" data-toggle = "modal" data-id="' . $patient->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }

            $options2 = '<a class="btn btn-info" title="' . lang('info') . '" style="color: #fff;" href="patient/patientDetails?id=' . $patient->id . '"><i class="fa fa-info"></i> ' . lang('info') . '</a>';

            $options3 = '<a class="btn btn-secondary" title="' . lang('history') . '" style="color: #fff;" href="patient/medicalHistory?id=' . $patient->id . '"><i class="fa fa-stethoscope"></i> ' . lang('history') . '</a>';

            $options4 = '<a class="btn btn-xs btn-success" title="' . lang('payment') . ' ' . lang('history') . '" style="color: #fff;" href="finance/patientPaymentHistory?patient=' . $patient->id . '"><i class="fa fa-money-bill-alt"></i> ' . lang('payment') . ' ' . lang('history') . '</a>';

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options5 = '<a class="btn btn-danger" title="' . lang('delete') . '" href="patient/delete?id=' . $patient->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>';
            }

            $due = $this->settings_model->getSettings()->currency . $this->patient_model->getDueBalanceByPatientId($patient->id);

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $due,
                    //  $options1 . ' ' . $options2 . ' ' . $options3 . ' ' . $options4 . ' ' . $options5,
                    $options4
                );
            } else {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    //  $options1 . ' ' . $options2 . ' ' . $options3 . ' ' . $options4 . ' ' . $options5,
                    $options4
                );
            }
        }

        if (!empty($data['patients'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('patient')->num_rows(),
                "recordsFiltered" => $this->db->get('patient')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getCaseList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['cases'] = $this->patient_model->getMedicalHistoryBySearch($search);
            } else {
                $data['cases'] = $this->patient_model->getMedicalHistory();
            }
        } else {
            if (!empty($search)) {
                $data['cases'] = $this->patient_model->getMedicalHistoryByLimitBySearch($limit, $start, $search);
            } else {
                $data['cases'] = $this->patient_model->getMedicalHistoryByLimit($limit, $start);
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['cases'] as $case) {

            if ($this->ion_auth->in_group(array('Doctor'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = ' <a type="button" class="btn btn-info btn-xs btn_width editbutton" title="' . lang('edit') . '" data-toggle = "modal" data-id="' . $case->id . '"><i class="fa fa-edit"> </i> </a>';
            }

            if ($this->ion_auth->in_group(array('admin'))) {
                $options2 = '<a class="btn btn-danger btn-xs btn_width delete_button" title="' . lang('delete') . '" href="patient/deleteCaseHistory?id=' . $case->id . '&redirect=case" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i></a>';
            }

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options3 = ' <a type="button" class="btn btn-info btn-xs case" title="' . lang('case') . '" data-toggle = "modal" data-id="' . $case->id . '"><i class="fa fa-file"> </i> </a>';
            }

            if (!empty($case->patient_id)) {
                $patient_info = $this->patient_model->getPatientById($case->patient_id);
                if (!empty($patient_info)) {
                    $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
                } else {
                    $patient_details = $case->patient_name . '</br>' . $case->patient_address . '</br>' . $case->patient_phone . '</br>';
                }
            } else {
                $patient_details = '';
            }

            $info[] = array(
                date('d-m-Y', $case->date),
                $patient_details,
                $case->title,
                $options3 . ' ' . $options1 . ' ' . $options2
                    // $options4
            );
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('medical_history')->num_rows(),
                "recordsFiltered" => $this->db->get('medical_history')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getDocuments() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['documents'] = $this->patient_model->getDocumentBySearch($search);
            } else {
                $data['documents'] = $this->patient_model->getPatientMaterial();
            }
        } else {
            if (!empty($search)) {
                $data['documents'] = $this->patient_model->getDocumentByLimitBySearch($limit, $start, $search);
            } else {
                $data['documents'] = $this->patient_model->getDocumentByLimit($limit, $start);
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['documents'] as $document) {

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = '<a class="btn btn-info btn-xs" href="' . $document->url . '" download> ' . lang('download') . ' </a>';
            }
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options2 = '<a class="btn btn-danger btn-xs delete_button" href="patient/deletePatientMaterial?id=' . $document->id . '&redirect=documents"onclick="return confirm(\'You want to delete the item??\');"> <i class="fa fa-trash"></i> </a>';
            }

            if (!empty($document->patient)) {
                $patient_info = $this->patient_model->getPatientById($document->patient);
                if (!empty($patient_info)) {
                    $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
                } else {
                    $patient_details = $document->patient_name . '</br>' . $document->patient_address . '</br>' . $document->patient_phone . '</br>';
                }
            } else {
                $patient_details = '';
            }

            $utcdate = date_create($document->created_at, timezone_open('UTC'));
            date_timezone_set($utcdate, timezone_open($this->settings_model->getSettings()->timezone));
            $created_at = date_format($utcdate, 'Y-m-d') . "\n";

            if (pathinfo($document->url, PATHINFO_EXTENSION) === 'pdf'){
                $info[] = array(
                    $created_at,
                    $patient_details,
                    $document->title,
                    $document->description,
                    '<a class="example-image-link" href="' . $document->url . '" data-title="' . $document->title . '" target="_blank"">' . '<img class="example-image" src="uploads/PDF_DefaultImage.png" width="auto" height="auto"alt="image-1"style="max-width:150px;max-height:150px">' . '</a>',
                    $options1 . ' ' . $options2
                        // $options4
                );
            } else {
                $info[] = array(
                    $created_at,
                    $patient_details,
                    $document->title,
                    $document->description,
                    '<a class="example-image-link" href="' . $document->url . '" data-lightbox="example-1" data-title="' . $document->title . '">' . '<img class="example-image" src="' . $document->url . '" width="auto" height="auto"alt="image-1"style="max-width:150px;max-height:150px">' . '</a>',
                    $options1 . ' ' . $options2
                        // $options4
                );
            }
            

        }

        if (!empty($data['documents'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->patient_model->getPatientMaterialCount(),
                "recordsFiltered" => $this->patient_model->getDocumentBySearchCount($search),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getMedicalHistoryByJason() {
        $data = array();

        $from_where = $this->input->get('from_where');
        $id = $this->input->get('id');

        if (!empty($from_where)) {
            $this->db->where('id', $id);
            $id = $this->db->get('appointment')->row()->patient;
        }


        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        }

        $patient = $this->patient_model->getPatientById($id);
        $appointments = $this->appointment_model->getAppointmentByPatient($patient->id);
        $patients = $this->patient_model->getPatient();
        $doctors = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientId($id);
        $beds = $this->bed_model->getBedAllotmentsByPatientId($id);
        //  $orders = $this->order_model->getOrderByPatientId($id);
        $labs = $this->lab_model->getLabByPatientId($id);
        $medical_histories = $this->patient_model->getMedicalHistoryByPatientId($id);
        $patient_materials = $this->patient_model->getPatientMaterialByPatientId($id);



        foreach ($appointments as $appointment) {

            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }

            $timeline[$appointment->date + 1] = '<div class="panel-body profile-activity" >
                <h5 class="pull-left"><span class="label pull-right r-activity">' . lang('appointment') . '</span></h5>
                                            <h5 class="pull-right">' . date('d-m-Y', $appointment->date) . '</h5>
                                            <div class="activity terques">
                                                <span>
                                                    <i class="fa fa-stethoscope"></i>
                                                </span>
                                                <div class="activity-desk">
                                                    <div class="panel col-md-12">
                                                        <div class="panel-body">
                                                            <div class="arrow"></div>
                                                            <i class=" fa fa-calendar"></i>
                                                            <h4>' . date('d-m-Y', $appointment->date) . '</h4>
                                                            <p></p>
                                                            <i class=" fa fa-user-md"></i>
                                                                <h4>' . $doctor_name . '</h4>
                                                                    <p></p>
                                                                    <i class=" fa fa-clock"></i>
                                                                <p>' . $appointment->s_time . ' - ' . $appointment->e_time . '</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
        }


        foreach ($data['prescriptions'] as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            $timeline[strtotime($prescription->date) + 6] = '<div class="panel-body profile-activity" >
                                           <h5 class="pull-left"><span class="label pull-right r-activity">' . lang('prescription') . '</span></h5>
                                            <h5 class="pull-right">' . date('d-m-Y', strtotime($prescription->date)) . '</h5>
                                            <div class="activity violet">
                                                <span>
                                                    <i class="fa fa-medkit"></i>
                                                </span>
                                                <div class="activity-desk">
                                                    <div class="panel col-md-12">
                                                        <div class="panel-body">
                                                            <div class="arrow"></div>
                                                            <i class=" fa fa-calendar"></i>
                                                            <h4>' . date('d-m-Y', strtotime($prescription->date)) . '</h4>
                                                            <p></p>
                                                            <i class=" fa fa-user-md"></i>
                                                                <h4>' . $doctor_name . '</h4>
                                                                    <a class="btn btn-primary btn-xs" title="View" href="prescription/viewPrescription?id=' . $prescription->id . '" target="_blank">' . lang('view') . '</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
        }
        foreach ($labs as $lab) {

            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = '';
            }

            $timeline[$lab->date + 3] = '<div class="panel-body profile-activity" >
                                            <h5 class="pull-left"><span class="label pull-right r-activity">' . lang('lab') . '</span></h5>
                                            <h5 class="pull-right">' . date('d-m-Y', $lab->date) . '</h5>
                                            <div class="activity pink">
                                                <span>
                                                    <i class="fa fa-flask"></i>
                                                </span>
                                                <div class="activity-desk">
                                                    <div class="panel col-md-12">
                                                        <div class="panel-body">
                                                            <div class="arrow"></div>
                                                            <i class=" fa fa-calendar"></i>
                                                            <h4>' . date('d-m-Y', $lab->date) . '</h4>
                                                            <p></p>
                                                             <i class=" fa fa-user-md"></i>
                                                                <h4>' . $lab_doctor . '</h4>
                                                                    <a class="btn btn-xs btn-danger" title="Lab" style="color: #fff;" href="lab/invoice?id=' . $lab->id . '" target="_blank"><i class="fa fa-file-text"></i>' . lang('view') . '</a>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>';
        }

        foreach ($medical_histories as $medical_history) {
            $timeline[$medical_history->date + 4] = '<div class="panel-body profile-activity" >
                                            <h5 class="pull-left"><span class="label pull-right r-activity">' . lang('case_history') . '</span></h5>
                                            <h5 class="pull-right">' . date('d-m-Y', $medical_history->date) . '</h5>
                                            <div class="activity greenn">
                                                <span>
                                                    <i class="fa fa-file"></i>
                                                </span>
                                                <div class="activity-desk">
                                                    <div class="panel col-md-12">
                                                        <div class="panel-body">
                                                            <div class="arrow"></div>
                                                            <i class=" fa fa-calendar"></i>
                                                            <h4>' . date('d-m-Y', $medical_history->date) . '</h4>
                                                            <p></p>
                                                             <i class=" fa fa-note"></i> 
                                                                <p>' . $medical_history->description . '</p>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>';
        }

        foreach ($patient_materials as $patient_material) {
            $timeline[$patient_material->date + 5] = '<div class="panel-body profile-activity" >
                                           <h5 class="pull-left"><span class="label pull-right r-activity">' . lang('documents') . '</span></h5>
                                            <h5 class="pull-right">' . date('d-m-Y', $patient_material->date) . '</h5>
                                            <div class="activity purplee">
                                                <span>
                                                    <i class="fa fa-file"></i>
                                                </span>
                                                <div class="activity-desk">
                                                    <div class="panel col-md-12">
                                                        <div class="panel-body">
                                                            <div class="arrow"></div>
                                                            <i class=" fa fa-calendar"></i>
                                                            <h4>' . date('d-m-Y', $patient_material->date) . ' </h4>
                                                                <i class=" fa fa-book"></i>
                                                                <h4>' . $patient_material->title . '</h4>
                                                                <a class="btn btn-xs btn-purple" title="' . lang('view') . '" style="color: #fff;" href="' . $patient_material->url . '" target="_blank"><i class="fa fa-file-text"></i>' . lang('view') . '</a>
                                                                <a class="btn btn-xs btn-purple" title="' . lang('download') . '" style="color: #fff;" href="' . $patient_material->url . '" download=""><i class="fa fa-file-text"></i>' . lang('download') . '</a>
                                                                
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>';
        }





        if (!empty($timeline)) {
            krsort($timeline);
            $timeline_value = '';
            foreach ($timeline as $key => $value) {
                $timeline_value .= $value;
            }
        }



        $all_appointments = '';

        if ($this->ion_auth->in_group(array('admin'))) {
            foreach ($appointments as $appointment) {

                $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                if (!empty($doctor_details)) {
                    $appointment_doctor = $doctor_details->name;
                } else {
                    $appointment_doctor = "";
                }



                $patient_appointments = '<tr class = "">

            <td>' . date("d-m-Y", $appointment->date) . '
            </td>
            <td>' . $appointment->time_slot . '</td>
            <td>'
                        . $appointment_doctor . '
            </td>
            <td>' . $appointment->status . '</td>
            <td><a type="button" href="appointment/editAppointment?id=' . $appointment->id . '" class="btn btn-info btn-xs" title="Edit" data-id="' . $appointment->id . '">' . lang('edit') . '</a>
                <a class="btn btn-danger" title="' . lang('delete') . '" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>
            </td>
            </tr>';

                $all_appointments .= $patient_appointments;
            }
        } else {
            foreach ($appointments as $appointment) {

                $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                if (!empty($doctor_details)) {
                    $appointment_doctor = $doctor_details->name;
                } else {
                    $appointment_doctor = "";
                }



                $patient_appointments = '<tr class = "">

            <td>' . date("d-m-Y", $appointment->date) . '
            </td>
            <td>' . $appointment->time_slot . '</td>
            <td>'
                        . $appointment_doctor . '
            </td>
            <td>' . $appointment->status . '</td>
            <td><a type="button" href="appointment/editAppointment?id=' . $appointment->id . '" class="btn btn-info btn-xs" title="Edit" data-id="' . $appointment->id . '">' . lang('edit') . '</a>
                <a class="btn btn-danger" title="' . lang('delete') . '" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>
            </td>
            </tr>';

                $all_appointments .= $patient_appointments;
            }
        }




        if (empty($all_appointments)) {
            $all_appointments = '';
        }



        $all_case = '';

        if ($this->ion_auth->in_group(array('admin'))) {
            foreach ($medical_histories as $medical_history) {
                $patient_case = ' <tr class="">
                                        <td>' . date("d-m-Y", $medical_history->date) . '</td>
                                        <td>' . $medical_history->title . '</td>
                                        <td>' . $medical_history->description . '</td>
                                        <td>
                                            <a class="btn btn-danger" title="' . lang('delete') . '" href="patient/deleteCaseHistory?id=' . $medical_history->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>
                                        </td>
                                    </tr>';

                $all_case .= $patient_case;
            }
        } else {
            foreach ($medical_histories as $medical_history) {
                $patient_case = ' <tr class="">
                                        <td>' . date("d-m-Y", $medical_history->date) . '</td>
                                        <td>' . $medical_history->title . '</td>
                                        <td>' . $medical_history->description . '</td>
                                    </tr>';

                $all_case .= $patient_case;
            }
        }


        if (empty($all_case)) {
            $all_case = '';
        }
        $all_prescription = '';

        foreach ($data['prescriptions'] as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            if (!empty($doctor_details)) {
                $prescription_doctor = $doctor_details->name;
            } else {
                $prescription_doctor = '';
            }
            $medicinelist = '';
            if (!empty($prescription->medicine)) {
                $medicine = explode('###', $prescription->medicine);

                foreach ($medicine as $key => $value) {
                    $medicine_id = explode('***', $value);
                    $medicine_details = $this->medicine_model->getMedicineById($medicine_id[0]);
                    if (!empty($medicine_details)) {
                        $medicine_name_with_dosage = $medicine_details->name . ' -' . $medicine_id[1];
                        $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                        rtrim($medicine_name_with_dosage, ',');
                        $medicinelist .= '<p>' . $medicine_name_with_dosage . '</p>';
                    }
                }
            } else {
                $medicinelist = '';
            }

            $option1Prescription = '<a class="btn btn-info btn-xs" href="prescription/viewPrescription?id=' . $prescription->id . '"><i class="fa fa-eye"></i>' . lang('view') . '</a>';
            if ($this->ion_auth->in_group(array('Doctor'))) {
                $option2Prescription = '<a type="button" class="btn btn-info btn-xs" data-toggle="modal" href="prescription/editPrescription?id='. $prescription->id .'"><i class="fa fa-edit"></i>' . lang('edit') . '</a>';
            }
            if ($this->ion_auth->in_group(array('admin'))) {
                $option3Prescription = '<a class="btn btn-danger btn-xs" href="prescription/delete?id=' . $prescription->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }
            $prescription_case = ' <tr class="">
                                                    <td>' . date('d/m/Y', strtotime($prescription->date)) . '</td>
                                                    <td>' . $prescription_doctor . '</td>
                                                    <td>' . $medicinelist . '</td>
                                                         <td>' . $option1Prescription . ' ' . $option2Prescription . ' ' . $option3Prescription . '</td>
                                                </tr>';

            $all_prescription .= $prescription_case;
        }


        if (empty($all_prescription)) {
            $all_prescription = '';
        }


        $all_lab = '';

        foreach ($labs as $lab) {
            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = "";
            }
            $option1Lab = '<a class="btn btn-info btn-xs btn_width" href="lab/invoice?id=' . $lab->id . '"><i class="fa fa-eye"></i>' .' '. lang('report') . '</a>';
            if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) {
                $option2Lab = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('edit') . '" href="lab?id=' . $lab->id . '"><i class="fa fa-edit"> </i> ' . lang('') . '</a>';
            }
            if ($this->ion_auth->in_group(array('admin'))) {
                $option3Lab = '<a class="btn btn-danger btn-xs delete_button" title="' . lang('delete') . '" href="lab/delete?id=' . $lab->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>' . lang('') . '</a>';
            }
            $lab_class = ' <tr class="">
                                                    <td>' . $lab->id . '</td>
                                                    <td>' . date("d/m/Y", $lab->date) . '</td>
                                                    <td>' . $lab_doctor . '</td>
                                                         <td>' . $option1Lab . '  ' . $option2Lab . '  ' . $option3Lab . '</td>
                                                </tr>';

            $all_lab .= $lab_class;
        }


        if (empty($all_lab)) {
            $all_lab = '';
        }
        $all_bed = '';

        foreach ($beds as $bed) {


            
            if ($this->ion_auth->in_group(array('admin', 'Receptionist'))) {
                $option1Bed = '<a class="btn btn-info btn-xs editbutton" href="bed/editAllotment?id=' . $bed->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
                $option2Bed = '<a class="btn btn-danger btn-xs btn_width delete_button" href="bed/deleteAllotment?id=' . $bed->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
            }

            $bed_case = ' <tr class="">
                                                    <td>' . $bed->bed_id . '</td>
                                                    <td>' . $bed->a_time . '</td>
                                                    <td>' . $bed->d_time . '</td>
                                                    <td>' . $option1Bed . ' ' . $option2Bed . '</td>
                                                </tr>';

            $all_bed .= $bed_case;
        }


        if (empty($all_bed)) {
            $all_bed = '';
        }


        $all_material = '';
        foreach ($patient_materials as $patient_material) {

            if (!empty($patient_material->title)) {
                $patient_documents = $patient_material->title;
            }

            if ($this->ion_auth->in_group(array('admin', 'Patient', 'Doctor'))) {
                $patient_material = '
                <div class="panel col-md-3"  style="height: 200px; margin-right: 10px; margin-bottom: 36px; background: #f1f1f1; padding: 34px;">
                    <div class="post-info">
                        <img src="' . $patient_material->url . '" height="100" width="100">
                    </div>
                    <div class="post-info">
                        ' . $patient_documents . '
                    </div>
                    <p></p>
                    <div class="post-info">
                        <a class="btn btn-info btn-xs btn_width" href="' . $patient_material->url . '" download> ' . lang("download") . ' </a>
                        <a class="btn btn-danger btn-xs btn_width" title="' . lang("delete") . '" href="patient/deletePatientMaterial?id=' . $patient_material->id . '"onclick="return confirm("Are you sure you want to delete this item?");"><i class="fa fa-trash"></i></a>
                    </div>

                    <hr>

                </div>';
            } else {
                $patient_material = '
                <div class="panel col-md-3"  style="height: 200px; margin-right: 10px; margin-bottom: 36px; background: #f1f1f1; padding: 34px;">
                    <div class="post-info">
                        <img src="' . $patient_material->url . '" height="100" width="100">
                    </div>
                    <div class="post-info">
                        ' . $patient_documents . '
                    </div>
                    <p></p>
                    <div class="post-info">
                        <a class="btn btn-info btn-xs btn_width" href="' . $patient_material->url . '" download> ' . lang("download") . ' </a>
                    </div>

                    <hr>

                </div>';
            }
            
            $all_material .= $patient_material;
        }

        if (empty($all_material)) {
            $all_material = ' ';
        }


        if (!empty($patient->img_url)) {
            $profile_image = '<a href="#">
                            <img src="' . $patient->img_url . '" alt="">
                        </a>';
        } else {
            $profile_image = '';
        }



        $data['view'] = '
        <section class="col-md-4 col-sm-12">
            <header class="panel-heading clearfix">
                <div class="">
                ' . lang("patient") . ' ' . lang("info") . ' 
                </div>
            </header> 
            <aside class="profile-nav">
                <section class="">
                    <div class="user-heading round">
                        ' . $profile_image . '
                        <h1>' . $patient->name . '</h1>
                        <p> ' . $patient->email . ' </p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"> ' . lang("patient") . ' ' . lang("name") . '<span class="label pull-right r-activity">' . $patient->name . '</span></li>
                        <li>  ' . lang("patient_id") . ' <span class="label pull-right r-activity">' . $patient->id . '</span></li>
                        <li>  ' . lang("phone") . '<span class="label pull-right r-activity">' . $patient->phone . '</span></li>
                        <li>  ' . lang("email") . '<span class="label pull-right r-activity">' . $patient->email . '</span></li>
                        <li>  ' . lang("gender") . '<span class="label pull-right r-activity">' . $patient->sex . '</span></li>
                        <li>  ' . lang("birth_date") . '<span class="label pull-right r-activity">' . $patient->birthdate . '</span></li>
                        <li style="height: 200px;">  ' . lang("address") . '<span class="pull-right r-activity" style="height: 200px;">' . $patient->address . '</span></li>
                    </ul>
                </section>
            </aside>
        </section>

        <section class="col-md-8 col-sm-12">
            <header class="panel-heading clearfix">
                <div class="col-md-7">
                    ' . lang("history") . ' | ' . $patient->name . '
                </div>
            </header>
            <section class="panel-body">   
                <header class="panel-heading tab-bg-dark-navy-blueee">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#appointments">' . lang("appointments") . '</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#home">' . lang("case_history") . '</a>
                        </li>
                         <li class="">
                            <a data-toggle="tab" href="#prescription">' . lang("prescription") . '</a>
                        </li>
                        
                        <li class="">
                            <a data-toggle="tab" href="#lab">' . lang("lab") . '</a>
                        </li>
                        
                        <li class="">
                            <a data-toggle="tab" href="#profile">' . lang("documents") . '</a>
                        </li>
                         <li class="">
                            <a data-toggle="tab" href="#bed">' . lang("bed") . '</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#timeline">' . lang("timeline") . '</a> 
                        </li>
                    </ul>
                </header>
                
                <div class="tab-content">
                    <div id="appointments" class="tab-pane active">
                        <div class="">
                            <div class="adv-table editable-table ">
                                <table class="table table-striped table-hover table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>' . lang("date") . '</th>
                                            <th>' . lang("time_slot") . '</th>
                                            <th>' . lang("doctor") . '</th>
                                            <th>' . lang("status") . '</th>
                                            <th>' . lang("option") . '</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ' . $all_appointments . '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="home" class="tab-pane">
                        <div class="">
                            <div class="adv-table editable-table ">
                                <table class="table table-striped table-hover table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>' . lang("date") . '</th>
                                            <th>' . lang("title") . '</th>
                                            <th>' . lang("description") . '</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ' . $all_case . '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="prescription" class="tab-pane">
                        <div class="">
                            <div class="adv-table editable-table ">
                                <table class="table table-striped table-hover table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>' . lang("date") . '</th>
                                            <th>' . lang("doctor") . '</th>
                                            <th>' . lang("medicine") . '</th>
                                            <th>' . lang("options") . '</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ' . $all_prescription . '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="lab" class="tab-pane"> 
                        <div class="">
                            <div class="adv-table editable-table ">
                                <table class="table table-striped table-hover table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>' . lang("id") . '</th>
                                            <th>' . lang("date") . '</th>
                                            <th>' . lang("doctor") . '</th>
                                            <th>' . lang("options") . '</th>
                                        </tr>
                                    </thead>
                                    <tbody>'
                                        . $all_lab .
                                    '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="bed" class="tab-pane"> 
                        <div class="">
                            <div class="adv-table editable-table ">
                                <table class="table table-striped table-hover table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>' . lang("bed_id") . '</th>
                                            <th>' . lang("alloted_time") . '</th>
                                            <th>' . lang("discharge_time") . '</th>
                                        </tr>
                                    </thead>
                                    <tbody>'
                                        . $all_bed .
                                    '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="profile" class="tab-pane"> 
                        <div class="">
                            <div class="adv-table editable-table ">
                                <div class="">
                                    ' . $all_material . '
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="timeline" class="tab-pane"> 
                        <div class="">
                            <div class="">
                                <section class="">
                                    <header class="panel-heading">
                                        ' . lang("timeline") . '
                                    </header>
                                    ' . $timeline_value . '
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </section>';


        echo json_encode($data);
    }

    public function getPatientinfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->patient_model->getPatientInfo($searchTerm);

        echo json_encode($response);
    }

    public function getPatientinfoWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->patient_model->getPatientinfoWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getDoctorList($doctorsString) {

        if(!empty($doctorsString)) {
            $doctors = explode(',', $doctorsString);
            foreach ($doctors as $doctor) {
                $doctorName = $this->doctor_model->getDoctorById($doctor)->name;
                $doctorListString .= '<p>' . $doctorName . '</p>';
            }
            return $doctorListString;
        } else {
            return '';
        }


    }

    public function getDoctorListArray($doctorsString) {

        if(!empty($doctorsString)) {
            $doctors = explode(',', $doctorsString);
            foreach ($doctors as $doctor) {
                $doctorDictionary = $this->doctor_model->getDoctorById($doctor);
                $doctorListArray[] = $doctorDictionary;
            }
            return $doctorListArray;
        } else {
            return '';
        }


    }

    public function getDoctorName($doctorsString) {

        if(!empty($doctorsString)) {
            foreach ($doctorsString as $doctor) {
                $doctorId = $this->doctor_model->getDoctorById($doctor)->id;
                $doctorName = $this->doctor_model->getDoctorById($doctor)->name;
                $doctorListString .= $doctorName . '-' . $doctorId . ',';
            }
            return $doctorListString;
        } else {
            return '';
        }


    }

    public function getDocumentUploadCategory() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->patient_model->getDocumentUploadCategory($searchTerm);

        echo json_encode($response);
    }

}

/* End of file patient.php */
    /* Location: ./application/modules/patient/controllers/patient.php */
    