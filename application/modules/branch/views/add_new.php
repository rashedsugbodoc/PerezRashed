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
                                            <?php
                                                if (!empty($branch->id)) {
                                                    echo lang('edit'); ?> <?php echo lang('locations');
                                                } else {
                                                    echo lang('add'); ?> <?php echo lang('locations');
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" id="branchForm" action="branch/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('display_name'); ?></label>
                                                        <input type="text" name="display_name" class="form-control" value="<?php
                                                        if (!empty($branch->display_name)) {
                                                            echo $branch->display_name;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('address'); ?></label>
                                                        <input type="text" name="address" class="form-control" value="<?php
                                                        if (!empty($branch->street_address)) {
                                                            echo $branch->street_address;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="country_id" id="country">
                                                            <option value="0" selected disabled><?php echo lang('country_placeholder'); ?></option>
                                                            <?php foreach ($countries as $country) { ?>
                                                                <option value="<?php echo $country->id; ?>" <?php

                                                                    if (!empty($branch->country_id)) {
                                                                        if ($country->id == $branch->country_id) {
                                                                            echo 'selected';
                                                                        }
                                                                    }

                                                                    ?> > <?php echo $country->name; ?>
                                                                </option>
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
                                                <div class="col-sm-12 col-md-6" id="barangayDiv" style="display: none;">
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
                                                        <input type="text" name="postal" class="form-control" placeholder="<?php echo lang('postal_placeholder'); ?>" value='<?php
                                                        if (!empty($branch->postal_code)) {
                                                            echo $branch->postal_code;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('number'); ?></label>
                                                        <input id="phone" name="phone" class="form-control" type="tel" maxlength="20" value="<?php
                                                            if (!empty($branch->phone)) {
                                                                echo $branch->phone;
                                                            } else {
                                                                echo '+63';
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <input type="text" hidden name="id" id="id" value="<?php echo $id ?>">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
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

    <!-- <script type="text/javascript">
        $("#edit_country").change(function () {
            var country = $("#edit_country").val();
            var barangay = document.getElementById("edit_barangayDiv");
            var patient = $("#patient_id").val();
            $("#edit_state").find('option').remove();
            $("#edit_city").find('option').remove();
            $("#edit_barangay").find('option').remove();

            if (country == "174") {
                barangay.style.display='block';
                $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
            } else {
                barangay.style.display='none';
                $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
            }

            if (country == null) {
                $("#edit_state").attr("disabled", true);
            } else {
                $("#edit_state").attr("disabled", false);
            }



            $.ajax({
                url: 'patient/getStateByCountryIdByJason?country=' + country + '&patient=' + patient,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;

                    $('#edit_state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                    $.each(state, function (key, value) {
                        $('#edit_state').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    $("#edit_city").attr("disabled", true);
                    $("#edit_barangay").attr("disabled", true);
                }
            });
        });

        $("#edit_state").change(function () {
            var state = $("#edit_state").val();
            $("#edit_city").find('option').remove();

            $.ajax({
                url: 'patient/getCityByStateIdByJason?state=' + state,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var city = response.city;

                    $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $.each(city, function (key, value) {
                        $('#edit_city').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    $("#edit_city").attr("disabled", false);

                }
            });
        });

        $("#edit_city").change(function () {
            var city = $("#edit_city").val();
            $("#edit_barangay").find('option').remove();

            $.ajax({
                url: 'patient/getBarangayByCityIdByJason?city=' + city,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var barangay = response.barangay;

                    $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                    $.each(barangay, function (key, value) {
                        $('#edit_barangay').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    $("#edit_barangay").attr("disabled", false);
                }
            });
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            var country = $("#country").val();
            var iid = $("#id").val();

            $.ajax({
                url: 'branch/editBranchByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    // $('#doctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                    
                    var branch_country = response.branch.country_id;
                    var branch_state = response.branch.state_id;
                    var branch_city = response.branch.city_id;
                    var branch_barangay = response.branch.barangay_id;

                    $("#state").find('option').remove();
                    

                    if (branch_country == null) {
                        $("#state").attr("disabled", false);
                    } else {
                        $("#state").attr("disabled", true);
                    }

                    if (branch_country == null) {
                        $('#branchForm').find('[name="country_id"]').val("0").change()
                    } else {
                        $('#branchForm').find('[name="country_id"]').val(response.branch.country_id).change()
                    }
                    console.log(response.branch.country_id);

                    

                    // if (doctor_country == country){
                    //     $("#state").val(doctor_state);
                    //     // $("#city").val(doctor_city);
                    //     // $("#barangay").val(doctor_barangay);
                    // } else {
                    //     $("#state").val("0");
                    //     $("#city").val("0");
                    //     $("#barangay").val("0");
                    // }

                    if (branch_country == "174") {
                        barangay.style.display='block';
                    } else {
                        barangay.style.display='none';
                    }

                    $.ajax({
                        url: 'branch/getStateByIdByJason?id=' + branch_state,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {


                            var branch_state_result = response.state.id;
                            console.log(branch_state_result);

                            if (branch_state_result == null) {
                                $("#city").attr("disabled", false);
                            } else {
                                $("#city").attr("disabled", true);
                            }

                            if (branch_state_result == null) {
                                $('#branchForm').find('[name="state_id"]').val("0").change()
                            } else {
                                $('#branchForm').find('[name="state_id"]').val(branch_state_result).change()
                            }

                            $.ajax({
                                url: 'branch/getCityByIdByJason?id=' + branch_city,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                                success: function (response) {
                                    var branch_city_result = response.city.id;
                                    console.log(branch_city_result);

                                    if (branch_city_result == null) {
                                        $("#barangay").attr("disabled", false);
                                    } else {
                                        $("#barangay").attr("disabled", true);
                                    }

                                    if (branch_city_result == null) {
                                        $('#branchForm').find('[name="city_id"]').val("0").change()
                                    } else {
                                        $('#branchForm').find('[name="city_id"]').val(branch_city_result).change()
                                    }

                                    $.ajax({
                                        url: 'branch/getBarangayByIdByJason?id=' + branch_barangay,
                                        method: 'GET',
                                        data: '',
                                        dataType: 'json',
                                        success: function (response) {
                                            var branch_barangay_result = response.barangay.id;
                                            console.log(branch_barangay_result);

                                            if (branch_barangay_result == null) {
                                                $('#branchForm').find('[name="barangay_id"]').val("0").change()
                                            } else {
                                                $('#branchForm').find('[name="barangay_id"]').val(branch_barangay_result).change()
                                            }
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

    <!-- <script type="text/javascript">
        $("#country").change(function () {
            var country = $("#country").val();
            var iid = $("#id").val();

            $.ajax({
                url: 'branch/getStateByCountryIdByJason?country=' + country + '&id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;
                    var branch_state = response.branch.state_id;
                    var branch_country = response.branch.country_id;

                    console.log(state);

                    $('#city').attr("disabled", true);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $('#barangay').attr("disabled", true);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(state, function (key, value) {
                        $('#state').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (branch_state == null) {
                        $("#state").val("0");
                    } else {
                        $("#state").val(branch_state);
                    }

                    if (branch_country == country){
                        $("#state").val(branch_state);
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
    </script> -->

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
                    url: 'patient/getStateByCountryIdByJason?country=' + country,
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
                    url: 'patient/getCityByStateIdByJason?state=' + stateval,
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
                    url: 'patient/getBarangayByCityIdByJason?city=' + cityval,
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

    </body>
</html>