<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo lang('todays_appointments'); ?>
                                </div>
                                <div class="card-options">
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                        <!-- <a data-toggle="modal" href="#myModal">
                                            <div class="btn-group pull-right">
                                                <button id="" class="btn btn-primary btn-xs pull-right">
                                                    <i class="fa fa-plus"></i>   <?php echo lang('add_appointment'); ?> 
                                                </button>
                                            </div>
                                        </a> -->
                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?root=appointment&method=todays"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="editable-sample1" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo lang('id'); ?></th>
                                                    <th> <?php echo lang('patient'); ?></th>
                                                    <th> <?php echo lang('doctor'); ?></th>
                                                    <th> <?php echo lang('date-time'); ?></th>
                                                    <th> <?php echo lang('remarks'); ?></th>
                                                    <th> <?php echo lang('status'); ?></th>
                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                        <th> <?php echo lang('options'); ?></th>
                                                    <?php } ?>
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

        <!--File-Uploads Js-->
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.ui.widget.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.iframe-transport.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fancy-fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/fancy-uploader.js'); ?>"></script>

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

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#editable-sample1").on("click", ".endEncounter", function(){
                var appointment_id = $(this).data('appointment');
                var encounter_id = $(this).data('encounter');
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
                        url: "encounter/endEncounterById?encounter_id="+encounter_id+"&appointment_id="+appointment_id,
                        type: "GET",
                        data: '',
                        dataType: "json",
                        success: function (response) {
                            swal("Done!", "You Successfully Ended", "success");
                            // console.log(response.encounter_id);
                            $(".endEncounter").remove();
                            $(".endEncounterDiv").append('<a class="btn btn-light btn-md btn-block">Encounter has Ended</a>');
                            $(".confirm").click(function () {
                                location.reload(true);
                            });
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
        $(document).ready(function () {
            $(".table").on("click", ".history", function () {

                //e.preventDefault(e);
                // Get the record's ID via attribute   
                var iid = $(this).attr('data-id');
                //var id = $(this).attr('data-id');
                console.log(iid);
                $('#editAppointmentForm').trigger("reset");
                $.ajax({
                    url: 'patient/getMedicalHistoryByjason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    $('#medical_history').html("");
                    $('#medical_history').append(response.view);

                });
                $('#cmodal').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "appointment/getTodaysAppoinmentList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
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
                            columns: [0, 1, 2, 3, 4, 5],
                        }
                    },
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/english.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    </body>
</html>  