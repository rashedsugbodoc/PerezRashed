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
                                            <?php
                                            if (!empty($medicine->id))
                                                echo lang('edit_medicine');
                                            else
                                                echo lang('add_medicine');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php echo validation_errors(); ?>
                                        <form role="form" id="medicineForm" action="medicine/addNewMedicine" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('medicineForm');">
                                            <!-- <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('generic_name'); ?></label>
                                                        <input type="text" class="form-control" name="generic" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->generic)) {
                                                            echo $medicine->generic;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('category'); ?></label>
                                                        <select class="form-control select2-show-search" name="category" value=''>
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option value="<?php echo $category->category; ?>" <?php
                                                                if (!empty($medicine->category)) {
                                                                    if ($category->category == $medicine->category) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $category->category; ?> </option>
                                                                    <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('brand_name'); ?></label>
                                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->name)) {
                                                            echo $medicine->name;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('form'); ?></label>
                                                        <input type="text" class="form-control" name="form" value="<?php
                                                        if (!empty($medicine->form)) {
                                                            echo $medicine->form;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('uses'); ?></label>
                                                        <input type="text" class="form-control" name="uses" id="exampleInputEmail1" placeholder="" value="<?php
                                                        if (!empty($medicine->uses)) {
                                                            echo $medicine->uses;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('side_effects'); ?></label>
                                                        <input type="text" class="form-control" name="effects" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->effects)) {
                                                            echo $medicine->effects;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('p_price'); ?></label>
                                                        <input type="text" class="form-control" name="price" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->price)) {
                                                            echo $medicine->price;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('s_price'); ?></label>
                                                        <input type="text" class="form-control" name="s_price" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->s_price)) {
                                                            echo $medicine->s_price;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('quantity'); ?></label>
                                                        <input type="text" class="form-control" name="quantity" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->quantity)) {
                                                            echo $medicine->quantity;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company'); ?></label>
                                                        <input type="text" class="form-control" name="company" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->company)) {
                                                            echo $medicine->company;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('store_box'); ?></label>
                                                        <input type="text" class="form-control" name="box" id="exampleInputEmail1" value='<?php
                                                        if (!empty($medicine->box)) {
                                                            echo $medicine->box;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('expiry_date'); ?></label>
                                                        <input type="text" class="form-control fc-datepicker" name="e_date" value='<?php
                                                        if (!empty($medicine->e_date)) {
                                                            echo $medicine->e_date;
                                                        }
                                                        ?>' placeholder="" readonly="">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value='<?php
                                                if (!empty($medicine->id)) {
                                                    echo $medicine->id;
                                                }
                                                ?>'>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('generic_name'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="generic" id="generic" value='<?php
                                                        if (!empty($medicine->generic)) {
                                                            echo $medicine->generic;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('category'); ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="category" id="category" value="" data-placeholder="Choose one" required>
                                                            <option label="Select ....."></option>
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option value="<?php echo $category->category; ?>" <?php
                                                                if (!empty($medicine->category)) {
                                                                    if ($category->category == $medicine->category) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $category->category; ?> </option>
                                                                    <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('brand_name'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="name" id="brand" value='<?php
                                                        if (!empty($medicine->name)) {
                                                            echo $medicine->name;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('form'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="form" id="form" value="<?php
                                                        if (!empty($medicine->form)) {
                                                            echo $medicine->form;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('uses'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="uses" id="uses" value='<?php
                                                        if (!empty($medicine->uses)) {
                                                            echo $medicine->uses;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('side_effects'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="effects" id="side_effects" value='<?php
                                                        if (!empty($medicine->effects)) {
                                                            echo $medicine->effects;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('p_price'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="price" id="p_price" value='<?php
                                                        if (!empty($medicine->price)) {
                                                            echo $medicine->price;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('s_price'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="s_price" id="s_price" value='<?php
                                                        if (!empty($medicine->s_price)) {
                                                            echo $medicine->s_price;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('quantity'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="quantity" id="quantity" value='<?php
                                                        if (!empty($medicine->quantity)) {
                                                            echo $medicine->quantity;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="company" id="company" value='<?php
                                                        if (!empty($medicine->company)) {
                                                            echo $medicine->company;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('store_box'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="box" id="store_box" value='<?php
                                                        if (!empty($medicine->box)) {
                                                            echo $medicine->box;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('expiry_date'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control flatpickr" name="e_date" id="date" value='' placeholder="" readonly="" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value='<?php
                                                    if (!empty($medicine->id)) {
                                                        echo $medicine->id;
                                                    }
                                                ?>'>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?></button>
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

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $('#medicineForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var medicine_id = "<?php echo $medicine?$medicine->id:''; ?>";
            if (medicine_id === "") {
                flatpickr(".flatpickr", {
                    altInput: true,
                    altFormat: "F j, Y",
                    minDate: "today",
                    disableMobile: true
                });
            } else {
                $.ajax({
                    url: 'medicine/editMedicineByJason?id=' + medicine_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var expire = response.expire_date;
                        $('.flatpickr').flatpickr({
                            dateFormat: "F j, Y",
                            defaultDate: expire,
                            altInput: true,
                            altFormat: "F j, Y",
                            disableMobile: true
                        });
                    }
                });
            }
        })
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