<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sugbodoc">
        <meta name="keyword" content="Hospital, Clinic, Management, Software, HIS, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">

        <title>Login - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>

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

        <!-- Forn-wizard css-->
        <link href="<?php echo base_url('public/assets/plugins/form-wizard/css/form-wizard.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/formwizard/smart_wizard.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/formwizard/smart_wizard_theme_dots.css'); ?>" rel="stylesheet">

        <!---Icons css-->
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/icons.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/font-awesome/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/plugin.css'); ?>" rel="stylesheet" />
    </head>


<!--start of new-->
    <body class="page-style1 page-style2 light-mode default-sidebar">
        <div class="d-md-flex">
            <div class="w-40 bg-style h-100vh page-style">
                <div class="page-content">
                    <div class="page-single-content">
                        <img src="<?php echo base_url('uploads/new-sugbodoc-white-logo.png'); ?>" alt="img" class="header-brand-img mb-5">
                        <div class="card-body text-white py-5 px-8 text-center">
                            <img src="<?php echo base_url('public/assets/images/png/5.png'); ?>" alt="img" class="w-100 mx-auto text-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-80 page-content">
                <div class="page-single-content">
                    <div class="card-body p-6">
                        <form method="post" action="<?php echo base_url('auth/login'); ?>">
                            <div class="row">
                                <div class="col-md-10 col-sm-12 mx-auto d-block">
                                    <div class="">
                                        <div class="text-white py-1 px-8 text-center">
                                            <img src="<?php echo base_url('uploads/new-sugbodoc-purple-logo.png'); ?>" alt="img" class="header-brand-img mb-5">
                                        </div>
                                        <?php if($message) { ?>
                                            <div class="alert alert-info"><?php echo $message; ?></div>
                                        <?php } ?>
                                        <h1 class="mb-2"><?php echo lang('register_heading');?></h1>
                                        <p class="text-muted"><?php echo lang('register_subheading');?></p>
                                    </div>
                                    <div id="wizard2">
                                        <h3><?php echo lang('personal_information');?></h3>
                                        <section>
                                            <div class="control-group form-group">
                                                <label class="form-control-label"><?php echo lang('first_name');?></label>
                                                <input id="firstname" name="fullname" type="text" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="form-control-label"><?php echo lang('middle_name');?></label>
                                                <input id="fullname" name="fullname" type="text" class="form-control" placeholder="Middle Name">
                                            </div>        
                                            <div class="control-group form-group">
                                                <label class="form-control-label"><?php echo lang('last_name');?></label>
                                                <input id="lastname" name="fullname" type="text" class="form-control" placeholder="Last Name">
                                            </div>  
                                            <div class="control-group form-group">
                                                <label class="form-control-label"><?php echo lang('birth_date');?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/><path d="M4 5.01h16V8H4z" opacity=".3"/></svg>
                                                        </div>
                                                    </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                                </div>  
                                            </div>                                         
                                            <div class="form-group ">
                                                <div class="form-label"><?php echo lang('sex');?></div>
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="example-radios" value="male" checked="">
                                                        <span class="custom-control-label">Male</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="example-radios" value="female">
                                                        <span class="custom-control-label">Female</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="form-label"><?php echo lang('civil_status');?></label>
                                                <select class="form-control select2 custom-select" name="civil_status" data-placeholder="Choose one">
                                                    <option value="" label="Choose one"></option>
                                                        <?php foreach ($civil_status as $status) { ?>
                                                            <option value="<?php echo $status->name; ?>" <?php
                                                            if (!empty($setval)) {
                                                                if ($status->display_name == set_value('civil_status')) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > <?php echo $status->display_name; ?> </option>
                                                        <?php } ?> 
                                                </select>
                                            </div>
                                            <div class="control-group form-group mb-0">
                                                <label class="form-label"><?php echo lang('blood_type');?></label>
                                                <select class="form-control select2 custom-select" name="blood_group" data-placeholder="Choose one">
                                                    <?php foreach ($blood_groups as $group) { ?>
                                                        <option value="<?php echo $group->display_name; ?>" <?php
                                                        if (!empty($setval)) {
                                                            if ($group->display_name == set_value('blood_group')) {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > <?php echo $group->display_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </section>
                                        <h3><?php echo lang('address');?></h3>
                                        <section>
                                            <!-- <p>Your current address</p> -->
                                            <div class="form-group wd-xs-300">
                                                <label class="form-control-label"><?php echo lang('street_number').' / '.lang('street_name');?> <span class="tx-danger">*</span></label> <input class="form-control" id="email" name="email" placeholder="Enter street number and street address" required="" type="text">
                                            </div>
                                        </section>
                                        <h3>Contact</h3>
                                        <section>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('email_address');?></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('mobile_number');?></label>
                                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="<?php echo lang('mobile_number');?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('password');?></label>
                                                <input type="text" class="form-control" name="password" id="password" placeholder="<?php echo lang('password');?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('confirm').' '.lang('password');?></label>
                                                <input type="text" class="form-control" name="password_confirm" id="password_confirm" placeholder="<?php echo lang('confirm').' '.lang('password') ;?>">
                                            </div>

                                        </section>
                                    </div>              

                                    <div class="row">
                                        <div class="col-12">
                                            <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-link box-shadow-0 px-0">Already have an account? Login here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!--end of new-->



        <!-- js placed at the end of the document so the pages load faster -->
        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>
        <!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>

        <!-- Datepicker js -->
        <script src="<?php echo base_url('public/assets/plugins/date-picker/date-picker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/date-picker/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/input-mask/jquery.maskedinput.js'); ?>"></script>

        <!-- Bootstrap4 js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!--Othercharts js-->
        <script src="<?php echo base_url('public/assets/plugins/othercharts/jquery.sparkline.min.js'); ?>"></script>

        <!-- Circle-progress js-->
        <script src="<?php echo base_url('public/assets/js/vendors/circle-progress.min.js'); ?>"></script>

        <!-- Jquery-rating js-->
        <script src="<?php echo base_url('public/assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

        <!-- Jquery.steps js -->
        <script src="<?php echo base_url('public/assets/plugins/jquery-steps/jquery.steps.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js'); ?>"></script>

        <!-- Forn-wizard js-->
        <script src="<?php echo base_url('public/assets/plugins/formwizard/jquery.smartWizard.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/formwizard/fromwizard.js'); ?>"></script>

        <!--Accordion-Wizard-Form js-->
        <script src="<?php echo base_url('public/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-wizard.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-wizard2.js'); ?>"></script>

        <!-- Form Advanced Element -->
        <script src="<?php echo base_url('public/assets/js/formelementadvnced.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-elements.js'); ?>"></script>
    </body>
</html>
