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

                                /* @media (min-width: 768px) {
                                 .new-pull-left {
                                    float: right;
                                  }
                                }*/
                            </style>                        
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
                                        <button type="button" id="print" class="btn btn-info" onClick="javascript:window.print();"><i class="fe fe-printer"></i><span class="button-text"> <?php echo lang('print'); ?></span></button>
                                        
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
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <div class="card-title" id="report">Report</div>
                                    </div> -->
                                    <div class="card-body pt-0">
                                        <div class="row border-bottom border-dark">
                                            <!-- <div class="col-md-2 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 header-brand pl-0">
                                                        <div class="row">
                                                            <div class="col-md-12 image-mobile text-center">
                                                                <img src="<?php if(!empty($settings->logo)) { echo $settings->logo; } else { echo base_url('public/assets/images/brand/logo.png');} ?>" class="header-brand-img-cus"  alt="Rygel Dash logo">
                                                            </div>
                                                            <div class="col-md-12 image-desktop">
                                                                <img src="<?php if(!empty($settings->logo)) { echo $settings->logo; } else { echo base_url('public/assets/images/brand/logo.png');} ?>" class="header-brand-img-cus"  alt="Rygel Dash logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-md-12 col-sm-12 text-center template-opacity">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h2 mb-1"><?php echo $settings->title ?></label>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-0"><?php echo $settings->address ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-0">TIN: 474-984301-000</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-3"><?php echo lang('phone');?>:  <?php echo $settings->phone ?></label>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="col-md-12 col-sm-12 text-center template-opacity">
                                                <div class="row mb-1">
                                                    <?php foreach($branches as $branch) { 
                                                        $barangay_name = $this->location_model->getBarangayById($branch->barangay_id)->name;
                                                        $city_name = $this->location_model->getCityById($branch->city_id)->name;
                                                    ?>
                                                        <div class="col-md-12 col-sm-12 pl-0">
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
                                            </div>
                                            <div class="col-md-12 col-sm-12 text-center template-opacity">
                                                <label class="h4">
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
                                            <div class="col-md-12 col-sm-12 border-bottom border-top border-dark pb-0 pl-0">
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
                                                                        if (!empty($form->id)) {
                                                                            echo $form->id;
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
                                                                            echo $patient->id;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0 template-opacity"><?php echo lang('date'); ?>  </td>
                                                                <td class="w-7 p-0 template-opacity">:</td>
                                                                <td class="w-63 p-0 form-opacity">
                                                                    <?php
                                                                        if (!empty($form->date)) {
                                                                            echo date($settings->date_format_long, $form->date);
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

                                        <div class="row border-top border-dark">
                                            <div class="col-md-12 col-sm-12 pl-0 pt-5 form-opacity">
                                                <?php
                                                    if (!empty($form->report)) {
                                                        echo $form->report;
                                                    }
                                                ?>
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
        <a href="#top" id="back-to-top">
            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
        </a>

        <!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>

        <!-- Bootstrap4 js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!--Sidemenu js-->
        <script src="<?php echo base_url('public/assets/plugins/sidemenu/sidemenu.js'); ?>"></script>

        <!-- P-scroll js-->
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scroll1.js'); ?>"></script>

        <!-- Custom js-->
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <!-- INTERNAL JS INDEX START -->

        <!-- Index js-->
        <script src="<?php echo base_url('public/assets/js/index1.js') ?>"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
        
        

        <!-- INTERNAL JS INDEX END -->

        <script>
            document.getElementById('create_pdf').onclick = function() {
                var element = document.getElementById('content');

                var opt = {
                    margin: 0.2,
                    filename: 'Form_ID_<?php echo $form->id; ?>_<?php echo $form->name; ?>.pdf',
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