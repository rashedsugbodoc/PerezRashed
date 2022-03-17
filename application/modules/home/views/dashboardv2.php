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
        <link rel="shortcut icon" href="public/assets/images/brand/favicon.ico">
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
        <link rel="icon" href="<?php echo base_url('public/assets/images/brand/favicon.png'); ?>" type="image/x-icon"/>

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
        <!-- Data table css -->
        <link href="<?php echo base_url('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/datatable/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/datatable/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" />  

        <!-- Slect2 css -->
        <link href="<?php echo base_url('public/assets/plugins/select2/select2.min.css'); ?>" rel="stylesheet" />      

        <!-- File Uploads css -->
        <link href="<?php echo base_url('public/assets/plugins/fancyuploder/fancy_fileupload.css'); ?>" rel="stylesheet" />

        <!--Daterangepicker css-->
        <link href="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet" />

        <!-- Fullcalendar css-->
        <link href='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.css'); ?>' rel='stylesheet' />

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

        <!-- Notifications  Css -->
        <link href="<?php echo base_url('public/assets/plugins/notify/css/jquery.growl.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/notify/css/notifIt.css'); ?>" rel="stylesheet" />

        <!-- News-Ticker css-->
        <link href="<?php echo base_url('public/assets/plugins/newsticker/newsticker.css') ?>" rel="stylesheet" />  

        <!-- Prism Css -->
        <link href="<?php echo base_url('public/assets/plugins/prism/prism.css'); ?>" rel="stylesheet">

        <!-- Accordion Css -->
        <link href="<?php echo base_url('public/assets/plugins/accordion/accordion.css'); ?>" rel="stylesheet" />  

        <link href="<?php echo base_url('public/assets/plugins/form-wizard/css/form-wizard.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/formwizard/smart_wizard.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/formwizard/smart_wizard_theme_dots.css'); ?>" rel="stylesheet">
        
        <!-- Image Editor -->
        <link href="<?php echo base_url('public/assets/plugins/image-editor/styles.min.css'); ?>" rel="stylesheet" />    
        <link rel="stylesheet" type="text/css" href="common/assets/jquery-multi-select/css/multi-select.css" />

        <!-- ion.rangeSlider css -->
        <link href="<?php echo base_url('public/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css'); ?>" rel="stylesheet">

        <!-- INTERNAL CSS END -->

        <style>
            div#ui-datepicker-div {
                z-index: 10001 !important;
            }
            div#ui-datepicker-div2 {
                z-index: 10001 !important;
            }
            div#ui-datepicker-div3 {
                z-index: 10001 !important;
            }
            .ui-timepicker-wrapper {
                z-index: 10001 !important;
            }
            .app-sidebar.app-sidebar2 {
                z-index: 976 !important;
            }
            a.dt-button.dropdown-item.buttons-columnVisibility {
                background-color: #ffffff;
                color: #4454c3;
            }
            a.dt-button.dropdown-item.buttons-columnVisibility:hover {
                background-color: #ffffff;
                color: #343a40;
            }
            a.dt-button.dropdown-item.buttons-columnVisibility.active {
                background-color: #4454c3;
                color: #ffffff;
            }
            a.dt-button.dropdown-item.buttons-columnVisibility.active:hover {
                background-color: #4454c3;
                color: #343a40;
            }
            .dt-button-collection.dropdown-menu{
                border: solid 1px;
                /*padding: 0px;*/
                border-radius: 0px;
                padding-top: 1px;
                padding-bottom: 1px;
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
        <div id="global-loader" >
            <img src="<?php echo base_url('public/assets/images/svgs/loader.svg'); ?>" alt="loader">
        </div>
        <div class="page">
            <div class="page-main">
                <?php
                date_default_timezone_set($this->settings_model->getSettings()->timezone);
                ?>
                <!--aside open-->
                <div class="app-sidebar app-sidebar2">
                    <div class="app-sidebar__logo">
                        <a class="header-brand" href="<?php echo base_url('home'); ?>">
                            <!--logo start-->
                            <img src="<?php echo base_url('public/assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-lgo" alt="Rygel Dash logo">
                            <img src="<?php echo base_url('public/assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-logo" alt="Rygel Dash logo">
                            <img src="<?php echo base_url('public/assets/images/brand/favicon.png'); ?>" class="header-brand-img mobile-logo" alt="Rygel Dash logo">
                            <img src="<?php echo base_url('public/assets/images/brand/favicon1.png'); ?>" class="header-brand-img darkmobile-logo" alt="Rygel Dash logo">
                            <!--logo end-->
                        </a>
                    </div>
                </div>
                <aside class="app-sidebar app-sidebar3">
                    <ul class="side-menu">
                        <li>
                            <a class="side-menu__item" href="home">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><g opacity="1"><path d="M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"/></g><g fill="currentColor" ><path d="M16,11V3H8v6H2v12h20V11H16z M10,5h4v14h-4V5z M4,11h4v8H4V11z M20,19h-4v-6h4V19z"/></g></svg>
                            <span class="side-menu__label"><?php echo lang('dashboard'); ?></span></a>
                        </li>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <?php if (in_array('department', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" href="patient/addNewView">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><g fill="currentColor"><path d="M22,11V3h-7v3H9V3H2v8h7V8h2v10h4v3h7v-8h-7v3h-2V8h2v3H22z M7,9H4V5h3V9z M17,15h3v4h-3V15z M17,5h3v4h-3V5z"/><polyline opacity=".3" points="7,5 7,9 4,9 4,5 7,5"/><polyline opacity=".3" points="20,5 20,9 17,9 17,5 20,5"/><polyline opacity=".3" points="20,15 20,19 17,19 17,15 20,15"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('register_new_patient'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <?php if (in_array('department', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" href="department">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><g fill="currentColor"><path d="M22,11V3h-7v3H9V3H2v8h7V8h2v10h4v3h7v-8h-7v3h-2V8h2v3H22z M7,9H4V5h3V9z M17,15h3v4h-3V15z M17,5h3v4h-3V5z"/><polyline opacity=".3" points="7,5 7,9 4,9 4,5 7,5"/><polyline opacity=".3" points="20,5 20,9 17,9 17,5 20,5"/><polyline opacity=".3" points="20,15 20,19 17,19 17,15 20,15"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('departments'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('company', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 19h6V5H7v14zm3-8h2v2h-2v-2z" opacity=".3"/><path d="M19 19V4h-4V3H5v16H3v2h12V6h2v15h4v-2h-2zm-6 0H7V5h6v14zm-3-8h2v2h-2z" fill="currentColor"/></svg>
                                    <span class="side-menu__label"><?php echo lang('encounter'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="encounter" class="slide-item"><?php echo lang('all') . ' ' . lang('encounter'); ?></a></li>
                                        <li><a href="encounter/addNewView" class="slide-item"><?php echo lang('add_new');?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'CompanyUser'))) { ?>
                            <?php if (in_array('company', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="8" opacity="1" r="2.1"/><path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity="1"/><path fill="currentColor" d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1c1.16 0 2.1.94 2.1 2.1 0 1.16-.94 2.1-2.1 2.1S9.9 9.16 9.9 8c0-1.16.94-2.1 2.1-2.1z"/></svg>
                                    <span class="side-menu__label"><?php echo lang('accounts'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="company" class="slide-item"><?php echo lang('payer_accounts'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('admission', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g fill="currentColor" ><g><rect height="3" opacity=".3" width="16" x="4" y="12"/><path d="M20,10V7c0-1.1-0.9-2-2-2H6C4.9,5,4,5.9,4,7v3c-1.1,0-2,0.9-2,2v5h1.33L4,19h1l0.67-2h12.67L19,19h1l0.67-2H22v-5 C22,10.9,21.1,10,20,10z M13,7h5v3h-5V7z M6,7h5v3H6V7z M20,15H4v-3h16V15z"/></g></g></svg>
                                    <span class="side-menu__label"><?php echo lang('admissions'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="bed/bedAllotment" class="slide-item"><?php echo lang('admissions'); ?></a></li>
                                        <li><a href="bed/addAllotmentView" class="slide-item"><?php echo lang('add_admission'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('doctor', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24px" height="24px"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zM104 424c0 13.3 10.7 24 24 24s24-10.7 24-24-10.7-24-24-24-24 10.7-24 24zm216-135.4v49c36.5 7.4 64 39.8 64 78.4v41.7c0 7.6-5.4 14.2-12.9 15.7l-32.2 6.4c-4.3.9-8.5-1.9-9.4-6.3l-3.1-15.7c-.9-4.3 1.9-8.6 6.3-9.4l19.3-3.9V416c0-62.8-96-65.1-96 1.9v26.7l19.3 3.9c4.3.9 7.1 5.1 6.3 9.4l-3.1 15.7c-.9 4.3-5.1 7.1-9.4 6.3l-31.2-4.2c-7.9-1.1-13.8-7.8-13.8-15.9V416c0-38.6 27.5-70.9 64-78.4v-45.2c-2.2.7-4.4 1.1-6.6 1.9-18 6.3-37.3 9.8-57.4 9.8s-39.4-3.5-57.4-9.8c-7.4-2.6-14.9-4.2-22.6-5.2v81.6c23.1 6.9 40 28.1 40 53.4 0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.3 16.9-46.5 40-53.4v-80.4C48.5 301 0 355.8 0 422.4v44.8C0 491.9 20.1 512 44.8 512h358.4c24.7 0 44.8-20.1 44.8-44.8v-44.8c0-72-56.8-130.3-128-133.8z"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('doctor'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="doctor" class="slide-item"><?php echo lang('list_of_doctors'); ?></a></li>
                                        <li><a href="appointment/treatmentReport" class="slide-item"><?php echo lang('treatment_history'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                            <?php if (in_array('patient', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zm-7 1c1.65 0 3 1.35 3 3s-1.35 3-3 3-3-1.35-3-3 1.35-3 3-3zm6 12H6v-1.53c0-2.5 3.97-3.58 6-3.58s6 1.08 6 3.58V18z" opacity=".3"/><path fill="currentColor" d="M20.66 3.88c-.14-.21-.33-.4-.54-.54-.11-.07-.22-.13-.34-.18-.24-.1-.5-.16-.78-.16h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c.28 0 .54-.06.78-.16.12-.05.23-.11.34-.18.21-.14.4-.33.54-.54.21-.32.34-.71.34-1.12V5c0-.41-.13-.8-.34-1.12zM12 2.75c.22 0 .41.1.55.25.12.13.2.31.2.5 0 .41-.34.75-.75.75s-.75-.34-.75-.75c0-.19.08-.37.2-.5.14-.15.33-.25.55-.25zM19 19H5V5h14v14zm-7-7c1.65 0 3-1.35 3-3s-1.35-3-3-3-3 1.35-3 3 1.35 3 3 3zm0-2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm0 2.88c-2.03 0-6 1.08-6 3.58V18h12v-1.53c0-2.51-3.97-3.59-6-3.59zM8.31 16c.69-.56 2.38-1.12 3.69-1.12s3.01.56 3.69 1.12H8.31z"/></svg>
                                    <span class="side-menu__label"><?php echo lang('patient'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="patient" class="slide-item"><?php echo lang('patient_list'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?>
                                            <li><a href="patient/patientPayments" class="slide-item"><?php echo lang('payments'); ?></a></li>
                                        <?php } ?>
                                        <?php if (!$this->ion_auth->in_group(array('Accountant', 'Laboratorist'))) { ?>
                                        <li><a href="patient/caseList" class="slide-item"><?php echo lang('case_notes'); ?></a></li>
                                        <?php } ?>
                                        <?php if ($this->ion_auth->in_group(array('DoctorAdmin', 'Doctor', 'admin'))) { ?>
                                            <li><a href="patient/documents" class="slide-item"><?php echo lang('documents'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 8h14V6H5z" opacity="1" /><path d="M7 11h2v2H7zm12-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-4 3h2v2h-2zm-4 0h2v2h-2z"  fill="currentColor"/></svg>
                                    <span class="side-menu__label"><?php echo lang('schedule'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                                            <li><a href="schedule" class="slide-item"><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>
                                            <li><a href="schedule/allHolidays" class="slide-item"><?php echo lang('holidays'); ?></a></li>
                                        <?php } ?>
                                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                            <li><a href="schedule/timeSchedule" class="slide-item"><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>
                                            <li><a href="schedule/holidays" class="slide-item"><?php echo lang('holidays'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><rect height="2" opacity="1" width="14" x="5" y="6"/><path fill="currentColor" d="M5,10h14v2h2V6c0-1.1-0.9-2-2-2h-1V2h-2v2H8V2H6v2H5C3.89,4,3.01,4.9,3.01,6L3,20c0,1.1,0.89,2,2,2h7v-2H5V10z M5,6h14v2H5 V6z M22.84,16.28l-0.71,0.71l-2.12-2.12l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71C23.23,15.26,23.23,15.89,22.84,16.28z M19.3,15.58l2.12,2.12l-5.3,5.3H14v-2.12L19.3,15.58z"/></svg>
                                    <span class="side-menu__label"><?php echo lang('appointment'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="appointment" class="slide-item"><?php echo lang('all'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                            <li><a href="appointment/addNewView" class="slide-item"><?php echo lang('add'); ?></a></li>
                                        <?php } ?>
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
                                    <a class="side-menu__item"  href="appointment/myTodays">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><rect height="2" opacity="1" width="14" x="5" y="6"/><path fill="currentColor" d="M5,10h14v2h2V6c0-1.1-0.9-2-2-2h-1V2h-2v2H8V2H6v2H5C3.89,4,3.01,4.9,3.01,6L3,20c0,1.1,0.89,2,2,2h7v-2H5V10z M5,6h14v2H5 V6z M22.84,16.28l-0.71,0.71l-2.12-2.12l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71C23.23,15.26,23.23,15.89,22.84,16.28z M19.3,15.58l2.12,2.12l-5.3,5.3H14v-2.12L19.3,15.58z"/></svg>
                                    <span class="side-menu__label"><?php echo lang('todays'); ?> <?php echo lang('appointment'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item"  href="patient/findDoctors">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g fill="currentColor"><g><g><path d="M4,18c0.22-0.72,3.31-2,6-2c0-0.7,0.13-1.37,0.35-1.99C7.62,13.91,2,15.27,2,18v2h9.54c-0.52-0.58-0.93-1.25-1.19-2H4z"/><path d="M10,13c2.21,0,4-1.79,4-4c0-2.21-1.79-4-4-4C7.79,5,6,6.79,6,9C6,11.21,7.79,13,10,13z M10,7c1.1,0,2,0.89,2,2 c0,1.1-0.9,2-2,2s-2-0.9-2-2C8,7.89,8.9,7,10,7z"/><g opacity=".3"><path d="M10.35,18c0,0-0.35-0.79-0.35-2c-2.69,0-5.77,1.28-6,2H10.35z"/></g><path d="M19.43,18.02C19.79,17.43,20,16.74,20,16c0-2.21-1.79-4-4-4s-4,1.79-4,4c0,2.21,1.79,4,4,4c0.74,0,1.43-0.22,2.02-0.57 c0.93,0.93,1.62,1.62,2.57,2.57L22,20.59C20.5,19.09,21.21,19.79,19.43,18.02z M16,18c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2 s2,0.9,2,2C18,17.1,17.1,18,16,18z"/></g><g opacity=".3"><circle cx="10" cy="9" r="2"/></g></g></g></svg>
                                    <span class="side-menu__label"><?php echo lang('find_doctors'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><g opacity="1"><path d="M8.07,16c0.09-0.23,0.13-0.39,0.91-0.69c0.97-0.38,1.99-0.56,3.02-0.56s2.05,0.18,3.02,0.56c0.77,0.3,0.81,0.46,0.91,0.69 H8.07z M12,8c0.55,0,1,0.45,1,1s-0.45,1-1,1s-1-0.45-1-1S11.45,8,12,8" /></g><g ><path fill="currentColor" d="M4,13c1.1,0,2-0.9,2-2c0-1.1-0.9-2-2-2s-2,0.9-2,2C2,12.1,2.9,13,4,13z M5.13,14.1C4.76,14.04,4.39,14,4,14 c-0.99,0-1.93,0.21-2.78,0.58C0.48,14.9,0,15.62,0,16.43V18l4.5,0v-1.61C4.5,15.56,4.73,14.78,5.13,14.1z M20,13c1.1,0,2-0.9,2-2 c0-1.1-0.9-2-2-2s-2,0.9-2,2C18,12.1,18.9,13,20,13z M24,16.43c0-0.81-0.48-1.53-1.22-1.85C21.93,14.21,20.99,14,20,14 c-0.39,0-0.76,0.04-1.13,0.1c0.4,0.68,0.63,1.46,0.63,2.29V18l4.5,0V16.43z M16.24,13.65c-1.17-0.52-2.61-0.9-4.24-0.9 c-1.63,0-3.07,0.39-4.24,0.9C6.68,14.13,6,15.21,6,16.39V18h12v-1.61C18,15.21,17.32,14.13,16.24,13.65z M8.07,16 c0.09-0.23,0.13-0.39,0.91-0.69c0.97-0.38,1.99-0.56,3.02-0.56s2.05,0.18,3.02,0.56c0.77,0.3,0.81,0.46,0.91,0.69H8.07z M12,8 c0.55,0,1,0.45,1,1s-0.45,1-1,1s-1-0.45-1-1S11.45,8,12,8 M12,6c-1.66,0-3,1.34-3,3c0,1.66,1.34,3,3,3s3-1.34,3-3 C15,7.34,13.66,6,12,6L12,6z"/></g></svg>
                                <span class="side-menu__label"><?php echo lang('human_resources'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <?php if (in_array('nurse', $this->modules)) { ?>
                                        <li><a href="nurse" class="slide-item"><?php echo lang('nurse'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('pharmacist', $this->modules)) { ?>
                                        <li><a href="pharmacist" class="slide-item"><?php echo lang('pharmacist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('laboratorist', $this->modules)) { ?>
                                        <li><a href="laboratorist" class="slide-item"><?php echo lang('laboratorist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('accountant', $this->modules)) { ?>
                                        <li><a href="accountant" class="slide-item"><?php echo lang('accountant'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('receptionist', $this->modules)) { ?>
                                        <li><a href="receptionist" class="slide-item"><?php echo lang('receptionist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('companyuser', $this->modules)) { ?>
                                        <li><a href="companyuser" class="slide-item"><?php echo lang('company_user'); ?></a></li>
                                    <?php } ?>                                    
                                </ul>
                            </li>
                        <?php } ?>
                        
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Receptionist', 'Accountant', 'CompanyUser'))) { ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g fill="currentColor" ><rect fill="none" height="24" width="24"/><path d="M17,6H3v8h14V6z M10,13c-1.66,0-3-1.34-3-3s1.34-3,3-3s3,1.34,3,3S11.66,13,10,13z" opacity=".3"/><g><path d="M17,4H3C1.9,4,1,4.9,1,6v8c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V6C19,4.9,18.1,4,17,4L17,4z M3,14V6h14v8H3z"/><path d="M10,7c-1.66,0-3,1.34-3,3s1.34,3,3,3s3-1.34,3-3S11.66,7,10,7L10,7z"/></g><path d="M23,7v11c0,1.1-0.9,2-2,2H4c0-1,0-0.9,0-2h17V7C22.1,7,22,7,23,7z"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('bills_and_payments'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">

                                        <li><a href="finance/invoices" class="slide-item"><?php echo lang('invoices'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant'))) { ?>
                                            <li><a href="finance/addPaymentView" class="slide-item"><?php echo lang('add_invoice'); ?></a></li>
                                        <?php } ?>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant', 'Doctor', 'Laboratorist'))) { ?>
                                            <li><a href="finance/paymentCategory" class="slide-item"><?php echo lang('list_of_charges'); ?></a></li>
                                            <li><a href="finance/serviceCategory" class="slide-item"><?php echo lang('charge').' '.lang('categories'); ?> </a></li>
                                            <li><a href="finance/expense" class="slide-item"><?php echo lang('expense'); ?></a></li>
                                        <?php } ?>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant'))) { ?>
                                            <li><a href="finance/addExpenseView" class="slide-item"><?php echo lang('add_expense'); ?></a></li>
                                        <?php } ?>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant', 'Doctor', 'Laboratorist'))) { ?>
                                            <li><a href="finance/expenseCategory" class="slide-item"><?php echo lang('expense_categories'); ?></a></li>
                                        <?php } ?>
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
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  href="prescription/all">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24px" height="24px"><path fill="currentColor" d="M301.26 352l78.06-78.06c6.25-6.25 6.25-16.38 0-22.63l-22.63-22.63c-6.25-6.25-16.38-6.25-22.63 0L256 306.74l-83.96-83.96C219.31 216.8 256 176.89 256 128c0-53.02-42.98-96-96-96H16C7.16 32 0 39.16 0 48v256c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16v-80h18.75l128 128-78.06 78.06c-6.25 6.25-6.25 16.38 0 22.63l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0L256 397.25l78.06 78.06c6.25 6.25 16.38 6.25 22.63 0l22.63-22.63c6.25-6.25 6.25-16.38 0-22.63L301.26 352zM64 96h96c17.64 0 32 14.36 32 32s-14.36 32-32 32H64V96z"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('prescription'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <?php if (in_array('labrequest', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  href="labrequest">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24px" height="24px"><path fill="currentColor" d="M301.26 352l78.06-78.06c6.25-6.25 6.25-16.38 0-22.63l-22.63-22.63c-6.25-6.25-16.38-6.25-22.63 0L256 306.74l-83.96-83.96C219.31 216.8 256 176.89 256 128c0-53.02-42.98-96-96-96H16C7.16 32 0 39.16 0 48v256c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16v-80h18.75l128 128-78.06 78.06c-6.25 6.25-6.25 16.38 0 22.63l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0L256 397.25l78.06 78.06c6.25 6.25 16.38 6.25 22.63 0l22.63-22.63c6.25-6.25 6.25-16.38 0-22.63L301.26 352zM64 96h96c17.64 0 32 14.36 32 32s-14.36 32-32 32H64V96z"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('lab') . ' ' . lang('requests'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Receptionist', 'Nurse', 'Doctor'))) { ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" href="lab/lab1">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g fill="currentColor"><g><polygon opacity=".3" points="13,6 11,6 11,11.33 6,18 18,18 13,11.33"/><path d="M20.8,18.4L15,10.67V6.5l1.35-1.69C16.61,4.48,16.38,4,15.96,4H8.04C7.62,4,7.39,4.48,7.65,4.81L9,6.5v4.17L3.2,18.4 C2.71,19.06,3.18,20,4,20h16C20.82,20,21.29,19.06,20.8,18.4z M6,18l5-6.67V6h2v5.33L18,18H6z"/></g></g></svg>
                                    <span class="side-menu__label"><?php echo lang('lab_reports'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('Receptionist', 'Nurse'))) { ?>
                            <?php if (in_array('form', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  data-toggle="slide" href="form/form1">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('forms_reports'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        

                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item"  href="prescription">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="24px"><path fill="currentColor" d="M301.26 352l78.06-78.06c6.25-6.25 6.25-16.38 0-22.63l-22.63-22.63c-6.25-6.25-16.38-6.25-22.63 0L256 306.74l-83.96-83.96C219.31 216.8 256 176.89 256 128c0-53.02-42.98-96-96-96H16C7.16 32 0 39.16 0 48v256c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16v-80h18.75l128 128-78.06 78.06c-6.25 6.25-6.25 16.38 0 22.63l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0L256 397.25l78.06 78.06c6.25 6.25 16.38 6.25 22.63 0l22.63-22.63c6.25-6.25 6.25-16.38 0-22.63L301.26 352zM64 96h96c17.64 0 32 14.36 32 32s-14.36 32-32 32H64V96z"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('prescription'); ?></span></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g fill="currentColor"><g><polygon opacity=".3" points="13,6 11,6 11,11.33 6,18 18,18 13,11.33"/><path d="M20.8,18.4L15,10.67V6.5l1.35-1.69C16.61,4.48,16.38,4,15.96,4H8.04C7.62,4,7.39,4.48,7.65,4.81L9,6.5v4.17L3.2,18.4 C2.71,19.06,3.18,20,4,20h16C20.82,20,21.29,19.06,20.8,18.4z M6,18l5-6.67V6h2v5.33L18,18H6z"/></g></g></svg>
                                    <span class="side-menu__label"><?php echo lang('labs'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="lab" class="slide-item"><?php echo lang('lab_reports'); ?></a></li>
                                        <li><a href="lab/addLabView" class="slide-item"><?php echo lang('add_lab_report'); ?></a></li>
                                        <li><a href="lab/template" class="slide-item"><?php echo lang('template'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <?php if (in_array('form', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g fill="currentColor"><path d="M15,5H5v14h14V9h-4V5z M7,7h5v2H7V7z M17,17H7v-2h10V17z M17,11v2H7v-2H17z" opacity=".3"/><path d="M7,13h10v-2H7V13z M7,17h10v-2H7V17z M16,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V8L16,3z M19,19H5V5 h10v4h4V19z M12,7H7v2h5V7z"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('forms_reports'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="form" class="slide-item"><?php echo lang('forms_reports'); ?></a></li>
                                        <li><a href="form/addFormView" class="slide-item"><?php echo lang('add_form_report'); ?></a></li>
                                        <li><a href="form/template" class="slide-item"><?php echo lang('report_templates'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist', 'Accountant'))) { ?>
                            <?php if (in_array('medicine', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="11" cy="6" opacity="1" r="2" /><circle cx="16.6" cy="17.6" opacity=".3" r="2"/><circle cx="7" cy="14" opacity="1" r="2"/><path fill="currentColor" d="M7 10c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm8-10c0-2.21-1.79-4-4-4S7 3.79 7 6s1.79 4 4 4 4-1.79 4-4zm-4 2c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm5.6 5.6c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg>
                                    <span class="side-menu__label"><?php echo lang('medicine'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="medicine" class="slide-item"><?php echo lang('medicine_list'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                                            <li><a href="medicine/addMedicineView" class="slide-item"><?php echo lang('add_medicine'); ?></a></li>
                                        <?php } ?>
                                        <li><a href="medicine/medicineCategory" class="slide-item"><?php echo lang('medicine_category'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                                            <li><a href="medicine/addCategoryView" class="slide-item"><?php echo lang('add_medicine_category'); ?></a></li>
                                            <li><a href="medicine/medicineStockAlert" class="slide-item"><?php echo lang('medicine_stock_alert'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        
                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Accountant'))) { ?>
                            <?php if (in_array('pharmacy', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5.11 19h13.78l-1.79-5.37-.21-.63.21-.63L18.89 7H5.11l1.79 5.37.21.63-.21.63L5.11 19zM8 12h3V9h2v3h3v2h-3v3h-2v-3H8v-2z" opacity="1"/><path fill="currentColor" d="M3 21h18v-2l-2-6 2-6V5h-2.64l1.14-3.14L17.15 1l-1.46 4H3v2l2 6-2 6v2zm3.9-8.63L5.11 7h13.78l-1.79 5.37-.21.63.21.63L18.89 19H5.11l1.79-5.37.21-.63-.21-.63zM11 17h2v-3h3v-2h-3V9h-2v3H8v2h3z"/></svg>
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
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g fill="currentColor" ><g><path d="M12,4.67c-4.05,3.7-6,6.79-6,9.14c0,3.63,2.65,6.2,6,6.2s6-2.57,6-6.2C18,11.46,16.05,8.36,12,4.67z M15,18 H9v-2h6V18z M15,13h-2v2h-2v-2H9v-2h2V9h2v2h2V13z" opacity=".3"/><rect height="2" width="6" x="9" y="16"/><polygon points="13,9 11,9 11,11 9,11 9,13 11,13 11,15 13,15 13,13 15,13 15,11 13,11"/><path d="M12,2c-5.33,4.55-8,8.48-8,11.8c0,4.98,3.8,8.2,8,8.2s8-3.22,8-8.2C20,10.48,17.33,6.55,12,2z M12,20 c-3.35,0-6-2.57-6-6.2c0-2.34,1.95-5.44,6-9.14c4.05,3.7,6,6.79,6,9.14C18,17.43,15.35,20,12,20z"/></g></g></svg>
                                    <span class="side-menu__label"><?php echo lang('donor') ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="donor" class="slide-item"><?php echo lang('donor_list'); ?></a></li>
                                        <li><a href="donor/addDonorView" class="slide-item"><?php echo lang('add_donor'); ?></a></li>
                                        <li><a href="donor/bloodBank" class="slide-item"><?php echo lang('blood_bank'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist'))) { ?>
                            <?php if (in_array('bed', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g fill="currentColor" ><g><rect height="3" opacity=".3" width="16" x="4" y="12"/><path d="M20,10V7c0-1.1-0.9-2-2-2H6C4.9,5,4,5.9,4,7v3c-1.1,0-2,0.9-2,2v5h1.33L4,19h1l0.67-2h12.67L19,19h1l0.67-2H22v-5 C22,10.9,21.1,10,20,10z M13,7h5v3h-5V7z M6,7h5v3H6V7z M20,15H4v-3h16V15z"/></g></g></svg>
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
                        
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor'))) { ?>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5v14h14V5H5zm4 12H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>
                                <span class="side-menu__label"><?php echo lang('financial_reports'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) { ?>
                                        <?php if (in_array('finance', $this->modules)) { ?>
                                            <li><a href="finance/financialReport" class="slide-item"><?php echo lang('financial_report'); ?></a></li>
                                            <li><a href="finance/AllUserActivityReport" class="slide-item"><?php echo lang('user_activity_report'); ?></a></li>
                                            <li><a href="finance/allAccountActivityReport" class="slide-item"><?php echo lang('all');?> <?php echo lang('accounts_report'); ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) { ?>
                                        <?php if (in_array('finance', $this->modules)) { ?>
                                            <li><a href="finance/doctorsCommission" class="slide-item"><?php echo lang('doctors_commission'); ?></a></li>
                                            <li><a href="finance/monthly" class="slide-item"><?php echo lang('monthly_sales'); ?></a></li>
                                            <li><a href="finance/daily" class="slide-item"><?php echo lang('daily_sales'); ?></a></li>
                                            <li><a href="finance/monthlyExpense" class="slide-item"><?php echo lang('monthly_expense'); ?></a></li>
                                            <li><a href="finance/dailyExpense" class="slide-item"><?php echo lang('daily_expense'); ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Doctor'))) { ?>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M15,9c0,1.1-0.9,2-2,2h-2c-1.1,0-2-0.9-2-2H4v11h16V9H15z M11,16H9v2H7v-2H5v-2h2v-2h2v2h2V16z M17,17.5h-4 V16h4V17.5z M19,14.5h-6V13h6V14.5z" opacity=".3"/><path d="M20,7h-5V4c0-1.1-0.9-2-2-2h-2C9.9,2,9,2.9,9,4v3H4C2.9,7,2,7.9,2,9v11c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V9 C22,7.9,21.1,7,20,7z M11,4h2v5h-2V4z M20,20H4V9h5c0,1.1,0.9,2,2,2h2c1.1,0,2-0.9,2-2h5V20z M11,16H9v2H7v-2H5v-2h2v-2h2v2h2V16z M13,14.5V13h6v1.5H13z M13,17.5V16h4v1.5H13z" fill="currentColor"/></g></svg>
                                <span class="side-menu__label"><?php echo lang('medical_reports'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
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
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><path fill="currentColor" d="M18,11c0,0.67,0,1.33,0,2c1.2,0,2.76,0,4,0c0-0.67,0-1.33,0-2C20.76,11,19.2,11,18,11z"/><path fill="currentColor" d="M16,17.61c0.96,0.71,2.21,1.65,3.2,2.39c0.4-0.53,0.8-1.07,1.2-1.6c-0.99-0.74-2.24-1.68-3.2-2.4 C16.8,16.54,16.4,17.08,16,17.61z"/><path fill="currentColor" d="M20.4,5.6C20,5.07,19.6,4.53,19.2,4c-0.99,0.74-2.24,1.68-3.2,2.4c0.4,0.53,0.8,1.07,1.2,1.6 C18.16,7.28,19.41,6.35,20.4,5.6z"/><path fill="currentColor" d="M4,9c-1.1,0-2,0.9-2,2v2c0,1.1,0.9,2,2,2h1v4h2v-4h1l5,3V6L8,9H4z M9.03,10.71L11,9.53v4.94l-1.97-1.18L8.55,13H8H4v-2h4 h0.55L9.03,10.71z"/><path fill="currentColor" d="M15.5,12c0-1.33-0.58-2.53-1.5-3.35v6.69C14.92,14.53,15.5,13.33,15.5,12z"/><path fill="currentColor" d="M9.03,10.71L11,9.53v4.94l-1.97-1.18L8.55,13H8H4v-2h4h0.55L9.03,10.71z" opacity="1"/></svg>
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
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity="1"/><path fill="currentColor" d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
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
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 18l2-2h14V4H4v14zm11-9h2v2h-2V9zm-4 0h2v2h-2V9zM7 9h2v2H7V9z" opacity="1"/><path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12zM7 9h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2z"/></svg>
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
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19.28 8.6l-.7-1.21-1.27.51-1.06.43-.91-.7c-.39-.3-.8-.54-1.23-.71l-1.06-.43-.16-1.13L12.7 4h-1.4l-.19 1.35-.16 1.13-1.06.44c-.41.17-.82.41-1.25.73l-.9.68-1.05-.42-1.27-.52-.7 1.21 1.08.84.89.7-.14 1.13c-.03.3-.05.53-.05.73s.02.43.05.73l.14 1.13-.89.7-1.08.84.7 1.21 1.27-.51 1.06-.43.91.7c.39.3.8.54 1.23.71l1.06.43.16 1.13.19 1.36h1.39l.19-1.35.16-1.13 1.06-.43c.41-.17.82-.41 1.25-.73l.9-.68 1.04.42 1.27.51.7-1.21-1.08-.84-.89-.7.14-1.13c.04-.31.05-.52.05-.73 0-.21-.02-.43-.05-.73l-.14-1.13.89-.7 1.1-.84zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" opacity="1"/><path fill="currentColor" d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg>
                                    <span class="side-menu__label"><?php echo lang('settings'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="settings" class="slide-item"><?php echo lang('system_settings'); ?></a></li>
                                        <li><a href="pgateway" class="slide-item"><?php echo lang('payment_gateway'); ?></a></li>
                                        <li><a href="settings/language" class="slide-item"><?php echo lang('language'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="javascript:;">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4C9.24 4 7 6.24 7 9c0 2.85 2.92 7.21 5 9.88 2.11-2.69 5-7 5-9.88 0-2.76-2.24-5-5-5zm0 7.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" opacity=".3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z" fill="currentColor"/><circle cx="12" cy="9" r="2.5" fill="currentColor"/></svg>
                                    <span class="side-menu__label"><?php echo lang('locations'); ?></span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="branch" class="slide-item"><?php echo lang('list_of'); ?> <?php echo lang('locations'); ?></a></li>
                                        <li><a href="branch/addNewView" class="slide-item"><?php echo lang('add_new'); ?></a></li>
                                    </ul>
                                </li>
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

                        <?php if ($this->ion_auth->in_group(array('Nurse', 'Doctor'))) { ?>
                            <?php if (in_array('bed', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" href="bed">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('bed_list'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item" href="bed/bedCategory">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('bed_category'); ?></span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item" href="bed/bedAllotment">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('bed_allotments'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('donor', $this->modules)) { ?>                                                            
                                <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                    <li class="slide">
                                        <a class="side-menu__item"  href="donor">
                                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                        <span class="side-menu__label"><?php echo lang('donor'); ?></span></a>
                                    </li>
                                <?php } ?>
                                <li class="slide">
                                    <a class="side-menu__item"  href="donor/bloodBank">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="side-menu__label"><?php echo lang('blood_bank'); ?></span></a>
                                </li>                                                                                                                             
                            <?php } ?>
                        <?php  } ?>
                        
                        <?php if ($this->ion_auth->in_group('Patient')) { ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" href="lab/myLab">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g fill="currentColor"><g><polygon opacity=".3" points="13,6 11,6 11,11.33 6,18 18,18 13,11.33"/><path d="M20.8,18.4L15,10.67V6.5l1.35-1.69C16.61,4.48,16.38,4,15.96,4H8.04C7.62,4,7.39,4.48,7.65,4.81L9,6.5v4.17L3.2,18.4 C2.71,19.06,3.18,20,4,20h16C20.82,20,21.29,19.06,20.8,18.4z M6,18l5-6.67V6h2v5.33L18,18H6z"/></g></g></svg>
                                    <span class="side-menu__label"><?php echo lang('my'); ?><?php echo lang('lab'); ?> <?php echo lang('results'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('form', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" href="form/myForm">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g fill="currentColor"><path d="M15,5H5v14h14V9h-4V5z M7,7h5v2H7V7z M17,17H7v-2h10V17z M17,11v2H7v-2H17z" opacity=".3"/><path d="M7,13h10v-2H7V13z M7,17h10v-2H7V17z M16,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V8L16,3z M19,19H5V5 h10v4h4V19z M12,7H7v2h5V7z"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('my'); ?> <?php echo lang('forms_reports'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>                                                            
                                <li class="slide">
                                    <a class="side-menu__item" href="patient/calendar">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 8h14V6H5z" opacity="1" /><path d="M7 11h2v2H7zm12-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-4 3h2v2h-2zm-4 0h2v2h-2z"  fill="currentColor"/></svg>
                                    <span class="side-menu__label"><?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('patient', $this->modules)) { ?>                                                               
                                <li class="slide">
                                    <a class="side-menu__item" href="patient/myCaseList">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" fill="currentColor"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('case_notes'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>                                                            
                                <li class="slide">
                                    <a class="side-menu__item" href="patient/myPrescription">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24px" height="24px"><path fill="currentColor" d="M301.26 352l78.06-78.06c6.25-6.25 6.25-16.38 0-22.63l-22.63-22.63c-6.25-6.25-16.38-6.25-22.63 0L256 306.74l-83.96-83.96C219.31 216.8 256 176.89 256 128c0-53.02-42.98-96-96-96H16C7.16 32 0 39.16 0 48v256c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16v-80h18.75l128 128-78.06 78.06c-6.25 6.25-6.25 16.38 0 22.63l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0L256 397.25l78.06 78.06c6.25 6.25 16.38 6.25 22.63 0l22.63-22.63c6.25-6.25 6.25-16.38 0-22.63L301.26 352zM64 96h96c17.64 0 32 14.36 32 32s-14.36 32-32 32H64V96z"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('prescription'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('patient', $this->modules)) { ?>                                                           
                                <li class="slide">
                                    <a class="side-menu__item" href="patient/myDocuments">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M11.17 8l-.58-.59L9.17 6H4v12h16V8h-8z" opacity=".8"></path><path d="M20 6h-8l-2-2H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 12H4V6h5.17l1.41 1.41.59.59H20v10z" fill="currentColor"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('documents'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('finance', $this->modules)) { ?>                                                            
                                <li class="slide">
                                    <a class="side-menu__item" href="patient/myPaymentHistory">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g fill="currentColor" ><rect fill="none" height="24" width="24"/><path d="M17,6H3v8h14V6z M10,13c-1.66,0-3-1.34-3-3s1.34-3,3-3s3,1.34,3,3S11.66,13,10,13z" opacity=".3"/><g><path d="M17,4H3C1.9,4,1,4.9,1,6v8c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V6C19,4.9,18.1,4,17,4L17,4z M3,14V6h14v8H3z"/><path d="M10,7c-1.66,0-3,1.34-3,3s1.34,3,3,3s3-1.34,3-3S11.66,7,10,7L10,7z"/></g><path d="M23,7v11c0,1.1-0.9,2-2,2H4c0-1,0-0.9,0-2h17V7C22.1,7,22,7,23,7z"/></g></svg>
                                    <span class="side-menu__label"><?php echo lang('bills_and_payments'); ?></span></a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('report', $this->modules)) { ?>
                                <li class="slide">
                                    <a class="side-menu__item" href="report/myreports">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 3H5c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 10h3.13c.21.78.67 1.47 1.27 2H5v-2zm14 2h-4.4c.6-.53 1.06-1.22 1.27-2H19v2zm0-4h-5v1c0 1.07-.93 2-2 2s-2-.93-2-2V8H5V5h14v3zm-5 7v1c0 .47-.19.9-.48 1.25-.37.45-.92.75-1.52.75s-1.15-.3-1.52-.75c-.29-.35-.48-.78-.48-1.25v-1H3v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4h-7zm-9 2h3.13c.02.09.06.17.09.25.24.68.65 1.28 1.18 1.75H5v-2zm14 2h-4.4c.54-.47.95-1.07 1.18-1.75.03-.08.07-.16.09-.25H19v2z" fill="currentColor"></path><path d="M8.13 10H5v2h4.4c-.6-.53-1.06-1.22-1.27-2zm6.47 2H19v-2h-3.13c-.21.78-.67 1.47-1.27 2zm-6.38 5.25c-.03-.08-.06-.16-.09-.25H5v2h4.4c-.53-.47-.94-1.07-1.18-1.75zm7.65-.25c-.02.09-.06.17-.09.25-.23.68-.64 1.28-1.18 1.75H19v-2h-3.13z" opacity=".7"></path></svg>
                                    <span class="side-menu__label"><?php echo lang('other'); ?> <?php echo lang('reports'); ?></span></a>
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
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity="1"/><path fill="currentColor" d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
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
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="8" opacity="1" r="2.1"/><path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity="1"/><path fill="currentColor" d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1c1.16 0 2.1.94 2.1 2.1 0 1.16-.94 2.1-2.1 2.1S9.9 9.16 9.9 8c0-1.16.94-2.1 2.1-2.1z"/></svg>
                            <span class="side-menu__label"><?php echo lang('profile'); ?> </span></a>
                        </li>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="slide">
                                <a class="side-menu__item" href="settings/subscription">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 20h16v-8H4v8zm6-7.27L16 16l-6 3.26v-6.53z" opacity="1"/><path fill="currentColor" d="M4 6h16v2H4zm2-4h12v2H6zm14 8H4c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm0 10H4v-8h16v8zm-10-7.27v6.53L16 16z"/></svg>
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
                                                    <a href="finance/invoices" class="dropdown-item d-flex pb-3">
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
                                                    <?php
                                                        $user = $this->session->userdata('user_id');
                                                        $user_image = $this->session->userdata('profile_img_url');
                                                    ?>
                                                    <img src="<?php echo base_url($user_image); ?>" alt="img" class="avatar avatar-md brround">
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
                                                    <a class="dropdown-item d-flex" href="home">
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




