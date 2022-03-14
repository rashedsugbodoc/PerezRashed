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
                                            if (!empty($patient->id))
                                                echo lang('edit_patient');
                                            else
                                                echo lang('add_new_patient');
                                            ?>
                                        </div>
                                    </div>
                                    <form role="form" id="patientForm" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data">
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
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <!-- <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Name" maxlength="100" value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('name');
                                                                }
                                                                if (!empty($patient->name)) {
                                                                    echo $patient->name;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?><span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('email');
                                                                }
                                                                if (!empty($patient->email)) {
                                                                    echo $patient->email;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('first_name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="f_name" placeholder="First Name" maxlength="100" required value="<?php
                                                                    if (!empty($setval)) {
                                                                    echo set_value('f_name');
                                                                    }
                                                                    if (!empty($patient->firstname)) {
                                                                        echo $patient->firstname;
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('middle_name'); ?></label>
                                                                <input type="text" class="form-control" name="m_name" placeholder="Middle Name" value="<?php
                                                                if (!empty($setval)) {
                                                                echo set_value('m_name');
                                                                }
                                                                if (!empty($patient->middlename)) {
                                                                    echo $patient->middlename;
                                                                }
                                                                ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('last_name'); ?> <span class="text-red">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="l_name" placeholder="Last Name" maxlength="100" required value="<?php
                                                                        if (!empty($setval)) {
                                                                        echo set_value('l_name');
                                                                        }
                                                                        if (!empty($patient->lastname)) {
                                                                            echo $patient->lastname;
                                                                        }
                                                                    ?>">
                                                                    <div class="input-group-append br-tl-0 br-bl-0">
                                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
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
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?><span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email" maxlength="1000" required value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('email');
                                                                }
                                                                if (!empty($patient->email)) {
                                                                    echo $patient->email;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('password'); ?> <span class="text-red">*</span></label>
                                                            <input type="password" class="form-control" name="password" placeholder="Password" maxlength="255">
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('phone'); ?> <span class="text-red">*</span></label>
                                                                <form>
                                                                    <input id="phone" name="phone" type="tel" maxlength="100" class="form-control" required value="<?php
                                                                    if (!empty($setval)) {
                                                                        echo set_value('phone');
                                                                    }
                                                                    if (!empty($patient->phone)) {
                                                                        echo $patient->phone;
                                                                    } else {
                                                                        echo '+63';
                                                                    }
                                                                    ?>">
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('address'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" placeholder="Address" name="address" required maxlength="100" value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('address');
                                                                }
                                                                if (!empty($patient->address)) {
                                                                    echo $patient->address;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="country_id" id="country" required>
                                                                    <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                                    <?php foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo $country->id; ?>" <?php
                                                                        if (!empty($setval)) {
                                                                            if ($country->id == set_value('country_id')) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        if (!empty($patient->country_id)) {
                                                                            if ($country->id == $patient->country_id) {
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
                                                                if (!empty($patient->postal)) {
                                                                    echo $patient->postal;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('sex'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="sex" data-placeholder="Choose one" required>
                                                                    <option value="Male" <?php
                                                                    if (!empty($setval)) {
                                                                        if (set_value('sex') == 'Male') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Male') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?> > Male </option>
                                                                    <option value="Female" <?php
                                                                    if (!empty($setval)) {
                                                                        if (set_value('sex') == 'Female') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Female') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?> > Female </option>
                                                                    <option value="Others" <?php
                                                                    if (!empty($setval)) {
                                                                        if (set_value('sex') == 'Others') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Others') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?> > <?php echo lang('others'); ?> </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('birth_date'); ?> <span class="text-red">*</span></label>
                                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" name="birthdate" type="text" maxlength="100" required readonly value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('birthdate');
                                                                }
                                                                if (!empty($patient->birthdate)) {
                                                                    echo $patient->birthdate;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('blood_group'); ?></label>
                                                                        <select class="form-control select2-show-search" name="bloodgroup" data-placeholder="Choose one">
                                                                            <?php foreach ($groups as $group) { ?>
                                                                                <option value="<?php echo $group->group; ?>" <?php
                                                                                if (!empty($setval)) {
                                                                                    if ($group->group == set_value('bloodgroup')) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                                if (!empty($patient->bloodgroup)) {
                                                                                    if ($group->group == $patient->bloodgroup) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                                ?> > <?php echo $group->group; ?> </option>
                                                                                    <?php } ?> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('doctor'); ?></label>
                                                                        <select class="form-control select2" data-placeholder="Choose one" id="doctorchoose" name="doctor[]" multiple="multiple">
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label">Image Upload <span class="text-red">*</span></label>
                                                            <input type="file" name="img_url" id="image" class="dropify"/>
                                                        </div>
                                                        <input type="hidden" id="patient_id" name="id" value='<?php
                                                        if (!empty($patient->id)) {
                                                            echo $patient->id;
                                                        }
                                                        ?>'>
                                                        <input type="hidden" name="p_id" value='<?php
                                                        if (!empty($patient->patient_id)) {
                                                            echo $patient->patient_id;
                                                        }
                                                        ?>'>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                                        </div>
                                                    </div>
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
        var iid = $("#patient_id").val();

        $.ajax({
            url: 'patient/editPatientByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                // $('#doctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                var patient_country = response.patient.country_id;
                var patient_id = $("#patient_id").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                

                if (patient_country == null) {
                    $("#state").attr("disabled", false);
                } else {
                    $("#state").attr("disabled", true);
                }

                if (patient_country == null) {
                    $('#patientForm').find('[name="country_id"]').val("0").change()
                } else {
                    $('#patientForm').find('[name="country_id"]').val(response.patient.country_id).change()
                }

                var imagenUrl = response.patient.img_url;
                var drEvent = $('#image').dropify(
                {
                  defaultFile: imagenUrl
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = imagenUrl;
                drEvent.destroy();
                drEvent.init();

                $.each(response.doctors, function(key, value) {
                    $('#doctorchoose').append($('<option selected>').text(value.name + ' (' + '<?php echo lang('id') ?>' + ': ' + value.id + ')').val(value.id)).end();
                });

                // if (doctor_country == country){
                //     $("#state").val(doctor_state);
                //     // $("#city").val(doctor_city);
                //     // $("#barangay").val(doctor_barangay);
                // } else {
                //     $("#state").val("0");
                //     $("#city").val("0");
                //     $("#barangay").val("0");
                // }

                if (patient_country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'patient/getStateByCountryIdByJason?country=' + patient_country + '&patient=' + patient_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;
                        var patient_state = response.patient.state_id;
                        var patient_country = response.patient.country_id;

                        $("#state").find('option').remove();
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        $('#state').append($('<option value="0" disabled><?php echo lang("state_province_placeholder"); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        if (patient_country == null) {
                            $('#state').val("0");
                            $('#state').attr("disabled", true);
                        } else {
                            $('#state').attr("disabled", false);
                        }

                        if (patient_state == null) {
                            $('#state').val("0");
                        } else {
                            $('#state').val(patient_state);
                            $('#state').attr("disabled", false);
                        }

                        var stateval = $('#state').val();

                        $.ajax({
                            url: 'patient/getCityByStateIdByJason?state=' + stateval + '&patient=' + patient_id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                var city = response.city;
                                var patient_city = response.patient.city_id;
                                var patient_state = response.patient.state_id;

                                $('#city').append($('<option value="0" disabled><?php echo lang("city_municipality_placeholder"); ?></option>')).end();

                                $.each(city, function (key, value) {
                                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (patient_state == null) {
                                    $('#city').val("0");
                                    $('#city').attr("disabled", true);
                                } else {
                                    $('#city').attr("disabled", false);
                                }

                                if (patient_city == null) {
                                    $('#city').val("0");
                                } else {
                                    $('#city').val(patient_city);
                                    $('#city').attr("disabled", false);
                                }

                                var cityval = $('#city').val();

                                $.ajax({
                                    url: 'patient/getBarangayByCityIdByJason?city=' + cityval + '&patient=' + patient_id,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        var barangay = response.barangay;
                                        var patient_barangay = response.patient.barangay_id;
                                        var patient_city = response.patient.city_id;

                                        $('#barangay').append($('<option value="0" disabled><?php echo lang("barangay_placeholder"); ?></option>')).end();

                                        $.each(barangay, function (key, value) {
                                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                        });

                                        if (patient_city == null) {
                                            $('#barangay').val("0");
                                            $('#barangay').attr("disabled", true);
                                        } else {
                                            $('#barangay').attr("disabled", false);
                                        }

                                        if(patient_barangay == null) {
                                            $('#barangay').val("0");
                                        } else {
                                            $('#barangay').val(patient_barangay);
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
            var patient_id = $("#patient_id").val();
            var patient_country = "<?php echo $patient->country_id; ?>";

            $("#state").find('option').remove();
            $("#city").find('option').remove();
            $("#barangay").find('option').remove();

            $('#state').attr("disabled", false);
            $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();

            $.ajax({
                url: 'patient/getStateByCountryIdByJason?country=' + country + '&patient=' + patient_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;
                    var patient_state = response.patient.state_id;
                    var patient_country = response.patient.country_id;

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

                    if (patient_state == null) {
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
                    }

                }
            });
        });

        $("#state").change(function () {
            var state = $("#state").val();
            var patient_id = $("#patient_id").val();

            $.ajax({
                url: 'patient/getCityByStateIdByJason?state=' + state + '&patient=' + patient_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var city = response.city;
                    var patient_city = response.patient.city_id;
                    var patient_state = response.patient.state_id;

                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    $('#city').attr("disabled", false);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $('#barangay').attr("disabled", true);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(city, function (key, value) {
                        $('#city').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (patient_city == null) {
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
                    }

                }
            });
        });

        $("#city").change(function () {
            var city = $("#city").val();
            var patient_id = $("#patient_id").val();

            $.ajax({
                url: 'patient/getBarangayByCityIdByJason?city=' + city + '&patient=' +patient_id,
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

                    if (patient_barangay == null) {
                        $("#barangay").val("0");
                    } else {
                        $("#barangay").val(patient_barangay);
                    }

                    if (patient_city == city){
                        $("#barangay").val(patient_barangay);
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

    <script>
        $(document).ready(function () {
            $("#doctorchoose").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorinfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        console.log(response);
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });
            $("#doctorchoose1").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorInfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

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