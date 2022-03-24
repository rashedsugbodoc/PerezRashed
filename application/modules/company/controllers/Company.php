<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('company_model');

        $this->load->model('department/department_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('patient/patient_model');
        $this->load->model('prescription/prescription_model');
        $this->load->model('schedule/schedule_model');
        $this->load->module('patient');
        $this->load->module('sms');
        if (!$this->ion_auth->in_group(array('admin','CompanyUser','Accountant','Doctor'))) {
            redirect('home/permission');
        }
    }

    public function index() {

        $data['companies'] = $this->company_model->getCompany();
        $data['types'] = $this->company_model->getCompanyType();
        $data['classifications'] = $this->company_model->getCompanyClassification();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('company', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $data = array();
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $id = $this->input->post('id');
        
        
        
        $name = $this->input->post('name');
        $display_name = $this->input->post('display_name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $type_id = $this->input->post('type_id');
        $classification_id = $this->input->post('classification_id');
        $profile = $this->input->post('profile');
        $display_name = $this->input->post('display_name');
        $registration_number = $this->input->post('registration_number');

        $emailById = $this->company_model->getCompanyById($id)->email;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Display Name Field
        $this->form_validation->set_rules('display_name', 'Display Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        if ($email !== $emailById) {
            $this->form_validation->set_rules('email', 'Email', 'trim|min_length[2]|valid_email|is_unique[company.email]|max_length[100]|xss_clean');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|min_length[2]|valid_email|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_message('is_unique',lang('this_email_address_is_already_registered'));
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        // Validating Type Field   
        $this->form_validation->set_rules('type_id', 'Company Type', 'trim|min_length[1]|max_length[500]|xss_clean');
        // Validating Classification Field   
        $this->form_validation->set_rules('classification_id', 'Company Classification', 'trim|min_length[1]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('profile', 'Profile', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('registration_number', 'Registration Number', 'trim|min_length[1]|max_length[50]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['types'] = $this->company_model->getCompanyType();
                $data['classifications'] = $this->company_model->getCompanyClassification();
                $data['company'] = $this->company_model->getCompanyById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['setval'] = 'setval';
                $data['types'] = $this->company_model->getCompanyType();
                $data['classifications'] = $this->company_model->getCompanyClassification();
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False,
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'profile' => $profile,
                    'display_name' => $display_name,
                    'type_id' => $type_id,
                    'classification_id' => $classification_id,
                    'registration_number' => $registration_number
                );
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'profile' => $profile,
                    'display_name' => $display_name,
                    'type_id' => $type_id,
                    'classification_id' => $classification_id,
                    'registration_number' => $registration_number
                );
            }
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New Company
                $this->company_model->insertCompany($data);

                //sms
                $set['settings'] = $this->settings_model->getSettings();
                $autosms = $this->sms_model->getAutoSmsByType('doctor');
                $message = $autosms->message;
                $to = $phone;
                $name1 = explode(' ', $name);
                if (!isset($name1[1])) {
                    $name1[1] = null;
                }
                $data1 = array(
                    'firstname' => $name1[0],
                    'lastname' => $name1[1],
                    'name' => $name,
                    'display_name' => $display_name,
                    'email' => $email,
                    'address' => $address,
                    'profile' => $profile,
                    'type_id' => $type_id,
                    'classification_id' => $classification_id,
                    'registration_number' => $registration_number,
                    'company' => $set['settings']->system_vendor,
                    'hospital_name' => $set['settings']->title,
                    'hospital_contact' => $set['settings']->phone
                );

                if ($autosms->status == 'Active') {
                    $messageprint = $this->parser->parse_string($message, $data1);
                    $data2[] = array($to => $messageprint);
                    $this->sms->sendSms($to, $message, $data2);
                }
                //end
                //email

                $autoemail = $this->email_model->getAutoEmailByType('doctor');
                if ($autoemail->status == 'Active') {
                    $emailSettings = $this->email_model->getEmailSettings();
                    $message1 = $autoemail->message;
                    $messageprint1 = $this->parser->parse_string($message1, $data1);
                    $this->email->from($emailSettings->admin_email, $emailSettings->admin_email_display_name);
                    $this->email->to($email);
                    $this->email->subject(lang('welcome_to').$set['settings']->title);
                    $this->email->message($messageprint1);
                    $this->email->send();
                }

                //end


                $this->session->set_flashdata('success', lang('record_added'));
                
            } else { // Updating Company
                $this->company_model->updateCompany($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
            }
            // Loading View
            redirect('company');
        }
    }

    function editCompany() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $data = array();
        $data['types'] = $this->company_model->getCompanyType();
        $data['classifications'] = $this->company_model->getCompanyClassification();
        $id = $this->input->get('id');
        $data['company'] = $this->company_model->getCompanyById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function details() {

        $data = array();

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $id = $this->doctor_model->getDoctorByIonUserId($doctor_ion_id)->id;
        } else {
            redirect('home');
        }


        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $data['todays_appointments'] = $this->appointment_model->getAppointmentByDoctorByToday($id);
        $data['appointments'] = $this->appointment_model->getAppointmentByDoctor($id);
        $data['patients'] = $this->patient_model->getPatient();
        $data['appointment_patients'] = $this->patient->getPatientByAppointmentByDctorId($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctorId($id);
        $data['holidays'] = $this->schedule_model->getHolidaysByDoctor($id);
        $data['schedules'] = $this->schedule_model->getScheduleByDoctor($id, $location);



        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editCompanyByJason() {

        $id = $this->input->get('id');
        $data['company'] = $this->company_model->getCompanyById($id);
        $data['types'] = $this->company_model->getCompanyType();
        $data['classifications'] = $this->company_model->getCompanyClassification();
        $data['typename'] = $this->company_model->getCompanyTypeById($data['company']->type_id)->name;
        $data['classificationname'] = $this->company_model->getCompanyClassificationById($data['company']->classification_id)->name;

        echo json_encode($data);
    }

    function delete() {

        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }

        $data = array();
        $id = $this->input->get('id');
        $company_data = $this->db->get_where('company', array('id' => $id))->row();
        $path = $company_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }

        $this->company_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('company');
    }

    function getCompany() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['companies'] = $this->company_model->getCompanyBySearch($search);
            } else {
                $data['companies'] = $this->company_model->getCompany();
            }
        } else {
            if (!empty($search)) {
                $data['companies'] = $this->company_model->getCompanyByLimitBySearch($limit, $start, $search);
            } else {
                $data['companies'] = $this->company_model->getCompanyByLimit($limit, $start);
            }
        }
        //  $data['companies'] = $this->company_model->getCompany();

        foreach ($data['companies'] as $company) {
            if ($this->ion_auth->in_group(array('admin'))) {
                $options1 = '<a type="button" class="btn btn-info btn-xs btn_width editbutton" title="' . lang('edit') . '" data-toggle="modal" data-id="' . $company->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
                
            }
            $options2 = '<a class="btn btn-info btn-xs" title="' . lang('account_reports') . '"  href="finance/allAccountActivityReport?account=' . $company->id . '"> <i class="fa fa-calendar"> </i> ' . lang('account_reports') . '</a>';
            if ($this->ion_auth->in_group(array('admin'))) {
                $options3 = '<a class="btn btn-danger btn-xs btn_width delete_button" title="' . lang('delete') . '" href="company/delete?id=' . $company->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
            }



            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options4 = '<a href="schedule/holidays?company=' . $company->id . '" class="btn btn-info btn-xs" data-toggle="modal" data-id="' . $company->id . '"><i class="fa fa-book"></i> ' . lang('holiday') . '</a>';
                $options5 = '<a href="schedule/timeSchedule?company=' . $company->id . '" class="btn btn-info btn-xs" data-toggle="modal" data-id="' . $company->id . '"><i class="fa fa-book"></i> ' . lang('time_schedule') . '</a>';
            }

            $options6 = '<a type="button" class="btn btn-info btn-xs btn_width inffo" title="' . lang('info') . '" data-toggle="modal" data-id="' . $company->id . '"><i class="fa fa-info"> </i> ' . lang('info') . '</a>';


            $typename = $this->company_model->getCompanyTypeById($company->type_id)->name;
            $classificationname = $this->company_model->getCompanyClassificationById($company->classification_id)->name;

            $info[] = array(
                $company->id,
                $company->name,
                $company->display_name,                
                $company->email,
                $company->phone,
                $typename,
                $classificationname,
                $company->profile,
                //  $options1 . ' ' . $options2 . ' ' . $options3,
                '<div class="btn-list">' . $options6 . ' ' . $options1 . ' ' . $options2 . ' '  . $options3 . '</div>',
                    //  $options2
            );
        }

        if (!empty($data['companies'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->company_model->getCompanyCount(),
                "recordsFiltered" => $this->company_model->getCompanyBySearchCount($search),
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

    public function getCompanyInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->company_model->getCompanyInfo($searchTerm);

        echo json_encode($response);
    }

    public function getCompanyWithoutAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->company_model->getCompanyWithoutAddNewOption($searchTerm);

        echo json_encode($response);
    }

}

/* End of file company.php */
/* Location: ./application/modules/company/controllers/company.php */