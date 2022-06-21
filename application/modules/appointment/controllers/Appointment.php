<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appointment extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('branch/branch_model');
        $this->load->model('appointment_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('sms/sms_model');
        $this->load->module('sms');
        $this->load->model('location/location_model');
        $this->load->model('service/service_model');
        $this->load->model('encounter/encounter_model');
        $this->load->model('finance/finance_model');
        if (!$this->ion_auth->in_group(array('admin', 'Nurse', 'Doctor', 'Patient', 'Receptionist'))) {
            redirect('home/permission');
        }
    }

    public function index() {

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }



        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('appointmentv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function bookConsultation() {
        if (!$this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        $data['id'] = $this->input->get('id');
        $data['doctor_id'] = $this->input->get('doctor_id');
        $data['provider'] = $this->input->get('provider_id');
        $data['doctor'] = $this->doctor_model->getDoctorByIdFromConsultation($data['doctor_id']);

        // $data['branches'] = $this->branch_model->getBranches();
        $data['settings'] = $this->settings_model->getSettings();
        $barangay_id = $data['settings']->barangay_id;
        $state_id = $data['settings']->state_id;
        $city_id = $data['settings']->city_id;
        $country_id = $data['settings']->country_id;

        $data['state'] = $this->location_model->getStateById($state_id);
        $data['city'] = $this->location_model->getCityById($city_id);
        $data['barangay'] = $this->location_model->getBarangayById($barangay_id);
        $data['country'] = $this->location_model->getCountryById($country_id);
        $patient_ion_id = $this->ion_auth->get_user_id();
        $data['patient_id'] = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;

        $this->load->view('home/dashboardv2');
        $this->load->view('book_consultation',$data);
    }

    public function request() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('appointment_requestv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function todays() {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }


        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('todaysv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function upcoming() {

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('upcomingv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function myTodays() {
        if (!$this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }


        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('my_todaysv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function calendar() {

        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) {
            redirect('home/permission');
        }

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            $data['appointments'] = $this->appointment_model->getAppointmentByDoctor($doctor);
        } else {
            $data['appointments'] = $this->appointment_model->getAppointment();
        }

        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('calendarv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {

        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist', 'Patient'))) {
            redirect('home/permission');
        }
        $redirect = $this->input->get('redirect');
        $patient = $this->input->get('patient_id');
        $data['encounter'] = $this->input->get('encounter_id');
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        if (!empty($root) && !empty($method)) {
            $redirect = $root.'/'.$method.'?id='.$patient.'&encounter_id='.$data['encounter'];
        }
        $data['redirect'] = $redirect;
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist', 'Patient'))) {
            redirect('home/permission');
        }

        $id = $this->input->post('id');
        $patient = $this->input->post('patient');
        $doctor = $this->input->post('doctor');
        $date = $this->input->post('date');
        $service_category_group = $this->input->post('service_category_group');
        $service = $this->input->post('service');
        $location = $this->input->post('branch');
        $appointment_registration = gmdate('Y-m-d H:i:s');
        $staff = $this->input->post('staff');
        $encounter_id = $this->input->post('encounter_id');

        if (empty($encounter_id)) {
            $encounter_id = null;
        }

        $virtual = $this->appointment_model->getServiceCategoryById($service_category_group)->is_virtual;

        if (!empty($virtual)) {
            $service_type = "Virtual";
        } else {
            $service_type = "Inperson";
        }

        $time_slot = $this->input->post('time_slot');

        $time_slot_explode = explode('To', $time_slot);

        $s_time = trim($time_slot_explode[0]);
        $e_time = trim($time_slot_explode[1]);

        $date1 = $date;
        if (!empty($date)) {
            $date = strtotime($date);
        }

        $date_time_combined = strtotime($date1 . ' ' . $s_time);

        $appointment_date = gmdate('Y-m-d H:i:s', $date_time_combined);

        $remarks = $this->input->post('remarks');

        $sms = $this->input->post('sms');

        $status = $this->input->post('status');

        $redirect = $this->input->post('redirect');

        $request = $this->input->post('request');

        if (empty($request)) {
            $request = '';
        }


        $user = $this->ion_auth->get_user_id();

        // if ($this->ion_auth->in_group(array('Patient'))) {
        //     $user = '';
        // }



        if ((empty($id))) {
            $add_date = date('m/d/y');
            $registration_time = time();
            $patient_add_date = $add_date;
            $patient_registration_time = $registration_time;
        } else {
            $add_date = $this->appointment_model->getAppointmentById($id)->add_date;
            $registration_time = $this->appointment_model->getAppointmentById($id)->registration_time;
        }

        $s_time_key = $this->getArrayKey($s_time);


        $p_name = $this->input->post('p_name');
        $p_email = $this->input->post('p_email');
        if (empty($p_email)) {
            $p_email = $p_name . '-' . rand(1, 1000) . '-' . $p_name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($p_name)) {
            $password = $p_name . '-' . rand(1, 100000000);
        }
        $p_phone = $this->input->post('p_phone');
        $p_age = $this->input->post('p_age');
        $p_gender = $this->input->post('p_gender');
        $patient_id = rand(10000, 1000000);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($patient == 'add_new') {
            $this->form_validation->set_rules('p_name', 'Patient Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('p_phone', 'Patient Phone', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('p_email', 'Email', 'trim|required|valid_email|min_length[1]|max_length[1000]|xss_clean');
            $this->form_validation->set_rules('p_age', 'Age', 'trim|numeric|required|min_length[1]|max_length[100]|xss_clean');
        }

        // Validating Name Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('doctor', 'Doctor', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field

        if ($time_slot == 'Not Selected') {
                $this->form_validation->set_rules('time_slot', 'Timeslot', 'trim|required|check_default|xss_clean');
                $this->form_validation->set_message('check_default', lang('time_slot_not_selected_error'));
        }

        // Validating Email Field
        $this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('s_time', 'Start Time', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('e_time', 'End Time', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('remarks', 'Remarks', 'trim|min_length[1]|max_length[500]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();
                // $id = $this->input->get('id');
                $this->session->set_flashdata('error', lang('validation_error'));
                $data['settings'] = $this->settings_model->getSettings();
                $data['appointment'] = $this->appointment_model->getAppointmentById($id);
                $data['patients'] = $this->patient_model->getPatientById($data['appointment']->patient);
                $data['doctors'] = $this->doctor_model->getDoctorById($data['appointment']->doctor);
                $this->load->view('home/dashboardv2', $data); // just the header file
                $this->load->view('add_newv2', $data);
                // $this->load->view('home/footer'); // just the header file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data['patients'] = $this->patient_model->getPatient();
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboardv2', $data); // just the header file
                $this->load->view('add_newv2', $data);
                // $this->load->view('home/footer'); // just the header file
            }
        } else {

            if ($patient == 'add_new') {

                $limit = $this->patient_model->getLimit();
                if ($limit <= 0) {
                    $this->session->set_flashdata('warning', lang('patient_limit_exceed'));
                    redirect('patient');
                }

                $data_p = array(
                    'patient_id' => $patient_id,
                    'name' => $p_name,
                    'email' => $p_email,
                    'phone' => $p_phone,
                    'sex' => $p_gender,
                    'age' => $p_age,
                    'add_date' => $patient_add_date,
                    'registration_time' => $patient_registration_time,
                    'how_added' => 'from_appointment'
                );
                $username = $this->input->post('p_name');
                // Adding New Patient
                if ($this->ion_auth->email_check($p_email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                } else {
                    $dfg = 5;
                    $this->ion_auth->register($username, $password, $p_email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $p_email))->row()->id;
                    $this->patient_model->insertPatient($data_p);
                    $patient_user_id = $this->db->get_where('patient', array('email' => $p_email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->patient_model->updatePatient($patient_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                }

                $patient = $patient_user_id;
                //    }
            }

            $patient_phone = $this->patient_model->getPatientById($patient)->phone;
            
            if (empty($id)) {
                $room_id = 'hms-meeting-' . $patient_phone . '-' . rand(10000, 1000000) . '-' . $this->hospital_id;
                $live_meeting_link = 'https://meet.jit.si/' . $room_id;
            } else {
                $appointment_details = $this->appointment_model->getAppointmentById($id);
                $room_id = $appointment_details->room_id;
                $live_meeting_link = $appointment_details->live_meeting_link;
            }
             
            

            //$error = array('error' => $this->upload->display_errors());
            $patientname = $this->patient_model->getPatientById($patient)->name;
            $doctorname = $this->doctor_model->getDoctorById($doctor)->name;
            $data = array();
            $data = array(
                'patient' => $patient,
                'patientname' => $patientname,
                'doctor' => $doctor,
                'doctorname' => $doctorname,
                'date' => $date,
                's_time' => $s_time,
                'e_time' => $e_time,
                'remarks' => $remarks,
                'time_slot' => $time_slot,
                'add_date' => $add_date,
                'registration_time' => $registration_time,
                'location_id' => $location,
                'status' => $status,
                's_time_key' => $s_time_key,
                'user' => $user,
                'request' => $request,
                'room_id' => $room_id,
                'live_meeting_link' => $live_meeting_link,
                'service_category_group_id' => $service_category_group,
                'service_id' => $service,
                'appointment_registration_time' => $appointment_registration,
                'appointment_date' => $appointment_date,
                'service_type' => $service_type,
                'encounter_id' => $encounter_id,
            );
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New department
                $this->appointment_model->insertAppointment($data);
                // $inserted_id = $this->db->insert_id();
                // $encounter_details = $this->encounter_model->getEncounterById($encounter_id);

                // if (empty($encounter_details->appointment_id)) {
                //     $data_appointment = array(
                //         'appointment_id' => $inserted_id,
                //     );
                //     $this->encounter_model->updateEncounter($encounter_id, $data_appointment);
                // } 
                // else {
                //     $date = gmdate('Y-m-d H:i:s');

                //     $data_encounter = array(
                //         'encounter_type_id' => $encounter_details->,
                //         'patient_id' => $encounter_details->patient_id,
                //         'doctor' => $encounter_details->doctor,
                //         'rendering_staff_id' => $encounter_details->rendering_staff_id,
                //         'rendering_staff_name' => $encounter_details->,
                //         'referral_facility_id' => $encounter_details->,
                //         'referral_facility_name' => $encounter_details->,
                //         'referral_staff_id' => $encounter_details->,
                //         'referral_staff_name' => $encounter_details->,
                //         'started_at' => $date,
                //         'waiting_started' => $date,
                //         'created_at' => $date,
                //         'created_user_id' => $user,
                //         'encounter_status' => $encounter_details->,
                //         'location_id' => $encounter_details->,
                //         'reason' => $encounter_details->,
                //     );
                // }

                /* if (!empty($sms)) {
                  $this->sms->sendSmsDuringAppointment($patient, $doctor, $date, $s_time, $e_time);
                  } */

                $patient_doctor = $this->patient_model->getPatientById($patient)->doctor;

                $patient_doctors = explode(',', $patient_doctor);



                if (!in_array($doctor, $patient_doctors)) {
                    $patient_doctors[] = $doctor;
                    $doctorss = implode(',', $patient_doctors);
                    $data_d = array();
                    $data_d = array('doctor' => $doctorss);
                    $this->patient_model->updatePatient($patient, $data_d);
                }
                $this->sendSmsDuringAppointment($id, $data, $patient, $doctor, $status);
                $this->session->set_flashdata('success', lang('record_added'));
            } else { // Updating department
                $previous_status = $this->appointment_model->getAppointmentById($id)->status;
                if ($previous_status != "Confirmed") {
                    if ($status == "Confirmed") {
                        $this->sendSmsDuringAppointment($id, $data, $patient, $doctor, $status);
                    }
                }
                $this->appointment_model->updateAppointment($id, $data);

                $this->session->set_flashdata('success', lang('record_updated'));
            }
            // Loading View

            if (!empty($redirect)) {
                redirect($redirect);
            } else {
                redirect('appointment');
            }
        }
    }

    public function addNewBookConsultation() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist', 'Patient'))) {
            redirect('home/permission');
        }

        $data['settings'] = $this->settings_model->getSettings();

        // $id = $this->input->post('id');
        $id = $this->session->userdata('appointment_id');
        $patient = $this->input->post('patient');
        $doctor = $this->input->post('doctor');
        $date = $this->input->post('date');
        $service_category_group = $this->input->post('service_category_group');
        $service = $this->input->post('service');
        $location = $this->input->post('branch');
        $appointment_registration = date('Y-m-d H:i:s', now('UTC'));

        $virtual = $this->appointment_model->getServiceCategoryById($service_category_group)->is_virtual;

        if (!empty($virtual)) {
            $service_type = "Virtual";
        } else {
            $service_type = "Inperson";
        }

        $date1 = $date;
        if (!empty($date)) {
            $date = strtotime($date);
        }


        $time_slot = $this->input->post('time_slot');

        $time_slot_explode = explode('To', $time_slot);

        $s_time = trim($time_slot_explode[0]);
        $e_time = trim($time_slot_explode[1]);

        $date_time_combined = strtotime($date1 . ' ' . $s_time);

        $appointment_date = gmdate('Y-m-d H:i:s', $date_time_combined);

        $remarks = $this->input->post('remarks');

        $sms = $this->input->post('sms');

        $status = $this->input->post('status');

        $redirect = $this->input->post('redirect');

        $request = $this->input->post('request');

        if (empty($request)) {
            $request = '';
        }


        $user = $this->ion_auth->get_user_id();

        // if ($this->ion_auth->in_group(array('Patient'))) {
        //     $user = '';
        // }



        if ((empty($id))) {
            $add_date = date('m/d/y');
            $registration_time = time();
            $patient_add_date = $add_date;
            $patient_registration_time = $registration_time;
        } else {
            $add_date = $this->appointment_model->getAppointmentById($id)->add_date;
            $registration_time = $this->appointment_model->getAppointmentById($id)->registration_time;
        }

        $s_time_key = $this->getArrayKey($s_time);


        $p_name = $this->input->post('p_name');
        $p_email = $this->input->post('p_email');
        if (empty($p_email)) {
            $p_email = $p_name . '-' . rand(1, 1000) . '-' . $p_name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($p_name)) {
            $password = $p_name . '-' . rand(1, 100000000);
        }
        $p_phone = $this->input->post('p_phone');
        $p_age = $this->input->post('p_age');
        $p_gender = $this->input->post('p_gender');
        $patient_id = rand(10000, 1000000);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('doctor', 'Doctor', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field

        if ($time_slot == 'Not Selected') {
                $this->form_validation->set_rules('time_slot', 'Timeslot', 'trim|required|check_default|xss_clean');
                $this->form_validation->set_message('check_default', lang('time_slot_not_selected_error'));
        }

        // Validating Email Field
        $this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('s_time', 'Start Time', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('e_time', 'End Time', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('remarks', 'Remarks', 'trim|max_length[500]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo "failed";
        } else {
            if (empty($id)) {
                $room_id = 'hms-meeting-' . $patient_phone . '-' . rand(10000, 1000000) . '-' . $this->hospital_id;
                $live_meeting_link = 'https://meet.jit.si/' . $room_id;
            } else {
                $appointment_details = $this->appointment_model->getAppointmentById($id);
                $room_id = $appointment_details->room_id;
                $live_meeting_link = $appointment_details->live_meeting_link;
            }

            $patientname = $this->patient_model->getPatientById($patient)->name;
            $doctorname = $this->doctor_model->getDoctorById($doctor)->name;

            $data = array();
            
            $username = $this->input->post('name');

            if (empty($id)) {
                
                $data = array(
                    'patient' => $patient,
                    'patientname' => $patientname,
                    'doctor' => $doctor,
                    'doctorname' => $doctorname,
                    'date' => $date,
                    's_time' => $s_time,
                    'e_time' => $e_time,
                    'time_slot' => $time_slot,
                    'add_date' => $add_date,
                    'registration_time' => $registration_time,
                    'location_id' => $location,
                    'status' => $status,
                    's_time_key' => $s_time_key,
                    'user' => $user,
                    'request' => $request,
                    'room_id' => $room_id,
                    'live_meeting_link' => $live_meeting_link,
                    'service_category_group_id' => $service_category_group,
                    'service_id' => $service,
                    'appointment_registration_time' => $appointment_registration,
                    'appointment_date' => $appointment_date,
                    'service_type' => $service_type,
                );

                $this->appointment_model->insertAppointment($data);
                $inserted_id = $this->db->insert_id();
                $data['appointment_id'] = $inserted_id;
                $session_data = array('appointment_id' => $inserted_id);
                $this->session->set_userdata($session_data);
                $patient_doctor = $this->patient_model->getPatientById($patient)->doctor;

                $patient_doctors = explode(',', $patient_doctor);



                if (!in_array($doctor, $patient_doctors)) {
                    $patient_doctors[] = $doctor;
                    $doctorss = implode(',', $patient_doctors);
                    $data_d = array();
                    $data_d = array('doctor' => $doctorss);
                    $this->patient_model->updatePatient($patient, $data_d);
                }
                $this->sendSmsDuringAppointment($id, $data, $patient, $doctor, $status);
                $this->session->set_flashdata('success', lang('record_added'));
                if (!empty($redirect)) {
                    echo json_encode($data);
                } else {
                    redirect('appointment');
                }

                
            } else {
                $data = array(
                    'patient' => $patient,
                    'patientname' => $patientname,
                    'doctor' => $doctor,
                    'doctorname' => $doctorname,
                    'date' => $date,
                    's_time' => $s_time,
                    'e_time' => $e_time,
                    'time_slot' => $time_slot,
                    'add_date' => $add_date,
                    'registration_time' => $registration_time,
                    'location_id' => $location,
                    'status' => $status,
                    's_time_key' => $s_time_key,
                    'user' => $user,
                    'request' => $request,
                    'room_id' => $room_id,
                    'live_meeting_link' => $live_meeting_link,
                    'service_category_group_id' => $service_category_group,
                    'service_id' => $service,
                    'appointment_registration_time' => $appointment_registration,
                    'appointment_date' => $appointment_date,
                    'service_type' => $service_type,
                    'remarks' => $remarks,
                );

                $this->appointment_model->updateAppointment($id, $data);

                // if (!empty($virtual)) {
                //     $this->appointment_model->updateAppointment($id, $data);
                // } else {
                //     $this->appointment_model->updateAppointmentForLocation($id, $data);
                // }
                
            }
        }

        

        if (!empty($redirect)) {
            redirect($redirect);
        } else {
            redirect('appointment');
        }
        
    }

    function sendSmsDuringAppointment($id, $data, $patient, $doctor, $status) {
        //sms
        $set['settings'] = $this->settings_model->getSettings();
        $patientdetails = $this->patient_model->getPatientById($patient);
        $doctordetails = $this->doctor_model->getDoctorById($doctor);
        if (empty($id)) {
            if ($status != 'Confirmed') {
                $autosms = $this->sms_model->getAutoSmsByType('appoinment_creation');
                $autoemail = $this->email_model->getAutoEmailByType('appoinment_creation');
                $autoemail_subject = 'appointment_awaiting_confirmation';
            } else {
                $autosms = $this->sms_model->getAutoSmsByType('appoinment_confirmation');
                $autoemail = $this->email_model->getAutoEmailByType('appoinment_confirmation');
                $autoemail_subject = 'appointment_confirmed';

            }
        } else {

            $autosms = $this->sms_model->getAutoSmsByType('appoinment_confirmation');
            $autoemail = $this->email_model->getAutoEmailByType('appoinment_confirmation');
            $autoemail_subject = 'appointment_confirmed';
        }
        $message = $autosms->message;
        $to = $patientdetails->phone;
        $name1 = explode(' ', $patientdetails->name);
        if (!isset($name1[1])) {
            $name1[1] = null;
        }
        $data1 = array(
            'firstname' => $name1[0],
            'lastname' => $name1[1],
            'name' => $patientdetails->name,
            'doctorname' => $doctordetails->name,
            'appointmentdate' => date('F j, Y', $data['date']),
            'meeting_link' => $data['live_meeting_link'],
            'time_slot' => $data['time_slot'],
            'hospital_name' => $set['settings']->title,
            'hospital_contact' => $set['settings']->phone
        );

        if ($autosms->status == 'Active') {
            $messageprint = $this->parser->parse_string($message, $data1);

            $data2[] = array($to => $messageprint);
            $this->sms->sendSms($to, $message, $data2);
        }

        if ($autoemail->status == 'Active') {
            $emailSettings = $this->email_model->getEmailSettings();
            $message1 = $autoemail->message;
            $messageprint1 = $this->parser->parse_string($message1, $data1);
            $this->email->from($emailSettings->admin_email, $emailSettings->admin_email_display_name);
            $this->email->to($patientdetails->email);
            $this->email->subject(lang($autoemail_subject));
            $this->email->message($messageprint1);
            $this->email->send();
        }

        //end
    }

    function getArrayKey($s_time) {
        $all_slot = array(
            0 => '12:00 AM',
            1 => '12:05 AM',
            2 => '12:10 AM',
            3 => '12:15 AM',
            4 => '12:20 AM',
            5 => '12:25 AM',
            6 => '12:30 AM',
            7 => '12:35 AM',
            8 => '12:40 PM',
            9 => '12:45 AM',
            10 => '12:50 AM',
            11 => '12:55 AM',
            12 => '01:00 AM',
            13 => '01:05 AM',
            14 => '01:10 AM',
            15 => '01:15 AM',
            16 => '01:20 AM',
            17 => '01:25 AM',
            18 => '01:30 AM',
            19 => '01:35 AM',
            20 => '01:40 AM',
            21 => '01:45 AM',
            22 => '01:50 AM',
            23 => '01:55 AM',
            24 => '02:00 AM',
            25 => '02:05 AM',
            26 => '02:10 AM',
            27 => '02:15 AM',
            28 => '02:20 AM',
            29 => '02:25 AM',
            30 => '02:30 AM',
            31 => '02:35 AM',
            32 => '02:40 AM',
            33 => '02:45 AM',
            34 => '02:50 AM',
            35 => '02:55 AM',
            36 => '03:00 AM',
            37 => '03:05 AM',
            38 => '03:10 AM',
            39 => '03:15 AM',
            40 => '03:20 AM',
            41 => '03:25 AM',
            42 => '03:30 AM',
            43 => '03:35 AM',
            44 => '03:40 AM',
            45 => '03:45 AM',
            46 => '03:50 AM',
            47 => '03:55 AM',
            48 => '04:00 AM',
            49 => '04:05 AM',
            50 => '04:10 AM',
            51 => '04:15 AM',
            52 => '04:20 AM',
            53 => '04:25 AM',
            54 => '04:30 AM',
            55 => '04:35 AM',
            56 => '04:40 AM',
            57 => '04:45 AM',
            58 => '04:50 AM',
            59 => '04:55 AM',
            60 => '05:00 AM',
            61 => '05:05 AM',
            62 => '05:10 AM',
            63 => '05:15 AM',
            64 => '05:20 AM',
            65 => '05:25 AM',
            66 => '05:30 AM',
            67 => '05:35 AM',
            68 => '05:40 AM',
            69 => '05:45 AM',
            70 => '05:50 AM',
            71 => '05:55 AM',
            72 => '06:00 AM',
            73 => '06:05 AM',
            74 => '06:10 AM',
            75 => '06:15 AM',
            76 => '06:20 AM',
            77 => '06:25 AM',
            78 => '06:30 AM',
            79 => '06:35 AM',
            80 => '06:40 AM',
            81 => '06:45 AM',
            82 => '06:50 AM',
            83 => '06:55 AM',
            84 => '07:00 AM',
            85 => '07:05 AM',
            86 => '07:10 AM',
            87 => '07:15 AM',
            88 => '07:20 AM',
            89 => '07:25 AM',
            90 => '07:30 AM',
            91 => '07:35 AM',
            92 => '07:40 AM',
            93 => '07:45 AM',
            94 => '07:50 AM',
            95 => '07:55 AM',
            96 => '08:00 AM',
            97 => '08:05 AM',
            98 => '08:10 AM',
            99 => '08:15 AM',
            100 => '08:20 AM',
            101 => '08:25 AM',
            102 => '08:30 AM',
            103 => '08:35 AM',
            104 => '08:40 AM',
            105 => '08:45 AM',
            106 => '08:50 AM',
            107 => '08:55 AM',
            108 => '09:00 AM',
            109 => '09:05 AM',
            110 => '09:10 AM',
            111 => '09:15 AM',
            112 => '09:20 AM',
            113 => '09:25 AM',
            114 => '09:30 AM',
            115 => '09:35 AM',
            116 => '09:40 AM',
            117 => '09:45 AM',
            118 => '09:50 AM',
            119 => '09:55 AM',
            120 => '10:00 AM',
            121 => '10:05 AM',
            122 => '10:10 AM',
            123 => '10:15 AM',
            124 => '10:20 AM',
            125 => '10:25 AM',
            126 => '10:30 AM',
            127 => '10:35 AM',
            128 => '10:40 AM',
            129 => '10:45 AM',
            130 => '10:50 AM',
            131 => '10:55 AM',
            132 => '11:00 AM',
            133 => '11:05 AM',
            134 => '11:10 AM',
            135 => '11:15 AM',
            136 => '11:20 AM',
            137 => '11:25 AM',
            138 => '11:30 AM',
            139 => '11:35 AM',
            140 => '11:40 AM',
            141 => '11:45 AM',
            142 => '11:50 AM',
            143 => '11:55 AM',
            144 => '12:00 PM',
            145 => '12:05 PM',
            146 => '12:10 PM',
            147 => '12:15 PM',
            148 => '12:20 PM',
            149 => '12:25 PM',
            150 => '12:30 PM',
            151 => '12:35 PM',
            152 => '12:40 PM',
            153 => '12:45 PM',
            154 => '12:50 PM',
            155 => '12:55 PM',
            156 => '01:00 PM',
            157 => '01:05 PM',
            158 => '01:10 PM',
            159 => '01:15 PM',
            160 => '01:20 PM',
            161 => '01:25 PM',
            162 => '01:30 PM',
            163 => '01:35 PM',
            164 => '01:40 PM',
            165 => '01:45 PM',
            166 => '01:50 PM',
            167 => '01:55 PM',
            168 => '02:00 PM',
            169 => '02:05 PM',
            170 => '02:10 PM',
            171 => '02:15 PM',
            172 => '02:20 PM',
            173 => '02:25 PM',
            174 => '02:30 PM',
            175 => '02:35 PM',
            176 => '02:40 PM',
            177 => '02:45 PM',
            178 => '02:50 PM',
            179 => '02:55 PM',
            180 => '03:00 PM',
            181 => '03:05 PM',
            182 => '03:10 PM',
            183 => '03:15 PM',
            184 => '03:20 PM',
            185 => '03:25 PM',
            186 => '03:30 PM',
            187 => '03:35 PM',
            188 => '03:40 PM',
            189 => '03:45 PM',
            190 => '03:50 PM',
            191 => '03:55 PM',
            192 => '04:00 PM',
            193 => '04:05 PM',
            194 => '04:10 PM',
            195 => '04:15 PM',
            196 => '04:20 PM',
            197 => '04:25 PM',
            198 => '04:30 PM',
            199 => '04:35 PM',
            200 => '04:40 PM',
            201 => '04:45 PM',
            202 => '04:50 PM',
            203 => '04:55 PM',
            204 => '05:00 PM',
            205 => '05:05 PM',
            206 => '05:10 PM',
            207 => '05:15 PM',
            208 => '05:20 PM',
            209 => '05:25 PM',
            210 => '05:30 PM',
            211 => '05:35 PM',
            212 => '05:40 PM',
            213 => '05:45 PM',
            214 => '05:50 PM',
            215 => '05:55 PM',
            216 => '06:00 PM',
            217 => '06:05 PM',
            218 => '06:10 PM',
            219 => '06:15 PM',
            220 => '06:20 PM',
            221 => '06:25 PM',
            222 => '06:30 PM',
            223 => '06:35 PM',
            224 => '06:40 PM',
            225 => '06:45 PM',
            226 => '06:50 PM',
            227 => '06:55 PM',
            228 => '07:00 PM',
            229 => '07:05 PM',
            230 => '07:10 PM',
            231 => '07:15 PM',
            232 => '07:20 PM',
            233 => '07:25 PM',
            234 => '07:30 PM',
            235 => '07:35 PM',
            236 => '07:40 PM',
            237 => '07:45 PM',
            238 => '07:50 PM',
            239 => '07:55 PM',
            240 => '08:00 PM',
            241 => '08:05 PM',
            242 => '08:10 PM',
            243 => '08:15 PM',
            244 => '08:20 PM',
            245 => '08:25 PM',
            246 => '08:30 PM',
            247 => '08:35 PM',
            248 => '08:40 PM',
            249 => '08:45 PM',
            250 => '08:50 PM',
            251 => '08:55 PM',
            252 => '09:00 PM',
            253 => '09:05 PM',
            254 => '09:10 PM',
            255 => '09:15 PM',
            256 => '09:20 PM',
            257 => '09:25 PM',
            258 => '09:30 PM',
            259 => '09:35 PM',
            260 => '09:40 PM',
            261 => '09:45 PM',
            262 => '09:50 PM',
            263 => '09:55 PM',
            264 => '10:00 PM',
            265 => '10:05 PM',
            266 => '10:10 PM',
            267 => '10:15 PM',
            268 => '10:20 PM',
            269 => '10:25 PM',
            270 => '10:30 PM',
            271 => '10:35 PM',
            272 => '10:40 PM',
            273 => '10:45 PM',
            274 => '10:50 PM',
            275 => '10:55 PM',
            276 => '11:00 PM',
            277 => '11:05 PM',
            278 => '11:10 PM',
            279 => '11:15 PM',
            280 => '11:20 PM',
            281 => '11:25 PM',
            282 => '11:30 PM',
            283 => '11:35 PM',
            284 => '11:40 PM',
            285 => '11:45 PM',
            286 => '11:50 PM',
            287 => '11:55 PM',
        );

        $key = array_search($s_time, $all_slot);
        return $key;
    }

    function getAppointmentByJasonByDoctor() {


        $id = $this->input->get('id');

        $query = $this->appointment_model->getAppointmentByDoctor($id);

        $jsonevents = array();

        foreach ($query as $entry) {

            $doctor = $this->doctor_model->getDoctorById($entry->doctor);
            if (!empty($doctor)) {
                $doctor = $doctor->name;
            } else {
                $doctor = '';
            }
            $time_slot = $entry->time_slot;
            $time_slot_new = explode(' To ', $time_slot);
            $start_time = explode(' ', $time_slot_new[0]);
            $end_time = explode(' ', $time_slot_new[1]);

            if ($start_time[1] == 'AM') {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            } else {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = 12 * 60 * 60 + $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            }

            if ($end_time[1] == 'AM') {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            } else {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = 12 * 60 * 60 + $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            }

            $patient_details = $this->patient_model->getPatientById($entry->patient);

            if (!empty($patient_details)) {
                $patient_mobile = $patient_details->phone;
                $patient_name = $patient_details->name;
            } else {
                $patient_mobile = '';
                $patient_name = '';
            }

            if ($entry->status == 'Pending Confirmation') {
                $appointment_status = lang('pending_confirmation');
            } elseif ($entry->status == 'Confirmed') {
                $appointment_status = lang('confirmed');
            } elseif ($entry->status == 'Treated') {
                $appointment_status = lang('treated');
            } elseif ($entry->status == 'Cancelled') {
                $appointment_status = lang('cancelled');
            } elseif ($entry->status == 'Requested') {
                $appointment_status = lang('requested');
            }

            $info = '<br/>' . lang('status') . ': ' . $appointment_status . '<br>' . lang('patient') . ': ' . $patient_name . '<br/>' . lang('phone') . ': ' . $patient_mobile . '<br/> Doctor: ' . $doctor . '<br/>' . lang('remarks') . ': ' . $entry->remarks;
            if ($entry->status == 'Pending Confirmation') {
                //  $color = '#098098';
                $color = 'yellowgreen';
            }
            if ($entry->status == 'Confirmed') {
                $color = '#009988';
            }
            if ($entry->status == 'Treated') {
                $color = '#112233';
            }
            if ($entry->status == 'Cancelled') {
                $color = 'red';
            }
            if ($entry->status == 'Requested') {
                $color = '#6883a3';
            }

            $jsonevents[] = array(
                'id' => $entry->id,
                'title' => $info,
                'start' => date('Y-m-d H:i:s', $entry->date + $day_start_time_second),
                'end' => date('Y-m-d H:i:s', $entry->date + $day_end_time_second),
                'color' => $color,
            );
        }

        echo json_encode($jsonevents);

        //  echo json_encode($data);
    }

    function getAppointmentByJason() {



        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            $query = $this->appointment_model->getAppointmentByDoctor($doctor);
        } elseif ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient = $this->db->get_where('patient', array('ion_user_id' => $patient_ion_id))->row()->id;
            $query = $this->appointment_model->getAppointmentByPatient($patient);
        } else {
            $query = $this->appointment_model->getAppointmentForCalendar();
        }
        $jsonevents = array();

        foreach ($query as $entry) {

            $doctor = $this->doctor_model->getDoctorById($entry->doctor);
            if (!empty($doctor)) {
                $doctor = $doctor->name;
            } else {
                $doctor = '';
            }
            $time_slot = $entry->time_slot;
            $time_slot_new = explode(' To ', $time_slot);
            $start_time = explode(' ', $time_slot_new[0]);
            $end_time = explode(' ', $time_slot_new[1]);

            if ($start_time[1] == 'AM') {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            } else {
                $start_time_second = explode(':', $start_time[0]);
                $day_start_time_second = 12 * 60 * 60 + $start_time_second[0] * 60 * 60 + $start_time_second[1] * 60;
            }

            if ($end_time[1] == 'AM') {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            } else {
                $end_time_second = explode(':', $end_time[0]);
                $day_end_time_second = 12 * 60 * 60 + $end_time_second[0] * 60 * 60 + $end_time_second[1] * 60;
            }

            $patient_details = $this->patient_model->getPatientById($entry->patient);

            if (!empty($patient_details)) {
                $patient_mobile = $patient_details->phone;
                $patient_name = $patient_details->name;
            } else {
                $patient_mobile = '';
                $patient_name = '';
            }

            if ($entry->status == 'Pending Confirmation') {
                $appointment_status = lang('pending_confirmation');
            } elseif ($entry->status == 'Confirmed') {
                $appointment_status = lang('confirmed');
            } elseif ($entry->status == 'Consulted') {
                $appointment_status = lang('consulted');
            } elseif ($entry->status == 'Cancelled') {
                $appointment_status = lang('cancelled');
            } elseif ($entry->status == 'Requested') {
                $appointment_status = lang('requested');
            } else {
                $appointment_status = lang('not_available');
            }

            $info = '<br/>' . lang('status') . ': ' . $appointment_status . '<br>' . lang('patient') . ': ' . $patient_name . '<br/>' . lang('phone') . ': ' . $patient_mobile . '<br/> Doctor: ' . $doctor . '<br/>' . lang('reason') . ': ' . $entry->remarks;
            if ($entry->status == 'Pending Confirmation') {
                //  $color = '#098098';
                $color = 'rgba(69, 170, 242,0.15)';
            }
            if ($entry->status == 'Confirmed') {
                $color = 'rgba(68, 84, 195, 0.15)';
            }
            if ($entry->status == 'Consulted') {
                $color = 'rgba(45, 206, 137, 0.15)';
            }
            if ($entry->status == 'Cancelled') {
                $color = 'rgba(247, 45, 102, 0.15)';
            }
            if ($entry->status == 'Requested') {
                $color = 'rgba(236, 180, 3, 0.5)';
            }

            $jsonevents[] = array(
                'id' => $entry->id,
                'title' => $info,
                'description' => 'Click to see the patient history',
                'start' => date('Y-m-d H:i:s', $entry->date + $day_start_time_second),
                'end' => date('Y-m-d H:i:s', $entry->date + $day_end_time_second),
                'color' => $color,
            );
        }

        echo json_encode($jsonevents);

        //  echo json_encode($data);
    }

    function getAppointmentByDoctorId() {
        $id = $this->input->get('id');

        $doctor_details = $this->doctor_model->getDoctorById($id);
        if ($doctor_details->hospital_id != $this->session->userdata('hospital_id')) {
            redirect('home/permission');
        }

        $data['doctor_id'] = $id;
        $data['appointments'] = $this->appointment_model->getAppointment();
        $data['patients'] = $this->patient_model->getPatient();
        $data['mmrdoctor'] = $this->doctor_model->getDoctorById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('appointment_by_doctorv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function editAppointment() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) {
            redirect('home/permission');
        }

        $data = array();
        $id = $this->input->get('id');
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        $patient = $this->input->get('patient_id');
        $data['encounter'] = $this->input->get('encounter_id');
        if (!empty($root) && !empty($method)) {
            $data['redirect'] = $root.'/'.$method.'?id='.$patient.'&encounter_id='.$data['encounter'];
        }


        $data['settings'] = $this->settings_model->getSettings();
        $data['appointment'] = $this->appointment_model->getAppointmentById($id);
        $data['patients'] = $this->patient_model->getPatientById($data['appointment']->patient);
        $data['doctors'] = $this->doctor_model->getDoctorById($data['appointment']->doctor);
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the footer file 
    }

    function editAppointmentByJason() {
        $id = $this->input->get('id');
        $data['appointment'] = $this->appointment_model->getAppointmentById($id);
        $data['service_category'] = $this->appointment_model->getServiceCategoryById($data['appointment']->service_category_group_id);
        $data['services'] = $this->appointment_model->getServicesByServiceId($data['appointment']->service_id);
        $data['branch'] = $this->branch_model->getBranchById($data['appointment']->location_id);
        $data['patient'] = $this->patient_model->getPatientById($data['appointment']->patient);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['appointment']->doctor);
        $data['datetime'] = date('F j, Y h:i A' ,strtotime($data['appointment']->appointment_date.' UTC'));
        echo json_encode($data);
    }

    function consultationReport() {
        $data['settings'] = $this->settings_model->getSettings();
        $data['doctors'] = $this->doctor_model->getDoctor();

        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 24 * 60 * 60;
        }

        if (empty($date_from) || empty($date_to)) {
            $data['appointments'] = $this->appointment_model->getAppointment();
        } else {
            $data['appointments'] = $this->appointment_model->getAppointmentByDate($date_from, $date_to);
            $data['from'] = $this->input->post('date_from');
            $data['to'] = $this->input->post('date_to');
        }

        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('consultation_historyv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function myAppointments() {
        $data['appointments'] = $this->appointment_model->getAppointment();
        $data['settings'] = $this->settings_model->getSettings();
        $user_id = $this->ion_auth->user()->row()->id;
        $data['user_id'] = $this->db->get_where('patient', array('ion_user_id' => $user_id))->row()->id;
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('myappointments', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function delete() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor'))) {
            redirect('home/permission');
        }

        $data = array();
        $id = $this->input->get('id');
        $doctor_id = $this->input->get('doctor_id');
        $this->appointment_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        if (!empty($doctor_id)) {
            redirect('appointment/getAppointmentByDoctorId?id=' . $doctor_id);
        } else {
            redirect('appointment');
        }
    }

    function getAppointment() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['appointments'] = $this->appointment_model->getAppointmentBysearch($search);
            } else {
                $data['appointments'] = $this->appointment_model->getAppointment();
            }
        } else {
            if (!empty($search)) {
                $data['appointments'] = $this->appointment_model->getAppointmentByLimitBySearch($limit, $start, $search);
            } else {
                $data['appointments'] = $this->appointment_model->getAppointmentByLimit($limit, $start);
            }
        }
        //  $data['appointments'] = $this->appointment_model->getAppointment();

        foreach ($data['appointments'] as $appointment) {

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options1 = ' <a type="button" class="btn btn-info editbutton" title="' . lang('edit') . '" data-toggle = "modal" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';
            }

            $options2 = '<a class="btn btn-info" title="' . lang('info') . '" style="color: #fff;" href="appointment/appointmentDetails?id=' . $appointment->id . '"><i class="fa fa-info"></i> ' . lang('info') . '</a>';

            $options3 = '<a class="btn btn-secondary" title="' . lang('history') . '" style="color: #fff;" href="appointment/medicalHistory?id=' . $appointment->id . '"><i class="fa fa-stethoscope"></i> ' . lang('history') . '</a>';

            $options4 = '<a class="btn btn-success" title="' . lang('payment') . '" style="color: #fff;" href="finance/appointmentPaymentHistory?appointment=' . $appointment->id . '"><i class="fa fa-money"></i> ' . lang('payment') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $options5 = '<a class="btn btn-danger" title="' . lang('delete') . '" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>';
            }

            $info[] = array(
                $appointment->id,
                $appointment->name,
                $appointment->phone,
                $this->settings_model->getSettings()->currency . $this->appointment_model->getDueBalanceByAppointmentId($appointment->id),
                $options1 . ' ' . $options2 . ' ' . $options3 . ' ' . $options4 . ' ' . $options5,
                    //  $options2
            );
        }

        if (!empty($data['appointments'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('appointment')->num_rows(),
                "recordsFiltered" => $this->db->get('appointment')->num_rows(),
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

    function getAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListBySearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            $i = $i + 1;
            $appointment_encounter = $appointment->encounter_id;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) {
                $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';
            }

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }
            
            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patientdetails)) {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
            } else {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
            }
            $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $appointment->doctorname;
            }

            $options7 = "";
            $options8 = "";
            if ($this->ion_auth->in_group(array('Doctor'))) {
                if ($appointment->status == 'Confirmed') {
                    $encounter = $this->encounter_model->getEncounterById($appointment->encounter_id);
                    $service_category_group = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->is_virtual;
                    if (!empty($service_category_group)) { //Virtual
                        if (!empty($service_category_group)) {
                            if (empty($appointment->encounter_id)) {
                                $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" data-id="' . $appointment->encounter_id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                            } else {
                                if (empty($encounter->ended_at)) {
                                    $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" data-id="' . $appointment->encounter_id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                                    $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-danger btn-md btn-block endEncounter" data-appointment="' . $appointment->id . '" data-encounter="' . $appointment_encounter . '" data-patient="' . $appointment->patientname . '">'. lang('end') .' '. lang('encounter') .'</a></div>';
                                } else {
                                    $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-light btn-md btn-block" data-id="' . $appointment->encounter_id . '">' . lang('encounter') . ' has '. lang('ended') .'</a></div>';
                                }
                            }
                        }
                    } else { //Face to Face
                        if (!empty($appointment->encounter_id)) {
                            if (empty($encounter->ended_at)) {
                                $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-danger btn-md btn-block endEncounter" data-appointment="' . $appointment->id . '" data-encounter="' . $appointment_encounter . '" data-patient="' . $appointment->patientname . '">'. lang('end') .' '. lang('encounter') .'</a></div>';
                            } else {
                                $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-light btn-md btn-block" data-id="' . $appointment->encounter_id . '">' . lang('encounter') . ' has '. lang('ended') .'</a></div>';
                            }
                        } else {
                            $options7 = '<a href="encounter/startEncounterFromAppointment?appointment_id='.$appointment->id.'" data-id="' . $appointment->encounter_id . '" class="btn btn-primary">'. lang('start') .' '. lang('encounter') .'</a>';
                        }
                    }
                } else {
                    $options7 = '';
                }
            } else {
                $options7 = '';
            }


            $info[] = array(
                date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                $patientdetails->patient_id,
                $patientname,
                $doctorname,
                $appointment->status,
                '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                $option1 . ' ' . $option2 . ' ' . $options7 . ' ' . $options8
            );
        }

        if (!empty($data['appointments'])) {
            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Nurse'))) {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getAppointmentCount(),
                    "recordsFiltered" => $this->appointment_model->getAppointmentBySearchCount($search),
                    "data" => $info
                );
            } else {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getAppointmentCountByDoctor($doctor),
                    "recordsFiltered" => $this->appointment_model->getAppointmentBySearchCountByDoctor($search, $doctor),
                    "data" => $info
                );
            }
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

    function getRequestedAppointmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getRequestAppointmentBysearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getRequestAppointmentByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getRequestAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getRequestAppointmentByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getRequestAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getRequestAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getRequestAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getRequestAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            //  $i = $i + 1;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patientdetails)) {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
            } else {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
            }
            $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $appointment->doctorname;
            }


            $info[] = array(
                date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                $patientdetails->patient_id,
                $patientname,
                $doctorname,
                $appointment->status,
                '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                $option1 . ' ' . $option2
            );
            $i = $i + 1;
        }

        if (!empty($data['appointments'])) {
            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Nurse'))) {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getRequestAppointmentCount(),
                    "recordsFiltered" => $this->appointment_model->getRequestAppointmentBySearchCount($search),
                    "data" => $info
                );
            } else {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getRequestAppointmentCountByDoctor($doctor),
                    "recordsFiltered" => $this->appointment_model->getRequestAppointmentBySearchCountByDoctor($search, $doctor),
                    "data" => $info
                );
            }
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

    function getPendingAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getPendingAppointmentBysearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getPendingAppointmentByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getPendingAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getPendingAppointmentByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getPendingAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getPendingAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getPendingAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getPendingAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            //  $i = $i + 1;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patientdetails)) {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
            } else {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
            }
            $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $appointment->doctorname;
            }


            $info[] = array(
                date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                $patientdetails->patient_id,
                $patientname,
                $doctorname,
                $appointment->status,
                '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                $option1 . ' ' . $option2
            );
            $i = $i + 1;
        }

        if (!empty($data['appointments'])) {
            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Nurse'))) {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getPendingAppointmentCount(),
                    "recordsFiltered" => $this->appointment_model->getPendingAppointmentBySearchCount($search),
                    "data" => $info
                );
            } else {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getPendingAppointmentCountByDoctor($doctor),
                    "recordsFiltered" => $this->appointment_model->getPendingAppointmentBySearchCountByDoctor($search, $doctor),
                    "data" => $info
                );
            }
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

    function getConfirmedAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointmentBysearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointmentByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointmentByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getConfirmedAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            //    $i = $i + 1;
            $appointment_encounter = $appointment->encounter_id;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patientdetails)) {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
            } else {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
            }
            $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $appointment->doctorname;
            }


            // if ($this->ion_auth->in_group(array('Doctor'))) {
            //     if ($appointment->status == 'Confirmed') {
            //         if (!empty($appointment->encounter_id)) {
            //             $encounter = $this->encounter_model->getEncounterById($appointment->encounter_id);
            //             $service_category_group = $this->encounter_model->getEncounterTypeById($encounter->encounter_type_id);
                        

            //             if (empty($encounter->ended_at)) {
            //                 if (!empty($service_category_group->is_virtual)) {
            //                     $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" data-id="' . $appointment->encounter_id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
            //                 }
            //                 $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-danger btn-md btn-block endEncounter" data-id="' . $appointment->encounter_id . '">'. lang('end') .' '. lang('encounter') .'</a></div>';
            //             } else {
            //                 $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-light btn-md btn-block" data-id="' . $appointment->encounter_id . '">' . lang('encounter') . ' has '. lang('ended') .'</a></div>';
            //             }
            //         } else {
            //             $options7 = '<a href="encounter/startEncounterFromAppointment?appointment_id='.$appointment->id.'" data-id="' . $appointment->encounter_id . '" class="btn btn-primary">'. lang('start') .' '. lang('encounter') .'</a>';
            //         }
            //     } else {
            //         $options7 = '';
            //     }
            // } else {
            //     $options7 = '';
            // }

            $options7 = "";
            $options8 = "";
            if ($this->ion_auth->in_group(array('Doctor'))) {
                if ($appointment->status == 'Confirmed') {
                    $encounter = $this->encounter_model->getEncounterById($appointment->encounter_id);
                    $service_category_group = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->is_virtual;
                    if (!empty($service_category_group)) { //Virtual
                        if (!empty($service_category_group)) {
                            if (empty($appointment->encounter_id)) {
                                $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" data-id="' . $appointment->encounter_id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                            } else {
                                if (empty($encounter->ended_at)) {
                                    $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" data-id="' . $appointment->encounter_id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                                    $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-danger btn-md btn-block endEncounter" data-appointment="' . $appointment->id . '" data-encounter="' . $appointment_encounter . '" data-patient="' . $appointment->patientname . '">'. lang('end') .' '. lang('encounter') .'</a></div>';
                                } else {
                                    $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-light btn-md btn-block" data-id="' . $appointment->encounter_id . '">' . lang('encounter') . ' has '. lang('ended') .'</a></div>';
                                }
                            }
                        }
                    } else { //Face to Face
                        if (!empty($appointment->encounter_id)) {
                            if (empty($encounter->ended_at)) {
                                $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-danger btn-md btn-block endEncounter" data-appointment="' . $appointment->id . '" data-encounter="' . $appointment_encounter . '" data-patient="' . $appointment->patientname . '">'. lang('end') .' '. lang('encounter') .'</a></div>';
                            } else {
                                $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-light btn-md btn-block" data-id="' . $appointment->encounter_id . '">' . lang('encounter') . ' has '. lang('ended') .'</a></div>';
                            }
                        } else {
                            $options7 = '<a href="encounter/startEncounterFromAppointment?appointment_id='.$appointment->id.'" data-id="' . $appointment->encounter_id . '" class="btn btn-primary">'. lang('start') .' '. lang('encounter') .'</a>';
                        }
                    }
                } else {
                    $options7 = '';
                }
            } else {
                $options7 = '';
            }

            $info[] = array(
                date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                $patientdetails->patient_id,
                $patientname,
                $doctorname,
                $appointment->status,
                '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                $option1 . ' ' . $option2 . ' ' . $options7 . ' ' . $options8
            );
            $i = $i + 1;
        }

        if (!empty($data['appointments'])) {
            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Nurse'))) {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getConfirmedAppointmentCount(),
                    "recordsFiltered" => $this->appointment_model->getConfirmedAppointmentBySearchCount($search),
                    "data" => $info
                );
            } else {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getConfirmedAppointmentCountByDoctor($doctor),
                    "recordsFiltered" => $this->appointment_model->getConfirmedAppointmentBySearchCountByDoctor($search, $doctor),
                    "data" => $info
                );
            }
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

    function getTreatedAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointmentBysearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointmentByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointmentByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getTreatedAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            //  $i = $i + 1;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patientdetails)) {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
            } else {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
            }
            $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $appointment->doctorname;
            }

            if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
                if ($appointment->status == 'Confirmed') {
                    $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                } else {
                    $options7 = '';
                }
            } else {
                $options7 = '';
            }

            $info[] = array(
                date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                $patientdetails->patient_id,
                $patientname,
                $doctorname,
                $appointment->status,
                '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                $option1 . ' ' . $option2
            );
            $i = $i + 1;
        }

        if (!empty($data['appointments'])) {
            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Nurse'))) {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getTreatedAppointmentCount(),
                    "recordsFiltered" => $this->appointment_model->getTreatedAppointmentBySearchCount($search),
                    "data" => $info
                );
            } else {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getTreatedAppointmentCountByDoctor($doctor),
                    "recordsFiltered" => $this->appointment_model->getTreatedAppointmentBySearchCountByDoctor($search, $doctor),
                    "data" => $info
                );
            }
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

    function getCancelledAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointmentBysearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointmentByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointmentByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getCancelledAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            // $i = $i + 1;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patientdetails)) {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
            } else {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
            }
            $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $appointment->doctorname;
            }


            $info[] = array(
                date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                $patientdetails->patient_id,
                $patientname,
                $doctorname,
                $appointment->status,
                '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                $option1 . ' ' . $option2
            );
            $i = $i + 1;
        }

        if (!empty($data['appointments'])) {
            if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Nurse'))) {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getCancelledAppointmentCount(),
                    "recordsFiltered" => $this->appointment_model->getCancelledAppointmentBySearchCount($search),
                    "data" => $info
                );
            } else {
                $output = array(
                    "draw" => intval($requestData['draw']),
                    "recordsTotal" => $this->appointment_model->getCancelledAppointmentCountByDoctor($doctor),
                    "recordsFiltered" => $this->appointment_model->getCancelledAppointmentBySearchCountByDoctor($search, $doctor),
                    "data" => $info
                );
            }
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

    function getTodaysAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListBySearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            //$i = $i + 1;
            $appointment_encounter = $appointment->encounter_id;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'&root=appointment&method=todays" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patientdetails)) {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
            } else {
                $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
            }
            $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $appointment->doctorname;
            }

            // if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
            //     if ($appointment->status == 'Confirmed') {
            //         $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
            //     } else {
            //         $options7 = '';
            //     }
            // } else {
            //     $options7 = '';
            // }
            $options7 = "";
            $options8 = "";
            if ($this->ion_auth->in_group(array('Doctor'))) {
                if ($appointment->status == 'Confirmed') {
                    $encounter = $this->encounter_model->getEncounterById($appointment->encounter_id);
                    $service_category_group = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->is_virtual;
                    if (!empty($service_category_group)) { //Virtual
                        if (!empty($service_category_group)) {
                            if (empty($appointment->encounter_id)) {
                                $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" data-id="' . $appointment->encounter_id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                            } else {
                                if (empty($encounter->ended_at)) {
                                    $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" data-id="' . $appointment->encounter_id . '" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                                    $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-danger btn-md btn-block endEncounter" data-appointment="' . $appointment->id . '" data-encounter="' . $appointment_encounter . '" data-patient="' . $appointment->patientname . '">'. lang('end') .' '. lang('encounter') .'</a></div>';
                                } else {
                                    $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-light btn-md btn-block" data-id="' . $appointment->encounter_id . '">' . lang('encounter') . ' has '. lang('ended') .'</a></div>';
                                }
                            }
                        }
                    } else { //Face to Face
                        if (!empty($appointment->encounter_id)) {
                            if (empty($encounter->ended_at)) {
                                $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-danger btn-md btn-block endEncounter" data-appointment="' . $appointment->id . '" data-encounter="' . $appointment_encounter . '" data-patient="' . $appointment->patientname . '">'. lang('end') .' '. lang('encounter') .'</a></div>';
                            } else {
                                $options8 = '<div class="btn-group mb-0 endEncounterDiv"><a class="btn btn-light btn-md btn-block" data-id="' . $appointment->encounter_id . '">' . lang('encounter') . ' has '. lang('ended') .'</a></div>';
                            }
                        } else {
                            $options7 = '<a href="encounter/startEncounterFromAppointment?appointment_id='.$appointment->id.'" data-id="' . $appointment->encounter_id . '" class="btn btn-primary">'. lang('start') .' '. lang('encounter') .'</a>';
                        }
                    }
                } else {
                    $options7 = '';
                }
            } else {
                $options7 = '';
            }

            if ($appointment->date == strtotime(date('Y-m-d'))) {
                $info[] = array(
                    date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                    $patientdetails->patient_id,
                    $patientname,
                    $doctorname,
                    $appointment->status,
                    '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                    $option1 . ' ' . $option2 . ' ' . $options7 . ' ' . $options8
                );
                $i = $i + 1;
            } else {
                $info1[] = array(
                    date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . '-' . $appointment->e_time,
                    $patientdetails->patient_id,
                    $appointment->patientname,
                    $appointment->doctorname,
                    $appointment->status,
                    '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                    $option1 . ' ' . $option2 . ' ' . $options7
                );
            }
        }

        if (!empty($data['appointments'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->appointment_model->getAppointmentByTodayCount(),
                "recordsFiltered" => $this->appointment_model->getAppointmentByTodayBySearchCount($search),
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

    function getUpcomingAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListBySearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimit($limit, $start);
                }
            }
        }

        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            //$i = $i + 1;
            $location_name = $this->branch_model->getBranchById($appointment->location_id)->display_name;
            if(empty($location_name)) {
                $location_name = 'Online';
            }
            $appointment_service_type = $this->appointment_model->getServiceCategoryById($appointment->service_category_group_id)->display_name;
            $appointment_service = $this->appointment_model->getServicesByServiceId($appointment->service_id)->category;
            $patientdetails = $this->patient_model->getPatientById($appointment->patient);
            $option1 = '<a class="btn btn-info btn-xs" href="appointment/editAppointment?id='. $appointment->id .'&root=appointment&method=upcoming" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</a>';

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            if ($appointment->date > strtotime(date('Y-m-d'))) {
                if (!empty($patientdetails)) {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
                } else {
                    $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
                }
                $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
                if (!empty($doctordetails)) {
                    $doctorname = $doctordetails->name;
                } else {
                    $doctorname = $appointment->doctorname;
                }
                if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
                    if ($appointment->status == 'Confirmed') {
                        $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                    } else {
                        $options7 = '';
                    }
                } else {
                    $options7 = '';
                }
                $info[] = array(
                    date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                    $patientdetails->patient_id,
                    $patientname,
                    $doctorname,
                    $appointment->status,
                    '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                    $option1 . ' ' . $option2 . ' ' . $options7
                );
                $i = $i + 1;
            } else {
                if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
                    if ($appointment->status == 'Confirmed') {
                        $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" onclick="return confirm(\'Are you sure you want to start the video call with this patient? An SMS and Email reminder with the meeting link will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_video_call') . '</a>';
                    } else {
                        $options7 = '';
                    }
                } else {
                    $options7 = '';
                }
                $info1[] = array(
                    date('d-m-Y', $appointment->date) . '<br>' . $appointment->s_time . '-' . $appointment->e_time,
                    $patientdetails->patient_id,
                    $appointment->patientname,
                    $appointment->doctorname,
                    $appointment->status,
                    '<strong>'.lang('location').': </strong>'.$location_name.'<br>'.'<strong>'.lang('reason_for_visit').': </strong>'.$appointment->remarks.'<br>'.'<strong>'.lang('service_type').': </strong>'.$appointment_service_type.'<br>'.'<strong>'.lang('service').': </strong>'.$appointment_service,
                    $option1 . ' ' . $option2 . ' ' . $options7
                );
            }
        }

        if (!empty($data['appointments'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->appointment_model->getAppointmentByUpcomingCount(),
                "recordsFiltered" => $this->appointment_model->getAppointmentByUpcomingBySearchCount($search),
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

    function getMyTodaysAppoinmentList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListBySearchByDoctor($doctor, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByDoctor($doctor);
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentListByLimitByDoctor($doctor, $limit, $start);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentBysearch($search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointment();
                }
            } else {
                if (!empty($search)) {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimitBySearch($limit, $start, $search);
                } else {
                    $data['appointments'] = $this->appointment_model->getAppointmentByLimit($limit, $start);
                }
            }
        }



        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        foreach ($data['appointments'] as $appointment) {
            //$i = $i + 1;

            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_details = $this->patient_model->getPatientByIonUserId($patient_ion_id);
            $patient_id = $patient_details->id;
            if ($patient_id == $appointment->patient) {
                $option1 = '<button type="button" class="btn btn-info btn-xs editbutton" data-toggle="modal" data-id="' . $appointment->id . '"><i class="fa fa-edit"></i> ' . lang('edit') . '</button>';
                $option2 = '<a class="btn btn-danger btn-xs" href="appointment/delete?id=' . $appointment->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
                $patientdetails = $this->patient_model->getPatientById($appointment->patient);
                if (!empty($patientdetails)) {
                    $patientname = ' <a type="button" class="" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
                } else {
                    $patientname = ' <a type="button" class="" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
                }
                $doctordetails = $this->doctor_model->getDoctorById($appointment->doctor);
                if (!empty($doctordetails)) {
                    $doctorname = $doctordetails->name;
                } else {
                    $doctorname = $appointment->doctorname;
                }


                if ($this->ion_auth->in_group(array('Patient'))) {
                    if ($appointment->status == 'Confirmed') {
                        $options7 = '<a class="btn btn-cyan btn-xs" title="' . lang('start_video_call') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" onclick="return confirm(\'Are you sure you want to join the video call with the doctor? Please prepare your video camera and microphone and wait for the doctor to join the call.\');"><i class="fa fa-headphones"></i> ' . lang('join_video_call') . '</a>';
                    } else {
                        $options7 = '';
                    }
                } else {
                    $options7 = '';
                }

                if ($appointment->date == strtotime(date('Y-m-d'))) {
                    $info[] = array(
                        $appointment->id,
                        $patientname,
                        $doctorname,
                        date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                        $appointment->remarks,
                        $appointment->status,
                        $options7
                    );
                    $i = $i + 1;
                } else {
                    $info1[] = array($appointment->id,
                        $appointment->patientname,
                        $appointment->doctorname,
                        date('Y-m-d', $appointment->date) . '<br>' . $appointment->s_time . ' to ' . $appointment->e_time,
                        $appointment->remarks,
                        $appointment->status,
                        $options7
                    );
                }
            }
        }

        if ($i !== 0) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $i,
                "recordsFiltered" => $i,
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

    public function getBranchInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');
        $provider = $this->input->get('provider');

// Get users
        $response = $this->branch_model->getBranchInfo($searchTerm, $provider);

        echo json_encode($response);
    }

    public function getBranchInfoWithHospital() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->branch_model->getBranchInfoWithHospital($searchTerm);

        echo json_encode($response);
    }

    public function getServiceCategoryGroupInfoForConsultation() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->appointment_model->getServiceCategoryGroupInfoForConsultation($searchTerm);

        echo json_encode($response);
    }

