<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Encounter_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getEncounter($today = FALSE, $patient_id = null) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        if (!empty($today)) {
            $this->db->where("(created_at LIKE '%" . $today . "%')", NULL, FALSE);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterType() {
        $settings = $this->settings_model->getSettings();
        $this->db->order_by('id', 'asc');
        $this->db->where("FIND_IN_SET($settings->entity_type_id, applicable_entity_type)");
        $query = $this->db->get('encounter_type');
        return $query->result();
    }

    function insertEncounter($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('encounter', $data2);
    }

    function updateEncounter($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('encounter', $data);
    }

    function deleteEncounter($id) {
        $this->db->where('id', $id);
        $this->db->delete('encounter');
    }

    function getEncounterById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('encounter');
        return $query->row();
    }

    function getEncounterByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterByPatientIdForDropdown($id) {
        // if (!empty($doctor)) {
        //     $this->db->select('*');
        //     $this->db->where('doctor', $doctor);
        //     $this->db->limit(100);
        //     $fetched_records = $this->db->get('encounter');
        //     $users = $fetched_records->result_array();
        // } else {
        //     $this->db->select('*');
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->limit(100);
        //     $fetched_records = $this->db->get('encounter');
        //     $users = $fetched_records->result_array();
        // }
        // // Initialize Array with fetched data
        // $data = array();
        // foreach ($users as $user) {
        //     $encounter_type_name = $this->getEncounterTypeById($user['encounter_type_id']);
        //     $data[] = array("id" => $user['id'], "text" =>  lang('encounter') . " No." . ' : ' . $user['encounter_number'] . ' - ' . $encounter_type_name->display_name . ' - ' . date("M j, Y g:i a", strtotime($user['created_at'].' UTC')));
        // }
        // return $data;

        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $fetched_records = $this->db->get('encounter');
        $users = $fetched_records->result_array();

        $data = array();
        foreach ($users as $user) {
            $encounter_type_name = $this->getEncounterTypeById($user['encounter_type_id']);
            $data[] = array("id" => $user['id'], "text" =>  lang('encounter') . " No." . ' : ' . $user['encounter_number'] . ' - ' . $encounter_type_name->display_name . ' - ' . date("M j, Y g:i a", strtotime($user['created_at'].' UTC')));
        }

        return $data;
    }

    function getEncounterByPatientIdByDoctorId($patient, $doctor) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $patient);
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterByPatientIdByEncounterId($id, $encounter_id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $this->db->where('id', $encounter_id);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterWithTypeNameByPatientId($id) {
        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        // $this->db->where('patient_id', $id);
        // $query = $this->db->get('encounter');
        // return $query->result();
        $this->db->select('a.id, a.encounter_type_id, a.encounter_number, a.created_at, b.display_name');
        $this->db->from('encounter a');
        $this->db->join('encounter_type b', 'b.id=a.encounter_type_id', 'left');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getEncounterByTypeIdByPatientId($id, $encounter_type) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('patient_id', $id);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getDueBalanceByPatientIdByEncounterId($patient, $encounter) {
        $query = $this->db->get_where('invoice', array(
            'encounter_id' => $encounter,
            'patient' => $patient
        ))->result();
        $balance = array();
        $invoice = array();
        $deposit_amount = array();
        foreach ($query as $gross) {
            $balance[] = $gross->gross_total;
            $invoice [] = $gross->id;
        }

        $balance = array_sum($balance);
        $invoice_id = $invoice;

        foreach ($invoice_id as $invoice_details) {
            $inv = $invoice_details;
            $deposit_details = array();
            $deposit_details[] = $this->db->get_where('patient_deposit', array('payment_id' => $inv))->result();
                foreach($deposit_details as $deposit_detail) {
                    foreach($deposit_detail as $dep_detail) {
                        $deposit_amount[] = $dep_detail->deposited_amount;
                    }
                }
        }

        $deposit_amount_total = array_sum($deposit_amount);

        return $balance - $deposit_amount_total;

    }

    function getEncounterByDoctorId($id, $patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor_id', $id);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterByInvoiceId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('invoice_id', $id);
        $query = $this->db->get('encounter');
        return $query->row();
    }

    function getEncounterByAppointmentId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('appointment_id', $id);
        $query = $this->db->get('encounter');
        return $query->row();
    }

    function getEncounterByVitalId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('start_vital_id', $id);
        $query = $this->db->get('encounter');
        return $query->row();
    }

    function getEncounterTypeIdByName($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('encounter_type');
        return $query->row();
    }

    function getEncounterTypeById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('encounter_type');
        return $query->row();
    }

    function getEncounterBySearch($search, $patient_id = null) {
        $this->db->order_by('id', 'desc');
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        } else {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        }
        return $query->result();
    }

    function getEncounterBySearchByDoctorId($search, $doctor_id, $patient_id = null) {
        $this->db->order_by('id', 'desc');
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where('doctor', $doctor_id)
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        } else {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where('doctor', $doctor_id)
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        }
        return $query->result();
    }

    function getEncounterBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('encounter')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getEncounterByLimitBySearch($limit, $start, $search, $patient_id = null) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        } else {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        }
        return $query->result();
    }

    function getEncounterByLimitBySearchByDoctorId($limit, $start, $search, $doctor_id, $patient_id = null) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!empty($patient_id)) {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('patient_id', $patient_id)
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where('doctor', $doctor_id)
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        } else {
            $query = $this->db->select('*')
                    ->from('encounter')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where('doctor', $doctor_id)
                    ->where("(id LIKE '%" . $search . "%' OR encounter_type_id LIKE '%" . $search . "%' OR encounter_status LIKE '%" . $search . "%' OR encounter_number LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        }
        return $query->result();
    }

    function getEncounterByLimit($limit, $start, $patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterByLimitByDoctorId($limit, $start, $doctor_id, $patient_id = null) {
        if (!empty($patient_id)) {
            $this->db->where('patient_id', $patient_id);
        }
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $doctor_id);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('encounter');
        return $query->result();
    }

    function getEncounterCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('encounter');
        return $query->num_rows();
    }

    function getPatientByEncounter() {
        if (!empty($doctor)) {
            $this->db->select('*');
            $this->db->where('doctor', $doctor);
            $this->db->limit(100);
            $fetched_records = $this->db->get('encounter');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(100);
            $fetched_records = $this->db->get('encounter');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $encounter_type_name = $this->getEncounterTypeById($user['encounter_type_id']);
            $data[] = array("id" => $user['id'], "text" =>  lang('encounter') . " No." . ' : ' . $user['encounter_number'] . ' - ' . $encounter_type_name->display_name . ' - ' . date("M j, Y g:i a", strtotime($user['created_at'].' UTC')));
        }
        return $data;
    }

    function getEncounterInfo($searchTerm, $doctor) {
        $settings = $this->settings_model->getSettings();
        if (!empty($doctor)) {
            if (!empty($searchTerm)) {
                $query = $this->db->select('*')
                        ->from('encounter')
                        ->where('doctor', $doctor)
                        ->where("(id LIKE '%" . $searchTerm . "%' OR encounter_number LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                        ->get();
                $users = $query->result_array();
            } else {
                $this->db->select('*');
                $this->db->where('doctor', $doctor);
                $this->db->limit(100);
                $fetched_records = $this->db->get('encounter');
                $users = $fetched_records->result_array();
            }
        } else {
            if (!empty($searchTerm)) {
                $query = $this->db->select('*')
                        ->from('encounter')
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where("(id LIKE '%" . $searchTerm . "%' OR encounter_number LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                        ->get();
                $users = $query->result_array();
            } else {
                $this->db->select('*');
                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                $this->db->limit(100);
                $fetched_records = $this->db->get('encounter');
                $users = $fetched_records->result_array();
            }
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $encounter_type_name = $this->getEncounterTypeById($user['encounter_type_id']);
            $data[] = array("id" => $user['id'], "text" =>  lang('encounter') . " No." . ' : ' . $user['encounter_number'] . ' - ' . $encounter_type_name->display_name . ' - ' . date("M j, Y g:i a", strtotime($user['created_at'].' UTC')));
        }
        return $data;
    }

    function getEncounterInfoByPatient($searchTerm, $doctor, $patient) {
        $settings = $this->settings_model->getSettings();
        if (!empty($doctor)) {
            if (!empty($searchTerm)) {
                $query = $this->db->select('*')
                        ->from('encounter')
                        ->where('doctor', $doctor)
                        ->where('patient_id', $patient)
                        ->where("(id LIKE '%" . $searchTerm . "%' OR encounter_number LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                        ->get();
                $users = $query->result_array();
            } else {
                $this->db->select('*');
                $this->db->where('doctor', $doctor);
                $this->db->where('patient_id', $patient);
                $this->db->limit(100);
                $fetched_records = $this->db->get('encounter');
                $users = $fetched_records->result_array();
            }
        } else {
            if (!empty($searchTerm)) {
                $query = $this->db->select('*')
                        ->from('encounter')
                        ->where('hospital_id', $this->session->userdata('hospital_id'))
                        ->where('patient_id', $patient)
                        ->where("(id LIKE '%" . $searchTerm . "%' OR encounter_number LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                        ->get();
                $users = $query->result_array();
            } else {
                $this->db->select('*');
                $this->db->where('patient_id', $patient);
                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                $this->db->limit(100);
                $fetched_records = $this->db->get('encounter');
                $users = $fetched_records->result_array();
            }
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $encounter_type_name = $this->getEncounterTypeById($user['encounter_type_id']);
            $data[] = array("id" => $user['id'], "text" =>  lang('encounter') . " No." . ' : ' . $user['encounter_number'] . ' - ' . $encounter_type_name->display_name . ' - ' . date("M j, Y g:i a", strtotime($user['created_at'].' UTC')));
        }
        return $data;
    }

    function getEncounterTypeInfo($searchTerm) {
        $settings = $this->settings_model->getSettings();
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('encounter_type')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->where("FIND_IN_SET($settings->entity_type_id, applicable_entity_type)")
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where("FIND_IN_SET($settings->entity_type_id, applicable_entity_type)");
            $this->db->limit(10);
            $fetched_records = $this->db->get('encounter_type');
            $users = $fetched_records->result_array();
        }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['display_name']);
        }
        return $data;
    }

    function getEncounterStatusByEncounterType($id) {
        $this->db->where("FIND_IN_SET($id, applicable_encounter_type)");
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('encounter_status');
        return $query->result();

    }

    // function getEncounterStatus($searchTerm) {
    //     if (!empty($searchTerm)) {
    //         $this->db->select('*');
    //         // $this->db->where("FIND_IN_SET($id, applicable_encounter_type)");
    //         $this->db->where("display_name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
    //         $fetched_records = $this->db->get('encounter_status');
    //         $encounter_status = $fetched_records->result_array();
    //     } else {
    //         $this->db->select('*');
    //         // $this->db->where("FIND_IN_SET($id, applicable_encounter_type)");
    //         $this->db->limit(10);
    //         $fetched_records = $this->db->get('encounter_status');
    //         $encounter_status = $fetched_records->result_array();
    //     }
    //     // Initialize Array with fetched data
    //     $data = array();
    //     foreach ($encounter_status as $status) {
    //         $data[] = array("id" => $status['id'], "text" => $status['display_name']);
    //     }
    //     return $data;
    // }

    function getEncounterStatus($id) {
        $this->db->where("FIND_IN_SET($id, applicable_encounter_type)");
        $query = $this->db->get('encounter_status');
        return $query->result();
    }

    function getEncounterStatusById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('encounter_status');
        return $query->row();
    }

    function getProviderinfoWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('specify_name').' ('.' if not listed '.')');
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getProviderinfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('hospital');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name'] . ' (' . lang('id') . ': ' . $user['id'] . ')');
        }
        return $data;
    }

    function getUserByApplicableUserGroupWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('doctor')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('doctor');
            $users = $fetched_records->result_array();
        }


        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->where('ion_user_id', $doctor_ion_id);
            $fetched_records = $this->db->get('doctor');
            $users = $fetched_records->result_array();
        }



        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['ion_user_id'], "text" => $user['name']);
        }
        return $data;
    }

    function getUsersByValidUsers($valid_users) {
        $this->db->select('a.user_id, a.group_id, b.username, c.name');
        $this->db->from('users_groups a');
        $this->db->join('users b', 'b.id=a.user_id', 'left');
        $this->db->join('groups c', 'c.id=a.group_id', 'left');
        // $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
        $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
        // $this->db->where('c.id', 5);
        $query = $this->db->get();
        return $query->result_array();

        // if (!empty($searchTerm)) {
        //     $query = $this->db->select('a.user_id, a.group_id, b.username, c.name')
        //             ->from('users_groups a');
        //             ->join('users b', 'b.id=a.user_id', 'left')
        //             ->join('users b', 'b.id=a.user_id', 'left')
        //             ->where("FIND_IN_SET(c.id, '".$valid_users."')")
        //             ->where("(a.user_id LIKE '%" . $searchTerm . "%' OR b.username LIKE '%" . $searchTerm . "%')", NULL, FALSE)
        //             ->get();
        //     $users = $query->result_array();
        // } else {
        //     $this->db->select('a.user_id, a.group_id, b.username, c.name');
        //     $this->db->from('users_groups a');
        //     $this->db->join('users b', 'b.id=a.user_id', 'left');
        //     $this->db->join('groups c', 'c.id=a.group_id', 'left');
        //     $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
        //     $this->db->limit(10);
        //     $fetched_records = $this->db->get();
        //     $users = $fetched_records->result_array();
        // }
    }


    function getUser() { 
        // Valid Users is comma separated ids of user groups example; 4,6,11
        $valid_users = '4,6,7,8,10';

        $this->db->select('a.user_id, a.group_id, b.username, c.name');
        $this->db->from('users_groups a');
        $this->db->join('users b', 'b.id=a.user_id', 'left');
        $this->db->join('groups c', 'c.id=a.group_id', 'left');
        $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
        // $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }

    function getUserWithAddNewOption($searchTerm) {
        $valid_users = '4,6,7,8,10';
        // $user_groups = $this->getUsersByValidUsers($valid_users);

        if (!empty($searchTerm)) {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->where("(a.user_id LIKE '%" . $searchTerm . "%' OR b.username LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->limit(10);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        }

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->where('ion_user_id', $doctor_ion_id);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        }


        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['user_id'], "text" => $user['username']);
        }
        return $data;
    }

    function getUserWithoutAddNewOption($searchTerm) {
        $valid_users = '4,6,7,8,10';
        // $user_groups = $this->getUsersByValidUsers($valid_users);

        if (!empty($searchTerm)) {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->where("(a.user_id LIKE '%" . $searchTerm . "%' OR b.username LIKE '%" . $searchTerm . "%')", NULL, FALSE);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('a.user_id, a.group_id, b.username, c.name');
            $this->db->from('users_groups a');
            $this->db->join('users b', 'b.id=a.user_id', 'left');
            $this->db->join('groups c', 'c.id=a.group_id', 'left');
            $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
            $this->db->limit(10);
            $fetched_records = $this->db->get();
            $users = $fetched_records->result_array();
        }

        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('a.user_id, a.group_id, b.username, c.name');
        //     $this->db->from('users_groups a');
        //     $this->db->join('users b', 'b.id=a.user_id', 'left');
        //     $this->db->join('groups c', 'c.id=a.group_id', 'left');
        //     $this->db->where("FIND_IN_SET(c.id, '".$valid_users."')");
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get();
        //     $users = $fetched_records->result_array();
        // }


        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['user_id'], "text" => $user['username']);
        }
        return $data;
    }

    function getRenderingDoctorWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('doctor')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('doctor');
            $users = $fetched_records->result_array();
        }


        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('*');
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get('doctor');
        //     $users = $fetched_records->result_array();
        // }



        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getRenderingDoctorWithoutAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('doctor')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            $this->db->limit(10);
            $fetched_records = $this->db->get('doctor');
            $users = $fetched_records->result_array();
        }


        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('*');
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get('doctor');
        //     $users = $fetched_records->result_array();
        // }



        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getReferredDoctorWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('doctor')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('doctor');
            $users = $fetched_records->result_array();
        }


        // if ($this->ion_auth->in_group(array('Doctor'))) {
        //     $doctor_ion_id = $this->ion_auth->get_user_id();
        //     $this->db->select('*');
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('ion_user_id', $doctor_ion_id);
        //     $fetched_records = $this->db->get('doctor');
        //     $users = $fetched_records->result_array();
        // }



        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('specify_name').' ('.' if not listed '.')');
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name']);
        }
        return $data;
    }

    function getEncounterByPatientByApplicableEncounterType($applicable_encounter_id, $patient_id){
        $this->db->where_in('encounter_type_id', $applicable_encounter_id);
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('encounter');
        return $query->result();
    }

}
