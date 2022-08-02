<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('patient'); ?>  <?php echo lang('documents'); ?> </div>
                                <div class="card-options">
                                    <a class="btn btn-primary" data-target="#myModal1" data-toggle="modal" href=""><i class="fe fe-plus"></i><?php echo lang('add_new'); ?></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
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
                                        <table id="editable-sample" class="table table-bordered text-nowrap key-buttons w-100">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0"><?php echo lang('date'); ?></th>
                                                    <th class="border-bottom-0"><?php echo lang('patient'); ?></th>
                                                    <th class="border-bottom-0"><?php echo lang('title'); ?></th>
                                                    <th class="border-bottom-0"><?php echo lang('description'); ?></th>
                                                    <th class="border-bottom-0"><?php echo lang('document'); ?></th>
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

                        <div class="modal fade" id="myModal1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('document'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="patient/addPatientMaterial" data-parsley-validate class="clearfix" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Associate with Encounter?</label>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="encounter_check" value="1">
                                                                <span class="custom-control-label">Yes</span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="encounter_check" value="0">
                                                                <span class="custom-control-label">No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12" hidden id="encounter_div">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                    <select class="form-control select2-show-search" name="encounter_id" id="encounter" <?php if(!empty($encounter_id)) { echo "disabled"; } ?> data-placeholder="Choose One">
                                                        <option value="0" label="choose one">Choose One</option>
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
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control select2-show-search" id="patientchoose" name="patient" data-placeholder="<?=lang('select').' '.lang('patient');?>" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('category'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control select2-show-search" name="category" id="category" data-placeholder="<?=lang('select').' '.lang('category');?>" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('title'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="<?=lang('title');?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('description'); ?></label>
                                                    <input type="text" class="form-control" name="description" id="description" placeholder="<?=lang('description');?>">
                                                </div>
                                            </div>
                                            <input type="hidden" name="redirect" value='patient/documents'>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('file'); ?> <span class="text-red">*</span></label>
                                                    <span class="text-muted">(<?php echo lang('upload_less_than_10MB_image_or_pdf');?> and 10K by 10K Max Dimension)</span>
                                                    <input type="file" name="img_url" id="document" class="dropify" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <button class="btn btn-primary pull-right" name="submit" id="documentSubmit" type="submit"><?php echo lang('submit'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('document'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editDocumentForm" action="patient/addPatientMaterial" data-parsley-validate class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                        <select class="form-control select2-show-search" name="encounter_id" id="editencounter" data-placeholder="Choose One">
                                                        <option value="0" label="choose one">Choose One</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" id="editpatientchoose" name="patient" data-placeholder="<?=lang('select').' '.lang('patient');?>" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('category'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="category" id="editcategory" data-placeholder="<?=lang('select').' '.lang('category');?>" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('title'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="title" id="edittitle" placeholder="<?=lang('title');?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('description'); ?></label>
                                                        <input type="text" class="form-control" name="description" id="editdescription" required placeholder="<?=lang('description');?>">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="redirect" value='patient/documents'>
                                                <input type="hidden" name="id" value=''>
                                                <div class="col-md-12 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="submit" id="submit" type="submit"><?php echo lang('submit'); ?></button>
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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $("#encounter").change(function() {
            var encounter = $("#encounter").val();
            $("#patientchoose").find('option').remove();

            $.ajax({
                url: 'patient/getPatientByEncounterIdByJason?id='+encounter,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patient = response.patient;
                    $('#patientchoose').append($('<option>').text(patient.name).val(patient.id)).end();
                    // $.each(patient, function (key, value) {
                    //     $('#patientchoose').append($('<option>').text(value.name).val(value.id)).end();
                    //     console.log(value.name);
                    // });
                }
            })
        });

        $("#editencounter").change(function() {
            var encounter = $("#editencounter").val();
            $("#editpatientchoose").find('option').remove();

            $.ajax({
                url: 'patient/getPatientByEncounterIdByJason?id='+encounter,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patient = response.patient;
                    $('#editpatientchoose').append($('<option>').text(patient.name).val(patient.id)).end();
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
            $('input[type=radio][name=encounter_check]').change(function() {
                var encounter = this.value;
                if (encounter == 1) {
                    $("#encounter_div").attr("hidden", false);
                } else {
                    $("#encounter").val(0).change();
                    $("#encounter_div").attr("hidden", false);
                }
            });
        })
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
        $(".table").on("click", ".editbutton", function () {
            $('#editDocumentForm').trigger("reset");
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'patient/editPatientMaterialByJason?id='+iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patients = response.patients;
                    var categories = response.categories;
                    var encounters = response.encounters;
                    $('#editDocumentForm').find('[name="id"]').val(response.documents.id).end()
                    $.each(patients, function (key, value) {
                        $('#editpatientchoose').append($('<option>').text(value.name).val(value.id)).end();
                    });
                    $.each(categories, function (key, value) {
                        $('#editcategory').append($('<option>').text(value.display_name).val(value.id)).end();
                    });
                    $.each(encounters, function (key, value) {
                        $('#editencounter').append($('<option>').text(value.text).val(value.id)).end();
                    });
                    $('#editDocumentForm').find('[name="patient"]').val(response.documents.patient).change()
                    $('#editDocumentForm').find('[name="category"]').val(response.documents.category_id).change()
                    $('#editDocumentForm').find('[name="title"]').val(response.documents.title).end()
                    $('#editDocumentForm').find('[name="description"]').val(response.documents.description).end()
                    $('#editDocumentForm').find('[name="encounter_id"]').val(response.documents.encounter_id).change()

                    console.log(response.documents.encounter_id);

                    $('#myModal2').modal('show');
                }
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                // "processing": true,
                // "serverSide": true,
                // "searchable": true,
                "ajax": {
                    url: "patient/getDocuments",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                title: '<?php echo lang('patient') . ' ' . lang('documents');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('patient') . ' ' . lang('documents');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('patient') . ' ' . lang('documents');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('patient') . ' ' . lang('documents');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('patient') . ' ' . lang('documents');?>',
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
                    searchPlaceholder: "Search..."
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
        


        });
    </script>

    <script>
        $(document).ready(function () {
            $("#editpatientchoose").select2({
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
        
            $("#editencounter").select2({
                placeholder: '<?php echo lang('select').' '.lang('encounter'); ?>',
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
            $("#category").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getDocumentUploadCategory',
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
            $("#editcategory").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
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