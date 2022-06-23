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
                                            <?php echo lang('add_account') ?>
                                        </div>
                                    </div>
                                    <form role="form" action="company/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="name" id="name" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('name');
                                                    }
                                                    if (!empty($company->name)) {
                                                        echo $company->name;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('display_name'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="display_name" id="display_name" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('display_name');
                                                    }
                                                    if (!empty($company->display_name)) {
                                                        echo $company->display_name;
                                                    }
                                                    ?>" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('email'); ?> <span class="text-red">*</span></label>
                                                    <input type="email" class="form-control" name="email" id="email" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('email');
                                                    }
                                                    if (!empty($company->email)) {
                                                        echo $company->email;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('address'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="address" id="address" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('address');
                                                    }
                                                    if (!empty($company->address)) {
                                                        echo $company->address;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('phone'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="phone" id="phone" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('phone');
                                                    }
                                                    if (!empty($company->phone)) {
                                                        echo $company->phone;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('registration'); ?> <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="registration_number" id="register" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('registration_number');
                                                    }
                                                    if (!empty($company->registration_number)) {
                                                        echo $company->registration_number;
                                                    }
                                                    ?>' placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('type'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control m-bot15 js-example-basic-single select2" name="type_id" id="type" value='' required>
                                                        <option value=""><?php echo lang('select');?></option>
                                                        <?php foreach ($types as $type) { ?>
                                                            <option value="<?php echo $type->id; ?>" <?php
                                                            if (!empty($setval)) {
                                                                if ($type->id == set_value('type_id')) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            if (!empty($company->type_id)) {
                                                                if ($type->id == $company->type_id) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>> <?php echo $type->name; ?> </option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('classification'); ?> <span class="text-red">*</span></label>
                                                    <select class="form-control m-bot15 js-example-basic-single select2" name="classification_id" id="classification" value='certified' required>
                                                        <option value=""><?php echo lang('select');?></option>
                                                        <?php foreach ($classifications as $classification) { ?>
                                                            <option value="<?php echo $classification->id; ?>" <?php
                                                            if (!empty($setval)) {
                                                                if ($classification->id == set_value('classification_id')) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            if (!empty($company->classification_id)) {
                                                                if ($classification->id == $company->classification_id) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > <?php echo $classification->name; ?> </option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('profile'); ?></label>
                                                    <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('profile');
                                                    }
                                                    if (!empty($company->profile)) {
                                                        echo $company->profile;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value='<?php
                                            if (!empty($company->id)) {
                                                echo $company->id;
                                            }
                                            ?>'>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('image'); ?></label>
                                                    <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                        <input type="file" name="img_url" id="image" class="dropify"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {
                var name = $('#name').parsley();
                var display_name = $('#display_name').parsley();
                var email = $('#email').parsley();
                var address = $('#address').parsley();
                var phone = $('#phone').parsley();
                var register = $('#register').parsley();
                var type = $('#type').parsley();
                var classification = $('#classification').parsley();

                if (name.isValid() && display_name.isValid() && email.isValid() && address.isValid() && phone.isValid() && register.isValid() && type.isValid() && classification.isValid()) {
                    return true;
                } else {
                    name.validate();
                    display_name.validate();
                    email.validate();
                    address.validate();
                    phone.validate();
                    register.validate();
                    type.validate();
                    classification.validate();
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2").select2({
                allowClear: true,
            });
        })
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