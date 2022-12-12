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
                                        <form role="form" action="" id="myForm" method="post" class="clearfix" enctype="multipart/form-data">
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
                                                                    <input type="hidden" id="provider" value="<?php echo $provider; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"> I would like to request for a</label>
                                                                        <select class="form-control select2-show-search service_cat" name="service_category_group" id="service_select" data-placeholder="Choose one (with searchbox)"  required="">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label"> Which Doctor do you wish to consult?</label>
                                                                <select class="form-control select2-show-search pos_select" id="adoctors" name="doctor" data-placeholder="Choose one (with searchbox)"  required="">
                                                                    <?php if (!empty($doctor_id)) { ?>
                                                                        <option value="<?php echo $doctor->id ?>"><?php echo $doctor->name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label"> Which Specific Service do you need?</label>
                                                                <select class="form-control select2-show-search sub_service" id="sub_service" name="service" data-placeholder="Choose one (with searchbox)"  required="">
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group branch_select">
                                                                <label class="form-label"> Which clinic and schedule do you prefer?</label>
                                                                <select class="form-control select2-show-search branch" name="branch" id="branch_select" data-placeholder="Choose one (with searchbox)"  required="">
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="redirect" id="redirect" value=''>
                                                            <input type="hidden" name="status" id="status" value='Requested'>
                                                            <input type="hidden" name="patient" id="patient" value="<?php echo $patient_id; ?>">
                                                            <input type="hidden" name="request" id="request" value='<?php
                                                            if ($this->ion_auth->in_group(array('Patient'))) {
                                                                echo 'Yes';
                                                            }
                                                            ?>'>
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
                                                                                        <i class="fa fa-money fa-2x text-primary"></i>
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
                                                                        <input class="form-control flatpickr datetime" id="date" placeholder="MM/DD/YYYY" name="date" type="text" readonly  required="">
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Available Slot for Scheduled Day : </label>
                                                                            <select class="form-control select2-show-search aslot" name="time_slot" id="aslots" data-placeholder="Choose one"  required="">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="step-2" class="">
                                                        
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Share with your doctor the reason for the consulation</label>
                                                                <textarea class="form-control" rows="10" name="remarks" id="remarks"></textarea>
                                                                <!-- <input type="text" value="" id="appointment_id" name="latest_id"> -->
                                                            </div>
                                                        
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
                                                                    <strong id="summary_doctor"></strong>
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <small class="text-mutede" id="summary_specialties"></small>
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
                                                                    <strong id="summary_service_cat"></strong>
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <small class="text-mutede" id="summary_sub_serv"></small>
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
                                                                    <strong id="summary_c_price"></strong>
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
                                                                    <strong id="summary_branch"></strong>
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <small class="text-mutede" id="summary_address"></small>
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
                                                                    <strong id="summary_date"></strong>
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <small class="text-mutede" id="summary_aslots"></small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-0 justify-content-end">
                                                            <div class="">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="terms" name="example-checkbox2">
                                                                    <span class="custom-control-label">I have read, understood, and accepted the <a href="#" class="text-info"><u>Terms & Conditions</u></a></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-0 justify-content-end">
                                                            <div class="">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="policy" name="example-checkbox2">
                                                                    <span class="custom-control-label">I have read, understood, and accepted the <a href="#" class="text-info"><u>Privacy Policy</u></a></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="step-4" class="">
                                                        <div class="form-group mb-0 justify-content-end">
                                                            <div class="">
                                                                <input type="hidden" name="res_service_cat" id="res_service_cat">
                                                                <input type="hidden" name="res_doctor" id="res_doctor">
                                                                <input type="hidden" name="res_service" id="res_service">
                                                                <input type="hidden" name="res_branch" id="res_branch">
                                                                <input type="hidden" name="res_date" id="res_date">
                                                                <input type="hidden" name="res_aslot" id="res_aslot">
                                                                <input type="hidden" name="res_remarks" id="res_remarks">
                                                                <input type="hidden" name="res_request" id="res_request">
                                                                <input type="hidden" name="res_redirect" id="res_redirect">
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
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <div class="form-group sessionId">
                                                                                        
                                                                                    </div>
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

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            flatpickr(".datetime", {
                    altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "F j, Y",
                    disableMobile: true,
                    minDate: "today",
                });
            })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var btnFinish = $('<button></button>').text('Submit')
                .addClass('btn btn-primary finish')
                .on('click', function(){ alert('Finish Clicked'); });
            var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-secondary')
                .on('click', function(){ $('#smartwizard').smartWizard("reset"); });
            
            $('#smartwizard-30').smartWizard({
                    selected: 0,
                    theme: 'dots',
                    transitionEffect:'fade',
                    showStepURLhash: false,
                    toolbarSettings: {
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    }
            });
        })
    </script>

    <script type="text/javascript">
        // var stepIndex = $('#smartwizard-3').smartWizard("getStepIndex");
        // console.log(stepIndex);
        $(document).ready(function () {
            $('.finish').attr('disabled', true);
            

            $('.finish').click(function () {
                var base_url='<?php echo base_url(); ?>';

                window.location = base_url + '/home';
                
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            // var timeslot = $("#myForm").find('[name=time_slot]').val();
            // alert(timeslot);
            $(".nextbtn").attr('disabled', true);
        });
    </script>

    <script type="text/javascript">
        $("#aslots").change(function () {
            $(".nextbtn").attr('disabled', false);
        });
    </script>

    <script type="text/javascript">

        var terms = $('#terms');
        var policy = $('#policy');
        // terms.change(function () {
            
        // })
        terms.change(function () {
            policy.change(function () {
                if ($("#terms").is(':checked') && $("#policy").is(':checked')) {
                    $('.nextbtn').attr('disabled', false);
                } else {
                    $('.nextbtn').attr('disabled', true);
                }
            })
        });

        policy.change(function () {
            terms.change(function () {
                if ($("#policy").is(':checked') && $("#terms").is(':checked')) {
                    $('.nextbtn').attr('disabled', false);
                } else {
                    $('.nextbtn').attr('disabled', true);
                }
            })
        });

        $('.nextbtn').on('click',function(e){
        e.preventDefault();
            var data = $('#myForm').serialize();
            var base_url='<?php echo base_url(); ?>';

            var step1 = document.getElementById("step-1");
            var step2 = document.getElementById("step-2");
            var step3 = document.getElementById("step-3");

            if (step1.style.display == "block") {
                
            }
            if (step2.style.display == "block") {
                var with_done = $("a[href='#step-2']").parent().attr("class");
                var step_status = with_done.includes('done');
                if (step_status == true) {
                    $('.nextbtn').attr('disabled', false);
                } else {
                    $('.nextbtn').attr('disabled', true);
                }
                // var remarks = $("#remarks").val();
                // if (remarks == "") {
                    
                // } else {
                //     $('.nextbtn').attr('disabled', false);
                // }
            }
            if (step3.style.display == "block") {
                $('.finish').attr('disabled', false);
                $('#service_select').find('option').remove();
                $('#adoctors').find('option').remove();
                $('#sub_service').find('option').remove();
                $('#branch_select').find('option').remove();
                $('#aslots').find('option').remove();
                $('#date').val('');
                $('#remarks').val('');

                <?php unset($_SESSION['appointment_id']); ?>
                
                return $.growl.success({
                    message: "<?php echo lang('record_added'); ?>"
                });
                
            }

            $.ajax({
                url:base_url+'appointment/addNewBookConsultation',
                method:'POST',
                data:data,  
                success:function(data){

                    console.log(data.appointment_id);

                    event.preventDefault();
                    event.stopPropagation();
                    // return $.growl.success({
                    //     message: "<?php echo lang('record_added'); ?>"
                    // });
                    
                }
            }); 
            return false;

           });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".sw-btn-next").click(function () {
                var doctor_id = $("#adoctors").val();
                var services = $("#sub_service").val();
                var doctor = $("#adoctors").val();
                var branch = $("#branch_select").val();
                var service_category = $("#service_select").val();
                var date = $("#date").val();
                var aslots = $("#aslots").val();
                var remarks = $("#remarks").val();
                var redirect = $("#redirect").val();
                var request = $("#request").val();

                var currency = "<?php echo $settings->currency; ?>";
                var street = "<?php echo $settings->address; ?>";
                var state = "<?php echo $state->name; ?>";
                var city = "<?php echo $city->name; ?>";
                var barangay = "<?php echo $barangay->name; ?>";
                var country = "<?php echo $country->name; ?>";
                var postal = "<?php echo $settings->postal; ?>";

                $('#res_service_cat').val(service_category);
                $('#res_service').val(services);
                $('#res_doctor').val(doctor);
                $('#res_branch').val(branch);
                $('#res_date').val(date);
                $('#res_aslot').val(aslots);
                $('#res_remarks').val(remarks);
                $('#res_redirect').val(redirect);
                $('#res_request').val(request);
                console.log(doctor_id + ' ' + services);
                $.ajax({
                    url: 'doctor/getDoctorById?id=' + doctor_id + '&service_category=' + service_category,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        $('#summary_specialties').find('span').remove();
                        console.log(response.specialties);
                        document.getElementById('summary_doctor').innerHTML = response.doctor.name;
                        document.getElementById('summary_c_price').innerHTML = currency + ' ' + response.consultation_fee;
                        document.getElementById('summary_address').innerHTML = street + ', ' + barangay + ', ' + city + ', ' + state + ', ' + country + ', ' + postal;
                        // document.getElementById('summary_specialties').innerHTML = response.doctor.specialties;
                        if (response.specialties) {
                            $.each(response.specialties, function(key, value) {
                                $('#summary_specialties').append($('<span>').text(value.display_name_ph + ', ')).end();
                            });
                        }
                    }
                });

                // $.ajax({
                //     url: 'appointment/getServicesByServiceId?id=' + services,
                //     method: 'GET',
                //     data: '',
                //     dataType: 'json',
                //     success: function (response) {
                //         if (response.services.c_price != null) {
                //             document.getElementById('summary_c_price').innerHTML = currency + ' ' + response.services.c_price;
                //         }

                //         document.getElementById('summary_address').innerHTML = street + ', ' + barangay + ', ' + city + ', ' + state + ', ' + country + ', ' + postal;
                //     }
                // })
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".sw-btn-next").click(function () {
                // document.getElementById('summary_doctor').innerHTML = $("select.pos_select option:selected").val();
                document.getElementById('summary_service_cat').innerHTML = $("select.service_cat option:selected").text();
                document.getElementById('summary_sub_serv').innerHTML = $("select.sub_service option:selected").text();
                document.getElementById('summary_branch').innerHTML = $("select.branch option:selected").text();
                document.getElementById('summary_date').innerHTML = $("#date").val();
                document.getElementById('summary_aslots').innerHTML = $("select.aslot option:selected").text();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var provider = $("#provider").val();
            $("#adoctors").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorInfoByCountry?provider='+provider,
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
            var provider = $("#provider").val();
            $("#branch_select").select2({
                placeholder: '<?php echo lang('select_branch'); ?>',
                allowClear: true,
                ajax: {
                    url: 'appointment/getBranchInfo?provider='+provider,
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
                var v = $("select.pos_select option:selected").val();
                var location = $("#branch_select").val();
                $('.pos_client').show();
                $.ajax({
                    url: 'schedule/getScheduleByDoctor?doctor=' + v + '&location=' + location,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response.schedules);
                        $.each(response.schedules, function(key, value) {
                            $(".displayWeekDays").append($('<div class="row">').text(value.weekday)).end();
                            $(".displayTime").append($('<div class="row">').text(value.s_time + ' - ' + value.e_time)).end();
                        });
                        $(".displayWeekDays").find('[class="row"]').append($('<i class="fa fa-calendar">')).end();
                    }
                });
            });

        });  
    </script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //     $("#adoctors").change(function () {
        //         // Get the record's ID via attribute  
        //         var branch = $('#branch_select').val();
        //         var iid = $('#date').val();
        //         var doctorr = $('#adoctors').val();
        //         $('#aslots').find('option').remove();
        //         $('#branch_select').find('option').remove();
        //         $('#date').val('');
                
        //         // $('#default').trigger("reset");
        //         $.ajax({
        //             url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
        //             method: 'GET',
        //             data: '',
        //             dataType: 'json',
        //             success: function (response) {
        //                 var slots = response.aslots;
        //                 $.each(slots, function (key, value) {
        //                     $('#aslots').append($('<option>').text(value).val(value)).end();
        //                 });
        //                 //   $("#default-step-1 .button-next").trigger("click");
        //                 if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
        //                     $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
        //                 }
        //             }
        //         });
        //     });

        // });

        $(document).ready(function () {
            $("#adoctors").change(function () {
                var doctor = $("#adoctors").val();
                var service_type = $("#service_select").val();
                $('#sub_service').find('option').remove();
                $.ajax({
                    url: 'appointment/getServicesByServiceCategoryGroupByDoctorHospital?servicecategorygroup=' + service_type + '&doctor=' + doctor,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response.services);
                        $.each(response.services, function (key, value) {
                            $('#sub_service').append($('<option>').text(value.category).val(value.id)).end();
                        });
                    }
                })
            });
        });

        $(document).ready(function () {
            $("#service_select").change(function () {
                var doctor = $("#adoctors").val();
                var service_type = $("#service_select").val();

                // console.log(is_virtual);
                $('#sub_service').find('option').remove();
                $.ajax({
                    url: 'appointment/getServicesByServiceCategoryGroupByDoctorHospital?servicecategorygroup=' + service_type + '&doctor=' + doctor,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response.services);
                        $.each(response.services, function (key, value) {
                            $('#sub_service').append($('<option>').text(value.description).val(value.id)).end();
                        });

                    }
                });

                var branch = $("branch_select").val;

                $.ajax({
                    url: 'appointment/getServiceCategoryById?id=' + service_type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var is_virtual = response.is_virtual;
                        
                        if (is_virtual) {
                            $('#branch_select').find('option').remove();
                            $(".branch_select").prop('hidden', true);
                            console.log(branch);
                        } else {
                            $(".branch_select").attr('hidden', false);
                            console.log('Not hidden');
                        }
                    }
                });

            });
        });

        $(document).ready(function () {
            $("#branch_select").change(function () {
                $('#aslots').find('option').remove();
                $('#date').val('');
            });
        });

        $(document).ready(function () {
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            var branch = $('#branch_select').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
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
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
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
                    if (slots != "") {
                        $(".nextbtn").attr('disabled', false);
                    } else {
                        $(".nextbtn").attr('disabled', true);
                    }

                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                }
            });

        }


    </script>

    </body>
</html> 
