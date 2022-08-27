<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prescription extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('prescription_model');
        $this->load->model('medicine/medicine_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('location/location_model');
        $this->load->model('branch/branch_model');
        $this->load->model('specialty/specialty_model');
        $this->load->model('encounter/encounter_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Pharmacist', 'Doctor', 'Patient', 'Nurse', 'Receptionist'))) {
            redirect('home/permission');
        }
    }

    public function index() {

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $current_user = $this->ion_auth->get_user_id();
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
        }
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctorId($doctor_id);
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('prescriptionv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    function all() {

        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'Pharmacist', 'Nurse', 'Receptionist'))) {
            redirect('home/permission');
        }

        $data['medicines'] = $this->medicine_model->getMedicine();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescription();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('all_prescriptionv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addPrescriptionView() {
        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }

        $data = array();

        $id = $this->input->get('id');
        $encounter_id = $this->input->get('encounter_id');
        $data['patient_id'] = $this->input->get('patient_id');
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        if (!empty($root) && !empty($method)) {
            $data['redirect'] = $root.'/'.$method;
        }

        if (!empty($id)) {
            $data['id'] = $id;
        }

        if (!empty($encounter_id)) {
            $data['encounter_id'] = $encounter_id;
            $data['patient_id'] = $this->encounter_model->getEncounterById($data['encounter_id'])->patient_id;
            $data['encounter'] = $this->encounter_model->getEncounterById($data['encounter_id']);
            $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
        }
        $data['patient_details'] = $this->patient_model->getPatientByPatientNumber($data['patient_id']);
        $data['medicines'] = $this->medicine_model->getMedicine();
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();

        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboardv2', $data); // just the header file
        $this->load->view('add_new_prescription_viewv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNewPrescription() {

        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }

        $redirect = $this->input->post('redirect');
        $medical_redirect = $this->input->post('medical_history_redirect');
        $encounter_id = $this->input->post('encounter_id');

        $id = $this->input->post('id');
        $tab = $this->input->post('tab');
        $date = $this->input->post('date');
        // if (!empty($date)) {
        //     if(empty($id)) {
        //         $time = date('H:i:s');
        //         $date = $date .' '. $time;
        //     }
        //     $date = strtotime($date);
        //     $date = gmdate('Y-m-d H:i:s', $date);
        // }
        $date = gmdate('Y-m-d H:i:s', strtotime($date));

        if (empty($encounter_id)) {
            $encounter_id = null;
        }

        $patient = $this->input->post('patient');
        $patient_details = $this->patient_model->getPatientById($patient);
        $doctor = $this->input->post('doctor');
        $medicine = $this->input->post('meds');
        $category = $this->input->post('category');
        $dosage = $this->input->post('dosage');
        $frequency = $this->input->post('frequency');
        $days = $this->input->post('days');
        $instruction = $this->input->post('instruction');
        $quantity = $this->input->post('qty');
        $uses = $this->input->post('uses');
        $form = $this->input->post('form');
        $admin = $this->input->post('admin');

        $report = array();

        if (!empty($medicine)) {
            foreach ($medicine as $key => $value) {
                $report[$value] = array(
                    'form' => $form[$key],
                    'qty' => $quantity[$key],
                    'instruction' => $instruction[$key],
                    'uses' => $uses[$key],
                );

                // }
            }

            foreach ($report as $key1 => $value1) {
                $final[] = $key1 . '***' . implode('***', $value1);
            }

            $final_report = implode('###', $final);
        } else {
            $final_report = '';
        }

        if (!empty($medical_redirect)) {
            $redirect = $medical_redirect . '?encounter_id=' . $encounter_id;
        }

        do {
            $raw_prescription_number = 'P'.random_string('alnum', 6);
            $validate_number = $this->prescription_model->validatePrescriptionNumber($raw_prescription_number);
        } while($validate_number != 0);

        $prescription_number = strtoupper($raw_prescription_number);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Date Field
        $this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Patient Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Doctor Field
        $this->form_validation->set_rules('doctor', 'Doctor', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Advice Field
        $this->form_validation->set_rules('symptom', 'History', 'trim|min_length[1]|max_length[1000]|xss_clean');
        // Validating Do And Dont Name Field
        $this->form_validation->set_rules('laboratory', 'Laboratory', 'trim|min_length[1]|max_length[2000]|xss_clean');

        // Validating Medicine Category
        $this->form_validation->set_rules('category', 'Medicine', 'trim|required|max_length[1000]|xss_clean');

        // Validating Advice Field
        $this->form_validation->set_rules('advice', 'Advice', 'trim|min_length[1]|max_length[1000]|xss_clean');

        // Validating Validity Field
        $this->form_validation->set_rules('validity', 'Validity', 'trim|min_length[1]|max_length[100]|xss_clean');



        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                // $id = $this->input->get('id');
                // $data['patients'] = $this->patient_model->getPatient();
                // $data['doctors'] = $this->doctor_model->getDoctor();
                $data['medicines'] = $this->medicine_model->getMedicine();
                $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
                $data['settings'] = $this->settings_model->getSettings();
                $data['patients'] = $this->patient_model->getPatientById($data['prescription']->patient);
                $data['doctors'] = $this->doctor_model->getDoctorById($data['prescription']->doctor);
                if (!empty($data['prescription']->hospital_id)) {
                    if ($data['prescription']->hospital_id != $this->session->userdata('hospital_id')) {
                        $this->load->view('home/permission');
                    } else {
                        $data['settings'] = $this->settings_model->getSettings();
                        $this->load->view('home/dashboardv2', $data); // just the header file
                        $this->load->view('add_new_prescription_viewv2', $data);
                        // $this->load->view('home/footer'); // just the footer file 
                    }
                } else {
                    $this->load->view('home/permission');
                }
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['setval'] = 'setval';
                $data['medicines'] = $this->medicine_model->getMedicine();
                $data['patients'] = $this->patient_model->getPatient();
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboardv2', $data); // just the header file
                $this->load->view('add_new_prescription_viewv2', $data);
                // $this->load->view('home/footer'); // just the header file
            }
        } else {
            $data = array();
            $patientname = $this->patient_model->getPatientById($patient)->name;
            $doctorname = $this->doctor_model->getDoctorById($doctor)->name;
            if (empty($id)) {
                $data = array('prescription_date' => $date,
                    'patient' => $patient,
                    'doctor' => $doctor,
                    'medicine' => $final_report,
                    'patientname' => $patientname,
                    'doctorname' => $doctorname,
                    'encounter_id' => $encounter_id,
                    'prescription_number' => $prescription_number,
                );
                if ($this->prescription_model->insertPrescription($data)) {
                    $this->session->set_flashdata('success', lang('record_added'));    
                } else {
                    $this->session->set_flashdata('error', lang('error_adding_record'));    
                }
                
            } else {
                $data = array('prescription_date' => $date,
                    'patient' => $patient,
                    'doctor' => $doctor,
                    'medicine' => $final_report,
                    'patientname' => $patientname,
                    'doctorname' => $doctorname,
                    'encounter_id' => $encounter_id,
                );
                if ($this->prescription_model->updatePrescription($id, $data)) {
                    $this->session->set_flashdata('success', lang('record_updated'));    
                } else {
                    $this->session->set_flashdata('error', lang('error_updating_record'));  
                }
                
            }

            if (!empty($admin)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    if (!empty($redirect)) {
                        redirect($redirect);
                    } else {
                        redirect('prescription');
                    }
                } else {
                    if (!empty($redirect)) {
                        redirect($redirect);
                    } else {
                        redirect('prescription/all');
                    }
                }
            } else {
                if (!empty($redirect)) {
                    redirect($redirect);
                } else {
                    redirect('prescription');
                }
            }
        }
    }

    function viewPrescription() {

        $prescription_number = $this->input->get('id');
        $id = $this->prescription_model->getPrescriptionByPrescriptionNumber($prescription_number)->id;
        $data['settings'] = $this->settings_model->getSettings();
        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['prescription']->doctor);
        $data['patient'] = $this->patient_model->getPatientById($data['prescription']->patient);
        $data['signature'] = $this->doctor_model->getUserSignatureByUserId($data['doctor']->ion_user_id);
        $specializations = explode(',', $data['doctor']->specialties);
        $limit = 4;
        $data['branches'] = $this->branch_model->getBranchesByLimit($limit);
        foreach ($specializations as $specialization) {
            $specialties = $this->specialty_model->getSpecialtyById($specialization)->display_name_ph;
            $specialty[] = $specialties;
        }
        $data['spec'] = implode(', ', $specialty);
        // $data['specification'] = $this->doctor->getSpecialtyListArray($data['doctor']->specialties);

        if ($this->ion_auth->in_group(array('Patient'))) {
            $current_patient = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($current_patient)->id;
            //if patient logged in isn't the owner of the invoice being viewed, then prohibit him from viewing invoice
            if ($patient_id != $data['prescription']->patient) {
                redirect('home/permission');
            }

        }

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $current_doctor = $this->ion_auth->get_user_id();
            $doctor_id = $this->doctor_model->getDoctorByIonUserId($current_doctor)->id;
            //if patient logged in isn't the owner of the invoice being viewed, then prohibit him from viewing invoice
            if ($doctor_id !== $data['prescription']->doctor) {
                redirect('home/permission');
            }

        }



        if (!empty($data['prescription']->hospital_id)) {
            if ($data['prescription']->hospital_id != $this->session->userdata('hospital_id')) {
                $this->load->view('home/permission');
            } else {
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboardv2', $data); // just the header file
                $this->load->view('prescription_view_1v2', $data);
                //$this->load->view('home/footerv2'); // just the header file
            }
        } else {
            $this->load->view('home/permission');
        }
    }

    function viewPrescriptionPrint() {
        $prescription_number = $this->input->get('id');
        $id = $this->prescription_model->getPrescriptionByPrescriptionNumber($prescription_number)->id;
        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);

        if ($this->ion_auth->in_group(array('Patient'))) {
            $current_patient = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($current_patient)->id;
            //if patient logged in isn't the owner of the invoice being viewed, then prohibit him from viewing invoice
            if ($patient_id != $data['prescription']->patient) {
                redirect('home/permission');
            }
        }

        if (!empty($data['prescription']->hospital_id)) {
            if ($data['prescription']->hospital_id != $this->session->userdata('hospital_id')) {
                $this->load->view('home/permission');
            } else {
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboardv3', $data); // just the header file
                $this->load->view('prescription_view_printv2', $data);
                //$this->load->view('home/footer'); // just the header file
            }
        } else {
            $this->load->view('home/permission');
        }
    }

    function editPrescription() {
        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }

        $data = array();
        $data['prescription_number'] = $this->input->get('id');
        $id = $this->prescription_model->getPrescriptionByPrescriptionNumber($data['prescription_number'])->id;
        // $data['patients'] = $this->patient_model->getPatient();
        // $data['doctors'] = $this->doctor_model->getDoctor();
        $data['encounter_id'] = $this->input->get('encounter_id');
        $data['medicines'] = $this->medicine_model->getMedicine();
        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
        $data['prescription_date'] = $data['prescription']->prescription_date;
        $data['settings'] = $this->settings_model->getSettings();
        $data['patient'] = $this->patient_model->getPatientById($data['prescription']->patient);
        $data['doctors'] = $this->doctor_model->getDoctorById($data['prescription']->doctor);
        $root = $this->input->get('root');
        $method = $this->input->get('method');
        if (!empty($root) && !empty($method)) {
            $data['redirect'] = $root.'/'.$method;
        }
        if (!empty($data['prescription']->encounter_id)) {
            /*$data['patient_id'] = $this->encounter_model->getEncounterById($data['encounter_id'])->patient_id;*/
            $data['encounter'] = $this->encounter_model->getEncounterById($data['encounter_id']);
            $data['encouter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
        }

        if (!empty($data['prescription']->hospital_id)) {
            if ($data['prescription']->hospital_id != $this->session->userdata('hospital_id')) {
                $this->load->view('home/permission');
            } else {
                $data['settings'] = $this->settings_model->getSettings();
                $this->load->view('home/dashboardv2', $data); // just the header file
                $this->load->view('add_new_prescription_viewv2', $data);
                // $this->load->view('home/footer'); // just the footer file 
            }
        } else {
            $this->load->view('home/permission');
        }
    }

    function editPrescriptionByJason() {
        $id = $this->input->get('id');

        $data['patients'] = $this->patient_model->getPatientByVisitedProviderId();

        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
        
        echo json_encode($data);
    }

    function getPrescriptionByPatientIdByJason() {
        $id = $this->input->get('id');
        $prescriptions = $this->prescription_model->getPrescriptionByPatientId($id);
        foreach ($prescriptions as $prescription) {
            $lists[] = ' <div class="pull-left prescription_box" style = "padding: 10px; background: #fff;"><div class="prescription_box_title">Prescription Date</div> <div>' . date('d-m-Y', strtotime($prescription->date)) . '</div> <div class="prescription_box_title">Medicine</div> <div>' . $prescription->medicine . '</div> </div> ';
        }
        $data['prescription'] = $lists;
        $lists = NULL;
        echo json_encode($data);
    }

    function delete() {
        if (!$this->ion_auth->in_group(array('Doctor'))) {
            redirect('home/permission');
        }

        $id = $this->input->get('id');
        $admin = $this->input->get('admin');
        $patient = $this->input->get('patient');
        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
        if (!empty($data['prescription']->hospital_id)) {
            if ($data['prescription']->hospital_id != $this->session->userdata('hospital_id')) {
                $this->load->view('home/permission');
            } else {
                
                if ($this->prescription_model->deletePrescription($id)) {
                    $this->session->set_flashdata('success', lang('record_deleted'));    
                } else {
                    $this->session->set_flashdata('success', lang('error_deleting_record'));
                }
                
                if (!empty($patient)) {
                    redirect('patient/caseHistory?patient_id=' . $patient);
                } elseif (!empty($admin)) {
                    redirect('prescription/all');
                } else {
                    redirect('prescription');
                }
            }
        } else {
            $this->load->view('home/permission');
        }
    }

    public function prescriptionCategory() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['categories'] = $this->prescription_model->getPrescriptionCategory();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('prescription_category', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addCategoryView() {
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('add_new_category_view');
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewCategory() {
        $id = $this->input->post('id');
        $category = $this->input->post('category');
        $description = $this->input->post('description');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Category Name Field
        $this->form_validation->set_rules('category', 'Category', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Description Field
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/dashboard', $data); // just the header file
            $this->load->view('add_new_category_view');
            $this->load->view('home/footer'); // just the header file
        } else {
            $data = array();
            $data = array('category' => $category,
                'description' => $description
            );
            if (empty($id)) {
                $this->prescription_model->insertPrescriptionCategory($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else {
                $this->prescription_model->updatePrescriptionCategory($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            redirect('prescription/prescriptionCategory');
        }
    }

    function edit_category() {
        $data = array();
        $id = $this->input->get('id');
        $data['prescription'] = $this->prescription_model->getPrescriptionCategoryById($id);
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('add_new_category_view', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editPrescriptionCategoryByJason() {
        $id = $this->input->get('id');
        $data['prescriptioncategory'] = $this->prescription_model->getPrescriptionCategoryById($id);
        echo json_encode($data);
    }

    function deletePrescriptionCategory() {
        $id = $this->input->get('id');
        $this->prescription_model->deletePrescriptionCategory($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('prescription/prescriptionCategory');
    }

    function getPrescriptionListByDoctor() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $doctor_ion_id = $this->ion_auth->get_user_id();
        $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
        if ($limit == -1) {
            if (!empty($search)) {
                $data['prescriptions'] = $this->prescription_model->getPrescriptionBysearchByDoctor($doctor, $search);
            } else {
                $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctor($doctor);
            }
        } else {
            if (!empty($search)) {
                $data['prescriptions'] = $this->prescription_model->getPrescriptionByLimitBySearchByDoctor($doctor, $limit, $start, $search);
            } else {
                $data['prescriptions'] = $this->prescription_model->getPrescriptionByLimitByDoctor($doctor, $limit, $start);
            }
        }


        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        $option1 = '';
        $option2 = '';
        $option3 = '';
        foreach ($data['prescriptions'] as $prescription) {
            //$i = $i + 1;
            $settings = $this->settings_model->getSettings();

            $option1 = '<a class="btn btn-info btn-xs btn_width" href="prescription/viewPrescription?id=' . $prescription->prescription_number . '"><i class="fa fa-eye"></i>' .' '. lang('view') .  ' </a>';
            $option3 = '<a class="btn btn-info btn-xs btn_width" href="prescription/editPrescription?id=' . $prescription->prescription_number . '" data-id="' . $prescription->id . '"><i class="fa fa-edit"></i> ' . ' ' .lang('edit') . ' ' . '</a>';

            if ($this->ion_auth->in_group(array('Doctor'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="prescription/delete?id=' . $prescription->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }

            $options4 = '<a class="btn btn-info btn-xs" title="' . lang('print') . '" style="color: #fff;" href="prescription/viewPrescriptionPrint?id=' . $prescription->prescription_number . '"target="_blank"> <i class="fa fa-print"></i> ' . lang('print') . '</a>';

            if (!empty($prescription->medicine)) {
                $medicine = explode('###', $prescription->medicine);
                $medicinelist = '';
                foreach ($medicine as $key => $value) {
                    $medicine_id = explode('***', $value);
                    $medicine_name_with_dosage = $this->medicine_model->getMedicineById($medicine_id[0])->name . ' -' . $medicine_id[1];
                    $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                    rtrim($medicine_name_with_dosage, ',');
                    $medicinelist .= '<p>' . $medicine_name_with_dosage . '</p>';
                }
            } else {
                $medicinelist = '';
            }
            $patientdetails = $this->patient_model->getPatientById($prescription->patient);
            if (!empty($patientdetails)) {
                $patientname = $patientdetails->name;
            } else {
                $patientname = $prescription->patientname;
            }
            $info[] = array(
                date('Y-m-d', strtotime($prescription->prescription_date.' UTC')),
                $prescription->prescription_number,
                $patientname,
                $this->patient_model->getPatientById($prescription->patient)->patient_id,
                $medicinelist,
                $option1 . ' ' . $option3 . ' ' . $options4 . ' ' . $option2
            );
            $i = $i + 1;
        }

        if ($data['prescriptions']) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $i,
                "recordsFiltered" => $i,
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

    function getPrescriptionList() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['prescriptions'] = $this->prescription_model->getPrescriptionBysearch($search);
            } else {
                $data['prescriptions'] = $this->prescription_model->getPrescription();
            }
        } else {
            if (!empty($search)) {
                $data['prescriptions'] = $this->prescription_model->getPrescriptionByLimitBySearch($limit, $start, $search);
            } else {
                $data['prescriptions'] = $this->prescription_model->getPrescriptionByLimit($limit, $start);
            }
        }


        //  $data['patients'] = $this->patient_model->getVisitor();
        $i = 0;
        $option1 = '';
        $option2 = '';
        $option3 = '';
        foreach ($data['prescriptions'] as $prescription) {
            //$i = $i + 1;
            $settings = $this->settings_model->getSettings();

            $option1 = '<a title="' . lang('view') . ' " class="btn btn-info btn-xs" href="prescription/viewPrescription?id=' . $prescription->prescription_number . '"><i class="fa fa-eye"></i> ' . lang('view') . ' </a>';

            if ($this->ion_auth->in_group(array('Doctor'))) {
                $option3 = '<a class="btn btn-info btn-xs" href="prescription/editPrescription?id=' . $prescription->prescription_number . '" data-id="' . $prescription->prescription_number . '"><i class="fa fa-edit"></i> ' . lang('edit') . ' </a>';    
            }

            if ($this->ion_auth->in_group(array('admin'))) {
                $option2 = '<a class="btn btn-danger btn-xs" href="prescription/delete?id=' . $prescription->id . '&admin=' . $prescription->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i></a>';
            }
            
            
            $options4 = '<a class="btn btn-info btn-xs" title="' . lang('print') . '" style="color: #fff;" href="prescription/viewPrescriptionPrint?id=' . $prescription->prescription_number . '&print=Yes' . '"target="_blank"> <i class="fa fa-print"></i> ' . lang('print') . '</a>';

            if (!empty($prescription->medicine)) {
                $medicine = explode('###', $prescription->medicine);
                $medicinelist = '';
                foreach ($medicine as $key => $value) {
                    $medicine_id = explode('***', $value);
                    $medicine_name_with_dosage = $this->medicine_model->getMedicineById($medicine_id[0])->name . ' -' . $medicine_id[1];
                    $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                    rtrim($medicine_name_with_dosage, ',');
                    $medicinelist .= '<p>' . $medicine_name_with_dosage . '</p>';
                }
            } else {
                $medicinelist = '';
            }
            $patientdetails = $this->patient_model->getPatientById($prescription->patient);
            if (!empty($patientdetails)) {
                $patientname = $patientdetails->name;
            } else {
                $patientname = $prescription->patientname;
            }
            $doctordetails = $this->doctor_model->getDoctorById($prescription->doctor);
            if (!empty($doctordetails)) {
                $doctorname = $doctordetails->name;
            } else {
                $doctorname = $prescription->doctorname;
            }

            if ($this->ion_auth->in_group(array('Pharmacist', 'Receptionist', 'Nurse'))) {
                $option2 = '';
                $option3 = '';
            }

            $info[] = array(
                $prescription->prescription_number,
                date('Y-m-d', strtotime($prescription->prescription_date.' UTC')),
                $doctorname,
                $patientname,
                $medicinelist,
                $option1 . ' ' . $option3 . ' ' . $options4 . ' ' . $option2
            );
            $i = $i + 1;
        }

        if ($data['prescriptions']) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->prescription_model->getPrescriptionCount(),
                "recordsFiltered" => $this->prescription_model->getPrescriptionBySearchCount($search),
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

    public function getEncounterByPatientIdJason() {
        $patient_id = $this->input->get('id');

        $patient = $this->patient_model->getPatientById($patient_id);

        $data['encounter'] = $this->encounter_model->getEncounterByPatientIdForDropdown($patient->id);

        echo json_encode($data);
    }

}

/* End of file prescription.php */
/* Location: ./application/modules/prescription/controllers/prescription.php */
