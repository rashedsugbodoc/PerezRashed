<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('form_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('accountant/accountant_model');
        $this->load->model('receptionist/receptionist_model');
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Nurse', 'Laboratorist', 'Doctor', 'Patient'))) {
            redirect('home/permission');
        }
    }

    public function index() {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        if ($this->ion_auth->in_group(array('Receptionist'))) {
            redirect('form/form1');
        }

        $id = $this->input->get('id');


        if (!empty($id)) {
            $form_details = $this->form_model->getFormById($id);
            if ($form_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $data['settings'] = $this->settings_model->getSettings();
        $data['forms'] = $this->form_model->getForm();

        if (!empty($id)) {
            $data['form_single'] = $this->form_model->getFormById($id);
            $data['patients'] = $this->patient_model->getPatientById($data['form_single']->patient);
            $data['doctors'] = $this->doctor_model->getDoctorById($data['form_single']->doctor);
        }

        $data['templates'] = $this->form_model->getTemplate();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->form_model->getFormCategory();


        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('form', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function form() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        $id = $this->input->get('id');

        if (!empty($id)) {
            $form_details = $this->form_model->getFormById($id);
            if ($form_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }
        }

        $data['templates'] = $this->form_model->getTemplate();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->form_model->getFormCategory();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();

        $data['settings'] = $this->settings_model->getSettings();
        $data['forms'] = $this->form_model->getForm();

        if (!empty($id)) {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_form_view', $data);
            $this->load->view('home/footer'); // just the header file
        } else {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('form', $data);
            $this->load->view('home/footer'); // just the header file
        }
    }

    public function form1() {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $id = $this->input->get('id');

        $data['settings'] = $this->settings_model->getSettings();
        $data['forms'] = $this->form_model->getForm();

        if (!empty($id)) {
            $data['form_single'] = $this->form_model->getFormById($id);
        }

        $data['templates'] = $this->form_model->getTemplate();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->form_model->getFormCategory();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('form_1', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addFormView() {
        $data = array();


        $id = $this->input->get('id');

        if (!empty($id)) {
            $data['form'] = $this->form_model->getFormById($id);
            $data['patients'] = $this->patient_model->getPatientById($data['form_single']->patient);
            $data['doctors'] = $this->doctor_model->getDoctorById($data['form_single']->doctor);
        }

        $data['templates'] = $this->form_model->getTemplate();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->form_model->getFormCategory();
        // $data['patients'] = $this->patient_model->getPatient();
        // $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_form_view', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addForm() {
        $id = $this->input->post('id');
        $form_name = $this->input->post('form_name');
        $report = $this->input->post('report');

        $patient = $this->input->post('patient');

        $redirect = $this->input->post('redirect');

        $p_name = $this->input->post('p_name');
        $p_email = $this->input->post('p_email');
        if (empty($p_email)) {
            $p_email = $p_name . '-' . rand(1, 1000) . '-' . $p_name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($p_name)) {
            $password = $p_name . '-' . rand(1, 100000000);
        }
        $p_phone = $this->input->post('p_phone');
        $p_age = $this->input->post('p_age');
        $p_gender = $this->input->post('p_gender');
        $add_date = date('m/d/y');


        $patient_id = rand(10000, 1000000);



        $d_name = $this->input->post('d_name');
        $d_email = $this->input->post('d_email');
        if (empty($d_email)) {
            $d_email = $d_name . '-' . rand(1, 1000) . '-' . $d_name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($d_name)) {
            $password = $d_name . '-' . rand(1, 100000000);
        }
        $d_phone = $this->input->post('d_phone');

        $doctor = $this->input->post('doctor');
        $date = $this->input->post('date');
        if (!empty($date)) {
            $date = strtotime($date);
        } else {
            $date = time();
        }
        $date_string = date('d-m-y', $date);
        $discount = $this->input->post('discount');
        $amount_received = $this->input->post('amount_received');
        $user = $this->ion_auth->get_user_id();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

// Validating Category Field
// $this->form_validation->set_rules('category_amount[]', 'Category', 'min_length[1]|max_length[100]');
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Name Field
        $this->form_validation->set_rules('form_name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('report', 'Report', 'trim|required|min_length[1]|max_length[60000]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', lang('validation_error'));
            if (!empty($id)) {
                if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Nurse', 'Patient'))) {
                    $data = array();
                    $data['settings'] = $this->settings_model->getSettings();
                    $data['categories'] = $this->form_model->getFormCategory();
                    $data['patients'] = $this->patient_model->getPatient();
                    $data['doctors'] = $this->doctor_model->getDoctor();
                    $data['form'] = $this->form_model->getFormById($id);
                    $data['templates'] = $this->form_model->getTemplate();
                    $this->load->view('home/dashboard'); // just the header file
                    $this->load->view('add_form_view', $data);
                    $this->load->view('home/footer'); // just the footer file
                }
            } else {
                $data = array();
                $data['settings'] = $this->settings_model->getSettings();
                $data['categories'] = $this->form_model->getFormCategory();
                $data['patients'] = $this->patient_model->getPatient();
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['form'] = $this->form_model->getFormById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_form_view', $data);
                $this->load->view('home/footer'); // just the footer file
            }
        } else {
            if (!empty($p_name)) {

                $data_p = array(
                    'patient_id' => $patient_id,
                    'name' => $p_name,
                    'email' => $p_email,
                    'phone' => $p_phone,
                    'sex' => $p_gender,
                    'age' => $p_age,
                    'add_date' => $add_date,
                    'how_added' => 'from_pos'
                );
                $username = $this->input->post('p_name');
// Adding New Patient
                if ($this->ion_auth->email_check($p_email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                } else {
                    $dfg = 5;
                    $this->ion_auth->register($username, $password, $p_email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $p_email))->row()->id;
                    $this->patient_model->insertPatient($data_p);
                    $patient_user_id = $this->db->get_where('patient', array('email' => $p_email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->patient_model->updatePatient($patient_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                }
//    }
            }

            if (!empty($d_name)) {

                $limit = $this->doctor_model->getLimit();
                if ($limit <= 0) {
                    $this->session->set_flashdata('warning', lang('doctor_limit_exceed'));
                    redirect('doctor');
                }

                $data_d = array(
                    'name' => $d_name,
                    'email' => $d_email,
                    'phone' => $d_phone,
                );
                $username = $this->input->post('d_name');
// Adding New Patient
                if ($this->ion_auth->email_check($d_email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                } else {
                    $dfgg = 4;
                    $this->ion_auth->register($username, $password, $d_email, $dfgg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $d_email))->row()->id;
                    $this->doctor_model->insertDoctor($data_d);
                    $doctor_user_id = $this->db->get_where('doctor', array('email' => $d_email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->doctor_model->updateDoctor($doctor_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                }
            }


            if ($patient == 'add_new') {
                $patient = $patient_user_id;
            }

            if ($doctor == 'add_new') {
                $doctor = $doctor_user_id;
            }

            if (!empty($patient)) {
                $patient_details = $this->patient_model->getPatientById($patient);
                $patient_name = $patient_details->name;
                $patient_phone = $patient_details->phone;
                $patient_address = $patient_details->address;
            } else {
                $patient_name = 0;
                $patient_phone = 0;
                $patient_address = 0;
            }

            if (!empty($doctor)) {
                $doctor_details = $this->doctor_model->getDoctorById($doctor);
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = 0;
            }

            $data = array();

            if (empty($id)) {
                $data = array(
                    'name' => $form_name,
                    'report' => $report,
                    'patient' => $patient,
                    'date' => $date,
                    'doctor' => $doctor,
                    'user' => $user,
                    'patient_name' => $patient_name,
                    'patient_phone' => $patient_phone,
                    'patient_address' => $patient_address,
                    'doctor_name' => $doctor_name,
                    'date_string' => $date_string
                );


                $this->form_model->insertForm($data);
                $inserted_id = $this->db->insert_id();

                $this->session->set_flashdata('success', lang('record_added'));
                redirect($redirect);
            } else {
                $data = array(
                    'name' => $form_name,
                    'report' => $report,
                    'patient' => $patient,
                    'doctor' => $doctor,
                    'user' => $user,
                    'patient_name' => $patient_details->name,
                    'patient_phone' => $patient_details->phone,
                    'patient_address' => $patient_details->address,
                    'doctor_name' => $doctor_details->name,
                );
                $this->form_model->updateForm($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
                redirect($redirect);
            }
        }
    }

    function editForm() {
        if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Nurse', 'Patient'))) {
            $data = array();
            $data['settings'] = $this->settings_model->getSettings();
            $data['categories'] = $this->form_model->getFormCategory();
            $data['patients'] = $this->patient_model->getPatient();
            $data['doctors'] = $this->doctor_model->getDoctor();
            $id = $this->input->get('id');
            $data['form'] = $this->form_model->getFormById($id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_form_view', $data);
            $this->load->view('home/footer'); // just the footer file
        }
    }

    function delete() {
        if ($this->ion_auth->in_group(array('admin', 'Doctor'))) {
            $id = $this->input->get('id');

            $form_details = $this->form_model->getFormById($id);
            if ($form_details->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            }

            $this->form_model->deleteForm($id);
            $this->session->set_flashdata('feedback', lang('deleted'));
            redirect('form/form');
        } else {
            redirect('home/permission');
        }
    }

    public function template() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['settings'] = $this->settings_model->getSettings();
        $data['templates'] = $this->form_model->getTemplate();

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('template', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addTemplateView() {
        $data = array();
        $id = $this->input->get('id');
        if (!empty($id)) {
            $data['template'] = $this->form_model->getTemplateById($id);
        }

        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_template', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function getTemplateByIdByJason() {
        $id = $this->input->get('id');
        $data['template'] = $this->form_model->getTemplateById($id);
        echo json_encode($data);
    }

    public function addTemplate() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $template = $this->input->post('template');
        $user = $this->ion_auth->get_user_id();


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('template', 'Template', 'trim|required|min_length[1]|max_length[60000]|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Price Field
        $this->form_validation->set_rules('user', 'User', 'trim|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data['settings'] = $this->settings_model->getSettings();
                $data['templates'] = $this->form_model->getTemplate($id);

                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_template', $data);
                $this->load->view('home/footer'); // just the header file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_template', $data);
                $this->load->view('home/footer'); // just the footer file
            }
            // redirect('form/addTemplate');
        } else {
            $data = array();
            if (empty($id)) {
                $data = array(
                    'name' => $name,
                    'template' => $template,
                    'user' => $user,
                );
                $this->form_model->insertTemplate($data);
                $inserted_id = $this->db->insert_id();
                $this->session->set_flashdata('success', lang('record_added'));
                redirect("form/addTemplateView?id=" . "$inserted_id");
            } else {
                $data = array(
                    'name' => $name,
                    'template' => $template,
                    'user' => $user,
                );
                $this->form_model->updateTemplate($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
                redirect("form/addTemplateView?id=" . "$id");
            }
        }
    }

    function editTemplate() {
        if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Nurse', 'Patient'))) {
            $data = array();
            $data['settings'] = $this->settings_model->getSettings();
            $id = $this->input->get('id');
            $data['template'] = $this->form_model->getTemplateById($id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_template', $data);
            $this->load->view('home/footer'); // just the footer file
        }
    }

    function deleteTemplate() {
        $id = $this->input->get('id');
        $this->form_model->deleteTemplate($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('form/template');
    }

    public function formCategory() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['categories'] = $this->form_model->getFormCategory();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('form_category', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addFormCategoryView() {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_form_category');
        $this->load->view('home/footer'); // just the header file
    }

    public function addFormCategory() {
        $id = $this->input->post('id');
        $category = $this->input->post('category');
        $description = $this->input->post('description');
        $reference = $this->input->post('reference_value');


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
// Validating Category Name Field
        $this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[1]|max_length[100]|xss_clean');
// Validating Description Field
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Description Field
        $this->form_validation->set_rules('reference_value', 'Reference Value', 'trim|required|min_length[1]|max_length[1000]|xss_clean');
// Validating Description Field
        $this->form_validation->set_rules('type', 'Type', 'trim|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('feedback', lang('vaidation_error'));
                redirect('form/editFormCategory?id=' . $id);
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_form_category', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            $data = array();
            $data = array('category' => $category,
                'description' => $description,
                'reference_value' => $reference,
            );
            if (empty($id)) {
                $this->form_model->insertFormCategory($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else {
                $this->form_model->updateFormCategory($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            redirect('form/formCategory');
        }
    }

    function editFormCategory() {
        $data = array();
        $id = $this->input->get('id');
        $data['category'] = $this->form_model->getFormCategoryById($id);

        if (!empty($data['category']->hospital_id)) {
            if ($data['category']->hospital_id != $this->session->userdata('hospital_id')) {
                redirect('home/permission');
            } else {
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_form_category', $data);
                $this->load->view('home/footer'); // just the footer file
            }
        } else {
            redirect('home/permission');
        }
    }

    function deleteFormCategory() {
        $id = $this->input->get('id');
        $data['category'] = $this->form_model->getFormCategoryById($id);
        if ($data['category']->hospital_id != $this->session->userdata('hospital_id')) {
            redirect('home/permission');
        }
        $this->form_model->deleteFormCategory($id);
        redirect('form/formCategory');
    }

    function formView() {
        $data = array();
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['form'] = $this->form_model->getFormById($id);
        $data['patient'] = $this->patient_model->getPatientById($data['form']->patient);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['form']->doctor);
        if ($data['form']->hospital_id != $this->session->userdata('hospital_id')) {
            $this->load->view('home/permission');
        }

        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('form_viewv2', $data);
        //$this->load->view('home/footer'); // just the footer fi
    }

    function patientFormHistory() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $patient = $this->input->get('patient');
        if (empty($patient)) {
            $patient = $this->input->post('patient');
        }

        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }

        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;

        if (!empty($date_from)) {
            $data['forms'] = $this->form_model->getFormByPatientIdByDate($patient, $date_from, $date_to);
            $data['deposits'] = $this->form_model->getDepositByPatientIdByDate($patient, $date_from, $date_to);
        } else {
            $data['forms'] = $this->form_model->getFormByPatientId($patient);
            $data['pharmacy_forms'] = $this->pharmacy_model->getFormByPatientId($patient);
            $data['ot_forms'] = $this->form_model->getOtFormByPatientId($patient);
            $data['deposits'] = $this->form_model->getDepositByPatientId($patient);
        }



        $data['patient'] = $this->patient_model->getPatientByid($patient);
        $data['settings'] = $this->settings_model->getSettings();



        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('patient_deposit', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function financialReport() {
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }
        $data = array();
        $data['form_categories'] = $this->form_model->getFormCategory();
        $data['expense_categories'] = $this->form_model->getExpenseCategory();


// if(empty($date_from)&&empty($date_to)) {
//    $data['forms']=$this->form_model->get_form();
//     $data['ot_forms']=$this->form_model->get_ot_form();
//     $data['expenses']=$this->form_model->get_expense();
// }
// else{

        $data['forms'] = $this->form_model->getFormByDate($date_from, $date_to);
        $data['ot_forms'] = $this->form_model->getOtFormByDate($date_from, $date_to);
        $data['deposits'] = $this->form_model->getDepositsByDate($date_from, $date_to);
        $data['expenses'] = $this->form_model->getExpenseByDate($date_from, $date_to);
// } 
        $data['from'] = $this->input->post('date_from');
        $data['to'] = $this->input->post('date_to');
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('financial_report', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function getForm() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['forms'] = $this->form_model->getFormBysearch($search);
            } else {
                $data['forms'] = $this->form_model->getForm();
            }
        } else {
            if (!empty($search)) {
                $data['forms'] = $this->form_model->getFormByLimitBySearch($limit, $start, $search);
            } else {
                $data['forms'] = $this->form_model->getFormByLimit($limit, $start);
            }
        }
        //  $data['forms'] = $this->form_model->getForm();

        foreach ($data['forms'] as $form) {
            $date = date('d-m-y', $form->date);
            if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Doctor'))) {
                $options1 = ' <a class="btn btn-info btn-xs editbutton" title="' . lang('edit') . '" href="form?id=' . $form->id . '"><i class="fa fa-edit"> </i> ' . lang('') . '</a>';
            } else {
                $options1 = '';
            }

            $options2 = '<a class="btn btn-xs btn-info" title="' . lang('form') . '" style="color: #fff;" href="form/formView?id=' . $form->id . '"><i class="fa fa-file"></i> ' . lang('') . '</a>';

            if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) {
                $options3 = '<a class="btn btn-danger btn-xs delete_button" title="' . lang('delete') . '" href="form/delete?id=' . $form->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>' . lang('') . '</a>';
            } else {
                $options3 = '';
            }

            $doctor_info = $this->doctor_model->getDoctorById($form->doctor);
            if (!empty($doctor_info)) {
                $doctor = $doctor_info->name;
            } else {
                if (!empty($form->doctor_name)) {
                    $doctor = $form->doctor_name;
                } else {
                    $doctor = ' ';
                }
            }


            $patient_info = $this->patient_model->getPatientById($form->patient);
            if (!empty($patient_info)) {
                $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
            } else {
                $patient_details = ' ';
            }
            $info[] = array(
                $form->id,
                $form->name,
                $patient_details,
                $date,
                $options1 . ' ' . $options2 . ' ' . $options3,
                    // $options2 . ' ' . $options3
            );
        }


        if (!empty($data['forms'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->form_model->getFormCount(),
                "recordsFiltered" => $this->form_model->getFormBySearchCount($search),
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

    public function myForm() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $data['templates'] = $this->form_model->getTemplate();
        $data['settings'] = $this->settings_model->getSettings();
        $data['categories'] = $this->form_model->getFormCategory();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();

        $data['settings'] = $this->settings_model->getSettings();

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('my_form', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function getMyForm() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['forms'] = $this->form_model->getFormBysearch($search);
            } else {
                $data['forms'] = $this->form_model->getForm();
            }
        } else {
            if (!empty($search)) {
                $data['forms'] = $this->form_model->getFormByLimitBySearch($limit, $start, $search);
            } else {
                $data['forms'] = $this->form_model->getFormByLimit($limit, $start);
            }
        }

        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_user_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_user_id)->id;
        }

        foreach ($data['forms'] as $form) {
            if ($patient_id == $form->patient) {
                $date = date('d-m-y', $form->date);

                $options2 = '<a class="btn btn-xs btn-info" title="' . lang('form') . '" style="color: #fff;" href="form/formView?id=' . $form->id . '"><i class="fa fa-file"></i> ' . lang('') . '</a>';

                $doctor_info = $this->doctor_model->getDoctorById($form->doctor);
                if (!empty($doctor_info)) {
                    $doctor = $doctor_info->name;
                } else {
                    if (!empty($form->doctor_name)) {
                        $doctor = $form->doctor_name;
                    } else {
                        $doctor = ' ';
                    }
                }


                $patient_info = $this->patient_model->getPatientById($form->patient);
                if (!empty($patient_info)) {
                    $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
                } else {
                    $patient_details = ' ';
                }
                $info[] = array(
                    $form->id,
                    $patient_details,
                    $date,
                    $options2,
                        // $options2 . ' ' . $options3
                );
            }
        }


        if (!empty($data['forms'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('form')->num_rows(),
                "recordsFiltered" => $this->db->get('form')->num_rows(),
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

}

/* End of file form.php */
/* Location: ./application/modules/form/controllers/form.php */