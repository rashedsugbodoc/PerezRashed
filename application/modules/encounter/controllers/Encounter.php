<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Encounter extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('encounter_model');
        $this->load->model('branch/branch_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('profile/profile_model');
        $this->load->model('prescription/prescription_model');
        $this->load->model('form/form_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('finance/finance_model');

        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist', 'Nurse'))) {
            redirect('home/permission');
        }
    }

    function index() {
        $data = array();

        $data['branches'] = $this->branch_model->getBranches();
        $data['encounter_types'] = $this->encounter_model->getEncounterType();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['staffs'] = $this->encounter_model->getUser();
        $data['providers'] = $this->hospital_model->getHospital();
        $data['templates'] = $this->form_model->getTemplate();
        $data['categories'] = $this->form_model->getFormCategory();

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('encounter', $data);
    }

    function addNewView() {
        $data = array();

        $data['patient_id'] = $this->input->get('patient_id');
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        if (!empty($root) && !empty($method)) {
            $data['redirect'] = $root . '/' . $method . '?encounter_id=';
        }
        $data['patient_details'] = $this->patient_model->getPatientByPatientNumber($data['patient_id']);
        $current_user = $this->ion_auth->get_user_id();
        if ($this->ion_auth->in_group('Doctor')) {
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
            $data['doctordetails'] = $this->db->get_where('doctor', array('id' => $doctor_id))->row();
        }

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_new', $data);
    }

    function addNew() {
        $id = $this->input->post('encounter_id');

        $redirect = $this->input->post('redirect');
        $type = $this->input->post('type');
        $location = $this->input->post('location');
        if ($location == 0) {
            $location = null;
        }
        $patient_id = $this->input->post('patient');
        $rendering_doctor_id = $this->input->post('rendering_doctor');
        if ($rendering_doctor_id == "add_new") {
            $rendering_doctor_id = null;
        }
        $render_name = $this->input->post('render_name');
        $ref_doctor_id = $this->input->post('ref_doctor');
        if ($ref_doctor_id == "add_new") {
            $ref_doctor_id = null;
        }
        $ref_name = $this->input->post('ref_name');
        $provider_id = $this->input->post('provider');
        if ($provider_id == "add_new") {
            $provider_id = null;
        }
        $provider_name = $this->input->post('provider_name');
        $reason = $this->input->post('reason');
        $rendering_user_id = $this->input->post('rendering_user');

        $user = $this->session->userdata('user_id');

        $date = gmdate('Y-m-d H:i:s');

        $encounter_status = $this->input->post('encounter_status');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Fname Field
        $this->form_validation->set_rules('type', 'Encounter Type', 'trim|required|min_length[1]|max_length[10]|xss_clean');
        // Validating Fname Field
        $this->form_validation->set_rules('location', 'Location', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Fname Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        if ($rendering_doctor_id == null) {
            // Validating Fname Field
            $this->form_validation->set_rules('render_name', 'Rendering Doctor', 'trim|min_length[1]|max_length[100]|xss_clean');
        } else {
            // Validating Fname Field
            $this->form_validation->set_rules('rendering_doctor', 'Rendering Doctor', 'trim|min_length[1]|max_length[10]|xss_clean');
        }
        if ($ref_doctor_id == null) {
            // Validating Fname Field
            $this->form_validation->set_rules('ref_name', 'Refferal Doctor', 'trim|min_length[1]|max_length[100]|xss_clean');
        } else {
            // Validating Fname Field
            $this->form_validation->set_rules('ref_doctor', 'Refferal Doctor', 'trim|min_length[1]|max_length[10]|xss_clean');
        }
        if ($provider_id == null) {
            // Validating Fname Field
            $this->form_validation->set_rules('provider_name', 'Provider', 'trim|min_length[1]|max_length[100]|xss_clean');
        } else {
            // Validating Fname Field
            $this->form_validation->set_rules('provider', 'Provider', 'trim|min_length[1]|max_length[10]|xss_clean');
        }
        // Validating Fname Field
        $this->form_validation->set_rules('reason', 'Reason', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Fname Field
        $this->form_validation->set_rules('encounter_status', 'Encounter Status', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if(!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['encounter'] = $this->encounter_model->getEncounterById($id);
                $data['patients'] = $this->patient_model->getPatient();
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['providers'] = $this->hospital_model->getHospital();
                $data['branches'] = $this->branch_model->getBranches();
                $this->load->view('home/dashboardv2');
                $this->load->view('add_new', $data);
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['patients'] = $this->patient_model->getPatient();
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['providers'] = $this->hospital_model->getHospital();
                $data['branches'] = $this->branch_model->getBranches();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('encounter', $data);
                // $this->load->view('home/footer'); // just the header file
            }
            
        } else {
            $data = array();

            if (empty($id)) {
                $data = array(
                    'encounter_type_id' => $type,
                    'patient_id' => $patient_id,
                    'doctor' => $rendering_doctor_id,
                    'rendering_staff_id' => $rendering_user_id,
                    'rendering_staff_name' => $render_name,
                    'referral_facility_id' => $provider_id,
                    'referral_facility_name' => $provider_name,
                    'referral_staff_id' => $ref_doctor_id,
                    'referral_staff_name' => $ref_name,
                    'started_at' => $date,
                    'waiting_started' => $date,
                    'created_at' => $date,
                    'created_user_id' => $user,
                    'encounter_status' => $encounter_status,
                    'location_id' => $location,
                    'reason' => $reason,
                );

                $this->encounter_model->insertEncounter($data);
                $this->session->set_flashdata('success', lang('record_added'));

                $inserted_id = $this->db->insert_id();
                if(!empty($redirect)) {
                    $redirect = $redirect . $inserted_id;
                }

                $encounter_number = date('ymd').format_number_with_digits($inserted_id, 4);

                $data = array(
                    'encounter_number' => $encounter_number,
                );

                $this->encounter_model->updateEncounter($inserted_id, $data);
                
                if(!empty($redirect)) {
                    redirect($redirect);
                } else {
                    redirect('encounter');
                }
            } else {
                $data = array(
                    'encounter_type_id' => $type,
                    'patient_id' => $patient_id,
                    'doctor' => $rendering_doctor_id,
                    'rendering_staff_id' => $rendering_user_id,
                    'rendering_staff_name' => $render_name,
                    'referral_facility_id' => $provider_id,
                    'referral_facility_name' => $provider_name,
                    'referral_staff_id' => $ref_doctor_id,
                    'referral_staff_name' => $ref_name,
                    'created_user_id' => $user,
                    'encounter_status' => $encounter_status,
                    'location_id' => $location,
                    'reason' => $reason,
                );


                $this->encounter_model->updateEncounter($id, $data);

                if(!empty($redirect)) {
                    redirect($redirect);
                } else {
                    redirect('encounter');
                }
            }
        }

    }

    function getEncounter() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($this->ion_auth->in_group('Doctor')) {
            $user = $this->session->userdata('user_id');
            $doctor_id = $this->doctor_model->getDoctorByIonUserId($user)->id;
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['encounters'] = $this->encounter_model->getEncounterBySearchByDoctorId($search, $doctor_id);
                } else {
                    $data['encounters'] = $this->encounter_model->getEncounterByDoctorId($doctor_id);
                }
            } else {
                if (!empty($search)) {
                    $data['encounters'] = $this->encounter_model->getEncounterByLimitBySearchByDoctorId($limit, $start, $search, $doctor_id);
                } else {
                    $data['encounters'] = $this->encounter_model->getEncounterByLimitByDoctorId($limit, $start, $doctor_id);
                }
            }
        } elseif ($this->ion_auth->in_group(array('admin', 'Receptionist'))) {
            if ($limit == -1) {
                if (!empty($search)) {
                    $data['encounters'] = $this->encounter_model->getEncounterBysearch($search);
                } else {
                    $data['encounters'] = $this->encounter_model->getEncounter();
                }
            } else {
                if (!empty($search)) {
                    $data['encounters'] = $this->encounter_model->getEncounterByLimitBySearch($limit, $start, $search);
                } else {
                    $data['encounters'] = $this->encounter_model->getEncounterByLimit($limit, $start);
                }
            }
        }
        
        $i = 0;
        foreach ($data['encounters'] as $encounter) {
            $patient = $this->patient_model->getPatientById($encounter->patient_id);
            // $user = $this->profile_model->getProfileById($encounter->rendering_staff_id)->username;
            $doctor = $this->doctor_model->getDoctorById($encounter->doctor)->name;
            $due = $this->settings_model->getSettings()->currency .' '. number_format($this->encounter_model->getDueBalanceByPatientIdByEncounterId($encounter->patient_id, $encounter->id),2);
            $payment_status = $this->finance_model->getInvoicePaymentStatusById($encounter->payment_status)->display_name;
            if (empty($doctor)) {
                if (!empty($encounter->rendering_staff_name)) {
                    $doctor = $encounter->rendering_staff_name;
                } else {
                    if (!empty($encounter->created_user_id)) {
                        $doctor = $this->profile_model->getProfileById($encounter->created_user_id)->username;
                    } else {
                        $doctor = "NO Data";
                    }
                }
            }
            $encounter_status = $this->encounter_model->getEncounterStatusById($encounter->encounter_status)->display_name;
            $case_encounter = $this->patient_model->getMedicalHistoryByEncounterId($encounter->id);
            $prescription_encounter = $this->prescription_model->getPrescriptionByEncounterId($encounter->id);
            $document_encounter = $this->patient_model->getPatientMaterialByEncounterId($encounter->id);
            $form_encounter = $this->form_model->getFormByEncounterId($encounter->id);
            if (empty($user)) {
                $user = $encounter->rendering_staff_name;
            }
            $i = $i + 1;
            $settings = $this->settings_model->getSettings();
            if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
                $option1 = '<button type="button" class="btn btn-info btn-xs view_button" data-toggle="modal" data-id="'. $encounter->id .'"><i class="fa fa-eye"></i>  '. lang('view') . lang('encounter') .'</button>';
                $option2 = '<button type="button" class="btn btn-info btn-xs editbutton" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-edit"> </i>  '. lang('edit') .'</button>';                
                if (empty($encounter->start_vital_id)) {
                    $option3 = '<button type="button" class="vitalbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '" data-patient="' . $encounter->patient_id . '"><i class="fa fa-camera"> </i>'. '  ' . lang('capture_vitals') .'</button>';
                } else {
                    $option3 = '<button type="button" class="vitalbutton dropdown-item bg-success text-light" data-toggle="modal" data-id="' . $encounter->id . '" data-patient="' . $encounter->patient_id . '"><i class="fa fa-check"></i>'. '  ' . lang('vitals_captured') .'</button>';
                }
                $option4 = '<a class="btn btn-info btn-xs billbutton" href="finance/addPaymentView?id=' . $encounter->id . '" data-id="' . $encounter->id . '"><i class="fa fa-money"> </i>'. ' ' . lang('generate_bill') . '</a>';
                $option5 = '<a class="btn btn-danger btn-xs delete_button" href="encounter/delete?id=' . $encounter->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    if (empty($case_encounter->encounter_id)) {
                        $option7 = '<button type="button" class="casebutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-file-text"> </i>  '. lang('add') . ' ' . lang('case_note') .'</button>';
                    } else {
                        $option7 = '<button type="button" class="casebutton dropdown-item bg-success text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-check"> </i>  '. lang('add') . ' ' . lang('case_note') .'</button>';
                    }
                }
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    if (empty($prescription_encounter->encounter_id)) {
                        $option8 = '<a href="prescription/addPrescriptionView?encounter_id='. $encounter->id .'" class="dropdown-item bg-info text-light" target="_blank"><i class="fa fa-file"> </i>  '. lang('add') . ' ' . lang('prescription') .'</a>';
                    } else {
                        $option8 = '<a href="prescription/addPrescriptionView?encounter_id='. $encounter->id .'" class="dropdown-item bg-success text-light" target="_blank"><i class="fa fa-check"> </i>  '. lang('add') . ' ' . lang('prescription') .'</a>';
                    }
                }
                if (empty($document_encounter->encounter_id)) {
                    $option9 = '<button type="button" class="documentbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-image"> </i>  '. lang('add') . ' ' . lang('document') .'</button>';
                } else {
                    $option9 = '<button type="button" class="documentbutton dropdown-item bg-success text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-check"> </i>  '. lang('add') . ' ' . lang('document') .'</button>';
                }
                if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
                    if (empty($form_encounter->encounter_id)) {
                        // $option10 = '<button type="button" class="formbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-file-text"> </i>  '. lang('add') . ' ' . lang('form') .'</button>';
                        $option10 = '<a href="form?encounter_id='.$encounter->id.'&redirect=encounter" class="dropdown-item bg-info text-light" target="_blank"><i class="fa fa-file-text"> </i>  '. lang('add') . ' ' . lang('form') .'</a>';
                    } else {
                        // $option10 = '<button type="button" class="formbutton dropdown-item bg-success text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-check"> </i>  '. lang('add') . ' ' . lang('form') .'</button>';
                        $option10 = '<a href="form?encounter_id='.$encounter->id.'&redirect=encounter" class="dropdown-item bg-success text-light" target="_blank"><i class="fa fa-file-text"> </i>  '. lang('add') . ' ' . lang('form') .'</a>';
                    }
                }
                if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
                    if (empty($encounter->invoice_id)) {
                        $option11 = '<a class="billbutton dropdown-item bg-info text-light" href="finance/addPaymentView?encounter_id=' . $encounter->id . '" data-id="' . $encounter->id . '" target="_blank"><i class="fa fa-money"></i>  '. ' ' . lang('generate_bill') . '</a>';
                    } else {
                        $option11 = '<a class="billbutton dropdown-item bg-success text-light" href="finance/addPaymentView?encounter_id=' . $encounter->id . '" data-id="' . $encounter->id . '" target="_blank"><i class="fa fa-check"></i>  '. ' ' . lang('generate_bill') . '</a>';
                    }
                }
                if ($this->ion_auth->in_group(array('Doctor'))) {
                        $option12 = '<a class="patientbutton dropdown-item bg-info text-light" href="patient/medicalHistory?id=' . $patient->patient_id . '" data-id="' . $encounter->id . '" target="_blank"><i class="fa fa-eye"></i>  '. lang('view') .' ' .lang('patient') .' '. lang('history') . '</a>';
                }
                $option6 = '<div class="dropdown">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-caret-down mr-2"></i>'. lang('actions') .'
                                </button>
                                <div class="dropdown-menu" style="overflow: auto; height: 200px; scrollbar-width: auto;">
                                    <a class="view_button dropdown-item bg-info text-light" href="patient/medicalHistory?encounter_id=' . $encounter->id . '" target="_blank"><i class="fa fa-eye"></i>  '. lang('view') . ' ' . lang('encounter') .'</a>
                                    <button type="button" class="editbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-edit"> </i>  '. lang('edit') . ' ' . lang('encounter') .'</button>
                                    '.$option12.'
                                    '.$option3.'
                                    '.$option7.'
                                    '.$option8.'
                                    '.$option9.'
                                    '.$option10.'
                                    '.$option11.'
                                    <a class="billbutton dropdown-item bg-info text-light" href="diagnosis/addDiagnosisView?encounter_id=' . $encounter->id . '" data-id="' . $encounter->id . '" target="_blank"><i class="fa fa-money"></i>  '. ' ' . lang('add') . ' ' . lang('diagnosis') . '</a>
                                    <a class="billbutton dropdown-item bg-info text-light" href="labrequest/addLabRequestView?encounter_id=' . $encounter->id . '" data-id="' . $encounter->id . '" target="_blank"><i class="fa fa-money"></i>  '. ' ' . lang('add') . ' ' . lang('lab') . ' '. lang('request') . '</a>
                                    <a class="delete_button dropdown-item bg-danger text-light" href="encounter/delete?id=' . $encounter->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>  ' . lang('delete') . '</a>
                                </div>
                            </div>';
            } elseif($this->ion_auth->in_group(array('Receptionist'))) {
                if (empty($encounter->start_vital_id)) {
                    $option3 = '<button type="button" class="vitalbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '" data-patient="' . $encounter->patient_id . '"><i class="fa fa-camera"> </i>'. '  ' . lang('capture_vitals') .'</button>';
                } else {
                    $option3 = '<button type="button" class="vitalbutton dropdown-item bg-success text-light" data-toggle="modal" data-id="' . $encounter->id . '" data-patient="' . $encounter->patient_id . '"><i class="fa fa-check"></i>'. '  ' . lang('vitals_captured') .'</button>';
                }
                $option6 = '<div class="dropdown">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-caret-down mr-2"></i>'. lang('actions') .'
                                </button>
                                <div class="dropdown-menu" style="overflow: auto; height: 200px; scrollbar-width: auto;">
                                    '.$option3.'
                                </div>
                            </div>';
            }
            $info[] = array(
                date('Y-m-d h:i A', strtotime($encounter->created_at.' UTC')),
                $encounter->encounter_number,
                $patient->name,
                $doctor,
                $due,
                $payment_status,
                $encounter_status,
                $option6
                    //  $options2
            );
        }

        if (!empty($data['encounters'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->encounter_model->getEncounterCount(),
                "recordsFiltered" => $this->encounter_model->getEncounterBySearchCount($search),
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

    function getEncounterTypeInfo() {
        // Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->encounter_model->getEncounterTypeInfo($searchTerm);

        echo json_encode($response);
    }

//     function getEncounterStatus() {
//         // Search term
//         $searchTerm = $this->input->post('searchTerm');

// // Get users
//         $response = $this->encounter_model->getEncounterStatus($searchTerm);

//         echo json_encode($response);
//     }

    public function getStatusByEncounterType() {
        $data = array();
        $id = $this->input->get('id');

        $data['status'] = $this->encounter_model->getEncounterStatusByEncounterType($id);
        

        echo json_encode($data);        
    }

    public function getLocationByEncounterType() {
        $data = array();
        $type_id = $this->input->get('type_id');
        $is_virtual = $this->encounter_model->getEncounterTypeById($type_id)->is_virtual;
        if (empty($is_virtual)) {
            $data['encounter_type'] = $this->branch_model->getBranches();
        } else {
            $data['encounter_type'] = array([
                'id' => 0,
                'display_name' => 'Online'
            ]);
        }

        echo json_encode($data);
    }

    public function editEncounterByJason() {
        $data = array();
        $id = $this->input->get('id');

        $data['encounter'] = $this->encounter_model->getEncounterById($id);

        echo json_encode($data);
    }

    public function getEncounterById() {
        $data = array();
        $id = $this->input->get('id');

        $data['encounter'] = $this->encounter_model->getEncounterById($id);

        echo json_encode($data);
    }

    public function getProviderInfoWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->encounter_model->getProviderInfoWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getProviderInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->encounter_model->getProviderInfo($searchTerm);

        echo json_encode($response);
    }

    function getEncounterInfo() {
        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $user = $this->session->userdata('user_id');

        if ($this->ion_auth->in_group('Doctor')) {
            $doctor = $this->doctor_model->getDoctorByIonUserId($user)->id;
        }

// Get users
        $response = $this->encounter_model->getEncounterInfo($searchTerm, $doctor);

        echo json_encode($response);
    }

    function getEncounterInfoByPatientId() {
        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $user = $this->session->userdata('user_id');
        $patient = $this->input->get('patient');

        if ($this->ion_auth->in_group('Doctor')) {
            $doctor = $this->doctor_model->getDoctorByIonUserId($user)->id;
        }

// Get users
        $response = $this->encounter_model->getEncounterInfoByPatient($searchTerm, $doctor, $patient);

        echo json_encode($response);
    }

    public function getUserByApplicableUserGroupWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->encounter_model->getUserByApplicableUserGroupWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getUserWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users

        $response = $this->encounter_model->getUserWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getUserWithoutAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users

        $response = $this->encounter_model->getUserWithoutAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getDoctorWithoutAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users

        $response = $this->doctor_model->getDoctorWithoutAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getRenderingDoctorWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users

        $response = $this->encounter_model->getRenderingDoctorWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getRenderingDoctorWithoutAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users

        $response = $this->encounter_model->getRenderingDoctorWithoutAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getReferredByDoctorWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users

        $response = $this->encounter_model->getReferredDoctorWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getEncounterByPatientId() {
        $patient_id = $this->input->get('patient_id');
        $doctor_id = $this->input->get('doctor_id');

        if (!empty($patient_id)) {
            $data['encounter'] = $this->encounter_model->getEncounterWithTypeNameByPatientId($patient_id);
        } else if (!empty($doctor_id)) {
            $data['encounter'] = $this->encounter_model->getEncounterWithTypeNameByDoctorId($doctor_id);
        }

        // $data['encounter'] = array_merge($data['encounter'], $data['encounter_type']);

        echo json_encode($data);
    }

    function startEncounterFromAppointment() {
        $status = $this->input->get('status');
        if (empty($status)) {
            $status = 3;
        }
        $appointment_id = $this->input->get('appointment_id');
        $user = $this->session->userdata('user_id');
        $appointment_details = $this->appointment_model->getAppointmentById($appointment_id);
        $appointment_doctor = $appointment_details->doctor;
        $appointment_patient = $appointment_details->patient;
        $patient = $this->patient_model->getPatientById($appointment_patient = $appointment_details->patient);
        $appointment_remarks = $appointment_details->remarks;
        $root = $this->input->get('root');
        $method = $this->input->get('method');

        $date = date("Y-m-d H:i:s", now('UTC'));

        if ($status === "1" || $status === 1) {
            $status_time = array('waiting_started' => $date);
        } elseif ($status === "2" || $status === 2) {
            $status_time = array('ready_to_serve_at' => $date);
        } elseif ($status === "3" || $status === 3) {
            $status_time = array('started_at' => $date);
        } elseif ($status === "4" || $status === 4) {
            $status_time = array('ended_at' => $date);
        } elseif ($status === "5" || $status === 5) {
            $status_time = array('cancelled_at' => $date);
        } elseif ($status === "6" || $status === 6) {
            $status_time = array('rescheduled_at' => $date);
        }

        $appointment_service_is_virtual = $this->appointment_model->getServiceCategoryById($appointment_details->service_category_group_id);

        if (!empty($appointment_service_is_virtual->is_consultation) && !empty($appointment_service_is_virtual->is_virtual)) {
            $encounter_type_name = "virtual_consult";
        } else {
            $encounter_type_name = "clinic_visit";
        }

        $encounter_type_id = $this->encounter_model->getEncounterTypeIdByName($encounter_type_name)->id;

        $data_encounter = array(
            'encounter_type_id' => $encounter_type_id,
            'appointment_id' => $appointment_id,
            'patient_id' => $appointment_patient,
            'rendering_staff_id' => $appointment_doctor,
            'doctor' => $appointment_doctor,
            'created_at' => $date,
            'started_at' => $date,
            // 'waiting_started' => $date,
            'encounter_status' => $status,
            'created_user_id' => $user,
            'reason' => $appointment_remarks,
            'location_id' => $appointment_details->location_id,
        );

        $data_encounter = array_merge($status_time, $data_encounter);

        $this->encounter_model->insertEncounter($data_encounter);
        $inserted_id = $this->db->insert_id();
        if (!empty($root) && !empty($method)) {
            $redirect = $root . '/' . $method . '?id=' . $patient->patient_id . '&encounter_id=' . $inserted_id;
        }
        $data_appointment_encounter = array(
            'encounter_id' => $inserted_id
        );
        $this->appointment_model->updateAppointment($appointment_id, $data_appointment_encounter);

        $encounter_number = date('ymd').format_number_with_digits($inserted_id, 3);

        $data_encounter = array(
            'encounter_number' => $encounter_number,
        );

        $this->encounter_model->updateEncounter($inserted_id, $data_encounter);

        if (!empty($redirect)) {
            redirect($redirect);
        } else {
            redirect('encounter');
        }

    }

    function startEncounter() {
        $encounter_id = $this->input->post('encounter_id');
        $encounter_number = $this->encounter_model->getEncounterById($encounter_id)->encounter_number;
        $encounter_patient = $this->encounter_model->getEncounterById($encounter_id)->patient_id;
        $patient_number = $this->patient_model->getPatientById($encounter_patient)->patient_id;
        $user = $this->session->userdata('user_id');
        $date = date("Y-m-d H:i:s", now('UTC'));
        $redirect = $this->input->post('redirect');

        $data_encounter = array(
            'patient_id' => $encounter_patient,
            'started_at' => $date,
            'waiting_started' => $date,
            'encounter_status' => 3,
        );

        $this->encounter_model->updateEncounter($encounter_id, $data_encounter);

        redirect($redirect.'?id='.$patient_number.'&encounter_id='.$encounter_id);
    }

    function endEncounter() {
        $encounter_id = $this->input->post('encounter_id');
        $encounter_number = $this->encounter_model->getEncounterById($encounter_id)->encounter_number;
        $encounter_patient = $this->encounter_model->getEncounterById($encounter_id)->patient_id;
        $patient_number = $this->patient_model->getPatientById($encounter_patient)->patient_id;
        $user = $this->session->userdata('user_id');
        $date = date("Y-m-d H:i:s", now('UTC'));
        $redirect = $this->input->post('redirect');

        $data_encounter = array(
            'patient_id' => $encounter_patient,
            'ended_at' => $date,
            'encounter_status' => 4,
        );

        $this->encounter_model->updateEncounter($encounter_id, $data_encounter);

        redirect($redirect.'?encounter_id='.$encounter_id);
    }

    function endEncounterById() {
        $encounter_id = $this->input->get('encounter_id');
        $appointment_id = $this->input->get('appointment_id');
        $date = date("Y-m-d H:i:s", now('UTC'));

        $data = array(
            "ended_at" => $date,
            "encounter_status" => 4
        );
        $this->encounter_model->updateEncounter($encounter_id, $data);

        $data_appointment = array(
            "status" => "Consulted"
        );
        $this->appointment_model->updateAppointment($appointment_id, $data_appointment);


        echo json_encode($data);
    }

    

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
