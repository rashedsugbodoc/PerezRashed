<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hospital_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function hospitalId() {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            if ($this->ion_auth->in_group(array('admin'))) {
                $current_user_id = $this->ion_auth->user()->row()->id;
                $hospital_id = $this->db->get_where('hospital', array('ion_user_id' => $current_user_id))->row()->id;
                return $hospital_id;
            } else {
                $current_user_id = $this->ion_auth->user()->row()->id;
                $group_id = $this->db->get_where('users_groups', array('user_id' => $current_user_id))->row()->group_id;
                $group_name = $this->db->get_where('groups', array('id' => $group_id))->row()->name;
                $group_name = strtolower($group_name);
                $hospital_id = $this->db->get_where($group_name, array('ion_user_id' => $current_user_id))->row()->hospital_id;
                return $hospital_id;
            }
        }
    }

    function modules() {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            if ($this->ion_auth->in_group(array('admin'))) {
                $current_user_id = $this->ion_auth->user()->row()->id;
                $modules = $this->db->get_where('hospital', array('ion_user_id' => $current_user_id))->row()->module;
                $module = explode(',', $modules);
                return $module;
            } else {
                $current_user_id = $this->ion_auth->user()->row()->id;
                $group_id = $this->db->get_where('users_groups', array('user_id' => $current_user_id))->row()->group_id;
                $group_name = $this->db->get_where('groups', array('id' => $group_id))->row()->name;
                $group_name = strtolower($group_name);
                $hospital_id = $this->db->get_where($group_name, array('ion_user_id' => $current_user_id))->row()->hospital_id;
                $modules = $this->db->get_where('hospital', array('id' => $hospital_id))->row()->module;
                $module = explode(',', $modules);
                return $module;
            }
        }
    }

    function addHospitalIdToIonUser($ion_user_id, $hospital_id) {
        $hospital_ion_id = $this->db->get_where('hospital', array('id' => $hospital_id))->row()->ion_user_id;
        $uptade_ion_user = array(
            'hospital_ion_id' => $hospital_ion_id,
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    function insertHospital($data) {
        $this->db->insert('hospital', $data);
    }

    function getHospital() {
        $query = $this->db->get('hospital');
        return $query->result();
    }

    function getHospitalById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('hospital');
        return $query->row();
    }

    function updateHospital($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('hospital', $data);
    }

    function updateHospitalByIonId($id, $data) {
        $this->db->where('ion_user_id', $id);
        $this->db->update('hospital', $data);
    }

    function activate($id, $data) {
        $this->db->where('id', $id);
        $this->db->or_where('hospital_ion_id', $id);
        $this->db->update('users', $data);
    }

    function deactivate($id, $data) {
        $this->db->where('hospital_ion_id', $id);
        $this->db->or_where('id', $id);
        $this->db->update('users', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('hospital');
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    function getHospitalId($current_user_id) {
        $group_id = $this->db->get_where('users_groups', array('user_id' => $current_user_id))->row()->group_id;
        $group_name = $this->db->get_where('groups', array('id' => $group_id))->row()->name;
        $group_name = strtolower($group_name);
        $hospital_id = $this->db->get_where($group_name, array('ion_user_id' => $current_user_id))->row()->hospital_id;
        return $hospital_id;
    }

    function createAutoSmsTemplate($hospital_id) {
        $data = array();
        $data = array('0' => array(
                'name' => 'Payment Successful - SMS to patient',
                'message' => 'Dear {name}, Thank you for your payment of {amount}. This is a system generated notification. Please do not reply. For more information, contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'payment',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Appointment Confirmation - SMS to patient',
                'message' => 'Dear {name}, Your appointment with Dr. {doctorname} on {appointmentdate} at {time_slot} is confirmed. Login to sugbodoc.com with your email and click on Go Live at least 10 minutes before the schedule to prepare. For more information, contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '2' => array(
                'name' => 'Appointment Creation - SMS to patient',
                'message' => 'Dear {name}, You have booked an appointment with Dr. {doctorname} on {appointmentdate} at {time_slot}. Please wait for another SMS once the doctor confirms your appointment. Login and view your appointment calendar at sugbodoc.com. For more information, contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'appoinment_creation',
                'status' => 'Active',
            ),
            '3' => array(
                'name' => 'Meeting Started - Notification To Patient',
                'message' => 'Dear {patient_name}, Your Live Video Meeting with Dr. {doctor_name} scheduled on {start_time} has started. Login to sugbodoc.com and click on Go Live to join the meeting. For more information, please contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'meeting_creation',
                'status' => 'Active',
            ),
            '4' => array(
                'name' => 'Doctor Registration Confirmation',
                'message' => 'Dear {name}, Welcome to {company}. You are now registered as a doctor in {department} Department. You may now login at sugbodoc.com using your email. For more information, please contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'doctor',
                'status' => 'Active',
            ),
            '5' => array(
                'name' => 'Patient Registration Confirmation',
                'message' => 'Dear {name}, Welcome to {company}. You are now registered as a patient of Dr. {doctor}. Login using your email at sugbodoc.com to view your patient records or book an appointment with our doctors. For more information, please contact {hospital_name} at {hospital_contact}. Cheers!',
                'type' => 'patient',
                'status' => 'Active',
        ));


        foreach ($data as $row) {
            $data1 = array();
            $data1 = array(
                'name' => $row['name'],
                'message' => $row['message'],
                'type' => $row['type'],
                'status' => $row['status'],
                'hospital_id' => $hospital_id
            );
            $this->db->insert('autosmstemplate', $data1);
        }
    }
    
    
    
    
    function createAutoEmailTemplate($hospital_id) {
        $data = array();
        $data = array('0' => array(
                'name' => 'Payment Successful - Email to Patient',
                'message' => '<p>Dear {name},</p><br><p>Thank you for your payment of {amount}. This is a system generated notification. Please do not reply. For more information, contact {hospital_name} at {hospital_contact}.</p><br><p>Your SugboDoc Team</p>',
                'type' => 'payment',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Appointment Confirmation - Email to Patient',
                'message' => '<p>Dear {name},</p><br><p>Your appointment with Dr. {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information, please contact {hospital_name} at {hospital_contact}.</p><br><p>Your SugboDoc Team</p>',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '2' => array(
                'name' => 'Appointment Creation - Email to Patient',
                'message' => '<p>Dear {name},</p><br><p>You have booked an appointment with Dr. {doctorname} on {appointmentdate} at {time_slot}. Please wait for another email once the doctor confirms your appointment. Login and view your appointment calendar at sugbodoc.com. For more information, contact {hospital_name} at {hospital_contact}. Thank You.</p><br><p>Your SugboDoc Team</p>',
                'type' => 'appoinment_creation',
                'status' => 'Active',
            ),
            '3' => array(
                'name' => 'Meeting Started - Notification To Patient',
                'message' => '<p>Dear {patient_name},</p><br><p>You have a Live Video Meeting with Dr. {doctor_name} on {start_time}. For more information, please contact {hospital_name} at {hospital_contact}.</p><br><p>Your SugboDoc Team</p>',
                'type' => 'meeting_creation',
                'status' => 'Active',
            ),
            '4' => array(
                'name' => 'Doctor Registration Confirmation',
                'message' => '<p>Dear {name},</p><br><p>Welcome to {company}. You are now registered as a doctor in {department} . You may now login at sugbodoc.com using your email address or click on Forgot Password to reset it. For more information, contact {hospital_name} at {hospital_contact}. Thank You.</p><br><p>Your SugboDoc Team</p>',
                'type' => 'doctor',
                'status' => 'Active',
            ),
            '5' => array(
                'name' => 'Patient Registration Confirmation',
                'message' => '<p>Dear {name},</p><br><p>We welcome you to {company}. You are now registered as a patient of Dr. {doctor}. You may login to sugbodoc.com using your email address and default password 12345 or click on Forgot Password to reset it. Make sure to change your password on your first login.</p><br><p>Once logged in, you may view your Patient records, book appointments, start a video consultation with our doctor or pay for your bills. For more information, contact {hospital_name} at {hospital_contact}.</p><br><br><br><p>Cheers,</p><br><p>Your SugboDoc Team</p>',
                'type' => 'patient',
                'status' => 'Active',
        ));


        foreach ($data as $row) {
            $data1 = array();
            $data1 = array(
                'name' => $row['name'],
                'message' => $row['message'],
                'type' => $row['type'],
                'status' => $row['status'],
                'hospital_id' => $hospital_id
            );
            $this->db->insert('autoemailtemplate', $data1);
        }
    }
    
    
    
    
    
    

}
