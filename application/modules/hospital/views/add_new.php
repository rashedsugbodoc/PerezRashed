
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <section class="col-md-7 col-sm-12">
                <div class="panel">
                    <header class="panel-heading">
                        <?php
                        if (!empty($hospital->id)) {
                            echo lang('edit_hospital');
                        } else {
                            echo lang('add_new_hospital');
                        }
                        ?>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="col-lg-12">
                                <?php echo validation_errors(); ?>
                            </div>
                            <form role="form" action="hospital/addNew" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><?php echo lang('healthcare_provider');?> <?php echo lang('information');?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('healthcare_provider_type'); ?> <span class="text-danger">*</span></label>
                                        <select class="form-control" name="entity_type" id="entity_type" value=''>
                                            <option value=""><?php echo lang('healthcare_provider_type_placeholder'); ?></option>
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
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('package'); ?> <span class="text-danger">*</span></label>
                                        <select class="form-control pos_select" id="pos_select" name="package" value='' required="">
                                            <option value=""> - - - </option>
                                            <option value="" <?php
                                            if (!empty($hospital->id)) {
                                                if (empty($hospital->package)) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>><?php echo lang('select_manually'); ?></option>
                                                    <?php foreach ($packages as $package) { ?>
                                                <option value="<?php echo $package->id; ?>" <?php
                                                if (!empty($setval)) {
                                                    if ($package->name == set_value('package')) {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($hospital->package)) {
                                                    if ($package->id == $hospital->package) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > <?php echo $package->name; ?> </option>
                                                    <?php } ?> 
                                        </select>                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('healthcare_provider'); ?> <?php echo lang('name');?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                        if (!empty($hospital->name)) {
                                            echo $hospital->name;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('healthcare_provider'); ?> <?php echo lang('display_name'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                        if (!empty($settings->title)) {
                                            echo $settings->title;
                                        }
                                        ?>' placeholder="">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('healthcare_provider'); ?> <?php echo lang('email'); ?> <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="provider_email" id="exampleInputEmail1" value='<?php
                                        if (!empty($settings->email)) {
                                            echo $settings->email;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('address'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="provider_address" id="exampleInputEmail1" value='<?php
                                        if (!empty($settings->address)) {
                                            echo $settings->address;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="provider_phone" id="exampleInputEmail1" value='<?php
                                        if (!empty($settings->phone)) {
                                            echo $settings->phone;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('country'); ?> <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country" value=''>
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
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('state_province'); ?></label>
                                        <select class="form-control" name="state_id" id="state" value=''>
                                            
                                        </select>                                      
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('city_municipality'); ?></label>
                                        <select class="form-control" name="city_id" id="city" value=''>
                                            <option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>
                                        </select>                                      
                                    </div>
                                    <div class="col-md-6 form-group" id="barangayDiv">
                                        <label for="exampleInputEmail1"><?php echo lang('barangay'); ?></label>
                                        <select class="form-control" name="barangay_id" id="barangay">
                                            <option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>
                                        </select>                                      
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('postal'); ?></label>
                                        <input type="text" class="form-control" name="postal" id="exampleInputEmail1" placeholder="<?php echo lang('postal_placeholder'); ?>" value='<?php
                                        if (!empty($settings->postal)) {
                                            echo $settings->postal;
                                        }
                                        ?>'>
                                    </div>
                                </div>
                                <div class="row">

                                </div>                                
                                <div class="row">
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
                                </div>                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('currency_symbol'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="currency" id="exampleInputEmail1" value='<?php
                                        if (!empty($settings->currency)) {
                                            echo $settings->currency;
                                        }
                                        ?>' placeholder="$">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"> <?php echo lang('language'); ?> <span class="text-danger">*</span></label>
                                        <select class="form-control" name="language" value=''>
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
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="timezone"><?php echo lang('timezone');?> <span class="text-danger">*</span></label>
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
                                    <div class="col-md-6 form-group">
                                        <label for="time_format"><?php echo lang('time_format');?> <span class="text-danger">*</span></label>
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
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="date_format"><?php echo lang('date_format');?> <span class="text-danger">*</span></label>
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
                                        <label for="date_format"><?php echo lang('date_format_long');?> <span class="text-danger">*</span></label>
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
                                    <div class="col-md-6 form-group">
                                        <label for="date_format"><?php echo lang('is_public');?> <span class="text-danger">*</span></label>
                                        <select class="form-control" name="is_public" value=''>
                                            <option value="" selected>
                                                <?php echo lang('select');?>
                                            </option>
                                            <option value="1" <?php
                                            if (!empty($settings->is_public)) {
                                                if ($settings->is_public == 1) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>><?php echo lang('public');?>
                                            </option>
                                            <option value="0" <?php
                                            if (!empty($settings->is_public)) {
                                                if ($settings->is_public != 1) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>><?php echo lang('hidden');?>
                                            </option>
                                        </select>                                        
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pos_client">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('limit'); ?></label>
                                            <input type="text" class="form-control" name="p_limit" id="exampleInputEmail1" value='<?php
                                            if (!empty($hospital->p_limit)) {
                                                echo $hospital->p_limit;
                                            } else {
                                                echo '1000';
                                            }
                                            ?>' placeholder="Example: 1000">
                                        </div>
                                        <div class="form-group pos_client">
                                            <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('limit'); ?></label>
                                            <input type="text" class="form-control" name="d_limit" id="exampleInputEmail1" value='<?php
                                            if (!empty($hospital->d_limit)) {
                                                echo $hospital->d_limit;
                                            } else {
                                                echo '500';
                                            }
                                            ?>' placeholder="Example: 1000">
                                        </div>
                                        <div class="form-group pos_client">
                                            <label for="exampleInputEmail1"><?php echo lang('location'); ?> <?php echo lang('limit'); ?></label>
                                            <input type="text" class="form-control" name="loc_limit" id="exampleInputEmail1" value='<?php
                                            if (!empty($hospital->loc_limit)) {
                                                echo $hospital->loc_limit;
                                            } else {
                                                echo '4';
                                            }
                                            ?>' placeholder="Example: 4">
                                        </div>
                                        <div class="form-group pos_client">
                                            <label for="exampleInputEmail1"><?php echo lang('platform_percentage_fee'); ?></label>
                                            <input type="text" class="form-control" name="platform_percent_fee" id="exampleInputEmail1" value='<?php
                                            if (!empty($settings->platform_percent_fee)) {
                                                echo $settings->platform_percent_fee;
                                            } else {
                                                echo '';
                                            }
                                            ?>' placeholder="Example: 25 for 25%">
                                        </div>
                                        <div class="form-group pos_client">
                                            <label for="exampleInputEmail1"><?php echo lang('platform_flat_fee'); ?></label>
                                            <input type="text" class="form-control" name="platform_flat_fee" id="exampleInputEmail1" value='<?php
                                            if (!empty($settings->platform_flat_fee)) {
                                                echo $settings->platform_flat_fee;
                                            } else {
                                                echo '';
                                            }
                                            ?>' placeholder="Example: 25">
                                        </div>                                                                                    
                                        <div class="form-group pos_client"> 
                                            <label for="exampleInputEmail1"> <?php echo lang('module_permission'); ?></label>
                                            <br>
                                            <input type='checkbox' value = "accountant" name="module[]"

                                                   <?php
                                                   if (!empty($hospital->id)) {
                                                       $modules = $this->hospital_model->getHospitalById($hospital->id)->module;
                                                       $modules1 = explode(',', $modules);
                                                       if (in_array('accountant', $modules1)) {
                                                           echo 'checked';
                                                       }
                                                   } else {
                                                       echo 'checked';
                                                   }
                                                   ?>
                                                   > <?php echo lang('accountant'); ?>
                                            <br>
                                            <input type='checkbox' value = "admission" name="module[]"  <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('admission', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('admission'); ?>                              
                                            <br>
                                            <input type='checkbox' value = "appointment" name="module[]"  <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('appointment', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('appointment'); ?>                              
                                            <br>
                                            <input type='checkbox' value = "branch" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('branch', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required=""> <?php echo lang('branch'); ?>

                                            <br>
                                            <input type='checkbox' value = "bed" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('bed', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('bed'); ?>

                                            <br>
                                            <input type='checkbox' value = "company" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('company', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('company'); ?>

                                            <br>
                                            <input type='checkbox' value = "companyuser" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('companyuser', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('company_user'); ?>

                                            <br>                                            
                                            <input type='checkbox' value = "department" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('department', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('department'); ?>

                                            <br>
                                            <input type='checkbox' value = "doctor" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('doctor', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required=""> <?php echo lang('doctor'); ?>

                                            <br>
                                            <input type='checkbox' value = "donor" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('donor', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('donor'); ?>

                                            <br>
                                            <input type='checkbox' value = "encounter" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('encounter', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('encounter'); ?>

                                            <br>                                            
                                            <input type='checkbox' value = "finance" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('finance', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('financial_activities'); ?>
                                            <br>
                                            <input type='checkbox' value = "form" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('form', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('forms_reports'); ?>

                                            <br>
                                            <input type='checkbox' value = "lab" name="module[]"  <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('lab', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('lab'); ?>
                                            <br>
                                            <input type='checkbox' value = "laboratorist" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('laboratorist', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('laboratorist'); ?>

                                            <br>
                                            <input type='checkbox' value = "medicine" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('medicine', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required=""> <?php echo lang('medicine'); ?>

                                            <br>
                                            <input type='checkbox' value = "nurse" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('nurse', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('nurse'); ?>

                                            <br>
                                            <input type='checkbox' value = "patient" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('patient', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required="" > <?php echo lang('patient'); ?>

                                            <br>
                                            <input type='checkbox' value = "pharmacist" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('pharmacist', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required=""> <?php echo lang('pharmacist'); ?>

                                            <br>
                                            <input type='checkbox' value = "pharmacy" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('pharmacy', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('pharmacy'); ?>

                                            <br>                                            
                                            <input type='checkbox' value = "prescription" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('prescription', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('prescription'); ?>

                                            <br>
                                            <input type='checkbox' value = "receptionist" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('receptionist', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('receptionist'); ?>

                                            <br>
                                            <input type='checkbox' value = "report" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('report', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('report'); ?>


                                            <br>
                                            <input type='checkbox' value = "notice" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('notice', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('notice'); ?>


                                            <br>
                                            <input type='checkbox' value = "email" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('email', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('email'); ?>

                                            <br>
                                            <input type='checkbox' value = "sms" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('sms', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('sms'); ?>

                                            <br> 
                                            <input type='checkbox' value = "vital" name="module[]" <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('vital', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('vital_signs'); ?>

                                                                                       


                                        </div>

                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><?php echo lang('administrator');?> <?php echo lang('information');?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('first_name'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="firstname" id="exampleInputEmail1" value='<?php
                                        if (!empty($admin->firstname)) {
                                            echo $admin->firstname;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('middle_name'); ?></label>
                                        <input type="text" class="form-control" name="middlename" id="exampleInputEmail1" value='<?php
                                        if (!empty($admin->middlename)) {
                                            echo $admin->middlename;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('last_name'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="lastname" id="exampleInputEmail1" value='<?php
                                        if (!empty($admin->lastname)) {
                                            echo $admin->lastname;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('email'); ?> <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="admin_email" id="exampleInputEmail1" value='<?php
                                        if (!empty($admin->email)) {
                                            echo $admin->email;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('password'); ?> <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('administrator'); ?> <?php echo lang('address'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="admin_address" id="exampleInputEmail1" value='<?php
                                        if (!empty($admin->address)) {
                                            echo $admin->address;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('administrator'); ?> <?php echo lang('phone'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="admin_phone" id="exampleInputEmail1" value='<?php
                                        if (!empty($admin->phone)) {
                                            echo $admin->phone;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                </div>                                
                                <input type="hidden" name="id" value='<?php
                                if (!empty($hospital->id)) {
                                    echo $hospital->id;
                                }
                                ?>'>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->




<script src="common/js/coderygel.min.js"></script>


<script>
    $(document).ready(function () {
<?php
if (!empty($hospital->id)) {
    if (empty($hospital->package)) {
        ?>
                $('.pos_client').show();
    <?php } else { ?>
                $('.pos_client').hide();
        <?php
    }
} else {
    ?>
            $('.pos_client').hide();
<?php } ?>
        $(document.body).on('change', '#pos_select', function () {

            var v = $("select.pos_select option:selected").val()
            if (v == '') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
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
            // alert(country);
            $("#state").attr("disabled", false);
            if (country == "174") {
                barangay.style.display='block';
                $("#barangay").attr("disabled", true);
                $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();
            } else {
                barangay.style.display='none';
            }
            $.ajax({
                url: 'settings/getStateByCountryIdByJason?country='+ country,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var state = response.state;
                var id = $("#id").val();
                
                $('#state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                $("#city").attr("disabled", true);
                $('#city').append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                $.each(state, function (key, value) {
                    $('#state').append($('<option>').text(value.name).val(value.id)).end();
                });


                
            });
        });
    });


    

    $(document).ready(function () {
        $("#state").change(function () {
            var state = $("#state").val();
            $("#city").find('option').remove();
            
            $.ajax({
                url: 'settings/getCityByStateIdByJason?state='+ state,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var city = response.city;
                
                $('#city').append($('<option disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
                $("#city").attr("disabled", false);
                $.each(city, function (key, value) {
                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                });

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
            }).success(function (response) {
                var barangay = response.barangay;
                
                $('#barangay').append($('<option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();
                $("#barangay").attr("disabled", false);
                $.each(barangay, function (key, value) {
                    $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                });

            });
        });
    });

//code that might be needed start
    // $(document).ready(function () {
    //     var state = $("#state").val();
    //     // alert(state);
    //     $.ajax({
    //         url: 'settings/getCityByStateIdByJason?state='+ state,
    //         method: 'GET',
    //         data: '',
    //         dataType: 'json',
    //     }).success(function (response) {
    //         var city = response.city;
    //         console.log(city);
    //         $('#city').append($('<option disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
    //         $.each(city, function (key, value) {
    //             $('#city').append($('<option>').text(value.name).val(value.id)).end();
    //         });

    //         if ($('#city').has('option').length == 0) {                    //if it is blank. 
    //             $('#city').append($('<option>').text('<?php echo lang("city_municipality_institution_placeholder"); ?>').val('Not Selected')).end();
    //         }
    //     });
    // });

    // $(document).ready(function () {
    //     var city = $("#city").val();
    //     $("#barangay").find('option').remove();
    //     // alert(city);
    //     $.ajax({
    //         url: 'settings/getBarangayByCityIdByJason?city='+ city,
    //         method: 'GET',
    //         data: '',
    //         dataType: 'json',
    //     }).success(function (response) {
    //         var barangay = response.barangay;
    //         console.log(barangay);
    //         $('#barangay').append($('<option disabled selected><?php echo lang('barangay_institution_placeholder'); ?></option>')).end();
    //         $.each(barangay, function (key, value) {
    //             $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
    //         });

    //         if ($('#barangay').has('option').length == 0) {                    //if it is blank. 
    //             $('#barangay').append($('<option>').text('<?php echo lang("barangay_institution_placeholder"); ?>').val('Not Selected')).end();
    //         }
    //     });
    // });
//code that might be needed start

    $(document).ready(function () {
        var country = $("#country").val();
        var barangay = document.getElementById("barangayDiv");
        var settings_id = '<?php echo $settings->id; ?>';

        $("#state").find('option').remove();
        $("#city").find('option').remove();
        $("#barangay").find('option').remove();
        
        
        if (country == "174") {
            barangay.style.display='block';
        } else {
            barangay.style.display='none';
        }
        $.ajax({
            url: 'settings/getStateByCountryIdByJason?country='+ country + '&settings=' + settings_id,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function (response) {
            var state = response.state;
            var state_id = response.settings_state_id.state_id;
            var country_id = response.settings_state_id.country_id;

            if (country_id == null) {
                $("#state").attr("disabled", true);
                $("#country").val("0");
                // $('#country').append($('<option value="0" disabled selected><?php echo lang('country_institution_placeholder'); ?></option>')).end();
            } else {
                $("#state").attr("disabled", false);
            }            

            if (state_id == null) {
                $("#city").attr("disabled", true);
                $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_institution_placeholder'); ?></option>')).end();
            } else {
                $("#city").attr("disabled", false);
            }
            
            // $("#city").attr("disabled", true);
            $.each(state, function (key, value) {
                $('#state').append($('<option>').text(value.name).val(value.id)).end();
            });

            
            if (state_id == null) {
                // document.getElementById('state').value='0';
                $("#state").val("0");
            } else {
                // document.getElementById('state').value=state_id;
                $("#state").val(state_id);
            }



            var stateval = $("#state").val();
            
            $.ajax({
                url: 'settings/getCityByStateIdByJason?state='+ stateval + '&settings=' + settings_id,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var city = response.city;
                var city_id = response.settings_city_id.city_id;

                if (city_id == null) {
                    $("#barangay").attr("disabled", true);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
                } else {
                    $("#barangay").attr("disabled", false);
                }
                
                $.each(city, function (key, value) {
                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                });

                if (city_id == null) {
                    // document.getElementById('city').value='0';
                    $("#city").val("0");
                } else {
                    document.getElementById('city').value=city_id;
                    $("#city").val(city_id);
                }

                var cityval = $("#city").val();

                $.ajax({
                    url: 'settings/getBarangayByCityIdByJason?city='+ cityval + '&settings=' + settings_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var barangay = response.barangay;
                    var barangay_id = response.settings_barangay_id.barangay_id;

                    if (barangay_id == null) {
                        $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();
                    } else {
                        $("#barangay").attr("disabled", false);
                    }
                    
                    $.each(barangay, function (key, value) {
                        $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                    });
                    
                    if (barangay_id == null) {
                        // document.getElementById('barangay').value='0';
                        $("#barangay").val("0");
                    } else {
                        // document.getElementById('barangay').value=barangay_id;
                        $("#barangay").val(barangay_id);
                    }

                }); 
            });
            
        });
    });
</script>
