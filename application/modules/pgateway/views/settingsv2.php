<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="row mt-5">
                            <div class="col-md-7 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php
                                            if (!empty($settings->name)) {
                                                echo $settings->name;
                                            }
                                            ?> <?php echo lang('settings'); ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php echo validation_errors(); ?>
                                        <form role="form" action="pgateway/addNewSettings" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('payment_gateway'); ?> <?php echo lang('name'); ?></label>
                                                        <input type="text" class="form-control" name="name" value='<?php
                                                        if (!empty($settings->name)) {
                                                            echo $settings->name;
                                                        }
                                                        ?>' placeholder="" readonly>   
                                                    </div>
                                                </div>
                                            <?php if ($settings->name == "Pay U Money") { ?>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('merchant_key'); ?></label>
                                                        <input type="text" class="form-control" name="merchant_key" value="<?php
                                                        if (!empty($settings->merchant_key)) {
                                                            echo $settings->merchant_key;
                                                        }
                                                        ?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('salt'); ?></label>
                                                        <input type="text" class="form-control" name="salt" value='<?php
                                                        if (!empty($settings->salt)) {
                                                            echo $settings->salt;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('secretkey'); ?></label>
                                                        <input type="text" class="form-control" name="secret" value="<?php
                                                        if (!empty($settings->secret)) {
                                                            echo $settings->secret;
                                                        }
                                                        ?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('public_key'); ?></label>
                                                        <input type="text" class="form-control" name="public_key" value='<?php
                                                        if (!empty($settings->public_key)) {
                                                            echo $settings->public_key;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($settings->name == "PayPal") { ?>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('api_username'); ?></label>
                                                        <input type="text" class="form-control" name="APIUsername" value="<?php
                                                        if (!empty($settings->APIUsername)) {
                                                            echo $settings->APIUsername;
                                                        }
                                                        ?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('api_password'); ?></label>
                                                        <input type="text" class="form-control" name="APIPassword" value='<?php
                                                        if (!empty($settings->APIPassword)) {
                                                            echo $settings->APIPassword;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('api_signature'); ?></label>
                                                        <input type="text" class="form-control" name="APISignature" value='<?php
                                                        if (!empty($settings->APISignature)) {
                                                            echo $settings->APISignature;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($settings->name == "Stripe") { ?>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('secretkey'); ?></label>
                                                        <input type="text" class="form-control" name="secret" value='<?php
                                                        if (!empty($settings->secret)) {
                                                            echo $settings->secret;
                                                        }
                                                        ?>' placeholder="" <?php
                                                        if (!$this->ion_auth->in_group('admin')) {
                                                            echo 'disabled';
                                                        }
                                                        ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('publishkey'); ?></label>
                                                        <input type="text" class="form-control" name="publish" value='<?php
                                                        if (!empty($settings->publish)) {
                                                            echo $settings->publish;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($settings->name == "Paymongo") { ?>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('public_key'); ?></label>
                                                        <input type="text" class="form-control" name="public_key" value='<?php
                                                        if (!empty($settings->public_key)) {
                                                            echo $settings->public_key;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('secretkey'); ?></label>
                                                        <input type="text" class="form-control" name="secret" value="<?php
                                                        if (!empty($settings->secret)) {
                                                            echo $settings->secret;
                                                        }
                                                        ?>" placeholder="">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('status'); ?></label>
                                                        <select class="form-control select2-show-search" name="status" value=''>
                                                            <option value="live" <?php
                                                            if (!empty($settings->status)) {
                                                                if ($settings->status == 'live') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('live'); ?> </option>
                                                            <option value="test" <?php
                                                            if (!empty($settings->status)) {
                                                                if ($settings->status == 'test') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('test'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value='<?php
                                                if (!empty($settings->id)) {
                                                    echo $settings->id;
                                                }
                                                ?>'>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
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

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>

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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    </body>
</html> 