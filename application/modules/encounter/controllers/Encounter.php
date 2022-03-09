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
        $this->load->model('form/form_model');
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
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_new', $data);
    }

    function addNew() {
        $id = $this->input->post('encounter_id');

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
                'waiting_started' => $date,
                'created_at' => $date,
                'created_user_id' => $user,
                'encounter_status' => $encounter_status,
                'location_id' => $location,
                'reason' => $reason,
            );
            if (empty($id)) {
                $this->encounter_model->insertEncounter($data);
                $this->session->set_flashdata('success', lang('record_added'));

                $inserted_id = $this->db->insert_id();

                $encounter_number = date('ymd').format_number_with_digits($inserted_id, 3);

                $data = array(
                    'encounter_number' => $encounter_number,
                );

                $this->encounter_model->updateEncounter($inserted_id, $data);
                
                redirect('encounter');
            } else {
                $this->encounter_model->updateEncounter($id, $data);
                redirect('encounter');
            }
        }

    }

    function getEncounter() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

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
        $i = 0;
        foreach ($data['encounters'] as $encounter) {
            $patient = $this->patient_model->getPatientById($encounter->patient_id)->name;
            // $user = $this->profile_model->getProfileById($encounter->rendering_staff_id)->username;
            $doctor = $this->doctor_model->getDoctorById($encounter->doctor)->name;
            $encounter_status = $this->encounter_model->getEncounterStatusById($encounter->encounter_status)->display_name;
            $case_encounter = $this->patient_model->getMedicalHistoryByEncounterId($encounter->id);
            if (empty($user)) {
                $user = $encounter->rendering_staff_name;
            }
            $i = $i + 1;
            $settings = $this->settings_model->getSettings();
            if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
                $option1 = '<button type="button" class="btn btn-info btn-xs view_button" data-toggle="modal" data-id="'. $encounter->id .'"><i class="fa fa-eye"></i>  '. lang('view') . lang('encounter') .'</button>';
                $option2 = '<button type="button" class="btn btn-info btn-xs editbutton" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-edit"> </i>  '. lang('edit') .'</button>';                
                if (empty($encounter->start_vital_id)) {
                    $option3 = '<button type="button" class="vitalbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-camera"> </i>'. '  ' . lang('capture_vitals') .'</button>';
                } else {
                    $option3 = '<button type="button" class="vitalbutton dropdown-item bg-success text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-check"></i>'. '  ' . lang('vitals_captured') .'</button>';
                }
                $option4 = '<a class="btn btn-info btn-xs billbutton" href="finance/addPaymentView?id=' . $encounter->id . '" data-id="' . $encounter->id . '"><i class="fa fa-money"> </i>'. ' ' . lang('generate_bill') . '</a>';
                $option5 = '<a class="btn btn-danger btn-xs delete_button" href="encounter/delete?id=' . $encounter->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
                if (empty($case_encounter->encounter_id)) {
                    $option7 = '<button type="button" class="casebutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-file-text"> </i>  '. lang('add') . ' ' . lang('case_note') .'</button>';
                } else {
                    $option7 = '<button type="button" class="casebutton dropdown-item bg-success text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-check"> </i>  '. lang('add') . ' ' . lang('case_note') .'</button>';
                }
                $option6 = '<div class="dropdown">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-caret-down mr-2"></i>'. lang('actions') .'
                                </button>
                                <div class="dropdown-menu" style="overflow: auto; height: 200px; scrollbar-width: auto;">
                                    <button type="button" class="view_button dropdown-item bg-info text-light" data-toggle="modal" data-id="'. $encounter->id .'"><i class="fa fa-eye"></i>  '. lang('view') . ' ' . lang('encounter') .'</button>
                                    <button type="button" class="editbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-edit"> </i>  '. lang('edit') . ' ' . lang('encounter') .'</button>
                                    '.$option3.'
                                    '.$option7.'
                                    <a href="prescription/addPrescriptionView?id='. $encounter->id .'" class="dropdown-item bg-info text-light"><i class="fa fa-file"> </i>  '. lang('add') . ' ' . lang('prescription') .'</a>
                                    <button type="button" class="documentbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-image"> </i>  '. lang('add') . ' ' . lang('document') .'</button>
                                    <button type="button" class="formbutton dropdown-item bg-info text-light" data-toggle="modal" data-id="' . $encounter->id . '"><i class="fa fa-file-text"> </i>  '. lang('add') . ' ' . lang('form') .'</button>
                                    <a class="billbutton dropdown-item bg-info text-light" href="finance/addPaymentView?id=' . $encounter->id . '" data-id="' . $encounter->id . '"><i class="fa fa-money"></i>  '. ' ' . lang('generate_bill') . '</a>
                                    <a class="delete_button dropdown-item bg-danger text-light" href="encounter/delete?id=' . $encounter->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>  ' . lang('delete') . '</a>
                                </div>
                            </div>';
            }
            $info[] = array(
                date('Y-m-d h:i A', strtotime($encounter->created_at.' UTC')),
                $encounter->encounter_number,
                $patient,
                $doctor,
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

// Get users
        $response = $this->encounter_model->getEncounterInfo($searchTerm);

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

    

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
