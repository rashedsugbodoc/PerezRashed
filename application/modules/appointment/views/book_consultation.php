<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Book Consultation</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="smartwizard-3">
                                            <ul>
                                                <li><a href="#step-1">Appointment</a></li>
                                                <li><a href="#step-2">Chief Complaint</a></li>
                                                <li><a href="#step-3">Summary</a></li>
                                                <li><a href="#step-4">Done</a></li>
                                            </ul>
                                            <div>
                                                <div id="step-1" class="">
                                                    <form >
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"> I would like to request for a</label>
                                                                    <select class="form-control select2-show-search" id="service_select" data-placeholder="Choose one (with searchbox)">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label"> Which Doctor do you wish to consult?</label>
                                                            <select class="form-control select2-show-search pos_select" id="adoctors" name="doctor" data-placeholder="Choose one (with searchbox)">
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label"> Which clinic and schedule do you prefer?</label>
                                                            <select class="form-control select2-show-search" name="branch" id="branch_select" data-placeholder="Choose one (with searchbox)">
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="pos_client bg-gray-100 mt-5">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <!-- <div class="row">
                                                                                <div class="col-md-1">
                                                                                    <i class="fa fa-map-marker fa-3x"></i>
                                                                                </div>
                                                                                <div class="col-md-11">
                                                                                    <div class="form-group">
                                                                                        <label class="font-weight-bold">Chonghua Hospital</label>
                                                                                        <label class="mute">Fuente Osmena Blvd, Cebu City</label>
                                                                                    </div>                                                  
                                                                                </div>
                                                                            </div> -->
                                                                            <div class="media mr-4 mb-4">
                                                                                <div class="mr-3 mt-1 ml-3">
                                                                                    <i class="fa fa-map-marker fa-2x text-primary"></i>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <strong class="displayHospitalName">Chonghua Hospital</strong>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 mb-3">
                                                                                            <small class="displayHospitalAddress">Fuente Osmena BLVD, Cebu City.</small>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row ml-0 mb-4">
                                                                                        <div class="col-md-4">
                                                                                            <div class="row">Consultation Fee</div>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="row displayHospitalFee">₱ 500</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row ml-0 mr-0">
                                                                                        <div class="col-md-4 col-sm-4 displayWeekDays">
                                                                                            <div class="row">Monday</div>
                                                                                            <!-- <div class="row">Tuesday</div>
                                                                                            <div class="row">Wednesday</div>
                                                                                            <div class="row">Thursday</div>
                                                                                            <div class="row">Friday</div>
                                                                                            <div class="row">Saturday</div>
                                                                                            <div class="row">Sunday</div> -->
                                                                                        </div>
                                                                                        <div class="col-md-8 col-sm-8 displayTime">
                                                                                            <div class="row">8:00 am - 8:00 pm</div>
                                                                                            <!-- <div class="row displayTuesday">8:00 am - 8:00 pm</div>
                                                                                            <div class="row displayWednesday">8:00 am - 8:00 pm</div>
                                                                                            <div class="row displayThursday">8:00 am - 8:00 pm</div>
                                                                                            <div class="row displayFriday">8:00 am - 8:00 pm</div>
                                                                                            <div class="row displaySaturday">8:00 am - 8:00 pm</div>
                                                                                            <div class="row displaySunday">8:00 am - 8:00 pm</div> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Scheduled On : </label>
                                                                    <input class="form-control fc-datepicker" id="date" placeholder="MM/DD/YYYY" name="date" type="text" readonly>
                                                                </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Available Slot for Scheduled Day : </label>
                                                                        <select class="form-control select2-show-search" name="time_slot" id="aslots" data-placeholder="Choose one">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="step-2" class="">
                                                    <form >
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Share with your doctor the reason for the consulation</label>
                                                            <textarea class="form-control" rows="10"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="step-3" class="">
                                                    <div class="form-group">
                                                        <div class="mr-3 mt-1">
                                                            <label class="font-weight-bold">Summary : </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="media mr-4 mb-4">
                                                            <div class="mr-3 mt-1 ml-3">
                                                                <i class="fa fa-user-md fa-2x text-primary"></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <strong id="doctor"></strong>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <small class="text-mutede">Cardiologist</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="media mr-4 mb-4">
                                                            <div class="mr-3 mt-1 ml-3">
                                                                <i class="fa fa-user-md fa-2x text-primary"></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <strong>Clinic Visit</strong>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <small class="text-mutede">Face to Face Consultation</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="media mr-4 mb-4">
                                                            <div class="mr-3 mt-1 ml-3">
                                                                <i class="fa fa-money fa-2x text-primary"></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <strong>₱ 500.00</strong>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <small class="text-mutede">Consultation Fee</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="media mr-4 mb-4">
                                                            <div class="mr-3 mt-1 ml-3">
                                                                <i class="fa fa-hospital-o fa-2x text-primary"></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <strong>Choghua Hospital</strong>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <small class="text-mutede">Fuente Osmena Boulevard</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="media mr-4 mb-4">
                                                            <div class="mr-3 mt-1 ml-3">
                                                                <i class="fa fa-calendar fa-2x text-primary"></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <strong>October 22, 2022</strong>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <small class="text-mutede">3:00 am - 3:15 pm</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0 justify-content-end">
                                                        <div class="">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
                                                                <span class="custom-control-label">I have read, understood, and accepted the <a href="#" class="text-info"><u>Terms & Conditions</u></a></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0 justify-content-end">
                                                        <div class="">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
                                                                <span class="custom-control-label">I have read, understood, and accepted the <a href="#" class="text-info"><u>Privacy Policy</u></a></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="step-4" class="">
                                                    <div class="form-group mb-0 justify-content-end">
                                                        <div class="">
                                                            <div class="col-xl-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-md-12 col-lg-12">
                                                                        <div class="d-block card-header border-0 text-center px-0">
                                                                            <h2 class="text-center mb-4">Success!</h2>
                                                                            <small></small>
                                                                        </div>
                                                                        <div class="row text-center">
                                                                            <div class="col-md-12">
                                                                                <h2 class="mb-0 fs-40 counter font-weight-bold"><i class="fa fa-envelope-o fa-5x text-success"></i></h2>
                                                                                <h6 class="mt-4 text-dark-50">The Doctor has been notified of your booking request.</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-xl-5 col-md-12 col-lg-6">
                                                                        <img class="mx-auto text-center w-90" alt="img" src="<?php echo base_url(''); ?>/public/assets/images/photos/award.png">
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

        <!-- Back to top -->
        <a href="#top" id="back-to-top">
            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
        </a>

    <!-- INTERNAL JS INDEX START -->
        <!--Moment js-->
        <!-- Jquery js-->
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

        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
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

    <script type="text/javascript">
        $(document).ready(function () {
            $("#branch_select").select2({
                placeholder: '<?php echo lang('select_branch'); ?>',
                allowClear: true,
                ajax: {
                    url: 'appointment/getBranchInfo',
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

    <script type="text/javascript">
        $(document).ready(function () {
            $("#service_select").select2({
                placeholder: '<?php echo lang('select_service_type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'appointment/getServiceCategoryGroupInfoForConsultation',
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('.pos_client').hide();
            $(document.body).on('change', '#branch_select', function () {

                $('.displayHospitalName').html("").end()
                $('.displayHospitalAddress').html("").end()
                $('.displayHospitalFee').html("").end()
                $('.displayWeekDays').html("").end()
                $('.displayTime').html("").end()
                var v = $("select.pos_select option:selected").val()
                document.getElementById('doctor').innerHTML = v;
                $('.pos_client').show();
                $.ajax({
                    url: 'schedule/getScheduleByDoctor?doctor=' + v,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.schedules);
                        $.each(response.schedules, function(key, value) {
                            $(".displayWeekDays").append($('<div class="row">').text(value.weekday)).end();
                            $(".displayTime").append($('<div class="row">').text(value.s_time + ' - ' + value.e_time)).end();
                        });
                    }
                });
            });

        });  
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#adoctors").change(function () {
                // Get the record's ID via attribute  
                var branch = $('#branch_select').val();
                var iid = $('#date').val();
                var doctorr = $('#adoctors').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByLocationByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
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
                    }
                });
            });

        });

        $(document).ready(function () {
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            var branch = $('#branch_select').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByLocationByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
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
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            var branch = $('#branch_select').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByLocationByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
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

    </body>
</html> 
