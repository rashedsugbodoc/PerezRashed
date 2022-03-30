<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="row mt-5 mb-8">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title"><?php echo lang('encounter'); ?></div>
                                        <div class="card-options">
                                            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                <a data-toggle="modal" href="#myModal">
                                                    <button id="" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-plus"></i> <?php echo lang('add_encounter'); ?>
                                                    </button>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <?php echo validation_errors(); ?>
                                            <?php
                                                $file_error = $this->session->flashdata('fileError');
                                                $other_error_list = $this->session->flashdata('error_list');
                                                if(!empty($file_error)) {
                                                    echo $file_error;
                                                }
                                                if(!empty($other_error_list)) {
                                                    echo $other_error_list;
                                                }
                                            ?>
                                            <div class="table-responsive">
                                                <table id="editable-sample1" class="table table-bordered text-nowrap key-buttons w-100">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo lang('date'); ?></th>
                                                            <th><?php echo lang('encounter'); ?> <?php echo lang('id'); ?></th>
                                                            <th><?php echo lang('patient'); ?></th>
                                                            <th><?php echo lang('doctor'); ?></th>
                                                            <th><?php echo lang('balance'); ?></th>
                                                            <th><?php echo lang('payment').' '.lang('status'); ?></th>
                                                            <th><?php echo lang('status'); ?></th>
                                                            <th><?php echo lang('actions'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_encounter'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="encounter/addnew">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('encounter_type'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control" name="type" id="encounter_type" required>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('location'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control" name="location" id="location" required>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control pos_select" name="patient" id="pos_select" required>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering'). ' ' .lang('doctor'); ?></label>
                                                                <select class="select2-show-search form-control rendering_doctor_select" name="rendering_doctor" id="pos_rendering_doctor">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 rendering_doctor_client">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?></label>
                                                                <input type="text" name="render_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering'). ' ' . lang('staff')?></label>
                                                                <select class="select2-show-search form-control rendering_user_select" name="rendering_user" id="pos_rendering_user">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('referral'). ' ' .lang('facility') ?></label>
                                                                <select class="select2-show-search form-control ref_provider_select" name="provider" id="pos_ref_provider"> 
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 ref_provider_client">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?></label>
                                                                <input type="text" name="provider_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('referred_by'). ' ' . lang('doctor')?></label>
                                                                <select class="select2-show-search form-control ref_doctor_select" name="ref_doctor" id="pos_ref_doctor">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 ref_doctor_client">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?></label>
                                                                <input type="text" name="ref_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('reason'); ?> <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="reason" rows="2" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('status'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control encounter_status" name="encounter_status" id="encounter_status" required>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
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

                    <!-- Edit Encounter Modal Start -->
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('edit_encounter'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editEncounterForm" action="encounter/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('encounter_type'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control" name="type" id="encounter_type2" required>
                                                            <?php foreach ($encounter_types as $types) { ?>
                                                                <option value="<?php echo $types->id ?>"> <?php echo $types->display_name ?> </option>
                                                            <?php } ?>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('location'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control" name="location" id="location2" required>
                                                            <option value="0"><?php echo lang('online') ?></option>
                                                            <?php foreach ($branches as $branch) { ?>
                                                                <option value="<?php echo $branch->id ?>"> <?php echo $branch->display_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control pos_select" name="patient" id="pos_select2" required>
                                                            <?php foreach ($patients as $patient) { ?>
                                                                <option value="<?php echo $patient->id ?>"> <?php echo $patient->name ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering_doctor'); ?></label>
                                                                <select class="select2-show-search form-control rendering_doctor_select2" name="rendering_doctor" id="pos_rendering_doctor2">
                                                                    <option value="add_new"><?php echo lang('add_new'); ?></option>
                                                                    <?php foreach ($doctors as $doctor) { ?>
                                                                        <option value="<?php echo $doctor->id ?>"> <?php echo $doctor->name ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 rendering_doctor_client2">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?></label>
                                                                <input type="text" name="render_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('rendering'). ' ' . lang('staff')?></label>
                                                                <select class="select2-show-search form-control rendering_user_select2" name="rendering_user" id="pos_rendering_user2">
                                                                    <?php foreach ($staffs as $staff) { ?>
                                                                        <option value="<?php echo $staff->user_id ?>"> <?php echo $staff->username ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('referral_provider') ?></label>
                                                                <select class="select2-show-search form-control ref_provider_select2" name="provider" id="pos_ref_provider2"> 
                                                                    <option value="add_new"><?php echo lang('add_new'); ?></option>
                                                                    <?php foreach ($providers as $provider) { ?>
                                                                        <option value="<?php echo $provider->id ?>"> <?php echo $provider->name ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 ref_provider_client2">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?></label>
                                                                <input type="text" name="provider_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                         <div class="col-md-12 col-sm-12">
                                                             <div class="form-group">
                                                                <label class="form-label"><?php echo lang('refd_by_doctor') ?></label>
                                                                <select class="select2-show-search form-control ref_doctor_select2" name="ref_doctor" id="pos_ref_doctor2">
                                                                    <option value="add_new"><?php echo lang('add_new'); ?></option>
                                                                    <?php foreach ($doctors as $doctor) { ?>
                                                                        <option value="<?php echo $doctor->id ?>"> <?php echo $doctor->name ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 ref_doctor_client2">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?></label>
                                                                <input type="text" name="ref_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('reason'); ?> <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="reason" rows="2" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('status'); ?> <span class="text-danger">*</span></label>
                                                        <select class="select2-show-search form-control encounter_status" name="encounter_status" id="encounter_status2" required>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="encounter_id">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Edit Encounter Modal End -->

                    <!-- Add Vitals Modal Start -->
                        <div class="modal fade" id="AddVital" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_vitals'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addVitalForm" action="patient/addVitals" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <?php echo lang('measured'); ?></label>
                                                        <input class="form-control fc-datepicker" readonly name="date" placeholder="MM/DD/YYYY" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('time'); ?> <?php echo lang('measured'); ?></label>
                                                        <div class="wd-150 mg-b-30">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                                                    </div><!-- input-group-text -->
                                                                </div><!-- input-group-prepend -->
                                                                <input class="form-control" id="tpBasic" name="time" placeholder="Set time" type="text">
                                                            </div>
                                                        </div><!-- wd-150 -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
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
                                                <div class="col-md-6 col-sm-12">
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
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('blood_pressure'); ?></label>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" name="systolic" class="form-control" placeholder="<?php echo lang('systolic'); ?>">
                                                                    <label class="p-2 text-muted align-self-center">/</label>
                                                                    <input type="text" name="diastolic" class="form-control"  placeholder="<?php echo lang('diastolic'); ?>">
                                                                    <label class="p-2 text-muted align-self-center"><?php echo lang('mmhg'); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('temperature'); ?></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="temperature">
                                                            <div class="input-group-append br-tl-0 br-bl-0">
                                                                <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="temperature_unit">
                                                                    <option value="celsius"><?php echo lang('celsius'); ?></option>
                                                                    <option value="fahrenheit"><?php echo lang('fahrenheit'); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('temperature_site') ?></label>
                                                        <div class="input-group">
                                                            <select class="form-control select2-show-search" name="temp_site" data-placeholder="Choose one">
                                                                <option label="Choose one"></option>
                                                                <option class="anus"><?php echo lang('anus'); ?></option>
                                                                <option class="armpit"><?php echo lang('armpit'); ?></option>
                                                                <option class="ear"><?php echo lang('ear'); ?></option>
                                                                <option class="forehead"><?php echo lang('forehead'); ?></option>
                                                                <option class="mouth"><?php echo lang('mouth'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('heart_rate'); ?></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="heartrate">
                                                            <label class="p-2 text-muted align-self-center"><?php echo lang('bpm'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('spo2'); ?></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="spo2">
                                                            <label class="p-2 text-muted align-self-center"><?php echo lang('percentage_symbol'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <label class="form-label"><?php echo lang('respiration_rate'); ?></label>
                                                    <div class="input-icon">
                                                        <input type="text" name="respiration_rate" class="form-control" placeholder="<?php echo lang('breaths_per_min'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('pain_level'); ?></label>
                                                        <input class="myrangeslider1" data-extra-classes="irs-outline" name="pain_level" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="patient" hidden value='<?php echo $patient->id; ?>'>
                                            <input type="hidden" name="encounter_id">
                                            <input type="hidden" name="redirect" value="encounter">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('note'); ?></label>
                                                        <textarea class="form-control" name="note" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-5">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Add Vital Modal End -->

                    <!-- Add Case Modal Start -->
                        <div class="modal fade" id="addCase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add'). ' ' . lang('case_note'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addCaseForm" action="patient/addMedicalHistory" class="clearfix" method="post" onsubmit="javascript: return myFunction();" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            
                                            <input type="hidden" name="encounter_id" id="encounter_id">

                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" name="date" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" id="patientchoose" name="patient_id">
                                                            <?php foreach ($patients as $patient) { ?>
                                                                <option value="<?php echo $patient->id ?>"> <?php echo $patient->firstname . ' ' . $patient->lastname ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?></label>
                                                        <input type="text" class="form-control" name="title" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('case'); ?> <?php echo lang('summary'); ?></label>
                                                        <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                            <div id="quillEditor" class="bg-white quillEditor">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <textarea id="description" name="description" readonly="" hidden="" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                            <textarea name="desc" id="quillEditor" class="quillEditor form-control" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <input type="hidden" name="patient" hidden value='<?php echo $patient->id; ?>'>
                                            <input type="hidden" name="encounter_id">
                                            <input type="hidden" name="redirect" value="encounter">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Add Case Modal End -->

                    <!-- Add Prescription Modal Start -->
                        <!-- <div class="modal fade" id="addPrescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add'). ' ' . lang('prescription'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addPrescriptionForm" action="prescription/addNewPrescription" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            
                                            <input type="hidden" name="encounter_id">
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    <!-- Add Prescription Modal End -->

                    <!-- Add Document Modal Start -->
                        <div class="modal fade" id="addDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add'). ' ' . lang('document'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addDocumentForm" action="patient/addPatientMaterial" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('title'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="title" placeholder="Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('description'); ?> <span class="text-red"></span></label>
                                                        <textarea class="form-control" id="documentDescription" name="description" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('category'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="category" id="category" data-placeholder="Choose one">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering_doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="rendering_doctor" id="rendering_doctor_document" data-placeholder="Choose one">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" hidden>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering'). ' ' . lang('staff')?></label>
                                                        <select class="select2-show-search form-control rendering_user_select2" name="rendering_user" id="pos_rendering_user2">
                                                            <?php foreach ($staffs as $staff) { ?>
                                                                <option value="<?php echo $staff->user_id ?>"> <?php echo $staff->username ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('file'); ?> <span class="text-red">*</span></label>
                                                        <span class="text-muted">(<?php echo lang('maximum_upload_filesize').': 10MB';?>)</span>
                                                        <input type="file" name="img_url" id="document" class="dropify"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="redirect" value="encounter">
                                            <input type="hidden" name="encounter_id">
                                            <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Add Document Modal End -->

                    <!-- Add Form Modal Start -->
                        <div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add'). ' ' . lang('form'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addFormsForm" action="form/addForm" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('template'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search template" id="template" name="template" data-placeholder="Choose one">
                                                            <option value="">Select .....</option>
                                                            <?php foreach ($templates as $template) { ?>
                                                                <option value="<?php echo $template->id; ?>"><?php echo $template->name; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search pos_select" id="pos_select_form" name="patient" data-placeholder="Choose one">
                                                            <?php foreach ($patients as $patient) { ?>
                                                                <option value="<?php echo $patient->id ?>"> <?php echo $patient->firstname . ' ' . $patient->lastname ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('form') . ' ' . lang('category'); ?></label>
                                                        <select class="select2-show-search form-control" name="category" data-placeholder="Choose one">
                                                            <option></option>
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering_doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search add_doctor" id="add_doctor" name="doctor" data-placeholder="Choose one">
                                                            <?php foreach ($doctors as $doctor) { ?>
                                                                <option value="<?php echo $doctor->id ?>"><?php echo $doctor->firstname . ' ' . $doctor->lastname ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12" hidden>
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering') . ' ' . lang('staff'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="staff" id="staffs" data-placeholder="Choose one">
                                                            <option><?php echo lang('select_user') ?></option>
                                                            <?php foreach ($staffs as $staff) { ?>
                                                                <option value="<?php echo $staff->user_id ?>"> <?php echo $staff->username ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                                    <input type="text" class="form-control" name="form_name" placeholder="<?php echo lang('form_report_name'); ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label for="exampleInputEmail1"> <?php echo lang('report'); ?></label>
                                                    <textarea class="ckeditor form-control" id="editor" name="report" value="" rows="10">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="redirect" value="encounter">
                                            <input type="hidden" name="encounter_id">
                                            <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                                            <div class="row mt-5">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Add Form Modal End -->

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

        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/app-calendar.js'); ?>"></script>

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

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- Clipboard js -->
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/clipboard/clipboard.js'); ?>"></script>

        <!-- ion.rangeSlider.min js -->
        <script src="<?php echo base_url('public/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/rangeslider.js'); ?>"></script>

        <!-- Prism js -->
        <script src="<?php echo base_url('public/assets/plugins/prism/prism.js'); ?>"></script>
        <script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>

        <!-- WYSIWYG Editor js -->
        <script src="<?php echo base_url('public/assets/plugins/wysiwyag/jquery.richtext.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor.js'); ?>"></script>

        <!-- quill js -->
        <script src="<?php echo base_url('public/assets/plugins/quill/quill.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor2.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->
    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $('.table-responsive').on('show.bs.dropdown', function () {
                $('.table-responsive').css( "overflow", "inherit" );
            });

            $('.table-responsive').on('hide.bs.dropdown', function () {
                $('.table-responsive').css( "overflow", "auto" );
            });
        });

    </script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tpBasic').timepicker('setTime', new Date());
            $('.fc-datepicker').datepicker('setDate', new Date());
        });
    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            var iid = $("#encounter_id").val();
            $.ajax({
                url: "encounter/getEncounterById?id=" + iid,
                method: "GET",
                data: "",
                dataType: "json",
                success: function (response) {
                    var patient_id = response.encounter.patient_id;

                    alert(patient_id);
                    $('#addCaseForm').find('[name="patient_id"]').val(patient_id).change();

                }
            });
        });
    </script> -->

    <script type="text/javascript">
        function myFunction(){
            var quill = document.getElementById('quillEditor').children[0].innerHTML;
            // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
            document.getElementById('description').value = quill;
        }

        function myFunction2(){
            var quill = document.getElementById('quillEditor2').children[0].innerHTML;
            // var cleanText = quill.replace(/<\/?[^>]+(>|$)/g, "");
            document.getElementById('description2').value = quill;
        }
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".vitalbutton", function () {
            var base_url = "<?php echo base_url() ?>";
            var iid = $(this).attr('data-id');

            console.log(iid);
            $('#addVitalForm').find('[name="encounter_id"]').val(iid).end()

            $('#AddVital').modal('show');
        });
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".casebutton", function () {
            var base_url = "<?php echo base_url() ?>";
            var iid = $(this).attr('data-id');

            console.log(iid);
            $('#addCaseForm').find('[name="encounter_id"]').val(iid).end()
            
            $.ajax({
                url: "encounter/getEncounterById?id=" + iid,
                method: "GET",
                data: "",
                dataType: "json",
                success: function (response) {
                    var patient_id = response.encounter.patient_id;
                    $('#addCaseForm').find('[name="patient_id"]').val(patient_id).change();

                    $('#addCase').modal('show');
                }
            });
            
        });
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".prescriptionbutton", function () {
            var base_url = "<?php echo base_url() ?>";
            var iid = $(this).attr('data-id');

            console.log(iid);
            $('#addPrescriptionForm').find('[name="encounter_id"]').val(iid).end()

            $('#addPrescription').modal('show');
        });
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".documentbutton", function () {
            var base_url = "<?php echo base_url() ?>";
            var iid = $(this).attr('data-id');

            console.log(iid);
            $('#addDocumentForm').find('[name="encounter_id"]').val(iid).end()

            $('#addDocument').modal('show');
        });
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".formbutton", function () {
            var base_url = "<?php echo base_url() ?>";
            var iid = $(this).attr('data-id');

            console.log(iid);
            $('#addFormsForm').find('[name="encounter_id"]').val(iid).end()

            $.ajax({
                url: "encounter/getEncounterById?id=" + iid,
                method: "GET",
                data: "",
                dataType: "json",
                success: function (response) {
                    var patient_id = response.encounter.patient_id;
                    var doctor_id = response.encounter.doctor;
                    $('#addFormsForm').find('[name="patient"]').val(patient_id).change();
                    $('#addFormsForm').find('[name="doctor"]').val(doctor_id).change();

                    $('#addForm').modal('show');
                }
            });

        });
    </script>

    <script type="text/javascript">
        $('.myrangeslider1').ionRangeSlider({
            // grid: true,
            min: 0,
            max: 10,
            from: 0,
            // prettify_enabled: true,
            // prettify_separator: ",",
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#category").select2({
                placeholder: '<?php echo lang('select_category'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getDocumentUploadCategory',
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

            $("#rendering_doctor_document").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getRenderingDoctorWithoutAddNewOption',
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
            $(document.body).on('change', '#template', function () {
                var iid = $("select.template option:selected").val();
                $.ajax({
                    url: 'form/getTemplateByIdByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var data = CKEDITOR.instances.editor.getData();
                        if (response.template.template != null) {
                            var data1 = data + response.template.template;
                        } else {
                            var data1 = data;
                        }
                        CKEDITOR.instances['editor'].setData(data1)
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(".table").on("click", ".editbutton", function () {
            //    e.preventDefault(e);
            // Get the record's ID via attribute  
            var base_url = "<?php echo base_url() ?>";
            var iid = $(this).attr('data-id');
            
            $('#editEncounterForm').trigger("reset");
            $.ajax({
                url: 'encounter/editEncounterByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    console.log(response.encounter.encounter_type_id);
                    $('#editEncounterForm').find('[name="encounter_id"]').val(response.encounter.id).end()
                    
                    $('#editEncounterForm').find('[name="reason"]').val(response.encounter.reason).end()
                    $('#editEncounterForm').find('[name="patient"]').val(response.encounter.patient_id).change()
                    
                    if (response.encounter.encounter_type_id) {
                        $('#editEncounterForm').find('[name="type"]').val(response.encounter.encounter_type_id).change()
                    }
                    
                    if (response.encounter.doctor == null) {
                        $('.rendering_doctor_client2').show();
                        $('#editEncounterForm').find('[name="render_name"]').val(response.encounter.rendering_staff_name).end()
                    } else {
                        $('#editEncounterForm').find('[name="rendering_doctor"]').val(response.encounter.doctor).change()
                    }

                    if (response.encounter.referral_staff_id == null) {
                        $('.ref_doctor_client2').show();
                        $('#editEncounterForm').find('[name="ref_name"]').val(response.encounter.referral_staff_name).end()
                    } else {
                        $('#editEncounterForm').find('[name="ref_doctor"]').val(response.encounter.referral_staff_id).change()
                    }

                    $('#editEncounterForm').find('[name="rendering_user"]').val(response.encounter.rendering_staff_id).change()

                    if (response.encounter.referral_facility_id == null) {
                        $('.ref_provider_client2').show();
                        $('#editEncounterForm').find('[name="provider_name"]').val(response.encounter.referral_facility_name).end()
                    } else {
                        $('#editEncounterForm').find('[name="provider"]').val(response.encounter.referral_facility_id).change()
                    }
                    
                    if (response.encounter.location_id != null) {
                        $('#editEncounterForm').find('[name="location"]').val(response.encounter.location_id).change()
                    } else {
                        $('#editEncounterForm').find('[name="location"]').val("0").change()
                    }

                    if (response.encounter.encounter_status != null) {
                        $('#editEncounterForm').find('[name="encounter_status"]').val(response.encounter.encounter_status).change()
                    }
                    console.log(response.encounter.location);
                    

                    $('#myModal2').modal('show');

                    
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.rendering_doctor_client').hide();
            $(document.body).on('change', '#pos_rendering_doctor', function () {

                var v = $("select.rendering_doctor_select option:selected").val()
                if (v == 'add_new') {
                    $('.rendering_doctor_client').show();
                } else {
                    $('.rendering_doctor_client').hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.ref_doctor_client').hide();
            $(document.body).on('change', '#pos_ref_doctor', function () {

                var v = $("select.ref_doctor_select option:selected").val()
                if (v == 'add_new') {
                    $('.ref_doctor_client').show();
                } else {
                    $('.ref_doctor_client').hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.ref_provider_client').hide();
            $(document.body).on('change', '#pos_ref_provider', function () {

                var v = $("select.ref_provider_select option:selected").val()
                if (v == 'add_new') {
                    $('.ref_provider_client').show();
                } else {
                    $('.ref_provider_client').hide();
                }
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#encounter_type").change(function () {
                var encounter_type = $("#encounter_type").val();
                $("#encounter_status").find('option').remove();

                $.ajax({
                    url: 'encounter/getStatusByEncounterType?id=' + encounter_type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var status = response.status;

                        $.each(status, function (key, value) {
                            $('#encounter_status').append($('<option>').text(value.display_name).val(value.id)).end();
                        });
                    }
                });
            });
        });

        $(document).ready(function () {
            $("#pos_ref_provider").select2({
                placeholder: '<?php echo lang('select_provider'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getProviderInfoWithAddNewOption',
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

        $(document).ready(function () {
            $("#pos_ref_doctor").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getReferredByDoctorWithAddNewOption',
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

        $(document).ready(function () {
            $("#pos_rendering_user").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getUserWithoutAddNewOption',
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

        $(document).ready(function () {
            $("#pos_rendering_doctor").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getRenderingDoctorWithAddNewOption',
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

        $(document).ready(function () {
            $("#encounter_type").select2({
                placeholder: '<?php echo lang('select_encounter_type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getEncounterTypeInfo',
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

        $(document).ready(function () {
            $("#location").select2({
                placeholder: '<?php echo lang('select_branch'); ?>',
                allowClear: true,
                ajax: {
                    url: 'appointment/getBranchInfoWithHospital',
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

        $(document).ready(function () {
            $("#pos_select").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getPatientinfo',
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

        $(document).ready(function () {
            $("#patientchoose").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,

            });
        });

        $(document).ready(function () {
            $("#pos_select_form").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,

            });
        });

        $(document).ready(function () {
            $("#add_doctor").select2({
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
            $('.rendering_doctor_client2').hide();
            $(document.body).on('change', '#pos_rendering_doctor2', function () {

                var v = $("select.rendering_doctor_select2 option:selected").val()
                if (v == 'add_new') {
                    $('.rendering_doctor_client2').show();
                } else {
                    $('.rendering_doctor_client2').hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.ref_doctor_client2').hide();
            $(document.body).on('change', '#pos_ref_doctor2', function () {

                var v = $("select.ref_doctor_select2 option:selected").val()
                if (v == 'add_new') {
                    $('.ref_doctor_client2').show();
                } else {
                    $('.ref_doctor_client2').hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.ref_provider_client2').hide();
            $(document.body).on('change', '#pos_ref_provider2', function () {

                var v = $("select.ref_provider_select2 option:selected").val()
                if (v == 'add_new') {
                    $('.ref_provider_client2').show();
                } else {
                    $('.ref_provider_client2').hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.rendering_user_select2').hide();
            $(document.body).on('change', '#pos_rendering_user2', function () {

                var v = $("select.ref_doctor_select2 option:selected").val()
                if (v == 'add_new') {
                    $('.ref_doctor_client2').show();
                } else {
                    $('.ref_doctor_client2').hide();
                }
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#encounter_type2").change(function () {
                var encounter_type = $("#encounter_type2").val();
                $("#encounter_status2").find('option').remove();

                $.ajax({
                    url: 'encounter/getStatusByEncounterType?id=' + encounter_type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var status = response.status;

                        $.each(status, function (key, value) {
                            $('#encounter_status2').append($('<option>').text(value.display_name).val(value.id)).end();
                        });
                    }
                });
            });
        });

        $(document).ready(function () {
            $("#pos_ref_provider2").select2({
                placeholder: '<?php echo lang('select_provider'); ?>',
                allowClear: true,
            });
        });

        $(document).ready(function () {
            $("#pos_ref_doctor2").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
            });
        });

        $(document).ready(function () {
            $("#pos_rendering_user2").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
            });
        });

        $(document).ready(function () {
            $("#pos_rendering_doctor2").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
            });
        });

        $(document).ready(function () {
            $("#encounter_type2").select2({
                placeholder: '<?php echo lang('select_encounter_type'); ?>',
                allowClear: true,
            });
        });

        $(document).ready(function () {
            $("#location2").select2({
                placeholder: '<?php echo lang('select_branch'); ?>',
                allowClear: true,
            });
        });

        $(document).ready(function () {
            $("#pos_select2").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
            });
        })
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "encounter/getEncounter",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 4],
                        }
                    },
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 100,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
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