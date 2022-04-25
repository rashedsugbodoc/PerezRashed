<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('find_clinic_hospital'); ?></h4>
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
                                                <?php foreach ($entity_type as $entity) { ?>
                                                    <option value="<?php echo $entity->display_name; ?>"> <?php echo $entity->display_name; ?> </option>
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
                            <?php foreach($hospitals as $hospital) { ?>
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                    <div class="d-sm-flex align-items-center border bg-white p-3 mb-3 br-7">
                                        <div class="wrapper ml-sm-3  mt-4 mt-sm-0">
                                            <p class="mb-0 mt-1 text-dark font-weight-semibold"><?php echo $hospital->name ?></p>
                                            <small class="text-muted">
                                                <?php
                                                    $entity_type = $this->settings_model->getSettingsByHospitalId($hospital->id)->entity_type_id;
                                                    echo ucfirst($this->settings_model->getEntityTypeById($entity_type)->display_name);
                                                ?>
                                            </small><br>
                                            <?php $branches = $this->branch_model->getBranchByHospitalId($hospital->id); ?>
                                            <?php foreach($branches as $branch) { ?>
                                                <small class="text-muted"><i class="fa fa-map-marker text-info"></i> 
                                                    <?php
                                                        $barangay = $this->location_model->getBarangayById($branch->barangay_id)->name;
                                                        $city = $this->location_model->getCityById($branch->city_id)->name;
                                                        echo $barangay.', '.$city;
                                                    ?>
                                                </small><br>
                                            <?php } ?>
                                            <a href="appointment/bookConsultation?provider_id=<?php echo $hospital->id ?>" class="btn btn-primary btn-pill btn-sm d-xl-inline">Book</a>
                                            <a class="btn btn-white btn-pill btn-sm " data-target="#modaldemo3" data-toggle="modal" href="">Info</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>

                    </div>
                </div><!-- end app-content-->
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

        <!-- <script type="text/javascript">
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
        </script> -->

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