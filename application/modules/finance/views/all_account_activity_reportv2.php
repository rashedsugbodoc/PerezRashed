<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('transactions'); ?> <?php echo lang('under'); ?> <strong style="color: #009988; text-transform: capitalize;" ><?php echo lang('all_accounts'); ?></strong> (<?php echo lang('today'); ?>)</div>
                            </div>
                            <div class="card-body">
                                <h3><?php echo lang('todays'); ?> <?php echo lang('report'); ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('payer_account'); ?></th>
                                                            <th><?php echo lang('bill_amount'); ?></th>
                                                            <th><?php echo lang('payment_received'); ?></th>
                                                            <th><?php echo lang('due_amount'); ?></th>
                                                            <th><?php echo lang('options'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($companies as $company) { ?>
                                                            <tr class="">
                                                                <td><?php echo $company->name; ?></td>
                                                                <td><?php echo $settings->currency; ?><?php
                                                                    $total = array();
                                                                    $ot_total = array();

                                                                    $company_id = $company->id;
                                                                    foreach ($payments as $payment) {
                                                                        if ($payment->company_id == $company_id) {
                                                                            $total[] = $payment->gross_total;
                                                                        }
                                                                    }
                                                                    foreach ($ot_payments as $ot_payment) {
                                                                        if ($ot_payment->company_id == $company_id) {
                                                                            $ot_total[] = $ot_payment->gross_total;
                                                                        }
                                                                    }

                                                                    $total = array_sum($total);
                                                                    if (empty($total)) {
                                                                        $total = 0;
                                                                    }

                                                                    $ot_total = array_sum($ot_total);
                                                                    if (empty($ot_total)) {
                                                                        $ot_total = 0;
                                                                    }

                                                                    echo $bill_total = $total + $ot_total;
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $settings->currency; ?><?php
                                                                    $deposit_total = array();
                                                                    foreach ($deposits as $deposit) {
                                                                        if ($deposit->user == $accountant_ion_user_id) {
                                                                            $deposit_total[] = $deposit->deposited_amount;
                                                                        }
                                                                    }

                                                                    $deposit_total = array_sum($deposit_total);
                                                                    if (empty($deposit_total)) {
                                                                        $deposit_total = 0;
                                                                    }
                                                                    echo $deposit_total;
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $bill_total - $deposit_total; ?>
                                                                </td>
                                                                <td class="no-print">
                                                                    <a class="btn btn-info btn-xs" style="width: 100px;" href="finance/allAccountActivityReport?account=<?php echo $company_id; ?>"><i class="fa fa-info"></i> Details</a>
                                                                </td>
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

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#editable-sample').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

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
                            columns: [1, 2, 3, 4],
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