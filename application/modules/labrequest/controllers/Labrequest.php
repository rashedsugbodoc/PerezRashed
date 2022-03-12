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
