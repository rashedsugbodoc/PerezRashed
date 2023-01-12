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

                            .ms-options-wrap button {
                                color: black;
                                font-weight: bold;
                            }

                            td[rowspan] {
                              vertical-align: top;
                              text-align: left;
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
                                <form role="form" id="editPaymentForm" action="finance/addPayment2" method="post" enctype="multipart/form-data" onsubmit="btnLoading('editPaymentForm');">
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
                                            <div class="card-options">
                                                <button type="button" id="add_payer_account" class="btn btn-primary"><?php echo lang('add').' '.lang('payer_account'); ?></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php echo validation_errors(); ?>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <?php if (!empty($redirect)) { ?>
                                                        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('patient'); ?></label>
                                                                <select class="select2-show-search form-control pos_select" id="pos_select" name="patient" placeholder="Search Patient" <?php if(!empty($encounter->patient_id)) { echo "disabled"; } ?> required>
                                                                    <?php if (!empty($payment)) { ?>
                                                                        <?php foreach($patients as $patient) { ?>
                                                                            <?php if ($patient->id === $payment->patient) { ?>
                                                                                <option value="<?php echo $patient->id; ?>" selected><?php echo $patient->name ?></option>
                                                                            <?php } else { ?>
                                                                                <option value="<?php echo $patient->id; ?>"><?php echo $patient->name ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if (!empty($encounter->patient_id)) { ?>
                                                                        <option value="<?php echo $patientt->id; ?>" selected><?php echo $patientt->name ?></option>
                                                                    <?php } ?>
                                                                    <?php if (!empty($patient_id)) { ?>
                                                                        <?php foreach($patients as $patient) { ?>
                                                                            <?php if ($patient->id === $patient_id) { ?>
                                                                                <option value="<?php echo $patient->id; ?>" selected><?php echo $patient->name ?></option>
                                                                            <?php } else { ?>
                                                                                <option value="<?php echo $patient->id; ?>"><?php echo $patient->name ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </select>
                                                                <?php if (!empty($encounter->patient_id)) { ?>
                                                                    <input type="hidden" name="patient" value="<?php echo $patientt->id ?>">
                                                                <?php } ?>
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
                                                                <select class="select2-show-search form-control add_doctor" id="add_doctor" name="doctor" placeholder="Search Doctor" <?php if(!empty($encounter->doctor)) { echo "disabled"; } ?> required>
                                                                    <?php if (!empty($payment)) { ?>
                                                                        <?php foreach($doctors as $doctor) { ?>
                                                                            <?php if ($doctor->id === $payment->doctor) { ?>
                                                                                <option value="<?php echo $doctor->id; ?>" selected="selected"><?php echo $doctor->name; ?> - <?php echo $doctor->id; ?></option>  
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if (!empty($encounter->doctor)) { ?>
                                                                        <option value="<?php echo $doctorr->id; ?>" selected><?php echo $doctorr->name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?php if (!empty($encounter->doctor)) { ?>
                                                                    <input type="hidden" name="doctor" value="<?php echo $doctorr->id ?>">
                                                                <?php } ?>
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
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                        <select class="form-control select2-show-search" name="encounter_id" id="encounter" data-placeholder="Select Patient to Produce Encounter Records" <?php if(!empty($encounter_id)) { echo "disabled"; } ?> required>
                                                            <option label="Choose one"></option>
                                                            <?php if (!empty($encounter->id)) { ?>
                                                                <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $encounter_type->display_name . ' - ' . $encounter->created_at; ?></option>
                                                            <?php } ?>
                                                            <?php if (!empty($payment->encounter_id)) { ?>
                                                                <?php foreach($encounters as $encounter) { ?>
                                                                    <?php if ($encounter->id === $payment->encounter_id) { ?>
                                                                        <option value="<?php echo $encounter->id; ?>" selected><?php echo $encounter->encounter_number . ' - ' . $this->encounter_model->getEncounterTypeById($encounter->encounter_type_id)->display_name . ' - ' . $encounter->created_at; ?></option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                        <?php if (!empty($encounter_id)) { ?>
                                                            <input type="hidden" name="encounter_id" value="<?php echo $encounter_id ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('invoice').' '.lang('due') ?></label>
                                                        <select class="form-control" id="due_type" name="due_type">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('payer_account'); ?></label>
                                                        <select class="select2-show-search form-control add_payer company" id="company" name="company_id" value='' required>
                                                            <?php foreach ($companies as $comp) { ?>
                                                                <?php if ($comp->id == $payment->company_id) { ?>
                                                                    <option value="<?php echo $comp->id; ?>" selected><?php echo format_number_with_digits($comp->id, COMPANY_ID_LENGTH). ' - '. $comp->display_name; ?></option>  
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6 col-sm-12" hidden>
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering'). ' ' . lang('staff')?></label>
                                                        <select class="select2-show-search form-control rendering_user" id="rendering_user" name="rendering_user" required>
                                                            <option value="add_new"><?php echo lang('add_new') ?></option>
                                                            <?php foreach ($staffs as $staff) { ?>
                                                                <?php if (!empty($payment)) { ?>
                                                                    <?php if ($payment->rendering_staff_id === $staff->user_id) { ?>
                                                                        <option value="<?php echo $staff->user_id ?>" selected><?php echo $staff->username ?></option>
                                                                    <?php } ?>
                                                                <?php } else { ?>
                                                                    <?php if (!empty($encounter_id)) { ?>
                                                                        <?php if ($encounter->rendering_staff_id === $staff->user_id) { ?>
                                                                            <option value="<?php echo $staff->user_id ?>" selected><?php echo $staff->username ?></option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row" hidden>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('select'); ?></label>
                                                        <select name="category_name[]" class="multi-selection" multiple="" id="my_multi_select31" required> -->
                                                            <?php /*foreach ($categories as $category) {*/ ?>
                                                                <?php /*foreach ($doctors as $doctor) {*/ ?>
                                                                    <?php
                                                                    /*$service_category_group = $this->finance_model->getServiceCategoryGroupById($category->service_category_group_id);
                                                                    if (!empty($service_category_group->is_virtual)) {
                                                                        $fee = $doctor->virtual_consultation_fee;
                                                                    } else {
                                                                        $fee = $doctor->physical_consultation_fee;
                                                                    }*/
                                                                    ?>
                                                                    <!-- <option class="ooppttiioonn" data-doctor="<?php echo $doctor->name; ?>" data-id="<?php echo $fee; ?>" data-idd="<?php echo $category->id.'-'.$doctor->ion_user_id; ?>" data-cat_name="<?php echo $category->category; ?>" value="<?php echo $category->category.'-'.$doctor->ion_user_id; ?>" 
                                                                            <?php
                                                                            /*if (!empty($payment->category_name)) {
                                                                                $category_name = $payment->category_name;
                                                                                $category_name1 = explode(',', $category_name);
                                                                                foreach ($category_name1 as $category_name2) {
                                                                                    $category_name3 = explode('*', $category_name2);
                                                                                    if ($category_name3[0] == $category->id.'-'.$doctor->ion_user_id) {
                                                                                        echo 'data-qtity=' . $category_name3[3];
                                                                                    }
                                                                                }
                                                                            }*/
                                                                            ?>
                                                                            <?php
                                                                            /*if (!empty($payment->category_name)) {
                                                                                $category_name = $payment->category_name;
                                                                                $category_name1 = explode(',', $category_name);
                                                                                foreach ($category_name1 as $category_name2) {
                                                                                    $category_name3 = explode('*', $category_name2);
                                                                                    $category_id = explode('-', $category_name3[0]);
                                                                                    if ($category_name3[0] == $category->id.'-'.$doctor->ion_user_id) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                            }*/
                                                                            // if ($payment->category_name == $)
                                                                            ?>><?php /*echo $category->category . ' ( ' . lang('dr') . '. ' .  $doctor->name . ' )';*/ ?></option> -->
                                                                        <?php /*}*/ ?>
                                                                <?php /*}*/ ?>

                                                                <!-- data-id="<?php echo $category->c_price; ?>" data-idd="<?php echo $category->id; ?>" data-cat_name="<?php echo $category->category; ?>" value="<?php echo $category->applicable_staff_id?$category->category.' ('.$this->doctor_model->getDoctorByIonUserId($category->applicable_staff_id)->name.')':$category->category; ?>" -->

                                                                <!-- <?php foreach ($categories as $category) { ?>
                                                                    <?php $group = $this->ion_auth->get_users_groups($category->applicable_staff_id)->row()->name; ?>
                                                                    <?php
                                                                        if ($group === "Doctor") {
                                                                            $group_short = "Dr.";
                                                                        } else {
                                                                            $group_short = "";
                                                                        }
                                                                    ?>
                                                                    <option class="ooppttiioonn" data-doctor="<?php echo $this->doctor_model->getDoctorByIonUserId($category->applicable_staff_id)->name; ?>" data-id="<?php echo $category->c_price; ?>" data-idd="<?php echo $category->id.'-'.$category->applicable_staff_id; ?>" data-cat_name="<?php echo $category->category; ?>" data-dr="<?php echo $group_short; ?>" value="<?php echo $category->id.'-'.$category->applicable_staff_id; ?>"
                                                                            <?php
                                                                            if (!empty($payment->category_name)) {
                                                                                $category_name = $payment->category_name;
                                                                                $category_name1 = explode(',', $category_name);
                                                                                foreach ($category_name1 as $category_name2) {
                                                                                    $category_name3 = explode('*', $category_name2);
                                                                                    if ($category_name3[0] == $category->id.'-'.$category->applicable_staff_id) {
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
                                                                                    if ($category_name3[0] == $category->id.'-'.$category->applicable_staff_id) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>><?php echo $category->applicable_staff_id?$category->category.' ('.$group_short.' '.$this->doctor_model->getDoctorByIonUserId($category->applicable_staff_id)->name.')':$category->category; ?></option>
                                                                        <?php } ?> -->
                                                        <!-- </select>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <ul class="nav nav-pills nav-pills-circle" id="tabs_3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link border py-3 px-5 <?php echo $invoice_item_group?'active':''; ?>" id="tab3" data-toggle="tab" href="#tabs_3_1" role="tab" aria-selected=" <?php echo $invoice_item_group?'true':'false'; ?>" onclick="withCopay();">
                                                                    <span class="nav-link-icon d-block"><?php echo lang('with_copay') ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link border py-3 px-5" id="tab4" data-toggle="tab" href="#tabs_3_2" role="tab"  aria-selected="false" onclick="withoutCopay();">
                                                                    <span class="nav-link-icon d-block"><?php echo lang('without_copay') ?></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group" id="charge_form_group">
                                                        <div id="charge_div">
                                                            <select name="charge_name" class="charge" id="charge" placeholder="Sample Placeholder" multiple="multiple">
                                                                <?php foreach ($categories as $category) { ?>
                                                                    <option class="ooppttiioonn" data-doctor="<?php echo $this->doctor_model->getDoctorByIonUserId($category->applicable_staff_id)->name; ?>" data-id="<?php echo $category->c_price; ?>" data-idd="<?php echo $category->id.'-'.$category->applicable_staff_id; ?>" data-cat_name="<?php echo $category->category; ?>" data-dr="<?php echo $group_short; ?>" value="<?php echo $category->id.'-'.$category->applicable_staff_id; ?>"
                                                                        <?php
                                                                        if (!empty($payment->category_name)) {
                                                                            $category_name = $payment->category_name;
                                                                            $category_name1 = explode(',', $category_name);
                                                                            foreach ($category_name1 as $category_name2) {
                                                                                $category_name3 = explode('*', $category_name2);
                                                                                if ($category_name3[0] == $category->id.'-'.$category->applicable_staff_id) {
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
                                                                                if ($category_name3[0] == $category->id.'-'.$category->applicable_staff_id) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>><?php echo $category->applicable_staff_id?$category->category.' ('.$group_short.' '.$this->doctor_model->getDoctorByIonUserId($category->applicable_staff_id)->name.')':$category->category; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div id="charge_div">
                                                            <div id="charge_with_copay" <?php echo $invoice_item_group?'':'hidden'; ?>>
                                                                <select name="charge_name[]" class="charge" placeholder="Sample Placeholder" multiple="multiple">
                                                                    
                                                                    <?php foreach ($charges_with_copay as $charge_with_copay) { ?>
                                                                        <option value="<?php echo $charge_with_copay->id; ?>" <?php
                                                                        if (in_array($charge_with_copay->id, $invoice_item_group) === true) {
                                                                            echo "selected";
                                                                        } else {
                                                                            echo "";
                                                                        } ?>><?php echo $charge_with_copay->category ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div id="charge_without_copay" hidden>
                                                                <select name="charge_name[]" class="charge" placeholder="Sample Placeholder" multiple="multiple">
                                                                    <?php foreach ($charges_without_copay as $charge_without_copay) { ?>
                                                                        <option value="<?php echo $charge_without_copay->id; ?>" <?php
                                                                        if (in_array($charge_without_copay->id, $invoice_item_group) === true) {
                                                                            echo "selected";
                                                                        } else {
                                                                            echo "";
                                                                        } ?>><?php echo $charge_without_copay->category ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="payer-div">
                                        <!-- <div class="col-md-12 col-sm-12 col-lg-12 countPayer" id="addCase">
                                            <div class="panel-group panel-group-primary mb-5"  role="tablist" aria-multiselectable="true" id="accordion3">
                                                <div class="panel panel-default active">
                                                    <div class="panel-heading" role="tab" id="headingOne31">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" id="accordHeader" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne31" aria-expanded="true" aria-controls="collapseOne31">
                                                                <?php echo lang('payer_account'); ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne31">
                                                        <div class="panel-body border-0 bg-white">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('payer_account'); ?></label>
                                                                        <select class="select2-show-search form-control add_payer company" id="company" name="company_id" value='' required>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12" hidden>
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('rendering'). ' ' . lang('staff')?></label>
                                                                        <select class="select2-show-search form-control rendering_user" id="rendering_user" name="rendering_user" required>
                                                                            <option value="add_new"><?php echo lang('add_new') ?></option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group"> 
                                                                        <label for="exampleInputEmail1"> <?php echo lang('select'); ?></label>
                                                                        <select name="category_name[]" class="multi-selection" multiple="" id="my_multi_select3" required>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row" id="payer_list">
                                        
                                    </div>
                                    <div class="row" id="charge_cards">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Extras</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
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
                                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Clerk'))) { ?>
                                                                        <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                                                        <!-- <option value="Card"> <?php /*echo lang('card');*/ ?> </option> -->
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
                                                            <div class="form-group" id="invoice_status">
                                                                
                                                            </div>
                                                            <div class="form-group cardsubmit col-md-12" hidden>
                                                                <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary row pull-right"> <?php echo lang('submit'); ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Item Summary</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-vcenter border text-nowrap mb-0">
                                                                    <thead>
                                                                        <tr class="text-center">
                                                                            <th class="border"><?php echo lang('charges'); ?></th>
                                                                            <th class="border"><?php echo lang('qty'); ?></th>
                                                                            <th class="border"><?php echo lang('unit_price'); ?></th>
                                                                            <th class="border"><?php echo lang('amount'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="item_summary_tbody">
                                                                        
                                                                    </tbody>
                                                                    <tbody class="item_summary_tbody_result">
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group cashsubmit col-md-12">
                                                                <button type="submit" name="submit2" id="submit" class="btn btn-primary row pull-right"> <?php echo lang('submit'); ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-9 col-sm-12">
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
                                        <div class="col-md-3 col-sm-12">
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
                                                        <div class="form-group">
                                                            <label class="form-label"></label>
                                                            <select class="form-control select2-show-search" name="completion_status" value=''>
                                                                                                      
                                                            </select>
                                                        </div>
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
                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor', 'Clerk'))) { ?>
                                                                    <option value="Cash"> <?php echo lang('cash'); ?> </option>
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
                                                        <div class="form-group" id="invoice_status">
                                                            
                                                        </div>
                                                        <div class="form-group cashsubmit col-md-12">
                                                            <button type="submit" name="submit2" id="submit" class="btn btn-primary row pull-right"> <?php echo lang('submit'); ?>
                                                            </button>
                                                        </div>
                                                        <div class="form-group cardsubmit col-md-12" hidden>
                                                            <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary row pull-right"> <?php echo lang('submit'); ?>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <input type="hidden" name="id" value='<?php
                                    if (!empty($payment->id)) {
                                        echo $payment->id;
                                    }
                                    ?>'> -->
                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($payment->invoice_group_number)) {
                                        echo $payment->invoice_group_number;
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
                                                                    <?php
                                                                    $deposits = $this->finance_model->getDepositByPaymentId($payment->id);
                                                                    $i = 0;
                                                                    foreach ($deposits as $deposit) 
                                                                    { ?>


                                                                        <?php
                                                                        if (!empty($deposit->deposited_amount)) 
                                                                        {
                                                                            $i = $i + 1;
                                                                            ?>
                                                                            <tr class="">
                                                                                <td><?php echo $i;?></td>
                                                                                <td><?php echo date('d/m/Y - h:i A', $deposit->date);?> </td>
                                                                                <td><?php echo $this->ion_auth->user($deposit->user)->row()->username; ?></td>
                                                                                <td><?php echo $deposit->deposit_type;?></td>
                                                                                <td>
                                                                                    <input type="text" class="form-control amount_received" name="deposit_edit_amount[]" id="amount_received" value='<?php echo $deposit->deposited_amount; ?>' <?php
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

                        <div id="modal-area">
                            
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

        <!-- Prism js -->
        <script src="<?php echo base_url('public/assets/plugins/prism/prism.js'); ?>"></script>

        <!-- Accordion js-->
        <script src="<?php echo base_url('public/assets/plugins/accordion/accordion.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/accordion.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- jQuery library -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script>
        <!-- <script src="<?php echo base_url('public/assets/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js'); ?>"></script> -->
        <!-- <script src="<?php echo base_url('public/assets/plugins/bootstrap-multiselect/docs/js/jquery-2.2.4.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap-multiselect/docs/js/bootstrap.bundle-4.5.2.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap-multiselect/docs/js/prettify.min.js'); ?>"></script> -->
        <!-- <script src="<?php echo base_url('public/assets/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js'); ?>"></script> -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function() {
            sessionStorage.clear();
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var group = '<?php echo $payment->invoice_group_number; ?>'
            $.ajax({
                url: 'finance/editInvoicesByInvoiceGroupIdByJson?group='+group,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var invoices = response.invoices;
                    console.log(response.invoices);
                    var summary_subtotal = 0;
                    var summary_tax = 0;
                    var summary_discount = 0;
                    var summary_deposited_amount = 0;
                    $.each(invoices, function(key, value) {
                        var items = value['items'];
                        var total = value['total'];
                        var discount = value['discount'];
                        var amount_received = value['received'];
                        var company_name = value['company']['name'];
                        var item_id = items['id'];
                        var charge_id = items['charge_id'];
                        var group_id = items['charge_group_id'];
                        var category = items['description'];
                        var fix_limit = items['fixed_limit'];
                        var type = "variable";
                        var discount_id = discount['id'];
                        var discount_amount = discount['amount'];
                        var charge_quantity = items['quantity'];
                        var tax_id = items['tax_id'];
                        var tax_amount = items['tax_amount'];
                        var tax_percentage = items['tax_percentage'];
                        var c_price = items['c_price'];
                        var tax_detail = "sample";
                        var c_price_display = "sample";
                        var discount_list = response.discount;
                        var discount_data = discount['discount_data'];

                        window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(value['items']));

                        console.log(discount_data);
                        console.log(value['items']);

                        $("#charge_cards").append('<div class="col-md-6 col-sm-12">\n\
                            <div class="card h-90" id="payer_account-'+key+'">\n\
                                <div class="card-header">\n\
                                    <div class="card-title">'+company_name+'</div>\n\
                                    <div class="card-options"><button type="button" class="btn btn-primary" data-target="#addCase'+charge_id+'" data-toggle="modal"><?php echo lang("add").' '.lang("extras"); ?></button></div>\n\
                                </div>\n\
                                <div class="card-body">\n\
                                    <div class="table-responsive">\n\
                                        <table class="table text-nowrap">\n\
                                            <thead>\n\
                                                <tr>\n\
                                                    <th class="w-50"></th>\n\
                                                    <th class="w-40"><?php echo lang("amount"); ?></th>\n\
                                                    <th class="w-10"><?php echo lang("quantity"); ?></th>\n\
                                                </tr>\n\
                                            </thead>\n\
                                            <tbody id="tbody'+key+'">\n\
                                            </tbody>\n\
                                        </table>\n\
                                    </div>\n\
                                    <div id="extras-'+key+'">\n\
                                        <hr>\n\
                                        <div class="table-responsive">\n\
                                            <table class="table text-nowrap">\n\
                                                <tbody>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('sub_total'); ?>: </td>\n\
                                                        <td class="w-35"></td>\n\
                                                        <td class="w-25"></td>\n\
                                                        <td class="w-30"><input name="item_total[]" id="card_items_total-'+key+'" class="form-control" value="'+total['subtotal']+'"></td>\n\
                                                    </tr>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('discount'); ?>: </td>\n\
                                                        <td class="w-35"><select name="discount_type[]" id="discount'+key+'" class="form-control" onchange="select_discount3('+key+');"></select></td>\n\
                                                        <td class="w-25" id="discount_type_input'+key+'">\n\
                                                        </td>\n\
                                                        <td class="w-30"><input name="discount_total[]" class="form-control discount_total" value="'+discount_amount+'" readonly id="discount_total-'+key+'"></td>\n\
                                                        </div>\n\
                                                    </tr>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('tax'); ?>: </td>\n\
                                                        <td class="w-35"></td>\n\
                                                        <td class="w-25"></td>\n\
                                                        <td class="w-30"><input name="tax[]" id="tax_total-'+key+'" class="form-control tax_total" value="'+parseFloat(total['tax']).toFixed(2)+'"></td>\n\
                                                    </tr>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('payer_account').' '.lang('total'); ?>: </td>\n\
                                                        <td class="w-35"></td>\n\
                                                        <td class="w-25"></td>\n\
                                                        <td class="w-30"><input name="payer_total[]" id="payer_total-'+key+'" class="form-control payer_total" value="'+total['gross_total']+'"></td>\n\
                                                    </tr>\n\
                                                </tbody>\n\
                                            </table>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        </div>');

                        // discountSelect2(key);

                        if (amount_received == null) {
                            amount_received = 0;
                        }
                        
                        // var discount = 0;
                        summary_discount += Number(parseFloat(discount_amount).toFixed(2));
                        summary_deposited_amount += Number(parseFloat(amount_received).toFixed(2));
                        $.each(items, function(item_key, item_value) {
                            window.sessionStorage.setItem('selected_charges'+item_value['charge_id'], item_value['charge_id']);
                            // console.log('c_price'+item_value['c_price']);
                            summary_subtotal += Number(parseFloat(item_value['c_price']).toFixed(2));
                            summary_tax += Number(parseFloat(item_value['tax_amount']).toFixed(2));
                            console.log(summary_subtotal);
                            var type = item_value['charge_type'];
                            if (type == "variable") {
                                var td_amount = '<td class="w-40"><input type="number" value="'+item_value['c_price']+'" class="form-control amount'+item_value['charge_id']+'-'+key+'" name="amount[]" onfocusout="charge_amount('+item_value['charge_id']+','+key+','+item_value['tax_id']+','+item_value['tax_amount']+','+item_value['tax_percentage']+','+item_value['c_price']+');" min="0" max="'+item_value['fixed_limit']+'" oninput="validity.valid||(value='+"'0'"+');"></td>';
                                var td_amount_summary = '<label class="text-right main-content-label tx-13 font-weight-semibold mb-0">'+currency+item_value['c_price']+'</label>';
                                var c_price = 0;
                                var tax_detail = 0;
                            } else {
                                var td_amount = '<td class="w-40"><input type="hidden" step=".01" value="'+item_value['c_price']+'" class="form-control amount'+item_value['charge_id']+'-'+key+'" name="amount[]" onfocusout="charge_amount('+item_value['charge_id']+','+key+','+item_value['tax_id']+','+item_value['tax_amount']+','+item_value['tax_percentage']+','+item_value['c_price']+');" min="0" max="'+item_value['fixed_limit']+'" oninput="validity.valid||(value='+"'0'"+');"><label>'+item_value['c_price']+'</label></td>';
                                var td_amount_summary = '<label class="text-right main-content-label tx-13 font-weight-semibold mb-0">'+currency+item_value['c_price']+'</label>';
                                var c_price = item_value['c_price'];
                                var tax_detail = item_value['tax_amount'];
                            }

                            var summary_item_count = $(".summary_charges"+key).length;
                            var invoice_result = $(".invoice_result").length;

                            $("#tbody"+key).append('<tr class="charge-'+item_value['charge_group_id']+'">\n\
                                <td class="w-50">'+item_value['description']+'<input type="text" name="charge_id[]" value="'+item_value['charge_id']+'" hidden></td>\n\
                                '+td_amount+'\n\
                                <td class="w-10"><input type="number" class="form-control quantity'+item_value['charge_id']+'-'+key+'" name="quantity[]" value="'+item_value['quantity']+'" onfocusout="charge_quantity('+item_value['charge_id']+','+key+','+item_value['tax_id']+','+item_value['tax_amount']+','+item_value['tax_percentage']+','+item_value['c_price']+');" min="0" oninput="validity.valid||(value='+"'0'"+');"></td>\n\
                            </tr>');

                            if (summary_item_count == 0) {
                                $(".item_summary_tbody").append('<tr>\n\
                                    <td class="valign-middle border w-60">\n\
                                        <div class="invoice-notes summary_charges'+key+'">\n\
                                            <label class="main-content-label tx-13 font-weight-semibold">'+company_name+'</label>\n\
                                            <div id="charge_item'+key+item_value['charge_id']+'"><p>'+item_value['description']+'</p></div>\n\
                                        </div>\n\
                                    </td>\n\
                                    <td class="tx-right border font-weight-semibold w-10">\n\
                                        <div class="invoice-notes summary_quantity'+key+'">\n\
                                            <label class="main-content-label tx-13 font-weight-semibold"></label>\n\
                                            <div class="text-center" id="quantity_item'+key+item_value['charge_id']+'">'+item_value['quantity']+'</div>\n\
                                        </div>\n\
                                    </td>\n\
                                    <td class="tx-right border font-weight-semibold w-15">\n\
                                        <div class="invoice-notes summary_unit_price'+key+'">\n\
                                            <label class="text-right main-content-label tx-13 font-weight-semibold"></label>\n\
                                            <div class="text-right" id="unit_price_item'+key+item_value['charge_id']+'">'+td_amount_summary+'</div>\n\
                                        </div>\n\
                                    </td>\n\
                                    <td class="tx-right border font-weight-semibold w-15">\n\
                                        <div class="invoice-notes summary_amount'+key+'">\n\
                                            <label class="main-content-label tx-13 font-weight-semibold"></label>\n\
                                            <div class="text-right" id="amount_item'+key+item_value['charge_id']+'">'+currency+parseFloat(item_value['item_total']).toFixed(2)+'</div>\n\
                                            <input type="hidden" name="amount_input" id="amount_item_input'+key+item_value['charge_id']+'" value="'+item_value['item_total']+'">\n\
                                        </div>\n\
                                    </td>\n\
                                </tr>\n\
                                ')

                            } else {
                                var charge_item_variable = 'charge_item'+key+item_value['charge_id'];
                                var quantity_item_variable = 'quantity_item'+key+item_value['charge_id'];
                                var unit_price_item_variable = 'unit_price_item'+key+item_value['charge_id'];
                                var amount_item_variable = 'amount_item'+key+item_value['charge_id'];
                                var amount_item_input = 'amount_item_input'+key+item_value['charge_id'];
                                // alert(item_variable);
                                $(".summary_charges"+key).append('<div id="'+charge_item_variable+'"><p>'+item_value['description']+'</p></div>');
                                $(".summary_quantity"+key).append('<div class="text-center" id="'+quantity_item_variable+'">'+item_value['quantity']+'</div>');
                                $(".summary_unit_price"+key).append('<div class="text-right" id="'+unit_price_item_variable+'">'+td_amount_summary+'</div>');
                                $(".summary_amount"+key).append('<div class="text-right" id="'+amount_item_variable+'">'+currency+parseFloat(item_value['item_total']).toFixed(2)+'</div>');
                                $(".summary_amount"+key).append('<input type="hidden" name="amount_input" id="'+amount_item_input+'" value="'+item_value['item_total']+'">');
                            }

                            if (invoice_result == 0) {
                                $(".item_summary_tbody_result").append('<tr class="invoice_result">\n\
                                    <td rowspan="5" class="td class="valign-top border w-60">\n\
                                        <label class="form-label"><?php echo lang("note"); ?></label>\n\
                                        <label id="invoice_result_note"></label>\n\
                                    </td>\n\
                                    <td class="tx-right border font-weight-semibold w-10">\n\
                                        <label><?php echo lang("sub_total"); ?></label>\n\
                                    </td>\n\
                                    <td colspan="2" class="tx-right border font-weight-semibold w-30 text-right" id="invoice_result_subtotal">\n\
                                        '+parseFloat(summary_subtotal).toFixed(2)+'\n\
                                    </td>\n\
                                </tr>\n\
                                <tr>\n\
                                    <td class="tx-right border font-weight-semibold w-10">\n\
                                        <label><?php echo lang("tax"); ?></label>\n\
                                    </td>\n\
                                    <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_tax">'+parseFloat(summary_tax).toFixed(2)+'</td>\n\
                                </tr>\n\
                                <tr>\n\
                                    <td class="tx-right border font-weight-semibold w-10">\n\
                                        <label><?php echo lang("discount"); ?></label>\n\
                                    </td>\n\
                                    <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_discount"></td>\n\
                                </tr>\n\
                                <tr>\n\
                                    <td class="tx-right border font-weight-semibold w-10">\n\
                                        <label><?php echo lang("deposited_amount"); ?></label>\n\
                                    </td>\n\
                                    <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_deposited"></td>\n\
                                </tr>\n\
                                <tr>\n\
                                    <td class="tx-right border font-weight-semibold w-10">\n\
                                        <label><?php echo lang("total")." ".lang("due"); ?></label>\n\
                                    </td>\n\
                                    <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_due"></td>\n\
                                </tr>\n\
                                ');
                            } else {
                                $('#invoice_result_note').text(item_value.remarks)
                                $('#invoice_result_subtotal').text(parseFloat(summary_subtotal).toFixed(2));
                                $('#invoice_result_tax').text(parseFloat(summary_tax).toFixed(2));
                                $('#invoice_result_discount').text(summary_discount);
                                $('#invoice_result_deposited').text(summary_deposited_amount);

                            }


                            // $('#editPaymentForm').find('[name="discount_type"]').val(1).change();
                        })

                        var invoice_item_extras = inv_items(key);

                        var invoice_item_amount = invoice_item_extras[1];
                        var invoice_tax_amount = invoice_item_extras[0];

                        console.log('invoice_item_amount Bruh: ');
                        console.log(invoice_item_amount);

                        if (discount['discount_type'] == 1) {
                            var rate = discount_data.rate;
                            $("#discount_type_input"+key).append('<div class="input-group" id="selected_payer_price_content_two'+key+'" hidden>\n\
                                <input type="text" class="form-control" id="discount_input-'+key+'" name="discount_input[]" placeholder="Enter Percentage Amount">\n\
                                <span class="input-group-append">\n\
                                    <span class="btn btn-primary" type="button">%</span>\n\
                                </span>\n\
                            </div><div><label class="mt-2">'+rate+' %'+'</label></div>\n\
                            ');
                        } else if (discount['discount_type'] == 2) {
                            var rate = discount_data.amount;
                            $("#discount_type_input"+key).append('<div class="input-group" id="selected_payer_price_content_two'+key+'" hidden>\n\
                                <span class="input-group-append">\n\
                                    <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                                </span>\n\
                                <input type="text" class="form-control" id="discount_input-'+key+'" name="discount_input[]" placeholder="Enter Fixed Amount">\n\
                            </div><div><label class="mt-2">'+currency+' '+rate+'</label></div>');
                        } else if (discount['discount_type'] == 3) {
                            var invoice_discount_amount = discount.amount;
                            var rate = 0;
                            $("#discount_type_input"+key).append('<div class="input-group" id="selected_payer_price_content_two'+key+'">\n\
                                <input type="text" class="form-control" value="'+invoice_discount_amount+'" id="discount_input-'+key+'" name="discount_input[]" placeholder="Enter Percentage Amount" onkeyup="computeDiscountPercentage('+invoice_item_amount+','+key+');">\n\
                                <span class="input-group-append">\n\
                                    <span class="btn btn-primary" type="button">%</span>\n\
                                </span>\n\
                            </div>\n\
                            ');
                        } else if (discount['discount_type'] == 4) {
                            var invoice_discount_amount = discount.amount;
                            var rate = 0;
                            $("#discount_type_input"+key).append('<div class="input-group" id="selected_payer_price_content_two'+key+'">\n\
                                <span class="input-group-append">\n\
                                    <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                                </span>\n\
                                <input type="text" class="form-control" id="discount_input-'+key+'" value="'+invoice_discount_amount+'" name="discount_input[]" placeholder="Enter Fixed Amount" onkeyup="computeDiscountAmount('+invoice_item_amount+','+key+')">\n\
                            </div>');
                        }

                        $('#discount'+key).append($('<option value="0" disabled>None</option>')).end();
                        $.each(discount_list, function(discount_key, discount_value) {
                            $('#discount'+key).append($('<option data-rate="'+discount_value.rate+'" data-amount="'+discount_value.amount+'" data-discount_type_id="'+discount_value.discount_type_id+'">').text(discount_value.name).val(discount_value.id)).end();
                        })

                        // discountSelect2(key);

                        console.log(discount_id);

                        if (discount_id == null) {
                            $('#discount'+key).val("0");
                        } else {
                            $('#discount'+key).val(discount_id);
                        }
                        $('#discount'+key).select2();

                    })
    
                    var total_due = computeDue();

                    /*Old Total Due Formula*/
                    //summary_subtotal-$('#amount_received').val()

                    $('#invoice_result_due').text(parseFloat(total_due).toFixed(2));
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var setval = '<?php echo $setval ?>';
            var group = '<?php echo $service[0]->group_id; ?>';
            if (setval !== "") {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/charges/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            } else {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/charges/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            }

            if (group != "") {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/charges/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            } else {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/charges/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            }
        })
    </script>

    <script>
        $('#editPaymentForm').parsley();
    </script>

    <script type="text/javascript">
        // $('#charge').multiSelect({
        //     columns: 1,
        //     placeholder: 'Select Languages',
        //     search: true,
        //     selectAll: true
        //     // ellipsis: true
        //     // displayValues: true
        // });
        $(document).ready(function () {
            $('.charge').multipleSelect({
                selectAll: false,
                filter: true,
                animate: 'slide',
                minimumCountSelected: 5,
            });
        })
    </script>

    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('.charge').change(function() {
        //         alert('zz');
        //     })
        // });
    </script>

    <script type="text/javascript">
        function withCopay() {
            $("#charge_with_copay").attr('hidden', false);
            $("#charge_without_copay").attr('hidden', true);
        }

        function withoutCopay() {
            $("#charge_with_copay").attr('hidden', true);
            $("#charge_without_copay").attr('hidden', false);
        }
    </script>

    <script type="text/javascript">
        function discountSelect2(key) {
            $("#discount"+key).select2({
                placeholder: '<?php echo lang('select_payer'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getDiscountInfo',
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
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#due_type").select2({
                placeholder: '<?php echo lang('select').' '.lang('due').' '.lang('type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getInvoiceDueTypeInfo',
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
        })
    </script>

    <script type="text/javascript">
        var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
        function computeSubtotal() {

        }

        function removeInvoiceCard(payer_account) {
            var charge_count = $("#payer_account-"+payer_account).find("input[name='charge_id[]']").map(function(){return $(this).length;}).get();

            console.log('Charges Count: '+charge_count);

            if (charge_count == "") {
                $("#payer_account-"+payer_account).remove();
            }
        }

        function computeDue() {
            var totalsummarydiscount = 0;
            var amount_received = $("#amount_received").val();

            console.log('AMOUNT RECEIVED'+'amount_received');

            if (amount_received == null) {
                amount_received = 0
            }
            $('.discount_total').each(function() {
                totalsummarydiscount += Number(this.value);
            });

            var totalsummarytax = 0;  
            $('.tax_total').each(function() {
                totalsummarytax += Number(this.value);
            });

            var cnt = 0;  
            // console.log(p_value);
            $("[name='item_total[]']").each(function() {
                cnt += Number(this.value);
            });

            // var total_due = (cnt-totalsummarytax)-totalsummarydiscount;
            var total_due = cnt - amount_received;
            return total_due;
        }

        function editInvoiceData(url, callback) {
            $.ajax({
                url: url,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: callback,
                error: function (request, status, error) {
                    alert(status);
                }
                // success: function (response) {
                //     var invoices = response.invoices;

                //     console.log('invoice_array');
                //     console.log(invoices);
                // }
            });
        }

        function computeDiscount(payer_account, invoice_item_amount, invoice_tax_amount) {
            var discount_input = $('#discount_input-'+payer_account).val();
            if ('<?php echo $payment->invoice_group_number; ?>') {
                var data = $('#discount'+payer_account).find('option:selected');
                var group = '<?php echo $payment->invoice_group_number; ?>'
                
                // var edit_invoice = '';
                var edit_invoice;
                editInvoiceData('finance/editInvoicesByInvoiceGroupIdByJson?group='+group, function(response) {
                    // console.log('invoice_array2');
                    // console.log(response.invoices);
                    return response.invoices;
                });

                // console.log('invoice_array2');
                // console.log(editIn);
                console.log('Edit Invoice: '+edit_invoice);
                
                // console.log(invoices);
                // var rate = data.data('rate');
                // var type = data.data('discount_type_id');
                // var amount = data.data('amount');
                console.log('rate: '+data.data('rate'))
                console.log('type: '+data.data('discount_type_id'))
                console.log('amount: '+data.data('amount'))
                console.log('invoice_item_amount');
                console.log(invoice_item_amount);
                if (data != undefined) {
                    if (data.data('discount_type_id') == 1) {
                        var invoice_discount_amount = invoice_item_amount * (data.data('rate')/100);
                        var rate = data.data('rate');
                        discount += invoice_discount_amount;
                    } else if (data.data('discount_type_id') == 2) {
                        var invoice_discount_amount = data.data('amount');
                        var rate = data.data('amount');
                        discount += invoice_discount_amount;
                    } else if (data.data('discount_type_id') == 3) {
                        var invoice_discount_amount = invoice_item_amount * (data.data('rate')/100);
                        var rate = data.data('rate');
                        discount += invoice_discount_amount;
                        // $("#discount_input-"+payer_account).val(invoice_discount_amount);    
                    } else if (data.data('discount_type_id') == 4) {
                        // var invoice_discount_amount = data.data('amount');
                        // var rate = data.data('amount');
                        var invoice_discount_amount = $("#discount_input-"+payer_account).val();
                        var rate = $("#discount_input-"+payer_account).val();
                        discount += invoice_discount_amount;
                        console.log(invoice_discount_amount);
                        // $("#discount_input-"+payer_account).val(invoice_discount_amount);
                    } else {
                        var invoice_discount_amount = 0;
                        var rate = 0;
                        discount += invoice_discount_amount;
                    }

                    if (is_display_prices_with_tax_included() == "1") {
                        var payer_account_total = (parseFloat(invoice_item_amount-invoice_discount_amount)).toFixed(2)
                    } else {
                        var payer_account_total = (parseFloat((invoice_item_amount+invoice_tax_amount)-invoice_discount_amount)).toFixed(2)
                    }
                } else {
                    var invoice_discount_amount = 0;
                    var rate = 0;
                    discount += invoice_discount_amount;
                    var payer_account_total = invoice_item_amount;
                }

                return [payer_account_total, invoice_discount_amount, rate, discount]

            } else {

                var data = $("#discount"+payer_account).select2('data')[0];

                if (data != undefined) {
                    if (data.discount_type_id == 1) {
                        var invoice_discount_amount = invoice_item_amount * (data.rate/100);
                        var rate = data.rate;
                        discount += invoice_discount_amount;
                    } else if (data.discount_type_id == 2) {
                        var invoice_discount_amount = data.amount;
                        var rate = data.amount;
                        discount += invoice_discount_amount;
                    } else if(data.discount_type_id == 3) {
                        var invoice_discount_amount = invoice_item_amount * (discount_input/100);
                        var rate = discount_input;
                        discount += invoice_discount_amount;
                    } else if(data.discount_type_id == 4) {
                        var invoice_discount_amount = discount_input;
                        var rate = discount_input;
                        discount += invoice_discount_amount;
                    } else {
                        var invoice_discount_amount = 0;
                        var rate = 0;
                        discount += invoice_discount_amount;
                    }

                    if (is_display_prices_with_tax_included() == "1") {
                        var payer_account_total = (parseFloat(invoice_item_amount-invoice_discount_amount)).toFixed(2)
                    } else {
                        var payer_account_total = (parseFloat((invoice_item_amount+invoice_tax_amount)-invoice_discount_amount)).toFixed(2)
                    }
                } else {
                    var invoice_discount_amount = 0;
                    var rate = 0;
                    discount += invoice_discount_amount;
                    var payer_account_total = invoice_item_amount;
                }

                return [payer_account_total, invoice_discount_amount, rate, discount]

            }
        }

        function computeAllDiscount() {
            var input = document.getElementsByName('discount_total[]');

            var discount = 0;
            for (var i = 0; i < input.length; i++) {
                discount += Number(input[i].value);
            }

            return discount;
        }

        function computeTax() {
            var input = document.getElementsByName('tax[]');

            var tax = 0;
            for (var i = 0; i < input.length; i++) {
                tax += Number(input[i].value);
            }

            $("#invoice_result_tax").empty().append('<label>'+currency+' '+tax.toFixed(2)+'</label>');
        }

        function computePayerTotal() {

        }

        function setDiscountInputOnKeyUpParameter(payer_id, invoice_item_amount) {
            $('#discount_input-'+payer_id).attr('onkeyup',  'computeDiscountAmount('+invoice_item_amount+','+payer_id+')')
        }

        function inv_items(payer_account) {
            var invoice_items = JSON.parse(window.sessionStorage.getItem('new_invoice-'+payer_account));
            var charge_items = $("#payer_account-"+payer_account).find("input[name='charge_id[]']").map(function(){return $(this).val();}).get();
            var amount_items = $("#payer_account-"+payer_account).find("input[name='amount[]']").map(function(){return $(this).val();}).get();
            var quantity_items = $("#payer_account-"+payer_account).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();

            var invoice_item_amount = 0;
            var invoice_tax_amount = 0;

            console.log('amount item Bruh:');
            console.log(invoice_items);

            $.each(invoice_items, function(key, value) {
                var invoice_value = value;
                var c_price = value.c_price;
                var tax_percentage = value.tax_percentage;
                var tax_amount = value.tax_amount;

                if (tax_percentage == null) {
                    tax_percentage = 0;
                }

                if (c_price != amount_items[key]) {
                    c_price = amount_items[key];
                    tax_amount = parseFloat(c_price)*((parseFloat(tax_percentage)/100)/((parseFloat(tax_percentage)/100)+1));
                } else {
                    c_price = value.c_price;
                    if (value.tax_id == null) {
                        tax_amount = 0;
                    } else {
                        tax_amount = parseFloat(c_price)*((parseFloat(tax_percentage)/100)/((parseFloat(tax_percentage)/100)+1));
                    }
                }

                console.log('tax_amount Bruh:');
                console.log(tax_amount);

                invoice_tax_amount = parseFloat(invoice_tax_amount) + (parseFloat(tax_amount)*quantity_items[key]);
                invoice_item_amount = parseFloat(invoice_item_amount) + (parseFloat(c_price)*quantity_items[key]);

                console.log('invoice_tax_amount Bruh:');
                console.log(invoice_tax_amount);
                // console.log('bruh Tax: '+invoice_tax_amount);
                // payer_total_invoice = parseInt(payer_total_invoice) + (parseInt(c_price)*parseInt(quantity_items[key]));
            })

            console.log('tax_amount Bruh Total:');
            console.log(invoice_tax_amount);

            return [invoice_tax_amount, invoice_item_amount];
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".custom-control-input").click(function() {
                var value = $(this).val();
                $.ajax({
                    url: 'finance/getPayersByChargePayerGroup2?group='+value,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var invoice = response.invoice;
                        var discount_list = response.discount;

                        computeItem(invoice, value, discount_list);
                    }
                });

            })
        })
    </script>

    <script type="text/javascript">
        function is_display_prices_with_tax_included() {
            return '<?php echo $settings->is_display_prices_with_tax_included; ?>';
        }
    </script>

    <script type="text/javascript">
        // var tax2 = 0;
        var tax = 0;
        var discount = 0;
        var company_id = [];
        function computeItem(invoice, selected, discount_list) {
            var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';

            console.log(discount_list);
            window.sessionStorage.setItem('selected_charges_group'+selected, JSON.stringify(invoice));
            // var new_invoice = [];
            $.each(invoice, function(key, value) {
                var charge_id = value['charges']['id'];
                var group_id = value['charges']['group_id'];
                var category = value['charges']['category'];
                var fix_limit = value['charges']['fixed_limit'];
                var percentage_limit = value['charges']['percentage_limit'];
                var type = value['charges']['type'];
                
                var tax_amount = value['tax']['amount'];
                var company_name = value['company']['display_name'];
                var company_id = value['company']['id'];
                var tax_id = value['tax']['id'];
                var tax_percentage = value['tax']['percentage'];
                var charge_quantity = value['charges']['quantity'];
                var invoice_total = value['total']['total'];
                var tbody_count = $("#tbody"+key).length;
                var invoice_result = $(".invoice_result").length;
                var summary_item_count = $(".summary_charges"+key).length;
                var value2 = invoice[key];

                if (is_display_prices_with_tax_included() == "1") {
                    var c_price_display = value['charges']['price_with_tax'];
                    var c_price = value['charges']['price_with_tax'];
                } else {
                    var c_price_display = value['charges']['price_wo_tax'];
                    var c_price = value['charges']['price_wo_tax'];
                }

                // if (key == company_id) {
                //     window.sessionStorage.setItem('zzinvoice-'+key, JSON.stringify(value));
                // }

                if (c_price == null) {
                    c_price = 0;
                }

                if (tax_amount == null) {
                    tax_amount = 0;
                }

                // var new_invoice = [{
                //     charge_id: charge_id,
                //     c_price: c_price,
                //     tax_id: tax_id
                // }];

                // if (window.sessionStorage.getItem('new_invoice-'+key)) {
                //     var new_invoice = Array(JSON.parse(window.sessionStorage.getItem('new_invoice-'+key)),
                //                         {
                //                             charge_id: charge_id,
                //                             c_price: c_price,
                //                             tax_id: tax_id
                //                         });
                //     window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(new_invoice));
                //     // var old_invoice = window.sessionStorage.getItem('new_invoice-'+key);
                //     // var new_invoice = window.sessionStorage.getItem('new_invoice-'+key),
                //     //                     {
                //     //                             charge_id: charge_id,
                //     //                             c_price: c_price,
                //     //                             tax_id: tax_id
                //     //                         };
                //     // window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(new_invoice));
                // } else {
                //     var new_invoice = {
                //         charge_id: charge_id,
                //         c_price: c_price,
                //         tax_id: tax_id
                //     };
                //     window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(new_invoice));
                //     // var new_invoice = {
                //     //     charge_id: charge_id,
                //     //     c_price: c_price,
                //     //     tax_id: tax_id
                //     // };
                //     // window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(new_invoice));
                // }

                if (window.sessionStorage.getItem('selected_charges'+charge_id)) {
                    $(".charge-"+charge_id).remove();
                    $("#charge_item"+key+charge_id).remove();
                    $("#quantity_item"+key+charge_id).remove();
                    $("#unit_price_item"+key+charge_id).remove();
                    $("#amount_item"+key+charge_id).remove();
                    $("#amount_item_input"+key+charge_id).remove();
                    var selected_payer = $(".charge").val();
                    window.sessionStorage.removeItem('selected_charges'+charge_id, charge_id);
                    var invoice_array = JSON.parse(window.sessionStorage.getItem('new_invoice-'+key));
                    // var invoice_remove_index = invoice_array.indexOf(charge_id);
                    var selected_charge_group = JSON.parse(window.sessionStorage.getItem('selected_charges_group'+group_id));
                    console.log(selected_charge_group);
                    console.log(selected_payer);
                    console.log(selected_charge_group[key]['charges']['group_id']);
                    console.log(invoice_array);

                    // $.each(invoice_array, function(k, v) {

                    // })

                    console.log(invoice_array.splice(invoice_array.findIndex(v => v.group_id === selected_charge_group[key]['charges']['group_id']), 1));

                    window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(invoice_array));

                    var all_discount = computeAllDiscount();

                    $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

                    computeTax();
                    // removeInvoiceCard(key);

                    var total_due = computeDue();
                    $("#invoice_result_due").text(currency+' '+parseFloat(total_due).toFixed(2));
                    console.log('total due TTTTTTTTTTTTTT');
                    console.log(total_due);

                    /**/
                         // $.each(selected_payer, function(k, v) {
                            // if (value == selected_charge_group[key]['charges']['group_id']) {
                            //     console.log('zzzz');
                            // } else {
                            //     console.log(JSON.parse(window.sessionStorage.getItem('selected_charges_group'+v)));
                            //     // window.sessionStorage.setItem('new_invoice-'+company_id, '');
                            //     $.each(JSON.parse(window.sessionStorage.getItem('selected_charges_group'+v)), function(newkey, newvalue) {
                            //         var new_invoice = new Object();

                            //         new_invoice.charge_id = newvalue['charges']['id'];
                            //         new_invoice.c_price = newvalue['charges']['price_wo_tax'];
                            //         new_invoice.tax_id = newvalue['tax']['id'];
                            //         new_invoice.payer_id = newkey;

                            //         if (window.sessionStorage.getItem('new_invoice-'+key)) {
                            //             old_invoice = JSON.parse(sessionStorage.getItem('new_invoice-'+newkey));

                            //             // console.log(old_invoice);
                            //         } else {
                            //             old_invoice = [];
                            //         }

                            //         old_invoice.push(new_invoice)
                            //         window.sessionStorage.setItem('new_invoice-'+newkey, JSON.stringify(old_invoice));


                            //     })
                            // }
                         // })
                    /**/

                     // console.log(invoice_array);
                     // console.log(invoice_remove_index);
                } else {
                    window.sessionStorage.setItem('selected_charges'+charge_id, charge_id);

                    var new_invoice = new Object();

                    new_invoice.charge_id = charge_id;
                    new_invoice.c_price = c_price;
                    new_invoice.tax_id = tax_id;
                    new_invoice.tax_percentage = tax_percentage;
                    new_invoice.tax_amount = tax_amount;
                    new_invoice.payer_id = key;
                    new_invoice.group_id = group_id;

                    if (window.sessionStorage.getItem('new_invoice-'+key)) {
                        old_invoice = JSON.parse(sessionStorage.getItem('new_invoice-'+key));

                        // console.log(old_invoice);
                    } else {
                        old_invoice = [];
                    }

                    company_id.concat(key);

                    console.log(company_id);

                    old_invoice.push(new_invoice)
                    window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(old_invoice));

                    /**/
                        // console.log(new_invoice);

                        // var new_invoice2 = new Array([
                        //         "charge_id" => charge_id,
                        //         "c_price" => c_price,
                        //         "group_id" => group_id,
                        //         "tax_id" => tax_id,
                        //         "tax_percentage" => tax_percentage,
                        //         "tax_amount" => tax_amount,
                        //         "payer_id" => key,
                        //     ]);

                        // var new_invoice2 = new Object();

                        // new_invoice2.charge_id = charge_id;
                        // new_invoice2.c_price = c_price;
                        // new_invoice2.group_id = group_id;
                        // new_invoice2.tax_id = tax_id;
                        // new_invoice2.tax_percentage = tax_percentage;
                        // new_invoice2.tax_amount = tax_amount;
                        // new_invoice2.payer_id = key;

                        // if (window.sessionStorage.getItem('new_invoice2-'+key)) {
                        //     old_invoice2 = JSON.parse(sessionStorage.getItem('new_invoice2-'+key));

                        //     // console.log(old_invoice);
                        // } else {
                        //     old_invoice2 = [];
                        // }

                        // old_invoice2.push(new_invoice2)
                        // window.sessionStorage.setItem('new_invoice2-'+key, JSON.stringify(old_invoice2));

                        // console.log(old_invoice);
                        // console.log('total items: '+old_invoice.length);

                        // console.log(value['charges']['id']);
                    /**/

                    if (type == "variable") {
                        var td_amount = '<td class="w-40"><input type="number" value="0" class="form-control amount'+charge_id+'-'+key+'" name="amount[]" onfocusout="charge_amount('+charge_id+','+key+','+tax_id+','+tax_amount+','+tax_percentage+','+c_price+');" min="0" max="'+fix_limit+'" oninput="validity.valid||(value='+"'0'"+');"></td>';
                        var td_amount_summary = '<label class="text-right main-content-label tx-13 font-weight-semibold mb-0">'+currency+'0.00</label>';
                        var c_price = 0;
                        var tax_detail = 0;

                        console.log('tax amount: '+ tax_amount);
                    } else {
                        var td_amount = '<td class="w-40"><input type="hidden" step=".01" value="'+c_price+'" class="form-control amount'+charge_id+'-'+key+'" name="amount[]" onfocusout="charge_amount('+charge_id+','+key+','+tax_id+','+tax_amount+','+tax_percentage+','+c_price+');" min="0" max="'+fix_limit+'" oninput="validity.valid||(value='+"'0'"+');"><label>'+c_price_display+'</label></td>';
                        var td_amount_summary = '<label class="text-right main-content-label tx-13 font-weight-semibold mb-0">'+currency+c_price+'</label>';
                        var c_price = c_price;
                        var tax_detail = tax_amount;
                    }

                    console.log("tax_details: "+tax_detail);

                    if (tbody_count == 0) {
                        $("#charge_cards").append('<div class="col-md-6 col-sm-12">\n\
                            <div class="card h-90" id="payer_account-'+key+'">\n\
                                <div class="card-header">\n\
                                    <div class="card-title">'+company_name+'</div>\n\
                                    <div class="card-options"><button type="button" class="btn btn-primary" data-target="#addCase'+charge_id+'" data-toggle="modal"><?php echo lang("add").' '.lang("extras"); ?></button></div>\n\
                                </div>\n\
                                <div class="card-body">\n\
                                    <div class="table-responsive">\n\
                                        <table class="table text-nowrap">\n\
                                            <thead>\n\
                                                <tr>\n\
                                                    <th class="w-50"></th>\n\
                                                    <th class="w-40"><?php echo lang("amount"); ?></th>\n\
                                                    <th class="w-10"><?php echo lang("quantity"); ?></th>\n\
                                                </tr>\n\
                                            </thead>\n\
                                            <tbody id="tbody'+key+'">\n\
                                                <tr class="charge-'+group_id+'">\n\
                                                    <td class="w-50">'+category+'<input type="text" name="charge_id[]" value="'+charge_id+'" hidden></td>\n\
                                                    '+td_amount+'\n\
                                                    <td class="w-10"><input type="number" class="form-control quantity'+charge_id+'-'+key+'" name="quantity[]" value="'+charge_quantity+'" onfocusout="charge_quantity('+charge_id+','+key+','+tax_id+','+tax_amount+','+tax_percentage+','+c_price+');" min="0" oninput="validity.valid||(value='+"'0'"+');"></td>\n\
                                                </tr>\n\
                                            </tbody>\n\
                                        </table>\n\
                                    </div>\n\
                                    <div id="extras-'+key+'">\n\
                                        <hr>\n\
                                        <div class="table-responsive">\n\
                                            <table class="table text-nowrap">\n\
                                                <tbody>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('sub_total'); ?>: </td>\n\
                                                        <td class="w-50"></td>\n\
                                                        <td class="w-10"></td>\n\
                                                        <td class="w-30"><input name="item_total[]" id="card_items_total-'+key+'" class="form-control" value="'+c_price+'"></td>\n\
                                                    </tr>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('discount'); ?>: </td>\n\
                                                        <td class="w-50"><select name="discount_type[]" id="discount'+key+'" class="form-control" onchange="select_discount3('+key+');" placeholder="Select Discount"></select></td>\n\
                                                        <td class="w-20" id="discount_type_input'+key+'">\n\
                                                        </td>\n\
                                                        <td class="w-80"><input name="discount_total[]" class="form-control discount_total" value="0.00" readonly id="discount_total-'+key+'"></td>\n\
                                                        </div>\n\
                                                    </tr>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('tax'); ?>: </td>\n\
                                                        <td class="w-50"></td>\n\
                                                        <td class="w-10"></td>\n\
                                                        <td class="w-30"><input name="tax[]" id="tax_total-'+key+'" class="form-control tax_total" value="'+tax_detail+'"></td>\n\
                                                    </tr>\n\
                                                    <tr>\n\
                                                        <td class="w-10"><?php echo lang('payer_account').' '.lang('total'); ?>: </td>\n\
                                                        <td class="w-50"></td>\n\
                                                        <td class="w-10"></td>\n\
                                                        <td class="w-30"><input name="payer_total[]" id="payer_total-'+key+'" class="form-control payer_total" value="'+c_price_display+'"></td>\n\
                                                    </tr>\n\
                                                </tbody>\n\
                                            </table>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        </div>');

                        if ('<?php echo $payment->invoice_group_number; ?>') {
                            $('#discount'+key).append($('<option label="Select Discount" value="0">None</option>')).end();
                            $.each(discount_list, function(discount_key, discount_value) {
                                $('#discount'+key).append($('<option data-rate="'+discount_value.rate+'" data-amount="'+discount_value.amount+'" data-discount_type_id="'+discount_value.discount_type_id+'">').text(discount_value.name).val(discount_value.id)).end();
                            })

                            // discountSelect2(key);

                            // console.log(discount_id);

                            // if (discount_id == null) {
                            //     $('#discount'+key).val("0");
                            // } else {
                            //     $('#discount'+key).val(discount_id);
                            // }

                            $('#discount'+key).select2();
                        } else {
                            $('#discount'+key).append($('<option label="Select Discount" value="0">None</option>')).end();
                            discountSelect2(key);
                        }
                    } else {
                        $("#tbody"+key).append('<tr class="charge-'+group_id+'">\n\
                            <td>'+category+'<input type="text" name="charge_id[]" value="'+charge_id+'" hidden></td>\n\
                            '+td_amount+'\n\
                            <td><input type="number" class="form-control quantity'+charge_id+'-'+key+'" name="quantity[]" onfocusout="charge_quantity('+charge_id+','+key+','+tax_id+','+tax_amount+','+tax_percentage+','+c_price+');" min="0" oninput="validity.valid||(value='+"'0'"+');" value="1"></td>\n\
                        </tr>');
                    }

                    /*$("#discount"+key).select2({
                        placeholder: '<?php echo lang('select_payer'); ?>',
                        allowClear: true,
                        ajax: {
                            url: 'finance/getDiscountInfo',
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

                    });*/

                    if (summary_item_count == 0) {
                        $(".item_summary_tbody").append('<tr>\n\
                            <td class="valign-middle border w-60">\n\
                                <div class="invoice-notes summary_charges'+key+'">\n\
                                    <label class="main-content-label tx-13 font-weight-semibold">'+company_name+'</label>\n\
                                    <div id="charge_item'+key+charge_id+'"><p>'+category+'</p></div>\n\
                                </div>\n\
                            </td>\n\
                            <td class="tx-right border font-weight-semibold w-10">\n\
                                <div class="invoice-notes summary_quantity'+key+'">\n\
                                    <label class="main-content-label tx-13 font-weight-semibold"></label>\n\
                                    <div class="text-center" id="quantity_item'+key+charge_id+'">1</div>\n\
                                </div>\n\
                            </td>\n\
                            <td class="tx-right border font-weight-semibold w-15">\n\
                                <div class="invoice-notes summary_unit_price'+key+'">\n\
                                    <label class="text-right main-content-label tx-13 font-weight-semibold mb-0"></label>\n\
                                    <div class="text-right" id="unit_price_item'+key+charge_id+'">'+td_amount_summary+'</div>\n\
                                </div>\n\
                            </td>\n\
                            <td class="tx-right border font-weight-semibold w-15">\n\
                                <div class="invoice-notes summary_amount'+key+'">\n\
                                    <label class="main-content-label tx-13 font-weight-semibold mb-0"></label>\n\
                                    <div class="text-right" id="amount_item'+key+charge_id+'">'+td_amount_summary+'</div>\n\
                                    <input type="hidden" name="amount_input" value="'+c_price+'" id="amount_item_input'+key+charge_id+'">\n\
                                </div>\n\
                            </td>\n\
                        </tr>\n\
                        ')

                    } else {
                        var charge_item_variable = 'charge_item'+key+charge_id;
                        var quantity_item_variable = 'quantity_item'+key+charge_id;
                        var unit_price_item_variable = 'unit_price_item'+key+charge_id;
                        var amount_item_variable = 'amount_item'+key+charge_id;
                        var amount_item_input = 'amount_item_input'+key+charge_id;
                        // alert(item_variable);
                        $(".summary_charges"+key).append('<div id="'+charge_item_variable+'"><p>'+category+'</p></div>');
                        $(".summary_quantity"+key).append('<label class="main-content-label tx-13 font-weight-semibold"></label><div class="text-center" id="'+quantity_item_variable+'">1</div>');
                        $(".summary_unit_price"+key).append('<label class="text-right main-content-label tx-13 font-weight-semibold"></label><div class="text-right" id="'+unit_price_item_variable+'">'+td_amount_summary+'</div>');
                        $(".summary_amount"+key).append('<label class="text-right main-content-label tx-13 font-weight-semibold"></label><div class="text-right" id="'+amount_item_variable+'">'+td_amount_summary+'</div><input type="hidden" value="'+c_price+'" name="amount_input" id="'+amount_item_input+'">');
                        // $(".summary_amount"+key).append('<label class="main-content-label tx-13 font-weight-semibold"></label><div class="text-right" id="amount_item'+key+charge_id+'"></div><input type="hidden" name="amount_input" id="'+amount_item_input+'">');
                    }

                    if (invoice_result == 0) {
                        $(".item_summary_tbody_result").append('<tr class="invoice_result">\n\
                            <td rowspan="5" class="td class="valign-top border w-60">\n\
                                <div class="form-group">\n\
                                    <label class="form-label"><?php echo lang("note"); ?></label>\n\
                                    <label id="invoice_result_note"></label>\n\
                                </div>\n\
                            </td>\n\
                            <td class="tx-right border font-weight-semibold w-10">\n\
                                <label><?php echo lang("sub_total"); ?></label>\n\
                            </td>\n\
                            <td colspan="2" class="tx-right border font-weight-semibold w-30 text-right" id="invoice_result_subtotal">\n\
                            </td>\n\
                        </tr>\n\
                        <tr>\n\
                            <td class="tx-right border font-weight-semibold w-10">\n\
                                <label><?php echo lang("tax"); ?></label>\n\
                            </td>\n\
                            <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_tax"></td>\n\
                        </tr>\n\
                        <tr>\n\
                            <td class="tx-right border font-weight-semibold w-10">\n\
                                <label><?php echo lang("discount"); ?></label>\n\
                            </td>\n\
                            <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_discount"></td>\n\
                        </tr>\n\
                        <tr>\n\
                            <td class="tx-right border font-weight-semibold w-10">\n\
                                <label><?php echo lang("deposited_amount"); ?></label>\n\
                            </td>\n\
                            <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_deposited"></td>\n\
                        </tr>\n\
                        <tr>\n\
                            <td class="tx-right border font-weight-semibold w-10">\n\
                                <label><?php echo lang("total")." ".lang("due"); ?></label>\n\
                            </td>\n\
                            <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_due"></td>\n\
                        </tr>\n\
                        ');
                    }
                }

                var invoice_items = JSON.parse(window.sessionStorage.getItem('new_invoice-'+key));
                var charge_items = $("#payer_account-"+key).find("input[name='charge_id[]']").map(function(){return $(this).val();}).get();
                var amount_items = $("#payer_account-"+key).find("input[name='amount[]']").map(function(){return $(this).val();}).get();
                var quantity_items = $("#payer_account-"+key).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();
                var tax_array = $("#payer_account-"+key).find("input[name='tax[]']").map(function(){return $(this).val();}).get();

                var cnt = 0;  
                // console.log(p_value);
                $("[name='amount_input']").each(function() {
                    cnt += Number(this.value);
                });

                // $("[name='tax[]']").each(function() {
                //     tax += Number(this.value);
                //     console.log("tax: "+tax);
                // })

                // var tax = 0;  
                // $(".tax_total").each(function() {
                //     tax += Number(tax_detail[key]);
                // })

                $("#invoice_result_subtotal").empty().append('<label>'+currency+' '+((cnt*100)/100).toFixed(2)+'</label>');

                $("#invoice_result_due").empty().append('<label>'+currency+' '+(((cnt*100)/100)-$("#amount_received").val()).toFixed(2)+'</label>');

                // console.log(charge_items);
                // console.log(amount_items);
                // console.log(quantity_items);
                // console.log(invoice_items);

                // console.log(charge_items);
                // console.log(amount_items);
                // console.log(quantity_items);
                // console.log(invoice_items);

                // var data = $("#discount"+key).select2('data')[0];

                var invoice_item_extras = inv_items(key);

                var invoice_item_amount = invoice_item_extras[1];
                var invoice_tax_amount = invoice_item_extras[0];
                // console.log('bruh Amount: '+invoice_item_amount);
                // console.log('bruh Tax: '+invoice_tax_amount);

                var invoice_discount_extras = computeDiscount(key, invoice_item_amount, invoice_tax_amount);

                var payer_account_total = invoice_discount_extras[0];
                var invoice_discount_amount = invoice_discount_extras[1];
                var rate = invoice_discount_extras[2];
                discount = invoice_discount_extras[3];

                // if (data != undefined) {
                //     if (data.discount_type_id == 1) {
                //         var invoice_discount_amount = invoice_item_amount * (data.rate/100);
                //         var rate = data.rate;
                //         discount += invoice_discount_amount;
                //     } else if (data.discount_type_id == 2) {
                //         var invoice_discount_amount = data.amount;
                //         var rate = data.amount;
                //         discount += invoice_discount_amount;
                //     } else {
                //         var invoice_discount_amount = 0;
                //         var rate = 0;
                //         discount += invoice_discount_amount;
                //     }

                //     // if (is_display_prices_with_tax_included() == "1") {
                //     //     $('#payer_total-'+key).val((parseFloat(invoice_item_amount)).toFixed(2));
                //     // } else {
                //     //     $('#payer_total-'+key).val((parseFloat(invoice_item_amount+invoice_tax_amount)).toFixed(2));
                //     // }

                //     if (is_display_prices_with_tax_included() == "1") {
                //         var payer_account_total = (parseFloat(invoice_item_amount-invoice_discount_amount)).toFixed(2)
                //     } else {
                //         var payer_account_total = (parseFloat((invoice_item_amount+invoice_tax_amount)-invoice_discount_amount)).toFixed(2)
                //     }
                // } else {
                //     var invoice_discount_amount = 0;
                //     var rate = 0;
                //     discount += invoice_discount_amount;
                // }

                // $('#payer_total-'+key).val(payer_total_invoice);
                $('#payer_total-'+key).val(payer_account_total);
                $('#discount_input-'+key).val(parseFloat(rate).toFixed(2));
                console.log('bruh: '+invoice_discount_amount);
                $('#discount_total-'+key).val(parseFloat(invoice_discount_amount).toFixed(2));
                $("#invoice_result_discount").empty().append('<label>'+currency+' '+parseFloat(discount).toFixed(2)+'</label>');
                $('#card_items_total-'+key).val((invoice_item_amount).toFixed(2));
                $('#tax_total-'+key).val((invoice_tax_amount).toFixed(2)).end();

                setDiscountInputOnKeyUpParameter(key, invoice_item_amount);

                var all_discount = computeAllDiscount();

                $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

                computeTax();
                removeInvoiceCard(key);

                // var summary = 
                //     { invoice_total: invoice_item_amount, discount_amount: invoice_discount_amount, tax_amount: invoice_tax_amount }
                // ;

                // var summary = { invoice_total: invoice_item_amount, discount_amount: invoice_discount_amount, tax_amount: invoice_tax_amount }

                // window.sessionStorage.setItem('summary-'+key, JSON.stringify(summary))
                // console.log(summary);

                /**/
                    // var summary = new Object();

                    // summary.invoice_total = invoice_item_amount;
                    // summary.discount_amount = invoice_discount_amount;
                    // summary.tax_amount = invoice_tax_amount;

                    // if (window.sessionStorage.getItem('summary-'+key)) {
                    //     old_invoice = JSON.parse(sessionStorage.getItem('summary-'+key));

                    //     // console.log(old_invoice);
                    // } else {
                    //     old_invoice = [];
                    // }

                    // old_invoice.push(summary)
                    // window.sessionStorage.setItem('summary-'+key, JSON.stringify(old_invoice));

                    // console.log(summary);

                    // var new_invoice = new Object();

                    // new_invoice.charge_id = charge_id;
                    // new_invoice.c_price = c_price;
                    // new_invoice.tax_id = tax_id;
                    // new_invoice.tax_percentage = tax_percentage;
                    // new_invoice.tax_amount = tax_amount;
                    // new_invoice.payer_id = key;
                    // new_invoice.group_id = group_id;

                    // if (window.sessionStorage.getItem('new_invoice-'+key)) {
                    //     old_invoice = JSON.parse(sessionStorage.getItem('new_invoice-'+key));

                    //     // console.log(old_invoice);
                    // } else {
                    //     old_invoice = [];
                    // }

                    // old_invoice.push(new_invoice)
                    // window.sessionStorage.setItem('new_invoice-'+key, JSON.stringify(old_invoice));
                /**/

                // var invoice_save = new Object();

                // var invoice_save = [{
                //                     charges: JSON.parse(window.sessionStorage.getItem('new_invoice-'+key)),
                //                     payer: key,
                //                     summary: JSON.parse(window.sessionStorage.getItem('summary-'+key)),
                //                 }];

                /**/
                    // if (window.sessionStorage.getItem('invoice_save')) {
                    //     // window.sessionStorage.setItem('invoice_save', invoice_save.concat(window.sessionStorage.getItem('invoice_save')));
                    //     old_invoice_save = JSON.parse(window.sessionStorage.getItem('invoice_save'));
                    // } else {
                    //     // window.sessionStorage.setItem('invoice_save', JSON.stringify(invoice_save));
                    //     old_invoice_save = [];
                    // }

                    // const key = Object.keys(invoice_save);

                    // console.log(key);

                    // old_invoice_save.concat(invoice_save);
                    // Array.prototype.push.apply(invoice_save, old_invoice_save);
                    // window.sessionStorage.setItem('invoice_save', JSON.stringify(invoice_save));

                    // console.log(invoice_save);

                    // $.each(invoice_save, function(invoice_key, invoice_value) {
                    //     // console.log(key);
                    //     $.each(invoice_value["charges"], function(k, v) {
                    //         // console.log(v["charge_id"]);
                    //     })
                    // })
                /**/

            })

            /**/
                // $.each(invoice, function(key, value) {
                //     var payer_invoice = new Object();

                //     const kvArray = [
                //         { key: key, value: { charge: value['charges'], summary: JSON.parse(window.sessionStorage.getItem('summary-'+key)) } },
                //     ];

                //     if (window.sessionStorage.getItem('invoice_save')) {
                //         old_invoice_save = JSON.parse(window.sessionStorage.getItem('invoice_save'));
                //     } else {
                //         old_invoice_save = [];
                //     }

                //     // payer_invoice = [
                //     //         {
                //     //            charge: value['charges']['id'],
                //     //         },
                //     //     ];

                //     const reformattedArray = kvArray.map(({ key, value }) => ({ [key]: value }));

                //     Array.prototype.push.apply(reformattedArray, old_invoice_save);
                //     window.sessionStorage.setItem('invoice_save', JSON.stringify(reformattedArray));

                //     // if (window.sessionStorage.getItem('payer_invoice')) {
                //     //     new_payer_invoice = payer_invoice.concat(JSON.parse(window.sessionStorage.getItem('payer_invoice')));
                //     //     console.log(new_payer_invoice);
                //     //     window.sessionStorage.setItem('payer_invoice', JSON.stringify(new_payer_invoice));
                //     // } else {
                //     //     window.sessionStorage.setItem('payer_invoice', JSON.stringify(payer_invoice));
                //     // }

                //     // console.log(reformattedArray[0]);
                //     // console.log(JSON.parse(window.sessionStorage.getItem('invoice_save')));

                //     // const arr3 = JSON.parse(window.sessionStorage.getItem('invoice_save')).map((item, i) => Object.assign({}, item, JSON.parse(window.sessionStorage.getItem('invoice_save'))[i]));

                //     // console.log(arr3);

                //     // var output = [];

                //     // JSON.parse(window.sessionStorage.getItem('invoice_save')).forEach(function(item) {
                //     //     var existing = output.filter(function(v, i) {
                //     //         return v.key == item.key;
                //     //     });

                //     //     if (existing.length) {
                //     //         var existingIndex = output.indexOf(existing[0]);
                //     //         output[existingIndex].charge = output[existingIndex].charge.push.apply(item.charge);
                //     //     } else {
                //     //         if (typeof item.charge == 'string')
                //     //           item.charge = [item.charge];
                //     //         output.push(item);
                //     //     }

                //     // })

                //     const someArray = [];
                //     // JSON.parse(window.sessionStorage.getItem('invoice_save')).forEach(function(){
                //     //     console.log(value);
                //     //     if (window.sessionStorage.getItem('someArray')) {
                //     //         // console.log(value);
                //     //     } else {
                //     //         // console.log(value);
                //     //         window.sessionStorage.setItem('someArray', key);
                //     //     }
                //     // })
                // })

                // var keyHolder = [];
                // var invoice_save = JSON.parse(window.sessionStorage.getItem('invoice_save'));
                // console.log(invoice_save);
                // $.each(JSON.parse(window.sessionStorage.getItem('invoice_save')), function(key, value) {
                //     $.each(value, function(k, v) {
                //         const kvArray = [
                //             { key: k, value: v },
                //         ];
                //         const reformattedArray = kvArray.map(({ key, value }) => ({ [key]: value }));
                //         console.log(reformattedArray);
                //         console.log(v);

                //         // if (keyHolder == "") {
                //         //     keyHolder = k;
                //         // } else {
                //         //     if (keyHolder.includes(k)) {
                //         //         console.log('yes');
                //         //         console.log(invoice);
                //         //         console.log(invoice_save);
                //         //         // console.log(invoice_save[key].find(object => object.key === k));
                //         //         console.log(invoice_save[key]);
                //         //     } else {
                //         //         keyHolder = keyHolder + ',' + k;
                //         //         // keyHolder = keyHolder.push(key.k);
                //         //         console.log('no');
                //         //     }
                //         // }
                //         // keyHolder = keyHolder.push(reformattedArray);
                //         Array.prototype.push.apply(keyHolder, reformattedArray);


                //         // if (window.sessionStorage.getItem('someArray')) {
                //         //     // console.log(value);
                //         // } else {
                //         //     // console.log(value);
                //         //     window.sessionStorage.setItem('someArray', k);
                //         // }
                //     })
                //     // console.log(keyHolder);
                // })
                // console.log(keyHolder);

                // var payers = [];
                // var datas = [];
                // keyHolder.forEach(function(item, index) {
                //     var payer_key = '';
                //     var payer_datas = '';
                //     Object.keys(item).forEach(function(item_value, index_value) {
                //         payer_key = item_value;
                //         console.log(payer_key);

                //         if (payers.includes(payer_key)) {
                //             console.log("have payer "+payer_key);
                //         } else {
                //             console.log("doenst have payer "+payer_key);
                //         }

                //     })
                //     Object.values(item).forEach(function(item_value, index_value) {
                //         payer_datas = item_value;
                //         console.log(payer_datas);
                //     })
                //     const format_datas = [
                //         { key: payer_key, value: payer_datas }
                //     ]

                //     // if (payers.includes(payer_key)) {
                //     //     console.log("have payer "+payer_key);
                //     // } else {
                //     //     console.log("doenst have payer "+payer_key);
                //     // }

                //     payers.push(Object.keys(item)); /*List of Payer*/
                //     datas.push(format_datas.map(({ key, value }) => ({ [payer_key]: payer_datas }) )); /*List of Charges and Summary Not Filtered*/
                // })
                // console.log('List of Payer');
                // console.log(payers);
                // console.log('List of Charges and Summary');
                // console.log(datas);

                /*November 15, 2022 Morning Function to be Fix*/
                    // console.log('-- output start --');
                    // console.log(invoice);
                    // var output = [];
                    // var payers = [];
                    // var payer_structure = [];

                    // keyHolder.forEach(function(item, index) {
                    //     console.log(item);
                    //     console.log(Object.keys(item));
                    //     // output = output.push(item);
                    //     Object.keys(item).forEach(function(payer, idx) {
                    //         // console.log("index: "+idx);
                    //         const kvArray2 = [
                    //             { key: payer, value: payer },
                    //         ];
                    //         const reformattedArray2 = kvArray2.map(({ key, value }) => ({ [payer]: item[payer] }));

                    //         console.log(kvArray2);
                    //         console.log(payer);
                    //         console.log(item[payer]);
                    //         if (payers.includes(payer)) {
                    //             payers;
                    //             // const reformattedArray2 = kvArray2.map(({ key, value }) => ({ [payer]: item[payer] }));
                    //             console.log("payer_structure");
                    //             console.log(payer_structure);
                    //             payer_structure.forEach(function(data, data_index) {
                    //                 // var charge_array = new Array(data[0][payer], item[payer]);
                    //                 // charge_array = data[0][payer], item[payer];
                    //                 console.log('data:');
                    //                 console.log(data[0][payer]);
                    //                 // payer_structure[0][payer].push.apply([item[payer]]);
                    //             })
                    //             // payer_structure[0][payer].push([item[payer]]);
                    //             // console.log(payer_structure[0][payer]);

                    //             console.log('Payer Invoice Charges and Summary');
                    //             // payer_structure[0].push(reformattedArray2);
                    //             console.log(invoice[payer]);
                    //         } else {
                    //             payers.push(payer);
                    //             payer_structure.push(reformattedArray2);
                    //         }
                    //         output.push(item[payer]);
                    //     })
                    // });
                    // console.log(payers);
                    // console.log(output);
                    // console.log(payer_structure);
                    // console.log('-- output end --');
                /**/

                // var output = [];

                // JSON.parse(window.sessionStorage.getItem('invoice_save')).forEach(function(item) {
                //     var existing = output.filter(function(v, i) {
                //         return v.key == item.key;
                //     });

                //     if (existing.length) {
                //         var existingIndex = output.indexOf(existing[0]);
                //         output[existingIndex].charge = output[existingIndex].charge.push.apply(item.charge);
                //     } else {
                //         if (typeof item.charge == 'string')
                //           item.charge = [item.charge];
                //         output.push(item);
                //     }

                // })

                // console.log(invoice);

                // const kvArray = [
                //   { key: 5, value: 10 },
                //   { key: 6, value: 20 },
                //   { key: 7, value: 30 },
                // ];

                // const reformattedArray = kvArray.map(({ key, value }) => ({ [key]: value }));

                // console.log(reformattedArray); // [{ 1: 10 }, { 2: 20 }, { 3: 30 }]
                // console.log(kvArray);

            /**/

        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".custom-control-input2").click(function() {
                var value = $(this).val();
                var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
                // var current_selected = value.slice(-1).pop();
                // alert();
                // console.log(current_selected);

                // window.sessionStorage.setItem('current_selected_charges', current_selected);

                $.ajax({
                    url: 'finance/getPayersByChargePayerGroup?group='+value,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var charges = response.charges;
                        var payer_account = response.payer_accounts;

                        console.log(charges);
                        console.log(payer_account);

                        if (window.sessionStorage.getItem('selected_charges'+value)) {
                            console.log($(".charge-"+value).parent().html());
                            // $(".charge-"+value).remove();
                            $.each(charges, function(key, value) {
                                $(".charge-"+value.id).remove();
                                $("#charge_item"+value.payer_account_id+value.id).remove();
                                $("#quantity_item"+value.payer_account_id+value.id).remove();
                                $("#unit_price_item"+value.payer_account_id+value.id).remove();
                                $("#amount_item"+value.payer_account_id+value.id).remove();
                            })
                            window.sessionStorage.removeItem('selected_charges'+value, value);
                        } else {
                            window.sessionStorage.setItem('selected_charges'+value, value);

                            $.each(charges, function(key, value) {
                                var tbody_count = $("#tbody"+value.payer_account_id).length;
                                var invoice_result = $(".invoice_result").length;
                                var summary_item_count = $(".summary_charges"+payer_account[key].id).length;
                                var type = value.type;
                                // var charge_c_price = 

                                console.log(tbody_count);

                                if (type == "variable") {
                                    var td_amount = '<td class="w-30"><input type="number" value="0" class="form-control amount'+value.id+'-'+value.payer_account_id+'" name="amount[]" onfocus="charge_amount('+value.id+','+value.payer_account_id+');" min="0" oninput="validity.valid||(value='+"'0'"+');"></td>';
                                    var td_amount_summary = '<label class="text-right main-content-label tx-13 font-weight-semibold">'+currency+'0.00</label>';
                                    var c_price = 0;
                                    var tax_detail = 0;
                                } else {
                                    var td_amount = '<td class="w-30"><input type="hidden" value="'+value.c_price+'" class="form-control amount'+value.id+'-'+value.payer_account_id+'" name="amount[]" onfocus="charge_amount('+value.id+','+value.payer_account_id+');" min="0" oninput="validity.valid||(value='+"'0'"+');"><label>'+value.c_price+'</label></td>';
                                    var td_amount_summary = '<label class="text-right main-content-label tx-13 font-weight-semibold">'+currency+value.c_price+'</label>';
                                    var c_price = value.c_price;
                                    var tax_detail = value.tax_amount;
                                }

                                if (tbody_count == 0) {
                                    $("#charge_cards").append('<div class="col-md-6 col-sm-12">\n\
                                        <div class="card h-90" id="payer_account-'+payer_account[key].id+'">\n\
                                            <div class="card-header">\n\
                                                <div class="card-title">'+payer_account[key].display_name+'</div>\n\
                                                <div class="card-options"><button type="button" class="btn btn-primary" data-target="#addCase'+value.id+'" data-toggle="modal"><?php echo lang("add").' '.lang("extras"); ?></button></div>\n\
                                            </div>\n\
                                            <div class="card-body">\n\
                                                <div class="table-responsive">\n\
                                                    <table class="table text-nowrap">\n\
                                                        <thead>\n\
                                                            <tr>\n\
                                                                <th class="w-60"></th>\n\
                                                                <th class="w-30"><?php echo lang("amount"); ?></th>\n\
                                                                <th class="w-10"><?php echo lang("quantity"); ?></th>\n\
                                                            </tr>\n\
                                                        </thead>\n\
                                                        <tbody id="tbody'+value.payer_account_id+'">\n\
                                                            <tr class="charge-'+value.group_id+'">\n\
                                                                <td class="w-60">'+value.category+'<input type="text" name="charge_id[]" value="'+value.id+'"></td>\n\
                                                                '+td_amount+'\n\
                                                                <td class="w-10"><input type="number" class="form-control quantity'+value.id+'-'+value.payer_account_id+'" name="quantity[]" value="1" onfocus="charge_quantity('+value.id+','+value.payer_account_id+');" min="0" oninput="validity.valid||(value='+"'0'"+');"></td>\n\
                                                            </tr>\n\
                                                        </tbody>\n\
                                                    </table>\n\
                                                </div>\n\
                                                <div id="extras-'+value.id+'">\n\
                                                    <hr>\n\
                                                    <div class="table-responsive">\n\
                                                        <table class="table text-nowrap">\n\
                                                            <tbody>\n\
                                                                <tr>\n\
                                                                    <td class="w-10"><?php echo lang('sub_total'); ?>: </td>\n\
                                                                    <td class="w-50"></td>\n\
                                                                    <td class="w-10"></td>\n\
                                                                    <td class="w-30"><input name="item_total[]" id="card_items_total-'+payer_account[key].id+'" class="form-control" value="'+c_price+'"></td>\n\
                                                                </tr>\n\
                                                                <tr>\n\
                                                                    <td class="w-10"><?php echo lang('discount'); ?>: </td>\n\
                                                                    <td class="w-50"><select name="discount_type[]" id="discount'+value.id+'-'+payer_account[key].id+'" class="form-control" onchange="select_discount('+value.id+', '+payer_account[key].id+');"></select></td>\n\
                                                                    <td class="w-20">\n\
                                                                        <div class="input-group" id="selected_payer_price_content_two'+value.id+'">\n\
                                                                            <input type="text" class="form-control" id="discount_input'+value.id+'-'+payer_account[key].id+'" name="discount_input[]" placeholder="Enter Percentage Amount">\n\
                                                                            <span class="input-group-append">\n\
                                                                                <span class="btn btn-primary" type="button">%</span>\n\
                                                                            </span>\n\
                                                                        </div>\n\
                                                                    </td>\n\
                                                                    <td class="w-80"><input name="discount_total[]" class="form-control discount_total" value="0" readonly id="discount_total'+value.id+'-'+payer_account[key].id+'"></td>\n\
                                                                    </div>\n\
                                                                </tr>\n\
                                                                <tr>\n\
                                                                    <td class="w-10"><?php echo lang('tax'); ?>: </td>\n\
                                                                    <td class="w-50"></td>\n\
                                                                    <td class="w-10"></td>\n\
                                                                    <td class="w-30"><input name="tax[]" id="tax_total'+value.id+'-'+payer_account[key].id+'" class="form-control tax_total" value="'+tax_detail+'"></td>\n\
                                                                </tr>\n\
                                                            </tbody>\n\
                                                        </table>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>');

                                    // $("#modal-area").append('<div class="modal fade" id="addCase'+value.id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">\n\
                                    //     <div class="modal-dialog modal-sm" role="document">\n\
                                    //         <div class="modal-content modal-content-demo">\n\
                                    //             <div class="modal-header">\n\
                                    //                 <h6 class="modal-title"><?php echo lang('add'). ' ' . lang('discount'); ?> '+payer_account[key].id+'</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>\n\
                                    //             </div>\n\
                                    //             <form role="form" id="addCaseForm" action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data">\n\
                                    //                 <div class="modal-body">\n\
                                    //                     <div class="row">\n\
                                    //                         <div class="col-md-12 col-sm-12">\n\
                                    //                             <div class="form-group">\n\
                                    //                                 <label class="form-label"><?php echo lang("discount") ?></label>\n\
                                    //                                 <select id="discount'+value.id+'" onchange="select_discount('+value.id+', '+payer_account[key].id+');"></select>\n\
                                    //                             </div>\n\
                                    //                         </div>\n\
                                    //                     </div>\n\
                                    //                 </div>\n\
                                    //             </form>\n\
                                    //         </div>\n\
                                    //     </div>\n\
                                    // </div>');

                                    $("#discount"+value.id+'-'+payer_account[key].id).select2({
                                        placeholder: '<?php echo lang('select_payer'); ?>',
                                        allowClear: true,
                                        ajax: {
                                            url: 'finance/getDiscountInfo',
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
                                } else {
                                    /*<td><input type="number" class="form-control amount'+value.id+'-'+value.payer_account_id+'" name="amount[]" onfocus="charge_amount('+value.id+','+value.payer_account_id+');" min="0" oninput="validity.valid||(value='+"'0'"+');" onblur="onBlur('+value.id+','+value.payer_account_id+')"></td>*/
                                    $("#tbody"+value.payer_account_id).append('<tr class="charge-'+value.group_id+'">\n\
                                            <td>'+value.category+'<input type="text" name="charge_id[]" value="'+value.id+'"></td>\n\
                                            '+td_amount+'\n\
                                            <td><input type="number" class="form-control quantity'+value.id+'-'+value.payer_account_id+'" name="quantity[]" onfocus="charge_quantity('+value.id+','+value.payer_account_id+');" min="0" oninput="validity.valid||(value='+"'0'"+');" value="1"></td>\n\
                                        </tr>');
                                }

                                if (summary_item_count == 0) {
                                    $(".item_summary_tbody").append('<tr>\n\
                                        <td class="valign-middle border w-60">\n\
                                            <div class="invoice-notes summary_charges'+payer_account[key].id+'">\n\
                                                <label class="main-content-label tx-13 font-weight-semibold">'+payer_account[key].display_name+'</label>\n\
                                                <div id="charge_item'+payer_account[key].id+value.id+'"><p>'+value.category+'</p></div>\n\
                                            </div>\n\
                                        </td>\n\
                                        <td class="tx-right border font-weight-semibold w-10">\n\
                                            <div class="invoice-notes summary_quantity'+payer_account[key].id+'">\n\
                                                <label class="main-content-label tx-13 font-weight-semibold"></label>\n\
                                                <div class="text-center" id="quantity_item'+payer_account[key].id+value.id+'"></div>\n\
                                            </div>\n\
                                        </td>\n\
                                        <td class="tx-right border font-weight-semibold w-15">\n\
                                            <div class="invoice-notes summary_unit_price'+payer_account[key].id+'">\n\
                                                <label class="text-right main-content-label tx-13 font-weight-semibold"></label>\n\
                                                <div class="text-right" id="unit_price_item'+payer_account[key].id+value.id+'">'+td_amount_summary+'</div>\n\
                                            </div>\n\
                                        </td>\n\
                                        <td class="tx-right border font-weight-semibold w-15">\n\
                                            <div class="invoice-notes summary_amount'+payer_account[key].id+'">\n\
                                                <label class="main-content-label tx-13 font-weight-semibold"></label>\n\
                                                <div class="text-right" id="amount_item'+payer_account[key].id+value.id+'"></div>\n\
                                                <input type="hidden" name="amount_input" id="amount_item_input'+payer_account[key].id+value.id+'">\n\
                                            </div>\n\
                                        </td>\n\
                                    </tr>\n\
                                    ')

                                } else {
                                    var charge_item_variable = 'charge_item'+payer_account[key].id+value.id;
                                    var quantity_item_variable = 'quantity_item'+payer_account[key].id+value.id;
                                    var unit_price_item_variable = 'unit_price_item'+payer_account[key].id+value.id;
                                    var amount_item_variable = 'amount_item'+payer_account[key].id+value.id;
                                    var amount_item_input = 'amount_item_input'+payer_account[key].id+value.id;
                                    // alert(item_variable);
                                    $(".summary_charges"+payer_account[key].id).append('<div id="'+charge_item_variable+'"><p>'+value.category+'</p></div>');
                                    $(".summary_quantity"+payer_account[key].id).append('<div class="text-center" id="'+quantity_item_variable+'"></div>');
                                    $(".summary_unit_price"+payer_account[key].id).append('<div class="text-right" id="'+unit_price_item_variable+'">'+td_amount_summary+'</div>');
                                    $(".summary_amount"+payer_account[key].id).append('<div class="text-right" id="'+amount_item_variable+'"></div>');
                                    $(".summary_amount"+payer_account[key].id).append('<input type="hidden" name="amount_input" id="'+amount_item_input+'">');
                                }

                                if (invoice_result == 0) {
                                    $(".item_summary_tbody_result").append('<tr class="invoice_result">\n\
                                        <td rowspan="5" class="td class="valign-top border w-60">\n\
                                            <label><?php echo lang("note"); ?></label>\n\
                                        </td>\n\
                                        <td class="tx-right border font-weight-semibold w-10">\n\
                                            <label><?php echo lang("sub_total"); ?></label>\n\
                                        </td>\n\
                                        <td colspan="2" class="tx-right border font-weight-semibold w-30 text-right" id="invoice_result_subtotal">\n\
                                        </td>\n\
                                    </tr>\n\
                                    <tr>\n\
                                        <td class="tx-right border font-weight-semibold w-10">\n\
                                            <label><?php echo lang("tax"); ?></label>\n\
                                        </td>\n\
                                        <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_tax"></td>\n\
                                    </tr>\n\
                                    <tr>\n\
                                        <td class="tx-right border font-weight-semibold w-10">\n\
                                            <label><?php echo lang("discount"); ?></label>\n\
                                        </td>\n\
                                        <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_discount"></td>\n\
                                    </tr>\n\
                                    <tr>\n\
                                        <td class="tx-right border font-weight-semibold w-10">\n\
                                            <label><?php echo lang("deposited_amount"); ?></label>\n\
                                        </td>\n\
                                        <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_deposited"></td>\n\
                                    </tr>\n\
                                    <tr>\n\
                                        <td class="tx-right border font-weight-semibold w-10">\n\
                                            <label><?php echo lang("total")." ".lang("due"); ?></label>\n\
                                        </td>\n\
                                        <td colspan="2" class="font-weight-semibold text-right" id="invoice_result_due"></td>\n\
                                    </tr>\n\
                                    ');
                                }

                            })
                            /*code here*/
                        }

                        $(".payer_table").DataTable({
                            "searchable": false,
                            ordering: false,
                        });
                    } 
                })
            });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#amount_received").keyup(function() {
                var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
                var value = $(this).val();
                $("#invoice_result_deposited").text('(Personal) '+currency+' '+Math.round((value*100)/100).toFixed(2))

                var cnt = 0;
                $("[name='amount_input']").each(function() {
                    cnt += Number(this.value);
                });

                var input = document.getElementsByName('discount_total[]');

                var discount = 0;
                for (var i = 0; i < input.length; i++) {
                    discount += Number(input[i].value);
                }

                $("#invoice_result_due").empty().append('<label>'+currency+' '+((((cnt*100)/100)-discount)-value).toFixed(2)+'</label>');

            })

            $("#editPaymentForm").find("input[name='remarks']").keyup(function() {
                var value = $(this).val();
                $("#invoice_result_note").empty().append(value);
            })
        })
    </script>

    <script type="text/javascript">
        function select_discount2(value, payer_id, tax_id, tax_amount, c_price) {
            var discount = $("#discount"+value+'-'+payer_id).val();
            var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
            // var charge_item = $("#payer_account-"+payer_id).find('[name=charge_id[]]').val();
            var charge_items = $("#payer_account-"+payer_id).find("input[name='charge_id[]']").map(function(){return $(this).val();}).get();
            var quantity_items = $("#payer_account-"+payer_id).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();
            // console.log('discount: '+discount);
            console.log(charge_items);
            
            $.ajax({
                url: 'finance/getExtrasByDiscountIdByChargeIdByJason?charge='+charge_items+'&discount='+discount,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function(response) {
                    var discount_details = response.discount_details;
                    var charge_details = response.charge_details;
                    var taxes = response.taxes;
                    // console.log(taxes);
                    var totaltax = 0;
                    var totaldiscount = 0;
                    var totalitemsamount = 0;
                    $.each(charge_details, function(key, value) {
                        var charge_unit_price = $('.amount'+value.id+'-'+value.payer_account_id).val();
                        var item_tax = value.tax_amount;
                        if (item_tax == null) {
                            item_tax = charge_unit_price*(taxes[key].rate/100);
                        }

                        if (discount != null) {
                            var discount_rate = charge_unit_price*(discount_details.rate/100);
                            totaldiscount = totaldiscount + (parseFloat(discount_rate)*quantity_items[key]);
                        }

                        totaltax = totaltax + (parseFloat(item_tax)*quantity_items[key]);

                        totalitemsamount = totalitemsamount + (parseFloat(charge_unit_price)*quantity_items[key]);

                        // var total_tax += tax;
                        // console.log(value.tax_amount);
                    })
                    // console.log('total: '+totaltax+'');

                    $('#tax_total'+value+'-'+payer_id).val(totaltax);

                    $('#card_items_total-'+payer_id).val(totalitemsamount);

                    if (discount != null) {
                        $('#discount_total'+value+'-'+payer_id).val(totaldiscount);
                        $('#discount_input'+value+'-'+payer_id).val(discount_details.rate);
                    }

                    var totalsummarydiscount = 0;
                    $('.discount_total').each(function() {
                        totalsummarydiscount += Number(this.value);
                    });
                    $("#invoice_result_discount").text(currency+' '+Math.round((totalsummarydiscount*100)/100).toFixed(2));

                    var totalsummarytax = 0;  
                    $('.tax_total').each(function() {
                        totalsummarytax += Number(this.value);
                    });

                    // console.log(totalsummarytax);
                    $("#invoice_result_tax").text(currency+' '+Math.round((totalsummarytax*100)/100).toFixed(2));

                    var cnt = 0;  
                    // console.log(p_value);
                    $("[name='amount_input']").each(function() {
                        cnt += Number(this.value);
                    });

                    var total_due = (cnt-totalsummarytax)-totalsummarydiscount;
                    
                    $("#invoice_result_due").text(currency+' '+Math.round((total_due*100)/100).toFixed(2));
                }
            });
        }
    </script>

    <script type="text/javascript">
        function select_discount3(payer_id) {
            if ('<?php echo $payment->invoice_group_number; ?>') {
                $("#discount_type_input"+payer_id).empty();
                var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
                // console.log(value+' - '+payer_id);
                var invoice_items = JSON.parse(window.sessionStorage.getItem('new_invoice-'+payer_id));
                var amount_items = $("#payer_account-"+payer_id).find("input[name='amount[]']").map(function(){return $(this).val();}).get();
                var quantity_items = $("#payer_account-"+payer_id).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();

                var selected = $('#discount'+payer_id).find('option:selected');
                var rate = selected.data('rate');
                var amount = selected.data('amount');
                var discount_type_id = selected.data('discount_type_id');
                console.log(selected.data);

                var invoice_item_extras = inv_items(payer_id);

                var invoice_item_amount = invoice_item_extras[1];
                var invoice_tax_amount = invoice_item_extras[0];

                if (discount_type_id == 1) {
                    var invoice_discount_amount = parseFloat(invoice_item_amount * (rate/100));
                    var rate = rate;
                    $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'" hidden>\n\
                        <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Percentage Amount">\n\
                        <span class="input-group-append">\n\
                            <span class="btn btn-primary" type="button">%</span>\n\
                        </span>\n\
                    </div><div><label class="mt-2">'+rate+' %'+'</label></div>\n\
                    ');
                } else if (discount_type_id == 2) {
                    var invoice_discount_amount = parseFloat(amount);
                    var rate = amount;
                    $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'" hidden>\n\
                        <span class="input-group-append">\n\
                            <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                        </span>\n\
                        <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Fixed Amount">\n\
                    </div><div><label class="mt-2">'+currency+' '+rate+'</label></div>');
                } else if (discount_type_id == 3) {
                    var invoice_discount_amount = 0;
                    var rate = 0;
                    $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'">\n\
                        <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Percentage Amount" onkeyup="computeDiscountPercentage('+invoice_item_amount+','+payer_id+');">\n\
                        <span class="input-group-append">\n\
                            <span class="btn btn-primary" type="button">%</span>\n\
                        </span>\n\
                    </div>\n\
                    ');
                } else if (discount_type_id == 4) {
                    var invoice_discount_amount = 0;
                    var rate = 0;
                    $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'">\n\
                        <span class="input-group-append">\n\
                            <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                        </span>\n\
                        <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Fixed Amount" onkeyup="computeDiscountAmount('+invoice_item_amount+','+payer_id+')">\n\
                    </div>');
                }

                if (is_display_prices_with_tax_included() == "1") {
                    var payer_account_total = parseFloat(parseFloat(invoice_item_amount-invoice_discount_amount)).toFixed(2)
                } else {
                    var payer_account_total = parseFloat(parseFloat((invoice_item_amount+invoice_tax_amount)-invoice_discount_amount)).toFixed(2)
                }

                $('#discount_input-'+payer_id).val(rate);
                $('#discount_total-'+payer_id).val(parseFloat(invoice_discount_amount).toFixed(2));
                $('#payer_total-'+payer_id).val(payer_account_total);

                var all_discount = computeAllDiscount();

                $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

                var total_due = computeDue();
                $("#invoice_result_due").text(currency+' '+parseFloat(total_due-all_discount).toFixed(2));
            } else {
                $("#discount_type_input"+payer_id).empty();
                var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
                // console.log(value+' - '+payer_id);
                var invoice_items = JSON.parse(window.sessionStorage.getItem('new_invoice-'+payer_id));
                var amount_items = $("#payer_account-"+payer_id).find("input[name='amount[]']").map(function(){return $(this).val();}).get();
                var quantity_items = $("#payer_account-"+payer_id).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();
                var data = $("#discount"+payer_id).select2('data')[0];
                // console.log(data);
                // console.log(invoice_items);
                
                    var invoice_item_extras = inv_items(payer_id);

                    var invoice_item_amount = invoice_item_extras[1];
                    var invoice_tax_amount = invoice_item_extras[0];
                    // var invoice_discount_amount = invoice_item_amount * (parseFloat(data.rate)/100);

                    if (data.discount_type_id == 1) {
                        var invoice_discount_amount = parseFloat(invoice_item_amount * (data.rate/100));
                        var rate = data.rate;
                        $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'" hidden>\n\
                            <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Percentage Amount">\n\
                            <span class="input-group-append">\n\
                                <span class="btn btn-primary" type="button">%</span>\n\
                            </span>\n\
                        </div><div><label class="mt-2">'+rate+' %'+'</label></div>\n\
                        ');
                    } else if (data.discount_type_id == 2) {
                        var invoice_discount_amount = parseFloat(data.amount);
                        var rate = data.amount;
                        $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'" hidden>\n\
                            <span class="input-group-append">\n\
                                <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                            </span>\n\
                            <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Fixed Amount">\n\
                        </div><div><label class="mt-2">'+currency+' '+rate+'</label></div>');
                    } else if (data.discount_type_id == 3) {
                        var invoice_discount_amount = 0;
                        var rate = 0;
                        $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'">\n\
                            <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Percentage Amount" onkeyup="computeDiscountPercentage('+invoice_item_amount+','+payer_id+');">\n\
                            <span class="input-group-append">\n\
                                <span class="btn btn-primary" type="button">%</span>\n\
                            </span>\n\
                        </div>\n\
                        ');
                    } else if (data.discount_type_id == 4) {
                        var invoice_discount_amount = 0;
                        var rate = 0;
                        $("#discount_type_input"+payer_id).append('<div class="input-group" id="selected_payer_price_content_two'+payer_id+'">\n\
                            <span class="input-group-append">\n\
                                <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                            </span>\n\
                            <input type="text" class="form-control" id="discount_input-'+payer_id+'" name="discount_input[]" placeholder="Enter Fixed Amount" onkeyup="computeDiscountAmount('+invoice_item_amount+','+payer_id+')">\n\
                        </div>');
                    }

                    if (is_display_prices_with_tax_included() == "1") {
                        var payer_account_total = parseFloat(parseFloat(invoice_item_amount-invoice_discount_amount)).toFixed(2)
                    } else {
                        var payer_account_total = parseFloat(parseFloat((invoice_item_amount+invoice_tax_amount)-invoice_discount_amount)).toFixed(2)
                    }

                    $('#discount_input-'+payer_id).val(rate);
                    $('#discount_total-'+payer_id).val(parseFloat(invoice_discount_amount).toFixed(2));
                    $('#payer_total-'+payer_id).val(payer_account_total);

                    var all_discount = computeAllDiscount();

                    $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

                    var total_due = computeDue();
                    $("#invoice_result_due").text(currency+' '+parseFloat(total_due-all_discount).toFixed(2));
                
                // var discount = $("#discount"+value+'-'+payer_id).val();
                // var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
                // var charge_items = $("#payer_account-"+payer_id).find("input[name='charge_id[]']").map(function(){return $(this).val();}).get();
                // var quantity_items = $("#payer_account-"+payer_id).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();

                // $.ajax({
                //     url: 'finance/getExtrasByDiscountIdByChargeIdByJason?charge='+charge_items+'&discount='+discount,
                //     method: 'GET',
                //     data: '',
                //     dataType: 'json',
                //     success: function(response) {
                //         var discount_details = response.discount_details;
                //         var charge_details = response.charge_details;
                //         var taxes = response.taxes;
                //     }
                // })
            }
        }
    </script>

    <script type="text/javascript">
        function computeDiscountPercentage(subtotal, payer_id) {
            var discount_rate = $("#discount_input-"+payer_id).val();
            $('#payer_total-'+payer_id).val((subtotal-((parseInt(discount_rate)/100)*subtotal)).toFixed(2));
            $('#discount_total-'+payer_id).val(((parseInt(discount_rate)/100)*subtotal).toFixed(2));
            var all_discount = computeAllDiscount();
            $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

            return true;
        }
        function computeDiscountAmount(subtotal, payer_id) {
            var discount_rate = $("#discount_input-"+payer_id).val();
            $('#payer_total-'+payer_id).val((parseInt(subtotal)-parseInt(discount_rate)).toFixed(2));
            $('#discount_total-'+payer_id).val(discount_rate);
            var all_discount = computeAllDiscount();
            $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

            return true;
        }
    </script>

    <script type="text/javascript">
        function select_discount(value, payer_id) {
            var discount = $("#discount"+value+'-'+payer_id).val();
            var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
            // var charge_item = $("#payer_account-"+payer_id).find('[name=charge_id[]]').val();
            var charge_items = $("#payer_account-"+payer_id).find("input[name='charge_id[]']").map(function(){return $(this).val();}).get();
            var quantity_items = $("#payer_account-"+payer_id).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();
            // console.log('discount: '+discount);
            $.ajax({
                url: 'finance/getExtrasByDiscountIdByChargeIdByJason?charge='+charge_items+'&discount='+discount,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function(response) {
                    var discount_details = response.discount_details;
                    var charge_details = response.charge_details;
                    var taxes = response.taxes;
                    // console.log(taxes);
                    var totaltax = 0;
                    var totaldiscount = 0;
                    var totalitemsamount = 0;
                    $.each(charge_details, function(key, value) {
                        var charge_unit_price = $('.amount'+value.id+'-'+value.payer_account_id).val();
                        var item_tax = value.tax_amount;
                        if (item_tax == null) {
                            item_tax = charge_unit_price*(taxes[key].rate/100);
                        }

                        if (discount != null) {
                            var discount_rate = charge_unit_price*(discount_details.rate/100);
                            totaldiscount = totaldiscount + (parseFloat(discount_rate)*quantity_items[key]);
                        }

                        totaltax = totaltax + (parseFloat(item_tax)*quantity_items[key]);

                        totalitemsamount = totalitemsamount + (parseFloat(charge_unit_price)*quantity_items[key]);

                        // var total_tax += tax;
                        // console.log(value.tax_amount);
                    })
                    // console.log('total: '+totaltax+'');

                    $('#tax_total'+value+'-'+payer_id).val(totaltax);

                    $('#card_items_total-'+payer_id).val(totalitemsamount);

                    if (discount != null) {
                        $('#discount_total'+value+'-'+payer_id).val(totaldiscount);
                        $('#discount_input'+value+'-'+payer_id).val(discount_details.rate);
                    }

                    var totalsummarydiscount = 0;
                    $('.discount_total').each(function() {
                        totalsummarydiscount += Number(this.value);
                    });
                    $("#invoice_result_discount").text(currency+' '+Math.round((totalsummarydiscount*100)/100).toFixed(2));

                    var totalsummarytax = 0;  
                    $('.tax_total').each(function() {
                        totalsummarytax += Number(this.value);
                    });

                    console.log(totalsummarytax);
                    $("#invoice_result_tax").text(currency+' '+Math.round((totalsummarytax*100)/100).toFixed(2));

                    var cnt = 0;  
                    // console.log(p_value);
                    $("[name='amount_input']").each(function() {
                        cnt += Number(this.value);
                    });

                    var total_due = (cnt-totalsummarytax)-totalsummarydiscount;
                    
                    $("#invoice_result_due").text(currency+' '+Math.round((total_due*100)/100).toFixed(2));
                }
            });
        }
    </script>

    <script type="text/javascript">
        function charge_amount(charge_id, payer_id, tax_id, tax_amount, tax_percentage, c_price) {
            var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
            var value = $(".amount"+charge_id+'-'+payer_id).val();
            var quantity = $(".quantity"+charge_id+'-'+payer_id).val();
            var result = value * quantity;
            var sub_total = $("#subtotal").val();
            var invoice_items = JSON.parse(window.sessionStorage.getItem('new_invoice-'+payer_id));
            var data = $("#discount"+payer_id).select2('data')[0];

            console.log(value);

            var charge_items = $("#payer_account-"+payer_id).find("input[name='charge_id[]']").map(function(){return $(this).val();}).get();
            var amount_items = $("#payer_account-"+payer_id).find("input[name='amount[]']").map(function(){return $(this).val();}).get();
            var quantity_items = $("#payer_account-"+payer_id).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();
            console.log('amount item Bruh:');
            console.log(amount_items);
            // alert(value);
            // $(".summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append(value);
            // $("#quantity_item"+payer_id+charge_id).empty().append('<p>'+value+'</p>');
            // $("#subtotal").empty();
            $("#unit_price_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+((value * 100) / 100).toFixed(2)+'</label>');
            $("#amount_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+((result * 100) / 100).toFixed(2)+'</label>');
            $("#amount_item_input"+payer_id+charge_id).empty().val(((result * 100) / 100).toFixed(2));

            var cnt = 0;  
            var p_value = $("#amount_item"+payer_id+charge_id).find('p').text();
            // console.log(p_value);
            $("[name='amount_input']").each(function() {
                cnt += Number(this.value);
            });
            $("#subtotal").val(cnt);

            console.log("tax_amount: "+tax_amount);

            if (tax_amount == 0) {
                tax_amount = value;
            }

            console.log(tax_amount)

            $("#invoice_result_subtotal").empty().append('<label>'+currency+' '+((cnt*100)/100).toFixed(2)+'</label>');

            // window.sessionStorage.setItem('item_quantity-'+charge_id+payer_id, quantity);

            // var item_total = c_price * window.sessionStorage.getItem('item_quantity-'+charge_id+payer_id);

            console.log(charge_items);
            console.log(amount_items);
            console.log(quantity_items);
            console.log(invoice_items);

            var invoice_item_extras = inv_items(payer_id);

            var invoice_item_amount = invoice_item_extras[1];
            var invoice_tax_amount = invoice_item_extras[0];

            console.log("tax_amount: "+invoice_tax_amount);
            var invoice_discount_extras = computeDiscount(payer_id, invoice_item_amount, invoice_tax_amount);

            var payer_account_total = invoice_discount_extras[0];
            var invoice_discount_amount = invoice_discount_extras[1];
            var rate = invoice_discount_extras[2];
            discount = invoice_discount_extras[3];

            console.log("discount_amount: "+invoice_discount_amount);
            // $("#invoice_result_discount").empty().append('<label>'+currency+' '+(discount).toFixed(2)+'</label>');
            $('#discount_total-'+payer_id).val(parseFloat(invoice_discount_amount).toFixed(2));
            $('#payer_total-'+payer_id).val(payer_account_total);
            $('#card_items_total-'+payer_id).val((invoice_item_amount).toFixed(2));
            $('#tax_total-'+payer_id).val((invoice_tax_amount).toFixed(2));

            setDiscountInputOnKeyUpParameter(payer_id, invoice_item_amount);

            var all_discount = computeAllDiscount();
            $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

            computeTax();

            var total_due = computeDue();
            $("#invoice_result_due").text(currency+' '+parseFloat(total_due-all_discount).toFixed(2));

            // console.log("item_total : "+item_total);
            console.log(invoice_item_amount);

            // if (window.sessionStorage.getItem('payer_subtotal-'+payer_id)) {
            //     var payer_subtotal = parseInt(window.sessionStorage.getItem('payer_subtotal-'+payer_id)) + parseInt(item_total);
            //     window.sessionStorage.setItem('payer_subtotal-'+payer_id, payer_subtotal);
            // } else {
            //     window.sessionStorage.setItem('payer_subtotal-'+payer_id, item_total);
            // }

            /**/
                // select_discount2(charge_id, payer_id, tax_id, tax_amount, c_price);

                // $("#subtotal").empty().val((Math.round(result * 100) / 100).toFixed(2));
                // $("#unit_price_item"+payer_id+charge_id).append('<p>'+value+'</p>');
                // $("#summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append('<p>'+value+'</p>')
                // console.log(charge);

                // $(document).keyup(function() {
                //     var value = $(".amount"+charge_id+'-'+payer_id).val();
                //     var quantity = $(".quantity"+charge_id+'-'+payer_id).val();
                //     var result = value * quantity;
                //     var sub_total = $("#subtotal").val();
                //     // alert(value);
                //     // $(".summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append(value);
                //     // $("#quantity_item"+payer_id+charge_id).empty().append('<p>'+value+'</p>');
                //     // $("#subtotal").empty();
                //     $("#unit_price_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+(Math.round(value * 100) / 100).toFixed(2)+'</label>');
                //     $("#amount_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+(Math.round(result * 100) / 100).toFixed(2)+'</label>');
                //     $("#amount_item_input"+payer_id+charge_id).empty().val((Math.round(result * 100) / 100).toFixed(2));

                //     var cnt = 0;  
                //     var p_value = $("#amount_item"+payer_id+charge_id).find('p').text();
                //     // console.log(p_value);
                //     $("[name='amount_input']").each(function() {
                //         cnt += Number(this.value);
                //     });
                //     $("#subtotal").val(cnt);

                //     select_discount2(charge_id, payer_id, c_price);
                //     // $("#subtotal").empty().val((Math.round(result * 100) / 100).toFixed(2));
                //     // $("#unit_price_item"+payer_id+charge_id).append('<p>'+value+'</p>');
                //     // $("#summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append('<p>'+value+'</p>')
                //     // console.log(charge);
                // });

                // $(document).change(function() {
                //     var value = $(".amount"+charge_id+'-'+payer_id).val();
                //     var quantity = $(".quantity"+charge_id+'-'+payer_id).val();
                //     var result = value * quantity;
                //     var sub_total = $("#subtotal").val();
                //     // alert(value);
                //     // $(".summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append(value);
                //     // $("#quantity_item"+payer_id+charge_id).empty().append('<p>'+value+'</p>');
                //     // $("#subtotal").empty();
                //     $("#unit_price_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+(Math.round(value * 100) / 100).toFixed(2)+'</label>');
                //     $("#amount_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+(Math.round(result * 100) / 100).toFixed(2)+'</label>');
                //     $("#amount_item_input"+payer_id+charge_id).empty().val((Math.round(result * 100) / 100).toFixed(2));

                //     var cnt = 0;  
                //     var p_value = $("#amount_item"+payer_id+charge_id).find('p').text();
                //     // console.log(p_value);
                //     $("[name='amount_input']").each(function() {
                //         cnt += Number(this.value);
                //     });
                //     $("#subtotal").val(cnt);

                //     select_discount2(charge_id, payer_id, c_price);
                //     // $("#subtotal").empty().val((Math.round(result * 100) / 100).toFixed(2));
                //     // $("#unit_price_item"+payer_id+charge_id).append('<p>'+value+'</p>');
                //     // $("#summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append('<p>'+value+'</p>')
                //     // console.log(charge);
                // });
            /**/
        }

        function charge_quantity(charge_id, payer_id, tax_id, tax_amount, tax_percentage, c_price) {
            var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
            var quantity = $(".quantity"+charge_id+'-'+payer_id).val();
            var value = $(".amount"+charge_id+'-'+payer_id).val();
            var result = value * quantity;
            var sub_total = $("#subtotal").val();
            var invoice_items = JSON.parse(window.sessionStorage.getItem('new_invoice-'+payer_id));
            var data = $("#discount"+payer_id).select2('data')[0];
            var sample_array = [
                {id: 1, name: 'foo'},
                {id: 2, name: 'bar'},
            ];
            var charge_items = $("#payer_account-"+payer_id).find("input[name='charge_id[]']").map(function(){return $(this).val();}).get();
            var amount_items = $("#payer_account-"+payer_id).find("input[name='amount[]']").map(function(){return $(this).val();}).get();
            var quantity_items = $("#payer_account-"+payer_id).find("input[name='quantity[]']").map(function(){return $(this).val();}).get();

            console.log(tax_id);
            // alert(value);
            // $(".summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append(value);
            // $("#subtotal").empty();
            $("#quantity_item"+payer_id+charge_id).empty().append('<p>'+quantity+'</p>');
            $("#amount_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+((result * 100) / 100).toFixed(2)+'</label>');
            $("#amount_item_input"+payer_id+charge_id).empty().val(((result * 100) / 100).toFixed(2));

            var cnt = 0;  
            var p_value = $("#amount_item"+payer_id+charge_id).find('p').text();
            // console.log(p_value);
            $("[name='amount_input']").each(function() {
                cnt += Number(this.value);
            });
            $("#subtotal").val(cnt);
            $("#invoice_result_subtotal").empty().append('<label>'+currency+' '+((cnt*100)/100).toFixed(2)+'</label>');

            // window.sessionStorage.setItem('item_quantity-'+charge_id+payer_id, quantity);
            // window.sessionStorage.setItem('item_amount-'+charge_id+payer_id, c_price);

            // var item_total = window.sessionStorage.getItem('item_amount-'+charge_id+payer_id) * window.sessionStorage.getItem('item_quantity-'+charge_id+payer_id);

            console.log(charge_items);
            console.log(amount_items);
            console.log(quantity_items);
            console.log(invoice_items);

            var invoice_item_extras = inv_items(payer_id);

            var invoice_item_amount = invoice_item_extras[1];
            var invoice_tax_amount = invoice_item_extras[0];

            var invoice_discount_extras = computeDiscount(payer_id, invoice_item_amount, invoice_tax_amount);

            var payer_account_total = invoice_discount_extras[0];
            var invoice_discount_amount = invoice_discount_extras[1];
            var rate = invoice_discount_extras[2];
            discount = invoice_discount_extras[3];

            // $("#invoice_result_discount").empty().append('<label>'+currency+' '+(discount).toFixed(2)+'</label>');
            $('#discount_total-'+payer_id).val(parseFloat(invoice_discount_amount).toFixed(2));
            $('#payer_total-'+payer_id).val(payer_account_total);
            $('#card_items_total-'+payer_id).val(parseFloat(invoice_item_amount).toFixed(2));
            $('#tax_total-'+payer_id).val(parseFloat(invoice_tax_amount).toFixed(2));

            setDiscountInputOnKeyUpParameter(payer_id, invoice_item_amount);

            var all_discount = computeAllDiscount();
            $("#invoice_result_discount").empty().append('<label>'+currency+' '+all_discount.toFixed(2)+'</label>');

            computeTax();

            var total_due = computeDue();
            $("#invoice_result_due").text(currency+' '+parseFloat(total_due-all_discount).toFixed(2));

            console.log(invoice_item_amount);

            // console.log(Object.keys(invoice_items['charges']));

            // .map(charge => charge.name)
            // if (window.sessionStorage.getItem('payer_subtotal-'+payer_id)) {
            //     var payer_subtotal = parseInt(window.sessionStorage.getItem('payer_subtotal-'+payer_id)) + parseInt(item_total);
            //     window.sessionStorage.setItem('payer_subtotal-'+payer_id, payer_subtotal);
            // } else {
            //     window.sessionStorage.setItem('payer_subtotal-'+payer_id, item_total);
            // }

            /**/
                // $("#subtotal").empty().val(sub_total+result);
                // $("#unit_price_item"+payer_id+charge_id).append('<p>'+value+'</p>');
                // $("#summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append('<p>'+value+'</p>')
                // console.log(charge);

                // select_discount2(charge_id, payer_id, tax_id, tax_amount, c_price);

                // $(document).keyup(function() {
                //     var quantity = $(".quantity"+charge_id+'-'+payer_id).val();
                //     var value = $(".amount"+charge_id+'-'+payer_id).val();
                //     var result = value * quantity;
                //     var sub_total = $("#subtotal").val();
                //     // alert(value);
                //     // $(".summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append(value);
                //     // $("#subtotal").empty();
                //     $("#quantity_item"+payer_id+charge_id).empty().append('<p>'+quantity+'</p>');
                //     $("#amount_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+(Math.round(result * 100) / 100).toFixed(2)+'</label>');
                //     $("#amount_item_input"+payer_id+charge_id).empty().val((Math.round(result * 100) / 100).toFixed(2));

                //     var cnt = 0;  
                //     var p_value = $("#amount_item"+payer_id+charge_id).find('p').text();
                //     // console.log(p_value);
                //     $("[name='amount_input']").each(function() {
                //         cnt += Number(this.value);
                //     });
                //     $("#subtotal").val(cnt);
                //     $("#invoice_result_subtotal").empty().append('<label>'+currency+' '+Math.round((cnt*100)/100).toFixed(2)+'</label>');
                //     // $("#subtotal").empty().val(sub_total+result);
                //     // $("#unit_price_item"+payer_id+charge_id).append('<p>'+value+'</p>');
                //     // $("#summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append('<p>'+value+'</p>')
                //     // console.log(charge);

                //     select_discount2(charge_id, payer_id, c_price);
                // })

                // $(document).change(function() {
                //     var quantity = $(".quantity"+charge_id+'-'+payer_id).val();
                //     var value = $(".amount"+charge_id+'-'+payer_id).val();
                //     var result = value * quantity;
                //     var sub_total = $("#subtotal").val();
                //     // alert(value);
                //     // $(".summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append(value);
                //     // $("#subtotal").empty();
                //     $("#quantity_item"+payer_id+charge_id).empty().append('<p>'+quantity+'</p>');
                //     $("#amount_item"+payer_id+charge_id).empty().append('<label class="main-content-label tx-13 font-weight-semibold">'+currency+(Math.round(result * 100) / 100).toFixed(2)+'</label>');
                //     $("#amount_item_input"+payer_id+charge_id).empty().val((Math.round(result * 100) / 100).toFixed(2));

                //     var cnt = 0;  
                //     var p_value = $("#amount_item"+payer_id+charge_id).find('p').text();
                //     // console.log(p_value);
                //     $("[name='amount_input']").each(function() {
                //         cnt += Number(this.value);
                //     });
                //     $("#subtotal").val(cnt);
                //     $("#invoice_result_subtotal").empty().append('<label>'+currency+' '+Math.round((cnt*100)/100).toFixed(2)+'</label>');
                //     // $("#subtotal").empty().val(sub_total+result);
                //     // $("#unit_price_item"+payer_id+charge_id).append('<p>'+value+'</p>');
                //     // $("#summary_unit_price"+payer_id).find('[id="unit_price_item'+payer_id+'"]').append('<p>'+value+'</p>')
                //     // console.log(charge);

                //     select_discount2(charge_id, payer_id, c_price);
                // })
            /**/
        }

    </script>

    <script type="text/javascript">
        function display_charge() {
            $(".custom-control-input2").click(function() {
                var value = $(this).val();
                // var current_selected = value.slice(-1).pop();
                // alert();
                // console.log(current_selected);

                window.sessionStorage.setItem('selected_charges', value);
                // window.sessionStorage.setItem('current_selected_charges', current_selected);

                $.ajax({
                    url: 'finance/getPayersByChargePayerGroup?group='+value,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var charges = response.charges;
                        var payer_account = response.payer_accounts;

                        console.log(charges);

                        $.each(charges, function(key, value) {
                            var tbody_count = $("#tbody"+value.payer_account_id).length;

                            console.log(tbody_count);

                            if (tbody_count == 0) {
                                $("#charge_cards").append('<div class="col-md-6 col-sm-12">\n\
                                    <div class="card">\n\
                                        <div class="card-header">\n\
                                            <div class="card-title">'+payer_account[key].display_name+'</div>\n\
                                        </div>\n\
                                        <div class="card-body">\n\
                                            <div class="table-responsive">\n\
                                                <table class="table text-nowrap">\n\
                                                    <thead>\n\
                                                        <tr>\n\
                                                            <th class="w-60"></th>\n\
                                                            <th class="w-30"><?php echo lang("amount"); ?></th>\n\
                                                            <th class="w-10"><?php echo lang("quantity"); ?></th>\n\
                                                        </tr>\n\
                                                    </thead>\n\
                                                    <tbody id="tbody'+value.payer_account_id+'">\n\
                                                        <tr>\n\
                                                            <td class="w-60">'+value.category+'</td>\n\
                                                            <td class="w-30"><input class="form-control" name="amount[]"></td>\n\
                                                            <td class="w-10"><input class="form-control" name="qunatity[]"></td>\n\
                                                        </tr>\n\
                                                    </tbody>\n\
                                                </table>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>');
                            } else {
                                $("#tbody"+value.payer_account_id).append('<tr>\n\
                                        <td>'+value.category+'</td>\n\
                                        <td><input class="form-control" name="amount[]"></td>\n\
                                        <td><input class="form-control" name="qunatity[]"></td>\n\
                                    </tr>');
                            }
                        })

                        $(".payer_table").DataTable({
                            "searchable": false,
                            ordering: false,
                        });
                    } 
                })
            });
        }
    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $("#add_payer_account").click(function() {
                var countPayer = $(".countPayer").length;
                var count = parseInt(countPayer) + 1;
                $("#payer-div").append('<div class="col-md-12 col-sm-12 col-lg-12 countPayer" id="addCase">\n\
                                    <div class="panel-group panel-group-primary mb-5"  role="tablist" aria-multiselectable="true" id="accordion3">\n\
                                        <div class="panel panel-default active">\n\
                                            <div class="panel-heading" role="tab" id="headingOne'+count+'">\n\
                                                <h4 class="panel-title">\n\
                                                    <a class="collapsed" id="accordHeader" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne'+count+'" aria-expanded="true" aria-controls="collapseOne31">\n\
                                                        <?php echo lang('payer_account'); ?> <span id="payer-accordion-title'+count+'"> </span>\n\
                                                    </a>\n\
                                                </h4>\n\
                                            </div>\n\
                                            <div id="collapseOne'+count+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne'+count+'">\n\
                                                <div class="panel-body border-0 bg-white">\n\
                                                    <div class="row">\n\
                                                        <div class="col-md-6 col-sm-12">\n\
                                                            <div class="form-group">\n\
                                                                <label class="form-label"><?php echo lang('payer_account'); ?></label>\n\
                                                                <select class="select2-show-search form-control add_payer company" id="company'+count+'" name="company_id" value="" required onchange="displayCategory('+count+');">\n\
                                                                </select>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="row multiselect'+count+'">\n\
                                                        <div class="col-md-12 col-sm-12">\n\
                                                            <div class="form-group"> \n\
                                                                <label for="exampleInputEmail1"> <?php echo lang('select'); ?></label>\n\
                                                                <select name="category_name[]" class="multi-selection'+count+'" multiple="" id="my_multi_select'+count+'" required" onchange="">\n\
                                                                </select>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>');

                var selected_payer = window.sessionStorage.getItem('company');

                $(".company").select2({
                    placeholder: '<?php echo lang('select_payer'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'company/getCompanyWithoutAddNewOption?selected_payer='+selected_payer+'&position=inside',
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

                // $('.multi-selectionz').multiSelect({
                //     ajax: {
                //         url: 'company/getCompanyWithoutAddNewOption',
                //         type: "post",
                //         dataType: 'json',
                //         delay: 250,
                //         data: function (params) {
                //             return {
                //                 searchTerm: params.term // search term
                //             };
                //         },
                //         processResults: function (response) {
                //             return {
                //                 results: response
                //             };
                //         },
                //         cache: true
                //     }
                // });

                $('.multi-selection'+count).multiSelect({
                    selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder=' search...'>",
                    selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder=''>",
                    afterInit: function (ms) {
                        var that = this,
                                $selectableSearch = that.$selectableUl.prev(),
                                $selectionSearch = that.$selectionUl.prev(),
                                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable'+count+':not(.ms-selected)',
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
            })
        })
    </script> -->

    <script type="text/javascript">
        function displayCategory(company_count) {
            var payer_id = $("#company"+company_count).val();
            $("#payer-accordion-title"+company_count).html(payer_id);

            // $('#my_multi_select'+company_count).multiSelect('addOption', { value: 'test', text: 'test', index: 0, nested: 'optgroup_label' });

            $(".multiselect"+company_count).empty();


            var selected_payer = window.sessionStorage.getItem('company');

            if (selected_payer !== null) {
                var new_selected_payer = selected_payer+','+payer_id;  
            } else {
                var new_selected_payer = payer_id;
            }

            // console.log($("#company"+company_count).html());
            console.log($("select.company").filter(index => index === 0 || index === 2).html());


            window.sessionStorage.setItem('company', new_selected_payer);

            var selected_payer = window.sessionStorage.getItem('company');

            var removeValue = function(selected_payer, payer_id, separator) {
              separator = separator || ",";
              var values = list.split(separator);
              for(var i = 0 ; i < values.length ; i++) {
                if(values[i] == value) {
                  values.splice(i, 1);
                  return values.join(separator);
                }
              }
              return list;
            }

            console.log("Remove - "+removeValue);

            $(".company").select2({
                placeholder: '<?php echo lang('select_payer'); ?>',
                allowClear: true,
                ajax: {
                    url: 'company/getCompanyWithoutAddNewOption?selected_payer='+selected_payer+'&position=function',
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

            $.ajax({
                url: 'finance/getChargesByCompanyId?id='+payer_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function(response) {
                    var charge = response.charge;

                    console.log(charge);

                    $(".multiselect"+company_count).append('<div class="col-md-12 col-sm-12">\n\
                                                        <div class="form-group"> \n\
                                                            <label for="exampleInputEmail1"> <?php echo lang('select'); ?></label>\n\
                                                            <select name="category_name[]" class="multi-selection'+company_count+'" multiple="" id="my_multi_select'+company_count+'" required">\n\
                                                            </select>\n\
                                                        </div>\n\
                                                    </div>');

                    $.each(charge, function (key, value) {
                        $("#my_multi_select"+company_count).append('<option value="'+value.id+'">'+value.category+'</option>');
                        // $("#my_multi_select"+company_count).append($('<option>').text(value.category).val(value.id)).end();
                        // $("#my_multi_select"+company_count).append('<option value="zzz">Sample</option');
                    });

                    // $('.multi-selection'+company_count).multiSelect({
                    //     selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder=' search...'>",
                    //     selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder=''>",
                    //     afterInit: function (ms) {
                    //         var that = this,
                    //                 $selectableSearch = that.$selectableUl.prev(),
                    //                 $selectionSearch = that.$selectionUl.prev(),
                    //                 selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)'+company_count,
                    //                 selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected'+company_count;

                    //         that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    //                 .on('keydown', function (e) {
                    //                     if (e.which === 40) {
                    //                         that.$selectableUl.focus();
                    //                         return false;
                    //                     }
                    //                 });

                    //         that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    //                 .on('keydown', function (e) {
                    //                     if (e.which == 40) {
                    //                         that.$selectionUl.focus();
                    //                         return false;
                    //                     }
                    //                 });
                    //     },
                    //     afterSelect: function () {
                    //         this.qs1.cache();
                    //         this.qs2.cache();
                    //     },
                    //     afterDeselect: function () {
                    //         this.qs1.cache();
                    //         this.qs2.cache();
                    //     }
                    // });

                    // $("#my_multi_select"+company_count).multiSelect('rebuild');

                    $('#my_multi_select'+company_count).multiSelect({});
                }
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            
            $("#pos_select").change(function () {
                var patient_id = $("#pos_select").val();
                var doctor_id = $("#add_doctor").val();
                $('#encounter').find('option').remove();
                $.ajax({
                    url: 'encounter/getEncounterByPatientId?patient_id='+patient_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var encounter = response.encounter;
                        var encounter_type = response.encounter_type;
                        $.each(encounter, function (key, value) {
                            $('#encounter').append($('<option>').text(value.encounter_number+' - '+value.display_name+' - '+value.created_at).val(value.id)).end();
                        });
                    }
                });
            });
        });
    </script>

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
                $('.br'+idd).remove();

            });
            $.each($('select.multi-selection option:selected'), function () {
                var curr_val = $(this).data('id');
                var idd = $(this).data('idd');
                var qtity = $(this).data('qtity');
                //  tot = tot + curr_val;
                var cat_name = $(this).data('cat_name');
                var doctor = $(this).data('doctor');
                var dr = $(this).data('dr');
                if (doctor == "") {
                    var doctor_detail = '';
                } else {
                    var doctor_detail = '( ' + dr + ' ' + doctor + ' )';
                }
                
                // var dr = "<?php echo lang('dr') ?>";
                if ($('#idinput-' + idd).length)
                {

                } else {
                    if ($('#id-div' + idd).length)
                    {

                    } else {
                        // $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + doctor_detail + ' - <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div>')
                        $("#editPaymentForm .qfloww").append('<div class="row mt-5">\n\
                            <div class="col-md-10">\n\
                                <div class="remove1" id="id-div'+ idd +'">\n\
                                    '+ $(this).data("cat_name") + doctor_detail +' - <?php echo $settings->currency; ?> '+ $(this).data('id') +'\n\
                                </div>\n\
                            </div>\n\
                            <div class="col-md-2">\n\
                                <input type="number" class="remove form-control" id="idinput-'+idd+'" name="quantity[]" value="1" min="0" oninput="validity.valid||(value='+"'0'"+');">\n\
                                <input type="hidden" class="remove" id="categoryinput-'+ idd +'" name="category_id[]" value="'+idd+'">\n\
                            </div>\n\
                        </div>');
                    }


                    // var input2 = $('<input>').attr({
                    //     type: 'number',
                    //     class: "remove",
                    //     id: 'idinput-' + idd,
                    //     name: 'quantity[]',
                    //     value: qtity,
                    //     min: '0',
                    //     oninput: "validity.valid||(value='');",
                    // }).appendTo('#editPaymentForm .qfloww');

                    // $('<input>').attr({
                    //     type: 'hidden',
                    //     class: "remove",
                    //     id: 'categoryinput-' + idd,
                    //     name: 'category_id[]',
                    //     value: idd,
                    // }).appendTo('#editPaymentForm .qfloww');

                    // $('<br>').attr({
                    //     class: "br"+idd,
                    // }).appendTo('#editPaymentForm .qfloww');
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

                    $('#idinput-' + idd).on("change", function () {
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
                    $('.br'+idd).remove();
                });
                $.each($('select.multi-selection option:selected'), function () {
                    var curr_val = $(this).data('id');
                    var idd = $(this).data('idd');
                    //  tot = tot + curr_val;
                    var cat_name = $(this).data('cat_name');
                    var doctor = $(this).data('doctor');
                    var dr = $(this).data('dr');
                    if (doctor == "") {
                        var doctor_detail = '';
                    } else {
                        var doctor_detail = '( ' + dr + ' ' + doctor + ' )';
                    }
                    // var dr = "<?php echo lang('dr') ?>";
                    if ($('#idinput-' + idd).length)
                    {

                    } else {
                        if ($('#id-div' + idd).length)
                        {

                        } else {
                            // $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + doctor_detail + ' - <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div>');
                            $("#editPaymentForm .qfloww").append('<div class="row mt-5">\n\
                                    <div class="col-md-10">\n\
                                        <div class="remove1" id="id-div'+ idd +'">\n\
                                            '+ $(this).data("cat_name") + doctor_detail +' - <?php echo $settings->currency; ?> '+ $(this).data('id') +'\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="col-md-2">\n\
                                        <input type="number" class="remove form-control" id="idinput-'+idd+'" name="quantity[]" value="1" min="0" oninput="validity.valid||(value='+"'0'"+');">\n\
                                        <input type="hidden" class="remove" id="categoryinput-'+ idd +'" name="category_id[]" value="'+idd+'">\n\
                                    </div>\n\
                                </div>');
                        }


                        // var input2 = $('<input>').attr({
                        //     type: 'number',
                        //     class: "remove form-control w-10",
                        //     id: 'idinput-' + idd,
                        //     name: 'quantity[]',
                        //     value: '1',
                        //     min: '0',
                        //     oninput: "validity.valid||(value='');",
                        // }).appendTo('#editPaymentForm .qfloww');

                        // $('<input>').attr({
                        //     type: 'hidden',
                        //     class: "remove",
                        //     id: 'categoryinput-' + idd,
                        //     name: 'category_id[]',
                        //     value: idd,
                        // }).appendTo('#editPaymentForm .qfloww');

                        // $('<br>').attr({
                        //     class: "br"+idd,
                        // }).appendTo('#editPaymentForm .qfloww');

                        // $('<div>').attr({
                        //     class: "mt-5",
                        // }).appendTo('#editPaymentForm .qfloww');
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

                        $('#idinput-' + idd).on("change", function () {
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
        $('#my_multi_select31').multiSelect()
    </script>
    <!-- Multi Select Script End -->

    <!-- Company Select Script Start -->
        <!-- <script type="text/javascript">
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
        </script> -->
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
                    ajax: {
                        // url: 'patient/getPatientinfo',
                        url: 'patient/getPatientInfoByVisitedProviderId',
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
                    ajax: {
                        url: 'doctor/getDoctorInfo',
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

        <script type="text/javascript">
            $(document).ready(function () {
                $(".rendering_user").select2({
                    placeholder: '<?php echo lang('select_doctor'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'encounter/getUserWithoutAddNewOption',
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
    <!-- Doctor Select Script End -->

    <!-- Company Select Script Start -->
        <script type="text/javascript">
            var selected_payer = window.sessionStorage.getItem('company');

            $(document).ready(function () {
                $(".company").select2({
                    placeholder: '<?php echo lang('select_payer'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'company/getCompanyWithoutAddNewOption?selected_payer='+selected_payer+'&position=outside',
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
        Stripe.setPublishableKey("publish_key");

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

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $("#encounter").change(function () {
                var encounter_id = $("#encounter").val();
                $.ajax({
                    url: 'encounter/getEncounterById?id=' + encounter_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var doctor = response.encounter.rendering_staff_id
                        $('#editPaymentForm').find('[name="patient"]').val(response.encounter.patient_id).change();
                        // $('#editPaymentForm').find('[name="doctor"]').val(response.encounter.rendering_staff_id).change();

                        if (doctor == null) {
                            $("#add_doctor").val("0");
                        } else {
                            $("#add_doctor").val(doctor);
                        }
                    }
                });
                
            });
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            var amount_received = $(".amount_received").val();
            var deposit_edit_amount = $("input[name^=deposit_edit_amount").map(function (idx, elem) {
                return $(elem).val();
            }).get();
            var amount_received = $("input[name=amount_received]").val();

            var dep = 0;
            $.each(deposit_edit_amount, function (key, value) {
                dep = (parseFloat(value) + dep);
            });

            var totaldeposit = parseFloat(amount_received) + dep;

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
                            if (response.company_name == "personal") {
                                if (totaldeposit == $("#gross").val()) {
                                    $('#payment_status').append($('<option selected>').text("Paid").val("Paid")).end();
                                } else {
                                    $('#payment_status').append($('<option>').text(value.display_name).val(value.id)).end();
                                }
                            } else {
                                $('#payment_status').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                        });
                    }
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
                        var company_name = response.company_name;
                        if (company_name != "personal") {
                            $("#invoice_status").append("<div id='payment_statusDiv'><label class='form-label'><?php echo lang('invoice') ?> <?php echo lang('status') ?></label>\n\
                                <select class='select2-show-search form-control' name='payment_status' id='payment_status'>\n\
                                </select></div>");
                            $("#payment_status").select2({});
                            $.each(status, function (key, value) {
                                $('#payment_status').append($('<option>').text(value.display_name).val(value.id)).end();
                            });
                        } else {
                            $("#payment_statusDiv").remove();
                        }
                        
                    }
                });
            });
        });
    </script>



    </body>
</html> 