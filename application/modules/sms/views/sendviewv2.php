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
                                            <?php echo lang('send_sms'); ?>
                                        </div>
                                        <div class="card-options">
                                            <button class='btn btn-info pull-right mr-1' onclick="location.href = 'sms/sent'" type="button">
                                                <?php echo lang('sent_messages'); ?></button>
                                            <button class='btn btn-info pull-right mr-1' onclick="location.href = 'sms/manualSMSTemplate'" type="button">
                                                <?php echo lang('template'); ?></button>
                                            <button class='btn btn-info pull-right' data-toggle="modal" data-target="#myModal1" type="button">
                                                <?php echo lang('add'); ?> <?php echo lang('template'); ?></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" name="myform" id="myform" class="clearfix" action="sms/send" method="post">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('send_sms_to'); ?></label>
                                                        <label class="form-label">
                                                            <input type="radio" name="radio" id="optionsRadios1" value="allpatient">
                                                            <?php echo lang('all_patient'); ?>
                                                        </label>
                                                        <label class="form-label">
                                                            <input type="radio" name="radio" id="optionsRadios2" value="alldoctor">
                                                            <?php echo lang('all_doctor'); ?>
                                                        </label>
                                                        <label class="form-label">
                                                            <input type="radio" name="radio" id="optionsRadios2" value="bloodgroupwise">
                                                            <?php echo lang('donor'); ?> 
                                                        </label>
                                                        <div class="radio pos_client">
                                                            <label class="form-label">
                                                                <?php echo lang('select_blood_group'); ?>
                                                                <select class="form-control m-bot15" name="bloodgroup" value=''>
                                                                    <?php foreach ($groups as $group) { ?>
                                                                        <option value="<?php echo $group->group; ?>"> <?php echo $group->group; ?> </option>
                                                                    <?php } ?> 
                                                                </select>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label class="form-label">
                                                                <input type="radio" name="radio" id="optionsRadios2" value="single_patient">
                                                                <?php echo lang('single_patient'); ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio single_patient">
                                                            <label class="form-label">
                                                                <?php echo lang('select_patient'); ?>
                                                                <select class="form-control m-bot15" id='patientchoose' name="patient" value=''>
                                                                    <?php //foreach ($patients as $patient) { ?>
                                                                       <!-- <option value="<?php echo $patient->id; ?>"> <?php echo $patient->name; ?> </option>-->
                                                                    <?php // } ?> 
                                                                </select>
                                                            </label>
                                                        </div>
                                                        <div class="">
                                                            <label class="form-label">
                                                                <?php echo lang('select_template'); ?>
                                                                <select class="form-control m-bot15" id='selUser5' name="templatess" style='width: 100%;'>
                                                                   <!-- <option value='0'><?php echo lang('select_template'); ?></option>-->
                                                                </select>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo lang('message'); ?></label><br>
                                                            <?php
                                                            $count = 0;
                                                            foreach ($shortcode as $shortcodes) {
                                                                ?>
                                                                <input type="button" class="btn btn-light" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext(this);">
                                                                <?php
                                                                $count+=1;
                                                                if ($count === 7) {
                                                                    ?>
                                                                    <br>
                                                                    <?php
                                                                }
                                                            }
                                                            ?> <br><br>
                                                            <textarea class="form-control" id="editor1" name="message" value="" cols="70" rows="10"></textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value=''>

                                                        <div class="form-group col-md-12">
                                                            <button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-location-arrow"></i> <?php echo lang('send_sms'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('template'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform1" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('templatename'); ?></label>
                                                        <input type="text" class="form-control" name="name" value='<?php
                                                        if (!empty($templatename->name)) {
                                                            echo $templatename->name;
                                                        }
                                                        if (!empty($setval)) {
                                                            echo set_value('name');
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                                                        <?php
                                                        $count1 = 0;
                                                        foreach ($shortcode as $shortcodes) {
                                                            ?>
                                                            <input type="button" class="btn btn-light" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext1(this);">
                                                            <?php
                                                            $count1+=1;
                                                            if ($count1 === 7) {
                                                                ?>
                                                                <br>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <textarea class="form-control mt-5" id="editor2"name="message" value='<?php
                                                        if (!empty($templatename->message)) {
                                                            echo $templatename->message;
                                                        }
                                                        if (!empty($setval)) {
                                                            echo set_value('message');
                                                        }
                                                        ?>' cols="70" rows="10"placeholder="" required> <?php
                                                        if (!empty($templatename->message)) {
                                                            echo $templatename->message;
                                                        }
                                                        if (!empty($setval)) {
                                                            echo set_value('message');
                                                        }
                                                        ?></textarea>
                                                    </div>
                                                    <input type="hidden" name="id" value='<?php
                                                    if (!empty($templatename->id)) {
                                                        echo $templatename->id;
                                                    }
                                                    ?>'>
                                                    <input type="hidden" name="type" value='sms'>
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
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".voterAW").click(function () {
                $("#area_id").val($(this).attr('data-id'));
                $('#myModal2').modal('show');
            });
            $(".volunteerAW").click(function () {
                $("#area_idd").val($(this).attr('data-id'));
                $('#myModal4').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.pos_client').hide();
            $('input[type=radio][name=radio]').change(function () {
                if (this.value == 'bloodgroupwise') {
                    $('.pos_client').show();
                } else {
                    $('.pos_client').hide();
                }
            });

        });
    </script> 

    <script>
        $(document).ready(function () {
            $('.single_patient').hide();
            $('input[type=radio][name=radio]').change(function () {
                if (this.value == 'single_patient') {
                    $('.single_patient').show();
                } else {
                    $('.single_patient').hide();
                }
            });

        });
    </script> 

    <script>
        $(document).ready(function () {
            $('.staff').hide();
            $('input[type=radio][name=radio]').change(function () {
                if (this.value == 'staff') {
                    $('.staff').show();
                } else {
                    $('.staff').hide();
                }
            });

        });
    </script> 

    <script>
        $(document).ready(function () {
            $("#selUser5").select2({
                placeholder: '<?php echo lang('select_template'); ?>',
                allowClear: true,
                ajax: {
                    url: 'sms/getManualSMSTemplateinfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term                   
                        };

                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#selUser5').on('change', function () {
                var iid = $(this).val();
                var type = 'sms';

                $.ajax({
                    url: 'sms/getManualSMSTemplateMessageboxText?id=' + iid + '&type=' + type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        $('#myform').find('[name="message"]').val(response.user.message).end();
                    }
                });
            });
        });
    </script>

    <script>
        function addtext(ele) {
            var fired_button = ele.value;
            document.myform.message.value += fired_button;
        }
    </script>

    <script>
        function addtext1(ele) {
            var fired_button = ele.value;
            document.myform1.message.value += fired_button;
        }
    </script>

    <script>
        $(document).ready(function () {
            $("#patientchoose").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getPatientinfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });
        });
    </script>

    </body>
</html>