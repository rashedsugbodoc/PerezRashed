<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Specialty extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('specialty_model');

        if (!$this->ion_auth->in_group('admin', 'Doctor')) {
            redirect('home/permission');
        }
    }

    
