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
                                            <?php echo lang('add') . ' ' . lang('lab') . ' ' . lang('request'); ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" id="branchForm" action="labrequest/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <?php echo validation_errors(); ?>
                                                    <?php
                                                        $file_error = $this->session->flashdata('fileError');
                                                        $other_error_list = $this->session->flashdata('error_list');
                                                        if(!empty($file_error)) {
                                                            echo $file_error;
                                                        }
                                                        if(!empty($other_error_list)) {
                                                            echo $other_error_list;
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="encounter_id" value="<?php
                                                    if (!empty($encounter_id)) {
                                                        echo $encounter_id;
                                                    }
                                                    ?>">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="redirect" value="<?php
                                                    if (!empty($encounter_id)) {
                                                        echo "encounter";
                                                    }
                                                    ?>">
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="request_id" value="<?php
                                                    if (!empty($request_id)) {
                                                        echo $request_id;
                                                    }
                                                    ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('lab') . '  ' . lang('request') . ' ' . lang('date') ?></label>
                                                        <input type="text" class="form-control fc-datepicker" id="date" readonly placeholder="MM/DD/YYYY" name="date" value="<?php
                                                        if (!empty($request_id)) {
                                                            if (!empty($labrequest->request_date)) {
                                                                echo date('m/d/Y', strtotime($labrequest->request_date.' UTC'));
                                                            }
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <?php if (empty($encounter_id)) { ?>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('patient') ?></label>
                                                            <select class="select2-show-search form-control" id="patient" name="patient">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 col-sm-12 labrequest_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('select') . ' ' . lang('lab') . ' ' . lang('test') ?></label>
                                                        <?php if (empty($labrequest->lab_loinc_id)) { ?>
                                                            <select class="select2-show-search form-control labrequest" name="labrequestInput" id="labrequest" value="">

                                                            </select>
                                                        <?php } else { ?>
                                                            <select class="select2-show-search form-control labrequest" name="labrequestInput" id="labrequest" value="" multiple>
                                                                <?php if (!empty($labrequest->lab_loinc_id)) { ?>
                                                                    <option value="<?php echo $labrequest->lab_loinc_id . '*' . $labrequest->long_common_name . '*' . $labrequest->loinc_num; ?>" <?php echo 'data-loincid="' . $labrequest->lab_loinc_id . '"data-long="' . $labrequest->long_common_name . '"' ?> selected="selected">
                                                                        <?php echo $labrequest->long_common_name ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-12 labrequest_block">
                                                    <div class="form-group">
                                                        <label class="form-label">or Type Manually</label>
                                                        <button class="btn btn-primary" id="add_manual" type="button">Add Lab Test</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12 lab_request_block">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('lab') . ' ' . lang('request'); ?></label>
                                                        <div class="labreq">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 text-right">
                                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit') ?></button>
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

        <!-- Forn-wizard js-->
        <script src="<?php echo base_url('public/assets/plugins/formwizard/jquery.smartWizard.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/formwizard/fromwizard.js'); ?>"></script>

        <!-- Treeview js -->
        <script src="<?php echo base_url('public/assets/plugins/treeview/treeview.js'); ?>"></script>

        <!-- Clipboard js -->
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.js'); ?>"></script>

        <!-- Prism js -->
        <script src="<?php echo base_url('public/assets/plugins/prism/prism.js'); ?>"></script>

        <!--Accordion-Wizard-Form js-->
        <script src="<?php echo base_url('public/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-wizard.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->
    <script type="text/javascript">
        function removeElem(count, id) {
            var remove = $(".remove"+count);

            /*Select2 Option Delete Function Start*/
                // var selected = $('#labrequest').find('option:selected');
                // var selected_val = $('#labrequest').val();
                
                // $.each(selected_val, function (index, value) {
                //     var selected_id = value.split("*");
                //     if (parseInt(selected_id[0]) !== parseInt(id)) {
                //         console.log("New Selected: "+selected_id[0]);
                //         console.log(selected_id);
                //         $('#labrequest').val(null).trigger("change");
                //         $('#labrequest').append($('<option selected>').text(selected_id[1]).val(value)).change();
                //     } else {

                //     }
                // });
            /*Select2 Option Delete Function End*/

            remove.remove();

        }
        $('#labrequest').on('select2:select', function (e) {
            var data = e.params.data;
            var selected = $('#labrequest').find('option:selected');
            console.log("Id: "+data.id[0]);
            console.log("Data-Selected: "+selected.attr('data-selected'));
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var selected = $('#labrequest').find('option:selected');
            var unselected = $('#labrequest').find('option:not(:selected)');
            selected.attr('data-selected', '1');
            $.each(unselected, function (index, value1) {
                num--;
                var count = parseInt(countlabReq) - 1;
                // console.log(count);
                if ($(this).attr('data-selected') == '1') {
                    var value = $(this).val();
                    var res = value.split("*");
                    // var unit_price = res[1];
                    var id = res[0];

                    // console.log(id);
                    $('#labreq_selected_section-' + id).remove();
                    // $('#removediv' + $(this).val() + '').remove();
                    //this option was selected before

                }
            });

            var count = 0;
            $.each($('select.labrequest option:selected'), function ( index ) {
                var value = $(this).val();
                var res = value.split("*");
                var id = res[0];
                var long_common = res[1];
                var loinc_num = res[2];

                if ($('#labreq_id-' + id).length)
                {

                } else {
                    $(".labreq").append(
                        '<section class="labreq_selected remove'+ count +'" id="labreq_selected_section-' + id + '">\n\
                            <div class="row">\n\
                                <div class="col-sm-1">\n\
                                    <button class="btn btn-danger" hidden onclick="removeElem('+ count + ', ' + id +')" type="button"><i class="fe fe-trash"></i></button>\n\
                                </div>\n\
                                <div class="col-sm-11">\n\
                                    <div class="form-group labrequest_sect">\n\
                                        <div class="row">\n\
                                            <div class="col-sm-8">\n\
                                                <div class="form-group">\n\
                                                    <input type="text" class = "form-control labreq-div" name = "labrequest_long[]" value = "' + long_common + '" placeholder="" required readonly>\n\
                                                    <input type="hidden" id="labreq_id-' + id + '" class = "labreq-div" name = "labrequest[]" value = "' + id + '" placeholder="" required disabled>\n\
                                                    <input class = "form-control labreq-div" name = "labreq[]" hidden value = "' + id + '" placeholder="" required>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="col-sm-4">\n\
                                                <div class="form-group">\n\
                                                    <input type="text" name="loinc_num[]" class="form-control" value="' + loinc_num + '" readonly>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="row">\n\
                                            <div class="col-sm-12">\n\
                                                <div class="form-group">\n\
                                                    <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]"></div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            <div>\n\
                        </section>\n\
                    ');
                }

            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".labrequest").change(function () {
                var count = 1;

                var selected = $('#labrequest').find('option:selected');
                var unselected = $('#labrequest').find('option:not(:selected)');
                selected.attr('data-selected', '1');
                var num = 0;
                var countlabReq = $(".labreq_selected").length;
                $.each(unselected, function (index, value1) {
                    num--;
                    var count = parseInt(countlabReq) - 1;
                    // console.log(count);
                    if ($(this).attr('data-selected') == '1') {
                        var value = $(this).val();
                        var res = value.split("*");
                        // var unit_price = res[1];
                        var id = res[0];

                        // console.log(id);
                        $('#labreq_selected_section-' + id).remove();
                        // $('#removediv' + $(this).val() + '').remove();
                        //this option was selected before

                    }
                });

                
                $.each($('select.labrequest option:selected'), function ( index ) {
                    num++;
                    var count = parseInt(countlabReq) + 1;
                    console.log(count);
                    var value = $(this).val();
                    var res = value.split("*");
                    var id = res[0];
                    var long_common = res[1];
                    var loinc_num = res[2];
                    
                    console.log(value);
                    if ($('#labreq_id-' + id).length)
                    {

                    } else {
                        $(".labreq").append(
                            '<section class="labreq_selected remove'+ count +'" id="labreq_selected_section-' + id + '">\n\
                                <div class="row">\n\
                                    <div class="col-sm-1">\n\
                                        <button class="btn btn-danger" hidden onclick="removeElem('+ count + ', ' + id +')" type="button"><i class="fe fe-trash"></i></button>\n\
                                    </div>\n\
                                    <div class="col-sm-11">\n\
                                        <div class="form-group labrequest_sect">\n\
                                            <div class="row">\n\
                                                <div class="col-sm-8">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" class = "form-control labreq-div" name = "labrequest_long[]" value = "' + long_common + '" placeholder="" required readonly>\n\
                                                        <input type="hidden" id="labreq_id-' + id + '" class = "labreq-div" name = "labrequest[]" value = "' + id + '" placeholder="" required disabled>\n\
                                                        <input class = "form-control labreq-div" name = "labreq[]" hidden value = "' + id + '" placeholder="" required>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="col-sm-4">\n\
                                                    <div class="form-group">\n\
                                                        <input type="text" name="loinc_num[]" class="form-control" value="' + loinc_num + '" readonly>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="row">\n\
                                                <div class="col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction[]"></div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                <div>\n\
                            </section>\n\
                        ');
                    }
                });
            });
        });

        $(document).ready(function () {
            $("#add_manual").click(function () {
                // var numm = $('.num').last().text();
                // count += parseInt(numm);
                // // console.log(count);
                var countlabReq = $(".labreq_selected").length;
                var count = parseInt(countlabReq) + 1;
                console.log(count);
                $(".labreq").append(
                    '<section class="labreq_selected remove'+ count +'" id="labreq_selected_section">\n\
                        <div class="row">\n\
                            <div class="col-sm-1">\n\
                                <button class="btn btn-danger" onclick="removeElem('+ count +')" type="button"><i class="fe fe-trash"></i></button>\n\
                            </div>\n\
                            <div class="col-sm-11">\n\
                                <div class="form-group labrequest_sect">\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <input type="text" class = "form-control labreq-div" name = "labrequest_text[]" placeholder="" required>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="row">\n\
                                        <div class="col-sm-12">\n\
                                            <div class="form-group">\n\
                                                <div class="input-group"><label class="align-self-center mb-0"><?php echo lang("instruction")?> &nbsp</label><input type="text" class="form-control" name="instruction_text[]"></div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        <div>\n\
                    </section>\n\
                    ');
            });
        });
    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            function removeElem() {
                alert($(this).val());
            }
        });
    </script> -->

    <script>
        $(document).ready(function () {
            $("#labrequest").select2({
                placeholder: '<?php echo lang('request'); ?>',
                multiple: true,
                allowClear: false,
                ajax: {
                    url: 'labrequest/getLabrequestSelect2',
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
            $("#patient").select2({
                placeholder: '<?php echo lang('request'); ?>',
                allowClear: false,
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