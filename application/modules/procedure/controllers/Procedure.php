<?php

use function Clue\StreamFilter\append;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Procedure extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('procedure_model');
        $this->load->library('form_validation');
        $this->load->model('encounter/encounter_model');
        $this->load->model('patient/patient_model');
        $this->load->model('procedure/procedure_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('nurse/nurse_model');
        $this->load->model('midwife/midwife_model');
        $this->load->model('pharmacist/pharmacist_model');
        $this->load->model('laboratorist/laboratorist_model');
        $this->load->model('branch/branch_model');
        $this->load->model('location/location_model');

        $this->load->module('doctor');
        $this->load->module('nurse');
        $this->load->module('midwife');
        $this->load->module('laboratorist');

        $this->load->helper('string');

    }

    public function index() {
        $data['procedures'] = $this->procedure_model->getProcedure();
        $this->load->view('home/dashboardv2'); 
        $this->load->view('procedure', $data);
    }

    public function getProcedures() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $patient_id = $this->input->get('patient_id');
        $doctor_ion_id = $this->ion_auth->get_user_id();
        $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;

        if(!empty($patient_id)) {
            $data['procedures'] = $this->procedure_model->getProcedureByPatientId($patient_id);
        } else {
            $data['procedures'] = $this->procedure_model->getProcedure();
        }

        foreach ($data['procedures'] as $procedure) {
            $options1 = '<a type="button" class="btn btn-info btn-xs btn_width" title="' . lang('edit') . '" href="procedure/editProcedure?id=' . $procedure->procedure_number . '"data-id="' . $procedure->id .'"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            $options2 = '<a class="btn btn-danger" title="' . lang('delete') . '" href="procedure/delete?id=' . $procedure->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</a>';
            $options3 = '<a type="button" class="btn btn-info btn-xs btn_width inffo" title="' . lang('info') . '" data-toggle="modal" data-id="' . $procedure->id . '"><i class="fa fa-info"> </i> ' . lang('info') . '</a>';
                  
            $data['procedure_performers'] = $this->procedure_model->getProcedurePerformerByProcedureId( $procedure->id);
            $performer_details = [];

            foreach($data['procedure_performers'] as $performer) {

                if ($performer->performer_table_name == 'doctor') {
                    $performer_details[] = $this->doctor_model->getDoctorById( $performer->performer_table_id)->name;  
                }

                if ($performer->performer_table_name == 'nurse') {
                    $performer_details[] = $this->nurse_model->getNurseById( $performer->performer_table_id)->name;
                }

                if ($performer->performer_table_name == 'midwife') {
                    $performer_details[] = $this->midwife_model->getMidwifeById( $performer->performer_table_id)->name;
                }

                if ($performer->performer_table_name == 'laboratorist') {
                    $performer_details[] = $this->laboratorist_model->getLaboratoristById( $performer->performer_table_id)->name;
                }
                
            }

            $performer_names = implode('</br>', $performer_details);
            $hospital = $this->hospital_model->getHospitalById($procedure->hospital_id);
            $procedure_details = $this->encounter_model->getEncounterById($procedure->encounter_id);
            $procedure_location = $this->branch_model->getBranchById($procedure_details->location_id)->display_name;

            if(!empty($procedure->encounter_id)) {
                if (!empty($procedure_location)) {
                    $appointment_facility = $hospital->name.'<br>'.'('. $procedure_location .')';
                } else {
                    $appointment_facility = $hospital->name.'<br>'. '('. lang('online') .')';
                }
            } else {
                $appointment_facility = $hospital->name.'<br>'. '('. lang('online') .')';
            }

            if(!empty($patient_id)) {
                $info[] = array(
                    date('Y-m-d', strtotime($procedure->performed_start_time.' UTC')),
                    $procedure->procedure_code.' - '.$procedure->description,
                    $performer_names,
                    $procedure->note,
                    $appointment_facility,
                    $this->procedure_model->getStatusById($procedure->status_id)->display_name,
                    $options1 . ' ' . $options2 ,
    
                );
            } else {
                $info[] = array(
                    date('Y-m-d', strtotime($procedure->performed_start_time.' UTC')),
                    $this->patient_model->getPatientById($procedure->patient_id)->name,
                    $procedure->procedure_code.' - '.$procedure->description,
                    $performer_names,
                    $procedure->note,
                    $this->procedure_model->getStatusById($procedure->status_id)->display_name,
                    '<div class="btn-list">'. $options3 . ' ' . $options1 . ' ' . $options2 . '</div>',
                );

            }
            

        }

        if (!empty($data['procedures'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->procedure_model->getProcedureCount(), 
                "recordsFiltered" => $this->procedure_model->getProcedureBySearchCount($search),
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

    public function addNewView() {
        $data['doctors'] = json_encode($this->doctor_model->getAllDoctor());
        $data['nurses'] = json_encode($this->nurse_model->getNurse());
        $data['midwives'] = json_encode($this->midwife_model->getMidwife());
        $data['laboratorists'] = json_encode($this->laboratorist_model->getLaboratorist());

        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    public function editProcedure() {
        $data = array();
        $data['procedure_number'] = $this->input->get('id');
        $id = $this->procedure_model->getProcedureByProcedureNumber($data['procedure_number'])->id;
        $data['id'] = $id;

        $data['encounter_number'] = $this->input->get('encounter_id');
        $data['procedure'] = $this->procedure_model->getProcedureById($id);
        $data['procedure_start'] = $data['procedure']->performed_start_time;
        $data['procedure_end'] =$data['procedure']->performed_end_time;
        $data['settings'] = $this->settings_model->getSettings();
        $data['patient'] = $this->patient_model->getPatientById($data['procedure']->patient_id);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['procedure']->performer_doctor_ids);
        $data['nurse'] = $this->nurse_model->getNurseById($data['procedure']->performer_nurse_ids);
        $data['midwife'] = $this->midwife_model->getMidwifeById($data['procedure']->performer_midwife_ids);
        $data['laboratorist'] = $this->laboratorist_model->getLaboratoristById($data['procedure']->performer_laboratorist_ids);

        if(!empty($data['procedure']->encounter_id)) {
            $data['encounter'] = $this->encounter_model->getEncounterById($data['encounter_id']);
            $data['encounter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
            $data['patient_encounter'] = $this->encounter_model->getEncounterByPatientIdForDropdown($data['procedure']->patient_id);
        }

        if(!empty($id)) {
            $data['procedure'] = $this->procedure_model->getProcedureById($id);
            $data['patient'] = $this->patient_model->getPatientById($data['']);
        }

        if(!empty($data['procedure']->hospital_id)) {
            if($data['procedure']->hospital_id != $this->session->userdata('hospital_id')) {
                $this->load->view('home/permission');
            } else {
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboardv2', $data);
                $this->load->view('add_new', $data);
            }
        } else {
            $this->load->view('home/permission');
        }
    }

    function editProcedureByJson() {
        $id = $this->input->get('id');
        $data['procedure'] = $this->procedure_model->getProcedureById($id);
        $data['procedures'] = $this->procedure_model->getProcedure();
        $data['patients'] = $this->patient_model->getPatientByVisitedProviderId();
        $data['procedure_status'] = $this->procedure_model->getStatus();
        $data['encounter'] = $this->encounter_model->getEncounterWithTypeNameByPatientId($data['procedure']->patient_id);
        $data['procedure_performers'] = $this->procedure_model->getProcedurePerformerByProcedureId( $data['procedure']->id);
        
        $performer_details = [];
        $performer_roles = [];
        foreach($data['procedure_performers'] as $performer) {
            if($performer->performer_table_name == 'doctor') {
                $performer_details[] = $this->doctor_model->getDoctorById( $performer->performer_table_id);
                $performer_roles[] = $this->procedure_model->getProcedureByPerformerByRole($performer->role_id);
              
            }

            if($performer->performer_table_name == 'nurse') {
                $performer_details[] = $this->nurse_model->getNurseById( $performer->performer_table_id);
                $performer_roles[] = $this->procedure_model->getProcedureByPerformerByRole($performer->role_id); 
            }

            if($performer->performer_table_name == 'midwife') {
                $performer_details[] = $this->midwife_model->getMidwifeById( $performer->performer_table_id);
                $performer_roles[] = $this->procedure_model->getProcedureByPerformerByRole($performer->role_id);
            }

            if($performer->performer_table_name == 'laboratorist') {
                $performer_details[] = $this->laboratorist_model->getLaboratoristById( $performer->performer_table_id);
                $performer_roles[] = $this->procedure_model->getProcedureByPerformerByRole($performer->role_id);
              
            }
            
        }

        $data['performer_details'] = $performer_details;
        $data['performer_roles'] = $performer_roles;
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['nurses'] = $this->nurse_model->getNurse();
        $data['midwives'] = $this->midwife_model->getMidwife();
        $data['laboratorist'] = $this->laboratorist_model->getLaboratorist();
        $data['notes'] = $data['procedure']->note;
        echo json_encode($data);
    }
  
    public function addNew() {
        $id = $this->input->post('id');
        $current_user = $this->ion_auth->get_user_id();

        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $patient = $this->input->post('patient');
        $encounter = $this->input->post('encounter');
        $performedByDoctor = $this->input->post('pos_rendering_user_doctor');
        $performedByNurse = $this->input->post('pos_rendering_user_nurse');
        $performedByLaboratorist = $this->input->post('pos_rendering_user_laboratorist');
        $performedByMidwife = $this->input->post('pos_rendering_user_midwife');
        $procedure = $this->input->post('procedure');
        $status = $this->input->post('status');
        $note_body = $this->input->post('note_body');

        $performer_doctor_roles =  $this->input->post('performer_role_doctors');
        $performer_nurse_roles = $this->input->post('performer_role_nurse');
        $performer_midwife_roles =  $this->input->post('performer_role_midwife');
        $performer_laboratorist_role =  $this->input->post('performer_role_laboratorist');

        $procedure_details = $this->procedure_model->getProcedureCodeById($procedure);

        do {
            $raw_procedure_number = 'PR'.random_string('alnum', 6);
            $validate_number = $this->procedure_model->validateProcedureNumber($raw_procedure_number);
        }while($validate_number !=0);

        $procedure_number = strtoupper($raw_procedure_number);
     
        $data = array(
        'performed_start_time' => $start_date,
        'performed_end_time' => $end_date,
        'description' => $procedure_details->description,
        'procedure_code' =>  $procedure_details->cpt_code,
        'procedure_cpt_code_id' => $procedure_details->id,
        'status_id' => $status,
        'patient_id' => $patient,
        'encounter_id' => $encounter,
        'note' => $note_body,
        'recorder_user_id' => $current_user,
        'procedure_number' => $procedure_number
        );

        // $performers = [];

        $performers_doctors = [];
        $performers_nurse = [];
        $performers_midwife = [];
        $performers_laboratorist = [];


        foreach($performedByDoctor as $key => $value) {
            $performers_doctors[] = array(
                'performer' => $value,
                'group' => 'doctor',
                'role' => $performer_doctor_roles[$key]
            );
        }

        foreach($performedByNurse as $key => $value) {
            $performers_nurse[] = array(
                'performer' => $value,
                'group' => 'nurse',
                'role' => $performer_nurse_roles[$key]
            );
        }
        

        foreach($performedByMidwife as $key => $value) {
            $performers_midwife[] = array(
                'performer' => $value,
                'group' => 'midwife',
                'role' => $performer_midwife_roles[$key]
            );
        }

        foreach($performedByLaboratorist as $key => $value) {
            $performers_laboratorist[] = array(
                'performer' => $value,
                'group' => 'laboratorist',
                'role' => $performer_laboratorist_role[$key]
            );
        }

        $all_performers = array_merge($performers_doctors, $performers_nurse, $performers_midwife, $performers_laboratorist);

        if(empty($id)) {

            $this->procedure_model->insertProcedure($data);
            $inserted_id = $this->db->insert_id();

            foreach($all_performers as $key => $value) {
                $data2 = array(
                    'procedure_id' => $inserted_id,
                    'performer_table_name' => $value['group'],
                    'performer_table_id' => intval($value['performer']),
                    'role_id' => intval($value['role']),
                );
                $this->procedure_model->insertProcedurePerformer($data2);
            }
            $this->session->set_flashdata('success', lang('record_added'));

        } else {
            $procedure_id = $procedure_details->id;
        

            //doctor
            foreach($performers_doctors as $key => $value) {
                $data_doctor = array(
                    'procedure_id' => $procedure_id,
                    'performer_table_name' => $value['group'],
                    'performer_table_id' => intval($value['performer']),
                    'role_id' => intval($value['role']),
                );

                $doctor_array_exist = $this->procedure_model->getProcedurePerformerByDoctorByProcedureId($procedure_id);

                $this->procedure_model->updateProcedurePerformer($doctor_array_exist[$key]->id, $data_doctor);

                if(empty($doctor_array_exist[$key]->id)) {
                    $this->procedure_model->insertProcedurePerformerByDoctor($data_doctor);
                }

            }

            //nurse
            foreach($performers_nurse as $key => $value) {
                $data_nurse = array(
                    'procedure_id' => $procedure_id,
                    'performer_table_name' => $value['group'],
                    'performer_table_id' => intval($value['performer']),
                    'role_id' => intval($value['role']),
                );

                $nurse_array_exist = $this->procedure_model->getProcedurePerformerByNurseByProcedureId($procedure_id);

                $this->procedure_model->updateProcedurePerformer($nurse_array_exist[$key]->id, $data_nurse);

                $test =  $nurse_array_exist[$key]->performer_table_id;

                if(empty($nurse_array_exist[$key]->id)) {
                    $this->procedure_model->insertProcedurePerformerByNurse($data_nurse);
                }


            }

            //midwife
            foreach($performers_midwife as $key => $value) {
                $data_midwife = array(
                    'procedure_id' => $procedure_id,
                    'performer_table_name' => $value['group'],
                    'performer_table_id' => intval($value['performer']),
                    'role_id' => intval($value['role']),
                );

                $midwife_array_exist = $this->procedure_model->getProcedurePerformerByMidwifeByProcedureId($procedure_id);

                $this->procedure_model->updateProcedurePerformer($midwife_array_exist[$key]->id, $data_midwife);

                $test = $midwife_array_exist[$key]->performer_table_id;

                if(empty($midwife_array_exist[$key]->id)) {
                    $this->procedure_model->insertProcedurePerformerByMidwife($data_midwife);
                }
            }

            //laboratorist
            foreach($performers_laboratorist as $key => $value) {
                $data_laboratorist = array(
                    'procedure_id' => $procedure_id,
                    'performer_table_name' => $value['group'],
                    'performer_table_id' => intval($value['performer']),
                    'role_id' => intval($value['role']),
                );

                $laboratorist_array_exist = $this->procedure_model->getProcedurePerformerByLaboratoristByProcedureId($procedure_id);

                $this->procedure_model->updateProcedurePerformer($laboratorist_array_exist[$key]->id, $data_laboratorist);

                $test = $laboratorist_array_exist[$key]->performer_table_id;

                if(empty($laboratorist_array_exist[$key]->id)) {
                    $this->procedure_model->insertProcedurePerformerByLaboratorist($data_laboratorist);
                }
            }

        }

            $this->procedure_model->updateProcedure($id, $data);
            $this->session->set_flashdata('success', lang('record_updated'));  
            redirect('procedure');
        }



    public function delete() {
        $id = $this->input->get('id');

        $this->procedure_model->deleteProcedureById($id);
        $this->procedure_model->deleteProcedureIdByPerformerId($id);
        $this->session->set_flashdata('success', lang('record_deleted')); 
        
        redirect('procedure');
    }


    public function deleteProcedurePerformer() {
        $id = $this->input->get('id');

        $this->procedure_model->deleteProcedurePerformerById($id);

    }


    public function getStatusDisplayName() {
        $searchTerm = $this->input->post('searchTerm');
        
        $response = $this->procedure_model->getStatusWithoutAddNewOption($searchTerm);

        echo json_encode($response);
    }
 
    public function getCptCodeAndDescription() {
        //searchInTheInput
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->procedure_model->getCptCodeAndDescription($searchTerm);

        echo json_encode($response);
    }

    public function getAllProceduresDescription() {
        //searchInTheInput
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->procedure_model->getAllProcedureDescription($searchTerm);

        echo json_encode($response);
    }

    public function getUserWithoutAddNewOption() {
        //searchInTheInput
        $searchTerm = $this->input->post('searchTerm');

        //Get Users
        $response = $this->procedure_model->getUserWithoutAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function getProcedurePerformerRole() {
        //searchInTheInput
        $searchTerm = $this->input->post('searchTerm');

        //Get Users
        $response = $this->procedure_model->getProcedureRoleByDisplayName($searchTerm);

        echo json_encode($response);
    }
    
}

/* End of file procedure.php */
/* Location: ./application/modules/procedure/controllers/procedure.php */
