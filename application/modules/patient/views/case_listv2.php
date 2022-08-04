<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                            <style type="text/css">
                                #screensize {
                                    cursor: pointer;
                                }
                            </style>
                        <?php echo validation_errors(); ?>
                        <div class="row mt-5">
                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <div class="col-md-12 col-sm-12 col-lg-12" id="addCase">
                                <div class="panel-group panel-group-primary mb-5"  role="tablist" aria-multiselectable="true" id="accordion3">
                                    <div class="panel panel-default active">
                                        <div class="panel-heading" role="tab" id="headingOne31">
                                            <h4 class="panel-title">
                                                <a class="collapsed" id="accordHeader" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne31" aria-expanded="true" aria-controls="collapseOne31">
                                                    <?php if (empty($case_lists->id)) { ?>
                                                        <?php echo lang('add'); ?> <?php echo lang('case'); ?>
                                                    <?php } else { ?>
                                                        <?php echo lang('edit'); ?> <?php echo lang('case'); ?>
                                                    <?php } ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne31">
                                            <div class="panel-body border-0 bg-white">
                                                <form role="form" action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="javascript: return myFunction();" id="casebody">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" id="date" required name="date" type="text" readonly value="<?php
                                                                if (!empty($case_lists->id)) {
                                                                    echo date('m/d/y', strtotime($case_lists->case_date.' UTC'));
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" required id="patientchoose" name="patient_id">
                                                                    <?php if(!empty($case_lists->id)) { ?>
                                                                        <option value="<?php echo $case_lists->patient_id ?>"><?php echo $this->patient_model->getPatientById($case_lists->patient_id)->name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('encounter'); ?> <span class="text-red"> *</span></label>
                                                                <select class="form-control select2-show-search" name="encounter_id" required id="encounter" <?php if(!empty($encounter_id)) { echo "disabled"; } ?>>
                                                                    <?php if (!empty($encounter_id)) { ?>
                                                                        <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encouter_type->display_name . ' - ' . date('M j, Y g:i a', strtotime($encounter->created_at.' UTC')); ?></option>
                                                                    <?php } ?>
                                                                    <?php if (!empty($encounter->id)) { ?>
                                                                        <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encouter_type->display_name . ' - ' . date('M j, Y g:i a', strtotime($encounter->created_at.' UTC')); ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?php if (!empty($encounter_id)) { ?>
                                                                    <input type="hidden" name="encounter_id" value="<?php
                                                                    if (!empty($encounter_id)) {
                                                                        echo $encounter_id;
                                                                    }
                                                                    ?>">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?><span class="text-red"> *</span></label>
                                                                <input type="text" class="form-control" id="title" required name="title" placeholder="<?php echo lang('clinical'); ?> <?php echo lang('impression'); ?>" value="<?php
                                                                if (!empty($case_lists->id)) {
                                                                    echo $case_lists->title;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label><?php echo lang('case'); ?> <?php echo lang('summary'); ?><span class="text-red"> *</span></label>
                                                                <!-- <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                                    <div id="quillEditor" class="bg-white quillEditor">
                                                                    </div>
                                                                </div> -->
                                                                    <textarea class="ckeditor form-control" id="editor" name="description" value="" rows="10" required><?php
                                                                    if (!empty($setval)) {
                                                                        echo set_value('description');
                                                                    }
                                                                    if (!empty($case_lists->id)) {
                                                                        echo $case_lists->description;
                                                                    }
                                                                    ?>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <textarea id="description" required name="description" readonly="" hidden="" class="form-control" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                                    <textarea name="desc" id="quillEditor" class="quillEditor form-control" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <input type="hidden" id="case_id" name="id" value='<?php echo $case_lists->id ?>'>
                                                    <input type="hidden" name="redirect" value='patient/caseList'>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right"><?php echo $case_lists->id?'Update':lang('submit'); ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12" id="caselist">
                            <?php } ?>
                            <?php if (!$this->ion_auth->in_group(array('Doctor'))) { ?>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                            <?php } ?>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title"><?php echo lang('all'); ?> <?php echo lang('case'); ?></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="editable-sample" class="table table-bordered text-nowrap key-buttons w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0"><?php echo lang('date'); ?></th>
                                                            <th class="border-bottom-0"><?php echo lang('patient'); ?></th>
                                                            <th class="border-bottom-0"><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?></th>
                                                            <th class="border-bottom-0"><?php echo lang('actions'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('case_notes'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form role="form" id="medical_historyEditForm" class="clearfix" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data" onsubmit="javascript: return myFunction2();">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" name="date" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                            <select class="form-control select2-show-search patient" id="patientchoose1" name="patient_id" data-placeholder="Choose one">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?></label>
                                            <input type="text" class="form-control" placeholder="Name" name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label><?php echo lang('case'); ?> <?php echo lang('summary'); ?></label>
                                            <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                <div id="quillEditor2" class="bg-white">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea id="description2" name="description" readonly="" hidden="" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value=''>
                                <input type="hidden" name="redirect" value='patient/caseList'>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="from-group">
                                            <button class="btn btn-primary pull-right" type="submit" name="EditCase">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="caseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title"><?php echo lang('case'); ?> <?php echo lang('details'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" id="section-to-print">
                            <form role="form" id="medical_historyEditForm" class="clearfix" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold"><?php echo lang('case'); ?> <?php echo lang('creation'); ?> <?php echo lang('date'); ?></label>
                                            <label class="case_date"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold"><?php echo lang('patient'); ?></label>
                                            <label class="case_patient"></label>
                                            <label class="case_patient_id"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 border-bottom">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold"><?php echo lang('clinical').' '.lang('impression'); ?></label>
                                            <label class="case_title"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row border-top">
                                </div> -->
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold"><?php echo lang('case').' '.lang('summary'); ?></label>
                                            <label class="case_details"></label>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

        <!--Counters -->
        <script src="<?php echo base_url('public/assets/plugins/counters/counterup.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/counters/waypoints.min.js') ?>"></script>

        <!--Chart js -->
        <script src="<?php echo base_url('public/assets/plugins/chart/chart.bundle.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/chart/utils.js') ?>"></script>
        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar.js'); ?>"></script>

        <!-- Timepicker js -->
        <script src="<?php echo base_url('public/assets/plugins/time-picker/jquery.timepicker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/time-picker/toggles.min.js'); ?>"></script>

        <!-- Datepicker js -->
        <script src="<?php echo base_url('public/assets/plugins/date-picker/date-picker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/date-picker/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/input-mask/jquery.maskedinput.js'); ?>"></script>

        <!-- Form Advanced Element -->
        <script src="<?php echo base_url('public/assets/js/formelementadvnced.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-elements.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/file-upload.js'); ?>"></script>

        <!-- WYSIWYG Editor js -->
        <script src="<?php echo base_url('public/assets/plugins/wysiwyag/jquery.richtext.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor.js'); ?>"></script>

        <!-- quill js -->
        <script src="<?php echo base_url('public/assets/plugins/quill/quill.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor2.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- Clipboard js -->
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.js'); ?>"></script>

        <!-- Prism js -->
        <script src="<?php echo base_url('public/assets/plugins/prism/prism.js'); ?>"></script>

        <!-- Accordion js-->
        <script src="<?php echo base_url('public/assets/plugins/accordion/accordion.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/accordion.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        // $("#encounter").change(function() {
        //     var encounter = $("#encounter").val();
        //     $("#patientchoose").find('option').remove();

        //     $.ajax({
        //         url: 'patient/getPatientByEncounterIdByJason?id='+encounter,
        //         method: 'GET',
        //         data: '',
        //         dataType: 'json',
        //         success: function (response) {
        //             var patient = response.patient;
        //             $('#patientchoose').append($('<option>').text(patient.name).val(patient.id)).end();
        //         }
        //     })
        // });

        $("#patientchoose").change(function() {
            var patient = $("#patientchoose").val();
            $("#encounter").find('option').remove();

            $.ajax({
                url: 'patient/getEncounterByPatientIdJason?id='+patient,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var encounter = response.encounter;
                    $.each(encounter, function (key, value) {
                        $('#encounter').append($('<option>').text(value.text).val(value.id)).end();
                    });
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#encounter").select2({
                placeholder: '<?php echo lang('select') . ' ' . lang('encounter'); ?>',
                allowClear: true,
                // ajax: {
                //     url: 'encounter/getEncounterInfo',
                //     type: "post",
                //     dataType: 'json',
                //     delay: 250,
                //     data: function (params) {
                //         return {
                //             searchTerm: params.term // search term
                //         };
                //     },
                //     processResults: function (response) {
                //         return {
                //             results: response
                //         };
                //     },
                //     cache: true
                // }

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {
                var date = $('#date').parsley();
                var patient = $('#patientchoose').parsley();
                var title = $('#title').parsley();
                var description = $('#description').parsley();

                if (date.isValid() && patient.isValid() && title.isValid() && description.isValid()) {
                    return true;
                } else {
                    date.validate();
                    patient.validate();
                    title.validate();
                    description.validate();
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".editbutton", function () {
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');

            $.ajax({
                url: 'patient/editMedicalHistoryByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    // Populate the form fields with the data returned from server
                    // var de = response.medical_history.date * 1000;
                    // var d = new Date(de);
                    // var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();

                    var date = response.date;

                    $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                    $('#medical_historyEditForm').find('[name="date"]').val(date).end()
                    //   $('#medical_historyEditForm').find('[name="patient"]').val(response.medical_history.patient_id).end()
                    $('#medical_historyEditForm').find('[name="title"]').val(response.medical_history.title).end()
                    var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
                    $('#medical_historyEditForm').find('[name="patient_id"]').append(option).trigger('change');
                    //   $('.js-example-basic-single.patient').val(response.medical_history.patient_id).trigger('change');
                    document.getElementById('quillEditor2').children[0].innerHTML = response.medical_history.description;

                    $('#myModal2').modal('show');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".case", function () {
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');

            $('.case_date').html("").end()
            $('.case_details').html("").end()
            $('.case_title').html("").end()
            $('.case_patient').html("").end()
            $('.case_patient_id').html("").end()
            $.ajax({
                url: 'patient/getCaseDetailsByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    // Populate the form fields with the data returned from server

                    // var de = response.case.date * 1000;
                    // var d = new Date(de);


                    // var monthNames = [
                    //     "January", "February", "March",
                    //     "April", "May", "June", "July",
                    //     "August", "September", "October",
                    //     "November", "December"
                    // ];

                    // var day = d.getDate();
                    // var monthIndex = d.getMonth();
                    // var year = d.getFullYear();

                    // var da = day + ' ' + monthNames[monthIndex] + ', ' + year;

                    var date = response.date;


                    $('.case_date').append(date).end()
                    $('.case_patient').append(response.patient.name).end()
                    $('.case_patient_id').append('ID: ' + response.patient.id).end()
                    $('.case_title').append(response.case.title).end()
                    $('.case_details').append(response.case.description).end()


                    $('#caseModal').modal('show');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#screensize").click(function () {
                x = document.getElementById("addCase");

                if (x.className === "col-md-12 col-sm-12 col-lg-12") {
                    x.className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("caselist").className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("screensize").className = "fa fa-compress text-dark"
                    $("#casebody").attr("hidden", false);
                } else {
                    x.className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("caselist").className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("screensize").className = "fa fa-expand text-dark"
                    $("#casebody").attr("hidden", true);
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#accordHeader").click(function () {
                var z = document.getElementById("accordHeader");

                if (z.className === "collapsed") {
                    z.className = "collapsed text-dark border-bottom";
                    z.style.backgroundColor = "#fff";
                } else {
                    z.className = "collapsed";
                    z.style.backgroundColor = "";
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var form_id = $("#case_id").val();
            var z = document.getElementById("accordHeader");
            var x = document.getElementById("collapseOne31");
            if (form_id !== "") {
                z.className = "collapsed text-dark border-bottom";
                z.style.backgroundColor = "#fff";
                x.className = "panel-collapse collapse show";
                $("#accordHeader").attr("aria-expanded", true);

                /*USE THIS TO GET THE ID ON URL*/
                    // var baseUrl = (window.location).href;
                    // var koopId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
                    // alert(koopId)
                /*END*/
            }
        });
    </script>

    <script type="text/javascript">
        function myFunction(){
            var quill = document.getElementById('quillEditor').children[0].innerHTML;
            // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
            document.getElementById('description').value = quill;
        }

        function myFunction2(){
            var quill = document.getElementById('quillEditor2').children[0].innerHTML;
            // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
            document.getElementById('description2').value = quill;
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#editable-sample').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                // "processing": true,
                // "serverSide": true,
                // "searchable": true,
                "ajax": {
                    url: "patient/getCaseList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-4 text-center'B><'col-sm-5'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                title: '<?php echo lang('all') . ' ' . lang('cases');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('all') . ' ' . lang('cases');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('all') . ' ' . lang('cases');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('all') . ' ' . lang('cases');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('all') . ' ' . lang('cases');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            }
                        ]
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 100,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
            });

            table.buttons().container()
                    .appendTo('.custom_buttons');
        });

    </script>

    <script>
        $(document).ready(function () {
            $("#patientchoose").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    // url: 'patient/getPatientinfo',
                    url: 'patient/getPatientInfoByVisitedProviderId',
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
            $("#patientchoose1").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    // url: 'patient/getPatientinfo',
                    url: 'patient/getPatientInfoByVisitedProviderId',
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