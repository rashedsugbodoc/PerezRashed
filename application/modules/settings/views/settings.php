<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('settings'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix row">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="settings/update" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('healthcare_institution_name'); ?></label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->system_vendor)) {
                                    echo $settings->system_vendor;
                                }
                                ?>' placeholder="system name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->title)) {
                                    echo $settings->title;
                                }
                                ?>' placeholder="title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->address)) {
                                    echo $settings->address;
                                }
                                ?>' placeholder="address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->phone)) {
                                    echo $settings->phone;
                                }
                                ?>' placeholder="phone">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="companyName"><?php echo lang('company_name');?></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value='<?php
                                if (!empty($settings->company_name)) {
                                    echo $settings->company_name;
                                }
                                ?>' placeholder="<?php echo lang('company_name');?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="companyVATNumber"><?php echo lang('company_vat_number');?></label>
                                <input type="text" class="form-control" name="company_vat_number" id="company_vat_number" value='<?php
                                if (!empty($settings->company_vat_number)) {
                                    echo $settings->company_vat_number;
                                    }
                                    ?>' placeholder="<?php echo lang('company_vat_number');?>">
                            </div>   
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1"><?php echo lang('country'); ?></label>
                                <select class="form-control" name="country_id" value=''>
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
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('language'); ?></label>
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
                            <div class="col-md-6 form-group">
                                <label for="timezone"><?php echo lang('timezone');?></label>
                                <input type="text" class="form-control" name="timezone" id="timezone" value='<?php 
                                if (!empty($settings->timezone)) {
                                    echo $settings->timezone;
                                }
                                ?>' placeholder="<?php echo lang('timezone');?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="time_format"><?php echo lang('time_format');?></label>
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
                            <div class="col-md-6 form-group">
                                <label for="date_format"><?php echo lang('date_format');?></label>
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
                            <div class="col-md-6 form-group">
                                <label for="date_format"><?php echo lang('date_format_long');?></label>
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
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('hospital_email'); ?></label>
                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->email)) {
                                    echo $settings->email;
                                }
                                ?>' placeholder="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('currency'); ?></label>
                                <input type="text" class="form-control" name="currency" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->currency)) {
                                    echo $settings->currency;
                                }
                                ?>' placeholder="currency">
                            </div>

                            <!--
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('discount_type'); ?></label>
                                <select class="form-control m-bot15" name="discount" value=''>
                                    <option value="percentage" <?php
                            if (!empty($settings->discount)) {
                                if ($settings->discount == 'percentage') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('percentage'); ?> (%)</option>
                                    <option value="flat" <?php
                            if (!empty($settings->discount)) {
                                if ($settings->discount == 'flat') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('flat'); ?></option>
                                </select>
                            </div>
                            
                            -->
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1"><?php echo lang('invoice_logo'); ?></label>
                                <input type="file" class="form-control" name="img_url" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->invoice_logo)) {
                                    echo $settings->invoice_logo;
                                }
                                ?>' placeholder="">
                                <span class="help-block"><?php echo lang('recommended_size'); ?> : 200x100</span>
                            </div>
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
                            <input type="hidden" name="id" value='<?php
                            if (!empty($settings->id)) {
                                echo $settings->id;
                            }
                            ?>'>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/coderygel.min.js"></script>