//     public function getServicesByServiceCategoryGroup() {
// // Search term
//         $searchTerm = $this->input->post('searchTerm');
//         $serviceType = $this->input->get('serviceType');

// // Get users
//         $response = $this->appointment_model->getServicesByServiceCategoryGroup($searchTerm, $serviceType);

//         echo json_encode($response);
//     }

    public function getServicesByServiceCategoryGroupByDoctorHospital() {
        $data = array();
        $serviceCategoryGroup = $this->input->get('servicecategorygroup');
        $doctor = $this->input->get('doctor');
        $doctorHospital = $this->doctor_model->getDoctorById($doctor)->hospital_id;
        if (!empty($date)) {
            $date = strtotime($date);
        }
        
        $data['services'] = $this->appointment_model->getServicesByServiceCategoryGroupByDoctorHospital($serviceCategoryGroup, $doctorHospital);
        // $data['aslots'] = $this->schedule_model->getAvailableSlotByDoctorByDateByLocation($date, $doctor, $location);
        echo json_encode($data);
    }

    public function getServiceCategoryById() {
        $data = array();
        $service_category = $this->input->get('id');
        $data['is_virtual'] = $this->appointment_model->getServiceCategoryById($service_category)->is_virtual;

        echo json_encode($data);
    }

    public function getServicesByServiceId() {
        $data = array();
        $services = $this->input->get('id');
        $data['services'] = $this->appointment_model->getServicesByServiceId($services);

        echo json_encode($data);
    }

}

/* End of file appointment.php */
    /* Location: ./application/modules/appointment/controllers/appointment.php */
    