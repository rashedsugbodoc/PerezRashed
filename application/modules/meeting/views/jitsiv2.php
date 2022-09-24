<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="content mt-5">
                            <section id="main-content">
                                <section class="wrapper site-min-height">

                                    

                                    <!-- page start-->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <?php echo lang('live'); ?> <?php echo lang('appointment'); ?> 
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content"  id="meeting">
                                                        <input type="hidden" name="appointmentid" id="appointmentid"value="<?php echo $appointmentid; ?>">
                                                        <input type="hidden" name="username" id="username"value="<?php echo $display_name; ?>">
                                                        <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel-group panel-group-primary"  role="tablist" aria-multiselectable="true" id="accordion3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="headingTwo30">
                                                                <h4 class="panel-title">
                                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo30" aria-expanded="true" aria-controls="collapseTwo30">
                                                                        <?php echo lang('appointment'); ?> <?php echo lang('details'); ?> 
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseTwo30" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo30">
                                                                <div class="card-body border-0 bg-white">
                                                                    <div class="d-flex align-items-center pb-2 border-bottom">
                                                                        <div class="avatar avatar-lg brround d-block cover-image" data-image-src="
                                                                        <?php 
                                                                            if ($this->ion_auth->in_group('Doctor')) {
                                                                                if(!empty($patient_details->img_url) && file_exists($patient_details->img_url)) {
                                                                                    echo $patient_details->img_url; 
                                                                                } else {
                                                                                    echo base_url('public/assets/images/users/placeholder.jpg');
                                                                                }
                                                                            }
                                                                            if ($this->ion_auth->in_group('Patient')) {
                                                                                if(!empty($doctor_details->img_url)) {
                                                                                    echo $doctor_details->img_url; 
                                                                                } else {
                                                                                    echo base_url('public/assets/images/users/7.jpg');
                                                                                }
                                                                            }
                                                                        ?>
                                                                        " >
                                                                        </div>
                                                                        <div class="wrapper ml-3">
                                                                            <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                                                <?php
                                                                                    if ($this->ion_auth->in_group('Doctor')) {
                                                                                        if(!empty($patient_details->name)){
                                                                                            echo $patient_details->name; 
                                                                                        } else {
                                                                                            echo lang('name') . ' ' . lang('not_specified');
                                                                                        }
                                                                                    }
                                                                                    if ($this->ion_auth->in_group('Patient')) {
                                                                                        echo lang('dr') . '. ' . $doctor_details->name;
                                                                                    }
                                                                                ?>
                                                                            </p>
                                                                            <small class="text-muted">
                                                                                <?php
                                                                                    if ($this->ion_auth->in_group('Doctor')) {
                                                                                        if(!empty($patient_details->birthdate)){
                                                                                            echo ucfirst($patient_details->sex) . ', ' . time_elapsed_string($patient_details->birthdate,1 ,"short_age") . ' ' . lang('old');  
                                                                                        } else {
                                                                                            echo  lang('age') . ' ' . lang('not_specified');
                                                                                        }
                                                                                    }
                                                                                    if ($this->ion_auth->in_group('Patient')) {
                                                                                        if(!empty($doctor_details->department)){
                                                                                            echo $doctor_details->department;
                                                                                        } else {
                                                                                            echo lang('department') . ' ' . lang('not_specified');
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex mb-3 mt-3">
                                                                        <div class="h6 mb-0 mt-1"><i class="fa fa-calendar"></i><span class="ml-5"><?php echo date('jS F, Y', $appointment_details->date); ?></span></div>
                                                                    </div>
                                                                    <div class="d-flex mb-3 mt-3">
                                                                        <div class="h6 mb-0 mt-1"><i class="fa fa-clock-o"></i><span class="ml-5"><?php echo $appointment_details->time_slot; ?></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                            <div class="panel panel-default active">
                                                                <div class="panel-heading " role="tab" id="headingOne31">
                                                                    <h4 class="panel-title">
                                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne31" aria-expanded="true" aria-controls="collapseOne31">
                                                                            <?php echo lang('case'); ?> <?php echo lang('note'); ?>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseOne31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne31">
                                                                    <div class="panel-body border-0 bg-white">
                                                                        <form role="form" id="myForm" action="" class="clearfix" method="post" enctype="multipart/form-data">
                                                                            <div class="form-group col-md-12" hidden>
                                                                                <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                                                                <input class="form-control mb-4" value='<?php echo date("d-m-Y"); ?>' type="text" name="date">
                                                                            </div>
                                                                            <div class="form-group col-md-12" hidden>
                                                                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                                                                <select class="form-control m-bot15 js-example-basic-single" name="patient_id" value=''>
                                                                                    <option value="<?php echo $patient_details->id; ?>"> <?php echo $patient_details->name; ?> </option> 
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <label for="exampleInputEmail1"><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?></label>
                                                                                <input class="form-control mb-4" placeholder="Input box" type="text" name="title" id="title">
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <label class=""><?php echo lang('case'); ?> <?php echo lang('summary'); ?></label>
                                                                                <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                                                    <div id="quillEditor">
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <input type="hidden" name="encounter_id" value="<?php echo $appointment_details->encounter_id ?>">
                                                                            </div>
                                                                            <div class="form-group col-md-12" hidden>
                                                                                <textarea id="description" name="description" value="" readonly="" class="form-control" rows="4"></textarea>
                                                                            </div>
                                                                            <input type="text" id="noteId" name="id" class="noteId" hidden value=''>
                                                                            <input type="hidden" name="redirect" value='patient/caseList'>
                                                                            <div class="form-group col-md-12">
                                                                                <button type="submit" name="submit" class="btn btn-primary pull-right" id="submitbtn" onclick="myFunction()"> <?php echo lang('save_and_add_case'); ?></button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                <div class="row mb-1 mt-1">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a href="diagnosis/addDiagnosisView?encounter_id=<?php echo $appointment_details->encounter_id ?>" class="btn btn-secondary btn-md btn-block" target="_blank"><?php echo lang('add').' '.lang('diagnosis'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="row mb-1 mt-1">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a href="prescription/addPrescriptionView?id=<?php echo $patient_details->patient_id ?>&encounter_id=<?php echo $appointment_details->encounter_id ?>" class="btn btn-secondary btn-md btn-block" target="_blank"><?php echo lang('prescribe_medication'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="row mb-1 mt-1">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a href="labrequest/addLabRequestView?patient_id=<?php echo $patient_details->id ?>&encounter_id=<?php echo $appointment_details->encounter_id ?>" class="btn btn-secondary btn-md btn-block" target="_blank"><?php echo lang('add').' '.lang('lab').' '.lang('request'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="row mb-1 mt-1">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a href="finance/addPaymentView?patient_id=<?php echo $patient_details->id ?>&encounter_id=<?php echo $appointment_details->encounter_id ?>" class="btn btn-success btn-md btn-block" target="_blank"><?php echo lang('bill'); ?> <?php echo lang('patient'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="row mb-1 mt-1">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a href="appointment/todays" class="btn btn-info btn-md btn-block"><?php echo lang('back_to_appointment_list'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12" id="endEncounterDiv">
                                                        <?php if (!empty($this->encounter_model->getEncounterById($appointment_details->encounter_id)->ended_at)) { ?>
                                                            <a class="btn btn-light btn-md btn-block"><?php echo lang('encounter'); ?> has <?php echo lang('ended'); ?></a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-danger btn-md btn-block endEncounter" data-patient="<?php echo $this->patient_model->getPatientById($appointment_details->patient)->name; ?>" id="endEncounter"><?php echo lang('end'); ?> <?php echo lang('encounter'); ?></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- page end-->
                                </section>
                            </section>
                        </div>

                    </div>
                </div><!-- end app-content-->
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

        <!--Moment js-->
        <script src="<?php echo base_url('public/assets/plugins/moment/moment.js'); ?>"></script>

        <!-- Daterangepicker js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/daterange.js'); ?>"></script>

        <!--Chart js -->
        <script src="<?php echo base_url('public/assets/plugins/chart/chart.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/chart/chart.extension.js'); ?>"></script>

        <!-- ECharts js-->
        <script src="<?php echo base_url('public/assets/plugins/echarts/echarts.js'); ?>"></script>

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>

        <!--Newsticker js-->
        <script src="<?php echo base_url('public/assets/plugins/newsticker/newsticker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/newsticker.js'); ?>"></script>

        <!-- quill js -->
        <script src="<?php echo base_url('public/assets/plugins/quill/quill.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor2.js'); ?>"></script>

        <!-- Accordion js-->
        <script src="<?php echo base_url('public/assets/plugins/accordion/accordion.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/accordion.js'); ?>"></script>

        <!-- Custom js-->
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- Sweet alert js -->
        <script src="<?php echo base_url('public/assets/plugins/sweet-alert/jquery.sweet-modal.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/sweet-alert/sweetalert.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/sweet-alert.js'); ?>"></script>

        <!-- INTERNAL JS END -->
        <!-- <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"
        ></script> -->


        <script src="https://meet.jit.si/external_api.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#endEncounter").on("click", function(e){
                    var encounter_id = <?php echo $appointment_details->encounter_id ?>;
                    var patient = $(this).data('patient');
                    swal({
                        title: "End Encounter?",
                        text: "This will end encounter for " + patient,
                        showCancelButton: true,
                        confirmButtonText: 'End',
                        cancelButtonText: 'Cancel',
                    }, function (isConfirm) {
                        if (!isConfirm) return;
                        $.ajax({
                            url: "encounter/endEncounterById?encounter_id="+encounter_id,
                            type: "GET",
                            data: '',
                            dataType: "json",
                            success: function (response) {
                                swal("Done!", "You Successfully Ended", "success");
                                console.log(response.encounter_id);
                                $("#endEncounter").remove();
                                $("#endEncounterDiv").append(
                                    '<a class="btn btn-light btn-md btn-block">Encounter has Ended</a>');
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                swal("Error on Ending Encounter!", "Please try again", "error");
                            }
                        });
                    });
                });
            });
        </script>

        <script type="text/javascript">
            function myFunction(){
                var quill = document.getElementById('quillEditor').children[0].innerHTML;
                // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
                document.getElementById('description').value = quill;
            }
        </script>
        <script>
            $(document).ready(function () {
                //  console.log($('#email').val());
                const domain = "meet.jit.si";
                document.getElementById('meeting');
                const options = {
                    roomName: "<?php echo $appointment_details->room_id; ?>",
                    height: 500,
                    parentNode: document.querySelector("#meeting"),
                    userInfo: {
                        email: $('#email').val(),
                        displayName: $('#username').val()
                    },
                    enableClosePage: true,
                    SHOW_PROMOTIONAL_CLOSE_PAGE: true,
                    // ALWAYS_TRUST_MODE_ENABLED=true
                };
                const api = new JitsiMeetExternalAPI(domain, options);
            });
        </script> 

        <script type="text/javascript">
            $('#submitbtn').on('click',function(e){
            e.preventDefault();
                var data = $('#myForm').serialize();
                var base_url='<?php echo base_url(); ?>'
                $.ajax({
                    url:base_url+'patient/addMedicalHistory',
                    type:'POST',
                    data:data,
                    success:function(data){
                        var imp = document.getElementById('title').value;
                        var desc = document.getElementById('description').value;
                        if (imp && desc) {
                            var element = document.getElementsByClassName("ql-editor");
                            element[0].innerHTML = "";
                            document.getElementById('title').value = '';
                            document.getElementById('noteId').value = '';

                            event.preventDefault();
                            event.stopPropagation();
                            return $.growl.success({
                                message: "<?php echo lang('record_added'); ?>"
                            });
                        } else {
                            event.preventDefault();
                            event.stopPropagation();
                            return $.growl.error({
                                message: "<?php echo lang('validation_error'); ?>"
                            });
                        }

                        
                    }
                }); 
                return false;


               });
        </script>

    </body>
</html>         