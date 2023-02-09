<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diagnosis_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertDiagnosis($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient_diagnosis', $data2);
    }

    function updateDiagnosis($number, $data) {
        $this->db->where('id', $number);
        $this->db->update('patient_diagnosis', $data);
    }

    function getDiagnosisById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('diagnosis_icd10');
        return $query->row();
    }

    function getPatientDiagnosisById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('patient_diagnosis');
        return $query->row();
    }

    function getPatientDiagnosisByNumber($number) {
        $this->db->where('patient_diagnosis_number', $number);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosisInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("code LIKE '%" . $searchTerm . "%' OR long_description LIKE '%" . $searchTerm . "%'");
            $this->db->where("header_indicator", 1);
            $fetched_records = $this->db->get('diagnosis_icd10');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("header_indicator", 1);
            $this->db->limit(10);
            $fetched_records = $this->db->get('diagnosis_icd10');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['long_description']);
        }
        return $data;
    }

    function getDiagnosisRoleInfo($searchTerm, $encounter_type_id) {

        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("hl7_code LIKE '%" . $searchTerm . "%' OR hl7_display LIKE '%" . $searchTerm . "%'");
            $this->db->where("FIND_IN_SET($encounter_type_id, applicable_encounter_types)");
            $fetched_records = $this->db->get('diagnosis_role');
            $diagnosis = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("FIND_IN_SET($encounter_type_id, applicable_encounter_types)");
            $this->db->limit(10);
            $fetched_records = $this->db->get('diagnosis_role');
            $diagnosis = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($diagnosis as $diag) {
            $data[] = array("id" => $diag['id'], "text" => $diag['hl7_display']);
        }
        return $data;
    }

    function getDiagnosisRoleList($encounter_type) {
        $query = $this->db->get('diagnosis_role');
        return $query->result();
    }

    function getPatientDiagnosisByIdByEncounterIdByRoleId($id, $encounter_id, $role_id){
        $this->db->where('patient_id', $id);
        $this->db->where('encounter_id', $encounter_id);
        $this->db->where('diagnosis_role_id', $role_id);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnsosiRoleById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('diagnosis_role');
        return $query->row();
    }

    function getPatientDiagnosisByIdByEncounterId($id, $encounter_id) {
        $this->db->where('patient_id', $id);
        $this->db->where('encounter_id', $encounter_id);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosis() {
        $this->db->select('*');
        $this->db->where("header_indicator", 1);
        $this->db->limit(10);
        $query = $this->db->get('diagnosis_icd10');
        return $query->result();
    }

    function validateDiagnosisNumber($diagnosis_number) {
        $this->db->where('patient_diagnosis_number', $diagnosis_number);
        $query = $this->db->get('patient_diagnosis');
        return $query->row();
    }

    function getDiagnosisByPatient($patient, $doctor_id = null) {
        if (!empty($doctor_id)) {
            $this->db->where('doctor_id', $doctor_id);
        }
        $this->db->where('patient_id', $patient);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosisByPatientByEncounterId($patient, $encounter_id) {
        $this->db->where('patient_id', $patient);
        $this->db->where('encounter_id', $encounter_id);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosisBySearch($search, $patient_id = null, $doctor_id = null) {       
        $this->db->order_by('id', 'desc');
        if (!empty($patient_id)) {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('doctor_id', $doctor_id)
                        ->where('patient_id', $patient_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('patient_id', $patient_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            }
        } else {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('doctor_id', $doctor_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            }
        }
        return $query->result();            
    }

    function getPatientDiagnosis() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosisByLimitBySearch($limit, $start, $search, $patient_id = null, $doctor_id = null) {               
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!empty($patient_id)) {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('patient_id', $patient_id)
                        ->where('doctor_id', $doctor_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('patient_id', $patient_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            }
        } else {
            if (!empty($doctor_id)) {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('doctor_id', $doctor_id)
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            } else {
                $query = $this->db->select('*')
                        ->from('patient_diagnosis')
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                        ->get();
                ;
            }
        }
        return $query->result();       
    }

    function getDiagnosisByLimit($limit, $start, $patient_id = null, $doctor_id = null) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        if (!empty($doctor_id)) {
            $this->db->where('doctor_id', $doctor_id);
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('patient_diagnosis');
        return $query->result();
    }

    function getDiagnosisCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient_diagnosis');
        return $query->num_rows();
    }

    function getDiagnosisBySearchCount($search) {       
        $query = $this->db->select('id')
                ->from('patient_diagnosis')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->num_rows();            
    }

    function getDiagnosisByPatientCount($patient_id = null) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient_diagnosis');
        return $query->num_rows();
    }

    function getDiagnosisBySearchByPatientCount($search, $patient_id = null) {       
        if (!empty($patient_id)) {
            $query = $this->db->select('id')
                    ->from('patient_diagnosis')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        } else {
            $query = $this->db->select('id')
                    ->from('patient_diagnosis')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR diagnosis_long_description LIKE '%" . $search . "%' OR diagnosis_code LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
            ;
        }
        return $query->num_rows();            
    }

    function getListOfStafffByGroupName($group_name_array) {
        $user = [];
        $optionGroup = '';
        foreach ($group_name_array as $group_name_key => $group_name_value) {
            $group_name_lowercase = strtolower($group_name_value);
            $users[$group_name_value] = $this->db->get_where($group_name_lowercase, array('hospital_id' => $this->session->userdata('hospital_id')))->result();
            $option = '';
            foreach($users[$group_name_value] as $user) {
                $option .= '<option value="'.$user->id.'" data-user_type="'.$group_name_value.'" id="'.$group_name_lowercase.$user->id.'">'.$user->firstname.' '.$user->middlename.' '.$user->lastname.' '.$user->suffix.' ( '.$group_name_value.' ) '.'</option>';
            }
            $optionGroup .= '<optgroup label="'.$group_name_value.'" id="'.$group_name_lowercase.'">'.$option.'</optgroup>';
        }

        return $optionGroup;
    }

}
