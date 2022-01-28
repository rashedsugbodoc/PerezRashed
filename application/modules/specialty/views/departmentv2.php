<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                            <style>
                                @media screen and (max-width: 500px) {
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
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title">List of Departments</div>
                                <div class="card-options">
                                    <a class="btn btn-primary" data-target="#AddAppointment" data-toggle="modal" href=""><i class="fe fe-plus"></i><span class="button-text">Add New</span></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0"><?php echo lang('name') ?></th>
                                                    <th class="border-bottom-0"> <?php echo lang('description') ?></th>
                                                    <th class="border-bottom-0"> <?php echo lang('options') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($departments as $department) { ?>
                                                    <tr class="">
                                                        <td><?php echo $department->name; ?></td>
                                                        <td><?php echo $department->description; ?></td>
                                                        <td class="no-print">
                                                            <div class="btn-group mb-0">
                                                                <a class="btn btn-info pull-right" data-target="#<?php echo $department->id; ?>" data-toggle="modal" href=""><i class="fe fe-edit"></i></a>
                                                            </div>
                                                            <div class="btn-group mb-0">
                                                                <a class="btn btn-danger" data-target="#Delete" data-toggle="modal" href=""><i class="fe fe-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="AddAppointment">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Add Department</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="output" method="POST" onsubmit="javascript: return myFunction();">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Department Name</label>
                                                        <input type="text" name="department" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                        <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                            <div id="quillEditor" class="bg-white quillEditor">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <textarea id="description" name="description" hidden="" readonly="" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="AddDepartment" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="EditAppointment">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Edit Department</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="output" method="POST" onsubmit="javascript: return myFunction();">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Department Name</label>
                                                        <input type="text" name="department" value="Urology" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                        <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                            <div id="quillEditor2" class="bg-white quillEditor">
                                                                <p>Urologist</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <textarea id="description2" name="description" hidden="" readonly="" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="EditDepartment" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="Delete">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Delete</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this item?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button class="btn btn-danger" type="button">Yes</button> <button class="btn btn-light" data-dismiss="modal" type="button">No</button>
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
                            20<?php echo date('y'); ?> &copy; <?php echo $this->db->get('settings')->row()->system_vendor; ?> by Rygel Technology Solutions.
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
    <!-- INTERNAL JS INDEX END -->

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

            function myFunction(){
                var quill = document.getElementById('quillEditor').children[0].innerHTML;
                // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
                document.getElementById('description').value = quill;

                var quill = document.getElementById('quillEditor2').children[0].innerHTML;
                // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
                document.getElementById('description2').value = quill;

                var quill = document.getElementById('quillEditor3').children[0].innerHTML;
                // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
                document.getElementById('advice').value = quill;
            }
        </script>
    </body>
</html>



