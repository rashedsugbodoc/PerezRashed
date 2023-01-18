<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <style>
                            .customform_type {
                                cursor: pointer;
                            }
                        </style>

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('custom').' '.lang('form'); ?></h4>
                            </div>
                        </div>
                        <!--End Page header-->

                        <div class="row">
                            <div class="col-lg-4 col-xl-3 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                                        <?php
                                            $user = $this->ion_auth->get_user_id();
                                            if ($this->ion_auth->in_group(array('Doctor'))) {
                                                $doctor_id = $this->doctor_model->getDoctorByIonUserId($user)->id;
                                            } else {
                                                $doctor_id = null;
                                            }
                                        ?>
                                        <?php foreach($customform_types as $cft) { ?>
                                            <a id="<?php echo $cft->name ?>" class="list-group-item list-group-item-action d-flex align-items-center customform_type" data-id="<?php echo $cft->id; ?>" data-method="<?php echo $cft->method_name; ?>" data-name="<?php echo $cft->name; ?>" data-displayname="<?php echo $cft->display_name; ?>">
                                                <svg class="svg-icon mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg> <?php echo $cft->display_name; ?> <span class="ml-auto badge badge-success"><?php echo $this->customform_model->getCustomByTypeCount($cft->id, $doctor_id); ?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('custom').' '.lang('form'); ?>
                                        </div>
                                        <div class="card-options">
                                            <a id="customAddNew" class="btn btn-primary"><?php echo lang('add_new'); ?></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('reference').' '.lang('number'); ?></th>
                                                            <th><?php echo lang('version'); ?></th>
                                                            <th><?php echo lang('patient'); ?></th>
                                                            <th><?php echo lang('action'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyid">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
        <script src="<?php echo base_url('common/assets/intl-tel-input/build/js/intlTelInput.js');?>"></script>

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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">

        $(document).ready(function (){
            $(".customform_type").click(function() {
                var id = $(this).data('id');
                var method = $(this).data('method');
                var name = $(this).data('name');
                var display_name = $(this).data('displayname');

                $("#customAddNew").attr("href", "customform/addNew"+method+"?type="+name);

                $(".card-title").text(display_name);
                
                var table = $('#editable-sample').DataTable({
                    responsive: true,
                    //   dom: 'lfrBtip',
                    "processing": true,
                    // "serverSide": true,
                    "searchable": true,
                    "ajax": {
                        url: "customform/getCustomForm?type="+id,
                        type: 'POST',
                    },
                    scroller: {
                        loadingIndicator: true
                    },
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
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    }
                                },
                                {
                                    extend: 'csvHtml5',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    }
                                },
                                {
                                    extend: 'pdfHtml5',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                    orientation: 'portrait',
                                    pageSize: 'LEGAL'
                                },
                                {
                                    extend: 'print',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
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
                    },
                    "bDestroy": true
                });
                table.buttons().container().appendTo('.custom_buttons');
            })
        });
        
    </script>

    <script type="text/javascript">
        $('#editable-sample').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',
            "processing": true,
            // "serverSide": true,
            "searchable": true,
            scroller: {
                loadingIndicator: true
            },
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
                            title: '<?php echo lang('custom').' '.lang('form'); ?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            title: '<?php echo lang('custom').' '.lang('form'); ?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            title: '<?php echo lang('custom').' '.lang('form'); ?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: '<?php echo lang('custom').' '.lang('form'); ?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            },
                            orientation: 'portrait',
                            pageSize: 'LEGAL'
                        },
                        {
                            extend: 'print',
                            title: '<?php echo lang('custom').' '.lang('form'); ?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
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
            },
            "bDestroy": true
        });
    </script>

    <script>
        $('#branchForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#educational_attainment").select2({
                placeholder: 'Search Educational Attainment',
                allowClear: true,
                ajax: {
                    url: 'patient/getEducationalAttainmentInfo',
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

    <script type="text/javascript">
        $(document).ready(function () {
            var input = document.querySelector("#mobile");
            var errorMsg = document.querySelector("#error-msg");
            var validMsg = document.querySelector("#valid-msg");
            var form = document.getElementById("patientForm");

            // here, the index maps to the error code returned from getValidationError - see readme
            var errorMap = ["Invalid mobile number", "Invalid country code", "Too short", "Too long", "Invalid mobile number", "Invalid length"];

            // initialise plugin
            var iti = window.intlTelInput(input, {
                hiddenInput: "full_number",
                preferredCountries: ['ph', 'sg', 'us'],
                utilsScript: "<?php echo base_url('common/assets/intl-tel-input/build/js/utils.js?1638200991544');?>"
            });

            var reset = function() {
              input.classList.remove("parsley-error");
              input.classList.remove("is-valid");
              errorMsg.innerHTML = "";
              errorMsg.classList.add("hide");
              validMsg.classList.add("hide");
            };

            var execute = function() {
              reset();
              document.getElementById("phone").value = iti.getNumber();
              if (input.value.trim()) {
                if (iti.isValidNumber()) {
                  validMsg.classList.remove("hide");
                  input.classList.add("is-valid");
                } else {
                  input.classList.add("parsley-error");
                  input.classList.remove("is-valid");
                  var errorCode = iti.getValidationError();
                  errorMsg.innerHTML = errorMap[errorCode];
                  errorMsg.classList.remove("hide");
                }
              }
            };

            // on blur: validate
            input.addEventListener('blur', execute);
            form.addEventListener('submit', execute);
            // on keyup / change flag: reset
            input.addEventListener('change', reset);
            input.addEventListener('keyup', reset);
        });
        
    </script>

    </body>
</html>