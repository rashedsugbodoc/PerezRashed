<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="row mt-5">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('form_report'); ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo lang('report_id'); ?></th>
                                                        <th><?php echo lang('patient'); ?></th>
                                                        <th><?php echo lang('date'); ?></th>
                                                        <th class=""><?php echo lang('options'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($forms as $form) { ?>
                                                        <tr>
                                                            <td><?php echo $form->form_number; ?></td>
                                                            <td><?php echo $this->patient_model->getPatientById($form->patient)->name; ?></td>
                                                            <td><?php echo date('Y-m-d H:i', strtotime($form->form_date.' UTC')); ?></td>
                                                            <td><a class="btn btn-xs btn-info" href="form/formView?id=<?php echo $form->form_number ?>"><i class="fa fa-file-text-o"></i> <?php echo lang('details'); ?></a></td>
                                                        </tr>
                                                    <?php } ?>
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

        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script>
        $(document).ready(function () {
            table = $('#editable-sample').DataTable({
                responsive: true,

                // "processing": true,
                // "serverSide": true,
                // "searchable": true,
                // "ajax": {
                //     url: "form/getMyForm",
                //     type: 'POST',
                // },
                scroller: {
                    loadingIndicator: true
                },

                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                    extend: 'collection',
                    text: 'Export',        
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                },
                                title: '<?php echo lang('forms'); ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                },
                                title: '<?php echo lang('forms'); ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                },
                                title: '<?php echo lang('forms'); ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                },
                                title: '<?php echo lang('forms'); ?>'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                },
                                title: '<?php echo lang('forms'); ?>'
                            },
                        ],
                    }
                ],

                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 50,
                "order": [[0, "desc"]],

                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search..."
                }
            });
            // table.buttons().container().appendTo('.custom_buttons');
        });
    </script>





    <script>
        $(document).ready(function () {
            $('.pos_client').hide();
            $(document.body).on('change', '#pos_select', function () {

                var v = $("select.pos_select option:selected").val()
                if (v == 'add_new') {
                    $('.pos_client').show();
                } else {
                    $('.pos_client').hide();
                }
            });

        });


    </script>

    <script>
        $(document).ready(function () {
            $('.pos_doctor').hide();
            $(document.body).on('change', '#add_doctor', function () {

                var v = $("select.add_doctor option:selected").val()
                if (v == 'add_new') {
                    $('.pos_doctor').show();
                } else {
                    $('.pos_doctor').hide();
                }
            });

        });


    </script>



    <script type="text/javascript">
        $(document).ready(function () {
            $(document.body).on('change', '#template', function () {
                var iid = $("select.template option:selected").val();
                $.ajax({
                    url: 'lab/getTemplateByIdByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var data = CKEDITOR.instances.editor.getData();
                        if (response.template.template != null) {
                            var data1 = data + response.template.template;
                        } else {
                            var data1 = data;
                        }
                        CKEDITOR.instances['editor'].setData(data1)
                    }
                });
            });
        });
    </script>

    </body>
</html> 