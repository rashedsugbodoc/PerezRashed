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
                                <h4 class="page-title"><?php echo lang('pharmacy'); ?> <?php echo lang('dashboard'); ?></h4>
                            </div>
                        </div>
                        <!--End Page header-->

                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-3">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="finance/pharmacy/todaySales">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h6 class="text-white"><?php echo lang('today_sales'); ?></h6>
                                                        <h2 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?> <?php
                                                                echo number_format($today_sales_amount, 2, '.', ','); 
                                                            ?>
                                                        </h2>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <span class="text-white display-6"><i class="fa fa-plus fa-2x"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-3">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="finance/pharmacy/todayExpense">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h6 class="text-white"><?php echo lang('today_expense'); ?></h6>
                                                        <h2 class="text-white m-0 font-weight-bold">
                                                            <?php echo $settings->currency; ?> <?php
                                                                echo number_format($today_expenses_amount, 2, '.', ','); 
                                                            ?>
                                                        </h2>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <span class="text-white display-6"><i class="fa fa-minus fa-2x"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-3">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="finance/pharmacy/todaySales">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h6 class="text-white"><?php echo lang('medicine'); ?></h6>
                                                        <h2 class="text-white m-0 font-weight-bold">
                                                            <?php 
                                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                $this->db->from('medicine');
                                                                $count = $this->db->count_all_results();
                                                                echo $count;
                                                            ?>
                                                        </h2>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <span class="text-white display-6"><i class="fa fa-medkit fa-2x"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-3">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="finance/pharmacy/todaySales">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center">
                                                    <div>
                                                        <h6 class="text-white"><?php echo lang('staff'); ?></h6>
                                                        <h2 class="text-white m-0 font-weight-bold">
                                                            <?php 
                                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                $this->db->from('pharmacist');
                                                                $count = $this->db->count_all_results();
                                                                echo $count;
                                                            ?>
                                                        </h2>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <span class="text-white display-6"><i class="fa fa-user fa-2x"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="chart_div" class="card" style=""></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <?php echo lang('latest_sales'); ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered text-nowrap key-buttons editable-sample1">
                                                    <thead>
                                                        <tr>
                                                            <th> <?php echo lang('date'); ?> </th>
                                                            <th class="text-center"> <?php echo lang('grand_total').' ('.$settings->currency.') '; ?> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($payments as $payment) {
                                                            $i = $i + 1;
                                                            ?>
                                                            <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>
                                                            <tr class="">
                                                                <td><?php echo date('Y-m-d', $payment->date); ?></td>
                                                                <td class="text-right"><?php echo number_format($payment->gross_total, 2, '.', ','); ?></td>
                                                            </tr>
                                                            <?php
                                                            if ($i == 10)
                                                                break;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <?php echo lang('latest_expense'); ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered text-nowrap key-buttons editable-sample1">
                                                    <thead>
                                                        <tr>
                                                            <th> <?php echo lang('category'); ?> </th>
                                                            <th> <?php echo lang('date'); ?> </th>
                                                            <th class="text-center"> <?php echo lang('amount').' ('.$settings->currency.')'; ?> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($expenses as $expense) {
                                                        $i = $i + 1;
                                                        ?>
                                                        <tr class="">
                                                            <td><?php echo $expense->category; ?></td>
                                                            <td> <?php echo date('Y-m-d', $expense->date); ?></td>
                                                            <td class="text-right"><?php echo number_format($expense->amount, 2, '.', ','); ?></td>
                                                        </tr>
                                                        <?php
                                                        if ($i == 10)
                                                            break;
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2><?php echo lang('statistics'); ?></h2>
                                                        <p><?php echo lang('this_month'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered text-nowrap key-buttons editable-sample1">
                                                            <tbody>  
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <?php echo lang('number_of_sales'); ?>
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-important">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $query_n_o_s = $this->db->get('pharmacy_payment')->result();
                                                                            $i = 0;
                                                                            foreach ($query_n_o_s as $q_n_o_s) {
                                                                                if (date('m/y', time()) == date('m/y', $q_n_o_s->date)) {
                                                                                    $i = $i + 1;
                                                                                }
                                                                            }
                                                                            echo $i;
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div id="work-progress1"><canvas width="47" height="20" style="display: inline-block; width: 47px; height: 20px; vertical-align: top;"></canvas></div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <?php echo lang('total_sales'); ?>
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-important">
                                                                            <?php echo $settings->currency; ?>
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $query = $this->db->get('pharmacy_payment')->result();
                                                                            $sales_total = array();
                                                                            foreach ($query as $q) {
                                                                                if (date('m', time()) == date('m', $q->date)) {
                                                                                    $sales_total[] = $q->gross_total;
                                                                                }
                                                                            }
                                                                            if (!empty($sales_total)) {
                                                                                echo number_format(array_sum($sales_total), 2, '.', ',');
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div id="work-progress1"><canvas width="47" height="20" style="display: inline-block; width: 47px; height: 20px; vertical-align: top;"></canvas></div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <?php echo lang('number_of_expenses'); ?>
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-success">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $query_n_o_e = $this->db->get('pharmacy_expense')->result();
                                                                            $i = 0;
                                                                            foreach ($query_n_o_e as $q_n_o_e) {
                                                                                if (date('m', time()) == date('m', $q_n_o_e->date)) {
                                                                                    $i = $i + 1;
                                                                                }
                                                                            }
                                                                            echo $i;
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div id="work-progress2"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>
                                                                        <?php echo lang('total_expense'); ?>
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-success">
                                                                            <?php echo $settings->currency; ?>
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $query_expense = $this->db->get('pharmacy_expense')->result();
                                                                            $sales_total = array();
                                                                            foreach ($query_expense as $q_expense) {
                                                                                if (date('m', time()) == date('m', $q_expense->date)) {
                                                                                    $expense_total[] = $q_expense->amount;
                                                                                }
                                                                            }
                                                                            if (!empty($expense_total)) {
                                                                                echo number_format(array_sum($expense_total), 2, '.', ',');
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div id="work-progress2"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>
                                                                        <?php echo lang('medicine_number'); ?> 
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-info"> 
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $query_medicine_number = $this->db->get('medicine')->result();
                                                                            $i = 0;
                                                                            foreach ($query_medicine_number as $q_medicine_number) {
                                                                                $i = $i + 1;
                                                                            }
                                                                            echo $i;
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div id="work-progress3"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>
                                                                        <?php echo lang('medicine_quantity'); ?> 
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-info"> 
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $query_medicine = $this->db->get('medicine')->result();
                                                                            $i = 0;
                                                                            foreach ($query_medicine as $q_medicine) {
                                                                                if ($q_medicine->quantity > 0) {
                                                                                    $i = $i + $q_medicine->quantity;
                                                                                }
                                                                            }
                                                                            echo number_format($i, 2, '.', ',');
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div id="work-progress3"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>
                                                                        <?php echo lang('medicine_o_s'); ?>
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-warning">
                                                                            <?php
                                                                            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                                            $query_medicine = $this->db->get('medicine')->result();
                                                                            $i = 0;
                                                                            foreach ($query_medicine as $q_medicine) {
                                                                                if ($q_medicine->quantity == 0) {
                                                                                    $i = $i + 1;
                                                                                }
                                                                            }
                                                                            echo $i;
                                                                            ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div id="work-progress4"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2><?php echo lang('latest_medicines'); ?></h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered text-nowrap key-buttons editable-sample1">
                                                                <thead>
                                                                    <tr>
                                                                        <th> <?php echo lang('name'); ?></th>
                                                                        <th> <?php echo lang('category'); ?></th>
                                                                        <th> <?php echo lang('price').' ('.$settings->currency.') '; ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $i = 0;
                                                                foreach ($latest_medicines as $latest_medicine) {
                                                                    $i = $i + 1;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $latest_medicine->name; ?></td>
                                                                        <td> <?php echo $latest_medicine->category; ?></td>
                                                                        <td class="text-right"><?php echo number_format($latest_medicine->s_price, 2, '.', ','); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    if ($i == 10)
                                                                        break;
                                                                }
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        <!--Moment js-->
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

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <script type="text/javascript" src="common/js/google-loader.js"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script>
        $(document).ready(function () {
            var table = $('.editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-3 text-center'B><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                title: '<?php echo lang('list_of_encounters');?>',
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('list_of_encounters');?>',
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('list_of_encounters');?>',
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('list_of_encounters');?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('list_of_encounters');?>',
                            }
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 100,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
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

    </body>
</html>    