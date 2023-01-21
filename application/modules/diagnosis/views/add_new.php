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
                                            <?php echo lang('add'); ?> <?php echo lang('diagnosis'); ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" id="branchForm" action="diagnosis/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <?php echo validation_errors(); ?>
                                                    <?php
                                                        $file_error = $this->session->flashdata('fileError');
                                                        $other_error_list = $this->session->flashdata('error_list');
                                                        if(!empty($file_error)) {
                                                            echo $file_error;
                                                        }
                                                        if(!empty($other_error_list)) {
                                                            echo $other_error_list;
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="redirect" value="<?php
                                                    if (empty($redirect)) {
                                                        echo "diagnosis";
                                                    } elseif (!empty($redirect)) {
                                                        echo $redirect;
                                                    }
                                                    ?>">
                                                </div>
                                            </div>
                                            <?php if (!empty($diagnosis[0]->patient_diagnosis_number)) { ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <input type="hidden" name="id" value="<?php echo $diagnosis[0]->patient_diagnosis_number; ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('diagnosis') . '  ' . lang('date') ?></label>
                                                        <?php if (empty($diagnosis->diagnosis_date)) { ?>
                                                            <input type="text" class="form-control flatpickr" id="date1" required readonly placeholder="MM/DD/YYYY" name="date">
                                                        <?php } else { ?>
                                                            <input type="text" class="form-control flatpickr" id="date" required readonly placeholder="MM/DD/YYYY" name="date" value="<?php
                                                                echo date('Y-m-d H:i', strtotime($diagnosis->diagnosis_date.' UTC'));
                                                            ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('onset') . '  ' . lang('date') ?></label>
                                                        <?php if (empty($diagnosis->onset_date)) { ?>
                                                            <input type="text" class="form-control flatpickr" id="on_date1" required readonly placeholder="MM/DD/YYYY" name="on_date">
                                                        <?php } else { ?>
                                                            <input type="text" class="form-control flatpickr" id="on_date" required readonly placeholder="MM/DD/YYYY" name="on_date" value="<?php
                                                                echo date('Y-m-d H:i', strtotime($diagnosis->onset_date.' UTC'));
                                                            ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('patient'); ?></label>
                                                                <select class="select2-show-search form-control pos_select" required id="pos_select" name="patient" placeholder="Search Patient" <?php if(!empty($encounter->patient_id)) { echo "disabled"; } elseif (!empty($patient)) { echo "disabled"; } ?>>
                                                                    <?php if (!empty($encounter->patient_id)) { ?>
                                                                        <option value="<?php echo $encounter->patient_id; ?>" selected><?php echo $this->patient_model->getPatientById($encounter->patient_id)->name; ?></option>
                                                                    <?php } elseif (!empty($diagnosis[0]->patient_id)) { ?>
                                                                        <option value="<?php echo $diagnosis[0]->patient_id; ?>" selected><?php echo $this->patient_model->getPatientById($diagnosis[0]->patient_id)->name; ?></option>
                                                                    <?php } elseif (!empty($patient)) { ?>
                                                                        <option value="<?php echo $patient; ?>" selected><?php echo $this->patient_model->getPatientByPatientNumber($patient)->name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?php if (!empty($encounter->patient_id)) { ?>
                                                                    <input type="hidden" name="patient" value="<?php echo $encounter->patient_id ?>">
                                                                <?php } elseif(!empty($patient)) { ?>
                                                                    <input type="hidden" name="patient" value="<?php echo $patient_details->id ?>">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering_doctor'); ?></label>
                                                                <select class="select2-show-search form-control add_doctor" required id="add_doctor" name="doctor" placeholder="Search Doctor" <?php if(!empty($encounter->doctor)) { echo "disabled"; } ?>>
                                                                    <?php if (!empty($encounter->doctor)) { ?>
                                                                        <option value="<?php echo $doctor->id; ?>" selected><?php echo $doctor->name ?></option>
                                                                    <?php } ?>
                                                                    <?php if (!empty($diagnosis[0]->doctor_id)) { ?>
                                                                        <option value="<?php echo $diagnosis[0]->doctor_id; ?>" selected><?php echo $this->doctor_model->getDoctorById($diagnosis[0]->doctor_id)->name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?php if (!empty($encounter->doctor)) { ?>
                                                                    <input type="hidden" name="doctor" value="<?php echo $doctor->id ?>">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                        <select class="form-control select2-show-search" required name="encounter_id" id="encounter" <?php if(!empty($encounter->id)) { echo "disabled"; } ?>>
                                                            <?php if (!empty($encounter->id)) { ?>
                                                                <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encouter_type->display_name . ' - ' . date('M j, Y g:i a', strtotime($encounter->created_at.' UTC')); ?></option>
                                                            <?php } ?>
                                                            <?php if (!empty($id)) { ?>
                                                                <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encouter_type->display_name . ' - ' . date('M j, Y g:i a', strtotime($encounter->created_at.' UTC')); ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php if (!empty($encounter->id)) { ?>
                                                            <input type="hidden" name="encounter_id" value="<?php
                                                            if (!empty($encounter_id)) {
                                                                echo $encounter_id;
                                                            } elseif (!empty($encounter->id)) {
                                                                echo $encounter->id;
                                                            }
                                                            ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-lg-9 diagnosis_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('select') . ' ' . lang('diagnosis') ?></label>
                                                        <?php if (empty($diagnosis)) { ?>
                                                            <select class="select2-show-search form-control diagnosis" name="diagnosisInput" id="diagnosis" value="">
                                                                
                                                            </select>
                                                        <?php } else { ?>
                                                            <select class="select2-show-search form-control diagnosis" name="diagnosisInput" id="diagnosis" value="" multiple>
                                                                <?php foreach($diagnosis as $diag) { ?>
                                                                    <?php if (!empty($diag->diagnosis_code)) { ?>
                                                                        <?php $i += 1; ?>
                                                                        <option value="<?php echo $diag->diagnosis_id . '*' . $diag->diagnosis_long_description . '*' . $diag->diagnosis_code . '*' . $diag->diagnosis_notes . '*' . $diag->is_primary_diagnosis; ?>" <?php echo 'data-notes="' . $diag->diagnosis_notes . '"data-request="' . $diag->id . '"' ?> selected="selected">
                                                                            <?php echo $diag->diagnosis_long_description; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-3 diagnosis_block">
                                                    <div class="form-group">
                                                        <label class="form-label">or Type Manually</label>
                                                        <button class="btn btn-primary" id="add_manual" type="button"><?php echo lang('add').' '.lang('diagnosis'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12 diagnosis_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('diagnosis'); ?></label>
                                                        <div class="diag">
                                                            <?php if (!empty($diagnosis)) { ?>
                                                                <?php foreach($diagnosis as $diag) { ?>
                                                                    <?php if (empty($diag->diagnosis_code)) { ?>
                                                                        <?php $i += 1; ?>
                                                                        <input type="text" hidden name="manual_item[]" class="manual_item" value="<?php echo $diag->id.'*'.$diag->patient_diagnosis_text.'*'.$diag->diagnosis_notes.'*'.$i.'*'.$diag->is_primary_diagnosis; ?>">
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 text-right">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary"><?php echo lang('submit') ?></button>
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

        <!-- Forn-wizard js-->
        <script src="<?php echo base_url('public/assets/plugins/formwizard/jquery.smartWizard.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/formwizard/fromwizard.js'); ?>"></script>

        <!-- Treeview js -->
        <script src="<?php echo base_url('public/assets/plugins/treeview/treeview.js'); ?>"></script>

        <!-- Clipboard js -->
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.js'); ?>"></script>

        <!-- Prism js -->
        <script src="<?php echo base_url('public/assets/plugins/prism/prism.js'); ?>"></script>

        <!--Accordion-Wizard-Form js-->
        <script src="<?php echo base_url('public/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-wizard.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            var patient_id = '<?php //echo $patient_details->id ?>';
            if (patient_id) {
                $.ajax({
                    url: 'diagnosis/addDiagnosisByJason',
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.patient_details);
                        $.each(response.patient_details, function(key, value) {
                            if (patient_id == value.id) {
                                $("#pos_select").append($('<option selected>').text(value.name).val(value.id)).end();
                            } else {
                                $("#pos_select").append($('<option>').text(value.name).val(value.id)).end();
                            }
                        });
                    }
                });
            }
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            var patient_id = '<?php echo $patient_details?$patient_details->id:'' ?>';
            if (patient_id != '') {
                $.ajax({
                    url: 'encounter/getEncounterByPatientId?patient_id='+patient_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var encounter = response.encounter;
                        var encounter_type = response.encounter_type;
                        $.each(encounter, function (key, value) {
                            $('#encounter').append($('<option>').text(value.encounter_number+' - '+value.display_name+' - '+value.created_at).val(value.id)).end();
                        });
                    }
                })
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {
                var date = $('#date').parsley();
                var on_date = $('#on_date').parsley();
                var patient = $('#pos_select').parsley();
                var doctor = $('#add_doctor').parsley();
                var encounter = $('#encounter').parsley();

                if (date.isValid() && on_date.isValid() && patient.isValid() && doctor.isValid() && encounter.isValid()) {
                    return true;
                } else {
                    date.validate();
                    on_date.validate();
                    patient.validate();
                    doctor.validate();
                    encounter.validate();
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var date = "<?php echo $diagnosis?date('Y-m-d H:i A', strtotime($diagnosis[0]->diagnosis_date.' UTC')):'today'?>";
            var diag = "<?php echo $diagnosis ?>";
            console.log(diag);
            if (diag === "") {
                var timenow = "<?php echo date('Y-m-d H:i'); ?>";
                var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
            } else {
                var timenow = date;
                var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
            }
            flatpickr(".flatpickr", {
                disable: [maxdate],
                maxDate: maxdate,
                altInput: true,
                altFormat: "F j, Y h:i K",
                dateFormat: "Y-m-d h:i K",
                disableMobile: "true",
                enableTime: true,
                defaultDate: timenow,
            });
        });
    </script>

    <script type="text/javascript">
        $('.fc-datepicker1').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tpBasic').timepicker('setTime', new Date());
            $('.fc-datepicker1').datepicker('setDate', new Date());
        });
    </script>

    <script type="text/javascript">
        $("#pos_select").change(function() {
            var patient = $("#pos_select").val();
            $("#encounter").find('option').remove();

            $.ajax({
                url: 'diagnosis/getEncounterByPatientIdJason?id='+patient,
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
            $("#pos_select").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getPatientinfo',
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
            $("#add_doctor").select2({
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
        function removeElem(count, id) {
            var remove = $(".remove"+count);

            /*Select2 Option Delete Function Start*/
                // var selected = $('#labrequest').find('option:selected');
                // var selected_val = $('#labrequest').val();
                
                // $.each(selected_val, function (index, value) {
                //     var selected_id = value.split("*");
                //     if (parseInt(selected_id[0]) !== parseInt(id)) {
                //         console.log("New Selected: "+selected_id[0]);
                //         console.log(selected_id);
                //         $('#labrequest').val(null).trigger("change");
                //         $('#labrequest').append($('<option selected>').text(selected_id[1]).val(value)).change();
                //     } else {

                //     }
                // });
            /*Select2 Option Delete Function End*/

            remove.remove();

        }
        // $('#labrequest').on('select2:select', function (e) {
        //     var data = e.params.data;
        //     var selected = $('#labrequest').find('option:selected');
        //     console.log("Id: "+data.id[0]);
        //     console.log("Data-Selected: "+selected.attr('data-selected'));
        // });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var selected = $('#diagnosis').find('option:selected');
            var unselected = $('#diagnosis').find('option:not(:selected)');
            selected.attr('data-selected', '1');
            
            $.each(unselected, function (index, value1) {
                num--;
                var countdiag = $(".diag_selected").length;
                var count = parseInt(countdiag) - 1;
                // console.log(count);
                if ($(this).attr('data-selected') == '1') {
                    var value = $(this).val();
                    var res = value.split("*");
                    // var unit_price = res[1];
                    var id = res[0];

                    // console.log(id);
                    $('#diag_selected_section-' + id).remove();
                    // $('#removediv' + $(this).val() + '').remove();
                    //this option was selected before

                }
            });

            $.each($('select.diagnosis option:selected'), function ( index ) {
                var countdiag = $(".diag_selected").length;
                var count = parseInt(countdiag) + 1;
                var value = $(this).val();
                var res = value.split("*");
                var id = res[0];
                var diag_desc = res[1];
                var diag_notes = res[3];
                var diag_primary = res[4];
                if (diag_primary == 1) {
                    var checked = "checked";
                } else {
                    var checked = "";
                }

                console.log(diag_primary);

                if ($('#labreq_id-' + id).length)
                {

                } else {
                    $(".diag").append(
                        '<section class="diag_selected remove'+ count +'" id="diag_selected_section-' + id + '">\n\
                            <div class="row">\n\
                                <div class="col-sm-1">\n\
                                    <button class="btn btn-danger" hidden onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                                </div>\n\
                                <div class="col-sm-11">\n\
                                    <div class="form-group diagnosis_sect">\n\
                                        <div class="row">\n\
                                            <div class="col-lg-8 col-md-6 col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <input type="text" class = "form-control diag-div" name = "diag_description[]" value = "' + diag_desc + '" placeholder="" required readonly>\n\
                                                    <input type="hidden" id="diag_id-' + id + '" class = "diag-div" name = "diagnosis[]" value = "' + id + '" placeholder="" required disabled>\n\
                                                    <input class = "form-control diag-div" name = "diag[]" hidden value = "' + id + '" placeholder="" required>\n\
                                                    <input type="text" hidden class = "form-control diag-div" name = "patient_diagnosis_text[]" placeholder="">\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="col-lg-4 col-md-6 col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <input type="hidden" name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0 custom-switch"><span class="custom-switch-description mr-2">Secondary</span><input type="radio" name="type" '+checked+' value="' + count + '" class="custom-switch-input"><span class="custom-switch-indicator custom-switch-indicator-xl"></span></label><label class="align-self-center mb-0 ml-2"><span class="text-muted">Primary</span></label></div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("diagnosis") . " " . lang("note")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" value="'+ diag_notes +'"></div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            <div>\n\
                        </section>\n\
                    ');
                }

            });

            $.each($('input.manual_item'), function (index) {
                var value = $(this).val();
                var res = value.split("*");
                var id = res[0];
                var diagnosis_text = res[1];
                var diagnosis_notes = res[2];
                var i = res[3];
                var diag_primary = res[4];
                var countdiagReq = $(".diag_selected").length;
                var count = parseInt(countdiagReq) + 1;

                if (diag_primary == 1) {
                    var checked = "checked";
                } else {
                    var checked = "";
                }
                console.log(count);
                // console.log(value);
                $(".diag").append(
                    '<section class="diag_selected remove'+ count +'" id="diag_selected_section">\n\
                        <div class="row">\n\
                            <div class="col-sm-1">\n\
                                <button class="btn btn-danger" onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                            </div>\n\
                            <div class="col-sm-11">\n\
                                <div class="form-group diagnosis_sect">\n\
                                    <div class="row">\n\
                                        <div class="col-lg-8 col-md-6 col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" hidden class = "form-control diag-div" name = "diag_description[]" value = "" placeholder="" required readonly>\n\
                                                <input type="hidden" id="diag_id-' + id + '" class = "diag-div" name = "diagnosis[]" value = "" placeholder="" required disabled>\n\
                                                <input class = "form-control diag-div" name = "diag[]" hidden value = "" placeholder="" required>\n\
                                                <input type="text" class = "form-control diag-div" name = "patient_diagnosis_text[]" placeholder="" value="'+diagnosis_text+'" required>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col-lg-4 col-md-6 col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                <div class="input-group"><label class="align-self-center mb-0 custom-switch"><span class="custom-switch-description mr-2">Secondary"'+diag_primary+'"</span><input type="radio" name="type" '+checked+' value="' + count + '" class="custom-switch-input"><span class="custom-switch-indicator custom-switch-indicator-xl"></span></label><label class="align-self-center mb-0 ml-2"><span class="text-muted">Primary</span></label></div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("diagnosis") . " " . lang("note")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" value="'+diagnosis_notes+'"></div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        <div>\n\
                    </section>\n\
                ');
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".diagnosis").change(function () {
                

                var selected = $('#diagnosis').find('option:selected');
                var unselected = $('#diagnosis').find('option:not(:selected)');
                selected.attr('data-selected', '1');
                var num = 0;
                var countdiag = $(".diag_selected").length;
                var type = parseInt($(".type").length) + 1;
                if (type <= 1) {
                    var active = "checked";
                } else {
                    var active = '';
                }
                $.each(unselected, function (index, value1) {
                    num--;
                    var count = parseInt(countdiag) - 1;
                    if ($(this).attr('data-selected') == '1') {
                        var value = $(this).val();
                        var res = value.split("*");
                        // var unit_price = res[1];
                        var id = res[0];

                        console.log(id);
                        $('#diag_selected_section-' + id).remove();
                        // $('#removediv' + $(this).val() + '').remove();
                        //this option was selected before

                    }
                });

                
                $.each($('select.diagnosis option:selected'), function ( index ) {
                    num++;
                    var count = parseInt(countdiag) + 1;
                    var value = $(this).val();
                    var res = value.split("*");
                    var id = res[0];
                    var diag_desc = res[1];
                    
                    console.log(value);
                    if ($('#diag_id-' + id).length)
                    {

                    } else {
                        $(".diag").append(
                            '<section class="diag_selected remove'+ count +'" id="diag_selected_section-' + id + '">\n\
                                <div class="row">\n\
                                    <div class="col-sm-1">\n\
                                        <button class="btn btn-danger" hidden onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                                    </div>\n\
                                    <div class="col-sm-11">\n\
                                        <div class="form-group diagnosis_sect">\n\
                                            <div class="row">\n\
                                                <div class="col-lg-8 col-md-6 col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" class = "form-control diag-div" name = "diag_description[]" value = "' + diag_desc + '" placeholder="" required readonly>\n\
                                                        <input type="hidden" id="diag_id-' + id + '" class = "diag-div" name = "diagnosis[]" value = "' + id + '" placeholder="" required disabled>\n\
                                                        <input class = "form-control diag-div" name = "diag[]" hidden value = "' + id + '" placeholder="" required>\n\
                                                        <input type="text" hidden class = "form-control diag-div" name = "patient_diagnosis_text[]" placeholder="">\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="col-lg-4 col-md-6 col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <input type="hidden" name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0 custom-switch"><span class="custom-switch-description mr-2">Secondary</span><input type="radio" name="type" '+active+' value="' + count + '" class="custom-switch-input type"><span class="custom-switch-indicator custom-switch-indicator-xl"></span></label><label class="align-self-center mb-0 ml-2"><span class="text-muted">Primary</span></label></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="row">\n\
                                                <div class="col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("diagnosis") . " " . lang("note")?> &nbsp</label><input type="text" class="form-control" name="instruction[]"></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                <div>\n\
                            </section>\n\
                        ');
                    }
                });
            });
        });

        $(document).ready(function () {
            $("#add_manual").click(function () {
                // var numm = $('.num').last().text();
                // count += parseInt(numm);
                // // console.log(count);
                var countdiag = $(".diag_selected").length;
                var count = parseInt(countdiag) + 1;
                var type = parseInt($(".type").length) + 1;
                if (type <= 1) {
                    var active = "checked";
                } else {
                    var active = '';
                }
                // console.log(count);
                $(".diag").append(
                    '<section class="diag_selected remove'+ count +'" id="diag_selected_section">\n\
                        <div class="row">\n\
                            <div class="col-sm-1">\n\
                                <button class="btn btn-danger" onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                            </div>\n\
                            <div class="col-sm-11">\n\
                                <div class="form-group diagnosis_sect">\n\
                                    <div class="row">\n\
                                        <div class="col-lg-8 col-md-6 col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" hidden class = "form-control diag-div" name = "diag_description[]" value = "" placeholder="" required readonly>\n\
                                                <input type="text" class = "form-control diag-div" name = "patient_diagnosis_text[]" placeholder="" required>\n\
                                                <input class = "form-control diag-div" name = "diag[]" hidden value = "" placeholder="">\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col-lg-4 col-md-6 col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="hidden" name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                <div class="input-group"><label class="align-self-center mb-0 custom-switch"><span class="custom-switch-description mr-2">Secondary</span><input type="radio" name="type" '+active+' value="' + count + '" class="custom-switch-input type"><span class="custom-switch-indicator custom-switch-indicator-xl"></span></label><label class="align-self-center mb-0 ml-2"><span class="text-muted">Primary</span></label></div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("diagnosis") . " " . lang("note")?> &nbsp</label><input type="text" class="form-control" name="instruction[]"></div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        <div>\n\
                    </section>\n\
                ');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#diagnosis").select2({
                placeholder: '<?php echo lang('diagnosis'); ?>',
                multiple: true,
                allowClear: false,
                ajax: {
                    url: 'diagnosis/getDiagnosisIcd10Select2',
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

    </body>
</html>