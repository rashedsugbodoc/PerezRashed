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
                                            if (!empty($midwife->id))
                                                echo lang('edit_midwife');
                                            else
                                                echo lang('add_midwife');
                                            ?>
                                        </div>
                                    </div>
                                    <form id="midwifeForm" role="form" action="midwife/addNew" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('midwifeForm');">
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
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('first_name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="fname" id="fname" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('fname');
                                                        } elseif (!empty($midwife->firstname)) {
                                                            echo $midwife->firstname;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('middle_name'); ?></label>
                                                        <input type="text" name="mname" id="mname" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('mname');
                                                        } elseif (!empty($midwife->middlename)) {
                                                            echo $midwife->middlename;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('last_name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="lname" id="lname" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('lname');
                                                        } elseif (!empty($midwife->lastname)) {
                                                            echo $midwife->lastname;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('suffix'); ?></label>
                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
                                                            <option value="0" ><?php echo lang('none'); ?></option>
                                                            <option value="Jr." <?php if(set_value('suffix')=='Jr.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='Jr.') { echo 'selected'; } } ?>><?php echo lang('jr'); ?></option>
                                                            <option value="Sr." <?php if(set_value('suffix')=='Sr.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='Sr.') { echo 'selected'; } } ?>><?php echo lang('sr'); ?></option>
                                                            <option value="I." <?php if(set_value('suffix')=='I.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='I.') { echo 'selected'; } } ?>><?php echo lang('i'); ?></option>
                                                            <option value="II." <?php if(set_value('suffix')=='II.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='II.') { echo 'selected'; } } ?>><?php echo lang('ii'); ?></option>
                                                            <option value="III." <?php if(set_value('suffix')=='III.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='III.') { echo 'selected'; } } ?>><?php echo lang('iii'); ?></option>
                                                            <option value="IV." <?php if(set_value('suffix')=='IV.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='IV.') { echo 'selected'; } } ?>><?php echo lang('iv'); ?></option>
                                                            <option value="V." <?php if(set_value('suffix')=='V.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='V.') { echo 'selected'; } } ?>><?php echo lang('v'); ?></option>
                                                            <option value="VI." <?php if(set_value('suffix')=='VI.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='VI.') { echo 'selected'; } } ?>><?php echo lang('vi'); ?></option>
                                                            <option value="VII." <?php if(set_value('suffix')=='VII.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='VII.') { echo 'selected'; } } ?>><?php echo lang('vii'); ?></option>
                                                            <option value="VIII." <?php if(set_value('suffix')=='VIII.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='VIII.') { echo 'selected'; } } ?>><?php echo lang('viii'); ?></option>
                                                            <option value="IX." <?php if(set_value('suffix')=='IX.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='IX.') { echo 'selected'; } } ?>><?php echo lang('ix'); ?></option>
                                                            <option value="X." <?php if(set_value('suffix')=='X.') { echo 'selected';} elseif(!empty($midwife->suffix)) { if($midwife->suffix ==='X.') { echo 'selected'; } } ?>><?php echo lang('x'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('email'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="email" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('email');
                                                        } elseif (!empty($midwife->email)) {
                                                            echo $midwife->email;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('password'); ?></label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('mobile_number'); ?> <span class="text-red">*</span></label>
                                                        
                                                        <input id="mobile" name="mobile" class="form-control" type="tel" required value= 
                                                            "<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('phone');
                                                                } elseif (!empty($midwife->phone)) {
                                                                    echo $midwife->phone;
                                                                } else {
                                                                    echo '';
                                                                }
                                                            ?>">
                                                        <input type="hidden" name="phone" id="phone">
                                                        <span id="error-msg" class="hide"></span>
                                                        <span id="valid-msg" class="hide"> Valid</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('address'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="address" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('address');
                                                        } elseif (!empty($midwife->address)) {
                                                            echo $midwife->address;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2" name="country_id" id="country" required>
                                                            <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                            <?php foreach ($countries as $country) { ?>
                                                                <option value="<?php echo $country->id ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($country->id == set_value('country_id')) {
                                                                        echo 'selected';
                                                                    }
                                                                } elseif (!empty($midwife->country_id)) {
                                                                    if ($country->id == $midwife->country_id) {
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
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('postal'); ?></label>
                                                        <input type="text" name="postal" class="form-control" value="<?php
                                                            if (!empty($setval)) {
                                                                echo set_value('postal');
                                                            } elseif (!empty($midwife->postal)) {
                                                                echo $midwife->postal;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <label class="form-label"><?php echo lang('image'); ?></label>
                                                    <span class="text-muted">( Upload less than 2MB Image or PDF and 2K by 2K Max Dimension)</span>
                                                    <input type="file" name="img_url" id="img" class="dropify" data-default-file="<?php if(!empty($midwife->img_url)) echo $midwife->img_url; ?>"/>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="midwife_id" value='<?php
                                            if (!empty($midwife->id)) {
                                                echo $midwife->id;
                                            }
                                            ?>'>
                                            <input type="hidden" name="redirect" value="<?php echo $redirect?$redirect:''; ?>">
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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            var setval = "<?php echo $setval?$setval:'' ?>";
            var country = "<?php echo set_value('country_id') ?>";
            var state = "<?php echo set_value('state_id') ?>";
            var city = "<?php echo set_value('city_id') ?>";
            var barangay = "<?php echo set_value('barangay_id') ?>";
            
            if (setval != "") {
                $.ajax({
                    url: 'midwife/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var result_state = response.state;
                        if (country != null) {
                            $("#state").attr("disabled", false);
                        } else {
                            $("#state").attr("disabled", true);
                        }

                        $.each(result_state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        if (state == null) {
                            $('#state').val("0");
                        } else {
                            $('#state').val(state);
                            $('#state').attr("disabled", false);
                        }


                        $.ajax({
                            url: 'midwife/getCityByStateIdByJason?state=' + state,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                var result_city = response.city;
                                if (state != null) {
                                    $("#city").attr("disabled", false);
                                } else {
                                    $("#city").attr("disabled", true);
                                }

                                $.each(result_city, function (key, value) {
                                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (city == null) {
                                    $('#city').val("0");
                                } else {
                                    $('#city').val(city);
                                    $('#city').attr("disabled", false);
                                }

                                $.ajax({
                                    url: 'midwife/getBarangayByCityIdByJason?city=' + city,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        var result_barangay = response.barangay;
                                        if (city != null) {
                                            $("#barangay").attr("disabled", false);
                                        } else {
                                            $("#barangay").attr("disabled", true);
                                        }

                                        $.each(result_barangay, function (key, value) {
                                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                        });

                                        if (barangay == null) {
                                            $('#barangay').val("0");
                                        } else {
                                            $('#barangay').val(barangay);
                                            $('#barangay').attr("disabled", false);
                                        }
                                    }
                                })
                            }
                        })
                    }
                });
            }
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2").select2({
                allowClear: true,
            });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var country = $("#country").val();
            var iid = $("#midwife_id").val();

            $.ajax({
                url: 'midwife/editMidwifeByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var midwife_country = response.midwife.country_id;
                    var midwife_state = response.midwife.state_id;
                    var midwife_city = response.midwife.city_id;
                    var midwife_barangay = response.midwife.barangay_id;

                    $("#state").find('option').remove();
                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    console.log('Edit Midwife Country');

                    if (midwife_country == null) {
                        $("#state").attr("disabled", true);
                    } else {
                        $("#state").attr("disabled", false);
                    }

                    $.ajax({
                        url: 'midwife/getStateByCountryIdByJason?country=' + midwife_country,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var state = response.state;
                            
                            console.log('Edit Midwife - Load State of Country');

                            $.each(state, function (key, value) {
                                $('#state').append($('<option>').text(value.name).val(value.id)).end();
                            });

                            if (midwife_state == null) {
                                $('#state').val("0");
                            } else {
                                $('#state').val(midwife_state);
                            }

                            if (midwife_state == null) {
                                $("#city").attr("disabled", true);
                            } else {
                                $("#city").attr("disabled", false);
                            }

                            $.ajax({
                                url: 'midwife/getCityByStateIdByJason?state=' + midwife_state,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                                success: function (response) {
                                    var city = response.city;

                                    console.log('Edit Midwife - Load Cities of State');

                                    $.each(city, function (key, value) {
                                        $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                    });

                                    if (midwife_city == null) {
                                        $('#city').val("0");
                                    } else {
                                        $('#city').val(midwife_city);
                                    }

                                    if (midwife_city == null) {
                                        $("#barangay").attr("disabled", true);
                                    } else {
                                        $("#barangay").attr("disabled", false);
                                    }

                                    $.ajax({
                                        url: 'midwife/getBarangayByCityIdByJason?city=' + midwife_city,
                                        method: 'GET',
                                        data: '',
                                        dataType: 'json',
                                        success: function (response) {
                                            var barangay = response.barangay;

                                            console.log('Edit Midwife - Load Barangays of City');

                                            $.each(barangay, function (key, value) {
                                                $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                            });

                                            if (midwife_barangay == null) {
                                                $('#barangay').val("0");
                                            } else {
                                                $('#barangay').val(midwife_barangay);
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

    <script type="text/javascript">

        $(document).ready(function () {
            $("#country").change(function () {
                var country = $("#country").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").attr("disabled", false);

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'midwife/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        $("#state").find('option').remove();
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        var state = response.state;

                        console.log("With Ready - Change Country Load States");

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
                    url: 'midwife/getCityByStateIdByJason?state=' + stateval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        var city = response.city;

                        console.log("With Ready - Change State Load Cities");

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
                    url: 'midwife/getBarangayByCityIdByJason?city=' + cityval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        $("#barangay").find('option').remove();

                        var barangay = response.barangay;

                        console.log("With Ready - Change City Load Barangays");

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
            var error = "<?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>";
            var success = "<?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>";
            var notice = "<?php if(isset($_SESSION['notice'])) echo $_SESSION['notice']; ?>";
            var warning = "<?php if(isset($_SESSION['warning'])) echo $_SESSION['warning']; ?>";

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

            var error = "<?php if(isset($_SESSION['error'])) unset($_SESSION['error']); ?>";
            var success = "<?php if(isset($_SESSION['success'])) unset($_SESSION['success']); ?>";
            var warning = "<?php if(isset($_SESSION['notice'])) unset($_SESSION['warning']); ?>";
            var notice = "<?php if(isset($_SESSION['warning'])) unset($_SESSION['notice']); ?>";

        });
    </script>

    <script>
        $('#midwifeForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var input = document.querySelector("#mobile");
            var errorMsg = document.querySelector("#error-msg");
            var validMsg = document.querySelector("#valid-msg");
            var form = document.getElementById("midwifeForm");

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

    </body>
</html>