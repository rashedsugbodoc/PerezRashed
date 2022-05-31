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
                                      background: rgba(0, 0, 0, 0.5); /* Black see-through */
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

                        <?php
                        
                        
                        ?>
                        <div class="page-header d-print-none">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('lab').' '.lang('request') ;?> <?php echo lang('details');?></h4>
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="row mb-5 mt-5 d-print-none" id="actionbuttons">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row page-rightheader ml-auto .d-block">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <div class="flex-grow-1">
                                            <a href="labrequest" class="btn btn-cyan"><i class="fe fe-arrow-left"></i><span class="button-text"> <?php echo lang('all'); ?> <?php echo lang('lab') . ' ' . lang('request'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                        <div class="flex-grow-1">
                                            <a href="labrequest" class="btn btn-cyan"><i class="fe fe-arrow-left"></i><span class="button-text"> <?php echo lang('all'); ?> <?php echo lang('lab') . ' ' . lang('request'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                    <div class="flex-grow-2">
                                        <button type="button" class="btn btn-info" id="create_pdf"><i class="fe fe-download"></i><span class="button-text"> <?php echo lang('download'); ?></span></button>
                                        <button type="button" id="print" class="btn btn-info" onClick="javascript:window.print();"><i class="fe fe-printer"></i><span class="button-text"><?php echo lang('print'); ?></span></button>
                                        <!-- <button type="button" class="btn btn-info"><i class="fe fe-edit"></i><span class="button-text"> Edit</span></button> -->
                                        <!--a href="prescription/editPrescription?id=<?php echo $prescription->id;?>" class="btn btn-info"><i class="fe fe-edit"></i><span class="button-text"> Edit</span></a-->
                                    </div>
                                    <div class="flex-grow-1 mr-3">
                                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                            <a href="labrequest/addLabRequestView" class="btn btn-primary pull-right"><i class="fe fe-plus"></i><span class="button-text">  <?php echo lang('add') . ' ' . lang('lab') . ' ' . lang('request'); ?></span></a>
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

                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="content">
                                <div class="card">
                                    <div class="card-body">
                                        <header>
                                            <div class="template-opacity">
                                                <div class="row mb-1">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <!-- <div class="col-md-1">
                                                                <div class="form-group text-center">
                                                                    <img src="<?php echo base_url('uploads/sugbodoc-square.png'); ?>" width="auto" height="auto" style="max-width: 100px;max-height: 100px;">
                                                                </div>
                                                            </div> -->
                                                            <div class="col-md-12 col-sm-12 text-center">
                                                                <h3 class="mb-2"><?php
                                                                if (!empty($doctor)) {
                                                                    echo $doctor->professional_display_name;
                                                                } 
                                                                    ?>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 pl-0 text-center">
                                                                <h5 class="mb-1"><?php
                                                                if (!empty($doctor)) {
                                                                    echo $spec;
                                                                }
                                                                ?>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 header-brand pl-0">
                                                                <img src="<?php if(!empty($settings->logo)) { echo $settings->logo; } else { echo base_url('public/assets/images/brand/logo.png');} ?>" class="header-brand-img desktop-lgo pull-right" style="height: 60px;" alt="<?php echo $settings->title;?>">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <!-- <?php if (!empty($doctor->license)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 pl-0 text-center">
                                                            <i class="fa fa-stethoscope"></i>  <?php echo lang('license');?> # : <span class="h4"><?php echo $doctor->license; ?></span>
                                                        </div>
                                                    </div>
                                                <?php } ?> -->
                                                <!-- <div class="row mb-5">
                                                    <div class="col-md-12 col-sm-12 pl-0 text-center">
                                                        <h5 class="mb-1"><i class="fa fa-map-marker"></i> <?php echo $settings->address; ?></h5>
                                                        <h5 class="mb-1"><?php echo $this->location_model->getBarangayById($settings->barangay_id)->name; ?>, <?php echo $this->location_model->getCityById($settings->city_id)->name; ?></h5>
                                                        <h5 class="mb-1"><i class="fe fe-phone"></i> <?php echo $doctor->phone; ?></h5>
                                                        <h5 class="mb-1"><i class="fe fe-mail"></i> <?php echo $doctor->email; ?></h5>
                                                    </div>
                                                </div>        -->         
                                                <div class="row mb-1">
                                                    <div class="col-md-12 pl-0 text-center">
                                                        <h6 class="mb-1"><i class="fe fe-phone text-primary"></i> &nbsp;&nbsp;<?php echo $doctor->phone; ?></h6>
                                                        <h6 class="mb-1"><i class="fe fe-mail text-primary"></i> &nbsp;&nbsp;<?php echo $doctor->email; ?></h6>
                                                    </div>
                                                </div>            
                                                <div class="row mb-1">
                                                    <?php foreach($branches as $branch) { 
                                                        $barangay_name = $this->location_model->getBarangayById($branch->barangay_id)->name;
                                                        $city_name = $this->location_model->getCityById($branch->city_id)->name;
                                                    ?>
                                                        <div class="col-md col-sm pl-0">
                                                            <div class="row">
                                                                <div class="col-md-1 col-sm-1 mb-0">
                                                                    <i class="fa fa-hospital-o text-primary"></i>
                                                                </div>
                                                                <div class="col-md-11 col-sm-11 pl-0">
                                                                    <span class="h6 mb-1 align-baseline"><strong><?php echo $branch->display_name; ?></strong></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1 col-sm-1 mb-0">
                                                                    <i class="fa fa-map-marker text-primary"></i>
                                                                </div>
                                                                <div class="col-md-11 col-sm-11 pl-0">
                                                                    <span class="h6 mb-1"><?php echo $branch->street_address; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1 col-sm-1 mb-0">
                                                                    
                                                                </div>
                                                                <div class="col-md-11 col-sm-11 pl-0">
                                                                    <span class="h6 mb-1"><?php if(!empty($barangay_name)) echo $barangay_name.', '; ?><?php if(!empty($city_name)) echo $city_name; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1 col-sm-1 mb-0">
                                                                    <i class="fe fe-phone text-primary"></i>
                                                                </div>
                                                                <div class="col-md-11 col-sm-11 pl-0">
                                                                    <?php if(!empty($branch->phone)) {?>
                                                                    <span class="h6 mb-1"><?php echo $branch->phone; ?></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <!-- <div class="row mb-5">
                                                    <div class="col-md-12 col-sm-12 pl-0 text-center">
                                                        <i class="fe fe-phone"></i> <span class="h4"><?php echo $settings->phone; ?></span>
                                                    </div>
                                                </div> -->
                                                <div class="row border-bottom border-dark">
                                                    
                                                </div>
                                                <div class="row border-top border-dark pt-2">
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 pb-1">
                                                    <div class="form-group mb-0">
                                                        <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('name'); ?>: </span>
                                                        <strong>
                                                            <span class="h5 prescription-opacity">
                                                                <?php echo $patient->name ?>
                                                            </span>
                                                        </strong>
                                                        
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 pb-1">
                                                    <div class="form-group mb-0 prescription-opacity">
                                                        <label class="form-label mb-0"><?php echo lang('lab').' '.lang('request').' '.lang('id');?> : <strong><span class="h5"><?php echo $labrequest->lab_request_number; ?></span></strong></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 pb-1">
                                                    <div class="form-group mb-0">
                                                        <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('date');?> : </span><strong><span class="h5 prescription-opacity"><?php echo date('M j, Y',strtotime($labrequest->request_date.' UTC')); ?></span></strong></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-2">
                                                <div class="col-md-6 col-sm-6 pt-1">
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
                                                <div class="col-md-3 col-sm-3 pt-1">
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
                                                        <label class="form-label mb-0"><span class="template-opacity"><?php echo lang('sex'); ?>: </span><strong><span class="h5 prescription-opacity"><?php echo $patient->sex; ?></span></strong></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row border-bottom border-dark template-opacity">
                                                
                                            </div>
                                            <div class="row border-top border-dark template-opacity">
                                                    
                                            </div>
                                        </header>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="row content-block-body">
                                                    <div class="col-md-1 col-sm-1 template-opacity">
                                                        <!-- <h1><strong>℞</strong></h1> -->
                                                        <header>
                                                            <h1 class="fs-50">&#8478;</h1>
                                                        </header>
                                                    </div>
                                                    <div class="col-md-11 col-sm-11 pl-0 prescription-opacity">
                                                        <div class="form-group">
                                                            <?php
                                                            if (!empty($labrequest->id)) {
                                                            $i = 0;
                                                            ?>
                                                            <table class="table prescription-table">
                                                                <tbody>
                                                                    <?php foreach($lab_request_number as $labrequest_number) { ?>
                                                                        <tr class="content-block-item">
                                                                            <td class="pb-0 pt-2"><h4><?php echo $i += 1; ?>.</h4></td>
                                                                            <td class="pl-0 pb-0 pt-2">
                                                                                <h4><p class="mb-2"><strong>
                                                                                <?php
                                                                                    if (!empty($labrequest_number->long_common_name)) {
                                                                                        echo $labrequest_number->long_common_name;
                                                                                    } else {
                                                                                        echo $labrequest_number->lab_request_text;
                                                                                    }
                                                                                ?>
                                                                                </strong></p>
                                                                                <p class="mb-2"><?php echo $labrequest_number->instructions; ?></p>
                                                                                <?php if (!empty($labrequest_number->loinc_num)) { ?>
                                                                                    <p class="mb-2"><span><?php echo lang('loinc_code'); ?>: </span><?php echo $labrequest_number->loinc_num; ?></p></h4>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row white_space">
                                            
                                        </div>
                                        <div class="clearfix">
                                            <footer>
                                                <div class="row template-opacity prescription-footer">
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="row">
                                                            <div class="form-group text-center">
                                                                <img class="company-logo" src="<?php echo base_url('public/assets/images/brand/logo.png'); ?>" width="auto" height="auto" style="max-width: 200px;max-height: 200px;margin-top: 160px;">
                                                                <h4 class="text-primary">www.sugbodoc.com</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 pull-right">
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
                                            </footer>
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


        <script>
            document.getElementById('create_pdf').onclick = function() {
                var element = document.getElementById('content');
                var items = <?php echo $i ?>;
                
                    var sixTr = document.querySelector('.prescription-table').offsetHeight;
                var peritem_height = 96;
                var items_height = peritem_height * items;

                var table_size_left = 520 - items_height;
                $(".white_space").css("height", table_size_left);
                console.log(peritem_height);
                console.log(items_height);
                console.log(table_size_left);
                var opt = {
                    margin: [0, 0.2, 0, 0.2],
                    filename: '<?php echo $patient->name; ?> LabRequest.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2, scrollY: 0 },
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' },
                    pdfCallback: pdfCallback
                };

                html2pdf(element, opt).set({
                    pagebreak: {avoid: 'footer'}
                });
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
