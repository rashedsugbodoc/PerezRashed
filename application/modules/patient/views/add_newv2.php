<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="row mt-5">
                            <?php if (empty($patient->id)) { ?>
                                <div class="col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Add Patient Via Search</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-5">
                                                <div class="col-md-12 col-sm-12 col-lg-2">
                                                    <span class="card-title">Search By </span>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-5">
                                                    <button class="btn btn-primary w-100" id="patient_number"><?php echo lang('patient').' '.lang('number') ?></button>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-5">
                                                    <button class="btn btn-light w-100" id="patient_details"><?php echo lang('patient').' '.lang('details') ?></button>
                                                </div>
                                            </div>
                                            <div class="row" id="patient_number_form">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Sugbodoc <?php echo lang('patient').' '.lang('number') ?><span class="text-red"> *</span></label>
                                                        <input type="text" name="patient_number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('first_name') ?><span class="text-red"> *</span></label>
                                                        <input type="text" name="f_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('last_name') ?><span class="text-red"> *</span></label>
                                                        <input type="text" name="l_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <button class="btn btn-primary w-100" id="patient_number_submit" type="submit"><?php echo lang('search') ?></button>
                                                </div>
                                            </div>
                                            <div class="row" id="patient_details_form" hidden>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('first_name') ?><span class="text-red"> *</span></label>
                                                        <input type="text" name="f_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('middle_name') ?></label>
                                                        <input type="text" name="m_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('last_name') ?><span class="text-red"> *</span></label>
                                                        <input type="text" name="l_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('suffix') ?></label>
                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
                                                            <option value="" ><?php echo lang('none'); ?></option>
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
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('sex') ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="sex" data-placeholder="Choose one" required>
                                                            <option></option>
                                                            <option value="male"> Male </option>
                                                            <option value="female"> Female </option>
                                                            <option value="other"> <?php echo lang('other'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('birth_date') ?><span class="text-red"> *</span></label>
                                                        <input class="form-control flatpickr" placeholder="<?php echo lang('select').' '. lang('date');?>" name="bdate" type="text" maxlength="100" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('country') ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="country_id" id="searchcountry" required>
                                                            <option value="" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                            <?php foreach ($countries as $country) { ?>
                                                                <option value="<?php echo $country->id; ?>" <?php
                                                                // if (!empty($setval)) {
                                                                //     if ($country->id == set_value('country_id')) {
                                                                //         echo 'selected';
                                                                //     }
                                                                // }
                                                                if (!empty($patient->country_id)) {
                                                                    if ($country->id == $patient->country_id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $country->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>     
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('state_province') ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="state_id" id="searchstate" value='' required disabled>
                                                            <option value="" disabled selected><?php echo lang('state_province_placeholder'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <button class="btn btn-primary w-100" id="patient_details_submit"><?php echo lang('search') ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php
                                            if (!empty($patient->id))
                                                echo lang('edit_patient');
                                            else
                                                echo lang('add_new_patient');
                                            ?>
                                        </div>
                                    </div>
                                    <form role="form" id="patientForm" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('patientForm');">
                                        <div class="card-body">
                                            <?php echo validation_errors(); ?>
                                            <?php
                                                $file_error = $this->session->flashdata('fileError');

                                                if(!empty($file_error)) {
                                                    echo $file_error;
                                                }else{

                                                }
                                            ?>
                                            
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <!-- <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Name" maxlength="100" value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('name');
                                                                }
                                                                if (!empty($patient->name)) {
                                                                    echo $patient->name;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?><span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('email');
                                                                }
                                                                if (!empty($patient->email)) {
                                                                    echo $patient->email;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row">
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
                                                    </div>
                                                    <div class="row">
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
                                                    </div>
                                                    <div class="row">
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
                                                                <input id="mobile" name="mobile" class="form-control" type="tel" required value=
                                                                    "<?php
                                                                    if (!empty($setval)) {
                                                                        echo set_value('phone');
                                                                    } elseif (!empty($patient->phone)) {
                                                                        echo $patient->phone;
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>">
                                                                <input type="hidden" name="phone" id="phone">
                                                                <span id="error-msg" class="hide"></span>
                                                                <span id="valid-msg" class="hide"> Valid</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="country_id" id="country" required>
                                                                    <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                                    <?php foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo $country->id; ?>" <?php
                                                                        // if (!empty($setval)) {
                                                                        //     if ($country->id == set_value('country_id')) {
                                                                        //         echo 'selected';
                                                                        //     }
                                                                        // }
                                                                        if (!empty($patient->country_id)) {
                                                                            if ($country->id == $patient->country_id) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?> > <?php echo $country->name; ?> </option>
                                                                            <?php } ?>
                                                                </select>      
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('state_province'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="state_id" id="state" value='' required disabled>
                                                                    <option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>
                                                                </select>    
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('city_municipality'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="city_id" id="city" value='' required disabled>
                                                                    <option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6" id="barangayDiv">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                                <select class="form-control select2-show-search" name="barangay_id" id="barangay" value='' disabled>
                                                                    <option value="0" disabled selected><?php echo lang('barangay_placeholder'); ?></option>
                                                                </select>        
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('postal'); ?></label>
                                                                <input type="text" name="postal" class="form-control" placeholder="<?php echo lang('postal_placeholder'); ?>" value="<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('postal');
                                                                }
                                                                elseif (!empty($patient->postal)) {
                                                                    echo $patient->postal;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('civil_status') ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="civil_status" data-placeholder="Choose one" required>
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('sex'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="sex" data-placeholder="Choose one" required>
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('blood_group'); ?></label>
                                                                        <select class="form-control select2-show-search" name="bloodgroup" data-placeholder="Choose one">
                                                                            <?php foreach ($groups as $group) { ?>
                                                                                <option value="<?php echo $group->name; ?>" <?php
                                                                                if (!empty($setval)) {
                                                                                    if ($group->name == set_value('bloodgroup')) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                                elseif (!empty($patient->bloodgroup)) {
                                                                                    if ($group->name == $patient->bloodgroup) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                                ?> > <?php echo $group->display_name; ?> </option>
                                                                                    <?php } ?> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('allergies'); ?></label>
                                                                        <input type="text" name="allergies" class="form-control" placeholder="<?php echo lang('allergies'); ?>" value="<?php
                                                                        if (!empty($setval)) {
                                                                            echo set_value('allergies');
                                                                        }
                                                                        elseif (!empty($patient->allergies)) {
                                                                            echo $patient->allergies;
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><?php echo lang('doctor'); ?></label>
                                                                        <select class="form-control select2" data-placeholder="Choose one" id="doctorchoose" name="doctor[]" multiple="multiple">
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label"><?php echo lang('profile_picture'); ?></label>
                                                            <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                            <input type="file" name="img_url" id="image" class="dropify"/>
                                                        </div>
                                                        <input type="hidden" id="patient_id" name="id" value='<?php
                                                        if (!empty($patient->id)) {
                                                            echo $patient->id;
                                                        }
                                                        ?>'>
                                                        <input type="hidden" name="p_id" value='<?php
                                                        if (!empty($patient->patient_id)) {
                                                            echo $patient->patient_id;
                                                        }
                                                        ?>'>
                                                        <input type="hidden" name="redirect" value="<?php
                                                        if (!empty($redirect)) {
                                                            echo $redirect;
                                                        }
                                                        ?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div id="searchModal" class="modal fade">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="modal-title" id="modalTitle"></h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pd-20">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <form method="POST" action="patient/addPatientDoctorBySearch">
                                                    <div id="searchResult">
                                                        
                                                    </div>
                                                    <div class='row mb-5'>
                                                        <div class='col-md-12 col-sm-12'>
                                                            <center id='submitButtons'>
                                                                
                                                            </center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- modal-body -->
                                </div>
                            </div><!-- modal-dialog -->
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
        function active(item) {
            $("#item-"+item+"").addClass("bg-primary text-white");
        }
        function inactive(item) {
            $("#item-"+item+"").removeClass("bg-primary text-white");
        }
        function selected(item) {
            // $this = $("#select-"+item+"");
            // $myitem = $("#item-"+item+"");

            // var value = $this.find('input:radio[name=patient_id]:checked').val();
            // $myitem.addClass("bg-primary text-white");
            // alert(value);
            if ($("#item-"+item+"").find('input:radio[name=patient_id]:checked')) {
                $("#item-"+item+"").addClass("bg-primary text-white");
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#patient_details").click(function() {
                $("#patient_details").removeClass("btn-primary");
                $("#patient_details").removeClass("btn-light");
                $("#patient_details").addClass("btn-primary");
                $("#patient_number").addClass("btn-light");
                $("#patient_details_form").attr("hidden", false);
                $("#patient_number_form").attr("hidden", true);
            });

            $("#patient_number").click(function() {
                $("#patient_number").removeClass("btn-light");
                $("#patient_number").addClass("btn-primary");
                $("#patient_details").addClass("btn-light");
                $("#patient_details_form").attr("hidden", true);
                $("#patient_number_form").attr("hidden", false);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#patient_number_submit").click(function() {
                var p_number = $('#patient_number_form').find('[name="patient_number"]').parsley();
                var fname = $('#patient_number_form').find('[name="f_name"]').parsley();
                var lname = $('#patient_number_form').find('[name="l_name"]').parsley();

                if (p_number.isValid() && fname.isValid() && lname.isValid()) {
                    var patient_number = $('#patient_number_form').find('[name="patient_number"]').val();
                    var f_name = $('#patient_number_form').find('[name="f_name"]').val();
                    var l_name = $('#patient_number_form').find('[name="l_name"]').val();
                    $('#modalTitle').html("").end()
                    $('#searchResult').html("").end()
                    $('#submitButtons').html("").end()
                    $.ajax({
                        url: 'patient/searchPatientByPatientNumber?patient_number='+patient_number+'&f_name='+f_name+'&l_name='+l_name,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            if (response.total_patients > 1) {
                                var num = 's';
                            } else {
                                var num = '';
                            }
                            if (response.patient_lists.length === 0) {
                                $("#searchResult").append("<div class='row mb-5'><div class='col-md-12 col-sm-12'><center><p class='h3'><strong>No Patient Found that matches search criteria</strong></p></center></div></div>");
                                $("#submitButtons").append("<button class='btn btn-primary mr-5' data-dismiss='modal' aria-label='Close'>OK</button><button class='btn btn-primary cancel'>New Search</button>");
                            } else {
                                $("#modalTitle").append(response.total_patients+' Patient Found. '+'Select One.');
                                $.each(response.patient_lists, function(key, value) {
                                    $("#searchResult").append(
                                        "<div class='row mb-5'>\n\
                                            <div class='col-md-12 col-sm-12'>\n\
                                                <div class='custom-controls-stacked' id='item-"+value.id+"' data-item='"+value.id+"' onmouseleave='inactive("+value.id+")' onmouseenter='active("+value.id+")'>\n\
                                                    <label class='custom-control custom-radio'>\n\
                                                        <h5>\n\
                                                            <input type='radio' class='custom-control-input' name='patient_id' value='"+value.id+"' checked=''>\n\
                                                            <span class='custom-control-label'>\n\
                                                                <p class='mb-1'>"+value.name+" - "+value.sex.charAt(0).toUpperCase()+value.sex.slice(1)+" - "+response.details[key]+"</p>\n\
                                                                <p class='mb-1'><i class='fe fe-mail mr-2'></i>"+value.email+"</p>\n\
                                                                <p class='mb-1'><i class='fe fe-phone mr-2'></i>"+value.phone+"</p>\n\
                                                            </span>\n\
                                                        </h5>\n\
                                                    </label>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>");
                                })
                                $("#submitButtons").append("<button class='btn btn-primary mr-5'>Add Patient</button><button class='btn btn-primary cancel'>Cancel</button>");
                            }
                            $('#searchModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    p_number.validate();
                    fname.validate();
                    lname.validate();
                }
            });

            $("#patient_details_submit").click(function() {
                var fname = $('#patient_details_form').find('[name="f_name"]').parsley();
                var lname = $('#patient_details_form').find('[name="l_name"]').parsley();
                var val_sex = $('#patient_details_form').find('[name="sex"]').parsley();
                var val_birthdate = $('#patient_details_form').find('[name="bdate"]').parsley();
                var val_country = $('#patient_details_form').find('[name="country_id"]').parsley();
                var val_state = $('#patient_details_form').find('[name="state_id"]').parsley();

                if (fname.isValid() && lname.isValid() && val_sex.isValid() && val_birthdate.isValid() && val_country.isValid() && val_state.isValid()) {
                    var f_name = $('#patient_details_form').find('[name="f_name"]').val();
                    var m_name = $('#patient_details_form').find('[name="m_name"]').val();
                    var l_name = $('#patient_details_form').find('[name="l_name"]').val();
                    var suffix = $('#patient_details_form').find('[name="suffix"]').val();
                    var sex = $('#patient_details_form').find('[name="sex"]').val();
                    var birthdate = $('#patient_details_form').find('[name="bdate"]').val();
                    var country = $('#patient_details_form').find('[name="country_id"]').val();
                    var state = $('#patient_details_form').find('[name="state_id"]').val();
                    var data = f_name +','+ m_name +','+ l_name +','+ suffix +','+ sex +','+ birthdate +','+ country +','+ state;
                    $('#modalTitle').html("").end()
                    $('#searchResult').html("").end()
                    $('#submitButtons').html("").end()
                    $.ajax({
                        url: 'patient/searchPatientByPatientNumber?data='+data,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            if (response.total_patients > 1) {
                                var num = 's';
                            } else {
                                var num = '';
                            }
                            if (response.patient_lists.length === 0) {
                                $("#searchResult").append("<div class='row mb-5'><div class='col-md-12 col-sm-12'><center><p class='h3'><strong>No Patient Found that matches search criteria</strong></p></center></div></div>");
                                $("#submitButtons").append("<button class='btn btn-primary cancel mr-5' data-dismiss='modal' aria-label='Close'>OK</button><button class='btn btn-primary cancel'>New Search</button>");
                            } else {
                                $("#modalTitle").append(response.total_patients+' Patient'+num+' Found. '+'Select One.');
                                $.each(response.patient_lists, function(key, value) {
                                    $("#searchResult").append(
                                        "<div class='row mb-5' id='item'>\n\
                                            <div class='col-md-12 col-sm-12'>\n\
                                                <div class='custom-controls-stacked' id='item-"+value.id+"' data-item='"+value.id+"' onmouseleave='inactive("+value.id+")' onmouseenter='active("+value.id+")'>\n\
                                                    <label class='custom-control custom-radio'>\n\
                                                        <h5>\n\
                                                            <input type='radio' class='custom-control-input' id='select-"+value.id+"' name='patient_id2' value='"+value.id+"' onclick='selected("+value.id+")' checked=''>\n\
                                                            <span class='custom-control-label'>\n\
                                                                <p class='mb-1'>"+value.name+" - "+value.sex.charAt(0).toUpperCase()+value.sex.slice(1)+" - "+response.details[key]+"</p>\n\
                                                                <p class='mb-1'><i class='fe fe-mail mr-2'></i>"+value.email+"</p>\n\
                                                                <p class='mb-1'><i class='fe fe-phone mr-2'></i>"+value.phone+"</p>\n\
                                                            </span>\n\
                                                        </h5>\n\
                                                    </label>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>");
                                })
                                $("#submitButtons").append("<button class='btn btn-primary mr-5'>Add Patient</button><button class='btn btn-primary cancel'>Cancel</button>");
                            }
                            $('#searchModal').modal('show');
                        }
                    });
                    return false;
                } else {
                    fname.validate();
                    lname.validate();
                    val_sex.validate();
                    val_birthdate.validate();
                    val_country.validate();
                    val_state.validate();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('#item').mouseover(function() {
            alert('zzzz');
        })
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
        var country = $("#country").val();
        var iid = $("#patient_id").val();

        $.ajax({
            url: 'patient/editPatientByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                // $('#doctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                var patient_country = response.patient.country_id;
                var patient_id = $("#patient_id").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                console.log('Edit Branch Country');

                if (patient_country == null) {
                    $("#state").attr("disabled", false);
                } else {
                    $("#state").attr("disabled", true);
                }

                // if (patient_country == null) {
                //     $('#patientForm').find('[name="country_id"]').val("0").change()
                // } else {
                //     $('#patientForm').find('[name="country_id"]').val(response.patient.country_id).change()
                // }

                var imagenUrl = response.patient.img_url;
                var drEvent = $('#image').dropify(
                {
                  defaultFile: imagenUrl
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = imagenUrl;
                drEvent.destroy();
                drEvent.init();

                $.each(response.doctors, function(key, value) {
                    $('#doctorchoose').append($('<option selected>').text(value.name + ' (' + '<?php echo lang('id') ?>' + ': ' + value.id + ')').val(value.id)).end();
                });

                // if (doctor_country == country){
                //     $("#state").val(doctor_state);
                //     // $("#city").val(doctor_city);
                //     // $("#barangay").val(doctor_barangay);
                // } else {
                //     $("#state").val("0");
                //     $("#city").val("0");
                //     $("#barangay").val("0");
                // }

                if (patient_country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'patient/getStateByCountryIdByJason?country=' + patient_country + '&patient=' + patient_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;
                        var patient_state = response.patient.state_id;
                        var patient_country = response.patient.country_id;

                        console.log('Edit Branch - Load State of Country');

                        $("#state").find('option').remove();
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        $('#state').append($('<option value="0" disabled><?php echo lang("state_province_placeholder"); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        if (patient_country == null) {
                            $('#state').val("0");
                            $('#state').attr("disabled", true);
                        } else {
                            $('#state').attr("disabled", false);
                        }

                        if (patient_state == null) {
                            $('#state').val("0");
                        } else {
                            $('#state').val(patient_state);
                            $('#state').attr("disabled", false);
                        }

                        var stateval = $('#state').val();

                        $.ajax({
                            url: 'patient/getCityByStateIdByJason?state=' + stateval + '&patient=' + patient_id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                var city = response.city;
                                var patient_city = response.patient.city_id;
                                var patient_state = response.patient.state_id;

                                console.log('Edit Branch - Load Cities of State');

                                $('#city').append($('<option value="0" disabled><?php echo lang("city_municipality_placeholder"); ?></option>')).end();

                                $.each(city, function (key, value) {
                                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (patient_state == null) {
                                    $('#city').val("0");
                                    $('#city').attr("disabled", true);
                                } else {
                                    $('#city').attr("disabled", false);
                                }

                                if (patient_city == null) {
                                    $('#city').val("0");
                                } else {
                                    $('#city').val(patient_city);
                                    $('#city').attr("disabled", false);
                                }

                                var cityval = $('#city').val();

                                $.ajax({
                                    url: 'patient/getBarangayByCityIdByJason?city=' + cityval + '&patient=' + patient_id,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        var barangay = response.barangay;
                                        var patient_barangay = response.patient.barangay_id;
                                        var patient_city = response.patient.city_id;

                                        console.log('Edit Branch - Load Barangays of City');

                                        $('#barangay').append($('<option value="0" disabled><?php echo lang("barangay_placeholder"); ?></option>')).end();

                                        $.each(barangay, function (key, value) {
                                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                        });

                                        if (patient_city == null) {
                                            $('#barangay').val("0");
                                            $('#barangay').attr("disabled", true);
                                        } else {
                                            $('#barangay').attr("disabled", false);
                                        }

                                        if(patient_barangay == null) {
                                            $('#barangay').val("0");
                                        } else {
                                            $('#barangay').val(patient_barangay);
                                            $('#barangay').attr("disabled", false);
                                        }

                                    }
                                })
                            }
                        });

                    }
                });

            }
        });
    </script>

    <script type="text/javascript">
        // $("#country").change(function () {
        //     var country = $("#country").val();
        //     var patient_id = $("#patient_id").val();
        //     var patient_country = "<?php echo $patient->country_id; ?>";

        //     $("#state").find('option').remove();
        //     $("#city").find('option').remove();
        //     $("#barangay").find('option').remove();

        //     $('#state').attr("disabled", false);
        //     $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();

        //     $.ajax({
        //         url: 'patient/getStateByCountryIdByJason?country=' + country + '&patient=' + patient_id,
        //         method: 'GET',
        //         data: '',
        //         dataType: 'json',
        //         success: function (response) {
        //             var state = response.state;
        //             var patient_state = response.patient.state_id;
        //             var patient_country = response.patient.country_id;

        //             // if (doctor_country == null) {
        //             //     $("#state").attr("disabled", false);
        //             // } else {
        //             //     $("#state").attr("disabled", true);
        //             // }

                    
        //             $('#city').attr("disabled", true);
        //             $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
        //             $('#barangay').attr("disabled", true);
        //             $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

        //             $.each(state, function (key, value) {
        //                 $('#state').append($('<option>').text(value.name).val(value.id)).end();
        //             });

        //             if (patient_state == null) {
        //                 $("#state").val("0");
        //             } else {
        //                 $("#state").val(patient_state);
        //             }

        //             if (patient_country == country){
        //                 $("#state").val(patient_state);
        //                 // $("#city").val(doctor_city);
        //                 // $("#barangay").val(doctor_barangay);
        //             } else {
        //                 $("#state").val("0");
        //                 $("#city").val("0");
        //                 $("#barangay").val("0");
        //             }

        //         }
        //     });
        // });

        $("#searchcountry").change(function () {
            var country = $("#searchcountry").val();

            $("#searchstate").find('option').remove();

            $('#searchstate').attr("disabled", false);
            $('#searchstate').append($('<option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();

            $.ajax({
                url: 'patient/getStateByCountryIdByJason?country=' + country,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;

                    $.each(state, function (key, value) {
                        $('#searchstate').append($('<option>').text(value.name).val(value.id)).end();
                    });

                }
            });
        });

        // $("#state").change(function () {
        //     var state = $("#state").val();
        //     var patient_id = $("#patient_id").val();

        //     $.ajax({
        //         url: 'patient/getCityByStateIdByJason?state=' + state + '&patient=' + patient_id,
        //         method: 'GET',
        //         data: '',
        //         dataType: 'json',
        //         success: function (response) {
        //             var city = response.city;
        //             var patient_city = response.patient.city_id;
        //             var patient_state = response.patient.state_id;

        //             $("#city").find('option').remove();
        //             $("#barangay").find('option').remove();

        //             $('#city').attr("disabled", false);
        //             $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
        //             $('#barangay').attr("disabled", true);
        //             $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

        //             $.each(city, function (key, value) {
        //                 $('#city').append($('<option>').text(value.name).val(value.id)).end();
        //             });

        //             if (patient_city == null) {
        //                 $("#city").val("0");
        //             } else {
        //                 $("#city").val(patient_city);
        //             }

        //             if (patient_state == state){
        //                 $("#city").val(patient_city);
        //                 // $("#barangay").val(doctor_barangay);
        //             } else {
        //                 $("#city").val("0");
        //                 $("#barangay").val("0");
        //             }

        //         }
        //     });
        // });

        // $("#city").change(function () {
        //     var city = $("#city").val();
        //     var patient_id = $("#patient_id").val();

        //     $.ajax({
        //         url: 'patient/getBarangayByCityIdByJason?city=' + city + '&patient=' +patient_id,
        //         method: 'GET',
        //         data: '',
        //         dataType: 'json',
        //         success: function (response) {
        //             var barangay = response.barangay;
        //             var patient_barangay = response.patient.barangay_id;
        //             var patient_city = response.patient.city_id;

        //             $("#barangay").find('option').remove();

        //             $('#barangay').attr("disabled", false);
        //             $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

        //             $.each(barangay, function (key, value) {
        //                 $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
        //             });

        //             if (patient_barangay == null) {
        //                 $("#barangay").val("0");
        //             } else {
        //                 $("#barangay").val(patient_barangay);
        //             }

        //             if (patient_city == city){
        //                 $("#barangay").val(patient_barangay);
        //                 // $("#barangay").val(doctor_barangay);
        //             } else {
        //                 $("#barangay").val("0");
        //             }
        //             console.log(response.barangay);
        //         }
        //     });
        // });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#country").change(function () {
                var country = $("#country").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                $("#city").find('option').remove();
                $("#barangay").find('option').remove();

                $("#state").attr("disabled", false);

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'patient/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;

                        $("#state").find('option').remove();
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        console.log("With Ready - Change Country Load States");

                        $('#state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                        $("#city").attr("disabled", true).append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $("#barangay").attr("disabled", true).append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#state").change(function () {
                var stateval = $("#state").val();
                $("#city").find('option').remove();

                $("#city").attr("disabled", false);

                $.ajax({
                    url: 'patient/getCityByStateIdByJason?state=' + stateval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;

                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        console.log("With Ready - Change State Load Cities");

                        $('#city').append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $.each(city, function (key, value) {
                            $('#city').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#city").change(function () {
                var cityval = $("#city").val();
                $("#barangay").find('option').remove();

                $("#barangay").attr("disabled", false);

                $.ajax({
                    url: 'patient/getBarangayByCityIdByJason?city=' + cityval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;

                        $("#barangay").find('option').remove();

                        console.log("With Ready - Change City Load Barangays");

                        $('#barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        $.each(barangay, function (key, value) {
                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });
            });


        });

    </script>

    <script>
        $(document).ready(function () {
            $("#doctorchoose").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorinfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        console.log(response);
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });
            $("#doctorchoose1").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorInfo',
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
    <script>
        $('#patientForm').parsley();
    </script>

    </body>
</html>