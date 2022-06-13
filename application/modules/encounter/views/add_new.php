<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('add_encounter'); ?></div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="encounter/addnew">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <input type="hidden" name="redirect" value="<?php
                                            if (!empty($redirect)) {
                                                echo $redirect;
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('encounter_type'); ?></label>
                                                <select class="select2-show-search form-control" name="type" id="encounter_type">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('location'); ?></label>
                                                <select class="select2-show-search form-control" name="location" id="location">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('patient'); ?></label>
                                                <select class="select2-show-search form-control pos_select" name="patient" id="pos_select">
                                                    <?php if (!empty($patient_id)) { ?>
                                                        <option value="<?php echo $patient_id ?>" selected="selected"><?php echo $this->patient_model->getPatientByPatientNumber($patient_id)->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering_doctor'); ?></label>
                                                        <select class="select2-show-search form-control rendering_doctor_select" name="rendering_doctor" id="pos_rendering_doctor">
                                                            <?php if (!empty($doctordetails)) { ?>
                                                                <option value="<?php echo $doctordetails->id; ?>" selected="selected"><?php echo $doctordetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>  
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 rendering_doctor_client">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('name'); ?></label>
                                                        <input type="text" name="render_name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering'). ' ' . lang('staff')?></label>
                                                        <select class="select2-show-search form-control rendering_user_select" name="rendering_user" id="pos_rendering_user">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('referral_provider') ?></label>
                                                        <select class="select2-show-search form-control ref_provider_select" name="provider" id="pos_ref_provider"> 
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 ref_provider_client ml-4 pr-4">
                                                    <div class="form-group">
                                                        <label class="text-info form-label"><?php echo lang('referral_provider').' '.lang('name'); ?></label>
                                                        <input type="text" name="provider_name" class="border-info form-control" placeholder="<?php echo lang('referral_clinic_hospital_facility');?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('refd_by_doctor') ?></label>
                                                        <select class="select2-show-search form-control ref_doctor_select" name="ref_doctor" id="pos_ref_doctor">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 ref_doctor_client ml-4 pr-4">
                                                    <div class="form-group">
                                                        <label class="text-info form-label"><?php echo lang('referring_doctor').' '.lang('name'); ?></label>
                                                        <input type="text" name="ref_name" class="border-info form-control" placeholder="<?php echo lang('full_name').' '.lang('of').' '.lang('referring_doctor');?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('reason'); ?></label>
                                                <textarea class="form-control" name="reason" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('status'); ?></label>
                                                <select class="select2-show-search form-control encounter_status" name="encounter_status" id="encounter_status">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script>
        $(document).ready(function () {
            $('.rendering_doctor_client').hide();
            $(document.body).on('change', '#pos_rendering_doctor', function () {

                var v = $("select.rendering_doctor_select option:selected").val()
                if (v == 'add_new') {
                    $('.rendering_doctor_client').show();
                } else {
                    $('.rendering_doctor_client').hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.ref_doctor_client').hide();
            $(document.body).on('change', '#pos_ref_doctor', function () {

                var v = $("select.ref_doctor_select option:selected").val()
                if (v == 'add_new') {
                    $('.ref_doctor_client').show();
                } else {
                    $('.ref_doctor_client').hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.ref_provider_client').hide();
            $(document.body).on('change', '#pos_ref_provider', function () {

                var v = $("select.ref_provider_select option:selected").val()
                if (v == 'add_new') {
                    $('.ref_provider_client').show();
                } else {
                    $('.ref_provider_client').hide();
                }
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#encounter_type").change(function () {
                var encounter_type = $("#encounter_type").val();
                $("#encounter_status").find('option').remove();
                $("#location").find('option').remove();

                $.ajax({
                    url: 'encounter/getStatusByEncounterType?id=' + encounter_type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var status = response.status;

                        $.each(status, function (key, value) {
                            $('#encounter_status').append($('<option>').text(value.display_name).val(value.id)).end();
                        });
                    }
                });

                $.ajax({
                    url: 'encounter/getLocationByEncounterType?type_id=' + encounter_type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var encounter_type = response.encounter_type;
                        console.log(encounter_type);
                        $.each(encounter_type, function (key, value) {
                            $('#location').append($('<option>').text(value.display_name).val(value.id)).end();
                        });
                    }
                });
            });
        });
        
        $(document).ready(function () {
            $("#pos_ref_provider").select2({
                placeholder: '<?php echo lang('search').' '.lang('referral_facility'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getProviderInfoWithAddNewOption',
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

        $(document).ready(function () {
            $("#pos_rendering_user").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getUserWithoutAddNewOption',
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

        $(document).ready(function () {
            $("#pos_ref_doctor").select2({
                placeholder: '<?php echo lang('search').' '.lang('referring_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getReferredByDoctorWithAddNewOption',
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

        $(document).ready(function () {
            $("#pos_rendering_doctor").select2({
                placeholder: '<?php echo lang('search').' '.lang('rendering_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getRenderingDoctorWithAddNewOption',
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

        $(document).ready(function () {
            $("#encounter_type").select2({
                placeholder: '<?php echo lang('select_encounter_type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getEncounterTypeInfo',
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

        $(document).ready(function () {
            $("#location").select2({
                placeholder: '<?php echo lang('select_online_or_location'); ?>',
                allowClear: true,
            });
        });

        $(document).ready(function () {
            $("#pos_select").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    // url: 'patient/getPatientinfo',
                    url: 'patient/getPatientInfoByVisitedProviderId',
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
        })
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
                    url: "encounter/getEncounter",
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
                            columns: [0, 1, 2, 4],
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
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