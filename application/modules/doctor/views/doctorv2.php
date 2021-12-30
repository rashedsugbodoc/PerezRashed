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

                                    <div class="card mt-5">
                                        <div class="card-header">
                                            <div class="card-title">Doctors</div>
                                            <div class="card-options">
                                                <a data-toggle="modal" href="#myModal" class="btn btn-primary"><i class="fe fe-plus"></i><span class="button-text"> <?php echo lang('add_new'); ?></span></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo lang('doctor'); ?> <?php echo lang('id'); ?></th>
                                                                <th><?php echo lang('name'); ?></th>
                                                                <th><?php echo lang('email'); ?></th>
                                                                <th><?php echo lang('phone'); ?></th>
                                                                <th><?php echo lang('department'); ?></th>
                                                                <th><?php echo lang('profile'); ?></th>
                                                                <th class="no-print"><?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            </section>

                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('add_new_doctor'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="doctor/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Name" maxlength="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?>: <span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('password'); ?>: <span class="text-red">*</span></label>
                                                            <input type="password" class="form-control" name="password" placeholder="Password" maxlength="255">
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('phone'); ?>: <span class="text-red">*</span></label>
                                                                <form>
                                                                    <input id="phone" name="phone" value="+63" class="form-control" type="tel" maxlength="20">
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('address'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" placeholder="Address" name="address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('department'); ?>: <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="department" data-placeholder="Choose one">
                                                                    <option label="Choose one">
                                                                    </option>
                                                                    <?php foreach ($departments as $department) { ?>
                                                                        <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('profile'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="profile" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('license'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="license" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label">Image Upload <span class="text-red">*</span></label>
                                                            <input type="file" name="img_url" id="image" class="dropify"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <button class="btn btn-primary pull-right" name="submit" type="submit">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> <?php echo lang('edit_doctor'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editDoctorForm" class="clearfix" action="doctor/addNew" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="name" value="Evelyn Ang" placeholder="Name" maxlength="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?>: <span class="text-red">*</span></label>
                                                                <input type="email" value="doctor14.sugbodoc@mailinator.com" class="form-control" name="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('password'); ?>: <span class="text-red">*</span></label>
                                                            <input type="password" class="form-control" name="password" placeholder="Password" maxlength="255">
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('phone'); ?>: <span class="text-red">*</span></label>
                                                                <form>
                                                                    <input id="phone2" class="form-control" name="phone" value="+639105233217" type="tel" maxlength="20">
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('address'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" value="V-Road Cebu City" placeholder="Address" name="address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('department'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="department" data-placeholder="Choose one">
                                                                    <option label="Choose one">
                                                                    </option>
                                                                    <?php foreach ($departments as $department) { ?>
                                                                    <option value="<?php echo $department->name; ?>" <?php
                                                                    if (!empty($doctor->department)) {
                                                                        if ($department->name == $doctor->department) {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?> > <?php echo $department->name; ?> </option>
                                                                        <?php } ?> 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('profile'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="profile" value="Otorlaryngologist" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('license'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="license" value="LN123456789" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label">Image Upload <span class="text-red">*</span></label>
                                                            <input type="file" name="img_url" id="img" class="dropify"/>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value=''>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <button class="btn btn-primary pull-right" name="AddPatient" type="submit">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> <?php echo lang('doctor'); ?> <?php echo lang('info'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="output" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <img alt="User Avatar" id="img1" style="max-width: 200px; max-height: 200px;" width="auto" height="auto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('department'); ?>: </label>
                                                                <label class="form-label departmentClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('license'); ?>: </label>
                                                                <label class="form-label licenseClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('name'); ?>: </label>
                                                                <label class="form-label nameClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('email'); ?>: </label>
                                                                <label class="form-label emailClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('address'); ?>: </label>
                                                                <label class="form-label addressClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('phone'); ?>: </label>
                                                                <label class="form-label phoneClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('profile'); ?>: </label>
                                                                <label class="form-label profileClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        
            $(".table").on("click", ".editbutton", function () {
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $("#img").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                $('#editDoctorForm').trigger("reset");
                $.ajax({
                    url: 'doctor/editDoctorByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                        $('#editDoctorForm').find('[name="name"]').val(response.doctor.name).end()
                        $('#editDoctorForm').find('[name="password"]').val(response.doctor.password).end()
                        $('#editDoctorForm').find('[name="email"]').val(response.doctor.email).end()
                        $('#editDoctorForm').find('[name="address"]').val(response.doctor.address).end()
                        $('#editDoctorForm').find('[name="phone"]').val(response.doctor.phone).end()
                        $('#editDoctorForm').find('[name="department"]').val(response.doctor.department).end()
                        $('#editDoctorForm').find('[name="profile"]').val(response.doctor.profile).end()
                        $('#editDoctorForm').find('[name="license"]').val(response.doctor.license).end()

                        $('#editDoctorForm').find('[name="department"]').val(response.doctor.department).change()

                        var imagenUrl = response.doctor.img_url;
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

                        $('.js-example-basic-single.department').val(response.doctor.department).trigger('change');

                        $('#myModal2').modal('show');
                    }
                });
            });
        
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".inffo", function () {
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');

                $("#img1").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                $('.nameClass').html("").end()
                $('.emailClass').html("").end()
                $('.addressClass').html("").end()
                $('.phoneClass').html("").end()
                $('.departmentClass').html("").end()
                $('.profileClass').html("").end()
                $('.licenseClass').html("").end()
                $.ajax({
                    url: 'doctor/editDoctorByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                        $('.nameClass').append(response.doctor.name).end()
                        $('.emailClass').append(response.doctor.email).end()
                        $('.addressClass').append(response.doctor.address).end()
                        $('.phoneClass').append(response.doctor.phone).end()
                        $('.departmentClass').append(response.doctor.department).end()
                        $('.profileClass').append(response.doctor.profile).end()
                        $('.licenseClass').append(response.doctor.license).end()

                        if (typeof response.doctor.img_url !== 'undefined' && response.doctor.img_url != '') {
                            $("#img1").attr("src", response.doctor.img_url);
                        }

                        $('#infoModal').modal('show');
                    }
                });
            });
        });
    </script>





    <script>
        $(document).ready(function () {
            var table = $('#editable-sample').DataTable({
                responsive: true,

                "processing": true,
                "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "doctor/getDoctor",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },

                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                        }
                    },
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
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                }
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    <script>
        $(document).ready(function () {
            var error = "<?php echo $_SESSION['error'] ?>";
            var success = "<?php echo $_SESSION['success'] ?>";
            var notice = "<?php echo $_SESSION['notice'] ?>";
            var warning = "<?php echo $_SESSION['warning'] ?>";

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