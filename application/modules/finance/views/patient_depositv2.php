<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <style type="text/css">
                            .hidden {
                                display: none !important;
                                visibility: hidden !important;
                            }

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

                            @media (max-width: 820px) {
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
                        </style>

                        <div class="page-header d-print-none">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('payment_history');?></h4>
                            </div>
                        </div>
                        <!--End Page header-->
                        <?php if (empty($gateway)) {?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo lang('warning_payment_gateway_not_set');?></div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row mb-5 mt-5 d-print-none" id="actionbuttons">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row page-rightheader ml-auto .d-block">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <div class="flex-grow-1">
                                            <a href="finance/addPaymentView?patient_id=<?php echo $patient->id; ?>" class="btn btn-cyan" target="_blank"><i class="fe fe-plus"></i><span class="button-text"><?php echo lang('invoice'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                        <div class="flex-grow-1">
                                            <a href="finance/addPaymentView?patient_id=<?php echo $patient->id; ?>" class="btn btn-cyan" target="_blank"><i class="fe fe-plus"></i><span class="button-text"><?php echo lang('invoice'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                    <div class="flex-grow-2">
                                        <a href="" class="btn btn-info" target="_blank"><i class="fe fe-eye"></i><span class="button-text"> <?php echo lang('statement_of_account'); ?></span></a>
                                    </div>
                                    <div class="flex-grow-1 mr-3">
                                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                            <a href="" class="btn btn-primary pull-right" data-toggle="modal" onclick="openModal()"><i class="fe fe-plus"></i><span class="button-text">  <?php echo lang('deposit'); ?></span></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row cont">
                            <div class="col-md-12 col-sm-12 col-lg-8" id="first_div">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <?php echo lang('all').' '.lang('patient').' '.lang('invoice'); ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <form role="form" action="finance/patientPaymentHistory?patient=<?php echo $patient->patient_id; ?>" class="f_report" method="post" enctype="multipart/form-data">
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
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered text-nowrap key-buttons w-100 editable-sample1" >
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
                                                                                    <td><?php echo date('y-m-d', $payment->date); ?></td>
                                                                                    <td> <?php echo $payment->invoice_number; ?></td>
                                                                                    <td><?php echo $settings->currency; ?> <?php echo number_format($payment->gross_total, 2); ?></td>
                                                                                    <!-- <td><?php
                                                                                        if (!empty($payment->amount_received)) {
                                                                                            echo $settings->currency;
                                                                                        }
                                                                                        ?> <?php echo $payment->amount_received; ?>
                                                                                    </td> -->
                                                                                    <td>
                                                                                        <?php
                                                                                            echo $settings->currency . ' ' . number_format($total_deposit, 2);
                                                                                        ?>
                                                                                    </td>

                                                                                    <td> <?php echo $settings->currency . ' ' . $total_invoice_balance; ?></td>



                                                                                    <td  class="no-print"> 
                                                                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                                                                            <a class="btn btn-info" title="<?php echo lang('edit'); ?>" href="finance/editPayment?id=<?php echo $payment->id; ?>"><i class="fa fa-edit"> </i></a>
                                                                                        <?php } ?>
                                                                                        <a class="btn btn-info" title="<?php echo lang('invoice'); ?>" href="finance/invoice?id=<?php echo $payment->invoice_number; ?>"><i class="fa fa-file"></i> </a>
                                                                                        <!-- <button class="btn btn-info"><i class="fa fa-eye"></i></button> -->
                                                                                        <button type="button" class="btn btn-info deposit-list" data-invoice="<?php echo $payment->id; ?>" title="<?php echo lang('deposits'); ?>"><i class="fa fa-eye"></i> <?php echo lang('deposits') ?></button>
                                                                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?> 
                                                                                            <a class="btn btn-danger delete_button" title="<?php echo lang('delete'); ?>" href="finance/delete?id=<?php echo $payment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                                        <?php } ?>
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
                                                                                        <td><?php echo date('y-m-d', $deposit->date); ?></td>
                                                                                        <td><?php echo $deposit->payment_id; ?></td>
                                                                                        <td></td>
                                                                                        <td><?php echo $settings->currency; ?> <?php echo $deposit->deposited_amount; ?></td>
                                                                                        <td> <?php echo $deposit->deposit_type; ?></td>  
                                                                                        <td  class="no-print"> 
                                                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                                                                                <button type="button" class="btn btn-sm btn-info editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $deposit->id; ?>"><i class="fa fa-edit"></i> </button> 
                                                                                            <?php } ?>
                                                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?> 
                                                                                                <a class="btn btn-danger" title="<?php echo lang('delete'); ?>" href="finance/deleteDeposit?id=<?php echo $deposit->id; ?>&patient=<?php echo $patient->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                                                                            <?php } ?>
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

                            <div class="col-md-12 col-sm-12 col-lg-4">
                                <div class="row" id="second_div">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card box-widget widget-user">
                                            <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar" style="width: 150px; height: 150px;" width="auto" height="auto" class="rounded-circle p-1" src="<?php echo $patient->img_url ?>"></div>
                                            <div class="card-body text-center">
                                                <div class="pro-user">
                                                    <h4 class="pro-user-username text-dark mb-1 font-weight-bold"><?php echo $patient->name; ?></h4>
                                                    <h6 class="pro-user-desc text-muted">ID : <?php echo $patient->patient_id; ?></h6>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="main-profile-contact-list d-lg-flex">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="media mr-4">
                                                                <div class="media-icon bg-info text-white mr-3 mt-1">
                                                                    <i class="fa fa-map"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <small class="text-muted">Address</small>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $patient->address; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="media mr-4">
                                                                <div class="media-icon bg-info text-white mr-3 mt-1">
                                                                    <i class="fe fe-mail"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <small class="text-muted">Email</small>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $patient->email; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="media">
                                                                <div class="media-icon bg-info text-white mr-3 mt-1">
                                                                    <i class="fa fa-phone"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <small class="text-muted">Phone</small>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $patient->phone; ?>
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

                        <div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_deposit'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="finance/deposit" id="deposit-form" class="clearfix" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('invoice') ?></label>
                                                        <select class="form-control" name="payment_id" id="invoiceSelect">
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
                                                        <label class="form-label"><?php echo lang('deposit_amount'); ?></label>
                                                        <input type="number" name="deposited_amount" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('deposit_type'); ?></label>
                                                        <select class="form-control select2-show-search" id="selecttype" name="deposit_type" value=''> 
                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) { ?>
                                                                <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                                                <option value="Card"> <?php echo lang('card'); ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php
                                                    $payment_gateway = $settings->payment_gateway;
                                                ?>
                                            </div>
                                            <div class="card-payment">
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="form-label"><?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                                                        <img src="uploads/card.png" width="100%">
                                                    </div>
                                                </div>
                                                <?php if ($payment_gateway == 'PayPal') { ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
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
                                                        <label class="form-label"> <?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                                        <input type="text"  id="cardholder" class="form-control" name="cardholder" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack') { ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                                            <input type="text" class="form-control" id="card" name="card_number" value='' placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                                            <input type="text" class="form-control" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value=''>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('cvv'); ?> </label>
                                                            <input type="text" class="form-control" id="cvv" maxlength="3" name="cvv_number" value='' placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            
                                            <input type="hidden" name="id" value=''>
                                            <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                                            <div class="form-group cashsubmit right-six col-md-12">
                                                <button type="submit" name="submit2" id="submit1" class="btn btn-primary row pull-right"> <?php echo lang('submit'); ?></button>
                                            </div>
                                            <div class="form-group cardsubmit  right-six col-md-12 hidden">
                                                <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary row pull-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                    ?>onClick="stripePay(event);"<?php }
                                                ?>> <?php echo lang('submit'); ?></button>
                                            </div>
                                        </form>
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
    <!-- INTERNAL JS INDEX END -->

        <script type="text/javascript">
            $(document).ready(function () {
                $('.editable-sample1').DataTable({
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
            // $(document).ready(function () {
            //     $(".table").on("click", ".deposit-list", function () {
            //         var invoice = $(this).data('invoice');
            //         console.log("invoice: "+invoice);
            //         $(".deposit-row").remove();
            //         $.ajax({
            //             url: 'finance/getDepositsByInvoiceIdByJason?invoice_id='+invoice,
            //             method: 'GET',
            //             data: '',
            //             dataType: 'json',
            //             success: function (response) {
            //                 var deposit = response.deposit;
            //                 console.log(response.deposit);

            //                 $.each(deposit, function (key, value) {
            //                     var date = new Date(value.date*1000);
            //                     console.log(key);
            //                     if (invoice == value.payment_id) {
            //                         $(".deposit-table").append(
            //                             '<tr class="deposit-row">\n\
            //                                 <td>'+dateFormat(date, "yyyy/mm/dd")+'</td>\n\
            //                                 <td>'+value.payment_id+'</td>\n\
            //                                 <td>'+value.receipt_number+'</td>\n\
            //                                 <td>'+value.deposited_amount+'</td>\n\
            //                                 <td>'+value.status+'</td>\n\
            //                                 <td><button type="button" class="btn btn-info deposit-list"><i class="fa fa-eye"></i></button></td>\n\
            //                             </tr>\n\
            //                             ');
            //                     }
            //                 });
            //             }
            //         });
            //     });
            // });
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

        <script type="text/javascript">
            $(document).ready(function () {
                $("#invoiceSelect").select2({
                    placeholder: '<?php echo lang('select_encounter_type'); ?>',
                    allowClear: true,
                });
            });
        </script>

        <script type="text/javascript">
            function openModal() {
                $('#deposit-form').trigger("reset");
                $('#deposit-form').find('[id="payment_id1"]').select2("val", "");
                // $("#select2_example").empty();
                $('#deposit').find('[class="modal-title"]').html("<?php echo lang('add_deposit'); ?>")
                $('#deposit').modal('show');
            }
        </script>

        <script>
            $(document).ready(function () {
                $('.card-payment').hide();
                $("#selecttype").change(function () {
                    // $(document.body).on('change', '#selecttype', function () {

                    var v = $(this).val()
                    if (v == 'Card') {
                        $('.card-payment').show();
                        $('.cardsubmit').removeClass('hidden');
                        $('.cashsubmit').addClass('hidden');
                    } else {
                        $('.card-payment').hide();
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
            Stripe.setPublishableKey("<?php if(!empty($gateway)) { echo $gateway->publish; } else { echo 'publish_key'; } ?>");

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
                    //  console.log(token);
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

        <script>


            $('#download').click(function () {
                var pdf = new jsPDF('p', 'pt', 'letter');
                pdf.addHTML($('#invoice'), function () {
                    pdf.save('invoice.pdf');
                });
            });

            // This code is collected but useful, click below to jsfiddle link.
        </script>

    </body>
</html>    