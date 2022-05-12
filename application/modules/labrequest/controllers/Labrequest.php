<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Labrequest extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('labrequest_model');
        $this->load->model('encounter/encounter_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('branch/branch_model');
        $this->load->model('location/location_model');
        $this->load->model('specialty/specialty_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Doctor','Patient'))) {
            redirect('home/permission');
        }
    }

    function index() {
        $this->load->view('home/dashboardv2');
        $this->load->view('labrequest', $data);
    }

    function addLabRequestView() {
        $data = array();

        $data['patient_id'] = $this->input->get('patient_id');
        $data['encounter_id'] = $this->input->get('encounter_id');
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

        $current_user = $this->ion_auth->get_user_id();
        if ($this->ion_auth->in_group('Doctor')) {
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
            $data['doctordetails'] = $this->db->get_where('doctor', array('id' => $doctor_id))->row();
        }

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    function addNew() {
        $id = $this->input->post('labrequest_number');
        $encounter_id = $this->input->post('encounter_id');
        $patient = $this->encounter_model->getEncounterById($encounter_id)->patient_id;
        if (empty($patient)) {
            $patient = $this->input->post('patient');
        }
        $patient_name = $this->patient_model->getPatientById($patient)->name;
        $doctor = $this->encounter_model->getEncounterById($encounter_id)->doctor;
        if (empty($doctor)) {
            $current_user = $this->ion_auth->get_user_id();
            $doctor = $this->doctor_model->getDoctorByIonUserId($current_user)->id;
        }
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
            $redirect = $medical_redirect . '?id=' . $patient . '&encounter_id=' . $encounter_id;
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

    function editLabRequestView() {
        $data = array();

        $data['request_number'] = $this->input->get('id');
        $data['labrequests'] = $this->labrequest_model->getLabrequestByLabrequestNumber($data['request_number']);
        $data['lab_request_date'] = $data['labrequests'][0]->request_date;
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        if (!empty($root) && !empty($method)) {
            $data['redirect'] = $root.'/'.$method;
        }
        if (!empty($data['labrequests'][0]->encounter_id)) {
            $data['encounter'] = $this->encounter_model->getEncounterById($data['labrequests'][0]->encounter_id);
            $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
        }
        $data['labLoincItems'] = $this->labrequest_model->getLabLoinc();
        $data['patient'] = $this->patient_model->getPatientById($data['labrequests'][0]->patient_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['labrequests'][0]->doctor_id);

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    function deleteLabrequestByRequestNumber() {
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
        $limit = 3;
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

        if ($limit == -1) {
            if (!empty($search)) {
                $data['labrequests'] = $this->labrequest_model->getLabrequestBySearch($search);
            } else {
                $data['labrequests'] = $this->labrequest_model->getLabrequest();
            }
        } else {
            if (!empty($search)) {
                $data['labrequests'] = $this->labrequest_model->getLabrequestByLimitBySearch($limit, $start, $search);
            } else {
                $data['labrequests'] = $this->labrequest_model->getLabrequestByLimit($limit, $start);
            }
        }

        foreach ($data['labrequests'] as $labrequest) {
            $option1 = '<a class="btn btn-info" href="labrequest/editLabRequestView?id='.$labrequest->lab_request_number.'"><i class="fe fe-edit"></i></a>';
            $option2 = '<a class="btn btn-info" href="labrequest/labrequestView?id='.$labrequest->lab_request_number.'"><i class="fe fe-eye"></i></a>';
            $option3 = '<a class="btn btn-danger" href="labrequest/deleteLabrequestByRequestNumber?request_number='.$labrequest->lab_request_number.'"><i class="fe fe-trash-2"></i></a>';

            $doctor = $this->doctor_model->getDoctorById($labrequest->doctor_id);

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
                } else {
                    $labloinc =  '<span>' . lang('loinc_code') . ': </span>' . $labloinc;
                }

                $labtestsingle = '<div class="mb-3"><p class="mb-0"><strong>'.$labrequest_text.'</strong></p><p class="mb-0">'.$labtest->instructions.'</p><p class="mb-0">'.$labloinc.'</p></div>';
                $labtestdata .= $labtestsingle;
            }

            $alltest = $labtestdata;

            $info[] = array(
                $labrequest->lab_request_number,
                $alltest,
                $labrequest->patientname,
                $doctor->name,
                $option1 . ' ' . $option2 . ' ' . $option3,
            );
        }

        if ($data['labrequests']) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->labrequest_model->getLabrequestCount(),
                "recordsFiltered" => $this->labrequest_model->getLabrequestBySearchCount($search),
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

    public function getLabrequestByLabrequestnumberByJason() {
        $request_number = $this->input->get('number');

        $data['requests'] = $this->labrequest_model->getLabrequestByLabrequestNumber($request_number);

        echo json_encode($data);
    }

}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
