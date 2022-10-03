<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('holiday'); ?></div>
                                <div class="card-options">
                                    <a class="btn btn-primary" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><span class="button-text"><?php echo lang('add_new'); ?></span></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap key-buttons" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> <?php echo lang('doctor'); ?></th>
                                                    <th> <?php echo lang('date'); ?></th>
                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                        <th> <?php echo lang('options'); ?></th>
                                                    <?php } ?>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($holidays as $holiday) {
                                                    $i = $i + 1;
                                                    ?> 
                                                    <tr class="">
                                                        <td> <?php echo $i; ?></td>
                                                        <td> <?php echo $this->doctor_model->getDoctorById($holiday->doctor)->name; ?></td> 
                                                        <td> <?php echo date('d-m-Y', $holiday->date); ?></td> 
                                                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                            <td>
                                                                <button type="button" class="btn btn-info btn-xs editbutton" data-toggle="modal" data-id="<?php echo $holiday->id; ?>" aria-haspopup="true" aria-expanded="false"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></button>   
                                                                <a class="btn btn-danger btn-xs btn_width delete_button" href="schedule/deleteHoliday?id=<?php echo $holiday->id; ?>&doctor=<?php echo $holiday->doctor; ?>&redirect=schedule/allHolidays" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i> <?php echo lang('delete'); ?></a>
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

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> <?php echo lang('add'); ?> <?php echo lang('holiday'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addHolidayForm" action="schedule/addHoliday" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('addHolidayForm');">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">  <?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" id="doctorchoose" name="doctor" required>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value=''>
                                            <input type="hidden" name="redirect" value='schedule/allHolidays'>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" name="submit" type="submit"> <?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="myModal2">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('edit'); ?>  <?php echo lang('holiday'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editHolidayForm" class="clearfix" action="schedule/addHoliday" method="post" enctype="multipart/form-data" onsubmit="btnLoading('editHolidayForm');">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">  <?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" id="doctorchoose1" name="doctor" required>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text" readonly required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="id" value=''>
                                            <input type="hidden" name="redirect" value='schedule/allHolidays'>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" name="submit" type="submit"> <?php echo lang('submit'); ?></button>
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

        <script src="common/js/coderygel.min.js"></script>

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

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

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
            $('#addHolidayForm').parsley();
        </script>

        <script type="text/javascript">
            $('#editHolidayForm').parsley();
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".table").on("click", ".editbutton", function () {
                    // e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $('#editHolidayForm').trigger("reset");
                    $('#myModal2').modal('show');
                    $.ajax({
                        url: 'schedule/editHolidayByJason?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            // Populate the form fields with the data returned from server
                            var date = new Date(response.holiday.date * 1000);
                            $('#editHolidayForm').find('[name="id"]').val(response.holiday.id).end()
                            $('.js-example-basic-single.doctor').val(response.holiday.doctor).trigger('change');
                            $('#editHolidayForm').find('[name="date"]').val(date.getMonth() + 1 + '/' + (date.getDate()) + '/' + date.getFullYear()).end()


                            var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                            $('#editHolidayForm').find('[name="doctor"]').append(option1).trigger('change');
                        }
                    });
                });
            });
        </script>



        <script>
            $(document).ready(function () {
                var table = $('#editable-sample').DataTable({
                    responsive: true,

                    dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            }
                        },
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