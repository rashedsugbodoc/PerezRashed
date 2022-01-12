<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <section id="main-content">
                            <section class="wrapper site-min-height">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php
                                            if (!empty($doctor->id))
                                                echo lang('edit_doctor');
                                            else
                                                echo lang('add_doctor');
                                            ?>
                                        </div>
                                    </div>
                                    <form role="form" id="doctorForm" action="doctor/addNew" class="clearfix" method="post" enctype="multipart/form-data">
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
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('name'); ?></label>
                                                        <input type="text" name="name" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('name');
                                                        }
                                                        if (!empty($doctor->name)) {
                                                            echo $doctor->name;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('email'); ?></label>
                                                        <input type="text" name="email" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('email');
                                                        }
                                                        if (!empty($doctor->email)) {
                                                            echo $doctor->email;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('password'); ?></label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('address'); ?></label>
                                                        <input type="text" name="address" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('address');
                                                        }
                                                        if (!empty($doctor->address)) {
                                                            echo $doctor->address;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="country_id" id="country">
                                                            <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                            <?php foreach ($countries as $country) { ?>
                                                                <option value="<?php echo $country->id; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($country->id == set_value('country_id')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($doctors->country_id)) {
                                                                    if ($country->id == $doctors->country_id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $country->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>      
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('state_province'); ?></label>
                                                        <select class="form-control select2-show-search" name="state_id" id="state" value='' disabled>
                                                            <option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>
                                                        </select>    
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('city_municipality'); ?></label>
                                                        <select class="form-control select2-show-search" name="city_id" id="city" value='' disabled>
                                                            <option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6" id="barangayDiv">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                        <select class="form-control select2-show-search" name="barangay_id" id="barangay" value='' disabled>
                                                            <option value="0" disabled selected><?php echo lang('barangay_placeholder'); ?></option>
                                                        </select>        
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('postal'); ?></label>
                                                        <input type="text" name="postal" class="form-control" placeholder="<?php echo lang('postal_placeholder'); ?>" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('postal');
                                                        }
                                                        if (!empty($doctor->postal)) {
                                                            echo $doctor->postal;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('phone'); ?><span class="text-red">*</span></label>
                                                        <form>
                                                            <input id="phone" name="phone" class="form-control" type="tel" maxlength="20" value="<?php
                                                            if (!empty($setval)) {
                                                                echo set_value('phone');
                                                            }
                                                            if (!empty($doctor->phone)) {
                                                                echo $doctor->phone;
                                                            }
                                                            ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                                                        <select class="form-control select2-show-search" name="department" value=''>
                                                            <?php foreach ($departments as $department) { ?>
                                                                <option value="<?php echo $department->name; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($department->name == set_value('department')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($doctor->department)) {
                                                                    if ($department->name == $doctor->department) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $department->name; ?> </option>
                                                                    <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                                                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('profile');
                                                        }
                                                        if (!empty($doctor->profile)) {
                                                            echo $doctor->profile;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('license'); ?>: <span class="text-red">*</span></label>
                                                        <input type="text" name="license" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <label class="form-label"><?php echo lang('profile_picture'); ?>:<span class="text-red">*</span></label>
                                                    <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                    <input type="file" name="img_url" id="img" class="dropify"/>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="doctor_id" value='<?php
                                            if (!empty($doctor->id)) {
                                                echo $doctor->id;
                                            }
                                            ?>'>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </section>

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
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/intlTelInput.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/country-select.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/utils.js'); ?>"></script>

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
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        var country = $("#country").val();
        var iid = $("#doctor_id").val();

        $.ajax({
            url: 'doctor/editDoctorByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                // $('#doctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                var doctor_country = response.doctor.country_id;
                var doctor_id = $("#doctor_id").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                

                if (doctor_country == null) {
                    $("#state").attr("disabled", false);
                } else {
                    $("#state").attr("disabled", true);
                }

                if (doctor_country == null) {
                    $('#doctorForm').find('[name="country_id"]').val("0").change()
                } else {
                    $('#doctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                }

                // if (doctor_country == country){
                //     $("#state").val(doctor_state);
                //     // $("#city").val(doctor_city);
                //     // $("#barangay").val(doctor_barangay);
                // } else {
                //     $("#state").val("0");
                //     $("#city").val("0");
                //     $("#barangay").val("0");
                // }

                if (doctor_country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'doctor/getStateByCountryIdByJason?country=' + doctor_country + '&doctor=' + doctor_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;
                        var doctor_state = response.doctor.state_id;
                        var doctor_country = response.doctor.country_id;

                        $("#state").find('option').remove();
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        $('#state').append($('<option value="0" disabled><?php echo lang("state_province_placeholder"); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        if (doctor_country == null) {
                            $('#state').val("0");
                            $('#state').attr("disabled", true);
                        } else {
                            $('#state').attr("disabled", false);
                        }

                        if (doctor_state == null) {
                            $('#state').val("0");
                        } else {
                            $('#state').val(doctor_state);
                            $('#state').attr("disabled", false);
                        }

                        var stateval = $('#state').val();

                        $.ajax({
                            url: 'doctor/getCityByStateIdByJason?state=' + stateval + '&doctor=' + doctor_id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                var city = response.city;
                                var doctor_city = response.doctor.city_id;
                                var doctor_state = response.doctor.state_id;

                                $('#city').append($('<option value="0" disabled><?php echo lang("city_municipality_placeholder"); ?></option>')).end();

                                $.each(city, function (key, value) {
                                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (doctor_state == null) {
                                    $('#city').val("0");
                                    $('#city').attr("disabled", true);
                                } else {
                                    $('#city').attr("disabled", false);
                                }

                                if (doctor_city == null) {
                                    $('#city').val("0");
                                } else {
                                    $('#city').val(doctor_city);
                                    $('#city').attr("disabled", false);
                                }

                                var cityval = $('#city').val();

                                $.ajax({
                                    url: 'doctor/getBarangayByCityIdByJason?city=' + cityval + '&doctor=' + doctor_id,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        var barangay = response.barangay;
                                        var doctor_barangay = response.doctor.barangay_id;
                                        var doctor_city = response.doctor.city_id;

                                        $('#barangay').append($('<option value="0" disabled><?php echo lang("barangay_placeholder"); ?></option>')).end();

                                        $.each(barangay, function (key, value) {
                                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                        });

                                        if (doctor_city == null) {
                                            $('#barangay').val("0");
                                            $('#barangay').attr("disabled", true);
                                        } else {
                                            $('#barangay').attr("disabled", false);
                                        }

                                        if(doctor_barangay == null) {
                                            $('#barangay').val("0");
                                        } else {
                                            $('#barangay').val(doctor_barangay);
                                            $('#barangay').attr("disabled", false);
                                        }

                                    }
                                })
                            }
                        });

                    }
                });

            }
        });
    </script>

    <script type="text/javascript">
        $("#country").change(function () {
            var country = $("#country").val();
            var doctor_id = $("#doctor_id").val();
            var doctor_country = "<?php echo $doctors->country_id; ?>";

            $("#state").find('option').remove();
            $("#city").find('option').remove();
            $("#barangay").find('option').remove();

            $('#state').attr("disabled", false);
            $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();

            $.ajax({
                url: 'doctor/getStateByCountryIdByJason?country=' + country + '&doctor=' + doctor_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;
                    var doctor_state = response.doctor.state_id;
                    var doctor_country = response.doctor.country_id;

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

                    if (doctor_state == null) {
                        $("#state").val("0");
                    } else {
                        $("#state").val(doctor_state);
                    }

                    if (doctor_country == country){
                        $("#state").val(doctor_state);
                        // $("#city").val(doctor_city);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#state").val("0");
                        $("#city").val("0");
                        $("#barangay").val("0");
                    }

                }
            });
        });

        $("#state").change(function () {
            var state = $("#state").val();
            var doctor_id = $("#doctor_id").val();

            $.ajax({
                url: 'doctor/getCityByStateIdByJason?state=' + state + '&doctor=' + doctor_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var city = response.city;
                    var doctor_city = response.doctor.city_id;
                    var doctor_state = response.doctor.state_id;

                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    $('#city').attr("disabled", false);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $('#barangay').attr("disabled", true);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(city, function (key, value) {
                        $('#city').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (doctor_city == null) {
                        $("#city").val("0");
                    } else {
                        $("#city").val(doctor_city);
                    }

                    if (doctor_state == state){
                        $("#city").val(doctor_city);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#city").val("0");
                        $("#barangay").val("0");
                    }

                }
            });
        });

        $("#city").change(function () {
            var city = $("#city").val();
            var doctor_id = $("#doctor_id").val();

            $.ajax({
                url: 'doctor/getBarangayByCityIdByJason?city=' + city + '&doctor=' +doctor_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var barangay = response.barangay;
                    var doctor_barangay = response.doctor.barangay_id;
                    var doctor_city = response.doctor.city_id;

                    $("#barangay").find('option').remove();

                    $('#barangay').attr("disabled", false);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(barangay, function (key, value) {
                        $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (doctor_barangay == null) {
                        $("#barangay").val("0");
                    } else {
                        $("#barangay").val(doctor_barangay);
                    }

                    if (doctor_city == city){
                        $("#barangay").val(doctor_barangay);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#barangay").val("0");
                    }
                    console.log(response.barangay);
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
                    url: 'settings/getStateByCountryIdByJason?country=' + country,
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
                    url: 'settings/getCityByStateIdByJason?state=' + stateval,
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
                    url: 'settings/getBarangayByCityIdByJason?city=' + cityval,
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