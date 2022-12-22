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
                                                if (!empty($service[0]->id)) {
                                                    echo lang('edit').' '.lang('charge');  
                                                } else {
                                                    echo lang('add').' '.lang('charge');
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php echo validation_errors(); ?>
                                        <form role="form" name="paymentCategoryForm" id="paymentCategoryForm" action="" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('charge'); ?> <?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('name');
                                                        }
                                                        if (!empty($service[0]->category)) {
                                                            echo $service[0]->category;
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
                                                        if (!empty($service[0]->description)) {
                                                            echo $service[0]->description;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('price').' '.lang('type'); ?> <span class="text-red">*</span></label>
                                                        <ul class="nav nav-pills nav-pills-circle" id="tabs_2" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link border py-3 px-5 <?php
                                                                if(!empty($service)) {
                                                                    if ($service[0]->type == "fixed") {
                                                                        echo "active";
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                } else {
                                                                    echo "active";
                                                                }
                                                                ?>" id="tab1" data-toggle="tab" href="#tabs_2_1" role="tab" aria-selected="<?php
                                                                if(!empty($service)) {
                                                                    if ($service[0]->type == "fixed") {
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
                                                                if ($service[0]->type == "variable") {
                                                                    echo "active";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>" id="tab2" data-toggle="tab" href="#tabs_2_2" role="tab"  aria-selected="<?php
                                                                if ($service[0]->type == "variable") {
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
                                                            if (!empty($service[0]->type)) {
                                                                echo $service[0]->type;
                                                            } else {
                                                                echo "fixed";
                                                            }
                                                            ?>">
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-md-12 col-sm-12" id="c_price" <?php
                                                    if ($service[0]->type == "variable") {
                                                        echo "hidden";
                                                    } else {
                                                        echo "";
                                                    }
                                                ?>>
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('price'); ?> (<?php echo $settings->currency; ?>) <span class="text-red">*</span></label>
                                                        <input type="number" class="form-control" name="c_price" id="exampleInputEmail1" oninput="validity.valid||(value='0');" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('c_price');
                                                        }
                                                        if (!empty($service[0]->c_price)) {
                                                            echo $service[0]->c_price;
                                                        }
                                                        ?>' placeholder="" required>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-12 col-sm-12 hidden">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering'); ?> <?php echo lang('doctors_share'); ?> (%) <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="d_commission" id="exampleInputEmail1" value='<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('d_commission');
                                                        }
                                                        if (!empty($service[0]->d_commission)) {
                                                            echo $service[0]->d_commission;
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
                                                        if (!empty($service[0]->staff_commission)) {
                                                            echo $service[0]->staff_commission;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('tax'); ?></label>
                                                        <select id="tax" name="tax" class="form-control w-25" data-placeholder="<?php echo lang('select_tax'); ?>">
                                                            <option label="<?php echo lang('select_tax'); ?>"></option>
                                                            <option value="0">None</option>
                                                            <?php foreach($taxes as $tax) { ?>
                                                                <option value="<?php echo $tax->id ?>"
                                                                    <?php if($tax->id == $service[0]->tax_id) { echo 'selected'; } else { ''; } ?>
                                                                ><?php echo $tax->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 tax-choice" <?php echo $service?'':'hidden'; ?>>
                                                    <div class="form-group">
                                                        <ul class="nav nav-pills nav-pills-circle" id="tabs_3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link border py-3 px-5 <?php
                                                                    if ($service[0]->price_includes_tax == '1') {
                                                                        echo 'active';
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                ?>" id="tab3" data-toggle="tab" href="#tabs_3_1" role="tab" aria-selected="<?php
                                                                    if ($service[0]->price_includes_tax == '1') {
                                                                        echo 'true';
                                                                    } else {
                                                                        echo 'false';
                                                                    }
                                                                ?>" onclick="include();">
                                                                    <span class="nav-link-icon d-block"><?php echo lang('price_includes_tax') ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link border py-3 px-5 <?php
                                                                    if ($service[0]->price_includes_tax == '0') {
                                                                        echo 'active';
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                ?>" id="tab4" data-toggle="tab" href="#tabs_3_2" role="tab"  aria-selected="<?php
                                                                    if ($service[0]->price_includes_tax == '0') {
                                                                        echo 'true';
                                                                    } else {
                                                                        echo 'false';
                                                                    }
                                                                ?>" onclick="exclude();">
                                                                    <span class="nav-link-icon d-block"><?php echo lang('price_excludes_tax') ?></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <input type="hidden" name="is_taxable" value="<?php
                                                        if (!empty($service[0])) {
                                                            echo $service[0]->price_includes_tax;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div> -->
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="custom-controls-stacked">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="charge_copayer" value="yes" checked>
                                                                <span class="custom-control-label">Check if selected payer accounts are copayers of this charge</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('payer_account'); ?> <span class="text-red">*</span></label>
                                                        <div class="row">
                                                            <select name="company[]" id="company" placeholder="Sample Placeholder" multiple="multiple">
                                                                <!-- <?php foreach($payer_accounts as $payer_account) { ?>
                                                                    <?php if (!empty($service->payer_account_id)) { ?>
                                                                        <?php if ($payer_account['id'] == $service->payer_account_id ) { ?>
                                                                            <option value="<?php echo $payer_account['id']; ?>" selected><?php echo $payer_account['text']; ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $payer_account['id']; ?>"><?php echo $payer_account['text']; ?></option>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $payer_account['id']; ?>" data-text="<?php echo $payer_account['text']; ?>"><?php echo $payer_account['text']; ?></option>
                                                                    <?php } ?>
                                                                <?php } ?> -->
                                                                <?php $my_payer_account = $service; ?>
                                                                <?php foreach($payer_accounts as $payer_account) { ?>
                                                                    <?php if (!empty($service)) { ?>
                                                                        <option value="<?php echo $payer_account['id']; ?>" data-text="<?php echo $payer_account['text']; ?>"
                                                                            <?php
                                                                                foreach($service as $serv) {
                                                                                    if ($serv->payer_account_id == $payer_account['id']) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                            ?>
                                                                            ><?php echo $payer_account['text']; ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $payer_account['id']; ?>" data-text="<?php echo $payer_account['text']; ?>"><?php echo $payer_account['text']; ?></option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="table-responsive">
                                                        <table class="table nowrap text-nowrap border mt-5">
                                                            <thead class="hidden">
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="payer_fixed_percentage_section">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="row" id="payer_fixed_percentage_section_two">
                                                        
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
                                                                if (!empty($service[0]->category_id)) {
                                                                    if ($category->id == $service[0]->category_id) {
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
                                                            <option value="<?php echo $service[0]->service_category_group_id; ?>"
                                                                <?php
                                                                    if (!empty($service[0]->service_category_group_id)) {
                                                                        echo 'selected';
                                                                    }
                                                                ?>
                                                                > <?php echo $this->finance_model->getServiceCategoryGroupById($service[0]->service_category_group_id)->display_name; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Applies only to staff</label>
                                                        <select id="staffs" name="staffs" class="form-control">
                                                            <option value="<?php echo $service[0]->applicable_staff_id ?>" <?php
                                                                if (!empty($service[0]->applicable_staff_id)) {
                                                                    echo 'selected';
                                                                }
                                                            ?>>
                                                                <?php echo $this->doctor_model->getDoctorByIonUserId($service[0]->applicable_staff_id)->name.' ('.$this->ion_auth->get_users_groups($service[0]->applicable_staff_id)->row()->name.')'; ?>
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
                                                if (!empty($service[0]->id)) {
                                                    echo $service[0]->id;
                                                }
                                                ?>'>
                                                <input type="hidden" name="deleted_company" id="deleted_company">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <?php if (!empty($service[0]->id)) { ?>
                                                            <a href="finance/editPaymentCategory?id=<?php echo $service[0]->id; ?>" class="btn btn-outline-light"><?php echo lang('cancel').' '.lang('changes'); ?></a>
                                                        <?php } ?>
                                                        <button class="btn btn-primary pull-right" type="button" id="submitbtn" name="submit"><?php echo lang('submit'); ?></button>
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
        $(document).ready(function() {
            var setval = '<?php echo $setval ?>';
            var group = '<?php echo $service[0]->group_id; ?>';
            if (setval !== "") {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/company/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            } else {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/company/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            }

            if (group != "") {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/company/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            } else {
                var n = sessionStorage.length;
                while(n--) {
                  var key = sessionStorage.key(n);
                  if(/company/.test(key)) {
                    sessionStorage.removeItem(key);
                  }  
                }
            }
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var group = '<?php echo $service[0]->group_id; ?>';
            if (group != "") {
                $.ajax({
                    url: 'finance/editPaymentCategoryByJson?group='+group,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var company = response.company;
                        var service = response.service;
                        var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
                        var tax = response.tax;

                        // console.log(tax);

                        $.each(company, function (key, value) {
                            var service_tax_id = service[key].tax_id;
                            if (service_tax_id == null) {
                                service_tax_id = 0;
                            }
                            window.sessionStorage.setItem('company'+value.id, value.id);
                            if (service[key].copay_share_fixed == null) {
                                var copay_share = service[key].copay_share_percentage;
                                var copay_share_limit = 'percentage';
                                $('#co_payer_payment_limit'+value.id).val('percentage');
                                $('#selected_payer_price_content'+value.id).remove();
                                var payer_price = '<div class="input-group" id="selected_payer_price_content_two'+value.id+'">\n\
                                        <input type="text" class="form-control percentage_limit_input" id="co_payer_limit_amount'+value.id+'" name="co_payer_limit_amount[]" placeholder="Enter Percentage Amount" value="'+copay_share+'" onfocusout="percentage_remain();">\n\
                                        <span class="input-group-append">\n\
                                            <span class="btn btn-primary" type="button">%</span>\n\
                                        </span>\n\
                                    </div>';
                                var fixed_limit_active = '';
                                var percentage_limit_active = 'active';
                            } else {
                                var copay_share = service[key].copay_share_fixed;
                                var copay_share_limit = 'fixed';
                                $('#co_payer_payment_limit'+value.id).val('fixed');
                                $('#selected_payer_price_content'+value.id).remove();
                                var payer_price = '<div class="input-group" id="selected_payer_price_content_two'+value.id+'">\n\
                                        <span class="input-group-append">\n\
                                            <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                                        </span>\n\
                                        <input type="text" class="form-control" id="co_payer_limit_amount'+value.id+'" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount" value="'+copay_share+'">\n\
                                    </div>';
                                var fixed_limit_active = 'active';
                                var percentage_limit_active = '';
                            }

                            if (service[key].is_price_includes_tax == 1) {
                                var c_price = service[key].c_price;
                            } else if (service[key].is_price_includes_tax == 0) {
                                var c_price = service[key].c_price-service[key].tax_amount;
                            }

                            if (service[key].type == "fixed") {
                                var price_type_fixed = "active";
                                var price_type_fixed_ariaselected = "true";
                                var price_type_percentage_ariaselected = "false";
                                var price_type_percentage = "";
                                var price_input = '<div class="col-md-12 col-sm-12" id="c_price'+value.id+'">\n\
                                                    <div class="form-group">\n\
                                                        <label class="form-label"><?php echo lang('price'); ?> ('+currency+') <span class="text-red">*</span></label>\n\
                                                        <input type="number" class="form-control" id="c_price_input'+value.id+'" name="c_price[]" id="c_price_input'+value.id+'" oninput="validity.valid||(value='+"''"+');" value="'+c_price+'" placeholder="" required>\n\
                                                    </div>\n\
                                                </div>';
                                var price_limit = 'hidden';

                            } else {
                                var price_type_fixed = "";
                                var price_type_percentage = "active";
                                var price_type_percentage_ariaselected = "true";
                                var price_type_fixed_ariaselected = "false";
                                var price_input = '<div class="col-md-12 col-sm-12" id="c_price'+value.id+'" hidden>\n\
                                                    <div class="form-group">\n\
                                                        <label class="form-label"><?php echo lang('price'); ?> ('+currency+') <span class="text-red">*</span></label>\n\
                                                        <input type="number" class="form-control" id="c_price_input'+value.id+'" name="c_price[]" id="c_price_input'+value.id+'" oninput="validity.valid||(value='+"''"+');" value="" placeholder="">\n\
                                                    </div>\n\
                                                </div>';
                                var price_limit = '';
                            }

                            if (tax[key]) {
                                var is_taxable = "";
                            } else {
                                var is_taxable = "hidden";
                            }

                            if (service[key].is_price_includes_tax == 1) {
                                var include_tax = "active";
                                var exclude_tax = "";
                            } else if (service[key].is_price_includes_tax == 0) {
                                var exclude_tax = "active";
                                var include_tax = "";
                            }

                            $("#payer_fixed_percentage_section_two").append(
                                '<div class="col-md-6 col-sm-6" id="payer_detail_section'+value.id+'" data-id="'+value.id+'">\n\
                                    <div class="expanel expanel-default">\n\
                                        <div class="expanel-heading">\n\
                                            <div class="expanel-title">\n\
                                                '+value.display_name+'\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="expanel-body">\n\
                                            <div>\n\
                                                <div class="col-md-12 col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <label class="form-label"><?php echo lang('price').' '.lang('type'); ?> <span class="text-red">*</span></label>\n\
                                                        <ul class="nav nav-pills nav-pills-circle" id="tabs_2'+value.id+'" role="tablist">\n\
                                                            <li class="nav-item">\n\
                                                                <a class="nav-link border py-3 px-5 fixed_amount '+price_type_fixed+'" id="tab1'+value.id+'" data-toggle="tab" href="#tabs_2_1" role="tab" aria-selected="'+price_type_fixed_ariaselected+'" onclick="switchPriceTypeToFixedAmount('+value.id+');">\n\
                                                                    <span class="nav-link-icon d-block"><?php echo lang('fixed_amount') ?></span>\n\
                                                                </a>\n\
                                                            </li>\n\
                                                            <li class="nav-item">\n\
                                                                <a class="nav-link border py-3 px-5 variable_amount '+price_type_percentage+'" id="tab2'+value.id+'" data-toggle="tab" href="#tabs_2_2" role="tab"  aria-selected="'+price_type_percentage_ariaselected+'" onclick="switchPriceTypeToVariableAmount('+value.id+');">\n\
                                                                    <span class="nav-link-icon d-block"><?php echo lang('variable_amount') ?></span>\n\
                                                                </a>\n\
                                                            </li>\n\
                                                        </ul>\n\
                                                        <input type="hidden" name="price_type[]" id="price_type'+value.id+'" value="'+service[key].type+'">\n\
                                                    </div>\n\
                                                </div>\n\
                                                    '+price_input+'\n\
                                                <div class="col-md-12 col-sm-12">\n\
                                                    <div class="form-group">\n\
                                                        <label class="form-label"><?php echo lang('tax'); ?></label>\n\
                                                        <select id="tax'+value.id+'" name="tax[]" class="form-control w-25 tax'+value.id+'" data-placeholder="<?php echo lang('select_tax'); ?>">\n\
                                                            <option label="<?php echo lang('select_tax'); ?>"></option>\n\
                                                            <option value="0">None</option>\n\
                                                            <option value="'+service_tax_id+'" selected>'+tax[key].name+'</option>\n\
                                                        </select>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="col-md-12 col-sm-12 tax-choice'+value.id+'" '+is_taxable+'>\n\
                                                    <div class="form-group">\n\
                                                        <ul class="nav nav-pills nav-pills-circle" id="tabs_3'+value.id+'" role="tablist">\n\
                                                            <li class="nav-item">\n\
                                                                <a class="nav-link border py-3 px-5 '+include_tax+'" id="tab3'+value.id+'" data-toggle="tab" href="#tabs_3_1" role="tab" aria-selected="true" onclick="setTaxInclude('+value.id+');">\n\
                                                                    <span class="nav-link-icon d-block"><?php echo lang('price_includes_tax') ?></span>\n\
                                                                </a>\n\
                                                            </li>\n\
                                                            <li class="nav-item">\n\
                                                                <a class="nav-link border py-3 px-5 '+exclude_tax+'" id="tab4'+value.id+'" data-toggle="tab" href="#tabs_3_2" role="tab"  aria-selected="false" onclick="setTaxExclude('+value.id+');">\n\
                                                                    <span class="nav-link-icon d-block"><?php echo lang('price_excludes_tax') ?></span>\n\
                                                                </a>\n\
                                                            </li>\n\
                                                        </ul>\n\
                                                        <input type="hidden" id="is_taxable'+value.id+'" name="is_taxable[]" value="'+service[key].is_price_includes_tax+'">\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div id="limits_'+value.id+'" '+price_limit+'>\n\
                                                    <div class="row">\n\
                                                        <div class="col-sm-12 col-sm-12">\n\
                                                            <div class="form-group">\n\
                                                            <ul class="nav nav-pills nav-pills-circle" id="tabs_6" role="tablist">\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 '+fixed_limit_active+' fixed_limit" id="tab6" data-toggle="tab" href="#tabs_6_1" role="tab" aria-selected="true" onclick="switchLimitTofixedLimit('+value.id+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('fixed_limit') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 '+percentage_limit_active+' percentage_limit" id="tab7" data-toggle="tab" href="#tabs_6_2" role="tab"  aria-selected="false" onclick="switchLimitToPercentageLimit('+value.id+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('percentage_limit') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                            </ul>\n\
                                                            </div>\n\
                                                            <input type="hidden" name="co_payer_payment_limit_type[]" id="co_payer_payment_limit'+value.id+'" value="fixed">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="row">\n\
                                                        <div class="col-md-6 col-sm-6">\n\
                                                            <div class="form-group" id="selected_payer_price_div_two'+value.id+'">\n\
                                                                '+payer_price+'\n\
                                                            </div>\n\
                                                        </div>\n\
                                                        <div class="col-md-6 col-sm-6">\n\
                                                            <div class="form-group">\n\
                                                                <span class="remaining_limit"></span>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>');
                            tax_select2(value.id);
                        });

                        percentage_remain()
                    }
                });
            }
        })
    </script>

    <script type="text/javascript">
        function tax_select2(value) {
            $(".tax"+value).select2({
                placeholder: '<?php echo lang('select_tax'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getTaxByApplicableCountryId',
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
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".custom-control-input").click(function() {
                var value = $(this).val();
                var is_company_selected = $("#company_selected"+value);
                var group = '<?php echo $service[0]->group_id; ?>';
                var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
                var company = $('#company').val();

                if (group == "") {
                    $.ajax({
                        url: 'company/getCompanyByIdByJason?id='+value,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var count_selected = $('#payer_fixed_percentage_section').find('[class="company_selected'+value+'"]').length;
                            var selected = $('.ms-drop li.selected label input').val();

                            if (window.sessionStorage.getItem('company'+value)) {
                                $("#payer_detail_section"+value).remove();
                                $("#company_selected"+value).remove();
                                window.sessionStorage.removeItem('company'+value, value);
                            } else {
                                window.sessionStorage.setItem('company'+value, value);

                                $("#payer_fixed_percentage_section_two").append(
                                    '<div class="col-md-6 col-sm-6" id="payer_detail_section'+value+'" data-id="'+value+'">\n\
                                        <div class="expanel expanel-default">\n\
                                            <div class="expanel-heading">\n\
                                                <div class="expanel-title">\n\
                                                    '+response.company.display_name+'\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="expanel-body">\n\
                                                <div>\n\
                                                    <div class="col-md-12 col-sm-12">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('price').' '.lang('type'); ?> <span class="text-red">*</span></label>\n\
                                                            <ul class="nav nav-pills nav-pills-circle" id="tabs_2'+value+'" role="tablist">\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 fixed_amount active" id="tab1'+value+'" data-toggle="tab" href="#tabs_2_1" role="tab" aria-selected="true" onclick="switchPriceTypeToFixedAmount('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('fixed_amount') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 variable_amount" id="tab2'+value+'" data-toggle="tab" href="#tabs_2_2" role="tab"  aria-selected="false" onclick="switchPriceTypeToVariableAmount('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('variable_amount') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                            </ul>\n\
                                                            <input type="hidden" name="price_type[]" id="price_type'+value+'" value="fixed">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-md-12 col-sm-12" id="c_price'+value+'">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('price'); ?> ('+currency+') <span class="text-red">*</span></label>\n\
                                                            <input type="number" class="form-control" name="c_price[]" id="c_price_input'+value+'" oninput="validity.valid||(value='+"''"+');" step=".01" value="" placeholder="" required>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-md-12 col-sm-12">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('tax'); ?></label>\n\
                                                            <select id="tax'+value+'" name="tax[]" class="form-control w-25 tax'+value+'" data-placeholder="<?php echo lang('select_tax'); ?>">\n\
                                                                <option label="<?php echo lang('select_tax'); ?>"></option>\n\
                                                                <option value="0">None</option>\n\
                                                            </select>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-md-12 col-sm-12 tax-choice'+value+'" hidden>\n\
                                                        <div class="form-group">\n\
                                                            <ul class="nav nav-pills nav-pills-circle" id="tabs_3'+value+'" role="tablist">\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 active" id="tab3'+value+'" data-toggle="tab" href="#tabs_3_1" role="tab" aria-selected="true" onclick="setTaxInclude('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('price_includes_tax') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5" id="tab4'+value+'" data-toggle="tab" href="#tabs_3_2" role="tab"  aria-selected="false" onclick="setTaxExclude('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('price_excludes_tax') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                            </ul>\n\
                                                            <input type="hidden" id="is_taxable'+value+'" name="is_taxable[]" value="1">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div id="limits_'+value+'" hidden>\n\
                                                        <div class="row">\n\
                                                            <div class="col-sm-12 col-sm-12">\n\
                                                                <div class="form-group">\n\
                                                                <ul class="nav nav-pills nav-pills-circle" id="tabs_6" role="tablist">\n\
                                                                    <li class="nav-item">\n\
                                                                        <a class="nav-link border py-3 px-5 active fixed_limit" id="tab6" data-toggle="tab" href="#tabs_6_1" role="tab" aria-selected="true" onclick="switchLimitTofixedLimit('+value+');">\n\
                                                                            <span class="nav-link-icon d-block"><?php echo lang('fixed_limit') ?></span>\n\
                                                                        </a>\n\
                                                                    </li>\n\
                                                                    <li class="nav-item">\n\
                                                                        <a class="nav-link border py-3 px-5 percentage_limit" id="tab7" data-toggle="tab" href="#tabs_6_2" role="tab"  aria-selected="false" onclick="switchLimitToPercentageLimit('+value+');">\n\
                                                                            <span class="nav-link-icon d-block"><?php echo lang('percentage_limit') ?></span>\n\
                                                                        </a>\n\
                                                                    </li>\n\
                                                                </ul>\n\
                                                                </div>\n\
                                                                <input type="hidden" name="co_payer_payment_limit_type[]" id="co_payer_payment_limit'+value+'" value="fixed">\n\
                                                            </div>\n\
                                                        </div>\n\
                                                        <div class="row">\n\
                                                            <div class="col-md-6 col-sm-6">\n\
                                                                <div class="form-group" id="selected_payer_price_div_two'+value+'">\n\
                                                                    <div class="input-group" id="selected_payer_price_content_two'+value+'">\n\
                                                                        <span class="input-group-append">\n\
                                                                            <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                                                                        </span>\n\
                                                                        <input type="text" class="form-control" id="co_payer_limit_amount'+value+'" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount">\n\
                                                                    </div>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                            <div class="col-md-6 col-sm-6">\n\
                                                                <div class="form-group">\n\
                                                                    <span class="remaining_limit"></span>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>');

                                $(".tax"+value).select2({
                                    placeholder: '<?php echo lang('select_tax'); ?>',
                                    allowClear: true,
                                    ajax: {
                                        url: 'finance/getTaxByApplicableCountryId',
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

                                $("#tax"+value).change(function() {
                                    // alert($(this).val());
                                    var tax = $(this).val();
                                    if (tax === "0") {
                                        $(".tax-choice"+value).attr('hidden', true);
                                        $("#tab3"+value).removeClass('active');
                                        $("#tab3"+value).attr('aria-selected', false);
                                        $("#tab4"+value).removeClass('active');
                                        $("#tab4"+value).attr('aria-selected', false);
                                    } else {
                                        $(".tax-choice"+value).attr('hidden', false);
                                    }
                                })

                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: 'company/getCompanyByIdByJason?id='+value+'&group='+group,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var count_selected = $('#payer_fixed_percentage_section').find('[class="company_selected'+value+'"]').length;
                            var selected = $('.ms-drop li.selected label input').val();
                            var service = response.service;
                            if (service == null) {
                                if (window.sessionStorage.getItem('company'+value)) {
                                    $("#payer_detail_section"+value).remove();
                                    $("#company_selected"+value).remove();
                                    window.sessionStorage.removeItem('company'+value, value);
                                } else {
                                    window.sessionStorage.setItem('company'+value, value);

                                    $("#payer_fixed_percentage_section_two").append(
                                    '<div class="col-md-6 col-sm-6" id="payer_detail_section'+value+'" data-id="'+value+'">\n\
                                        <div class="expanel expanel-default">\n\
                                            <div class="expanel-heading">\n\
                                                <div class="expanel-title">\n\
                                                    '+response.company.display_name+'\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="expanel-body">\n\
                                                <div>\n\
                                                    <div class="col-md-12 col-sm-12">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('price').' '.lang('type'); ?> <span class="text-red">*</span></label>\n\
                                                            <ul class="nav nav-pills nav-pills-circle" id="tabs_2'+value+'" role="tablist">\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 fixed_amount active" id="tab1'+value+'" data-toggle="tab" href="#tabs_2_1" role="tab" aria-selected="true" onclick="switchPriceTypeToFixedAmount('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('fixed_amount') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 variable_amount" id="tab2'+value+'" data-toggle="tab" href="#tabs_2_2" role="tab"  aria-selected="false" onclick="switchPriceTypeToVariableAmount('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('variable_amount') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                            </ul>\n\
                                                            <input type="hidden" name="price_type[]" id="price_type'+value+'" value="fixed">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-md-12 col-sm-12" id="c_price'+value+'">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('price'); ?> ('+currency+') <span class="text-red">*</span></label>\n\
                                                            <input type="number" class="form-control" name="c_price[]" id="c_price_input'+value+'" oninput="validity.valid||(value='+"'0'"+');" value="" placeholder="" required>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-md-12 col-sm-12">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('tax'); ?></label>\n\
                                                            <select id="tax'+value+'" name="tax[]" class="form-control w-25 tax'+value+'" data-placeholder="<?php echo lang('select_tax'); ?>">\n\
                                                                <option label="<?php echo lang('select_tax'); ?>"></option>\n\
                                                                <option value="0">None</option>\n\
                                                            </select>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-md-12 col-sm-12 tax-choice'+value+'" hidden>\n\
                                                        <div class="form-group">\n\
                                                            <ul class="nav nav-pills nav-pills-circle" id="tabs_3'+value+'" role="tablist">\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 active" id="tab3'+value+'" data-toggle="tab" href="#tabs_3_1" role="tab" aria-selected="true" onclick="setTaxInclude('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('price_includes_tax') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5" id="tab4'+value+'" data-toggle="tab" href="#tabs_3_2" role="tab"  aria-selected="false" onclick="setTaxExclude('+value+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('price_excludes_tax') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                            </ul>\n\
                                                            <input type="hidden" id="is_taxable'+value+'" name="is_taxable[]" value="1">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div id="limits_'+value+'" hidden>\n\
                                                        <div class="row">\n\
                                                            <div class="col-sm-12 col-sm-12">\n\
                                                                <div class="form-group">\n\
                                                                <ul class="nav nav-pills nav-pills-circle" id="tabs_6" role="tablist">\n\
                                                                    <li class="nav-item">\n\
                                                                        <a class="nav-link border py-3 px-5 active fixed_limit" id="tab6" data-toggle="tab" href="#tabs_6_1" role="tab" aria-selected="true" onclick="switchLimitTofixedLimit('+value+');">\n\
                                                                            <span class="nav-link-icon d-block"><?php echo lang('fixed_limit') ?></span>\n\
                                                                        </a>\n\
                                                                    </li>\n\
                                                                    <li class="nav-item">\n\
                                                                        <a class="nav-link border py-3 px-5 percentage_limit" id="tab7" data-toggle="tab" href="#tabs_6_2" role="tab"  aria-selected="false" onclick="switchLimitToPercentageLimit('+value+');">\n\
                                                                            <span class="nav-link-icon d-block"><?php echo lang('percentage_limit') ?></span>\n\
                                                                        </a>\n\
                                                                    </li>\n\
                                                                </ul>\n\
                                                                </div>\n\
                                                                <input type="hidden" name="co_payer_payment_limit_type[]" id="co_payer_payment_limit'+value+'" value="fixed">\n\
                                                            </div>\n\
                                                        </div>\n\
                                                        <div class="row">\n\
                                                            <div class="col-md-6 col-sm-6">\n\
                                                                <div class="form-group" id="selected_payer_price_div_two'+value+'">\n\
                                                                    <div class="input-group" id="selected_payer_price_content_two'+value+'">\n\
                                                                        <span class="input-group-append">\n\
                                                                            <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                                                                        </span>\n\
                                                                        <input type="text" class="form-control" id="co_payer_limit_amount'+value+'" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount">\n\
                                                                    </div>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                            <div class="col-md-6 col-sm-6">\n\
                                                                <span class="remaining_limit"></span>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>');

                                    $(".tax"+value).select2({
                                        placeholder: '<?php echo lang('select_tax'); ?>',
                                        allowClear: true,
                                        ajax: {
                                            url: 'finance/getTaxByApplicableCountryId',
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

                                    $("#tax"+value).change(function() {
                                        // alert($(this).val());
                                        var tax = $(this).val();
                                        if (tax === "0") {
                                            $(".tax-choice"+value).attr('hidden', true);
                                            $("#tab3"+value).removeClass('active');
                                            $("#tab3"+value).attr('aria-selected', false);
                                            $("#tab4"+value).removeClass('active');
                                            $("#tab4"+value).attr('aria-selected', false);
                                        } else {
                                            $(".tax-choice"+value).attr('hidden', false);
                                        }
                                    })

                                }
                            } else {
                                if (window.sessionStorage.getItem('company'+value)) {
                                    $("#payer_detail_section"+value).remove();
                                    var selected_payer = window.sessionStorage.getItem('deleted_company');

                                    if (selected_payer !== null) {
                                        var new_selected_payer = selected_payer+','+value;  
                                    } else {
                                        var new_selected_payer = value;
                                    }

                                    window.sessionStorage.setItem('deleted_company', new_selected_payer);

                                    $("#deleted_company").val(window.sessionStorage.getItem('deleted_company'));

                                    $("#company_selected"+service.payer_account_id).remove();
                                    window.sessionStorage.removeItem('company'+service.payer_account_id, service.payer_account_id);
                                } else {
                                    window.sessionStorage.setItem('company'+service.payer_account_id, service.payer_account_id);

                                    if (service.copay_share_fixed == null) {
                                        var copay_share = service.copay_share_percentage;
                                        var copay_share_limit = 'percentage';
                                        $('#co_payer_payment_limit'+response.company.id).val('percentage');
                                        $('#selected_payer_price_content'+response.company.id).remove();
                                        var payer_price = '<div class="input-group" id="selected_payer_price_content'+response.company.id+'">\n\
                                                <input type="text" class="form-control percentage_limit_input" id="co_payer_limit_amount'+response.company.id+'" name="co_payer_limit_amount[]" placeholder="Enter Percentage Amount" value="'+copay_share+'">\n\
                                                <span class="input-group-append">\n\
                                                    <span class="btn btn-primary" type="button">%</span>\n\
                                                </span>\n\
                                            </div>';
                                        var fixed_limit_active = '';
                                        var percentage_limit_active = 'active';
                                    } else {
                                        var copay_share = service.copay_share_fixed;
                                        $('#co_payer_payment_limit'+response.company.id).val('fixed');
                                        var copay_share_limit = 'fixed';
                                        $('#selected_payer_price_content'+response.company.id).remove();
                                        var payer_price = '<div class="input-group" id="selected_payer_price_content'+response.company.id+'">\n\
                                                <span class="input-group-append">\n\
                                                    <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                                                </span>\n\
                                                <input type="text" class="form-control" id="co_payer_limit_amount'+response.company.id+'" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount" value="'+copay_share+'">\n\
                                            </div>';
                                        var fixed_limit_active = 'active';
                                        var percentage_limit_active = '';
                                    }

                                    if (service.type == "fixed") {
                                        var price_type_fixed = "active";
                                        var price_type_fixed_ariaselected = "true";
                                        var price_type_percentage_ariaselected = "false";
                                        var price_type_percentage = "";
                                        var price_input = '<div class="col-md-12 col-sm-12" id="c_price'+response.company.id+'">\n\
                                                            <div class="form-group">\n\
                                                                <label class="form-label"><?php echo lang('price'); ?> ('+currency+') <span class="text-red">*</span></label>\n\
                                                                <input type="number" class="form-control" id="c_price_input'+response.company.id+'" name="c_price[]" id="c_price_input'+response.company.id+'" oninput="validity.valid||(value='+"'0'"+');" value="'+service.c_price+'" placeholder="" required>\n\
                                                            </div>\n\
                                                        </div>';
                                    } else {
                                        var price_type_fixed = "";
                                        var price_type_percentage = "active";
                                        var price_type_percentage_ariaselected = "true";
                                        var price_type_fixed_ariaselected = "false";
                                        var price_input = '<div class="col-md-12 col-sm-12" id="c_price'+response.company.id+'" hidden>\n\
                                                            <div class="form-group">\n\
                                                                <label class="form-label"><?php echo lang('price'); ?> ('+currency+') <span class="text-red">*</span></label>\n\
                                                                <input type="number" class="form-control" id="c_price_input'+response.company.id+'" name="c_price[]" id="c_price_input'+response.company.id+'" oninput="validity.valid||(value='+"'0'"+');" value="" placeholder="">\n\
                                                            </div>\n\
                                                        </div>';
                                    }

                                    if (response.tax) {
                                        var is_taxable = "";
                                    } else {
                                        var is_taxable = "hidden";
                                    }

                                    if (service.is_price_includes_tax == 1) {
                                        var include_tax = "active";
                                        var exclude_tax = "";
                                    } else if (service.is_price_includes_tax == 0) {
                                        var exclude_tax = "active";
                                        var include_tax = "";
                                    }

                                    $("#payer_fixed_percentage_section_two").append(
                                    '<div class="col-md-6 col-sm-6" id="payer_detail_section'+response.company.id+'" data-id="'+response.company.id+'">\n\
                                        <div class="expanel expanel-default">\n\
                                            <div class="expanel-heading">\n\
                                                <div class="expanel-title">\n\
                                                    '+response.company.display_name+'\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="expanel-body">\n\
                                                <div>\n\
                                                    <div class="col-md-12 col-sm-12">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('price').' '.lang('type'); ?> <span class="text-red">*</span></label>\n\
                                                            <ul class="nav nav-pills nav-pills-circle" id="tabs_2'+response.company.id+'" role="tablist">\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 fixed_amount '+price_type_fixed+'" id="tab1'+response.company.id+'" data-toggle="tab" href="#tabs_2_1" role="tab" aria-selected="'+price_type_fixed_ariaselected+'" onclick="switchPriceTypeToFixedAmount('+response.company.id+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('fixed_amount') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 variable_amount '+price_type_percentage+'" id="tab2'+response.company.id+'" data-toggle="tab" href="#tabs_2_2" role="tab"  aria-selected="'+price_type_percentage_ariaselected+'" onclick="switchPriceTypeToVariableAmount('+response.company.id+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('variable_amount') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                            </ul>\n\
                                                            <input type="hidden" name="price_type[]" id="price_type'+response.company.id+'" value="'+service.type+'">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                        '+price_input+'\n\
                                                    <div class="col-md-12 col-sm-12">\n\
                                                        <div class="form-group">\n\
                                                            <label class="form-label"><?php echo lang('tax'); ?></label>\n\
                                                            <select id="tax'+response.company.id+'" name="tax[]" class="form-control w-25 tax'+response.company.id+'" data-placeholder="<?php echo lang('select_tax'); ?>">\n\
                                                                <option label="<?php echo lang('select_tax'); ?>"></option>\n\
                                                                <option value="0">None</option>\n\
                                                                <option value="'+response.tax.id+'" selected>'+response.tax.name+'</option>\n\
                                                            </select>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-md-12 col-sm-12 tax-choice'+response.company.id+'" '+is_taxable+'>\n\
                                                        <div class="form-group">\n\
                                                            <ul class="nav nav-pills nav-pills-circle" id="tabs_3'+response.company.id+'" role="tablist">\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 '+include_tax+'" id="tab3'+response.company.id+'" data-toggle="tab" href="#tabs_3_1" role="tab" aria-selected="true" onclick="setTaxInclude('+response.company.id+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('price_includes_tax') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                                <li class="nav-item">\n\
                                                                    <a class="nav-link border py-3 px-5 '+exclude_tax+'" id="tab4'+response.company.id+'" data-toggle="tab" href="#tabs_3_2" role="tab"  aria-selected="false" onclick="setTaxExclude('+response.company.id+');">\n\
                                                                        <span class="nav-link-icon d-block"><?php echo lang('price_excludes_tax') ?></span>\n\
                                                                    </a>\n\
                                                                </li>\n\
                                                            </ul>\n\
                                                            <input type="hidden" id="is_taxable'+response.company.id+'" name="is_taxable[]" value="'+service.is_price_includes_tax+'">\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div id="limits_'+response.company.id+'" hidden>\n\
                                                        <div class="row">\n\
                                                            <div class="col-sm-12 col-sm-12" id="limits_'+response.company.id+'">\n\
                                                                <div class="form-group">\n\
                                                                <ul class="nav nav-pills nav-pills-circle" id="tabs_6" role="tablist">\n\
                                                                    <li class="nav-item">\n\
                                                                        <a class="nav-link border py-3 px-5 '+fixed_limit_active+' fixed_limit" id="tab6" data-toggle="tab" href="#tabs_6_1" role="tab" aria-selected="true" onclick="switchLimitTofixedLimit('+response.company.id+');">\n\
                                                                            <span class="nav-link-icon d-block"><?php echo lang('fixed_limit') ?></span>\n\
                                                                        </a>\n\
                                                                    </li>\n\
                                                                    <li class="nav-item">\n\
                                                                        <a class="nav-link border py-3 px-5 '+percentage_limit_active+' percentage_limit" id="tab7" data-toggle="tab" href="#tabs_6_2" role="tab"  aria-selected="false" onclick="switchLimitToPercentageLimit('+response.company.id+');">\n\
                                                                            <span class="nav-link-icon d-block"><?php echo lang('percentage_limit') ?></span>\n\
                                                                        </a>\n\
                                                                    </li>\n\
                                                                </ul>\n\
                                                                </div>\n\
                                                                <input type="hidden" name="co_payer_payment_limit_type[]" id="co_payer_payment_limit'+response.company.id+'" value="fixed">\n\
                                                            </div>\n\
                                                        </div>\n\
                                                        <div class="row">\n\
                                                            <div class="col-md-6 col-sm-6">\n\
                                                                <div class="form-group" id="selected_payer_price_div_two'+response.company.id+'">\n\
                                                                    '+payer_price+'\n\
                                                                </div>\n\
                                                            </div>\n\
                                                            <div class="col-md-6 col-sm-6">\n\
                                                                <span class="remaining_limit"></span>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>');

                                    $(".tax"+value).select2({
                                        placeholder: '<?php echo lang('select_tax'); ?>',
                                        allowClear: true,
                                        ajax: {
                                            url: 'finance/getTaxByApplicableCountryId',
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

                                    $("#tax"+value).change(function() {
                                        // alert($(this).val());
                                        var tax = $(this).val();
                                        if (tax === "0") {
                                            $(".tax-choice"+value).attr('hidden', true);
                                            $("#tab3"+value).removeClass('active');
                                            $("#tab3"+value).attr('aria-selected', false);
                                            $("#tab4"+value).removeClass('active');
                                            $("#tab4"+value).attr('aria-selected', false);
                                        } else {
                                            $(".tax-choice"+value).attr('hidden', false);
                                        }
                                    })
                                }
                            }
                        }
                    });
                }

            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#tax").change(function() {
                // alert($(this).val());
                var tax = $(this).val();
                if (tax === "0") {
                    $(".tax-choice").attr('hidden', true);
                    $("#tab3").removeClass('active');
                    $("#tab3").attr('aria-selected', false);
                    $("#tab4").removeClass('active');
                    $("#tab4").attr('aria-selected', false);
                } else {
                    $(".tax-choice").attr('hidden', false);
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#tax").select2({
                placeholder: '<?php echo lang('select_tax'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getTaxByApplicableCountryId',
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
        $('#company').multipleSelect({
            selectAll: false,
            filter: true,
            animate: 'slide',
            minimumCountSelected: 5,
            onClose: function() {
                $("#payer_fixed_percentage_section_two > div")
                  .sort(function(a, b) { return $(a).data("id") - $(b).data("id"); })
                  .each(function() { $(this).appendTo("#payer_fixed_percentage_section_two"); });
            }
            // ellipsis: true
            // displayValues: true
        });
    </script>

    <script type="text/javascript">
        function checkIfVariablePriceIsFixedLimit(value) {
            var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';

            $('#co_payer_payment_limit'+value).val('fixed');
            $('#selected_payer_price_content_two'+value).remove();
            $('#selected_payer_price_div_two'+value).append(
                '<div class="input-group" id="selected_payer_price_content_two'+value+'">\n\
                    <span class="input-group-append">\n\
                        <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                    </span>\n\
                    <input type="text" class="form-control" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount">\n\
                </div>');
        }

        function switchPriceTypeToFixedAmount(value) {
            // $('#c_price').attr('hidden', false);
            // $('#payer_detail_section'+value).find('[id=c_price'+value+']').attr('hidden', false);
            var company = $("#company").val();
            var charge_copayer = $("input[name='charge_copayer']").prop('checked');

            if (charge_copayer == true) {
                $.each(company, function(key, val) {
                    if (value == val) {
                        $('#c_price'+value).attr('hidden', false);
                        $('#price_type'+value).val('fixed');
                        $('#c_price_input'+value).attr("required", true);
                        $('#limits_'+value).attr('hidden', true);
                        $('#co_payer_limit_amount'+value).val('');
                        checkIfVariablePriceIsFixedLimit(val);
                    } else {
                        if ($('#price_type'+val).val() != 'fixed') {
                            checkIfVariablePriceIsFixedLimit(val);
                            // $('#co_payer_payment_limit'+val).val('fixed');
                            // $('#selected_payer_price_content_two'+val).remove();
                            // $('#selected_payer_price_div_two'+val).append(
                            //     '<div class="input-group" id="selected_payer_price_content_two'+val+'">\n\
                            //         <span class="input-group-append">\n\
                            //             <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                            //         </span>\n\
                            //         <input type="text" class="form-control" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount">\n\
                            //     </div>');
                        }
                    }
                })

                $(".remaining_limit").text('');
                $('.fixed_limit').addClass('active');
                $('.fixed_limit').attr('aria-selected', true);
                $('.percentage_limit').removeClass('active');
                $('.percentage_limit').attr('aria-selected', false);
            } else {
                $('#c_price'+value).attr('hidden', false);
                $('#price_type'+value).val('fixed');
                $('#c_price_input'+value).attr("required", true);
                $('#limits_'+value).attr('hidden', true);
                $('#co_payer_limit_amount'+value).val('');
            }

        }

        function switchPriceTypeToVariableAmount(value) {
            // $('#c_price').attr('hidden', true);
            // $('#payer_detail_section'+value).find('[id=c_price'+value+']').attr('hidden', true);
            $('#c_price'+value).attr('hidden', true);
            $('#c_price_input'+value).val('');
            $('#price_type'+value).val('variable');
            $('#c_price_input'+value).attr("required", false);
            $('limits_'+value).append('');
            $('#limits_'+value).attr('hidden', false);
        }

        function setTaxInclude(value) {
            // $('#paymentCategoryForm').find('[name=is_taxable]').val('1');
            $('#is_taxable'+value).val('1');
        }

        function setTaxExclude(value) {
            // $('#paymentCategoryForm').find('[name=is_taxable]').val('0');
            $('#is_taxable'+value).val('0');
        }

        function tax(value) {
            // var tax = $(this).val();
            alert('tax');
            if (tax === "0") {
                $(".tax-choice"+value).attr('hidden', true);
                $("#tab3"+value).removeClass('active');
                $("#tab3"+value).attr('aria-selected', false);
                $("#tab4"+value).removeClass('active');
                $("#tab4"+value).attr('aria-selected', false);
            } else {
                $(".tax-choice"+value).attr('hidden', false);
            }
        }

        function switchLimitTofixedLimit(value) {
            var currency = '<?php echo $this->settings_model->getSettings()->currency ?>';
            var company = $("#company").val();
            var charge_copayer = $("input[name='charge_copayer']").prop('checked');

            if (charge_copayer == true) {

                $.each(company, function(key, val) {
                    // $('#co_payer_payment_limit'+val).val('fixed');
                    // $('#selected_payer_price_content_two'+val).remove();
                    // $('#selected_payer_price_div_two'+val).append(
                    //     '<div class="input-group" id="selected_payer_price_content_two'+val+'">\n\
                    //         <span class="input-group-append">\n\
                    //             <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                    //         </span>\n\
                    //         <input type="text" class="form-control" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount">\n\
                    //     </div>');
                    checkIfVariablePriceIsFixedLimit(val);
                });

                $(".remaining_limit").text('');
                $('.fixed_limit').addClass('active');
                $('.fixed_limit').attr('aria-selected', true);
                $('.percentage_limit').removeClass('active');
                $('.percentage_limit').attr('aria-selected', false);

            } else {

                // $('#co_payer_payment_limit'+value).val('fixed');
                // $('#selected_payer_price_content_two'+value).remove();
                // $('#selected_payer_price_div_two'+value).append(
                //     '<div class="input-group" id="selected_payer_price_content_two'+value+'">\n\
                //         <span class="input-group-append">\n\
                //             <span class="btn btn-primary" type="button">'+currency+'</span>\n\
                //         </span>\n\
                //         <input type="text" class="form-control" name="co_payer_limit_amount[]" placeholder="Enter Fixed Amount">\n\
                //     </div>');

                checkIfVariablePriceIsFixedLimit(value);

            }
        }

        function switchLimitToPercentageLimit(value) {

            var company = $("#company").val();
            var charge_copayer = $("input[name='charge_copayer']").prop('checked');

            console.log(charge_copayer);

            if (charge_copayer == true) {

                $.each(company, function(key, val) {
                    $('#c_price'+val).attr('hidden', true);
                    $('#c_price_input'+val).val('');
                    $('#price_type'+val).val('variable');
                    $('.variable_amount').addClass('active');
                    $('.variable_amount').attr('aria-selected', true);
                    $('.fixed_amount').removeClass('active');
                    $('.fixed_amount').attr('aria-selected', false);
                    $('#c_price_input'+val).attr("required", false);
                    $('limits_'+val).append('');
                    $('#limits_'+val).attr('hidden', false);

                    $('#co_payer_payment_limit'+val).val('percentage');
                    $('#selected_payer_price_content_two'+val).remove();
                    $('#selected_payer_price_div_two'+val).append(
                    '<div class="input-group" id="selected_payer_price_content_two'+val+'">\n\
                        <input type="text" class="form-control percentage_limit_input" name="co_payer_limit_amount[]" placeholder="Enter Percentage Amount" onfocusout="percentage_remain();">\n\
                        <span class="input-group-append">\n\
                            <span class="btn btn-primary" type="button">%</span>\n\
                        </span>\n\
                    </div>');
                });

                $(".remaining_limit").text('');
                $('.percentage_limit').addClass('active');
                $('.percentage_limit').attr('aria-selected', true);
                $('.fixed_limit').removeClass('active');
                $('.fixed_limit').attr('aria-selected', false);

            } else {

                $('#co_payer_payment_limit'+value).val('percentage');
                $('#selected_payer_price_content_two'+value).remove();
                $('#selected_payer_price_div_two'+value).append(
                '<div class="input-group" id="selected_payer_price_content_two'+value+'">\n\
                    <input type="text" class="form-control percentage_limit_input" name="co_payer_limit_amount[]" placeholder="Enter Percentage Amount" onfocusout="percentage_remain();">\n\
                    <span class="input-group-append">\n\
                        <span class="btn btn-primary" type="button">%</span>\n\
                    </span>\n\
                </div>');

            }

        }
    </script>

    <script type="text/javascript">
        function percentage_remain() {
            // var input = document.getElementsByName('co_payer_limit_amount[]');
            var input = document.getElementsByClassName('percentage_limit_input');

            console.log(input.length);

            var limit = 0;
            for (var i = 0; i < input.length; i++) {
                limit += Number(input[i].value);
            }

            var remaining = 100 - limit;

            if (input.length >= 1) {
                if (remaining < 0) {
                    // input.classList.add('border-danger');
                    $(".remaining_limit").text('Total percentage limit exceeds 100% by '+Math.abs(remaining)+' %');
                    $("input[name='co_payer_limit_amount[]']").removeClass('border-success');
                    $("input[name='co_payer_limit_amount[]']").addClass('border-danger');
                } else if (remaining == 0) {
                    $(".remaining_limit").text('');
                    $("input[name='co_payer_limit_amount[]']").addClass('border-success');
                    $("input[name='co_payer_limit_amount[]']").removeClass('border-danger');
                } else {
                    // input.classList.add('border-success');
                    $(".remaining_limit").text('Remaining percentage limit to allocate: '+remaining+' %');
                    $("input[name='co_payer_limit_amount[]']").addClass('border-success');
                    $("input[name='co_payer_limit_amount[]']").removeClass('border-danger');
                }
            }
        }
    </script>

    <script type="text/javascript">
        function validate_percentage_limit() {
            var input = document.getElementsByName('co_payer_limit_amount[]');

            var limit = 0;
            for (var i = 0; i < input.length; i++) {
                limit += Number(input[i].value);
            }

            if (limit != 100) {
                alert("Limit Should be Equal to 100 %");
                // return false;
            } else {
                var data = $('#paymentCategoryForm').serialize();
                var base_url='<?php echo base_url(); ?>'
                $.ajax({
                    url:base_url+'finance/addPaymentCategory',
                    type:'POST',
                    data:data,
                    success:function(data){
                        
                    }
                }); 
                return false;
            }

        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#submitbtn').on('click',function() {
                // var input = document.getElementsByName('co_payer_limit_amount[]');
                var input = document.getElementsByClassName('percentage_limit_input');

                console.log(input.length);

                var limit = 0;
                for (var i = 0; i < input.length; i++) {
                    limit += Number(input[i].value);
                }

                if (input.length >= 1) {
                    if (limit != 100) {
                        alert("Limit Should be Equal to 100 %");
                        const element = document.getElementById("payer_fixed_percentage_section_two");
                        element.scrollIntoView();
                        element.scrollIntoView();
                        element.scrollIntoView(false);
                        element.scrollIntoView({block: "end"});
                        element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
                        // return false;
                    } else {
                        var data = $('#paymentCategoryForm').serialize();
                        var base_url='<?php echo base_url(); ?>'
                        $.ajax({
                            url:base_url+'finance/addPaymentCategory',
                            type:'POST',
                            data:data,
                            success:function(data){
                            }
                        });
                        window.location = base_url+"finance/paymentCategory";
                    }
                } else {
                    var data = $('#paymentCategoryForm').serialize();
                    var base_url='<?php echo base_url(); ?>'
                    $.ajax({
                        url:base_url+'finance/addPaymentCategory',
                        type:'POST',
                        data:data,
                        success:function(data){
                        }
                    });
                    window.location = base_url+"finance/paymentCategory";
                }
            })
        })
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