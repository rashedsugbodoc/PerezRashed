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
                                            if (!empty($nurse->id))
                                                echo lang('edit_nurse');
                                            else
                                                echo lang('add_nurse');
                                            ?>
                                        </div>
                                    </div>
                                    <form id="nurseForm" role="form" action="nurse/addNew" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('nurseForm');">
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
                                                        } elseif (!empty($nurse->firstname)) {
                                                            echo $nurse->firstname;
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
                                                        } elseif (!empty($nurse->middlename)) {
                                                            echo $nurse->middlename;
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
                                                        } elseif (!empty($nurse->lastname)) {
                                                            echo $nurse->lastname;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('suffix'); ?></label>
                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
                                                            <option value="0" ><?php echo lang('none'); ?></option>
                                                            <option value="Jr." <?php if(set_value('suffix')=='Jr.') { echo 'selected';} elseif ($nurse->suffix ==='Jr.') { echo 'selected'; } ?>><?php echo lang('jr'); ?></option>
                                                            <option value="Sr." <?php if(set_value('suffix')=='Sr.') { echo 'selected';} elseif ($nurse->suffix ==='Sr.') { echo 'selected'; } ?>><?php echo lang('sr'); ?></option>
                                                            <option value="I" <?php if(set_value('suffix')=='I') { echo 'selected';} elseif ($nurse->suffix ==='I') { echo 'selected'; } ?>><?php echo lang('i'); ?></option>
                                                            <option value="II" <?php if(set_value('suffix')=='II') { echo 'selected';} elseif ($nurse->suffix ==='II') { echo 'selected'; } ?>><?php echo lang('ii'); ?></option>
                                                            <option value="III" <?php if(set_value('suffix')=='III') { echo 'selected';} elseif ($nurse->suffix ==='III') { echo 'selected'; } ?>><?php echo lang('iii'); ?></option>
                                                            <option value="IV" <?php if(set_value('suffix')=='IV') { echo 'selected';} elseif ($nurse->suffix ==='IV') { echo 'selected'; } ?>><?php echo lang('iv'); ?></option>
                                                            <option value="V" <?php if(set_value('suffix')=='V') { echo 'selected';} elseif ($nurse->suffix ==='V') { echo 'selected'; } ?>><?php echo lang('v'); ?></option>
                                                            <option value="VI" <?php if(set_value('suffix')=='VI') { echo 'selected';} elseif ($nurse->suffix ==='VI') { echo 'selected'; } ?>><?php echo lang('vi'); ?></option>
                                                            <option value="VII" <?php if(set_value('suffix')=='VII') { echo 'selected';} elseif ($nurse->suffix ==='VII') { echo 'selected'; } ?>><?php echo lang('vii'); ?></option>
                                                            <option value="VIII" <?php if(set_value('suffix')=='VIII') { echo 'selected';} elseif ($nurse->suffix ==='VIII') { echo 'selected'; } ?>><?php echo lang('viii'); ?></option>
                                                            <option value="IX" <?php if(set_value('suffix')=='IX') { echo 'selected';} elseif ($nurse->suffix ==='IX') { echo 'selected'; } ?>><?php echo lang('ix'); ?></option>
                                                            <option value="X" <?php if(set_value('suffix')=='X') { echo 'selected';} elseif ($nurse->suffix ==='X') { echo 'selected'; } ?>><?php echo lang('x'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('email'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="email" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('email');
                                                        } elseif (!empty($nurse->email)) {
                                                            echo $nurse->email;
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
                                                                } elseif (!empty($nurse->phone)) {
                                                                    echo $nurse->phone;
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
                                                        } elseif (!empty($nurse->address)) {
                                                            echo $nurse->address;
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
                                                                if (!empty($nurse->country_id)) {
                                                                    if ($country->id == $nurse->country_id) {
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
                                                            } elseif (!empty($nurse->postal)) {
                                                                echo $nurse->postal;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <label class="form-label"><?php echo lang('image'); ?></label>
                                                    <span class="text-muted">( Upload less than 2MB Image or PDF and 2K by 2K Max Dimension)</span>
                                                    <input type="file" name="img_url" id="img" class="dropify" data-default-file="<?php if(!empty($nurse->img_url)) echo $nurse->img_url; ?>"/>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="nurse_id" value='<?php
                                            if (!empty($nurse->id)) {
                                                echo $nurse->id;
                                            }
                                            ?>'>
                                            <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
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
            $(".select2").select2({
                allowClear: true,
            });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var country = $("#country").val();
            var iid = $("#nurse_id").val();

            $.ajax({
                url: 'nurse/editNurseByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var nurse_country = response.nurse.country_id;
                    var nurse_state = response.nurse.state_id;
                    var nurse_city = response.nurse.city_id;
                    var nurse_barangay = response.nurse.barangay_id;

                    $("#state").find('option').remove();
                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    console.log('Edit Nurse Country');

                    if (nurse_country == null) {
                        $("#state").attr("disabled", true);
                    } else {
                        $("#state").attr("disabled", false);
                    }

                    $.ajax({
                        url: 'nurse/getStateByCountryIdByJason?country=' + nurse_country,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var state = response.state;
                            
                            console.log('Edit Nurse - Load State of Country');

                            $.each(state, function (key, value) {
                                $('#state').append($('<option>').text(value.name).val(value.id)).end();
                            });

                            if (nurse_state == null) {
                                $('#state').val("0");
                            } else {
                                $('#state').val(nurse_state);
                            }

                            if (nurse_state == null) {
                                $("#city").attr("disabled", true);
                            } else {
                                $("#city").attr("disabled", false);
                            }

                            $.ajax({
                                url: 'nurse/getCityByStateIdByJason?state=' + nurse_state,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                                success: function (response) {
                                    var city = response.city;

                                    console.log('Edit Nurse - Load Cities of State');

                                    $.each(city, function (key, value) {
                                        $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                    });

                                    if (nurse_city == null) {
                                        $('#city').val("0");
                                    } else {
                                        $('#city').val(nurse_city);
                                    }

                                    if (nurse_city == null) {
                                        $("#barangay").attr("disabled", true);
                                    } else {
                                        $("#barangay").attr("disabled", false);
                                    }

                                    $.ajax({
                                        url: 'nurse/getBarangayByCityIdByJason?city=' + nurse_city,
                                        method: 'GET',
                                        data: '',
                                        dataType: 'json',
                                        success: function (response) {
                                            var barangay = response.barangay;

                                            console.log('Edit Nurse - Load Barangays of City');

                                            $.each(barangay, function (key, value) {
                                                $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                            });

                                            if (nurse_barangay == null) {
                                                $('#barangay').val("0");
                                            } else {
                                                $('#barangay').val(nurse_barangay);
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
                    url: 'nurse/getStateByCountryIdByJason?country=' + country,
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
                    url: 'nurse/getCityByStateIdByJason?state=' + stateval,
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
                    url: 'nurse/getBarangayByCityIdByJason?city=' + cityval,
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

    <script>
        $('#nurseForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var input = document.querySelector("#mobile");
            var errorMsg = document.querySelector("#error-msg");
            var validMsg = document.querySelector("#valid-msg");
            var form = document.getElementById("nurseForm");

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