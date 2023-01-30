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
                                        .ziconDisplay {
                                            /*position: absolute !important;
                                            top: 350px !important;*/
                                        }
                                    }

                                    /*@media (max-width: 275px) {
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
                                    }*/

                                    #content{
                                        color: black;
                                    }

                                    .td{
                                        color: black;
                                    }

                                    * {box-sizing: border-box;}

                                    .container {
                                      position: relative;
                                      width: 50%;
                                      max-width: 300px;
                                    }

                                    .image {
                                      display: block;
                                      width: 100%;
                                      height: auto;
                                    }

                                    .overlay {
                                      position: absolute; 
                                      bottom: 0; 
                                      background: rgb(0, 0, 0);
                                      background: rgba(0, 0, 0, 0.5);
                                      color: #f1f1f1; 
                                      width: 100%;
                                      transition: .5s ease;
                                      opacity:0;
                                      color: white;
                                      font-size: 20px;
                                      padding: 20px;
                                      text-align: center;
                                    }

                                    .container:hover .overlay {
                                      opacity: 1;
                                    }

                                    #content{
                                        color: black;
                                    }

                                    .ziconDisplay {
                                        /*position: absolute;
                                        top: 280px;*/
                                    }

                                    @page {
                                      margin: 5mm 5mm 15mm 10mm;
                                      height: 1000px;
                                      /*width: 210mm;
                                      height: 297mm;*/
                                      /*margin: 20mm*/
                                    }

                                    /*@media screen and (max-device-width: 480px), screen and (-webkit-min-device-pixel-ratio: 2) //iphone
                                    @media screen and (max-device-width: 480px) and (orientation:landscape) //iphone landscape
                                    @media screen and (min-device-width: 1024px) and (orientation:landscape) //ipad landscape
                                    @media screen and (min-device-width: 768px) and (orientation:portrait) //ipad portrait*/

                                    @media print and (orientation:portrait){
                                        .page-headerz, .page-header-space {
                                            height: 376px;
                                          /*height: 393px;*/
                                          /*height: 100px;*/
                                        }

                                        .page-footerz, .page-footer-space {
                                          height: 275px;

                                        }

                                        .page-footerz {
                                          position: fixed;
                                          /*position: -webkit-sticky;*/
                                          bottom: 0px;
                                          width: 980px;
                                          /*border-top: 1px solid black; /* for demo */*/
                                          background: yellow; /* for demo */
                                        }

                                        .page-headerz {
                                          position: fixed;
                                          top: 0mm;
                                          width: 980px;
                                          margin-left: 15px;
                                          /*border-bottom: 1px solid black; /* for demo */*/
                                          background: yellow; /* for demo */
                                        }

                                        @supports (-webkit-touch-callout: none) {
                                            /*page[size="A5"] {
                                                width: 700px;
                                            }*/

                                            .page-footerz {
                                                  position: static;
                                                  /*position: -webkit-sticky;*/
                                                  bottom: 0mm;
                                                  width: 700px;
                                                  /*border-top: 1px solid black; /* for demo */*/
                                                  background: yellow; /* for demo */
                                            }

                                            .page-headerz {
                                                  position: fixed;
                                                  top: 0mm;
                                                  width: 700px;
                                                  margin-left: 15px;
                                                  /*border-bottom: 1px solid black; /* for demo */*/
                                                  background: yellow; /* for demo */
                                            }
                                        }

                                        /*.pagez {
                                          page-break-after: always;
                                          break-before: avoid;
                                        }*/

                                        td {
                                            margin: 0 !important;
                                            padding: 0 !important;
                                            border: 0 !important;
                                        }

                                        .region {
                                          /*page-break-after: always;*/
                                          /*-webkit-column-break-inside: avoid;*/
                                          break-inside: avoid;
                                        }

                                        .company-logo {
                                            max-height: 300px !important;
                                            max-width: 300px !important;
                                            width: 300px !important;
                                            height: auto !important;
                                        }

                                        .logo-print {
                                            margin-bottom: 0;
                                            padding-bottom: 0;
                                            border-bottom: 0;
                                            /*vertical-align: baseline;*/
                                        }

                                        .zicon {
                                            position: absolute;
                                            top: 370px;
                                        }

                                        thead {display: table-header-group;} 
                                        tfoot {display: table-footer-group;}
                                       
                                        button {display: none;}
                                       
                                        body {margin: 0;}

                                        html, body {
                                            font-size: 16pt;
                                        }

                                        .card-body {
                                            width: 1000px;
                                            /*height: 670px;*/
                                            /*padding: 50px;
                                            background: white;
                                            position: relative;
                                            left: 50%;
                                            top: 20%;
                                            transform: translate(-50%, -50%);
                                            transform-origin: center center;*/
                                        }
                                    }


                                    /* @media (min-width: 768px) {
                                     .new-pull-left {
                                        float: right;
                                      }
                                    }*/
                                </style>

                        <?php
                        
                        
                        ?>
                        <div class="page-header d-print-none">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('prescription');?> <?php echo lang('details');?></h4>
                                <p><?php
                                    // if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) { echo "iPhone or iPad";}
                                    // else { echo "Other, non-iOS device"; }
                                    /*echo $_SERVER['HTTP_USER_AGENT'];
                                    if(strstr($_SERVER['HTTP_USER_AGENT'],'Mobile')) { echo "Mobile";}
                                    else { echo "Not Mobile";}*/
                                ?></p>
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="row mb-5 mt-5 d-print-none" id="actionbuttons">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row page-rightheader ml-auto .d-block">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <div class="flex-grow-1">
                                            <a href="prescription/all" class="btn btn-cyan"><i class="fe fe-arrow-left"></i><span class="button-text"> <?php echo lang('all'); ?> <?php echo lang('prescriptions'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                        <div class="flex-grow-1">
                                            <a href="prescription" class="btn btn-cyan"><i class="fe fe-arrow-left"></i><span class="button-text"> <?php echo lang('all'); ?> <?php echo lang('prescriptions'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                    <div class="flex-grow-2">
                                        <button type="button" class="btn btn-info" id="create_pdf"><i class="fe fe-download"></i><span class="button-text"> <?php echo lang('download'); ?></span></button>
                                        <?php if(strstr($_SERVER['HTTP_USER_AGENT'],'Mobile') || strstr($_SERVER['HTTP_USER_AGENT'],'Windows')) { ?>
                                            <?php if (isMobile() === 1) { ?>
                                                <?php if (strstr($_SERVER['HTTP_USER_AGENT'],'Android')) { ?>
                                                    <button type="button" id="printDesktop" class="btn btn-info"><i class="fe fe-printer"></i><span class="button-text"><?php echo lang('print'); ?></span></button>
                                                <?php }?>
                                            <?php } else { ?>
                                                <button type="button" id="printDesktop" class="btn btn-info"><i class="fe fe-printer"></i><span class="button-text"><?php echo lang('print'); ?></span></button>
                                            <?php } ?>
                                        <?php } elseif(strstr($_SERVER['HTTP_USER_AGENT'],'Android')) { ?>
                                            <button type="button" id="print" class="btn btn-info"><i class="fe fe-printer"></i><span class="button-text"><?php echo lang('print'); ?></span></button>
                                        <?php } ?>
                                        <!-- <button type="button" class="btn btn-info"><i class="fe fe-edit"></i><span class="button-text"> Edit</span></button> -->
                                        <!--a href="prescription/editPrescription?id=<?php echo $prescription->id;?>" class="btn btn-info"><i class="fe fe-edit"></i><span class="button-text"> Edit</span></a-->
                                    </div>
                                    <div class="flex-grow-1 mr-3">
                                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                            <a href="prescription/addPrescriptionView" class="btn btn-primary pull-right"><i class="fe fe-plus"></i><span class="button-text">  <?php echo lang('add_prescription'); ?></span></a>
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
                                            <span class="custom-switch-description mr-2 text-muted">Show Prescription Details</span>
                                            <input type="checkbox" checked name="custom-switch-checkbox" id="prescription-opacity-change" class="custom-switch-input">
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
                            <div class="card">
                                <div class="card-body pt-1">
                                    <div class="page-headerz">
                                        <div class="row mb-1 template-opacity">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 text-center" id="display_name">
                                                        <h3 class="mb-1"><?php
                                                        if (!empty($doctor)) {
                                                            echo $doctor->professional_display_name;
                                                        } 
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 text-center">
                                                        <h5 class="mb-1"><?php
                                                        if (!empty($doctor)) {
                                                            echo $spec;
                                                        }
                                                        ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-12 pl-0 text-center template-opacity">
                                                <?php if (!empty($settings->prescription_display_doctor_phone)) { ?>
                                                    <h6 class="mb-1"><i class="fe fe-phone text-primary"></i> &nbsp;&nbsp;<?php echo $doctor->phone; ?></h6>
                                                <?php } ?> 
                                                <?php if (!empty($settings->prescription_display_doctor_email)) { ?>
                                                <h6 class="mb-1"><i class="fe fe-mail text-primary"></i> &nbsp;&nbsp;<?php echo $doctor->email; ?></h6>
                                                <?php } ?> 
                                            </div>
                                        </div>
                                        <div class="row template-opacity">
                                            <?php foreach($branches as $branch) { 
                                                $barangay_name = $this->location_model->getBarangayById($branch->barangay_id)->name;
                                                $city_name = $this->location_model->getCityById($branch->city_id)->name;
                                            ?>
                                                <div class="col-md col-sm" <?php if (count($branches)<=1) { echo 'style="text-align: center;"'; } ?>>
                                                    <div style="display: inline-block; text-align: left;">
                                                        <div class="row">
                                                            <!-- <div class="col-md-1 col-sm-1 mb-0">
                                                                <i class="fa fa-hospital-o text-primary"></i>
                                                            </div> -->
                                                            <div class="col-md-12 col-sm-12 pl-0 pr-0">
                                                                <i class="fa fa-hospital-o text-primary"></i>
                                                                <span class="h6 mb-1 align-baseline"><strong><?php echo $branch->display_name; ?></strong></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- <div class="col-md-1 col-sm-1 mb-0">
                                                                <i class="fa fa-map-marker text-primary"></i>
                                                            </div> -->
                                                            <div class="col-md-12 col-sm-12 pl-0 pr-0">
                                                                <i class="fa fa-map-marker text-primary"></i>
                                                                <span class="h6 mb-1"><?php echo $branch->street_address.', '; if(!empty($barangay_name)) { echo $barangay_name.', ';} echo $city_name; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- <div class="col-md-1 col-sm-1 mb-0">
                                                                <i class="fe fe-phone text-primary"></i>
                                                            </div> -->
                                                            <div class="col-md-12 col-sm-12 pl-0 pr-0">
                                                                <?php if(!empty($branch->phone)) {?>
                                                                <i class="fe fe-phone text-primary"></i>
                                                                <span class="h6 mb-1"><?php echo $branch->phone; ?></span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="row border-bottom border-dark pt-1 template-opacity">
                                            
                                        </div>
                                        <div class="row border-top border-dark template-opacity">
                                            
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-md-6 col-sm-6 pb-1 pl-0 pr-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('name'); ?>: </span>
                                                    <strong>
                                                        <span class="h5 prescription-opacity">
                                                            <?php
                                                            if (!empty($patient)) {
                                                                echo $patient->name;
                                                            }
                                                            ?>
                                                        </span>
                                                    </strong>
                                                    
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 pb-1 pl-0">
                                                <div class="form-group mb-0 prescription-opacity">
                                                    <label class="form-label mb-0"><?php echo lang('prescription_id');?>: <strong><span><?php echo $prescription->prescription_number; ?></span></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 pb-1">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('date');?> : </span><strong><span class="h5 prescription-opacity"><?php echo date('M j, Y',strtotime($prescription->prescription_date.' UTC')); ?></span></strong></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pb-2">
                                            <div class="col-md-6 col-sm-6 pt-1 pl-0 pr-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('address');?> : </span><strong><span class="h5 prescription-opacity"><?php
                                                        if (!empty($patient->barangay_id)) {
                                                            echo $this->location_model->getBarangayById($patient->barangay_id)->name . ', ';
                                                        }
                                                        if (!empty($patient->city_id)) {
                                                            echo $this->location_model->getCityById($patient->city_id)->name;
                                                        }
                                                    ?></span></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 pt-1 pl-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('age'); ?>: </span>
                                                    <strong>
                                                        <span class="h5 prescription-opacity">
                                                            <?php
                                                            if (!empty($patient)) {
                                                                $birthDate = strtotime($patient->birthdate);
                                                                $age = time_elapsed_string(date('d-m-Y H:i:s', $birthDate),2,"short_age");
                                                                echo $age;
                                                            }
                                                            ?>
                                                        </span>
                                                    </strong>
                                                    
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 pt-1">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('sex'); ?>: </span><strong><span class="h5 prescription-opacity"><?php echo ucfirst($patient->sex); ?></span></strong></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-bottom border-dark template-opacity">
                                            
                                        </div>
                                        <div class="row border-top border-dark template-opacity">
                                                
                                        </div>
                                        <div class="row">
                                            <h2 class="fs-100 zicon" hidden>&#8478;</h2>
                                            <div class="d-flex flex-row align-items-stretch h-0">
                                                <h2 class="fs-70 ziconDisplay template-opacity">&#8478;</h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-1 col-sm-1">
                                            
                                        </div>
                                        <div class="col-md-11 col-sm-11">
                                            <table class="prescription-table">
                                                <thead>
                                                  <tr>
                                                    <td>
                                                      <!--place holder for the fixed-position header-->
                                                      <div class="page-header-space"></div>
                                                    </td>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                          <!--*** CONTENT GOES HERE ***-->
                                                            <div class="pagez prescription-opacity">
                                                            <br/>
                                                                
                                                                <?php $i = 0; ?>
                                                                <?php foreach($medication_request_item as $mri) { ?>
                                                                    <div class="region">
                                                                        <div class="d-flex">
                                                                            <div class="pr-3">
                                                                                <h4><?php echo $i += 1; ?>.</h4>
                                                                            </div>
                                                                            <div class="flex-grow-1 pr-5">
                                                                                <h4>
                                                                                <p class="mb-2"><strong><?php echo $this->medicine_model->getMedicineById($mri->medicine_id)->generic ?></strong> ( <?php echo $this->medicine_model->getMedicineById($mri->medicine_id)->name; ?> ) <?php echo $this->medicine_model->getMedicineById($mri->medicine_id)->form; ?></p>
                                                                                <p class="mb-2">Sig: <?php echo $mri->sig; ?></p>
                                                                                <p class="mb-2">(<?php echo $mri->uses; ?>)</p></h4>
                                                                            </div>
                                                                            <div class="">
                                                                                <h4><p>#<?php echo $mri->quantity; ?></p></h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                                <tfoot>
                                                  <tr>
                                                    <td>
                                                      <!--place holder for the fixed-position footer-->
                                                      <div class="page-footer-space"></div>
                                                    </td>
                                                  </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                      <div class="page-footerz">
                                        <div class="row template-opacity prescription-footer">
                                            <div class="col-md-4 col-sm-4 pb-0 mb-0">
                                                <div class="row pb-0 mb-0">
                                                    <div class="form-group text-center mb-0 logo-print pb-0 mb-0">
                                                        <img class="company-logo" src="<?php echo base_url('public/assets/images/brand/logo.png'); ?>" width="auto" height="auto" style="max-width: 200px;max-height: 200px;margin-top: 180px;">
                                                        <h4 class="text-primary mb-0 pb-0">www.sugbodoc.com</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 pb-0 mb-0">
                                                
                                            </div>
                                            <div class="col-md-6 col-sm-6 pull-right pb-0 mb-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row border-bottom border-dark text-center template-opacity">
                                                            <div class="col-md-12 col-sm-12">
                                                                <img src="<?php echo $signature->signature; ?>" class="prescription-opacity" width="auto" height="auto" style="max-width:200px;max-height:200px; margin-bottom:-30px;"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <h4 class="mb-1 pt-3"><strong><?php echo $doctor->firstname . ' ' . $doctor->middlename . ' ' . $doctor->lastname; ?>, M.D.</strong></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="template-opacity">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="mb-1 h5"><?php echo lang('license').' #'; ?>: <?php echo $doctor->license; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="mb-1 h5"><?php echo lang('tin') ?>: <?php echo $doctor->tax_number; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="mb-1 h5"><?php echo lang('ptr') ?>: <?php echo $doctor->tax_receipt_number; ?></label>
                                                        </div>
                                                    </div>
                                                    <?php if (!empty($doctor->secondary_license_number)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="mb-1 h5"><?php echo lang('s2') ?>: <?php echo $doctor->secondary_license_number; ?></label>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
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
                            Copyright © 2021 <a href="#">Rygel Dash</a>. Deployed by <a href="#">Rygel Technology Solutions</a> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->
        </div>

        <!-- Back to top -->
        <a href="#top" id="back-to-top" class="d-print-none">
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
        

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

        <script src="<?php echo base_url('public/assets/plugins/signature/signature_plugin.min.js'); ?>"></script>

        <script type="text/javascript">
            $("#printDesktop").click(function () {
                // $(".rxspace").addClass('col-md-1 col-sm-1 col-lg-1');
                // $(".zicon").attr("hidden", false);
                // $(".ziconDisplay").attr("hidden", true);
                window.print();
                // $(".zicon").attr("hidden", true);
                // $(".ziconDisplay").attr("hidden", false);
            });
        </script>

        <script type="text/javascript">
            $("#print").click(function () {
                $(".zicon").attr("hidden", false);
                $(".ziconDisplay").attr("hidden", true);
                // window.print();
                var mywindow = window.open('PRINT');
                mywindow.document.write('<link href="<?php echo base_url(
                    'public/assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />\n\
                    <link rel="shortcut icon" href="<?php echo base_url('public/assets/images/brand/favicon.ico'); ?>">\n\
                    <link rel="icon" type="image/png" href="<?php echo base_url('public/assets/images/brand/android-chrome-192x192.png'); ?>" sizes="192x192">\n\
                    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/assets/images/brand/apple-touch-icon.png'); ?>">\n\
                    <link href="<?php echo base_url('public/assets/css/style.css'); ?>" rel="stylesheet" />\n\
                    <link href="<?php echo base_url('public/assets/css/dark.css'); ?>" rel="stylesheet" />\n\
                    <link href="<?php echo base_url('public/assets/css/skins.css'); ?>" rel="stylesheet" />\n\
                    <link href="<?php echo base_url('public/assets/css/animated.css'); ?>" rel="stylesheet" />\n\
                    <link id="theme" href="<?php echo base_url('public/assets/css/sidemenu.css'); ?>" rel="stylesheet">\n\
                    <link href="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.css'); ?>" rel="stylesheet" />\n\
                    <link href="<?php echo base_url('public/assets/plugins/web-fonts/icons.css'); ?>" rel="stylesheet" />\n\
                    <link href="<?php echo base_url('public/assets/plugins/web-fonts/font-awesome/font-awesome.min.css'); ?>" rel="stylesheet">\n\
                    <link href="<?php echo base_url('public/assets/plugins/web-fonts/plugin.css'); ?>" rel="stylesheet" />\n\
                    <link href="<?php echo base_url('public/assets/plugins/jvectormap/jqvmap.css') ?>" rel="stylesheet" />\n\
                    ');
                mywindow.document.write('<style>\n\
                                    @media screen and (max-width: 1000px) {\n\
                                        .button-text {\n\
                                            display: none;\n\
                                        }\n\
                                        .ziconDisplay {\n\
                                            position: absolute !important;\n\
                                            top: 380px !important;\n\
                                        }\n\
                                    }\n\
                                    #content{\n\
                                        color: black;\n\
                                    }\n\
                                    .td{\n\
                                        color: black;\n\
                                    }\n\
                                    * {box-sizing: border-box;}\n\
                                    .container {\n\
                                      position: relative;\n\
                                      width: 50%;\n\
                                      max-width: 300px;\n\
                                    }\n\
                                    .image {\n\
                                      display: block;\n\
                                      width: 100%;\n\
                                      height: auto;\n\
                                    }\n\
                                    .overlay {\n\
                                      position: absolute; \n\
                                      bottom: 0; \n\
                                      background: rgb(0, 0, 0);\n\
                                      background: rgba(0, 0, 0, 0.5);\n\
                                      color: #f1f1f1; \n\
                                      width: 100%;\n\
                                      transition: .5s ease;\n\
                                      opacity:0;\n\
                                      color: white;\n\
                                      font-size: 20px;\n\
                                      padding: 20px;\n\
                                      text-align: center;\n\
                                    }\n\
                                    .container:hover .overlay {\n\
                                      opacity: 1;\n\
                                    }\n\
                                    #content{\n\
                                        color: black;\n\
                                    }\n\
                                    .ziconDisplay {\n\
                                        position: absolute;\n\
                                        top: 280px;\n\
                                    }\n\
                                    @page {\n\
                                      margin: 5mm 5mm 15mm 10mm;\n\
                                      height: 1000px;\n\
                                    }\n\
                                    @media print and (orientation:portrait){\n\
                                        .page-headerz, .page-header-space {\n\
                                            height: 376px;\n\
                                        }\n\
                                        .page-footerz, .page-footer-space {\n\
                                          height: 275px;\n\
                                        }\n\
                                        .page-footerz {\n\
                                          position: static;\n\
                                          bottom: 42px;\n\
                                          width: 950px;\n\
                                        }\n\
                                        .page-headerz {\n\
                                          position: fixed;\n\
                                          top: 0mm;\n\
                                          width: 950px;\n\
                                          margin-left: 15px;\n\
                                        }\n\
                                        @supports (-webkit-touch-callout: none) {\n\
                                            .page-footerz {\n\
                                                  position: static;\n\
                                                  bottom: 0mm;\n\
                                            }\n\
                                            .page-headerz {\n\
                                                  position: fixed;\n\
                                                  top: 0mm;\n\
                                                  margin-left: 15px;\n\
                                            }\n\
                                        }\n\
                                        td {\n\
                                            margin: 0 !important;\n\
                                            padding: 0 !important;\n\
                                            border: 0 !important;\n\
                                        }\n\
                                        .region {\n\
                                          break-inside: avoid;\n\
                                        }\n\
                                        .company-logo {\n\
                                            max-height: 300px !important;\n\
                                            max-width: 300px !important;\n\
                                            width: 300px !important;\n\
                                            height: auto !important;\n\
                                        }\n\
                                        .logo-print {\n\
                                            margin-bottom: 0;\n\
                                            padding-bottom: 0;\n\
                                            border-bottom: 0;\n\
                                        }\n\
                                        .zicon {\n\
                                            position: absolute;\n\
                                            top: 370px;\n\
                                        }\n\
                                        thead {display: table-header-group;} \n\
                                        tfoot {display: table-footer-group;}\n\
                                        button {display: none;}\n\
                                        body {margin: 0;}\n\
                                        html, body {\n\
                                            font-size: 16pt;\n\
                                        }\n\
                                        .card-body {\n\
                                            width: 1000px;\n\
                                        }\n\
                                    }\n\
                                </style>')
                mywindow.document.write($('.card').html());

                mywindow.document.close();
                mywindow.focus();

                mywindow.print();
                mywindow.close();
                // var printContents = document.getElementById('content').innerHTML;
                // var originalContents = document.body.innerHTML;

                // document.body.innerHTML = printContents;

                // window.print();

                // document.body.innerHTML = originalContents;
                $(".zicon").attr("hidden", true);
                $(".ziconDisplay").attr("hidden", false);

                // var $el = $(".card-body1");
                // var elHeight = $el.outerHeight();
                // var elWidth = $el.outerWidth();

                // var $wrapper = $("#content1");

                // $wrapper.resizable({
                //   resize: doResize
                // });

                // function doResize(event, ui) {
                  
                //   var scale, origin;
                    
                //   scale = Math.min(
                //     ui.size.width / elWidth,    
                //     ui.size.height / elHeight
                //   );
                  
                //   $el.css({
                //     transform: "translate(-50%, -50%) " + "scale(" + scale + ")"
                //   });
                  
                // }

                // var starterData = { 
                //   size: {
                //     width: $wrapper.width(),
                //     height: $wrapper.height()
                //   }
                // }
                // doResize(null, starterData);
            })
        </script>

        <script>
            document.getElementById('create_pdf').onclick = function() {
                var element = document.getElementById('content');
                var items = <?php echo $i ?>;
                
                    var sixTr = document.querySelector('.prescription-table').offsetHeight;
                var peritem_height = 96;
                var items_height = peritem_height * items;

                var table_size_left = 520 - items_height;
                $(".white_space").css("height", table_size_left);
                // $(".ziconDisplay").attr("style", "top: 250px !important");
                // var rxstyle = "<style>.ziconDisplay{top: 250px !important}</style>";
                console.log(peritem_height);
                console.log(items_height);
                console.log(table_size_left);
                var opt = {
                    margin: [10, 10, 0.5, 5],
                    filename: '<?php echo $patient->name; ?> Prescription.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    // pagebreak: {
                    //     mode: ['avoid-all', 'css', 'legacy'],
                    // },
                    pagebreak: {avoid: '.region'},
                    html2canvas: { scale: 2, scrollY: 0 },
                    jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' },
                    pdfCallback: pdfCallback
                };

                // html2pdf(element, opt).set({
                //     pagebreak: {avoid: 'tr'}
                // });
                html2pdf().set(opt).from(element).save();
                console.log(items);
            };

            function pdfCallback(pdfObject) {
                var number_of_pages = pdfObject.internal.getNumberOfPages()
                var pdf_pages = pdfObject.internal.pages
                var myFooter = "Footer info"
                for (var i = 1; i < pdf_pages.length; i++) {
                    // We are telling our pdfObject that we are now working on this page
                    pdfObject.setPage(i)
                    // The 10,200 value is only for A4 landscape. You need to define your own for other page sizes
                    pdfObject.text(myFooter, 10, 10)
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("table").each(function () {
                    $("tr:gt(0)", this).addClass("tr5-height");
                    var items = <?php echo $i ?>;
                    console.log(items);
                });
            });
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
                $('#prescription-opacity-change').change(function () {
                    if (!this.checked) 
                       $('.prescription-opacity').animate({opacity:0});
                    else 
                        $('.prescription-opacity').animate({opacity:1});
                });
            });
        </script>
    </body>
</html>         
<!--OLD Starts Here-->
