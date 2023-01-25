<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin_model');
        $this->load->model('nurse/nurse_model');
        $this->load->model('department/department_model');
        $this->load->model('specialty/specialty_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('patient/patient_model');
        $this->load->model('prescription/prescription_model');
        $this->load->model('schedule/schedule_model');
        $this->load->module('patient');
        $this->load->module('sms');
        $this->load->model('location/location_model');
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist', 'Nurse', 'Laboratorist', 'Patient'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $data['admins'] = $this->admin_model->getAdmin();
        $this->load->view('home/dashboardv2');
        $this->load->view('admin', $data);
    }

    public function getStateByCountryIdByJason() {
        $data = array();
        $country_id = $this->input->get('country');
        $admin_id = $this->input->get('admin');

        $data['state'] = $this->location_model->getStateByCountryId($country_id);
        $data['admin'] = $this->admin_model->getAdminById($admin_id);

        echo json_encode($data);        
    }

    public function getCityByStateIdByJason() {
        $data = array();
        $state_id = $this->input->get('state');
        $admin_id = $this->input->get('admin');

        $data['city'] = $this->location_model->getCityByStateId($state_id);
        $data['admin'] = $this->admin_model->getAdminById($admin_id);

        echo json_encode($data);        
    }

    public function getBarangayByCityIdByJason() {
        $data = array();
        $city_id = $this->input->get('city');
        $admin_id = $this->input->get('admin');

        $data['barangay'] = $this->location_model->getBarangayByCityId($city_id);
        $data['admin'] = $this->admin_model->getAdminById($admin_id);

        echo json_encode($data);        
    }

    public function addNewView() {
        if ($this->ion_auth->in_group(array('Patient', 'Doctor', 'Receptionist', 'Accountant', 'Nurse', 'Laboratorist'))) {
            redirect('home/permission');
        }
        
        $data = array();
        $data['countries'] = $this->location_model->getCountry();
        $data['admin'] = null;
        $data['redirect'] = null;
        $data['setval'] = null;
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_new', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        if ($this->ion_auth->in_group(array('Patient', 'Doctor', 'Receptionist', 'Accountant', 'Nurse', 'Laboratorist'))) {
            redirect('home/permission');
        }

        $id = $this->input->post('id');
        $fname = $this->input->post('fname');
        $mname = $this->input->post('mname');
        $lname = $this->input->post('lname');
        $suffix = $this->input->post('suffix');
        $password = random_string('alnum', 8);
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $redirect = $this->input->post('redirect');

        $emailById = $this->admin_model->getAdminById($id)->email;

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

        if ($email !== $emailById) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|is_unique[users.email]|max_length[100]|xss_clean');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|max_length[100]|xss_clean');
        }

        $this->form_validation->set_message('is_unique',lang('this_email_address_is_already_registered'));
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('country_id', 'Country', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('state_id', 'State', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('city_id', 'City', 'trim|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['admin'] = $this->admin_model->getAdminById($id);
                $data['admins'] = $this->admin_model->getAdmin();
                $data['countries'] = $this->location_model->getCountry();
                $data['redirect'] = null;
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_new', $data);
                // $this->load->view('home/footer'); // just the footer file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['setval'] = 'setval';
                $data['admins'] = $this->admin_model->getAdmin();
                $data['countries'] = $this->location_model->getCountry();
                $data['redirect'] = null;
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_new', $data);
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
                'upload_path' => "./uploads/",
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
                $img_url = "uploads/" . $path['file_name'];
            } else {
                $img_url = $this->admin_model->getAdminById($id)->img_url;
            }

            $data = array();
            $data = array(
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
                'phone' => $phone,
            );

            if (empty($id)) {     // Adding New Doctor
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                    // $this->session->setTempdata('error', lang('this_email_address_is_already_registered'), 5);
                    $data = array();
                    $data['setval'] = 'setval';
                    $data['admin'] = $this->admin_model->getAdminById($id);
                    $data['admins'] = $this->admin_model->getAdmin();
                    $data['countries'] = $this->location_model->getCountry();
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_new', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    if ($this->upload->do_upload('img_url')) {

                        $dfg = 11;
                        $this->ion_auth->register($username, $password, $email, $dfg);
                        $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                        $this->admin_model->insertAdmin($data);
                        $inserted_id = $this->db->insert_id();
                        $admin_user_id = $this->db->get_where('admin', array('email' => $email))->row()->id;
                        $id_info = array('ion_user_id' => $ion_user_id);
                        $this->admin_model->updateAdmin($admin_user_id, $id_info);
                        $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);

                        //sms
                        $set['settings'] = $this->settings_model->getSettings();
                        $autosms = $this->sms_model->getAutoSmsByType('admin');
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

                        $autoemail = $this->email_model->getAutoEmailByType('admin');
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
                        if (!empty($redirect)) {
                            redirect($redirect);
                        } else {
                            redirect('admin');
                        }
                    } else {
                        //additional validation for uploading file in add modal
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            $this->session->set_flashdata('fileError', $fileError);
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            $data['setval'] = 'setval';
                            $data['admin'] = $this->admin_model->getAdminById($id);
                            $data['admins'] = $this->admin_model->getAdmin();
                            $data['countries'] = $this->location_model->getCountry();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_new', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            $dfg = 11;
                            $this->ion_auth->register($username, $password, $email, $dfg);
                            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                            $this->admin_model->insertAdmin($data);
                            $inserted_id = $this->db->insert_id();
                            $admin_user_id = $this->db->get_where('admin', array('email' => $email))->row()->id;
                            $id_info = array('ion_user_id' => $ion_user_id);
                            $this->admin_model->updateAdmin($admin_user_id, $id_info);
                            $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);

                            //sms
                            $set['settings'] = $this->settings_model->getSettings();
                            $autosms = $this->sms_model->getAutoSmsByType('admin');
                            $message = $autosms->message;
                            $to = $phone;
                            $name1 = explode(' ', $name);
                            if (!isset($name1[1])) {
                                $name1[1] = null;
                            }
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

                            if ($autosms->status == 'Active') {
                                $messageprint = $this->parser->parse_string($message, $data1);
                                $data2[] = array($to => $messageprint);
                                $this->sms->sendSms($to, $message, $data2);
                            }
                            //end
                            //email

                            $autoemail = $this->email_model->getAutoEmailByType('admin');
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
                            if (!empty($redirect)) {
                                redirect($redirect);
                            } else {
                                redirect('admin');
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
                        $data['setval'] = 'setval';
                        $data['admin'] = $this->admin_model->getAdminById($id);
                        $data['admins'] = $this->admin_model->getAdmin();
                        $data['countries'] = $this->location_model->getCountry();
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('add_new', $data);
                        // $this->load->view('home/footer'); // just the footer file
                    } else {
                        if ($this->upload->do_upload('img_url')) {

                            $ion_user_id = $this->db->get_where('admin', array('id' => $id))->row()->ion_user_id;
                            
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;

                            $this->admin_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->admin_model->updateAdmin($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (!empty($redirect)) {
                                redirect($redirect);
                            } else {
                                redirect('admin');
                            }
                        } else {
                            //additional validation for uploading file in update modal if email not exist
                            if ($_FILES['img_url']['size'] > $config['max_size']) {
                                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                                $this->session->set_flashdata('fileError', $fileError);
                                $this->session->set_flashdata('error', lang('validation_error'));
                                $data = array();
                                $data['admin'] = $this->admin_model->getAdminById($id);
                                $data['admins'] = $this->admin_model->getAdmin();
                                $data['countries'] = $this->location_model->getCountry();
                                $this->load->view('home/dashboardv2'); // just the header file
                                $this->load->view('add_new', $data);
                                // $this->load->view('home/footer'); // just the footer file
                            } else {
                                $ion_user_id = $this->db->get_where('admin', array('id' => $id))->row()->ion_user_id;
                                
                                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;

                                $this->admin_model->updateIonUser($username, $email, $password, $ion_user_id);
                                $this->admin_model->updateAdmin($id, $data);
                                $this->session->set_flashdata('success', lang('record_updated'));
                                if (!empty($redirect)) {
                                    redirect($redirect);
                                } else {
                                    redirect('admin');
                                }
                            }
                            
                        }
                        
                    }
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        
                        $ion_user_id = $this->db->get_where('admin', array('id' => $id))->row()->ion_user_id;
                        
                        $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;

                        $this->admin_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->admin_model->updateAdmin($id, $data);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        if (!empty($redirect)) {
                            redirect($redirect);
                        } else {
                            redirect('admin');
                        }
                    } else {
                        //additional validation for uploading file in update modal if email exist
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            $this->session->set_flashdata('fileError', $fileError);
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            $data['setval'] = 'setval';
                            $data['admin'] = $this->admin_model->getAdminById($id);
                            $data['admins'] = $this->admin_model->getAdmin();
                            $data['countries'] = $this->location_model->getCountry();
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_new', $data);
                            // $this->load->view('home/footer'); // just the footer file
                        } else {
                            $ion_user_id = $this->db->get_where('admin', array('id' => $id))->row()->ion_user_id;
                            
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                            
                            $this->admin_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->admin_model->updateAdmin($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (!empty($redirect)) {
                                redirect($redirect);
                            } else {
                                redirect('admin');
                            }
                        }
                    }
                }
            }
            // Loading View
        }
    }

    function editAdmin() {
        $data = array();
        $id = $this->input->get('id');
        $data['countries'] = $this->location_model->getCountry();
        $data['admin'] = $this->admin_model->getAdminById($id);
        $data['redirect'] = null;
        $data['setval'] = null;
        // $data['states'] = $this->location_model->getState();
        // $data['cities'] = $this->location_model->getCity();
        // $data['barangays'] = $this->location_model->getBarangay();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_new', $data);
        // $this->load->view('home/footer'); // just the footer file
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
        $data['appointment_patients'] = $this->patient->getPatientByAppointmentByDctorId($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctorId($id);
        $data['holidays'] = $this->schedule_model->getHolidaysByDoctor($id);
        $data['schedules'] = $this->schedule_model->getScheduleByDoctor($id, $location);



        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('detailsv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editAdminByJason() {
        $id = $this->input->get('id');
        $data['admin'] = $this->admin_model->getAdminById($id);
        $country_id = $data['admin']->country_id;
        $state_id = $data['admin']->state_id;
        $city_id = $data['admin']->city_id;
        $barangay_id = $data['admin']->barangay_id;

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
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options1 = '<a type="button" class="btn btn-info btn-xs btn_width editbutton" title="' . lang('edit') . '" data-toggle="modal" data-id="' . $doctor->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
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

            $info[] = array(
                $doctor->id,
                $doctor->name,
                $doctor->email,
                $doctor->phone,
                $doctor->department,
                $doctor->profile,
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
        $patient_ion_id = $this->ion_auth->get_user_id();
        $country_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->country_id;
// Get users
        $response = $this->doctor_model->getDoctorInfoByCountry($searchTerm, $country_id);

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

        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $doctor_specialty = $data['doctor']->specialties;
        $data['specialties'] = $this->getSpecialtyListArray($doctor_specialty);

        echo json_encode($data);        
    }

    public function editProfile() {
        $data = array();
        $user = $this->ion_auth->get_user_id();
        $id = $this->admin_model->getAdminByIonUserId($user)->id;
        $data['admin'] = $this->admin_model->getAdminById($id);
        $data['countries'] = $this->location_model->getCountry();
        $data['redirect'] = 'admin/editProfile';
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_new', $data);        
        //$this->load->view('home/footer'); // just the footer file
    }

}

/* End of file doctor.php */
/* Location: ./application/modules/doctor/controllers/doctor.php */