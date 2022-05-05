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
                                            <?php
                                            if (!empty($report->id)) {
                                                echo '<i class="fa fa-edit"></i> ' . lang('edit_report');
                                            } else {
                                                echo '<i class="fa fa-plus"></i> ' . lang('add_new_report');
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" action="report/addReport" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('select_type'); ?></label>
                                                        <select class="form-control select2-show-search" name="type">
                                                            <option value="birth" <?php
                                                            if (!empty($setval)) {
                                                                if (set_value('type') == 'birth') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'birth') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('birth'); ?></option>
                                                            <option value="operation" <?php
                                                            if (!empty($setval)) {
                                                                if (set_value('type') == 'operation') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'operation') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('operation'); ?></option>
                                                            <option value="expire" <?php
                                                            if (!empty($setval)) {
                                                                if (set_value('type') == 'expire') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            if (!empty($report->report_type)) {
                                                                if ($report->report_type == 'expire') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('expire'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('description'); ?></label>
                                                        <textarea class="ckeditor form-control" id="editor" name="description" value="" rows="10">
                                                            <?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('description');
                                                                }
                                                                if (!empty($report->description)) {
                                                                    echo $report->description;
                                                                }
                                                            ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?></label>
                                                        <select class="form-control select2-show-search" name="patient" data-placeholder="<?php echo lang('select_patient') ?>">
                                                            <option></option>
                                                            <?php foreach ($patients as $patient) { ?>
                                                                <option value="<?php echo $patient->id; ?>" <?php
                                                                if (!empty($report->patient_id)) {
                                                                    if ($report->patient_id == $patient->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $patient->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('doctor'); ?></label>
                                                        <select class="form-control select2-show-search" name="doctor">
                                                            <?php foreach ($doctors as $doctor) { ?>
                                                                <option value="<?php echo $doctor->id; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if (set_value('doctor') == $doctor->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($report->doctor_id)) {
                                                                    if ($report->doctor_id == $doctor->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $doctor->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?></label>
                                                        <?php if (!empty($report->report_date)) { ?>
                                                            <input class="form-control editflatpickr" id="caseDate" readonly name="date" placeholder="MM/DD/YYYY" type="text" required value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('date');
                                                                }
                                                                if (!empty($report->report_date)) {
                                                                    echo $date;
                                                                }
                                                                ?>">
                                                        <?php } else { ?>
                                                            <input class="form-control flatpickr" id="caseDate" readonly name="date" placeholder="MM/DD/YYYY" type="text" required value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('date');
                                                                }
                                                                ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="id" id="report" value='<?php
                                                    if (!empty($report->id)) {
                                                        echo $report->id;
                                                    }
                                                    ?>'>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            var timenow = "<?php echo date('Y-m-d H:i'); ?>";
            var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
            flatpickr(".flatpickr", {
                disable: [maxdate],
                maxDate: maxdate,
                altInput: true,
                altFormat: "F j, Y h:i K",
                dateFormat: "Y-m-d h:i K",
                disableMobile: "true",
                enableTime: true,
                defaultDate: timenow,
            });
        });
    </script>

    <script type="text/javascript">
        var report = $("#report").val();
        $.ajax({
            url: 'report/editReportByJason?id='+report,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                var timenow = "<?php echo date('Y-m-d H:i'); ?>";
                var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
                flatpickr(".editflatpickr", {
                    maxDate: "today",
                    altInput: true,
                    altFormat: "F j, Y h:i K",
                    dateFormat: "F j, Y h:i K",
                    disableMobile: true,
                    enableTime: true,
                    defaultDate: response.date,
                });
            }
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