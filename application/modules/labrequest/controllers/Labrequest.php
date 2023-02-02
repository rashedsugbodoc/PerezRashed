<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Labrequest extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('labrequest_model');
        $this->load->model('procedure/procedure_model');
        $this->load->model('encounter/encounter_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('branch/branch_model');
        $this->load->model('location/location_model');
        $this->load->model('specialty/specialty_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Doctor','Patient', 'Clerk', 'Midwife', 'Nurse'))) {
            redirect('home/permission');
        }
    }

    function index() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife', 'Clerk'))) {
            redirect('home/permission');
        }
        $this->load->view('home/dashboardv2');
        $this->load->view('labrequest');
    }

    function addLabRequestView() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife', 'Receptionist', 'Nurse', 'Clerk'))) {
            redirect('home/permission');
        }
        $data = array();

        $patient = $this->input->get('patient_id');
        $data['service_request_category_id'] = $this->input->get('service_request_category_id');
        $data['patient_id'] = $this->patient_model->getPatientByPatientNumber($patient)->id;
        $data['encounter_id'] = $this->input->get('encounter_id');
        $data['request_number'] = null;
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        if (!empty($root) && !empty($method)) {
            $data['redirect'] = $root.'/'.$method;
        }

        if (!empty($data['encounter_id'])) {
            $data['encounter'] = $this->encounter_model->getEncounterById($data['encounter_id']);
            $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
            $data['doctor'] = $this->doctor_model->getDoctorById($data['encounter']->doctor);
            $data['patient'] = $this->patient_model->getPatientById($data['encounter']->patient_id);
        }
        $data['patient_details'] = $this->patient_model->getPatientByPatientNumber($patient);
        $current_user = $this->ion_auth->get_user_id();
        if ($this->ion_auth->in_group('Doctor')) {
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
            $data['doctordetails'] = $this->db->get_where('doctor', array('id' => $doctor_id))->row();
        }

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    function addNew() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife', 'Nurse', 'Clerk'))) {
            redirect('home/permission');
        }
        $id = $this->input->post('labrequest_number');
        $encounter_id = $this->input->post('encounter_id');
        $patient = $this->encounter_model->getEncounterById($encounter_id)->patient_id;
        if (empty($patient)) {
            $patient = $this->input->post('patient');
        }
        $patient_number = $this->patient_model->getPatientById($patient)->patient_id;
        $patient_name = $this->patient_model->getPatientById($patient)->name;
        // $doctor = $this->encounter_model->getEncounterById($encounter_id)->doctor;
        // if (empty($doctor)) {
        //     $current_user = $this->ion_auth->get_user_id();
        //     $doctor = $this->doctor_model->getDoctorByIonUserId($current_user)->id;
        // }
        $doctor = $this->input->post('doctor');
        $doctor_name = $this->doctor_model->getDoctorById($doctor)->name;
        $redirect = $this->input->post('redirect');
        $medical_redirect = $this->input->post('medical_history_redirect');

        $nowtime = date('H:i:s');
        $reqdate = $this->input->post('date');
        $datetime = $reqdate;
        $request_date = gmdate('Y-m-d H:i:s', strtotime($datetime));
        $date = gmdate('Y-m-d H:i:s');

        $long_common_name = $this->input->post('labrequest_long');
        $labrequest_id = $this->input->post('labreq');
        $loinc_num = $this->input->post('loinc_num');
        $instruction = $this->input->post('instruction');

        $labrequest_text = $this->input->post('labrequest_text');
        $instruction_text = $this->input->post('instruction_text');
        $dataholder = $this->input->post('dataholder');
        $lab_request = $this->input->post('labrequest_id');
        $request_list = $this->labrequest_model->getLabrequestByLabrequestNumber($id);

        if (!empty($medical_redirect)) {
            $redirect = $medical_redirect . '?encounter_id=' . $encounter_id;
        }

        if (!empty($id)) {
            $data = array();

            foreach ($dataholder as $key => $value) {

                if (!empty($lab_request[$key])) {
                    $data[$value] = array(
                        'doctor_id' => $doctor,
                        'patient_id' => $patient,
                        'doctorname' => $doctor_name,
                        'patientname' => $patient_name,
                        'lab_loinc_id' => $labrequest_id[$key],
                        'lab_request_text' => $labrequest_text[$key],
                        'long_common_name' => $long_common_name[$key],
                        'loinc_num' => $loinc_num[$key],
                        'instructions' => $instruction[$key],
                        'encounter_id' => $encounter_id,
                        'request_date' => $request_date,
                        'last_modified' => $date,
                    );
                    $request_id[$value] = $lab_request[$key];

                    if ($this->labrequest_model->updateLabrequestById($request_id[$value], $data[$value])) {
                        $this->session->set_flashdata('success', lang('record_updated'));
                    } else {
                        $this->session->set_flashdata('error', lang('error_adding_record'));
                    }
                }

                if (empty($lab_request[$key])) {
                    $data1[$value] = array(
                        'doctor_id' => $doctor,
                        'patient_id' => $patient,
                        'doctorname' => $doctor_name,
                        'patientname' => $patient_name,
                        'lab_loinc_id' => $labrequest_id[$key],
                        'long_common_name' => $long_common_name[$key],
                        'lab_request_text' => $labrequest_text[$key],
                        'loinc_num' => $loinc_num[$key],
                        'instructions' => $instruction[$key],
                        'encounter_id' => $encounter_id,
                        'created_at' => $date,
                        'request_date' => $request_date,
                        'lab_request_number' => $id,
                    );
                    if ($this->labrequest_model->insertLabrequest($data1[$value])) {
                        $this->session->set_flashdata('success', lang('record_added'));
                    } else {
                        $this->session->set_flashdata('error', lang('error_adding_record'));
                    }
                    $this->db->insert_id();
                }
            }
            
            $idd = [];
            foreach ($request_list as $list) {
                $list_id = $list->id;
                if (in_array($list_id, $request_id)) {
                } else {
                    $this->labrequest_model->delete($list_id);
                }
            }
        } else {
            $inserted_id_loop = [];
            if (!empty($labrequest_id)) {
                $data = array();

                foreach ($dataholder as $key => $value) {
                    if (empty($labrequest_id[$key])) {
                        $labrequest_id[$key] = null;
                    }
                    $data[$value] = array(
                        'doctor_id' => $doctor,
                        'patient_id' => $patient,
                        'doctorname' => $doctor_name,
                        'patientname' => $patient_name,
                        'lab_loinc_id' => $labrequest_id[$key],
                        'long_common_name' => $long_common_name[$key],
                        'lab_request_text' => $labrequest_text[$key],
                        'loinc_num' => $loinc_num[$key],
                        'instructions' => $instruction[$key],
                        'encounter_id' => $encounter_id,
                        'created_at' => $date,
                        'request_date' => $request_date,
                    );
                    if ($this->labrequest_model->insertLabrequest($data[$value])) {
                        $this->session->set_flashdata('success', lang('record_added'));
                    } else {
                        $this->session->set_flashdata('error', lang('error_adding_record'));
                    }

                    $inserted_id_loop[] = $this->db->insert_id();
                }
                
                // foreach ($labrequest_id as $key => $value) {
                    //     // if ($long_common_name[$key] === null) {
                    //     //     $labrequest_text_result[$key] = $labrequest_text;
                    //     //     $long_common_name_result[$key] = null;
                    //     // } else {
                    //     //     $labrequest_text_result[$key] = null;
                    //     //     $long_common_name_result[$key] = $long_common_name[$key];
                    //     // }

                    //     $data[$value] = array(
                    //         'doctor_id' => $doctor,
                    //         'patient_id' => $patient,
                    //         'doctorname' => $doctor_name,
                    //         'patientname' => $patient_name,
                    //         'lab_loinc_id' => $labrequest_id[$key],
                    //         'long_common_name' => $long_common_name[$key],
                    //         'loinc_num' => $loinc_num[$key],
                    //         'instructions' => $instruction[$key],
                    //         'encounter_id' => $encounter,
                    //         'created_at' => $date,
                    //         'request_date' => $request_date,
                    //     );

                    //     $this->labrequest_model->insertLabrequest($data[$value]);
                    //     $inserted_id_loop[] = $this->db->insert_id();
                    // }

                    // foreach ($labrequest_text as $key => $value) {
                    //     $data1[$value] = array(
                    //         'doctor_id' => $doctor,
                    //         'patient_id' => $patient,
                    //         'doctorname' => $doctor_name,
                    //         'patientname' => $patient_name,
                    //         'lab_request_text' => $labrequest_text[$key],
                    //         'instructions' => $instruction_text[$key],
                    //         'encounter_id' => $encounter,
                    //         'created_at' => $date,
                    //         'request_date' => $request_date,
                    //     );

                    //     $this->labrequest_model->insertLabrequest($data1[$value]);
                    //     $inserted_id_loop[] = $this->db->insert_id();
                // }

                $inserted_id = $this->db->insert_id();
                // $lab_request_number = 'L'.format_number_with_digits($this->session->userdata('hospital_id'),4).gmdate('ymd').format_number_with_digits($inserted_id, 3);
                do {
                    $raw_lab_request_number = 'L'.random_string('alnum', 6);
                    $validate_number = $this->labrequest_model->validateLabRequestNumber($raw_lab_request_number);
                } while($validate_number != 0);

                $lab_request_number = strtoupper($raw_lab_request_number);
                $data2 = array(
                    'lab_request_number' => $lab_request_number,
                );

                foreach ($inserted_id_loop as $iil) {
                    if ($this->labrequest_model->updateLabrequestNumberById($iil, $data2)) {
                        $this->session->set_flashdata('success', lang('record_updated'));
                    } else {
                        $this->session->set_flashdata('error', lang('error_adding_record'));
                    }
                }
                
            }
        }

        if (!empty($redirect)) {
            redirect($redirect);
        } else {
            redirect('labrequest');
        }
    }

    function addNew2() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife', 'Nurse', 'Clerk'))) {
            redirect('home/permission');
        }
        $id = $this->input->post('labrequest_number');
        $encounter_id = $this->input->post('encounter_id');
        $patient = $this->encounter_model->getEncounterById($encounter_id)->patient_id;
        if (empty($patient)) {
            $patient = $this->input->post('patient');
        }
        $patient_number = $this->patient_model->getPatientById($patient)->patient_id;
        $patient_name = $this->patient_model->getPatientById($patient)->name;

        $doctor = $this->input->post('doctor');
        $doctor_name = $this->doctor_model->getDoctorById($doctor)->name;

        $reqdate = $this->input->post('date');
        $datetime = $reqdate;
        $request_date = gmdate('Y-m-d H:i:s', strtotime($datetime));
        $date = gmdate('Y-m-d H:i:s');

        $request_type = $this->input->post('request_type');

        $request_type_details = $this->labrequest_model->getServiceRequestCategoryById($request_type);

        do {
            $raw_service_request_number = 'S'.random_string('alnum', 6);
            $validate_number = $this->labrequest_model->validateLabRequestNumber($raw_service_request_number);
        } while($validate_number != 0);

        $service_request_number = strtoupper($raw_service_request_number);

        if (empty($id)) { //Insert New Service Request and Service Request Items
            $data = array(
                'patient_id' => $patient,
                'doctor_id' => $doctor,
                'created_at' => $date,
                'request_date' => $request_date,
                'encounter_id' => $encounter_id,
                'service_request_number' => $service_request_number,
                'service_request_category_id' => $request_type,
            );

            if ($this->labrequest_model->insertServiceRequest($data)) {

                $inserted_id = $this->db->insert_id();

                if ($request_type_details->name === SERVICE_REQUEST_CATEGORY_LABORATORY_PROCEDURE) {
                    $labrequest_id = $this->input->post('labrequest_id');
                    $loinc_num = $this->input->post('loinc_num');
                    $instruction = $this->input->post('instruction');

                    foreach($labrequest_id as $labrequest_id_key => $labrequest_id_value) {
                        $lab_loinc_details = $this->labrequest_model->getLabLoincById($labrequest_id_value);

                        $data_items = array(
                            'service_request_id' => $inserted_id,
                            'service_request_text' => $lab_loinc_details->long_common_name,
                            'lab_loinc_id' => $labrequest_id_value,
                            'lab_instructions' => $instruction[$labrequest_id_key],
                        );

                        $this->labrequest_model->insertServiceRequestItem($data_items);
                    }
                    
                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_IMAGING) {

                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_COUNSELLING) {

                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_EDUCATION) {

                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_SURGICAL_PROCEDURE) {
                    $procedurerequest_id = $this->input->post('procedurerequest_id');
                    $cpt_code = $this->input->post('cpt_code');
                    $instruction = $this->input->post('instruction');

                    foreach($procedurerequest_id as $procedurerequest_id_key => $procedurerequest_id_value) {
                        $procedure_cpt_code_details = $this->procedure_model->getProcedureCodeById($procedurerequest_id_value);

                        $data_items = array(
                            'service_request_id' => $inserted_id,
                            'service_request_text' => $procedure_cpt_code_details->description,
                            'procedure_cpt_code_id' => $procedurerequest_id_value,
                            'procedure_instructions' => $instruction[$procedurerequest_id_key],
                        );

                        $this->labrequest_model->insertServiceRequestItem($data_items);
                    }

                }

                $this->session->set_flashdata('success', lang('record_added'));

            } else {
                $this->session->set_flashdata('error', lang('error_adding_record'));
            }

        } else { //Update Service Request and Service Request Items
            $service_request_details = $this->labrequest_model->getServiceRequestByServiceRequestNumber($id);
            
            $data = array(
                'patient_id' => $patient,
                'doctor_id' => $doctor,
                'last_modified' => $date,
                'request_date' => $request_date,
                'encounter_id' => $encounter_id,
            );

            if ($this->labrequest_model->updateServiceRequestById($service_request_details->id, $data)) {
                $service_request_items = $this->labrequest_model->getServiceRequestItemById($service_request_details->id);

                if ($request_type_details->name === SERVICE_REQUEST_CATEGORY_LABORATORY_PROCEDURE) {
                    $labrequest_id = $this->input->post('labrequest_id');
                    $loinc_num = $this->input->post('loinc_num');
                    $instruction = $this->input->post('instruction');

                    foreach($labrequest_id as $lri_key => $lri_value) {
                        $check_service_request_item = $this->labrequest_model->checkLabRequestItemByServiceRequestIdByLabLoincId($service_request_details->id, $lri_value);

                        if (!empty($check_service_request_item)) { //Update Service Request Item
                            $lab_loinc_details = $this->labrequest_model->getLabLoincById($check_service_request_item->lab_loinc_id);
                            $update_data = array(
                                'service_request_id' => $service_request_details->id,
                                'service_request_text' => $lab_loinc_details->long_common_name,
                                'lab_loinc_id' => $lab_loinc_details->id,
                                'lab_instructions' => $instruction[$lri_key],
                            );

                            $this->labrequest_model->updateServiceRequestItemById($check_service_request_item->id, $update_data);
                        } else { //Add Service Request Item
                            $lab_loinc_details = $this->labrequest_model->getLabLoincById($lri_value);

                            $add_data = array(
                                'service_request_id' => $service_request_details->id,
                                'service_request_text' => $lab_loinc_details->long_common_name,
                                'lab_loinc_id' => $lab_loinc_details->id,
                                'lab_instructions' => $instruction[$lri_key],
                            );

                            $this->labrequest_model->insertServiceRequestItem($add_data);
                        }
                    }

                    foreach($service_request_items as $sri) {
                        if (in_array($sri->lab_loinc_id, $labrequest_id) == FALSE) {
                            $this->labrequest_model->deleteServiceRequestItemById($sri->id);
                        }
                    }
                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_IMAGING) {

                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_COUNSELLING) {

                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_EDUCATION) {

                } elseif ($request_type_details->name === SERVICE_REQUEST_CATEGORY_SURGICAL_PROCEDURE) {
                    $procedurerequest_id = $this->input->post('procedurerequest_id');
                    $cpt_code = $this->input->post('cpt_code');
                    $instruction = $this->input->post('instruction');

                    foreach($procedurerequest_id as $pri_key => $pri_value) {
                        $check_service_request_item = $this->labrequest_model->checkProcedureRequestItemByServiceRequestIdByProcedureCptCodeId($service_request_details->id, $pri_value);

                        if (!empty($check_service_request_item)) {
                            $procedure_cpt_code_details = $this->procedure_model->getProcedureCodeById($check_service_request_item->procedure_cpt_code_id);
                            $update_data = array(
                                'service_request_id' => $service_request_details->id,
                                'service_request_text' => $procedure_cpt_code_details->description,
                                'procedure_cpt_code_id' => $procedure_cpt_code_details->id,
                                'procedure_instructions' => $instruction[$pri_key],
                            );

                            $this->labrequest_model->updateServiceRequestItemById($check_service_request_item->id, $update_data);
                        } else {
                            $procedure_cpt_code_details = $this->procedure_model->getProcedureCodeById($pri_value);

                            $add_data = array(
                                'service_request_id' => $service_request_details->id,
                                'service_request_text' => $procedure_cpt_code_details->description,
                                'procedure_cpt_code_id' => $procedure_cpt_code_details->id,
                                'procedure_instructions' => $instruction[$pri_key],
                            );

                            $this->labrequest_model->insertServiceRequestItem($add_data);
                        }
                    }

                    foreach($service_request_items as $sri) {
                        if (in_array($sri->procedure_cpt_code_id, $procedurerequest_id) == FALSE) {
                            $this->labrequest_model->deleteServiceRequestItemById($sri->id);
                        }
                    }
                }
            } else {
                $this->session->set_flashdata('error', lang('error_adding_record'));
            }

        }

        redirect('labrequest');
    }

    function editLabRequestView() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife'))) {
            redirect('home/permission');
        }
        $data = array();

        $data['request_number'] = $this->input->get('id');
        $service_request_details = $this->labrequest_model->getServiceRequestByServiceRequestNumber($data['request_number']);
        $data['service_request_item'] = $this->labrequest_model->getServiceRequestItemById($service_request_details->id);
        $data['lab_request_date'] = $service_request_details->request_date;
        $data['patient_details'] = null;
        $data['service_request_category_id'] = $this->input->get('service_request_category_id');
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        if (!empty($root) && !empty($method)) {
            $data['redirect'] = $root.'/'.$method;
        }
        if (!empty($service_request_details->encounter_id)) {
            $data['encounter'] = $this->encounter_model->getEncounterById($service_request_details->encounter_id);
            $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
        }
        $data['labLoincItems'] = $this->labrequest_model->getLabLoinc();
        $data['patient'] = $this->patient_model->getPatientById($service_request_details->patient_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($service_request_details->doctor_id);

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    function editLabrequestByJason() {
        $id = $this->input->get('id');

        $data['patients'] = $this->patient_model->getPatientByVisitedProviderId();

        $data['service_request'] = $this->labrequest_model->getServiceRequestByServiceRequestNumber($id);

        echo json_encode($data);
    }

    function deleteLabrequestByRequestNumber() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife'))) {
            redirect('home/permission');
        }
        $request_number = $this->input->get('request_number');

        if ($this->labrequest_model->deleteLabrequestByRequestNumber($request_number)) {
            $this->session->set_flashdata('success', lang('record_deleted'));
        } else {
            $this->session->set_flashdata('error', lang('error_deleting_record'));
        }

        redirect('labrequest');
    }

    function labrequestView() {
        $id = $this->input->get('id');
        $labrequest_number = $this->labrequest_model->getLabrequestByLabrequestNumber($id)[0]->id;
        $data['labrequest'] = $this->labrequest_model->getLabrequestById($labrequest_number);
        $data['lab_request_number'] = $this->labrequest_model->getLabrequestByLabrequestNumber($data['labrequest']->lab_request_number);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['labrequest']->doctor_id);
        $data['signature'] = $this->doctor_model->getUserSignatureByUserId($data['doctor']->ion_user_id);
        $data['patient'] = $this->patient_model->getPatientById($data['labrequest']->patient_id);
        $specializations = explode(',', $data['doctor']->specialties);
        $limit = 4;
        $data['branches'] = $this->branch_model->getBranchesByLimit($limit);
        foreach ($specializations as $specialization) {
            $specialties = $this->specialty_model->getSpecialtyById($specialization)->display_name_ph;
            $specialty[] = $specialties;
        }
        $data['spec'] = implode(', ', $specialty);
        $data['settings'] = $this->settings_model->getSettings();

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('labrequest_view', $data);
    }

    function getLabrequest() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $current_user = $this->ion_auth->get_user_id();
        $patient_id = $this->input->get('patient_id');
        $doctor_id = $this->doctor_model->getDoctorByIonUserId($current_user)->id;

        if (!empty($patient_id)) {
            if ($this->ion_auth->in_group(array('Doctor'))) {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestBySearch($search, $patient_id, $doctor_id);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequest($patient_id, $doctor_id);
                    }
                } else {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimitBySearch($limit, $start, $search, $patient_id, $doctor_id);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimit($limit, $start, $patient_id, $doctor_id);
                    }
                }
            } else {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestBySearch($search, $patient_id);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequest($patient_id);
                    }
                } else {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimitBySearch($limit, $start, $search, $patient_id);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimit($limit, $start, $patient_id);
                    }
                }
            }
        } else {
            if ($this->ion_auth->in_group(array('Doctor'))) {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestBySearch($search, null, $doctor_id);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequest(null, $doctor_id);
                    }
                } else {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimitBySearch($limit, $start, $search, null, $doctor_id);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimit($limit, $start, null, $doctor_id);
                    }
                }
            } else {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestBySearch($search);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequest();
                    }
                } else {
                    if (!empty($search)) {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimitBySearch($limit, $start, $search);
                    } else {
                        $data['labrequests'] = $this->labrequest_model->getServiceRequestByLimit($limit, $start);
                    }
                }
            }
        }

        foreach ($data['labrequests'] as $labrequest) {
            if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) {
                $option1 = '<a class="btn btn-info" href="labrequest/editLabRequestView?id='.$labrequest->service_request_number.'&service_request_category_id='.$labrequest->service_request_category_id.'"><i class="fe fe-edit"></i>'.' '.lang('edit').'</a>';
            }
            $option2 = '<a class="btn btn-info" href="labrequest/labrequestView?id='.$labrequest->service_request_number.'"><i class="fa fa-file-text-o"></i>'.' '.lang('details').'</a>';
            if ($this->ion_auth->in_group(array('admin', 'Midwife'))) {
                $option3 = '<a class="btn btn-danger" href="labrequest/deleteLabrequestByRequestNumber?request_number='.$labrequest->service_request_number.'"><i class="fe fe-trash-2"></i>'.' '.lang('delete').'</a>';
            }
            if (!empty($patient_id)) {
                $options4 = '<a class="btn btn-info" href="labrequest/editLabRequestView?id='.$labrequest->service_request_number.'&root=patient&method=medicalHistory&encounter_id='.$encounter_id.'"><i class="fe fe-edit"></i></a>';
                $options5 = '<a class="btn btn-info" href="labrequest/labrequestView?id='.$labrequest->service_request_number.'"><i class="fe fe-eye"></i></a>';
            }

            $doctor = $this->doctor_model->getDoctorById($labrequest->doctor_id);
            $patient = $this->patient_model->getPatientById($labrequest->patient_id);
            $patient_name = $patient->firstname . ' ' . $patient->middlename . ' ' . $patient->lastname;

            $labtests = $this->labrequest_model->getServiceRequestItemById($labrequest->id);

            $labtestdata = '';
            foreach ($labtests as $labtest) {
                $request_text = $labtest->service_request_text;
                if (empty($request_text)) {
                    $request_text = $labtest->service_request_text;
                }

                $code = $labtest->lab_loinc_id;
                if (empty($code)) {
                    $code = '';
                } else {
                    $code =  '<span>' . lang('loinc_code') . ': </span>' . $code;
                }

                $instruction = $labtest->lab_instructions;
                if (empty($instruction)) {
                    $instruction = $labtest->procedure_instructions;
                }

                $labtestsingle = '<div class="mb-3"><p class="mb-0"><strong>'.$request_text.'</strong></p><p class="mb-0">'.$instruction.'</p><p class="mb-0">'.$code.'</p></div>';
                $labtestdata .= $labtestsingle;
            }

            $hospital = $this->hospital_model->getHospitalById($labrequest->hospital_id);
            $encounter_details = $this->encounter_model->getEncounterById($labrequest->encounter_id);
            $encounter_location = $this->branch_model->getBranchById($encounter_details->location_id)->display_name;
            if (!empty($labrequest->encounter_id)) {
                if (!empty($encounter_location)) {
                    $appointment_facility = $hospital->name.'<br>'.'(' . $encounter_location . ')';
                } else {
                    $appointment_facility = $hospital->name.'<br>'.'(' . lang('online') . ')';
                }
            } else {
                $appointment_facility = $hospital->name.'<br>'.'( '.lang('online').' )';
            }

            $alltest = $labtestdata;

            if(!empty($patient_id)) {
                $info[] = array(
                    $labrequest?date('Y-m-d h:i A', strtotime($labrequest->request_date.' UTC')):'',
                    $labrequest?$labrequest->service_request_number:'',
                    $alltest,
                    $labrequest?$patient_name:'',
                    $doctor?$doctor->name:'',
                    $appointment_facility,
                    $options4 . ' ' . $options5,
                );
            } else {
                $info[] = array(
                    $labrequest?date('Y-m-d h:i A', strtotime($labrequest->request_date.' UTC')):'',
                    $labrequest?$labrequest->service_request_number:'',
                    $alltest,
                    $labrequest?$patient_name:'',
                    $doctor?$doctor->name:'',
                    $appointment_facility,
                    $option1 . ' ' . $option2 . ' ' . $option3,
                );
            }
        }

        if ($data['labrequests']) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->labrequest_model->getLabrequestCount($patient_id),
                "recordsFiltered" => $this->labrequest_model->getLabrequestBySearchCount($search, $patient_id),
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

    function getLabrequestByJason() {
        $request_number = $this->input->get("requestnumber");

        if (!empty($request_number)) {
            $data['request'] = $this->labrequest_model->getLabrequestByLabrequestNumber($request_number)[0];
        } else {
            $data['request'] = 0;
        }

        $data['patient'] = (int)$data['request']->patient_id;

        echo json_encode($data);
    }

    public function getLabrequestSelect2() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->labrequest_model->getLabrequestInfo($searchTerm);

        echo json_encode($response);
    }

    public function getServiceRequestCategorySelect2() {
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->labrequest_model->getServiceRequestCategoryInfo($searchTerm);

        echo json_encode($response);
    }

    public function getServiceRequestCategoryDisplaysById() {
        $service_request_category_id = $this->input->get('service_request_category_id');
        $request_number = $this->input->get('request_number');
        $data['row_count'] = $this->input->get('row_count');

        $data['service_request_category_list'] = $this->labrequest_model->getServiceRequestCategoryList();

        if (empty($request_number)) {
            if ($service_request_category_id == 1) {
                // $data['request_display'] = '<label class="form-label">'.lang('select') . ' ' . lang('lab') . ' ' . lang('test').'</label>
                //                             <select class="select2-show-search form-control labrequest" name="labrequestInput" id="labrequest" value=""></select>';
                $data['request_display'] = '<tr class="record_row_'.$data['row_count'].'">
                                                <td><button class="btn btn-danger btn-sm" id="delete_record_'.$data['row_count'].'" onclick="removeRecord('.$data['row_count'].')"><i class="fe fe-trash-2"></i></button><input type="text" name="labrequest_id[]" id="request_id_'.$data['row_count'].'"></td>
                                                <td><select class="select2-show-search form-control request_select" name="labrequestInput[]" id="servicerequest'.$data['row_count'].'" value="" onchange="selectLabrequest('.$data['row_count'].')"></select></td>
                                                <td><input type="text" class="form-control" name="loinc_num[]" id="code'.$data['row_count'].'"></td>
                                            </tr>
                                            <tr class="record_row_'.$data['row_count'].'">
                                                <td></td>
                                                <td colspan="2"><input type="text" class="form-control" name="instruction[]" id="instruction'.$data['row_count'].'"></td>
                                            </tr>';
                $data['url'] = array(
                    'controller' => 'labrequest',
                    'method' => 'getLabrequestSelect2'
                );
            } elseif ($service_request_category_id == 5) {
                $data['request_display'] = '<tr class="record_row_'.$data['row_count'].'">
                                                <td><button class="btn btn-danger btn-sm" id="delete_record_'.$data['row_count'].'" onclick="removeRecord('.$data['row_count'].')"><i class="fe fe-trash-2"></i></button><input type="text" name="procedurerequest_id[]" id="request_id_'.$data['row_count'].'"></td>
                                                <td><select class="select2-show-search form-control request_select" name="labrequestInput[]" id="servicerequest'.$data['row_count'].'" value="" onchange="selectProcedure('.$data['row_count'].')"></select></td>
                                                <td><input type="text" class="form-control" name="cpt_code[]" id="code'.$data['row_count'].'"></td>
                                            </tr>
                                            <tr class="record_row_'.$data['row_count'].'">
                                                <td></td>
                                                <td colspan="2"><input type="text" class="form-control" name="instruction[]" id="instruction'.$data['row_count'].'"></td>
                                            </tr>';
                $data['url'] = array(
                    'controller' => 'procedure',
                    'method' => 'getProcedureCptCodeAndDescriptionForServiceRequest'
                );
            } else {
                $data['request_display'] = '';
            }
        } else {
            $service_request_details = $this->labrequest_model->getServiceRequestByServiceRequestNumber($request_number);
            $data['service_request_items'] = $this->labrequest_model->getServiceRequestItemById($service_request_details->id);
            $data['request_display'] = '';
            $data['count'] = 0;
            foreach($data['service_request_items'] as $sri_key => $sri_value) {
                if ($service_request_category_id == 1) {
                    $standard_request_information = $this->labrequest_model->getLabLoincById($sri_value->lab_loinc_id);
                    $standard_request_information_combined_for_selected_dropdown = $standard_request_information->id.'*'.$standard_request_information->long_common_name.'*'.$standard_request_information->loinc_num;
                    $request_select_option = '<option value="'.$standard_request_information_combined_for_selected_dropdown.'" selected>'.$standard_request_information->long_common_name.'</option>';
                    $data['request_display'] .= '<tr class="record_row_'.$data['count'].'">
                                                    <td><button class="btn btn-danger btn-sm" id="delete_record_'.$data['count'].'" onclick="removeRecord('.$data['count'].')"><i class="fe fe-trash-2"></i></button><input type="text" name="labrequest_id[]" id="request_id_'.$data['count'].'" value="'.$sri_value->lab_loinc_id.'"></td>
                                                    <td><select class="select2-show-search form-control request_select" name="labrequestInput[]" id="servicerequest'.$data['count'].'" value="" onchange="selectProcedure('.$data['count'].')">'.$request_select_option.'</select></td>
                                                    <td><input type="text" class="form-control" name="loinc_num[]" id="code'.$data['count'].'" value="'.$standard_request_information->loinc_num.'"></td>
                                                </tr>
                                                <tr class="record_row_'.$data['count'].'">
                                                    <td></td>
                                                    <td colspan="2"><input type="text" class="form-control" name="instruction[]" id="instruction'.$data['count'].'" value="'.$sri_value->lab_instructions.'"></td>
                                                </tr>';
                    $data['url'] = array(
                        'controller' => 'labrequest',
                        'method' => 'getLabrequestSelect2'
                    );
                } elseif ($service_request_category_id == 5) {
                    $standard_request_information = $this->procedure_model->getProcedureCodeById($sri_value->procedure_cpt_code_id);
                    $standard_request_information_combined_for_selected_dropdown = $standard_request_information->id.'*'.$standard_request_information->description.'*'.$standard_request_information->cpt_code;
                    $request_select_option = '<option value="'.$standard_request_information_combined_for_selected_dropdown.'" selected>'.$standard_request_information->cpt_code.' - '.$standard_request_information->description.'</option>';
                    $data['request_display'] .= '<tr class="record_row_'.$data['count'].'">
                                                    <td><button class="btn btn-danger btn-sm" id="delete_record_'.$data['count'].'" onclick="removeRecord('.$data['count'].')"><i class="fe fe-trash-2"></i></button><input type="text" name="procedurerequest_id[]" id="request_id_'.$data['count'].'" value="'.$sri_value->procedure_cpt_code_id.'"></td>
                                                    <td><select class="select2-show-search form-control request_select" name="labrequestInput[]" id="servicerequest'.$data['count'].'" value="" onchange="selectProcedure('.$data['count'].')">'.$request_select_option.'</select></td>
                                                    <td><input type="text" class="form-control" name="cpt_code[]" id="code'.$data['count'].'" value="'.$standard_request_information->cpt_code.'"></td>
                                                </tr>
                                                <tr class="record_row_'.$data['count'].'">
                                                    <td></td>
                                                    <td colspan="2"><input type="text" class="form-control" name="instruction[]" id="instruction'.$data['count'].'" value="'.$sri_value->procedure_instructions.'"></td>
                                                </tr>';
                    $data['url'] = array(
                        'controller' => 'procedure',
                        'method' => 'getProcedureCptCodeAndDescriptionForServiceRequest'
                    );
                }

                $data['count']++;
            }
        }

        echo json_encode($data);
    }

    public function getLabrequestByLabrequestnumberByJason() {
        $request_number = $this->input->get('number');

        $data['requests'] = $this->labrequest_model->getLabrequestByLabrequestNumber($request_number);

        echo json_encode($data);
    }

    public function getEncounterByPatientIdJason() {
        $patient_id = $this->input->get('id');

        $patient = $this->patient_model->getPatientById($patient_id);

        $data['encounter'] = $this->encounter_model->getEncounterByPatientIdForDropdown($patient->id);

        echo json_encode($data);
    }

}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
