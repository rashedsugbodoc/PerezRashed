<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo lang('patient'); ?> <?php echo lang('payments'); ?>
                                </div>
                                <div class="card-options">
                                    <a data-toggle="modal" href="#myModal">
                                        <div class="btn-group pull-right">
                                            <button id="" class="btn btn-primary btn-xs">
                                                <i class="fa fa-plus"></i> <?php echo lang('register_new_patient'); ?>
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0"><?php echo lang('patient_id'); ?></th>
                                                    <th class="border-bottom-0"><?php echo lang('name'); ?></th>
                                                    <th class="border-bottom-0"><?php echo lang('phone'); ?></th>
                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                                        <th class="border-bottom-0"><?php echo lang('due_balance'); ?></th>
                                                    <?php } ?>
                                                    <th class="border-bottom-0"><?php echo lang('options'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="myModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Register Patient</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Name" maxlength="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?><span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('password'); ?> <span class="text-red">*</span></label>
                                                            <input type="password" class="form-control" name="password" placeholder="Password" maxlength="255">
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('phone'); ?> <span class="text-red">*</span></label>
                                                                <form>
                                                                    <input id="phone" name="phone" value="+63" type="tel" maxlength="20" class="form-control">
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('address'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" placeholder="Address" name="address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="country_id" id="country">
                                                                    <option value="0" selected disabled><?php echo lang('country_placeholder'); ?></option>
                                                                    <?php foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo $country->id; ?>" <?php
                                                                        if (!empty($setval)) {
                                                                            if ($country->id == set_value('country_id')) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        if (!empty($doctors->country_id)) {
                                                                            if ($country->id == $doctors->country_id) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?> > <?php echo $country->name; ?> </option>
                                                                            <?php } ?>
                                                                </select>      
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('state_province'); ?></label>
                                                                <select class="form-control select2-show-search" name="state_id" id="state" value='' disabled>
                                                                    <option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>
                                                                </select>    
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('city_municipality'); ?></label>
                                                                <select class="form-control select2-show-search" name="city_id" id="city" value='' disabled>
                                                                    <option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6" id="barangayDiv" style="display: none;">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                                <select class="form-control select2-show-search" name="barangay_id" id="barangay" value='' disabled>
                                                                    <option value="0" disabled selected><?php echo lang('barangay_placeholder'); ?></option>
                                                                </select>        
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('postal'); ?></label>
                                                                <input type="text" name="postal" class="form-control" placeholder="<?php echo lang('postal_placeholder'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('sex'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="sex" data-placeholder="Choose one">
                                                                    <option value="Male" <?php
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Male') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?> > Male </option>
                                                                    <option value="Female" <?php
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Female') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?> > Female </option>
                                                                    <option value="Others" <?php
                                                                    if (!empty($patient->sex)) {
                                                                        if ($patient->sex == 'Others') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?> > Others </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('birth_date'); ?> <span class="text-red">*</span></label>
                                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" name="birthdate" type="text" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('blood_group'); ?> <span class="text-red">*</span></label>
                                                                        <select class="form-control select2-show-search" name="bloodgroup" data-placeholder="Choose one">
                                                                            <?php foreach ($groups as $group) { ?>
                                                                            <option value="<?php echo $group->group; ?>" <?php
                                                                            if (!empty($patient->bloodgroup)) {
                                                                                if ($group->group == $patient->bloodgroup) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?> > <?php echo $group->group; ?> </option>
                                                                                <?php } ?> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                                        <select class="form-control select2" data-placeholder="Choose one" id="doctorchoose1" name="doctor[]" value='' multiple>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label">Image Upload <span class="text-red">*</span></label>
                                                            <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                            <input type="file" name="img_url" id="image" class="dropify"/>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12">
                                                            <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
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
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">

    $(".table").on("click", ".editbutton", function () {
        //    e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#editPatientForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
            url: 'patient/editPatientByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                // Populate the form fields with the data returned from server

                $('#editPatientForm').find('[name="id"]').val(response.patient.id).end()
                $('#editPatientForm').find('[name="name"]').val(response.patient.name).end()
                $('#editPatientForm').find('[name="password"]').val(response.patient.password).end()
                $('#editPatientForm').find('[name="email"]').val(response.patient.email).end()
                $('#editPatientForm').find('[name="address"]').val(response.patient.address).end()
                $('#editPatientForm').find('[name="phone"]').val(response.patient.phone).end()
                $('#editPatientForm').find('[name="sex"]').val(response.patient.sex).end()
                $('#editPatientForm').find('[name="birthdate"]').val(response.patient.birthdate).end()
                $('#editPatientForm').find('[name="bloodgroup"]').val(response.patient.bloodgroup).end()
                $('#editPatientForm').find('[name="p_id"]').val(response.patient.patient_id).end()

                if (typeof response.patient.img_url !== 'undefined' && response.patient.img_url != '') {
                    $("#img").attr("src", response.patient.img_url);
                }

                $('.js-example-basic-single.doctor').val(response.patient.doctor).trigger('change');
            }
        });
    });


    $("#edit_country").change(function () {
            var country = $("#edit_country").val();
            var barangay = document.getElementById("edit_barangayDiv");
            var patient = $("#patient_id").val();
            $("#edit_state").find('option').remove();
            $("#edit_city").find('option').remove();
            $("#edit_barangay").find('option').remove();

            if (country == "174") {
                barangay.style.display='block';
                $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
            } else {
                barangay.style.display='none';
                $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
            }

            if (country == null) {
                $("#edit_state").attr("disabled", true);
            } else {
                $("#edit_state").attr("disabled", false);
            }



            $.ajax({
                url: 'patient/getStateByCountryIdByJason?country=' + country + '&patient=' + patient,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;

                    $('#edit_state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                    $.each(state, function (key, value) {
                        $('#edit_state').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    $("#edit_city").attr("disabled", true);
                    $("#edit_barangay").attr("disabled", true);
                }
            });
        });

        $("#edit_state").change(function () {
            var state = $("#edit_state").val();
            $("#edit_city").find('option').remove();

            $.ajax({
                url: 'patient/getCityByStateIdByJason?state=' + state,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var city = response.city;

                    $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $.each(city, function (key, value) {
                        $('#edit_city').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    $("#edit_city").attr("disabled", false);

                }
            });
        });

        $("#edit_city").change(function () {
            var city = $("#edit_city").val();
            $("#edit_barangay").find('option').remove();

            $.ajax({
                url: 'patient/getBarangayByCityIdByJason?city=' + city,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var barangay = response.barangay;

                    $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                    $.each(barangay, function (key, value) {
                        $('#edit_barangay').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    $("#edit_barangay").attr("disabled", false);
                }
            });
        });

    </script>


    <script>


        $(document).ready(function () {
           var table = $('#editable-sample').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "processing": true,
                "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "patient/getPatientPayments",
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
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [1, 2, 3],
                        },
                        title: '<?php echo lang('patient'); ?> <?php echo lang('payments'); ?>'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [1, 2, 3],
                        },
                        title: '<?php echo lang('patient'); ?> <?php echo lang('payments'); ?>'
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
            $("#doctorchoose").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorinfo',
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
            $("#doctorchoose1").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorInfo',
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
            $("#country").change(function () {
                var country = $("#country").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                $("#city").find('option').remove();
                $("#barangay").find('option').remove();

                $("#state").attr("disabled", false);

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'patient/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;

                        $('#state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                        $("#city").attr("disabled", true).append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $("#barangay").attr("disabled", true).append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#state").change(function () {
                var stateval = $("#state").val();
                $("#city").find('option').remove();

                $("#city").attr("disabled", false);

                $.ajax({
                    url: 'patient/getCityByStateIdByJason?state=' + stateval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;

                        $('#city').append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $.each(city, function (key, value) {
                            $('#city').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#city").change(function () {
                var cityval = $("#city").val();
                $("#barangay").find('option').remove();

                $("#barangay").attr("disabled", false);

                $.ajax({
                    url: 'patient/getBarangayByCityIdByJason?city=' + cityval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;

                        $('#barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        $.each(barangay, function (key, value) {
                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });
            });


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