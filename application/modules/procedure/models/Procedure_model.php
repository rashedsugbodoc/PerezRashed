<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Procedure_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function getProcedureName() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('procedure');
        return $query->row();
    }

    function insertProcedure($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('procedure', $data2);
    }

    function getProcedureRecorder($user_id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital'));
        $this->db->where('recorder_user_id', $user_id);
        $query = $this->db->get('procedure');
        return $query->row();

    }

    function getProcedure() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('procedure');
        return $query->result();
    }

    function getProcedureByPatientId($patient_id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $patient_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('procedure');
        return $query->result();
    }

    function getProcedureById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('procedure');
        return $query->row();
    }

    function getCptCodeAndDescription($searchTerm) {
        if(!empty($searchTerm)) {   
            $query = $this->db->select('*')
                   ->from('procedure_cpt_code')
                   ->where("(cpt_code LIKE '%". $searchTerm . "%' OR description LIKE '%". $searchTerm . "%')", NULL, FALSE)
                   ->get();
            $cptCodesAndDescs = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('procedure_cpt_code');
            $cptCodesAndDescs = $fetched_records->result_array();
        }
        $mergedCptCodeAndCptDescs = array();

        foreach ($cptCodesAndDescs as $cptCodeAndDesc ) {
            $mergedCptCodeAndCptDescs[]  = array("id" => $cptCodeAndDesc['id'], "text" => $cptCodeAndDesc['cpt_code']. ' - ' .$cptCodeAndDesc['description']) ;
        }
        return $mergedCptCodeAndCptDescs;
    }


    function getStatusWithoutAddNewOption($searchTerm) {
        if(!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('event_status')
                    ->where("(id LIKE '%". $searchTerm . "%' OR display_name LIKE '%". $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $all_status_codes = $query->result_array();
        } else {
            $this->db->select('*');
            $fetched_records_status = $this->db->get('event_status');
            $all_status_codes = $fetched_records_status->result_array();
        }

        $fetched_records_status = array();

        foreach ( $all_status_codes as $all_status_code) {
            $fetched_records_status[] = array("id" => $all_status_code['id'], "text" => $all_status_code['display_name']);
        }

        return $fetched_records_status;
    }

    function getProcedureCodeById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('procedure_cpt_code');
        return $query->row();
    }

    function getStatusById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('event_status');
        return $query->row();
    }

    function getStatus() {
        $query = $this->db->get('event_status');
        return $query->result();
    }
    

    function getProcedureCount() {
        $query = $this->db->get('procedure');
        return $query->num_rows();
    }

    function getProcedureBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('procedure')
                ->where("(id LIKE '%" . $search . "%' OR display_name LIKE '%" . $search . "%' OR procedure_code LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%'OR procedure_cpt_code_id LIKE '%" . $search . "%'OR status_id LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getProcedureBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('procedure')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%".$search ."%' OR procedure_code LIKE '%". $search ."%' OR description LIKE '%". $search ."%' )", NULL, FALSE)
                ->get();
        ;
        return $query->result();
   
    }

    function getProcedureByLimitBySearch($limit, $start, $search ) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('prescription')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%".$search ."%' OR procedure_code LIKE '%". $search ."%' OR description LIKE '%". $search ."%' )", NULL, FALSE)
                ->get();
        ;
        return $query->result();

    } 
 
    function validateProcedureNumber($procedure_number) {
        $this->db->where('procedure_number', $procedure_number);
        $query = $this->db->get('procedure');
        return $query->row();
    }

    function getProcedureByProcedureNumber($procedure_number) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('procedure_number', $procedure_number);
        $query = $this->db->get('procedure');
        return $query->row();
    }

    function updateProcedure($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('procedure', $data);
    }

    function getProcedureRoleByDisplayName($searchTerm) {
        if(!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('procedure_performer_role')
                    ->where("(id LIKE '%". $searchTerm . "%' OR display_name LIKE '%". $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $performer_role_display_names = $query->result_array();
        } else {
            $this->db->select('*');
            $fetched_performer_role_display_name = $this->db->get('procedure_performer_role');
            $performer_role_display_names = $fetched_performer_role_display_name->result_array();
        }

        $fetched_display_role_name = array();

        foreach ( $performer_role_display_names as $performer_role) {
            $fetched_display_role_name[] = array("id" => $performer_role['id'], "text" => $performer_role['display_name']);
        }

        return $fetched_display_role_name;
    }

    function insertProcedurePerformer($data) {
        $this->db->insert('procedure_performer', $data);
    }

    function getProcedurePerformerRoleById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('procedure_performer_role');
        return $query->row();
    }

    function getProcedureByIdFromThePerformer($id) {
        $this->db->where('procedure_id', $id);
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    function getPerformerNameById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('procedure_performer');
        return $query->row();
    }
    
    function getProcedurePerformerByProcedureId($id) {
        $this->db->select('*');
        $this->db->where('procedure_id', $id);
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    function getProcedureByPerformerByRole($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('procedure_performer_role');
        return $query->row();
    }

    function getProcedurePerformer() {
        $this->db->select('*');
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    function updateProcedurePerformer($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('procedure_performer', $data);
    }

    function updateProcedurePerformerByProcedureId($procedure_id, $data) {
        $this->db->where('procedure_id', $procedure_id);
        $this->db->update('procedure_performer', $data);
    }

    function updateProcedurePerformerByDoctor( $procedure_id, $data) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', 'doctor');
        $this->db->group_end();
        $this->db->update('procedure_performer', $data);   
    }

    function updateProcedurePerformerByNurse($procedure_id, $performer, $data) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', 'nurse');
            $this->db->where('performer_table_id', $performer);
        $this->db->group_end();
        $this->db->update('procedure_performer', $data);
    }

    function updateProcedurePerformerByMidwife($procedure_id, $performer, $data) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', 'midwife');
            $this->db->where('performer_table_id', $performer);
        $this->db->group_end();
        $this->db->update('procedure_performer', $data);

    }

    function insertProcedurePerformerByDoctor($data) {
        $this->db->where('performer_table_name', 'doctor');
        $this->db->insert('procedure_performer', $data);

    }

    function insertProcedurePerformerByNurse($data) {
        $this->db->where('performer_table_name', 'nurse');
        $this->db->insert('procedure_performer', $data);
    }

    function insertProcedurePerformerByMidwife($data) {
        $this->db->where('performer_table_name', 'midwife');
        $this->db->insert('procedure_performer', $data);
    }

    function insertProcedurePerformerByLaboratorist($data) {
        $this->db->where('performer_table_name', 'laboratorist');
        $this->db->insert('procedure_performer', $data);
    }

    function getProcedurePerformerByProcedureIdByPerformerId($procedure_id, $performer_id) {
        $this->db->select('*');
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_id', $performer_id);
        $this->db->group_end();
        $query = $this->db->get('procedure_performer');
        return $query->row();
    }

    function getProcedurePerformerByUserTypeByProcedureId($procedure_id, $type) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', $type);
        $this->db->group_end();
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    //doctor
    function getProcedurePerformerByDoctorByProcedureId($procedure_id) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', 'doctor');
        $this->db->group_end();
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    //nurse
    function getProcedurePerformerByNurseByProcedureId($procedure_id) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', 'nurse');
        $this->db->group_end();
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    //midwife
    function getProcedurePerformerByMidwifeByProcedureId($procedure_id) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', 'midwife');
        $this->db->group_end();
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    //laboratorist
    function getProcedurePerformerByLaboratoristByProcedureId($procedure_id) {
        $this->db->group_start();
            $this->db->where('procedure_id', $procedure_id);
            $this->db->where('performer_table_name', 'laboratorist');
        $this->db->group_end();
        $query = $this->db->get('procedure_performer');
        return $query->result();
    }

    function deleteProcedureByPerformer($id) {
        $this->db->where('id', $id);
        $this->db->delete('procedure_performer');
    }

    function deleteProcedureIdByPerformerId($id) {
        $this->db->where('procedure_id', $id);
        $this->db->delete('procedure_performer');
    }

    function deleteProcedurePerformerById($id) {
        $this->db->where('id', $id);
        $this->db->delete('procedure_performer');
    }

    function deleteProcedureById($id) {
        $this->db->where('id', $id);
        $this->db->delete('procedure');
    }
}
