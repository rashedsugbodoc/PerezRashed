<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('sma');
        $this->load->model('location/location_model');
        if (!$this->ion_auth->in_group(array('admin', 'superadmin'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data = array();
        $data['settings'] = $this->settings_model->getSettings();
        $data['entities'] = $this->settings_model->getEntityType();
        $data['zones'] = timezone_identifiers_list();
        $data['countries'] = $this->location_model->getCountry();
        $data['states'] = $this->location_model->getState();
        $data['cities'] = $this->location_model->getCity();
        $data['barangays'] = $this->location_model->getBarangay();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('settingsv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    public function getStateByCountryIdByJason() {
        $data = array();
        $country_id = $this->input->get('country');
        $settings = $this->input->get('settings');

        $data['state'] = $this->location_model->getStateByCountryId($country_id);
        $data['settings_state_id'] = $this->settings_model->getSettingsByJason($settings);

        echo json_encode($data);        
    }

    public function getCityByStateIdByJason() {
        $data = array();
        $state_id = $this->input->get('state');
        $settings = $this->input->get('settings');

        $data['city'] = $this->location_model->getCityByStateId($state_id);
        $data['settings_city_id'] = $this->settings_model->getSettingsByJason($settings);

        echo json_encode($data);        
    }

    public function getBarangayByCityIdByJason() {
        $data = array();
        $city_id = $this->input->get('city');
        $settings = $this->input->get('settings');

        $data['barangay'] = $this->location_model->getBarangayByCityId($city_id);
        $data['settings_barangay_id'] = $this->settings_model->getSettingsByJason($settings);

        echo json_encode($data);        
    }

    function subscription() {
        $data['settings'] = $this->settings_model->getSettings();
        $data['subscription'] = $this->settings_model->getSubscription();
        $this->load->view('home/dashboardv2', $data);
        $this->load->view('subscriptionv2', $data);
        // $this->load->view('home/footer');
    }

    public function update() {
        $id = $this->input->post('id');
        $entity_type = $this->input->post('entity_type');
        $group_name = $this->input->post('group_name');
        $title = $this->input->post('title');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $currency = $this->input->post('currency');
        $logo = $this->input->post('logo');
        $buyer = $this->input->post('buyer');
        $p_code = $this->input->post('p_code');
        $language = $this->input->post('language');
        $country_id = $this->input->post('country_id');
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $barangay_id = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $company_name = $this->input->post('company_name');
        $company_vat_number = $this->input->post('company_vat_number');
        $timezone = $this->input->post('timezone');
        $time_format = $this->input->post('time_format');
        $date_format = $this->input->post('date_format');
        $date_format_long = $this->input->post('date_format_long');

        if (!empty($email)) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            // Validating Group Name Field
            $this->form_validation->set_rules('entity_type', 'Healthcare Provider Type', 'trim|min_length[1]|max_length[100]|xss_clean');
            // Validating Group Name Field
            $this->form_validation->set_rules('group_name', 'Group Name', 'trim|min_length[1]|max_length[100]|xss_clean');
            // Validating Title Field
            $this->form_validation->set_rules('title', 'Healthcare Institution or Practice Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Email Field
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[100]|xss_clean');
            // Validating Address Field    
            $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[500]|xss_clean');
            // Validating Postal Field           
            $this->form_validation->set_rules('postal', 'Postal Code', 'trim|min_length[3]|alpha_numeric|max_length[50]|xss_clean');
            // Validating Phone Field           
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[1]|max_length[50]|xss_clean');
            // Validating Currency Field   
            $this->form_validation->set_rules('currency', 'Currency', 'trim|required|min_length[1]|max_length[3]|xss_clean');
            // Validating Logo Field   
            $this->form_validation->set_rules('logo', 'Logo', 'trim|min_length[1]|max_length[1000]|xss_clean');
            // Validating Department Field   
            $this->form_validation->set_rules('buyer', 'Buyer', 'trim|min_length[5]|max_length[500]|xss_clean');
            // Validating Phone Field           
            $this->form_validation->set_rules('p_code', 'Purchase Code', 'trim|min_length[5]|max_length[50]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $data = array();
                $data['settings'] = $this->settings_model->getSettings();
                $data['zones'] = timezone_identifiers_list();
                $data['countries'] = $this->location_model->getCountry();
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('settings', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {

                $file_name = $_FILES['img_url']['title'];
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
                        'entity_type_id' => $entity_type,
                        'group_name' => $group_name,
                        'title' => $title,
                        'address' => $address,
                        'phone' => $phone,
                        'email' => $email,
                        'currency' => $currency,
                        'codec_username' => $buyer,
                        'codec_purchase_code' => $p_code,
                        'logo' => $img_url,
                        'country_id' => $country_id,
                        'state_id' => $state_id,
                        'city_id' => $city_id,
                        'barangay_id' => $barangay_id,
                        'postal' => $postal,
                        'company_name' => $company_name,
                        'company_vat_number' => $company_vat_number,
                        'timezone' => $timezone,
                        'time_format' => $time_format,
                        'date_format' => $date_format,
                        'date_format_long' => $date_format_long
                    );
                } else {
                    $data = array();
                    $data = array(
                        'entity_type_id' => $entity_type,
                        'group_name' => $group_name,
                        'title' => $title,
                        'address' => $address,
                        'phone' => $phone,
                        'email' => $email,
                        'currency' => $currency,
                        'codec_username' => $buyer,
                        'codec_purchase_code' => $p_code,
                        'country_id' => $country_id,
                        'state_id' => $state_id,
                        'city_id' => $city_id,
                        'barangay_id' => $barangay_id,
                        'postal' => $postal,
                        'company_name' => $company_name,
                        'company_vat_number' => $company_vat_number,
                        'timezone' => $timezone,
                        'time_format' => $time_format,
                        'date_format' => $date_format,
                        'date_format_long' => $date_format_long
                    );
                }
                //$error = array('error' => $this->upload->display_errors());

                $this->settings_model->updateSettings($id, $data);
                $this->session->set_flashdata('success', lang('record_updated'));
                // Loading View
                redirect('settings');
            }
        } else {
            $this->session->set_flashdata('error', lang('email_required'));
            redirect('settings', 'refresh');
        }
    }

    function backups() {
        if ($this->ion_auth->in_group(array())) {
            $data['files'] = glob('./files/backups/*.zip', GLOB_BRACE);
            $data['dbs'] = glob('./files/backups/*.txt', GLOB_BRACE);
            $data['settings'] = $this->settings_model->getSettings();

            //$bc = array(array('link' => site_url('settings'), 'page' => lang('settings')), array('link' => '#', 'page' => lang('backups')));
            //$meta = array('page_title' => lang('backups'), 'bc' => $bc);
            // $this->page_construct('settings/backups', $this->data, $meta);
            $this->load->view('home/dashboard', $data);
            $this->load->view('backups', $data);
            $this->load->view('home/footer');
        } else {
            redirect('home');
        }
    }

    function language() {

        $data['settings'] = $this->settings_model->getSettings();

        //$bc = array(array('link' => site_url('settings'), 'page' => lang('settings')), array('link' => '#', 'page' => lang('backups')));
        //$meta = array('page_title' => lang('backups'), 'bc' => $bc);
        // $this->page_construct('settings/backups', $this->data, $meta);
        $this->load->view('home/dashboardv2', $data);
        $this->load->view('languagev2', $data);
        // $this->load->view('home/footer');
    }

    function changeLanguage() {
        $id = $this->input->post('id');
        $language = $this->input->post('language');
        $language_settings = $this->input->post('language_settings');


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('language', 'language', 'trim|required|min_length[1]|max_length[100]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/dashboard', $data); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'language' => $language,
            );

            $this->settings_model->updateSettings($id, $data);

            // Loading View
            $this->session->set_flashdata('success', lang('updated'));
            if (!empty($language_settings)) {
                redirect('settings/language');
            } else {
                redirect('');
            }
        }
    }

    function selectPaymentGateway() {
        $id = $this->input->post('id');
        $payment_gateway = $this->input->post('payment_gateway');


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('payment_gateway', 'Payment Gateway', 'trim|required|min_length[1]|max_length[100]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            redirect('pgateway');
        } else {

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'payment_gateway' => $payment_gateway,
            );

            $this->settings_model->updateSettings($id, $data);

            // Loading View
            $this->session->set_flashdata('success', lang('updated'));
            if (!empty($payment_gateway)) {
                redirect('pgateway');
            } else {
                redirect('');
            }
        }
    }

    function selectSmsGateway() {
        $id = $this->input->post('id');
        $sms_gateway = $this->input->post('sms_gateway');


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('sms_gateway', 'Sms Gateway', 'trim|required|min_length[1]|max_length[100]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            redirect('pgateway');
        } else {

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'sms_gateway' => $sms_gateway,
            );

            $this->settings_model->updateSettings($id, $data);

            // Loading View
            $this->session->set_flashdata('success', lang('updated'));
            if (!empty($sms_gateway)) {
                redirect('sms');
            } else {
                redirect('');
            }
        }
    }

    function backup_database() {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->dbutil();
        $prefs = array(
            'format' => 'sql',
            'filename' => 'hms_db_backup.sql'
        );
        $back = $this->dbutil->backup($prefs);
        $backup = & $back;
        $db_name = 'db-backup-on-' . date("Y-m-d-H-i-s") . '.txt';
        $save = './files/backups/' . $db_name;
        $this->load->helper('file');
        write_file($save, $backup);
        $this->session->set_flashdata('message', 'Database backup Successfull !');
        redirect("settings/backups");

        /* 	
          $this->load->dbutil();
          $backup = $this->dbutil->backup();
          $this->load->helper('file');
          write_file('Downloads.sql', $backup);
          $this->load->helper('download');
          force_download('backup.zip', $backup); */
    }

    function backup_files() {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->library('zip');
        $data = array_diff(scandir(FCPATH), array('..', '.', 'files')); // 'files' folder will be excluded here with '.' and '..'
        foreach ($data as $d) {
            $path = FCPATH . $d;
            if (is_dir($path))
                $this->zip->read_dir($path, false);
            if (is_file($path))
                $this->zip->read_file($path, false);
        }
        $filename = 'file-backup-' . date("Y-m-d-H-i-s") . '.zip';
        $this->zip->archive(FCPATH . 'files/backups/' . $filename);
        $this->session->set_flashdata('message', 'Application backup Successfull !');
        redirect("settings/backups");
        exit();
    }

    /* function backup_files()
      {
      if (!$this->ion_auth->in_group('admin')) {
      $this->session->set_flashdata('error', lang('access_denied'));
      redirect("home/permission");
      }
      $this->load->dbutil();
      $backup = $this->dbutil->backup();
      $this->load->helper('file');

      $filename = 'file-backup-' . date("Y-m-d-H-i-s");
      $this->sma->zip("./", './files/backups/', $filename);
      $this->session->set_flashdata('message', lang('backup_saved'));
      redirect("settings/backups");
      exit();
      } */

    function restore_database($dbfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $file = file_get_contents('./files/backups/' . $dbfile . '.txt');
        $this->db->conn_id->multi_query($file);
        $this->db->conn_id->close();
        $this->session->set_flashdata('message', 'Restoring of Backup Successfull');
        redirect('settings/backups');
    }

    function download_database($dbfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->library('zip');
        $this->zip->read_file('./files/backups/' . $dbfile . '.txt');
        $name = 'db_backup_' . date('Y_m_d_H_i_s') . '.zip';
        $this->zip->download($name);
        exit();
    }

    function download_backup($zipfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $this->load->helper('download');
        force_download('./files/backups/' . $zipfile . '.zip', NULL);
        exit();
    }

    function restore_backup($zipfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        $file = './files/backups/' . $zipfile . '.zip';
        $this->sma->unzip($file, './');
        $this->session->set_flashdata('info', 'Restoring of Application Successfull');
        redirect("settings/backups");
        exit();
    }

    function delete_database($dbfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        unlink('./files/backups/' . $dbfile . '.txt');
        $this->session->set_flashdata('info', 'Deleting of Database Successfull');
        redirect("settings/backups");
    }

    function delete_backup($zipfile) {
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect("home/permission");
        }
        unlink('./files/backups/' . $zipfile . '.zip');
        $this->session->set_flashdata('info', 'Deleting of App Backup Successfull');
        redirect("settings/backups");
    }

    function substring($index, $value) {

        foreach ($value as $key => $value2) {

            $value3 = trim(substr($value2, 2));
            $value4[] = substr($value3, 0, -2);
        }

        foreach ($index as $key => $index2) {

            $index3 = substr($index2, 7);
            $index4[] = substr($index3, 0, -3);
        }

        return array_combine($index4, $value4);
    }

    function languageEdit() {      
        
        if(!$this->ion_auth->in_group('superadmin')){
            redirect('home/permission');
        }
                
        $id = $this->input->get('id');
        //load helper for language
        $this->load->helper('string');

        if ($id == 'arabic') {
            $path = APPPATH . 'language/arabic/system_syntax_lang.php';
        }
        if ($id == 'english') {
            $path = APPPATH . 'language/english/system_syntax_lang.php';
        }
        if ($id == 'italian') {
            $path = APPPATH . 'language/italian/system_syntax_lang.php';
        }
        if ($id == 'french') {
            $path = APPPATH . 'language/french/system_syntax_lang.php';
        }
        /* if ($id == 'indonesian') {
          $path = APPPATH . 'language/indonesian/system_syntax_lang.php';
          }
          if ($id == 'zh_cn') {
          $path = APPPATH . 'language/zh_cn/system_syntax_lang.php';
          } */
        if ($id == 'spanish') {
            $path = APPPATH . 'language/spanish/system_syntax_lang.php';
        }
        if ($id == 'portuguese') {
            $path = APPPATH . 'language/portuguese/system_syntax_lang.php';
        }
        /*   if ($id == 'russian') {
          $path = APPPATH . 'language/russian/system_syntax_lang.php';
          }
          if ($id == 'turkish') {
          $path = APPPATH . 'language/turkish/system_syntax_lang.php';
          } if ($id == 'japanese') {
          $path = APPPATH . 'language/japanese/system_syntax_lang.php';
          } */
        $file = fopen($path, "r");
        $i = 0;
        while (!feof($file)) {
            $line = fgets($file);

            $arr = explode("=", $line, 2);
            if (!empty($arr[1])) {
                $index[$i] = $arr[0];
                $value[$i] = $arr[1];
                $i = $i + 1;
            }
        }
        fclose($file);



        $data = array();
        $data['languages'] = $this->substring($index, $value);

        $data['languagename'] = $id;



        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('edit_language', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function addLanguageTranslation() {
        $id = $this->input->post('language');
        $indexes = $this->input->post('indexupdate');
        $index = explode("#**##***", $indexes);
        $valueupdate = $this->input->post('valueupdate');
        $value = explode("*##**###", $valueupdate);

        foreach ($index as $key => $values) {
            if ($key !== 0) {

                $indexupdate[] = $values;
            }
        }
        foreach ($value as $key => $values) {
            if ($key !== 0) {
                $values = trim($values);

                $value2 = explode("'", $values);
                $length = count($value2);

                if (empty($value2[1])) {
                    //  echo $value
                    $valueupdated[] = $value2[0];
                } else {
                    $valuefinal = array();
                    foreach ($value2 as $keys => $value3) {


                        $lastChar = substr($value3, -1);
                        if (preg_match('/\\\\/', $lastChar)) {
                            $valuefinal[] = $value3 . "'";
                        } else {

                            if ($keys != ($length - 1)) {
                                $valuefinal[] = $value3 . "\'";
                            } else {
                                $valuefinal[] = $value3;
                            }
                        }
                    }
                    $valueconcate = "";
                    foreach ($valuefinal as $valuefinal) {
                        $valueconcate .= $valuefinal;
                    }
                    $valueupdated[] = $valueconcate;
                }
            }
        }

        $data = array_combine($indexupdate, $valueupdated);

        if ($id == 'arabic') {
            $path = APPPATH . 'language/arabic/system_syntax_lang.php';
        }
        if ($id == 'english') {
            $path = APPPATH . 'language/english/system_syntax_lang.php';
        }
        if ($id == 'italian') {
            $path = APPPATH . 'language/italian/system_syntax_lang.php';
        }
        if ($id == 'french') {
            $path = APPPATH . 'language/french/system_syntax_lang.php';
        }

        if ($id == 'spanish') {
            $path = APPPATH . 'language/spanish/system_syntax_lang.php';
        }
        if ($id == 'portuguese') {
            $path = APPPATH . 'language/portuguese/system_syntax_lang.php';
        }

        unlink($path);
        $option = "<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Name:  Auth Lang -" . $id . "
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Author: Daniel Davis
 *         @ourmaninjapan
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.09.2013
 *
 * Description: " . $id . " language file for Ion Auth example views
 *
 */
// Errors";
        $file_handle = fopen($path, 'a+');
        fwrite($file_handle, $option);
        fwrite($file_handle, "\n");
        foreach ($data as $key => $value) {
            $valueupdate = trim($value);
            $option1 = '$lang' . "['" . $key . "'] = '$valueupdate';";
            fwrite($file_handle, $option1);
            fwrite($file_handle, "\n");
        }


        fclose($file_handle);
        $this->session->set_flashdata('success', lang('updated'));
        redirect('settings/language');
    }

}

/* End of file settings.php */
/* Location: ./application/modules/settings/controllers/settings.php */


