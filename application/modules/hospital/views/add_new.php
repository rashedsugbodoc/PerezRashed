
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
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                            <form role="form" action="hospital/addNew" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('healthcare_provider_type'); ?></label>
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
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('healthcare_institution_name'); ?></label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                        if (!empty($hospital->name)) {
                                            echo $hospital->name;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('package'); ?></label>
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                        if (!empty($hospital->email)) {
                                            echo $hospital->email;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                        if (!empty($hospital->address)) {
                                            echo $hospital->address;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                        if (!empty($hospital->phone)) {
                                            echo $hospital->phone;
                                        }
                                        ?>' placeholder="">                                        
                                    </div>
                                </div>
                                <?php
                                if (!empty($hospital->id)) {
                                    $this->db->where('hospital_id', $hospital->id);
                                    $settings = $this->db->get('settings')->row();
                                }
                                ?>
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
                                        <label for="timezone"><?php echo lang('timezone');?></label>
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
                                </div>
                                <div class="row">
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
                                            ?>' placeholder="Example: 1000" required="">
                                        </div>
                                        <div class="form-group pos_client">
                                            <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('limit'); ?></label>
                                            <input type="text" class="form-control" name="d_limit" id="exampleInputEmail1" value='<?php
                                            if (!empty($hospital->d_limit)) {
                                                echo $hospital->d_limit;
                                            } else {
                                                echo '500';
                                            }
                                            ?>' placeholder="Example: 1000" required="">
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
                                            <input type='checkbox' value = "lab" name="module[]"  <?php
                                            if (!empty($hospital->id)) {
                                                if (in_array('lab', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('lab_tests'); ?>
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


                                        </div>

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