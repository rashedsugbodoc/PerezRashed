<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('custom').' '.lang('form'); ?></h4>
                            </div>
                        </div>
                        <!--End Page header-->

                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo lang('add_new'); ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="customformForm" method="post" action="customform/addNew">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo lang('patient'); ?></label>
                                                <select class="form-control" id="pos_select" name="patient">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('family').' '.lang('profile').' '.lang('id') ?></label>
                                                <input type="text" name="family_profile_id" class="form-control" value="<?php
                                                    if (!empty($patient->family_profile_id)) {
                                                        echo $patient->family_profile_id;
                                                    } else {
                                                        echo $fpi;
                                                    }
                                                ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="is_head_banner">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Is Head of Family?</label>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="family_head_radio" value="1" <?php
                                                            if ($patient->is_family_head == 1){
                                                                echo "checked";
                                                            }
                                                            ?>>
                                                            <span class="custom-control-label">Yes</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="family_head_radio" value="0" <?php
                                                            $is_family_head = $patient->is_family_head;
                                                            if ($patient->is_family_head == null){
                                                                echo "";
                                                            } elseif ($patient->is_family_head == 0) {
                                                                echo "checked";
                                                            }
                                                            ?>>
                                                            <span class="custom-control-label">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="search_family_head" hidden>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Specify Head of Family</label>
                                                <a class="btn btn-primary" data-toggle="modal" id="search_family_head_button"><?php echo lang('select').'/'.lang('search'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="input_family_head" <?php
                                        if (empty($patient->family_head_patient_id)) {
                                            echo "hidden";
                                        }
                                    ?>>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-group">
                                                <label class="form-label">Family Head</label>
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-10">
                                                        <input type="text" name="familyhead" id="familyhead" class="form-control" value="<?php
                                                        if (!empty($patient->family_head_patient_id)) {
                                                            echo $this->patient_model->getPatientById($patient->family_head_patient_id)->name;
                                                        }
                                                        ?>" readonly>
                                                        <input type="hidden" name="familyhead_id" id="familyhead_id" value="<?php
                                                        if (!empty($patient->family_head_patient_id)) {
                                                            echo $patient->family_head_patient_id;
                                                        }
                                                        ?>">
                                                    </div>
                                                    <div class="col-md-3 col-sm-2">
                                                        <a class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Change</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Relation to Family Head</label>
                                                <select class="form-control" id="relation" name="family_head_relation">
                                                    <?php if(!empty($patient->relation_to_family_head_id)) { ?>
                                                        <option value="<?php echo $patient->relation_to_family_head_id; ?>" selected><?php echo $this->patient_model->getPatientRelationToHeadById($patient->relation_to_family_head_id)->display_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Philhealth ID</label>
                                                <input type="text" name="philhealth" class="form-control" value="<?php
                                                    if (!empty($patient->national_healthcare_id)) {
                                                        echo $patient->national_healthcare_id;
                                                    }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">NHTS ID</label>
                                                <input type="text" name="nhts" class="form-control" value="<?php
                                                    if (!empty($patient->nhts_id)) {
                                                        echo $patient->nhts_id;
                                                    }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('first_name'); ?> <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="f_name" placeholder="First Name" maxlength="100" required value="<?php
                                                    if (!empty($setval)) {
                                                    echo set_value('f_name');
                                                    }
                                                    elseif (!empty($patient->firstname)) {
                                                        echo $patient->firstname;
                                                    }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('middle_name'); ?></label>
                                                <input type="text" class="form-control" name="m_name" placeholder="Middle Name" maxlength="100" value="<?php
                                                if (!empty($setval)) {
                                                echo set_value('m_name');
                                                }
                                                elseif (!empty($patient->middlename)) {
                                                    echo $patient->middlename;
                                                }
                                                ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('last_name'); ?> <span class="text-red">*</span></label>
                                                
                                                <input type="text" class="form-control" name="l_name" placeholder="Last Name" maxlength="100" required value="<?php
                                                    if (!empty($setval)) {
                                                    echo set_value('l_name');
                                                    }
                                                    elseif (!empty($patient->lastname)) {
                                                        echo $patient->lastname;
                                                    }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('suffix'); ?></label>
                                                <select class="form-control select2-show-search br-0 nice-select br-tl-0 br-bl-0" name="suffix">
                                                    <option value="0" ><?php echo lang('none'); ?></option>
                                                    <option value="Jr." <?php if(set_value('suffix')=='Jr.') { echo 'selected';} elseif ($patient->suffix ==='Jr.') { echo 'selected'; } ?>><?php echo lang('jr'); ?></option>
                                                    <option value="Sr." <?php if(set_value('suffix')=='Sr.') { echo 'selected';} elseif ($patient->suffix ==='Sr.') { echo 'selected'; } ?>><?php echo lang('sr'); ?></option>
                                                    <option value="I" <?php if(set_value('suffix')=='I') { echo 'selected';} elseif ($patient->suffix ==='I') { echo 'selected'; } ?>><?php echo lang('i'); ?></option>
                                                    <option value="II" <?php if(set_value('suffix')=='II') { echo 'selected';} elseif ($patient->suffix ==='II') { echo 'selected'; } ?>><?php echo lang('ii'); ?></option>
                                                    <option value="III" <?php if(set_value('suffix')=='III') { echo 'selected';} elseif ($patient->suffix ==='III') { echo 'selected'; } ?>><?php echo lang('iii'); ?></option>
                                                    <option value="IV" <?php if(set_value('suffix')=='IV') { echo 'selected';} elseif ($patient->suffix ==='IV') { echo 'selected'; } ?>><?php echo lang('iv'); ?></option>
                                                    <option value="V" <?php if(set_value('suffix')=='V') { echo 'selected';} elseif ($patient->suffix ==='V') { echo 'selected'; } ?>><?php echo lang('v'); ?></option>
                                                    <option value="VI" <?php if(set_value('suffix')=='VI') { echo 'selected';} elseif ($patient->suffix ==='VI') { echo 'selected'; } ?>><?php echo lang('vi'); ?></option>
                                                    <option value="VII" <?php if(set_value('suffix')=='VII') { echo 'selected';} elseif ($patient->suffix ==='VII') { echo 'selected'; } ?>><?php echo lang('vii'); ?></option>
                                                    <option value="VIII" <?php if(set_value('suffix')=='VIII') { echo 'selected';} elseif ($patient->suffix ==='VIII') { echo 'selected'; } ?>><?php echo lang('viii'); ?></option>
                                                    <option value="IX" <?php if(set_value('suffix')=='IX') { echo 'selected';} elseif ($patient->suffix ==='IX') { echo 'selected'; } ?>><?php echo lang('ix'); ?></option>
                                                    <option value="X" <?php if(set_value('suffix')=='X') { echo 'selected';} elseif ($patient->suffix ==='X') { echo 'selected'; } ?>><?php echo lang('x'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('email'); ?><span class="text-red">*</span></label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" maxlength="100" required value="<?php
                                                if (!empty($setval)) {
                                                    echo set_value('email');
                                                }
                                                elseif (!empty($patient->email)) {
                                                    echo $patient->email;
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('mobile_number'); ?> <span class="text-red">*</span></label>
                                                <input id="mobile" name="mobile" class="form-control" type="tel" required>
                                                <input type="hidden" name="phone" id="phone">
                                                <span id="error-msg" class="hide"></span>
                                                <span id="valid-msg" class="hide"> Valid</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('birth_date'); ?> <span class="text-red">*</span></label>
                                                <input class="form-control flatpickr" placeholder="<?php echo lang('select').' '. lang('date');?>" name="birthdate" type="text" maxlength="100" required readonly value="<?php
                                                if (!empty($setval)) {
                                                    echo set_value('birthdate');
                                                }
                                                elseif (!empty($patient->birthdate)) {
                                                    echo $patient->birthdate;
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('address'); ?> <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo lang('street_address_placeholder');?>" name="address" required maxlength="100" value="<?php
                                                if (!empty($setval)) {
                                                    echo set_value('address');
                                                }
                                                elseif (!empty($patient->address)) {
                                                    echo $patient->address;
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('sex'); ?> <span class="text-red">*</span></label>
                                                <select class="form-control select2-show-search" name="sex" data-placeholder="Choose one" required>
                                                    <option label="Choose One"></option>
                                                    <option value="male" <?php
                                                    if (!empty($setval)) {
                                                        if (set_value('sex') == 'male') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    elseif (!empty($patient->sex)) {
                                                        if ($patient->sex == 'male') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > Male </option>
                                                    <option value="female" <?php
                                                    if (!empty($setval)) {
                                                        if (set_value('sex') == 'female') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    elseif (!empty($patient->sex)) {
                                                        if ($patient->sex == 'female') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > Female </option>
                                                    <option value="other" <?php
                                                    if (!empty($setval)) {
                                                        if (set_value('sex') == 'other') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    elseif (!empty($patient->sex)) {
                                                        if ($patient->sex == 'other') {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo lang('other'); ?> </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('civil_status') ?> <span class="text-red">*</span></label>
                                                <select class="form-control select2-show-search" name="civil_status" data-placeholder="Choose one" required>
                                                    <option label="Choose One"></option>
                                                    <?php foreach ($civil_status as $civil) { ?>
                                                        <option value="<?php echo $civil->name ?>" <?php
                                                            if (!empty($setval)) {
                                                                echo set_value('civil_status');
                                                            }
                                                            elseif ($patient->civil_status == $civil->name) {
                                                                echo 'selected';
                                                            }
                                                        ?>> <?php echo $civil->display_name ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('educational').' '.lang('attainment') ?></label>
                                                <select class="form-control" id="educational_attainment" name="educational_attainment">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('religion'); ?> <span class="text-red">*</span></label>
                                                <select class="form-control select2-show-search" id="religion" name="religion" data-placeholder="Choose one" required>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('height'); ?></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="height">
                                                    <div class="input-group-append br-tl-0 br-bl-0">
                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="height_unit">
                                                            <option value="cm"><?php echo lang('cm'); ?></option>
                                                            <option value="inches"><?php echo lang('inches'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('weight'); ?></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="weight">
                                                    <div class="input-group-append br-tl-0 br-bl-0">
                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="weight_unit">
                                                            <option value="kg"><?php echo lang('kg'); ?></option>
                                                            <option value="lbs"><?php echo lang('lbs'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('barangay') ?></label>
                                                <select class="form-control" name="barangay" id="barangay">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('safe').' '.lang('water').' '.lang('supply'); ?></label>
                                                <div class="row" id="search_safe_water_supply" <?php
                                                    if (!empty($patient->safe_water_supply_level_id)) {
                                                        echo "hidden";
                                                    }
                                                ?>>
                                                    <div class="col-md-12 col-sm-12">
                                                        <a class="btn btn-primary w-100" data-toggle="modal" data-target="#myModal2"><?php echo lang('select'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="row" id="input_safe_water_supply" <?php
                                                    if (empty($patient->safe_water_supply_level_id)) {
                                                        echo "hidden";
                                                    }
                                                ?>>
                                                    <div class="col-md-9 col-sm-10">
                                                        <div class="input-group">
                                                            <input type="text" name="safe_water_supply_text" id="safe_water_supply_text" class="form-control" value="<?php
                                                                if (!empty($patient->safe_water_supply_level_id)) {
                                                                    echo $this->patient_model->getSafeWaterSupplyById($patient->safe_water_supply_level_id)->display_name;
                                                                }
                                                            ?>">
                                                            <input type="hidden" name="safe_water_supply" id="safe_water_supply" class="form-control" value="<?php
                                                                if (!empty($patient->safe_water_supply_level_id)) {
                                                                    echo $patient->safe_water_supply_level_id;
                                                                }
                                                            ?>">
                                                            <button class="btn btn-light" id="safe_water_description" data-container="body" data-content="<?php
                                                            if (!empty($patient->safe_water_supply_level_id)) {
                                                                echo $this->patient_model->getSafeWaterSupplyById($patient->safe_water_supply_level_id)->description;
                                                            }
                                                            ?>" data-placement="top" data-popover-color="primary" title="<?php
                                                            if (!empty($patient->safe_water_supply_level_id)) {
                                                                echo $this->patient_model->getSafeWaterSupplyById($patient->safe_water_supply_level_id)->display_name;
                                                            }
                                                            ?>" type="button"><i class="fa fa-question-circle-o"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-2">
                                                        <a class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Change</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('sanitary').' '.lang('toilet'); ?></label>
                                                <select class="form-control" id="sanitary_toilet" name="sanitary_toilet">
                                                    <?php if(!empty($patient->sanitary_toilet_id)) { ?>
                                                        <option value="<?php echo $patient->sanitary_toilet_id; ?>" selected><?php echo $this->patient_model->getSanitaryToiletById($patient->sanitary_toilet_id)->display_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('sexually').' '.lang('active'); ?></label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="sexually_active" value="1" <?php
                                                            if ($patient->is_sexually_active == 1){
                                                                echo "checked";
                                                            }
                                                            ?>>
                                                            <span class="custom-control-label">Yes</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="sexually_active" value="0" <?php
                                                            if ($patient->is_sexually_active == null){
                                                                echo "";
                                                            } elseif ($patient->is_sexually_active == 0) {
                                                                echo "checked";
                                                            }
                                                            ?>>
                                                            <span class="custom-control-label">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php /*if ($patient->sex === "female") {*/ ?>
                                            <?php /*if ($patient_age_year >= 10 && $patient_age_year <= 49) {*/ ?>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group" id="unmet_need_div">
                                                        <label class="form-label"><?php echo lang('unmet').' '.lang('need'); ?></label>
                                                        <div class="row" id="search_unmet_need" <?php
                                                            if (!empty($patient->unmet_need_id)) {
                                                                echo "hidden";
                                                            }
                                                        ?>>
                                                            <div class="col-md-12 col-sm-12">
                                                                <a class="btn btn-primary w-100" data-toggle="modal" data-target="#myModal3"><?php echo lang('select'); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="row" id="input_unmet_need" <?php
                                                            if (empty($patient->unmet_need_id)) {
                                                                echo "hidden";
                                                            }
                                                        ?>>
                                                            <div class="col-md-9 col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" name="unmet_need_text" id="unmet_need_text" class="form-control" value="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $this->patient_model->getUnmetNeedById($patient->unmet_need_id)->display_name;
                                                                        }
                                                                    ?>">
                                                                    <input type="hidden" name="unmet_need" id="unmet_need" class="form-control" value="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $patient->unmet_need_id;
                                                                        }
                                                                    ?>">
                                                                    <button class="btn btn-light" id="unmet_need_description" data-container="body" data-content="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $this->patient_model->getUnmetNeedById($patient->unmet_need_id)->description;
                                                                        }
                                                                    ?>" data-placement="top" data-popover-color="primary" title="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $this->patient_model->getUnmetNeedById($patient->unmet_need_id)->display_name;
                                                                        }
                                                                    ?>" type="button"><i class="fa fa-question-circle-o"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-2">
                                                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal3">Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php /*}*/ ?>
                                        <?php /*}*/ ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <h3>AVAILMENT</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Cancer</label>
                                                <select class="form-control illness" name="cancer">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Hypertension</label>
                                                <select class="form-control illness" name="hypertension">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Diabetes</label>
                                                <select class="form-control illness" name="diabetes">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mental Health</label>
                                                <select class="form-control illness" name="mental_health">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Tuberculosis</label>
                                                <select class="form-control illness" id="tuberculosis" name="tuberculosis">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Cardiovascular</label>
                                                <select class="form-control illness" name="cardiovascular">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">COVID</label>
                                                <select class="form-control covid" name="covid">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('pwd'); ?></label>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="pwd" value="1">
                                                            <span class="custom-control-label">Yes</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="pwd" value="0">
                                                            <span class="custom-control-label">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo lang('deceased'); ?></label>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="deceased" value="1">
                                                            <span class="custom-control-label">Yes</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="deceased" value="0">
                                                            <span class="custom-control-label">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('search').' '.lang('profile'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform1" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('family').' '.lang('profile').' '.lang('id'); ?></label>
                                                        <input type="text" name="profile_id_search" id="profile_id_search" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('first_name'); ?></label>
                                                        <input type="text" name="f_name_search" id="f_name_search" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('middle_name'); ?></label>
                                                        <input type="text" name="m_name_search" id="m_name_search" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('last_name'); ?></label>
                                                        <input type="text" name="l_name_search" id="l_name_search" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <a class="btn btn-primary pull-right" id="search" name="submit"><?php echo lang('search'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="searchResult">

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group" id="result_ok_btn">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('safe').' '.lang('water').' '.lang('supply'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform2" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php foreach($safe_water_supply as $sws) { ?>
                                                <div class="row mb-5 safe_water_item" data-id="<?php echo $sws->id; ?>" data-name="<?php echo $sws->display_name; ?>" data-description="<?php echo $sws->description; ?>">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a class="btn btn-success w-100">
                                                            <div class="row text-left">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="container">
                                                                            <label class="form-label font-weight-bold text-wrap"><?php echo $sws->display_name; ?></label>
                                                                            <label class="form-label text-wrap"><?php echo $sws->description; ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('unmet').' '.lang('need'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform3" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php foreach($unmet_need as $un) { ?>
                                                <div class="row mb-5 unmet_need_item" data-id="<?php echo $un->id; ?>" data-name="<?php echo $un->display_name; ?>" data-description="<?php echo $un->description; ?>">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a class="btn btn-success w-100">
                                                            <div class="row text-left">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="container">
                                                                            <label class="form-label font-weight-bold text-wrap"><?php echo $un->display_name; ?></label>
                                                                            <label class="form-label text-wrap"><?php echo $un->description; ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">These are family members associated with you as head: </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform4" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">These are family members associated with you as head: </label>
                                                        <div class="container">
                                                            <ul class="list-group" id="family_member_list">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>They will have to remove you as head first.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
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
        <script src="<?php echo base_url('common/assets/intl-tel-input/build/js/intlTelInput.js');?>"></script>

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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script>
        $('#customformForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function (response) {
            var customform = $("#customformForm").find('[name=id]').val();
            if (customform != "") {
                $.ajax({
                    url: 'customform/editTsekapByJason?id='+customform,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var patients = response.patients;
                        var patient = response.patient;

                        $.each(patients, function(key, value) {
                            $("#customformForm").find('[name=patient]').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        $("#customformForm").find('[name=patient]').val(patient).trigger('change');
                    }
                });
            }
        });
    </script>

    <script type="text/javascript">
        flatpickr(".flatpickr", {
            altInput: true,
            altFormat: "F j, Y",
            maxDate: "today",
            disableMobile: true
        });
    </script>

    <script type="text/javascript">
        $('#pos_select').change(function() {
            var patient = $("#pos_select").val();
            $.ajax({
                url: 'customform/getCustomFormInfoByPatient?id='+patient,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patient_info = response.patient_details;
                    var patient_vital_info = response.patient_vitals;
                    var patient_medication_history = response.medical_history;

                    $("#customformForm").find('[name=family_profile_id]').val(patient_info.family_profile_id);
                    $("#customformForm").find('[name=philhealth]').val(patient_info.national_healthcare_id);
                    $("#customformForm").find('[name=nhts]').val(patient_info.nhts_id);
                    $("#customformForm").find('[name=f_name]').val(patient_info.firstname);
                    $("#customformForm").find('[name=m_name]').val(patient_info.middlename);
                    $("#customformForm").find('[name=l_name]').val(patient_info.lastname);
                    $("#customformForm").find('[name=suffix]').val(patient_info.suffix).change();
                    $("#customformForm").find('[name=email]').val(patient_info.email);
                    $("#customformForm").find('[name=mobile]').val(patient_info.phone);
                    $($("#customformForm").find('[name=birthdate]')).flatpickr({
                        dateFormat: "F j, Y h:i K",
                        defaultDate: response.patient_bdate,
                    });
                    $("#customformForm").find('[name=address]').val(patient_info.address);
                    $("#customformForm").find('[name=sex]').val(patient_info.sex).change();
                    $("#customformForm").find('[name=civil_status]').val(patient_info.civil_status).change();

                    $("#educational_attainment").find('option').remove();
                    $("#religion").find('option').remove();

                    $.each(response.educational_attainment, function(key, value) {
                        if (value.id == patient_info.educational_attainment_id) {
                            $("#educational_attainment").append($('<option selected>').text(value.display_name).val(value.id)).end();
                        } else {
                            $("#educational_attainment").append($('<option>').text(value.display_name).val(value.id)).end();
                        }
                    });

                    $("#educational_attainment").val(patient_info.educational_attainment_id).change();

                    $.each(response.religion, function(key, value) {
                        if (value.id == patient_info.religion_id) {
                            $("#religion").append($('<option selected>').text(value.display_name).val(value.id)).end();
                        } else {
                            $("#religion").append($('<option>').text(value.display_name).val(value.id)).end();
                        }
                    });

                    $.each(response.barangays, function(key, value) {
                        if (value.id == patient_info.barangay_id) {
                            $("#customformForm").find('[name=barangay]').append($('<option selected>').text(value.name).val(value.id)).end();
                        } else {
                            $("#customformForm").find('[name=barangay]').append($('<option>').text(value.name).val(value.id)).end();
                        }
                    });

                    $("#religion").val(patient_info.religion_id).change();
                    $("#customformForm").find('[name=height]').val(patient_vital_info.height_cm);
                    $("#customformForm").find('[name=weight]').val(patient_vital_info.weight_kg);
                    var is_head = patient_info.is_family_head;
                    var family_head = patient_info.family_head_patient_id;

                    if (is_head == 1) {
                        $("input:radio[name=family_head_radio]:first").attr('checked', true);
                        $("#input_family_head").attr('hidden', true);
                        $("#familyhead").val("").end();
                        $("#familyhead_id").val("").end();
                        $("#relation").val("").change();
                    } else if (is_head == 0) {
                        $("input:radio[name=family_head_radio]:last").attr('checked', true);
                        if (family_head != null) {
                            $("#input_family_head").attr('hidden', false);
                            $("#familyhead").val(response.family_head).end();
                            $("#familyhead_id").val(family_head).end();
                            $.each(response.relation, function(key, value) {
                                if (value.id == patient_info.relation_to_family_head_id) {
                                    $("#relation").append($('<option selected>').text(value.display_name).val(value.id)).end();
                                } else {
                                    $("#relation").append($('<option>').text(value.display_name).val(value.id)).end();
                                }
                            });
                        } else {
                            $("#search_family_head").attr('hidden', false);
                        }
                    } else {

                    }

                    $.each(response.sanitary_toilet, function(key, value) {
                        if (value.id == patient_info.sanitary_toilet_id) {
                            $("#sanitary_toilet").append($('<option selected>').text(value.display_name).val(value.id)).end();
                        } else {
                            $("#sanitary_toilet").append($('<option>').text(value.display_name).val(value.id)).end();
                        }
                    });

                    var is_sexually_active = patient_info.is_sexually_active;
                    var is_pwd = patient_info.is_pwd;
                    var is_deceased = patient_info.is_deceased;

                    if (is_sexually_active == 1) {
                        $("input:radio[name=sexually_active]:first").attr('checked', true);
                    } else if (is_sexually_active == 0) {
                        $("input:radio[name=sexually_active]:last").attr('checked', true);
                    } else {

                    }

                    if (is_pwd == 1) {
                        $("input:radio[name=pwd]:first").attr('checked', true);
                    } else if (is_pwd == 0) {
                        $("input:radio[name=pwd]:last").attr('checked', true);
                    } else {

                    }

                    if (is_deceased == 1) {
                        $("input:radio[name=deceased]:first").attr('checked', true);
                    } else if (is_deceased == 0) {
                        $("input:radio[name=deceased]:last").attr('checked', true);
                    } else {

                    }                    
                    
                    var safe_water_id = patient_info.safe_water_supply_level_id;
                    if (patient_info.safe_water_supply_level_id != "") {
                        var safe_water_text = response.safe_water_supply_display_name;
                        var safe_water_id_value = response.safe_water_supply_id;
                        var safe_water_description = response.safe_water_supply_description;
                        var safe_water_name = response.safe_water_supply_name;
                    }


                    if (safe_water_id != null) {
                        $("#search_safe_water_supply").attr('hidden', true);
                        $("#input_safe_water_supply").attr('hidden', false);
                        $("#safe_water_supply_text").val(safe_water_text).end();
                        $("#safe_water_supply").val(safe_water_id_value).end();
                        $("#safe_water_description").attr("data-content", safe_water_description);
                        $("#safe_water_description").attr("data-original-title", safe_water_name);
                    } else if (safe_water_id == null) {
                        $("#input_safe_water_supply").attr('hidden', true);
                        $("#search_safe_water_supply").attr('hidden', false);
                    } else {
                        $("#input_safe_water_supply").attr('hidden', true);
                        $("#search_safe_water_supply").attr('hidden', false);
                    }

                    var unmet_need_id = patient_info.unmet_need_id;
                    if (unmet_need_id != "") {
                        var unmet_need_text = response.unmet_need_display_name;
                        var unmet_need_id_value = response.unmet_need_id;
                        var unmet_need_description = response.unmet_need_description;
                        var unmet_need_name = response.unmet_need_name;
                    }

                    if (patient_info.sex == "female") {
                        if (response.patient_age_year >= <?php echo TSEKAP_SEXUALHEALTH_FEMALEAGE_MINIMUM; ?> && response.patient_age_year <= <?php echo TSEKAP_SEXUALHEALTH_FEMALEAGE_MAXIMUM; ?>) {
                            $("#unmet_need_div").attr('hidden', false);
                            if (unmet_need_id != null) {
                                $("#search_unmet_need").attr('hidden', true);
                                $("#input_unmet_need").attr('hidden', false);
                                $("#unmet_need_text").val(unmet_need_text).end();
                                $("#unmet_need").val(unmet_need_id_value).end();
                                $("#unmet_need_description").attr("data-content", unmet_need_description);
                                $("#unmet_need_description").attr("data-original-title", unmet_need_name);
                            } else if (unmet_need_id == null) {
                                $("#input_unmet_need").attr('hidden', true);
                                $("#search_unmet_need").attr('hidden', false);
                            } else {
                                $("#input_unmet_need").attr('hidden', true);
                                $("#search_unmet_need").attr('hidden', false);
                            }
                        } else {
                            $("#unmet_need_div").attr('hidden', true);
                        }
                    } else {
                        $("#unmet_need_div").attr('hidden', true);
                    }

                    // $("#customformForm").find('[name=cancer]').find('option').remove();
                    // $("#customformForm").find('[name=hypertension]').find('option').remove();
                    // $("#customformForm").find('[name=diabetes]').find('option').remove();
                    // $("#customformForm").find('[name=mental_health]').find('option').remove();
                    // $("#tuberculosis").find('option').remove();

                    if (response.medical_history != false) {
                        $.each(response.diseases, function(key, value) {
                            if (value.id == patient_medication_history.tsekap_medication_availment_cancer_status) {
                                $("#customformForm").find('[name=cancer]').append($('<option selected>').text(value.display_name).val(value.id)).end();
                            } else {
                                $("#customformForm").find('[name=cancer]').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                            if (value.id == patient_medication_history.tsekap_medication_availment_hypertension_status) {
                                $("#customformForm").find('[name=hypertension]').append($('<option selected>').text(value.display_name).val(value.id)).end();
                            } else {
                                $("#customformForm").find('[name=hypertension]').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                            if (value.id == patient_medication_history.tsekap_medication_availment_diabetes_status) {
                                $("#customformForm").find('[name=diabetes]').append($('<option selected>').text(value.display_name).val(value.id)).end();
                            } else {
                                $("#customformForm").find('[name=diabetes]').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                            if (value.id == patient_medication_history.tsekap_medication_availment_mentalhealth_status) {
                                $("#customformForm").find('[name=mental_health]').append($('<option selected>').text(value.display_name).val(value.id)).end();
                            } else {
                                $("#customformForm").find('[name=mental_health]').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                            if (value.id == patient_medication_history.tsekap_medication_availment_tuberculosis_status) {
                                $("#customformForm").find('[name=tuberculosis]').append($('<option selected>').text(value.display_name).val(value.id)).end();
                            } else {
                                $("#customformForm").find('[name=tuberculosis]').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                            if (value.id == patient_medication_history.tsekap_medication_availment_cardiovasculardisease_status) {
                                $("#customformForm").find('[name=cardiovascular]').append($('<option selected>').text(value.display_name).val(value.id)).end();
                            } else {
                                $("#customformForm").find('[name=cardiovascular]').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                        });
                    } else {
                        // $(".illness").select2({
                        //     placeholder: 'Select Status',
                        //     allowClear: true,
                        //     ajax: {
                        //         url: 'customform/getDiseasesInfo',
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
                        $.each(response.diseases, function(key, value) {
                            $("#customformForm").find('[name=cancer]').append($('<option>').text(value.display_name).val(value.id)).end();
                            $("#customformForm").find('[name=hypertension]').append($('<option>').text(value.display_name).val(value.id)).end();
                            $("#customformForm").find('[name=diabetes]').append($('<option>').text(value.display_name).val(value.id)).end();
                            $("#customformForm").find('[name=mental_health]').append($('<option>').text(value.display_name).val(value.id)).end();
                            $("#customformForm").find('[name=tuberculosis]').append($('<option>').text(value.display_name).val(value.id)).end();
                            $("#customformForm").find('[name=cardiovascular]').append($('<option>').text(value.display_name).val(value.id)).end();
                        });
                    }


                    if (response.medical_history != false) {
                        $.each(response.covid_status, function(key, value) {
                            if (value.id == patient_medication_history.covid_status_id) {
                                $("#customformForm").find('[name=covid]').append($('<option selected>').text(value.display_name).val(value.id)).end();
                            } else {
                                $("#customformForm").find('[name=covid]').append($('<option>').text(value.display_name).val(value.id)).end();
                            }
                        });
                    } else {
                        $(".covid").select2({
                            placeholder: 'Select Status',
                            allowClear: true,
                            ajax: {
                                url: 'customform/getCovidInfo',
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

                    // alert(patient_medication_history.tsekap_medication_availment_mentalhealth_status);
                }
            });
        })
    </script>

    <script type="text/javascript">
        $('#search_family_head_button').click(function() {
            var family_profile = $("#customformForm").find('[name=family_profile]').val();
            $.ajax({
                url: 'patient/checkFamilyHead?id='+ family_profile,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var family_member_count = response.family_number_count;
                    if (family_member_count <= 1) {
                        $('#myModal1').modal('show');
                    } else {
                        $.each(response.patient_list, function(key, value) {
                            $("#family_member_list").append('\n\
                                <li class="listunorder">'+value.name+' ( Patient ID: ' + value.patient_id + ' ) ' +'</li>\n\
                            ');
                        });
                        $('#myModal4').modal('show');
                    }
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#search").click(function() {
                $("#results").remove();
                $("#search_ok_result").remove();
                var profile_id = $("#profile_id_search").val();
                var f_name = $("#f_name_search").val();
                var m_name = $("#m_name_search").val();
                var l_name = $("#l_name_search").val();
                $.ajax({
                    url: 'patient/searchFamilyHead?id='+profile_id+'&f_name='+f_name+'&m_name='+m_name+'&l_name='+l_name,
                    method: 'POST',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var family_head = response.family_head;

                        console.log(family_head);

                        if (family_head == null) {
                            $("#searchResult").append('<div class="row" id="results"><div class="col-md-12"><div class="form-group">\n\
                                <label class="form-label font-weight-bold"><h3>0 Result Found</h3></label>\n\
                            </div></div></div>')
                        } else {
                            $("#searchResult").append('<div class="row" id="results"><div class="col-md-12"><div class="form-group">\n\
                                    <label class="form-label font-weight-bold"><h3>Found: </h3></label>\n\
                                    <label><h5>'+family_head.name+'</h5></label><br>\n\
                                    <label><h5>Family Profile ID: '+family_head.family_profile_id+'<h5></label>\n\
                                </div></div></div>');
                            $("#result_ok_btn").append('<a class="btn btn-primary pull-right" id="search_ok_result">Ok</a>');

                            $("#search_ok_result").click(function() {
                                $("#search_family_head").attr("hidden", true);
                                $('#myModal1').modal('hide');
                                $("#input_family_head").attr("hidden", false);
                                $("#customformForm").find('[name=familyhead]').attr("readonly", true);
                                $("#customformForm").find('[name=familyhead]').val(family_head.name+'('+family_head.family_profile_id+')');
                                $("#customformForm").find('[name=familyhead_id]').val(family_head.id);
                            });
                        }
                    }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type=radio][name=family_head_radio]').change(function() {
                var is_head = this.value;
                console.log(is_head);
                if (is_head == "0") {
                    $("#search_family_head").attr("hidden", false);
                } else {
                    $("#search_family_head").attr("hidden", true);
                    $("#input_family_head").attr("hidden", true);
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(".safe_water_item").click(function () {
            var safe_water_id = $(this).data("id");
            var safe_water_name = $(this).data("name");
            var safe_water_description = $(this).data("description");
            $("#search_safe_water_supply").attr("hidden", true);
            $("#input_safe_water_supply").attr("hidden", false);
            $("#safe_water_supply").attr("readonly", true);
            $("#safe_water_supply").val(safe_water_id);
            $("#safe_water_supply_text").attr("readonly", true);
            $("#safe_water_supply_text").val(safe_water_name);
            $("#safe_water_description").attr("data-content", safe_water_description);
            $("#safe_water_description").attr("data-original-title", safe_water_name);
            $('#myModal2').modal('hide');
        })
    </script>

    <script type="text/javascript">
        $(".unmet_need_item").click(function () {
            var unmet_need_id = $(this).data("id");
            var unmet_need_name = $(this).data("name");
            var unmet_need_description = $(this).data('description');
            $("#search_unmet_need").attr("hidden", true);
            $("#input_unmet_need").attr("hidden", false);
            $("#unmet_need").attr("readonly", true);
            $("#unmet_need").val(unmet_need_id);
            $("#unmet_need_text").attr("readonly", true);
            $("#unmet_need_description").attr("data-content", unmet_need_description);
            $("#unmet_need_description").attr("data-original-title", unmet_need_name);
            $("#unmet_need_text").val(unmet_need_name);
            $('#myModal3').modal('hide');
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#educational_attainment").select2({
                placeholder: 'Search Educational Attainment',
                allowClear: true,
                ajax: {
                    url: 'patient/getEducationalAttainmentInfo',
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

            $("#religion").select2({
                placeholder: 'Search Religion',
                allowClear: true,
                ajax: {
                    url: 'patient/getReligionInfo',
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

            $("#sanitary_toilet").select2({
                placeholder: 'Search Sanitary Toilet',
                allowClear: true,
                ajax: {
                    url: 'patient/getSanitaryToiletInfo',
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

            $(".illness").select2({
                placeholder: 'Select Status',
                allowClear: true,
                // ajax: {
                //     url: 'customform/getDiseasesInfo',
                //     type: "post",
                //     dataType: 'json',
                //     delay: 250,
                //     data: function (params) {
                //         return {
                //             searchTerm: params.term // search term
                //         };
                //     },
                //     processResults: function (response) {
                //         return {
                //             results: response
                //         };
                //     },
                //     cache: true
                // }

            });

            $(".covid").select2({
                placeholder: 'Select Status',
                allowClear: true,
                // ajax: {
                //     url: 'customform/getCovidInfo',
                //     type: "post",
                //     dataType: 'json',
                //     delay: 250,
                //     data: function (params) {
                //         return {
                //             searchTerm: params.term // search term
                //         };
                //     },
                //     processResults: function (response) {
                //         return {
                //             results: response
                //         };
                //     },
                //     cache: true
                // }

            });

            $("#relation").select2({
                placeholder: 'Search Relation to Family Head',
                allowClear: true,
                ajax: {
                    url: 'patient/getRelationInfo',
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

            $("#pos_select").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    // url: 'patient/getPatientinfo',
                    url: 'patient/getPatientInfoByVisitedProviderId',
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

            $("#barangay").select2({
                placeholder: 'Search Barangay',
                allowClear: true,
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var input = document.querySelector("#mobile");
            var errorMsg = document.querySelector("#error-msg");
            var validMsg = document.querySelector("#valid-msg");
            var form = document.getElementById("patientForm");

            // here, the index maps to the error code returned from getValidationError - see readme
            var errorMap = ["Invalid mobile number", "Invalid country code", "Too short", "Too long", "Invalid mobile number", "Invalid length"];

            // initialise plugin
            var iti = window.intlTelInput(input, {
                hiddenInput: "full_number",
                preferredCountries: ['ph', 'sg', 'us'],
                utilsScript: "<?php echo base_url('common/assets/intl-tel-input/build/js/utils.js?1638200991544');?>"
            });

            var reset = function() {
              input.classList.remove("parsley-error");
              input.classList.remove("is-valid");
              errorMsg.innerHTML = "";
              errorMsg.classList.add("hide");
              validMsg.classList.add("hide");
            };

            var execute = function() {
              reset();
              document.getElementById("phone").value = iti.getNumber();
              if (input.value.trim()) {
                if (iti.isValidNumber()) {
                  validMsg.classList.remove("hide");
                  input.classList.add("is-valid");
                } else {
                  input.classList.add("parsley-error");
                  input.classList.remove("is-valid");
                  var errorCode = iti.getValidationError();
                  errorMsg.innerHTML = errorMap[errorCode];
                  errorMsg.classList.remove("hide");
                }
              }
            };

            // on blur: validate
            input.addEventListener('blur', execute);
            form.addEventListener('submit', execute);
            // on keyup / change flag: reset
            input.addEventListener('change', reset);
            input.addEventListener('keyup', reset);
        });
        
    </script>

    </body>
</html>