<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <?php
                        $currently_processing_year = date('Y', $first_minute);
                        $next_year = $currently_processing_year + 1;
                        $previous_year = $currently_processing_year - 1;
                        ?>
                        <div class="row mt-5">
                            <div class="col-md-12 col-sm-12 col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo date('Y', $first_minute) . ' ' .lang('hospital').' '. lang('expense_report'); ?>
                                        </div>
                                        <div class="card-options">
                                            <a href="finance/monthlyExpense?year=<?php echo $previous_year; ?>">
                                                <i class="fa fa-arrow-left fa-2x ml-7"></i>
                                            </a>
                                            <a href="finance/monthlyExpense?year=<?php echo $next_year; ?>">
                                                <i class="fa fa-arrow-right fa-2x ml-7"></i>
                                            </a>
                                            <button type="button" class="btn btn-info ml-5" onclick="javascript:window.print();"><i class="fe fe-printer"></i><span class="button-text"> Print</span></button>
                                        </div>
                                    </div>
                                    <div id="chart_div"></div>
                                    <div class="card-body">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo lang('date'); ?> </th>
                                                    <th> <?php echo lang('amount'); ?> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($month = 1; $month <= 12; $month++) {
                                                    $time = mktime(12, 0, 0, $month, 1, $year);
                                                    if (!empty($all_expenses[date('m-Y', $time)])) {
                                                        if (date('Y', $time) == $year) {
                                                            $month_name = date('F', $time);
                                                            $amount = $all_expenses[date('m-Y', $time)];
                                                        }
                                                    } else {
                                                        if (date('Y', $time) == $year) {
                                                            $month_name = date('F', $time);
                                                            $amount = 0;
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $month_name; ?></td>
                                                        <td><?php echo $this->currency; ?><?php echo number_format($amount, 2, '.', ','); ?></td>
                                                        <?php $total_amount[] = $amount; ?>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                                    
                                                     <?php
                                                if (!empty($total_amount)) {
                                                    $total_amount = array_sum($total_amount);
                                                } else {
                                                    $total_amount = 0;
                                                }
                                                ?>

                                                <tr style="color: #000 !important; font-weight: bold;">
                                                    <td><?php echo lang('total'); ?></td> 
                                                    <td><?php echo $this->currency; ?><?php echo number_format($total_amount, 2, '.', ','); ?></td>
                                                </tr>            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="myModal33" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><?php echo lang(stock_alert); ?></h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    <!-- INTERNAL JS INDEX END -->

    <script>
        $(window).on('load', function () {
            //      $('#myModal33').modal('show');
        });
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var income = '<?php echo lang('expense'); ?>';
            var data = google.visualization.arrayToDataTable([
                ['Month', income],
                ['Jan',<?php echo $jan_total; ?>],
                ['Feb',<?php echo $feb_total; ?>],
                ['Mar', <?php echo $mar_total; ?>],
                ['Apr', <?php echo $apr_total; ?>],
                ['May', <?php echo $may_total; ?>],
                ['June', <?php echo $jun_total; ?>],
                ['July', <?php echo $jul_total; ?>],
                ['Aug', <?php echo $aug_total; ?>],
                ['Sep', <?php echo $sep_total; ?>],
                ['Oct', <?php echo $oct_total; ?>],
                ['Nov', <?php echo $nov_total; ?>],
                ['Dec', <?php echo $dec_total; ?>],
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