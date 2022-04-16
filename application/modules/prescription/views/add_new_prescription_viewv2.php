<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <?php
                        $current_user = $this->ion_auth->get_user_id();
                        if ($this->ion_auth->in_group('Doctor')) {
                            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
                            $doctordetails = $this->db->get_where('doctor', array('id' => $doctor_id))->row();
                        }
                        ?>

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php
                                    if (!empty($prescription->id))
                                        echo lang('edit_prescription');
                                    else
                                        echo lang('add_prescription');
                                    ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo validation_errors(); ?>
                                <form role="form" action="prescription/addNewPrescription" class="clearfix" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <input type="hidden" name="redirect" value="<?php
                                            if (!empty($encounter_id)) {
                                                echo 'encounter';
                                            }

                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                <select class="form-control select2-show-search" name="encounter_id" id="encounter" <?php if(!empty($encounter->id)) { echo "disabled"; } ?>>
                                                    <?php if (!empty($encounter_id)) { ?>
                                                        <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encouter_type->display_name . ' - ' . date('M j, Y g:i a', strtotime($encounter->created_at.' UTC')); ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <input type="hidden" name="encounter_id" value="<?php echo $encounter_id ?>">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                <input type="text" class="form-control flatpickr" id="date" readonly placeholder="MM/DD/YYYY" name="date" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('date');
                                                    }
                                                    if (!empty($prescription->prescription_date)) {
                                                        echo date('m/d/Y', strtotime($prescription->prescription_date.' UTC'));
                                                    }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                <select class="select2-show-search form-control" name="patient" id="patientchoose">
                                                    <?php if (!empty($prescription->patient)) { ?>
                                                        <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - (<?php echo lang('id'); ?> : <?php echo $patients->id; ?>)</option>  
                                                    <?php } ?>
                                                    <?php
                                                    if (!empty($setval)) {
                                                        $patientdetails = $this->db->get_where('patient', array('id' => set_value('patient')))->row();
                                                        ?>
                                                        <option value="<?php echo $patientdetails->id; ?>" selected="selected"><?php echo $patientdetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $patientdetails->id; ?>)</option>
                                                    <?php } ?>
                                                    <?php if (!empty($patient_id)) { ?>
                                                        <option value="<?php echo $patient_id ?>" selected="selected"><?php echo $this->patient_model->getPatientById($patient_id)->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php if (!$this->ion_auth->in_group('Doctor')) { ?>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                <select class="select2-show-search form-control" name="doctor" id="doctorchoose">
                                                    <?php if (!empty($prescription->doctor)) { ?>
                                                        <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>  
                                                    <?php } ?>
                                                    <?php
                                                    if (!empty($setval)) {
                                                        $doctordetails1 = $this->db->get_where('doctor', array('id' => set_value('doctor')))->row();
                                                        ?>
                                                        <option value="<?php echo $doctordetails1->id; ?>" selected="selected"><?php echo $doctordetails1->name; ?> -(<?php echo lang('id'); ?> : <?php echo $doctordetails1->id; ?>)</option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                <?php if (!empty($prescription->doctor)) { ?>
                                                    <select class="select2-show-search form-control" name="doctor" value="">
                                                        <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>  
                                                    </select>
                                                <?php } else { ?>
                                                    <select class="select2-show-search form-control" id="doctorchoose1" name="doctor" value=''>
                                                        <?php if (!empty($prescription->doctor)) { ?>
                                                            <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>  
                                                        <?php } ?>
                                                        <?php if (!empty($doctordetails)) { ?>
                                                            <option value="<?php echo $doctordetails->id; ?>" selected="selected"><?php echo $doctordetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>  
                                                        <?php } ?>
                                                        <?php
                                                        if (!empty($setval)) {
                                                            $doctordetails1 = $this->db->get_where('doctor', array('id' => set_value('doctor')))->row();
                                                            ?>
                                                            <option value="<?php echo $doctordetails1->id; ?>" selected="selected"><?php echo $doctordetails1->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12 medicine_block">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('select_medicine'); ?> <span class="text-red">*</span></label>
                                                <?php if (empty($prescription->medicine)) { ?>
                                                    <select class="form-control medicinee select2-show-search"  id="my_select1_disabled" name="category" value=''>
                                                    </select>
                                                <?php } else { ?>
                                                    <select name="category"  class="form-control medicinee select2-show-search"  multiple="multiple" id="my_select1_disabled" >
                                                        <?php
                                                        if (!empty($prescription->medicine)) {

                                                            // $category_name = $payment->category_name;
                                                            $prescription_medicine = explode('###', $prescription->medicine);
                                                            foreach ($prescription_medicine as $key => $value) {
                                                                $prescription_medicine_extended = explode('***', $value);
                                                                $medicine = $this->medicine_model->getMedicineById($prescription_medicine_extended[0]);
                                                                ?>
                                                                <option value="<?php echo $medicine->id . '*' . $medicine->name; ?>"  <?php echo 'data-form="' . $prescription_medicine_extended[1] . '"' . 'data-qty="' . $prescription_medicine_extended[2] . '"data-instruction="' . $prescription_medicine_extended[3] . '"data-uses="' . $prescription_medicine_extended[4] . '"data-generic="' . $medicine->generic . '"'; ?> selected="selected">
                                                                    <?php echo $medicine->generic . ' ( ' . $medicine->name . ' ) ' . $medicine->form; ?>
                                                                </option>                
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 medicine_block">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('medicine_list'); ?></label>
                                                <div class="medicine">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="admin" value='admin'>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($prescription->id)) {
                                            echo $prescription->id;
                                        }
                                        ?>'>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                        </div>
                                    </div>
                                </form>
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

        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar.js'); ?>"></script>

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

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            var timenow = "<?php echo date('Y-m-d H:i'); ?>";
            var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
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
            $('.fc-datepicker').datepicker('setDate', new Date());
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            //   $(".medicine").html("");
            var selected = $('#my_select1_disabled').find('option:selected');
            var unselected = $('#my_select1_disabled').find('option:not(:selected)');
            selected.attr('data-selected', '1');
            $.each(unselected, function (index, value1) {
                if ($(this).attr('data-selected') == '1') {
                    var value = $(this).val();
                    var res = value.split("*");
                    // var unit_price = res[1];
                    var id = res[0];
                    $('#med_selected_section-' + id).remove();
                    // $('#removediv' + $(this).val() + '').remove();
                    //this option was selected before

                }
            });

            /* $("select").on("select2:unselect", function (e) {
             var value = e.params.val();
             
             var res = value.split("*");
             // var unit_price = res[1];
             var id = res[0];
             $('#med_selected_section-' + id).remove();
             });
             */


            var count = 0;
            $.each($('select.medicinee option:selected'), function () {
                var value = $(this).val();
                var res = value.split("*");
                // var unit_price = res[1];
                var id = res[0];
                // var id = $(this).data('id');
                var med_id = res[0];
                var med_name = res[1];
                var med_uses = res[2];
                var med_form = res[3];
                var med_generic = res[4];
                var form = $(this).data('form');
                var qty = $(this).data('qty');
                var instruction = $(this).data('instruction');
                var uses = $(this).data('uses');
                var generic = $(this).data('generic');
                var form = $(this).data('form');
                if ($('#med_id-' + id).length)
                {

                } else {

                    $(".medicine").append(
                        '<section class="med_selected" id="med_selected_section-' + med_id + '">\n\
                            <div class="row">\n\
                                <div class="col-sm-12">\n\
                                    <div class="form-group medicine_sect">\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <label><?php echo lang("medicine"); ?></label>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-10">\n\
                                                <div class="form-group">\n\
                                                    <input class = "form-control medi_div" name = "med_id[]" value = "' + generic + ' ( ' + med_name + ' ) ' + form +'" placeholder="" required disabled>\n\
                                                    <input type="hidden" id="med_id-' + id + '" class = "medi_div" name = "medicine[]" value = "' + med_id + '" placeholder="" required disabled>\n\
                                                    <input class = "form-control medi_div" name = "meds[]" hidden value = "' + med_id + '" placeholder="" required>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="col-sm-2">\n\
                                                <div class="form-group">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0"># &nbsp</label><input type="text" class="form-control" name="qty[]" value="' + qty + '" required></div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0">Sig &nbsp</label><input type="text" class="form-control" name="instruction[]" value="' + instruction + '" required></div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0">Uses &nbsp</label><input type="text" class="form-control" name="uses[]" value="' + uses + '"></div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <input type="hidden" class="form-control" name="form[]" value="' + form + '">\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            <div>\n\
                        </section>\n\
                        ');

    //                 $(".medicine").append('<section id="med_selected_section-' + med_id + '" class="med_selected row">\n\
    //          <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
    // <label> <?php echo lang("medicine"); ?> </label>\n\
    // </div>\n\
    // \n\
    // <div class=col-md-12>\n\
    // <input class = "medi_div" name = "med_id[]" value = "' + med_name + '" placeholder="" required>\n\
    //  <input type="hidden" id="med_id-' + id + '" class = "medi_div" name = "medicine[]" value = "' + med_id + '" placeholder="" required>\n\
    //  </div>\n\
    //  </div>\n\
    // \n\
    // <div class = "form-group medicine_sect col-md-2" ><div class=col-md-12>\n\
    // <label><?php echo lang("dosage"); ?> </label>\n\
    // </div>\n\
    // <div class=col-md-12><input class = "state medi_div" name = "dosage[]" value = "' + dosage + '" placeholder="100 mg" required>\n\
    //  </div>\n\
    //  </div>\n\
    // \n\
    // <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
    // <label><?php echo lang("frequency"); ?> </label>\n\
    // </div>\n\
    // <div class=col-md-12><input class = "potency medi_div sale" id="salee' + count + '" name = "frequency[]" value = "' + frequency + '" placeholder="<?php echo lang("frequency_placeholder"); ?>" required>\n\
    // </div>\n\
    // </div>\n\
    // \n\
    // <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
    // <label>\n\
    // <?php echo lang("days"); ?> \n\
    // </label>\n\
    // </div>\n\
    // <div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "days[]" value = "' + days + '" placeholder="7 days" required>\n\
    // </div>\n\
    // </div>\n\
    // \n\
    // \n\<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
    // <label>\n\
    // <?php echo lang("instruction"); ?> \n\
    // </label>\n\
    // </div>\n\
    // <div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "instruction[]" value = "' + instruction + '" placeholder="After Food" required>\n\
    // </div>\n\
    // </div>\n\
    // \n\
    // \n\
    //  <div class="del col-md-1"></div>\n\
    // </section>');
                }
            });
        }
        );


    </script> 

    <script type="text/javascript">
        $(document).ready(function () {
            $('.medicinee').change(function () {
                //   $(".medicine").html("");
                var count = 0;


                var selected = $('#my_select1_disabled').find('option:selected');
                var unselected = $('#my_select1_disabled').find('option:not(:selected)');
                selected.attr('data-selected', '1');
                $.each(unselected, function (index, value1) {
                    if ($(this).attr('data-selected') == '1') {
                        var value = $(this).val();
                        var res = value.split("*");
                        // var unit_price = res[1];
                        var id = res[0];
                        $('#med_selected_section-' + id).remove();
                        // $('#removediv' + $(this).val() + '').remove();
                        //this option was selected before

                    }
                });

                $.each($('select.medicinee option:selected'), function () {
                    var value = $(this).val();
                    var res = value.split("*");
                    // var unit_price = res[1];
                    var id = res[0];
                    // var id = $(this).data('id');
                    var med_id = res[0];
                    var med_name = res[1];
                    var med_uses = res[2];
                    var med_form = res[3];
                    var med_generic = res[4];
                    console.log(res);
                    if ($('#med_id-' + id).length)
                    {

                    } else {
                        // $(".medicine").append('<div class="row">\n\
                        //         <div class="col-md-10">\n\
                        //             <div class="form-group med_selected" id="med_selected_section-' + med_id + '">\n\
                        //                 <label class="form-label medicine_sect">'<?php echo lang("medicine"); ?>'</label>\n\
                        //                 <input class = "medi_div" name = "med_id[]" value = "' + med_name + '" placeholder="" required>\n\
                        //                 <input type="hidden" class = "medi_div" id="med_id-' + id + '" name = "medicine[]" value = "' + med_id + '" placeholder="" required>\n\
                        //             </div>\n\
                        //         </div>\n\
                        //     </div>');

                        $(".medicine").append(
                            '<section class="med_selected" id="med_selected_section-' + med_id + '">\n\
                                <div class="row">\n\
                                    <div class="col-sm-12">\n\
                                        <div class="form-group medicine_sect">\n\
                                            <div class="row">\n\
                                                <div class="col-sm-12">\n\
                                                    <label><?php echo lang("medicine"); ?></label>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="row">\n\
                                                <div class="col-sm-10">\n\
                                                    <div class="form-group">\n\
                                                        <input class = "form-control medi_div" name = "med_id[]" value = "' + med_generic + ' ( ' + med_name + ' ) ' + med_form + '" placeholder="" required disabled>\n\
                                                        <input type="hidden" id="med_id-' + id + '" class = "medi_div" name = "medicine[]" value = "' + med_id + '" placeholder="" required disabled>\n\
                                                        <input class = "form-control medi_div" name = "meds[]" hidden value = "' + med_id + '" placeholder="" required>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="col-sm-2">\n\
                                                    <div class="form-group">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0"># &nbsp</label><input type="text" class="form-control" name="qty[]" required></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="row">\n\
                                                <div class="col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0">Sig &nbsp</label><input type="text" class="form-control" name="instruction[]" required></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="row">\n\
                                                <div class="col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0">Uses &nbsp</label><input type="text" class="form-control" name="uses[]" value="' + med_uses + '" required></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="row">\n\
                                                <div class="col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <input type="hidden" class="form-control" name="form[]" value="' + med_form + '">\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                <div>\n\
                            </section>\n\
                            ');

                        // $(".medicine").append('<section class="med_selected row" id="med_selected_section-' + med_id + '">\n\
                        //          <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
                        // <label> <?php echo lang("medicine"); ?> </label>\n\
                        // </div>\n\
                        // \n\
                        // <div class=col-md-12>\n\
                        // <input class = "medi_div" name = "med_id[]" value = "' + med_name + '" placeholder="" required>\n\
                        //  <input type="hidden" class = "medi_div" id="med_id-' + id + '" name = "medicine[]" value = "' + med_id + '" placeholder="" required>\n\
                        //  </div>\n\
                        //  </div>\n\
                        // \n\
                        // <div class = "form-group medicine_sect col-md-2" ><div class=col-md-12>\n\
                        // <label><?php echo lang("dosage"); ?> </label>\n\
                        // </div>\n\
                        // <div class=col-md-12><input class = "state medi_div" name = "dosage[]" value = "" placeholder="100 mg" required>\n\
                        //  </div>\n\
                        //  </div>\n\
                        // \n\
                        // <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
                        // <label><?php echo lang("frequency"); ?> </label>\n\
                        // </div>\n\
                        // <div class=col-md-12><input class = "potency medi_div sale" id="salee' + count + '" name = "frequency[]" value = "" placeholder="<?php echo lang("frequency_placeholder"); ?>" required>\n\
                        // </div>\n\
                        // </div>\n\
                        // \n\
                        // <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
                        // <label>\n\
                        // <?php echo lang("days"); ?> \n\
                        // </label>\n\
                        // </div>\n\
                        // <div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "days[]" value = "" placeholder="7 days" required>\n\
                        // </div>\n\
                        // </div>\n\
                        // \n\
                        // \n\<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
                        // <label>\n\
                        // <?php echo lang("instruction"); ?> \n\
                        // </label>\n\
                        // </div>\n\
                        // <div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "instruction[]" value = "" placeholder="After Food">\n\
                        // </div>\n\
                        // </div>\n\
                        // \n\
                        // \n\
                        //  <div class="del col-md-1"></div>\n\
                        // </section>');
                    }
                });
            });
        });


    </script> 

    <script type="text/javascript">
        $(document).ready(function () {
            $("#patientchoose").select2({
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
            // $(".flashmessage").delay(3000).fadeOut(100);
            // $("#my_select10").select2();
            $('#my_select1').select2({
                multiple: true,
                placeholder: '<?php echo lang('medicine'); ?>',
                allowClear: true,
                closeOnSelect: true,
                ajax: {
                    url: 'medicine/getMedicinenamelist',
                    dataType: 'json',
                    type: "post",
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data,
                            newTag: true,
                            pagination: {
                                more: (params.page * 1) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
            });
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

    <script>
        $(document).ready(function () {
            $("#my_select1_disabled").select2({
                placeholder: '<?php echo lang('medicine'); ?>',
                multiple: true,
                allowClear: true,
                ajax: {
                    url: 'medicine/getMedicineListForSelect2',
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
        });</script>

    </body>
</html> 