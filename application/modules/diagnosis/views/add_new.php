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
                                                    <input type="hidden" name="encounter_id" value="<?php
                                                    if (!empty($encounter_id)) {
                                                        echo $encounter_id;
                                                    }
                                                    ?>">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="redirect" value="<?php
                                                    if (!empty($encounter_id)) {
                                                        echo "encounter";
                                                    }
                                                    ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                        <select class="form-control select2-show-search" name="encounter" id="encounter" <?php if(!empty($encounter_id)) { echo "disabled"; } ?>>
                                                            <?php if (!empty($encounter_id)) { ?>
                                                                <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encouter_type->display_name . ' - ' . $encounter->created_at; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('diagnosis') . '  ' . lang('date') ?></label>
                                                        <input type="text" class="form-control fc-datepicker1" id="date" readonly placeholder="MM/DD/YYYY" name="date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('onset') . '  ' . lang('date') ?></label>
                                                        <input type="text" class="form-control fc-datepicker" id="on_date" readonly placeholder="MM/DD/YYYY" name="on_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('patient'); ?></label>
                                                                <select class="select2-show-search form-control pos_select" id="pos_select" name="patient" placeholder="Search Patient" <?php if(!empty($encounter_id)) { echo "disabled"; } ?>>
                                                                    <?php if (!empty($encounter->id)) { ?>
                                                                        <option value="<?php echo $patient->id; ?>" selected><?php echo $patient->name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering_doctor'); ?></label>
                                                                <select class="select2-show-search form-control add_doctor" id="add_doctor" name="doctor" placeholder="Search Doctor" <?php if(!empty($encounter_id)) { echo "disabled"; } ?>>
                                                                    <?php if (!empty($encounter->id)) { ?>
                                                                        <option value="<?php echo $doctor->id; ?>" selected><?php echo $doctor->name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9 col-sm-12 diagnosis_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('select') . ' ' . lang('diagnosis') ?></label>
                                                        <select class="select2-show-search form-control diagnosis" name="diagnosisInput" id="diagnosis" value="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12 diagnosis_block">
                                                    <div class="form-group">
                                                        <label class="form-label">or Type Manually</label>
                                                        <button class="btn btn-primary" id="add_manual" type="button">Add Diagnosis Test</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12 diagnosis_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('diagnosis'); ?></label>
                                                        <div class="diag">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 text-right">
                                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit') ?></button>
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

    <!-- INTERNAL JS INDEX END -->

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
        $(document).ready(function () {
            $("#encounter").select2({
                placeholder: '<?php echo lang('select') . ' ' . lang('encounter'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getEncounterInfo',
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
                    url: 'doctor/getDoctorWithAddNewOption',
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
            $(".diagnosis").change(function () {
                

                var selected = $('#diagnosis').find('option:selected');
                var unselected = $('#diagnosis').find('option:not(:selected)');
                selected.attr('data-selected', '1');
                var num = 0;
                var countdiag = $(".diag_selected").length;
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
                                                <div class="col-sm-8">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" class = "form-control diag-div" name = "diag_description[]" value = "' + diag_desc + '" placeholder="" required readonly>\n\
                                                        <input type="hidden" id="diag_id-' + id + '" class = "diag-div" name = "diagnosis[]" value = "' + id + '" placeholder="" required disabled>\n\
                                                        <input class = "form-control diag-div" name = "diag[]" hidden value = "' + id + '" placeholder="" required>\n\
                                                        <input type="text" hidden class = "form-control diag-div" name = "patient_diagnosis_text[]" placeholder="">\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="col-sm-4">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" hidden name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0 custom-switch"><span class="custom-switch-description mr-2">Secondary</span><input type="radio" name="type" value="' + count + '" class="custom-switch-input"><span class="custom-switch-indicator custom-switch-indicator-xl"></span></label><label class="align-self-center mb-0 ml-2"><span class="text-muted">Primary</span></label></div>\n\
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
                console.log(count);
                $(".diag").append(
                    '<section class="diag_selected remove'+ count +'" id="diag_selected_section">\n\
                        <div class="row">\n\
                            <div class="col-sm-1">\n\
                                <button class="btn btn-danger" onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                            </div>\n\
                            <div class="col-sm-11">\n\
                                <div class="form-group diagnosis_sect">\n\
                                    <div class="row">\n\
                                        <div class="col-sm-8">\n\
                                            <div class="form-group">\n\
                                                <input type="text" hidden class = "form-control diag-div" name = "diag_description[]" value = "" placeholder="" required readonly>\n\
                                                <input type="text" class = "form-control diag-div" name = "patient_diagnosis_text[]" placeholder="" required>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col-sm-4">\n\
                                            <div class="form-group">\n\
                                                <input type="text" hidden name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                <div class="input-group"><label class="align-self-center mb-0 custom-switch"><span class="custom-switch-description mr-2">Secondary</span><input type="radio" name="type" value="' + count + '" class="custom-switch-input"><span class="custom-switch-indicator custom-switch-indicator-xl"></span></label><label class="align-self-center mb-0 ml-2"><span class="text-muted">Primary</span></label></div>\n\
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