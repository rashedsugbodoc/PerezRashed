<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <style type="text/css">
                            .remove1 {
                                display: inline !important;
                            }

                            .remove {
                                position: absolute !important;
                                right: 0px !important;
                            }
                        </style>

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">
                                    <?php
                                    if (!empty($payment->id))
                                        echo lang('edit_invoice');
                                    else
                                        echo lang('add_new_invoice');
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <!--End Page header-->

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <form role="form" id="editPaymentForm" action="finance/addPayment" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <?php
                                                if (!empty($payment->id))
                                                    echo lang('edit_items');
                                                else
                                                    echo lang('add_remove_items');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php echo validation_errors(); ?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                        <select class="form-control select2-show-search" name="encounter" id="encounter">
                                                            <?php if (!empty($encounter->id)) { ?>
                                                                <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encouter_type->display_name . ' - ' . $encounter->created_at; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('patient'); ?></label>
                                                                <select class="select2-show-search form-control pos_select" id="pos_select" name="patient" placeholder="Search Patient">
                                                                    <option selected disabled hidden>Search Patient</option>
                                                                    <option value="add_new"><?php echo lang('add_new') ?></option>
                                                                    <?php foreach ($patients as $patient) { ?>
                                                                        <?php if (!empty($payment)) { ?>
                                                                            <option value="<?php echo $patient->id ?>" selected="selected"><?php echo $patient->name ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $patient->id ?>"><?php echo $patient->name ?></option>
                                                                        <?php } ?>
                                                                        <?php if (!empty($encounter->id)) { ?>
                                                                            <option value="<?php echo $patientt->id; ?>" selected><?php echo $patientt->name ?></option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="pos_client">
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                                        <input type="text" class="form-control" name="p_name" value='<?php
                                                                        if (!empty($payment->p_name)) {
                                                                            echo $payment->p_name;
                                                                        }
                                                                        ?>' placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                                        <input type="text" class="form-control" name="p_email" value='<?php
                                                                        if (!empty($payment->p_email)) {
                                                                            echo $payment->p_email;
                                                                        }
                                                                        ?>' placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                                        <input type="text" class="form-control" name="p_phone" value='<?php
                                                                        if (!empty($payment->p_phone)) {
                                                                            echo $payment->p_phone;
                                                                        }
                                                                        ?>' placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                                        <input type="text" class="form-control" name="p_age" value='<?php
                                                                        if (!empty($payment->p_age)) {
                                                                            echo $payment->p_age;
                                                                        }
                                                                        ?>' placeholder="">
                                                                    </div> 
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                                                        <select class="form-control m-bot15" name="p_gender" value=''>
                                                                            <option value="Male" <?php
                                                                            if (!empty($patient->sex)) {
                                                                                if ($patient->sex == 'Male') {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?> > Male </option>   
                                                                            <option value="Female" <?php
                                                                            if (!empty($patient->sex)) {
                                                                                if ($patient->sex == 'Female') {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?> > Female </option>
                                                                            <option value="Others" <?php
                                                                            if (!empty($patient->sex)) {
                                                                                if ($patient->sex == 'Others') {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?> > Others </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering_doctor'); ?></label>
                                                                <select class="select2-show-search form-control add_doctor" id="add_doctor" name="doctor" placeholder="Search Doctor">
                                                                    <option selected disabled>Search Doctor</option>
                                                                    <option value="add_new"><?php echo lang('add_new') ?></option>
                                                                    <?php foreach ($staffs as $staff) { ?>
                                                                        <?php if (!empty($payment)) { ?>
                                                                            <option value="<?php echo $staff->user_id ?>" selected="selected"><?php echo $staff->username ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $staff->user_id ?>"><?php echo $staff->username ?></option>
                                                                        <?php } ?>
                                                                        <?php if (!empty($encounter->id)) { ?>
                                                                            <option value="<?php echo $doctorr->id; ?>" selected><?php echo $doctorr->name ?></option>
                                                                        <?php } ?>
                                                                    <?php }?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="pos_doctor">
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('name'); ?></label>
                                                                        <input type="text" class="form-control" name="d_name" value='<?php
                                                                        if (!empty($payment->p_name)) {
                                                                            echo $payment->p_name;
                                                                        }
                                                                        ?>' placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('email'); ?></label>
                                                                        <input type="text" class="form-control" name="d_email" value='<?php
                                                                        if (!empty($payment->p_email)) {
                                                                            echo $payment->p_email;
                                                                        }
                                                                        ?>' placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group"> 
                                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('phone'); ?></label>
                                                                        <input type="text" class="form-control" name="d_phone" value='<?php
                                                                        if (!empty($payment->p_phone)) {
                                                                            echo $payment->p_phone;
                                                                        }
                                                                        ?>' placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('payer_account'); ?></label>
                                                        <select class="select2-show-search form-control add_payer" id="company" name="company_id" value=''>
                                                            <?php if (!empty($payment)) { ?>
                                                                <option value="<?php echo $company->id; ?>" selected="selected"><?php echo format_number_with_digits($company->id, COMPANY_ID_LENGTH). ' - '. $company->display_name; ?></option>  
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('select'); ?></label>
                                                        <select name="category_name[]" class="multi-selection" multiple="" id="my_multi_select3">
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option class="ooppttiioonn" data-id="<?php echo $category->c_price; ?>" data-idd="<?php echo $category->id; ?>" data-cat_name="<?php echo $category->category; ?>" value="<?php echo $category->category; ?>" 
                                                                        <?php
                                                                        if (!empty($payment->category_name)) {
                                                                            $category_name = $payment->category_name;
                                                                            $category_name1 = explode(',', $category_name);
                                                                            foreach ($category_name1 as $category_name2) {
                                                                                $category_name3 = explode('*', $category_name2);
                                                                                if ($category_name3[0] == $category->id) {
                                                                                    echo 'data-qtity=' . $category_name3[3];
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if (!empty($payment->category_name)) {
                                                                            $category_name = $payment->category_name;
                                                                            $category_name1 = explode(',', $category_name);
                                                                            foreach ($category_name1 as $category_name2) {
                                                                                $category_name3 = explode('*', $category_name2);
                                                                                if ($category_name3[0] == $category->id) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>><?php echo $category->category; ?></option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title"><?php echo lang('review_items');?></div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col-md-12 qfloww">
                                                        <div class="row">
                                                            <div class="col-md-11 col-sm-11 remove1">
                                                                <label class="pull-left"><?php echo lang('items') ?></label>
                                                            </div>
                                                            <div class="col-md-1 col-sm-1 remove">
                                                                <label class="pull-right"><?php echo lang('qty') ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Summary</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Sub Total</label>
                                                            <input type="text" class="form-control" id="subtotal" name="subtotal" value="<?php
                                                            if (!empty($payment->amount)) {
                                                                echo $payment->amount;
                                                            }
                                                            ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Discount <?php
                                                            if ($discount_type == 'percentage') {
                                                                echo ' (%)';
                                                            }
                                                            ?></label>
                                                            <input type="text" class="form-control" id="dis_id" name="discount" value="<?php
                                                            if (!empty($payment->discount)) {
                                                                $discount = explode('*', $payment->discount);
                                                                echo $discount[0];
                                                            }
                                                            ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Gross Total</label>
                                                            <input type="text" class="form-control" id="gross" name="grsss" value="<?php
                                                            if (!empty($payment->gross_total)) {

                                                                echo $payment->gross_total;
                                                            }
                                                            ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Note</label>
                                                            <input type="text" class="form-control" name="remarks" value="<?php
                                                            if (!empty($payment->remarks)) {

                                                                echo $payment->remarks;
                                                            }
                                                            ?>">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label class="form-label"><?php echo lang('completion_status');?></label>
                                                            <select class="form-control select2-show-search" name="completion_status" value='<?php
                                                            if (!empty($payment->completion_status)) {
                                                                echo $payment->completion_status;
                                                            }
                                                            ?>'>
                                                                <option value="in progress" <?php
                                                                        if (!empty($payment->completion_status)) {
                                                                            if ($payment->completion_status == 'in progress') {
                                                                            echo 'selected';
                                                                            }
                                                                        }
                                                                        ?>
                                                                > <?php echo lang('in_progress'); ?> </option>
                                                                <option value="completed" <?php
                                                                        if (!empty($payment->completion_status)) {
                                                                            if ($payment->completion_status == 'completed') {
                                                                            echo 'selected';
                                                                            }
                                                                        }
                                                                        ?>
                                                                > <?php echo lang('completed'); ?> </option>
                                                                <option value="cancelled" <?php
                                                                        if (!empty($payment->completion_status)) {
                                                                            if ($payment->completion_status == 'cancelled') {
                                                                            echo 'selected';
                                                                            }
                                                                        }
                                                                        ?>
                                                                > <?php echo lang('cancelled'); ?> </option>                                        
                                                            </select>
                                                        </div> -->
                                                        <div class="form-group">
                                                            <?php if (empty($payment)) { ?>
                                                            <label class="form-label">
                                                                <?php echo lang('deposited_amount'); ?> 
                                                            </label>
                                                            <input type="text" class="form-control" name="amount_received" id="amount_received" value='' placeholder=" ">
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <?php if (empty($payment->id)) { ?>
                                                            <label for="exampleInputEmail1"><?php echo lang('deposit_type'); ?></label>
                                                            <select class="form-control m-bot15 js-example-basic-single selecttype" id="selecttype" name="deposit_type" value=''> 
                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                                                    <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                                                    <option value="Card"> <?php echo lang('card'); ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                            
                                                            <?php
                                                            $payment_gateway = $settings->payment_gateway;
                                                            ?>
                                                            <div class="mycard">
                                                                <hr>
                                                                <div class="col-md-12">
                                                                    <label for="exampleInputEmail1"> <?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                                                                    <div class="">
                                                                        <img src="uploads/card.png" width="100%">
                                                                    </div> 
                                                                </div>
                                                                <?php
                                                                if ($payment_gateway == 'PayPal') {
                                                                    ?>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
                                                                        <select class="form-control m-bot15" name="card_type" value=''>

                                                                            <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>   
                                                                            <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                                                            <option value="American Express" > <?php echo lang('american_express'); ?> </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                                                        <input type="text"  id="cardholder" class="form-control" name="cardholder" value='' placeholder="">
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack') { ?>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                                                        <input type="text"  id="mycard" class="form-control" name="card_number" value='' placeholder="">
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                                                        <input type="text" class="form-control" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="">
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <label for="exampleInputEmail1"> <?php echo lang('cvv'); ?> </label>
                                                                        <input type="text" class="form-control" id="cvv" maxlength="3" name="cvv_number" value='' placeholder="">
                                                                    </div> 

                                                                <?php
                                                                }
                                                                ?>
                                                            </div> 

                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('invoice') ?> <?php echo lang('status') ?></label>
                                                            <select class="select2-show-search form-control" name="payment_status" id="payment_status">
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="form-group cashsubmit col-md-12">
                                                            <button type="submit" name="submit2" id="submit1" class="btn btn-primary row pull-right"> <?php echo lang('submit'); ?>
                                                            </button>
                                                        </div>
                                                        <div class="form-group cardsubmit col-md-12" hidden>
                                                            <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary row pull-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                ?>onClick="stripePay(event);"<?php }
                                                                ?>> <?php echo lang('submit'); ?>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($payment->id)) {
                                        echo $payment->id;
                                    }
                                    ?>'>
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <?php echo lang('deposits');?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="">
                                                        <table class="table table-bordered" id="example">
                                                            <thead>
                                                                <tr>
                                                                    <th class=""><?php echo lang('deposit'); ?> #</th>
                                                                    <th class=""><?php echo lang('date'); ?> <?php echo lang('and');?> <?php echo lang('time');?></th>
                                                                    <th class=""><?php echo lang('transacted_by'); ?></th>
                                                                    <th class=""><?php echo lang('deposit_type'); ?></th>
                                                                    <th class=""><?php echo lang('amount'); ?> (<?php echo $settings->currency;?>)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($payment)) {
                                                                ?>
                                                                    <tr class="">
                                                                        <td>1</td>
                                                                        <td><?php echo date('d/m/Y - h:i A', $payment->date);?> </td>
                                                                        <td><?php echo $this->ion_auth->user($payment->user)->row()->username; ?></td>
                                                                        <td><?php echo $payment->deposit_type;?></td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="amount_received" id="amount_received" value='<?php if (!empty($payment->amount_received)) { echo $payment->amount_received; } ?>' <?php
                                                                            if ($payment->deposit_type == 'Card') {
                                                                                echo 'readonly';
                                                                            }
                                                                            ?>>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $deposits = $this->finance_model->getDepositByPaymentId($payment->id);
                                                                    $i = 1;
                                                                    foreach ($deposits as $deposit) 
                                                                    { ?>


                                                                        <?php
                                                                        if (empty($deposit->amount_received_id)) 
                                                                        {
                                                                            $i = $i + 1;
                                                                            ?>
                                                                            <tr class="">
                                                                                <td><?php echo $i;?></td>
                                                                                <td><?php echo date('d/m/Y - h:i A', $deposit->date);?> </td>
                                                                                <td><?php echo $this->ion_auth->user($deposit->user)->row()->username; ?></td>
                                                                                <td><?php echo $deposit->deposit_type;?></td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" name="deposit_edit_amount[]" id="amount_received" value='<?php echo $deposit->deposited_amount; ?>' <?php
                                                                                    if ($deposit->deposit_type == 'Card') {
                                                                                        echo 'readonly';
                                                                                    }
                                                                                    ?>>
                                                                                    <input type="hidden" class="form-control" name="deposit_edit_id[]" id="amount_received" value='<?php echo $deposit->id; ?>' placeholder=" ">
                                                                                </td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                }  
                                                                else { ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td class="text-center"><h4><?php echo lang('no_deposits_made');?></h4></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    
                                                                    <?php } ?>
                                                            </tbody>     
                                                        </table>
                                                    </div>
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
        <script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
        <script src="common/js/advanced-form-components.js"></script>
    <!-- INTERNAL JS INDEX END -->

    <!-- Multi Select Script Start -->
        <script>

        $(document).ready(function () {

            var tot = 0;
            //  $(".qfloww").html("");
            $(".ms-selected").click(function () {
                var idd = $(this).data('idd');
                $('#id-div' + idd).remove();
                $('#idinput-' + idd).remove();
                $('#categoryinput-' + idd).remove();
                $('.br').remove();

            });
            $.each($('select.multi-selection option:selected'), function () {
                var curr_val = $(this).data('id');
                var idd = $(this).data('idd');
                var qtity = $(this).data('qtity');
                //  tot = tot + curr_val;
                var cat_name = $(this).data('cat_name');
                if ($('#idinput-' + idd).length)
                {

                } else {
                    if ($('#id-div' + idd).length)
                    {

                    } else {
                        $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div>')
                    }


                    var input2 = $('<input>').attr({
                        type: 'text',
                        class: "remove",
                        id: 'idinput-' + idd,
                        name: 'quantity[]',
                        value: qtity,
                    }).appendTo('#editPaymentForm .qfloww');

                    $('<input>').attr({
                        type: 'hidden',
                        class: "remove",
                        id: 'categoryinput-' + idd,
                        name: 'category_id[]',
                        value: idd,
                    }).appendTo('#editPaymentForm .qfloww');

                    $('<br>').attr({
                        class: "br"
                    }).appendTo('#editPaymentForm .qfloww');
                }


                $(document).ready(function () {
                    $('#idinput-' + idd).keyup(function () {
                        var qty = 0;
                        var total = 0;
                        $.each($('select.multi-selection option:selected'), function () {
                            var id1 = $(this).data('idd');
                            qty = $('#idinput-' + id1).val();
                            var ekokk = $(this).data('id');
                            total = total + qty * ekokk;
                        });

                        tot = total;

                        var discount = $('#dis_id').val();
                        var gross = tot - discount;
                        $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
                        $('#editPaymentForm').find('[name="grsss"]').val(gross)

                        var amount_received = $('#amount_received').val();
                        var change = amount_received - gross;
                        $('#editPaymentForm').find('[name="change"]').val(change).end()


                    });
                });
                var sub_total = $(this).data('id') * $('#idinput-' + idd).val();
                tot = tot + sub_total;


            });

            var discount = $('#dis_id').val();

            <?php
            if ($discount_type == 'flat') {
                ?>

                var gross = tot - discount;

            <?php } else { ?>

                var gross = tot - tot * discount / 100;

            <?php } ?>

            $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()

            $('#editPaymentForm').find('[name="grsss"]').val(gross)

            var amount_received = $('#amount_received').val();
            var change = amount_received - gross;
            $('#editPaymentForm').find('[name="change"]').val(change).end()

        }

        );




        $(document).ready(function () {
            $('#dis_id').keyup(function () {
                var val_dis = 0;
                var amount = 0;
                var ggggg = 0;
                amount = $('#subtotal').val();
                val_dis = this.value;
                <?php
                if ($discount_type == 'flat') {
                    ?>
                    ggggg = amount - val_dis;
                <?php } else { ?>
                    ggggg = amount - amount * val_dis / 100;
                <?php } ?>
                $('#editPaymentForm').find('[name="grsss"]').val(ggggg)


                var amount_received = $('#amount_received').val();
                var change = amount_received - ggggg;
                $('#editPaymentForm').find('[name="change"]').val(change).end()

            });
        });

    </script> 

    <script>
        $(document).ready(function () {

            $('.multi-selection').change(function () {
                var tot = 0;
                //  $(".qfloww").html("");
                $(".ms-selected").click(function () {
                    var idd = $(this).data('idd');
                    $('#id-div' + idd).remove();
                    $('#idinput-' + idd).remove();
                    $('#categoryinput-' + idd).remove();
                    $('.br').remove();
                });
                $.each($('select.multi-selection option:selected'), function () {
                    var curr_val = $(this).data('id');
                    var idd = $(this).data('idd');
                    //  tot = tot + curr_val;
                    var cat_name = $(this).data('cat_name');
                    if ($('#idinput-' + idd).length)
                    {

                    } else {
                        if ($('#id-div' + idd).length)
                        {

                        } else {
                            $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div>')
                        }


                        var input2 = $('<input>').attr({
                            type: 'text',
                            class: "remove w-20",
                            id: 'idinput-' + idd,
                            name: 'quantity[]',
                            value: '1',
                        }).appendTo('#editPaymentForm .qfloww');

                        $('<input>').attr({
                            type: 'hidden',
                            class: "remove",
                            id: 'categoryinput-' + idd,
                            name: 'category_id[]',
                            value: idd,
                        }).appendTo('#editPaymentForm .qfloww');

                        $('<br>').attr({
                            class: "br"
                        }).appendTo('#editPaymentForm .qfloww');
                    }


                    $(document).ready(function () {
                        $('#idinput-' + idd).keyup(function () {
                            var qty = 0;
                            var total = 0;
                            $.each($('select.multi-selection option:selected'), function () {
                                var id1 = $(this).data('idd');
                                qty = $('#idinput-' + id1).val();
                                var ekokk = $(this).data('id');
                                total = total + qty * ekokk;
                            });

                            tot = total;

                            var discount = $('#dis_id').val();
                            var gross = tot - discount;
                            $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
                            $('#editPaymentForm').find('[name="grsss"]').val(gross)

                            var amount_received = $('#amount_received').val();
                            var change = amount_received - gross;
                            $('#editPaymentForm').find('[name="change"]').val(change).end()


                        });
                    });
                    var sub_total = $(this).data('id') * $('#idinput-' + idd).val();
                    tot = tot + sub_total;


                });

                var discount = $('#dis_id').val();

                <?php
                if ($discount_type == 'flat') {
                    ?>

                    var gross = tot - discount;

                <?php } else { ?>

                    var gross = tot - tot * discount / 100;

                <?php } ?>

                $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()

                $('#editPaymentForm').find('[name="grsss"]').val(gross)

                var amount_received = $('#amount_received').val();
                var change = amount_received - gross;
                $('#editPaymentForm').find('[name="change"]').val(change).end()


            }

            );
        });

        $(document).ready(function () {
            $('#dis_id').keyup(function () {
                var val_dis = 0;
                var amount = 0;
                var ggggg = 0;
                amount = $('#subtotal').val();
                val_dis = this.value;
                <?php
                if ($discount_type == 'flat') {
                    ?>
                    ggggg = amount - val_dis;
                <?php } else { ?>
                    ggggg = amount - amount * val_dis / 100;
                <?php } ?>
                $('#editPaymentForm').find('[name="grsss"]').val(ggggg)


                var amount_received = $('#amount_received').val();
                var change = amount_received - ggggg;
                $('#editPaymentForm').find('[name="change"]').val(change).end()

            });
        });

    </script> 

    <script>
        $('.multi-selection').multiSelect({
            selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder=' search...'>",
            selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder=''>",
            afterInit: function (ms) {
                var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });
    </script>

    <!-- <script type="text/javascript">
        var select = document.getElementById('items');
        multi(select, {
            non_selected_header: 'Items',
            selected_header: 'Selected Items'
        });
    </script> -->
    <script>
        $('#my_multi_select3').multiSelect()
    </script>
    <!-- Multi Select Script End -->

    <!-- Company Select Script Start -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#encounter").select2({
                    placeholder: '<?php echo lang('select_payer'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'encounter/getEncounterInfo',
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
    <!-- Company Select Script End -->

    <!-- Patient Select Script Start -->
        <script>
            $(document).ready(function () {
                $('.pos_client').hide();
                $(document.body).on('change', '#pos_select', function () {

                    var v = $("select.pos_select option:selected").val()
                    if (v == 'add_new') {
                        $('.pos_client').show();
                    } else {
                        $('.pos_client').hide();
                    }
                });

            });

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#pos_select").select2({
                    placeholder: '<?php echo lang('select_patient'); ?>',
                    allowClear: true,
                });
            });
        </script>
    <!-- Patient Select Script End -->

    <!-- Doctor Select Script Start -->
        <script>
            $(document).ready(function () {
                $('.pos_doctor').hide();
                $(document.body).on('change', '#add_doctor', function () {

                    var v = $("select.add_doctor option:selected").val()
                    if (v == 'add_new') {
                        $('.pos_doctor').show();
                    } else {
                        $('.pos_doctor').hide();
                    }
                });

            });

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#add_doctor").select2({
                    placeholder: '<?php echo lang('select_doctor'); ?>',
                    allowClear: true,
                });
            });
        </script>
    <!-- Doctor Select Script End -->

    <!-- Company Select Script Start -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#company").select2({
                    placeholder: '<?php echo lang('select_payer'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'company/getCompanyWithoutAddNewOption',
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
    <!-- Company Select Script End -->

    <script>
        $(document).ready(function () {
            $('.mycard').hide();
            $(document.body).on('change', '#selecttype', function () {

                var v = $("select.selecttype option:selected").val()
                if (v == 'Card') {
                    $('.cardsubmit').removeClass('hidden');
                    $('.cashsubmit').addClass('hidden');
                    $('.mycard').show();
                } else {
                    $('.mycard').hide();
                    $('.cashsubmit').removeClass('hidden');
                    $('.cardsubmit').addClass('hidden');
                }
            });

        });


    </script>
    <script>
        function cardValidation() {
            var valid = true;
            var cardNumber = $('#mycard').val();
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
        Stripe.setPublishableKey("<?php echo $gateway->publish; ?>");

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
                $("#editPaymentForm").append("<input type='hidden' name='token' value='" + token + "' />");
                //submit form to the server
                $("#editPaymentForm").submit();
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
                    number: $('#mycard').val(),
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
            $("#encounter").change(function () {
                var encounter_id = $("#encounter").val();
                $.ajax({
                    url: 'encounter/getEncounterById?id=' + encounter_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.encounter.patient_id);
                        $('#editPaymentForm').find('[name="patient"]').val(response.encounter.patient_id).change();
                        $('#editPaymentForm').find('[name="doctor"]').val(response.encounter.rendering_staff_id).change();
                    }
                });
                
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#company").change(function (){
                $("#payment_status").find('option').remove();
                var company = $("#company").val();
                $.ajax({
                    url: 'finance/getInvoiceStatusByCompanyClassificationName?id=' + company,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var status = response.name;

                        $.each(status, function (key, value) {
                            $('#payment_status').append($('<option>').text(value.display_name).val(value.display_name)).end();
                        });
                    }
                });
            });
        });
    </script>



    </body>
</html> 