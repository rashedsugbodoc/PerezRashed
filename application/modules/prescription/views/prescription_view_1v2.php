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
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="row mt-5 mb-5" id="actionbuttons">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row page-rightheader ml-auto .d-block d-print-none">
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
                                        <button type="button" id="print" class="btn btn-info" onClick="javascript:window.print();"><i class="fe fe-printer"></i><span class="button-text"><?php echo lang('print'); ?></span></button>
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

                        <div class="row" id="content">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-1">
                                            <div class="col-md-12">
                                                <div class="row">
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
                                        <div class="row mb-2">
                                            <div class="col-md-12 pl-0 text-center">
                                                <h6 class="mb-1"><i class="fe fe-phone"></i> <?php echo $doctor->phone; ?></h6>
                                                <h6 class="mb-1"><i class="fe fe-mail"></i> <?php echo $doctor->email; ?></h6>
                                            </div>
                                        </div>            
                                        <div class="row mb-2">
                                            <?php foreach($branches as $branch) { ?>
                                                <div class="col-md col-sm text-center">
                                                    <p class="h6"><i class="fa fa-hospital-o"></i> <strong><?php echo $branch->display_name; ?></strong></p>
                                                    <p class="h6"><i class="fa fa-map-marker"></i> <?php echo $branch->street_address; ?></p>
                                                    <p class="h6"><?php echo $this->location_model->getBarangayById($branch->barangay_id)->name; ?>, <?php echo $this->location_model->getCityById($settings->city_id)->name; ?></p>
                                                    <p class="h6"><i class="fe fe-phone"></i> <?php echo $branch->phone; ?></p>
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
                                        <div class="row border-top border-dark pt-3">
                                            <div class="col-md-6 col-sm-6 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('patient'); ?>: 
                                                    <strong>
                                                        <span class="h5">
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
                                            <div class="col-md-3 col-sm-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('age'); ?>: 
                                                    <strong>
                                                        <span class="h5">
                                                            <?php
                                                            if (!empty($patient)) {
                                                                $birthDate = strtotime($patient->birthdate);
                                                                $birthDate = date('m/d/Y', $birthDate);
                                                                $birthDate = explode("/", $birthDate);
                                                                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
                                                                echo $age . ' Year(s)';
                                                            }
                                                            ?>
                                                        </span>
                                                    </strong>
                                                    
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('gender'); ?>: <strong><span class="h5"><?php echo $patient->sex; ?></span></strong></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-3 border-bottom border-dark pb-3">
                                            <div class="col-md-6 col-sm-6 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('address');?> : <strong><span class="h5"><?php echo $patient->address;?></span></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('prescription_id');?> : <strong><span class="h5"><?php echo $prescription->id; ?></span></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('date');?> : <strong><span class="h5"><?php echo date($settings->date_format_long?$settings->date_format_long:'F j, Y',strtotime($prescription->date)); ?></span></strong></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-bottom border-dark">
                                            
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <!-- <div class="row">
                                                    <div class="col-md-12 pl-0 mt-5">
                                                        <div class="form-group">
                                                            <h1>Rx</h1>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="col-md-1 col-sm-1">
                                                        <!-- <h1><strong>℞</strong></h1> -->
                                                        <h1 class="fs-50">&#8478;</h1>
                                                    </div>
                                                    <div class="col-md-11 col-sm-11 pl-0">
                                                        <div class="form-group">
                                                            <?php
                                                            if (!empty($prescription->medicine)) {
                                                            ?>
                                                            <table class="table">
                                                                <!-- <thead>
                                                                    <tr>
                                                                        <th class="pl-0 td"><?php echo lang('medicine'); ?></th>
                                                                        <th class="pl-0 td"><?php echo lang('instruction'); ?></th>
                                                                        <th class="pl-0 td"><?php echo lang('quantity'); ?></th>
                                                                    </tr>
                                                                </thead> -->
                                                                <tbody>
                                                                    <?php
                                                                    $medicine = $prescription->medicine;
                                                                    $medicine = explode('###', $medicine);
                                                                    $i = 0;
                                                                    foreach ($medicine as $key => $value) {
                                                                    ?>
                                                                    <tr>
                                                                        <?php $single_medicine = explode('***', $value); ?>
                                                                        <td><h4><?php echo $i += 1; ?></h4></td>
                                                                        <td class="pl-0">
                                                                            <h4><p class="mb-2"><strong><?php echo $this->medicine_model->getMedicineById($single_medicine[0])->generic ?></strong> ( <?php echo $this->medicine_model->getMedicineById($single_medicine[0])->name; ?> ) <?php echo $single_medicine[1]; ?></p>
                                                                            <p class="mb-2">Sig: <?php echo $single_medicine[3] ?></p>
                                                                            <p class="mb-2">(<?php echo $single_medicine[4] ?>)</p></h4>
                                                                        </td>
                                                                        <td class="pl-0"><h4><p>#<?php echo $single_medicine[2] ?></p></h4></td>
                                                                    </tr>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mt-8">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 pl-0">
                                                        <div class="form-group">
                                                            <label class="form-label font-weight-bold"><?php echo lang('laboratory'); ?>:</label>
                                                            <label class="form-label"><?php echo $prescription->laboratory; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pl-0">
                                                        <div class="form-group">
                                                            <label class="form-label font-weight-bold"><?php echo lang('history'); ?>:</label>
                                                            <label class="form-label"><?php echo $prescription->symptom; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pl-0">
                                                        <div class="form-group">
                                                            <label class="form-label font-weight-bold"><?php echo lang('advice'); ?>:</label>
                                                            <label class="form-label"><?php echo $prescription->advice; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row mt-8"></div>
                                        <div class="row mt-8"></div>
                                        <div class="row mt-6"></div>
                                        <div class="row">
                                            <div class="col-md-7 col-sm-7">
                                                <div class="form-group">
                                                    <!-- <label class="form-label border-top">
                                                        <?php echo lang('eprescription_label');?>
                                                    </label> -->
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row border-bottom border-dark text-center">
                                                            <div class="col-md-12 col-sm-12">
                                                                <img src="<?php echo $signature->signature; ?>" width="auto" height="auto" style="max-width:200px;max-height:200px; margin-bottom:-30px;"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <h5 class="mb-1 pt-3"><strong><?php echo $doctor->firstname . ' ' . $doctor->middlename . ' ' . $doctor->lastname; ?>, M.D.</strong></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="mb-1 h5"><?php echo lang('license') ?>: <?php echo $doctor->license; ?></label>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="mb-1 h5"><?php echo lang('s2') ?>: <?php echo $doctor->secondary_license_number; ?></label>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="mb-1"><?php echo $settings->address; ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="mb-1"><?php echo $settings->phone; ?></label>
                                                    </div>
                                                </div> -->
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

        <script src="<?php echo base_url('public/assets/plugins/signature/signature_plugin.min.js'); ?>"></script>


        <script>
            document.getElementById('create_pdf').onclick = function() {
                var element = document.getElementById('content');

                var opt = {
                    margin: 0.1,
                    filename: '<?php echo $patient->name; ?> Prescription.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
                };

                html2pdf(element, opt);
            };
        </script>
    </body>
</html>         
<!--OLD Starts Here-->
