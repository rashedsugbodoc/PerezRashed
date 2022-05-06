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
                                    @page {
                                      /*size: A4;*/
                                      margin: 8mm 15mm 15mm 15mm;
                                      width: 210mm;
                                      height: 297mm;
                                    }

                                    footer {
                                        display: flex;
                                        position: fixed;
                                        bottom: -28px;
                                        width: 100% !important;
                                    }
                                    header {
                                        position: fixed;
                                        overflow: avoid;
                                        width: 100%;
                                    }

                                    .content-block-body {
                                        position: relative;
                                        top: 18.5em !important;
                                    }

                                    .content-block-item {
                                        page-break-inside: avoid;
                                        position: relative;
                                        width: 100%;
                                        top:1em;   //match size of header
                                        left:0px;
                                        right:0px;
                                        /*border: solid 2px black;*/
                                    }

                                    .clearfix {
                                      overflow: auto;
                                    }

                                    .prescription-footer {
                                        width: 100%;
                                    }

                                    .footer-area-height {
                                        height: 38vh !important;
                                        opacity: 0;
                                    }

                                    .company-logo {
                                        max-height: 300px !important;
                                        max-width: 300px !important;
                                        width: 300px !important;
                                        height: auto !important;
                                    }

                                  html, body {
                                    /*width: 210mm;
                                    height: 297mm;*/
                                    font-size: 16.5pt;
                                  }
                                  .hidden-print{
                                    display: none;
                                    }
                                }

                                /* @media (min-width: 768px) {
                                 .new-pull-left {
                                    float: right;
                                  }
                                }*/
                            </style>

                        <!--Page header-->
                        <!-- <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Doctor Dashboard</h4>
                            </div>
                        </div> -->
                        <!--End Page header-->
                        <div class="row mt-5 mb-5" id="actionbuttons">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <!-- <div class="flex-grow-1">
                                    
                                </div>
                                <div class="flex-grow-1">
                                    
                                </div>
                                <div class="flex-grow-1">
                                    
                                </div> -->
                                <div class="row page-rightheader ml-auto .d-block d-print-none">
                                    <div class="flex-grow-1">
                                        <a href="finance/invoices" class="btn btn-cyan"><i class="fe fe-arrow-left"></i><span class="button-text"> <?php echo lang('back_to_all_invoices'); ?></span></a>
                                    </div>
                                    <div class="flex-grow-2">
                                        <button type="button" class="btn btn-info" id="create_pdf"><i class="fe fe-download"></i><span class="button-text"> <?php echo lang('download'); ?></span></button>
                                        <button type="button" id="print" class="btn btn-info" onClick="javascript:window.print();"><i class="fe fe-printer"></i><span class="button-text"><?php echo lang('print'); ?></span></button>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                            <a href="finance/editPayment?id=<?php echo $payment->id; ?>" class="btn btn-info"><i class="fe fe-edit"></i><span class="button-text"> <?php echo lang('edit'); ?> <?php echo lang('invoice'); ?></span></a>
                                        <?php } ?>
                                    </div>
                                    <div class="flex-grow-1 mr-3">
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Accountant'))) { ?>
                                            <a href="finance/addPaymentView" class="btn btn-primary pull-right"><i class="fe fe-plus"></i><span class="button-text"> <?php echo lang('add_new_invoice'); ?></span></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                            <div class="row mb-5 d-print-none">
                                <div class="col-md-12 col-sm-12">
                                    <div>
                                        <label><strong>Print Settings: </strong></label>
                                        <label class="custom-switch">
                                            <span class="custom-switch-description mr-2 text-muted">Show Invoice Details</span>
                                            <input type="checkbox" checked name="custom-switch-checkbox" id="invoice-opacity-change" class="custom-switch-input">
                                            <span class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                        </label>
                                        <label class="custom-switch">
                                            <span class="custom-switch-description mr-2 text-muted">Show Template</span>
                                            <input type="checkbox" checked name="custom-switch-checkbox" id="template-opacity-change" class="custom-switch-input">
                                            <span class="custom-switch-indicator custom-switch-indicator-xl custom-radius"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="row" id="content">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <div class="card-title" id="report">Report</div>
                                    </div> -->
                                    <div class="card-body pt-0">
                                        <div class="row border-bottom border-dark text-center">
                                            <!-- <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 header-brand pl-0">
                                                        <img src="<?php if(!empty($settings->logo)) { echo $settings->logo; } else { echo base_url('public/assets/images/brand/logo.png');} ?>" class="header-brand-img desktop-lgo" style="height: 60px;" alt="<?php echo $settings->title;?>">
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row template-opacity">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h2 mb-1"><?php echo $settings->title ?></label>
                                                    </div>
                                                </div>
                                                <div class="row mb-1 template-opacity">
                                                    <?php foreach($branches as $branch) { 
                                                        $barangay_name = $this->location_model->getBarangayById($branch->barangay_id)->name;
                                                        $city_name = $this->location_model->getCityById($branch->city_id)->name;
                                                    ?>
                                                        <div class="col-md col-sm pl-0">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 pl-0">
                                                                    <i class="fa fa-hospital-o text-primary"></i>
                                                                    <span class="h6 mb-1 align-baseline"><strong><?php echo $branch->display_name; ?></strong></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 pl-0">
                                                                    <i class="fa fa-map-marker text-primary"></i>
                                                                    <span class="h6 mb-1"><?php echo $branch->street_address; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 pl-0">
                                                                    <span class="h6 mb-1"><?php if(!empty($barangay_name)) echo $barangay_name.', '; ?><?php if(!empty($city_name)) echo $city_name; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 pl-0">
                                                                    <i class="fe fe-phone text-primary"></i>
                                                                    <?php if(!empty($branch->phone)) { ?>
                                                                    <span class="h6 mb-1"><?php echo $branch->phone; ?></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-1"><?php echo $settings->address ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-3">Tel: <?php echo $settings->phone ?></label>
                                                    </div>
                                                </div> -->
                                                <div class="row template-opacity">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h3"><?php echo lang('invoice') ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-3">
                                                
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 border-bottom border-dark p-0">
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap mb-1 mt-1" id="example2">
                                                        <tbody>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span><?php echo lang('patient'); ?> <?php echo lang('name'); ?> </span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity">
                                                                        <?php
                                                                        if (!empty($patient)) {
                                                                            echo $patient->name . ' <br>';
                                                                        }
                                                                        ?>                                                            
                                                                    </span>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span class="pull-right"><?php echo lang('encounter');?> <?php echo lang('id');?></span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity"><?php echo $this->encounter_model->getEncounterById($payment->encounter_id)->encounter_number;?></span>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span><?php echo lang('patient_id'); ?></span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity">
                                                                        <?php
                                                                        if (!empty($patient)) {
                                                                            echo $patient->id . ' <br>';
                                                                        }
                                                                        ?>                                                                    
                                                                    </span>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span class="pull-right"><?php echo lang('invoice');?> <?php echo lang('id');?></span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity"><?php echo $payment->invoice_number;?></span>
                                                                </td>
                                                            </tr>                                                        
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span><?php echo lang('age');?> </span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0"><span class="invoice-opacity"><?php if (!empty($age)) { echo $age .' '. lang('yrs_old');} else {echo lang('not_given');}?></span></td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span class="pull-right"><?php echo lang('facility'); ?> <?php echo lang('id');?></span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity">
                                                                        <?php echo $payment->hospital_id;?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span><?php echo lang('address'); ?> </span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity">
                                                                        <?php
                                                                        if (!empty($patient)) {
                                                                            echo $patient->address . ' <br>';
                                                                        }
                                                                        ?>                                                                    
                                                                    </span>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span class="pull-right"><?php echo lang('doctor'); ?></span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity"> 
                                                                        <?php
                                                                        if (!empty($payment->doctor)) {
                                                                            $doc_details = $this->doctor_model->getDoctorById($payment->doctor);
                                                                            if (!empty($doc_details)) {
                                                                                echo $doc_details->name . ' <br>';
                                                                            } else {
                                                                                echo $payment->doctor_name . ' <br>';
                                                                            }
                                                                        }
                                                                        ?> 
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span><?php echo lang('remarks');?> </span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0"><span class="invoice-opacity"><?php echo $payment->remarks;?></span></td>
                                                                <td></td>
                                                                <td class="w-15 p-0">
                                                                    <span class="pull-right template-opacity"><?php echo lang('payer_account'); ?></span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span>: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity">
                                                                        <?php
                                                                        if (!empty($payment->company_id)) {
                                                                            $company_details = $this->company_model->getCompanyById($payment->company_id);
                                                                            $classification = $this->company_model->getCompanyClassificationById($company_details->classification_id);
                                                                            if (!empty($company_details)) {
                                                                                if ($classification->id == 1) {
                                                                                    echo $classification->display_name;
                                                                                } else {
                                                                                    echo $classification->display_name . ' - '.$company_details->display_name .' <br>';
                                                                                }
                                                                            } else {
                                                                                echo lang('none');
                                                                            }
                                                                        }
                                                                        ?> 


                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0">
                                                                    
                                                                </td>
                                                                <td class="w-7 p-0">
                                                                    
                                                                </td>
                                                                <td class="w-63 p-0"><span></span></td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity">
                                                                    <span class="pull-right invoice-opacity"><?php echo lang('invoice'). ' ' . lang('status'); ?></span>
                                                                </td>
                                                                <td class="w-7 p-0 template-opacity">
                                                                    <span class="invoice-opacity">: </span>
                                                                </td>
                                                                <td class="w-63 p-0">
                                                                    <span class="invoice-opacity"><?php echo $this->finance_model->getInvoicePaymentStatusById($payment->payment_status)->display_name;?></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 pl-0">
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap" id="example2">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-8 pl-0 template-opacity">#</td>
                                                                <td class="template-opacity"><?php echo lang('description'); ?></td>
                                                                <td class="text-right template-opacity"><?php echo lang('unit_price'); ?></td>
                                                                <td></td>
                                                                <td class="template-opacity"><?php echo lang('qty'); ?></td>
                                                                <td></td>
                                                                <td class="text-right template-opacity"><?php echo lang('amount'); ?></td>
                                                                <td></td>
                                                            </tr>
                                                            <?php
                                                            if (!empty($payment->category_name)) {
                                                                $category_name = $payment->category_name;
                                                                $category_name1 = explode(',', $category_name);
                                                                $i = 0;
                                                                foreach ($category_name1 as $category_name2) {
                                                                    $i = $i + 1;
                                                                    $category_name3 = explode('*', $category_name2);
                                                                    $new_category_name = explode('-', $category_name3[0]);
                                                                    $doctor_service = $this->doctor_model->getDoctorByIonUserId($new_category_name[1])->name;
                                                                    if ($category_name3[3] > 0) {
                                                                        ?>                                                          
                                                                        <tr class="invoice-opacity">
                                                                            <td class="pt-0 pb-0 pl-0"><?php echo $i; ?> </td>
                                                                            <td class="pt-0 pb-0"><?php echo $this->finance_model->getPaymentcategoryById($new_category_name[0])->category.' ( '.lang('dr').'. '.$doctor_service.' )'; ?></td>
                                                                            <td class="pt-0 pb-0 text-right"><?php echo $settings->currency; ?> <?php echo number_format($category_name3[1],2); ?></td>
                                                                            <td></td>
                                                                            <td class="pt-0 pb-0"><?php echo $category_name3[3]; ?></td>
                                                                            <td class=""></td>
                                                                            <td class="pt-0 pb-0 text-right"><?php echo $settings->currency; ?> <?php echo number_format($category_name3[1] * $category_name3[3],2); ?></td>
                                                                            <td></td>
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
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 pl-0">
                                                <table class="table mt-1">
                                                    <tbody>
                                                        <tr class="pb-5">
                                                            <td class="pt-0 pb-0 border-top border-dark w-65 pl-0 template-opacity"><strong><?php echo lang('sub_total'); ?></strong></td>
                                                            <td class="pt-0 pb-0 border-top border-dark"> </td>
                                                            <td class="pt-0 pb-0 border-top border-dark"> </td>
                                                            <td class="pt-0 pb-0 border-top border-dark"> </td>
                                                            <td class="pt-0 pb-0 border-top border-dark"> </td>
                                                            <td class=""></td>
                                                            <td class="pt-0 pb-0 border-top border-dark text-right invoice-opacity"><?php echo $settings->currency; ?> <?php echo number_format($payment->amount,2); ?></td>
                                                            <td class="border-top border-dark"></td>
                                                        </tr>
                                                        <?php if (!empty($payment->discount)) { ?>
                                                        <tr>
                                                            <td class="pt-0 pb-0 pl-0 template-opacity"><strong>LESS</strong></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td></td>
                                                            <td class="pt-0 pb-0 text-right"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-0 pb-0 border-bottom border-dark pl-0 invoice-opacity"><?php echo lang('discount'); ?> 
                                                                <?php
                                                                if ($discount_type == 'percentage') {
                                                                    echo '(%) : ';
                                                                } else {
                                                                    echo ': ' . $settings->currency;
                                                                }
                                                                ?>
                                                                <?php $discount = explode('*', $payment->discount); ?>
                                                                <?php
                                                                if (!empty($discount[1])) {
                                                                    echo $discount[0] . ' %';
                                                                } else {
                                                                    echo $discount[0];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="pt-0 pb-0 border-bottom border-dark"> </td>
                                                            <td class="pt-0 pb-0 border-bottom border-dark"> </td>
                                                            <td class="pt-0 pb-0 border-bottom border-dark"> </td>
                                                            <td class="pt-0 pb-0 border-bottom border-dark"> </td>
                                                            <td></td>
                                                            <td class="pt-0 pb-0 border-bottom border-dark text-right invoice-opacity">
                                                                <?php
                                                                if (!empty($discount[1])) {
                                                                    echo $settings->currency . ' ' . number_format($discount[1],2);
                                                                } else {
                                                                    echo $settings->currency . ' ' . number_format($discount[0],2);
                                                                }
                                                                ?>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <?php } ?>
                                                        <tr class="pb-5">
                                                            <td class="pt-0 pb-0 pl-0 template-opacity"><strong><?php echo lang('grand_total'); ?></strong></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td class=""></td>
                                                            <td class="pt-0 text-right invoice-opacity" style="text-decoration-line: underline; text-decoration-style: double; text-decoration-skip-ink: none;"><?php echo $settings->currency; $g = $payment->gross_total;?> <?php echo number_format($g,2); ?></td>
                                                            <td ></td>
                                                        </tr>
                                                        <tr class="pb-5">
                                                            <td class="pt-0 pb-0 pl-0 template-opacity"><strong><?php echo lang('amount_received'); ?></strong></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td class=""></td>
                                                            <td class="pt-0 pb-0 text-right invoice-opacity" style="text-decoration-line: underline; text-decoration-style: double; text-decoration-skip-ink: none;"><?php echo $settings->currency; $r = $this->finance_model->getDepositAmountByPaymentId($payment->id);?> <?php echo number_format($r,2); ?></td>
                                                            <td class=""></td>
                                                        </tr>
                                                        <tr class="pt-5">
                                                            <td class="pt-0 pb-0 pl-0 template-opacity"><strong><?php echo lang('amount_to_be_paid'); ?> </strong></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td></td>
                                                            <td class="pt-0 pb-0"> </td>
                                                            <td class=""></td>
                                                            <td class="pt-0 pb-5 text-right invoice-opacity" style="text-decoration-line: underline; text-decoration-style: double; text-decoration-skip-ink: none;"><?php echo $settings->currency; $balance = $g - $r;?> <?php echo number_format($balance,2); ?></td>
                                                            <td class=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <table class="table">
                                            <tbody>
                                                <tr class="template-opacity">
                                                    <td class="pt-0 pb-0"><?php echo lang('prepared_by');?>:</td>
                                                    <td class="pt-0 pb-0"> </td>
                                                    <td class="pt-0 pb-0"> </td>
                                                    <td class="pt-0 pb-0"> </td>
                                                    <td class="pt-0 pb-0"><?php echo lang('received_by');?>:</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-bottom border-dark w-30 invoice-opacity"><?php echo $this->ion_auth->user($payment->user)->row()->username; ?></td>
                                                    <td class="w-5"></td>
                                                    <td class="border-bottom border-dark w-30 text-center invoice-opacity"><?php echo date($settings->date_format_long.' - '.$settings->time_format,$payment->date);?></td>
                                                    <td class="w-5"></td>
                                                    <td class="border-bottom border-dark w-30 template-opacity"></td>
                                                </tr>
                                                <tr class="template-opacity">
                                                    <td class="w-30"></td>
                                                    <td class="w-5"></td>
                                                    <td class="w-30 text-center"><?php echo lang('date_time_generated');?></td>
                                                    <td class="w-5"></td>
                                                    <td class="w-30"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- end app-content-->
            </div>                                                
            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            Copyright © 2021 <a href="home">SugboDoc</a>. All rights reserved.
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
        <!--Page specific declarations here. Transferred from head to here-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.esm.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.esm.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.js"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

        <script>
            document.getElementById('create_pdf').onclick = function() {
                var element = document.getElementById('content');

                var opt = {
                    margin: 0.2,
                    filename: 'Invoice_ID_<?php echo $payment->id;?><?php if (!empty($patient)) { echo '_Patient_ID_'.$patient->id; } ?>.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
                };

                html2pdf(element, opt);
            };
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#template-opacity-change').change(function () {
                    if (!this.checked) 
                       $('.template-opacity').animate({opacity:0});
                    else 
                        $('.template-opacity').animate({opacity:1});
                });
            });

            $(document).ready(function () {
                $('#invoice-opacity-change').change(function () {
                    if (!this.checked) 
                       $('.invoice-opacity').animate({opacity:0});
                    else 
                        $('.invoice-opacity').animate({opacity:1});
                });
            });
        </script>

    </body>
</html>
