<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('appointments'); ?></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="main-proifle d-print-none">
                                    <div class="profile-cover">
                                        <div class="wideget-user-tab">
                                            <div class="tab-menu-heading p-0">
                                                <div class="tabs-menu1 px-3">
                                                    <ul class="nav" id="mytab">
                                                        <li><a href="#tab-6" data-toggle="tab" class="active"><?php echo lang('appointments'); ?> <?php echo lang('calendar'); ?></a></li>
                                                        <li><a href="#tab-7" data-toggle="tab"><?php echo lang('appointments'); ?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.profile-cover -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="border-0">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="col-md-12">
                                                                <aside class="calendar_ui col-md-12 calendar_ui">
                                                                    <section class="">
                                                                        <div class="">
                                                                            <div id="calendarview" class="has-toolbar calendar_view"></div>
                                                                        </div>
                                                                    </section>
                                                                </aside>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-7">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="adv-table editable-table ">
                                                                <table class="table table-striped table-hover table-bordered" id="editable-sample" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> <?php echo lang('id'); ?></th>
                                                                            <th> <?php echo lang('patient'); ?></th>
                                                                            <th> <?php echo lang('date-time'); ?></th>
                                                                            <th> <?php echo lang('remarks'); ?></th>
                                                                            <th> <?php echo lang('options'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                    foreach ($appointments as $appointment) {
                                                                        if ($appointment->doctor == $doctor_id) {
                                                                            ?>
                                                                            <tr class="">
                                                                                <td ><?php echo $appointment->id; ?></td>
                                                                                <td> <?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->name; ?></td>
                                                                                <td class="center"><?php echo date('d-m-Y', $appointment->date); ?> => <?php echo $appointment->time_slot; ?></td>
                                                                                <td>
                                                                                    <?php echo $appointment->remarks; ?>
                                                                                </td> 
                                                                                <td>
                                                                                    <!--
                                                                                    <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"> <?php echo lang('edit'); ?></i></button>   
                                                                                    -->
                                                                                    <a class="btn btn-danger btn-xs btn_width delete_button" href="appointment/delete?id=<?php echo $appointment->id; ?>&doctor_id=<?php echo $appointment->doctor; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
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
                            <div class="col-md-4 col-sm-12">
                                <div class="row" id="second_div">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="card box-widget widget-user">
                                            <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar" style="width: 150px; height: 150px;" width="auto" height="auto" class="rounded-circle p-1" src="
                                                    <?php 
                                                    $user = $this->session->userdata('user_id');
                                                    $user_image = $this->session->userdata('profile_img_url');
                                                    echo $user_image; ?>
                                                    "></div>
                                            <div class="card-body text-center">
                                                <div class="pro-user">
                                                    <h4 class="pro-user-username text-dark mb-1 font-weight-bold"><?php echo $mmrdoctor->professional_display_name; ?></h4>
                                                    <h6 class="pro-user-desc text-muted">ID : <?php echo $mmrdoctor->id; ?></h6>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="main-profile-contact-list d-lg-flex">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="media mr-4">
                                                                <div class="media-icon bg-info text-white mr-3 mt-1">
                                                                    <i class="fa fa-map"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <small class="text-muted">Email</small>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $mmrdoctor->email; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="media mr-4">
                                                                <div class="media-icon bg-info text-white mr-3 mt-1">
                                                                    <i class="fe fe-mail"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <small class="text-muted">Phone</small>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $mmrdoctor->phone; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-12">
                                                            <div class="media">
                                                                <div class="media-icon bg-info text-white mr-3 mt-1">
                                                                    <i class="fa fa-phone"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <small class="text-muted">Phone</small>
                                                                    <div class="font-weight-bold">
                                                                        <?php echo $patient->phone; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div><!-- main-profile-contact-list -->
                                                <!-- <div class="main-profile-contact-list d-lg-flex">
                                                    <div class="row">
                                                        
                                                    </div>
                                                </div> -->
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

        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar.js'); ?>"></script>

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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-1'l><'col-sm-7 text-center'B><'col-sm-4'f>>" +
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
                            columns: [0, 1, 2, 3],
                        }
                    },
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                }
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#calendarview').fullCalendar({
                lang: 'en',
                events: 'appointment/getAppointmentByJasonByDoctor?id=' +<?php echo $doctor_id; ?>,
                header:
                        {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay',
                        },
                /*    timeFormat: {// for event elements
                 'month': 'h:mm TT A {h:mm TT}', // default
                 'week': 'h:mm TT A {h:mm TT}', // default
                 'day': 'h:mm TT A {h:mm TT}'  // default
                 },
                 
                 */
                timeFormat: 'h(:mm) A',
                eventRender: function (event, element) {
                    element.find('.fc-time').html(element.find('.fc-time').text());
                    element.find('.fc-title').html(element.find('.fc-title').text());

                },
                eventClick: function (event) {
                    $('#medical_history').html("");
                    if (event.id) {
                        $.ajax({
                            url: 'patient/getMedicalHistoryByJason?id=' + event.id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                        }).success(function (response) {
                            // Populate the form fields with the data returned from server
                            $('#medical_history').html("");
                            $('#medical_history').append(response.view);
                        });
                        //alert(event.id);

                    }

                    $('#cmodal').modal('show');
                },
                slotDuration: '00:5:00',
                businessHours: false,
                slotEventOverlap: false,
                editable: false,
                selectable: false,
                lazyFetching: true,
                minTime: "6:00:00",
                maxTime: "24:00:00",
                defaultView: 'month',
                allDayDefault: false,
                displayEventEnd: true,
                timezone: false,
            });
        });

    </script>

    </body>
</html> 