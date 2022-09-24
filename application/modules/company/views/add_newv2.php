<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="row mt-5">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('add_account') ?>
                                        </div>
                                    </div>
                                    <form role="form" id="addCompanyForm" action="company/addNew" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('addCompanyForm');">
                                    <div class="card-body">
                                        <?php echo validation_errors(); ?>
                                        <?php
                                            $file_error = $this->session->flashdata('fileError');

                                            if(!empty($file_error)) {
                                                echo $file_error;
                                            }else{

                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="name" id="name" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('name');
                                                    }
                                                    if (!empty($company->name)) {
                                                        echo $company->name;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('display_name'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="display_name" id="display_name" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('display_name');
                                                    }
                                                    if (!empty($company->display_name)) {
                                                        echo $company->display_name;
                                                    }
                                                    ?>" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('email'); ?> <span class="text-red">*</span></label>
                                                    <input type="email" class="form-control" name="email" id="email" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('email');
                                                    }
                                                    if (!empty($company->email)) {
                                                        echo $company->email;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('mobile_number'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('phone');
                                                    } elseif (!empty($company->phone)) {
                                                        echo $company->phone;
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>' placeholder="" required>
                                                    <input type="hidden" name="phone" id="phone">
                                                    <span id="error-msg" class="hide"></span>
                                                    <span id="valid-msg" class="hide"> Valid</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('address'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="address" id="address" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('address');
                                                    }
                                                    if (!empty($company->address)) {
                                                        echo $company->address;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control select2" name="country_id" id="country" required>
                                                        <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                        <?php foreach ($countries as $country) { ?>
                                                            <option value="<?php echo $country->id ?>" <?php
                                                            if (!empty($company->country_id)) {
                                                                if ($country->id == $company->country_id) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo $country->name ?></option>
                                                        <?php } ?>
                                                    </select>   
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('state_province'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control select2" name="state_id" id="state" value='' required disabled>
                                                        <option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>
                                                    </select>    
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('city_municipality'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control select2" name="city_id" id="city" value='' required disabled>
                                                        <option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6" id="barangayDiv">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                    <select class="form-control select2" name="barangay_id" id="barangay" value='' disabled>
                                                        <option value="0" disabled selected><?php echo lang('barangay_placeholder'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('postal'); ?></label>
                                                    <input type="text" name="postal" class="form-control" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('postal');
                                                    }
                                                    if (!empty($company->postal)) {
                                                        echo $company->postal;
                                                    }
                                                    ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('registration'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="registration_number" id="register" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('registration_number');
                                                    }
                                                    if (!empty($company->registration_number)) {
                                                        echo $company->registration_number;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('type'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control m-bot15 js-example-basic-single select2" name="type_id" id="type" value='' required>
                                                        <option value=""><?php echo lang('select');?></option>
                                                        <?php foreach ($types as $type) { ?>
                                                            <option value="<?php echo $type->id; ?>" <?php
                                                            if (!empty($setval)) {
                                                                if ($type->id == set_value('type_id')) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            if (!empty($company->type_id)) {
                                                                if ($type->id == $company->type_id) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>> <?php echo $type->display_name; ?> </option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('classification'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control m-bot15 js-example-basic-single select2" name="classification_id" id="classification" value='certified' required>
                                                        <option value=""><?php echo lang('select');?></option>
                                                        <?php foreach ($classifications as $classification) { ?>
                                                            <option value="<?php echo $classification->id; ?>" <?php
                                                            if (!empty($setval)) {
                                                                if ($classification->id == set_value('classification_id')) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            if (!empty($company->classification_id)) {
                                                                if ($classification->id == $company->classification_id) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > <?php echo $classification->display_name; ?> </option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('profile'); ?></label>
                                                    <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('profile');
                                                    }
                                                    if (!empty($company->profile)) {
                                                        echo $company->profile;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="company_id" value='<?php
                                            if (!empty($company->id)) {
                                                echo $company->id;
                                            }
                                            ?>'>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('image'); ?></label>
                                                    <span class="text-muted">( Upload less than 2MB Image or PDF and 2K by 2K Max Dimension)</span>
                                                    <input type="file" name="img_url" id="image" class="dropify"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            Copyright © 2021 <a href="#">Rygel Dash</a>. Deployed by <a href="#">Rygel Technology Solutions</a> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->
        </div>

        <!-- Back to top -->
        <a href="#top" id="back-to-top">
            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
        </a>

    <!-- INTERNAL JS INDEX START -->
        <!--Moment js-->
        <!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>

        <!-- Bootstrap4 js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!--Othercharts js-->
        <script src="<?php echo base_url('public/assets/plugins/othercharts/jquery.sparkline.min.js'); ?>"></script>

        <!-- Circle-progress js-->
        <script src="<?php echo base_url('public/assets/js/vendors/circle-progress.min.js'); ?>"></script>

        <!-- Jquery-rating js-->
        <script src="<?php echo base_url('public/assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

        <!--Sidemenu js-->
        <script src="<?php echo base_url('public/assets/plugins/sidemenu/sidemenu.js'); ?>"></script>

        <!-- P-scroll js-->
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scroll1.js'); ?>"></script>

        <!-- Custom js-->
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <!--Moment js-->
        <script src="<?php echo base_url('public/assets/plugins/moment/moment.js') ?>"></script>

        <!-- Daterangepicker js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/js/daterange.js') ?>"></script>

        <!-- Data tables js-->
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/dataTables.bootstrap4.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/dataTables.buttons.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/jszip.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/pdfmake.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/vfs_fonts.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.html5.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.print.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.colVis.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/dataTables.responsive.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/responsive.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/js/datatables.js') ?>"></script>

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>

        <!-- Timepicker js -->
        <script src="<?php echo base_url('public/assets/plugins/time-picker/jquery.timepicker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/time-picker/toggles.min.js'); ?>"></script>

        <!-- Datepicker js -->
        <script src="<?php echo base_url('public/assets/plugins/date-picker/date-picker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/date-picker/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/input-mask/jquery.maskedinput.js'); ?>"></script>

        <!--File-Uploads Js-->
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.ui.widget.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.iframe-transport.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fancy-fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/fancy-uploader.js'); ?>"></script>

        <!-- File uploads js -->
        <script src="<?php echo base_url('public/assets/plugins/fileupload/js/dropify.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/filupload.js'); ?>"></script>

        <!-- Multiple select js -->
        <script src="<?php echo base_url('public/assets/plugins/multipleselect/multiple-select.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/multipleselect/multi-select.js'); ?>"></script>

        <!--Sumoselect js-->
        <script src="<?php echo base_url('public/assets/plugins/sumoselect/jquery.sumoselect.js'); ?>"></script>

        <!--intlTelInput js-->
        <script src="<?php echo base_url('common/assets/intl-tel-input/build/js/intlTelInput.js');?>"></script>

        <!--jquery transfer js-->
        <script src="<?php echo base_url('public/assets/plugins/jQuerytransfer/jquery.transfer.js'); ?>"></script>

        <!--multi js-->
        <script src="<?php echo base_url('public/assets/plugins/multi/multi.min.js'); ?>"></script>

        <!-- Form Advanced Element -->
        <script src="<?php echo base_url('public/assets/js/formelementadvnced.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-elements.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/file-upload.js'); ?>"></script>

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $("#country").select2({
                allowClear: true,
            })
        });
    </script> -->

    <script type="text/javascript">
        $("#addCompanyForm").parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2").select2({
                allowClear: true,
            });
        })
    </script>

    <!-- <script type="text/javascript">
        $("#country").change(function () {
            var country = $("#country").val();
            var barangay = document.getElementById("barangayDiv");
            /*var patient_id = $("#patient_id").val();
            var patient_country = "<?php echo $patient->country_id; ?>";*/

            $("#state").find('option').remove();
            $("#city").find('option').remove();
            $("#barangay").find('option').remove();

            $('#state').attr("disabled", false);
            $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();

            if (country == "174") {
                barangay.style.display='block';
            } else {
                barangay.style.display='none';
            }

            $.ajax({
                url: 'patient/getStateByCountryIdByJason?country=' + country,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;
                    /*var patient_state = response.patient.state_id;
                    var patient_country = response.patient.country_id;*/

                    // if (doctor_country == null) {
                    //     $("#state").attr("disabled", false);
                    // } else {
                    //     $("#state").attr("disabled", true);
                    // }

                    
                    $('#city').attr("disabled", true);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $('#barangay').attr("disabled", true);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(state, function (key, value) {
                        $('#state').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    /*if (patient_state == null) {
                        $("#state").val("0");
                    } else {
                        $("#state").val(patient_state);
                    }

                    if (patient_country == country){
                        $("#state").val(patient_state);
                        // $("#city").val(doctor_city);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#state").val("0");
                        $("#city").val("0");
                        $("#barangay").val("0");
                    }*/

                }
            });
        });

        $("#state").change(function () {
            var state = $("#state").val();
            /*var patient_id = $("#patient_id").val();*/

            $.ajax({
                url: 'patient/getCityByStateIdByJason?state=' + state,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var city = response.city;
                    /*var patient_city = response.patient.city_id;
                    var patient_state = response.patient.state_id;*/

                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    $('#city').attr("disabled", false);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $('#barangay').attr("disabled", true);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(city, function (key, value) {
                        $('#city').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    /*if (patient_city == null) {
                        $("#city").val("0");
                    } else {
                        $("#city").val(patient_city);
                    }

                    if (patient_state == state){
                        $("#city").val(patient_city);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#city").val("0");
                        $("#barangay").val("0");
                    }*/

                }
            });
        });

        $("#city").change(function () {
            var city = $("#city").val();
            /*var patient_id = $("#patient_id").val();*/

            $.ajax({
                url: 'patient/getBarangayByCityIdByJason?city=' + city,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var barangay = response.barangay;
                    var patient_barangay = response.patient.barangay_id;
                    var patient_city = response.patient.city_id;

                    $("#barangay").find('option').remove();

                    $('#barangay').attr("disabled", false);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(barangay, function (key, value) {
                        $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    /*if (patient_barangay == null) {
                        $("#barangay").val("0");
                    } else {
                        $("#barangay").val(patient_barangay);
                    }

                    if (patient_city == city){
                        $("#barangay").val(patient_barangay);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#barangay").val("0");
                    }*/
                    console.log(response.barangay);
                }
            });
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            var country = $("#country").val();
            var iid = $("#company_id").val();

            $.ajax({
                url: 'company/editCompanyByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var company_country = response.company.country_id;
                    var company_state = response.company.state_id;
                    var company_city = response.company.city_id;
                    var company_barangay = response.company.barangay_id;

                    console.log(company_country);

                    if (company_country == null) {
                        $("#state").attr("disabled", true);
                    } else {
                        $("#state").attr("disabled", false);
                    }

                    $.ajax({
                        url: 'company/getStateByCountryIdByJason?country=' + company_country,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var state = response.state;
                            console.log(state);

                            $.each(state, function (key, value) {
                                if (value.id == company_state) {
                                    $('#state').append($('<option selected>').text(value.name).val(value.id)).end();
                                } else {
                                    $('#state').append($('<option>').text(value.name).val(value.id)).end();
                                }
                            });

                            if (company_state == null) {
                                $("#city").attr("disabled", true);
                            } else {
                                $("#city").attr("disabled", false);
                            }

                            $.ajax({
                                url: 'company/getCityByStateIdByJason?state=' + company_state,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                                success: function (response) {
                                    var city = response.city;

                                    $.each(city, function (key, value) {
                                        if (value.id == company_city) {
                                            $('#city').append($('<option selected>').text(value.name).val(value.id)).end();
                                        } else {
                                            $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                        }
                                    });

                                    if (company_city == null) {
                                        $("#barangay").attr("disabled", true);
                                    } else {
                                        $("#barangay").attr("disabled", false);
                                    }

                                    $.ajax({
                                        url: 'company/getBarangayByCityIdByJason?city=' + company_city,
                                        method: 'GET',
                                        data: '',
                                        dataType: 'json',
                                        success: function (response) {
                                            var barangay = response.barangay;

                                            $.each(barangay, function (key, value) {
                                                if (value.id == company_barangay) {
                                                    $('#barangay').append($('<option selected>').text(value.name).val(value.id)).end();
                                                } else {
                                                    $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                                }
                                            });
                                        }
                                    });
                                }
                            })
                        }
                    });


                }
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#country").change(function () {
                var country = $("#country").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                $("#city").find('option').remove();
                $("#barangay").find('option').remove();

                $("#state").attr("disabled", false);

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'company/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;

                        $('#state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                        $("#city").attr("disabled", true).append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $("#barangay").attr("disabled", true).append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#state").change(function () {
                var stateval = $("#state").val();
                $("#city").find('option').remove();

                $("#city").attr("disabled", false);

                $.ajax({
                    url: 'company/getCityByStateIdByJason?state=' + stateval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;

                        $('#city').append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $.each(city, function (key, value) {
                            $('#city').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#city").change(function () {
                var cityval = $("#city").val();
                $("#barangay").find('option').remove();

                $("#barangay").attr("disabled", false);

                $.ajax({
                    url: 'company/getBarangayByCityIdByJason?city=' + cityval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;

                        $('#barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        $.each(barangay, function (key, value) {
                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });
            });


        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var input = document.querySelector("#mobile");
            var errorMsg = document.querySelector("#error-msg");
            var validMsg = document.querySelector("#valid-msg");
            var form = document.getElementById("patientForm");

            // here, the index maps to the error code returned from getValidationError - see readme
            var errorMap = ["Invalid mobile number", "Invalid country code", "Too short", "Too long", "Invalid mobile number", "Invalid length"];

            // initialise plugin
            var iti = window.intlTelInput(input, {
                hiddenInput: "full_number",
                preferredCountries: ['ph', 'sg', 'us'],
                utilsScript: "<?php echo base_url('common/assets/intl-tel-input/build/js/utils.js?1638200991544');?>"
            });

            var reset = function() {
              input.classList.remove("parsley-error");
              input.classList.remove("is-valid");
              errorMsg.innerHTML = "";
              errorMsg.classList.add("hide");
              validMsg.classList.add("hide");
            };

            var execute = function() {
              reset();
              document.getElementById("phone").value = iti.getNumber();
              if (input.value.trim()) {
                if (iti.isValidNumber()) {
                  validMsg.classList.remove("hide");
                  input.classList.add("is-valid");
                } else {
                  input.classList.add("parsley-error");
                  input.classList.remove("is-valid");
                  var errorCode = iti.getValidationError();
                  errorMsg.innerHTML = errorMap[errorCode];
                  errorMsg.classList.remove("hide");
                }
              }
            };

            // on blur: validate
            input.addEventListener('blur', execute);
            form.addEventListener('submit', execute);
            // on keyup / change flag: reset
            input.addEventListener('change', reset);
            input.addEventListener('keyup', reset);
        });
        
    </script>

    <script>
        $(document).ready(function () {
            var error = "<?php echo $_SESSION['error'] ?>";
            var success = "<?php echo $_SESSION['success'] ?>";
            var notice = "<?php echo $_SESSION['notice'] ?>";
            var warning = "<?php echo $_SESSION['warning'] ?>";

            if (success) {
                return $.growl.success({
                    message: success
                });
            }
            if (error) {
                return $.growl.error({
                    message: error
                });
            }
            if (warning) {
                return $.growl.warning({
                    message: warning
                });
            }
            if (notice) {
                return $.growl.notice({
                    message: notice
                });
            }

            var error = "<?php unset($_SESSION['error']); ?>";
            var success = "<?php unset($_SESSION['success']); ?>";
            var warning = "<?php unset($_SESSION['warning']); ?>";
            var notice = "<?php unset($_SESSION['notice']); ?>";

        });
    </script>

    </body>
</html>