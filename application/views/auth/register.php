<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sugbodoc">
        <meta name="keyword" content="Hospital, Clinic, Management, Software, HIS, Accounting">
        <title>Login - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>

        <!--Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('public/assets/images/brand/favicon.ico'); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url('public/assets/images/brand/android-chrome-192x192.png'); ?>" sizes="192x192">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/assets/images/brand/apple-touch-icon.png'); ?>">



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

        <!--intlTelInput css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/intl-tel-input-master/intlTelInput.css'); ?>">

        <!-- Slect2 css -->
        <link href="<?php echo base_url('public/assets/plugins/select2/select2.min.css'); ?>" rel="stylesheet" />   

        <!--Mutipleselect css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/multipleselect/multiple-select.css'); ?>">

        <!--Sumoselect css-->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/sumoselect/sumoselect.css'); ?>">

        <!-- FlatPicker css -->
        <link href="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('common/assets/flatpickr/dist/themes/sugbodoc_purple.css'); ?>" rel="stylesheet">
        <style type="text/css">
            .scroll {
                height: 100vh;
                overflow-y: scroll;
            }
            /*::-webkit-scrollbar, .scroll {
                width: 10px;
            }
            ::-webkit-scrollbar-track {
                display: none;
            }*/
        </style>
    </head>


<!--start of new-->
    <body class="page-style1 page-style2 light-mode default-sidebar">
        <div class="d-md-flex">
                <div class="w-40 bg-style page-style">
                    <div class="page-content">
                        <div class="page-single-content">
                            <a href="<?php echo base_url('')?>">
                                <img src="<?php echo base_url('uploads/new-sugbodoc-white-logo.png'); ?>" alt="img" class="header-brand-img mb-5">
                            </a>
                            <div class="card-body text-white py-5 px-8 text-center">
                                <img src="<?php echo base_url('public/assets/images/png/5.png'); ?>" alt="img" class="w-100 mx-auto text-center">
                            </div>
                        </div>
                    </div>
                </div>
            <div class="w-80 page-content">
                <div class="page-single-content">
                    <div class="card-body p-6 scroll">
                        <form method="post" id="myForm" action="<?php echo base_url('auth/register'); ?>">
                            <div class="row">
                                <div class="col-md-10 col-sm-12 mx-auto d-block">
                                    <div class="">
                                        <div class="text-white py-1 px-8 text-center">
                                            <a href="<?php echo base_url('')?>">
                                                <img src="<?php echo base_url('uploads/new-sugbodoc-purple-logo.png'); ?>" alt="img" class="header-brand-img mb-5">
                                            </a>
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
                                                <label class="form-control-label"><?php echo lang('first_name');?><span class="text-danger">*</span></label>
                                                <input id="firstname" name="first_name" type="text" class="form-control" placeholder="First Name" required>
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="form-control-label"><?php echo lang('middle_name');?></label>
                                                <input id="fullname" name="middle_name" type="text" class="form-control" placeholder="Middle Name">
                                            </div>        
                                            <div class="control-group">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-control-label"><?php echo lang('last_name');?><span class="text-danger">*</span></label>
                                                            <input id="lastname" name="last_name" type="text" class="form-control" placeholder="Last Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('suffix');?></label>
                                                            <select class="form-control select2-show-search" name="suffix">
                                                                <option value="0" selected><?php echo lang('none'); ?></option>
                                                                <option value="jr"><?php echo lang('jr'); ?></option>
                                                                <option value="sr"><?php echo lang('sr'); ?></option>
                                                                <option value="i"><?php echo lang('i'); ?></option>
                                                                <option value="ii"><?php echo lang('ii'); ?></option>
                                                                <option value="iii"><?php echo lang('iii'); ?></option>
                                                                <option value="iv"><?php echo lang('iv'); ?></option>
                                                                <option value="v"><?php echo lang('v'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="control-group form-group">
                                                <label class="form-control-label"><?php echo lang('birth_date');?><span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/><path d="M4 5.01h16V8H4z" opacity=".3"/></svg>
                                                        </div>
                                                    </div><input class="form-control flatpickr" id="bdate" placeholder="YYYY/MM/DD" type="text" name="bdate" required>
                                                </div>  
                                            </div>                              
                                            <div class="form-group ">
                                                <div class="form-label"><?php echo lang('sex');?></div>
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="gender" value="male" checked="">
                                                        <span class="custom-control-label">Male</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="gender" value="female">
                                                        <span class="custom-control-label">Female</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <label class="form-label"><?php echo lang('civil_status');?><span class="text-danger">*</span></label>
                                                <select class="form-control select2-show-search" id="civil_status" name="civil_status" data-placeholder="Choose one" required>
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
                                            <div class="control-group form-group">
                                                <label class="form-label"><?php echo lang('blood_type');?></label>
                                                <select class="form-control select2-show-search" id="bloodgroup" name="blood_group" data-placeholder="Choose one">
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
                                            <div class="control-group form-group">
                                                <label class="form-label"><?php echo lang('company');?></label>
                                                <input id="company" name="company" type="text" class="form-control" placeholder="Company">
                                            </div>
                                        </section>
                                        <h3><?php echo lang('address');?></h3>
                                        <section>
                                            <!-- <p>Your current address</p> -->
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group wd-xs-300">
                                                        <label class="form-control-label"><?php echo lang('street_number').' / '.lang('street_name');?> <span class="text-danger">*</span></label> <input class="form-control" id="address" name="address" placeholder="Enter street number, street address, unit number, etc." required="" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('country'); ?> <span class="text-danger">*</span></label>
                                                        <select class="form-control select2-show-search" name="country_id" id="country" required style="width:100%;">
                                                            <!-- <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option> -->
                                                            <option></option>
                                                            <?php foreach($countries as $country) { ?>
                                                                <option value="<?php echo $country->id ?>"><?php echo $country->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('state_province'); ?> <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="state_id" id="state" value='' required style="width:100%;">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('city_municipality'); ?> <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="city_id" id="city" value='' required style="width:100%;">
                                                            <option></option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6" id="barangayDiv">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                        <select class="form-control" name="barangay_id" id="barangay" value='' style="width:100%;">
                                                            <option></option>
                                                        </select>        
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6" id="barangayDiv">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('postal'); ?></label>
                                                        <input type="text" name="postal" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h3>Contact</h3>
                                        <section>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('email_address');?> <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('mobile_number');?> <span class="text-danger">*</span></label>
                                                <form>
                                                    <input type="tel" class="form-control" name="mobile" id="phone" placeholder="<?php echo lang('mobile_number');?>">
                                                </form>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('password');?> <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo lang('password');?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" ><?php echo lang('confirm').' '.lang('password');?></label>
                                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="<?php echo lang('confirm').' '.lang('password') ;?>">
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

        <!--intlTelInput js-->
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/intlTelInput.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/country-select.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/utils.js'); ?>"></script>

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                flatpickr(".flatpickr", {
                    maxDate: "today"
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#submit").click(function () {
                    $("#myForm").submit();
                });
            });
        </script>

        <!-- <script type="text/javascript">
            $(document).ready(function () {
                var barangay = document.getElementById("barangayDiv");

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $("#barangay").select2({
                    placeholder: '<?php echo lang('barangay') ?>',
                    allowClear: true,
                });
            });
        </script> -->

        <script type="text/javascript">
            $(document).ready(function () {
                $("#civil_status").select2({
                    placeholder: '<?php echo lang('civil_status'); ?>',
                    allowClear: true,
                });

                $("#bloodgroup").select2({
                    placeholder: '<?php echo lang('blood_type') ?>',
                    allowClear: true,
                });

                $("#country").select2({
                    placeholder: '<?php echo lang('country_placeholder') ?>',
                    allowClear: true,
                });

                $("#state").select2({
                    placeholder: '<?php echo lang('state_province') ?>',
                    allowClear: true,
                });

                $("#city").select2({
                    placeholder: '<?php echo lang('city_municipality') ?>',
                    allowClear: true,
                });

                $("#barangay").select2({
                    placeholder: '<?php echo lang('barangay') ?>',
                    allowClear: true,
                });
            });
        </script>

        <!-- <script type="text/javascript">
            $(document).ready(function () {
                var addressTab = document.getElementById("wizard2-p-1");

                if(addressTab.style.display == "block") {
                    $("#country").select2({
                        placeholder: '<?php echo lang('country_placeholder') ?>',
                        allowClear: true,
                    });
                }
            });
        </script> -->

        <script type="text/javascript">
            $(document).ready(function () {
                $("#country").change(function () {
                    var country = $("#country").val();
                    var barangay = document.getElementById("barangayDiv");

                    // $("#country").select2({
                    //     placeholder: '<?php echo lang('country_placeholder') ?>',
                    //     allowClear: true,
                    // });

                    // $("#state").select2({
                    //     placeholder: '<?php echo lang('state_province') ?>',
                    //     allowClear: true,
                    // });

                    // $("#city").select2({
                    //     placeholder: '<?php echo lang('city_municipality') ?>',
                    //     allowClear: true,
                    // });

                    // $("#barangay").select2({
                    //     placeholder: '<?php echo lang('barangay') ?>',
                    //     allowClear: true,
                    // });

                    // if (country == "174") {
                    //     barangay.style.display='block';
                    // } else {
                    //     barangay.style.display='none';
                    // }

                    $("#state").find('option').remove();
                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    $.ajax({
                        url: 'auth/getStateByCountryIdByJason?country=' + country,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var state = response.state;

                            // if (doctor_country == null) {
                            //     $("#state").attr("disabled", false);
                            // } else {
                            //     $("#state").attr("disabled", true);
                            // }
                            $('#state').append($('<option value="0" disabled selected><?php echo lang("state_province"); ?></option>')).end();

                            $.each(state, function (key, value) {
                                $('#state').append($('<option>').text(value.name).val(value.id)).end();
                            });
                        }
                    });
                });

                $("#state").change(function () {
                    var state = $("#state").val();

                    $.ajax({
                        url: 'auth/getCityByStateIdByJason?state=' + state,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var city = response.city;

                            $('#city').append($('<option value="0" disabled selected><?php echo lang("city_municipality"); ?></option>')).end();

                            $.each(city, function (key, value) {
                                $('#city').append($('<option>').text(value.name).val(value.id)).end();
                            });

                        }
                    });
                });

                $("#city").change(function () {
                    var city = $("#city").val();

                    $.ajax({
                        url: 'auth/getBarangayByCityIdByJason?city=' + city,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var barangay = response.barangay;

                            $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay"); ?></option>')).end();

                            $.each(barangay, function (key, value) {
                                $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                            });
                        }
                    });
                });
            });
                
            
        </script>
    </body>
</html>
