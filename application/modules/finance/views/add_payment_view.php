<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <header class="page-header">
            <div class="page-title">
                <?php
                if (!empty($payment->id))
                    echo lang('edit_invoice');
                else
                    echo lang('add_new_invoice');
                ?>
            </div>
        </header>
        <form role="form" id="editPaymentForm" action="finance/addPayment" method="post" enctype="multipart/form-data">
            <section class="panel">
                <header class="panel-heading">
                    <?php
                    if (!empty($payment->id))
                        echo lang('edit_items');
                    else
                        echo lang('add_remove_items');
                    ?>
                </header>
                <div class="panel-body">
                    <?php echo validation_errors(); ?>
                    <div class="adv-table editable-table ">
                        <style> 
                            form{
                                background: #f1f1f1;
                                padding: 0px !important;
                            }
                            .modal-body form{
                                background: #fff;
                                padding: 21px;
                            }
                            .remove{
                                width: 20%;
                                float: right;
                                margin-bottom: 10px;
                                padding: 10px;
                                height: 39px;
                                text-align: center;
                                border-bottom: 1px solid #f1f1f1;
                            }
                            .remove1{
                                width: 80%;
                                float: left;
                                margin-bottom: 10px;
                                border-bottom: 1px solid #f1f1f1;
                            }
                            form input {
                                border: none;
                            }
                            .pos_box_title{
                                border: none;
                            }
                            .payment_label {
                                text-align: left;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                        <select class="form-control m-bot15  pos_select" id="pos_select" name="patient" value=''> 
                                            <?php if (!empty($payment)) { ?>
                                                <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>  
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
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
                            <div class="col-md-6 form-group">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputEmail1"> <?php echo lang('refd_by_doctor'); ?></label>
                                        <select class="form-control m-bot15  add_doctor" id="add_doctor" name="doctor" value=''>  
                                            <?php if (!empty($payment)) { ?>
                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
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
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputEmail1"> <?php echo lang('payer_account'); ?></label>
                                        <select class="form-control m-bot15  add_payer" id="company" name="company_id" value=''>
                                            <?php if (!empty($payment)) { ?>
                                                <option value="<?php echo $company->id; ?>" selected="selected"><?php echo format_number_with_digits($company->id, COMPANY_ID_LENGTH). ' - '. $company->display_name; ?></option>  
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1"> <?php echo lang('select'); ?></label>
                                    <select name="category_name[]" id="" class="multi-select" multiple="" id="my_multi_select3" >
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
            </section>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="panel">
                        <div class="panel-heading"><?php echo lang('review_items');?></div>
                        <div class="panel-body">
                            <div class="col-md-12 qfloww">
                                <label class=" col-md-10 pull-left remove1"><?php echo lang('items') ?></label><label class="pull-right col-md-2 remove"><?php echo lang('qty') ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="panel">
                        <div class="panel-heading"><?php echo lang('summary');?></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('sub_total'); ?> </label>
                                    <input type="text" class="form-control" name="subtotal" id="subtotal" value='<?php
                                    if (!empty($payment->amount)) {
                                        echo $payment->amount;
                                    }
                                    ?>' placeholder=" " disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('discount'); ?>  <?php
                                        if ($discount_type == 'percentage') {
                                            echo ' (%)';
                                        }
                                        ?> 
                                    </label>
                                    <input type="text" class="form-control" name="discount" id="dis_id" value='<?php
                                    if (!empty($payment->discount)) {
                                        $discount = explode('*', $payment->discount);
                                        echo $discount[0];
                                    }
                                    ?>' placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('gross_total'); ?> </label>
                                    <input type="text" class="form-control" name="grsss" id="gross" value='<?php
                                    if (!empty($payment->gross_total)) {

                                        echo $payment->gross_total;
                                    }
                                    ?>' placeholder=" " disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('note'); ?> </label>
                                    <input type="text" class="form-control" name="remarks" id="" value='<?php
                                    if (!empty($payment->remarks)) {

                                        echo $payment->remarks;
                                    }
                                    ?>' placeholder=" ">
                                </div> 
                            </div>   
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label><?php echo lang('completion_status');?> </label>
                                    <select class="form-control" name="completion_status" value='<?php
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
                                </div>
                            </div>
                            <div class="row">                                                  
                                <div class="col-md-12 form-group">
                                    <?php if (empty($payment)) { ?>
                                    <label for="exampleInputEmail1">
                                        <?php echo lang('deposited_amount'); ?> 
                                    </label>
                                    <input type="text" class="form-control" name="amount_received" id="amount_received" value='' placeholder=" ">
                                    <?php } ?>
                                </div>
                            </div>    
                            <?php if (empty($payment->id)) { ?>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('deposit_type'); ?></label>
                                    <select class="form-control m-bot15 js-example-basic-single selecttype" id="selecttype" name="deposit_type" value=''> 
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                            <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                            <option value="Card"> <?php echo lang('card'); ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>                                                             
                                    <?php
                                    $payment_gateway = $settings->payment_gateway;
                                    ?>
                                    <div class="card">
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
                                                <input type="text"  id="card" class="form-control" name="card_number" value='' placeholder="">
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
                            </div>                                                                                           
                            <?php } ?>

                            <div class="form-group cashsubmit col-md-12">
                                <button type="submit" name="submit2" id="submit1" class="btn btn-primary row pull-right"> <?php echo lang('submit'); ?>
                                </button>
                            </div>
                            <div class="form-group cardsubmit col-md-12 hidden">
                                <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary row pull-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                    ?>onClick="stripePay(event);"<?php }
                                    ?>> <?php echo lang('submit'); ?>
                                </button>
                            </div>
                        </div>
                    </div>                                                        
                </div>
                <!--
                <div class="col-md-12 payment">
                    <div class="col-md-3 payment_label"> 
                      <label for="exampleInputEmail1">Vat (%)</label>
                    </div>
                    <div class="col-md-9"> 
                      <input type="text" class="form-control pay_in" name="vat" id="exampleInputEmail1" value='<?php
                if (!empty($payment->vat)) {
                    echo $payment->vat;
                }
                ?>' placeholder="%">
                    </div>
                </div>
                -->
                <input type="hidden" name="id" value='<?php
                if (!empty($payment->id)) {
                    echo $payment->id;
                }
                ?>'>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel">
                        <div class="panel-heading"><?php echo lang('deposits');?></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table table-striped table-hover table-bordered" id="editable-samples">
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
    </section>
</section>
<!--main content end-->
<!--footer start-->
<script src="common/js/coderygel.min.js"></script>
<!--

<script>
    $(document).ready(function () {
        $('.multi-select').change(function () {
            $(".qfloww").html("");
            var tot = 0;
            $.each($('select.multi-select option:selected'), function () {
                var curr_val = $(this).data('id');
                var idd = $(this).data('idd');
                tot = tot + curr_val;
                var cat_name = $(this).data('cat_name');
                $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div><br>')
            });
            var discount = $('#dis_id').val();
<?php
if ($discount_type == 'flat') {
    ?>                                                                                                                                                                            var gross = tot - discount;
<?php } else { ?>                                                                                                                                                                            var gross = tot - tot * discount / 100;
<?php } ?>
            $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
            $('#editPaymentForm').find('[name="grsss"]').val(gross)
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
    ?>                                                                                                                                                                            ggggg = amount - val_dis;
<?php } else { ?>                                                                                                                                                                            ggggg = amount - amount * val_dis / 100;
<?php } ?>
            $('#editPaymentForm').find('[name="grsss"]').val(ggggg)
        });
    });

</script> 

<script>
    $(document).ready(function () {

        $(".qfloww").html("");
        var tot = 0;
        $.each($('select.multi-select option:selected'), function () {
            var curr_val = $(this).data('id');
            var idd = $(this).data('idd');
            tot = tot + curr_val;
            var cat_name = $(this).data('cat_name');
            $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div><br>')
        });
        var discount = $('#dis_id').val();
<?php
if ($discount_type == 'flat') {
    ?>                                                                                                                                                                        var gross = tot - discount;
<?php } else { ?>                                                                                                                                                                        var gross = tot - tot * discount / 100;
<?php } ?>
        $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
        $('#editPaymentForm').find('[name="grsss"]').val(gross)

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
    ?>                                                                                                                                                                            ggggg = amount - val_dis;
<?php } else { ?>                                                                                                                                                                            ggggg = amount - amount * val_dis / 100;
<?php } ?>
            $('#editPaymentForm').find('[name="grsss"]').val(ggggg)
        });
    });

