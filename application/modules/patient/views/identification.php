<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <p class="font-weight-bold"><?php echo lang('edit').' '.lang('identification'); ?></p>
                                            <h6>Verification Status: <button class="btn btn-pill btn-success">Unverified</button></h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form id="identificationForm" method="POST" action="patient/addIdentification">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('family').' '.lang('profile').' '.lang('id') ?></label>
                                                        <input type="text" name="family_profile_id" class="form-control" value="<?php
                                                            if (!empty($patient->family_profile_id)) {
                                                                echo $patient->family_profile_id;
                                                            } else {
                                                                echo $fpi;
                                                            }
                                                        ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Philhealth ID</label>
                                                        <input type="text" name="philhealth" class="form-control" value="<?php
                                                            if (!empty($patient->national_healthcare_id)) {
                                                                echo $patient->national_healthcare_id;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">NHTS ID</label>
                                                        <input type="text" name="nhts" class="form-control" value="<?php
                                                            if (!empty($patient->nhts_id)) {
                                                                echo $patient->nhts_id;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">National ID</label>
                                                        <input type="text" name="national_id" class="form-control" value="<?php
                                                            if (!empty($patient->national_id)) {
                                                                echo $patient->national_id;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Drivers License</label>
                                                        <input type="text" name="driver_license_id" class="form-control" value="<?php
                                                            if (!empty($patient->drivers_license_id)) {
                                                                echo $patient->drivers_license_id;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Passport</label>
                                                        <input type="text" name="passport_id" class="form-control" value="<?php
                                                            if (!empty($patient->passport_id)) {
                                                                echo $patient->passport_id;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Social Security</label>
                                                        <input type="text" name="social_security_id" class="form-control" value="<?php
                                                            if (!empty($patient->social_security_id)) {
                                                                echo $patient->social_security_id;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">UMID</label>
                                                        <input type="text" name="umid" class="form-control" value="<?php
                                                            if (!empty($patient->umid_id)) {
                                                                echo $patient->umid_id;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('other').' '.lang('id').' '.lang('name') ?></label>
                                                        <input type="text" name="other_id_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('other').' '.lang('id').' '.lang('number') ?></label>
                                                        <input type="text" name="other_id_number" class="form-control">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('other').' '.lang('id') ?></label>
                                                        <select class="select2-show-search" id="select_ids" class="form-control" data-placeholder="Choose one">
                                                            <option label="Choose one"></option>
                                                            <option value="drivers_license_id" data-name="Drivers License">Drivers License</option>
                                                            <option value="passport_id" data-name="Passport">Passport</option>
                                                            <option value="social_security_id" data-name="Social Security">Social Security</option>
                                                            <option value="umid_id" data-name="UMID">UMID</option>
                                                        </select>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">ID Details</label>
                                                        <input type="text" name="id_detail" class="form-control">
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="row" id="other_id">
                                                
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12 col-sm-12">
                                                    <h5 class="font-weight-bold">Upload Proof of Identification</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('uploaded').' '.lang('id').' '.lang('type'); ?></label>
                                                        <?php if (!empty($patient->id1_proof_type)) { ?>
                                                            <select class="form-control" name="id_type" id="id_type" class="form-control" data-placeholder="Choose one">
                                                                <option label="Choose One"></option>
                                                                <?php foreach ($id_types as $id_type) { ?>
                                                                    <option value="<?php echo $id_type->id ?>" <?php if ($id_type->id === $patient->id1_proof_type) { echo "selected"; } ?>>
                                                                        <?php echo $id_type->display_name_ph ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } else { ?>
                                                            <select class="form-control" name="id_type" id="select_id_type" class="form-control" data-placeholder="Choose one">
                                                                <!-- <option label="Choose one"></option>
                                                                <option value="drivers_license_id" data-name="Drivers License">Drivers License</option>
                                                                <option value="passport_id" data-name="Passport">Passport</option>
                                                                <option value="social_security_id" data-name="Social Security">Social Security</option>
                                                                <option value="umid_id" data-name="UMID">UMID</option>
                                                                <option value="national_id" data-name="National ID">National Id</option> -->
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="id_type_image" class="duplicateable-content model">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <p>(Upload less than 2MB Image)</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('id').' Front' ?></label>
                                                            <input type="file" id="image_front" name="image_front" class="dropify"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('id').' Back' ?></label>
                                                            <input type="file" id="image_back" name="image_back" class="dropify"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="id" value="<?php
                                                echo "$patient->id";
                                            ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-primary"><?php echo lang('submit'); ?></button>
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

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            var id = $("#id").val();
            $.ajax({
                url: 'patient/editIdentificationByJason?id=' + id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    console.log(response.patient.id1_proof_type);
                    // $('#identificationForm').find('[name="id_type"]').val(response.patient.id1_proof_type).change()
                    $('#select_id_type').val(response.patient.id1_proof_type).change();
                }
            });
        })
    </script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#select_id_type").select2({
                placeholder: '<?php echo lang('choose_one'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getIdTypeInfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        console.log(response);
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

            $("#id_type").select2({
                placeholder: '<?php echo lang('choose_one'); ?>',
                allowClear: true,
            });
        })
    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $("#select_ids").change(function () {
                var id_name = $("#select_ids").find('option:selected').data('name');
                var other_id = $("#select_ids").val();
                $("#other_id").append("<div class='col-md-6'>\n\
                    <div class='form-group'>\n\
                        <label class='form-label'>"+id_name+"</label>\n\
                        <input class='form-control' name='"+other_id+"'>\n\
                    </div>\n\
                </div>");
            })
        });
    </script> -->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $("#select_id_type").change(function () {
                var id_type_name = $("#select_id_type").find('option:selected').data('name');
                var id_type = $("#select_id_type").val();

                $("#image_front").attr("name", id_type+"_front");
                $("#image_back").attr("name", id_type+"_back");

                $("#id_type_image").append("<div class='row'>\n\
                    <div class='col-md-12 col-sm-12'>\n\
                        <p>(Upload less than 2MB Image)</p>\n\
                    </div>\n\
                </div>\n\
                <div class='row'>\n\
                    <div class='col-md-6 col-sm-12'>\n\
                        <div class='form-group'>\n\
                            <label class='form-label'><?php echo lang('id'); ?> Front</label>\n\
                            <input type='file' name='id_front[]' id='image' class='dropify'/>\n\
                        </div>\n\
                    </div>\n\
                    <div class='col-md-6 col-sm-12'>\n\
                        <div class='form-group'>\n\
                            <label class='form-label'><?php echo lang('id'); ?> Back</label>\n\
                            <input type='file' name='id_back[]' id='image' class='dropify'/>\n\
                        </div>\n\
                    </div>\n\
                </div>");
            })
        });
    </script> -->

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