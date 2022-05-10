<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">
                                    <?php echo lang('payments'); ?> || <?php echo lang('doctor'); ?> : <?php echo $this->doctor_model->getDoctorById($doctor)->name; ?>
                                </h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form role="form" class="f_report" action="finance/docComDetails" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="btn-group mr-0">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    Date Range
                                                                </div>
                                                            </div>
                                                            <input class="form-control flatpickr form-control" readonly name="date_from" placeholder="<?php echo lang('date_from'); ?>" type="text" value="<?php
                                                            if (!empty($date_from)) {
                                                                echo date('m/d/Y', $date_from);
                                                            }
                                                            ?>">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <?php echo lang('to'); ?>
                                                                </div>
                                                            </div>
                                                            <input class="form-control flatpickr form-control" readonly name="date_to" placeholder="<?php echo lang('date_to'); ?>" type="text" value="<?php
                                                            if (!empty($date_to)) {
                                                                echo date('m/d/Y', $date_to);
                                                            }
                                                            ?>">
                                                            <input type="hidden" class="form-control dpd2" name="doctor" value="<?php
                                                            if (!empty($doctor)) {
                                                                echo $doctor;
                                                            }
                                                            ?>">
                                                            <button class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('invoice_id'); ?></th>
                                                                    <th><?php echo lang('patient'); ?></th>   
                                                                    <th><?php echo lang('date'); ?></th>
                                                                    <th><?php echo lang('total'); ?></th>
                                                                    <th><?php echo lang('doctors_commission'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($payments as $payment) { ?>
                                                                    <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>

                                                                    <tr class="">

                                                                        <td>
                                                                            <?php
                                                                            echo $payment->id;
                                                                            ?>
                                                                        </td>

                                                                        <td>
                                                                            <?php
                                                                            if (!empty($patient_info)) {
                                                                                echo $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone;
                                                                            }
                                                                            ?>
                                                                        </td>


                                                                        <td><?php echo date('d/m/y', $payment->date); ?></td>
                                                                        <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>
                                                                        <td><?php echo $settings->currency; ?> <?php
                                                                            if (!empty($payment->doctor)) {
                                                                                $doc_com[] = $payment->doctor_amount;
                                                                                echo $payment->doctor_amount;
                                                                            }
                                                                            ?></td>
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
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <p class="text-white mb-1"><?php echo lang('total_doctors_commission'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="text-white m-0 font-weight-bold text-right">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($doc_com)) {
                                                                $total_doc_com = array_sum($doc_com);
                                                            } else {
                                                                $total_doc_com = 0;
                                                            }

                                                            echo $total_doc_com;
                                                            ?>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".flatpickr").flatpickr({

            });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#editable-sample').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-md-1 col-sm-12'l><'col-md-7 col-sm-12 text-center'B><'col-md-4 col-sm-12'f>>" +
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
                            columns: [1, 2, 3,],
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
        });
    </script>

    </body>
</html> 