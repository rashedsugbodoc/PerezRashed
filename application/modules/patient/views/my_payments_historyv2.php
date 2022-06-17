<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <style>
                            @media screen and (max-width: 1000px) {
                                .button-text {
                                    display: none;
                                }
                            }

                            @media (max-width: 275px) {
                             .pull-right {
                                float: left;
                              }
                            }

                            @media (max-width: 213px) {
                             .pull-center {
                                float: left;
                              }
                            }

                            @media (min-width: 214px) {
                             .pull-center {
                                float: center;
                              }
                            }

                            #content{
                                color: black;
                            }

                            .td{
                                color: black;
                            }

                            @media print {
                              body * {
                                visibility: hidden;
                              }
                              #section-to-print, #section-to-print * {
                                visibility: visible;
                              }
                              #section-to-print {
                                position: absolute;
                                left: 0;
                                top: 0;
                                /*width: 100% !important;
                                height: 100% !important;*/
                              }

                            }

                            @media (max-width: 766px) {
                              .cont {
                                display: -webkit-box;
                                display: -moz-box;
                                display: -ms-flexbox;
                                display: -webkit-flex;
                                display: flex;
                                -webkit-box-orient: vertical;
                                -moz-box-orient: vertical;
                                -webkit-flex-direction: column;
                                -ms-flex-direction: column;
                                flex-direction: column;
                                /* optional */
                                -webkit-box-align: start;
                                -moz-box-align: start;
                                -ms-flex-align: start;
                                -webkit-align-items: flex-start;
                                align-items: flex-start;
                              }

                              .cont #first_div {
                                -webkit-box-ordinal-group: 2;
                                -moz-box-ordinal-group: 2;
                                -ms-flex-order: 2;
                                -webkit-order: 2;
                                order: 2;
                              }

                              .cont div #second_div {
                                -webkit-box-ordinal-group: 1;
                                -moz-box-ordinal-group: 1;
                                -ms-flex-order: 1;
                                -webkit-order: 1;
                                order: 1;
                              }
                            }

                            /* @media (min-width: 768px) {
                             .new-pull-left {
                                float: right;
                              }
                            }*/
                        </style>
                        
                        <div class="row cont mt-5">
                            <div class="col-lg-8 col-md-12 col-sm-12" id="first_div">
                                <div class="row d-print-none">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="page-header mt-0">
                                                            <div class="page-leftheader">
                                                                <h4 class="page-title"><?php echo lang('bills_and_payments'); ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="btn-group mr-5">
                                                            <a class="btn btn-primary" data-toggle="modal" href="#myModal"><i class="fa fa-money"></i><span class="button-text"> <?php echo lang('make'); ?> <?php echo lang('payment'); ?></span></a>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a href="#" class="btn btn-primary" data-target="#invoice" data-toggle="modal"><i class="fa fa-file"></i><span class="button-text"> <?php echo lang('invoice'); ?></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <?php echo lang('all_bills'); ?> & <?php echo lang('deposits'); ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form role="form" class="f_report" action="patient/myPaymentHistory?patient=<?php echo $patient->patient_id; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label><strong><?php echo lang('select'); ?> <?php echo lang('dates'); ?></strong></label>
                                                                <div class="btn-group mr-0">
                                                                    <input class="form-control flatpickr form-control" readonly name="date_from" placeholder="From Date" type="text" value="<?php
                                                                    if (!empty($date_from)) {
                                                                        echo date('m/d/Y', $date_from);
                                                                    }
                                                                    ?>">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <?php echo lang('to'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <input class="form-control flatpickr form-control" readonly name="date_to" placeholder="To Date" type="text" value="<?php
                                                                    if (!empty($date_to)) {
                                                                        echo date('m/d/Y', $date_to);
                                                                    }
                                                                    ?>">
                                                                    <input type="hidden" class="form-control dpd2" name="patient" value="<?php echo $patient->id; ?>">
                                                                    <button class="btn btn-primary" type="submit" name="submit"><?php echo lang('filter'); ?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="row mt-5">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered text-nowrap" id="editable-samples">
                                                                <thead>
                                                                    <tr>
                                                                        <th class=""><?php echo lang('date'); ?></th>
                                                                        <th class=""><?php echo lang('bill'); ?> #</th>
                                                                        <th class=""><?php echo lang('bill_amount'); ?></th>
                                                                        <th class=""><?php echo lang('total_payments'); ?></th>
                                                                        <th class=""><?php echo lang('balance'); ?></th>
                                                                        <th class="no-print"><?php echo lang('options'); ?></th>
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

                                                                    $total_pur = array();

                                                                    $total_p = array();
                                                                    ?>

                                                                    <?php
                                                                    foreach ($dattt as $key => $value) {
                                                                        foreach ($payments as $payment) {
                                                                            if ($payment->date == $value) {
                                                                                $total_deposit = $this->finance_model->getDepositAmountByPaymentId($payment->id);
                                                                                $total_invoice_balance = number_format($payment->gross_total - $total_deposit, 2);
                                                                                ?>
                                                                                <tr class="">
                                                                                    <td><?php echo date('Y-m-d', $payment->date); ?></td>
                                                                                    <td> <?php echo $payment->invoice_number; ?></td>
                                                                                    <td><?php echo $settings->currency; ?> <?php echo number_format($payment->gross_total, 2); ?></td>
                                                                                    <td>
                                                                                        <?php
                                                                                            echo $settings->currency . ' ' . number_format($total_deposit, 2);
                                                                                        ?>
                                                                                    </td>

                                                                                    <td> <?php echo $settings->currency . ' ' . $total_invoice_balance; ?></td>

                                                                                    <td  class="no-print"> 
                                                                                        <a class="btn btn-xs btn-info" title="<?php echo lang('invoice'); ?>" href="patient/myInvoice?id=<?php echo $payment->id; ?>"><i class="fa fa-file"></i> </a>
                                                                                        <button type="button" class="btn btn-info deposit-list" data-invoice="<?php echo $payment->id; ?>" title="<?php echo lang('deposits'); ?>"><i class="fa fa-eye"></i> <?php echo lang('deposits') ?></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <?php
                                                                        foreach ($deposits as $deposit) {
                                                                            if ($deposit->date == $value) {
                                                                                if (!empty($deposit->deposited_amount) && empty($deposit->amount_received_id)) {
                                                                                    ?>

                                                                                    <tr class="">
                                                                                        <td><?php echo date('Y-m-d', $deposit->date); ?></td>
                                                                                        <td><?php echo $deposit->payment_id; ?></td>
                                                                                        <td></td>
                                                                                        <td><?php echo $settings->currency; ?> <?php echo $deposit->deposited_amount; ?></td>
                                                                                        <td> <?php echo $deposit->deposit_type; ?></td>  
                                                                                        <td  class="no-print"> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> -->
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

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('all').' '.lang('deposits') ?>
                                        </div>
                                        <div class="card-title">
                                            
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample2">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo lang('date') ?></th>
                                                        <th><?php echo lang('bill') ?> #</th>
                                                        <th><?php echo lang('receipt') ?></th>
                                                        <th><?php echo lang('payment') ?></th>
                                                        <th><?php echo lang('status') ?></th>
                                                        <th><?php echo lang('action') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="deposit-table">
                                                    <?php
                                                        if (!empty($payments)) {
                                                            foreach ($payments as $payment) {
                                                                $deposits_by_date = $this->finance_model->getDepositByPaymentId($payment->id);
                                                                foreach ($deposits_by_date as $deposit_by_date) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo date('y-m-d', $deposit_by_date->date); ?></td>
                                                                        <td><?php echo $this->finance_model->getPaymentById($deposit_by_date->payment_id)->invoice_number; ?></td>
                                                                        <td><?php echo $deposit_by_date->receipt_number; ?></td>
                                                                        <td><?php echo $deposit_by_date->deposited_amount; ?></td>
                                                                        <td><?php echo $deposit_by_date->status; ?></td>
                                                                        <td><button type="button" class="btn btn-info deposit-list"><i class="fa fa-eye"></i></button></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="row" id="second_div">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card box-widget widget-user">
                                            <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar" style="width: 150px; height: 150px;" width="auto" height="auto" class="rounded-circle" src="<?php echo $patient->img_url ?>"></div>
                                            <div class="card-body text-center">
                                                <div class="pro-user">
                                                    <h4 class="pro-user-username text-dark mb-1 font-weight-bold"><?php echo $patient->name; ?></h4>
                                                    <h6 class="pro-user-desc text-muted">ID : <?php echo $patient->patient_id; ?></h6>
                                                    <h6 class="pro-user-desc text-muted"><i class="fe fe-mail text-info"></i> <?php echo $patient->email; ?></h6>
                                                    <h6 class="pro-user-desc text-muted"><i class="fe fe-phone text-info"></i> <?php echo $patient->phone; ?></h6>
                                                </div>
                                            </div>
                                            <div class="card-body border-top pt-0">
                                                <div class="main-profile-contact-list d-lg-flex">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="media mr-4">
                                                                <div class="media-icon bg-info text-white mr-3 mt-1">
                                                                    <i class="fa fa-map"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <small class="text-muted"><?php echo lang('address'); ?></small>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $patient->address; ?>
                                                                    </div>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $patientBarangay->name; ?>, <?php echo $patientCity->name; ?>
                                                                    </div>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $patientState->name; ?>, <?php echo $patientCountry->name; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- main-profile-contact-list -->
                                                <!-- <div class="main-profile-contact-list d-lg-flex">
                                                    <div class="row">
                                                        
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
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
                                                            <?php echo $total_payable_bill = $total_bill; ?>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
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
                                    <div class="col-md-12 col-sm-12">
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


                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_deposit'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="patient/deposit" id="deposit-form" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('invoice'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="payment_id" data-placeholder="Select ....">
                                                            <option value="">Select .....</option>
                                                            <?php foreach ($payments as $payment) { ?>
                                                                <option value="<?php echo $payment->id; ?>" <?php
                                                                if (!empty($deposit->payment_id)) {
                                                                    if ($deposit->payment_id == $payment->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $payment->id; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('deposit_amount'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="deposited_amount" id="" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('deposit_type'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search selecttype" name="deposit_type" id="selecttype" data-placeholder="Select ....">
                                                            <option label="Select ....">
                                                            </option>
                                                            <option value="Card"><?php echo lang('card'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Accepted Cards <span class="text-red">*</span></label>
                                                        <img src="uploads/card.png" width="100%">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $payment_gateway = $settings->payment_gateway;
                                            ?>
                                            <?php
                                            if ($payment_gateway == 'PayPal') { ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('card'); ?> <?php echo lang('card'); ?> <?php echo lang('type'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="card_type" value=''>
                                                            <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>   
                                                            <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                                            <option value="American Express" > <?php echo lang('american_express'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('cardholder'); ?> <?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="cardholder" id="cardholder" value='' placeholder="Expiry (MM/YY)">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if ($payment_gateway != 'Pay U Money'&& $payment_gateway != 'Paystack') { ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('card'); ?> <?php echo lang('number'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="card_number" id="card">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('expire'); ?> <?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="expire_date" id="expire" placeholder="Expiry (MM/YY)">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('cvv'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="cvv_number" id="cvv">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary pull-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                            ?>onClick="stripePay(event);"<?php }
                                                        ?>><?php echo lang('submit'); ?></button>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <!-- INTERNAL JS INDEX START -->
        <!--Moment js-->
        <!-- Jquery js-->
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

        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar.js'); ?>"></script>

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
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".editbutton").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#editDepositform').trigger("reset");
                $.ajax({
                    url: 'finance/editDepositbyJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        if (response.deposit.deposit_type != 'Card') {
                            $('#editDepositform').find('[name="id"]').val(response.deposit.id).end()
                            $('#editDepositform').find('[name="patient"]').val(response.deposit.patient).end()
                            $('#editDepositform').find('[name="payment_id"]').val(response.deposit.payment_id).end()
                            $('#editDepositform').find('[name="date"]').val(response.deposit.date).end()
                            $('#editDepositform').find('[name="deposited_amount"]').val(response.deposit.deposited_amount).end()

                            $('#myModal2').modal('show');

                        } else {
                            alert('Payement Processed By Card can not be edited. Thanks.')
                        }
                    }
                });
            });
        });
    </script>



    <script>
        $(document).ready(function () {
            //   $('.card').hide();
            $(document.body).on('change', '#selecttype', function () {

                var v = $("select.selecttype option:selected").val()
                if (v == 'Card') {
                    $('.card').show();
                    $('.cardsubmit').removeClass('hidden');
                    $('.cashsubmit').addClass('hidden');
                } else {
                    $('.card').hide();
                    $('.cashsubmit').removeClass('hidden');
                    $('.cardsubmit').addClass('hidden');
                }
            });

        });


    </script>

    <script>
        function cardValidation() {
            var valid = true;
            var cardNumber = $('#card').val();
            var expire = $('#expire').val();
            var cvc = $('#cvv').val();
     
            $("#error-message").html("").hide();

            if (cardNumber.trim() == "") {
                valid = false;
            }

            if (expire.trim() == "") {
                valid = false;
            }
            if (cvc.trim() == "") {
                valid = false;
            }

            if (valid == false) {
                $("#error-message").html("All Fields are required").show();
            }

            return valid;
        }
    //set your publishable key
    <?php if (!empty($gateway)) { ?>
        Stripe.setPublishableKey("<?php echo $gateway->publish; ?>");
    <?php } ?>

    //callback to handle the response from stripe
        function stripeResponseHandler(status, response) {
            if (response.error) {
                //enable the submit button
                $("#submit-btn").show();
                $("#loader").css("display", "none");
                //display the errors on the form
                $("#error-message").html(response.error.message).show();
            } else {
                //get token id
                var token = response['id'];
                //insert the token into the form
                $('#token').val(token);
                $("#deposit-form").append("<input type='hidden' name='token' value='" + token + "' />");
                console.log(token);
                //submit form to the server
                $("#deposit-form").submit();
            }
        }

        function stripePay(e) {
            e.preventDefault();
            var valid = cardValidation();

            if (valid == true) {
                $("#submit-btn").attr("disabled", true);
                $("#loader").css("display", "inline-block");
                var expire = $('#expire').val()
                var arr = expire.split('/');
                Stripe.createToken({
                    number: $('#card').val(),
                    cvc: $('#cvv').val(),
                    exp_month: arr[0],
                    exp_year: arr[1]
                }, stripeResponseHandler);

                //submit from callback
                return false;
            }
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.editable-sample2').DataTable({
                "bDestroy": true,
                responsive: true,
                dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: -1,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }


            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".deposit-list", function() {
                $('.deposit-table').find('tr').remove();

                var invoice = $(this).data('invoice');
                var str = $(".deposit-table").html();
                $('.editable-sample2').DataTable({
                    "bDestroy": true,
                    responsive: true,
                    "ajax": {
                        url: "finance/getDeposit?invoice_id="+invoice,
                        type: 'GET',
                    },
                    scroller: {
                        loadingIndicator: true
                    },
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    aLengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    iDisplayLength: -1,
                    "order": [[0, "desc"]],
                    "language": {
                        "lengthMenu": "_MENU_",
                    }
                    

                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var datefrom = "<?php echo date('F j, Y h:i A' , $date_from.' UTC') ?>";
            var dateto = "<?php echo date('F j, Y h:i A' , $date_to.' UTC') ?>";
            console.log(datefrom);
            if (datefrom == "") {
                $(".flatpickr").flatpickr({
                    maxDate: "today",
                    altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d",
                    disableMobile: true
                });
            } else {
                $(".date_from").flatpickr({
                    dateFormat: "F j, Y",
                    defaultDate: datefrom,
                    disableMobile: true
                });
                $(".date_to").flatpickr({
                    dateFormat: "F j, Y",
                    defaultDate: dateto,
                    disableMobile: true
                });
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-samples').DataTable({
                responsive: true,

                dom: "<'row'<'col-sm-2'l><'col-sm-6 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
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

    </body>
</html> 