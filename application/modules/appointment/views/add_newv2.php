<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php
                                    if (!empty($appointment->id))
                                        echo lang('edit_appointment');
                                    else
                                        echo lang('add_appointment');
                                    ?>
                                </div>
                            </div>
                            <form role="form" action="appointment/addNew" class="clearfix row" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="adv-table editable-table ">
                                        <?php echo validation_errors(); ?>
                                        <?php echo $this->session->flashdata('feedback'); ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Patient <span class="text-red">*</span></label>
                                                <select class="form-control select2-show-search pos_select" id="pos_select" name="patient" data-placeholder="Choose one">
                                                    <?php if (!empty($patients)) { ?>
                                                        <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>  
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pos_client clearfix">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('patient'); ?></label>
                                                    <input type="text" name="p_name" class="form-control" value="<?php
                                                    if (!empty($payment->p_name)) {
                                                        echo $payment->p_name;
                                                    }
                                                    ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                    <input type="email" name="p_email" class="form-control" value="<?php
                                                    if (!empty($payment->p_email)) {
                                                        echo $payment->p_email;
                                                    }
                                                    ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                    <form>
                                                        <input id="phone" name="p_phone" type="tel" value="<?php
                                                        if (!empty($payment->p_phone)) {
                                                            echo $payment->p_phone;
                                                        }
                                                        ?>">
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                    <input type="text" name="p_age" class="form-control" value="<?php
                                                    if (!empty($payment->p_age)) {
                                                        echo $payment->p_age;
                                                    }
                                                    ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                                <select class="form-control select2-show-search" name="p_gender" data-placeholder="Choose one" value=''>
                                                    <option value="Male" <?php
                                                    if (!empty($patient->sex)) {
                                                        if ($patient->sex == 'Male') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > Male </option>   
                                                    <option value="Female" <?php
                                                    if (!empty($patient->sex)) {
                                                        if ($patient->sex == 'Female') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > Female </option>
                                                    <option value="Others" <?php
                                                    if (!empty($patient->sex)) {
                                                        if ($patient->sex == 'Others') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > Others </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('doctor'); ?><span class="text-red">*</span></label>
                                                <select class="form-control select2-show-search pos_select" id="adoctors" name="doctor" data-placeholder="Choose one">
                                                    <?php if (!empty($doctors)) { ?>
                                                        <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo lang('date'); ?><span class="text-red">*</span></label>
                                            <input class="form-control fc-datepicker" id="date" placeholder="MM/DD/YYYY" name="date" type="text" value="<?php
                                            if (!empty($appointment->date)) {
                                                echo date('d-m-Y', $appointment->date);
                                            }
                                            ?>" readonly>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('available_slots'); ?><span class="text-red">*</span></label>
                                                <select class="form-control m-bot15 select2-show-search" name="time_slot" id="aslots" value=''> 

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?><span class="text-red">*</span></label>
                                                <select class="form-control select2-show-search" name="status" data-placeholder="Choose one" value=''>
                                                    <option value="Pending Confirmation" <?php
                                                    if (!empty($appointment->status)) {
                                                        if ($appointment->status == 'Pending Confirmation') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo lang('pending_confirmation'); ?> </option> 
                                                    <option value="Confirmed" <?php
                                                    if (!empty($appointment->status)) {
                                                        if ($appointment->status == 'Confirmed') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo lang('confirmed'); ?> </option>
                                                    <option value="Treated" <?php
                                                    if (!empty($appointment->status)) {
                                                        if ($appointment->status == 'Treated') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo lang('treated'); ?> </option>
                                                    <option value="cancelled" <?php
                                                    if (!empty($appointment->status)) {
                                                        if ($appointment->status == 'Treated') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo lang('cancelled'); ?> </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('remarks'); ?><span class="text-red">*</span></label>
                                                <textarea class="form-control mb-4" placeholder="Purpose" name="remarks" rows="3" maxlength="500">
                                                <?php
                                                    if (!empty($appointment->remarks)) {
                                                        echo $appointment->remarks;
                                                    }
                                                ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="appointment_id" value='<?php
                                    if (!empty($appointment->id)) {
                                        echo $appointment->id;
                                    }
                                    ?>'>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input pull-left" name="sms" value="sms">
                                                <span class="custom-control-label">Send SMS</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- end app-content-->
            </div>
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            20<?php echo date('y'); ?> &copy; <?php echo $this->db->get('settings')->row()->system_vendor; ?> by Rygel Technology Solutions.
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

        <!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>

        <!-- Bootstrap4 js-->
        
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

                <!-- INTERNAL JS INDEX START -->
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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

        

        <!-- <script src="common/js/coderygel.min.js"></script> -->

        <script>
            $(document).ready(function () {
                $('.pos_client').hide();
                $(document.body).on('change', '#pos_select', function () {

                    var v = $("select.pos_select option:selected").val()
                    if (v == 'add_new') {
                        $('.pos_client').show();
                    } else {
                        $('.pos_client').hide();
                    }
                });

            });


        </script>

        <?php if (!empty($appointment->id)) { ?>

            <script type="text/javascript">
                $(document).ready(function () {
                    $("#adoctors").change(function () {
                        // Get the record's ID via attribute  
                        var id = $('#appointment_id').val();
                        var date = $('#date').val();
                        var doctorr = $('#adoctors').val();
                        $('#aslots').find('option').remove();
                        // $('#default').trigger("reset");
                        $.ajax({
                            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                        }).success(function (response) {
                            var slots = response.aslots;
                            $.each(slots, function (key, value) {
                                $('#aslots').append($('<option>').text(value).val(value)).end();
                            });
                            //   $("#default-step-1 .button-next").trigger("click");
                            if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                                $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                            }
                            // Populate the form fields with the data returned from server
                            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                        });
                    });

                });

                $(document).ready(function () {
                    var id = $('#appointment_id').val();
                    var date = $('#date').val();
                    var doctorr = $('#adoctors').val();
                    $('#aslots').find('option').remove();
                    // $('#default').trigger("reset");
                    $.ajax({
                        url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var slots = response.aslots;
                            $.each(slots, function (key, value) {
                                $('#aslots').append($('<option>').text(value).val(value)).end();
                            });

                            $("#aslots").val(response.current_value)
                                    .find("option[value=" + response.current_value + "]").attr('selected', true);

                            //   $("#default-step-1 .button-next").trigger("click");
                            if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                                $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                            }
                            // Populate the form fields with the data returned from server
                            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                        }
                    });
                });




                $(document).ready(function () {
                    $('#date').datepicker({
                        format: "dd-mm-yyyy",
                        autoclose: true,
                    })
                            //Listen for the change even on the input
                            .change(dateChanged)
                            .on('changeDate', dateChanged);
                });

                function dateChanged() {
                    // Get the record's ID via attribute  
                    var id = $('#appointment_id').val();
                    var date = $('#date').val();
                    var doctorr = $('#adoctors').val();
                    $('#aslots').find('option').remove();
                    // $('#default').trigger("reset");
                    $.ajax({
                        url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var slots = response.aslots;
                            $.each(slots, function (key, value) {
                                $('#aslots').append($('<option>').text(value).val(value)).end();
                            });
                            //   $("#default-step-1 .button-next").trigger("click");
                            if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                                $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                            }


                            // Populate the form fields with the data returned from server
                            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                        }
                    });

                }

            </script>

        <?php } else { ?> 

            <script type="text/javascript">
                $(document).ready(function () {
                    $("#adoctors").change(function () {
                        // Get the record's ID via attribute  
                        var id = $('#appointment_id').val();
                        var date = $('#date').val();
                        var doctorr = $('#adoctors').val();
                        $('#aslots').find('option').remove();
                        // $('#default').trigger("reset");
                        $.ajax({
                            url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                var slots = response.aslots;
                                $.each(slots, function (key, value) {
                                    $('#aslots').append($('<option>').text(value).val(value)).end();
                                });
                                //   $("#default-step-1 .button-next").trigger("click");
                                if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                                    $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                                }
                                // Populate the form fields with the data returned from server
                                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                            }
                        });
                    });

                });

                $(document).ready(function () {
                    var id = $('#appointment_id').val();
                    var date = $('#date').val();
                    var doctorr = $('#adoctors').val();
                    $('#aslots').find('option').remove();
                    // $('#default').trigger("reset");
                    $.ajax({
                        url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var slots = response.aslots;
                            $.each(slots, function (key, value) {
                                $('#aslots').append($('<option>').text(value).val(value)).end();
                            });

                            $("#aslots").val(response.current_value)
                                    .find("option[value=" + response.current_value + "]").attr('selected', true);

                            //   $("#default-step-1 .button-next").trigger("click");
                            if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                                $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                            }
                            // Populate the form fields with the data returned from server
                            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                        }
                    });
                });




                $(document).ready(function () {
                    $('#date').datepicker({
                        format: "dd-mm-yyyy",
                        autoclose: true,
                    })
                            //Listen for the change even on the input
                            .change(dateChanged)
                            .on('changeDate', dateChanged);
                });

                function dateChanged() {
                    // Get the record's ID via attribute  
                    var id = $('#appointment_id').val();
                    var date = $('#date').val();
                    var doctorr = $('#adoctors').val();
                    $('#aslots').find('option').remove();
                    // $('#default').trigger("reset");
                    $.ajax({
                        url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var slots = response.aslots;
                            $.each(slots, function (key, value) {
                                $('#aslots').append($('<option>').text(value).val(value)).end();
                            });
                            //   $("#default-step-1 .button-next").trigger("click");
                            if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                                $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                            }
                            // Populate the form fields with the data returned from server
                            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                        }
                    });

                }

            </script>

        <?php } ?>

        <script>
            $(document).ready(function () {
                $("#pos_select").select2({
                    placeholder: '<?php echo lang('select_patient'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'patient/getPatientinfoWithAddNewOption',
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

                $("#adoctors").select2({
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










