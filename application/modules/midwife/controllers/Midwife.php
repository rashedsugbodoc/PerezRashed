<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Midwife extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('location/location_model');
        $this->load->model('midwife_model');
        $this->load->helper('string');
        if (!$this->ion_auth->in_group(array('admin', 'Midwife', 'Doctor'))) {
            redirect('home/permission');
        }
    }

    public function index() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $data['midwifes'] = $this->midwife_model->getMidwife();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('midwifev2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $data['countries'] = $this->location_model->getCountry();
        $data['redirect'] = null;
        $data['setval'] = null;
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $fname = $this->input->post('fname');
        $mname = $this->input->post('mname');
        $lname = $this->input->post('lname');
        $suffix = $this->input->post('suffix');
        $password = random_string('alnum', 8);
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');
        $redirect = $this->input->post('redirect');

        $emailById = $this->midwife_model->getMidwifeById($id)->email;

        if ($suffix === '0') {
            $suffix = null;
        }

        $name = $fname.' '.$mname.' '.$lname.' '.$suffix;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Name Field
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        if ($email !== $emailById) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|is_unique[users.email]|max_length[100]|xss_clean');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|max_length[100]|xss_clean');
        }

        $this->form_validation->set_message('is_unique',lang('this_email_address_is_already_registered'));
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('country_id', 'Country', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('state_id', 'State', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('city_id', 'City', 'trim|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                $data = array();
                $data['countries'] = $this->location_model->getCountry();
                $data['midwife'] = $this->midwife_model->getMidwifeById($id);
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_newv2', $data);
                // $this->load->view('home/footer'); // just the footer file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                $data = array();
                $data['countries'] = $this->location_model->getCountry();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_newv2', $data);
                // $this->load->view('home/footer'); // just the header file
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
                'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "2024",
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
                    'firstname' => $fname,
                    'lastname' => $lname,
                    'middlename' => $mname,
                    'suffix' => $suffix,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'country_id' => $country,
                    'state_id' => $state,
                    'city_id' => $city,
                    'barangay_id' => $barangay,
                    'postal' => $postal
                );
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'firstname' => $fname,
                    'lastname' => $lname,
                    'middlename' => $mname,
                    'suffix' => $suffix,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'country_id' => $country,
                    'state_id' => $state,
                    'city_id' => $city,
                    'barangay_id' => $barangay,
                    'postal' => $postal
                );
            }
            $username = $name;
            if (empty($id)) {     // Adding New Nurse
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                    $data = array();
                    $data['setval'] = 'setval';
                    $data['countries'] = $this->location_model->getCountry();
                    $data['midwife'] = $this->midwife_model->getMidwifeById($id);
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        $dfg = 15;
                        $this->ion_auth->register($username, $password, $email, $dfg);
                        $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                        $this->midwife_model->insertMidwife($data);
                        $midwife_user_id = $this->db->get_where('midwife', array('email' => $email))->row()->id;
                        $id_info = array('ion_user_id' => $ion_user_id);
                        $this->midwife_model->updateMidwife($midwife_user_id, $id_info);
                        $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                        $set['settings'] = $this->settings_model->getSettings();
                        $data1 = array(
                            'firstname' => $fname,
                            'lastname' => $lname,
                            'name' => $name,
                            'email' => $email,
                            'password' => $password,
                            'company' => $set['settings']->system_vendor,
                            'hospital_name' => $set['settings']->title,
                            'hospital_contact' => $set['settings']->phone
                        );

                        $autoemail = $this->email_model->getAutoEmailByType('nurse');
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
                        $this->session->set_flashdata('success', lang('record_added'));
                        if (!empty($redirect)) {
                            redirect($redirect);
                        } else {
                            redirect('midwife');
                        }
                    } else {
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            // $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            // $this->session->set_flashdata('fileError', $fileError);
                            // $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            $data['setval'] = 'setval';
                            $data['countries'] = $this->location_model->getCountry();
                            $data['midwife'] = $this->midwife_model->getMidwifeById($id);
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                        } else {
                            $dfg = 15;
                            $this->ion_auth->register($username, $password, $email, $dfg);
                            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                            $this->midwife_model->insertMidwife($data);
                            $midwife_user_id = $this->db->get_where('midwife', array('email' => $email))->row()->id;
                            $id_info = array('ion_user_id' => $ion_user_id);
                            $this->midwife_model->updateMidwife($midwife_user_id, $id_info);
                            $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                            $set['settings'] = $this->settings_model->getSettings();
                            $data1 = array(
                                'firstname' => $fname,
                                'lastname' => $lname,
                                'name' => $name,
                                'email' => $email,
                                'password' => $password,
                                'company' => $set['settings']->system_vendor,
                                'hospital_name' => $set['settings']->title,
                                'hospital_contact' => $set['settings']->phone
                            );

                            $autoemail = $this->email_model->getAutoEmailByType('nurse');
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
                            $this->session->set_flashdata('success', lang('record_added'));
                            if (!empty($redirect)) {
                                redirect($redirect);
                            } else {
                                redirect('midwife');
                            }
                        }
                    }
                }
            } else { // Updating Nurse
                if ($email !== $emailById) {
                    if ($this->ion_auth->email_check($email)) {
                        $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                        $data = array();
                        $data['setval'] = 'setval';
                        $data['countries'] = $this->location_model->getCountry();
                        $data['midwife'] = $this->midwife_model->getMidwifeById($id);
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('add_newv2', $data);
                        // $this->load->view('home/footer'); // just the footer file
                    } else {
                        $ion_user_id = $this->db->get_where('midwife', array('id' => $id))->row()->ion_user_id;
                        
                        $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        
                        $this->midwife_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->midwife_model->updateMidwife($id, $data);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        if (!empty($redirect)) {
                            redirect($redirect);
                        } else {
                            redirect('midwife');
                        }
                    }
                } else {
                    if ($this->upload->do_upload('img_url')) {
                        $ion_user_id = $this->db->get_where('midwife', array('id' => $id))->row()->ion_user_id;
                        
                        $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;/*Assign Existing Password already in Database*/

                        $this->midwife_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->midwife_model->updateMidwife($id, $data);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        if (!empty($redirect)) {
                            redirect($redirect);
                        } else {
                            redirect('midwife');
                        }
                    } else {
                        if ($_FILES['img_url']['size'] > $config['max_size']) {
                            $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                            $this->session->set_flashdata('fileError', $fileError);
                            $this->session->set_flashdata('error', lang('validation_error'));
                            $data = array();
                            $data['setval'] = 'setval';
                            $data['countries'] = $this->location_model->getCountry();
                            $data['midwife'] = $this->midwife_model->getMidwifeById($id);
                            $this->load->view('home/dashboardv2'); // just the header file
                            $this->load->view('add_newv2', $data);
                        } else {
                            $ion_user_id = $this->db->get_where('midwife', array('id' => $id))->row()->ion_user_id;
                            
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;/*Assign Existing Password already in Database*/

                            $this->midwife_model->updateIonUser($username, $email, $password, $ion_user_id);
                            $this->midwife_model->updateMidwife($id, $data);
                            $this->session->set_flashdata('success', lang('record_updated'));
                            if (!empty($redirect)) {
                                redirect($redirect);
                            } else {
                                redirect('midwife');
                            }
                        }
                    }
                }
            }
            // Loading View
            // redirect('nurse');
        }
    }

    function editMidwife() {
        $data = array();
        $id = $this->input->get('id');
        $data['countries'] = $this->location_model->getCountry();
        $data['midwife'] = $this->midwife_model->getMidwifeById($id);
        $data['redirect'] = null;
        $data['setval'] = null;
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editMidwifeByJason() {
        $id = $this->input->get('id');
        $data['midwife'] = $this->midwife_model->getMidwifeById($id);
        $country_id = $data['midwife']->country_id;
        $state_id = $data['midwife']->state_id;
        $city_id = $data['midwife']->city_id;
        $barangay_id = $data['midwife']->barangay_id;

        $data['country']= $this->location_model->getCountryById($country_id);
        $data['state']= $this->location_model->getStateById($state_id);
        $data['city']= $this->location_model->getCityById($city_id);
        $data['barangay']= $this->location_model->getBarangayById($barangay_id);
        echo json_encode($data);
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('midwife', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->midwife_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('midwife');
    }

    function getStateByCountryIdByJason() {
        $data = array();
        $country_id = $this->input->get('country');

        $data['state'] = $this->location_model->getStateByCountryId($country_id);
        
        echo json_encode($data);        
    }

    public function getCityByStateIdByJason() {
        $data = array();
        $state_id = $this->input->get('state');

        $data['city'] = $this->location_model->getCityByStateId($state_id);

        echo json_encode($data);        
    }

    public function getBarangayByCityIdByJason() {
        $data = array();
        $city_id = $this->input->get('city');

        $data['barangay'] = $this->location_model->getBarangayByCityId($city_id);

        echo json_encode($data);        
    }

    public function editProfile() {
        $data = array();
        $user = $this->ion_auth->get_user_id();
        $id = $this->midwife_model->getMidwifeByIonUserId($user)->id;
        $data['midwife'] = $this->midwife_model->getMidwifeById($id);
        $data['countries'] = $this->location_model->getCountry();
        $data['redirect'] = 'midwife/editProfile';
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);        
        //$this->load->view('home/footer'); // just the footer file
    }

    public function getAllMidwivesInfo() {
    // Search term
        $searchTerm = $this->input->post('searchTerm');
    // Get users
        $response = $this->midwife_model->getAllMidwivesInfo($searchTerm);
        echo json_encode($response);
    }

}

/* End of file nurse.php */
/* Location: ./application/modules/nurse/controllers/nurse.php */
