<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diagnosis extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('diagnosis_model');
        $this->load->model('patient/patient_model');
        $this->load->model('encounter/encounter_model');
        if (!$this->ion_auth->in_group(array('admin', 'Doctor'))) {
            redirect('home/permission');
        }
    }

    function addDiagnosisView() {
        $data = array();

        $data['encounter_id'] = $this->input->get('encounter_id');

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    function addNew() {
        
        $encounter = $this->input->post('encounter_id');
        $patient = $this->encounter_model->getEncounterById($encounter)->patient_id;
        $patient_name = $this->patient_model->getPatientById($patient)->name;
        $patient_address = $this->patient_model->getPatientById($patient)->address;
        $patient_phone = $this->patient_model->getPatientById($patient)->phone;
        $doctor = $this->encounter_model->getEncounterById($encounter)->doctor;
        $nowtime = date('H:i:s');
        $diag_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('date') . ' ' . $nowtime));
        $on_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('on_date') . ' ' . $nowtime));
        $diagnosis = $this->input->post('diag');
        $diagnosis_description = $this->input->post('diag_description');
        $type = $this->input->post('type');
        $note = $this->input->post('instruction');
        $date = gmdate('Y-m-d H:i:s');
        $redirect = $this->input->post('redirect');

        $dataholder = $this->input->post('dataholder');
        $patient_diagnosis_text = $this->input->post('patient_diagnosis_text');
        $instruction_manual = $this->input->post('instruction_manual');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
        $this->form_validation->set_rules('diagnosisInput', 'Diagnosis', 'trim|required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('date', 'Diagnosis Date', 'trim|required|min_length[1]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', lang('validation_error'));
            // $this->session->set_flashdata('error_list', validation_errors());
            $data['encounter_id'] = $this->input->post('encounter_id');
            $this->load->view('home/dashboardv2');
            $this->load->view('add_new', $data);
        } else {
            
            $diagnosis_code = [];
            foreach ($diagnosis as $diag) {
                $diagnosis_code[] = $this->diagnosis_model->getDiagnosisById($diag)->code;
            }

            $typeAr = [];
            $primary = [];
            $secondary = [];
            foreach ($dataholder as $dh) {
                
                if ($dh === $type) {
                    $typeAr[] = '1';
                    $primary[] = 1;
                    $secondary[] = 0;
                } else {
                    $typeAr[] = '0';
                    $primary[] = 0;
                    $secondary[] = 1;
                }
            }

            
            // foreach ($typeAr as $typeAr_val) {
            //     if ($typeAr_val === '1') {
            //         $primary[] = 1;
            //         $secondary[] = 0;
            //     } else {
            //         $primary[] = 0;
            //         $secondary[] = 1;
            //     }
            // }
            $inserted_id = [];
            if (!empty($dataholder)) {
                foreach ($dataholder as $key => $value) {

                    if (empty($patient_diagnosis_text[$key])) {
                        $patient_diagnosis_text[$key] = null;
                    }

                    if (empty($diagnosis_description[$key])) {
                        $diagnosis_description[$key] = null;
                    }

                    $data = array();
                    $data[$value] = array(
                        'patient_id' => $patient,
                        'diagnosis_id' => $diagnosis[$key],
                        'diagnosis_long_description' => $diagnosis_description[$key],
                        'patient_diagnosis_text' => $patient_diagnosis_text[$key],
                        'patient_name' => $patient_name,
                        'patient_address' => $patient_address,
                        'patient_phone' => $patient_phone,
                        'diagnosis_notes' => $note[$key],
                        'onset_date' => $on_date,
                        'diagnosis_date' => $diag_date,
                        'doctor_id' => $doctor,
                        'created_at' => $date,
                        'encounter_id' => $encounter,
                        'is_primary_diagnosis' => $primary[$key],
                        'is_secondary_diagnosis' => $secondary[$key],
                        'diagnosis_code' => $diagnosis_code[$key],
                    );
                    $this->diagnosis_model->insertDiagnosis($data[$value]);
                    $inserted_id[] = $this->db->insert_id();
                }

                // foreach ($dataholder as $key => $value) {
                //     $data1 = array();

                //     $data1[$value] = array(
                //         'patient_id' => $patient,
                //         'patient_diagnosis_text' => $patient_diagnosis_text[$key],
                //         'diagnosis_notes' => $instruction_manual[$key],
                //         'patient_address' => $patient_address,
                //         'patient_phone' => $patient_phone,
                //         'onset_date' => $on_date,
                //         'diagnosis_date' => $diag_date,
                //         'doctor_id' => $doctor,
                //         'created_at' => $date,
                //         'encounter_id' => $encounter,
                //         'is_primary_diagnosis' => $primary[$key],
                //         'is_secondary_diagnosis' => $secondary[$key],
                //     );
                //     $this->diagnosis_model->insertDiagnosis($data1[$value]);
                    
                // }

                

                if (!empty($redirect)) {
                    redirect($redirect);
                }
            }
        }

        
    }

    public function getDiagnosisIcd10Select2() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->diagnosis_model->getDiagnosisInfo($searchTerm);

        echo json_encode($response);
    }


}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
