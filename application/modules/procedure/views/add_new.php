<!--html-->

    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                    
                        <div class="row mt-5">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php 
                                        if(!empty($procedure->id)) {
                                            echo lang('edit_procedure');
                                        } else {
                                            echo lang('add_procedure');
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="panel-group panel-group-primary mb-5">
                                    <div class="panel panel-default active">
                                            <div class="panel-body border-0 bg-white">
                                                <form role="form" id="formForm" action="procedure/addNew" method="POST">
                                                    <!-- <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <?php echo validation_errors(); ?>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('performed'); ?> <?php echo lang('start');  ?><span class="text-red">*</span> </label>
                                                                <input class="form-control flatpickr" name="start_date" id="date" placeholder="MM/DD/YYYY" type="text" required readonly>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('performed'); ?> <?php echo lang('end'); ?><span class="text-red">*</span> </label>
                                                                <input class="form-control flatpickr" name="end_date" id="date" placeholder="MM/DD/YYYY" type="text" required readonly>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search pos_select w-100" id="pos_select" name="patient" data-placeholder="Choose one" required>
                                                                    <!-- <?php if(!empty($procedure->patient_id)) { ?> -->
                                                                        <!-- <option value="<?php echo $patient->id ?>" selected><?php echo $patient->name ?></option> -->
                                                                    <!-- <?php } ?> -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('encounter'); ?> <span class="text-red"> *</span></label>
                                                                <select class="form-control select2-show-search" id="encounter" name="encounter">
                                                                    <!-- <?php if(!empty($procedure->encounter_id)) { ?> -->
                                                                        <!-- <?php foreach ($patient_encounter as $p_encounter) { ?> -->
                                                                            <!-- <?php if($procedure->encounter_id === $p_encounter->id) {  ?> -->
                                                                                <!-- <option value="<?php echo $p_encounter->id ?>"><?php echo lang('encounter'). ' No. : ' . $p_encounter->encounter_number. ' - ' . $encounter_type->display_name. ' - ' . date("M j, Y g:i a", strtotime($p_encounter->created_at.' UTC'))  ?></option> -->
                                                                            <!-- <?php } ?> -->
                                                                        <!-- <?php } ?> -->
                                                                    <!-- <?php } ?> -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <!-- procedure name -->
                                                     <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <label  class="form-label"> <?php echo lang('procedure'); ?><span class="text-red"> *</span></label>
                                                            <select class="form-control select2-show-search" id="procedure" name="procedure">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- status -->
                                                    <div class="row mb-5">
                                                        <div class="col-md-12 form-group">
                                                            <label  class="form-label"> <?php echo lang('status'); ?><span class="text-red"> *</span></label>
                                                            <select class="form-control select2-show-search" id="status" name="status">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- PERFORMED BY -->
                                                    <span class="font-weight-bold mt-5 "><?php echo lang('performed_by') ?></span>
                                                    <!-- DOCTOR -->
                                                    <div class="row"> 
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label mt-5 "><?php echo lang('doctor'); ?></label>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table nowrap text-nowrap border mt-5">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="w-15"></th>
                                                                                        <th class="w-40"><?php echo lang('name') ?></th>
                                                                                        <th class="w-45"><?php echo lang('role') ?></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="Doctor">
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <td><button type="button" class="btn btn-primary w-100" id="newRecord_doctor"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Nurse -->
                                                    <div class="row"> 
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label mt-5 "><?php echo lang('nurse'); ?></label>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table nowrap text-nowrap border mt-5">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="w-15"></th>
                                                                                        <th class="w-40"><?php echo lang('name') ?></th>
                                                                                        <th class="w-45"><?php echo lang('role') ?></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="Nurse">
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <td><button type="button" class="btn btn-primary w-100" id="newRecord_nurse"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <!-- Midwife -->
                                                    <div class="row"> 
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label mt-5 "><?php echo lang('midwife'); ?></label>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table nowrap text-nowrap border mt-5">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="w-15"></th>
                                                                                        <th class="w-40"><?php echo lang('name') ?></th>
                                                                                        <th class="w-45"><?php echo lang('role') ?></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="Midwife">
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <td><button type="button" class="btn btn-primary w-100" id="newRecord_midwife"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Laboratorist -->
                                                    <div class="row"> 
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label mt-5 "><?php echo lang('laboratorist'); ?></label>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table nowrap text-nowrap border mt-5">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="w-15"></th>
                                                                                        <th class="w-40"><?php echo lang('name') ?></th>
                                                                                        <th class="w-45"><?php echo lang('role') ?></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="Laboratorist">
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <td><button type="button" class="btn btn-primary w-100" id="newRecord_laboratorist"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>     
                                                    
                                                    <!-- <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label  class="form-label" ><?php echo lang('note'); ?> <?php echo lang('author'); ?><span class="text-red"> *</span></label>
                                                            <input type="text" class="form-control" name="note_author_name" id="name" placeholder="<?php echo lang('name'); ?>">
                                                        </div>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <label  class="form-label"> <?php echo lang('note'); ?><span class="text-red"> *</span></label>
                                                            <textarea class="ckeditor form-control" id="editor" name="note_body" value="" rows="10" required>
                                                            <?php
                                                                if (!empty($procedure->note)) {
                                                                    echo $procedure->note;
                                                                }
                                                                ?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="redirect" >
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                                    <div class="row mt-5">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <button class="btn btn-primary pull-right" type="submit" id="submit" name="submit"><?php echo lang('submit'); ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <!-- modal for delete -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="my-modal-delete">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <form role="form" id="deleteForm" action="" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="modal-body d-flex justify-content-center align-items-center">
                                                <p>Are you sure you want to delete this Performer?</p>
                                                <input hidden type="text" id="performerId" name="performerId">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" id="submitbtn"><i class="fe fe-trash"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end for delete -->


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

        <!--intlTelInput js-->
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/intlTelInput.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/country-select.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/utils.js'); ?>"></script>

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

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>

        <!-- Prism js -->
        <script src="<?php echo base_url('public/assets/plugins/prism/prism.js'); ?>"></script>

        <!-- Accordion js-->
        <script src="<?php echo base_url('public/assets/plugins/accordion/accordion.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/accordion.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

        <!-- Multiple select js -->
		<script src="<?php echo base_url('public/assets/plugins/multipleselect/multiple-select.js'); ?>"></script>
		<script src="<?php echo base_url('public/assets/plugins/multipleselect/multi-select.js'); ?>"></script>

        <!--multi js-->
		<script src="<?php echo base_url('public/assets/plugins/multi/multi.min.js'); ?>"></script>

        
    <!-- INTERNAL JS INDEX END -->


    <script>
        $(document).ready(function() {
            var id = '<?php echo $procedure->id ?>';
            // alert(id);
            $.ajax({
                url: 'procedure/editProcedureByJson?id='+ id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                   
                    var procedure = response.procedure;
                    var procedures = response.procedures;
                    var patient = response.patients;
                    var status = response.procedure_status;
                    var encounter = response.encounter;
                    var procedure_code = response.procedure_c;
                    var procedure_description = response.procedure_d;

                   
                    var performer_details = response.performer_details;
                    var notes = response.notes;
                    // var doctors = response.doctors;
                    // var nurses  = response.nurses;
                    // var midwives = response.midwives;
                    // var laboratorist = response.laboratorist;

                    var procedure_performers = response.procedure_performers;

                    var roles =  response.performer_roles;

                    $.each(procedure_performers, function(key, value) {

                        if(value.performer_table_name === 'doctor') {

                            var doctor_info = '<option value="'+value.performer_table_id+'" selected>'+performer_details[key].name+'</option>'
                            var doctor_role = '<option value="'+value.role_id+'" selected>'+roles[key].display_name+'</option>'
                            
                            $("#Doctor").append('\n\
                                <tr id="past_doctor_list'+value.id+'">\n\
                                    <td class="w-2">\n\
                                        <button class="btn btn-danger deleteDoctor" type="button" id="'+value.performer_table_id+'" onClick="removeDoctorPerformer('+value.id+')"><i class="fe fe-trash"></i></button>\n\
                                    </td>\n\
                                    <td class="w-8">\n\
                                        <select class="form-control select2-show-search doctor doctor'+value.performer_table_id+' w-100" id="pos_rendering_user_doctor'+value.performer_table_id+'" name="pos_rendering_user_doctor[]" data-placeholder="Choose one">\n\
                                        '+doctor_info+'\n\
                                        </select>\n\
                                    </td>\n\
                                    <td class="w-90">\n\
                                        <select class="form-control select2-show-search performer_role w-100" id="performer_role" name="performer_role_doctors[]" data-placeholder="Select Role" required>\n\
                                        '+doctor_role+'\n\
                                        </select>\n\
                                    </td>\n\
                                </tr>\n\
                               ')


                            $(".doctor").select2({
                                placeholder: '<?php echo lang('select_doctor'); ?>',
                                allowClear: true,
                                ajax: {
                                    url: 'doctor/getAllDoctorsInfo',
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
    
                     
                        }

                        if(value.performer_table_name === 'nurse') {

                            var nurse_info = '<option value="'+value.performer_table_id+'" selected>'+performer_details[key].name+'</option>'
                            var nurse_role = '<option value="'+value.role_id+'" selected>'+roles[key].display_name+'</option>'
                         
                            
                            $("#Nurse").append('\n\
                                <tr id="past_nurse_list'+value.id+'">\n\
                                    <td class="w-2">\n\
                                        <button class="btn btn-danger deleteNurse" type="button" id="'+value.performer_table_id+'" onClick="removeNursePerformer('+value.id+');"><i class="fe fe-trash"></i></button>\n\
                                    </td>\n\
                                    <td class="w-8">\n\
                                        <select class="form-control select2-show-search nurse w-100" id="pos_rendering_user_nurse'+value.performer_table_id+'" name="pos_rendering_user_nurse[]" data-placeholder="Choose one">\n\
                                        '+nurse_info+'\n\
                                        </select>\n\
                                    </td>\n\
                                    <td class="w-90">\n\
                                        <select class="form-control select2-show-search performer_role w-100" id="performer_role" name="performer_role_nurse[]" data-placeholder="Select Role" required>\n\
                                        '+nurse_role+'\n\
                                        </select>\n\
                                    </td>\n\
                                </tr>\n\
                            ')


                            $(".nurse").select2({
                                placeholder: '<?php echo lang("choose_one") ?>',
                                allowClear: true,
                                ajax: {
                                    url: "nurse/getAllNursesInfo",
                                    type: "post",
                                    dataType: "json",
                                    delay: 250,
                                    data: function (params) {
                                        return {
                                            searchTerm: params.term
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


                        }

                        if(value.performer_table_name === 'midwife') {
                            var midwife_info = '<option value="'+value.performer_table_id+'" selected>'+performer_details[key].name+'</option>'
                            var midwife_role = '<option value="'+value.role_id+'" selected>'+roles[key].display_name+'</option>'
                   
                            $("#Midwife").append('\n\
                                <tr id="past_midwife_list'+value.id+'">\n\
                                    <td class="w-2">\n\
                                        <button class="btn btn-danger deleteMidwife" type="button" id="'+value.performer_table_id+'" onClick="removeMidwifePerformer('+value.id+');"><i class="fe fe-trash"></i></button>\n\
                                        </td>\n\
                                    <td class="w-8">\n\
                                        <select class="form-control select2-show-search midwife w-100" id="pos_rendering_user_midwife'+value.performer_table_id+'" name="pos_rendering_user_midwife[]" data-placeholder="Choose One" required>\n\
                                        '+midwife_info+'\n\
                                        </select>\n\
                                    </td>\n\
                                    <td class="w-90">\n\
                                        <select class="form-control select2-show-search performer_role w-100" id="performer_role" name="performer_role_midwife[]" data-placeholder="Select Role" required>\n\
                                        '+midwife_role+'\n\
                                        </select>\n\
                                    </td>\n\
                                </tr>\n\
                            ')


                            $(".midwife").select2({
                                placeholder: '<?php echo lang("choose_one") ?>',
                                allowClear: true,
                                ajax: {
                                    url: "midwife/getAllMidwivesInfo",
                                    type: "post",
                                    dataType: "json",
                                    delay: 250,
                                    data: function (params) {
                                        return {
                                            searchTerm: params.term
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

                      
                        }

                        if(value.performer_table_name === 'laboratorist') {
                            var laboratorist_info = '<option value="'+value.performer_table_id+'" selected>'+performer_details[key].name+'</option>'
                            var laboratorist_role = '<option value="'+value.role_id+'" selected>'+roles[key].display_name+'</option>'
                    
                            $('#Laboratorist').append('\n\
                                <tr id="past_laboratorist_list'+value.id+'">\n\
                                    <td class="w-2">\n\
                                    <button class="btn btn-danger deleteLaboratorist" type="button" id="'+value.performer_table_id+'" onClick="removeLaboratoristPerformer('+value.id+');"><i class="fe fe-trash"></i></button>\n\
                                    </td>\n\
                                    <td class="w-8">\n\
                                        <select class="form-control select2-show-search  laboratorist w-100" id="pos_rendering_user_laboratorist'+value.id+'" name="pos_rendering_user_laboratorist[]" data-placeholder="Choose One">\n\
                                        '+laboratorist_info+'\n\
                                        </select>\n\
                                    </td>\n\
                                    <td class="w-90">\n\
                                        <select class="form-control select2-show-search performer_role w-100" id="performer_role" name="performer_role_laboratorist[]" data-placeholder="Select Role" required>\n\
                                        '+laboratorist_role+'\n\
                                        </select>\n\
                                    </td>\n\
                                </tr>\n\
                            ')


                                       
                            $(".laboratorist").select2({
                                placeholder: '<?php echo lang("choose_one"); ?>',
                                allowClear: true,
                                ajax: {
                                    url: "laboratorist/getAllLaboratoristsInfo",
                                    post: "post",
                                    dataType: "json",
                                    delay: "250",
                                    data: function (params) {
                                        return {
                                            searchTerm: params.term
                                        };
                                    },
                                    processResults: function (data) {
                                        return {
                                            results: data
                                        };
                                    },
                                    cache: true
                                }
                            });


                        }
  
                        $('.performer_role').select2({
                            placeholder: '<?php echo lang('select').' '.lang('role')?>',
                            allowClear: true,
                            ajax: {
                                url: 'procedure/getProcedurePerformerRole',
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                    return {
                                        searchTerm: params.term
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: data
                                    };
                                },
                                cache: true
                            }
                        })

                    });

                    $.each(patient, function(key, value){
                        if(value.id == procedure.patient_id) {
                            $('#pos_select').append($('<option selected>').val(value.id).text(value.name)).end();

                        }else {
                            $('#pos_select').append($('<option>').val(value.id).text(value.name)).end();
                        }
                    });
      
                    $.each(encounter, function(key, value) {
                        if(value.id == procedure.encounter_id) {
                            $('#encounter').append($('<option selected>').text(value.encounter_number+' - '+value.encounter_type_id+' - '+value.created_at).val(value.id)).end();

                        }else {
                            $('#encounter').append($('<option>').text(value.encounter_number+' - '+value.encounter_type_id+' - '+value.created_at).val(value.id)).end();
                        }
                    });

                    $.each(procedures, function(key, value){
                        if(value.id == procedure.id) {
                            $('#procedure').append($('<option selected>').text(value.procedure_code+' - '+ value.description).val(value.id)).end();
                        } else {
                            $('#procedure').append($('<option>').text(value.procedure_code+' - '+ value.description).val(value.id)).end();
                        }
                    }) 

                    $.each(status, function (key, value) {
                        if(value.id == procedure.status_id) {
                            $('#status').append($('<option selected>').text(value.display_name).val(value.id)).end();
                        } else {
                            $('#status').append($('<option>').text(value.display_name).val(value.id)).end();
                        }
                    })

                    $('#editor').html(procedure.notes);
            
                }
            })
        })
    </script>


    <!-- Remove Doctor Performer from the database -->
    <script>
        $(document).on('click', '.deleteDoctor', function() {
            $('#my-modal-delete').modal('show');

        });
            function removeDoctorPerformer(id) {
            $('#performerId').val(id);
            console.log(id);
        }
    </script>

    <!-- Remove Nurse Performer from the database -->
    <script>
        $(document).on('click', '.deleteNurse', function() {
            $('#my-modal-delete').modal('show');

        });
            function removeNursePerformer(id) {
                $('#performerId').val(id);
                console.log(id);
            }
    </script>


    <!-- Remove Midwife Performer from the database -->
    <script>
         $(document).on('click', '.deleteMidwife', function() {
            $('#my-modal-delete').modal('show');

        });
            function removeMidwifePerformer(id) {
                $('#performerId').val(id);
                console.log(id);
            }
    </script>

    <!-- Remove Laboratorist Performer from the database -->
    <script>
         $(document).on('click', '.deleteLaboratorist', function() {
            $('#my-modal-delete').modal('show');

        });
            function removeLaboratoristPerformer(id) {
                $('#performerId').val(id);
                console.log(id);
            }
    </script>


    <script type="text/javascript">
        $('#submitbtn').on('click',function(e){
        e.preventDefault();
            var data = $('#deleteForm').serialize();
            var getProcedurePerformerId = data.split("=")[1];
            console.log(getProcedurePerformerId);
            var base_url='<?php echo base_url(); ?>'
            $.ajax({
                url:'procedure/deleteProcedurePerformer?id='+getProcedurePerformerId,
                type:'GET',
                data:getProcedurePerformerId,
                success:function(data){
                    $('#my-modal-delete').modal('hide');
                    $('#past_doctor_list'+ getProcedurePerformerId).hide(2000);
                    $('#past_nurse_list'+ getProcedurePerformerId).hide(2000);
                    $('#past_midwife_list'+ getProcedurePerformerId).hide(2000);
                    $('#past_laboratorist_list'+ getProcedurePerformerId).hide(2000);

                    $.growl.success({
                        message: "<?php echo lang('record_deleted'); ?>"
                    });

                }
            })

            return false;


            });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            var patient_id = '<?php echo $patient_details->id ?>';
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
        });
    </script>

    <script type="text/javascript">
        $('#formForm').parsley();
    </script>

    <script type="text/javascript">
        $("#pos_select").change(function() {
            var patient = $("#pos_select").val();
            $("#encounter").find('option').remove();

            $.ajax({
                url: 'form/getEncounterByPatientIdJason?id='+patient,
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
            var form_id = "<?php echo $form_single->id ?>";
            var form_date = "<?php echo date("F j, Y H:i A", strtotime($form_single->form_date.' UTC')); ?>";
            var timenow = "<?php echo date('Y-m-d H:i'); ?>";
            var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86399); ?>";
            console.log(form_date);
            if (form_id === "") {
                flatpickr(".flatpickr", {
                    altInput: true,
                    altFormat: "F j, Y h:i K",
                    maxDate: maxdate,
                    disableMobile: true,
                    enableTime: true,
                    defaultDate: timenow,
                });
            } else {
                flatpickr(".flatpickr", {
                    altInput: true,
                    altFormat: "F j, Y h:i K",
                    dateFormat: "F j, Y h:i K",
                    disableMobile: true,
                    enableTime: true,
                    defaultDate: form_date,
                });
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".pos_select").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
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

    <script type="text/javascript">
        $(document).ready(function () {
            $("#screensize").click(function () {
                x = document.getElementById("addCase");

                if (x.className === "col-md-12 col-sm-12 col-lg-12") {
                    x.className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("caselist").className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("screensize").className = "fa fa-compress text-dark"
                    $("#formForm").attr("hidden", false);
                } else {
                    x.className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("caselist").className = "col-md-12 col-sm-12 col-lg-12";
                    document.getElementById("screensize").className = "fa fa-expand text-dark"
                    $("#formForm").attr("hidden", true);
                }
            })
        });
    </script>


    <!--Delete Doctor, Midwife, Nurse, Laboratorist-->
    <script type="text/javascript">

        function removeDoctor(doctor_count)  {
            $("#past_doctor_list"+doctor_count).remove();

        }

        function removeNurse(nurse_count) {
            $("#past_nurse_list"+nurse_count).remove();
           

        }

        function removeMidwife(midwife_count) {
            $("#past_midwife_list"+midwife_count).remove();
           
        }

        function removeLaboratorist(laboratorist_count) {
            $("#past_laboratorist_list"+laboratorist_count).remove();
        }

    </script>


    <!-- Add Doctor-->
    <script type="text/javascript">
        $(document).ready(function (){
            $('#formForm').on("click", "#newRecord_doctor", function (){
                var doctor_count = $(".doctor").length;
                $("#Doctor").append('\n\
                    <tr id="past_doctor_list'+doctor_count+'">\n\
                        <td class="w-2">\n\
                            <button class="btn btn-danger" type="button" id="removeDoctor'+doctor_count+'" onClick="removeDoctor('+doctor_count+');"><i class="fe fe-trash"></i></button>\n\
                            <input type="text" name="id[]" value="'+doctor_count+'">\n\
                        </td>\n\
                        <td class="w-8 ">\n\
                            <select class="form-control select2-show-search doctor w-100" id="pos_rendering_user_doctor'+doctor_count+'" name="pos_rendering_user_doctor[]" data-placeholder="Choose one" required>\n\
                            </select>\n\
                        </td>\n\
                        <td class="w-90">\n\
                            <select class="form-control select2-show-search performer_role w-100" id="performer_role'+doctor_count+'" name="performer_role_doctors[]" data-placeholder="Select Role" required>\n\
                            </select>\n\
                        </td>\n\
                    </tr>\n\
                ')

                $(document).ready(function (){
                    $(".doctor").select2({
                        placeholder:'<?php echo lang("choose_one") ?>',
                        allowClear: true,
                        ajax: {
                            url: "doctor/getAllDoctorsInfo",
                            type: "post",
                            dataType: "json",
                            delay: "250",
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    })

                });

                $(document).ready(function() {
                    $('.performer_role').select2({
                        placeholder: '<?php echo lang('select').' '.lang('role')?>',
                        allowClear: true,
                        ajax: {
                            url: 'procedure/getProcedurePerformerRole',
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    })
                });

            })

        })
    </script>

    <!-- Add Nurse-->
    <script text="script/javascript">
        $(document).ready(function() {
            $('#formForm').on("click", "#newRecord_nurse", function (){
                var nurse_count = $(".nurse").length
                $("#Nurse").append('\n\
                <tr id="past_nurse_list'+nurse_count+'">\n\
                    <td class="w-2">\n\
                        <button class="btn btn-danger" type="button" id="removeNurse'+nurse_count+'" onClick="removeNurse('+nurse_count+');"><i class="fe fe-trash"></i></button>\n\
                        <input type="text" name="id[]" value="'+nurse_count+'">\n\
                    </td>\n\
                    <td class="w-8">\n\
                        <select class="form-control select2-show-search nurse w-100" id="pos_rendering_user_nurse'+nurse_count+'" name="pos_rendering_user_nurse[]" data-placeholder="Choose one">\n\
                        </select>\n\
                    </td>\n\
                    <td class="w-90">\n\
                        <select class="form-control select2-show-search performer_role w-100" id="performer_role'+nurse_count+'" name="performer_role_nurse[]" data-placeholder="Select Role" required>\n\
                        </select>\n\
                    </td>\n\
                </tr>\n\
                ')

                $(document).ready(function (){
                    $(".nurse").select2({
                        placeholder: '<?php echo lang("choose_one") ?>',
                        allowClear: true,
                        ajax: {
                            url: "nurse/getAllNursesInfo",
                            type: "post",
                            dataType: "json",
                            delay: "250",
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    })
                });


                $(document).ready(function() {
                    $('.performer_role').select2({
                        placeholder: '<?php echo lang('select').' '.lang('role')?>',
                        allowClear: true,
                        ajax: {
                            url: 'procedure/getProcedurePerformerRole',
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    })
                });
            })

        })
    </script>

    <!-- Add Midwife-->
    <script text="type/javascript">
        $(document).ready(function (){
            $('#formForm').on("click", "#newRecord_midwife", function (){
                var midwife_count = $(".midwife").length
                $("#Midwife").append('\n\
                    <tr id="past_midwife_list'+midwife_count+'">\n\
                        <td class="w-2">\n\
                            <button class="btn btn-danger" type="button" id="removeMidwife'+midwife_count+'" onClick="removeMidwife('+midwife_count+');"><i class="fe fe-trash"></i></button>\n\
                            <input type="text" name="id[]" value="'+midwife_count+'">\n\
                        </td>\n\
                        <td class="w-8">\n\
                            <select class="form-control select2-show-search midwife w-100" id="pos_rendering_user_midwife'+midwife_count+'" name="pos_rendering_user_midwife[]" data-placeholder="Choose One" required>\n\
                            </select>\n\
                        </td>\n\
                        <td class="w-90">\n\
                            <select class="form-control select2-show-search performer_role w-100" id="performer_role'+midwife_count+'" name="performer_role_midwife[]" data-placeholder="Select Role" required>\n\
                            </select>\n\
                        </td>\n\
                    </tr>\n\
                ')

                $(document).ready(function (){
                    $(".midwife").select2({
                        placeholder: '<?php echo lang("choose_one") ?>',
                        allowClear: true,
                        ajax: {
                            url: "midwife/getAllMidwivesInfo",
                            type: "post",
                            dataType: "json",
                            delay: "250",
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    });
                });

                $(document).ready(function() {
                    $('.performer_role').select2({
                        placeholder: '<?php echo lang('select').' '.lang('role')?>',
                        allowClear: true,
                        ajax: {
                            url: 'procedure/getProcedurePerformerRole',
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    })
                });
            });
        });
    </script>

    <!-- Add Laboratorist -->
     <script type="text/javascript">
        $(document).ready(function (){
            $("#formForm").on("click", "#newRecord_laboratorist", function (){
                var laboratorist_count = $(".laboratorist").length
                $('#Laboratorist').append('\n\
                    <tr id="past_laboratorist_list'+laboratorist_count+'">\n\
                        <td class="w-2">\n\
                            <button class="btn btn-danger" type="button" id="removeLaboratorist'+laboratorist_count+'" onClick="removeLaboratorist('+laboratorist_count+');"><i class="fe fe-trash"></i></button>\n\
                            <input type="text" name="id[]" value="'+laboratorist_count+'">\n\
                        </td>\n\
                        <td class="w-8">\n\
                            <select class="form-control select2-show-search  laboratorist w-100" id="pos_rendering_user_laboratorist'+laboratorist_count+'" name="pos_rendering_user_laboratorist[]" data-placeholder="Choose One">\n\
                            </select>\n\
                        </td>\n\
                        <td class="w-90">\n\
                            <select class="form-control select2-show-search performer_role w-100" id="performer_role'+laboratorist_count+'" name="performer_role_laboratorist[]" data-placeholder="Select Role" required>\n\
                            </select>\n\
                        </td>\n\
                    </tr>\n\
                ')

                $(document).ready(function() {
                    $(".laboratorist").select2({
                        placeholder: '<?php echo lang("choose_one"); ?>',
                        allowClear: true,
                        ajax: {
                            url: "laboratorist/getAllLaboratoristsInfo",
                            post: "post",
                            dataType: "json",
                            delay: "250",
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }

                    });
                })

                $(document).ready(function() {
                    $('.performer_role').select2({
                        placeholder: '<?php echo lang('select').' '.lang('role')?>',
                        allowClear: true,
                        ajax: {
                            url: 'procedure/getProcedurePerformerRole',
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    })
                });
            })
        })
    </script>



    <script >
        $(document).ready(function () {
            $("#procedure").select2({
                placeholder: '<?php echo lang('select') ?> <?php echo lang('procedure') ?>',
                allowClear: true,
                ajax: {
                    url: 'procedure/getCptCodeAndDescription',
                    type: "post",
                    dataType: "json",
                    delay: "250",
                    data: function (params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        })
    </script>
    

    <script >
        $(document).ready(function () {
            $("#status").select2({
                placeholder: '<?php echo lang('select') ?> <?php echo lang('procedure') ?>',
                allowClear: true,
                ajax: {
                    url: 'procedure/getStatusDisplayName',
                    type: "post",
                    dataType: "json",
                    delay: "250",
                    data: function (params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        })

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