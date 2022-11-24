<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Casenote extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('casenote_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('encounter/encounter_model');
        $this->load->model('location/location_model');
        $this->load->model('branch/branch_model');
        $this->load->model('hospital/hospital_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('Doctor', 'Midwife', 'Nurse', 'admin'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        $case_note_number = $this->input->get('id');
        $id = $this->casenote_model->getMedicalHistoryByCaseNoteNumber($case_note_number)->id;
        $case_note_details = $this->casenote_model->getMedicalHistoryById($id);

        if (!empty($id)) {
            $data['encounter'] = $this->encounter_model->getEncounterById($case_note_details->encounter_id);
            $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
            $data['case_lists'] = $this->casenote_model->getMedicalHistoryById($id);
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['patients'] = $this->patient_model->getPatient();
        $data['medical_histories'] = $this->casenote_model->getMedicalHistory();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('case_listv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function addMedicalHistory() {
        if (!$this->ion_auth->in_group(array('Doctor', 'Midwife', 'Nurse'))) {
            redirect('home/permission');
        }
        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $current_doctor = $this->ion_auth->get_user_id();
        //     $current_user = $this->doctor_model->getDoctorByIonUserId($current_doctor)->id;
        // }
        $current_user = $this->ion_auth->get_user_id();

        $encounter = $this->input->post('encounter_id');
        
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');

        $date = $this->input->post('date');
        $date = gmdate('Y-m-d H:i:s', strtotime($date));

        $title = $this->input->post('title');

        do {
            $raw_case_number = 'N'.random_string('alnum', 6);
            $validate_number = $this->casenote_model->validateCaseNumber($raw_case_number);
        } while($validate_number != 0);

        $case_number = strtoupper($raw_case_number);
        

        // if (!empty($date)) {
        //     $nowtime = date('H:i:s');
        //     $date = strtotime($date . ' ' . $nowtime);
        //     $date = gmdate('Y-m-d H:i:s', $date);
        // } else {
        //     $date = time();
        // }

        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="margin-top:15px;">', '</div>');

        $redirect = $this->input->post('redirect');
        if (empty($redirect)) {
            $redirect = 'patient/medicalHistory?id=' . $this->patient_model->getPatientById($patient_id)->patient_id;
        }

        // Validating patient Field
        $this->form_validation->set_rules('patient_id', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Name Field
        $this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Title Field
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        // Validating Password Field
        $this->form_validation->set_rules('description', 'Case', 'trim|required|max_length[10000]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('case_listv2');
                // $this->load->view('home/footer'); // just the header file
            } else {
                $data['settings'] = $this->settings_model->getSettings();
                $data['patients'] = $this->patient_model->getPatient();
                $data['patient'] = $patient_id;
                $data['medical_histories'] = $this->casenote_model->getMedicalHistory();
                $data['setval'] = 'setval';
                $this->session->set_flashdata('error', lang('validation_error'));
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('case_listv2', $data);
                // $this->load->view('home/footer'); // just the header file
            }
        } else {

            if (!empty($patient_id)) {
                $patient_details = $this->patient_model->getPatientById($patient_id);
                $patient_name = $patient_details->name;
                $patient_phone = $patient_details->phone;
                $patient_address = $patient_details->address;
            } else {
                $patient_name = 0;
                $patient_phone = 0;
                $patient_address = 0;
            }

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            

            if (empty($id)) {     // Adding New department
                $data = array(
                    'patient_id' => $patient_id,
                    'case_date' => $date,
                    'title' => $title,
                    'description' => $description,
                    'patient_name' => $patient_name,
                    'patient_phone' => $patient_phone,
                    'patient_address' => $patient_address,
                    'created_user_id' => $current_user,
                    'encounter_id' => $encounter,
                    'case_note_number' => $case_number
                );
                // $data['setval'] = 'setval';
                $this->casenote_model->insertMedicalHistory($data);
                $this->session->set_flashdata('success', lang('record_added'));
                // $lastId = $this->db->insert_id();
                // $this->load->view('home/dashboardv2'); // just the header file
                // $this->load->view('jitsiv2', $data);
            } else { // Updating department
                $data = array(
                    'patient_id' => $patient_id,
                    'case_date' => $date,
                    'title' => $title,
                    'description' => $description,
                    'patient_name' => $patient_name,
                    'patient_phone' => $patient_phone,
                    'patient_address' => $patient_address,
                    'created_user_id' => $current_user,
                    'encounter_id' => $encounter,
                );
                $this->casenote_model->updateMedicalHistory($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            // Loading View
            // echo json_encode(array('last_id' => $lastId));
            redirect($redirect);
            // redirect("form/addMedicalHistory?id=" . "$lastId");
        }
    }

    function getCaseList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $patient_id = $this->input->get('patient_id');
        $current_user = $this->ion_auth->get_user_id();

        if (!empty($patient_id)) {
            if ($limit == -1) {
                if (!empty($search)) {
                    // $data['cases'] = $this->casenote_model->getMedicalHistoryBySearch($search, $patient_id);
                    $data['cases'] = $this->casenote_model->getMyCaseNoteBySearch($search, $patient_id, $current_user);
                } else {
                    // $data['cases'] = $this->casenote_model->getMedicalHistory($patient_id);
                    $data['cases'] = $this->casenote_model->getMyCaseNote($patient_id, $current_user);
                }
            } else {
                if (!empty($search)) {
                    // $data['cases'] = $this->casenote_model->getMedicalHistoryByLimitBySearch($limit, $start, $search, $patient_id);
                    $data['cases'] = $this->casenote_model->getMyCaseNoteByLimitBySearch($limit, $start, $search, $patient_id, $current_user);
                } else {
                    // $data['cases'] = $this->casenote_model->getMedicalHistoryByLimit($limit, $start, $patient_id);
                    $data['cases'] = $this->casenote_model->getMyCaseNoteByLimit($limit, $start, $patient_id, $current_user);
                }
            }
        } else {
            if ($limit == -1) {
                if (!empty($search)) {
                    // $data['cases'] = $this->casenote_model->getMedicalHistoryBySearch($search);
                    $data['cases'] = $this->casenote_model->getMyCaseNoteBySearch($search, null, $current_user);
                } else {
                    // $data['cases'] = $this->casenote_model->getMedicalHistory();
                    $data['cases'] = $this->casenote_model->getMyCaseNote(null, $current_user);
                }
            } else {
                if (!empty($search)) {
                    // $data['cases'] = $this->casenote_model->getMedicalHistoryByLimitBySearch($limit, $start, $search);
                    $data['cases'] = $this->casenote_model->getMyCaseNoteByLimitBySearch($limit, $start, $search, null, $current_user);
                } else {
                    // $data['cases'] = $this->casenote_model->getMedicalHistoryByLimit($limit, $start);
                    $data['cases'] = $this->casenote_model->getMyCaseNoteByLimit($limit, $start, null, $current_user);
                }
            }
            //  $data['patients'] = $this->patient_model->getPatient();
        }

        foreach ($data['cases'] as $case) {

            if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = ' <a href="casenote?id='.$case->case_note_number.'" class="btn btn-info btn-xs btn_width" title="' . lang('') . '"><i class="fa fa-edit"> </i>'.' '.lang('edit'). '</a>';
            }

            if ($this->ion_auth->in_group(array('Doctor', 'Midwife', 'Nurse'))) {
                $options2 = '<a class="btn btn-danger btn-xs btn_width delete_button" title="' . lang('delete') . '" href="casenote/delete?id=' . $case->id . '&redirect=case" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>'.' '. lang('delete').'</a>';
            }

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor', 'Midwife'))) {
                $options3 = ' <a type="button" class="btn btn-info btn-xs case" title="' . lang('') . '" data-toggle = "modal" data-id="' . $case->id . '"><i class="fa fa-file-text-o"></i>'.' '. lang('details').'</a>';
            }

            if (!empty($patient_id)) {
                if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) {
                    $options4 = '<button type="button" class="btn btn-info btn-xs btn_width editbutton" title="'.lang('edit').'" data-toggle="modal" data-id="'.$case->id.'"><i class="fa fa-edit"></i> </button>';
                }
            }

            if (!empty($case->patient_id)) {
                $patient_info = $this->patient_model->getPatientById($case->patient_id);
                if (!empty($patient_info)) {
                    $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
                } else {
                    $patient_details = $case->patient_name . '</br>' . $case->patient_address . '</br>' . $case->patient_phone . '</br>';
                }
            } else {
                $patient_details = '';
            }

            $facility = $this->branch_model->getBranchById($case->location_id);
            $hospital = $this->hospital_model->getHospitalById($case->hospital_id);
            $encounter_details = $this->encounter_model->getEncounterById($case->encounter_id);
            $encounter_location = $this->branch_model->getBranchById($encounter_details->location_id)->display_name;
            if (!empty($case->encounter_id)) {
                if (!empty($encounter_location)) {
                    $appointment_facility = $hospital->name.'<br>'.'(' . $encounter_location . ')';
                } else {
                    $appointment_facility = $hospital->name.'<br>'.'(' . lang('online') . ')';
                }
            } else {
                $appointment_facility = $hospital->name.'<br>'.'( '.lang('online').' )';
            }

            if (!empty($patient_id)) {
                $info[] = array(
                    date('Y-m-d', strtotime($case->case_date.' UTC')),
                    $case->title,
                    $case->description,
                    $appointment_facility,
                    '<button type="button" class="btn btn-info btn-xs btn_width editbutton" title="'.lang('edit').'" data-toggle="modal" data-id="'.$case->id.'"><i class="fa fa-edit"></i> </button>'
                        // $options4
                );
            } else {
                $info[] = array(
                    date('Y-m-d', strtotime($case->case_date.' UTC')),
                    $patient_details,
                    $case->title,
                    $options3 . ' ' . $options1 . ' ' . $options2
                        // $options4
                );
            }
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => count($data['cases']),
                "recordsFiltered" => count($data['cases']),
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

    function delete() {
        if (!$this->ion_auth->in_group(array('Doctor', 'Midwife', 'Nurse'))) {
            redirect('home/permission');
        }

        $id = $this->input->get('id');
        $redirect = $this->input->get('redirect');
        $case_history = $this->casenote_model->getMedicalHistoryById($id);
        $this->casenote_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        if ($redirect == 'case') {
            redirect('casenote');
        } else {
            redirect("patient/MedicalHistory?id=" . $case_history->patient_id);
        }
    }

}

/* End of file nurse.php */
/* Location: ./application/modules/nurse/controllers/nurse.php */
