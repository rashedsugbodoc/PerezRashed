<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customform extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('customform_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('location/location_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Doctor'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        // $data['fpi'] = random_string('alnum', 8);
        $data['civil_status'] = $this->patient_model->getCivilStatus();
        $data['customform_types'] = $this->customform_model->getCustomFormType();
        $this->load->view('home/dashboardv2');
        $this->load->view('customform', $data);
    }

    public function addNewView() {
        $data['fpi'] = random_string('alnum', 8);
        $data['civil_status'] = $this->patient_model->getCivilStatus();
        $data['safe_water_supply'] = $this->patient_model->getSafeWaterSupply();
        $data['unmet_need'] = $this->patient_model->getUnmetNeed();
        $this->load->view('home/dashboardv2');
        $this->load->view('add_new', $data);
    }

    public function addNewTsekap() {
        $data['civil_status'] = $this->patient_model->getCivilStatus();
        $data['safe_water_supply'] = $this->patient_model->getSafeWaterSupply();
        $data['unmet_need'] = $this->patient_model->getUnmetNeed();
        $form_type = $this->input->get('type');
        $this->load->view('home/dashboardv2');
        $this->load->view($form_type, $data);
    }

    public function addNew() {
        $patient = $this->input->post('patient');
        $family_profile_id = $this->input->post('family_profile_id');
        $is_family_head = $this->input->post('family_head_radio');
        $family_head = $this->input->post('familyhead');
        $family_head_id = $this->input->post('familyhead_id');
        $family_head_relation = $this->input->post('family_head_relation');
        $philhealth = $this->input->post('philhealth');
        $nhts = $this->input->post('nhts');
        $f_name = $this->input->post('f_name');
        $m_name = $this->input->post('m_name');
        $l_name = $this->input->post('l_name');
        $suffix = $this->input->post('suffix');
        $name = $f_name . ' ' . $m_name . ' ' . $l_name . ' ' . $suffix;
        $email = $this->input->post('email');
        $phone = $this->input->post('mobile');
        $birthdate = date('Y-m-d', strtotime($this->input->post('birthdate').' UTC'));
        $address = $this->input->post('address');
        $sex = $this->input->post('sex');
        $civil_status = $this->input->post('civil_status');
        $educational_attainment = $this->input->post('educational_attainment');
        $religion = $this->input->post('religion');
        $height = $this->input->post('height');
        $heightUnit = $this->input->post('height_unit');
        $weight = $this->input->post('weight');
        $weightUnit = $this->input->post('weight_unit');
        $menarche = $this->input->post('menarche');
        if ($menarche === "1") {
            $menarche_specify = $this->input->post('specify_menarche');
        }

        if(empty($weight)) {
            $weight = null;
        } else {
            //Reading Weight Unit Start and convert
            if ($weightUnit == 'kg') {
                $weightKg = $weight;
                $weightLbs = convertkgTolbs($weightKg);
            } else if ($weightUnit == 'lbs') {
                $weightLbs = $weight;
                $weightKg = convertlbsTokg($weightLbs);
            }
            //Reading Weight Unit End
        }
        
        if(empty($weightUnit) || empty($weight)) {
            $weightUnit = null;
        }

        //Height
        $height = $this->input->post('height');
        $heightUnit = $this->input->post('height_unit');
        if(empty($height)) {
            $height = null;
        } else {
            //Reading Height Unit Start
            if ($heightUnit == 'cm') {
                $heightCm = $height;
                $heightIn = convertcmToin($heightCm);
            } else if ($heightUnit == 'inches') {
                $heightIn = $height;
                $heightCm = convertinTocm($heightIn);
            }
            //Reading Height Unit End
        }
        
        if(empty($heightUnit) || empty($height)) {
            $heightUnit = null;
        }

        if(!empty($height) && !empty($weight)) {
            $bmi = computeBmi($heightCm, $weightKg);
        } else {
            $bmi = null;
        }

        $barangay = $this->input->post('barangay');
        $safe_water_supply = $this->input->post('safe_water_supply');
        $sanitary_toilet = $this->input->post('sanitary_toilet');
        $sexually_active = $this->input->post('sexually_active');
        $unmet_need = $this->input->post('unmet_need');
        $pwd = $this->input->post('pwd');
        $deceased = $this->input->post('deceased');
        $user = $this->ion_auth->get_user_id();
        $date = gmdate('Y-m-d H:i:s');
        $custom_form_number = 'C'.strtoupper(random_string('alnum', 6));
        $patient_vitals = end($this->patient_model->getPatientVitalById($patient));

        $cancer = $this->input->post('cancer');
        $hypertension = $this->input->post('hypertension');
        $diabetes = $this->input->post('diabetes');
        $mental_health = $this->input->post('mental_health');
        $tuberculosis = $this->input->post('tuberculosis');
        $cardiovascular = $this->input->post('cardiovascular');
        $covid = $this->input->post('covid');

        $menarche = $this->input->post('menarche');
        if ($menarche === "1") {
            $menarche_specify = $this->input->post('specify_menarche');
        }
        $lmp_date = gmdate('Y-m-d H:i:s', strtotime($this->input->post('lmp_date')));
        $newborn = $this->input->post('newborn');
        $deworming = $this->input->post('deworming');
        $supplement = $this->input->post('supplement');
        $bcg = $this->input->post('bcg');
        $hepb = $this->input->post('hepb');
        $penta1 = $this->input->post('penta1');
        $penta2 = $this->input->post('penta2');
        $penta3 = $this->input->post('penta3');
        $opv1 = $this->input->post('opv1');
        $opv2 = $this->input->post('opv2');
        $opv3 = $this->input->post('opv3');
        $ipv1 = $this->input->post('ipv1');
        $ipv2 = $this->input->post('ipv2');
        $mmr1 = $this->input->post('mmr1');
        $mmr2 = $this->input->post('mmr2');

        $data_custom_form = array();
        $data_patient_vital = array();
        $data_patient = array();
        $data_medical_history = array();

        $data_custom_form = array(
            'patient' => $patient,
            'name' => $name,
            'created_user_id' => $user,
            'custom_form_date' => $date,
            'reference_number' => $custom_form_number,
            'type_id' => 1,
        );

        $data_patient_vital = array(
            'patient_id' => $patient,
            'height_in' => $heightIn,
            'weight_lbs' => $weightLbs,
            'height_cm' => $heightCm,
            'weight_kg' => $weightKg,
            'bmi' => $bmi,
            'recorded_user_id' => $user,
            'measured_at' => $date,
            'created_at' => $date,
        );

        $data_patient = array(
            'national_healthcare_id' => $philhealth,
            'nhts_id' => $nhts,
            'firstname' => $f_name,
            'middlename' => $m_name,
            'lastname' => $l_name,
            'suffix' => $suffix,
            'phone' => $phone,
            'birthdate' => $birthdate,
            'address' => $address,
            'sex' => $sex,
            'civil_status' => $civil_status,
            'educational_attainment_id' => $educational_attainment,
            'religion_id' => $religion,
            'barangay_id' => $barangay,
            'safe_water_supply_level_id' => $safe_water_supply,
            'sanitary_toilet_id' => $sanitary_toilet,
            'is_sexually_active' => $sexually_active,
            'unmet_need_id' => $unmet_need,
            'is_pwd' => $pwd,
            'is_deceased' => $deceased,
        );

        $data_medical_history = array(
            'tsekap_medication_availment_cancer_status' => $cancer,
            'tsekap_medication_availment_hypertension_status' => $hypertension,
            'tsekap_medication_availment_diabetes_status' => $diabetes,
            'tsekap_medication_availment_mentalhealth_status' => $mental_health,
            'tsekap_medication_availment_tuberculosis_status' => $tuberculosis,
            'tsekap_medication_availment_cardiovasculardisease_status' => $cardiovascular,
            'covid_status_id' => $covid,
            'is_deworming_done' => $deworming,
            'is_supplement_vitamin_a_done' => $supplement,
            'is_immunization_bcg_done' => $bcg,
            'is_immunization_hep_b_done' => $hepb,
            'is_immunization_penta1_done' => $penta1,
            'is_immunization_penta2_done' => $penta2,
            'is_immunization_penta3_done' => $penta3,
            'is_immunization_opv1_done' => $opv1,
            'is_immunization_opv2_done' => $opv2,
            'is_immunization_opv3_done' => $opv3,
            'is_immunization_ipv1_done' => $ipv1,
            'is_immunization_ipv2_done' => $ipv2,
            'is_immunization_mmr1_done' => $mmr1,
            'is_immunization_mmr2_done' => $mmr2,
            'is_newborn_screening_done' => $newborn,
            'is_menarche' => $menarche,
            'menarche_age' => $menarche_specify,
            'latest_pregnancy_last_menstrual_period' => $lmp_date,
        );

        $medical_history_id = $this->patient_model->getPatientHealthDeclarationByPatientId($patient)->id;

        $this->patient_model->updatePatient($patient, $data_patient);
        $this->customform_model->insertCustomForm($data_custom_form);
        $this->patient_model->insertPatientVital($data_patient_vital);
        $this->patient_model->updatePatientHealthDeclarationById($medical_history_id, $data_medical_history);
        $this->session->set_flashdata('success', lang('record_added'));

        redirect('customform');
    }

    public function editTsekap() {
        $data['id'] = $this->input->get('id');
        $customform_details = $this->customform_model->getCustomFormByReferenceNumber($data['id']);
        $customformtype_details = $this->customform_model->getCustomFormTypeById($customform_details->type_id);
        $data['patient'] = $this->patient_model->getPatientByIdByVisitedProviderId($customform_details->patient);
        $patient_age = getPersonAge(date('d-m-Y H:i:s', strtotime($data['patient']->birthdate.' UTC')));
        $data['patient_age_year'] = $patient_age->y;
        $data['civil_status'] = $this->patient_model->getCivilStatus();
        $data['safe_water_supply'] = $this->patient_model->getSafeWaterSupply();
        $data['unmet_need'] = $this->patient_model->getUnmetNeed();
        $this->load->view('home/dashboardv2');
        $this->load->view($customformtype_details->name, $data);
    }

    public function editTsekapByJason() {
        $id = $this->input->get('id');
        $customform_details = $this->customform_model->getCustomFormByReferenceNumber($id);
        $customformtype_details = $this->customform_model->getCustomFormTypeById($customform_details->type_id);
        $data['patient'] = $customform_details->patient;
        $data['patients'] = $this->patient_model->getPatient();

        echo json_encode($data);
    }

    public function getDiseasesInfo() {
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->customform_model->getDiseasesInfo($searchTerm);

        echo json_encode($response);
    }

    public function getCovidInfo() {
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->customform_model->getCovidInfo($searchTerm);

        echo json_encode($response);
    }

    public function getCustomFormInfoByPatient() {
        $patient_id = $this->input->get('id');

        $patientCustomForm = $this->customform_model->getCustomFormByPatientId($patient_id);

        $data['patient_details'] = $this->patient_model->getPatientById($patient_id);
        $data['family_head'] = $this->patient_model->getPatientById($data['patient_details']->family_head_patient_id)->name;
        $data['barangays'] = $this->location_model->getBarangayByCityId($data['patient_details']->city_id);
        $data['patient_bdate'] = date('F j, Y', strtotime($data['patient_details']->birthdate.' UTC'));
        $data['patient_vitals'] = end($this->patient_model->getPatientVitalById($patient_id));
        $data['educational_attainment'] = $this->patient_model->getEducationalAttainment();
        $data['religion'] = $this->patient_model->getReligion();
        $data['relation'] = $this->patient_model->getPatientRelationToHead();
        $data['sanitary_toilet'] = $this->patient_model->getSanitaryToilet();
        $data['safe_water_supply'] = $this->patient_model->getSafeWaterSupplyById($data['patient_details']->safe_water_supply_level_id);
        $data['safe_water_supply_display_name'] = $data['safe_water_supply']->display_name;
        $data['safe_water_supply_id'] = $data['safe_water_supply']->id;
        $data['safe_water_supply_description'] = $data['safe_water_supply']->description;
        $data['safe_water_supply_name'] = $data['safe_water_supply']->name;
        $data['unmet_need'] = $this->patient_model->getUnmetNeedById($data['patient_details']->unmet_need_id);
        $data['unmet_need_display_name'] = $data['unmet_need']->display_name;
        $data['unmet_need_id'] = $data['unmet_need']->id;
        $data['unmet_need_description'] = $data['unmet_need']->description;
        $data['unmet_need_name'] = $data['unmet_need']->name;
        $data['diseases'] = $this->customform_model->getDiseases();
        $data['covid_status'] = $this->customform_model->getCovidStatus();
        $data['medical_history'] = end($this->patient_model->getMedicationHistoryById($patient_id));
        $patient_age = getPersonAge(date('d-m-Y H:i:s', strtotime($data['patient_details']->birthdate.' UTC')));
        $data['patient_age_year'] = $patient_age->y;

        echo json_encode($data);
    }

    function getCustomForm() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $type = $this->input->get('type');
        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor = $this->doctor_model->getDoctorByIonUserId($this->session->userdata('user_id'))->id;
        }

        if ($limit == -1) {
            if (!empty($search)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    // $data['customforms'] = $this->customform_model->getCustomFormBySearchByDoctorIdByType($search, $doctor, $type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormBySearchByDoctorIdByType($search, $doctor, $type);
                } else {
                    // $data['customforms'] = $this->customform_model->getCustomFormBySearchByType($search, $type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormBySearchByType($search, $type);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    // $data['customforms'] = $this->customform_model->getCustomFormByDoctorIdByType($doctor, $type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormByDoctorIdByType($doctor, $type);
                } else {
                    // $data['customforms'] = $this->customform_model->getCustomFormByType($type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormByType($type);
                }
            }
        } else {
            if (!empty($search)) {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    // $data['customforms'] = $this->customform_model->getCustomFormByLimitBySearchByDoctorIdByType($limit, $start, $search, $doctor, $type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormByLimitBySearchByDoctorIdByType($limit, $start, $search, $doctor, $type);
                } else {
                    // $data['customforms'] = $this->customform_model->getCustomFormByLimitBySearchByType($limit, $start, $search, $type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormByLimitBySearchByType($limit, $start, $search, $type);
                }
            } else {
                if ($this->ion_auth->in_group(array('Doctor'))) {
                    // $data['customforms'] = $this->customform_model->getCustomFormByLimitByDoctorIdByType($limit, $start, $doctor, $type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormByLimitByDoctorIdByType($limit, $start, $doctor, $type);
                } else {
                    // $data['customforms'] = $this->customform_model->getCustomFormByLimitByType($limit, $start, $type);
                    $data['customforms'] = $this->customform_model->getPatientCustomFormByLimitByType($limit, $start, $type);
                }
                
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['customforms'] as $customform) {

            $options1 = '<a class="btn btn-info" href="customform/edit'.$this->customform_model->getCustomFormTypeById($customform->type_id)->method_name.'?id='.$customform->reference_number.'"><i class="fe fe-edit"></i></a>';

            $info[] = array(
                date('Y-m-d H:i:s', strtotime($customform->custom_form_date.' UTC')),
                $customform->reference_number,
                $this->customform_model->countCustomFormByPatient($customform->patient, $type),
                $this->patient_model->getPatientById($customform->patient)->name,
                $options1,
                    //  $options2
            );
            
        }

        if (!empty($data['customforms'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->customform_model->getCustomByTypeCount($type),
                "recordsFiltered" => $this->customform_model->getCustomFormBySearchByTypeCount($search, $type),
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

/* End of file country.php */
/* Location: ./application/modules/country/controllers/country.php */
