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
        if (!$this->ion_auth->in_group(array('admin', 'Doctor'))) {
            redirect('home/permission');
        }
    }

    function index() {
        $this->load->view('home/dashboardv2');
        $this->load->view('labrequest', $data);
    }

    function addLabRequestView() {
        $data = array();

        $data['encounter_id'] = $this->input->get('id');

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    function addNew() {
        $encounter = $this->input->post('encounter_id');
        $patient = $this->encounter_model->getEncounterById($encounter)->patient_id;
        $patient_name = $this->patient_model->getPatientById($patient)->name;
        $doctor = $this->encounter_model->getEncounterById($encounter)->doctor;
        $doctor_name = $this->doctor_model->getDoctorById($doctor)->name;
        $redirect = $this->input->post('redirect');

        $request_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('date')));
        $date = gmdate('Y-m-d H:i:s');

        $long_common_name = $this->input->post('labrequest_long');
        $labrequest_id = $this->input->post('labreq');
        $loinc_num = $this->input->post('loinc_num');
        $instruction = $this->input->post('instruction');

        $labrequest_text = $this->input->post('labrequest_text');
        $instruction_text = $this->input->post('instruction_text');

        if (!empty($labrequest_id)) {
            $data = array();
            foreach ($labrequest_id as $key => $value) {
                // if ($long_common_name[$key] === null) {
                //     $labrequest_text_result[$key] = $labrequest_text;
                //     $long_common_name_result[$key] = null;
                // } else {
                //     $labrequest_text_result[$key] = null;
                //     $long_common_name_result[$key] = $long_common_name[$key];
                // }

                $data[$value] = array(
                    'doctor_id' => $doctor,
                    'patient_id' => $patient,
                    'doctorname' => $doctor_name,
                    'patientname' => $patient_name,
                    'lab_loinc_id' => $labrequest_id[$key],
                    'long_common_name' => $long_common_name[$key],
                    'loinc_num' => $loinc_num[$key],
                    'instructions' => $instruction[$key],
                    'encounter_id' => $encounter,
                    'created_at' => $date,
                    'request_date' => $request_date,
                );

                $this->labrequest_model->insertLabrequest($data[$value]);
            }

            foreach ($labrequest_text as $key => $value) {
                $data1[$value] = array(
                    'doctor_id' => $doctor,
                    'patient_id' => $patient,
                    'doctorname' => $doctor_name,
                    'patientname' => $patient_name,
                    'lab_request_text' => $labrequest_text[$key],
                    'instructions' => $instruction_text[$key],
                    'encounter_id' => $encounter,
                    'created_at' => $date,
                    'request_date' => $request_date,
                );

                $this->labrequest_model->insertLabrequest($data1[$value]);
            }
        }

        if (!empty($redirect)) {
            redirect($redirect);
        }
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
            $option1 = '<a class="btn btn-info">'. lang('edit') .'</a>';

            $doctor = $this->doctor_model->getDoctorById($labrequest->doctor_id);

            $info[] = array(
                $labrequest->id,
                $labrequest->loinc_num,
                $labrequest->patientname,
                $doctor->name,
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

    public function getLabrequestSelect2() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->labrequest_model->getLabrequestInfo($searchTerm);

        echo json_encode($response);
    }

}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
