<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <style type="text/css">
                            .select2-results__option .wrap:before{
                                font-family:fontAwesome;
                                color:#999;
                                content:"\f096";
                                width:25px;
                                height:25px;
                                padding-right: 10px;
                                
                            }
                            .select2-results__option[aria-selected=true] .wrap:before{
                                content:"\f14a";
                            }

                            /* not required css */

                            .row
                            {
                              padding: 10px;
                            }

                            .select2-multiple, .select2-multiple2
                            {
                              width: 50%
                            }
                        </style>

                        <div class="row mt-5">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                             <?php
                                                if (!empty($service->id))
                                                    echo lang('edit').' '.lang('charge');  
                                                else
                                                    echo lang('add').' '.lang('charge');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" id="paymentCategoryForm" action="finance/addPaymentCategory" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('charge'); ?> <?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('name');
                                                        }
                                                        if (!empty($service->category)) {
                                                            echo $service->category;
                                                        }
                                                        ?>' placeholder="" required>    
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('description'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('description');
                                                        }
                                                        if (!empty($service->description)) {
                                                            echo $service->description;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('price').' '.lang('type'); ?> <span class="text-red">*</span></label>
                                                        <ul class="nav nav-pills nav-pills-circle" id="tabs_2" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link border py-3 px-5 <?php
                                                                if(!empty($service)) {
                                                                    if ($service->type == "fixed") {
                                                                        echo "active";
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                } else {
                                                                    echo "active";
                                                                }
                                                                ?>" id="tab1" data-toggle="tab" href="#tabs_2_1" role="tab" aria-selected="<?php
                                                                if(!empty($service)) {
                                                                    if ($service->type == "fixed") {
                                                                        echo "true";
                                                                    } else {
                                                                        echo "false";
                                                                    }
                                                                } else {
                                                                    echo "true";
                                                                }
                                                                ?>" onclick="fix();">
                                                                    <span class="nav-link-icon d-block"><?php echo lang('fixed_amount') ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link border py-3 px-5 <?php
                                                                if ($service->type == "variable") {
                                                                    echo "active";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>" id="tab2" data-toggle="tab" href="#tabs_2_2" role="tab"  aria-selected="<?php
                                                                if ($service->type == "variable") {
                                                                    echo "true";
                                                                } else {
                                                                    echo "false";
                                                                }
                                                                ?>" onclick="variable();">
                                                                    <span class="nav-link-icon d-block"><?php echo lang('variable_amount') ?></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <input type="hidden" name="price_type" value="<?php
                                                            if (!empty($service->type)) {
                                                                echo $service->type;
                                                            } else {
                                                                echo "fixed";
                                                            }
                                                            ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12" id="c_price">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('price'); ?> (<?php echo $settings->currency; ?>) <span class="text-red">*</span></label>
                                                        <input type="number" class="form-control" name="c_price" id="exampleInputEmail1" oninput="validity.valid||(value='0');" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('c_price');
                                                        }
                                                        if (!empty($service->c_price)) {
                                                            echo $service->c_price;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 hidden">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering'); ?> <?php echo lang('doctors_share'); ?> (%) <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="d_commission" id="exampleInputEmail1" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('d_commission');
                                                        }
                                                        if (!empty($service->d_commission)) {
                                                            echo $service->d_commission;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 hidden">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('staffs_share'); ?> (%)</label>
                                                        <input type="text" class="form-control" name="s_commission" id="exampleInputEmail1" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('s_commission');
                                                        }
                                                        if (!empty($service->staff_commission)) {
                                                            echo $service->staff_commission;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('payer_account'); ?> <span class="text-red">*</span></label>
                                                        <div class="row">
                                                            <select name="company[]" id="company" multiple="multiple">
                                                                <?php foreach($payer_accounts as $payer_account) { ?>
                                                                    <?php if (!empty($service->payer_account_id)) { ?>
                                                                        <?php if ($payer_account['id'] == $service->payer_account_id ) { ?>
                                                                            <option value="<?php echo $payer_account['id']; ?>" selected><?php echo $payer_account['text']; ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $payer_account['id']; ?>"><?php echo $payer_account['text']; ?></option>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $payer_account['id']; ?>"><?php echo $payer_account['text']; ?></option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('category'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="category_id" required>
                                                            <option value=""><?php echo lang('select_category');?></option>
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option value="<?php echo $category->id; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($category->id == set_value('category_id')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($service->category_id)) {
                                                                    if ($category->id == $service->category_id) {
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
                                                        <label class="form-label"><?php echo lang('charge').' '.lang('type'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" id="service_select" name="service_type" required>
                                                            <option value=""><?php echo lang('select_service_type');?></option>
                                                            <option value="<?php echo $service->service_category_group_id; ?>"
                                                                <?php
                                                                    if (!empty($service->service_category_group_id)) {
                                                                        echo 'selected';
                                                                    }
                                                                ?>
                                                                > <?php echo $this->finance_model->getServiceCategoryGroupById($service->service_category_group_id)->display_name; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Applies only to staff</label>
                                                        <select id="staffs" name="staffs" class="form-control">
                                                            <option value="<?php echo $service->applicable_staff_id ?>" <?php
                                                                if (!empty($service->applicable_staff_id)) {
                                                                    echo 'selected';
                                                                }
                                                            ?>>
                                                                <?php echo $this->doctor_model->getDoctorByIonUserId($service->applicable_staff_id)->name.' ('.$this->ion_auth->get_users_groups($service->applicable_staff_id)->row()->name.')'; ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <?php echo $this->ion_auth->get_users_groups($service->applicable_staff_id)->row()->name; ?>
                                                    </div>
                                                </div> -->
                                                <input type="hidden" name="id" value='<?php
                                                if (!empty($service->id)) {
                                                    echo $service->id;
                                                }
                                                ?>'>
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

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2-multicheckboxes.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            // $("#company").select2({
            //     placeholder: '<?php echo lang('select_payer'); ?>',
            //     allowClear: true,
            //     ajax: {
            //         url: 'company/getCompanyWithoutAddNewOption',
            //         type: "post",
            //         dataType: 'json',
            //         delay: 250,
            //         data: function (params) {
            //             return {
            //                 searchTerm: params.term // search term
            //             };
            //         },
            //         processResults: function (response) {
            //             return {
            //                 results: response
            //             };
            //         },
            //         cache: true
            //     }

            // });

            // $('#company').multipleSelect({
            //     placeholder: '<?php echo lang('select_payer'); ?>',
            // });
            
        });
    </script>

    <script type="text/javascript">
        $('#company').multipleSelect({
            name: "Company",
            placeholder: "Company Placeholder",
            selectAll: false,
            // onOpen: function () {
            //     alert('zzzzz');
            // },
        })
    </script>

    <!-- <script type="text/javascript">
        jQuery(function($) {
            $(".select2-original").select2({
                placeholder: "Choose elements",
                width: "100%"
            })
        })
    </script> -->

    <script type="text/javascript">
        function fix() {
            $('#c_price').attr('hidden', false);
            $('#paymentCategoryForm').find('[name=price_type]').val('fixed');
        }

        function variable() {
            $('#c_price').attr('hidden', true);
            $('#paymentCategoryForm').find('[name=c_price]').val('');
            $('#paymentCategoryForm').find('[name=price_type]').val('variable');
        }
    </script>

    <script>
        $('#paymentCategoryForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#service_select").select2({
                placeholder: '<?php echo lang('select_service_type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getServiceCategoryGroupByEntityType',
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

            $("#staffs").select2({
                placeholder: '<?php echo lang('select_service_type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getStaffInfo',
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