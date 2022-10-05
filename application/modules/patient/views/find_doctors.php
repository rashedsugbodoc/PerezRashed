<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('find_doctors'); ?></h4>
                            </div>
                        </div>
                        <!--End Page header-->

                    <div class="content mt-5">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control searchbox-input">
                                        <div class="input-group-append">
                                            <select class="form-control select2-show-search" id="doctorchoose" data-placeholder="Choose one (with searchbox)">
                                                <option></option>
                                                <option value=" "><?php echo lang('all'); ?></option>
                                                <?php foreach ($specialties as $specialty) { ?>
                                                    <option value="<?php echo $specialty->display_name_ph; ?>"> <?php echo $specialty->display_name_ph ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-sm">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12 col-sm-12">
                                Showing all Doctors
                            </div>
                        </div>

                        <div class="row">
                            <?php foreach($doctors as $doctor) { ?>
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                    <div class="d-sm-flex align-items-center border bg-white p-3 mb-3 br-7">
                                        <div class="avatar avatar-lg brround d-block cover-image" data-image-src="<?php echo $doctor->img_url; ?>" >
                                        </div>
                                        <div class="wrapper ml-sm-3  mt-4 mt-sm-0">
                                            <p class="mb-0 mt-1 text-dark font-weight-semibold"><?php echo lang('dr') ?>. <?php echo $doctor->name; ?></p>
                                            <small class="text-muted">
                                                <?php
                                                    $specialty_id = explode(',', $doctor->specialties);
                                                    $specialty_name = [];
                                                    foreach($specialty_id as $specialty_id_explode) {
                                                        $display_name_ph = $this->specialty_model->getSpecialtyById($specialty_id_explode)->display_name_ph;
                                                        if (!empty($display_name_ph)) {
                                                            $speacialties = $display_name_ph;
                                                        } else {
                                                            $speacialties = "";
                                                        }
                                                        $specialty_name[] = $speacialties;
                                                    }

                                                    $spec_name = implode(', ', $specialty_name);

                                                    if (!empty($doctor->specialties)) {
                                                        echo $spec_name;
                                                    } else {
                                                        echo "";
                                                    }
                                                    
                                                ?>
                                            </small>
                                            <small class="text-muted"><p><i class="fa fa-map-marker text-info"></i> 
                                            <?php
                                                $city = $this->location_model->getCityById($doctor->city_id)->name;
                                                $barangay = $this->location_model->getBarangayById($doctor->barangay_id)->name;
                                                if(empty($city && $barangay)) {
                                                    echo "";
                                                } else {
                                                    echo $barangay . ', ' . $city;
                                                }
                                            ?>
                                            </p></small>
                                            <a href="appointment/bookConsultation?doctor_id=<?php echo $doctor->id ?>" class="btn btn-primary btn-pill btn-sm d-xl-inline">Book</a>
                                            <a class="btn btn-white btn-pill btn-sm doctorInfo" data-id="<?php echo $doctor->id ?>" data-toggle="modal" href="">Info</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>

                    </div>
                </div><!-- end app-content-->
            </div>

            <div class="modal fade" id="modaldemo3">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Doctor Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-xl-12">
                                <div class="">
                                    <div class="main-content-body main-content-body-contacts">
                                        <div class="main-contact-info-header text-center d-flex flex-column justify-content-center align-items-center pl-0">
                                            <div class="main-img-user brround">
                                                <div id="img1"></div>
                                            </div>
                                            <div class="mt-2 text-white">
                                                <h4 class="text-dark">Dr. <span class="doctor_name"></span></h4>
                                                <p id="specialty"></p>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="mt-2 text-white">
                                                <div class="main-img-user brround">
                                                    <div id="img1">
                                                        
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Dr. <span class="doctor_name"></span></h4>
                                                    <p class="specialty"></p>
                                                    <nav class="nav bookBtn">
                                                        
                                                    </nav>
                                                </div>
                                            </div> -->
                                            <!-- main-contact-action -->
                                        <!-- </div> -->
                                        <div class="main-contact-info-body">
                                            <div class="media-list pt-0">
                                                <div class="media pt-4 pb-0 mt-0">
                                                    <div class="media-body">
                                                        <div class="d-flex">
                                                            <h3 class="font-weight-normal text-dark">Clinics</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="branches">
                                                    
                                                </div>
                                                <!-- <div class="media pt-0 pb-4 mt-0">
                                                    <div class="media-body">
                                                        <div class="d-flex">
                                                            <div class="media-icon bg-light text-primary mr-3 mt-1">
                                                                <i class="fa fa-hospital-o"></i>
                                                            </div>
                                                            <div>
                                                                <label>Perpetual Socorro Hospital</label> <span class="font-weight-semibold fs-14"><i class="fa fa-phone"></i> (032) 345107</span><span class="font-weight-semibold fs-14"><i class="fa fa-home"></i> Room 245</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media py-4 border-top mt-0">
                                                    <div class="media-body">
                                                        <div class="d-flex">
                                                            <div class="media-icon bg-light text-primary mr-3 mt-1">
                                                                <i class="fa fa-hospital-o"></i>
                                                            </div>
                                                            <div>
                                                                <label>Chong Hua Mandaue Medical Hospital</label> <span class="font-weight-semibold fs-14"><i class="fa fa-phone"></i> (032) 25547090</span><span class="font-weight-semibold fs-14"><i class="fa fa-home"></i> Room 750</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer d-flex justify-content-center align-center bookBtn">
                                            
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"> <?php echo lang('doctor'); ?> <?php echo lang('info'); ?></h4>
                        </div>
                        <div class="modal-body">
                            

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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

        <!--Moment js-->
        <script src="<?php echo base_url('public/assets/plugins/moment/moment.js'); ?>"></script>

        <!-- Daterangepicker js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/daterange.js'); ?>"></script>

        <!--Chart js -->
        <script src="<?php echo base_url('public/assets/plugins/chart/chart.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/chart/chart.extension.js'); ?>"></script>

        <!-- ECharts js-->
        <script src="<?php echo base_url('public/assets/plugins/echarts/echarts.js'); ?>"></script>

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>

        <!--Newsticker js-->
        <script src="<?php echo base_url('public/assets/plugins/newsticker/newsticker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/newsticker.js'); ?>"></script>

        <!-- Index js-->
        <script src="<?php echo base_url('public/assets/js/index5.js'); ?>"></script>
        <!-- INTERNAL JS END -->

        <!-- Custom js-->
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".doctorInfo").click(function () {
                    var iid = $(this).attr('data-id');
                    $('.doctor_name').html("").end()
                    $('#specialty').html("").end()
                    $('#branches').html("").end()
                    $('.img1-value').remove()
                    $('.bookBtn').html("").end()
                    $.ajax({
                        url: 'doctor/getDoctorById?id='+iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function(response) {
                            $('.doctor_name').append(response.doctor.name).end()
                            $("#img1").append('<img alt="" src="'+response.doctor_image+'" class="h-100 w-100 brround img1-value" max-width="120" max-height="120">');
                            // $('.specialty').append(response.specialties.display_name).end()
                            $.each(response.specialties, function(key, value) {
                                // $('.specialty').append(value.display_name_ph+(1)).end();
                                $('#specialty').append('<p class="badge badge-pill badge-info mt-2">\n\
                                <span>'+ value.display_name_ph +'</span>\n\
                                </p>\n\
                                ')
                            });

                            $.each(response.branches, function(key, value) {
                                $('#branches').append('<div class="media pt-0 pb-4 mt-0">\n\
                                    <div class="media-body">\n\
                                        <div class="d-flex">\n\
                                            <div class="media-icon bg-light text-primary mr-3 mt-1">\n\
                                                <i class="fa fa-hospital-o"></i>\n\
                                            </div>\n\
                                            <div class="mt-1">\n\
                                                <label class="font-weight-bold text-primary fs-15">'+ value.display_name 
                                                +'</label> <span class=" fs-14 text-muted"><i class="fa fa-phone mr-2"></i></i> '
                                                +response.doctor.phone+'</span><span class="font-weight-normal fs-14 text-muted"><i class="fa fa-map-marker mr-2"></i>'
                                                + value.street_address+'</span>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                                ');
                            });
                            $('.bookBtn').append('<a href="appointment/bookConsultation?doctor_id='+iid+'" class="btn btn-primary btn-md">Book</a>')
                            console.log(response.branches);
                            $('#modaldemo3').modal('show');
                        }
                    })
                })
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".table").on("click", ".inffo", function () {
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');

                    $("#img1").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                    $('.nameClass').html("").end()
                    $('.emailClass').html("").end()
                    $('.addressClass').html("").end()
                    $('.phoneClass').html("").end()
                    $('.departmentClass').html("").end()
                    $('.profileClass').html("").end()
                    $('.licenseClass').html("").end()
                    $.ajax({
                        url: 'doctor/editDoctorByJason?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).success(function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                        $('.nameClass').append(response.doctor.name).end()
                        $('.emailClass').append(response.doctor.email).end()
                        $('.addressClass').append(response.doctor.address).end()
                        $('.phoneClass').append(response.doctor.phone).end()
                        $('.departmentClass').append(response.doctor.department).end()
                        $('.profileClass').append(response.doctor.profile).end()
                        $('.licenseClass').append(response.doctor.license).end()
                        if (typeof response.doctor.img_url !== 'undefined' && response.doctor.img_url != '') {
                            $("#img1").attr("src", response.doctor.img_url);
                        }

                        $('#infoModal').modal('show');

                    });
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
              $('.searchbox-input').on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".col-xl-4").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });

            $(document).ready(function(){
              $('.select2-show-search').on("change", function() {
                var value = $(this).val().toLowerCase();
                $(".col-xl-4").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
        </script>

    </body>
</html>         