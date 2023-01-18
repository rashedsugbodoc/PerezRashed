<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customform_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertCustomForm($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('custom_form', $data2);
    }

    function getDiseasesInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('pophealth_medication_availment_status')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $diseases = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('pophealth_medication_availment_status');
            $diseases = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($diseases as $disease) {
            $data[] = array("id" => $disease['id'], "text" => $disease['display_name'] );
        }
        return $data;
    }

    function getDiseases() {
        $this->db->select('*');
        $query = $this->db->get('pophealth_medication_availment_status');
        return $query->result();
    }

    function getCovidInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $query = $this->db->select('*')
                    ->from('pophealth_covid_status')
                    ->where("(id LIKE '%" . $searchTerm . "%' OR display_name LIKE '%" . $searchTerm . "%')", NULL, FALSE)
                    ->get();
            $covid_status = $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->limit(10);
            $fetched_records = $this->db->get('pophealth_covid_status');
            $covid_status = $fetched_records->result_array();
        }

        // Initialize Array with fetched data
        $data = array();
        foreach ($covid_status as $status) {
            $data[] = array("id" => $status['id'], "text" => $status['display_name'] );
        }
        return $data;
    }

    function getCovidStatus() {
        $this->db->select('*');
        $query = $this->db->get('pophealth_covid_status');
        return $query->result();
    }

    function getCustomFormByPatientId($id) {
        $this->db->where('patient', $id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('custom_form');
        return $query->row();
    }

    function getCustomFormByReferenceNumber($id) {
        $this->db->where('reference_number', $id);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('custom_form');
        return $query->row();
    }

    function getCustomFormType() {
        $this->db->select('*');
        $query = $this->db->get('custom_form_type');
        return $query->result();
    }

    function getCustomFormTypeById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('custom_form_type');
        return $query->row();
    }

    function countCustomFormByPatient($id, $type) {
        $this->db->where('patient', $id);
        $this->db->where('type_id', $type);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('custom_form');
        return $query->num_rows();
    }

    function getCustomFormBySearchByDoctorIdByType($search, $id, $type) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('custom_form')
                ->where('type_id', $type)
                ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientCustomFormBySearchByDoctorIdByType($search, $id, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->order_by('id', 'desc');
            $data[] = $this->db->select('*')
                    ->from('custom_form')
                    ->where('type_id', $type)
                    ->where('patient', $patient->id)
                    ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get()->row();
        }

        return array_filter($data);

        // $provider = $this->session->userdata('hospital_id');
        // $this->db->order_by('id', 'desc');
        // $query = $this->db->select('*')
        //         ->from('custom_form')
        //         ->where('type_id', $type)
        //         ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
        //         ->get();
        // ;
        // return $query->result();
    }

    function getCustomFormBySearchByType($search, $type) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->order_by('id', 'desc');
        $query = $this->db->select('*')
                ->from('custom_form')
                ->where('type_id', $type)
                ->where("FIND_IN_SET($provider,visited_provider_id) > 0")
                ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientCustomFormBySearchByType($search, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->order_by('id', 'desc');
            $this->db->limit($limit, $start);
            $data[] = $this->db->select('*')
                    ->from('custom_form')
                    ->where('type_id', $type)
                    ->where('patient', $patient->id)
                    ->where("FIND_IN_SET($provider,visited_provider_id) > 0")
                    ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get()->row();
        }

        return array_filter($data);

        // $provider = $this->session->userdata('hospital_id');
        // $this->db->order_by('id', 'desc');
        // $query = $this->db->select('*')
        //         ->from('custom_form')
        //         ->where('type_id', $type)
        //         ->where("FIND_IN_SET($provider,visited_provider_id) > 0")
        //         ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
        //         ->get();
        // ;
        // return $query->result();
    }

    function getCustomFormByDoctorIdByType($id, $type) {
        $provider = $this->session->userdata('hospital_id');
        $this->db->where('doctor', $id);
        $this->db->where('type_id', $type);
        $this->db->order_by('id','desc');
        $query = $this->db->get('custom_form');
        return $query->result();
    }

    function getPatientCustomFormByDoctorIdByType($id, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->where('doctor', $id);
            $this->db->where('type_id', $type);
            $this->db->where('patient', $patient->id);
            $this->db->order_by('id', 'desc');
            $data[] = $this->db->get('custom_form')->row();
        }

        return array_filter($data);

        // $provider = $this->session->userdata('hospital_id');
        // $this->db->where('doctor', $id);
        // $this->db->where('type_id', $type);
        // $this->db->order_by('id','desc');
        // $query = $this->db->get('custom_form');
        // return $query->result();
    }

    function getCustomFormByType($type) {
        $this->db->where('type_id', $type);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('custom_form');
        return $query->result();
    }

    function getPatientCustomFormByType($type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->where('type_id', $type);
            $this->db->where('patient', $patient->id);
            $this->db->order_by('id', 'desc');
            $data[] = $this->db->get('custom_form')->row();
        }

        return array_filter($data);
    }

    function getCustomFormByLimitBySearchByDoctorIdByType($limit, $start, $search, $id, $type) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('custom_form')
                ->where('doctor', $id)
                ->where('type_id', $type)
                ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientCustomFormByLimitBySearchByDoctorIdByType($limit, $start, $search, $id, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->order_by('id', 'desc');
            $this->db->limit($limit, $start);
            $data[] = $this->db->select('*')
                    ->from('custom_form')
                    ->where('type_id', $type)
                    ->where('doctor', $id)
                    ->where('patient', $patient->id)
                    ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get()->row();
        }

        return array_filter($data);

        // $this->db->order_by('id', 'desc');
        // $this->db->limit($limit, $start);
        // $query = $this->db->select('*')
        //         ->from('custom_form')
        //         ->where('doctor', $id)
        //         ->where('type_id', $type)
        //         ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
        //         ->get();
        // ;
        // return $query->result();
    }

    function getCustomFormByLimitBySearchByType($limit, $start, $search, $type) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')
                ->from('custom_form')
                ->where('type_id', $type)
                ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        ;
        return $query->result();
    }

    function getPatientCustomFormByLimitBySearchByType($limit, $start, $search, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->order_by('id', 'desc');
            $this->db->limit($limit, $start);
            $data[] = $this->db->select('*')
                    ->from('custom_form')
                    ->where('type_id', $type)
                    ->where('patient', $patient->id)
                    ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get()->row();
        }

        return array_filter($data);

        // $this->db->order_by('id', 'desc');
        // $this->db->limit($limit, $start);
        // $query = $this->db->select('*')
        //         ->from('custom_form')
        //         ->where('type_id', $type)
        //         ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
        //         ->get();
        // ;
        // return $query->result();
    }

    function getCustomFormByLimitByDoctorIdByType($limit, $start, $id, $type) {
        $this->db->where('doctor', $id);
        $this->db->where('type_id', $type);
        $this->db->order_by('id','desc');
        $query = $this->db->get('custom_form');
        return $query->result();
    }

    function getPatientCustomFormByLimitByDoctorIdByType($limit, $start, $id, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->where('doctor', $id);
            $this->db->where('type_id', $type);
            $this->db->where('patient', $patient->id);
            $this->db->order_by('id', 'desc');
            $this->db->limit($limit, $start);
            $data[] = $this->db->get('custom_form')->row();
        }

        return array_filter($data);

        // $this->db->where('doctor', $id);
        // $this->db->where('type_id', $type);
        // $this->db->order_by('id','desc');
        // $query = $this->db->get('custom_form');
        // return $query->result();
    }

    function getCustomFormByLimitByType($limit, $start, $type) {
        $this->db->where('type_id', $type);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('custom_form');
        return $query->result();
    }

    function getPatientCustomFormByLimitByType($limit, $start, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $this->db->where('type_id', $type);
            $this->db->where('patient', $patient->id);
            $this->db->order_by('id', 'desc');
            $this->db->limit($limit, $start);
            $data[] = $this->db->get('custom_form')->row();
        }

        return array_filter($data);
    }

    function getCustomByTypeCount($type, $doctor_id = null) {
        // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            if (!empty($doctor_id)) {
                $this->db->where('doctor', $doctor_id);
            }
            $this->db->where('type_id', $type);
            $this->db->where('patient', $patient->id);
            $this->db->order_by('id', 'desc');
            $data[] = $this->db->get('custom_form')->row();
        }

        $filter_data = array_filter($data);

        $count_data = count($filter_data);

        return $count_data;

        // $this->db->where('type_id', $type);
        // $this->db->order_by('id', 'desc');
        // $query = $this->db->get('custom_form');
        // return $query->num_rows();
    }

    function getCustomFormBySearchByTypeCount($search, $type) {
        $this->db->select('id');
        $patients = $this->db->get('patient')->result();

        $data = array();
        foreach($patients as $patient) {
            $data[] = $this->db->select('id')
                ->from('custom_form')
                ->where('type_id', $type)
                ->where('patient', $patient->id)
                ->where("(id LIKE '%" . $search . "%' OR patient LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%')", NULL, FALSE)
                ->get()->row();
        }

        $filter_data = array_filter($data);

        $count_data = count($filter_data);

        return $count_data;
    }

}
