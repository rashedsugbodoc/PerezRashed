<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function required() {
    $CI = & get_instance();
    $CI->load->library('Ion_auth');
    $CI->load->library('session');
    $CI->load->library('form_validation');
    $CI->load->library('upload');
    $CI->load->library('parser');
    $CI->load->helper('security');
    //$CI->load->config('paypal');

    $RTR = & load_class('Router');
    if ($RTR->class != "frontend" && $RTR->class != "request" && $RTR->class != "auth") {
        if (!$CI->ion_auth->logged_in()) {
            $CI->load->helper('url');
            $CI->session->set_userdata('last_page', current_url());
            redirect('auth/login');
        }
    }
    $CI->load->model('settings/settings_model');
    $CI->load->model('company/company_model');
    $CI->load->model('ion_auth_model');
    $CI->load->model('hospital/hospital_model');

    if ($RTR->class != "frontend" && $RTR->class != "request" && $RTR->class != "auth") {
        if (!$CI->ion_auth->in_group(array('superadmin'))) {
            if ($CI->ion_auth->in_group(array('admin'))) {
                $current_user_id = $CI->ion_auth->user()->row()->id;
                $user = $CI->db->get_where('admin', array('ion_user_id' => $current_user_id))->row();
                $CI->hospital_id = $user->hospital_id;
                $CI->timezone = $CI->db->get_where('settings', array('hospital_id' => $CI->hospital_id))->row()->timezone;
                if (empty($user->img_url) || !file_exists($user->img_url)) {
                    $profile_img_url = 'public/assets/images/users/placeholder.jpg';
                } else {
                    $profile_img_url = $user->img_url;
                }
                if (!empty($CI->hospital_id)) {
                    $newdata = array(
                        'hospital_id' => $CI->hospital_id,
                        'profile_img_url' => $profile_img_url,
                        'name' => $user->name
                    );
                    $CI->session->set_userdata($newdata);
                }
                if (!empty($CI->timezone)) {
                    date_default_timezone_set($CI->timezone);
                }


            } else {
                $current_user_id = $CI->ion_auth->user()->row()->id;
                $group_id = $CI->db->get_where('users_groups', array('user_id' => $current_user_id))->row()->group_id;
                $group_name = $CI->db->get_where('groups', array('id' => $group_id))->row()->name;
                $group_name = strtolower($group_name);
                $user = $CI->db->get_where($group_name, array('ion_user_id' => $current_user_id))->row();
                $CI->hospital_id = $user->hospital_id;
                $CI->timezone = $CI->db->get_where('settings', array('hospital_id' => $CI->hospital_id))->row()->timezone;
                if (empty($user->img_url) || !file_exists($user->img_url)) {
                    $profile_img_url = 'public/assets/images/users/placeholder.jpg';
                } else {
                    $profile_img_url = $user->img_url;
                }
                if (!empty($CI->hospital_id)) {
                    $newdata = array(
                        'hospital_id' => $CI->hospital_id,
                        'profile_img_url' => $profile_img_url,
                        'name' => $user->name
                    );
                    $CI->session->set_userdata($newdata);
                }
                if (!empty($CI->timezone)) {
                    date_default_timezone_set($CI->timezone);
                }
            }
        } else {
            $current_user_id = $CI->ion_auth->user()->row()->id;
            $user = $CI->db->get_where('superadmin', array('ion_user_id' => $current_user_id))->row();
            if (empty($user->img_url) || !file_exists($user->img_url)) {
                $profile_img_url = 'public/assets/images/users/placeholder.jpg';
            } else {
                $profile_img_url = $user->img_url;
            }
            $CI->hospital_id = 'superadmin';
            $CI->timezone = 'Asia/Manila';
            if (!empty($CI->hospital_id)) {
                $newdata = array(
                    'hospital_id' => $CI->hospital_id,
                    'profile_img_url' => $profile_img_url,
                    'name' => $user->name
                );
                $CI->session->set_userdata($newdata);
            }
            if (!empty($CI->timezone)) {
                date_default_timezone_set($CI->timezone);
            }
        }
    }

    // Language
    if ($RTR->class != "frontend" && $RTR->class != "request" && $RTR->class != "auth") {
        if (!$CI->ion_auth->in_group(array('superadmin'))) {
            $CI->db->where('hospital_id', $CI->hospital_id);
            $CI->language = $CI->db->get('settings')->row()->language;
            $CI->lang->load('system_syntax', $CI->language);
        } else {
            $CI->db->where('hospital_id', 'superadmin');
            $CI->language = $CI->db->get('settings')->row()->language;
            $CI->lang->load('system_syntax', $CI->language);
        }
    }
    if ($RTR->class == "frontend" || $RTR->class == "request") {
        $CI->db->where('hospital_id', 'superadmin');
        $CI->language = $CI->db->get('website_settings')->row()->language;
        $CI->lang->load('system_syntax', $CI->language);
    }
    // Language
    
    // Currency
    if ($RTR->class != "frontend" && $RTR->class != "request" && $RTR->class != "auth") {
        if (!$CI->ion_auth->in_group(array('superadmin'))) {
            $CI->db->where('hospital_id', $CI->hospital_id);
            $CI->currency = $CI->db->get('settings')->row()->currency;
        } else {
            $CI->db->where('hospital_id', 'superadmin');
            $CI->currency = $CI->db->get('settings')->row()->currency;
        }
    }
    // Currency


    if ($RTR->class != "frontend" && $RTR->class != "request" && $RTR->class != "auth") {
        if (!$CI->ion_auth->in_group(array('superadmin'))) {
            if ($CI->ion_auth->in_group(array('admin'))) {
                $current_user_id = $CI->ion_auth->user()->row()->id;
                $hospital_id = $CI->db->get_where('admin', array('ion_user_id' => $current_user_id))->row()->hospital_id;
                $hospital = $CI->db->get_where('hospital', array('id' => $hospital_id))->row();
                if (!empty($hospital->package)) {
                    $modules = $CI->db->get_where('package', array('id' => $hospital->package))->row()->module;
                } else {
                    $modules = $hospital->module;
                }
                $CI->modules = explode(',', $modules);
            } else {
                $current_user_id = $CI->ion_auth->user()->row()->id;
                $group_id = $CI->db->get_where('users_groups', array('user_id' => $current_user_id))->row()->group_id;
                $group_name = $CI->db->get_where('groups', array('id' => $group_id))->row()->name;
                $group_name = strtolower($group_name);
                $hospital_id = $CI->db->get_where($group_name, array('ion_user_id' => $current_user_id))->row()->hospital_id;
                $hospital = $CI->db->get_where('hospital', array('id' => $hospital_id))->row();
                if (!empty($hospital->package)) {
                    $modules = $CI->db->get_where('package', array('id' => $hospital->package))->row()->module;
                } else {
                    $modules = $hospital->module;
                }
                $CI->modules = explode(',', $modules);
            }
        } else {
            $current_user_id = $CI->ion_auth->user()->row()->id;
            $modules = $CI->db->get_where('superadmin', array('ion_user_id' => $current_user_id))->row()->module;
            $CI->modules = explode(',', $modules);
        }
    }


    $common = array('auth', 'frontend', 'settings', 'home', 'profile', 'request');

    if (!in_array($RTR->class, $common)) {
        if (!$CI->ion_auth->in_group(array('superadmin'))) {
            if ($RTR->class != "schedule" && $RTR->class != "meeting") {
                if ($RTR->class != "pgateway") {
                    if (!in_array($RTR->class, $CI->modules)) {
                        redirect('home');
                    }
                } elseif (!in_array('finance', $CI->modules)) {
                    redirect('home');
                }
            } elseif (!in_array('appointment', $CI->modules)) {
                redirect('home');
            }
        }
    }
}
