<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diagnosis extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('diagnosis_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('midwife/midwife_model');
        $this->load->model('nurse/nurse_model');
        $this->load->model('encounter/encounter_model');
        $this->load->model('branch/branch_model');
        $this->load->model('hospital/hospital_model');
        $this->load->model('ion_auth_model');
        $this->load->model('settings/settings_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Patient', 'Clerk', 'Midwife'))) {
            redirect('home/permission');
        }
    }

    function index() {
        if (!$this->ion_auth->in_group(array('admin', 'Doctor'))) {
            redirect('home/permission');
        }
        $data['patient'] = null;
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
        $data['diagnosis'] = null;
        $data['id'] = null;
        $data['group_name'] = null;
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

    function addNew2() {
        $encounter_id = $this->input->post('encounter_id');
        $patient = $this->encounter_model->getEncounterById($encounter_id)->patient_id;
        $patient_name = $this->patient_model->getPatientById($patient)->name;
        $patient_address = $this->patient_model->getPatientById($patient)->address;
        $patient_phone = $this->patient_model->getPatientById($patient)->phone;
        $nowtime = date('H:i:s');
        $diag_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('date')));
        $on_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('on_date')));
        $diagnosis = $this->input->post('diag');
        $diagnosis_detail = $this->diagnosis_model->getDiagnosisById($diagnosis);
        $rank = $this->input->post('rank');
        $role = $this->input->post('role');
        $instruction = $this->input->post('instruction');
        $staff = $this->input->post('staff');
        $group = $this->input->get('group');
        $redirect = $this->input->post('redirect');
        $id = $this->input->post('id');
        $user = $this->ion_auth->get_user_id();
        $date = gmdate('Y-m-d H:i:s');

        if (empty($diagnosis)) {
            $diagnosis = $this->input->post('diag_manual');
            $diagnosis_obj = array(
                'patient_diagnosis_text' => $diagnosis,
            );
        } else {
            $diagnosis_obj = array(
                'diagnosis_id' => $diagnosis,
                'diagnosis_long_description' => $diagnosis_detail->long_description,
                'diagnosis_code' => $diagnosis_detail->code,
            );
        }

        do {
            $raw_diagnosis_number = 'D'.random_string('alnum', 6);
            $validate_number = $this->diagnosis_model->validateDiagnosisNumber($raw_diagnosis_number);
        } while($validate_number != 0);

        $diagnosis_number = strtoupper($raw_diagnosis_number);

        if (empty($id)) {
            if ($group === "Doctor") {
                $asserter_group_array = array('asserter_doctor_id' => $staff);
            } elseif ($group === "Midwife") {
                $asserter_group_array = array('asserter_midwife_id' => $staff);
            } elseif ($group === "Nurse") {
                $asserter_group_array = array('asserter_nurse_id' => $staff);
            }

            $data = array(
                'patient_id' => $patient,
                'patient_name' => $patient_name,
                'patient_address' => $patient_address,
                'patient_phone' => $patient_phone,
                'diagnosis_notes' => $instruction,
                'onset_date' => $on_date,
                'diagnosis_date' => $diag_date,
                'created_at' => $date,
                'encounter_id' => $encounter_id,
                'diagnosis_role_id' => $role,
                'patient_diagnosis_number' => $diagnosis_number,
                'diagnosis_rank' => $rank,
                'recorder_user_id' => $user
            );

            $add_data = array_merge(array_merge($data, $diagnosis_obj), $asserter_group_array);

            $this->diagnosis_model->insertDiagnosis($add_data);
        } else {

            if ($group === "Doctor") {
                $asserter_group_array = array(
                    'asserter_doctor_id' => $staff,
                    'asserter_midwife_id' => null,
                    'asserter_nurse_id' => null,
                );
            } elseif ($group === "Midwife") {
                $asserter_group_array = array(
                    'asserter_doctor_id' => null,
                    'asserter_midwife_id' => $staff,
                    'asserter_nurse_id' => null,
                );
            } elseif ($group === "Nurse") {
                $asserter_group_array = array(
                    'asserter_doctor_id' => null,
                    'asserter_midwife_id' => null,
                    'asserter_nurse_id' => $staff,
                );
            }

            $data = array(
                'patient_id' => $patient,
                'patient_name' => $patient_name,
                'patient_address' => $patient_address,
                'patient_phone' => $patient_phone,
                'diagnosis_notes' => $instruction,
                'onset_date' => $on_date,
                'diagnosis_date' => $diag_date,
                'updated_at' => $date,
                'encounter_id' => $encounter_id,
                'diagnosis_role_id' => $role,
                'diagnosis_rank' => $rank,
                'updater_user_id' => $user
            );

            $update_data = array_merge(array_merge($data, $diagnosis_obj), $asserter_group_array);

            $this->diagnosis_model->updateDiagnosis($id, $update_data);
        }
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
        // $diagnosis_number = $this->input->get('id');

        // $data['diagnosis'] = $this->diagnosis_model->getPatientDiagnosisByNumber($diagnosis_number);
        // $data['id'] = $data['diagnosis'][0]->id;
        $data['id'] = $this->input->get('id');
        $data['diagnosis'] = $this->diagnosis_model->getPatientDiagnosisById($data['id']);
        $data['encounter'] = $this->encounter_model->getEncounterById($data['diagnosis']->encounter_id);
        $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
        $data['patient'] = $this->patient_model->getPatientById($data['diagnosis']->patient_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['diagnosis']->doctor_id);
        $data['patient_details'] = null;
        // $data['diagnosis'] = $this->diagnosis_model->getPatientDiagnosisById($data['id']);
        $data['diagnosis_list'] = $this->diagnosis_model->getDiagnosis();
        $data['root'] = $this->input->get('root');
        $data['method'] = $this->input->get('method');
        if (!empty($data['root']) && !empty($data['method'])) {
            $data['redirect'] = $data['root'].'/'.$data['method'].'?encounter_id='.$data['encounter']->id;
        }
        if (!empty($data['diagnosis']->asserter_doctor_id)) {
            $doctor = $this->doctor_model->getDoctorById($data['diagnosis']->asserter_doctor_id);
            $group_name = $this->ion_auth->get_users_groups($user->id)->row($doctor->ion_user_id)->name;
            $group_name = strtolower($group_name);
        } elseif (!empty($data['diagnosis']->asserter_nurse_id)) {
            $nurse = $this->nurse_model->getNurseById($data['diagnosis']->asserter_nurse_id);
            $group_name = $this->ion_auth->get_users_groups($user->id)->row($nurse->ion_user_id)->name;
            $group_name = strtolower($group_name);
        } elseif (!empty($data['diagnosis']->asserter_midwife_id)) {
            $midwife = $this->midwife_model->getMidwifeById($data['diagnosis']->asserter_midwife_id);
            $group_name = $this->ion_auth->get_users_groups($user->id)->row($midwife->ion_user_id)->name;
            $group_name = strtolower($group_name);
        } else {
            $group_name = "";
        }

        $data['group_name'] = $group_name;

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
                    $options1 = '<a href="diagnosis/editDiagnosis?id='.$diag->id.'&root=patient&method=medicalHistory" class="btn btn-info"><i class="fe fe-edit"></i></a>';
                    $options2 = '<a href="" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fe fe-trash-2"></i></a>';
                } else {
                    $options1 = '<a href="diagnosis/editDiagnosis?id='.$diag->id.'&redirect=diagnosis" class="btn btn-info"><i class="fe fe-edit"></i></a>';
                    // $options2 = '<a href="" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fe fe-trash-2"></i></a>';
                    $options2 = '<button type="button" class="btn btn-danger" onclick="deleteDiagnosis('.$diag->id.');"><i class="fe fe-trash-2"></i></button>';
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

    public function getDiagnosisDisplay() {
        $id = $this->input->get('id');

        $encounter = $this->input->get('encounter');
        $encounter_details = $this->encounter_model->getEncounterById($encounter);

        $data['diagnosis_role'] = $this->diagnosis_model->getDiagnosisRoleList($encounter_details->encounter_type_id);

        $users = $this->getAsserterListSelect2();

        // $diagnosis = $this->diagnosis_model->getPatientDiagnosisByIdByEncounterId($encounter, $encounter_detail->patient_id);

        $diagnosis_grouping = [];
        foreach($data['diagnosis_role'] as $diagnosis_role) {
            $patient_diagnosis = $this->diagnosis_model->getPatientDiagnosisByIdByEncounterIdByRoleId($encounter, $encounter_details->patient_id, $diagnosis_role->id);
            $doctor_detail = $this->doctor_model->getDoctorById($encounter_details->doctor);
            // $doctor_asserter = '';
            // $asserter_display_name = '';
            $options = [];
            $asserter_merged = [];
            foreach ($patient_diagnosis as $patient_diag) {
                if (empty($patient_diag->diagnosis_code)) {
                    $code = 'N/A';
                } else {
                    $code = $patient_diag->diagnosis_code;
                }

                if (empty($patient_diag->diagnosis_long_description)) {
                    $description = $patient_diag->patient_diagnosis_text;
                } else {
                    $description = $patient_diag->diagnosis_long_description;
                }

                if (!empty($patient_diag->asserter_doctor_id)) {
                    $asserter = $this->doctor_model->getDoctorById($patient_diag->asserter_doctor_id);
                    $asserter_display_name = $asserter->professional_display_name;
                    $group_type = 'doctor';
                } elseif (!empty($patient_diag->asserter_midwife_id)) {
                    $asserter = $this->midwife_model->getMidwifeById($patient_diag->asserter_midwife_id);
                    $asserter_display_name = $asserter->firstname . ' ' . $asserter->middlename . ' ' . $asserter->lastname . ' ' . $asserter->suffix;
                    $group_type = 'midwife';
                } elseif (!empty($patient_diag->asserter_nurse_id)) {
                    $asserter = $this->nurse_model->getNurseById($patient_diag->asserter_nurse_id);
                    $asserter_display_name = $asserter->firstname . ' ' . $asserter->middlename . ' ' . $asserter->lastname . ' ' . $asserter->suffix;
                    $group_type = 'nurse';
                } else {
                    $asserter_display_name = '';
                    $group_type = '';
                }
                $asserter_merged[] = array(
                    'asserter' => $asserter_display_name,
                    'diagnosis_long_description' => $description,
                    'diagnosis_code' => $code,
                    'diagnosis_rank' => $patient_diag->diagnosis_rank
                );
                $options[] = array(
                    'options' => '<button type="button" class="btn btn-info" id="editBtn'.$patient_diag->id.'" data-staff_id="'.$asserter->id.'" data-group_type="'.$group_type.'" onclick="editDiagnosis('.$patient_diag->id.');"><i class="fe fe-edit"></i></button> <button type="button" class="btn btn-danger" onclick="deleteDiagnosis('.$patient_diag->id.');"><i class="fe fe-trash-2"></i></button>',
                );
            }
            $diagnosis = $this->diagnosis_model->getDiagnosisById($patient_diagnosis->diagnosis_id);

            if (!empty($patient_diagnosis)) {
                // $diagnosis_grouping[] = array(
                //     'diagnosis_id' => $patient_diagnosis->id,
                //     'diagnosis_description' => $patient_diagnosis->diagnosis_long_description,
                //     'icd_code' => $diagnosis->code,
                //     'role' => $diagnosis_role->id,
                //     'role_display' => $diagnosis_role->hl7_display,
                //     'doctor' => $doctor_detail->professional_display_name,
                // );
                $diagnosis_grouping[$diagnosis_role->id] = array(
                    'role_id' => $diagnosis_role->id,
                    'role_display' => $diagnosis_role->hl7_display,
                    'diagnosis_details' => $patient_diagnosis,
                    'asserter' => $asserter_merged,
                    'options' => $options,
                );
            }
        }

        $data['diagnosis_grouping'] = $diagnosis_grouping;

        // $ad = [];
        // $dd = [];
        // $cc = [];
        // $cm = [];
        // $pre = [];
        // $post = [];
        // $billing = [];

        // foreach($diagnosis as $diag) {

        // }

        // $diagnosis_grouping = array(

        // );

        if (empty($id)) {
            $form_t_body_information = '<tr>
                                        <td><label class="form-label">'.lang('diagnosis').' '.lang('date').'</label><input type="text" class="form-control flatpickr" id="date1" required readonly placeholder="MM/DD/YYYY" name="date"></td>
                                        <td><label class="form-label">'.lang('onset').' '.lang('date').'</label><input type="text" class="form-control flatpickr" id="on_date1" required readonly placeholder="MM/DD/YYYY" name="on_date"></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">'.lang('diagnosed_by').'</label><select class="select2-show-search form-control doctor" name="staff" id="staff" placeholder="'.lang('select_user').'" onchange="selectUser();"><option label="'.lang('select_user').'"></option>'.$users.'</td>
                                        <td><label class="form-label">'.lang('diagnosis').' '.lang('role').'</label><select class="select2-show-search form-control role" id="role" name="role"></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">'.lang('diagnosis').' '.'<button type="button" class="btn btn-light btn-sm" id="switchDiagnosisType" onclick="switchDiagnosisFieldType();">'.lang("enter").' '.lang("manually").'</button>'.'</label><div id="diagnosis_div"><select class="select2-show-search form-control diagnosis_select" name="diag" id="diagnosis_select" value=""></select></div></td>
                                        <td><label class="form-label">'.lang('rank').'</label><select class="select2-show-search form-control ranking_select" name="rank" id="ranking">
                                            <option label="'.lang("rank").'"></option>
                                            <option value="1">Primary Diagnosis</option>
                                            <option value="2">Secondary Diagnosis</option>
                                            <option value="3">Tertiary Diagnosis</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label class="form-label">'.lang('diagnosis').' '.lang('note').'</label><input type="text" class="form-control" name="instruction" id="instruction"></td>
                                    </tr>';
            $form_submit_btn_text = lang("add").' '.("diagnosis");
            $form_cancel_change = '';
            $form_header_text = lang("add").' '.("diagnosis");
        } else {
            $form_t_body_information = '<tr>
                                        <td><label class="form-label">'.lang('diagnosis').' '.lang('date').'</label><input type="text" class="form-control flatpickr" id="date1" required readonly placeholder="MM/DD/YYYY" name="date"></td>
                                        <td><label class="form-label">'.lang('onset').' '.lang('date').'</label><input type="text" class="form-control flatpickr" id="on_date1" required readonly placeholder="MM/DD/YYYY" name="on_date"></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">'.lang('diagnosed_by').'</label><select class="select2-show-search form-control doctor" name="staff" id="staff" placeholder="'.lang('select_user').'" onchange="selectUser();"><option label="'.lang('select_user').'"></option>'.$users.'</td>
                                        <td><label class="form-label">'.lang('diagnosis').' '.lang('role').'</label><select class="select2-show-search form-control role" id="role" name="role"></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">'.lang('diagnosis').' '.'<button type="button" class="btn btn-light btn-sm" id="switchDiagnosisType" onclick="switchDiagnosisFieldType();">'.lang('enter').' '.lang('manually').'</button>'.'</label><div id="diagnosis_div"><select class="select2-show-search form-control diagnosis_select" name="diag" id="diagnosis_select" value=""></select></div></td>
                                        <td><label class="form-label">'.lang('rank').'</label><select class="select2-show-search form-control ranking_select" name="rank" id="ranking">
                                            <option label="'.lang("rank").'"></option>
                                            <option value="1">Primary Diagnosis</option>
                                            <option value="2">Secondary Diagnosis</option>
                                            <option value="3">Tertiary Diagnosis</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label class="form-label">'.lang('diagnosis').' '.lang('note').'</label><input type="text" class="form-control" name="instruction" id="instruction"></td>
                                    </tr>';
            $form_submit_btn_text = lang("save").' '.("changes");
            $form_cancel_change = '<button type="submit" class="btn btn-danger" id="cancel_changes">'.lang('cancel').' '.lang('changes').'</button>';
            $form_header_text = lang("edit").' '.("diagnosis");
        }

        $data['diagnosis_display'] = '<div class="table-responsive">
                                        <table class="table nowrap text-nowrap border mt-5">
                                            <thead>
                                                <tr>
                                                    <th class="w-70" id="form_header">'.$form_header_text.'</th>
                                                    <th class="w-30"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                '.$form_t_body_information.'
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td id="cancel_change_td">'.$form_cancel_change.'</td>
                                                    <td><button type="submit" class="btn btn-primary pull-right" id="new_record">'.$form_submit_btn_text.'</button></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>';

        echo json_encode($data);
    }

    public function getDiagnosisRoleSelect2() {
// Search term
        $searchTerm = $this->input->post('searchTerm');
        $encounter_id = $this->input->get('encounter');

        $encounter_detail = $this->encounter_model->getEncounterById($encounter_id);

// Get users
        $response = $this->diagnosis_model->getDiagnosisRoleInfo($searchTerm, $encounter_detail->encounter_type_id);

        echo json_encode($response);
    }

    public function getAsserterListSelect2() {
        $settings = $this->settings_model->getSettings();
        $allowed_diagnosis_asserter = explode(',', $settings->allowed_diagnosis_asserter);
        $staff = $this->diagnosis_model->getListOfStafffByGroupName($allowed_diagnosis_asserter);

        return $staff;
    }

    public function editDiagnosisByJson() {
        $id = $this->input->get('id');
        $group = $this->input->get('group');
        $data['diagnosis_details'] = $this->diagnosis_model->getPatientDiagnosisById($id);
        $data['role'] = $this->diagnosis_model->getDiagnsosiRoleById($data['diagnosis_details']->diagnosis_role_id);
        $data['diagnosis'] = $this->diagnosis_model->getDiagnosisById($data['diagnosis_details']->diagnosis_id);
        $user = '';
        if ($group === "doctor") {
            $user = $this->db->get_where($group, array('hospital_id' => $this->session->userdata('hospital_id'), 'id' => $data['diagnosis_details']->asserter_doctor_id))->row();
        } elseif ($group === "midwife") {
            $user = $this->db->get_where($group, array('hospital_id' => $this->session->userdata('hospital_id'), 'id' => $data['diagnosis_details']->asserter_midwife_id))->row();
        } elseif ($group === "nurse") {
            $user = $this->db->get_where($group, array('hospital_id' => $this->session->userdata('hospital_id'), 'id' => $data['diagnosis_details']->asserter_nurse_id))->row();
        } else {
            $user = '';
        }

        $data['user'] = $user;
        
        echo json_encode($data);
    }

    public function deleteDiagnosis() {
        if (!$this->ion_auth->in_group(array('Doctor', 'Midwife'))) {
            redirect('home/permission');
        }
        $id = $this->input->get('id');

        $this->diagnosis_model->deleteDiagnosis($id);

        echo json_encode($id);
    }

}

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
