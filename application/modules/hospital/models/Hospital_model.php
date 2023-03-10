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

    function insertHospitalAdmin($data) {
        $this->db->insert('admin', $data);
    }    

    function getHospital() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('hospital');
        return $query->result();
    }

    function getHospitalByCountryIdByIsActiveByIsPublic($countries = [], $is_active = null, $is_public = null) {
        // $this->db->order_by('id', 'desc');
        // $this->db->where_in('country_id', $)
        // $query = $this->db->get('hospital');
        // return $query->result();

        // $this->db->select('a.id as hospital_id, a.name, b.id as settings_id, b.is_active, b.is_public, b.country_id, b.hospital_id');
        // $this->db->from('hospital a');
        // $this->db->join('settings b', 'b.hospital_id=hospital_id', 'right');
        // $this->db->where_in('b.country_id', $countries);
        // $this->db->where('b.is_active', $is_active);
        // $this->db->where('b.is_public', $is_public);
        // $fetched_records = $this->db->get();
        // $hospital = $fetched_records->result();
        // return $hospital;

        $this->db->select('a.id as settings_id, a.is_active, a.is_public, a.country_id, a.hospital_id, b.id, b.name');
        $this->db->from('settings a');
        $this->db->join('hospital b', 'b.id=a.hospital_id', 'right');
        $this->db->where_in('a.country_id', $countries);
        $this->db->where('a.is_active', $is_active);
        $this->db->where('a.is_public', $is_public);
        $fetched_records = $this->db->get();
        $hospital = $fetched_records->result();
        return $hospital;

        // $this->db->order_by('id', 'desc');
        // $this->db->where_in('country_id', $countries);
        // $this->db->where('is_active', $is_active);
        // $this->db->where('is_public', $is_public);
        // $query = $this->db->get('settings');
        // return $query->result();
    }

    function getLatestHospital() {
        $this->db->select('id');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('hospital');
        return $query->row();
    }

    function getActivePublicHospital() {
        $this->db->select('hospital.id, hospital.name, hospital.email, settings.address, settings.barangay_id, settings.city_id, settings.state_id, settings.country_id, hospital.phone, hospital.package, hospital.ion_user_id, settings.is_active');
        $this->db->from('hospital');
        $this->db->join('settings','hospital.id = settings.hospital_id','left');
        $this->db->where('settings.is_active',1);
        $this->db->where('settings.is_public',1);
        $query = $this->db->get();
        return $query->result();
    }

    function getActiveHospital() {
        $this->db->select('hospital.id, hospital.name, hospital.email, settings.address, settings.barangay_id, settings.city_id, settings.state_id, settings.country_id, hospital.phone, hospital.package, hospital.ion_user_id, settings.is_active');
        $this->db->from('hospital');
        $this->db->join('settings','hospital.id = settings.hospital_id','left');
        $this->db->where('settings.is_active',1);
        $query = $this->db->get();
        return $query->result();
    }

    function getDeactivatedHospital() {
        $this->db->select('hospital.id, hospital.name, hospital.email, settings.address, settings.barangay_id, settings.city_id, settings.state_id, settings.country_id, hospital.phone, hospital.package, hospital.ion_user_id, settings.is_active');
        $this->db->from('hospital');
        $this->db->join('settings','hospital.id = settings.hospital_id','left');
        $this->db->where('settings.is_active !=',1);
        $query = $this->db->get();
        return $query->result();
    }    

    function getHospitalAdminByHospitalId($hospital_id) {
        $this->db->where('hospital_id', $hospital_id);
        $query = $this->db->get('admin');
        return $query->row();
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

    function updateHospitalAdmin($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }    

    function updateHospitalByIonId($id, $data) {
        $this->db->where('ion_user_id', $id);
        $this->db->update('hospital', $data);
    }

    function activate($id, $data) {
        $this->db->where('hospital_id', $id);
        $this->db->update('settings', $data);
    }

    function deactivate($id, $data) {
        $this->db->where('hospital_id', $id);
        $this->db->update('settings', $data);
    }

    function enablelogin($id, $data) {
        $this->db->where('id', $id);
        $this->db->or_where('hospital_ion_id', $id);
        $this->db->update('users', $data);
    }

    function disablelogin($id, $data) {
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
                'message' => 'Dear {name}, You have a new bill from {hospital_name} for the amount of {currency_symbol} {amount}. Login to sugbodoc.com to view and make payment',
                'type' => 'bill',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Payment Successful - SMS to patient',
                'message' => 'Dear {name}, Thank you for your payment of {currency_symbol} {amount} for Bill ID {invoice_id}',
                'type' => 'payment',
                'status' => 'Active',
            ),            
            '2' => array(
                'name' => 'Appointment Confirmation - SMS to patient',
                'message' => 'Dear {name}, Your appointment with Dr. {doctorname} on {appointmentdate} from {time_slot} is CONFIRMED. Remember to Join Video Call at least 10 minutes before the schedule to prepare. Contact {hospital_name} at {hospital_contact}',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '3' => array(
                'name' => 'Appointment Creation - SMS to patient',
                'message' => 'Dear {name}, You have booked an appointment with Dr. {doctorname} on {appointmentdate} from {time_slot}. Please wait for another SMS once the doctor confirms your appointment. Login and view your appointment calendar at sugbodoc.com',
                'type' => 'appoinment_creation',
                'status' => 'Active',
            ),
            '4' => array(
                'name' => 'Meeting Started - Notification To Patient',
                'message' => 'Dear {name}, Your Video Call with Dr. {doctorname} scheduled on {appointmentdate} from {time_slot} has started. Join from this link - {meeting_link}',
                'type' => 'meeting_creation',
                'status' => 'Active',
            ),
            '5' => array(
                'name' => 'Doctor Registration Confirmation',
                'message' => 'Dear {name}, Welcome to SugboDoc. Login at sugbodoc.com to manage patient records, appointments and billing. Your partner in healthcare, SugboDoc',
                'type' => 'doctor',
                'status' => 'Active',
            ),
            '6' => array(
                'name' => 'Patient Registration Confirmation',
                'message' => 'Dear {name}, Welcome to SugboDoc. Login at sugbodoc.com to view your patient records or book an appointment with our doctors. Cheers!',
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
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Your SugboDoc Bill</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>You have a new bill from {hospital_name} for the amount of {currency_symbol} {amount}.</p><p><br><b>Bill details:</b></p><hr><p></p><p><span><b>Bill ID:</b> {invoice_id}</span><br></p><p><span><b>Bill Generated:</b> {date}</span><br></p><p><span><b>Bill Amount:</b> {currency_symbol} {amount}</span></p><p><span><b>Total Unpaid Amount:</b> {currency_symbol} {unpaid_amount}</span></p><br><p> Login to <a href="https://sugbodoc.com" target="_blank">sugbodoc.com</a> to view and pay for your bills.</p><a href="https://sugbodoc.com/patient/myInvoice?id={invoice_id}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">View Bill</a><br><br><p><b>SugboDoc Team</b></p><p><b>Follow us!</b><br><a href="https://www.facebook.com/sugbodoc" target="_blank">facebook.com/sugbodoc</a><br><a href="https://twitter.com/sugbodoc" target="_blank">twitter.com/sugbodoc</a><br><a href="https://www.instagram.com/sugbodoc" target="_blank">instagram.com/sugbodoc</a></p></div></div></div>',
                'type' => 'bill',
                'status' => 'Active',
            ),
            '1' => array(
                'name' => 'Payment Successful - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Payment Receipt</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>We have received your payment of {currency_symbol} {amount}.</p><p> Thank you for your payment.</p><p><br><b>Payment details:</b></p><hr><p></p><p><span><b>Receipt ID:</b> {receipt_id}</span><br></p><p><span><b>Payment for Invoice ID:</b> {invoice_id}</span><br></p><p><span><b>Amount Paid:</b> {currency_symbol} {amount}</span></p><br><p> Login to <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> to view your bills and payment history.</p><a href="https://sugbodoc.com/patient/myInvoice?id={invoice_id}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">View Invoice</a><br><br><p><b>SugboDoc Team</b></p><p><b>Follow us!</b><br><a href="https://www.facebook.com/sugbodoc" target="_blank">facebook.com/sugbodoc</a><br><a href="https://twitter.com/sugbodoc" target="_blank">twitter.com/sugbodoc</a><br><a href="https://www.instagram.com/sugbodoc" target="_blank">instagram.com/sugbodoc</a></p></div></div></div>',
                'type' => 'payment',
                'status' => 'Active',
            ),        
            '2' => array(
                'name' => 'Appointment Confirmation - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Appointment is now Confirmed</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Your appointment with Dr. {doctorname} is now <b>Confirmed</b>.</p><p> Please join the meeting below at least 5 minutes earlier to prepare your camera and microphone.</p><p> Login and view your appointment calendar at <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a>.</p><p><br><b>Here are your appointment details:</b></p><hr><p style=""><span><b>Appointment Status:</b> Confirmed</span><br></p><p><b>Your Appointment Calendar:</b>&nbsp;<a href="https://sugbodoc.com/patient/calendar" target="_blank">https://sugbodoc.com/patient/calendar</a></p><p><span><b>Join this Meeting Link:</b> {meeting_link}</span></p><p><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p><span><b>Time:</b> {time_slot}</span><br></p><p><a href="{meeting_link}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">Join Video Call</a></p><br><p><b>SugboDoc Team</b></p><p><b>Follow us!</b><br><a href="https://www.facebook.com/sugbodoc" target="_blank">facebook.com/sugbodoc</a><br><a href="https://twitter.com/sugbodoc" target="_blank">twitter.com/sugbodoc</a><br><a href="https://www.instagram.com/sugbodoc" target="_blank">instagram.com/sugbodoc</a></p></div></div></div>',
                'type' => 'appoinment_confirmation',
                'status' => 'Active',
            ),
            '3' => array(
                'name' => 'Appointment Creation - Email to Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Waiting for Doctor Confirmation</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>You have booked an appointment with Dr. {doctorname}.</p><p> Please wait for another email once the doctor confirms your appointment.</p><p> Login and view your appointment calendar at <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> and check the status.</p><p><br> <b>Here are the appointment details:</b></p><hr><p style=""><span><b>Appointment Status:</b> Waiting for Doctor Confirmation</span><br></p><p><b>Your Appointment Calendar:</b>&nbsp;<a href="https://sugbodoc.com/patient/calendar" target="_blank">https://sugbodoc.com/patient/calendar</a></p><p></p><p style=""><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p style=""><span><b>Time:</b> {time_slot}</span><br></p><p><br></p><p><b>SugboDoc Team</b></p><p><b>Follow us!</b><br><a href="https://www.facebook.com/sugbodoc" target="_blank">facebook.com/sugbodoc</a><br><a href="https://twitter.com/sugbodoc" target="_blank">twitter.com/sugbodoc</a><br><a href="https://www.instagram.com/sugbodoc" target="_blank">instagram.com/sugbodoc</a></p></div></div></div>',
                'type' => 'appoinment_creation',
                'status' => 'Active',
            ),
            '4' => array(
                'name' => 'Meeting Started - Notification To Patient',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Meeting Started</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Your meeting with Dr. {doctorname} has just <b>started</b>.</p><p> Please click on the meeting link or the button below to join the meeting now.</p><p><a href="{meeting_link}" target="_blank" style="border-radius: 4px;background-color: #4454c3;font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF; font-size:  15px;padding: 10px 15px;-webkit-text-size-adjust: 100%;display: inline-block;">Join Video Call</a></p><p><br><b>Here are your appointment details:</b></p><hr><p style=""><span><b>Meeting Status:</b> Meeting Started</span><br></p><p><b>Join this Meeting Link:</b>&nbsp;<a href="{meeting_link}" target="_blank">{meeting_link}</a></p><p></p><p style=""><span><b>Appointment Date:</b> {appointmentdate}</span><br></p><p style=""><span><b>Time:</b> {time_slot}</span><br></p><p style="color: rgb(85, 85, 85);"><br></p><p><b>SugboDoc Team</b></p><p><b>Follow us!</b><br><a href="https://www.facebook.com/sugbodoc" target="_blank">facebook.com/sugbodoc</a><br><a href="https://twitter.com/sugbodoc" target="_blank">twitter.com/sugbodoc</a><br><a href="https://www.instagram.com/sugbodoc" target="_blank">instagram.com/sugbodoc</a></p></div></div></div>',
                'type' => 'meeting_creation',
                'status' => 'Active',
            ),
            '5' => array(
                'name' => 'Doctor Registration Confirmation',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Welcome to SugboDoc</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255);color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Welcome to SugboDoc!</p><p> You are now registered as a doctor with us.</p><p> Login to <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> to view and manage Patient Health Records, Manage Appointments, Start a Video Consultation or Manage Bills of your patients.</p><p><br><b>Here are your login details:</b></p><hr><p><b>Login URL:</b>&nbsp;<a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a></p><p></p><p style=""><span><b>Email:</b> {email}</span><br></p><p style=""><span><b>Password:</b> {password}</span><br></p><br><p> Make sure you change your password after your first login.</p><p> We look forward to being your partner in patient healthcare management.</p><p><br></p><p><b>SugboDoc Team</b></p><p><b>Follow us!</b><br><a href="https://www.facebook.com/sugbodoc" target="_blank">facebook.com/sugbodoc</a><br><a href="https://twitter.com/sugbodoc" target="_blank">twitter.com/sugbodoc</a><br><a href="https://www.instagram.com/sugbodoc" target="_blank">instagram.com/sugbodoc</a></p></div></div></div>',
                'type' => 'doctor',
                'status' => 'Active',
            ),
            '6' => array(
                'name' => 'Patient Registration Confirmation',
                'message' => '<div style="font-family: sans-serif;background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#8e98db; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Welcome to SugboDoc</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color: rgb(85, 85, 85); font-size: 14px;"><p> Dear {name},<br><br>Welcome to SugboDoc!</p><p> Login to <a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a> to view your Patient Records, Book Appointments, Start a Video Consultation with any of our doctors or Pay for your Bills from the comfort of your home.</p><p><br><b>Here are your login details:</b></p><hr><p><b>Login URL:</b>&nbsp;<a href="https://sugbodoc.com/" target="_blank">sugbodoc.com</a></p><p></p><p style=""><span><b>Email:</b> {email}</span><br></p><p style=""><span><b>Password:</b> {password}</span><br></p><br><p> Make sure you change your password after your first login.</p><p> We look forward to managing your care wherever you are.</p><p><br></p><p><b>SugboDoc Team</b></p><p><b>Follow us!</b><br><a href="https://www.facebook.com/sugbodoc" target="_blank">facebook.com/sugbodoc</a><br><a href="https://twitter.com/sugbodoc" target="_blank">twitter.com/sugbodoc</a><br><a href="https://www.instagram.com/sugbodoc" target="_blank">instagram.com/sugbodoc</a></p></div></div></div>',
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
    function createPersonalAccount($hospital_id) {
        $classification_id = $this->db->get_where('company_classification', array('name' => 'Personal'))->row()->id;  
        $type_id = $this->db->get_where('company_type', array('name' => 'Personal'))->row()->id;
            $data1 = array();
            $data1 = array(
                'name' => 'Personal',
                'display_name' => 'Personal',
                'classification_id' => $classification_id,
                'type_id' => $type_id,
                'hospital_id' => $hospital_id
            );
            $this->db->insert('company', $data1);
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
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name'] . ' (' . lang('id') . ': ' . $user['id'] . ')');
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
    
    function getHospitalInfoWithAddNewOption($searchTerm) {
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
            $data[] = array("id" => $user['id'], "text" => $user['name'] . ' (' . lang('id') . ': ' . $user['id'] . ')');
        }
        return $data;
    }
    
    

}
