<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="content mt-5">
                            <section id="main-content">
                                <section class="wrapper site-min-height">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title"><?php echo lang('midwife'); ?></div>
                                            <div class="card-options">
                                                <a href="midwife/addNewView">
                                                    <div class="btn-group pull-right">
                                                        <button id="" class="btn btn-primary btn-xs">
                                                            <i class="fa fa-plus"></i> <?php echo lang('add_midwife'); ?>
                                                        </button>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo lang('image'); ?></th>
                                                                <th><?php echo lang('name'); ?></th>
                                                                <th><?php echo lang('email'); ?></th>
                                                                <th><?php echo lang('address'); ?></th>
                                                                <th><?php echo lang('phone'); ?></th>
                                                                <th class="no-print"><?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <style>

                                                                .img_url{
                                                                    height:20px;
                                                                    width:20px;
                                                                    background-size: contain; 
                                                                    max-height:20px;
                                                                    border-radius: 100px;
                                                                }

                                                            </style>

                                                            <?php foreach ($midwifes as $midwife) { ?>
                                                                <tr class="">
                                                                    <td style="width:10%;"><img style="width:95%;" src="<?php echo file_exists($midwife->img_url)?$midwife->img_url:'public/assets/images/users/placeholder.jpg'; ?>"></td>
                                                                    <td> <?php echo $midwife->name; ?></td>
                                                                    <td><?php echo $midwife->email; ?></td>
                                                                    <td class="center"><?php echo $midwife->address; ?></td>
                                                                    <td><?php echo $midwife->phone; ?></td>
                                                                    <td class="no-print">
                                                                        <a href="midwife/editMidwife?id=<?php echo $midwife->id ?>" class="btn btn-info"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></a>
                                                                        <a class="btn btn-danger btn-xs delete_button" title="<?php echo lang('delete'); ?>" href="midwife/delete?id=<?php echo $midwife->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> <?php echo lang('delete'); ?></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </section>
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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {
                var name = $('#name').parsley();
                var email = $('#email').parsley();
                var password = $('#password').parsley();
                var phone = $('#phone').parsley();
                var address = $('#address').parsley();
                

                if (name.isValid() && email.isValid() && password.isValid() && phone.isValid() && address.isValid()) {
                    return true;
                } else {
                    name.validate();
                    email.validate();
                    password.validate();
                    phone.validate();
                    address.validate();
                }
            });

            $("#submitEdit").click(function () {
                var name = $('#nameEdit').parsley();
                var email = $('#emailEdit').parsley();
                var phone = $('#phoneEdit').parsley();
                var address = $('#addressEdit').parsley();
                

                if (name.isValid() && email.isValid() && phone.isValid() && address.isValid()) {
                    return true;
                } else {
                    name.validate();
                    email.validate();
                    phone.validate();
                    address.validate();
                }
            });
        })
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".editbutton", function () {
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editNurseForm').trigger("reset");
            $.ajax({
                url: 'nurse/editNurseByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    // Populate the form fields with the data returned from server
                    $('#editNurseForm').find('[name="id"]').val(response.nurse.id).end()
                    $('#editNurseForm').find('[name="name"]').val(response.nurse.name).end()
                    $('#editNurseForm').find('[name="password"]').val(response.nurse.password).end()
                    $('#editNurseForm').find('[name="email"]').val(response.nurse.email).end()
                    $('#editNurseForm').find('[name="address"]').val(response.nurse.address).end()
                    $('#editNurseForm').find('[name="phone"]').val(response.nurse.phone).end()

                    var imagenUrl = response.nurse.img_url;
                    var drEvent = $('#img').dropify(
                    {
                      defaultFile: imagenUrl
                    });
                    drEvent = drEvent.data('dropify');
                    drEvent.resetPreview();
                    drEvent.clearElement();
                    drEvent.settings.defaultFile = imagenUrl;
                    drEvent.destroy();
                    drEvent.init();

                    $('#myModal2').modal('show');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
           var table =  $('#editable-sample').DataTable({
                responsive: true,

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
                                title: '<?php echo lang('midwife'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('midwife'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('midwife'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('midwife'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                },
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('midwife'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                }
                            }
                        ]
                    }
                ],

                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: -1,
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

            var error = "<?php if(isset($_SESSION['error'])) unset($_SESSION['error']); ?>";
            var success = "<?php if(isset($_SESSION['success'])) unset($_SESSION['success']); ?>";
            var warning = "<?php if(isset($_SESSION['notice'])) unset($_SESSION['warning']); ?>";
            var notice = "<?php if(isset($_SESSION['warning'])) unset($_SESSION['notice']); ?>";

        });
    </script>

    </body>
</html>  