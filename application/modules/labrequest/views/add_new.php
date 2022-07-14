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
                                            <?php if (!empty($request_number)) { ?>
                                                <?php echo lang('edit') . ' ' . lang('lab') . ' ' . lang('request'); ?>
                                            <?php } else { ?>
                                                <?php echo lang('add') . ' ' . lang('lab') . ' ' . lang('request'); ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" id="labrequestForm" action="labrequest/addNew" class="clearfix" method="post" enctype="multipart/form-data">
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
                                                    
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" hidden name="redirect" value="<?php
                                                    if (!empty($encounter_id)) {
                                                        echo "encounter";
                                                    }
                                                    ?>">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <input type="hidden" name="medical_history_redirect" value="<?php
                                                        if (!empty($redirect)) {
                                                            echo $redirect;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" hidden name="request_id" id="request_id" value="<?php
                                                    if (!empty($request_id)) {
                                                        echo $request_id;
                                                    }
                                                    ?>">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" hidden name="labrequest_number" id="lab_request_number_input" value="<?php
                                                        if (!empty($request_number)) {
                                                            echo $request_number;
                                                        } else {
                                                            echo "";
                                                        }
                                                    ?>">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" hidden name="loinc" id="loinc_input" value="<?php
                                                        if (!empty($labrequest->lab_loinc_id)) {
                                                            echo $labrequest->lab_loinc_id;
                                                        } else {
                                                            echo "";
                                                        }
                                                    ?>">
                                                </div>
                                            </div>
                                            <div class="row">
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
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('lab') . '  ' . lang('request') . ' ' . lang('date') ?><span class="text-red"> *</span></label>
                                                        <?php if (empty($lab_request_date)) { ?>
                                                            <input type="text" class="form-control flatpickr" id="date1" required readonly placeholder="MM/DD/YYYY" name="date">
                                                        <?php } else { ?>
                                                            <input type="text" class="form-control flatpickr" id="date" required readonly placeholder="MM/DD/YYYY" name="date" value="<?php
                                                                echo date('Y-m-d H:i', strtotime($lab_request_date.' UTC'));
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
                                                                <label class="form-label"><?php echo lang('patient'); ?><span class="text-red"> *</span></label>
                                                                <select class="select2-show-search form-control pos_select" required id="pos_select" name="patient" placeholder="Search Patient" <?php if(!empty($encounter_id)) { echo "disabled"; } ?>>
                                                                    <?php if (!empty($encounter_id)) { ?>
                                                                        <option value="<?php echo $patient->id; ?>" selected><?php echo $patient->name ?></option>
                                                                    <?php } ?>
                                                                    <?php if (!empty($request_number)) { ?>
                                                                        <option value="<?php echo $patient->id; ?>" selected><?php echo $patient->name ?></option>
                                                                    <?php } ?>
                                                                    <?php if (!empty($patient_id)) { ?>
                                                                        <option value="<?php echo $patient_id ?>" selected="selected"><?php echo $this->patient_model->getPatientById($patient_id)->name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?php if (!empty($encounter_id)) { ?>
                                                                    <input type="hidden" name="patient" value="<?php echo $patient->id ?>">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering_doctor'); ?><span class="text-red"> *</span></label>
                                                                <select class="select2-show-search form-control add_doctor" required id="add_doctor" name="doctor" placeholder="Search Doctor" <?php if(!empty($encounter_id)) { echo "disabled"; } ?>>
                                                                    <?php if (!empty($encounter->id)) { ?>
                                                                        <option value="<?php echo $doctor->id; ?>" selected><?php echo $doctor->name ?></option>
                                                                    <?php } ?>

                                                                    <?php if (!empty($request_number)) { ?>
                                                                        <option value="<?php echo $doctor->id ?>" selected><?php echo $doctor->firstname.' '.$doctor->lastname ?></option>
                                                                    <?php } ?>
                                                                    <?php if (!empty($doctordetails)) { ?>
                                                                        <option value="<?php echo $doctordetails->id; ?>" selected="selected"><?php echo $doctordetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>  
                                                                    <?php } ?>
                                                                </select>
                                                                <?php if (!empty($encounter_id)) { ?>
                                                                    <input type="hidden" name="doctor" value="<?php echo $doctor->id ?>">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-10 col-md-8 col-sm-12 labrequest_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('select') . ' ' . lang('lab') . ' ' . lang('test') ?></label>
                                                        <?php /*if (empty($labrequest->lab_loinc_id)) { ?>
                                                            <select class="select2-show-search form-control labrequest" name="labrequestInput" id="labrequest" value="">

                                                            </select>
                                                        <?php } else { ?>
                                                            <select class="select2-show-search form-control labrequest" name="labrequestInput" id="labrequest" value="" multiple>
                                                                <?php if (!empty($labrequest->lab_loinc_id)) { ?>
                                                                    <option value="<?php echo $labrequest->lab_loinc_id . '*' . $labrequest->long_common_name . '*' . $labrequest->loinc_num; ?>" <?php echo 'data-loincid="' . $labrequest->lab_loinc_id . '"data-long="' . $labrequest->long_common_name . '"' ?> selected="selected">
                                                                        <?php echo $labrequest->long_common_name ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php }*/ ?>

                                                        <?php if (empty($labrequests)) { ?>
                                                            <select class="select2-show-search form-control labrequest" name="labrequestInput" id="labrequest" value="">

                                                            </select>
                                                        <?php } else { ?>
                                                            <select class="select2-show-search form-control labrequest" name="labrequestInput" id="labrequest" value="" multiple>
                                                                <?php $i; ?>
                                                                <?php foreach ($labrequests as $labrequest) { ?>
                                                                    <?php if (!empty($labrequest->lab_loinc_id)) { ?>
                                                                        <?php $i += 1; ?>
                                                                        <option value="<?php echo $labrequest->lab_loinc_id . '*' . $labrequest->long_common_name . '*' . $labrequest->loinc_num; ?>" <?php echo 'data-instructions="' . $labrequest->instructions . '"data-request="' . $labrequest->id . '"' ?> selected="selected">
                                                                            <?php echo $labrequest->long_common_name ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-4 col-sm-12 labrequest_block">
                                                    <div class="form-group">
                                                        <label class="form-label">or Type Manually</label>
                                                        <button class="btn btn-primary" id="add_manual" type="button">Add Lab Test</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12 lab_request_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('lab') . ' ' . lang('request'); ?></label>
                                                        <div class="labreq">
                                                        <?php if (!empty($labrequests)) { ?>    
                                                            <?php foreach($labrequests as $labrequest) { ?>
                                                                <?php if(empty($labrequest->loinc_num)) { ?>
                                                                    <?php $i += 1; ?>
                                                                    <input type="text" hidden name="manual_item[]" class="manual_item" value="<?php echo $labrequest->id.'*'.$labrequest->lab_request_text.'*'.$labrequest->instructions.'*'.$i; ?>">
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

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {
                var date = $('#date1').parsley();
                var patient = $('#pos_select').parsley();
                var doctor = $('#add_doctor').parsley();
                var encounter = $('#encounter').parsley();

                if (date.isValid() && patient.isValid() && doctor.isValid() && encounter.isValid()) {
                    return true;
                } else {
                    date.validate();
                    patient.validate();
                    doctor.validate();
                    encounter.validate();
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var date = $('#date').val();
            console.log(date);
            if (date === undefined) {
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
        $(document).ready(function () {
            $('#tpBasic').timepicker('setTime', new Date());
            // $('.fc-datepicker').datepicker('setDate', new Date());
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
        $('#labrequest').on('select2:select', function (e) {
            var data = e.params.data;
            var selected = $('#labrequest').find('option:selected');
            console.log("Id: "+data.id[0]);
            console.log("Data-Selected: "+selected.attr('data-selected'));
        });
    </script>

    <script type="text/javascript">
        $("#encounter").change(function() {
            var encounter = $("#encounter").val();
            $("#pos_select").find('option').remove();

            $.ajax({
                url: 'patient/getPatientByEncounterIdByJason?id='+encounter,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patient = response.patient;
                    $('#pos_select').append($('<option>').text(patient.name).val(patient.id)).end();
                    // $.each(patient, function (key, value) {
                    //     $('#patientchoose').append($('<option>').text(value.name).val(value.id)).end();
                    //     console.log(value.name);
                    // });
                }
            })
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
                // ajax: {
                //     // url: 'patient/getPatientinfo',
                //     url: 'patient/getPatientInfoByVisitedProviderId',
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
            $("#add_doctor").select2({
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
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            var request_number = $("#lab_request_number_input").val();

            $.ajax({
                url: 'labrequest/getLabrequestByJason?requestnumber='+ request_number,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patient = response.patient;
                    $("#labrequestForm").find('[name="patient"]').val(patient).change();
                }
            });
        });
    </script> -->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            var lab_request_number = $("#lab_request_number_input").val();

            $.ajax({
                url: 'labrequest/getLabrequestByLabrequestnumberByJason?number=' + lab_request_number,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var request = response.requests;

                    $.each(request, function (key, value) {
                        var lab_request = value.lab_request_text;
                        if (lab_request === null) {
                            var lab_request = value.long_common_name;
                        }
                        console.log(value);
                        console.log(value.id);
                        console.log(value.lab_loinc_id);
                        $(".labreq").append(
                        '<section class="labreq_selected" id="labreq_selected_section">\n\
                            <div class="row">\n\
                                <div class="col-sm-1">\n\
                                </div>\n\
                                <div class="col-sm-11">\n\
                                    <div class="form-group labrequest_sect">\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <input type="text" class = "form-control labreq-div" name = "labrequest_text[]" placeholder="" value="'+lab_request+'" required>\n\
                                                    <input type="hidden" id="labreq_id-' + value.lab_loinc_id + '" class = "labreq-div" name = "labrequest[]" value = "' + value.lab_loinc_id + '" placeholder="" required disabled>\n\
                                                    <input class = "form-control labreq-div" name = "labreq[]" hidden value = "' + value.lab_loinc_id + '" placeholder="" required>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" value="'+value.instructions+'"></div>\n\
                                                    <input type="text" hidden name="dataholder[]" class="form-control" value="">\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            <div>\n\
                        </section>\n\
                        ');
                    })
                }
            })
        });
    </script> -->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            var lab_loinc_id = $("#loinc_input").val();
            var request_id = $("#request_id").val();
            var count = 0;
            if (request_id != '') {
                if (lab_loinc_id == '') {
                    $(".labreq").append(
                    '<section class="labreq_selected" id="labreq_selected_section">\n\
                        <div class="row">\n\
                            <div class="col-sm-1">\n\
                            </div>\n\
                            <div class="col-sm-11">\n\
                                <div class="form-group labrequest_sect">\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" class = "form-control labreq-div" name = "labrequest_text[]" placeholder="" value="<?php echo $labrequest->lab_request_text ?>" required>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" value="<?php echo $labrequest->instructions ?>"></div>\n\
                                                <input type="text" hidden name="dataholder[]" class="form-control" value="' + count + '">\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        <div>\n\
                    </section>\n\
                    ');
                }
            } else {
                alert('not null');
            }
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            var selected = $('#labrequest').find('option:selected');
            var unselected = $('#labrequest').find('option:not(:selected)');
            selected.attr('data-selected', '1');
            
            $.each(unselected, function (index, value1) {
                num--;
                var count = parseInt(countlabReq) - 1;
                // console.log(count);
                if ($(this).attr('data-selected') == '1') {
                    var value = $(this).val();
                    var res = value.split("*");
                    // var unit_price = res[1];
                    var id = res[0];

                    // console.log(id);
                    $('#labreq_selected_section-' + id).remove();
                    // $('#removediv' + $(this).val() + '').remove();
                    //this option was selected before

                }
            });

            $.each($('select.labrequest option:selected'), function ( index ) {
                var value = $(this).val();
                var res = value.split("*");
                var id = res[0];
                var long_common = res[1];
                var loinc_num = res[2];
                // var instructions = res[3];
                // var dataholder = res[4];
                // var labrequest_id = res[5];
                var countlabReq = $(".labreq_selected").length;
                var count = parseInt(countlabReq) + 1;
                var labrequest_id = $(this).data('request');
                var instructions = $(this).data('instructions');
                console.log(count);

                if ($('#labreq_id-' + id).length)
                {

                } else {
                    $(".labreq").append(
                        '<section class="labreq_selected remove'+ count +'" id="labreq_selected_section-' + id + '">\n\
                            <div class="row">\n\
                                <div class="col-sm-1">\n\
                                    <button class="btn btn-danger" hidden onclick="removeElem('+ count + ', ' + id +')" type="button"><i class="fe fe-trash"></i></button>\n\
                                </div>\n\
                                <div class="col-sm-11">\n\
                                    <div class="form-group labrequest_sect">\n\
                                        <div class="row">\n\
                                            <div class="col-sm-8">\n\
                                                <div class="form-group">\n\
                                                    <input type="text" hidden name="labrequest_id[]" value="' + labrequest_id + '">\n\
                                                    <input type="text" class = "form-control labreq-div" name = "labrequest_long[]" value = "' + long_common + '" placeholder="" required readonly>\n\
                                                    <input type="hidden" id="labreq_id-' + id + '" class = "labreq-div" name = "labrequest[]" value = "' + id + '" placeholder="" required disabled>\n\
                                                    <input class = "form-control labreq-div" name = "labreq[]" hidden value = "' + id + '" placeholder="" required>\n\
                                                    <input type="text" class = "form-control labreq-div" name = "labrequest_text[]" placeholder="" hidden>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="col-sm-4">\n\
                                                <div class="form-group">\n\
                                                    <input type="text" name="loinc_num[]" class="form-control" value="' + loinc_num + '" readonly>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <input type="text" hidden name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" value="' + instructions + '" placeholder="<?php echo lang("lab_test_instruction_placeholder"); ?>"></div>\n\
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
                var request_text = res[1];
                var instructions = res[2];
                var i = res[3];
                var countlabReq = $(".labreq_selected").length;
                var count = parseInt(countlabReq) + 1;
                console.log(count);
                // console.log(value);
                $(".labreq").append(
                    '<section class="labreq_selected remove'+ count +'" id="labreq_selected_section">\n\
                        <div class="row">\n\
                            <div class="col-sm-1">\n\
                                <button class="btn btn-danger" onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                            </div>\n\
                            <div class="col-sm-11">\n\
                                <div class="form-group labrequest_sect">\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" hidden name="labrequest_id[]" value="'+ id +'">\n\
                                                <input type="text" hidden class = "form-control labreq-div" name = "labrequest_long[]" value = "" placeholder="">\n\
                                                <input type="text" class = "form-control labreq-div" name = "labrequest_text[]" value="'+ request_text +'" placeholder="<?php echo lang("lab_test_name_placeholder"); ?>" required>\n\
                                                <input class = "form-control labreq-div" name = "labreq[]" hidden value = "" placeholder="">\n\
                                                <input type="text" name="loinc_num[]" class="form-control" value="" hidden readonly>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" hidden name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" value="'+ instructions +'" placeholder="<?php echo lang("lab_test_instruction_placeholder"); ?>"></div>\n\
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
            $(".labrequest").change(function () {
                var count = 1;

                var selected = $('#labrequest').find('option:selected');
                var unselected = $('#labrequest').find('option:not(:selected)');
                selected.attr('data-selected', '1');
                var num = 0;
                var countlabReq = $(".labreq_selected").length;
                $.each(unselected, function (index, value1) {
                    num--;
                    var count = parseInt(countlabReq) - 1;
                    // console.log(count);
                    if ($(this).attr('data-selected') == '1') {
                        var value = $(this).val();
                        var res = value.split("*");
                        // var unit_price = res[1];
                        var id = res[0];

                        // console.log(id);
                        $('#labreq_selected_section-' + id).remove();
                        // $('#removediv' + $(this).val() + '').remove();
                        //this option was selected before

                    }
                });

                
                $.each($('select.labrequest option:selected'), function ( index ) {
                    num++;
                    var count = parseInt(countlabReq) + 1;
                    console.log(count);
                    var value = $(this).val();
                    var res = value.split("*");
                    var id = res[0];
                    var long_common = res[1];
                    var loinc_num = res[2];

                    
                    console.log(value);
                    if ($('#labreq_id-' + id).length)
                    {

                    } else {
                        $(".labreq").append(
                            '<section class="labreq_selected remove'+ count +'" id="labreq_selected_section-' + id + '">\n\
                                <div class="row">\n\
                                    <div class="col-sm-1">\n\
                                        <button class="btn btn-danger" hidden onclick="removeElem('+ count + ', ' + id +')" type="button"><i class="fe fe-trash"></i></button>\n\
                                    </div>\n\
                                    <div class="col-sm-11">\n\
                                        <div class="form-group labrequest_sect">\n\
                                            <div class="row">\n\
                                                <div class="col-sm-8">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" hidden name="labrequest_id[]" value="">\n\
                                                        <input type="text" class = "form-control labreq-div" name = "labrequest_long[]" value = "' + long_common + '" placeholder="" required readonly>\n\
                                                        <input type="hidden" id="labreq_id-' + id + '" class = "labreq-div" name = "labrequest[]" value = "' + id + '" placeholder="" required disabled>\n\
                                                        <input class = "form-control labreq-div" name = "labreq[]" hidden value = "' + id + '" placeholder="" required>\n\
                                                        <input type="text" class = "form-control labreq-div" name = "labrequest_text[]" placeholder="" hidden>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="col-sm-4">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" name="loinc_num[]" class="form-control" value="' + loinc_num + '" readonly>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="row">\n\
                                                <div class="col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" hidden name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" placeholder="<?php echo lang("lab_test_instruction_placeholder"); ?>"></div>\n\
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
                var countlabReq = $(".labreq_selected").length;
                var count = parseInt(countlabReq) + 1;
                console.log(count);
                $(".labreq").append(
                    '<section class="labreq_selected remove'+ count +'" id="labreq_selected_section">\n\
                        <div class="row">\n\
                            <div class="col-sm-12 col-md-2 col-lg-1">\n\
                                <button class="btn btn-danger" onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                            </div>\n\
                            <div class="col-sm-12 col-md-10 col-lg-11">\n\
                                <div class="form-group labrequest_sect">\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input class = "form-control labreq-div" name = "labreq[]" hidden value = "" placeholder="">\n\
                                                <input type="text" hidden name="labrequest_id[]" value="">\n\
                                                <input type="text" hidden class = "form-control labreq-div" name = "labrequest_long[]" value = "" placeholder="">\n\
                                                <input type="text" class = "form-control labreq-div" name = "labrequest_text[]" placeholder="<?php echo lang("lab_test_name_placeholder"); ?>" required>\n\
                                                <input type="text" name="loinc_num[]" class="form-control" value="" readonly hidden>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" hidden name="dataholder[]" class="form-control" value="' + count + '">\n\
                                                <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]" placeholder="<?php echo lang("lab_test_instruction_placeholder"); ?>"></div>\n\
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

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            function removeElem() {
                alert($(this).val());
            }
        });
    </script> -->

    <script>
        $(document).ready(function () {
            $("#labrequest").select2({
                placeholder: '<?php echo lang('request'); ?>',
                multiple: true,
                allowClear: false,
                ajax: {
                    url: 'labrequest/getLabrequestSelect2',
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

    <!-- <script>
        $(document).ready(function () {
            $("#patient").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: false,
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
    </script> -->

    </body>
</html>