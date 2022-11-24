<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diagnosis extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('diagnosis_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('encounter/encounter_model');
        $this->load->model('branch/branch_model');
        $this->load->model('hospital/hospital_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Patient', 'Clerk', 'Midwife'))) {
            redirect('home/permission');
        }
    }

    function index() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor'))) {
            redirect('home/permission');
        }

        $this->load->view('home/dashboardv2');
        $this->load->view('diagnosis', $data);
    }

    function addDiagnosisView() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife', 'Nurse'))) {
            redirect('home/permission');
        }
        $data = array();

        $data['encounter_id'] = $this->input->get('encounter_id');
        $data['encounter'] = $this->encounter_model->getEncounterById($data['encounter_id']);
        $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['encounter']->doctor);
        $data['patient'] = $this->input->get('patient');
        if (empty($data['patient'])) {
            $data['patient'] = $this->patient_model->getPatientById($data['encounter']->patient_id);
            $data['patient_details'] = $this->patient_model->getPatientByPatientNumber($data['patient']->patient_id);
        }
        if (empty($data['patient_details'])) {
            $data['patient_details'] = $this->patient_model->getPatientByPatientNumber($data['patient']);
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['root'] = $this->input->get('root');
        $data['method'] = $this->input->get('method');
        $data['redirect'] = $this->input->get('redirect');
        if (!empty($data['root']) && !empty($data['method'])) {
            if(!empty($data['encounter'])) {
                $data['redirect'] = $data['root'].'/'.$data['method'].'?encounter_id='.$data['encounter']->id;
            } else {
                $data['redirect'] = $data['root'].'/'.$data['method'].'?id='.$data['patient'];
            }
        } elseif (empty($data['root']) && empty($data['method'])) {
            if (!empty($data['encounter_id'])) {
                $data['redirect'] = 'encounter';
            }
        }

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    function addNew() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife', 'Nurse'))) {
            redirect('home/permission');
        }
        $encounter_id = $this->input->post('encounter_id');
        $patient = $this->encounter_model->getEncounterById($encounter_id)->patient_id;
        $patient_name = $this->patient_model->getPatientById($patient)->name;
        $patient_address = $this->patient_model->getPatientById($patient)->address;
        $patient_phone = $this->patient_model->getPatientById($patient)->phone;
        $doctor = $this->encounter_model->getEncounterById($encounter_id)->doctor;
        $nowtime = date('H:i:s');
        $diag_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('date')));
        $on_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('on_date')));
        $diagnosis = $this->input->post('diag');
        $diagnosis_description = $this->input->post('diag_description');
        $type = $this->input->post('type');
        $note = $this->input->post('instruction');
        $date = gmdate('Y-m-d H:i:s');
        $redirect = $this->input->post('redirect');
        $number = $this->input->post('id');

        $dataholder = $this->input->post('dataholder');
        $patient_diagnosis_text = $this->input->post('patient_diagnosis_text');
        $instruction_manual = $this->input->post('instruction_manual');

        do {
            $raw_diagnosis_number = 'D'.random_string('alnum', 6);
            $validate_number = $this->diagnosis_model->validateDiagnosisNumber($raw_diagnosis_number);
        } while($validate_number != 0);

        $diagnosis_number = strtoupper($raw_diagnosis_number);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
        // $this->form_validation->set_rules('diagnosisInput', 'Diagnosis', 'trim|required|min_length[1]|xss_clean');
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

                    if (empty($diagnosis[$key])) {
                        $diagnosis[$key] = null;
                    }

                    $data = array();
                    if (empty($number)) {
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
                            'encounter_id' => $encounter_id,
                            'is_primary_diagnosis' => $primary[$key],
                            'is_secondary_diagnosis' => $secondary[$key],
                            'diagnosis_code' => $diagnosis_code[$key],
                            'patient_diagnosis_number' => $diagnosis_number,
                        );

                        $this->diagnosis_model->insertDiagnosis($data[$value]);
                    } else {
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
                            'updated_at' => $date,
                            'encounter_id' => $encounter_id,
                            'is_primary_diagnosis' => $primary[$key],
                            'is_secondary_diagnosis' => $secondary[$key],
                            'diagnosis_code' => $diagnosis_code[$key],
                            'patient_diagnosis_number' => $number,
                        );
                        $diagnosis_ids = $this->diagnosis_model->getPatientDiagnosisByNumber($number);
                        $this->diagnosis_model->updateDiagnosis($diagnosis_ids[$key]->id, $data[$value]);
                    }
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

    public function editDiagnosis() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife'))) {
            redirect('home/permission');
        }
        $diagnosis_number = $this->input->get('id');

        $data['diagnosis'] = $this->diagnosis_model->getPatientDiagnosisByNumber($diagnosis_number);
        $data['id'] = $data['diagnosis']->id;
        $data['encounter'] = $this->encounter_model->getEncounterById($data['diagnosis'][0]->encounter_id);
        $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
        $data['patient'] = $this->patient_model->getPatientById($data['diagnosis'][0]->patient_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['diagnosis'][0]->doctor_id);
        // $data['diagnosis'] = $this->diagnosis_model->getPatientDiagnosisById($data['id']);
        $data['diagnosis_list'] = $this->diagnosis_model->getDiagnosis();
        $data['root'] = $this->input->get('root');
        $data['method'] = $this->input->get('method');
        if (!empty($data['root']) && !empty($data['method'])) {
            $data['redirect'] = $data['root'].'/'.$data['method'].'?encounter_id='.$data['encounter']->id;
        }

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    public function getEncounterByPatientIdJason() {
        $patient_id = $this->input->get('id');

        $patient = $this->patient_model->getPatientById($patient_id);

        $data['encounter'] = $this->encounter_model->getEncounterByPatientIdForDropdown($patient->id);

        echo json_encode($data);
    }

    public function addDiagnosisByJason() {
        $data['patient_details'] = array_slice($this->patient_model->getPatient(), 0, 10);

        echo json_encode($data);
    }

    public function getDiagnosis() {
        $patient_id = $this->input->get('patient_id');
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $encounter_id = $this->input->get('encounter_id');
        $current_user = $this->ion_auth->get_user_id();
        $doctor_id = $this->doctor_model->getDoctorByIonUserId($current_user)->id;

        if(!empty($patient_id)) {
            if ($this->ion_auth->in_group(array('Doctor'))) {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisBySearch($search, $patient_id, $doctor_id);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByPatient($patient_id, $doctor_id);
                    }
                } else {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimitBySearch($limit, $start, $search, $patient_id, $doctor_id);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimit($limit, $start, $patient_id, $doctor_id);
                    }
                }
            } else {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisBySearch($search, $patient_id);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByPatient($patient_id);
                    }
                } else {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimitBySearch($limit, $start, $search, $patient_id);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimit($limit, $start, $patient_id);
                    }
                }
            }
        } else {
            if ($this->ion_auth->in_group(array('Doctor'))) {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisBySearch($search, null, $doctor_id);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getPatientDiagnosis(null, $doctor_id);
                    }
                } else {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimitBySearch($limit, $start, $search, null, $doctor_id);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimit($limit, $start, null, $doctor_id);
                    }
                }
            } else {
                if ($limit == -1) {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisBySearch($search);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getPatientDiagnosis();
                    }
                } else {
                    if (!empty($search)) {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimitBySearch($limit, $start, $search);
                    } else {
                        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisByLimit($limit, $start);
                    }
                }
            }
        }

        foreach ($data['diagnosis'] as $diag) {

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

            $facility = $this->branch_model->getBranchById($diag->location_id);
            $hospital = $this->hospital_model->getHospitalById($diag->hospital_id);
            $encounter_details = $this->encounter_model->getEncounterById($diag->encounter_id);
            $encounter_location = $this->branch_model->getBranchById($encounter_details->location_id)->display_name;
            if (!empty($diag->encounter_id)) {
                if (!empty($encounter_location)) {
                    $appointment_facility = $hospital->name.'<br>'.'(' . $encounter_location . ')';
                } else {
                    $appointment_facility = $hospital->name.'<br>'.'(' . lang('online') . ')';
                }
            } else {
                $appointment_facility = $hospital->name.'<br>'.'( '.lang('online').' )';
            }

            if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) {
                if(!empty($patient_id)) {
                    $options1 = '<a href="diagnosis/editDiagnosis?id='.$diag->patient_diagnosis_number.'&root=patient&method=medicalHistory" class="btn btn-info"><i class="fe fe-edit"></i></a>';
                    $options2 = '<a href="" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fe fe-trash-2"></i></a>';
                } else {
                    $options1 = '<a href="diagnosis/editDiagnosis?id='.$diag->patient_diagnosis_number.'&redirect=diagnosis" class="btn btn-info"><i class="fe fe-edit"></i></a>';
                    $options2 = '<a href="" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fe fe-trash-2"></i></a>';
                }
            } else {
                $options1 = '';
                $options2 = '';
            }

            $info[] = array(
                date('Y-m-d h:i A', strtotime($diag->diagnosis_date.' UTC')),
                date('Y-m-d h:i A', strtotime($diag->onset_date.' UTC')),
                $this->diagnosis_model->getDiagnosisById($diag->diagnosis_id)->long_description,
                $diag_code,
                $is_primary,
                $diag->diagnosis_notes,
                $this->encounter_model->getEncounterById($diag->encounter_id)->encounter_number,
                $appointment_facility,
                $options1.' '.$options2,
                    // $options4
            );
            
            
        }

        if (!empty($data['diagnosis'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->diagnosis_model->getDiagnosisByPatientCount($patient_id),
                "recordsFiltered" => $this->diagnosis_model->getDiagnosisBySearchByPatientCount($search, $patient_id),
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

}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
