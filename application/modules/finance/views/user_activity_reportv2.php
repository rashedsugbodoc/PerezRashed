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
                                    <?php echo lang('activities_by'); ?> <strong style="color: #009988; text-transform: capitalize;" ><?php echo $user->name; ?></strong>
                                    ( <?php
                                    if (!empty($date_from)) {
                                        echo lang('from') . ' ' . date('m/d/Y', $date_from) . ' ';
                                    }

                                    if (!empty($date_to)) {
                                        echo lang('to') . ' ' . date('m/d/Y', $date_to);
                                    }

                                    if (!empty($day)) {
                                        echo $day;
                                    }
                                    ?> )
                                </h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('all_bills'); ?>
                                        </div>
                                    </div>
                                    <?php if ($this->ion_auth->in_group(array('admin')) || $this->ion_auth->get_user_id() == '341') { ?>
                                    <div class="card-body">
                                        <a href="finance/allUserActivityReport?user=<?php echo $user->ion_user_id; ?>">
                                            <div class="btn-group">
                                                <button id="" class="btn <?php
                                                if (!empty($day)) {
                                                    if ($day == 'Today') {
                                                        echo 'green';
                                                    }
                                                }
                                                ?>">
                                                    <i class="fa fa-search"></i> <?php echo lang('today'); ?>
                                                </button>
                                            </div>
                                        </a>
                                        <a href="finance/allUserActivityReport?user=<?php echo $user->ion_user_id; ?>&yesterday='all'">
                                            <div class="btn-group">
                                                <button id="" class="btn <?php
                                                if (!empty($day)) {
                                                    if ($day == 'Yesterday') {
                                                        echo 'green';
                                                    }
                                                }
                                                ?>">
                                                    <i class="fa fa-search"></i> <?php echo lang('yesterday'); ?>
                                                </button>
                                            </div>
                                        </a>

                                        <a href="finance/allUserActivityReport?user=<?php echo $user->ion_user_id; ?>&all='all'">
                                            <div class="btn-group">
                                                <button id="" class="btn <?php
                                                if (!empty($day)) {
                                                    if ($day == 'All') {
                                                        echo 'green';
                                                    }
                                                }
                                                ?>">
                                                    <i class="fa fa-search"></i> <?php echo lang('all'); ?>
                                                </button>
                                            </div>
                                        </a>
                                    </div>
                                    <?php } ?>

                                    <?php if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                                    <div class="card-body">
                                        <a href="finance/UserActivityReport?user=<?php echo $user->ion_user_id; ?>">
                                            <div class="btn-group">
                                                <button id="" class="btn <?php
                                                if (!empty($day)) {
                                                    if ($day == 'Today') {
                                                        echo 'green';
                                                    }
                                                }
                                                ?>">
                                                    <i class="fa fa-search"></i><?php echo lang('today');?>
                                                </button>
                                            </div>
                                        </a>
                                        <a href="finance/UserActivityReport?user=<?php echo $user->ion_user_id; ?>&yesterday='all'">
                                            <div class="btn-group">
                                                <button id="" class="btn <?php
                                                if (!empty($day)) {
                                                    if ($day == 'Yesterday') {
                                                        echo 'green';
                                                    }
                                                }
                                                ?>">
                                                    <i class="fa fa-search"></i> Yesterday
                                                </button>
                                            </div>
                                        </a>

                                        <a href="finance/UserActivityReport?user=<?php echo $user->ion_user_id; ?>&all='all'">
                                            <div class="btn-group">
                                                <button id="" class="btn <?php
                                                if (!empty($day)) {
                                                    if ($day == 'All') {
                                                        echo 'green';
                                                    }
                                                }
                                                ?>">
                                                    <i class="fa fa-search"></i> <?php echo lang('all'); ?>
                                                </button>
                                            </div>
                                        </a>
                                    </div>
                                    <?php } ?>

                                    <?php if ($this->ion_auth->in_group(array('Accountant', 'Receptionist', 'Doctor'))) { ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form role="form" class="f_report" action="finance/userActivityReportDateWise" method="post" enctype="multipart/form-data">
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
                                                            <input type="hidden" class="form-control dpd2" name="user" value="<?php echo $user->ion_user_id; ?>">
                                                            <button class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <?php if ($this->ion_auth->in_group(array('admin')) || $this->ion_auth->get_user_id() == '341') { ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form role="form" action="finance/doctorsCommission" class="clearfix" method="post" enctype="multipart/form-data">
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
                                                            <button class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                            <thead>
                                                                <tr>
                                                                    <th class=""><?php echo lang('date'); ?></th>
                                                                    <th class=""><?php echo lang('invoice'); ?> #</th>
                                                                    <th class=""><?php echo lang('bill_amount'); ?></th>
                                                                    <th class=""><?php echo lang('deposit'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $dates = array();
                                                                $datess = array();
                                                                foreach ($payments as $payment) {
                                                                    $dates[] = $payment->date;
                                                                }
                                                                foreach ($deposits as $deposit) {
                                                                    $datess[] = $deposit->date;
                                                                }
                                                                $dat = array_merge($dates, $datess);
                                                                $dattt = array_unique($dat);
                                                                asort($dattt);

                                                                $total_payment = array();

                                                                $total_deposit = array();
                                                                ?>

                                                                <?php
                                                                foreach ($dattt as $key => $value) {
                                                                    foreach ($payments as $payment) {
                                                                        if ($payment->date == $value) {
                                                                            $total_payment[] = $payment->gross_total;
                                                                            ?>
                                                                            <tr class="">
                                                                                <td><?php echo date('d/m/y', $payment->date); ?></td>
                                                                                <td> <?php echo $payment->id; ?></td>
                                                                                <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>
                                                                                <td><?php
                                                                                    if (!empty($payment->amount_received)) {
                                                                                        echo $settings->currency;
                                                                                    }
                                                                                    ?> <?php echo $payment->amount_received; ?></td>

                                                                            </tr>

                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    foreach ($deposits as $deposit) {
                                                                        if ($deposit->date == $value) {
                                                                            $total_deposit[] = $deposit->deposited_amount;
                                                                            if (!empty($deposit->deposited_amount) && empty($deposit->amount_received_id)) {
                                                                                ?>

                                                                                <tr class="">
                                                                                    <td><?php echo date('d-m-y', $deposit->date); ?></td>
                                                                                    <td><?php echo $deposit->payment_id; ?></td>
                                                                                    <td></td>
                                                                                    <td><?php echo $settings->currency; ?> <?php echo $deposit->deposited_amount; ?></td>

                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                <?php } ?>

                                                                <?php
                                                                if (!empty($total_payment)) {
                                                                    $total_p = array_sum($total_payment);
                                                                } else {
                                                                    $total_p = 0;
                                                                }

                                                                if (!empty($total_deposit)) {
                                                                    $total_d = array_sum($total_deposit);
                                                                } else {
                                                                    $total_d = 0;
                                                                }
                                                                ?>
                                                                <tr class="total">
                                                                    <td></td>
                                                                    <td> <strong> <?php echo lang('total'); ?> </strong></td>
                                                                    <td> <strong> <?php echo $settings->currency; ?> <?php echo $total_p; ?> </strong></td>
                                                                    <td> <strong> <?php echo $settings->currency; ?> <?php echo $total_d; ?> </strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                $total_bill = array();
                                                foreach ($payments as $payment) {
                                                    $total_bill[] = $payment->gross_total;
                                                }
                                                if (!empty($total_bill)) {
                                                    $total_bill = array_sum($total_bill);
                                                } else {
                                                    $total_bill = 0;
                                                }
                                                ?>
                                                <?php
                                                $total_bill_ot = array();
                                                if (!empty($total_bill_ot)) {
                                                    $total_bill_ot = array_sum($total_bill_ot);
                                                } else {
                                                    $total_bill_ot = 0;
                                                }
                                                ?>
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
                                                        <p class="text-white mb-1"><?php echo lang('total_bill_amount'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="text-white m-0 font-weight-bold text-right">
                                                            <?php echo $settings->currency; ?>
                                                            <?php echo $total_payable_bill = $total_bill + $total_bill_ot; ?>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <p class="text-white mb-1"><?php echo lang('total_deposit_amount'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="text-white m-0 font-weight-bold text-right">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            $total_deposit = array();
                                                            foreach ($deposits as $deposit) {
                                                                $total_deposit[] = $deposit->deposited_amount;
                                                            }
                                                            echo array_sum($total_deposit);
                                                            ?>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <p class="text-white mb-1"><?php echo lang('due_amount'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="text-white m-0 font-weight-bold text-right">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            echo $total_payable_bill - array_sum($total_deposit);
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