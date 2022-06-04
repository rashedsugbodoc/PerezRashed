<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->


                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('prescription'); ?></div>
                                <div class="card-options">
                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                        <div class="col-md-4 no-print pull-right"> 
                                            <a href="prescription/addPrescriptionView">
                                                <div class="btn-group pull-right">
                                                    <button id="" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-plus"></i> <?php echo lang('add_new'); ?>
                                                    </button>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="editable-sample1" class="table table-bordered text-nowrap key-buttons w-100">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo lang('date'); ?></th>                                  
                                                    <th> <?php echo lang('prescription'); ?> <?php echo lang('number'); ?> </th>
                                                    <th> <?php echo lang('patient'); ?></th>
                                                    <th> <?php echo lang('patient'); ?> <?php echo lang('number'); ?> </th>
                                                    <th> <?php echo lang('medicine'); ?> </th>
                                                    <th> <?php echo lang('options'); ?></th>
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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".editPrescription", function () {

                //   e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#myModal5').modal('show');
                $.ajax({
                    url: 'prescription/editPrescriptionByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success function (response) {
                        var de = response.prescription.date * 1000;
                        var d = new Date(de);
                        var da = (d.getDate() + 1) + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                        // Populate the form fields with the data returned from server
                        $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                        $('#prescriptionEditForm').find('[name="date"]').val(da).end()
                        // Populate the form fields with the data returned from server
                        $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                        $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                        CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                        CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                        CKEDITOR.instances['editor3'].setData(response.prescription.note)
                    }
                });
            });
        });
    </script> -->
    <script>
        $(document).ready(function () {
            var table = $('#editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "processing": true,
                "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "prescription/getPrescriptionListByDoctor",
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
                            columns: [0, 1, 2, 4],
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
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
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