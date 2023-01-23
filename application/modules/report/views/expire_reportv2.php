<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('expire_report'); ?></div>
                                <div class="card-options">
                                    <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                        <a href="report/addReportView">
                                            <button id="" class="btn btn-primary btn-xs">
                                                <i class="fa fa-plus"></i> <?php echo lang('add_new_report'); ?>
                                            </button>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="editable-sample" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('patient'); ?></th>
                                                            <th><?php echo lang('description'); ?></th>
                                                            <th><?php echo lang('doctor'); ?></th>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                                <th class="no-print"><?php echo lang('options'); ?></th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($reports as $report) { ?>
                                                            <tr class="">
                                                                <td><?php echo $this->patient_model->getPatientById($report->patient_id)->name; ?></td>
                                                                <td> <?php echo $report->description; ?></td>
                                                                <td><?php echo $this->doctor_model->getDoctorById($report->doctor_id)->name; ?></td>
                                                                <td class="center"><?php echo date('F j, Y h:i A', strtotime($report->report_date.' UTC')); ?></td>
                                                                <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                                    <td class="no-print">
                                                                        <a href="report/editReport?id=<?php echo $report->id; ?>" class="btn btn-info"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></a>
                                                                        <a class="btn btn-danger btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="report/delete?id=<?php echo $report->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> <?php echo lang('delete'); ?></a>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_new_report'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="report/addReport" method="post" class="clearfix" enctype="multipart/form-data" onsubmit="javascript: return myFunction();">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('select_type'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" data-placeholder="report" name="type">
                                                            <option value="birth" <?php
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'birth') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('birth'); ?></option>
                                                            <option value="operation" <?php
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'operation') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('operation'); ?></option>
                                                            <option value="expire" <?php
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'expire') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('death'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('description'); ?></label>
                                                        <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                            <div id="quillEditor" class="bg-white quillEditor">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <textarea id="description" name="description" readonly="" hidden="" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="patient" data-placeholder="Choose one">
                                                            <option selected disabled><?php echo lang('select_item'); ?></option>
                                                            <?php foreach ($patients as $patient) { ?>
                                                                <option value="<?php echo $patient->name . '*' . $patient->ion_user_id; ?>" <?php
                                                                ?> ><?php echo $patient->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="doctor" data-placeholder="Choose one">
                                                            <option selected disabled><?php echo lang('select_item'); ?></option>
                                                            <?php foreach ($doctors as $doctor) { ?>
                                                                <option value="<?php echo $doctor->name; ?>" <?php
                                                                ?> ><?php echo $doctor->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value=''>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
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
                                        <h6 class="modal-title"><?php echo lang('edit_operation_report'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editReportForm" action="report/addReport" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="javascript: return myFunction2();">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Select Type <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" data-placeholder="Birth" name="type">
                                                            <option value="birth" <?php
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'birth') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('birth'); ?></option>
                                                            <option value="operation" <?php
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'operation') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('operation'); ?></option>
                                                            <option value="expire" <?php
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'expire') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('death'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('description'); ?></label>
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
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control" data-placeholder="Choose one" name="patient" value=''>
                                                            <?php foreach ($patients as $patient) { ?>
                                                                <option value="<?php echo $patient->name . '*' . $patient->ion_user_id; ?>" <?php
                                                                if (!empty($report->patient)) {
                                                                    if (explode('*', $report->patient)[1] == $patient->ion_user_id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $patient->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control" data-placeholder="Choose one" name="doctor">
                                                            <?php foreach ($doctors as $doctor) { ?>
                                                                <option value="<?php echo $doctor->name; ?>" <?php
                                                                if (!empty($report->doctor)) {
                                                                    if ($report->doctor == $doctor->name) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $doctor->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" value="" name="date" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value=''>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
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

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".editbutton").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#editReportForm').trigger("reset");
                $.ajax({
                    url: 'report/editReportByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editReportForm').find('[name="id"]').val(response.report.id).end()
                        $('#editReportForm').find('[name="type"]').val(response.report.report_type).end()
                        document.getElementById('quillEditor2').children[0].innerHTML = response.report.description;
                        $('#editReportForm').find('[name="patient"]').val(response.report.patient).end()
                        $('#editReportForm').find('[name="doctor"]').val(response.report.doctor).end()
                        $('#editReportForm').find('[name="date"]').val(response.report.date).end()
                        $('#myModal2').modal('show');
                    }
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
                                title: '<?php echo lang('expire_report'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('expire_report'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('expire_report'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('expire_report'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('expire_report'); ?>',
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
                iDisplayLength: -1,
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

            var error = "<?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>";
            var success = "<?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>";
            var notice = "<?php if(isset($_SESSION['notice'])) echo $_SESSION['notice']; ?>";
            var warning = "<?php if(isset($_SESSION['warning'])) echo $_SESSION['warning']; ?>";

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