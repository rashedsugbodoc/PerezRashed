<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <?php
                        if ($this->ion_auth->in_group(array('Patient'))) {
                            $patient_ion_id = $this->ion_auth->get_user_id();
                            $patient = $this->db->get_where('patient', array('ion_user_id' => $patient_ion_id))->row();
                        }
                        ?>

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title"><?php echo lang('my') . ' ' . lang('appointment') . ' ' . lang('calendar'); ?></div>
                            </div>
                            <div class="card-body">
                                <div id="calendar" class="has-toolbar calendar_view"></div>
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

        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <!-- <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script> -->
        <script src="<?php echo base_url('public/assets/js/app-calendar.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">

        $(document).ready(function () {
            $('#calendar').fullCalendar({
                lang: 'en',
                events: 'appointment/getAppointmentByJason',
                header:
                        {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,basicWeek,basicDay',
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
                            url: 'patient/getMedicalHistoryByJason?id=' + event.id + '&from_where=calendar',
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                // Populate the form fields with the data returned from server
                                $('#medical_history').html("");
                                $('#medical_history').append(response.view);
                            }
                        });
                        //alert(event.id);

                    }

                    $('#cmodal').modal('show');
                },

                /*   eventMouseover: function (calEvent, domEvent) {
                 var layer = "<div id='events-layer' class='fc-transparent' style='position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100'>Description</div>";
                 $(this).append(layer);
                 },
                 
                 eventMouseout: function (calEvent, domEvent) {
                 $(this).append(layer);
                 },
                 
                 */

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