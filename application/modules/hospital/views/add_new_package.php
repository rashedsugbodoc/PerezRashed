<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="row col-md-7">
            <header class="panel-heading">
                <?php
                if (!empty($package->id)) {
                    echo lang('edit_package');
                } else {
                    echo lang('add_new_package');
                }
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <?php echo validation_errors(); ?>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                        <form role="form" action="hospital/package/addNew" method="post" enctype="multipart/form-data">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo lang('package'); ?> <?php echo lang('name'); ?></label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                    if (!empty($package->name)) {
                                        echo $package->name;
                                    }
                                    ?>' placeholder="" required="">

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('limit'); ?></label>
                                    <input type="text" class="form-control" name="p_limit" id="exampleInputEmail1" value='<?php
                                    if (!empty($package->p_limit)) {
                                        echo $package->p_limit;
                                    }
                                    ?>' placeholder="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('limit'); ?></label>
                                    <input type="text" class="form-control" name="d_limit" id="exampleInputEmail1" value='<?php
                                    if (!empty($package->d_limit)) {
                                        echo $package->d_limit;
                                    }
                                    ?>' placeholder="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('location'); ?> <?php echo lang('limit'); ?></label>
                                    <input type="text" class="form-control" name="loc_limit" id="exampleInputEmail1" value='<?php
                                    if (!empty($package->loc_limit)) {
                                        echo $package->loc_limit;
                                    }
                                    ?>' placeholder="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('price'); ?> </label>
                                    <input type="text" class="form-control" name="price" id="exampleInputEmail1" value='<?php
                                    if (!empty($package->price)) {
                                        echo $package->price;
                                    }
                                    ?>' placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('platform_percentage_fee'); ?> </label>
                                    <input type="text" class="form-control" name="platform_percent_fee" id="exampleInputEmail1" value='<?php
                                    if (!empty($package->platform_percent_fee)) {
                                        echo $package->platform_percent_fee;
                                    }
                                    ?>' placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('platform_flat_fee'); ?> </label>
                                    <input type="text" class="form-control" name="platform_flat_fee" id="exampleInputEmail1" value='<?php
                                    if (!empty($package->platform_flat_fee)) {
                                        echo $package->platform_flat_fee;
                                    }
                                    ?>' placeholder="" required="">
                                </div>                                

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('show_in_frontend'); ?></label>
                                    <select class="form-control" name="show_in_frontend">
                                        <option value="Yes" <?php
                                        if (!empty($package->show_in_frontend)) {
                                            if ($package->show_in_frontend == 'Yes') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?php echo lang('yes'); ?></option>
                                        <option value="No" <?php
                                        if (!empty($package->show_in_frontend)) {
                                            if ($package->show_in_frontend == 'No') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?php echo lang('no'); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">                                    
                                    <input type="checkbox" name="set_as_default" value="1" class="" <?php
                                    if (!empty($package->set_as_default)) {
                                        if ($package->set_as_default == 1) {
                                            echo 'checked=""';
                                        }
                                    }
                                    ?>> 
                                    <label for="exampleInputEmail1"><?php echo lang('set_as_default'); ?></label>
                                </div>


                            </div>

                            <div class="col-md-6">


                                <div class="form-group"> 
                                    <label for="exampleInputEmail1"> <?php echo lang('module_permission'); ?></label>
                                    <br>
                                    <input type='checkbox' value = "accountant" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
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
                                    <input type='checkbox' value = "admin" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('admin', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('admin'); ?>

                                    <br>
                                    <input type='checkbox' value = "admission" name="module[]"  <?php
                                    if (!empty($package->id)) {
                                        if (in_array('admission', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('admission'); ?>
                                    
                                    <br>                                    
                                    <input type='checkbox' value = "appointment" name="module[]"  <?php
                                    if (!empty($package->id)) {
                                        if (in_array('appointment', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('appointment'); ?>
                                    
                                    <br>
                                    <input type='checkbox' value = "bed" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('bed', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('bed'); ?>

                                    <br>
                                    <input type='checkbox' value = "branch" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('branch', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('branch'); ?>

                                    <br>
                                    <input type='checkbox' value = "clerk" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('clerk', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('clerk'); ?>
                                    <br>
                                    <input type='checkbox' value = "casenote" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('casenote', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('case_note'); ?>
                                    <br>
                                    <input type='checkbox' value = "claim" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('claim', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('claim'); ?>
                                    <br>
                                    <input type='checkbox' value = "company" name="module[]"  <?php
                                    if (!empty($package->id)) {
                                        if (in_array('company', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('company'); ?>
                                    
                                    <br>
                                    <input type='checkbox' value = "companyuser" name="module[]"  <?php
                                    if (!empty($package->id)) {
                                        if (in_array('companyuser', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('company_user'); ?>
                                    
                                    <br>
                                    <input type='checkbox' value = "customform" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('customform', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('custom').' '.lang('form'); ?>
                                    <br>                                                                                                              
                                    <input type='checkbox' value = "department" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('department', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('department'); ?>

                                    <br>
                                    <input type='checkbox' value = "diagnosis" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('diagnosis', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('diagnosis'); ?>
                                    <br>
                                    <input type='checkbox' value = "doctor" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('doctor', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('doctor'); ?>

                                    <br>
                                    <input type='checkbox' value = "donor" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('donor', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('donor'); ?>

                                    <br>
                                    <input type='checkbox' value = "email" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('email', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('email'); ?>
                                    <br>                                    
                                    <input type='checkbox' value = "encounter" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('encounter', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('encounter'); ?>

                                    <br>                                    
                                    <input type='checkbox' value = "finance" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('finance', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('financial_activities'); ?>

                                    <br>
                                    <input type='checkbox' value = "form" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('form', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('forms_reports'); ?>

                                    <br>
                                    <input type='checkbox' value = "goal" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('goal', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('goal'); ?>
                                    <br>
                                    <input type='checkbox' value = "lab" name="module[]"  <?php
                                    if (!empty($package->id)) {
                                        if (in_array('lab', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('lab'); ?>
                                    <br>                                    
                                    <input type='checkbox' value = "laboratorist" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('laboratorist', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('laboratorist'); ?>

                                    <br>
                                    <input type='checkbox' value = "labrequest" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('labrequest', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('lab_request'); ?>
                                    <br>                                    
                                    <input type='checkbox' value = "medicine" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('medicine', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('medicine'); ?>

                                    <br>
                                    <input type='checkbox' value = "midwife" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('midwife', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('midwife'); ?>
                                    <br>                                    
                                    <input type='checkbox' value = "notice" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('notice', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('notice'); ?>


                                    <br>                                    
                                    <input type='checkbox' value = "nurse" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('nurse', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('nurse'); ?>

                                    <br>
                                    <input type='checkbox' value = "patient" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('patient', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('patient'); ?>

                                    <br>
                                    <input type='checkbox' value = "pharmacist" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('pharmacist', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('pharmacist'); ?>

                                    <br>

                                    <input type='checkbox' value = "pharmacy" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('pharmacy', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('pharmacy'); ?>

                                    <br>
                                    <input type='checkbox' value = "prescription" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('prescription', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('prescription'); ?>

                                    <br>
                                    <input type='checkbox' value = "procedure" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('procedure', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('procedure'); ?>
                                    <br>                                                                                                            
                                    <input type='checkbox' value = "receptionist" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('receptionist', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('receptionist'); ?>

                                    <br>
                                    <input type='checkbox' value = "report" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('report', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('report'); ?>


                                    <br>
                                    <input type='checkbox' value = "servicerequest" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('servicerequest', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('service_request'); ?>
                                    <br>
                                    <input type='checkbox' value = "signature" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('signature', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('signature'); ?>
                                    <br>                                    
                                    <input type='checkbox' value = "sms" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('sms', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('sms'); ?>
                                    <br>
                                    <input type='checkbox' value = "treatmentplan" name="module[]"
                                           <?php
                                           if (!empty($package->id)) {
                                               $modules = $this->package_model->getPackageById($package->id)->module;
                                               $modules1 = explode(',', $modules);
                                               if (in_array('treatmentplan', $modules1)) {
                                                   echo 'checked';
                                               }
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>
                                           > <?php echo lang('treatment').' '.lang('plan'); ?>
                                    <br>                                    
                                    <input type='checkbox' value = "vital" name="module[]" <?php
                                    if (!empty($package->id)) {
                                        if (in_array('vital', $modules1)) {
                                            echo 'checked';
                                        }
                                    } else {
                                        echo 'checked';
                                    }
                                    ?>> <?php echo lang('vital_signs'); ?>




                                </div>


                            </div>


                            <input type="hidden" name="id" value='<?php
                            if (!empty($package->id)) {
                                echo $package->id;
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
