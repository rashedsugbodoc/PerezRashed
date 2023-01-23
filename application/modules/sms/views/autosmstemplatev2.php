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
                                            <?php echo lang('autosmstemplate'); ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="editable-sample1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?php echo lang('category'); ?></th>
                                                    <th><?php echo lang('message'); ?></th> 
                                                    <th><?php echo lang('status'); ?></th>
                                                    <th><?php echo lang('options'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Event Modal-->
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('edit').' '.lang('auto').' '.lang('template'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="smstemp" name="myform" action="sms/addNewAutoSMSTemplate" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('category'); ?></label>
                                                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                                                        <div id="divbuttontag"></div>
                                                        <textarea class="form-control ckeditor" name="message" id="editor1" value="" cols="70" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('status'); ?> </label>
                                                        <select class="form-control" id="status" name="status"> 
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="id" value=''>
                                                    <input type="hidden" name="type" value='sms'>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Event Modal-->

                        <!-- Customize Event Modal -->
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('customize').' '.lang('auto').' '.lang('template'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="smscust" name="myform" action="sms/addNewAutoSMSTemplateWithHospitalId" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('category'); ?></label>
                                                        <span id="category"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                                                        <div id="divbuttontag1"></div>
                                                        <textarea class="form-control ckeditor" name="message" id="editor2" value="" cols="70" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('status'); ?> </label>
                                                        <span id="cusstatus"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="id" value=''>
                                                    <input type="hidden" name="type" value='sms'>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Customize Event Modal -->

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

        <script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#status").select2({});
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".editbutton1", function () {
                var iid = $(this).attr('data-id');
                $('#divbuttontag').html("");
                console.log(iid);
                $.ajax({
                    url: 'sms/editAutoSMSTemplate?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function(response) {
                        // Populate the form fields with the data returned from server
                        $('#smstemp').find('[name="id"]').val(response.autotemplatename.id).end();
                        $('#smstemp').find('[name="category"]').val(response.autotemplatename.name).end();
                          CKEDITOR.instances['editor1'].setData(response.autotemplatename.message);
                        // $('#smstemp').find('[name="message"]').val(response.autotemplatename.message).end();
                        var option = '';
                        var count = 0;
                        $.each(response.autotag, function (index, value) {
                            console.log(value);
                            option += '<input type="button" class="btn btn-light" name="myBtn" value="' + value.name + '" onclick="addtext(this);">&nbsp';
                            count += 1;
                            if (count % 7 === 0) {
                                option += '<br><br>';
                            }
                        });
                        $('#divbuttontag').html(option);
                           $('#status').html(response.status_options);
                        $('#myModal1').modal('show');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".custombutton1", function () {
                var iid = $(this).attr('data-id');
                $('#divbuttontag1').html("");
                console.log(iid);
                $.ajax({
                    url: 'sms/editAutoSMSTemplate?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function(response) {
                        // Populate the form fields with the data returned from server
                        $('#smscust').find('[name="id"]').val(response.autotemplatename.id).end();
                        $('#category').text(response.autotemplatename.name);
                          CKEDITOR.instances['editor2'].setData(response.autotemplatename.message);
                        // $('#smscust').find('[name="message"]').val(response.autotemplatename.message).end();
                        var option = '';
                        var count = 0;
                        $.each(response.autotag, function (index, value) {
                            console.log(value);
                            option += '<input type="button" class="btn btn-light" name="myBtn" value="' + value.name + '" onclick="addtext2(this);">&nbsp';
                            count += 1;
                            if (count % 7 === 0) {
                                option += '<br><br>';
                            }
                        });
                        $('#divbuttontag1').html(option);
                        $('#cusstatus').html(response.autotemplatename.status);
                        $('#myModal2').modal('show');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "processing": true,
                "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "sms/getAutoSMSTemplateList",
                    type: 'POST',
                    'data': {'type': 'sms'}
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'><'col-sm-5 text-center'B><'col-sm-4'>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'>>",
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                title: '<?php echo lang('autosmstemplate'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('autosmstemplate'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('autosmstemplate'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('autosmstemplate'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('autosmstemplate'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            }
                        ]
                    }
                ],
                aLengthMenu: [
                    [1, 2, 50, 100, -1],
                    [1, 2, 50, 100, "All"]
                ],
                iDisplayLength: 100,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search..."
                },
            });
            table.buttons().container()
                    .appendTo('.custom_buttons');
        });
    </script>

    <script>
        function addtext(ele) {
            var editor = CKEDITOR.instances.editor1;
            editor.insertText(ele.value);
        }
        function addtext2(ele) {
            var editor = CKEDITOR.instances.editor2;
            editor.insertText(ele.value);
        }
    </script>

    </body>
</html>