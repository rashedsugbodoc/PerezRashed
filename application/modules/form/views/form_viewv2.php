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

                                    @media (max-width: 765px) {
                                        .header-brand-img-cus{
                                            width: 170px;
                                        }
                                        .image-mobile{
                                            display: block;
                                        }
                                        .image-desktop{
                                            display: none;
                                        }

                                    }
                                    @media (min-width: 766px) {
                                        .header-brand-img-cus{
                                            width: 170px;
                                        }
                                        .image-mobile{
                                            display: none;
                                        }
                                        .image-desktop{
                                            display: block;
                                        }
                                    }

                                    .ziconDisplay {
                                        position: absolute;
                                        top: 280px;
                                    }

                                    @page {
                                      margin: 5mm 5mm 15mm 10mm;
                                      height: 1000px;
                                      /*width: 210mm;
                                      height: 297mm;*/
                                      /*margin: 20mm*/
                                    }

                                    @media print and (orientation:portrait){
                                        .page-headerz, .page-header-space {
                                            height: 320px;
                                          /*height: 393px;*/
                                          /*height: 100px;*/
                                        }

                                        .page-headerz, .page-header-space-phone {
                                            height: 2px;
                                        }

                                        .page-footerz, .page-footer-space {
                                          height: 50px;

                                        }

                                        .page-footerz {
                                          position: fixed;
                                          bottom: 0;
                                          width: 100%;
                                          /*border-top: 1px solid black; /* for demo */*/
                                          background: yellow; /* for demo */
                                        }

                                        .page-headerz {
                                          position: fixed;
                                          top: 0mm;
                                          width: 980px;
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
                                            font-size: 14pt;
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
                                <h4 class="page-title"><?php echo lang('form');?> <?php echo lang('details');?></h4>
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="row mt-5 mb-5 d-print-none" id="actionbuttons">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row page-rightheader ml-auto .d-block">
                                    <div class="flex-grow-1">
                                        
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                                        <a href="form" class="btn btn-cyan"><i class="fe fe-arrow-left"></i><span class="button-text"> <?php echo lang('back_to_form_module'); ?></span></a>
                                        <?php }?>
                                        <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                                        <a href="form/myForm" class="btn btn-cyan"><i class="fe fe-arrow-left"></i><span class="button-text"> <?php echo lang('back_to_form_module'); ?></span></a>
                                        <?php }?>

                                    </div>
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
                                        
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                                        <a href="form?id=<?php echo $form->id; ?>" class="btn btn-info"><i class="fe fe-edit"></i><span class="button-text"> <?php echo lang('edit_report'); ?></span></a>
                                        <?php } ?>
                                        
                                    </div>
                                    <div class="flex-grow-1 mr-3">
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                                        <a href="form" class="btn btn-primary pull-right"><i class="fe fe-plus"></i><span class="button-text"> <?php echo lang('add_a_new_report'); ?></span></a>
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
                                            <span class="custom-switch-description mr-2 text-muted">Show Form Details</span>
                                            <input type="checkbox" checked name="custom-switch-checkbox" id="form-opacity-change" class="custom-switch-input">
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
                                <div class="card-body pt-0">
                                    <div class="page-headerz">
                                        <div class="row mb-1 template-opacity">
                                            <div class="col-md-12 col-sm-12 text-center">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h2 mb-0"><?php echo $settings->title ?></label>
                                                    </div>
                                                </div>
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
                                                            <div class="col-md-12 col-sm-12 pl-0">
                                                                <i class="fa fa-hospital-o text-primary"></i>
                                                                <span class="h6 mb-0 align-baseline"><strong><?php echo $branch->display_name; ?></strong></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- <div class="col-md-1 col-sm-1 mb-0">
                                                                <i class="fa fa-map-marker text-primary"></i>
                                                            </div> -->
                                                            <div class="col-md-12 col-sm-12 pl-0">
                                                                <i class="fa fa-map-marker text-primary"></i>
                                                                <span class="h6 mb-0"><?php echo $branch->street_address.', '; if(!empty($barangay_name)) { echo $barangay_name.', ';} echo $city_name; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- <div class="col-md-1 col-sm-1 mb-0">
                                                                <i class="fe fe-phone text-primary"></i>
                                                            </div> -->
                                                            <div class="col-md-12 col-sm-12 pl-0">
                                                                <?php if(!empty($branch->phone)) {?>
                                                                <i class="fe fe-phone text-primary"></i>
                                                                <span class="h6 mb-0"><?php echo $branch->phone; ?></span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="row border-bottom border-dark template-opacity">
                                            
                                        </div>
                                        <div class="row border-bottom border-top border-dark">
                                            <div class="col-md-12 col-sm-12 pb-0 pl-0">
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap mb-1 mt-1" id="example2">
                                                        <tbody>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('patient'); ?> <?php echo lang('name'); ?> </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php 
                                                                        if (!empty($patient->name)) {
                                                                            echo $patient->name;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('form'); ?> <?php echo lang('report'); ?> <?php echo lang('id'); ?>  </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php
                                                                        if (!empty($form->form_number)) {
                                                                            echo $form->form_number;
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('patient_id'); ?>  </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php
                                                                        if (!empty($patient->id)) {
                                                                            echo $patient->patient_id;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('date'); ?>  </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php
                                                                        if (!empty($form->form_date)) {
                                                                            echo date($settings->date_format_long, strtotime($form->form_date.' UTC'));
                                                                        }
                                                                    ?>                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('address'); ?> </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php
                                                                        if (!empty($patient->address)) {
                                                                            echo $patient->address;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('doctor'); ?>  </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php
                                                                        if (!empty($doctor->name)) {
                                                                            echo lang('dr') . '. '. $doctor->name;
                                                                        }
                                                                    ?>                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('phone'); ?> </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php
                                                                        if (!empty($patient->phone)) {
                                                                            echo $patient->phone;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0"> </td>
                                                                <td class="w-7 p-0"></td>
                                                                <td class="w-63 p-0"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-top border-dark template-opacity">
                                                
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <table class="prescription-table">
                                                <thead>
                                                  <tr>
                                                    <td>
                                                      <!--place holder for the fixed-position header-->
                                                      <div class="page-header-space"></div>
                                                      <?php if (!empty($doctor->phone)) { ?>
                                                        <div class="page-header-space-phone"></div>
                                                      <?php } ?>
                                                    </td>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                          <!--*** CONTENT GOES HERE ***-->
                                                            <div class="region">
                                                            <br/>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 text-center form-opacity">
                                                                        <label class="h3">
                                                                            <?php
                                                                                if (!empty($form->name)) {
                                                                                    echo $form->name;
                                                                                } else {
                                                                                    echo lang('form_report');
                                                                                }
                                                                            ?>                                                            
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 pl-0 pt-0 form-opacity">
                                                                        <?php
                                                                            if (!empty($form->report)) {
                                                                                echo $form->report;
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
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
            $(document).ready(function () {
                $("#printDesktop").click(function () {
                    // $(".zicon").attr("hidden", false);
                    // $(".ziconDisplay").attr("hidden", true);
                    window.print();
                    // $(".zicon").attr("hidden", true);
                    // $(".ziconDisplay").attr("hidden", false);
                })
            })
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

                var opt = {
                    margin: [10, 10, 0.5, 5],
                    filename: 'Form_ID_<?php echo $form->id; ?>_<?php echo $form->name; ?>.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' }
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
                $('#form-opacity-change').change(function () {
                    if (!this.checked) 
                       $('.form-opacity').animate({opacity:0});
                    else 
                        $('.form-opacity').animate({opacity:1});
                });
            });
        </script>
    </body>
</html>         
<!--OLD Starts Here-->
