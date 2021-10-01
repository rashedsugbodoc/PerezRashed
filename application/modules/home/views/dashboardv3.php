<!DOCTYPE html>


<html lang="en" <?php
if (!$this->ion_auth->in_group(array('superadmin'))) {
    $this->db->where('hospital_id', $this->hospital_id);
    $settings_lang = $this->db->get('settings')->row()->language;
    if ($settings_lang == 'arabic') {
        ?>     
              dir="rtl"
          <?php } else { ?>
              dir="ltr"
              <?php
          }
      } else {
          $this->db->where('hospital_id', 'superadmin');
          $settings_lang = $this->db->get('settings')->row()->language;
          if ($settings_lang == 'arabic') {
              ?>
              dir="rtl"     
          <?php } else { ?> 
              dir="ltr"
              <?php
          }
      }
      ?>>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="">
        <meta name="author" content="Rygel">
        <meta name="keywords" content="Hospital Information System, Clinic, Management, Software, Finance">
        <link rel="shortcut icon" href="uploads/favicon.png">
        <title> <?php echo $this->router->fetch_class(); ?> | 
            <?php
            if ($this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', 'superadmin');
            } else {
                $this->db->where('hospital_id', $this->hospital_id);
            }
            ?>
            <?php
            echo $this->db->get('settings')->row()->system_vendor;
            ?>  
        </title>
        
        <!--Favicon -->
        <link rel="icon" href="<?php echo base_url('public/assets/images/brand/favicon.ico'); ?>" type="image/x-icon"/>

        <!-- Bootstrap css -->
        <link href="<?php echo base_url('public/assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />

        <!-- Style css -->
        <link href="<?php echo base_url('public/assets/css/style.css'); ?>" rel="stylesheet" />

        <!-- Dark css -->
        <link href="<?php echo base_url('public/assets/css/dark.css'); ?>" rel="stylesheet" />

        <!-- Skins css -->
        <link href="<?php echo base_url('public/assets/css/skins.css'); ?>" rel="stylesheet" />

        <!-- Animate css -->
        <link href="<?php echo base_url('public/assets/css/animated.css'); ?>" rel="stylesheet" />

        <!--Sidemenu css -->
        <link id="theme" href="<?php echo base_url('public/assets/css/sidemenu.css'); ?>" rel="stylesheet">

        <!-- P-scroll bar css-->
        <link href="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.css'); ?>" rel="stylesheet" />

        <!---Icons css-->
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/icons.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/font-awesome/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/plugin.css'); ?>" rel="stylesheet" />
        
        <!-- INTERNAL CSS START -->
        <!---jvectormap css-->
        <link href="<?php echo base_url('public/assets/plugins/jvectormap/jqvmap.css') ?>" rel="stylesheet" />

        <!-- Data table css -->
        <link href="<?php echo base_url('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/datatable/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/datatable/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" />        

        <!--Daterangepicker css-->
        <link href="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet" />
        <!-- Fullcalendar css-->
        <link href='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.css'); ?>' rel='stylesheet' />
        <!-- Slect2 css -->
        <link href="<?php echo base_url('public/assets/plugins/select2/select2.min.css'); ?>" rel="stylesheet" />

        <!-- File Uploads css -->
        <link href="<?php echo base_url('public/assets/plugins/fancyuploder/fancy_fileupload.css'); ?>" rel="stylesheet" />

        <!-- Time picker css -->
        <link href="<?php echo base_url('public/assets/plugins/time-picker/jquery.timepicker.css'); ?>" rel="stylesheet" />

        <!-- Date Picker css -->
        <link href="<?php echo base_url('public/assets/plugins/date-picker/date-picker.css'); ?>" rel="stylesheet" />

        <!-- File Uploads css-->
        <link href="<?php echo base_url('public/assets/plugins/fileupload/css/fileupload.css'); ?>" rel="stylesheet" type="text/css" />
        <!--Mutipleselect css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/multipleselect/multiple-select.css'); ?>">

        <!--Sumoselect css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/sumoselect/sumoselect.css'); ?>">

        <!--intlTelInput css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/intl-tel-input-master/intlTelInput.css'); ?>">

        <!--Jquerytransfer css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/jQuerytransfer/jquery.transfer.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/jQuerytransfer/icon_font/icon_font.css'); ?>">

        <!--multi css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/multi/multi.min.css'); ?>">

        <!-- Quill css -->
        <link href="<?php echo base_url('public/assets/plugins/quill/quill.snow.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/quill/quill.bubble.css'); ?>" rel="stylesheet">

        <!-- WYSIWYG Editor css -->
        <link href="<?php echo base_url('public/assets/plugins/wysiwyag/richtext.css'); ?>" rel="stylesheet" />                
        <!-- INTERNAL CSS END -->

        <style>
            #ui-datepicker-div {
                z-index: 10001 !important;
            }
            .ui-timepicker-wrapper {
                z-index: 10001 !important;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

        <?php
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            if ($settings_lang == 'arabic') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        } else {
            if ($settings_lang == 'arabic') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        }
        ?>

    </head>

    <body class="app sidebar-mini light-mode default-sidebar">

        <!---Global-loader-->

        <div class="page">
            <div class="page-main">

                <!--aside open-->
                <div class="app-sidebar app-sidebar2">
                    <div class="app-sidebar__logo">
                        <a class="header-brand" href="<?php echo base_url('home'); ?>">
                            <!--logo start-->
                            <img src="<?php if(!empty($settings->logo)) { echo $settings->logo; } else { echo base_url('public/assets/images/brand/logo.png');} ?>" class="header-brand-img desktop-logo" alt="Rygel Dash logo">
                            <img src="<?php if(!empty($settings->mobile_logo)) { echo $settings->logo; } else { echo base_url('public/assets/images/brand/favicon.png');} ?>" class="header-brand-img mobile-logo" alt="Rygel Dash logo">
                            <!--logo end-->
                        </a>
                    </div>
                </div>
                <aside class="app-sidebar app-sidebar3">
                    <ul class="side-menu">
                        <li>
                            <a class="side-menu__item" href="home">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="side-menu__label"><?php echo lang('dashboard'); ?></span></a>
                        </li>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <?php if (in_array('department', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="department">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="none"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><g><path d="M18,16l4-4l-4-4v3h-5.06c-0.34-3.1-2.26-5.72-4.94-7.05C7.96,2.31,6.64,1,5,1C3.34,1,2,2.34,2,4s1.34,3,3,3 c0.95,0,1.78-0.45,2.33-1.14C9.23,6.9,10.6,8.77,10.92,11h-3.1C7.4,9.84,6.3,9,5,9c-1.66,0-3,1.34-3,3s1.34,3,3,3 c1.3,0,2.4-0.84,2.82-2h3.1c-0.32,2.23-1.69,4.1-3.58,5.14C6.78,17.45,5.95,17,5,17c-1.66,0-3,1.34-3,3s1.34,3,3,3 c1.64,0,2.96-1.31,2.99-2.95c2.68-1.33,4.6-3.95,4.94-7.05H18V16z"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('departments'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('doctor', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('doctor'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="doctor" class="slide-item"><?php echo lang('list_of_doctors'); ?></a></li>
                                        <li><a href="appointment/treatmentReport" class="slide-item"><?php echo lang('treatment_history'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                            <?php if (in_array('patient', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('patient'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="patient" class="slide-item"><?php echo lang('patient_list'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?>
                                            <li><a href="patient/patientPayments" class="slide-item"><?php echo lang('payments'); ?></a></li>
                                        <?php } ?>
                                        <?php if (!$this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                                        <li><a href="patient/caseList" class="slide-item"><?php echo lang('case'); ?> <?php echo lang('manager'); ?></a></li>
                                        <li><a href="patient/documents" class="slide-item"><?php echo lang('documents'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('schedule'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="schedule" class="slide-item"><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>
                                        <li><a href="schedule/allHolidays" class="slide-item"><?php echo lang('holidays'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('appointment'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="appointment" class="slide-item"><?php echo lang('all'); ?></a></li>
                                        <li><a href="appointment/addNewView" class="slide-item"><?php echo lang('add'); ?></a></li>
                                        <li><a href="appointment/todays" class="slide-item"><?php echo lang('todays'); ?></a></li>
                                        <li><a href="appointment/upcoming" class="slide-item"><?php echo lang('upcoming'); ?></a></li>
                                        <li><a href="appointment/calendar" class="slide-item"><?php echo lang('calendar'); ?></a></li>
                                        <li><a href="appointment/request" class="slide-item"><?php echo lang('request'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="appointment/myTodays">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="none"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><g><path d="M18,16l4-4l-4-4v3h-5.06c-0.34-3.1-2.26-5.72-4.94-7.05C7.96,2.31,6.64,1,5,1C3.34,1,2,2.34,2,4s1.34,3,3,3 c0.95,0,1.78-0.45,2.33-1.14C9.23,6.9,10.6,8.77,10.92,11h-3.1C7.4,9.84,6.3,9,5,9c-1.66,0-3,1.34-3,3s1.34,3,3,3 c1.3,0,2.4-0.84,2.82-2h3.1c-0.32,2.23-1.69,4.1-3.58,5.14C6.78,17.45,5.95,17,5,17c-1.66,0-3,1.34-3,3s1.34,3,3,3 c1.64,0,2.96-1.31,2.99-2.95c2.68-1.33,4.6-3.95,4.94-7.05H18V16z"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('todays'); ?> <?php echo lang('appointment'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                                <span class="side-menu__label"><?php echo lang('human_resources'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <?php if (in_array('medicine', $this->modules)) { ?>
                                        <li><a href="nurse" class="slide-item"><?php echo lang('nurse'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('medicine', $this->modules)) { ?>
                                        <li><a href="pharmacist" class="slide-item"><?php echo lang('pharmacist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('medicine', $this->modules)) { ?>
                                        <li><a href="laboratorist" class="slide-item"><?php echo lang('laboratorist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('medicine', $this->modules)) { ?>
                                        <li><a href="accountant" class="slide-item"><?php echo lang('accountant'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('medicine', $this->modules)) { ?>
                                        <li><a href="receptionist" class="slide-item"><?php echo lang('receptionist'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('financial_activities'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">

                                        <li><a href="finance/payment" class="slide-item"><?php echo lang('payments'); ?></a></li>
                                        <li><a href="finance/addPaymentView" class="slide-item"><?php echo lang('add_payment'); ?></a></li>
                                        <li><a href="finance/paymentCategory" class="slide-item"><?php echo lang('payment_procedures'); ?></a></li>
                                        <li><a href="finance/expense" class="slide-item"><?php echo lang('expense'); ?></a></li>
                                        <li><a href="finance/addExpenseView" class="slide-item"><?php echo lang('add_expense'); ?></a></li>
                                        <li><a href="finance/expenseCategory" class="slide-item"><?php echo lang('expense_categories'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('Receptionist')) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="appointment/calendar">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('calendar'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('financial_activities'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="finance/payment" class="slide-item"><?php echo lang('payments'); ?></a></li>
                                        <li><a href="finance/addPaymentView" class="slide-item"><?php echo lang('add_payment'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="prescription/all">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('prescription'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Receptionist'))) { ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="lab/lab1">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('lab_reports'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Receptionist'))) { ?>
                            <?php if (in_array('form', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="form/form1">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('forms_reports'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="finance/UserActivityReport">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('user_activity_report'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php  } ?>

                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  href="prescription">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('prescription'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) { ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('labs'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="lab" class="slide-item"><?php echo lang('lab_reports'); ?></a></li>
                                        <li><a href="lab/addLabView" class="slide-item"><?php echo lang('add_lab_report'); ?></a></li>
                                        <li><a href="lab/template" class="slide-item"><?php echo lang('template'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) { ?>
                            <?php if (in_array('form', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('forms_reports'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="form" class="slide-item"><?php echo lang('forms_reports'); ?></a></li>
                                        <li><a href="form/addFormView" class="slide-item"><?php echo lang('add_form_report'); ?></a></li>
                                        <li><a href="form/template" class="slide-item"><?php echo lang('report_templates'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('medicine', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                    <span class="side-menu__label"><?php echo lang('medicine'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="medicine" class="slide-item"><?php echo lang('medicine_list'); ?></a></li>
                                        <li><a href="medicine/addMedicineView" class="slide-item"><?php echo lang('add_medicine'); ?></a></li>
                                        <li><a href="medicine/medicineCategory" class="slide-item"><?php echo lang('medicine_category'); ?></a></li>
                                        <li><a href="medicine/addCategoryView" class="slide-item"><?php echo lang('add_medicine_category'); ?></a></li>
                                        <li><a href="medicine/medicineStockAlert" class="slide-item"><?php echo lang('medicine_stock_alert'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        
                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <?php if (in_array('pharmacy', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('pharmacy'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <?php if (!$this->ion_auth->in_group(array('Pharmacist'))) { ?>
                                            <li><a href="finance/pharmacy/home" class="slide-item"><?php echo lang('dashboard'); ?></a></li>
                                        <?php } ?>
                                        <li><a href="finance/pharmacy/payment" class="slide-item"><?php echo lang('sales'); ?></a></li>
                                        <li><a href="finance/pharmacy/addPaymentView" class="slide-item"><?php echo lang('add_new_sale'); ?></a></li>
                                        <li><a href="finance/pharmacy/expense" class="slide-item"><?php echo lang('expense'); ?></a></li>
                                        <li><a href="finance/pharmacy/addExpenseView" class="slide-item"><?php echo lang('add_expense'); ?></a></li>
                                        <li><a href="finance/pharmacy/expenseCategory" class="slide-item"><?php echo lang('expense_categories'); ?></a></li>
                                        
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                                            <li class="sub-slide">
                                                <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label"><?php echo lang(''); ?> <?php echo lang('report'); ?></span><i class="sub-angle fe fe-chevron-down"></i></a>
                                                <ul class="sub-slide-menu">
                                                    <li><a class="sub-slide-item" href="finance/pharmacy/financialReport"><?php echo lang('pharmacy'); ?> <?php echo lang('report'); ?></a></li>
                                                    <li><a class="sub-slide-item" href="finance/pharmacy/monthly"><?php echo lang('monthly_sales'); ?></a></li>
                                                    <li><a class="sub-slide-item" href="finance/pharmacy/daily"><?php echo lang('daily_sales'); ?></a></li>
                                                    <li><a class="sub-slide-item" href="finance/pharmacy/monthlyExpense"><?php echo lang('monthly_expense'); ?></a></li>
                                                    <li><a class="sub-slide-item" href="finance/pharmacy/dailyExpense"><?php echo lang('daily_expense'); ?></a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                            <?php if (in_array('donor', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('donor') ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="donor" class="slide-item"><?php echo lang('donor_list'); ?></a></li>
                                        <li><a href="donor/addDonorView" class="slide-item"><?php echo lang('add_donor'); ?></a></li>
                                        <li><a href="donor/bloodBank" class="slide-item"><?php echo lang('blood_bank'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('bed', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('bed'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="bed" class="slide-item"><?php echo lang('bed_list'); ?></a></li>
                                        <li><a href="bed/addBedView" class="slide-item"><?php echo lang('add_bed'); ?></a></li>
                                        <li><a href="bed/bedCategory" class="slide-item"><?php echo lang('bed_category'); ?></a></li>
                                        <li><a href="bed/bedAllotment" class="slide-item"><?php echo lang('bed_allotments'); ?></a></li>
                                        <li><a href="bed/addAllotmentView" class="slide-item"><?php echo lang('add_allotment'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        
                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Laboratorist', 'Doctor'))) { ?>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span class="side-menu__label"><?php echo lang('report'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <?php if (in_array('finance', $this->modules)) { ?>
                                            <li><a href="finance/financialReport" class="slide-item"><?php echo lang('financial_report'); ?></a></li>
                                            <li><a href="finance/AllUserActivityReport" class="slide-item"><?php echo lang('user_activity_report'); ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <?php if (in_array('finance', $this->modules)) { ?>
                                            <li><a href="finance/doctorsCommission" class="slide-item"><?php echo lang('doctors_commission'); ?></a></li>
                                            <li><a href="finance/monthly" class="slide-item"><?php echo lang('monthly_sales'); ?></a></li>
                                            <li><a href="finance/daily" class="slide-item"><?php echo lang('daily_sales'); ?></a></li>
                                            <li><a href="finance/monthlyExpense" class="slide-item"><?php echo lang('monthly_expense'); ?></a></li>
                                            <li><a href="finance/dailyExpense" class="slide-item"><?php echo lang('daily_expense'); ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if (in_array('report', $this->modules)) { ?>
                                        <li><a href="report/birth" class="slide-item"><?php echo lang('birth_report'); ?></a></li>
                                        <li><a href="report/operation" class="slide-item"><?php echo lang('operation_report'); ?></a></li>
                                        <li><a href="report/expire" class="slide-item"><?php echo lang('expire_report'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('notice', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('notice'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="notice" class="slide-item"><?php echo lang('notice'); ?></a></li>
                                        <li><a href="notice/addNewView" class="slide-item"><?php echo lang('add_new'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('email', $this->modules)) { ?>                        
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('email'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="email/autoEmailTemplate" class="slide-item"><?php echo lang('autoemailtemplate'); ?></a></li>
                                        <li><a href="email/sendView" class="slide-item"><?php echo lang('new'); ?></a></li>
                                        <li><a href="email/sent" class="slide-item"><?php echo lang('sent'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>                                        
                                            <li><a href="email/settings" class="slide-item"><?php echo lang('settings'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('sms', $this->modules)) { ?>                   
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('sms'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="sms/autoSMSTemplate" class="slide-item"><?php echo lang('autosmstemplate'); ?></a></li>
                                        <li><a href="sms/sendView" class="slide-item"><?php echo lang('write_message'); ?></a></li>
                                        <li><a href="sms/sent" class="slide-item"><?php echo lang('sent_messages'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>                                        
                                            <li><a href="email/settings" class="slide-item"><?php echo lang('sms_settings'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>                        

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('sms', $this->modules)) { ?>                   
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('settings'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="settings" class="slide-item"><?php echo lang('system_settings'); ?></a></li>
                                        <li><a href="pgateway" class="slide-item"><?php echo lang('payment_gateway'); ?></a></li>
                                        <li><a href="settings/language" class="slide-item"><?php echo lang('language'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>                         

                        <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            <?php if (in_array('finance', $this->modules)) { ?>                
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    <span class="side-menu__label"><?php echo lang('payments'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="finance/payment" class="slide-item"><?php echo lang('payments'); ?></a></li>
                                        <li><a href="finance/addPaymentView" class="slide-item"><?php echo lang('add_payment'); ?></a></li>
                                        <li><a href="finance/paymentCategory" class="slide-item"><?php echo lang('payment_procedures'); ?></a></li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="finance/expense">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('expense'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="finance/addExpenseView">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('add_expense'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="finance/expenseCategory">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('expense_categories'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="finance/doctorsCommission">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('doctors_commission'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="finance/financialReport">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('financial_report'); ?></span></a>
                                </li>                                                                                                                                                                
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Pharmacist')) { ?>
                            <?php if (in_array('medicine', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="medicine">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('medicine_list'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="medicine/addMedicineView">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('add_medicine'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="medicine/medicineCategory">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('medicine_category'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="medicine/addCategoryView">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('add_medicine_category'); ?></span></a>
                                </li>                                                                                                
                            <?php } ?>
                        <?php  } ?>

                        <?php if ($this->ion_auth->in_group('Nurse')) { ?>
                            <?php if (in_array('bed', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="bed">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('bed_list'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="bed/bedCategory">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('bed_category'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="bed/bedAllotment">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('bed_allotments'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('donor', $this->modules)) { ?>                                                            
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="donor">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('donor'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="donor/bloodBank">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('blood_bank'); ?></span></a>
                                </li>                                                                                                                             
                            <?php } ?>
                        <?php  } ?>
                        
                        <?php if ($this->ion_auth->in_group('Patient')) { ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="lab/myLab">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('diagnosis'); ?> <?php echo lang('reports'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('form', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="form/myForm">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('diagnosis'); ?> <?php echo lang('reports'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>                                                            
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="patient/calendar">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('patient', $this->modules)) { ?>                                                               
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="patient/myCaseList">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('cases'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>                                                            
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="patient/myPrescription">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('prescription'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('patient', $this->modules)) { ?>                                                           
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="patient/myDocuments">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('documents'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('finance', $this->modules)) { ?>                                                            
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="patient/myPaymentHistory">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('payment'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('report', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="report/myreports">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('other'); ?> <?php echo lang('reports'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('donor', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="donor">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('donor'); ?></span></a>
                                </li>                                                          
                            <?php } ?>
                        <?php  } ?>

                        <?php if ($this->ion_auth->in_group('im')) { ?>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="patient/addNewView">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('add_patient'); ?></span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="finance/addPaymentView">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('add_payment'); ?> </span></a>
                            </li>
                        <?php  } ?>

                        <?php if (!$this->ion_auth->in_group(array('admin', 'Patient', 'superadmin'))) { ?>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                <span class="side-menu__label"><?php echo lang('email'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a href="email/sendView" class="slide-item"><?php echo lang('new'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('superadmin')) { ?>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="hospital">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('all_hospitals'); ?></span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="hospital/addNewView">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('create_new_hospital'); ?></span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="hospital/package">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('packages'); ?></span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="hospital/package/addNewView">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('add_new_package'); ?></span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="request">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('requests'); ?></span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                <span class="side-menu__label"><?php echo lang('website'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a href="frontend" class="slide-item"><?php echo lang('visit_site'); ?></a></li>
                                    <li><a href="frontend/settings" class="slide-item"><?php echo lang('website_settings'); ?></a></li>
                                    <li><a href="slide" class="slide-item"><?php echo lang('new'); ?></a></li>
                                    <li><a href="service" class="slide-item"><?php echo lang('services'); ?></a></li>
                                </ul>
                            </li>         
                        <?php  } ?>                                                                  

                        <li class="slide">
                            <a class="side-menu__item" href="profile">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="side-menu__label"><?php echo lang('profile'); ?> </span></a>
                        </li>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="settings/subscription">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="side-menu__label"><?php echo lang('subscription'); ?></span></a>
                            </li>
                        <?php } ?> 
                    </ul>
                    <div class="app-sidebar-help">
                        <div class="dropdown text-center">
                            <div class="help d-flex">
                                <a href="#" class="nav-link p-0 help-dropdown" data-toggle="dropdown">
                                    <span class="font-weight-bold">Help Info</span> <i class="fa fa-angle-down ml-2"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-4">
                                    <div class="border-bottom pb-3">
                                        <h4 class="font-weight-bold">Help</h4>
                                        <a class="text-primary d-block" href="#">Sugbodoc</a>
                                        <a class="text-primary d-block" href="#">sugbodoc@gmail.com</a>
                                        <a class="text-primary d-block" href="#">+63 32 5202271</a>
                                    </div>
                                    <div class="border-bottom pb-3 pt-3 mb-3">
                                        <p class="mb-1">Whatsapp Number</p>
                                        <a class="font-weight-bold" href="#">+63-961-632-7980</a>
                                    </div>
                                    <a class="text-primary" href="#">Logout</a>
                                </div>
                                <div class="ml-auto">
                                    <a class="nav-link icon p-0" href="#">
                                        <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path opacity=".3" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path></svg>
                                        <span class="pulse "></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--aside closed-->

                <div class="app-content main-content">
                    <div class="side-app">

                        <!--app header-->
                        <div class="app-header header top-header">
                            <div class="container-fluid">
                                <div class="d-flex">
                                    <a class="header-brand" href="<?php echo base_url('home'); ?>">
                                        <img src="<?php echo base_url('public/assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-lgo" alt="Rygel Dash logo">
                                        <img src="<?php echo base_url('public/assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-logo" alt="Rygel Dash logo">
                                        <img src="<?php echo base_url('public/assets/images/brand/favicon.png'); ?>" class="header-brand-img mobile-logo" alt="Rygel Dash logo">
                                        <img src="<?php echo base_url('public/assets/images/brand/favicon1.png'); ?>" class="header-brand-img darkmobile-logo" alt="Rygel Dash logo">
                                    </a>
                                    <div class="dropdown side-nav">
                                        <div class="app-sidebar__toggle" data-toggle="sidebar">
                                            <a class="open-toggle" href="#">
                                                <svg class="header-icon mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                            </a>
                                            <a class="close-toggle" href="#">
                                                <svg class="header-icon mt-1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Bed Notification start -->
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse'))) { ?> 
                                        <?php if (in_array('bed', $this->modules)) { ?>                                    
                                            <div class="dropdown  header-option">
                                                <a class="nav-link icon" data-toggle="dropdown">
                                                    <i class="fa fa-bed floating"></i>
                                                    <span class="nav-unread badge bg-secondary badge-pill">
                                                        <?php
                                                        $this->db->where('hospital_id', $this->hospital_id);
                                                        $query = $this->db->get('bed')->result();
                                                        $available_bed = 0;
                                                        foreach ($query as $bed) {
                                                            $last_a_time = explode('-', $bed->last_a_time);
                                                            $last_d_time = explode('-', $bed->last_d_time);
                                                            if (!empty($last_d_time[1])) {
                                                                $last_d_h_am_pm = explode(' ', $last_d_time[1]);
                                                                $last_d_h = explode(':', $last_d_h_am_pm[1]);
                                                                if ($last_d_h_am_pm[2] == 'AM') {
                                                                    $last_d_m = ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                                                                } else {
                                                                    $last_d_m = (12 * 60 * 60) + ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                                                                }
                                                                $last_d_time_s = strtotime($last_d_time[0]) + $last_d_m;
                                                                if (time() > $last_d_time_s) {
                                                                    $available_bed = $available_bed + 1;
                                                                }
                                                            } else {
                                                                $available_bed = $available_bed + 1;
                                                            }
                                                        }
                                                        echo $available_bed;
                                                        ?>                                                
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                                                    <div class=" text-center p-2 border-bottom">
                                                        <a href="#" class="">
                                                            <?php
                                                            if (!empty($query)) {
                                                                echo $available_bed;
                                                            } else {
                                                                $available_bed = 0;
                                                                echo $available_bed;
                                                            }
                                                            ?> 
                                                            <?php
                                                            if ($available_bed <= 1) {
                                                                echo lang('bed_is_available');
                                                            } else {
                                                                echo lang('beds_are_available');
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <a class="dropdown-item d-flex pb-3" href="bed/bedAllotment">
                                                        <div class="notifyimg bg-success">
                                                            <i class="fe fe-plus"></i>
                                                        </div>
                                                        <div>
                                                            <div class="mt-2">
                                                                <?php
                                                                if ($available_bed > 0) {
                                                                    echo lang('add_a_allotment');
                                                                } else {
                                                                    echo lang('no_bed_is_available_for_allotment');
                                                                }
                                                                ?>
                                                            </div>
                                                            <!-- <div class="small text-muted">45 mintues ago</div> -->
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- Bed notification end -->
                                    <!-- Payment notification start--> 
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?> 
                                        <?php if (in_array('finance', $this->modules)) { ?>                                                                        
                                            <div class="dropdown  header-option">
                                                <a class="nav-link icon" data-toggle="dropdown">
                                                    <i class="fa fa-credit-card floating"></i>
                                                    <span class="nav-unread badge bg-secondary badge-pill">
                                                        <?php
                                                        $this->db->where('hospital_id', $this->hospital_id);
                                                        $query = $this->db->get('payment');
                                                        $query = $query->result();
                                                        foreach ($query as $payment) {
                                                            $payment_date = date('y/m/d', $payment->date);
                                                            if ($payment_date == date('y/m/d')) {
                                                                $payment_number[] = '1';
                                                            }
                                                        }
                                                        if (!empty($payment_number)) {
                                                            echo $payment_number = array_sum($payment_number);
                                                        } else {
                                                            $payment_number = 0;
                                                            echo $payment_number;
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                                                    <div class=" text-center p-2 border-bottom">
                                                        <a href="#" class="">
                                                            <?php
                                                            echo $payment_number . ' ';
                                                            if ($payment_number <= 1) {
                                                                echo lang('payment_today');
                                                            } else {
                                                                echo lang('payments_today');
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <a href="finance/payment" class="dropdown-item d-flex pb-3">
                                                        <div class="notifyimg bg-info">
                                                            <i class="fe fe-eye"></i>
                                                        </div>
                                                        <div>
                                                            <div class="mt-2"><?php echo lang('see_all_payments'); ?></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- payment notification end -->
                                    <!-- patient notification start--> 
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist'))) { ?> 
                                        <?php if (in_array('patient', $this->modules)) { ?>                                                                     
                                            <div class="dropdown  header-option">
                                                <a class="nav-link icon" data-toggle="dropdown">
                                                    <i class="fa fa-user-plus floating"></i>
                                                    <span class=" nav-unread badge bg-secondary badge-pill">
                                                        <?php
                                                        $this->db->where('hospital_id', $this->hospital_id);
                                                        $this->db->where('add_date', date('m/d/y'));
                                                        $query = $this->db->get('patient');
                                                        $query = $query->result();
                                                        foreach ($query as $patient) {
                                                            $patient_number[] = '1';
                                                        }
                                                        if (!empty($patient_number)) {
                                                            echo $patient_number = array_sum($patient_number);
                                                        } else {
                                                            $patient_number = 0;
                                                            echo $patient_number;
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                                                    <div class=" text-center p-2 border-bottom">
                                                        <a href="#" class="">
                                                            <?php
                                                            echo $patient_number . ' ';
                                                            if ($patient_number <= 1) {
                                                                echo lang('patient_registerred_today');
                                                            } else {
                                                                echo lang('patients_registerred_today');
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <a href="patient" class="dropdown-item d-flex pb-3">
                                                        <div class="notifyimg bg-info">
                                                            <i class="fe fe-eye"></i>
                                                        </div>
                                                        <div>
                                                            <div class="mt-2"><?php echo lang('see_all_patients'); ?></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- patient notification end -->  
                                    <!-- donor notification start-->
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Laboratorist'))) { ?> 
                                        <?php if (in_array('donor', $this->modules)) { ?>                                                                          
                                            <div class="dropdown  header-option">
                                                <a class="nav-link icon" data-toggle="dropdown">
                                                    <i class="fa fa-signing floating"></i>
                                                    <span class=" nav-unread badge bg-secondary badge-pill">
                                                        <?php
                                                        $this->db->where('hospital_id', $this->hospital_id);
                                                        $this->db->where('add_date', date('m/d/y'));
                                                        $query = $this->db->get('donor');
                                                        $query = $query->result();
                                                        foreach ($query as $donor) {
                                                            $donor_number[] = '1';
                                                        }
                                                        if (!empty($donor_number)) {
                                                            echo $donor_number = array_sum($donor_number);
                                                        } else {
                                                            $donor_number = 0;
                                                            echo $donor_number;
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                                                    <div class=" text-center p-2 border-bottom">
                                                        <a href="#" class="">
                                                            <?php
                                                            echo $donor_number . ' ';
                                                            if ($donor_number <= 1) {
                                                                echo lang('donor_registerred_today');
                                                            } else {
                                                                echo lang('donors_registerred_today');
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <a href="donor" class="dropdown-item d-flex pb-3">
                                                        <div class="notifyimg bg-info">
                                                            <i class="fe fe-eye"></i>
                                                        </div>
                                                        <div>
                                                            <div class="mt-2"><?php echo lang('see_all_donors'); ?></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- donor notification end -->  
                                    <!-- medicine notification start--> 
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Doctor'))) { ?> 
                                        <?php if (in_array('medicine', $this->modules)) { ?>                                                                                
                                            <div class="dropdown  header-option">
                                                <a class="nav-link icon" data-toggle="dropdown">
                                                    <i class="fa fa-medkit floating"></i>
                                                    <span class=" nav-unread badge bg-secondary badge-pill">
                                                        <?php
                                                        $this->db->where('hospital_id', $this->hospital_id);
                                                        $this->db->where('add_date', date('m/d/y'));
                                                        $query = $this->db->get('medicine');
                                                        $query = $query->result();
                                                        foreach ($query as $medicine) {
                                                            $medicine_number[] = '1';
                                                        }
                                                        if (!empty($medicine_number)) {
                                                            echo $medicine_number = array_sum($medicine_number);
                                                        } else {
                                                            $medicine_number = 0;
                                                            echo $medicine_number;
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                                                    <div class=" text-center p-2 border-bottom">
                                                        <a href="#" class="">
                                                            <?php
                                                            echo $medicine_number . ' ';
                                                            if ($medicine_number <= 1) {
                                                                echo lang('medicine_registerred_today');
                                                            } else {
                                                                echo lang('medicines_registered_today');
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <a href="medicine" class="dropdown-item d-flex pb-3">
                                                        <div class="notifyimg bg-info">
                                                            <i class="fe fe-eye"></i>
                                                        </div>
                                                        <div>
                                                            <div class="mt-2"><?php echo lang('see_all_medicines'); ?></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- medicine notification end -->  
                                    <!-- report notification start-->
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Nurse'))) { ?> 
                                        <?php if (in_array('report', $this->modules)) { ?>                                                                                 
                                            <div class="dropdown  header-option">
                                                <a class="nav-link icon" data-toggle="dropdown">
                                                    <i class="fa fa-file-text floating"></i>
                                                    <span class=" nav-unread badge bg-secondary badge-pill">
                                                        <?php
                                                        $this->db->where('hospital_id', $this->hospital_id);
                                                        $this->db->where('add_date', date('m/d/y'));
                                                        $query = $this->db->get('report');
                                                        $query = $query->result();
                                                        foreach ($query as $report) {
                                                            $report_number[] = '1';
                                                        }
                                                        if (!empty($report_number)) {
                                                            echo $report_number = array_sum($report_number);
                                                        } else {
                                                            $report_number = 0;
                                                            echo $report_number;
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                                                    <div class=" text-center p-2 border-bottom">
                                                        <a href="#" class="">
                                                            <?php
                                                            echo $report_number . ' ';
                                                            if ($report_number <= 1) {
                                                                echo lang('report_added_today');
                                                            } else {
                                                                echo lang('reports_added_today');
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <a href="report" class="dropdown-item d-flex pb-3">
                                                        <div class="notifyimg bg-info">
                                                            <i class="fe fe-eye"></i>
                                                        </div>
                                                        <div>
                                                            <div class="mt-2"><?php echo lang('see_all_reports'); ?></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- report notification end -->            
                                    <div class="d-flex order-lg-2 ml-auto">
                                        
                                        <div class="dropdown profile-dropdown">
                                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                                <span>
                                                    <img src="<?php echo base_url('public/assets/images/users/16.jpg'); ?>" alt="img" class="avatar avatar-md brround">
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                                                <div class="text-center">
                                                    <a href="#" class="dropdown-item text-center user pb-0 font-weight-bold">
                                                        <?php
                                                        $username = $this->ion_auth->user()->row()->username;
                                                        if (!empty($username)) {
                                                            echo $username;
                                                        }
                                                        ?>         
                                                    </a>
                                                    <span class="text-center user-semi-title"><?php echo $this->ion_auth->get_users_groups()->row()->name ?></span>
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                                                    <a class="dropdown-item d-flex" href="#">
                                                        <svg class="header-icon mr-3" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                            <path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/>
                                                        </svg>
                                                        <div class="mt-1"><?php echo lang('dashboard'); ?></div>
                                                    </a>
                                                <?php } ?>
                                                <a class="dropdown-item d-flex" href="profile">
                                                    <svg class="header-icon mr-3" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/>
                                                    </svg>
                                                    <div class="mt-1"><?php echo lang('profile'); ?></div>
                                                </a>
                                                
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a class="dropdown-item d-flex" href="settings">
                                                        <svg class="header-icon mr-3" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                            <path opacity=".3" d="M19.28,8.6 L18.58,7.39 L17.31,7.9 L16.25,8.33 L15.34,7.63 C14.95,7.33 14.54,7.09 14.11,6.92 L13.05,6.49 L12.89,5.36 L12.7,4 L11.3,4 L11.11,5.35 L10.95,6.48 L9.89,6.92 C9.48,7.09 9.07,7.33 8.64,7.65 L7.74,8.33 L6.69,7.91 L5.42,7.39 L4.72,8.6 L5.8,9.44 L6.69,10.14 L6.55,11.27 C6.52,11.57 6.5,11.8 6.5,12 C6.5,12.2 6.52,12.43 6.55,12.73 L6.69,13.86 L5.8,14.56 L4.72,15.4 L5.42,16.61 L6.69,16.1 L7.75,15.67 L8.66,16.37 C9.05,16.67 9.46,16.91 9.89,17.08 L10.95,17.51 L11.11,18.64 L11.3,20 L12.69,20 L12.88,18.65 L13.04,17.52 L14.1,17.09 C14.51,16.92 14.92,16.68 15.35,16.36 L16.25,15.68 L17.29,16.1 L18.56,16.61 L19.26,15.4 L18.18,14.56 L17.29,13.86 L17.43,12.73 C17.47,12.42 17.48,12.21 17.48,12 C17.48,11.79 17.46,11.57 17.43,11.27 L17.29,10.14 L18.18,9.44 L19.28,8.6 Z M12,16 C9.79,16 8,14.21 8,12 C8,9.79 9.79,8 12,8 C14.21,8 16,9.79 16,12 C16,14.21 14.21,16 12,16 Z"></path>
                                                            <path d="M19.43,12.98 C19.47,12.66 19.5,12.34 19.5,12 C19.5,11.66 19.47,11.34 19.43,11.02 L21.54,9.37 C21.73,9.22 21.78,8.95 21.66,8.73 L19.66,5.27 C19.57,5.11 19.4,5.02 19.22,5.02 C19.16,5.02 19.1,5.03 19.05,5.05 L16.56,6.05 C16.04,5.65 15.48,5.32 14.87,5.07 L14.49,2.42 C14.46,2.18 14.25,2 14,2 L10,2 C9.75,2 9.54,2.18 9.51,2.42 L9.13,5.07 C8.52,5.32 7.96,5.66 7.44,6.05 L4.95,5.05 C4.89,5.03 4.83,5.02 4.77,5.02 C4.6,5.02 4.43,5.11 4.34,5.27 L2.34,8.73 C2.21,8.95 2.27,9.22 2.46,9.37 L4.57,11.02 C4.53,11.34 4.5,11.67 4.5,12 C4.5,12.33 4.53,12.66 4.57,12.98 L2.46,14.63 C2.27,14.78 2.22,15.05 2.34,15.27 L4.34,18.73 C4.43,18.89 4.6,18.98 4.78,18.98 C4.84,18.98 4.9,18.97 4.95,18.95 L7.44,17.95 C7.96,18.35 8.52,18.68 9.13,18.93 L9.51,21.58 C9.54,21.82 9.75,22 10,22 L14,22 C14.25,22 14.46,21.82 14.49,21.58 L14.87,18.93 C15.48,18.68 16.04,18.34 16.56,17.95 L19.05,18.95 C19.11,18.97 19.17,18.98 19.23,18.98 C19.4,18.98 19.57,18.89 19.66,18.73 L21.66,15.27 C21.78,15.05 21.73,14.78 21.54,14.63 L19.43,12.98 Z M17.45,11.27 C17.49,11.58 17.5,11.79 17.5,12 C17.5,12.21 17.48,12.43 17.45,12.73 L17.31,13.86 L18.2,14.56 L19.28,15.4 L18.58,16.61 L17.31,16.1 L16.27,15.68 L15.37,16.36 C14.94,16.68 14.53,16.92 14.12,17.09 L13.06,17.52 L12.9,18.65 L12.7,20 L11.3,20 L11.11,18.65 L10.95,17.52 L9.89,17.09 C9.46,16.91 9.06,16.68 8.66,16.38 L7.75,15.68 L6.69,16.11 L5.42,16.62 L4.72,15.41 L5.8,14.57 L6.69,13.87 L6.55,12.74 C6.52,12.43 6.5,12.2 6.5,12 C6.5,11.8 6.52,11.57 6.55,11.27 L6.69,10.14 L5.8,9.44 L4.72,8.6 L5.42,7.39 L6.69,7.9 L7.73,8.32 L8.63,7.64 C9.06,7.32 9.47,7.08 9.88,6.91 L10.94,6.48 L11.1,5.35 L11.3,4 L12.69,4 L12.88,5.35 L13.04,6.48 L14.1,6.91 C14.53,7.09 14.93,7.32 15.33,7.62 L16.24,8.32 L17.3,7.89 L18.57,7.38 L19.27,8.59 L18.2,9.44 L17.31,10.14 L17.45,11.27 Z M12,8 C9.79,8 8,9.79 8,12 C8,14.21 9.79,16 12,16 C14.21,16 16,14.21 16,12 C16,9.79 14.21,8 12,8 Z M12,14 C10.9,14 10,13.1 10,12 C10,10.9 10.9,10 12,10 C13.1,10 14,10.9 14,12 C14,13.1 13.1,14 12,14 Z" ></path>
                                                        </svg>
                                                        <div class="mt-1">Settings</div>
                                                    </a>
                                                <?php } ?>
                                                <a class="dropdown-item d-flex" href="auth/logout">
                                                    <svg class="header-icon mr-3" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                        <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M6 20h12V10H6v10zm2-6h3v-3h2v3h3v2h-3v3h-2v-3H8v-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM8.9 6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2H8.9V6zM18 20H6V10h12v10zm-7-1h2v-3h3v-2h-3v-3h-2v3H8v2h3z"/>
                                                    </svg>
                                                    <div class="mt-1"><?php echo lang('log_out'); ?></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




