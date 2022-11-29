<?php

use function GuzzleHttp\json_decode;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claim extends MX_Controller {
    
    const CIPHER_KEY_LEN = 32;

    function __construct() {
        parent::__construct();
        $this->load->model('claim_model');
        $this->load->model('company/company_model');
        $this->load->model('patient/patient_model');
        $this->load->model('location/location_model');
        $this->load->helper('string');
        // require APPPATH . 'modules/claim/views/PECWS.wsdl';
    }

    function index() {
        $data['company_id'] = $this->input->get('company_id');
        $data['company'] = $this->company_model->getCompanyById($data['company_id']);
        $this->load->view('home/dashboardv2');
        $this->load->view('claim', $data);
    }

    function philHealthClaimEligibilityList() {
        $country = $this->location_model->getCountryByName(COUNTRY_PHILIPPINES);
        $data['company'] = $this->company_model->getCompanyByNameByHospitalIdByApplicableCountryId(CLAIM_PHILHEALTH_NAME, null, $country->id);
        $data['company_id'] = $data['company']->id;
        $this->load->view('home/dashboardv2');
        $this->load->view('philhealth_claim_eligibility_list', $data);
    }

    public function addPhilHealthClaim() {
        $data = array();
        $country = $this->location_model->getCountryByName(COUNTRY_PHILIPPINES);
        $data['company'] = $this->company_model->getCompanyByNameByHospitalIdByApplicableCountryId(CLAIM_PHILHEALTH_NAME, null, $country->id);
        $data['company_id'] = $data['company']->id;

        $encounter_id = $this->input->get('encounter_id');
        if (!empty($encounter_id)) {
            $data['encounter_id'] = $encounter_id;
            $data['encounter'] = $this->encounter_model->getEncounterById($encounter_id);
            $data['encounter_type'] = $this->encounter_model->getEncounterTypeById($data['encounter']->encounter_type_id);
            $data['doctorr'] = $this->doctor_model->getDoctorById($data['encounter']->doctor);
            $data['patientt'] = $this->patient_model->getPatientById($data['encounter']->patient_id);
        }
        $data['patients'] = $this->patient_model->getPatient();

        
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('addnew', $data);
    }

    public function checkEligibility (){
        $patient_id = rtrim($this->input->post('patient_id'));
        $ppin = rtrim($this->input->post('p_pin'));
        $plastname = rtrim($this->input->post('p_last_name'));
        $pfirstname = rtrim($this->input->post('p_first_name'));
        $pmiddlename = rtrim($this->input->post('p_middle_name'));
        $psuffix = rtrim($this->input->post('p_suffix'));
        $pbirth_date = strtotime(rtrim(date_format(date_create($this->input->post('p_birthdate')), 'Y-m-d')));
        $pgender = rtrim($this->input->post('p_sex'));
        $paddress = rtrim($this->input->post('p_address'));
        $pzipc = rtrim($this->input->post('p_zipcode'));
        $paddmission_date =rtrim(date('m-d-Y', strtotime($this->input->post('p_admission'))));
        $pdischarge_date = rtrim(date('m-d-Y', strtotime($this->input->post('p_discharge'))));
        $p_is = rtrim($this->input->post('member'));
        $pmembership_type = rtrim($this->input->post('membership_type'));
        $ppen = rtrim($this->input->post('p_pen'));
        $pemployer_name = rtrim($this->input->post('p_employer_name'));
        $prvs_code = rtrim($this->input->post('p_rvs_code'));
        $ptotal_amount_actual = rtrim($this->input->post('p_total_hospital_bill'));
        $ptotal_amount_claimed = rtrim($this->input->post('p_total_amount_claim'));
        $pisfinal = rtrim( $this->input->post('p_is_final'));

        $another_member_pin = rtrim($this->input->post('another_mem_pin'));
        $another_member_ln = rtrim($this->input->post('another_mem_last_name'));
        $another_member_fn = rtrim( $this->input->post('another_mem_first_name'));
        $another_member_mn = rtrim($this->input->post('another_mem_middle_name'));
        $another_member_add = rtrim($this->input->post('another_mem_address'));
        $another_member_sfx = rtrim($this->input->post('another_mem_suffix'));
        $another_member_bdate = rtrim(date('m-d-Y', strtotime($this->input->post('another_mem_birthdate'))));
        $another_member_rel = rtrim($this->input->post('another_mem_relation'));

        try {
            error_reporting(E_ERROR | E_PARSE);
            $context = stream_context_create([
                'ssl' => [
                    // set some SSL/TLS specific options
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]);
            // $pecwsWsdlUrl = 'https://210.4.103.170:8077/SOAP';
            $pecws_wsdl_url = 'http://localhost:8088/mockInternalServiceBinding?WSDL';
            // $pecws_wsdl_url = 'http://localhost:8088/mockMMHRServiceBinding?WSDL';
            // libxml_disable_entity_loader(false); 

            $client = new SoapClient($pecws_wsdl_url, ['stream_context' => $context]);
            
            if($p_is === 'M'){
                $another_member_bdate = '';
                $data['encryptedOutput'] = $client->__soapCall('isClaimEligible', array(
                    "pUserName" => ":DUMMYSCERTZ09434",
                    "pUserPassword" => "",
                    "pHospitalCode" => "Z09434",
                    "pPIN" => $ppin,
                    "pMemberLastName" => $plastname,
                    "pMemberFirstName" => $pfirstname,
                    "pMemberMiddleName" => $pmiddlename,
                    "pMemberSuffix" => $psuffix,
                    "pMemberBirthDate" => date('m-d-Y',$pbirth_date),
                    "pMailingAddress" => $paddress,
                    "pZipCode" => $pzipc,
                    "pPatientIs" => $p_is,
                    "pAdmissionDate" => $paddmission_date,
                    "pDischargeDate" => $pdischarge_date,
                    "pPatientLastName" => "",//$another_member_ln,
                    "pPatientFirstName" => "",//$another_member_fn,
                    "pPatientMiddleName" => "",//$another_member_mn,
                    "pPatientSuffix" => "",//$another_member_sfx,
                    "pPatientBirthDate" => "",//$another_member_bdate,
                    "pPatientGender" => "",//$another_member_sex,
                    "pMembershipType" => $pmembership_type,
                    "pPEN" => $ppen,
                    "pEmployerName" => $pemployer_name,
                    "pRVS" => $prvs_code,
                    "pTotalAmountActual" => $ptotal_amount_actual,
                    "pTotalAmountClaimed" => $ptotal_amount_claimed,
                    "pIsFinal" => $pisfinal
                ));
            } else {
                $data['encryptedOutput'] = $client->__soapCall('isClaimEligible', array(
                    "pUserName" => ":DUMMYSCERTZ09434",
                    "pUserPassword" => "",
                    "pHospitalCode" => "Z09434",
                    "pPIN" => $another_member_pin,
                    "pMemberLastName" => $another_member_ln,
                    "pMemberFirstName" => $another_member_fn,
                    "pMemberMiddleName" => $another_member_mn,
                    "pMemberSuffix" => $another_member_sfx,
                    "pMemberBirthDate" => $another_member_bdate,
                    "pMailingAddress" => $another_member_add,// $paddress,
                    "pZipCode" => $pzipc,// $pzipc,
                    "pPatientIs" => $another_member_rel,
                    "pAdmissionDate" => $paddmission_date,
                    "pDischargeDate" => $pdischarge_date,
                    "pPatientLastName" => $plastname,//,
                    "pPatientFirstName" => $pfirstname,//,
                    "pPatientMiddleName" => $pmiddlename,//,
                    "pPatientSuffix" => $psuffix,//,
                    "pPatientBirthDate" => $pbirth_date,//,
                    "pPatientGender" => $pgender,//,
                    "pMembershipType" => $pmembership_type,
                    "pPEN" => $ppen,
                    "pEmployerName" => $pemployer_name,
                    "pRVS" => $prvs_code,
                    "pTotalAmountActual" => $ptotal_amount_actual,
                    "pTotalAmountClaimed" => $ptotal_amount_claimed,
                    "pIsFinal" => $pisfinal
                ));
            }

        $philhealth_response_time = gmdate('Y-m-d H:i:s');
        
        $cipherKey = 'PHilheaLthDuMmyciPHerKeyS';
        $data['decrypted_output'] = $this->decryptPayloadDataToXml($data['encryptedOutput'], $cipherKey);

        $data['xml'] = simplexml_load_string($data['decrypted_output']);
        $data['json'] = json_encode($data['xml']);
        $data['eclaims_array'] = json_decode($data['json'], TRUE);
        $staff_user_id = $this->session->userdata('user_id');



        } catch (SoapFault $fault) {
            $fault->faultstring;
            $data['soaperror'] = $fault;
            $philhealth_response_time = gmdate('Y-m-d H:i:s');
        }

        $soap_error_code = $data['soaperror']->detail->PhilhealthException->CODE;
        $soap_error_message = $data['soaperror']->detail->PhilhealthException->MESSAGE;

        if($soap_error_code === '500'){
            
            $data['eclaim_message_header'] = lang('not_eligible');
            $data['eclaim_message_body'] = $soap_error_message;
            
            // $_SESSION['messages'] = $data['eclaim_message_header'].''.$data['eclaim_message_body'];
        } else if($soap_error_code === '106'){
            $data['eclaim_message_header_106'] = lang('not_eligible');
            $data['eclaim_message_body_106'] = $soap_error_message;
        } else {
            if($data['eclaims_array']['@attributes']['ISOK'] === 'NO'){
                $data['eclaim_message_header'] = lang('not_eligible');
                $data['document'] = $data['eclaims_array']['DOCUMENTS']['DOCUMENT'];
                $data['eclaim_message_body']  = 'The request has not been granted not able to file a claim now';
            } else {
                $data['eclaim_tracking_number'] = $data['eclaims_array']['@attributes']['TRACKING_NUMBER'];
                $data['eclaim_message_header'] = lang('eligible');
                $data['eclaim_message_body']  = 'The request has been granted as of <strong>'.$data['eclaims_array']['@attributes']['ASOF'].'</strong><br> able to file the claim now.';
            }

            $data['for_query'] = array(

                //<---------------------------- patient eclaims data ----------------------------->
                'patient_id' => $patient_id,
                'patient_pin' => $ppin,                                             //----> PhilHealth Identification Number – a unique 12 digit number assigned to a member.
                'patient_lastname' => $plastname,                                   //----> Patient’s Complete Surname
                'patient_firstname' => $pfirstname,                                 //----> Patient’s Complete First name
                'patient_middlename' => $pmiddlename,                               //----> Patient’s Complete Middle name
                'patient_suffix' => $psuffix,                                       //----> Patient’s Suffix name
                'patient_birthdate' => date('Y-m-d',$pbirth_date),                                //----> Patient’s Birth Date
                'patient_address' => $paddress,                                     //----> Mailing Address (address where the benefit payment notice will be sent)
                'patient_postal' => $pzipc,                                         //----> Philippine Zip Code of the municipality
                'patient_is' => $p_is,                                              //----> Whether patient is the member or if dependent the relationship of patient with the member
                'patient_admission_date' => date('Y-m-d', strtotime($paddmission_date)),                     //----> Admission Date
                'patient_discharge_date' => date('Y-m-d', strtotime($pdischarge_date)),                       //----> Discharge Date
                'patient_gender' => $pgender,                                       //----> Patient’s Gender
                'patient_membership_type' => $pmembership_type,                     //----> PhilHealth membership type of the member
                'patient_employer_number' => $ppen,                                 //----> PhilHealth Employer Number – a unique 12 digit number assigned to an employer
                'patient_employer_name' => $pemployer_name,                         //----> The Registered name of the employer
                'patient_rvs_code' => $prvs_code,                                   //----> RVS code of the surgical procedure to be done to the patient.
                'patient_total_amount_actual' => $ptotal_amount_actual,             //----> Actual Amount of the Hospital Bill
                'patient_total_amount_claimed' => $ptotal_amount_claimed,           //----> Amount to be reimbursed by PhilHealth
                'patient_is_final' => $pisfinal,                                    //----> Initial and Final Call.
    
                //<-------------- another member data if the patient is not a member ------------->
    
                'another_member_pin' => $another_member_pin,                        //----> PhilHealth Identification Number – a unique 12 digit number assigned to a member.
                'another_member_lastname' => $another_member_ln,                    //----> Patient’s Complete Surname
                'another_member_firstname' => $another_member_fn,                   //----> Patient’s Complete First name
                'another_member_middlename' => $another_member_mn,                  //----> Patient’s Complete Middle name
                'another_member_address' => $another_member_add,                    //----> Mailing Address (address where the benefit payment notice will be sent)
                'another_member_suffix' => $another_member_sfx,                     //----> Patient’s Suffix name
                'another_member_birthdate' => date('Y-m-d', strtotime($another_member_bdate)),                //----> Patient’s Birth Date
                'another_member_relationship_with_patient' => $another_member_rel,  //----> relationship of patient with the patient
    
                // 'encounter_id' => $,
                'querying_staff_user_id' => $staff_user_id,
    
                //<-------------------------- philhealth response data  -------------------------->
    
                'eclaim_query_philhealth_response_raw' => $data['encryptedOutput'],           //----> encrypted raw data response by philhealth
                'eclaim_query_philhealth_response_decrypted_as_json' => $data['json'],        //----> decrypted data response by SugboDoc
                
                'created_at' => gmdate('Y-m-d H:i:s'),
                // 'last_modified' => ,
                'philhealth_server_response_time' => $philhealth_response_time 
            ); //---> database query
            $check_patient_claims = $this->claim_model->getPhilhealthClaimEligibilityByPatientId($patient_id);

            if (!empty($check_patient_claims)){
                $this->claim_model->updatePhilhealthClaimEligibilityByPatientId($data['for_query'], $patient_id);
            } else {
                $this->claim_model->insertClaimEligibilityQuery($data['for_query']);
            }
            
            // $inserted_id = $this->db->inserted_id();

        }

        echo json_encode($data);

                
        // $this->load->view('home/dashboardv2'); // just the header file
        // $this->load->view('addnew', $data);

    }

    public function decryptPayloadDataToXml($encryptedDataAsJsonStr, $passphrase){
        $this->log("decryptXmlPayload:: passphrase: $passphrase " );
        if (empty($encryptedDataAsJsonStr))
        {
            $up = new Exception("No data to be decrypted");
            throw $up; 
        }


        $data = json_decode($encryptedDataAsJsonStr);

        $ivBase64 = $data->{"iv"};
        $encryptedDataBase64 = $data->{"doc"};

        $cipherIV = base64_decode($ivBase64, true);
        $encryptedData = base64_decode($encryptedDataBase64, true);
        
        $this->log("decryptXmlPayload:: encryptedData (hexits): ". $this->toHexString($encryptedData));
        
        $cipherKey = $this->getPassphraseHash($passphrase);
        
        $this->log("decryptXmlPayload:: cipherKeyBytes (base64) : ". base64_encode($cipherKey));
        
       

        $this->log("decryptXmlPayload:: cipherIV (base64): ". $ivBase64 );
        $this->log("decryptXmlPayload:: cipherIV len: ".strlen($cipherIV) .";  cipherIV: $cipherIV " );

        $decryptedXml = $this->decryptUsingAES($encryptedData, $cipherKey, $cipherIV);
        //truncates decrypted data up to the position of the null ('\0') character
        $nullCharPos = strpos($decryptedXml, "\0");
        $this->log("decryptXmlPayload: nullCharPos: ". $nullCharPos);
        $this->log("decryptXmlPayload: size of decrypted data before trimming NULL chars: ". strlen($decryptedXml));
        $this->log("decryptXmlPayload: decrypted XML before trimming NULL chars:" . $this->toHexString($decryptedXml));
        //if($nullCharPos >= 0){
        if($nullCharPos !== FALSE){
			$this->log("decryptXmlPayload: trimming NULL characters...");
            $decryptedXml = substr($decryptedXml,0, $nullCharPos); //msm2018-02-16:  Changed $nullCharPos-1 to $nullCharPos;
        }
        $this->log("decryptXmlPayload: decrypted XML after trimming NULL chars:". $this->toHexString($decryptedXml));
        $this->log("decryptXmlPayload: size of decrypted data: ". strlen($decryptedXml));
        return $decryptedXml;
    }

    private function log($message){
        if ($this->_loggingEnabled)
        {
            $this->_logs[] = $message;
        }
    }
    
    private function toHexString($data){
        return bin2hex($data);
    }

    function getPassphraseHash($passphrase){
        $cipherKey = array();
        $passphraseHash = $this->getSHA256HashAsRawBinaryData($passphrase); 
        $passphraseHashLen = strlen($passphraseHash);
        if($passphraseHashLen >= self::CIPHER_KEY_LEN){
            $cipherKey = substr($passphraseHash, 0, self::CIPHER_KEY_LEN);
        }else{
            $padLen = self::CIPHER_KEY_LEN - $passphraseHashLen;
            $padding = str_repeat("\0", $padLen);
            $cipherKey = $passphraseHashLen . $padding; 
        }
        return $cipherKey;
    }

    private function decryptUsingAES($data, $cipherKey, $cipherIV){
        $blockSizeInBits = 256;
        $method = "AES-{$blockSizeInBits}-CBC";
        $data = $this->pad($data, $blockSizeInBits/8);
        $options = OPENSSL_ZERO_PADDING + OPENSSL_RAW_DATA;
        //$options = OPENSSL_ZERO_PADDING;
        $this->log("decryptUsingAES:: cipherIV len: ".strlen($cipherIV) ."; cipherIV: $cipherIV");
        $this->log("decryptUsingAES:: cipherKey len: ".strlen($cipherKey) ."; cipherKey (Base64): " . base64_encode($cipherKey));

        $decryptedData = openssl_decrypt($data, $method, $cipherKey, $options, $cipherIV);
        $this->log('decryptUsingAES: size of decrypted data: '. strlen($decryptedData));
        return $decryptedData;
    }

    private function getSHA256HashAsRawBinaryData($data){
        $rawBinaryData = hash("sha256", $data, true);
        return $rawBinaryData;
    }

    public function filePhilHealthClaim(){
        $data = array();
        $id = $this->input->get('id');
        $data['patient_id'] = $this->input->get('patient_id');
        $data['company'] = $this->company_model->getCompanyById($id);
        


        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('file_claim', $data);
    }

    public function pad($string, $blockSizeInBits = 32) {
        $pad = $blockSizeInBits - (strlen($string) % $blockSizeInBits);
        return $string . str_repeat(chr(0), $pad - 1) . chr($pad);
    } 


}

