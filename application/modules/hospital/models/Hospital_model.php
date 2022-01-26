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
                'name' => 'New Patient Bill - SMS to patient',
                'message' => 'Dear {name}, You have a new bill from {hospital_name} for the amount of {currency_symbol} {amount}. You may login to sugbodoc.com to view and make payment. This is a system generated notification. Please do not reply. For more information, contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'bill',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Payment Successful - SMS to patient',
                'message' => 'Dear {name}, Thank you for your payment of {currency_symbol} {amount} for Bill ID {invoice_id}. This is a system generated notification. Please do not reply. For more information, contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'payment',
                'status' => 'Active',
            ),            
            '2' => array(
                'name' => 'Appointment Confirmation - SMS to patient',
                'message' => 'Dear {name}, Your appointment with Dr. {doctorname} on {appointmentdate} from {time_slot} is CONFIRMED. Login to sugbodoc.com with your email, go to Todays Appointments and click on Join Video Call at least 10 minutes before the schedule to prepare. For more information, contact {hospital_name} at {hospital_contact}.',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '3' => array(
                'name' => 'Appointment Creation - SMS to patient',
                'message' => 'Dear {name}, You have booked an appointment with Dr. {doctorname} on {appointmentdate} from {time_slot}. Please wait for another SMS once the doctor confirms your appointment. Login and view your appointment calendar at sugbodoc.com. For more information, contact {hospital_name} at {hospital_contact}.',
                'type' => 'appoinment_creation',
                'status' => 'Active',
            ),
            '4' => array(
                'name' => 'Meeting Started - Notification To Patient',
                'message' => 'Dear {name}, Your Live Video Meeting with Dr. {doctorname} scheduled on {appointmentdate} from {time_slot} has started. To join the meeting, click on this link - {meeting_link}. Our supported browsers include Chrome, Firefox and Safari. For more information, please contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'meeting_creation',
                'status' => 'Active',
            ),
            '5' => array(
                'name' => 'Doctor Registration Confirmation',
                'message' => 'Dear {name}, Welcome to {hospital_name}. You are now registered as a doctor in {department} Department. You may now login at sugbodoc.com using your email. For more information, please contact {hospital_name} at {hospital_contact}. Thank You.',
                'type' => 'doctor',
                'status' => 'Active',
            ),
            '6' => array(
                'name' => 'Patient Registration Confirmation',
                'message' => 'Dear {name}, Welcome to {hospital_name}. You are now registered as a patient of Dr. {doctor}. Login using your email at sugbodoc.com to view your patient records or book an appointment with our doctors. For more information, please contact {hospital_name} at {hospital_contact}. Cheers!',
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
                'name' => 'New Patient Bill - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Your {hospital_name} Bill</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>You have a new bill from {hospital_name} for the amount of {currency_symbol} {amount}.</p><p><br><b>Bill details:</b></p><hr><p></p><p><span><b>Bill ID:</b> {invoice_id}</span><br></p><p><span><b>Bill Generated:</b> {date}</span><br></p><p><span><b>Total Amount Due:</b> {currency_symbol} {amount}</span></p><br><p> Login to <a href="https://sugbodoc.com" target="_blank">sugbodoc.com</a> to view and pay for your bills.</p><a href="https://sugbodoc.com/patient/myInvoice?id={invoice_id}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">View Bill</a><br><br><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'bill',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Payment Successful - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Payment Receipt</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>We have received your payment of {currency_symbol} {amount}.</p><p> Thank you for your payment.</p><p><br><b>Payment details:</b></p><hr><p></p><p><span><b>Receipt ID:</b> {receipt_id}</span><br></p><p><span><b>Payment for Invoice ID:</b> {invoice_id}</span><br></p><p><span><b>Amount Paid:</b> {currency_symbol} {amount}</span></p><br><p> Login to <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> to view your bills and payment history.</p><a href="https://sugbodoc.com/patient/myInvoice?id={invoice_id}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">View Invoice</a><br><br><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'payment',
                'status' => 'Active',
            ),        
            '2' => array(
                'name' => 'Appointment Confirmation - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Appointment Confirmed</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Your appointment with Dr. {doctorname} is now <b>Confirmed</b>.</p><p> Please join the meeting below at least 5 minutes earlier to prepare your camera and microphone.</p><p> Login and view your appointment calendar at <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a>.</p><p><br><b>Here are your appointment details:</b></p><hr><p style=""><span><b>Appointment Status:</b> Confirmed</span><br></p><p><b>Your Appointment Calendar:</b>&nbsp;<a href="https://sugbodoc.com/patient/calendar" target="_blank">https://sugbodoc.com/patient/calendar</a></p><p><span><b>Join this Meeting Link:</b> {meeting_link}</span></p><p><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p><span><b>Time:</b> {time_slot}</span><br></p><p><a href="{meeting_link}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">Join Video Call</a></p><br><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '3' => array(
                'name' => 'Appointment Creation - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Appointment Awaiting Confirmation</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>You have booked an appointment with Dr. {doctorname}.</p><p> Please wait for another email once the doctor confirms your appointment.</p><p> Login and view your appointment calendar at <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> and check the status.</p><p><br> <b>Here are the appointment details:</b></p><hr><p style=""><span><b>Appointment Status:</b> Waiting for Doctor Confirmation</span><br></p><p><b>Your Appointment Calendar:</b>&nbsp;<a href="https://sugbodoc.com/patient/calendar" target="_blank">https://sugbodoc.com/patient/calendar</a></p><p></p><p style=""><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p style=""><span><b>Time:</b> {time_slot}</span><br></p><p><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'appoinment_creation',
                'status' => 'Active',
            ),
            '4' => array(
                'name' => 'Meeting Started - Notification To Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Meeting Started</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Your meeting with Dr. {doctorname} has just <b>started</b>.</p><p> Please click on the meeting link or the button below to join the meeting now.</p><p><a href="{meeting_link}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">Join Video Call</a></p><p><br><b>Here are your appointment details:</b></p><hr><p style=""><span><b>Meeting Status:</b> Meeting Started</span><br></p><p><b>Join this Meeting Link:</b>&nbsp;<a href="{meeting_link}" target="_blank">{meeting_link}</a></p><p></p><p style=""><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p style=""><span><b>Time:</b> {time_slot}</span><br></p><p style="color: rgb(85, 85, 85);"><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'meeting_creation',
                'status' => 'Active',
            ),
            '5' => array(
                'name' => 'Doctor Registration Confirmation',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Welcome to {hospital_name}</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Welcome to {hospital_name}!</p><p> You are now registered as a doctor in {department} Department.</p><p> Login to <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> to view and manage Patient Health Records, Manage Appointments, Start a Video Consultation or Manage Bills of your patients.</p><p><br><b>Here are your login details:</b></p><hr><p><b>Login URL:</b>&nbsp;<a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a></p><p></p><p style=""><span><b>Email:</b> {email}</span><br></p><p style=""><span><b>Password:</b> {password}</span><br></p><br><p> Make sure you change your password after your first login.</p><p> We look forward to being your partner in patient healthcare management.</p><p><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
                'type' => 'doctor',
                'status' => 'Active',
            ),
            '6' => array(
                'name' => 'Patient Registration Confirmation',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Welcome to {hospital_name}</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Welcome to SugboDoc!</p><p> You are now registered as a patient of Dr. {doctor}.</p><p> Login to <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> to view your Patient Records, Book Appointments, Start a Video Consultation with any of our doctors or Pay for your Bills from the comfort of your home.</p><p><br><b>Here are your login details:</b></p><hr><p><b>Login URL:</b>&nbsp;<a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a></p><p></p><p style=""><span><b>Email:</b> {email}</span><br></p><p style=""><span><b>Password:</b> {password}</span><br></p><br><p> Make sure you change your password after your first login.</p><p> We look forward to managing your care wherever you are.</p><p><br></p><p><b>{hospital_name}</b></p><p>{hospital_contact}</p></div></div></div>',
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

    function createCompanyClassification($hospital_id) {
        $data = array();
        $data = array('0' => array(
                'name' => 'Personal',
                'description' => 'Personal Payment',
            ),
            '1' => array(
                'name' => 'Company',
                'description' => 'Company Payment',
            ),
            '2' => array(
                'name' => 'Insurance',
                'description' => 'Insurance Payment',
            ),
            '3' => array(
                'name' => 'HMO',
                'description' => 'HMO Payment',
            ),
            '4' => array(
                'name' => 'National Health Insurance',
                'description' => 'National Health Insurance Payment',
            ),
            '5' => array(
                'name' => 'Government Schemes',
                'description' => 'Government Schemes',
        ));


        foreach ($data as $row) {
            $data1 = array();
            $data1 = array(
                'name' => $row['name'],
                'description' => $row['description'],
                'hospital_id' => $hospital_id
            );
            $this->db->insert('company_classification', $data1);
        }
    }    
    
    function createCompanyType($hospital_id) {
        $data = array();
        $data = array('0' => array(
                'name' => 'Personal',
                'description' => 'Personal',
            ),
            '1' => array(
                'name' => 'Sole Proprietorship',
                'description' => 'Sole Proprietorship',
            ),
            '2' => array(
                'name' => 'Partnership',
                'description' => 'Partnership',
            ),
            '3' => array(
                'name' => 'Limited Liability Company',
                'description' => 'Limited Liability Company',
            ),
            '4' => array(
                'name' => 'Corporation',
                'description' => 'Corporation',
            ),
            '5' => array(
                'name' => 'Non-Profit Organization',
                'description' => 'Non-Profit Organization',
            ),
            '6' => array(
                'name' => 'Government',
                'description' => 'Government',
            ),                          
            '7' => array(
                'name' => 'Others',
                'description' => 'Others',
        ));


        foreach ($data as $row) {
            $data1 = array();
            $data1 = array(
                'name' => $row['name'],
                'description' => $row['description'],
                'hospital_id' => $hospital_id
            );
            $this->db->insert('company_type', $data1);
        }
    }    

    function getIonUserById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    
    
    
    

}
