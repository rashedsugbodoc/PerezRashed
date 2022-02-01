<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appointment_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertAppointment($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('appointment', $data2);
    }

    function getAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentCount() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getAppointmentCountByDoctor($id) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $id);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getAppointmentByTodayCount() {
        $today = strtotime(date('Y-m-d'));
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date', $today);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getAppointmentByUpcomingCount() {
        $today = strtotime(date('Y-m-d'));
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date >', $today);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getAppointmentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getAppointmentBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getAppointmentBySearchCountByDoctor($search, $doctor) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getAppointmentByTodayBySearchCount($search) {
        $today = strtotime(date('Y-m-d'));
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('date', $today)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getAppointmentByUpcomingBySearchCount($search) {
        $today = strtotime(date('Y-m-d'));
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('date >', $today)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getAppointmentByLimit($limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getAppointmentForCalendar() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByDoctor($doctor) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentRequest() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('request', 'Yes');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentRequestCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('request', 'Yes');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentRequestByDoctor($doctor) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('request', 'Yes');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByPatient($patient) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $patient);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByStatus($status) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('status', $status);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentByStatusByDoctor($status, $doctor) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('status', $status);
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('appointment');
        return $query->row();
    }

    function getAppointmentByDate($date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('appointment');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getAppointmentByDoctorByToday($doctor_id) {
        $today = strtotime(date('Y-m-d'));
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $doctor_id);
        $this->db->where('date', $today);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function updateAppointment($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('appointment', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('appointment');
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

    function getRequestAppointment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Requested');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Requested');
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getRequestAppointmentCountByDoctor($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('status', 'Requested');
        $this->db->where('doctor', $id);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getRequestAppointmentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Requested')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getRequestAppointmentBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Requested')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getRequestAppointmentBySearchCountByDoctor($search, $id) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Requested')
                ->where('doctor', $id)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getRequestAppointmentByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Requested');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Requested')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getPendingAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Pending Confirmation');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Pending Confirmation');
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getPendingAppointmentCountByDoctor($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Pending Confirmation');
        $this->db->where('doctor', $id);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getPendingAppointmentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Pending Confirmation')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getPendingAppointmentBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Pending Confirmation')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getPendingAppointmentBySearchCountByDoctor($search, $id) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Pending Confirmation')
                ->where('doctor', $id)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getPendingAppointmentByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Pending Confirmation');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Pending Confirmation')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getConfirmedAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Confirmed');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Confirmed');
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getConfirmedAppointmentCountByDoctor($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Confirmed');
        $this->db->where('doctor', $id);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getConfirmedAppointmentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Confirmed')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getConfirmedAppointmentBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Confirmed')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getConfirmedAppointmentBySearchCountByDoctor($search, $id) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Confirmed')
                ->where('doctor', $id)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getConfirmedAppointmentByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Confirmed');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Confirmed')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getTreatedAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Treated');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Treated');
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getTreatedAppointmentCountByDoctor($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Treated');
        $this->db->where('doctor', $id);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getTreatedAppointmentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Treated')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getTreatedAppointmentBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Treated')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getTreatedAppointmentBySearchCountByDoctor($search, $id) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Treated')
                ->where('doctor', $id)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getTreatedAppointmentByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Treated');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Treated')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCancelledAppointment() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Cancelled');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentCount() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Cancelled');
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getCancelledAppointmentCountByDoctor($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Cancelled');
        $this->db->where('doctor', $id);
        $query = $this->db->get('appointment');
        return $query->num_rows();
    }

    function getCancelledAppointmentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Cancelled')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCancelledAppointmentBySearchCount($search) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Cancelled')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getCancelledAppointmentBySearchCountByDoctor($search, $id) {
        $query = $this->db->select('id')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Cancelled')
                ->where('doctor', $id)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->num_rows();
    }

    function getCancelledAppointmentByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Cancelled');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('status', 'Cancelled')
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getAppointmentListByDoctor($doctor) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $doctor);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentListBySearchByDoctor($doctor, $search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getAppointmentListByLimitByDoctor($doctor, $limit, $start) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $doctor);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getRequestAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Requested');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentBySearchByDoctor($doctor, $search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Requested')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getRequestAppointmentByLimitByDoctor($doctor, $limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Requested');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getRequestAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {

        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Requested')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCancelledAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Cancelled');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentBySearchByDoctor($doctor, $search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Cancelled')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getCancelledAppointmentByLimitByDoctor($doctor, $limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Cancelled');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getCancelledAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {

        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Cancelled')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getPendingAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Pending Confirmation');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentBySearchByDoctor($doctor, $search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Pending Confirmation')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getPendingAppointmentByLimitByDoctor($doctor, $limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Pending Confirmation');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getPendingAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Pending Confirmation')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getTreatedAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Treated');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentBySearchByDoctor($doctor, $search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Treated')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getTreatedAppointmentByLimitByDoctor($doctor, $limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Treated');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTreatedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Treated')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getConfirmedAppointmentByDoctor($doctor) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Confirmed');
        $this->db->where('doctor', $doctor);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentBySearchByDoctor($doctor, $search) {
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Confirmed')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getConfirmedAppointmentByLimitByDoctor($doctor, $limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('status', 'Confirmed');
        $this->db->where('doctor', $doctor);
        $this->db->limit($limit, $start);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getConfirmedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('appointment')
                ->where('status', 'Confirmed')
                ->where('doctor', $doctor)
                ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        return $query->result();
    }

    function getServiceCategoryGroupInfoForConsultation($searchTerm) {
        $settings = $this->settings_model->getSettings()->entity_type_id;
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('service_category_group')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $users = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $this->db->where("FIND_IN_SET($settings, applicable_entity_type)");
            $this->db->where("is_consultation", 1);
            $fetched_records = $this->db->get('service_category_group');
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
            $data[] = array("id" => $user['id'], "text" => $user['display_name']);
        }
        return $data;
    }

    function getServicesByServiceCategoryGroupByDoctorHospital($serviceCategoryGroup, $doctorHospital) {
        //$newDate = date("m-d-Y", strtotime($date));
        // $weekday = strftime("%A", $date);

        // $this->db->where('date', $date);
        // $this->db->where('doctor', $doctor);
        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        // $holiday = $this->db->get('holidays')->result();

        // if (empty($holiday)) {
        //     $this->db->where('date', $date);
        //     $this->db->where('doctor', $doctor);
        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $query = $this->db->get('appointment')->result();

        //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        //     $this->db->where('doctor', $doctor);
        //     $this->db->where('weekday', $weekday);
        //     $this->db->where('location_id', $location);
        //     $this->db->order_by('s_time_key', 'asc');
        //     $query1 = $this->db->get('time_slot_location')->result();

        //     $availabletimeSlot = array();
        //     $bookedTimeSlot = array();

        //     foreach ($query1 as $timeslot) {
        //         $availabletimeSlot[] = $timeslot->s_time . ' To ' . $timeslot->e_time;
        //     }
        //     foreach ($query as $bookedTime) {
        //         if ($bookedTime->status != 'Cancelled') {
        //             $bookedTimeSlot[] = $bookedTime->time_slot;
        //         }
        //     }

        //     $availableSlot = array_diff($availabletimeSlot, $bookedTimeSlot);
        // } else {
        //     $availableSlot = array();
        // }

        $this->db->where('service_category_group_id', $serviceCategoryGroup);
        $this->db->where('hospital_id', $doctorHospital);
        $services = $this->db->get('payment_category')->result();

        return $services;
    }

}
