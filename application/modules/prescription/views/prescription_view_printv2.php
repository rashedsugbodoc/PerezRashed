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


                                    /* @media (min-width: 768px) {
                                     .new-pull-left {
                                        float: right;
                                      }
                                    }*/
                                </style>

                        <?php
                        $doctor = $this->doctor_model->getDoctorById($prescription->doctor);
                        $patient = $this->patient_model->getPatientById($prescription->patient);
                        ?>
                        <div class="page-header d-print-none">
                            <div class="page-leftheader">
                                <h4 class="page-title">Prescription</h4>
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
                                        <a href="edit_prescription" class="btn btn-info"><i class="fe fe-edit"></i><span class="button-text"> Edit</span></a>
                                    </div>
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                        <div class="flex-grow-1 mr-3">
                                            <a href="prescription/addPrescriptionView" class="btn btn-primary pull-right"><i class="fe fe-plus"></i><span class="button-text">  <?php echo lang('add_prescription'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="content">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-1">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <h2><?php
                                                    if (!empty($doctor)) {
                                                        echo $doctor->name;
                                                    } 
                                                        ?>
                                                    </h2>
                                                </div>
                                                <div class="row">
                                                    <h4><?php
                                                    if (!empty($doctor)) {
                                                        echo $doctor->profile;
                                                    }
                                                    ?>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 header-brand pl-0">
                                                        <img src="<?php echo $settings->logo; ?>" class="header-brand-img desktop-lgo pull-right" style="height: 60px;" alt="Rygel Dash logo">
                                                        <img src="<?php echo base_url('public/assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-logo pull-right" style="height: 60px;" alt="Rygel Dash logo">
                                                        <img src="<?php echo base_url('public/assets/images/brand/favicon.png'); ?>" class="header-brand-img mobile-logo pull-right" style="height: 60px;" alt="Rygel Dash logo">
                                                        <img src="<?php echo base_url('public/assets/images/brand/favicon1.png'); ?>" class="header-brand-img darkmobile-logo pull-right" style="height: 60px;" alt="Rygel Dash logo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 pl-0">
                                                <i class="fe fe-mail"></i><?php echo $settings->address; ?>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-md-12 col-sm-12 pl-0">
                                                <i class="fe fe-phone"></i><?php echo $settings->phone; ?>
                                            </div>
                                        </div>
                                        <div class="row border-bottom border-dark">
                                            
                                        </div>
                                        <div class="row border-top border-dark pt-3">
                                            <div class="col-md-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('patient'); ?>: <?php
                                                    if (!empty($patient)) {
                                                        echo $patient->name;
                                                    }
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('patient_id'); ?>: <?php
                                                    if (!empty($patient)) {
                                                        echo $patient->id;
                                                    }
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('age'); ?>: <?php
                                                    if (!empty($patient)) {
                                                        $birthDate = strtotime($patient->birthdate);
                                                        $birthDate = date('m/d/Y', $birthDate);
                                                        $birthDate = explode("/", $birthDate);
                                                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
                                                        echo $age . ' Year(s)';
                                                    }
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('gender'); ?>: <?php echo $patient->sex; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-3">
                                            <div class="col-md-6 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('address');?> : <?php echo $patient->address;?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('prescription_id');?> : <?php echo $prescription->prescription_number; ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-0">
                                                <div class="form-group mb-0">
                                                    <label class="form-label mb-0"><?php echo lang('date');?> : <?php echo date('d-m-Y',strtotime($prescription->date)); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 pl-0 mt-5">
                                                        <div class="form-group">
                                                            <h1>Rx</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pl-0">
                                                        <div class="form-group">
                                                            <?php
                                                            if (!empty($prescription->medicine)) {
                                                            ?>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="pl-0 td"><?php echo lang('medicine'); ?></th>
                                                                        <th class="pl-0 td"><?php echo lang('instruction'); ?></th>
                                                                        <th class="pl-0 td"><?php echo lang('frequency'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $medicine = $prescription->medicine;
                                                                    $medicine = explode('###', $medicine);
                                                                    foreach ($medicine as $key => $value) {
                                                                    ?>
                                                                    <tr>
                                                                        <?php $single_medicine = explode('***', $value); ?>
                                                                        <td class="pl-0"><?php echo $this->medicine_model->getMedicineById($single_medicine[0])->name . ' - ' . $single_medicine[1]; ?></td>
                                                                        <td class="pl-0"><?php echo $single_medicine[3] . ' - ' . $single_medicine[4]; ?></td>
                                                                        <td class="pl-0"><?php echo $single_medicine[2] ?></td>
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
                                        <div class="row mt-8">
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
                                        </div>
                                        <div class="row mt-8"></div>
                                        <div class="row mt-8"></div>
                                        <div class="row mt-6"></div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-8 text-right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2><?php echo $settings->title; ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-center border-top">
                                                        <?php echo lang('signature');?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-8 text-right">
                                                <label><?php echo $settings->address; ?></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-8 text-right">
                                                <label><?php echo $settings->phone; ?></label>
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

        <script>
            document.getElementById('create_pdf').onclick = function() {
                var element = document.getElementById('content');

                var opt = {
                    margin: 0.2,
                    filename: 'prescription_id_<?php echo $prescription->id; ?>.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
                };

                html2pdf(element, opt);
            };
        </script>
        <script type="text/javascript">
              document.addEventListener("DOMContentLoaded", () => {
                window.print();
              });
        </script>

    </body>
</html> 
        

<!--OLD Starts Here-->
