<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">My Profile</h4>
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12">

                                <div class="card box-widget widget-user">
                                    <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar" class="rounded-circle" src="<?php echo $profile->img_url; ?>" style="max-height: 200px;"></div>
                                    <div class="card-body text-center">
                                        <div class="pro-user">
                                            <h4 class="pro-user-username text-dark mb-1 font-weight-bold"><?php echo $profile->name;?></h4>
                                            <h6 class="pro-user-desc text-muted"><?php echo ucfirst($group_name);?></h6>
                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                <a href="<?php echo base_url('doctor/editProfile'); ?>" class="btn btn-primary btn-sm mt-3">Edit Profile</a>
                                            <?php } elseif ($this->ion_auth->in_group(array('Patient'))) { ?>
                                                <a href="<?php echo base_url('patient/editProfile'); ?>" class="btn btn-primary btn-sm mt-3">Edit Profile</a>
                                            <?php } elseif ($this->ion_auth->in_group(array('Midwife'))) { ?>
                                                <a href="<?php echo base_url('midwife/editProfile'); ?>" class="btn btn-primary btn-sm mt-3">Edit Profile</a>
                                            <?php } elseif ($this->ion_auth->in_group(array('Nurse'))) { ?>
                                                <a href="<?php echo base_url('nurse/editProfile'); ?>" class="btn btn-primary btn-sm mt-3">Edit Profile</a>
                                            <?php } elseif ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a href="<?php echo base_url('admin/editProfile'); ?>" class="btn btn-primary btn-sm mt-3">Edit Profile</a>
                                            <?php } elseif ($this->ion_auth->in_group(array('Clerk'))) { ?>
                                                <a href="<?php echo base_url('clerk/editProfile'); ?>" class="btn btn-primary btn-sm mt-3">Edit Profile</a>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Personal Details</h4>
                                        
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="py-2 px-0">
                                                            <span class="font-weight-semibold w-50">Name </span>
                                                        </td>
                                                        <td class="py-2 px-0"><?php echo $profile->name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-2 px-0">
                                                            <span class="font-weight-semibold w-50">Address </span>
                                                        </td>

                                                        <td class="py-2 px-0"><?php echo $profile->address.', '; if(!empty($barangay_name)) { echo $barangay_name.', ';} echo $city_name.', '.$state_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-2 px-0">
                                                            <span class="font-weight-semibold w-50">Email </span>
                                                        </td>
                                                        <td class="py-2 px-0"><?php echo $profile->email;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-2 px-0">
                                                            <span class="font-weight-semibold w-50">Phone </span>
                                                        </td>
                                                        <td class="py-2 px-0"><?php echo $profile->phone;?></td>
                                                    </tr>
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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

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