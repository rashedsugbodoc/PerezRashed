<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Procedures</h4>
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('list') ?> <?php echo lang('of') ?> <?php echo lang('procedures')  ?></div>
                                <div class="card-options">
                                    <a href="procedure/addNewView">
                                        <div class="btn-group pull-right">
                                            <button id="" class="btn btn-primary btn-xs">
                                                <i class="fa fa-plus"></i><?php echo lang('add_new'); ?> 
                                            </button>
                                        </div>
                                    </a>  
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                        <thead>
                                            <tr>
                                                <th > <?php echo lang('date');  ?></th>
                                                <th > <?php echo lang('patient'); ?></th>
                                                <th > <?php echo lang('procedure'); ?></th>
                                                <th > <?php echo lang('performed_by'); ?></th>
                                                <th > <?php echo lang('note');  ?></th>
                                                <th > <?php echo lang('status'); ?></th>
                                                <th > <?php echo lang('options'); ?></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <!-- Info Modal -->
                       <div id="infoModal" class="modal fade">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="model-content">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="modal-title"><?php echo lang('procedure'); ?> <?php echo lang('info'); ?></h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pd-20">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-4">
                                                <div class="col-md-12">
                                                    <label><?php echo lang('procedure')?> <?php echo lang('date') ?>:<span class="procedureIdClass"></span>sdfsdfsdfsd</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-4">
                                            <div class="col-md-12">
                                                <label><?php echo lang('procedure')?> <?php echo lang('date') ?>:<span class="procedureIdClass"></span>sdfsdfsdfsd</label>
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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

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

    <script type="text/javascript">
        $(".table").on("click", ".inffo", function() {
            var iid = $(this).attr('data-id');

            $()
            
            $.ajax({
                url: '',
                method: '',
                data: '',
                dataType: '',
                success: function (response) {



                    $('#infoModal').modal('show');
         
                }
            })
        })

    </script>






    <script>
        $(document).ready(function() {
            var table = $("#editable-sample").DataTable({
                responsive: true,

                "processing": true,
                "searchable": true,
                "ajax": {
                    url: "procedure/getProcedures",
                    type: "POST",

                },
                scroller: {
                    loadingIndicator: false
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
                                title: '<?php echo lang('procedure') . ' ' . lang('list');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('procedure') . ' ' . lang('list');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('procedure') . ' ' . lang('list');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('procedure') . ' ' . lang('list');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('procedure') . ' ' . lang('list');?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                }
                            }
                        ]
                    }
                ],
                'columnDefs': [
                    {
                        'targets': 0,
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            $(td).attr('style', 'width:10%'); 
                        }
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
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                }

            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    <script>
        $(document).ready(function () {

            var error = "<?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>";
            var success = "<?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>";
            var notice = "<?php if(isset($_SESSION['notice'])) echo $_SESSION['notice']; ?>";
            var warning = "<?php if(isset($_SESSION['warning'])) echo $_SESSION['warning']; ?>";

            if (success) {
                return $.growl.success({
                    message: success
                });
            }
            if (error) {
                return $.growl.error({
                    message: error
                });
            }
            if (warning) {
                return $.growl.warning({
                    message: warning
                });
            }
            if (notice) {
                return $.growl.notice({
                    message: notice
                });
            }

            var error = "<?php unset($_SESSION['error']); ?>";
            var success = "<?php unset($_SESSION['success']); ?>";
            var warning = "<?php unset($_SESSION['warning']); ?>";
            var notice = "<?php unset($_SESSION['notice']); ?>";

        });
    </script>

    </body>
</html> 