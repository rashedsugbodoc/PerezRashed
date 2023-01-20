<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo ucfirst($this->ion_auth->get_users_groups($user)->row()->name) . ' ' . lang('dashboard'); ?></h4>
                            </div>
                        </div>
                        <!--End Page header-->

                        <div class="modal fade" tabindex="-1" role="dialog" id="cmodal">
                            <div class="modal-dialog modal-lg" role="document" style="width: 80%;">
                                <div class="modal-content modal-content-demo">
                                    
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('patient') . " " . lang('history'); ?></h6>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    
                                    <div id='medical_history'>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php if (!$this->ion_auth->in_group('superadmin')) { ?>
                            <?php if (!$this->ion_auth->in_group('Doctor')) { ?>
                                
                                <div class="row">
                                    <!-- Doctor Count Card Start -->
                                        <?php if (in_array('doctor', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="doctor">
                                                        <div class="card bg-primary">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('doctor'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('doctor');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-user-md fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Doctor Count Card End -->

                                    <!-- Patient Count Card Start -->
                                        <?php if (in_array('patient', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="patient">
                                                        <div class="card bg-secondary">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('patient'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('patient');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-user-plus fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Patient Count Card End -->

                                    <!-- Appointment Count Card Start -->
                                        <?php if (in_array('appointment', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="appointment">
                                                        <div class="card bg-warning">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('appointment'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('appointment');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-calendar fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Appointment Count Card End -->

                                    <!-- Prescription Count Card Start -->
                                        <?php if (in_array('prescription', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="prescription/all">
                                                        <div class="card bg-info">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('prescription'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('prescription');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-file-text-o fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Prescription Count Card End -->

                                    <!-- Case History Count Card Start -->
                                        <?php if (in_array('patient', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="patient/caseList">
                                                        <div class="card bg-primary">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('case_note'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('case_note');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-book fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Case History Count Card End -->

                                    <!-- Lab Report Count Card Start -->
                                        <?php if (in_array('lab', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="lab">
                                                        <div class="card bg-secondary">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('lab_report'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('lab');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-paste fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Lab Report Count Card End -->

                                    <!-- Documents Count Card Start -->
                                        <?php if (in_array('patient', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="patient/documents">
                                                        <div class="card bg-warning">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('documents'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('patient_material');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-address-book-o fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Documents Count Card End -->

                                    <!-- Payment Invoice Count Card Start -->
                                        <?php if (in_array('finance', $this->modules)) { ?>
                                            <div class="col-sm-12 col-md-6 col-xl-3">
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a href="finance/invoices">
                                                        <div class="card bg-info">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div>
                                                                        <h6 class="text-white"><?php echo lang('payment'); ?> <?php echo lang('invoice'); ?></h6>
                                                                        <h2 class="text-white m-0 font-weight-bold">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $this->db->from('invoice');
                                                                            $count = $this->db->count_all_results();
                                                                            echo $count;
                                                                            ?>
                                                                        </h2>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <span class="text-white display-6"><i class="fa fa-usd fa-2x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <!-- Payment Invoice Count Card End -->

                                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                            <?php if (in_array('finance', $this->modules)) { ?>
                                                <div class="col-lg-8 col-sm-12">
                                                    <div id="chart_div" class="card" style=""></div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <div id="piechart_3d" class="card" style=""></div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>

                                        <div class="col-md-12 col-sm-12 col-lg-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title"><?php echo date('D, d F Y'); ?></h3>
                                                </div>
                                                <div class="card-body pt-3">
                                                    <?php if (in_array('finance', $this->modules)) { ?>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-database fs-60 text-success icon-dropshadow-success mr-5"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('income'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $settings->currency; ?><?php echo number_format($this_day['payment'], 2, '.', ','); ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-chart-bar fs-60 text-primary icon-dropshadow-primary mr-5"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('expense'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $settings->currency; ?><?php echo number_format($this_day['expense'], 2, '.', ','); ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (in_array('appointment', $this->modules)) { ?>
                                                    <div class="row">
                                                        <div class="col-12 col-sm d-flex mb-sm-0">
                                                            <i class="typcn typcn-calendar-outline fs-60 text-danger icon-dropshadow-danger mr-5"></i>
                                                            <div class="mt-5">
                                                                <h6><?php echo lang('appointment'); ?></h6>
                                                                <h3 class="mb-0 font-weight-bold"><?php echo $this_day['appointment']; ?> </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-lg-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title"><?php echo date('F Y'); ?></h3>
                                                </div>
                                                <div class="card-body pt-3">
                                                    <?php if (in_array('finance', $this->modules)) { ?>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-database fs-60 text-success icon-dropshadow-success"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('income'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $settings->currency; ?><?php echo number_format($this_month['payment'], 2, '.', ','); ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-chart-bar fs-60 text-primary icon-dropshadow-primary"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('expense'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $settings->currency; ?><?php echo number_format($this_month['expense'], 2, '.', ','); ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (in_array('appointment', $this->modules)) { ?>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-chart-bar fs-60 text-danger icon-dropshadow-danger"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('appointment'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $this_month['appointment']; ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-lg-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title"><?php echo date('Y'); ?></h3>
                                                </div>
                                                <div class="card-body pt-3">
                                                    <?php if (in_array('finance', $this->modules)) { ?>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-database fs-60 text-success icon-dropshadow-success"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('income'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $settings->currency; ?><?php echo number_format($this_year['payment'], 2, '.', ','); ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-chart-bar fs-60 text-primary icon-dropshadow-primary"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('expense'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $settings->currency; ?><?php echo number_format($this_year['expense'], 2, '.', ','); ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (in_array('appointment', $this->modules)) { ?>
                                                        <div class="row">
                                                            <div class="col-12 col-sm d-flex mb-sm-0">
                                                                <i class="typcn typcn-chart-bar fs-60 text-danger icon-dropshadow-danger"></i>
                                                                <div class="mt-5">
                                                                    <h6><?php echo lang('appointment'); ?></h6>
                                                                    <h3 class="mb-0 font-weight-bold"><?php echo $this_year['appointment']; ?> </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                            <?php if (in_array('appointment', $this->modules)) { ?>
                                                <div class="col-md-5 col-sm-6">
                                                    <div id="donutchart" class="card" style=""></div>
                                                </div>
                                            <?php } ?>

                                            <?php if (in_array('notice', $this->modules)) { ?>
                                                <div class="col-md-7 col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title"><?php echo lang('notice'); ?></h3>
                                                            <div class="card-options">
                                                                <div class="btn-group ml-5 mb-0">
                                                                    <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-plus"></i> Actions</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="notice/addNewView"><i class="fa fa-plus mr-2"></i><?php echo lang('add'); ?> <?php echo lang('notice'); ?></a>
                                                                        <a class="dropdown-item" href="notice"><i class="fa fa-eye mr-2"></i><?php echo lang('all'); ?> <?php echo lang('notice'); ?></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example1" class="table table-striped table-bordered text-nowrap" style="width:100%">
                                                                    <thead>
                                                                        <tr class="bold">
                                                                            <th class="border-bottom-0"><?php echo lang('title'); ?></th>
                                                                            <th class="border-bottom-0"><?php echo lang('description'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($notices as $notice) { ?>
                                                                            <tr class="">
                                                                                <td> <?php echo $notice->title; ?></td>
                                                                                <td> <?php echo $notice->description; ?></td>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        <?php } ?>

                                        <?php if (in_array('appointment', $this->modules)) { ?>
                                            <?php if (!$this->ion_auth->in_group('Doctor')) { ?>
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <aside class="calendar_ui col-md-12 calendar_ui">
                                                                <section class="">
                                                                    <div class="">
                                                                        <div id="calendar" class="has-toolbar calendar_view"></div>
                                                                    </div>
                                                                </section>
                                                            </aside>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php } else { ?>
                                                <div class="state-overview col-md-12 card row">
                                                    <aside class="calendar_ui">
                                                        <section class="">
                                                            <div class="">
                                                                <div id="calendar" class="has-toolbar calendar_view"></div>
                                                            </div>
                                                        </section>
                                                    </aside>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>

                                </div>

                            <?php } ?>
                        <?php } ?>

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
        <!--Moment js-->
        <!-- Jquery js-->
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

        <!-- WYSIWYG Editor js -->
        <script src="<?php echo base_url('public/assets/plugins/wysiwyag/jquery.richtext.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor.js'); ?>"></script>

        <!-- quill js -->
        <script src="<?php echo base_url('public/assets/plugins/quill/quill.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor2.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- Clipboard js -->
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.js'); ?>"></script>

        <!-- Prism js -->
        <script src="<?php echo base_url('public/assets/plugins/prism/prism.js'); ?>"></script>

        <!---Tabs js-->
        <script src="<?php echo base_url('public/assets/plugins/tabs/jquery.multipurpose_tabcontent.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/tabs.js'); ?>"></script>

        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <!-- <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script> -->
        <script src="<?php echo base_url('public/assets/js/app-calendar.js'); ?>"></script>
        
        <script type="text/javascript" src="common/js/google-loader.js"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var months = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];

            var d = new Date();
            var selectedMonthName = months[d.getMonth()] + ', ' + d.getFullYear();


            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Income', <?php
            if (!empty($this_month['payment'])) {
                echo $this_month['payment'];
            } else {
                echo '0';
            }
            ?>],
                ['Expense', <?php
            if (!empty($this_month['expense'])) {
                echo $this_month['expense'];
            } else {
                echo '0';
            }
            ?>],
            ]);

            var options = {
                title: selectedMonthName,
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>




    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var months = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];

            var d = new Date();
            var selectedMonthName = months[d.getMonth()] + ', ' + d.getFullYear();

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Treated', <?php
            if (!empty($this_month['appointment_treated'])) {
                echo $this_month['appointment_treated'];
            } else {
                echo '0';
            }
            ?>],
                ['cancelled', <?php
            if (!empty($this_month['appointment_cancelled'])) {
                echo $this_month['appointment_cancelled'];
            } else {
                echo '0';
            }
            ?>],
            ]);

            var options = {
                title: selectedMonthName + ' Appointment',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Income', 'Expense'],
                ['Jan', <?php echo $this_year['payment_per_month']['january']; ?>, <?php echo $this_year['expense_per_month']['january']; ?>],
                ['Feb', <?php echo $this_year['payment_per_month']['february']; ?>, <?php echo $this_year['expense_per_month']['february']; ?>],
                ['Mar', <?php echo $this_year['payment_per_month']['march']; ?>, <?php echo $this_year['expense_per_month']['march']; ?>],
                ['Apr', <?php echo $this_year['payment_per_month']['april']; ?>, <?php echo $this_year['expense_per_month']['april']; ?>],
                ['May', <?php echo $this_year['payment_per_month']['may']; ?>, <?php echo $this_year['expense_per_month']['may']; ?>],
                ['June', <?php echo $this_year['payment_per_month']['june']; ?>, <?php echo $this_year['expense_per_month']['june']; ?>],
                ['July', <?php echo $this_year['payment_per_month']['july']; ?>, <?php echo $this_year['expense_per_month']['july']; ?>],
                ['Aug', <?php echo $this_year['payment_per_month']['august']; ?>, <?php echo $this_year['expense_per_month']['august']; ?>],
                ['Sep', <?php echo $this_year['payment_per_month']['september']; ?>, <?php echo $this_year['expense_per_month']['september']; ?>],
                ['Oct', <?php echo $this_year['payment_per_month']['october']; ?>, <?php echo $this_year['expense_per_month']['october']; ?>],
                ['Nov', <?php echo $this_year['payment_per_month']['november']; ?>, <?php echo $this_year['expense_per_month']['november']; ?>],
                ['Dec', <?php echo $this_year['payment_per_month']['december']; ?>, <?php echo $this_year['expense_per_month']['december']; ?>],
            ]);

            var options = {
                title: new Date().getFullYear() + ' <?php echo lang('per_month_income_expense'); ?>',
                vAxis: {title: '<?php echo $settings->currency; ?>'},
                hAxis: {title: '<?php echo lang('months'); ?>'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#calendar').fullCalendar({
                lang: 'en',
                events: 'appointment/getAppointmentByJason',
                header:
                        {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,basicWeek,basicDay',
                        },
                /*    timeFormat: {// for event elements
                 'month': 'h:mm TT A {h:mm TT}', // default
                 'week': 'h:mm TT A {h:mm TT}', // default
                 'day': 'h:mm TT A {h:mm TT}'  // default
                 },
                 
                 */
                timeFormat: 'h(:mm) A',
                eventRender: function (event, element) {
                    element.find('.fc-time').html(element.find('.fc-time').text());
                    element.find('.fc-title').html(element.find('.fc-title').text());

                },
                eventClick: function (event) {
                    $('#medical_history').html("");
                    if (event.id) {
                        $.ajax({
                            url: 'patient/getMedicalHistoryByJason?id=' + event.id + '&from_where=calendar',
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                // Populate the form fields with the data returned from server
                                $('#medical_history').html("");
                                $('#medical_history').append(response.view);
                            }
                        });
                        //alert(event.id);

                    }

                    $('#cmodal').modal('show');
                },

                /*   eventMouseover: function (calEvent, domEvent) {
                 var layer = "<div id='events-layer' class='fc-transparent' style='position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100'>Description</div>";
                 $(this).append(layer);
                 },
                 
                 eventMouseout: function (calEvent, domEvent) {
                 $(this).append(layer);
                 },
                 
                 */

                slotDuration: '00:5:00',
                businessHours: false,
                slotEventOverlap: false,
                editable: false,
                selectable: false,
                lazyFetching: true,
                minTime: "6:00:00",
                maxTime: "24:00:00",
                defaultView: 'month',
                allDayDefault: false,
                displayEventEnd: true,
                timezone: false,

            });
        });

    </script>

    </body>
</html> 