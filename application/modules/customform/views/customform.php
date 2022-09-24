<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <style>
                            .customform_type {
                                cursor: pointer;
                            }
                        </style>

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('custom').' '.lang('form'); ?></h4>
                            </div>
                        </div>
                        <!--End Page header-->

                        <div class="row">
                            <div class="col-lg-4 col-xl-3 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                                        <?php
                                            $user = $this->ion_auth->get_user_id();
                                            if ($this->ion_auth->in_group(array('Doctor'))) {
                                                $doctor_id = $this->doctor_model->getDoctorByIonUserId($user)->id;
                                            }
                                        ?>
                                        <?php foreach($customform_types as $cft) { ?>
                                            <a id="<?php echo $cft->name ?>" class="list-group-item list-group-item-action d-flex align-items-center customform_type" data-id="<?php echo $cft->id; ?>" data-method="<?php echo $cft->method_name; ?>" data-name="<?php echo $cft->name; ?>" data-displayname="<?php echo $cft->display_name; ?>">
                                                <svg class="svg-icon mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg> <?php echo $cft->display_name; ?> <span class="ml-auto badge badge-success"><?php echo $this->customform_model->getCustomByTypeCount($cft->id, $doctor_id); ?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('custom').' '.lang('form'); ?>
                                        </div>
                                        <div class="card-options">
                                            <a id="customAddNew" class="btn btn-primary"><?php echo lang('add_new'); ?></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('reference').' '.lang('number'); ?></th>
                                                            <th><?php echo lang('version'); ?></th>
                                                            <th><?php echo lang('patient'); ?></th>
                                                            <th><?php echo lang('action'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyid">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('tsekap').' '.lang('form'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addPhysicalScheduleForm" action="schedule/addSchedule" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('addPhysicalScheduleForm');">
                                        <div class="modal-body">
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
                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
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
                                                        <select class="form-control select2-show-search" name="sex" data-placeholder="Choose one" required>
                                                            <option label="Choose One"></option>
                                                            <option value="christian" <?php
                                                            if (!empty($setval)) {
                                                                if (set_value('sex') == 'christian') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            elseif (!empty($patient->sex)) {
                                                                if ($patient->sex == 'christian') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Christian </option>
                                                            <option value="roman_catholic" <?php
                                                            if (!empty($setval)) {
                                                                if (set_value('sex') == 'roman_catholic') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            elseif (!empty($patient->sex)) {
                                                                if ($patient->sex == 'roman_catholic') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Roman Catholic </option>
                                                            <option value="muslim" <?php
                                                            if (!empty($setval)) {
                                                                if (set_value('sex') == 'muslim') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            elseif (!empty($patient->sex)) {
                                                                if ($patient->sex == 'muslim') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Muslim </option>
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
                                                        <input type="text" name="barangay" class="form-control">
                                                    </div>
                                                </div>
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
                                            </div>
                                            <div class="row">
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
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
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
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->


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

    <script type="text/javascript">

        $(document).ready(function (){
            $(".customform_type").click(function() {
                var id = $(this).data('id');
                var method = $(this).data('method');
                var name = $(this).data('name');
                var display_name = $(this).data('displayname');

                $("#customAddNew").attr("href", "customform/addNew"+method+"?type="+name);

                $(".card-title").text(display_name);
                
                var table = $('#editable-sample').DataTable({
                    responsive: true,
                    //   dom: 'lfrBtip',
                    "processing": true,
                    // "serverSide": true,
                    "searchable": true,
                    "ajax": {
                        url: "customform/getCustomForm?type="+id,
                        type: 'POST',
                    },
                    scroller: {
                        loadingIndicator: true
                    },
                    dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        {
                            extend: 'collection',
                            text: 'Export',
                            buttons: [
                                {
                                    extend: 'copyHtml5',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    }
                                },
                                {
                                    extend: 'csvHtml5',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    }
                                },
                                {
                                    extend: 'pdfHtml5',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                    orientation: 'portrait',
                                    pageSize: 'LEGAL'
                                },
                                {
                                    extend: 'print',
                                    title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    }
                                }
                            ]
                        }
                    ],
                    aLengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    iDisplayLength: -1,
                    "order": [[0, "desc"]],

                    "language": {
                        "lengthMenu": "_MENU_",
                        search: "_INPUT_",
                        "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                    },
                    "bDestroy": true
                });
                table.buttons().container().appendTo('.custom_buttons');
            })
        });
        
    </script>

    <script type="text/javascript">
        $('#editable-sample').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',
            "processing": true,
            // "serverSide": true,
            "searchable": true,
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            },
                            orientation: 'portrait',
                            pageSize: 'LEGAL'
                        },
                        {
                            extend: 'print',
                            title: '<?php echo lang('patient') . ' ' . lang('list');?>',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            }
                        }
                    ]
                }
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            },
            "bDestroy": true
        });
    </script>

    <script>
        $('#branchForm').parsley();
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