</script> 

-->

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="common/js/ajaxrequest-coderygel.min.js"></script>

<script>
                                                    $(document).ready(function () {

                                                        var tot = 0;
                                                        //  $(".qfloww").html("");
                                                        $(".ms-selected").click(function () {
                                                            var idd = $(this).data('idd');
                                                            $('#id-div' + idd).remove();
                                                            $('#idinput-' + idd).remove();
                                                            $('#categoryinput-' + idd).remove();

                                                        });
                                                        $.each($('select.multi-select option:selected'), function () {
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
                                                            }


                                                            $(document).ready(function () {
                                                                $('#idinput-' + idd).keyup(function () {
                                                                    var qty = 0;
                                                                    var total = 0;
                                                                    $.each($('select.multi-select option:selected'), function () {
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

        $('.multi-select').change(function () {
            var tot = 0;
            //  $(".qfloww").html("");
            $(".ms-selected").click(function () {
                var idd = $(this).data('idd');
                $('#id-div' + idd).remove();
                $('#idinput-' + idd).remove();
                $('#categoryinput-' + idd).remove();

            });
            $.each($('select.multi-select option:selected'), function () {
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
                        class: "remove",
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
                }


                $(document).ready(function () {
                    $('#idinput-' + idd).keyup(function () {
                        var qty = 0;
                        var total = 0;
                        $.each($('select.multi-select option:selected'), function () {
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

<!-- Add Patient Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Patient Registration</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addNew?redirect=payment" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="img_url">
                    </div>

                    <input type="hidden" name="id" value=''>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->

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

<script>
    $(document).ready(function () {
        $('.card').hide();
        $(document.body).on('change', '#selecttype', function () {

            var v = $("select.selecttype option:selected").val()
            if (v == 'Card') {
                $('.cardsubmit').removeClass('hidden');
                $('.cashsubmit').addClass('hidden');
                $('.card').show();
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
    $(document).ready(function () {
        $("#pos_select").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfoWithAddNewOption',
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

        $("#add_doctor").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorWithAddNewOption',
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



