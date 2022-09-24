<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('financial_report'); ?></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form role="form" class="f_report" action="finance/financialReport" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="btn-group mr-0">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Date Range
                                                        </div>
                                                    </div>
                                                    <input class="form-control flatpickr date_from" readonly name="date_from" placeholder="<?php echo lang('date_from'); ?>" type="text" value="<?php
                                                    if (!empty($date_from)) {
                                                        echo date('m/d/Y', $date_from);
                                                    }
                                                    ?>">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            to
                                                        </div>
                                                    </div>
                                                    <input class="form-control flatpickr date_to" readonly name="date_to" placeholder="<?php echo lang('date_to'); ?>" type="text" value="<?php
                                                    if (!empty($date_to)) {
                                                        echo date('m/d/Y', $date_to);
                                                    }
                                                    ?>">
                                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        if (!empty($payments)) {
                            $paid_number = 0;
                            foreach ($payments as $payment) {
                                $paid_number = $paid_number + 1;
                            }
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <?php echo lang('income'); ?> 
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample1" >
                                                <thead>
                                                    <tr>
                                                        <th class=""><?php echo lang('service').' '.lang('name'); ?></th>
                                                        <th class=""><?php echo lang('quantity'); ?></th>
                                                        <th class=""><?php echo lang('amount'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $category_id_for_report = array();
                                                    foreach ($payment_categories as $cat_name) {
                                                        foreach ($payments as $payment) {
                                                            $categories_in_payment = explode(',', $payment->category_name);
                                                            foreach ($categories_in_payment as $key => $category_in_payment) {
                                                                $category_id = explode('*', $category_in_payment);
                                                                if ($category_id[0] == $cat_name->id) {
                                                                    $category_id_for_report[] = $category_id[0];
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $category_id_for_reports = array_unique($category_id_for_report);
                                                    ?>

                                                    <?php
                                                    foreach ($payment_categories as $category) {
                                                        $category_quantity = array();
                                                        if (in_array($category->id, $category_id_for_reports)) {
                                                            ?>
                                                            <tr class="">
                                                                <td><?php echo $category->category ?></td>
                                                                <td>
                                                                    <?php
                                                                    foreach ($payments as $paymentt) {
                                                                        $category_names_and_amountss = $paymentt->category_name;
                                                                        $category_names_and_amountss = explode(',', $category_names_and_amountss);
                                                                        foreach ($category_names_and_amountss as $category_name_and_amountt) {
                                                                            $category_namee = explode('*', $category_name_and_amountt);
                                                                            if (($category->id == $category_namee[0])) {
                                                                                $category_quantity[] = $category_namee[3];
                                                                            }
                                                                        }
                                                                    }
                                                                    if (!empty($category_quantity)) {
                                                                        echo array_sum($category_quantity);
                                                                    } else {
                                                                        echo '0';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $settings->currency; ?> <?php
                                                                    foreach ($payments as $payment) {
                                                                        $category_names_and_amounts = $payment->category_name;
                                                                        $category_names_and_amounts = explode(',', $category_names_and_amounts);
                                                                        foreach ($category_names_and_amounts as $category_name_and_amount) {
                                                                            $category_name = explode('*', $category_name_and_amount);
                                                                            if (($category->id == $category_name[0])) {
                                                                                $amount_per_category[] = $category_name[1] * $category_name[3];
                                                                            }
                                                                        }
                                                                    }
                                                                    if (!empty($amount_per_category)) {
                                                                        echo number_format(array_sum($amount_per_category),2);
                                                                        $total_payment_by_category[] = array_sum($amount_per_category);
                                                                    } else {
                                                                        echo '0';
                                                                    }

                                                                    $amount_per_category = NULL;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td><h3><?php echo lang('sub_total'); ?> </h3></td>
                                                        <td></td>
                                                        <td>
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($total_payment_by_category)) {
                                                                echo number_format(array_sum($total_payment_by_category),2);
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?> 
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><h5><?php echo lang('total'); ?> <?php echo lang('discount'); ?></h5></td>
                                                        <td></td>
                                                        <td>
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($payments)) {
                                                                foreach ($payments as $payment) {
                                                                    $discount[] = $payment->flat_discount;
                                                                }
                                                                if ($paid_number > 0) {
                                                                    echo number_format(array_sum($discount),2);
                                                                } else {
                                                                    echo '0';
                                                                }
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <!--
                                                    <tr>
                                                        <td><h5><?php echo lang('total'); ?> <?php echo lang('vat'); ?></h5></td>
                                                        <td>
                                                    <?php echo $settings->currency; ?>
                                                    <?php
                                                    if (!empty($payments)) {
                                                        foreach ($payments as $payment) {
                                                            $vat[] = $payment->flat_vat;
                                                        }
                                                        if ($paid_number > 0) {
                                                            echo array_sum($vat);
                                                        } else {
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo '0';
                                                    }
                                                    ?>
                                                        </td>
                                                    </tr>
                                                    -->
                                                    <tr>
                                                        <td><h5><?php echo lang('gross_income'); ?></h5></td>
                                                        <td></td>
                                                        <td>
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($payments)) {
                                                                if ($paid_number > 0) {
                                                                    $gross = array_sum($total_payment_by_category) - array_sum($discount) + array_sum($vat);
                                                                    echo number_format($gross,2);
                                                                } else {
                                                                    echo '0';
                                                                }
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><?php echo lang('total'); ?> <?php echo lang('hospital_amount'); ?></h5></td>
                                                        <td></td>
                                                        <td>
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($payments)) {
                                                                foreach ($payments as $payment) {
                                                                    $hospital_amount[] = $payment->hospital_amount;
                                                                }
                                                                if ($paid_number > 0) {
                                                                    $hospital_amount = array_sum($hospital_amount);
                                                                    echo number_format($hospital_amount,2);
                                                                } else {
                                                                    echo '0';
                                                                }
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><?php echo lang('total'); ?> <?php echo lang('doctors_amount'); ?></h5></td>
                                                        <td></td>
                                                        <td>
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($payments)) {
                                                                foreach ($payments as $payment) {
                                                                    $doctor_amount[] = $payment->doctor_amount;
                                                                }
                                                                if ($paid_number > 0) {
                                                                    $gross_doctor_amount = array_sum($doctor_amount);
                                                                    echo number_format($gross_doctor_amount,2);
                                                                } else {
                                                                    echo '0';
                                                                }
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <?php echo lang('expense'); ?> 
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample1" >
                                                <thead>
                                                    <tr>
                                                        <th> <?php echo lang('expense'); ?> <?php echo lang('name'); ?></th>
                                                        <th> <?php echo lang('amount'); ?></th>
                                                    </tr>
                                                    <tbody>
                                                        <?php foreach ($expense_categories as $category) { ?>
                                                            <tr class=""> 
                                                                <td><?php echo $category->category ?></td>
                                                                <td>
                                                                    <?php echo $settings->currency; ?>
                                                                    <?php
                                                                    foreach ($expenses as $expense) {
                                                                        $category_name = $expense->category;


                                                                        if (($category->category == $category_name)) {
                                                                            $amount_per_category[] = $expense->amount;
                                                                        }
                                                                    }
                                                                    if (!empty($amount_per_category)) {
                                                                        $total_expense_by_category[] = array_sum($amount_per_category);
                                                                        echo number_format(array_sum($amount_per_category),2);
                                                                    } else {
                                                                        echo '0';
                                                                    }

                                                                    $amount_per_category = NULL;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h5 class="text-white"><?php echo lang('gross_bill'); ?></h5>
                                                        <span class="text-white display-6"><i class="fa fa-money fa-1x"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h1 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (empty($gross)) {
                                                                echo $gross = 0;
                                                            } else {
                                                                echo number_format($gross,2);
                                                            }
                                                            $gross_bill = $gross;
                                                            ?>
                                                        </h1>
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
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h5 class="text-white"><?php echo lang('gross_hospital_amount'); ?></h5>
                                                        <span class="text-white display-6"><i class="fa fa-money fa-1x"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h1 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($payments)) {
                                                                if ($paid_number > 0) {
                                                                    $gross = $hospital_amount;
                                                                    echo number_format($gross,2);
                                                                }
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </h1>
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
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h5 class="text-white"><?php echo lang('gross_doctors_commission'); ?></h5>
                                                        <span class="text-white display-6"><i class="fa fa-money fa-1x"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h1 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (empty($gross_doctor_amount)) {
                                                                $gross_doctor_amount = 0;
                                                            }
                                                            if (empty($gross_doctor_amount_ot)) {
                                                                $gross_doctor_amount_ot = 0;
                                                            }

                                                            $doctor_gross = $gross_doctor_amount + $gross_doctor_amount_ot;

                                                            if(empty($doctor_gross)) {
                                                                echo '0';
                                                            } else {
                                                                echo number_format($doctor_gross,2);
                                                            }
                                                            ?>
                                                        </h1>
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
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h5 class="text-white"><?php echo lang('gross_deposit'); ?></h5>
                                                        <span class="text-white display-6"><i class="fa fa-money fa-1x"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h1 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            $deposited_amount = array();
                                                            if (!empty($deposits)) {
                                                                foreach ($deposits as $deposit) {
                                                                    $deposited_amount[] = $deposit->deposited_amount;
                                                                }

                                                                $deposited_amount = array_sum($deposited_amount);

                                                                if ($deposited_amount > 0) {
                                                                    echo number_format($deposited_amount,2);
                                                                } else {
                                                                    echo '0';
                                                                }
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </h1>
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
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h5 class="text-white"><?php echo lang('gross_due'); ?></h5>
                                                        <span class="text-white display-6"><i class="fa fa-money fa-1x"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h1 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            $deposited_amount = array();
                                                            if (!empty($deposits)) {
                                                                foreach ($deposits as $deposit) {
                                                                    if (!empty($deposit->payment_id)) {
                                                                        $deposited_amount[] = $deposit->deposited_amount;
                                                                    }
                                                                }
                                                                if ($paid_number > 0) {
                                                                    $deposited_amount = array_sum($deposited_amount);
                                                                    echo number_format($gross_bill - $deposited_amount,2);
                                                                } else {
                                                                    echo '0';
                                                                }
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </h1>
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
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h5 class="text-white"><?php echo lang('gross_expense'); ?></h5>
                                                        <span class="text-white display-6"><i class="fa fa-money fa-1x"></i></span>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <h1 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            if (!empty($total_expense_by_category)) {
                                                                echo number_format(array_sum($total_expense_by_category),2);
                                                            } else {
                                                                echo '0';
                                                            }
                                                            ?>
                                                        </h1>
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
        <script src="<?php echo base_url('public/assets/js/date.format.js') ?>"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".flatpickr").flatpickr({
                disableMobile: true
            });
        })
    </script>

    </body>
</html> 