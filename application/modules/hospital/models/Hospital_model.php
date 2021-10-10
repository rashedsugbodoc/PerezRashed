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
                'message' => 'Dear {name}, Thank you for your payment of {currency_symbol} {amount}. This is a system generated notification. Please do not reply. For more information, contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'payment',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Appointment Confirmation - SMS to patient',
                'message' => 'Dear {name}, Your appointment with Dr. {doctorname} on {appointmentdate} at {time_slot} is CONFIRMED. Login to sugbodoc.com with your email and click on Go Live at least 10 minutes before the schedule to prepare. For more information, contact {hospital_name} at {hospital_contact}.',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '2' => array(
                'name' => 'Appointment Creation - SMS to patient',
                'message' => 'Dear {name}, You have booked an appointment with Dr. {doctorname} on {appointmentdate} at {time_slot}. Please wait for another SMS once the doctor confirms your appointment. Login and view your appointment calendar at sugbodoc.com. For more information, contact {hospital_name} at {hospital_contact}.',
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
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Payment Receipt</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>We have received your payment of {currency_symbol} {amount}.</p><p> Thank you for your payment.</p><p><br><b>Payment details:</b></p><hr><p></p><p><span><b>Invoice ID:</b> {invoice_id}</span><br></p><p><span><b>Amount Paid:</b> {currency_symbol} {amount}</span><br></p><br><p> Login to <a href="https://sugbodoc.com" target="_blank">sugbodoc.com</a> to view your invoice and payment history.</p><table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate !important;border-radius: 2px;background-color: #4454c3;"><tbody><tr><td align="center" valign="middle" style="font-family: Arial;font-size: 16px;padding: 10px;"><a href="https://sugbodoc.com/finance/invoice?id={invoice_id}" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;-webkit-text-size-adjust: 100%;display: block;">View Invoice</a></td></tr></tbody></table><br><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'payment',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Appointment Confirmation - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Appointment Confirmed</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Your appointment with Dr. {doctorname} is now <b>Confirmed</b>.</p><p> Please join the meeting below at least 5 minutes earlier to prepare your camera and microphone.</p><p> Login and view your appointment calendar at <a href="sugbodoc.com" target="_blank">sugbodoc.com</a>.</p><p><br><b>Here are your appointment details:</b></p><hr><p style=""><span><b>Appointment Status:</b> Confirmed</span><br></p><p><b>Your Appointment Calendar:</b>&nbsp;<a href="https://sugbodoc.com/appointment/calendar" target="_blank">https://sugbodoc.com/appointment/calendar</a></p><p></p><p><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p><span><b>Time:</b> {time_slot}</span><br></p><p><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '2' => array(
                'name' => 'Appointment Creation - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Appointment Awaiting Confirmation</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>You have booked an appointment with Dr. {doctorname}.</p><p> Please wait for another email once the doctor confirms your appointment.</p><p> Login and view your appointment calendar at <a href="sugbodoc.com" target="_blank">sugbodoc.com</a>.</p><p><br> <b>Here are the appointment details:</b></p><hr><p style=""><span><b>Appointment Status:</b> Waiting for Doctor Confirmation</span><br></p><p><b>Your Appointment Calendar:</b>&nbsp;<a href="https://sugbodoc.com/appointment/calendar" target="_blank">https://sugbodoc.com/appointment/calendar</a></p><p></p><p style=""><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p style=""><span><b>Time:</b> {time_slot}</span><br></p><p><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'appoinment_creation',
                'status' => 'Active',
            ),
            '3' => array(
                'name' => 'Meeting Started - Notification To Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Meeting Started</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Your meeting with Dr. {doctorname} has just <b>started</b>.</p><p> Please Login to <a href="sugbodoc.com" target="_blank">sugbodoc.com</a> and click on Go Live to join the meeting now.</p><p><br><b>Here are your appointment details:</b></p><hr><p style=""><span><b>Meeting Status:</b> Meeting Started</span><br></p><p><b>Join this Meeting Link:</b>&nbsp;<a href="{meeting_link}" target="_blank">{meeting_link}</a></p><p></p><p style=""><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p style=""><span><b>Time:</b> {time_slot}</span><br></p><p style="color: rgb(85, 85, 85);"><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'meeting_creation',
                'status' => 'Active',
            ),
            '4' => array(
                'name' => 'Doctor Registration Confirmation',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Welcome to {company}</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Welcome to SugboDoc!</p><p> You are now registered as a doctor in {department} Department.</p><p> Login to <a href="sugbodoc.com" target="_blank">sugbodoc.com</a> to view and manage Patient Health Records, Manage Appointments, Start a Video Consultation or Manage Bills of your patients.</p><p><br><b>Here are your login details:</b></p><hr><p><b>Login URL:</b>&nbsp;<a href="https://sugbodoc.com" target="_blank">sugbodoc.com</a></p><p></p><p style=""><span><b>Email:</b> {email}</span><br></p><p style=""><span><b>Password:</b> {password}</span><br></p><br><p> Make sure you change your password after your first login.</p><p> We look forward to being your partner in patient healthcare management.</p><p><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'doctor',
                'status' => 'Active',
            ),
            '5' => array(
                'name' => 'Patient Registration Confirmation',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Welcome to {company}</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Welcome to SugboDoc!</p><p> You are now registered as a patient of Dr. {doctor}.</p><p> Login to <a href="sugbodoc.com" target="_blank">sugbodoc.com</a> to view your Patient Records, Book Appointments, Start a Video Consultation with any of our doctors or Pay for your Bills from the comfort of your home.</p><p><br><b>Here are your login details:</b></p><hr><p><b>Login URL:</b>&nbsp;<a href="https://sugbodoc.com" target="_blank">sugbodoc.com</a></p><p></p><p style=""><span><b>Email:</b> {email}</span><br></p><p style=""><span><b>Password:</b> {password}</span><br></p><br><p> Make sure you change your password after your first login.</p><p> We look forward to managing your care wherever you are.</p><p><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
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
