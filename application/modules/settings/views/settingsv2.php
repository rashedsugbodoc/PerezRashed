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
                                        <div class="card-title"><?php echo lang('settings'); ?></div>
                                    </div>
                                    <div class="card-body">
                                        <?php echo validation_errors(); ?>
                                        <form role="form" action="settings/update" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('healthcare_provider_type'); ?></label>
                                                        <select class="form-control" name="entity_type" id="entity_type" value=''>
                                                            <option value="0" disabled><?php echo lang('healthcare_provider_type_placeholder'); ?></option>
                                                            <?php foreach ($entities as $entity) { ?>
                                                                <option value="<?php echo $entity->id; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($entity->id == set_value('entity_type_id')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($settings->entity_type_id)) {
                                                                    if ($entity->id == $settings->entity_type_id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $entity->display_name; ?> </option>
                                                                    <?php } ?>
                                                        </select>   
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('healthcare_institution_name'); ?></label>
                                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                                        if (!empty($settings->title)) {
                                                            echo $settings->title;
                                                        }
                                                        ?>' placeholder="<?php echo lang('healthcare_institution_name'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('healthcare_institution_group_name'); ?></label>
                                                        <input type="text" class="form-control" name="group_name" id="exampleInputEmail1" value='<?php
                                                        if (!empty($settings->group_name)) {
                                                            echo $settings->group_name;
                                                        }
                                                        ?>' placeholder="<?php echo lang('healthcare_institution_group_name'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('hospital_email'); ?></label>
                                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                        if (!empty($settings->email)) {
                                                            echo $settings->email;
                                                        }
                                                        ?>' placeholder="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('phone'); ?></label>
                                                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                        if (!empty($settings->phone)) {
                                                            echo $settings->phone;
                                                        }
                                                        ?>' placeholder="phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company_name');?></label>
                                                        <input type="text" class="form-control" name="company_name" id="company_name" value='<?php
                                                        if (!empty($settings->company_name)) {
                                                            echo $settings->company_name;
                                                        }
                                                        ?>' placeholder="<?php echo lang('company_name');?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company_vat_number');?></label>
                                                        <input type="text" class="form-control" name="company_vat_number" id="company_vat_number" value='<?php
                                                        if (!empty($settings->company_vat_number)) {
                                                            echo $settings->company_vat_number;
                                                            }
                                                            ?>' placeholder="<?php echo lang('company_vat_number');?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('address'); ?></label>
                                                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="<?php echo lang('street_address_placeholder'); ?>" value='<?php
                                                        if (!empty($settings->address)) {
                                                            echo $settings->address;
                                                        }
                                                        ?>' placeholder="address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('country'); ?></label>
                                                        <select class="form-control select2-show-search" name="country_id" id="country" value=''>
                                                            <option value="0" disabled><?php echo lang('country_institution_placeholder'); ?></option>
                                                            <?php foreach ($countries as $country) { ?>
                                                                <option value="<?php echo $country->id; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($country->id == set_value('country_id')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($settings->country_id)) {
                                                                    if ($country->id == $settings->country_id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $country->name; ?> </option>
                                                                    <?php } ?>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('state_province'); ?></label>
                                                        <select class="form-control select2-show-search" name="state_id" id="state" value=''>
                                                            
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('city_municipality'); ?></label>
                                                        <select class="form-control select2-show-search" name="city_id" id="city" value=''>
                                                            <option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>
                                                        </select>                         
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group" id="barangayDiv">
                                                        <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                        <select class="form-control select2-show-search" name="barangay_id" id="barangay">
                                                            <option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>
                                                        </select>                          
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('postal'); ?></label>
                                                        <input type="text" class="form-control" name="postal" id="exampleInputEmail1" placeholder="<?php echo lang('postal_placeholder'); ?>" value='<?php
                                                        if (!empty($settings->postal)) {
                                                            echo $settings->postal;
                                                        }
                                                        ?>'>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('language'); ?></label>
                                                        <select class="form-control" name="language" value='' disabled="">
                                                            <option value="arabic" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'arabic') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('arabic'); ?> 
                                                            </option>
                                                            <option value="english" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'english') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('english'); ?> 
                                                            </option>
                                                            <option value="spanish" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'spanish') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('spanish'); ?>
                                                            </option>
                                                            <option value="french" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'french') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('french'); ?>
                                                            </option>
                                                            <option value="italian" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'italian') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('italian'); ?>
                                                            </option>
                                                            <option value="portuguese" <?php
                                                            if (!empty($settings->language)) {
                                                                if ($settings->language == 'portuguese') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('portuguese'); ?>
                                                            </option>
                                                        </select>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('timezone');?></label>
                                                        <select class="form-control" name="timezone" value=''>
                                                            <?php foreach ($zones as $zone) { ?>
                                                                <option value="<?php echo $zone; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($zone == set_value('timezone')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($settings->timezone)) {
                                                                    if ($zone == $settings->timezone) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $zone; ?> </option>
                                                                    <?php } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('time_format');?></label>
                                                        <select class="form-control" name="time_format" value=''>
                                                            <option value="" selected>
                                                                <?php echo lang('select');?>
                                                            </option>
                                                            <option value="h:i a" <?php
                                                            if (!empty($settings->time_format)) {
                                                                if ($settings->time_format == 'h:i a') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('time_format_12am'); ?> 
                                                            </option>
                                                            <option value="h:i A" <?php
                                                            if (!empty($settings->time_format)) {
                                                                if ($settings->time_format == 'h:i A') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('time_format_12AM'); ?> 
                                                            </option>
                                                            <option value="H:i" <?php
                                                            if (!empty($settings->time_format)) {
                                                                if ($settings->time_format == 'H:i') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>><?php echo lang('time_format_24hr'); ?>
                                                            </option>
                                                        
                                                        </select>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date_format');?></label>
                                                        <select class="form-control" name="date_format" value=''>
                                                            <option value="" selected>
                                                                <?php echo lang('select');?>
                                                            </option>
                                                            <option value="d-m-Y" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'd-m-Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>d-m-Y (example: 25-04-2013)
                                                            </option>
                                                            <option value="m-d-Y" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'm-d-Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>m-d-Y (example: 04-25-2013)
                                                            </option>
                                                            <option value="Y-m-d" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'Y-m-d') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>Y-m-d (example: 2013-04-25)
                                                            </option>
                                                            <option value="d/m/Y" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'd/m/Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>d/m/Y (example: 25/04/2013)
                                                            </option>
                                                            <option value="m/d/Y" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'm/d/Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>m/d/Y (example: 04/25/2013)
                                                            </option>
                                                            <option value="Y/m/d" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'Y/m/d') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>Y/m/d (example: 2013/04/25)
                                                            </option> 
                                                            <option value="d.m.Y" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'd.m.Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>d.m.Y (example: 25.04.2013)
                                                            </option>
                                                            <option value="m.d.Y" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'm.d.Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>m.d.Y (example: 04.25.2013)
                                                            </option>
                                                            <option value="Y.m.d" <?php
                                                            if (!empty($settings->date_format)) {
                                                                if ($settings->date_format == 'Y.m.d') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>Y.m.d (example: 2013.04.25)
                                                            </option>                                                                                      
                                                        </select>                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date_format_long');?></label>
                                                        <select class="form-control" name="date_format_long" value=''>
                                                            <option value="" selected>
                                                                <?php echo lang('select');?>
                                                            </option>
                                                            <option value="F j, Y" <?php
                                                            if (!empty($settings->date_format_long)) {
                                                                if ($settings->date_format_long == 'F j, Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>August 24, 2013
                                                            </option>
                                                            <option value="j F Y" <?php
                                                            if (!empty($settings->date_format_long)) {
                                                                if ($settings->date_format_long == 'j F Y') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>24 August 2013
                                                            </option>
                                                        </select>                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('currency_symbol'); ?></label>
                                                        <input type="text" class="form-control" name="currency" id="exampleInputEmail1" value='<?php
                                                        if (!empty($settings->currency)) {
                                                            echo $settings->currency;
                                                        }
                                                        ?>' placeholder="currency">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('invoice_logo'); ?></label>
                                                        <input type="file" class="form-control" name="img_url" id="exampleInputEmail1" value='<?php
                                                        if (!empty($settings->invoice_logo)) {
                                                            echo $settings->invoice_logo;
                                                        }
                                                        ?>' placeholder="">
                                                        <span class="help-block"><?php echo lang('recommended_size'); ?> : 200x100</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group hidden col-md-3">
                                                    <label for="exampleInputEmail1">Buyer</label>
                                                    <input type="hidden" class="form-control" name="buyer" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->codec_username)) {
                                                        echo $settings->buyer;
                                                    }
                                                    ?>' placeholder="codec_username">
                                                </div>
                                                <div class="form-group hidden col-md-3">
                                                    <label for="exampleInputEmail1">Purchase Code</label>
                                                    <input type="hidden" class="form-control" name="p_code" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->codec_purchase_code)) {
                                                        echo $settings->phone;
                                                    }
                                                    ?>' placeholder="codec_purchase_code">
                                                </div>
                                                <input type="hidden" name="id" id="settings_id" value='<?php
                                                if (!empty($settings->id)) {
                                                    echo $settings->id;
                                                }
                                                ?>'>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
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

    <!-- INTERNAL JS INDEX START -->

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
        $("document").ready(function () {
            var settings_country = "<?php echo $settings->country_id; ?>";
            var settings_state = "<?php echo $settings->state_id; ?>";
            var settings_city = "<?php echo $settings->city_id; ?>";
            var settings_barangay = "<?php echo $settings->barangay_id; ?>";
            var settings_id = '<?php echo $settings->id; ?>';
            console.log(barangay);
            $.ajax({
                url: 'settings/getStateByCountryIdByJason?country='+settings_country,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var states = response.state;

                    $("#state").find('option').remove();
                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    $.each(states, function (key, value) {
                        $("#state").append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (settings_state == null) {
                        $("#state").val("0");
                    } else {
                        $("#state").val(settings_state);
                    }

                    var state = $("#state").val();

                    $.ajax({
                        url: 'settings/getCityByStateIdByJason?state='+settings_state,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var cities = response.city;
                            // var setting_city = response.settings_city_id.city_id;

                            $.each(cities, function (key, value) {
                                $("#city").append($('<option>').text(value.name).val(value.id)).end();
                            });

                            if (settings_city == null) {
                                $("#city").val("0");
                            } else {
                                $("#city").val(settings_city);
                            }

                            var city = $("#city").val();

                            $.ajax({
                                url: 'settings/getBarangayByCityIdByJason?city='+settings_city,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                                success: function (response) {
                                    var barangays = response.barangay;
                                    // var setting_barangay = response.settings_barangay_id.barangay_id;

                                    $.each(barangays, function (key, value) {
                                        $("#barangay").append($('<option>').text(value.name).val(value.id)).end();
                                    });

                                    if (settings_barangay == null) {
                                        $("#barangay").val("0");
                                    } else {
                                        $("#barangay").val(settings_barangay);
                                    }
                                }
                            })
                        }
                    })
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#country").change(function () {
                var country = $("#country").val();
                var barangay = document.getElementById("barangayDiv");
                $("#state").find('option').remove();
                $("#city").find('option').remove();
                $("#barangay").find('option').remove();

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'settings/getStateByCountryIdByJason?country='+country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var states = response.state;

                        $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_institution_placeholder'); ?></option>')).end();
                        $('#city').append($('<option disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
                        $('#barangay').append($('<option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();

                        $.each(states, function (key, value) {
                            $("#state").append($('<option>').text(value.name).val(value.id)).end();
                        });
                    }
                })

            })
        });

        $(document).ready(function () {
            $("#state").change(function () {
                var state = $("#state").val();
                $("#city").find('option').remove();
                $("#barangay").find('option').remove();
                
                $.ajax({
                    url: 'settings/getCityByStateIdByJason?state='+ state,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;
                        
                        $('#city').append($('<option disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
                        $("#city").attr("disabled", false);
                        $.each(city, function (key, value) {
                            $('#city').append($('<option>').text(value.name).val(value.id)).end();
                        });
                    }
                });
            });
        });

        $(document).ready(function () {
            $("#city").change(function () {
                var city = $("#city").val();
                $("#barangay").find('option').remove();
                
                $.ajax({
                    url: 'settings/getBarangayByCityIdByJason?city='+ city,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;
                    
                        $('#barangay').append($('<option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();
                        $("#barangay").attr("disabled", false);
                        $.each(barangay, function (key, value) {
                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                        });
                    }
                });
            });
        });
    </script>

    </body>
</html>