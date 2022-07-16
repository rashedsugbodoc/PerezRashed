<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profile/profile_model');
        $this->load->model('patient_model');
        $this->load->model('form/form_model');
        $this->load->model('donor/donor_model');
        $this->load->model('specialty/specialty_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('bed/bed_model');
        $this->load->model('lab/lab_model');
        $this->load->model('labrequest/labrequest_model');
        $this->load->model('finance/finance_model');
        $this->load->model('finance/pharmacy_model');
        $this->load->model('diagnosis/diagnosis_model');
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
        $this->load->model('encounter/encounter_model');
        $this->load->helper('string');
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
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('patientv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function findDoctors(){
        $data['specialties'] = $this->specialty_model->getSpecialty();
        // $data['doctors'] = $this->doctor_model->getDoctor();
        $data['doctors'] = $this->doctor_model->getAllDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2');
        $this->load->view('find_doctors', $data);
    }

    public function findClinicOrHospital() {
        $data['hospitals'] = $this->hospital_model->getHospital();
        $data['entity_type'] = $this->settings_model->getEntityType();
        $this->load->view('home/dashboardv2');
        $this->load->view('find_clinic_hospital', $data);
    }

    public function calendar() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist', 'Patient'))) {
            redirect('home/permission');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('calendarv2', $data);
        // $this->load->view('home/footer'); // just the header file
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
        $data['groups'] = $this->patient_model->getBloodGroup();
        $data['countries'] = $this->location_model->getCountry();
        $data['civil_status'] = $this->patient_model->getCivilStatus();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist', 'Patient'))) {
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

        if ($suffix == '0') {
            $suffix = null;
        }

        $password = random_string('alnum', 8);
        $sms = $this->input->post('sms');
        $doctor = $this->input->post('doctor');
        $address = $this->input->post('address');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $civil_status = $this->input->post('civil_status');

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
            $registration_time = gmdate('Y-m-d H:i:s');
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
        $this->form_validation->set_rules('suffix', 'Suffix', 'trim|min_length[1]|max_length[5]|xss_clean');

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
        // Validating Civil Status Field   
        $this->form_validation->set_rules('civil_status', 'Civil Status', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('country', 'Country', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('state', 'State', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('city', 'City', 'trim|max_length[100]|xss_clean');
        // Validating Postal Field   
        $this->form_validation->set_rules('postal', 'Postal', 'trim|alpha_numeric|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[2]|regex_match[/^[+][0-9]{3,14}$/]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('sex', 'Sex', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('bloodgroup', 'Blood Group', 'trim|max_length[15]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                if (empty($redirect)) {
                    $data = array();

                    // $id = $this->input->get('id');
                    $data['patient'] = $this->patient_model->getPatientById($id);
                    $data['doctors'] = $this->doctor_model->getDoctor();
                    $data['groups'] = $this->patient_model->getBloodGroup();
                    $data['countries'] = $this->location_model->getCountry();
                    $data['civil_status'] = $this->patient_model->getCivilStatus();
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    redirect($redirect);
                }
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['setval'] = 'setval';
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['groups'] = $this->patient_model->getBloodGroup();
                $data['countries'] = $this->location_model->getCountry();
                $data['civil_status'] = $this->patient_model->getCivilStatus();
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
                'encrypt_name' => TRUE,
                'upload_path' => "./uploads/profile/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "2000",
                'max_width' => "2000"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            $username = $name;

            $path = $this->upload->data();
            if (!empty($path['file_name'])) {
                $img_url = "uploads/profile/" . $path['file_name'];
            } else {
                $img_url = $this->patient_model->getPatientById($id)->img_url;
            }

            $data = array();

            $data = array(
                // 'patient_id' => $patient_id,
                // 'img_url' => $img_url,
                'name' => $name,
                'firstname' => $fname,
                'lastname' => $lname,
                'middlename' => $mname,
                'suffix' => $suffix,
                'email' => $email,
                'civil_status' => $civil_status,
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
                'registration_time' => $registration_time,
                'privacy_level_id' => 3
            );

            if (empty($id)) {     // Adding New Patient
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                    $data = array();
                    $data['patient'] = $this->patient_model->getPatientById($id);
                    $data['doctors'] = $this->doctor_model->getDoctor();
                    $data['groups'] = $this->patient_model->getBloodGroup();
                    $data['countries'] = $this->location_model->getCountry();
                    $data['civil_status'] = $this->patient_model->getCivilStatus();
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        $upload_data = $this->upload->data();
                        $image_url = "uploads/profile/" . $upload_data['file_name'];
                        $data2 = array(
                            'img_url' => $image_url
                        );
                        $data = array_merge($data, $data2);

                        $dfg = 5;
                        $this->ion_auth->register($username, $password, $email, $dfg);
                        $countryname = $this->location_model->getCountryById($country)->name;
                        $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                        $this->patient_model->insertPatient($data);
                        $patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
                        $patient_number = $countryname[0]. gmdate("y") .dechex(gmdate("n")). format_number_with_digits($patient_user_id, 4);
                        $id_info = array('ion_user_id' => $ion_user_id, 'patient_id' => $patient_number);
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
                        if (empty($redirect)) {
                            redirect('patient');
                        } else {
                            redirect($redirect);
                        }

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
                            $data['groups'] = $this->patient_model->getBloodGroup();
                            $data['countries'] = $this->location_model->getCountry();
                            $data['civil_status'] = $this->patient_model->getCivilStatus();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            $dfg = 5;
                            $upload_data = $this->upload->data();
                            $image_url = "uploads/profile/" . $upload_data['file_name'];
                            $data2 = array(
                                'img_url' => $image_url
                            );
                            $data = array_merge($data, $data2);
                            $this->ion_auth->register($username, $password, $email, $dfg);
                            $countryname = $this->location_model->getCountryById($country)->name;
                            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                            $this->patient_model->insertPatient($data);
                            $patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
                            $patient_number = $countryname[0]. gmdate("y") .dechex(gmdate("n")). format_number_with_digits($patient_user_id, 4);
                            $id_info = array('ion_user_id' => $ion_user_id, 'patient_id' => $patient_number);
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
                            if (empty($redirect)) {
                                redirect('patient');
                            } else {
                                redirect($redirect);
                            }
                        }
                    }
                    
                }
                //    }
            } else { // Updating Patient
                
                if ($email !== $emailById) {
                    if ($this->ion_auth->email_check($email)) {
                        $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                        if (empty($redirect)) {
                            $data = array();
                            $data['patient'] = $this->patient_model->getPatientById($id);
                            $data['doctors'] = $this->doctor_model->getDoctor();
                            $data['groups'] = $this->patient_model->getBloodGroup();
                            $data['countries'] = $this->location_model->getCountry();
                            $data['civil_status'] = $this->patient_model->getCivilStatus();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            redirect($redirect);
                        }
                    } else {
                        if ($this->upload->do_upload('img_url')) {
                            $upload_data = $this->upload->data();
                            $image_url = "uploads/profile/" . $upload_data['file_name'];
                            $data1 = array(
                                'img_url' => $image_url
                            );
                            $data = array_merge($data, $data1);
                            $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;

                            //Updating Patient so use existing patient password
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->patient_model->updatePatient($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (empty($redirect)) {
                                redirect('patient');
                            } else {
                                redirect($redirect);
                            }
                        } else {
                            //additional validation for uploading file in update modal if email not exist
                            if ($_FILES['img_url']['size'] > $config['max_size']) {
                                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                                $this->session->set_flashdata('fileError', $fileError);
                                $this->session->set_flashdata('error', lang('validation_error'));
                                if (empty($redirect)) {
                                    $data = array();
                                    $data['setval'] = 'setval';
                                    $data['patient'] = $this->patient_model->getPatientById($id);
                                    $data['doctors'] = $this->doctor_model->getDoctor();
                                    $data['groups'] = $this->patient_model->getBloodGroup();
                                    $data['countries'] = $this->location_model->getCountry();
                                    $data['civil_status'] = $this->patient_model->getCivilStatus();
                                    $this->load->view('home/dashboardv2'); // just the header file
                                    $this->load->view('add_newv2', $data);
                                    // $this->load->view('home/footer'); // just the footer file
                                } else {
                                    redirect($redirect);
                                }
                            } else {
                                $upload_data = $this->upload->data();
                                $image_url = "uploads/profile/" . $upload_data['file_name'];
                                $data1 = array(
                                    'img_url' => $image_url
                                );
                                $data = array_merge($data, $data1);
                                $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                                if (empty($password)) {
                                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                                } else {
                                    $password = $this->ion_auth_model->hash_password($password);
                                }
                                $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                                $this->patient_model->updatePatient($id, $data);
                                $this->session->set_flashdata('success', lang('record_updated'));
                                if (empty($redirect)) {
                                    redirect('patient');
                                } else {
                                    redirect($redirect);
                                }
                            }
                        }

                    }
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        $upload_data = $this->upload->data();
                        $image_url = "uploads/profile/" . $upload_data['file_name'];
                        $data1 = array(
                            'img_url' => $image_url
                        );
                        $data = array_merge($data, $data1);
                        $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                        if (empty($password)) {
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        } else {
                            $password = $this->ion_auth_model->hash_password($password);
                        }
                        $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->patient_model->updatePatient($id, $data);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        if (empty($redirect)) {
                            redirect('patient');
                        } else {
                            redirect($redirect);
                        }
                    } else {
                        //additional validation for uploading file in update modal if email exist
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            $this->session->set_flashdata('fileError', $fileError);
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            $data['setval'] = 'setval';
                            if (empty($redirect)) {
                                $data['patient'] = $this->patient_model->getPatientById($id);
                                $data['doctors'] = $this->doctor_model->getDoctor();
                                $data['groups'] = $this->patient_model->getBloodGroup();
                                $data['countries'] = $this->location_model->getCountry();
                                $data['civil_status'] = $this->patient_model->getCivilStatus();
                                $this->load->view('home/dashboardv2'); // just the header file
                                $this->load->view('add_newv2', $data);
                                // $this->load->view('home/footer'); // just the footer file
                            } else {
                                redirect($redirect);
                            }
                        } else {
                            $upload_data = $this->upload->data();
                            $image_url = "uploads/profile/" . $upload_data['file_name'];
                            $data1 = array(
                                'img_url' => $image_url
                            );
                            $data = array_merge($data, $data1);
                            $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                            if (empty($password)) {
                                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            } else {
                                $password = $this->ion_auth_model->hash_password($password);
                            }
                            $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->patient_model->updatePatient($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (empty($redirect)) {
                                redirect('patient');
                            } else {
                                redirect($redirect);
                            }
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
        $patient_id = $this->input->get('id');
        $patient = $this->patient_model->getPatientByPatientNumber($patient_id);
        $active_status = $this->db->get_where('users', array('id' => $patient->ion_user_id))->row()->active;
        if ($active_status == 1) {
            redirect('home/permission');
        }
        $id = $this->patient_model->getPatientByPatientNumber($patient_id)->id;
        $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->patient_model->getBloodGroup();
        $data['countries'] = $this->location_model->getCountry();
        $data['civil_status'] = $this->patient_model->getCivilStatus();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editProfile() {
        $data = array();
        $user = $this->ion_auth->get_user_id();
        $id = $this->patient_model->getPatientByIonUserId($user)->id;
        $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->patient_model->getBloodGroup();
        $data['countries'] = $this->location_model->getCountry();
        $data['civil_status'] = $this->patient_model->getCivilStatus();
        $data['redirect'] = 'patient/editProfile';
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);        
        //$this->load->view('home/footer'); // just the footer file
    }

    function addIdentification() {
        $id = $this->input->post('id');
        $profile_id = $this->input->post('family_profile_id');
        $philhealth = $this->input->post('philhealth');
        $nhts = $this->input->post('nhts');
        $national_id = $this->input->post('national_id');
        $driver_license_id = $this->input->post('driver_license_id');
        $passport_id = $this->input->post('passport_id');
        $social_security_id = $this->input->post('social_security_id');
        $umid = $this->input->post('umid');
        $other_id_name = $this->input->post('other_id_name');
        $other_id_number = $this->input->post('other_id_number');
        $id_type = $this->input->post('id_type');
        $image_front = $this->input->post('image_front');
        $image_back = $this->input->post('image_back');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Name Field
        $this->form_validation->set_rules('family_profile_id', 'Family Profile', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('philhealth', 'PhilHealth', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('nhts', 'NHTS', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('national_id', 'National ID', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('driver_license_id', 'Driver License', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('passport_id', 'Passport', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('social_security_id', 'Social Security', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('umid', 'UMID', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('other_id_name', 'Other ID Name', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('other_id_number', 'Other ID Number', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('id_type', 'ID Type', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('image_front', 'Image Front', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('image_back', 'Image Back', 'trim|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', lang('validation_error'));
            $data = array();
            $user = $this->ion_auth->get_user_id();
            $id = $this->patient_model->getPatientByIonUserId($user)->id;
            $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($id);
            $data['redirect'] = 'patient/editIdentification';
            $data['fpi'] = random_string('alnum', 8);
            $this->load->view('home/dashboardv2'); // just the header file
            $this->load->view('identification', $data);        
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
                'encrypt_name' => TRUE,
                'upload_path' => "./uploads/profile/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            $username = $name;

            $path = $this->upload->data();
            
            if (!empty($path['file_name'])) {
                $img_url = "uploads/profile/" . $path['file_name'];
            } else {
                $img_url = $this->patient_model->getPatientById($id)->img_url;
            }

            $data = array(
                'family_profile_id' => $profile_id,
                'national_healthcare_id' => $philhealth,
                'nhts_id' => $nhts,
                'national_id' => $national_id,
                'drivers_license_id' => $driver_license_id,
                'passport_id' => $passport_id,
                'social_security_id' => $social_security_id,
                'umid_id' => umid,
                'id1_proof_type' => $id_type,
                'id1_proof_front_url' => $image_front,
                'id1_proof_back_url' => $image_back,
            );
            $this->session->set_flashdata('success', lang('record_added'));
            $this->patient_model->updatePatient($id, $data);

            redirect('patient/editIdentification');
        }
    }

    function editIdentification() {
        $data = array();
        $patient_number = $this->input->get('id');
        $id = $this->patient_model->getPatientByPatientNumber($patient_number)->id;
        if (empty($id)) {
            $user = $this->ion_auth->get_user_id();
            $id = $this->patient_model->getPatientByIonUserId($user)->id;
        }
        $hospital_id = $this->session->userdata('hospital_id');
        $provider_country = $this->settings_model->getSettingsByHospitalId($hospital_id)->country_id;
        $data['id_types'] = $this->patient_model->getIdType($provider_country);
        $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($id);
        $data['redirect'] = 'patient/editIdentification';
        $data['fpi'] = random_string('alnum', 8);
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('identification', $data);
    }

    function editPopulation() {
        $data = array();
        $patient_number = $this->input->get('id');
        $id = $this->patient_model->getPatientByPatientNumber($patient_number)->id;
        $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($id);
        $data['safe_water_supply'] = $this->patient_model->getSafeWaterSupply();
        $data['unmet_need'] = $this->patient_model->getUnmetNeed();
        $this->load->view('home/dashboardv2');
        $this->load->view('population_profile', $data);
    }

    function addPopulationProfile() {
        $family_profile = $this->input->post('family_profile');
        $id = $this->patient_model->getPatientByFamilyProfileId($family_profile)->id;
        $family_head_radio = $this->input->post('family_head_radio');
        // if ($family_head_radio === "0") {
        //     $family_head_radio = null;
        // }
        $family_head_relation = $this->input->post('family_head_relation');
        $familyhead_id = $this->input->post('familyhead_id');
        $education_attainment = $this->input->post('educational_attainment');
        $monthly_family_income = $this->input->post('monthly_family_income');
        $safe_water_supply = $this->input->post('safe_water_supply');
        $sanitary_toilet = $this->input->post('sanitary_toilet');
        $sexually_active = $this->input->post('sexually_active');
        // if ($sexually_active === "0") {
        //     $sexually_active = null;
        // }
        $unmet_need = $this->input->post('unmet_need');
        $deceased = $this->input->post('deceased');
        // if ($deceased === "0") {
        //     $deceased = null;
        // }
        $date_of_death = gmdate('Y-m-d H:i:s', strtotime($this->input->post('date_of_death')));

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        $this->form_validation->set_rules('family_profile', 'Family Profile', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('family_head_radio', 'Family Head', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('educational_attainment', 'Educational Attainment', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('monthly_family_income', 'Monthly Family Income', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('safe_water_supply', 'Safe Water Supply', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('sanitary_toilet', 'Sanitary Toilet', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('sexually_active', 'Sexually Active', 'trim|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('unmet_need', 'Unmet Need', 'trim|min_length[1]|max_length[100]|xss_clean');

        $data = array(
            'family_profile_id' => $family_profile,
            'is_family_head' => $family_head_radio,
            'relation_to_family_head' => $family_head_relation,
            'family_head_patient_id' => $familyhead_id,
            'educational_attainment_id' => $education_attainment,
            'monthly_family_income_id' => $monthly_family_income,
            'safe_water_supply_level_id' => $safe_water_supply,
            'sanitary_toilet_id' => $sanitary_toilet,
            'is_sexually_active' => $sexually_active,
            'unmet_need_id' => $unmet_need,
            'is_deceased' => $deceased,
            'deceased_date' => $date_of_death,
        );
        $this->session->set_flashdata('success', lang('record_added'));
        $this->patient_model->updatePatient($id, $data);

        redirect('patient');

    }

    function searchFamilyHead() {
        $data = array();
        $profile_id = $this->input->get('id');
        $fname = $this->input->get('f_name');
        $mname = $this->input->get('m_name');
        $lname = $this->input->get('l_name');

        $data['family_head'] = $this->patient_model->getFamilyHeadByProfileIdByFirstNameByMiddleNameByLastName($profile_id, $fname, $mname, $lname);

        echo json_encode($data);
    }

    public function getEducationalAttainmentInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->patient_model->getEducationalAttainmentInfo($searchTerm);

        echo json_encode($response);
    }

    public function getRelationInfo() {
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->patient_model->getRelationInfo($searchTerm);

        echo json_encode($response);
    }

    public function getSanitaryToiletInfo() {
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->patient_model->getSanitaryToiletInfo($searchTerm);

        echo json_encode($response);
    }

    public function getMonthlyFamilyIncomeInfo() {
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->patient_model->getMonthlyFamilyIncomeInfo($searchTerm);

        echo json_encode($response);
    }

    function getIdTypeInfo() {
        $searchTerm = $this->input->post('searchTerm');
        $hospital_id = $this->session->userdata('hospital_id');
        $provider_country = $this->settings_model->getSettingsByHospitalId($hospital_id)->country_id;

        $response = $this->patient_model->getIdTypeInfo($searchTerm, $provider_country);

        echo json_encode($response);
    }

    function editIdentificationByJason() {
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);

        echo json_encode($data);
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
            $data['birthdate'] = date('F j, Y', strtotime($data['patient']->birthdate));
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

    function getPatientPopulationByJason() {
        $profile = $this->input->get('profile');
        $data['patient_profile'] = $this->patient_model->getPatientByFamilyProfileId($profile);

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
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('patient_paymentsv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function caseList() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Patient', 'Nurse', 'Receptionist'))) {
            redirect('home/permission');
        }
        $case_note_number = $this->input->get('id');
        $id = $this->patient_model->getMedicalHistoryByCaseNoteNumber($case_note_number)->id;

        if (!empty($id)) {
            $data['case_lists'] = $this->patient_model->getMedicalHistoryById($id);
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

        if (!empty($date_from) && !empty($date_to)) {
            $data['payments'] = $this->finance_model->getPaymentByPatientIdByDate($patient, $date_from, $date_to);
            $data['deposits'] = $this->finance_model->getDepositByPatientIdByDate($patient, $date_from, $date_to);
            if (!empty($data['settings']->payment_gateway)) {
                $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);    
            }
        } else {
            $data['payments'] = $this->finance_model->getPaymentByPatientId($patient);
            $data['pharmacy_payments'] = $this->pharmacy_model->getPaymentByPatientId($patient);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByPatientId($patient);
            $data['deposits'] = $this->finance_model->getDepositByPatientId($patient);
            if (!empty($data['settings']->payment_gateway)) {
                $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);    
            }
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
        if (!$this->ion_auth->in_group(array('Receptionist', 'Nurse', 'admin', 'Doctor', 'DoctorAdmin', 'Patient', 'Laboratorist'))) {
            redirect('home/permission');
        }

        $data = array();

        $redirect = $this->input->post('redirect');

        $vital_id = $this->input->post('id');
        $data['settings'] = $this->settings_model->getSettings();
        $id = $this->input->post('patient');
        $encounter_id = (int)$this->input->post('encounter_id');
        $encounter_row = $this->encounter_model->getEncounterById($encounter_id);
        $patient_id = (int)$id;
        $date_measured = $this->input->post('date');
        $time_measured = $this->input->post('time');
        $date_time_measured = $this->input->post('datetime');
        $systolic = $this->input->post('systolic');
        $pain = $this->input->post('pain_level');

        if(empty($encounter_id)) {
            $encounter_id = null;
        }

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
        // $date = date("Y-m-d H:i:s", now('UTC'));
        $date = gmdate('Y-m-d H:i:s');
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
        $blood_sugar = $this->input->post('blood_sugar');
        if(empty($blood_sugar)) {
            $blood_sugar = null;
        }
        $blood_sugar_unit = $this->input->post('blood_sugar_unit');
        if(empty($blood_sugar_unit)) {
            $blood_sugar_unit = null;
        }
        $blood_sugar_timing = $this->input->post('blood_sugar_timing');

        $date_time_combined = strtotime($date_time_measured);
        $datetime_measured = gmdate('Y-m-d H:i:s', $date_time_combined);

        if ($this->ion_auth->in_group(array('Doctor', 'DoctorAdmin'))) {
            $doctor_id = (int)$this->doctor_model->getDoctorByIonUserId($current_user)->id;
        } else {
            $current_user = $this->ion_auth->get_user_id();
        }

        if (empty($doctor_id)) {
            $doctor_id = (int)$encounter_row->rendering_staff_id;
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

            if ($blood_sugar_unit == 'mg_dl') {
                $mg = $blood_sugar;
                $mmol = convertMgtoMmol($mg);
            } else if ($blood_sugar_unit == 'mmol') {
                $mmol = $blood_sugar;
                $mg = convertMmoltoMg($mmol);
            }

        //Comvert C to F End

        //form validation start
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // Validating Date Measured Field
            $this->form_validation->set_rules('datetime', 'Date Measured', 'trim|min_length[2]|max_length[100]|xss_clean');
            // Validating Time Measured Field   
            // $this->form_validation->set_rules('time', 'Time Measured', 'trim|min_length[2]|max_length[100]|xss_clean');
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
            // Validating Blood Sugar Field           
            $this->form_validation->set_rules('blood_sugar', 'Blood Sugar', 'trim|max_length[50]|xss_clean');
            // Validating Respiration Field           
            $this->form_validation->set_rules('blood_sugar_timing', 'Blood Sugar Timing', 'trim|max_length[50]|xss_clean');
            // Validating Note Field           
            $this->form_validation->set_rules('note', 'Note', 'trim|max_length[1000]|xss_clean');
            // Validating Note Field           
            $this->form_validation->set_rules('pain_level', 'Pain Level', 'trim|numeric|max_length[10]|xss_clean');
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
                'measured_at' => $datetime_measured,
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
                'blood_sugar_mg' => $mg,
                'blood_sugar_mmol' => $mmol,
                'blood_sugar_timing' => $blood_sugar_timing,
                'pain' => $pain,
                'encounter_id' => $encounter_id,
            );

            if (empty($vital_id)) {
                $this->patient_model->insertPatientVital($data);
                $inserted_id = $this->db->insert_id();
                $this->session->set_flashdata('success', lang('record_added'));

                $vital_exist = $this->encounter_model->getEncounterByVitalId($encounter_id)->start_vital_id;
                $encounter_vital_start = $this->encounter_model->getEncounterById($encounter_id)->start_vital_id;

                if (empty($encounter_vital_start)) {
                    $data_vital = array(
                        'start_vital_id' => $inserted_id,
                    );
                } else {
                    $data_vital = array(
                        'end_vital_id' => $inserted_id,
                    );
                }

                $this->encounter_model->updateEncounter($encounter_id, $data_vital);

            } else {
                $this->patient_model->updatePatientVital($vital_id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            
            if (empty($redirect)) {
                redirect('patient/medicalHistory?id=' . $id);
            } else {
                redirect($redirect);
            }

        }

    }

    function editVitalByJason() {
        $id = $this->input->get('id');
        $data['vital'] = $this->patient_model->getVitalById($id);
        $data['datetime'] = date('F j, Y h:i A' ,strtotime($data['vital']->measured_at.' UTC'));
        // $data['time'] = date('' ,strtotime($data['vital']->measured_at.' UTC'));
        echo json_encode($data);
    }

    public function deleteVital() {
        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }

        $id = $this->input->get('id');
        $user = $this->ion_auth->get_user_id();
        $patient_id = $this->patient_model->getVitalById($id)->patient_id;

        $this->patient_model->deleteVital($id, $user);

        $this->session->set_flashdata('success', lang('record_added'));

        redirect('patient/medicalHistory?id=' . $patient_id);
    }

    function addMedicalHistory() {
        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $current_doctor = $this->ion_auth->get_user_id();
            $current_user = $this->doctor_model->getDoctorByIonUserId($current_doctor)->id;
        }

        $encounter = $this->input->post('encounter_id');
        
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');

        $date = $this->input->post('date');
        $date = gmdate('Y-m-d H:i:s', strtotime($date));

        $title = $this->input->post('title');

        do {
            $raw_case_number = 'N'.random_string('alnum', 6);
            $validate_number = $this->patient_model->validateCaseNumber($raw_case_number);
        } while($validate_number != 0);

        $case_number = strtoupper($raw_case_number);
        

        // if (!empty($date)) {
        //     $nowtime = date('H:i:s');
        //     $date = strtotime($date . ' ' . $nowtime);
        //     $date = gmdate('Y-m-d H:i:s', $date);
        // } else {
        //     $date = time();
        // }

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
            

            if (empty($id)) {     // Adding New department
                $data = array(
                    'patient_id' => $patient_id,
                    'case_date' => $date,
                    'title' => $title,
                    'description' => $description,
                    'patient_name' => $patient_name,
                    'patient_phone' => $patient_phone,
                    'patient_address' => $patient_address,
                    'doctor_id' => $current_user,
                    'encounter_id' => $encounter,
                    'case_note_number' => $case_number
                );
                // $data['setval'] = 'setval';
                $this->patient_model->insertMedicalHistory($data);
                $this->session->set_flashdata('success', lang('record_added'));
                // $lastId = $this->db->insert_id();
                // $this->load->view('home/dashboardv2'); // just the header file
                // $this->load->view('jitsiv2', $data);
            } else { // Updating department
                $data = array(
                    'patient_id' => $patient_id,
                    'case_date' => $date,
                    'title' => $title,
                    'description' => $description,
                    'patient_name' => $patient_name,
                    'patient_phone' => $patient_phone,
                    'patient_address' => $patient_address,
                    'doctor_id' => $current_user,
                    'encounter_id' => $encounter,
                );
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
        $patient_number = $this->input->get('id');
        $patient = $this->patient_model->getPatientByPatientNumber($patient_number);
        $id = $patient->id;
        $data['active_status'] = $this->db->get_where('users', array('id' => $patient->ion_user_id))->row()->active;
        if (empty($id)) {
            $id = $this->input->post('id');
        }
        $data['encounter_id'] = $this->input->get('encounter_id');
        if (empty($data['encounter_id'])) {
            $data['encounter_id'] = $this->input->post('encounter_id');
        }
        if ($data['encounter_id'] == "All") {
            $data['encounter_id'] = null;
            $data['all_encounter'] = $this->input->get('encounter_id');
        }
        $data['encounter_details'] = $this->encounter_model->getEncounterById($data['encounter_id']);
        if (empty($data['encounter_id'])) {
            $data['encounter_details'] = $this->encounter_model->getEncounterByPatientId($id);
        }

        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        }

        if ($this->ion_auth->in_group(array('Laboratorist', 'Receptionist', 'Accountant', 'CompanyUser'))) {
            redirect('home/permission');
        }

        $patient_hospital_id = $this->patient_model->getPatientById($id)->hospital_id;
        // if ($patient_hospital_id != $this->session->userdata('hospital_id')) {
        //     redirect('home/permission');
        // }

        $data['current_user'] = (int)$this->ion_auth->get_user_id();
        if (empty($data['encounter_id'])) {
            $data['vitals'] = $this->patient_model->getPatientVitalById($id);
        } else {
            $data['vitals'] = $this->patient_model->getPatientVitalByIdByEncounterId($id, $data['encounter_id']);
        }
        
        $data['settings'] = $this->settings_model->getSettings();
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($id);
        if (empty($data['encounter_id'])) {
            $data['appointments'] = $this->appointment_model->getAppointmentByPatient($data['patient']->id);
        } else {
            $data['appointments'] = $this->appointment_model->getAppointmentByPatientByEncounterId($data['patient']->id, $data['encounter_id']);
        }
        
        $data['appointments_location'] = $this->appointment_model->getAppointmentByPatientForLocation($data['patient']->id);
        
        if (empty($data['encounter_id'])) {
            $data['labrequests'] = $this->labrequest_model->getLabrequestByPatientId($data['patient']->id);
        } else {
            $data['labrequests'] = $this->labrequest_model->getLabrequestByPatientIdByEncounterId($data['patient']->id, $data['encounter_id']);
        }
        // $data['service_category_group'] = $this->appointment_model->getServiceCategoryById($data['appointments_location']->service_category_group_id);
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        if (empty($data['encounter_id'])) {
            $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientId($id);
        } else {
            $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientIdByEncounterId($id, $data['encounter_id']);
        }
        if (empty($data['encounter_id'])) {
            $data['forms'] = $this->form_model->getFormByPatientId($id);
        } else {
            $data['forms'] = $this->form_model->getFormByPatientIdByEncounterId($id, $data['encounter_id']);
        }
        $data['labs'] = $this->lab_model->getLabByPatientId($id);
        $data['beds'] = $this->bed_model->getBedAllotmentsByPatientId($id);
        if (empty($data['encounter_id'])) {
            $data['encounters'] = $this->encounter_model->getEncounterByPatientId($id);
        } else {
            $data['encounters'] = $this->encounter_model->getEncounterByPatientIdByEncounterId($id, $data['encounter_id']);
        }
        if (empty($data['encounter_id'])) {
            $data['medical_histories'] = $this->patient_model->getMedicalHistoryByPatientId($id);
        } else {
            $data['medical_histories'] = $this->patient_model->getMedicalHistoryByPatientIdByEncounterId($id, $data['encounter_id']);
        }
        if (empty($data['encounter_id'])) {
            $data['patient_materials'] = $this->patient_model->getPatientMaterialByPatientId($id);
        } else {
            $data['patient_materials'] = $this->patient_model->getPatientMaterialByPatientIdByEncounterId($id, $data['encounter_id']);
        }

        if (empty($data['encounter_id'])) {
            $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByPatient($id);
        } else {
            $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByPatientByEncounterId($id, $data['encounter_id']);
        }
        

        foreach ($data['appointments'] as $appointment) {
            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
            $hospital_details = $this->hospital_model->getHospitalById($appointment->hospital_id);
            $branch_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            $service_category_group = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $services = $this->finance_model->getPaymentCategoryById($appointment->service_id)->category;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            $appointment_specialty = [];
            $appointment_doctor_specialty_explode = explode(',', $doctor_details->specialties);
            foreach($appointment_doctor_specialty_explode as $appointment_doctor_specialty) {
                $appointment_specialties = $this->specialty_model->getSpecialtyById($appointment_doctor_specialty)->display_name_ph;
                $appointment_specialty[] = '<span class="badge badge-light badge-pill">'. $appointment_specialties .'</span>';
            }

            $appointment_spec = implode(' ', $appointment_specialty);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            

            $timeline[strtotime($appointment->appointment_registration_time.' UTC') + 1] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', $appointment->date) . '</span></li>
                                                <li>
                                                    <i class="fa fa-download bg-success"></i>
                                                    <div class="timelineleft-item">
                                                        <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($appointment->appointment_registration_time.' UTC')), 3) . '</span>
                                                        <h3 class="timelineleft-header"><span>' . lang('appointment') . '</span></h3>
                                                        <div class="timelineleft-body">
                                                            <div class="form-group">
                                                                <div class="media mr-4 mb-4">
                                                                    <div class="mr-3 mt-1 ml-3">
                                                                        <i class="fa fa-calendar fa-2x text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <strong>' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', $appointment->date) . '</strong>
                                                                        <div class="row">
                                                                            <div class="col-md-10 mb-3">
                                                                                <small class="text-muted">' . $appointment->s_time . ' - ' . $appointment->e_time . '</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ml-auto mt-1 mr-3">
                                                                        <span class="badge badge-pill badge-primary">'. $appointment->status .'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="media mr-4 mb-4">
                                                                    <div class="mr-3 mt-1 ml-3">
                                                                        <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <strong>' . $service_category_group . '</strong>
                                                                        <div class="row">
                                                                            <div class="col-md-10 mb-3">
                                                                                <small class="text-muted">' . $services . '</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="media mr-4 mb-4">
                                                                    <div class="mr-3 mt-1 ml-3">
                                                                        <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <strong>' . $appointment->remarks . '</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="timelineleft-footer border-top bg-light">
                                                            <div class="d-flex align-items-center mt-auto">
                                                                <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor_details->img_url .')"></div>
                                                                <div>
                                                                    <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                    <small class="d-block text-muted">' . $appointment_spec . '</small>
                                                                </div>
                                                                <div class="ml-auto mr-3 text-right">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12">
                                                                            <strong>'. $hospital_details->name .'</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12">
                                                                            <small>'. $branch_name .'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>';
        }

        foreach ($data['prescriptions'] as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            $prescription_specialty = [];
            $prescription_doctor_specialty_explode = explode(',', $doctor_details->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($prescription->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($prescription_doctor_specialty_explode as $prescription_doctor_specialty) {
                $prescription_specialties = $this->specialty_model->getSpecialtyById($prescription_doctor_specialty)->display_name_ph;
                $prescription_specialty[] = '<span class="badge badge-light badge-pill">'. $prescription_specialties .'</span>';
            }

            $prescription_spec = implode(' ', $prescription_specialty);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }

            if (!empty($prescription->medicine)) {
                $medicine = explode('###', $prescription->medicine);
                $medss = '';
                foreach($medicine as $key => $value) {
                    $single_medicine = explode('***', $value);
                    $med_model = $this->medicine_model->getMedicineById($single_medicine[0]);
                        $meds = '<div class="form-group">
                                    <div class="media mr-4 mb-4">
                                        <div class="mr-3 mt-1 ml-3">
                                            <i class="fa fa-medkit fa-2x text-primary"></i>
                                        </div>
                                        <div class="media-body">
                                            <strong>'. $med_model->generic .'</strong> ( '. $med_model->name .' ) '. $single_medicine[1] .'
                                            <div class="row">
                                                <div class="col-md-10 mb-3">
                                                    <small class="text-muted"> Sig: '.  $single_medicine[3] .'</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-auto mt-1 mr-3">
                                            <span class="badge badge-pill badge-primary">Quantity: '. $single_medicine[2] .'</span>
                                        </div>
                                    </div>
                                </div>';
                        $medss .= $meds;
                }
                $all_meds = $medss;
            } else {
                $all_meds = '';
            }
            

            if (!empty($prescription->prescription_date)) {
                $timeline[strtotime($prescription->prescription_date.' UTC') + 2] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($prescription->prescription_date.' UTC')) . '</span></li>
                                                        <li><i class="fa fa-download bg-cyan"></i>
                                                        <div class="timelineleft-item">
                                                            <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($prescription->prescription_date.' UTC')), 3) . '</span>
                                                            <h3 class="timelineleft-header"><span>' . lang('prescription') . '</span></h3>
                                                            <div class="timelineleft-body">
                                                                '. $all_meds .'
                                                                <a class="btn btn-info btn-xs btn_width" href="prescription/viewPrescription?id=' . $prescription->prescription_number . '" target="_blank"><i class="fa fa-eye"></i>' .' '. lang('view') .  ' </a>
                                                            </div>
                                                            <div class="timelineleft-footer border-top bg-light">
                                                                <div class="d-flex align-items-center mt-auto">
                                                                    <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor_details->img_url .')"></div>
                                                                    <div>
                                                                        <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                        <small class="d-block text-muted">' . $prescription_spec . '</small>
                                                                    </div>
                                                                    <div class="ml-auto mr-3 text-right">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <strong>'. $hospital_details->name .'</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <small>'. $branch_name .'</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></li>';
            } else {
                '';
            }
        }

        foreach ($data['labrequests'] as $labrequest) {

            $labtests = $this->labrequest_model->getLabrequestByLabrequestNumber($labrequest->lab_request_number);
            $labtestdata = '';
            foreach ($labtests as $labtest) {
                $labrequest_text = $labtest->long_common_name;
                if (empty($labrequest_text)) {
                    $labrequest_text = $labtest->lab_request_text;
                }

                $labloinc = 'Loinc Number '.$labtest->loinc_num;
                if (empty($labtest->loinc_num)) {
                    $labloinc = '';
                }

                $labtestsingle = '<div class="mb-3"><p class="mb-0"><strong>'.$labrequest_text.'</strong></p><p class="mb-0">'.$labtest->instructions.'</p><p class="mb-0">'.$labloinc.'</p></div>';
                $labtestdata .= $labtestsingle;
            }
            $alltest = $labtestdata;

            $doctor = $this->doctor_model->getDoctorById($labrequest->doctor_id);
            $labrequest_specialty = [];
            $labrequest_doctor_specialty_explode = explode(',', $doctor->specialties);

            foreach($labrequest_doctor_specialty_explode as $labrequest_doctor_specialty) {
                $labrequest_specialties = $this->specialty_model->getSpecialtyById($labrequest_doctor_specialty)->display_name_ph;
                $labrequest_specialty[] = '<span class="badge badge-light badge-pill">'. $labrequest_specialties .'</span>';
            }

            $labrequest_spec = implode(' ', $labrequest_specialty);

            $hospital_details = $this->hospital_model->getHospitalById($labrequest->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }

            if(!empty($labrequest->created_at)) {
                $timeline[strtotime($labrequest->created_at.' UTC') + 7] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($labrequest->created_at.' UTC')) . '</span></li>
                                                        <li><i class="fa fa-download bg-cyan"></i>
                                                        <div class="timelineleft-item">
                                                            <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($labrequest->created_at.' UTC')), 3) . '</span>
                                                            <h3 class="timelineleft-header"><span>' . lang('lab').' '.lang('request') . '</span></h3>
                                                            <div class="timelineleft-body">
                                                                '. $alltest .'
                                                                <a class="btn btn-info btn-xs btn_width" href="labrequest/labrequestView?id=' . $labrequest->lab_request_number . '" target="_blank"><i class="fa fa-eye"></i>' .' '. lang('view') .  ' </a>
                                                            </div>
                                                            <div class="timelineleft-footer border-top bg-light">
                                                                <div class="d-flex align-items-center mt-auto">
                                                                    <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor->img_url .')"></div>
                                                                    <div>
                                                                        <p class="font-weight-semibold mb-1">'. $doctor->name .'</p>
                                                                        <small class="d-block text-muted">'. $labrequest_spec .'</small>
                                                                    </div>
                                                                    <div class="ml-auto mr-3 text-right">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <strong>'. $hospital_details->name .'</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <small>'. $branch_name .'</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></li>';
            } else {
                '';
            }
        }

        foreach ($data['labs'] as $lab) {

            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            $lab_specialty = [];
            $lab_doctor_specialty_explode = explode(',', $doctor_details->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($prescription->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($lab_doctor_specialty_explode as $lab_doctor_specialty) {
                $lab_specialties = $this->specialty_model->getSpecialtyById($lab_doctor_specialty)->display_name_ph;
                $lab_specialty[] = '<span class="badge badge-light badge-pill">'. $lab_specialties .'</span>';
            }

            if (!empty($lab_specialty)) {
                $lab_spec = implode(' ', $lab_specialty);
            } else {
                $lab_spec = "N/A";
            }
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = '';
            }

            
            if (!empty($lab->lab_date)) {
                $timeline[strtotime($lab->lab_date.' UTC') + 3] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($lab->lab_date.' UTC')) . '</span></li>
                                            <li>
                                                <i class="fa fa-envelope bg-primary"></i>
                                                <div class="timelineleft-item">
                                                    <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($lab->lab_date.' UTC')), 3) . '</span>
                                                    <h3 class="timelineleft-header"><span>Lab</span></h3>
                                                    <div class="timelineleft-body">
                                                        <h4><i class=" fa fa-calendar"></i> ' . date('d-m-Y', strtotime($lab->lab_date.' UTC')) . '</h4>
                                                        <a class="btn btn-xs btn-info" title="Lab" style="color: #fff;" href="lab/invoice?id=' . $lab->id . '" target="_blank"><i class="fa fa-file-text"></i> ' . lang('view') . '</a>
                                                    </div>
                                                    <div class="timelineleft-footer border-top bg-light">
                                                        <div class="d-flex align-items-center mt-auto">
                                                            <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor_details->img_url .')"></div>
                                                            <div>
                                                                <p class="font-weight-semibold mb-1">'. $lab_doctor .'</p>
                                                                <small class="d-block text-muted">' . $lab_spec . '</small>
                                                            </div>
                                                            <div class="ml-auto mr-3 text-right">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <strong>'. $hospital_details->name .'</strong>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <small>'. $branch_name .'</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div>
                                                                    <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
            } else {
                '';
            }
        }

        foreach ($data['medical_histories'] as $medical_history) {
            $specialty = [];
            $case_doctor = $this->doctor_model->getDoctorById($medical_history->doctor_id);
            $doctor_specialty_explode = explode(',', $case_doctor->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($medical_history->hospital_id);
            $branch_name = $this->branch_model->getBranchById($medical_history->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($doctor_specialty_explode as $doctor_specialty) {
                $specialties = $this->specialty_model->getSpecialtyById($doctor_specialty)->display_name_ph;
                $specialty[] = '<span class="badge badge-light badge-pill">'. $specialties .'</span>';
            }

            $spec = implode(' ', $specialty);


            if (!empty($case_doctor)) {
                $doctor_name = $case_doctor->name;
            } else {
                $doctor_name = '';
            }
            
            if (!empty($medical_history->case_date)) {
                $timeline[strtotime($medical_history->case_date.' UTC') + 4] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($medical_history->case_date.' UTC')) . '</span></li>
                                                        <li>
                                                            <i class="fa fa-download bg-info"></i>
                                                            <div class="timelineleft-item">
                                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($medical_history->case_date.' UTC')), 3) . '</span>
                                                                <h3 class="timelineleft-header"><span>' . lang('case_history') . '</span></h3>
                                                                <div class="timelineleft-body">
                                                                    <h6>'. lang('clinical') . ' ' . lang('impression') .' / '. lang('diagnosis') .'</h6>
                                                                    <div class="text-muted h6 mb-5">'. $medical_history->title .'</div>
                                                                    <h6>'. lang('case') . ' ' . lang('summary') .'</h6>
                                                                    <div class="text-muted h6">'. $medical_history->description .'</div>
                                                                </div>
                                                                <div class="timelineleft-footer border-top bg-light">
                                                                    <div class="d-flex align-items-center mt-auto">
                                                                        <div class="avatar brround avatar-md mr-3" style="background-image: url('. $case_doctor->img_url .')"></div>
                                                                        <div>
                                                                            <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                            <small class="d-block text-muted">' . $spec . '</small>
                                                                        </div>
                                                                        <div class="ml-auto mr-3 text-right">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <strong>'. $hospital_details->name .'</strong>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <small>'. $branch_name .'</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div>
                                                                                <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>';
            } else {
                '';
            }
        }

        foreach ($data['patient_materials'] as $patient_material) {
            $document_uploader = $this->profile_model->getProfileById($patient_material->created_user_id)->username;
            $uploader_user_group = $this->profile_model->getUsersGroupsById($patient_material->created_user_id);
            $uploader_acc_type = $this->profile_model->getGroupsById($uploader_user_group->group_id)->name;
            $hospital_details = $this->hospital_model->getHospitalById($patient_material->hospital_id);
            $img = $this->getUploaderImage($uploader_acc_type, $patient_material->created_user_id);

            if ($uploader_acc_type === 'Doctor') {
                $user_details = $this->doctor_model->getDoctorByIonUserId($patient_material->created_user_id);
                $img = $user_details->img_url;
                $user_specialty = [];
                $material_doctor_specialty_explode = explode(',', $user_details->specialties);
                
                foreach($material_doctor_specialty_explode as $material_doctor_specialty) {
                    $material_specialties = $this->specialty_model->getSpecialtyById($material_doctor_specialty)->display_name_ph;
                    $user_specialty[] = '<span class="badge badge-light badge-pill">'. $material_specialties .'</span>';
                }

                if (!empty($user_specialty)) {
                    $user_spec = implode(' ', $user_specialty);
                } else {
                    $user_spec = "N/A";
                }
            } else {
                $user_spec = $uploader_acc_type;
            }

            if ($uploader_acc_type === 'Patient') {
                $hospital = '';
            } else {
                $hospital = '<div class="ml-auto mr-3 text-right">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <strong>'. $hospital_details->name .'</strong>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                </div>
                            </div>';
            }

            $document_date_time = $patient_material->last_modified;
            if (empty($document_date_time)) {
                $document_date_time = $patient_material->created_at;
            }
            if (!empty($patient_material->created_at)) {
                $timeline[strtotime($document_date_time.' UTC') + 5] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($document_date_time.' UTC')) . ' </span></li>
                                                            <li>
                                                                <i class="fa fa-download bg-secondary"></i>
                                                                <div class="timelineleft-item">
                                                                    <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($document_date_time.' UTC')), 3) . ' </span>
                                                                    <h3 class="timelineleft-header"><span>' . lang('documents') . '</span></h3>
                                                                    <div class="timelineleft-body">
                                                                        <div class="form-group">
                                                                            <div class="media mr-4 mb-4">
                                                                                <div class="mr-3 mt-1 ml-3">
                                                                                    <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <strong>' . $patient_material->title . '</strong>
                                                                                    <div class="row">
                                                                                        <div class="col-md-10 mb-3">
                                                                                            <small class="text-muted">' . $this->patient_model->getDocumentCategory($patient_material->category_id)->name . '</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="media mr-4 mb-4">
                                                                                <div class="mr-3 mt-1 ml-3">
                                                                                    <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <strong>' . $patient_material->description . '</strong>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="media mr-4 mb-4">
                                                                                <img src="'. $patient_material->url .'" width="150" height="150"/>
                                                                            </div>
                                                                        </div>
                                                                        <a class="btn btn-sm btn-primary" title="' . lang('view') . '" style="color: #fff;" href="' . $patient_material->url . '" target="_blank"><i class="fa fa-file-text"></i>' . ' ' . lang('view') . '</a>
                                                                        <a class="btn btn-sm btn-outline-primary text-primary" title="' . lang('download') . '" style="color: #fff;" href="' . $patient_material->url . '" download=""><i class="fa fa-file-text"></i>' . ' ' . lang('download') . '</a>
                                                                    </div>
                                                                    <div class="timelineleft-footer border-top bg-light">
                                                                        <div class="d-flex align-items-center mt-auto">
                                                                            <div class="avatar brround avatar-md mr-3" style="background-image: url('. $img .')"></div>
                                                                            <div>
                                                                                <p class="font-weight-semibold mb-1">'. $document_uploader .'</p>
                                                                                <small class="d-block text-muted">'. $user_spec .'</small>
                                                                            </div>
                                                                            '. $hospital .'
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>';
            } else {
                '';
            }

        }

        foreach ($data['diagnosis'] as $diag) {

            $diagtests = $this->diagnosis_model->getPatientDiagnosisByNumber($diag->patient_diagnosis_number);
            $diagtestdata = '';

            foreach ($diagtests as $diagtest) {
                $diagnosis_text = $diagtest->diagnosis_long_description;
                if (empty($diagnosis_text)) {
                    $diagnosis_text = $diagtest->patient_diagnosis_text;
                }

                $diagnosis_code = 'ICD10 Code '.$diagtest->diagnosis_code;
                if (empty($diagtest->diagnosis_code)) {
                    $diagnosis_code = '';
                }

                $is_primary = $diagtest->is_primary_diagnosis;
                if ($is_primary == 1) {
                    $primary = '<span class="badge badge-primary badge-pill ml-3">Primary</span>';
                } else {
                    $primary = '';
                }

                $diagnosis_single = '<div class="mb-3"><p class="mb-0"><strong>'.$diagnosis_text.'</strong>'.$primary.'</p><p class="mb-0">'.$diagtest->diagnosis_notes.'</p><p class="mb-0">'.$diagnosis_code.'</p></div>';
                $diagtestdata .= $diagnosis_single;
            }
            $alltest = $diagtestdata;

            $doctor = $this->doctor_model->getDoctorById($diag->doctor_id);
            $diagnosis_specialty = [];
            $diagnosis_doctor_specialty_explode = explode(',', $doctor->specialties);

            foreach($diagnosis_doctor_specialty_explode as $diagnosis_doctor_specialty) {
                $diagnosis_specialties = $this->specialty_model->getSpecialtyById($diagnosis_doctor_specialty)->display_name_ph;
                $diagnosis_specialty[] = '<span class="badge badge-light badge-pill">'. $diagnosis_specialties .'</span>';
            }

            $diagnosis_spec = implode(' ', $diagnosis_specialty);

            $hospital_details = $this->hospital_model->getHospitalById($diag->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }

            if (!empty($diag->created_at)) {
                $timeline[strtotime($diag->created_at.' UTC') + 6] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($diag->created_at.' UTC')) . '</span></li>
                                                        <li><i class="fa fa-download bg-cyan"></i>
                                                        <div class="timelineleft-item">
                                                            <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($diag->created_at.' UTC')), 3) . '</span>
                                                            <h3 class="timelineleft-header"><span>' . lang('diagnosis') . '</span></h3>
                                                            <div class="timelineleft-body">
                                                                '. $alltest .'
                                                            </div>
                                                            <div class="timelineleft-footer border-top bg-light">
                                                                <div class="d-flex align-items-center mt-auto">
                                                                    <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor->img_url .')"></div>
                                                                    <div>
                                                                        <p class="font-weight-semibold mb-1">'. $doctor->name .'</p>
                                                                        <small class="d-block text-muted">'. $diagnosis_spec .'</small>
                                                                    </div>
                                                                    <div class="ml-auto mr-3 text-right">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <strong>'. $hospital_details->name .'</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <small>'. $branch_name .'</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></li>';
            } else {
                '';
            }
        }

        foreach ($data['forms'] as $form) {

            $formspecialty = [];
            $form_doctor = $this->doctor_model->getDoctorById($form->doctor);
            $form_category = $this->form_model->getFormCategoryById($form->category_id)->name;
            $form_doctor_specialty_explode = explode(',', $form_doctor->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($form->hospital_id);
            $branch_name = $this->branch_model->getBranchById($form->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($form_doctor_specialty_explode as $form_doctor_specialty) {
                $formspecialties = $this->specialty_model->getSpecialtyById($form_doctor_specialty)->display_name_ph;
                $formspecialty[] = '<span class="badge badge-light badge-pill">'. $formspecialties .'</span>';
            }

            $formspec = implode(' ', $formspecialty);


            if (!empty($form_doctor)) {
                $doctor_name = $form_doctor->name;
            } else {
                $doctor_name = '';
            }

            if (!empty($form->form_date)) {
                $timeline[strtotime($form->form_date.' UTC') + 6] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($form->form_date.' UTC')) . ' </span></li>
                                                                <li>
                                                                    <i class="fa fa-download bg-secondary"></i>
                                                                    <div class="timelineleft-item">
                                                                        <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($form->form_date.' UTC')), 3) . ' </span>
                                                                        <h3 class="timelineleft-header"><span>' . lang('forms') . '</span></h3>
                                                                        <div class="timelineleft-body">
                                                                            <div class="form-group">
                                                                                <div class="media mr-4 mb-4">
                                                                                    <div class="mr-3 mt-1 ml-3">
                                                                                        <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                                    </div>
                                                                                    <div class="media-body">
                                                                                        <strong>' . $form->name . '</strong>
                                                                                        <div class="row">
                                                                                            <div class="col-md-10 mb-3">
                                                                                                <small class="text-muted">' . $form_category . '</small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ml-3"><a class="btn btn-info btn-xs btn_width" href="form/formView?id=' . $form->form_number . '" target="_blank"><i class="fa fa-eye"></i>' .' '. lang('view') .  ' </a></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="timelineleft-footer border-top bg-light">
                                                                            <div class="d-flex align-items-center mt-auto">
                                                                                <div class="avatar brround avatar-md mr-3" style="background-image: url('. $form_doctor->img_url .')"></div>
                                                                                <div>
                                                                                    <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                                    <small class="d-block text-muted">' . $formspec . '</small>
                                                                                </div>
                                                                                <div class="ml-auto mr-3 text-right">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <strong>'. $hospital_details->name .'</strong>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <small>'. $branch_name .'</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div>
                                                                                        <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>';
            } else {
                '';
            }
        }

        foreach ($data['encounters'] as $encounter) {

            $encounter_doctor_details = $this->doctor_model->getDoctorByIonUserId($encounter->rendering_staff_id);
            $encounter_doctor_profile_image = $this->getPatientProfileImageByIonUserId($encounter->created_user_id);
            $encounter_doctor_profile_name = $this->getPatientProfileNameByIonUserId($encounter->created_user_id);
            $encounter_appointment = $this->appointment_model->getAppointmentById($encounter->appointment_id);
            // $encounter_appointment_time = date('H:i', strtotime($encounter->waiting_started.' UTC'));
            $encounter_appointment_time = $encounter_appointment->s_time . ' to ' . $encounter_appointment->e_time;
            

            $hospital_details = $this->hospital_model->getHospitalById($encounter->hospital_id);
            $branch_name = $this->branch_model->getBranchById($encounter->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            $encounter_specialty = [];
            $encounter_doctor_specialty_explode = explode(',', $encounter_doctor_details->specialties);
            foreach($encounter_doctor_specialty_explode as $encounter_doctor_specialty) {
                $encounter_specialties = $this->specialty_model->getSpecialtyById($encounter_doctor_specialty)->display_name_ph;
                $encounter_specialty[] = '<span class="badge badge-light badge-pill">'. $encounter_specialties .'</span>';
            }

            $group_id = $this->db->get_where('users_groups', array('user_id' => $encounter->created_user_id))->row()->group_id;
            $group_name = $this->db->get_where('groups', array('id' => $group_id))->row()->name;
            if ($group_name === 'Doctor') {
                $encounter_spec = implode(' ', $encounter_specialty);
            } else {
                $encounter_spec = ucfirst($group_name);
            }
            
            
            if (!empty($encounter_appointment)) {
                $encounter_appointment_service_group = $this->appointment_model->getServiceCategoryById($encounter_appointment->service_category_group_id)->display_name;
                $encounter_services = $this->finance_model->getPaymentCategoryById($encounter_appointment->service_id)->description;
                $encounter_appointment_date = date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($encounter_appointment->appointment_date.' UTC'));
                if (!empty($encounter->started_at)) {
                    $encounter_started_date = date('F j, Y H:i A', strtotime($encounter->started_at.' UTC'));
                } else {
                    $encounter_started_date = "_______";
                }
                if (!empty($encounter->ended_at)) {
                    $encounter_ended_date = date('F j, Y H:i A', strtotime($encounter->ended_at.' UTC'));
                } else {
                    $encounter_ended_date = "_______";
                }
                $appointment_date = '<div class="form-group">
                                        <div class="media mr-4 mb-4">
                                            <div class="mr-3 mt-1 ml-3">
                                                <i class="fa fa-calendar fa-2x text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <strong>' . $encounter_appointment_date . '</strong>
                                                <div class="row">
                                                    <div class="col-md-10 mb-3">
                                                        <small class="text-muted">'. $encounter_appointment_time .'</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                $encounter_appointment_details = '<div class="form-group">
                                                    <div class="media mr-4 mb-4">
                                                        <div class="mr-3 mt-1 ml-3">
                                                            <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <strong>'. $encounter_appointment_service_group .'</strong>
                                                            <div class="row">
                                                                <div class="col-md-10 mb-3">
                                                                    <small class="text-muted">' . $encounter_services . '</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto mt-1 mr-3">
                                                            <span class="badge badge-pill badge-primary"></span>
                                                        </div>
                                                    </div>
                                                </div>';
                $encounter_date = '<div class="form-group">
                                        <div class="media mr-4 mb-4">
                                            <div class="mr-3 mt-1 ml-3">
                                                <i class="fa fa-calendar fa-2x text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <strong>' . lang("started") . ': ' . $encounter_started_date . '</strong><br>
                                                <strong>' . lang("ended") . ': ' . $encounter_ended_date . '</strong>
                                            </div>
                                        </div>
                                    </div>';
                $encounter_number_type_group = "<div class='form-group'>
                                                    <div class='media mr-4 mb-4'>
                                                        <div class='mr-3 mt-1 ml-3'>
                                                            <i class='fa fa-file-text-o fa-2x text-primary'></i>
                                                        </div>
                                                        <div class='media-body'>
                                                            <strong>". $this->encounter_model->getEncounterTypeById($encounter->encounter_type_id)->display_name ."</strong>
                                                            <div class='row'>
                                                                <div class='col-md-10 mb-3'>
                                                                    <small class='text-muted'>No Appointment</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='ml-auto mt-1 mr-3'>
                                                            <span class='badge badge-pill badge-primary'>" . $this->encounter_model->getEncounterStatusById($encounter->encounter_status)->display_name . "</span>
                                                        </div>
                                                    </div>
                                                </div>";
            } else {
                $encounter_appointment_service_group = "No Appointment";
                $encounter_services = "No Appointment";
                if (!empty($encounter->started_at)) {
                    $encounter_started_date = date('F j, Y H:i A', strtotime($encounter->started_at.' UTC'));
                } else {
                    $encounter_started_date = "_______";
                }
                if (!empty($encounter->ended_at)) {
                    $encounter_ended_date = date('F j, Y H:i A', strtotime($encounter->ended_at.' UTC'));
                } else {
                    $encounter_ended_date = "_______";
                }
                $encounter_appointment_time = "No Appointment";
                $encounter_number_type_group = "<div class='form-group'>
                                                    <div class='media mr-4 mb-4'>
                                                        <div class='mr-3 mt-1 ml-3'>
                                                            <i class='fa fa-file-text-o fa-2x text-primary'></i>
                                                        </div>
                                                        <div class='media-body'>
                                                            <strong>". $this->encounter_model->getEncounterTypeById($encounter->encounter_type_id)->display_name ."</strong>
                                                            <div class='row'>
                                                                <div class='col-md-10 mb-3'>
                                                                    <small class='text-muted'>No Appointment</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='ml-auto mt-1 mr-3'>
                                                            <span class='badge badge-pill badge-primary'>" . $this->encounter_model->getEncounterStatusById($encounter->encounter_status)->display_name . "</span>
                                                        </div>
                                                    </div>
                                                </div>";
                // $encounter_ending_time = 'to _______';
                $encounter_date = '<div class="form-group">
                                        <div class="media mr-4 mb-4">
                                            <div class="mr-3 mt-1 ml-3">
                                                <i class="fa fa-calendar fa-2x text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <strong>' . lang("started") . ': ' . $encounter_started_date . '</strong><br>
                                                <strong>' . lang("ended") . ': ' . $encounter_ended_date . '</strong>
                                            </div>
                                        </div>
                                    </div>';
            }
            if (!empty($encounter_doctor_details)) {
                $encounter_doctor = $encounter_doctor_details->name;
            } else {
                $encounter_doctor = '';
            }

            
            if (!empty($encounter->created_at)) {
                $timeline[strtotime($encounter->created_at.' UTC') + 3] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($encounter->created_at.' UTC')) . '</span></li>
                                            <li>
                                                <i class="fa fa-envelope bg-primary"></i>
                                                <div class="timelineleft-item">
                                                    <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($encounter->created_at.' UTC')), 3) . '</span>
                                                    <h3 class="timelineleft-header"><span>' . lang('encounter') . '</span></h3>
                                                    <div class="timelineleft-body">
                                                        '. $encounter_appointment_details .'
                                                        '. $encounter_number_type_group .'
                                                        '. $appointment_id .'
                                                        '. $appointment_date .'
                                                        '. $encounter_date .'
                                                        <div class="form-group">
                                                            <div class="media mr-4 mb-4">
                                                                <div class="mr-3 mt-1 ml-3">
                                                                    <i class="fa fa-file fa-2x text-primary"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <strong>'. $encounter->reason .'</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timelineleft-footer border-top bg-light">
                                                        <div class="d-flex align-items-center mt-auto">
                                                            <div class="avatar brround avatar-md mr-3" style="background-image: url('. $encounter_doctor_profile_image .')"></div>
                                                            <div>
                                                                <p class="font-weight-semibold mb-1">'. $encounter_doctor_profile_name .'</p>
                                                                <small class="d-block text-muted">' . $encounter_spec . '</small>
                                                            </div>
                                                            <div class="ml-auto mr-3 text-right">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <strong>'. $hospital_details->name .'</strong>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <small>'. $branch_name .'</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div>
                                                                    <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
            } else {
                '';
            }
        }

        if (!empty($timeline)) {
            $data['timeline'] = $timeline;
        }
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('medical_historyv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function getPatientProfileImageByIonUserId($ion) {
        $group_id = $this->db->get_where('users_groups', array('user_id' => $ion))->row()->group_id;
        $group_name = $this->db->get_where('groups', array('id' => $group_id))->row()->name;
        $group_name = strtolower($group_name);
        $user = $this->db->get_where($group_name, array('ion_user_id' => $ion))->row();
        $this->hospital_id = $user->hospital_id;
        $this->timezone = $this->db->get_where('settings', array('hospital_id' => $this->hospital_id))->row()->timezone;
        if (empty($user->img_url)) {
            $profile_img_url = 'public/assets/images/users/placeholder.jpg';
        } else {
            $profile_img_url = $user->img_url;
        }

        return $profile_img_url;
    }

    function getPatientProfileNameByIonUserId($ion) {
        $group_id = $this->db->get_where('users_groups', array('user_id' => $ion))->row()->group_id;
        $group_name = $this->db->get_where('groups', array('id' => $group_id))->row()->name;
        $group_name = strtolower($group_name);
        $user = $this->db->get_where($group_name, array('ion_user_id' => $ion))->row();
        $this->hospital_id = $user->hospital_id;
        $this->timezone = $this->db->get_where('settings', array('hospital_id' => $this->hospital_id))->row()->timezone;
        if (empty($user->name)) {
            $profile_img_url = 'public/assets/images/users/placeholder.jpg';
        } else {
            $profile_img_url = $user->name;
        }

        return $profile_img_url;
    }
    
    function getUploaderImage($uploader_acc_type, $user_id) {
        if ($uploader_acc_type === "Doctor") {
            $image = $this->doctor_model->getDoctorByIonUserId($user_id)->img_url;
        } else if ($uploader_acc_type === "Nurse") {
            $image = $this->nurse_model->getNurseByIonUserId($user_id)->img_url;
        } else if ($uploader_acc_type === "Pharmacist") {
            $image = $this->pharmacist_model->getPharmacistByIonUserId($user_id)->img_url;
        } else if ($uploader_acc_type === "Laboratorist") {
            $image = $this->laboratorist_model->getLaboratoristByIonUserId($user_id)->img_url;
        } else if ($uploader_acc_type === "Accountant") {
            $image = $this->accountant_model->getAccountantByIonUserId($user_id)->img_url;
        } else if ($uploader_acc_type === "Receptionist") {
            $image = $this->receptionist_model->getReceptionistByIonUserId($user_id)->img_url;
        } else if ($uploader_acc_type === "CompanyUser") {
            $image = $this->companyuser_model->getCompanyUserByIonUserId($user_id)->img_url;
        } else if ($uploader_acc_type === "Patient") {
            $image = $this->patient_model->getPatientByIonUserId($user_id)->img_url;
        }

        return $image;
    }

    function editMedicalHistoryByJason() {
        $id = $this->input->get('id');
        $data['medical_history'] = $this->patient_model->getMedicalHistoryById($id);
        $data['datetime'] = date('F j, Y h:i A' ,strtotime($data['medical_history']->case_date.' UTC'));
        $data['patient'] = $this->patient_model->getPatientById($data['medical_history']->patient_id);
        echo json_encode($data);
    }

    function getCaseDetailsByJason() {
        $id = $this->input->get('id');
        $data['case'] = $this->patient_model->getMedicalHistoryById($id);
        $data['date'] = date('F d, Y' ,strtotime($data['case']->case_date.' UTC'));
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
        $encounter = $this->input->post('encounter_id');
        $rendering_doctor_id = $this->input->post('rendering_doctor');
        $rendering_user_id = $this->input->post('rendering_user');
        $title = $this->input->post('title');
        $patient_id = $this->input->post('patient');
        $img_url = $this->input->post('img_url');
        $description = $this->input->post('description');
        $category = $this->input->post('category');
        $redirect = $this->input->post('redirect');
        $date = gmdate('Y-m-d H:i:s');
        $id = $this->input->post('id');

        do {
            $raw_document_number = 'M'.random_string('alnum', 6);
            $validate_number = $this->patient_model->validateDocumentNumber($raw_document_number);
        } while($validate_number != 0);

        $document_number = strtoupper($raw_document_number);

        if ($this->ion_auth->in_group(array('Patient'))) {
            if (empty($patient_id)) {
                $current_patient = $this->ion_auth->get_user_id();
                $patient_id = $this->patient_model->getPatientByIonUserId($current_patient)->id;
            }
        } else {
            $current_user = $this->ion_auth->get_user_id();
        }


        if (empty($redirect)) {
            $redirect = "patient/documents";
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');

        // Validating Patient Field
        if (!$this->ion_auth->in_group(array('Patient'))) {
            $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }

        $this->form_validation->set_rules('title', 'Document Title', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('description', 'Document Description', 'trim|min_length[1]|max_length[300]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if ($this->ion_auth->in_group(array('Patient'))) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $patient_ion_id = $this->ion_auth->get_user_id();
                $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
                $data['files'] = $this->patient_model->getPatientMaterialByPatientId($patient_id);
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('my_documentsv2', $data);
                // $this->load->view('home/footer'); // just the footer file
            } elseif ($this->ion_auth->in_group(array('admin' ,'Doctor', 'Nurse', 'Laboratorist', 'Receptionist'))) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $this->session->set_flashdata('error_list', validation_errors());

                if (!empty($redirect)) {
                    redirect($redirect);    
                }
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('documentsv2');
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
                'encrypt_name' => TRUE,
                'upload_path' => "./uploads/document",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False,
                'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "2000",
                'max_width' => "2000"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if (empty($id)) {
                if ($this->upload->do_upload('img_url')) {
                    $path = $this->upload->data();
                    $img_url = "uploads/document/" . $path['file_name'];
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
                        'encounter_id' => $encounter,
                        'rendering_doctor_id' => $rendering_doctor_id,
                        'rendering_staff_id' => $rendering_user_id,
                        'patient_document_number' => $document_number,
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
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('my_documentsv2', $data);
                        // $this->load->view('home/footer'); // just the footer file
                    } elseif ($this->ion_auth->in_group(array('admin' ,'Doctor', 'Nurse', 'Laboratorist', 'Receptionist'))) {
                        $this->session->set_flashdata('error', lang('validation_error'));

                        if (!empty($redirect)) {
                            redirect($redirect);
                        }
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('documentsv2');
                    } else {
                        redirect('home/permission');
                    }
                }

            } else {
                $data = array(
                    'last_modified' => $date,
                    'title' => $title,
                    'category_id' => $category,
                    'patient' => $patient_id,
                    'patient_name' => $patient_name,
                    'patient_address' => $patient_address,
                    'patient_phone' => $patient_phone,
                    'description' => $description,
                    'rendering_doctor_id' => $rendering_doctor_id,
                    'rendering_staff_id' => $rendering_user_id,
                );

                $this->patient_model->updatePatientMaterial($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));

                redirect($redirect);
            }

        }
    }

    function editUpload() {
        if (!$this->ion_auth->in_group(array('Patient', 'Pharmacist', 'Accountant', 'Doctor', 'CompanyUser', 'admin'))) {
            redirect('home/permission');
        }
        $document_number = $this->input->get('id');
        $document_id = $this->patient_model->getPatientMaterialByDocumentNumber($document_number)->id;
        if (empty($document_id)) {
            redirect('home/permission');
        }
        $data['document'] = $this->patient_model->getPatientMaterialById($document_id);
        $this->load->view('edit_uploadv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function saveUploadEditChanges() {
        if (!$this->ion_auth->in_group(array('Patient', 'Pharmacist', 'Accountant', 'Doctor', 'CompanyUser', 'admin'))) {
            redirect('home/permission');
        }
        $image_json_str = file_get_contents('php://input');
        $image_json_obj = json_decode($image_json_str, true);
        $image_data = $image_json_obj['data'];
        $document_id = $image_json_obj['id'];
        $data['document'] = $this->patient_model->getPatientMaterialById($document_id);
        list($type, $image_data) = explode(';', $image_data);
        list(, $image_data)      = explode(',', $image_data);
        $image_data = base64_decode($image_data);

        if (file_put_contents($data['document']->url, $image_data)) {
            $data = array('last_modified' => gmdate('Y-m-d H:i:s'));
            $this->patient_model->updatePatientMaterial($document_id, $data);
            $this->session->set_flashdata('success', lang('image_saved'));
        }
        redirect('patient/editUpload?id=' . $document_id);
        
        //$this->load->view('home/dashboardv2'); // just the header file
        //$this->load->view('edit_uploadv2', $data);
        // $this->load->view('home/footer'); // just the header file
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
        $document_number = $this->input->get('id');
        $id = $this->patient_model->getPatientMaterialByDocumentNumber($document_number)->id;
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
                    $data['patients'] = $this->patient_model->getPatientListBySearchByDoctorIdByVisitedProviderId($search, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientBySearchByVisitedProviderId($search);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientListByDoctorIdByVisitedProviderId($doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByVisitedProviderId();
                }
            }
        } else {
            if (!empty($search)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientByLimitBySearchByDoctorIdByVisitedProviderId($limit, $start, $search, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByLimitBySearchByVisitedProviderId($limit, $start, $search);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientByLimitByDoctorIdByVisitedProviderId($limit, $start, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByLimitByVisitedProviderId($limit, $start);
                }
                
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['patients'] as $patient) {

            $active_status = $this->db->get_where('users', array('id' => $patient->ion_user_id))->row()->active;
            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Doctor'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                if ($active_status == 1) {
                    $options1 = '';
                } else {
                    $options1 = ' <a class="btn btn-info editbutton" title="' . lang('edit') . '" href="patient/editPatient?id=' . $patient->patient_id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';    
                }
                
            }

            $options2 = '<a class="btn btn-info" title="' . lang('info') . '" style="color: #fff;" href="patient/patientDetails?id=' . $patient->id . '"><i class="fa fa-info"></i> ' . lang('info') . '</a>';

            if (!$this->ion_auth->in_group(array('Laboratorist', 'Receptionist', 'Accountant', 'CompanyUser'))) {
                $options3 = '<a class="btn btn-secondary" title="' . lang('history') . '" style="color: #fff;" href="patient/medicalHistory?id=' . $patient->patient_id . '"><i class="fa fa-stethoscope"></i> ' . lang('history') . '</a>';
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

            if ($this->ion_auth->in_group(array('Doctor','CompanyUser','admin'))) {
                $options8 = '<a class="btn btn-info" href="patient/editIdentification?id='.$patient->patient_id.'">' . lang('edit') . ' ' . lang('identification') . '</a>';
                $options9 = '<a class="btn btn-info" href="patient/editPopulation?id='.$patient->patient_id.'">'. lang('edit') . ' ' . lang('population') . ' ' . lang('census') .'</a>';
            } else {
                $options8 = '';
                $options9 = '';
            }

            $doctorNames = $this->getDoctorList($patient->doctor);


            if ($this->ion_auth->in_group(array('admin'))) {
                $info[] = array(
                    $patient->patient_id,
                    $patient->name,
                    $patient->phone,
                    $doctorNames,
                    $this->settings_model->getSettings()->currency . $this->patient_model->getDueBalanceByPatientId($patient->id),
                    $options1 . ' ' . $options6 . ' ' . $options4 . ' ' . $options5 . ' ' . $options8 . ' ' . $options9,
                        //  $options2
                );
            }

            if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
                $info[] = array(
                    $patient->patient_id,
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
                    $patient->patient_id,
                    $patient->name,
                    $patient->phone,
                    $doctorNames,
                    $options1  . ' ' . $options6 . ' ' . $options3 . ' ' . $options8 . ' ' . $options9,
                        //  $options2
                );
            }

            if ($this->ion_auth->in_group(array('CompanyUser'))) {
                $info[] = array(
                    $patient->patient_id,
                    $patient->name,
                    $patient->phone,
                    $doctorNames,
                    $options8 . ' ' . $options9,
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
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor = $this->doctor_model->getDoctorByIonUserId($this->session->userdata('user_id'))->id;
        }

        if ($limit == -1) {
            if (!empty($search)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientListBySearchByDoctorIdByVisitedProviderId($search, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientBySearchByVisitedProviderId($search);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientListByDoctorIdByVisitedProviderId($doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByVisitedProviderId();
                }
            }
        } else {
            if (!empty($search)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientByLimitBySearchByDoctorIdByVisitedProviderId($limit, $start, $search, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByLimitBySearchByVisitedProviderId($limit, $start, $search);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $data['patients'] = $this->patient_model->getPatientByLimitByDoctorIdByVisitedProviderId($limit, $start, $doctor);
                } else {
                    $data['patients'] = $this->patient_model->getPatientByLimitByVisitedProviderId($limit, $start);
                }
                
            }
        }


        foreach ($data['patients'] as $patient) {

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = ' <a type="button" class="btn btn-info editbutton" title="' . lang('edit') . '" data-toggle = "modal" data-id="' . $patient->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }

            $options2 = '<a class="btn btn-info" title="' . lang('info') . '" style="color: #fff;" href="patient/patientDetails?id=' . $patient->id . '"><i class="fa fa-info"></i> ' . lang('info') . '</a>';

            $options3 = '<a class="btn btn-secondary" title="' . lang('history') . '" style="color: #fff;" href="patient/medicalHistory?id=' . $patient->id . '"><i class="fa fa-stethoscope"></i> ' . lang('history') . '</a>';

            $options4 = '<a class="btn btn-xs btn-success" title="' . lang('payment') . ' ' . lang('history') . '" style="color: #fff;" href="finance/patientPaymentHistory?patient=' . $patient->patient_id . '"><i class="fa fa-money-bill-alt"></i> ' . lang('payment') . ' ' . lang('history') . '</a>';

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options5 = '<a class="btn btn-danger" title="' . lang('delete') . '" href="patient/delete?id=' . $patient->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>';
            }

            $provider = $patient->hospital_id;

            $due = $this->settings_model->getSettings()->currency .' '. $this->patient_model->getDueBalanceByPatientIdByDoctorIdByProviderId($patient->id, $doctor, $provider);

            if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant', 'Receptionist'))) {
                $info[] = array(
                    $patient->patient_id,
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
                $options1 = ' <a href="patient/caselist?id='.$case->case_note_number.'" class="btn btn-info btn-xs btn_width" title="' . lang('edit') . '"><i class="fa fa-edit"> </i> </a>';
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
                date('Y-m-d', strtotime($case->case_date.' UTC')),
                $patient_details,
                $case->title,
                $options3 . ' ' . $options1 . ' ' . $options2
                    // $options4
            );
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('case_note')->num_rows(),
                "recordsFiltered" => $this->db->get('case_note')->num_rows(),
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
        $current_user = $this->ion_auth->get_user_id();

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
                $options4 = '<a type="button" class="btn btn-info editbutton" title="Edit" data-toggle="modal" data-id="'.$document->id.'"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = '<a class="btn btn-info btn-xs" href="' . $document->url . '?m='. $document->last_modified .'" download="'. $document->title .'"> ' . lang('download') . ' </a>';
            }
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options2 = '<a class="btn btn-danger btn-xs delete_button" href="patient/deletePatientMaterial?id=' . $document->patient_document_number . '&redirect=documents"onclick="return confirm(\'You want to delete the item??\');"> <i class="fa fa-trash"></i> </a>';
            }
            if ($document->created_user_id === $current_user) {
                $option3 = '<a class="btn btn-info" href="patient/editUpload?id='. $document->patient_document_number .'" target="_blank"><i class="fa fa-paint-brush"></i></a>';
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

            $created_at = date('Y-m-d', strtotime($document->created_at.' UTC'));

            if (pathinfo($document->url, PATHINFO_EXTENSION) === 'pdf'){
                $info[] = array(
                    $created_at,
                    $patient_details,
                    $document->title,
                    $document->description,
                    '<a class="example-image-link" href="' . $document->url . '" data-title="' . $document->title . '" target="_blank"">' . '<img class="example-image" src="uploads/PDF_DefaultImage.png" width="auto" height="auto" alt="image-1" style="max-width:150px;max-height:150px">' . '</a>',
                    $options1 . ' ' . $options2 . ' ' . $option3 . ' ' . $options4
                        // $options4
                );
            } else {
                $info[] = array(
                    $created_at,
                    $patient_details,
                    $document->title,
                    $document->description,
                    '<a class="example-image-link" href="' . $document->url . '" data-lightbox="example-1" data-title="' . $document->title . '">' . '<img class="example-image" src="' . $document->url . '?m='. $document->last_modified .'" width="auto" height="auto" alt="image-1" style="max-width:150px;max-height:150px">' . '</a>',
                    $options1 . ' ' . $options2 . ' ' . $option3 . ' ' . $options4
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

        $settings = $this->settings_model->getSettings();
        $patient = $this->patient_model->getPatientById($id);
        $appointments = $this->appointment_model->getAppointmentByPatient($patient->id);
        $forms = $this->form_model->getFormByPatientId($id);
        $patients = $this->patient_model->getPatient();
        $doctors = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientId($id);
        $beds = $this->bed_model->getBedAllotmentsByPatientId($id);
        $encounters = $this->encounter_model->getEncounterByPatientId($id);
        //  $orders = $this->order_model->getOrderByPatientId($id);
        $labs = $this->lab_model->getLabByPatientId($id);
        $medical_histories = $this->patient_model->getMedicalHistoryByPatientId($id);
        $patient_materials = $this->patient_model->getPatientMaterialByPatientId($id);
        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByPatient($id);
        $data['labrequests'] = $this->labrequest_model->getLabrequestByPatientId($patient->id);
        $data['vitals'] = $this->patient_model->getPatientVitalById($id);


        foreach ($appointments as $appointment) {
            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
            $hospital_details = $this->hospital_model->getHospitalById($appointment->hospital_id);
            $branch_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            $service_category_group = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $services = $this->finance_model->getPaymentCategoryById($appointment->service_id)->category;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            $appointment_specialty = [];
            $appointment_doctor_specialty_explode = explode(',', $doctor_details->specialties);
            foreach($appointment_doctor_specialty_explode as $appointment_doctor_specialty) {
                $appointment_specialties = $this->specialty_model->getSpecialtyById($appointment_doctor_specialty)->display_name_ph;
                $appointment_specialty[] = '<span class="badge badge-light badge-pill">'. $appointment_specialties .'</span>';
            }

            $appointment_spec = implode(' ', $appointment_specialty);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            

            $timeline[strtotime($appointment->appointment_registration_time.' UTC') + 1] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', $appointment->date) . '</span></li>
                                                <li>
                                                    <i class="fa fa-download bg-success"></i>
                                                    <div class="timelineleft-item">
                                                        <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($appointment->appointment_registration_time.' UTC')), 3) . '</span>
                                                        <h3 class="timelineleft-header"><span>' . lang('appointment') . '</span></h3>
                                                        <div class="timelineleft-body">
                                                            <div class="form-group">
                                                                <div class="media mr-4 mb-4">
                                                                    <div class="mr-3 mt-1 ml-3">
                                                                        <i class="fa fa-calendar fa-2x text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <strong>' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', $appointment->date) . '</strong>
                                                                        <div class="row">
                                                                            <div class="col-md-10 mb-3">
                                                                                <small class="text-muted">' . $appointment->s_time . ' - ' . $appointment->e_time . '</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ml-auto mt-1 mr-3">
                                                                        <span class="badge badge-pill badge-primary">'. $appointment->status .'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="media mr-4 mb-4">
                                                                    <div class="mr-3 mt-1 ml-3">
                                                                        <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <strong>' . $service_category_group . '</strong>
                                                                        <div class="row">
                                                                            <div class="col-md-10 mb-3">
                                                                                <small class="text-muted">' . $services . '</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="media mr-4 mb-4">
                                                                    <div class="mr-3 mt-1 ml-3">
                                                                        <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <strong>' . $appointment->remarks . '</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="timelineleft-footer border-top bg-light">
                                                            <div class="d-flex align-items-center mt-auto">
                                                                <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor_details->img_url .')"></div>
                                                                <div>
                                                                    <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                    <small class="d-block text-muted">' . $appointment_spec . '</small>
                                                                </div>
                                                                <div class="ml-auto mr-3 text-right">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12">
                                                                            <strong>'. $hospital_details->name .'</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12">
                                                                            <small>'. $branch_name .'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>';
        }

        foreach ($data['prescriptions'] as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            $prescription_specialty = [];
            $prescription_doctor_specialty_explode = explode(',', $doctor_details->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($prescription->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($prescription_doctor_specialty_explode as $prescription_doctor_specialty) {
                $prescription_specialties = $this->specialty_model->getSpecialtyById($prescription_doctor_specialty)->display_name_ph;
                $prescription_specialty[] = '<span class="badge badge-light badge-pill">'. $prescription_specialties .'</span>';
            }

            $prescription_spec = implode(' ', $prescription_specialty);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }

            if (!empty($prescription->medicine)) {
                $medicine = explode('###', $prescription->medicine);
                $medss = '';
                foreach($medicine as $key => $value) {
                    $single_medicine = explode('***', $value);
                    $med_model = $this->medicine_model->getMedicineById($single_medicine[0]);
                        $meds = '<div class="form-group">
                                    <div class="media mr-4 mb-4">
                                        <div class="mr-3 mt-1 ml-3">
                                            <i class="fa fa-medkit fa-2x text-primary"></i>
                                        </div>
                                        <div class="media-body">
                                            <strong>'. $med_model->generic .'</strong> ( '. $med_model->name .' ) '. $single_medicine[1] .'
                                            <div class="row">
                                                <div class="col-md-10 mb-3">
                                                    <small class="text-muted"> Sig: '.  $single_medicine[3] .'</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-auto mt-1 mr-3">
                                            <span class="badge badge-pill badge-primary">Quantity: '. $single_medicine[2] .'</span>
                                        </div>
                                    </div>
                                </div>';
                        $medss .= $meds;
                }
                $all_meds = $medss;
            } else {
                $all_meds = '';
            }
            

            if (!empty($prescription->prescription_date)) {
                $timeline[strtotime($prescription->prescription_date.' UTC') + 2] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($prescription->prescription_date.' UTC')) . '</span></li>
                                                        <li><i class="fa fa-download bg-cyan"></i>
                                                        <div class="timelineleft-item">
                                                            <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($prescription->prescription_date.' UTC')), 3) . '</span>
                                                            <h3 class="timelineleft-header"><span>' . lang('prescription') . '</span></h3>
                                                            <div class="timelineleft-body">
                                                                '. $all_meds .'
                                                                <a class="btn btn-info btn-xs btn_width" href="prescription/viewPrescription?id=' . $prescription->prescription_number . '" target="_blank"><i class="fa fa-eye"></i>' .' '. lang('view') .  ' </a>
                                                            </div>
                                                            <div class="timelineleft-footer border-top bg-light">
                                                                <div class="d-flex align-items-center mt-auto">
                                                                    <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor_details->img_url .')"></div>
                                                                    <div>
                                                                        <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                        <small class="d-block text-muted">' . $prescription_spec . '</small>
                                                                    </div>
                                                                    <div class="ml-auto mr-3 text-right">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <strong>'. $hospital_details->name .'</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <small>'. $branch_name .'</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></li>';
            } else {
                '';
            }
        }

        foreach ($data['labrequests'] as $labrequest) {

            $labtests = $this->labrequest_model->getLabrequestByLabrequestNumber($labrequest->lab_request_number);
            $labtestdata = '';
            foreach ($labtests as $labtest) {
                $labrequest_text = $labtest->long_common_name;
                if (empty($labrequest_text)) {
                    $labrequest_text = $labtest->lab_request_text;
                }

                $labloinc = 'Loinc Number '.$labtest->loinc_num;
                if (empty($labtest->loinc_num)) {
                    $labloinc = '';
                }

                $labtestsingle = '<div class="mb-3"><p class="mb-0"><strong>'.$labrequest_text.'</strong></p><p class="mb-0">'.$labtest->instructions.'</p><p class="mb-0">'.$labloinc.'</p></div>';
                $labtestdata .= $labtestsingle;
            }
            $alltest = $labtestdata;

            $doctor = $this->doctor_model->getDoctorById($labrequest->doctor_id);
            $labrequest_specialty = [];
            $labrequest_doctor_specialty_explode = explode(',', $doctor->specialties);

            foreach($labrequest_doctor_specialty_explode as $labrequest_doctor_specialty) {
                $labrequest_specialties = $this->specialty_model->getSpecialtyById($labrequest_doctor_specialty)->display_name_ph;
                $labrequest_specialty[] = '<span class="badge badge-light badge-pill">'. $labrequest_specialties .'</span>';
            }

            $labrequest_spec = implode(' ', $labrequest_specialty);

            $hospital_details = $this->hospital_model->getHospitalById($labrequest->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }

            if(!empty($labrequest->created_at)) {
                $timeline[strtotime($labrequest->created_at.' UTC') + 7] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($labrequest->created_at.' UTC')) . '</span></li>
                                                        <li><i class="fa fa-download bg-cyan"></i>
                                                        <div class="timelineleft-item">
                                                            <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($labrequest->created_at.' UTC')), 3) . '</span>
                                                            <h3 class="timelineleft-header"><span>' . lang('lab').' '.lang('test') . '</span></h3>
                                                            <div class="timelineleft-body">
                                                                '. $alltest .'
                                                                <a class="btn btn-info btn-xs btn_width" href="labrequest/labrequestView?id=' . $labrequest->lab_request_number . '" target="_blank"><i class="fa fa-eye"></i>' .' '. lang('view') .  ' </a>
                                                            </div>
                                                            <div class="timelineleft-footer border-top bg-light">
                                                                <div class="d-flex align-items-center mt-auto">
                                                                    <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor->img_url .')"></div>
                                                                    <div>
                                                                        <p class="font-weight-semibold mb-1">'. $doctor->name .'</p>
                                                                        <small class="d-block text-muted">'. $labrequest_spec .'</small>
                                                                    </div>
                                                                    <div class="ml-auto mr-3 text-right">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <strong>'. $hospital_details->name .'</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <small>'. $branch_name .'</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></li>';
            } else {
                '';
            }
        }

        foreach ($labs as $lab) {

            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            $lab_specialty = [];
            $lab_doctor_specialty_explode = explode(',', $doctor_details->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($prescription->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($lab_doctor_specialty_explode as $lab_doctor_specialty) {
                $lab_specialties = $this->specialty_model->getSpecialtyById($lab_doctor_specialty)->display_name_ph;
                $lab_specialty[] = '<span class="badge badge-light badge-pill">'. $lab_specialties .'</span>';
            }

            if (!empty($lab_specialty)) {
                $lab_spec = implode(' ', $lab_specialty);
            } else {
                $lab_spec = "N/A";
            }
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = '';
            }

            if (!empty($lab->lab_date)) {
                $timeline[strtotime($lab->lab_date.' UTC') + 3] = '<li class="timeleft-label"><span class="bg-danger">' . date($settings->date_format_long?$settings->date_format_long:'F j, Y', strtotime($lab->lab_date.' UTC')) . '</span></li>
                                            <li>
                                                <i class="fa fa-envelope bg-primary"></i>
                                                <div class="timelineleft-item">
                                                    <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($lab->lab_date.' UTC')), 3) . '</span>
                                                    <h3 class="timelineleft-header"><span>Lab</span></h3>
                                                    <div class="timelineleft-body">
                                                        <h4><i class=" fa fa-calendar"></i> ' . date('d-m-Y', strtotime($lab->lab_date.' UTC')) . '</h4>
                                                        <a class="btn btn-xs btn-info" title="Lab" style="color: #fff;" href="lab/invoice?id=' . $lab->id . '" target="_blank"><i class="fa fa-file-text"></i> ' . lang('view') . '</a>
                                                    </div>
                                                    <div class="timelineleft-footer border-top bg-light">
                                                        <div class="d-flex align-items-center mt-auto">
                                                            <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor_details->img_url .')"></div>
                                                            <div>
                                                                <p class="font-weight-semibold mb-1">'. $lab_doctor .'</p>
                                                                <small class="d-block text-muted">' . $lab_spec . '</small>
                                                            </div>
                                                            <div class="ml-auto mr-3 text-right">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <strong>'. $hospital_details->name .'</strong>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <small>'. $branch_name .'</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div>
                                                                    <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
            } else {
                '';
            }

            // $timeline[$lab->date + 3] = '<div class="card-body profile-activity" >
            //                                 <h5 class="pull-left"><span class="label pull-right r-activity">' . lang('lab') . '</span></h5>
            //                                 <h5 class="pull-right">' . date('d-m-Y', $lab->date) . '</h5>
            //                                 <div class="activity pink">
            //                                     <span>
            //                                         <i class="fa fa-flask"></i>
            //                                     </span>
            //                                     <div class="activity-desk">
            //                                         <div class="card col-md-12">
            //                                             <div class="card-body">
            //                                                 <div class="arrow"></div>
            //                                                 <i class=" fa fa-calendar"></i>
            //                                                 <h4>' . date('d-m-Y', $lab->date) . '</h4>
            //                                                 <p></p>
            //                                                  <i class=" fa fa-user-md"></i>
            //                                                     <h4>' . $lab_doctor . '</h4>
            //                                                         <a class="btn btn-xs btn-danger" title="Lab" style="color: #fff;" href="lab/invoice?id=' . $lab->id . '" target="_blank"><i class="fa fa-file-text"></i>' . lang('view') . '</a>
            //                                             </div>
            //                                         </div> 
            //                                     </div>
            //                                 </div>
            //                             </div>';
        }

        foreach ($forms as $form) {

            $formspecialty = [];
            $form_doctor = $this->doctor_model->getDoctorById($form->doctor);
            $form_category = $this->form_model->getFormCategoryById($form->category_id)->name;
            $form_doctor_specialty_explode = explode(',', $form_doctor->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($form->hospital_id);
            $branch_name = $this->branch_model->getBranchById($form->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($form_doctor_specialty_explode as $form_doctor_specialty) {
                $formspecialties = $this->specialty_model->getSpecialtyById($form_doctor_specialty)->display_name_ph;
                $formspecialty[] = '<span class="badge badge-light badge-pill">'. $formspecialties .'</span>';
            }

            $formspec = implode(' ', $formspecialty);


            if (!empty($form_doctor)) {
                $doctor_name = $form_doctor->name;
            } else {
                $doctor_name = '';
            }

            if (!empty($form->form_date)) {
                $timeline[strtotime($form->form_date.' UTC') + 6] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($form->form_date.' UTC')) . ' </span></li>
                                                                <li>
                                                                    <i class="fa fa-download bg-secondary"></i>
                                                                    <div class="timelineleft-item">
                                                                        <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($form->form_date.' UTC')), 3) . ' </span>
                                                                        <h3 class="timelineleft-header"><span>' . lang('forms') . '</span></h3>
                                                                        <div class="timelineleft-body">
                                                                            <div class="form-group">
                                                                                <div class="media mr-4 mb-4">
                                                                                    <div class="mr-3 mt-1 ml-3">
                                                                                        <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                                    </div>
                                                                                    <div class="media-body">
                                                                                        <strong>' . $form->name . '</strong>
                                                                                        <div class="row">
                                                                                            <div class="col-md-10 mb-3">
                                                                                                <small class="text-muted">' . $form_category . '</small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ml-3"><a class="btn btn-info btn-xs btn_width" href="form/formView?id=' . $form->form_number . '" target="_blank"><i class="fa fa-eye"></i>' .' '. lang('view') .  ' </a></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="timelineleft-footer border-top bg-light">
                                                                            <div class="d-flex align-items-center mt-auto">
                                                                                <div class="avatar brround avatar-md mr-3" style="background-image: url('. $form_doctor->img_url .')"></div>
                                                                                <div>
                                                                                    <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                                    <small class="d-block text-muted">' . $formspec . '</small>
                                                                                </div>
                                                                                <div class="ml-auto mr-3 text-right">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <strong>'. $hospital_details->name .'</strong>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12">
                                                                                            <small>'. $branch_name .'</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div>
                                                                                        <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>';
            } else {
                '';
            }
        }

        foreach ($medical_histories as $medical_history) {
            $specialty = [];
            $case_doctor = $this->doctor_model->getDoctorById($medical_history->doctor_id);
            $doctor_specialty_explode = explode(',', $case_doctor->specialties);
            $hospital_details = $this->hospital_model->getHospitalById($medical_history->hospital_id);
            $branch_name = $this->branch_model->getBranchById($medical_history->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            foreach($doctor_specialty_explode as $doctor_specialty) {
                $specialties = $this->specialty_model->getSpecialtyById($doctor_specialty)->display_name_ph;
                $specialty[] = '<span class="badge badge-light badge-pill">'. $specialties .'</span>';
            }

            $spec = implode(' ', $specialty);


            if (!empty($case_doctor)) {
                $doctor_name = $case_doctor->name;
            } else {
                $doctor_name = '';
            }
            
            if (!empty($medical_history->case_date)) {
                $timeline[strtotime($medical_history->case_date.' UTC') + 4] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($medical_history->case_date.' UTC')) . '</span></li>
                                                        <li>
                                                            <i class="fa fa-download bg-info"></i>
                                                            <div class="timelineleft-item">
                                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($medical_history->case_date.' UTC')), 3) . '</span>
                                                                <h3 class="timelineleft-header"><span>' . lang('case_history') . '</span></h3>
                                                                <div class="timelineleft-body">
                                                                    <h6>'. lang('clinical') . ' ' . lang('impression') .' / '. lang('diagnosis') .'</h6>
                                                                    <div class="text-muted h6 mb-5">'. $medical_history->title .'</div>
                                                                    <h6>'. lang('case') . ' ' . lang('summary') .'</h6>
                                                                    <div class="text-muted h6">'. $medical_history->description .'</div>
                                                                </div>
                                                                <div class="timelineleft-footer border-top bg-light">
                                                                    <div class="d-flex align-items-center mt-auto">
                                                                        <div class="avatar brround avatar-md mr-3" style="background-image: url('. $case_doctor->img_url .')"></div>
                                                                        <div>
                                                                            <p class="font-weight-semibold mb-1">'. $doctor_name .'</p>
                                                                            <small class="d-block text-muted">' . $spec . '</small>
                                                                        </div>
                                                                        <div class="ml-auto mr-3 text-right">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <strong>'. $hospital_details->name .'</strong>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <small>'. $branch_name .'</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div>
                                                                                <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>';
            } else {
                '';
            }
        }

        foreach ($patient_materials as $patient_material) {
            $document_uploader = $this->profile_model->getProfileById($patient_material->created_user_id)->username;
            $uploader_user_group = $this->profile_model->getUsersGroupsById($patient_material->created_user_id);
            $uploader_acc_type = $this->profile_model->getGroupsById($uploader_user_group->group_id)->name;
            $hospital_details = $this->hospital_model->getHospitalById($patient_material->hospital_id);
            $img = $this->getUploaderImage($uploader_acc_type, $patient_material->created_user_id);

            if ($uploader_acc_type === 'Doctor') {
                $user_details = $this->doctor_model->getDoctorByIonUserId($patient_material->created_user_id);
                $img = $user_details->img_url;
                $user_specialty = [];
                $material_doctor_specialty_explode = explode(',', $user_details->specialties);
                
                foreach($material_doctor_specialty_explode as $material_doctor_specialty) {
                    $material_specialties = $this->specialty_model->getSpecialtyById($material_doctor_specialty)->display_name_ph;
                    $user_specialty[] = '<span class="badge badge-light badge-pill">'. $material_specialties .'</span>';
                }

                if (!empty($user_specialty)) {
                    $user_spec = implode(' ', $user_specialty);
                } else {
                    $user_spec = "N/A";
                }
            } else {
                $user_spec = $uploader_acc_type;
            }

            if ($uploader_acc_type === 'Patient') {
                $hospital = '';
            } else {
                $hospital = '<div class="ml-auto mr-3 text-right">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <strong>'. $hospital_details->name .'</strong>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                </div>
                            </div>';
            }

            $document_date_time = $patient_material->last_modified;
            if (empty($document_date_time)) {
                $document_date_time = $patient_material->created_at;
            }
            if (!empty($patient_material->created_at)) {
                $timeline[strtotime($document_date_time.' UTC') + 5] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($document_date_time.' UTC')) . ' </span></li>
                                                            <li>
                                                                <i class="fa fa-download bg-secondary"></i>
                                                                <div class="timelineleft-item">
                                                                    <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($document_date_time.' UTC')), 3) . ' </span>
                                                                    <h3 class="timelineleft-header"><span>' . lang('documents') . '</span></h3>
                                                                    <div class="timelineleft-body">
                                                                        <div class="form-group">
                                                                            <div class="media mr-4 mb-4">
                                                                                <div class="mr-3 mt-1 ml-3">
                                                                                    <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <strong>' . $patient_material->title . '</strong>
                                                                                    <div class="row">
                                                                                        <div class="col-md-10 mb-3">
                                                                                            <small class="text-muted">' . $this->patient_model->getDocumentCategory($patient_material->category_id)->name . '</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="media mr-4 mb-4">
                                                                                <div class="mr-3 mt-1 ml-3">
                                                                                    <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <strong>' . $patient_material->description . '</strong>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="media mr-4 mb-4">
                                                                                <img src="'. $patient_material->url .'" width="150" height="150"/>
                                                                            </div>
                                                                        </div>
                                                                        <a class="btn btn-sm btn-primary" title="' . lang('view') . '" style="color: #fff;" href="' . $patient_material->url . '" target="_blank"><i class="fa fa-file-text"></i>' . ' ' . lang('view') . '</a>
                                                                        <a class="btn btn-sm btn-outline-primary text-primary" title="' . lang('download') . '" style="color: #fff;" href="' . $patient_material->url . '" download=""><i class="fa fa-file-text"></i>' . ' ' . lang('download') . '</a>
                                                                    </div>
                                                                    <div class="timelineleft-footer border-top bg-light">
                                                                        <div class="d-flex align-items-center mt-auto">
                                                                            <div class="avatar brround avatar-md mr-3" style="background-image: url('. $img .')"></div>
                                                                            <div>
                                                                                <p class="font-weight-semibold mb-1">'. $document_uploader .'</p>
                                                                                <small class="d-block text-muted">'. $user_spec .'</small>
                                                                            </div>
                                                                            '. $hospital .'
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>';
            } else {
                '';
            }

        }

        foreach ($data['diagnosis'] as $diag) {

            $diagtests = $this->diagnosis_model->getPatientDiagnosisByNumber($diag->patient_diagnosis_number);
            $diagtestdata = '';

            foreach ($diagtests as $diagtest) {
                $diagnosis_text = $diagtest->diagnosis_long_description;
                if (empty($diagnosis_text)) {
                    $diagnosis_text = $diagtest->patient_diagnosis_text;
                }

                $diagnosis_code = 'ICD10 Code '.$diagtest->diagnosis_code;
                if (empty($diagtest->diagnosis_code)) {
                    $diagnosis_code = '';
                }

                $is_primary = $diagtest->is_primary_diagnosis;
                if ($is_primary == 1) {
                    $primary = '<span class="badge badge-primary badge-pill ml-3">Primary</span>';
                } else {
                    $primary = '';
                }

                $diagnosis_single = '<div class="mb-3"><p class="mb-0"><strong>'.$diagnosis_text.'</strong>'.$primary.'</p><p class="mb-0">'.$diagtest->diagnosis_notes.'</p><p class="mb-0">'.$diagnosis_code.'</p></div>';
                $diagtestdata .= $diagnosis_single;
            }
            $alltest = $diagtestdata;

            $doctor = $this->doctor_model->getDoctorById($diag->doctor_id);
            $diagnosis_specialty = [];
            $diagnosis_doctor_specialty_explode = explode(',', $doctor->specialties);

            foreach($diagnosis_doctor_specialty_explode as $diagnosis_doctor_specialty) {
                $diagnosis_specialties = $this->specialty_model->getSpecialtyById($diagnosis_doctor_specialty)->display_name_ph;
                $diagnosis_specialty[] = '<span class="badge badge-light badge-pill">'. $diagnosis_specialties .'</span>';
            }

            $diagnosis_spec = implode(' ', $diagnosis_specialty);

            $hospital_details = $this->hospital_model->getHospitalById($diag->hospital_id);
            $branch_name = $this->branch_model->getBranchById($prescription->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }

            if (!empty($diag->created_at)) {
                $timeline[strtotime($diag->created_at.' UTC') + 6] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($diag->created_at.' UTC')) . '</span></li>
                                                        <li><i class="fa fa-download bg-cyan"></i>
                                                        <div class="timelineleft-item">
                                                            <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($diag->created_at.' UTC')), 3) . '</span>
                                                            <h3 class="timelineleft-header"><span>' . lang('diagnosis') . '</span></h3>
                                                            <div class="timelineleft-body">
                                                                '. $alltest .'
                                                            </div>
                                                            <div class="timelineleft-footer border-top bg-light">
                                                                <div class="d-flex align-items-center mt-auto">
                                                                    <div class="avatar brround avatar-md mr-3" style="background-image: url('. $doctor->img_url .')"></div>
                                                                    <div>
                                                                        <p class="font-weight-semibold mb-1">'. $doctor->name .'</p>
                                                                        <small class="d-block text-muted">'. $diagnosis_spec .'</small>
                                                                    </div>
                                                                    <div class="ml-auto mr-3 text-right">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <strong>'. $hospital_details->name .'</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <small>'. $branch_name .'</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></li>';
            } else {
                '';
            }
        }

        foreach ($encounters as $encounter) {

            $encounter_doctor_details = $this->doctor_model->getDoctorByIonUserId($encounter->rendering_staff_id);
            $encounter_doctor_profile_image = $this->getPatientProfileImageByIonUserId($encounter->created_user_id);
            $encounter_doctor_profile_name = $this->getPatientProfileNameByIonUserId($encounter->created_user_id);
            $encounter_appointment = $this->appointment_model->getAppointmentById($encounter->appointment_id);
            // $encounter_appointment_time = date('H:i', strtotime($encounter->waiting_started.' UTC'));
            $encounter_appointment_time = $encounter_appointment->s_time . ' to ' . $encounter_appointment->e_time;
            

            $hospital_details = $this->hospital_model->getHospitalById($encounter->hospital_id);
            $branch_name = $this->branch_model->getBranchById($encounter->location_id)->display_name;
            if (empty($branch_name)) {
                $branch_name = "Online";
            }
            $encounter_specialty = [];
            $encounter_doctor_specialty_explode = explode(',', $encounter_doctor_details->specialties);
            foreach($encounter_doctor_specialty_explode as $encounter_doctor_specialty) {
                $encounter_specialties = $this->specialty_model->getSpecialtyById($encounter_doctor_specialty)->display_name_ph;
                $encounter_specialty[] = '<span class="badge badge-light badge-pill">'. $encounter_specialties .'</span>';
            }

            $group_id = $this->db->get_where('users_groups', array('user_id' => $encounter->created_user_id))->row()->group_id;
            $group_name = $this->db->get_where('groups', array('id' => $group_id))->row()->name;
            if ($group_name === 'Doctor') {
                $encounter_spec = implode(' ', $encounter_specialty);
            } else {
                $encounter_spec = ucfirst($group_name);
            }
            
            
            if (!empty($encounter_appointment)) {
                $encounter_appointment_service_group = $this->appointment_model->getServiceCategoryById($encounter_appointment->service_category_group_id)->display_name;
                $encounter_services = $this->finance_model->getPaymentCategoryById($encounter_appointment->service_id)->description;
                $encounter_appointment_date = date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($encounter_appointment->appointment_date.' UTC'));
                if (!empty($encounter->started_at)) {
                    $encounter_started_date = date('F j, Y H:i A', strtotime($encounter->started_at.' UTC'));
                } else {
                    $encounter_started_date = "_______";
                }
                if (!empty($encounter->ended_at)) {
                    $encounter_ended_date = date('F j, Y H:i A', strtotime($encounter->ended_at.' UTC'));
                } else {
                    $encounter_ended_date = "_______";
                }
                $appointment_date = '<div class="form-group">
                                        <div class="media mr-4 mb-4">
                                            <div class="mr-3 mt-1 ml-3">
                                                <i class="fa fa-calendar fa-2x text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <strong>' . $encounter_appointment_date . '</strong>
                                                <div class="row">
                                                    <div class="col-md-10 mb-3">
                                                        <small class="text-muted">'. $encounter_appointment_time .'</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                $encounter_appointment_details = '<div class="form-group">
                                                    <div class="media mr-4 mb-4">
                                                        <div class="mr-3 mt-1 ml-3">
                                                            <i class="fa fa-file-text-o fa-2x text-primary"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <strong>'. $encounter_appointment_service_group .'</strong>
                                                            <div class="row">
                                                                <div class="col-md-10 mb-3">
                                                                    <small class="text-muted">' . $encounter_services . '</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto mt-1 mr-3">
                                                            <span class="badge badge-pill badge-primary"></span>
                                                        </div>
                                                    </div>
                                                </div>';
                $encounter_date = '<div class="form-group">
                                        <div class="media mr-4 mb-4">
                                            <div class="mr-3 mt-1 ml-3">
                                                <i class="fa fa-calendar fa-2x text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <strong>' . lang("started") . ': ' . $encounter_started_date . '</strong><br>
                                                <strong>' . lang("ended") . ': ' . $encounter_ended_date . '</strong>
                                            </div>
                                        </div>
                                    </div>';
                $encounter_number_type_group = "<div class='form-group'>
                                                    <div class='media mr-4 mb-4'>
                                                        <div class='mr-3 mt-1 ml-3'>
                                                            <i class='fa fa-file-text-o fa-2x text-primary'></i>
                                                        </div>
                                                        <div class='media-body'>
                                                            <strong>". $this->encounter_model->getEncounterTypeById($encounter->encounter_type_id)->display_name ."</strong>
                                                            <div class='row'>
                                                                <div class='col-md-10 mb-3'>
                                                                    <small class='text-muted'>No Appointment</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='ml-auto mt-1 mr-3'>
                                                            <span class='badge badge-pill badge-primary'>" . $this->encounter_model->getEncounterStatusById($encounter->encounter_status)->display_name . "</span>
                                                        </div>
                                                    </div>
                                                </div>";
            } else {
                $encounter_appointment_service_group = "No Appointment";
                $encounter_services = "No Appointment";
                if (!empty($encounter->started_at)) {
                    $encounter_started_date = date('F j, Y H:i A', strtotime($encounter->started_at.' UTC'));
                } else {
                    $encounter_started_date = "_______";
                }
                if (!empty($encounter->ended_at)) {
                    $encounter_ended_date = date('F j, Y H:i A', strtotime($encounter->ended_at.' UTC'));
                } else {
                    $encounter_ended_date = "_______";
                }
                $encounter_appointment_time = "No Appointment";
                $encounter_number_type_group = "<div class='form-group'>
                                                    <div class='media mr-4 mb-4'>
                                                        <div class='mr-3 mt-1 ml-3'>
                                                            <i class='fa fa-file-text-o fa-2x text-primary'></i>
                                                        </div>
                                                        <div class='media-body'>
                                                            <strong>". $this->encounter_model->getEncounterTypeById($encounter->encounter_type_id)->display_name ."</strong>
                                                            <div class='row'>
                                                                <div class='col-md-10 mb-3'>
                                                                    <small class='text-muted'>No Appointment</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='ml-auto mt-1 mr-3'>
                                                            <span class='badge badge-pill badge-primary'>" . $this->encounter_model->getEncounterStatusById($encounter->encounter_status)->display_name . "</span>
                                                        </div>
                                                    </div>
                                                </div>";
                // $encounter_ending_time = 'to _______';
                $encounter_date = '<div class="form-group">
                                        <div class="media mr-4 mb-4">
                                            <div class="mr-3 mt-1 ml-3">
                                                <i class="fa fa-calendar fa-2x text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <strong>' . lang("started") . ': ' . $encounter_started_date . '</strong><br>
                                                <strong>' . lang("ended") . ': ' . $encounter_ended_date . '</strong>
                                            </div>
                                        </div>
                                    </div>';
            }
            if (!empty($encounter_doctor_details)) {
                $encounter_doctor = $encounter_doctor_details->name;
            } else {
                $encounter_doctor = '';
            }

            
            if (!empty($encounter->created_at)) {
                $timeline[strtotime($encounter->created_at.' UTC') + 3] = '<li class="timeleft-label"><span class="bg-danger">' . date($data['settings']->date_format_long?$data['settings']->date_format_long:'F j, Y', strtotime($encounter->created_at.' UTC')) . '</span></li>
                                            <li>
                                                <i class="fa fa-envelope bg-primary"></i>
                                                <div class="timelineleft-item">
                                                    <span class="time"><i class="fa fa-clock-o text-danger"></i> ' . time_elapsed_string(date('d-m-Y H:i:s', strtotime($encounter->created_at.' UTC')), 3) . '</span>
                                                    <h3 class="timelineleft-header"><span>' . lang('encounter') . '</span></h3>
                                                    <div class="timelineleft-body">
                                                        '. $encounter_appointment_details .'
                                                        '. $encounter_number_type_group .'
                                                        '. $appointment_id .'
                                                        '. $appointment_date .'
                                                        '. $encounter_date .'
                                                        <div class="form-group">
                                                            <div class="media mr-4 mb-4">
                                                                <div class="mr-3 mt-1 ml-3">
                                                                    <i class="fa fa-file fa-2x text-primary"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <strong>'. $encounter->reason .'</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timelineleft-footer border-top bg-light">
                                                        <div class="d-flex align-items-center mt-auto">
                                                            <div class="avatar brround avatar-md mr-3" style="background-image: url('. $encounter_doctor_profile_image .')"></div>
                                                            <div>
                                                                <p class="font-weight-semibold mb-1">'. $encounter_doctor_profile_name .'</p>
                                                                <small class="d-block text-muted">' . $encounter_spec . '</small>
                                                            </div>
                                                            <div class="ml-auto mr-3 text-right">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <strong>'. $hospital_details->name .'</strong>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <small>'. $branch_name .'</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div>
                                                                    <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
            } else {
                '';
            }
        }





        if (!empty($timeline)) {
            krsort($timeline);
            $timeline_value = '';
            foreach ($timeline as $key => $value) {
                $timeline_value .= $value;
            }
        }

        $all_diagnosis = '';

        if ($this->ion_auth->in_group(array('admin'))) {
            foreach ($data['diagnosis'] as $diag) {
                $diagnosis_long = $this->diagnosis_model->getDiagnosisById($diag->diagnosis_id);
                if (!empty($diagnosis_long->long_description)) {
                    $diagnosis_long = $diagnosis_long->long_description;
                } else {
                    $diagnosis_long = $diag->patient_diagnosis_text;
                }
                if (!empty($diag->diagnosis_code)) {
                    $diag_code = $diag->diagnosis_code;
                } else {
                    $diag_code = "Unregistered ICD10";
                }
                if ($diag->is_primary_diagnosis == 1) {
                    $is_primary = 'P';
                } else {
                    $is_primary = 'S';
                }
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $option1 = '<a href="diagnosis/editDiagnosis?id='.$diag->patient_diagnosis_number .'&root=patient&method=medicalHistory" class="btn btn-info"><i class="fe fe-edit"></i></a>';
                }
                $patient_diagnosis = '<tr>
                    <td>'.date("Y-m-d", strtotime($diag->diagnosis_date." UTC")).'</td>
                    <td>'.date("Y-m-d", strtotime($diag->onset_date." UTC")).'</td>
                    <td>'.$diagnosis_long.'</td>
                    <td>'.$diag_code.'</td>
                    <td>'.$is_primary.'</td>
                    <td>'.$diag->diagnosis_notes.'</td>
                    <td>'.$this->encounter_model->getEncounterById($diag->encounter_id)->encounter_number.'</td>
                    <td></td>
                <tr/>';

                $all_diagnosis .= $patient_diagnosis;
            }
        } else {
            foreach ($data['diagnosis'] as $diag) {
                $diagnosis_long = $this->diagnosis_model->getDiagnosisById($diag->diagnosis_id);
                if (!empty($diagnosis_long->long_description)) {
                    $diagnosis_long = $diagnosis_long->long_description;
                } else {
                    $diagnosis_long = $diag->patient_diagnosis_text;
                }
                if (!empty($diag->diagnosis_code)) {
                    $diag_code = $diag->diagnosis_code;
                } else {
                    $diag_code = "Unregistered ICD10";
                }
                if ($diag->is_primary_diagnosis == 1) {
                    $is_primary = 'P';
                } else {
                    $is_primary = 'S';
                }
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    $option1 = '<a href="diagnosis/editDiagnosis?id='.$diag->patient_diagnosis_number .'&root=patient&method=medicalHistory" class="btn btn-info"><i class="fe fe-edit"></i></a>';
                }
                $patient_diagnosis = '<tr>
                    <td>'.date("Y-m-d", strtotime($diag->diagnosis_date." UTC")).'</td>
                    <td>'.date("Y-m-d", strtotime($diag->onset_date." UTC")).'</td>
                    <td>'.$diagnosis_long.'</td>
                    <td>'.$diag_code.'</td>
                    <td>'.$is_primary.'</td>
                    <td>'.$diag->diagnosis_notes.'</td>
                    <td>'.$this->encounter_model->getEncounterById($diag->encounter_id)->encounter_number.'</td>
                    <td>'.$option1.'</td>
                <tr/>';

                $all_diagnosis .= $patient_diagnosis;
            }
        }

        $all_vitals = '';

        if ($this->ion_auth->in_group(array('admin'))) {
            foreach ($data['vitals'] as $vital) {
                if (!empty($vital->pain)) {
                    $pain = $vital->pain; 
                } else {
                    $pain = '0';
                }
                $patient_vital = '<tr>
                    <td>'.date("Y-m-d h:i A", strtotime($vital->measured_at.' UTC')).'</td>
                    <td>'.$vital->heart_rate.'</td>
                    <td>'.$vital->height_cm.'</td>
                    <td>'.$vital->weight_kg.'</td>
                    <td>'.$vital->bmi.'</td>
                    <td>'.$vital->systolic . ' / ' . $vital->diastolic.'</td>
                    <td>'.$vital->temperature_celsius.'</td>
                    <td>'.$vital->spo2.'</td>
                    <td>'.$vital->respiration_rate.'</td>
                    <td>'.$pain.'</td>
                    <td>'.$vital->note.'</td>
                    <td></td>
                </tr>';

                $all_vitals .= $patient_vital;
            }
        } else {
            foreach ($data['vitals'] as $vital) {
                if (!empty($vital->pain)) {
                    $pain = $vital->pain; 
                } else {
                    $pain = '0';
                }
                $patient_vital = '<tr>
                    <td>'.date("Y-m-d h:i A", strtotime($vital->measured_at.' UTC')).'</td>
                    <td>'.$vital->heart_rate.'</td>
                    <td>'.$vital->height_cm.'</td>
                    <td>'.$vital->weight_kg.'</td>
                    <td>'.$vital->bmi.'</td>
                    <td>'.$vital->systolic . ' / ' . $vital->diastolic.'</td>
                    <td>'.$vital->temperature_celsius.'</td>
                    <td>'.$vital->spo2.'</td>
                    <td>'.$vital->respiration_rate.'</td>
                    <td>'.$pain.'</td>
                    <td>'.$vital->note.'</td>
                    <td><button type="button" class="btn btn-info editVitals" title="'.lang('edit').'" data-toggle="modal" data-id="'. $vital->id .'"><i class="fa fa-edit"></i> </button>
                        <a class="btn btn-danger btn-xs " href="patient/deleteVital?id='. $vital->id .'" onclick="return confirm("Are you sure you want to delete this item?");"><i class="fa fa-trash"></i> '. lang('delete') .'</a></td>
                </tr>';

                $all_vitals .= $patient_vital;
            }
        }

        $all_labrequests = '';

        if ($this->ion_auth->in_group(array('admin'))) {

        } else {
            foreach ($data['labrequests'] as $labrequest) {
                $labtests = $this->labrequest_model->getLabrequestByLabrequestNumber($labrequest->lab_request_number);
                $labtestdata = '';
                foreach ($labtests as $labtest) {
                    $labrequest_text = $labtest->long_common_name;
                    if (empty($labrequest_text)) {
                        $labrequest_text = $labtest->lab_request_text;
                    }

                    $labloinc = $labtest->loinc_num;
                    if (empty($labloinc)) {
                        $labloinc = '';
                    }

                    $labtestsingle = '<div class="mb-3"><p class="mb-0"><strong>'.$labrequest_text.'</strong></p><p class="mb-0">'.$labtest->instructions.'</p><p class="mb-0">'.$labloinc.'</p></div>';
                    $labtestdata .= $labtestsingle;
                }
                $alltest = $labtestdata;

                $patient_labrequest = '<tr>
                    <td>'.$labrequest->lab_request_number.'</td>
                    <td>'.$alltest.'</td>
                    <td>'.$this->patient_model->getPatientById($labrequest->patient_id)->name.'</td>
                    <td>'.$this->doctor_model->getDoctorById($labrequest->doctor_id)->name.'</td>
                    <td><a class="btn btn-info" href="labrequest/editLabRequestView?id='.$labrequest->lab_request_number.'&root=patient&method=medicalHistory"><i class="fe fe-edit"></i></a>
                        <a class="btn btn-info" href="labrequest/labrequestView?id='.$labrequest->lab_request_number.'"><i class="fe fe-eye"></i></a></td>
                </tr>';

                $all_labrequests .= $patient_labrequest;
            }
        }

        $all_appointments = '';

        if ($this->ion_auth->in_group(array('admin'))) {
            foreach ($appointments as $appointment) {

                $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                $facility = $this->hospital_model->getHospitalById($appointment->hospital_id)->name;
                $branch = $this->branch_model->getBranchById($appointment->location_id)->display_name;
                if (!empty($doctor_details)) {
                    $appointment_doctor = $doctor_details->name;
                } else {
                    $appointment_doctor = "";
                }



                $patient_appointments = '<tr class = "">

            <td>' . date("Y-m-d", $appointment->date) . '
            </td>
            <td>' . $appointment->time_slot . '</td>
            <td>'
                        . $appointment_doctor . '
            </td>
            <td>' . $appointment->status . '</td>
            <td>'.
            $facility .'<br>'.'( '. $branch .' )'
            .'</td>
            <td><a type="button" href="appointment/editAppointment?id=' . $appointment->id . '&root=appointment&method=calendar" class="btn btn-info btn-xs" title="Edit" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger" title="' . lang('delete') . '" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i></a>
            </td>
            </tr>';

                $all_appointments .= $patient_appointments;
            }
        } else {
            foreach ($appointments as $appointment) {

                $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                $facility = $this->hospital_model->getHospitalById($appointment->hospital_id)->name;
                $branch = $this->branch_model->getBranchById($appointment->location_id)->display_name;
                if (!empty($doctor_details)) {
                    $appointment_doctor = $doctor_details->name;
                } else {
                    $appointment_doctor = "";
                }

                if (empty($branch)) {
                    $branch = "Online";
                }
                $patient_appointments = '<tr class = "">

            <td>' . date("Y-m-d", $appointment->date) . '
            </td>
            <td>' . $appointment->time_slot . '</td>
            <td>'
                        . $appointment_doctor . '
            </td>
            <td>' . $appointment->status . '</td>
            <td>'.
            $facility .'<br>'.'( '. $branch .' )'
            .'</td>
            <td>'. $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name .'</td>
            <td><a type="button" href="appointment/editAppointment?id=' . $appointment->id . '&root=appointment&method=calendar" class="btn btn-info btn-xs" title="Edit" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger" title="' . lang('delete') . '" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i></a>
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
                $doctor_details = $this->doctor_model->getDoctorById($medical_history->doctor_id);
                $patient_case = ' <tr class="">
                                        <td>' . date("Y-m-d", strtotime($medical_history->case_date.' UTC')) . '</td>
                                        <td>' . $doctor_details->name . '</td>
                                        <td>' . $medical_history->title . '</td>
                                        <td>' . $medical_history->description . '</td>
                                        <td>
                                            <a class="btn btn-danger" title="' . lang('delete') . '" href="patient/deleteCaseHistory?id=' . $medical_history->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>';

                $all_case .= $patient_case;
            }
        } else {
            foreach ($medical_histories as $medical_history) {
                $doctor_details = $this->doctor_model->getDoctorById($medical_history->doctor_id);
                $patient_case = ' <tr class="">
                                        <td>' . date("Y-m-d", strtotime($medical_history->case_date.' UTC')) . '</td>
                                        <td>' . $doctor_details->name . '</td>
                                        <td>' . $medical_history->title . '</td>
                                        <td>' . $medical_history->description . '</td>
                                        <td></td>
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

            $facility = $this->hospital_model->getHospitalById($prescription->hospital_id);
            if (!empty($prescription->hospital_id)) {
                $prescription_facility = $facility->name;
            } else {
                $prescription_facility = '';
            }

            $option1Prescription = '<a class="btn btn-info btn-xs" href="prescription/viewPrescription?id=' . $prescription->prescription_number . '"><i class="fa fa-eye"></i></a>';
            if ($this->ion_auth->in_group(array('Doctor'))) {
                $option2Prescription = '<a type="button" class="btn btn-info btn-xs" data-toggle="modal" href="prescription/editPrescription?id='. $prescription->prescription_number .'"><i class="fa fa-edit"></i>' . lang('edit') . '</a>';
            }
            if ($this->ion_auth->in_group(array('admin'))) {
                $option3Prescription = '<a class="btn btn-danger btn-xs" href="prescription/delete?id=' . $prescription->prescription_number . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }
            $prescription_case = ' <tr class="">
                                                    <td>' . date('Y-m-d', strtotime($prescription->prescription_date.' UTC')) . '</td>
                                                    <td>' . $prescription_doctor . '</td>
                                                    <td>' . $medicinelist . '</td>
                                                    <td>' . $prescription_facility . '</td>
                                                         <td>' . $option1Prescription . ' ' . $option2Prescription . ' ' . $option3Prescription . '</td>
                                                </tr>';

            $all_prescription .= $prescription_case;
        }


        if (empty($all_prescription)) {
            $all_prescription = '';
        }

        $all_form = '';

        foreach ($forms as $form) {
            $form_doctor_details = $this->doctor_model->getDoctorById($form->doctor);
            if(!empty($form_doctor_details)) {
                $form_doctor_name = $form_doctor_details->name;
            } else {
                $form_doctor_name = "";
            }
            $form_class = ' <tr class="">
                                <td>' . $form->form_number . '</td>
                                <td>' . $form->name . '</td>
                                <td>' . $form_doctor_name . '</td>
                                <td>' . date("Y-m-d", strtotime($form->form_date.' UTC')) . '</td>
                            </tr>';

            $all_form .= $form_class;
        }

        if (empty($all_form)) {
            $all_form = '';
        }

        $all_lab = '';

        foreach ($labs as $lab) {
            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = "";
            }
            $option1Lab = '<a class="btn btn-info btn-xs btn_width" href="lab/invoice?id=' . $lab->id . '"><i class="fa fa-eye"></i></a>';
            if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) {
                $option2Lab = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('edit') . '" href="lab?id=' . $lab->id . '"><i class="fa fa-edit"> </i> ' . lang('') . '</a>';
            }
            if ($this->ion_auth->in_group(array('admin'))) {
                $option3Lab = '<a class="btn btn-danger btn-xs delete_button" title="' . lang('delete') . '" href="lab/delete?id=' . $lab->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>' . lang('') . '</a>';
            }
            $lab_class = ' <tr class="">
                                                    <td>' . $lab->id . '</td>
                                                    <td>' . date("Y-m-d", strtotime($lab->lab_date.' UTC')) . '</td>
                                                    <td>' . $lab_doctor . '</td>
                                                         <td>' . $option1Lab . '  ' . $option2Lab . '  ' . $option3Lab . '</td>
                                                </tr>';

            $all_lab .= $lab_class;
        }


        if (empty($all_lab)) {
            $all_lab = '';
        }
        // $all_bed = '';

        // foreach ($beds as $bed) {


            
        //     if ($this->ion_auth->in_group(array('admin', 'Receptionist'))) {
        //         $option1Bed = '<a class="btn btn-info btn-xs editbutton" href="bed/editAllotment?id=' . $bed->id . '"><i class="fa fa-edit"> </i></a>';
        //         $option2Bed = '<a class="btn btn-danger btn-xs btn_width delete_button" href="bed/deleteAllotment?id=' . $bed->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
        //     }

        //     $bed_case = '<tr class="">
        //                     <td>' . $bed->bed_id . '</td>
        //                     <td>' . $bed->a_time . '</td>
        //                     <td>' . $bed->d_time . '</td>
        //                     <td>' . $option1Bed . ' ' . $option2Bed . '</td>
        //                 </tr>';

        //     $all_bed .= $bed_case;
        // }


        // if (empty($all_bed)) {
        //     $all_bed = '';
        // }

        $all_encounter = '';

        foreach ($encounters as $encounter) {
            $encounter_type = $this->encounter_model->getEncounterTypeById($encounter->encounter_type_id)->display_name;
            $encounter_facility = $this->branch_model->getBranchById($encounter->location_id)->display_name;

            if (empty($encounter_type)) {
                $encounter_type = "Online";
            }

            if (empty($encounter_facility)) {
                $encounter_facility = "Online";
            }

            $encounter_case = '<tr class="">
                            <td>'. date('Y-m-d', strtotime($encounter->created_at.' UTC')) .'</td>
                            <td>'. $encounter->encounter_number .'</td>
                            <td>'. $encounter_type .'</td>
                            <td>'. $encounter_facility .'</td>
                            <td>'. $this->encounter_model->getEncounterStatusById($encounter->encounter_status)->display_name .'</td>
                        </tr>';

            $all_encounter .= $encounter_case;
        }

        if (empty($all_encounter)) {
            $all_encounter = '';
        }


        $all_material = '';
        foreach ($patient_materials as $patient_material) {

            if (!empty($patient_material->title)) {
                $patient_documents = $patient_material->title;
            }
            $ext = pathinfo($patient_material->url, PATHINFO_EXTENSION);
            if ($ext === 'pdf'){
                $image = '
                        <div class="panel-body text-center">
                            <a class="example-image-link" href="' . $patient_material->url . '" target="_blank">
                                <img class="example-image" src="uploads/PDF_DefaultImage.png" alt="image-1" max-width="120" max-height="120"/>
                            </a>
                        </div>';
            } else {
                $image = '
                        <div class="panel-body text-center">
                            <a class="example-image-link" href="' . $patient_material->url . '" target="_blank">
                                <img class="example-image" src="' . $patient_material->url . '?m=' . $patient_material_last_modified . '" alt="image-1" max-width="120" max-height="120"/>
                            </a>
                        </div>';
            }

            $documentInputFilter = '<script type="text/javascript">
            
                                        var uploadField = document.getElementById("document");

                                        uploadField.onchange = function() {
                                            if(this.files[0].size > 2e+6){
                                               not2();
                                               this.value = "";
                                            }else{

                                            }
                                        };

                                    </script>

                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                          $(".searchbox-input").on("keyup", function() {
                                            var value = $(this).val().toLowerCase();
                                            $(".items").filter(function() {
                                              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                            });
                                          });
                                        });
                                    </script>';

            if ($this->ion_auth->in_group(array('admin', 'Patient', 'Doctor'))) {
                $patient_material = '<div class="col-lg-4 col-md-6 items">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="todo-widget-header d-flex pb-2 p-4">
                                                    <div class="">
                                                        <a class="btn btn-info" href="patient/editUpload?id='. $patient_material->patient_document_number .'" target="_blank"><i class="fe fe-edit"></i></a>
                                                        <a class="btn btn-info" href="'. $patient_material->url .'" download><i class="fe fe-download"></i></a>
                                                        <a class="btn btn-danger ml-5" href="patient/deletePatientMaterial?id='. $patient_material->patient_document_number .'"onclick="return confirm("Are you sure you want to delete this item?");"><i class="fe fe-trash-2"></i></a>
                                                    </div>
                                                </div>
                                                <div class="px-5 pb-5 text-center">
                                                    '. $image .'
                                                    <h6 class="mb-1 font-weight-bold mt-4">' . $patient_material->title . '</h6>
                                                    <p class="text-dark">'.  lang('uploader') . ': ' . $this->hospital_model->getIonUserById($patient_material->created_user_id)->username .'</p>
                                                    <p class="text-muted">
                                                        '. date($settings->date_format_long?$settings->date_format_long:'F j, Y' . ' ' . $settings->time_format, strtotime($patient_material->created_at.' UTC')) .'
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                // $patient_material = '
                // <div class="card col-md-3"  style="height: 200px; margin-right: 10px; margin-bottom: 36px; background: #f1f1f1; padding: 34px;">
                //     <div class="post-info">
                //         <img src="' . $patient_material->url . '" height="100" width="100">
                //     </div>
                //     <div class="post-info">
                //         ' . $patient_documents . '
                //     </div>
                //     <p></p>
                //     <div class="post-info">
                //         <a class="btn btn-info btn-xs btn_width" href="' . $patient_material->url . '" download> ' . lang("download") . ' </a>
                //         <a class="btn btn-danger btn-xs btn_width" title="' . lang("delete") . '" href="patient/deletePatientMaterial?id=' . $patient_material->id . '"onclick="return confirm("Are you sure you want to delete this item?");"><i class="fa fa-trash"></i></a>
                //     </div>

                //     <hr>

                // </div>';
            } else {
                $patient_material = '
                <div class="card col-md-3"  style="height: 200px; margin-right: 10px; margin-bottom: 36px; background: #f1f1f1; padding: 34px;">
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

        $user = $this->session->userdata('user_id');
        $user_image = $this->session->userdata('profile_img_url');
        $data['view'] = '
                        <div class="row">
                            <div class="col-md-5 col-lg-3 col-sm-12 pr-1">
                                <div class="box-widget widget-user">
                                    <div class="widget-user-image">
                                        <center><img alt="User Avatar" class="rounded-circle p-1" src="' . base_url($user_image) . '" style="width: 150px; height: 150px;" width="auto" height="auto"></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-sm-12 pl-0">
                                <div class="row mt-md-1 mt-sm-1 mr-lg-3 mr-mb-0 mr-sm-0">
                                    <div class="col-lg-9 col-md-12 col-sm-12">
                                        <h4 class="mb-3 mt-1 font-weight-bold h-6 text-md-center text-lg-left text-sm-center">' . $patient->name . '</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-1 ml-5">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M20,10V8h-4V4h-2v4h-4V4H8v4H4v2h4v4H4v2h4v4h2v-4h4v4h2v-4h4v-2h-4v-4H20z M14,14h-4v-4h4V14z"/></g></svg>
                                                    <div class="h6 mb-0 ml-1 mt-1">' . $patient->id . '</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-1 ml-5">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 15c-2.7 0-5.8 1.29-6 2.01V18h12v-1c-.2-.71-3.3-2-6-2z" opacity=".3"/><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 7c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6 5H6v-.99c.2-.72 3.3-2.01 6-2.01s5.8 1.29 6 2v1z"/></svg>
                                                        <div class="h6 mb-0 ml-1 mt-1">' . $patient->sex . '</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-1 ml-5">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.53 14.92l-1.08 1.07c-1.3 1.3-3.58 1.31-4.89 0l-1.07-1.07-1.09 1.07c-.64.64-1.5 1-2.4 1.01v3h14v-3c-.9-.01-1.76-.37-2.4-1.01l-1.07-1.07zM18 11H6c-.55 0-1 .45-1 1v3.5c.51-.01.99-.21 1.34-.57l2.14-2.13 2.13 2.13c.74.74 2.03.74 2.77 0l2.14-2.13 2.13 2.13c.36.36.84.56 1.35.57V12c0-.55-.45-1-1-1z" opacity=".3"/><path d="M12 6c1.11 0 2-.9 2-2 0-.38-.1-.73-.29-1.03L12 0l-1.71 2.97c-.19.3-.29.65-.29 1.03 0 1.1.9 2 2 2zm6 3h-5V7h-2v2H6c-1.66 0-3 1.34-3 3v9c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-9c0-1.66-1.34-3-3-3zm1 11H5v-3c.9-.01 1.76-.37 2.4-1.01l1.09-1.07 1.07 1.07c1.31 1.31 3.59 1.3 4.89 0l1.08-1.07 1.07 1.07c.64.64 1.5 1 2.4 1.01v3zm0-4.5c-.51-.01-.99-.2-1.35-.57l-2.13-2.13-2.14 2.13c-.74.74-2.03.74-2.77 0L8.48 12.8l-2.14 2.13c-.35.36-.83.56-1.34.57V12c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v3.5z"/></svg>
                                                    <div class="h6 mb-0 ml-1 mt-1">'.time_elapsed_string($patient->birthdate,1 ,"short_age").' '.lang("old").'</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-1 ml-5">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 4h9v14H7z" opacity=".3"/><path d="M15.5 1h-8C6.12 1 5 2.12 5 3.5v17C5 21.88 6.12 23 7.5 23h8c1.38 0 2.5-1.12 2.5-2.5v-17C18 2.12 16.88 1 15.5 1zm-4 21c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4.5-4H7V4h9v14z"/></svg>
                                                    <div class="h6 mb-0 ml-1 mt-1">'. $patient->phone .'</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex mb-1 ml-5 pr-0">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                                                    <div class="h6 mb-0 ml-1 mt-1">'. $patient->email .'</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex mb-1 ml-5">
                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"></path><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"></path></svg>
                                                    <div class="h6 mb-0 ml-1 mt-1">'. $patient->address .'</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-1">
                                                    <span class="h6 mb-0 ml-5 mt-1">'.lang("allergies").': '.$patient->allergies.'</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                            </div>
                                            <div class="col-md-12">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-primary">
                                    <div class=" tab-menu-heading p-0 bg-light">
                                        <div class="tabs-menu1 ">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs">
                                                <li><a href="#tab3" class="active" data-toggle="tab">' . lang('diagnosis') . '</a></li>
                                                <li><a href="#tab4" data-toggle="tab">' . lang('vital_signs') . '</a></li>
                                                <li><a href="#tab5" data-toggle="tab">' . lang('appointments') . '</a></li>
                                                <li><a href="#tab6" data-toggle="tab">' . lang('case_notes') . '</a></li>
                                                <li><a href="#tab7" data-toggle="tab">' . lang('prescription') . '</a></li>
                                                <li><a href="#tab13" data-toggle="tab">' . lang('lab').' '.lang('request') . '</a></li>
                                                <li><a href="#tab8" data-toggle="tab">' . lang('forms') . '</a></li>
                                                <li><a href="#tab10" data-toggle="tab">' . lang('documents') . '</a></li>
                                                <li><a href="#tab11" data-toggle="tab">' . lang('encounters') . '</a></li>
                                                <li><a href="#tab12" data-toggle="tab">' . lang('timeline') . '</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active " id="tab3">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table">
                                                        <table id="" class="table table-bordered text-nowrap key-buttons w-100 editable-sample">
                                                            <thead>
                                                                <tr>
                                                                    <th>' . lang('diagnosis').' '.lang('date') . '</th>
                                                                    <th>' . lang('onset').' '.lang('date') . '</th>
                                                                    <th>' . lang('diagnosis') . '</th>
                                                                    <th>' . lang('icd') . '</th>
                                                                    <th>' . lang('p/s') . '</th>
                                                                    <th>' . lang('note') . '</th>
                                                                    <th>' . lang('encounter') . '</th>
                                                                    <th>' . lang('actions') . '</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    '.$all_diagnosis.'
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab4">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table">
                                                        <table id="" class="table table-bordered text-nowrap key-buttons w-100 editable-sample">
                                                            <thead>
                                                                <tr>
                                                                    <th>' . lang("measured_at") . '</th>
                                                                    <th>' . lang('heart_rate').'<br>'.'('.lang('bpm').')' . '</th>
                                                                    <th>' . lang('height').'<br>'.'(cm)' . '</th>
                                                                    <th>' . lang('weight').'<br>'.'(kg)' . '</th>
                                                                    <th>' . lang("bmi") . '</th>
                                                                    <th>' . lang('bp').'<br>'.'(mmHg)' . '</th>
                                                                    <th>' . lang('temperature').'<br>'.'(&#176;C)' . '</th>
                                                                    <th>' . lang('spo2').'<br>'.'(%)' . '</th>
                                                                    <th>' . lang('respiration_rate').'<br>'.'('.lang('bpm').')' . '</th>
                                                                    <th>' . lang('pain_level').'<br>'.'('.lang('10_highest').')' . '</th>
                                                                    <th>' . lang('note') . '</th>
                                                                    <th>' . lang('actions') . '</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    '.$all_vitals.'
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab5">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table">
                                                        <table id="" class="table table-bordered text-nowrap key-buttons w-100 editable-sample">
                                                            <thead>
                                                                <tr>
                                                                    <th>' . lang("date") . '</th>
                                                                    <th>' . lang("time_slot") . '</th>
                                                                    <th>' . lang("doctor") . '</th>
                                                                    <th>' . lang("status") . '</th>
                                                                    <th>' . lang("facility") . '</th>
                                                                    <th>' . lang("service_type") . '</th>
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
                                            <div class="tab-pane " id="tab6">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w-15">' . lang("date") . '</th>
                                                                    <th class="w-10">' . lang("doctor") . '</th>
                                                                    <th class="w-15">' . lang("title") . '</th>
                                                                    <th class="w-50">' . lang("description") . '</th>
                                                                    <th class="w-10">' . lang("option") . '</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                ' . $all_case . '
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane " id="tab7">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th>' . lang("date") . '</th>
                                                                    <th>' . lang("doctor") . '</th>
                                                                    <th>' . lang("medicine") . '</th>
                                                                    <th>' . lang("facility") . '</th>
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
                                            <div class="tab-pane " id="tab8">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th>' . lang('form').' '.lang('number') . '</th>
                                                                    <th>' . lang("name") . '</th>
                                                                    <th>' . lang("doctor") . '</th>
                                                                    <th>' . lang("date") . '</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                ' . $all_form . '
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane " id="tab13">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th>' . lang("lab").' '.lang("request").' '.lang("number") . '</th>
                                                                    <th>' . lang("lab").' '.lang("test") . '</th>
                                                                    <th>' . lang("patient") . '</th>
                                                                    <th>' . lang("doctors") . '</th>
                                                                    <th>' . lang("options") . '</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>'
                                                                . $all_labrequests .
                                                            '</tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane " id="tab10">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-8 col-sm-5 mb-4">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-7 mb-4">
                                                                <div class="form-group">
                                                                    <div class="input-icon">
                                                                        <span class="input-icon-addon">
                                                                            <i class="fe fe-search"></i>
                                                                        </span>
                                                                        <input type="text" class="form-control searchbox-input" placeholder="Search Files">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    ' . $all_material . '
                                                </div>
                                                ' . $documentInputFilter . '
                                            </div>
                                            <div class="tab-pane " id="tab11">
                                                <div class="table-responsive">
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th>' . lang("date") . '</th>
                                                                    <th>' . lang("encounter") . lang("id") . '</th>
                                                                    <th>' . lang("type") . '</th>
                                                                    <th>' . lang("facility") . '</th>
                                                                    <th>' . lang("status") . '</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>'
                                                                . $all_encounter .
                                                            '</tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane " id="tab12">
                                                <ul class="timelineleft pb-5">
                                                    ' . $timeline_value . '
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';

    //     $data['view'] = '
    //     <section class="col-md-4 col-sm-12">
    //         <header class="card-heading clearfix">
    //             <div class="">
    //             ' . lang("patient") . ' ' . lang("info") . ' 
    //             </div>
    //         </header> 
    //         <aside class="profile-nav">
    //             <section class="">
    //                 <div class="user-heading round">
    //                     ' . $profile_image . '
    //                     <h1>' . $patient->name . '</h1>
    //                     <p> ' . $patient->email . ' </p>
    //                 </div>

    //                 <ul class="nav nav-pills nav-stacked">
    //                     <li class="active"> ' . lang("patient") . ' ' . lang("name") . '<span class="label pull-right r-activity">' . $patient->name . '</span></li>
    //                     <li>  ' . lang("patient_id") . ' <span class="label pull-right r-activity">' . $patient->id . '</span></li>
    //                     <li>  ' . lang("phone") . '<span class="label pull-right r-activity">' . $patient->phone . '</span></li>
    //                     <li>  ' . lang("email") . '<span class="label pull-right r-activity">' . $patient->email . '</span></li>
    //                     <li>  ' . lang("gender") . '<span class="label pull-right r-activity">' . $patient->sex . '</span></li>
    //                     <li>  ' . lang("birth_date") . '<span class="label pull-right r-activity">' . $patient->birthdate . '</span></li>
    //                     <li style="height: 200px;">  ' . lang("address") . '<span class="pull-right r-activity" style="height: 200px;">' . $patient->address . '</span></li>
    //                 </ul>
    //             </section>
    //         </aside>
    //     </section>

    //     <section class="col-md-8 col-sm-12">
    //         <header class="card-heading clearfix">
    //             <div class="col-md-7">
    //                 ' . lang("history") . ' | ' . $patient->name . '
    //             </div>
    //         </header>
    //         <section class="card-body">   
    //             <header class="card-heading tab-bg-dark-navy-blueee">
    //                 <ul class="nav nav-tabs">
    //                     <li class="active">
    //                         <a data-toggle="tab" href="#appointments">' . lang("appointments") . '</a>
    //                     </li>
    //                     <li class="">
    //                         <a data-toggle="tab" href="#home">' . lang("case_history") . '</a>
    //                     </li>
    //                      <li class="">
    //                         <a data-toggle="tab" href="#prescription">' . lang("prescription") . '</a>
    //                     </li>
                        
    //                     <li class="">
    //                         <a data-toggle="tab" href="#lab">' . lang("lab") . '</a>
    //                     </li>
                        
    //                     <li class="">
    //                         <a data-toggle="tab" href="#profile">' . lang("documents") . '</a>
    //                     </li>
    //                      <li class="">
    //                         <a data-toggle="tab" href="#bed">' . lang("bed") . '</a>
    //                     </li>
    //                     <li class="">
    //                         <a data-toggle="tab" href="#timeline">' . lang("timeline") . '</a> 
    //                     </li>
    //                 </ul>
    //             </header>
                
    //             <div class="tab-content">
    //                 <div id="appointments" class="tab-pane active">
    //                     <div class="">
    //                         <div class="adv-table editable-table ">
    //                             <table class="table table-striped table-hover table-bordered" id="">
    //                                 <thead>
    //                                     <tr>
    //                                         <th>' . lang("date") . '</th>
    //                                         <th>' . lang("time_slot") . '</th>
    //                                         <th>' . lang("doctor") . '</th>
    //                                         <th>' . lang("status") . '</th>
    //                                         <th>' . lang("option") . '</th>
    //                                     </tr>
    //                                 </thead>
    //                                 <tbody>
    //                                     ' . $all_appointments . '
    //                                 </tbody>
    //                             </table>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div id="home" class="tab-pane">
    //                     <div class="">
    //                         <div class="adv-table editable-table ">
    //                             <table class="table table-striped table-hover table-bordered" id="">
    //                                 <thead>
    //                                     <tr>
    //                                         <th>' . lang("date") . '</th>
    //                                         <th>' . lang("title") . '</th>
    //                                         <th>' . lang("description") . '</th>
    //                                     </tr>
    //                                 </thead>
    //                                 <tbody>
    //                                     ' . $all_case . '
    //                                 </tbody>
    //                             </table>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div id="prescription" class="tab-pane">
    //                     <div class="">
    //                         <div class="adv-table editable-table ">
    //                             <table class="table table-striped table-hover table-bordered" id="">
    //                                 <thead>
    //                                     <tr>
    //                                         <th>' . lang("date") . '</th>
    //                                         <th>' . lang("doctor") . '</th>
    //                                         <th>' . lang("medicine") . '</th>
    //                                         <th>' . lang("options") . '</th>
    //                                     </tr>
    //                                 </thead>
    //                                 <tbody>
    //                                     ' . $all_prescription . '
    //                                 </tbody>
    //                             </table>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div id="lab" class="tab-pane"> 
    //                     <div class="">
    //                         <div class="adv-table editable-table ">
    //                             <table class="table table-striped table-hover table-bordered" id="">
    //                                 <thead>
    //                                     <tr>
    //                                         <th>' . lang("id") . '</th>
    //                                         <th>' . lang("date") . '</th>
    //                                         <th>' . lang("doctor") . '</th>
    //                                         <th>' . lang("options") . '</th>
    //                                     </tr>
    //                                 </thead>
    //                                 <tbody>'
    //                                     . $all_lab .
    //                                 '</tbody>
    //                             </table>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div id="bed" class="tab-pane"> 
    //                     <div class="">
    //                         <div class="adv-table editable-table ">
    //                             <table class="table table-striped table-hover table-bordered" id="">
    //                                 <thead>
    //                                     <tr>
    //                                         <th>' . lang("bed_id") . '</th>
    //                                         <th>' . lang("alloted_time") . '</th>
    //                                         <th>' . lang("discharge_time") . '</th>
    //                                     </tr>
    //                                 </thead>
    //                                 <tbody>'
    //                                     . $all_bed .
    //                                 '</tbody>
    //                             </table>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div id="profile" class="tab-pane"> 
    //                     <div class="">
    //                         <div class="adv-table editable-table ">
    //                             <div class="">
    //                                 ' . $all_material . '
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div id="timeline" class="tab-pane"> 
    //                     <div class="">
    //                         <div class="">
    //                             <section class="">
    //                                 <header class="card-heading">
    //                                     ' . lang("timeline") . '
    //                                 </header>
    //                                 ' . $timeline_value . '
    //                             </section>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //         </section>

    // </section>';


        echo json_encode($data);
    }

    public function getPatientinfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->patient_model->getPatientInfo($searchTerm);

        echo json_encode($response);
    }

    public function getPatientInfoByVisitedProviderId() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->patient_model->getPatientInfoByVisitedProviderId($searchTerm);

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

    public function searchPatientByPatientNumber() {
        $patient_number = $this->input->get('patient_number');
        $f_name = $this->input->get('f_name');
        $l_name = $this->input->get('l_name');
        $details = $this->input->get('data');

        $data['patient_lists'] = $this->patient_model->searchPatientByPatientNumberFirstnameLastname($patient_number, $f_name, $l_name, $details);
        $data['total_patients'] = count($data['patient_lists']);
        $patient_age = [];
        foreach ($data['patient_lists'] as $patient_list) {
            $age = time_elapsed_string($patient_list->birthdate,1 ,"short_age");
            $patient_age[] = $age . ' ' . lang('old');
        }

        $data['details'] = $patient_age;

        echo json_encode($data);
    }

    public function addPatientDoctorBySearch() {
        $patient_id = $this->input->post('patient_id');
        $user = $this->ion_auth->get_user_id();
        $provider = 0;

        if (empty($patient_id)) {
            $patient_id = $this->input->post('patient_id2');
        }
        $doctor_id = $this->doctor_model->getDoctorByIonUserId($user)->id;
        $patient_details = $this->patient_model->getPatientById($patient_id, $provider);
        $provider_logged = $this->session->userdata('hospital_id');
        $patient_isolated_provider = explode(',', $patient_details->isolated_provider_id);
        $patient_authorized_provider = explode(',', $patient_details->authorized_provider_id);
        $patient_unrestricted_provider = explode(',', $patient_details->unrestricted_provider_id);
        $patient_visited_provider = explode(',', $patient_details->visited_provider_id);
        $patients_doctor = explode(',', $patient_details->doctor);
        $patient_privacy_level_id = $this->patient_model->getPrivacyLevelById($patient_details->privacy_level_id);

        $doctor_check = in_array($doctor_id, $patients_doctor);
        $visited_provider_check = in_array($provider_logged, $patient_visited_provider);

        if ($this->ion_auth->in_group(array('Doctor'))) {
            if ($patient_privacy_level_id->name === "isolated") {
                $patient_privacy = in_array($provider_logged, $patient_isolated_provider);
                if ($doctor_check === TRUE && $visited_provider_check === TRUE) {
                    $add_patient_doctor = $patient_details->doctor;
                    $this->session->set_flashdata('error', "You already have access to Patient ".$patient_details->name);
                } elseif ($doctor_check === FALSE && $visited_provider_check === FALSE) {
                    if (empty($patient_details->doctor)) {
                        $add_patient_doctor = $doctor_id;
                        if ($patient_privacy === TRUE) {
                            $add_i_provider = $patient_details->isolated_provider_id;
                            $add_v_provider = $patient_details->visited_provider_id;
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "isolated_provider_id" => $add_i_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            if ($patient_details->doctor !== $add_patient_doctor ) {
                                $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                            } else {
                                $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                            }

                        } elseif ($patient_privacy === FALSE) {
                            if (empty($patient_details->isolated_provider_id)) {
                                $add_i_provider = $provider_logged;
                            } else {
                                $add_i_provider = $patient_details->isolated_provider_id.','.$provider_logged;
                            }
                            if (empty($patient_details->visited_provider_id)) {
                                $add_v_provider = $provider_logged;
                            } else {
                                $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                            }
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "isolated_provider_id" => $add_i_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            $this->session->set_flashdata('success', lang('record_updated'));
                        }
                    } else {
                        $add_patient_doctor = $patient_details->doctor.','.$doctor_id;
                        if ($patient_privacy === TRUE) {
                            $add_i_provider = $patient_details->isolated_provider_id;
                            $add_v_provider = $patient_details->visited_provider_id;
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "isolated_provider_id" => $add_i_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            if ($patient_details->doctor !== $add_patient_doctor ) {
                                $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                            } else {
                                $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                            }

                        } elseif ($patient_privacy === FALSE) {
                            if (empty($patient_details->isolated_provider_id)) {
                                $add_i_provider = $provider_logged;
                            } else {
                                $add_i_provider = $patient_details->isolated_provider_id.','.$provider_logged;
                            }
                            if (empty($patient_details->visited_provider_id)) {
                                $add_v_provider = $provider_logged;
                            } else {
                                $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                            }
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "isolated_provider_id" => $add_i_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            $this->session->set_flashdata('success', lang('record_updated'));
                        }
                    }
                } elseif ($doctor_check === FALSE && $visited_provider_check === TRUE) {
                    $add_patient_doctor = $patient_details->doctor.','.$doctor_id;
                    if ($patient_privacy === TRUE) {
                        $add_i_provider = $patient_details->isolated_provider_id;
                        $add_v_provider = $patient_details->visited_provider_id;
                        $data = array(
                            "doctor" => $add_patient_doctor,
                            "isolated_provider_id" => $add_i_provider,
                            "visited_provider_id" => $add_v_provider,
                        );
                        if ($patient_details->doctor !== $add_patient_doctor ) {
                            $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                        } else {
                            $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', "Something went wrong");
                }
                // $data = array(
                //     "doctor" => $add_patient_doctor,
                //     "isolated_provider_id" => $add_i_provider,
                // );
            } elseif ($patient_privacy_level_id->name === "authorized") {
                $patient_privacy = in_array($provider_logged, $patient_authorized_provider);
                if ($doctor_check === TRUE && $visited_provider_check === TRUE) {
                    $add_patient_doctor = $patient_details->doctor;
                    $this->session->set_flashdata('error', "You already have access to Patient ".$patient_details->name);
                } elseif ($doctor_check === FALSE && $visited_provider_check === FALSE) {
                    if (empty($patient_details->doctor)) {
                        $add_patient_doctor = $doctor_id;
                        if ($patient_privacy === TRUE) {
                            $add_a_provider = $patient_details->authorized_provider_id;
                            $add_v_provider = $patient_details->visited_provider_id;
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "authorized_provider_id" => $add_a_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            if ($patient_details->doctor !== $add_patient_doctor ) {
                                $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                            } else {
                                $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                            }

                        } elseif ($patient_privacy === FALSE) {
                            if (empty($patient_details->authorized_provider_id)) {
                                $add_a_provider = $provider_logged;
                            } else {
                                $add_a_provider = $patient_details->authorized_provider_id.','.$provider_logged;
                            }
                            if (empty($patient_details->visited_provider_id)) {
                                $add_v_provider = $provider_logged;
                            } else {
                                $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                            }
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "authorized_provider_id" => $add_a_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            $this->session->set_flashdata('success', lang('record_updated'));
                        }
                    } else {
                        $add_patient_doctor = $patient_details->doctor.','.$doctor_id;
                        if ($patient_privacy === TRUE) {
                            $add_a_provider = $patient_details->authorized_provider_id;
                            $add_v_provider = $patient_details->visited_provider_id;
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "authorized_provider_id" => $add_a_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            if ($patient_details->doctor !== $add_patient_doctor ) {
                                $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                            } else {
                                $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                            }
                            
                        } elseif ($patient_privacy === FALSE) {
                            if (empty($patient_details->authorized_provider_id)) {
                                $add_a_provider = $provider_logged;
                            } else {
                                $add_a_provider = $patient_details->authorized_provider_id.','.$provider_logged;
                            }
                            if (empty($patient_details->visited_provider_id)) {
                                $add_v_provider = $provider_logged;
                            } else {
                                $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                            }
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "authorized_provider_id" => $add_a_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            $this->session->set_flashdata('success', lang('record_updated'));
                        }
                    }
                } elseif ($doctor_check === FALSE && $visited_provider_check === TRUE) {
                    $add_patient_doctor = $patient_details->doctor.','.$doctor_id;
                    if ($patient_privacy === TRUE) {
                        $add_a_provider = $patient_details->authorized_provider_id;
                        $add_v_provider = $patient_details->visited_provider_id;
                        $data = array(
                            "doctor" => $add_patient_doctor,
                            "authorized_provider_id" => $add_a_provider,
                            "visited_provider_id" => $add_v_provider,
                        );
                        if ($patient_details->doctor !== $add_patient_doctor ) {
                            $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                        } else {
                            $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', "Something went wrong");
                }
                // $data = array(
                //     "doctor" => $add_patient_doctor,
                //     "isolated_provider_id" => $add_i_provider,
                // );
            } elseif ($patient_privacy_level_id->name === "unrestricted") {
                $patient_privacy = in_array($provider_logged, $patient_unrestricted_provider);
                if ($doctor_check === TRUE && $visited_provider_check === TRUE) {
                    $add_patient_doctor = $patient_details->doctor;
                    $this->session->set_flashdata('error', "You already have access to Patient ".$patient_details->name);
                } elseif ($doctor_check === FALSE && $visited_provider_check === FALSE) {
                    if (empty($patient_details->doctor)) {
                        $add_patient_doctor = $doctor_id;
                        if ($patient_privacy === TRUE) {
                            $add_u_provider = $patient_details->unrestricted_provider_id;
                            $add_v_provider = $patient_details->visited_provider_id;
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "unrestricted_provider_id" => $add_u_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            if ($patient_details->doctor !== $add_patient_doctor ) {
                                $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                            } else {
                                $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                            }

                        } elseif ($patient_privacy === FALSE) {
                            if (empty($patient_details->unrestricted_provider_id)) {
                                $add_u_provider = $provider_logged;
                            } else {
                                $add_u_provider = $patient_details->unrestricted_provider_id.','.$provider_logged;
                            }
                            if (empty($patient_details->visited_provider_id)) {
                                $add_v_provider = $provider_logged;
                            } else {
                                $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                            }
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "unrestricted_provider_id" => $add_u_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            $this->session->set_flashdata('success', lang('record_updated'));
                        }
                    } else {
                        $add_patient_doctor = $patient_details->doctor.','.$doctor_id;
                        if ($patient_privacy === TRUE) {
                            $add_u_provider = $patient_details->unrestricted_provider_id;
                            $add_v_provider = $patient_details->visited_provider_id;
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "authorized_provider_id" => $add_a_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            if ($patient_details->doctor !== $add_patient_doctor ) {
                                $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                            } else {
                                $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                            }

                        } elseif ($patient_privacy === FALSE) {
                            if (empty($patient_details->unrestricted_provider_id)) {
                                $add_u_provider = $provider_logged;
                            } else {
                                $add_u_provider = $patient_details->unrestricted_provider_id.','.$provider_logged;
                            }
                            if (empty($patient_details->visited_provider_id)) {
                                $add_v_provider = $provider_logged;
                            } else {
                                $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                            }
                            $data = array(
                                "doctor" => $add_patient_doctor,
                                "unrestricted_provider_id" => $add_u_provider,
                                "visited_provider_id" => $add_v_provider,
                            );
                            $this->session->set_flashdata('success', lang('record_updated'));
                        }
                    }
                } elseif ($doctor_check === FALSE && $visited_provider_check === TRUE) {
                    $add_patient_doctor = $patient_details->doctor.','.$doctor_id;
                    if ($patient_privacy === TRUE) {
                        $add_u_provider = $patient_details->unrestricted_provider_id;
                        $add_v_provider = $patient_details->visited_provider_id;
                        $data = array(
                            "doctor" => $add_patient_doctor,
                            "unrestricted_provider_id" => $add_u_provider,
                            "visited_provider_id" => $add_v_provider,
                        );
                        if ($patient_details->doctor !== $add_patient_doctor ) {
                            $this->session->set_flashdata('success', 'Added Doctor for Patient '.$patient_details->name);
                        } else {
                            $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', "Something went wrong");
                }
                // $data = array(
                //     "doctor" => $add_patient_doctor,
                //     "unrestricted_provider_id" => $add_u_provider,
                // );
            }

        } elseif ($this->ion_auth->in_group(array('admin', 'Receptionist'))) {
            if ($patient_privacy_level_id->name === "isolated") {
                $patient_privacy = in_array($provider_logged, $patient_isolated_provider);
                if ($patient_privacy === TRUE) {
                    $add_i_provider = $patient_details->isolated_provider_id;
                    $data = array(
                        "isolated_provider_id" => $add_i_provider,
                    );
                    $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                } elseif ($patient_privacy === FALSE) {
                    if (empty($patient_details->isolated_provider_id)) {
                        $add_i_provider = $provider_logged;
                    } else {
                        $add_i_provider = $patient_details->isolated_provider_id.','.$provider_logged;
                    }
                    if (empty($patient_details->visited_provider_id)) {
                        $add_v_provider = $provider_logged;
                    } else {
                        $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                    }
                    $data = array(
                        "isolated_provider_id" => $add_i_provider,
                        "visited_provider_id" => $add_v_provider,
                    );
                    $this->session->set_flashdata('success', lang('record_updated'));
                }
            } elseif ($patient_privacy_level_id->name === "authorized") {
                $patient_privacy = in_array($provider_logged, $patient_authorized_provider);
                if ($patient_privacy === TRUE) {
                    $add_a_provider = $patient_details->authorized_provider_id;
                    $data = array(
                        "authorized_provider_id" => $add_a_provider,
                    );
                    $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                } elseif ($patient_privacy === FALSE) {
                    if (empty($patient_details->authorized_provider_id)) {
                        $add_a_provider = $provider_logged;
                    } else {
                        $add_a_provider = $patient_details->authorized_provider_id.','.$provider_logged;
                    }
                    if (empty($patient_details->visited_provider_id)) {
                        $add_v_provider = $provider_logged;
                    } else {
                        $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                    }
                    $data = array(
                        "authorized_provider_id" => $add_a_provider,
                        "visited_provider_id" => $add_v_provider,
                    );
                    $this->session->set_flashdata('success', lang('record_updated'));
                }
            } elseif ($patient_privacy_level_id->name === "unrestricted") {
                $patient_privacy = in_array($provider_logged, $patient_unrestricted_provider);
                if ($patient_privacy === TRUE) {
                    $add_u_provider = $patient_details->unrestricted_provider_id;
                    $data = array(
                        "unrestricted_provider_id" => $add_u_provider,
                    );
                    $this->session->set_flashdata('error', 'Patient Already Exists in this facility');
                } elseif ($patient_privacy === FALSE) {
                    if (empty($patient_details->unrestricted_provider_id)) {
                        $add_u_provider = $provider_logged;
                    } else {
                        $add_u_provider = $patient_details->unrestricted_provider_id.','.$provider_logged;
                    }
                    if (empty($patient_details->visited_provider_id)) {
                        $add_v_provider = $provider_logged;
                    } else {
                        $add_v_provider = $patient_details->visited_provider_id.','.$provider_logged;
                    }
                    $data = array(
                        "unrestricted_provider_id" => $add_u_provider,
                        "visited_provider_id" => $add_v_provider,
                    );
                    $this->session->set_flashdata('success', lang('record_updated'));
                }
            }
        }

        $this->patient_model->updatePatient($patient_id, $data);

        redirect('patient/addNewView');
    }

    public function editPatientMaterialByJason() {
        $id = $this->input->get('id');

        $data['documents'] = $this->patient_model->getPatientMaterialById($id);
        $data['patients'] = $this->patient_model->getPatient();
        $data['categories'] = $this->patient_model->getDocumentCategories();

        echo json_encode($data);
    }

    public function getPatientByEncounterIdByJason() {
        $encounter_id = $this->input->get('id');

        $encounter = $this->encounter_model->getEncounterById($encounter_id);

        $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($encounter->patient_id);

        echo json_encode($data);
    }

}

/* End of file patient.php */
    /* Location: ./application/modules/patient/controllers/patient.php */
    