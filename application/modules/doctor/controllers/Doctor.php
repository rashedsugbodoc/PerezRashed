<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('doctor_model');

        $this->load->model('department/department_model');
        $this->load->model('specialty/specialty_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('patient/patient_model');
        $this->load->model('prescription/prescription_model');
        $this->load->model('schedule/schedule_model');
        $this->load->module('patient');
        $this->load->module('sms');
        $this->load->model('location/location_model');
        $this->load->model('branch/branch_model');
        $this->load->model('encounter/encounter_model');
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist', 'Nurse', 'Laboratorist', 'Patient', 'Clerk', 'Midwife'))) {
            redirect('home/permission');
        }
    }

    public function index() {

        if ($this->ion_auth->in_group(array('Patient', 'Doctor', 'Receptionist', 'Accountant', 'Nurse', 'Laboratorist', 'Clerk', 'Midwife'))) {
            redirect('home/permission');
        }

        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['departments'] = $this->department_model->getDepartment();
        $data['specialties'] = $this->specialty_model->getSpecialty();
        $data['countries'] = $this->location_model->getCountry();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('doctorv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function getStateByCountryIdByJason() {
        $data = array();
        $country_id = $this->input->get('country');
        $doctor_id = $this->input->get('doctor');

        $data['state'] = $this->location_model->getStateByCountryId($country_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($doctor_id);

        echo json_encode($data);        
    }

    public function getCityByStateIdByJason() {
        $data = array();
        $state_id = $this->input->get('state');
        $doctor_id = $this->input->get('doctor');

        $data['city'] = $this->location_model->getCityByStateId($state_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($doctor_id);

        echo json_encode($data);        
    }

    public function getBarangayByCityIdByJason() {
        $data = array();
        $city_id = $this->input->get('city');
        $doctor_id = $this->input->get('doctor');

        $data['barangay'] = $this->location_model->getBarangayByCityId($city_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($doctor_id);

        echo json_encode($data);        
    }

    public function addNewDoctor() {
        if ($this->ion_auth->in_group(array('Patient', 'Doctor', 'Receptionist', 'Accountant', 'Nurse', 'Laboratorist', 'Clerk', 'Midwife'))) {
            redirect('home/permission');
        }
        
        $data = array();
        $data['specialties'] = $this->specialty_model->getSpecialty();
        $data['countries'] = $this->location_model->getCountry();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        // if ($this->ion_auth->in_group(array('Patient', 'Doctor', 'Receptionist', 'Accountant', 'Nurse', 'Laboratorist'))) {
        //     redirect('home/permission');
        // }

        $id = $this->input->post('id');
        $user = $this->ion_auth->get_user_id();
        
        if (empty($id)) {
            $limit = $this->doctor_model->getLimit();
            if ($limit <= 0) {
                $this->session->set_flashdata('warning', lang('doctor_limit_exceed'));
                redirect('doctor');
            }
        }

        $redirect = $this->input->post('redirect');
        $fname = $this->input->post('f_name');
        $lname = $this->input->post('l_name');
        $mname = $this->input->post('m_name');
        $professional_display_name = $this->input->post('professional_display_name');
        $suffix = $this->input->post('suffix');
        if ($suffix== '0') {
            $suffix = null;
        }
        $password = random_string('alnum', 8);
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $specialization = $this->input->post('specialization');
        $profile = $this->input->post('profile');
        $license = $this->input->post('license');
        $tin = $this->input->post('tin');
        $ptr = $this->input->post('ptr');
        $s2 = $this->input->post('s2');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $virtual_consultation_fee = $this->input->post('virtual_consultation_fee');
        $in_person_consultation_fee = $this->input->post('in_person_consultation_fee');

        $name = $fname . ' ' . $mname . ' ' . $lname . ' ' . $suffix;
        $specialization = implode(',', $specialization);

        $emailById = $this->doctor_model->getDoctorById($id)->email;

        $signature = $this->input->post('signature-result');
        $encoded_image = explode(",", $signature)[1];
        $decoded_image = base64_decode($encoded_image);
        file_put_contents("signature.txt", $decoded_image);

        $data_signature = array(
            'signature' => $signature,
        );

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Password Field
        $this->form_validation->set_rules('f_name', 'First Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('l_name', 'Last Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('m_name', 'Middle Name', 'trim|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('professional_display_name', 'Professional Display Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('suffix', 'Suffix', 'trim|min_length[1]|max_length[100]|xss_clean');

        // Validating Email Field
        if ($email !== $emailById) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|is_unique[users.email]|max_length[100]|xss_clean');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|max_length[100]|xss_clean');
        }
        $this->form_validation->set_message('is_unique',lang('this_email_address_is_already_registered'));
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[500]|xss_clean');
        // Validating Country Field   
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required|min_length[1]|max_length[10]|xss_clean');
        // Validating State Field   
        $this->form_validation->set_rules('state_id', 'State', 'trim|required|min_length[1]|max_length[10]|xss_clean');
        // Validating State Field   
        $this->form_validation->set_rules('city_id', 'City', 'trim|required|min_length[1]|max_length[10]|xss_clean');
        // Validating Postal Field   
        $this->form_validation->set_rules('postal', 'Postal', 'trim|alpha_numeric|min_length[1]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[11]|max_length[50]|xss_clean');
        // Validating Department Field   
        $this->form_validation->set_rules('department', 'Department', 'trim|min_length[1]|max_length[500]|xss_clean');
        // Validating Phone Field           
        // $this->form_validation->set_rules('profile', 'Profile', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('specialization[]', 'Specialization', 'required|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('license', 'License Number', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('tin', 'TIN Number', 'trim|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('ptr', 'PTR Number', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('s2', 'S2 Number', 'trim|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('virtual_consultation_fee', 'Virtual Consultation Fee', 'trim|required|numeric|max_length[15]|xss_clean');
        $this->form_validation->set_rules('in_person_consultation_fee', 'In-Person Consultation Fee', 'trim|numeric|required|max_length[15]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                if (empty($redirect)) {
                    $data = array();
                    $data['specialties'] = $this->specialty_model->getSpecialty();
                    $data['departments'] = $this->department_model->getDepartment();
                    $data['doctor'] = $this->doctor_model->getDoctorById($id);
                    $data['doctors'] = $this->doctor_model->getDoctor();
                    $data['countries'] = $this->location_model->getCountry();
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
                $data['specialties'] = $this->specialty_model->getSpecialty();
                $data['departments'] = $this->department_model->getDepartment();
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['countries'] = $this->location_model->getCountry();
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
                $img_url = $this->doctor_model->getDoctorById($id)->img_url;
            }

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/profile/" . $path['file_name'];
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'name' => $name,
                    'firstname' => $fname,
                    'lastname' => $lname,
                    'middlename' => $mname,
                    'professional_display_name' => $professional_display_name,
                    'suffix' => $suffix,
                    'email' => $email,
                    'address' => $address,
                    'country_id' => $country,
                    'state_id' => $state,
                    'city_id' => $city,
                    'barangay_id' => $barangay,
                    'postal' => $postal,
                    'phone' => $phone,
                    'specialties' => $specialization,
                    'profile' => $profile,
                    'license' => $license,
                    'tax_number' => $tin,
                    'tax_receipt_number' => $ptr,
                    'secondary_license_number' => $s2,
                    'virtual_consultation_fee' => $virtual_consultation_fee,
                    'physical_consultation_fee' => $in_person_consultation_fee
                );
            } else {
                $data = array(
                    // 'img_url' => $img_url,
                    'name' => $name,
                    'firstname' => $fname,
                    'lastname' => $lname,
                    'middlename' => $mname,
                    'professional_display_name' => $professional_display_name,
                    'suffix' => $suffix,
                    'email' => $email,
                    'address' => $address,
                    'country_id' => $country,
                    'state_id' => $state,
                    'city_id' => $city,
                    'barangay_id' => $barangay,
                    'postal' => $postal,
                    'phone' => $phone,
                    'specialties' => $specialization,
                    'profile' => $profile,
                    'license' => $license,
                    'tax_number' => $tin,
                    'tax_receipt_number' => $ptr,
                    'secondary_license_number' => $s2,
                    'virtual_consultation_fee' => $virtual_consultation_fee,
                    'physical_consultation_fee' => $in_person_consultation_fee
                );
            }

            if (empty($id)) {     // Adding New Doctor
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                    // $this->session->setTempdata('error', lang('this_email_address_is_already_registered'), 5);
                    $data = array();
                    $data['patient'] = $this->patient_model->getPatientById($id);
                    $data['doctors'] = $this->doctor_model->getDoctor();
                    $data['groups'] = $this->donor_model->getBloodBank();
                    $data['countries'] = $this->location_model->getCountry();
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        // $upload_data = $this->upload->data();
                        // $image_url = "uploads/profile/" . $upload_data['file_name'];
                        // $data2 = array(
                        //     'img_url' => $image_url
                        // );
                        // $data = array_merge($data, $data2);
                        $dfg = 4;
                        $this->ion_auth->register($username, $password, $email, $dfg);
                        $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                        $this->doctor_model->insertDoctor($data);
                        $inserted_id = $this->db->insert_id();
                        $doctor_user_id = $this->db->get_where('doctor', array('email' => $email))->row()->id;
                        $id_info = array('ion_user_id' => $ion_user_id);
                        $this->doctor_model->updateDoctor($doctor_user_id, $id_info);
                        $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);

                        //sms
                        $set['settings'] = $this->settings_model->getSettings();
                        $autosms = $this->sms_model->getAutoSmsByType('doctor');
                        $message = $autosms->message;
                        $to = $phone;
                        $name1 = explode(' ', $name);
                        if (!isset($name1[1])) {
                            $name1[1] = null;
                        }

                        $data_virtual_charge = array(
                            'category' => 'Online Doctor Consultation',
                            'description' => 'Online Doctor Consultation',
                            'c_price' => $virtual_consultation_fee,
                            'd_commission' => 100,
                            'category_id' => 3,
                            'service_category_group_id' => 10,
                            'applicable_staff_id' => $ion_user_id,
                        );

                        $data_in_person_charge = array(
                            'category' => 'Doctor Face-to-Face Consultation',
                            'description' => 'Doctor Face-to-Face Consultation',
                            'c_price' => $in_person_consultation_fee,
                            'd_commission' => 100,
                            'category_id' => 3,
                            'service_category_group_id' => 9,
                            'applicable_staff_id' => $ion_user_id,
                        );

                        $check_virtual_charges = $this->finance_model->checkVirtualChargesListByApplicableStaffId($ion_user_id);
                        $check_physical_charges = $this->finance_model->checkPhysicalChargesListByApplicableStaffId($ion_user_id);

                        if ($check_virtual_charges === 0) {
                            $this->finance_model->insertPaymentCategory($data_virtual_charge);
                        }

                        if ($check_physical_charges === 0) {
                            $this->finance_model->insertPaymentCategory($data_in_person_charge);
                        }

                        $data1 = array(
                            'firstname' => $name1[0],
                            'lastname' => $name1[1],
                            'name' => $name,
                            'email' => $email,
                            'password' => $password,
                            'specialties' => $specialization,
                            'license' => $license,
                            'company' => $set['settings']->system_vendor,
                            'hospital_name' => $set['settings']->title,
                            'hospital_contact' => $set['settings']->phone
                        );

                        if ($autosms->status == 'Active') {
                            $messageprint = $this->parser->parse_string($message, $data1);
                            $data2[] = array($to => $messageprint);
                            $this->sms->sendSms($to, $message, $data2);
                        }
                        //end
                        //email

                        $autoemail = $this->email_model->getAutoEmailByType('doctor');
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
                        
                        $userId = $this->doctor_model->getDoctorById($inserted_id)->ion_user_id;
                        $signature = array(
                            'user_id' => $userId,
                            'signature' => $signature,
                        );

                        $this->doctor_model->insertUserSignatureByUserId($signature);
                        if (empty($redirect)) {
                            redirect('doctor');
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
                            $data['departments'] = $this->department_model->getDepartment();
                            $data['doctor'] = $this->doctor_model->getDoctorById($id);
                            $data['doctors'] = $this->doctor_model->getDoctor();
                            $data['countries'] = $this->location_model->getCountry();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            // $upload_data = $this->upload->data();
                            // $image_url = "uploads/profile/" . $upload_data['file_name'];
                            // $data2 = array(
                            //     'img_url' => $image_url
                            // );
                            // $data = array_merge($data, $data2);
                            $dfg = 4;
                            $this->ion_auth->register($username, $password, $email, $dfg);
                            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                            $this->doctor_model->insertDoctor($data);
                            $inserted_id = $this->db->insert_id();
                            $doctor_user_id = $this->db->get_where('doctor', array('email' => $email))->row()->id;
                            $id_info = array('ion_user_id' => $ion_user_id);
                            $this->doctor_model->updateDoctor($doctor_user_id, $id_info);
                            $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);

                            //sms
                            $set['settings'] = $this->settings_model->getSettings();
                            $autosms = $this->sms_model->getAutoSmsByType('doctor');
                            $message = $autosms->message;
                            $to = $phone;
                            $name1 = explode(' ', $name);
                            if (!isset($name1[1])) {
                                $name1[1] = null;
                            }

                            $data_virtual_charge = array(
                                'category' => 'Online Doctor Consultation',
                                'description' => 'Online Doctor Consultation',
                                'c_price' => $virtual_consultation_fee,
                                'd_commission' => 100,
                                'category_id' => 3,
                                'service_category_group_id' => 10,
                                'applicable_staff_id' => $ion_user_id,
                            );

                            $data_in_person_charge = array(
                                'category' => 'Doctor Face-to-Face Consultation',
                                'description' => 'Doctor Face-to-Face Consultation',
                                'c_price' => $in_person_consultation_fee,
                                'd_commission' => 100,
                                'category_id' => 3,
                                'service_category_group_id' => 9,
                                'applicable_staff_id' => $ion_user_id,
                            );

                            $check_virtual_charges = $this->finance_model->checkVirtualChargesListByApplicableStaffId($ion_user_id);
                            $check_physical_charges = $this->finance_model->checkPhysicalChargesListByApplicableStaffId($ion_user_id);

                            if ($check_virtual_charges === 0) {
                                $this->finance_model->insertPaymentCategory($data_virtual_charge);
                            }

                            if ($check_physical_charges === 0) {
                                $this->finance_model->insertPaymentCategory($data_in_person_charge);
                            }

                            $data1 = array(
                                'firstname' => $name1[0],
                                'lastname' => $name1[1],
                                'name' => $name,
                                'email' => $email,
                                'password' => $password,
                                'specialties' => $specialization,
                                'license' => $license,
                                'company' => $set['settings']->system_vendor,
                                'hospital_name' => $set['settings']->title,
                                'hospital_contact' => $set['settings']->phone
                            );

                            if ($autosms->status == 'Active') {
                                $messageprint = $this->parser->parse_string($message, $data1);
                                $data2[] = array($to => $messageprint);
                                $this->sms->sendSms($to, $message, $data2);
                            }
                            //end
                            //email

                            $autoemail = $this->email_model->getAutoEmailByType('doctor');
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

                            $userId = $this->doctor_model->getDoctorById($inserted_id)->ion_user_id;
                            $signature = array(
                                'user_id' => $userId,
                                'signature' => $signature,
                            );

                            $this->doctor_model->insertUserSignatureByUserId($signature);

                            if (empty($redirect)) {
                                redirect('doctor');
                            } else {
                                redirect($redirect);
                            }
                        }

                        
                    }

                    
                }
            } else { // Updating Doctor
                // $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                // $this->session->set_flashdata('fileError', $fileError);
                if ($email !== $emailById) {
                    if ($this->ion_auth->email_check($email)) {
                        $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                        $data = array();
                        $data['patient'] = $this->patient_model->getPatientById($id);
                        $data['doctors'] = $this->doctor_model->getDoctor();
                        $data['groups'] = $this->donor_model->getBloodBank();
                        $data['countries'] = $this->location_model->getCountry();
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('add_newv2', $data);
                        // $this->load->view('home/footer'); // just the footer file
                    } else {
                        if ($this->upload->do_upload('img_url')) {
                            // $upload_data = $this->upload->data();
                            // $image_url = "uploads/profile/" . $upload_data['file_name'];
                            // $data2 = array(
                            //     'img_url' => $image_url
                            // );
                            // $data = array_merge($data, $data2);
                            $ion_user_id = $this->db->get_where('doctor', array('id' => $id))->row()->ion_user_id;
                            // if (empty($password)) {
                            //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            // } else {
                            //     $password = $this->ion_auth_model->hash_password($password);
                            // }

                            $data_virtual_charge = array(
                                'category' => 'Online Doctor Consultation',
                                'description' => 'Online Doctor Consultation',
                                'c_price' => $virtual_consultation_fee,
                                'd_commission' => 100,
                                'category_id' => 3,
                                'service_category_group_id' => 10,
                                'applicable_staff_id' => $ion_user_id,
                            );

                            $data_in_person_charge = array(
                                'category' => 'Doctor Face-to-Face Consultation',
                                'description' => 'Doctor Face-to-Face Consultation',
                                'c_price' => $in_person_consultation_fee,
                                'd_commission' => 100,
                                'category_id' => 3,
                                'service_category_group_id' => 9,
                                'applicable_staff_id' => $ion_user_id,
                            );

                            $check_virtual_charges = $this->finance_model->checkVirtualChargesListByApplicableStaffId($ion_user_id);
                            $check_physical_charges = $this->finance_model->checkPhysicalChargesListByApplicableStaffId($ion_user_id);

                            if ($check_virtual_charges === 0) {
                                $this->finance_model->insertPaymentCategory($data_virtual_charge);
                            }

                            if ($check_physical_charges === 0) {
                                $this->finance_model->insertPaymentCategory($data_in_person_charge);
                            }

                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            $this->doctor_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->doctor_model->updateDoctor($id, $data);
                            $this->doctor_model->updateUserSignatureByUserId($user, $data_signature);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (empty($redirect)) {
                                redirect('doctor');
                            } else {
                                redirect($redirect);
                            }
                        } else {
                            //additional validation for uploading file in update modal if email not exist
                            if ($_FILES['img_url']['size'] > $config['max_size']) {
                                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                                $this->session->set_flashdata('fileError', $fileError);
                                $this->session->set_flashdata('error', lang('validation_error'));
                                $data = array();
                                $data['setval'] = 'setval';
                                $data['departments'] = $this->department_model->getDepartment();
                                $data['doctor'] = $this->doctor_model->getDoctorById($id);
                                $data['doctors'] = $this->doctor_model->getDoctor();
                                $data['countries'] = $this->location_model->getCountry();
                                $this->load->view('home/dashboardv2'); // just the header file
                                $this->load->view('add_newv2', $data);
                                // $this->load->view('home/footer'); // just the footer file
                            } else {
                                // $upload_data = $this->upload->data();
                                // $image_url = "uploads/profile/" . $upload_data['file_name'];
                                // $data2 = array(
                                //     'img_url' => $image_url
                                // );
                                // $data = array_merge($data, $data2);
                                $ion_user_id = $this->db->get_where('doctor', array('id' => $id))->row()->ion_user_id;
                                // if (empty($password)) {
                                //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                                // } else {
                                //     $password = $this->ion_auth_model->hash_password($password);
                                // }

                                $data_virtual_charge = array(
                                    'category' => 'Online Doctor Consultation',
                                    'description' => 'Online Doctor Consultation',
                                    'c_price' => $virtual_consultation_fee,
                                    'd_commission' => 100,
                                    'category_id' => 3,
                                    'service_category_group_id' => 10,
                                    'applicable_staff_id' => $ion_user_id,
                                );

                                $data_in_person_charge = array(
                                    'category' => 'Doctor Face-to-Face Consultation',
                                    'description' => 'Doctor Face-to-Face Consultation',
                                    'c_price' => $in_person_consultation_fee,
                                    'd_commission' => 100,
                                    'category_id' => 3,
                                    'service_category_group_id' => 9,
                                    'applicable_staff_id' => $ion_user_id,
                                );

                                $check_virtual_charges = $this->finance_model->checkVirtualChargesListByApplicableStaffId($ion_user_id);
                                $check_physical_charges = $this->finance_model->checkPhysicalChargesListByApplicableStaffId($ion_user_id);

                                if ($check_virtual_charges === 0) {
                                    $this->finance_model->insertPaymentCategory($data_virtual_charge);
                                }

                                if ($check_physical_charges === 0) {
                                    $this->finance_model->insertPaymentCategory($data_in_person_charge);
                                }

                                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                                $this->doctor_model->updateIonUser($username, $email, $password, $ion_user_id);
                                $this->doctor_model->updateDoctor($id, $data);
                                $this->doctor_model->updateUserSignatureByUserId($user, $data_signature);
                                $this->session->set_flashdata('success', lang('record_updated'));
                                if (empty($redirect)) {
                                    redirect('doctor');
                                } else {
                                    redirect($redirect);
                                }
                            }
                            
                        }
                        
                    }
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        // $upload_data = $this->upload->data();
                        // $image_url = "uploads/profile/" . $upload_data['file_name'];
                        // $data2 = array(
                        //     'img_url' => $image_url
                        // );
                        // $data = array_merge($data, $data2);
                        $ion_user_id = $this->db->get_where('doctor', array('id' => $id))->row()->ion_user_id;
                        // if (empty($password)) {
                        //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        // } else {
                        //     $password = $this->ion_auth_model->hash_password($password);
                        // }

                        $data_virtual_charge = array(
                            'category' => 'Online Doctor Consultation',
                            'description' => 'Online Doctor Consultation',
                            'c_price' => $virtual_consultation_fee,
                            'd_commission' => 100,
                            'category_id' => 3,
                            'service_category_group_id' => 10,
                            'applicable_staff_id' => $ion_user_id,
                        );

                        $data_in_person_charge = array(
                            'category' => 'Doctor Face-to-Face Consultation',
                            'description' => 'Doctor Face-to-Face Consultation',
                            'c_price' => $in_person_consultation_fee,
                            'd_commission' => 100,
                            'category_id' => 3,
                            'service_category_group_id' => 9,
                            'applicable_staff_id' => $ion_user_id,
                        );

                        $check_virtual_charges = $this->finance_model->checkVirtualChargesListByApplicableStaffId($ion_user_id);
                        $check_physical_charges = $this->finance_model->checkPhysicalChargesListByApplicableStaffId($ion_user_id);

                        if ($check_virtual_charges === 0) {
                            $this->finance_model->insertPaymentCategory($data_virtual_charge);
                        }

                        if ($check_physical_charges === 0) {
                            $this->finance_model->insertPaymentCategory($data_in_person_charge);
                        }

                        $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        $this->doctor_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->doctor_model->updateDoctor($id, $data);
                        $this->doctor_model->updateUserSignatureByUserId($user, $data_signature);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        if (empty($redirect)) {
                            redirect('doctor');
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
                            $data['departments'] = $this->department_model->getDepartment();
                            $data['doctor'] = $this->doctor_model->getDoctorById($id);
                            $data['doctors'] = $this->doctor_model->getDoctor();
                            $data['countries'] = $this->location_model->getCountry();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            // $upload_data = $this->upload->data();
                            // $image_url = "uploads/profile/" . $upload_data['file_name'];
                            // $data2 = array(
                            //     'img_url' => $image_url
                            // );
                            // $data = array_merge($data, $data2);
                            $ion_user_id = $this->db->get_where('doctor', array('id' => $id))->row()->ion_user_id;
                            // if (empty($password)) {
                            //     $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            // } else {
                            //     $password = $this->ion_auth_model->hash_password($password);
                            // }

                            $data_virtual_charge = array(
                                'category' => 'Online Doctor Consultation',
                                'description' => 'Online Doctor Consultation',
                                'c_price' => $virtual_consultation_fee,
                                'd_commission' => 100,
                                'category_id' => 3,
                                'service_category_group_id' => 10,
                                'applicable_staff_id' => $ion_user_id,
                            );

                            $data_in_person_charge = array(
                                'category' => 'Doctor Face-to-Face Consultation',
                                'description' => 'Doctor Face-to-Face Consultation',
                                'c_price' => $in_person_consultation_fee,
                                'd_commission' => 100,
                                'category_id' => 3,
                                'service_category_group_id' => 9,
                                'applicable_staff_id' => $ion_user_id,
                            );

                            $check_virtual_charges = $this->finance_model->checkVirtualChargesListByApplicableStaffId($ion_user_id);
                            $check_physical_charges = $this->finance_model->checkPhysicalChargesListByApplicableStaffId($ion_user_id);

                            if ($check_virtual_charges === 0) {
                                $this->finance_model->insertPaymentCategory($data_virtual_charge);
                            }

                            if ($check_physical_charges === 0) {
                                $this->finance_model->insertPaymentCategory($data_in_person_charge);
                            }

                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            $this->doctor_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->doctor_model->updateDoctor($id, $data);
                            $this->doctor_model->updateUserSignatureByUserId($user, $data_signature);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (empty($redirect)) {
                                redirect('doctor');
                            } else {
                                redirect($redirect);
                            }
                        }
                    }
                }
            }
            // Loading View
        }
    }

    function editDoctor() {
        $data = array();
        $data['departments'] = $this->department_model->getDepartment();
        $id = $this->input->get('id');
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['countries'] = $this->location_model->getCountry();
        // $data['states'] = $this->location_model->getState();
        // $data['cities'] = $this->location_model->getCity();
        // $data['barangays'] = $this->location_model->getBarangay();
        $data['specialties'] = $this->specialty_model->getSpecialty();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);        
        //$this->load->view('home/footer'); // just the footer file
    }

    function editProfile() {
        $data = array();
        $data['departments'] = $this->department_model->getDepartment();
        $user = $this->ion_auth->get_user_id();
        $id = $this->doctor_model->getDoctorByIonUserId($user)->id;
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['countries'] = $this->location_model->getCountry();
        $data['redirect'] = 'doctor/editProfile';
        // $data['states'] = $this->location_model->getState();
        // $data['cities'] = $this->location_model->getCity();
        // $data['barangays'] = $this->location_model->getBarangay();
        $data['specialties'] = $this->specialty_model->getSpecialty();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);        
        //$this->load->view('home/footer'); // just the footer file
    }

    function details() {

        $data = array();

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $id = $this->doctor_model->getDoctorByIonUserId($doctor_ion_id)->id;
        } else {
            redirect('home/permission');
        }


        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $data['todays_appointments'] = $this->appointment_model->getAppointmentByDoctorByToday($id);
        $data['appointments'] = $this->appointment_model->getAppointmentByDoctor($id);
        $data['patients'] = $this->patient_model->getPatient();
        $date_from = strtotime(gmdate("Y-m-d"));
        $data['upcoming_appointments'] = $this->appointment_model->getAppointmentByDoctorByDate($id, $date_from, null);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctorId($id);
        $data['holidays'] = $this->schedule_model->getHolidaysByDoctor($id);
        $data['schedules'] = $this->schedule_model->getScheduleByDoctor($id, null);
        $today = date('Y-m-d');
        $data['encounters'] = $this->encounter_model->getEncounter($today);
        // $data['encounter_status'] = $this->encounter_model->getEncounterStatus();

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('detailsv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editDoctorByJason() {
        $id = $this->input->get('id');
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $doctor_specialty = $data['doctor']->specialties;
        $data['doctor_specialties'] = $this->getSpecialtyListArray($doctor_specialty);
        $specialties = [];
        $settings = $this->settings_model->getSettings();
        // foreach ($doctor_specialties as $d_specialty) {
        //     $specialties[] = $d_specialty->id;
        // }
        $data['currency'] = $settings->currency;
        // $data['specialties'] = implode(', ', $specialties);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $country_id = $data['doctor']->country_id;
        $state_id = $data['doctor']->state_id;
        $city_id = $data['doctor']->city_id;
        $barangay_id = $data['doctor']->barangay_id;

        $data['country']= $this->location_model->getCountryById($country_id);
        $data['state']= $this->location_model->getStateById($state_id);
        $data['city']= $this->location_model->getCityById($city_id);
        $data['barangay']= $this->location_model->getBarangayById($barangay_id);
        echo json_encode($data);
    }

    function delete() {

        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('doctor', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->doctor_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('doctor');
    }

    function getDoctor() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $settings = $this->settings_model->getSettings();

        if ($limit == -1) {
            if (!empty($search)) {
                $data['doctors'] = $this->doctor_model->getDoctorBysearch($search);
            } else {
                $data['doctors'] = $this->doctor_model->getDoctor();
            }
        } else {
            if (!empty($search)) {
                $data['doctors'] = $this->doctor_model->getDoctorByLimitBySearch($limit, $start, $search);
            } else {
                $data['doctors'] = $this->doctor_model->getDoctorByLimit($limit, $start);
            }
        }
        //  $data['doctors'] = $this->doctor_model->getDoctor();

        foreach ($data['doctors'] as $doctor) {
            $specializations = explode(',', $doctor->specialties);
            $specialties = [];
            foreach ($specializations as $specialization) {
                $specialty_name = $this->specialty_model->getSpecialtyById($specialization);
                $specialties[] = $specialty_name->display_name_ph;
            }

            $specialty_names = implode('<br>', $specialties);
            $consultation_fee = '<label><strong>Virtual:</strong> '. $settings->currency . ' ' . number_format($doctor->virtual_consultation_fee,2) .'</label><br>
                                <label><strong>In-Person:</strong> '. $settings->currency . ' ' . number_format($doctor->physical_consultation_fee,2) .'</label>';

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options1 = '<a type="button" class="btn btn-info btn-xs btn_width" title="' . lang('edit') . '" href="doctor/editDoctor?id=' . $doctor->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
                //   $options1 = '<a class="btn btn-info btn-xs btn_width" title="' . lang('edit') . '" href="doctor/editDoctor?id='.$doctor->id.'"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }
            $options2 = '<a class="btn btn-info btn-xs" title="' . lang('appointments') . '"  href="appointment/getAppointmentByDoctorId?id=' . $doctor->id . '"> <i class="fa fa-calendar"> </i> ' . lang('appointments') . '</a>';
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options3 = '<a class="btn btn-danger btn-xs btn_width delete_button" title="' . lang('delete') . '" href="doctor/delete?id=' . $doctor->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
            }



            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options4 = '<a href="schedule/holidays?doctor=' . $doctor->id . '" class="btn btn-info btn-xs" data-id="' . $doctor->id . '"><i class="fa fa-book"></i> ' . lang('holiday') . '</a>';
                $options5 = '<a href="schedule/timeSchedule?doctor=' . $doctor->id . '" class="btn btn-info btn-xs" data-id="' . $doctor->id . '"><i class="fa fa-book"></i> ' . lang('time_schedule') . '</a>';
                $options6 = '<a type="button" class="btn btn-info btn-xs btn_width inffo" title="' . lang('info') . '" data-toggle="modal" data-id="' . $doctor->id . '"><i class="fa fa-info"> </i> ' . lang('info') . '</a>';
            }

            if (file_exists($doctor->img_url) === true) {
                $img_url = $doctor->img_url;
            } else {
                $img_url = 'public/assets/images/users/placeholder.jpg';
            }

            $info[] = array(
                '<img style="width:95%;" src="'.$img_url.'">',
                $doctor->name.' (ID: '. $doctor->id .')',
                $doctor->email,
                $doctor->phone,
                $specialty_names,
                $consultation_fee,
                //  $options1 . ' ' . $options2 . ' ' . $options3,
                '<div class="btn-list">'. $options6 . ' ' . $options1 . ' ' . $options2 . ' ' . $options4 . ' ' . $options5 . ' ' . $options3 . '</div>',
                    //  $options2
            );
        }

        if (!empty($data['doctors'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->doctor_model->getDoctorCount(),
                "recordsFiltered" => $this->doctor_model->getDoctorBySearchCount($search),
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

    public function getDoctorInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->doctor_model->getDoctorInfo($searchTerm);

        echo json_encode($response);
    }

    public function getDoctorInfoByCountry() {
// Search term
        $searchTerm = $this->input->post('searchTerm');
        $provider = $this->input->get('provider');
        $patient_ion_id = $this->ion_auth->get_user_id();
        $country_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->country_id;
// Get users
        $response = $this->doctor_model->getDoctorInfoByCountry($searchTerm, $country_id, $provider);

        echo json_encode($response);
    }

    public function getSpecialtyInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->specialty_model->getSpecialtyInfo($searchTerm);

        echo json_encode($response);
    }

    public function getDoctorWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->doctor_model->getDoctorWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getSpecialtyListArray($specialtyString) {

        if(!empty($specialtyString)) {
            $doctors = explode(',', $specialtyString);
            foreach ($doctors as $doctor) {
                $specialtyDictionary = $this->specialty_model->getSpecialtyById($doctor);
                $specialtyListArray[] = $specialtyDictionary;
            }
            return $specialtyListArray;
        } else {
            return '';
        }


    }

    public function getDoctorById() {
        $data = array();
        $id = $this->input->get('id');
        $service_category = $this->input->get('service_category');

        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $doctor_specialty = $data['doctor']->specialties;
        $data['specialties'] = $this->getSpecialtyListArray($doctor_specialty);
        $is_virtual = $this->finance_model->getServiceCategoryGroupById($service_category)->is_virtual;
        $data['branches'] = $this->branch_model->getBranchByHospitalId($data['doctor']->hospital_id);

        if (!empty($is_virtual)) {
            $data['consultation_fee'] = $data['doctor']->virtual_consultation_fee;
        } else {
            $data['consultation_fee'] = $data['doctor']->physical_consultation_fee;
        }

        echo json_encode($data);        
    }

}

/* End of file doctor.php */
/* Location: ./application/modules/doctor/controllers/doctor.php */