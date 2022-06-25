<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companyuser extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('companyuser/companyuser_model');
        $this->load->model('company/company_model');
        $this->load->model('location/location_model');
 
        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        //$data['company'] = $this->company_model->getCompany();
        $data['companyusers'] = $this->companyuser_model->getCompanyUser();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('companyuserv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $data['companies'] = $this->company_model->getCompany();
        $data['countries'] = $this->location_model->getCountry();
        // $data['companyusers'] = $this->companyuser_model->getCompanyUser();
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $company_id = $this->input->post('company_id');
        $country = $this->input->post('country_id');
        $state = $this->input->post('state_id');
        $city = $this->input->post('city_id');
        $barangay = $this->input->post('barangay_id');
        $postal = $this->input->post('postal');

        $emailById = $this->companyuser_model->getCompanyUserById($id)->email;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        }
        if ($email !== $emailById) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|is_unique[companyuser.email]|max_length[100]|xss_clean');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|valid_email|max_length[100]|xss_clean');
        }

        $this->form_validation->set_message('is_unique',lang('this_email_address_is_already_registered'));
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[500]|xss_clean');
         // Validating Address Field   
        $this->form_validation->set_rules('country_id', 'Country', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('state_id', 'State', 'trim|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('city_id', 'City', 'trim|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company', 'trim|required|min_length[1]|max_length[50]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                // $id = $this->input->get('id');
                $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                $this->load->view('home/dashboardv2'); // just the header file
                $this->load->view('add_newv2', $data);
                // $this->load->view('home/footer'); // just the footer file
            } else {
                $this->session->set_flashdata('error', lang('validation_error'));
                $data = array();
                $data['companyusers'] = $this->companyuser_model->getCompanyUser();
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
                    'company_id' => $company_id,
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
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'company_id' => $company_id,
                    'country_id' => $country,
                    'state_id' => $state,
                    'city_id' => $city,
                    'barangay_id' => $barangay,
                    'postal' => $postal
                );
            }

            $username = $this->input->post('name');

            if (empty($id)) {     // Adding New Company User
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                    $data = array();
                    $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                    $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                    $this->load->view('home/dashboardv2'); // just the header file
                    $this->load->view('add_newv2', $data);
                    // $this->load->view('home/footer'); // just the footer file
                } else {
                    $dfg = 12;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $this->companyuser_model->insertCompanyUser($data);
                    $companyuser_user_id = $this->db->get_where('companyuser', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->companyuser_model->updateCompanyUser($companyuser_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                    $this->session->set_flashdata('success', lang('record_added'));
                    redirect('companyuser');
                }
            } else { // Updating Company User
                $fileError = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                $this->session->set_flashdata('fileError', $fileError);
                if ($email !== $emailById) {
                    if ($this->ion_auth->email_check($email)) {
                        $this->session->set_flashdata('error', lang('this_email_address_is_already_registered'));
                        $data = array();
                        $data['companyusers'] = $this->companyuser_model->getCompanyUser();
                        $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
                        $this->load->view('home/dashboardv2'); // just the header file
                        $this->load->view('add_newv2', $data);
                        // $this->load->view('home/footer'); // just the footer file
                    } else {
                        $ion_user_id = $this->db->get_where('companyuser', array('id' => $id))->row()->ion_user_id;
                        if (empty($password)) {
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        } else {
                            $password = $this->ion_auth_model->hash_password($password);
                        }
                        $this->companyuser_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->companyuser_model->updateCompanyUser($id, $data);
                        $this->session->set_flashdata('success', lang('record_updated'));
                        redirect('companyuser');
                    }
                } else {
                    $ion_user_id = $this->db->get_where('companyuser', array('id' => $id))->row()->ion_user_id;
                    if (empty($password)) {
                        $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                    } else {
                        $password = $this->ion_auth_model->hash_password($password);
                    }
                    $this->companyuser_model->updateIonUser($username, $email, $password, $ion_user_id);
                    $this->companyuser_model->updateCompanyUser($id, $data);
                    $this->session->set_flashdata('success', lang('record_updated'));
                    redirect('companyuser');
                }
            }
            // Loading View
            // redirect('companyuser');
        }
    }

    function getCompanyUser() {
        $data['companyusers'] = $this->companyuser_model->getCompanyUser();
        $this->load->view('companyuser', $data);
    }

    function editCompanyUser() {
        $data = array();
        $id = $this->input->get('id');
        $data['companies'] = $this->company_model->getCompany();
        $data['countries'] = $this->location_model->getCountry();
        $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
        $this->load->view('home/dashboardv2'); // just the header file
        $this->load->view('add_newv2', $data);
        // $this->load->view('home/footer'); // just the footer file
    }

    function editCompanyUserByJason() {
        $id = $this->input->get('id');
        $data['companyuser'] = $this->companyuser_model->getCompanyUserById($id);
        $data['company'] = $this->company_model->getCompanyById($data['companyuser']->company_id);
        $country_id = $data['companyuser']->country_id;
        $state_id = $data['companyuser']->state_id;
        $city_id = $data['companyuser']->city_id;
        $barangay_id = $data['companyuser']->barangay_id;

        $data['country']= $this->location_model->getCountryById($country_id);
        $data['state']= $this->location_model->getStateById($state_id);
        $data['city']= $this->location_model->getCityById($city_id);
        $data['barangay']= $this->location_model->getBarangayById($barangay_id);
        echo json_encode($data);
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('companyuser', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->companyuser_model->delete($id);
        $this->session->set_flashdata('success', lang('record_deleted'));
        redirect('companyuser');
    }

    public function getCompanyInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->company_model->getCompanyInfo($searchTerm);

        echo json_encode($response);
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

}

/* End of file companyuser.php */
/* Location: ./application/modules/companyuser/controllers/companyuser.php */
