<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <style>
                            @media screen and (max-width: 1000px) {
                                .button-text {
                                    display: none;
                                }
                            }

                            @media screen and (min-width: 1001px) {
                                .icon {
                                    display: none;
                                }
                            }

                            @media (max-width: 275px) {
                             .pull-right {
                                float: left;
                              }
                            }

                            @media (max-width: 213px) {
                             .pull-center {
                                float: left;
                              }
                            }

                            @media (min-width: 214px) {
                             .pull-center {
                                float: center;
                              }
                            }

                            #content{
                                color: black;
                            }

                            .td{
                                color: black;
                            }

                            .normal-caps {
                                text-transform: inherit !important;
                            }

                            .card-custom-icon{
                                top: 40px;
                            }

                            .card-custom-icon-new{
                                top: 40px;
                            }

                            @media screen and (max-width: 1412px) {
                                .unit-block{
                                    display: block;
                                }
                            }

                            @media screen and (max-width: 767px) {
                                .unit-block{
                                    display: inline-block;
                                }
                            }

                            /*.card-button:hover {
                                background-color: #9ca6c9;
                                border: 1px solid;
                                border-radius: 8px;
                            }*/

                            

                            /* @media (min-width: 768px) {
                             .new-pull-left {
                                float: right;
                              }
                            }*/
                        </style>

                        <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                            <div class="col-md-4 text-center">
                                                <a href="patient/findDoctors">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <i class="fa fa-search fa-5x"></i>
                                                            <p style="margin-bottom: 0px;"><label class="form-label">Find Doctors</label></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- <div class="col-md-4 text-center">
                                                <a data-toggle="modal" href="#addAppointmentModal">
                                                    <i class="fa fa-calendar fa-5x"></i>
                                                    <p style="margin-bottom: 0px;"><label class="form-label">Book Appointment</label></p>
                                                </a>
                                            </div> -->
                                            <div class="col-md-4 text-center">
                                                <a href="appointment/bookConsultation">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <i class="fa fa-calendar fa-5x"></i>
                                                            <p style="margin-bottom: 0px;"><label class="form-label">Book Appointment</label></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a href="patient/findClinicOrHospital">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <i class="fa fa-home fa-5x"></i>
                                                            <p style="margin-bottom: 0px;"><label class="form-label">Find Hospital/Clinic</label></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-proifle d-print-none">
                        <?php } else { ?>

                        <!--/app header-->
                        <!-- <form method="POST" action="patient/medicalHistory"> -->
                            <div class="row mt-5">
                                <div class="col-lg-8 col-md-8 col-sm-7">
                                    <?php if (!empty($encounter_id) || !empty($all_encounter)) { ?>
                                        <div class="card bg-primary">
                                            <div class="card-body text-white" id="encounterCard">
                                                <div id="encounterBanner">
                                                    <?php if (empty($all_encounter)) { ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold"><?php echo lang('encounter')?></span><?php echo ' '.$encounter_details->encounter_number; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold"><?php echo lang('patient').': ' ?></span><?php echo $patient->name ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold"><?php echo lang('encounter_type').': '; ?></span><span><?php echo $this->encounter_model->getEncounterTypeById($encounter_details->encounter_type_id)->display_name; ?></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold"><?php echo lang('location').': ' ?></span><span><?php echo $encounter_details->location_id?$this->branch_model->getBranchById($encounter_details->location_id)->display_name:$this->hospital_model->getHospitalById($encounter_details->hospital_id)->name.'( '.lang('online').' )'; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <span class="font-weight-bold"><?php echo lang('reason_for_visit').': '; ?></span><span><?php echo $encounter_details->reason; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold"><?php echo lang('waiting').' '.lang('started').': '; ?></span><?php echo $encounter_details->waiting_started?date('F j, Y h:i A', strtotime($encounter_details->waiting_started.' UTC')):''; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold"><?php echo lang('ready_to_serve_at').': '; ?></span><?php echo $encounter_details->ready_to_serve_at?$encounter_details->ready_to_serve_at:''; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold"><?php echo lang('started').': '; ?></span><?php echo $encounter_details->started_at?date('F j, Y h:i A', strtotime($encounter_details->started_at.' UTC')).'</span>':'<button class="btn btn-secondary btn-sm text-white startEncounter" data-id="'.$encounter_details->id.'">Start Encounter</button>'; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php if (!empty($encounter_details->started_at && empty($encounter_details->ended_at))) { ?>
                                                                    <span class="font-weight-bold"><?php echo lang('ended').': '; ?></span><button class="btn btn-secondary btn-sm endEncounter" data-id="<?php echo $encounter_details->id ?>">End Encounter</button>
                                                                <?php } else { ?>
                                                                    <span class="font-weight-bold"><?php echo lang('ended').': '; ?></span><?php echo $encounter_details->ended_at?date('F j, Y h:i A', strtotime($encounter_details->ended_at.' UTC')):'Not Yet Ended'; ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <span class="font-weight-bold"><?php echo $all_encounter.' '.lang('encounter'); ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <select class="select2-show-search w-100" name="encounter_id" id="encounter_selection" data-placeholder="<?php echo lang('select').' '.lang('encounter') ?>">
                                            <option></option>
                                            <option value="All"><?php echo lang("all").' '.lang("encounter") ?></option>
                                        </select>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3">
                                    <div class="form-group">
                                        <!-- <button class="btn btn-primary w-100" id="encounterChange">Change</button> -->
                                        <?php if(!empty($encounter_id) || !empty($all_encounter)) { ?>
                                            <a href="patient/medicalHistory?id=<?php echo $patient->patient_id; ?>" class="btn btn-primary w-100"><center>Change</center></a>
                                        <?php } else { ?>
                                            <!-- <a href="patient/medicalHistory?id=<?php echo $patient->id; ?>" class="btn btn-primary"><center>Change</center></a> -->
                                            <input type="hidden" name="id" id="patient_id" value="<?php echo $patient->patient_id ?>">
                                            <button class="btn btn-primary w-100" id="encounterSelect" type="submit">Apply</button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 pl-0">
                                    <div class="form-group">
                                        <a href="encounter/addNewView?patient_id=<?php echo $patient->patient_id ?>&root=patient&method=medicalHistory" class="btn btn-primary pull-right">
                                            <i class="fe fe-plus icon"></i><center class="button-text"><?php echo lang('create_encounter'); ?></center>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->
                        <div class="main-proifle d-print-none mt-5">
                        <?php } ?>
                            <!-- <div class="row">
                                <div class="col-lg-10 col-sm-12 col-md-12">
                                    <div class="box-widget widget-user">
                                        <div class="widget-user-image d-lg-flex">
                                            <img alt="User Avatar" class="rounded-circle p-1" src="<?php echo $patient->img_url?$patient->img_url:base_url('public/assets/images/users/placeholder.jpg'); ?>" style="width: 150px; height: 150px;" width="auto" height="auto">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-5 pr-0 d-lg-flex">
                                                    <div class="ml-sm-4 ml-md-4 mt-md-4 mt-sm-1 mr-lg-3 mr-mb-0 mr-sm-0">
                                                        <h4 class="pro-user-username mb-3 mt-1 font-weight-bold h-6"><?php echo $patient->name; ?></h4>
                                                        <div class="d-flex mb-1">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M20,10V8h-4V4h-2v4h-4V4H8v4H4v2h4v4H4v2h4v4h2v-4h4v4h2v-4h4v-2h-4v-4H20z M14,14h-4v-4h4V14z"/></g></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->id; ?></div>
                                                        </div>
                                                        <div class="d-flex mb-1">
                                                            <?php if ($patient->sex === 'male') { ?>
                                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,7.5c0.97,0,1.75-0.78,1.75-1.75S12.97,4,12,4s-1.75,0.78-1.75,1.75S11.03,7.5,12,7.5z M14,20v-5h1v-4.5 c0-1.1-0.9-2-2-2h-2c-1.1,0-2,0.9-2,2V15h1v5H14z"/></g></g></svg>
                                                                <div class="h6 mb-0 ml-1 mt-1">Male</div>
                                                            <?php } ?>
                                                            <?php if ($patient->sex === 'female') { ?>
                                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,7.5c0.97,0,1.75-0.78,1.75-1.75S12.97,4,12,4s-1.75,0.78-1.75,1.75S11.03,7.5,12,7.5z M14,16v4h-4v-4H8l2.38-6.38 C10.63,8.95,11.28,8.5,12,8.5s1.37,0.45,1.62,1.12L16,16H14z"/></g></g></svg>
                                                                <div class="h6 mb-0 ml-1 mt-1">Female</div>
                                                            <?php } ?>
                                                            <?php if ($patient->sex === 'other') { ?>
                                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M.01 0h24v24h-24V0z" fill="none"/><path d="M5.5 22v-7.5H4V9c0-1.1.9-2 2-2h3c1.1 0 2 .9 2 2v5.5H9.5V22h-4zM18 22v-6h3l-2.54-7.63C18.18 7.55 17.42 7 16.56 7h-.12c-.86 0-1.63.55-1.9 1.37L12 16h3v6h3zM7.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm9 0c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2z"/></svg>
                                                                <div class="h6 mb-0 ml-1 mt-1">Other</div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="d-flex">
                                                            
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.53 14.92l-1.08 1.07c-1.3 1.3-3.58 1.31-4.89 0l-1.07-1.07-1.09 1.07c-.64.64-1.5 1-2.4 1.01v3h14v-3c-.9-.01-1.76-.37-2.4-1.01l-1.07-1.07zM18 11H6c-.55 0-1 .45-1 1v3.5c.51-.01.99-.21 1.34-.57l2.14-2.13 2.13 2.13c.74.74 2.03.74 2.77 0l2.14-2.13 2.13 2.13c.36.36.84.56 1.35.57V12c0-.55-.45-1-1-1z" opacity=".3"/><path d="M12 6c1.11 0 2-.9 2-2 0-.38-.1-.73-.29-1.03L12 0l-1.71 2.97c-.19.3-.29.65-.29 1.03 0 1.1.9 2 2 2zm6 3h-5V7h-2v2H6c-1.66 0-3 1.34-3 3v9c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-9c0-1.66-1.34-3-3-3zm1 11H5v-3c.9-.01 1.76-.37 2.4-1.01l1.09-1.07 1.07 1.07c1.31 1.31 3.59 1.3 4.89 0l1.08-1.07 1.07 1.07c.64.64 1.5 1 2.4 1.01v3zm0-4.5c-.51-.01-.99-.2-1.35-.57l-2.13-2.13-2.14 2.13c-.74.74-2.03.74-2.77 0L8.48 12.8l-2.14 2.13c-.35.36-.83.56-1.34.57V12c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v3.5z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo time_elapsed_string($patient->birthdate,1 ,"short_age").' '.lang('old'); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-7 mt-md-0 mt-lg-8 pr-0 d-lg-flex">
                                                    <div class="ml-sm-4 mt-md-0 mt-sm-1 mr-lg-0 mr-mb-0 mr-sm-0">
                                                        <div class="d-flex mb-1">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 4h9v14H7z" opacity=".3"/><path d="M15.5 1h-8C6.12 1 5 2.12 5 3.5v17C5 21.88 6.12 23 7.5 23h8c1.38 0 2.5-1.12 2.5-2.5v-17C18 2.12 16.88 1 15.5 1zm-4 21c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4.5-4H7V4h9v14z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->phone; ?></div>
                                                        </div>
                                                        <div class="d-flex mb-1 pr-0">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->email; ?></div>
                                                        </div>
                                                        <div class="d-flex">
                                                            
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"></path><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"></path></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->address; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-12 col-md-12">
                                    <div class="mt-4 mt-lg-0">
                                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                            <a href="patient/editPatient?id=<?php echo $patient->id; ?>" class="btn btn-primary btn-xs btn_width" target="_blank"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-5 col-lg-2 col-sm-12 pr-1">
                                    <div class="box-widget widget-user">
                                        <div class="widget-user-image d-lg-flex">
                                            <center><img alt="User Avatar" class="rounded-circle p-1" src="<?php echo file_exists($patient->img_url)?$patient->img_url:base_url('public/assets/images/users/placeholder.jpg'); ?>" style="width: 150px; height: 150px;" width="auto" height="auto"></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-10 col-sm-12 pl-0">
                                    <div class="row mt-md-1 mt-sm-1 mr-lg-3 mr-mb-0 mr-sm-0">
                                        <div class="col-lg-9 col-md-12 col-sm-12">
                                            <h4 class="mb-3 mt-1 font-weight-bold h-6 text-md-center text-lg-left text-sm-center"><?php echo $patient->name; ?></h4>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                <?php if ($active_status != 1) { ?>
                                                    <center><a href="patient/editPatient?id=<?php echo $patient->patient_id; ?>" class="btn btn-primary btn-xs btn_width" target="_blank"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></a></center>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mb-1">
                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M20,10V8h-4V4h-2v4h-4V4H8v4H4v2h4v4H4v2h4v4h2v-4h4v4h2v-4h4v-2h-4v-4H20z M14,14h-4v-4h4V14z"/></g></svg>
                                                        <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->patient_id; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mb-1">
                                                        <?php if ($patient->sex === 'male') { ?>
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,7.5c0.97,0,1.75-0.78,1.75-1.75S12.97,4,12,4s-1.75,0.78-1.75,1.75S11.03,7.5,12,7.5z M14,20v-5h1v-4.5 c0-1.1-0.9-2-2-2h-2c-1.1,0-2,0.9-2,2V15h1v5H14z"/></g></g></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1">Male</div>
                                                        <?php } ?>
                                                        <?php if ($patient->sex === 'female') { ?>
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,7.5c0.97,0,1.75-0.78,1.75-1.75S12.97,4,12,4s-1.75,0.78-1.75,1.75S11.03,7.5,12,7.5z M14,16v4h-4v-4H8l2.38-6.38 C10.63,8.95,11.28,8.5,12,8.5s1.37,0.45,1.62,1.12L16,16H14z"/></g></g></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1">Female</div>
                                                        <?php } ?>
                                                        <?php if ($patient->sex === 'other') { ?>
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M.01 0h24v24h-24V0z" fill="none"/><path d="M5.5 22v-7.5H4V9c0-1.1.9-2 2-2h3c1.1 0 2 .9 2 2v5.5H9.5V22h-4zM18 22v-6h3l-2.54-7.63C18.18 7.55 17.42 7 16.56 7h-.12c-.86 0-1.63.55-1.9 1.37L12 16h3v6h3zM7.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm9 0c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1">Other</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mb-1">
                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.53 14.92l-1.08 1.07c-1.3 1.3-3.58 1.31-4.89 0l-1.07-1.07-1.09 1.07c-.64.64-1.5 1-2.4 1.01v3h14v-3c-.9-.01-1.76-.37-2.4-1.01l-1.07-1.07zM18 11H6c-.55 0-1 .45-1 1v3.5c.51-.01.99-.21 1.34-.57l2.14-2.13 2.13 2.13c.74.74 2.03.74 2.77 0l2.14-2.13 2.13 2.13c.36.36.84.56 1.35.57V12c0-.55-.45-1-1-1z" opacity=".3"/><path d="M12 6c1.11 0 2-.9 2-2 0-.38-.1-.73-.29-1.03L12 0l-1.71 2.97c-.19.3-.29.65-.29 1.03 0 1.1.9 2 2 2zm6 3h-5V7h-2v2H6c-1.66 0-3 1.34-3 3v9c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-9c0-1.66-1.34-3-3-3zm1 11H5v-3c.9-.01 1.76-.37 2.4-1.01l1.09-1.07 1.07 1.07c1.31 1.31 3.59 1.3 4.89 0l1.08-1.07 1.07 1.07c.64.64 1.5 1 2.4 1.01v3zm0-4.5c-.51-.01-.99-.2-1.35-.57l-2.13-2.13-2.14 2.13c-.74.74-2.03.74-2.77 0L8.48 12.8l-2.14 2.13c-.35.36-.83.56-1.34.57V12c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v3.5z"/></svg>
                                                        <div class="h6 mb-0 ml-1 mt-1"><?php echo time_elapsed_string($patient->birthdate,1 ,"short_age").' '.lang('old'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mb-1">
                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 4h9v14H7z" opacity=".3"/><path d="M15.5 1h-8C6.12 1 5 2.12 5 3.5v17C5 21.88 6.12 23 7.5 23h8c1.38 0 2.5-1.12 2.5-2.5v-17C18 2.12 16.88 1 15.5 1zm-4 21c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4.5-4H7V4h9v14z"/></svg>
                                                        <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->phone; ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-flex mb-1 pr-0">
                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                                                        <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->email; ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-flex mb-1">
                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"></path><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"></path></svg>
                                                        <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->address; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mb-1">
                                                        <span class="h6 mb-0 ml-1 mt-1"><?php echo lang('allergies').': '.$patient->allergies; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-cover">
                                <div class="wideget-user-tab">
                                    <div class="tab-menu-heading p-0">
                                        <div class="tabs-menu1 px-3">
                                            <ul class="nav" id="mytab">
                                                <?php if ($this->ion_auth->in_group(array('Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('diagnosis', $this->modules)) { ?>
                                                        <li><a href="#tab-6" data-toggle="tab" class="active"><?php echo lang('diagnosis'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('vital', $this->modules)) { ?>
                                                        <li><a href="#tab-7" data-toggle="tab"><?php echo lang('vital_signs'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('appointment', $this->modules)) { ?>
                                                        <li><a href="#tab-8" data-toggle="tab" class=""><?php echo lang('appointments'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('Doctor','Midwife','Nurse'))) { ?>
                                                    <?php if (in_array('casenote', $this->modules)) { ?>
                                                        <li><a href="#tab-9" data-toggle="tab" class=""><?php echo lang('case_notes'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('prescription', $this->modules)) { ?>
                                                        <li><a href="#tab-10" data-toggle="tab" class=""><?php echo lang('prescription'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('labrequest', $this->modules)) { ?>
                                                        <li><a href="#tab-11" data-toggle="tab" class=""><?php echo lang('lab').' '.lang('request'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('form', $this->modules)) { ?>
                                                        <li><a href="#tab-12" data-toggle="tab" class=""><?php echo lang('forms'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Laboratorist'))) { ?>
                                                    <?php if (in_array('procedure', $this->modules)) { ?>
                                                        <li><a href="#tab-17" data-toggle="tab" class=""><?php echo lang('procedure'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('patient', $this->modules)) { ?>
                                                        <li><a href="#tab-14" data-toggle="tab" class=""><?php echo lang('documents'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                                    <?php if (in_array('encounter', $this->modules)) { ?>
                                                        <li><a href="#tab-15" data-toggle="tab" class=""><?php echo lang('encounters'); ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                        <li><a href="#tab-16" data-toggle="tab" class=""><?php echo lang('timeline'); ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.profile-cover -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="border-0">
                                    <div class="tab-content">
                                    <?php if ($this->ion_auth->in_group(array('Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('diagnosis', $this->modules)) { ?>
                                            <div class="tab-pane active" id="tab-6">
                                                <div class="mb-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title"><?php echo lang('diagnosis') ?></h3>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) { ?> 
                                                                    <a href="diagnosis/addDiagnosisView?encounter_id=<?php echo $encounter_id.'&root=patient&method=medicalHistory&patient='.$patient->patient_id; ?>" class="btn btn-primary"><?php echo lang('add_new'); ?></a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample" class="table table-bordered text-nowrap key-buttons w-100 editable-sample">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center normal-caps"><?php echo lang('diagnosis').' '.lang('date'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('onset').' '.lang('date'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('diagnosis'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('icd'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('p/s'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('note'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('encounter'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('facility'); ?></th>
                                                                                <?php if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) { ?>
                                                                                    <th class="text-center normal-caps"><?php echo lang('actions'); ?></th>
                                                                                <?php } ?>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- <div class="row">
                                                        
                                                    </div>

                                                    <div class="row">
                                                        
                                                    </div> -->
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('vital', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-7">
                                                <div class="mb-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title"><?php echo lang('vital_signs') ?></h3>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group('Patient')) { ?>
                                                                    <a data-target="#AddVital" data-toggle="modal" href="" class="btn btn-primary vitalmodal"><?php echo lang('add_new'); ?></a>
                                                                <?php } else { ?>
                                                                    <a data-target="#AddVital" data-toggle="modal" href="" class="btn btn-primary vitalmodal"><?php echo lang('add_new'); ?></a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample1" class="table table-bordered text-nowrap key-buttons w-100 editable-sample1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center normal-caps"><?php echo lang('measured_at'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('heart_rate').'<br>'.'('.lang('bpm').')'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('height').'<br>'.'(cm)'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('weight').'<br>'.'(kg)'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('bmi'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('bp').'<br>'.'(mmHg)'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('blood_sugar').'<br>'.'(mg/dL)'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('temperature').'<br>'.'(&#176;C)'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('spo2').'<br>'.'(%)'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('respiration_rate').'<br>'.'('.lang('bpm').')'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('pain_level').'<br>'.'('.lang('10_highest').')'; ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('note'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('facility'); ?></th>
                                                                                <th class="text-center normal-caps"><?php echo lang('actions'); ?></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- <div class="row">
                                                        
                                                    </div>

                                                    <div class="row">
                                                        
                                                    </div> -->
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('appointment', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-8">
                                                <div class="mb-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <?php echo lang('appointment'); ?>
                                                            </div>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife', 'Nurse'))) { ?>
                                                                    <div class=" no-print">
                                                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?root=patient&method=medicalHistory&patient_id=<?php echo $patient->patient_id.'&encounter_id='.$encounter_id; ?>"><i class="fe fe-plus"></i><?php echo lang('add_new'); ?> </a>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($this->ion_auth->in_group('Patient')) { ?>
                                                                    <div class=" no-print">
                                                                        <a href="appointment/bookConsultation" class="btn btn-primary">
                                                                            <i class="fa fa-plus"> </i> <?php echo lang('request_a_appointment'); ?>
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample2" class="table table-bordered text-nowrap key-buttons w-100 editable-sample2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo lang('date'); ?></th>
                                                                                <th><?php echo lang('time_slot'); ?></th>
                                                                                <th><?php echo lang('doctor'); ?></th>
                                                                                <th><?php echo lang('status'); ?></th>
                                                                                <th><?php echo lang('facility'); ?></th>
                                                                                <th><?php echo lang('service_type'); ?></th>
                                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist', 'Midwife'))) { ?>
                                                                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                                                                <?php } ?>
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
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('Doctor','Midwife','Nurse'))) { ?>
                                        <?php if (in_array('casenote', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-9">
                                                <div class="mb-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <?php echo lang('case_notes'); ?>
                                                            </div>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor', 'Midwife', 'admin', 'Nurse'))) { ?>
                                                                    <div class=" no-print">
                                                                        <a class="btn btn-primary btn_width btn-xs" data-toggle="modal" href="#myModal">
                                                                            <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample3" class="table table table-bordered text-nowrap key-buttons w-100 editable-sample3">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="w-15"><?php echo lang('date'); ?></th>
                                                                                <th class="w-15"><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?></th>
                                                                                <th class="w-45"><?php echo lang('case'); ?> <?php echo lang('summary'); ?></th>
                                                                                <th class="w-20"><?php echo lang('facility'); ?></th>
                                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Midwife','Nurse'))) { ?>
                                                                                    <th class="no-print w-5"><?php echo lang('options'); ?></th>
                                                                                <?php } ?>
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
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('prescription', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-10">
                                                <div class="mb-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <?php echo lang('prescription'); ?>
                                                            </div>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) { ?>
                                                                    <div class=" no-print">
                                                                        <a class="btn btn-primary btn_width btn-xs" href="prescription/addPrescriptionView?<?php echo 'encounter_id='.$encounter_id.'&root=patient&method=medicalHistory&patient_id='.$patient->patient_id; ?>">
                                                                            <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample4" class="table table-bordered text-nowrap key-buttons w-100 editable-sample4">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo lang('date'); ?></th>
                                                                                <th><?php echo lang('doctor'); ?></th>
                                                                                <th><?php echo lang('medicine'); ?></th>
                                                                                <th><?php echo lang('facility'); ?></th>
                                                                                <th class="no-print"><?php echo lang('options'); ?></th>
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
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('labrequest', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-11">
                                                <div class="mb-0 border">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <?php echo lang('lab').' '.lang('request')?>
                                                            </div>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor', 'Midwife'))) { ?>
                                                                    <a href="labrequest/addLabRequestView?encounter_id=<?php echo $encounter_id.'&root=patient&method=medicalHistory&patient_id='.$patient->patient_id; ?>" class="btn btn-primary"><?php echo lang('add_new') ?></a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample5" class="table table-bordered text-nowrap key-buttons w-100 editable-sample5">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="border-bottom-0"><?php echo lang('date'); ?></th>
                                                                                <th class="border-bottom-0"><?php echo lang('lab').' '.lang('request').' '.lang('number'); ?></th>
                                                                                <th class="border-bottom-0"><?php echo lang('lab').' '.lang('test'); ?></th>
                                                                                <th class="border-bottom-0"><?php echo lang('patient'); ?></th>
                                                                                <th class="border-bottom-0"><?php echo lang('doctors'); ?></th>
                                                                                <th class="border-bottom-0"><?php echo lang('facility'); ?></th>
                                                                                <th class="border-bottom-0"><?php echo lang('actions'); ?></th>
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
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('form', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-12">
                                                <div class="mb-0 border">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <?php echo lang('forms')?>
                                                            </div>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor', 'admin', 'Midwife', 'Nurse'))) { ?>
                                                                    <a href="form?encounter_id=<?php echo $encounter_id.'&root=patient&method=medicalHistory&addnew=true&patient_id='.$patient->patient_id; ?>" class="btn btn-primary"><?php echo lang('add_new') ?></a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample7" class="table table-bordered text-nowrap key-buttons w-100 editable-sample7">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo lang('date') ?></th>
                                                                                <th><?php echo lang('form').' '.lang('number') ?></th>
                                                                                <th><?php echo lang('name') ?></th>
                                                                                <th><?php echo lang('patient') ?></th>
                                                                                <th><?php echo lang('facility'); ?></th>
                                                                                <?php if ($this->ion_auth->in_group(array('admin','Doctor', 'Midwife','Nurse'))) { ?>
                                                                                    <th><?php echo lang('actions') ?></th>
                                                                                <?php } ?>
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
                                        <?php } ?>
                                    <?php } ?>
                                        <div class="tab-pane" id="tab-13">
                                            <div class="mb-0 border">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <?php echo lang('lab')?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table id="editable-sample15" class="table table-bordered text-nowrap key-buttons w-100 editable-sample15">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo lang('date'); ?></th>
                                                                            <th><?php echo lang('id'); ?></th>
                                                                            <th><?php echo lang('doctor'); ?></th>
                                                                            <th><?php echo lang('facility'); ?></th>
                                                                            <th class="no-print"><?php echo lang('options'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php /*foreach ($labs as $lab) {*/ ?>
                                                                            <!-- <tr class="">
                                                                                <td><?php /*echo date('Y-m-d h:i A', strtotime($lab->lab_date.' UTC'));*/ ?></td>
                                                                                <td><?php /*echo $lab->id;*/ ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    /*$doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
                                                                                    if (!empty($doctor_details)) {
                                                                                        $lab_doctor = $doctor_details->name;
                                                                                    } else {
                                                                                        $lab_doctor = '';
                                                                                    }
                                                                                    echo $lab_doctor;*/
                                                                                    ?>
                                                                                </td>
                                                                                <td><?php
                                                                                    /*$facility = $this->hospital_model->getHospitalById($lab->hospital_id);
                                                                                    if (!empty($lab->hospital_id)) {
                                                                                        $lab_facility = $facility->name;
                                                                                    } else {
                                                                                        $lab_facility = '';
                                                                                    }
                                                                                    echo $lab_facility;*/
                                                                                ?></td>
                                                                                <td class="no-print">
                                                                                    <a class="btn btn-info btn-xs btn_width" href="lab/invoice?id=<?php /*echo $lab->id;*/ ?>"><i class="fa fa-eye"></i></a>   
                                                                                </td>
                                                                            </tr> -->
                                                                        <?php /*}*/ ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('patient', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-14">
                                                <div class="card p-5">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-8 col-sm-5 mb-4">
                                                                    <a class="btn btn-primary" data-toggle="modal" href="#myModal1">
                                                                        <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                                    </a>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-7 mb-4">
                                                                    <div class="form-group">
                                                                        <div class="input-icon">
                                                                            <span class="input-icon-addon">
                                                                                <i class="fe fe-search"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control searchbox-input" placeholder="Search Files">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-0">
                                                        <div class="row myDocuments">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse','Patient'))) { ?>
                                        <?php if (in_array('encounter', $this->modules)) { ?>
                                            <div class="tab-pane" id="tab-15">
                                                <div class="mb-0 border">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                 <?php echo lang('encounters'); ?>
                                                            </div>
                                                            <div class="card-options">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor', 'Midwife', 'admin', 'Nurse','Patient'))) { ?>
                                                                    <div class=" no-print">
                                                                        <a class="btn btn-primary btn_width btn-xs" href="encounter/addNewView?patient_id=<?php echo $patient->patient_id.'&root=patient&method=medicalHistory&encounter_request=true' ?>">
                                                                            <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample6" class="table table-bordered text-nowrap key-buttons w-100 editable-sample6">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo lang('date'); ?></th>
                                                                                <th><?php echo lang('encounter') . ' ' . lang('number'); ?></th>
                                                                                <th><?php echo lang('type'); ?></th>
                                                                                <th><?php echo lang('facility'); ?></th>
                                                                                <th><?php echo lang('status'); ?></th>
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
                                        <?php } ?>
                                    <?php } ?>
                                        <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                        <div class="tab-pane" id="tab-16">
                                            <ul class="timelineleft pb-5">
                                                <?php
                                                if (!empty($timeline)) {
                                                    krsort($timeline);
                                                    foreach ($timeline as $key => $value) {
                                                        echo $value;
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php } ?>

                                        <!-- procedure -->
                                        <?php if ($this->ion_auth->in_group(array('admin','Doctor','Midwife','Nurse', 'Laboratorist'))) { ?>
                                            <div class="tab-pane" id="tab-17">
                                            <div class="mb-0 border">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <?php echo lang('procedure'); ?>
                                                        </div>
                                                        <div class="card-options">
                                                            <?php if ($this->ion_auth->in_group(array('Doctor', 'Nurse'))) { ?>
                                                                <div class="no-print">
                                                                    <a class="btn btn-primary btn_width btn-xs" href="procedure/addNewView?patient_id=<?php echo $patient->patient_id.'&root=patient&method=medicalHistory&procedure_request=true' ?>">
                                                                        <?php echo lang('add_new'); ?>
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table id="editable-sample8" class="table table-bordered text-nowrap key-buttons w-100 editable-sample8">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo lang('date'); ?></th>
                                                                            <th><?php echo lang('procedure'); ?></th>
                                                                            <th><?php echo lang('performed_by') ?></th>
                                                                            <th><?php echo lang('note'); ?></th>
                                                                            <th><?php echo lang('facility'); ?></th>
                                                                            <th><?php echo lang('status'); ?></th>
                                                                            <th class="no-print"><?php echo lang('options'); ?></th>
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
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sEncounter" class="modal fade">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="modal-title">Confirmation</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="sEncounterForm" action="encounter/startEncounter" method="post">
                                    <div class="modal-body pd-20">
                                            <input type="hidden" name="encounter_id" value="" id="encounter">
                                            <input type="hidden" name="redirect" value="patient/medicalHistory?encounter_id=<?php echo $encounter_id ?>">
                                            <span>Are you sure you want to Start this Encounter</span>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-primary" type="submit" name="submit">End Encounter</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div><!-- modal-dialog -->
                        </div>

                        <div id="eEncounter" class="modal fade">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="modal-title">Confirmation</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="eEncounterForm" action="encounter/endEncounter" method="post">
                                    <div class="modal-body pd-20">
                                            <input type="hidden" name="encounter_id" value="" id="encounter">
                                            <input type="hidden" name="redirect" value="patient/medicalHistory?encounter_id=<?php echo $encounter_id ?>">
                                            <span>Are you sure you want to End this Encounter</span>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default">Cancel</button>
                                                <button class="btn btn-primary" type="submit" name="submit">End Encounter</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div><!-- modal-dialog -->
                        </div>

                        <!-- //Add Vitals Modal Start -->

                            <div class="modal" id="AddVital">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('add_vitals'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" action="patient/addVitals" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="encounter_id" value="<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('encounter'); ?><span class="text-danger">*</span></label>
                                                                <select class="select2-show-search" name="encounter_id" id="encounter_vital">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- Redirect Area Start -->
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="redirect" value="patient/medicalHistory?encounter_id=<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- Redirect Area End -->
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('date'); ?> <?php echo lang('measured'); ?> <span class="text-danger">*</span></label>
                                                            <input class="form-control flatpickr" readonly name="datetime" placeholder="MM/DD/YYYY" type="text" required>
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
                                                            <label class="form-label"><?php echo lang('blood_sugar'); ?></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="blood_sugar">
                                                                <div class="input-group-append br-tl-0 br-bl-0">
                                                                    <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="blood_sugar_unit">
                                                                        <option value="mg_dl"><?php echo lang('mg_dl'); ?></option>
                                                                        <option value="mmol"><?php echo lang('mmol'); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('blood_sugar_measured') . ' ' . lang('during');?></label>
                                                            <div class="input-group">
                                                                <select class="form-control select2-show-search" name="blood_sugar_timing" data-placeholder="Choose one">
                                                                    <option label="Choose one"></option>
                                                                    <option value="fasting"><?php echo lang('fasting'); ?> (<?php echo lang('upon_first_waking_up'); ?>)</option>
                                                                    <option value="before_meal"><?php echo lang('before_meal'); ?></option>
                                                                    <option value="after_meal"><?php echo lang('after_meal'); ?></option>
                                                                    <option value="bed_time"><?php echo lang('bed_time'); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
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
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('temperature_site') ?></label>
                                                            <div class="input-group">
                                                                <select class="form-control select2-show-search" name="temp_site" data-placeholder="Choose one">
                                                                    <option label="Choose one"></option>
                                                                    <option value="anus"><?php echo lang('anus'); ?></option>
                                                                    <option value="armpit"><?php echo lang('armpit'); ?></option>
                                                                    <option value="ear"><?php echo lang('ear'); ?></option>
                                                                    <option value="forehead"><?php echo lang('forehead'); ?></option>
                                                                    <option value="mouth"><?php echo lang('mouth'); ?></option>
                                                                </select>
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
                                                <input type="text" name="patient" hidden value='<?php echo $patient->id; ?>'>
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

                            <div class="modal fade" id="editVitalModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('edit_vital'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="editVitalForm" class="clearfix" action="patient/addVitals" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="encounter_id" value="<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('encounter'); ?><span class="text-danger">*</span></label>
                                                                <select class="select2-show-search" name="encounter_id" id="edit_encounter_vital">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="redirect" value="patient/medicalHistory?encounter_id=<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('date'); ?> <?php echo lang('measured'); ?></label>
                                                            <input class="form-control flatpickr datetime" readonly name="datetime" placeholder="MM/DD/YYYY" type="text">
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
                                                                    <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="weight_unit" id="weight_unit">
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
                                                                    <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="height_unit" id="height_unit">
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
                                                            <label class="form-label"><?php echo lang('blood_sugar'); ?></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="blood_sugar">
                                                                <div class="input-group-append br-tl-0 br-bl-0">
                                                                    <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="blood_sugar_unit">
                                                                        <option value="mg_dl"><?php echo lang('mg_dl'); ?></option>
                                                                        <option value="mmol"><?php echo lang('mmol'); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('blood_sugar_measured') . ' ' . lang('during');?></label>
                                                            <div class="input-group">
                                                                <select class="form-control select2-show-search" name="blood_sugar_timing" data-placeholder="Choose one">
                                                                    <option label="Choose one"></option>
                                                                    <option value="fasting"><?php echo lang('fasting'); ?> (<?php echo lang('upon_first_waking_up'); ?>)</option>
                                                                    <option value="before_meal"><?php echo lang('before_meal'); ?></option>
                                                                    <option value="after_meal"><?php echo lang('after_meal'); ?></option>
                                                                    <option value="bed_time"><?php echo lang('bed_time'); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
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
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('temperature_site') ?></label>
                                                            <div class="input-group">
                                                                <select class="form-control select2-show-search" name="temp_site" data-placeholder="Choose one">
                                                                    <option label="Choose one"></option>
                                                                    <option value="anus"><?php echo lang('anus'); ?></option>
                                                                    <option value="armpit"><?php echo lang('armpit'); ?></option>
                                                                    <option value="ear"><?php echo lang('ear'); ?></option>
                                                                    <option value="forehead"><?php echo lang('forehead'); ?></option>
                                                                    <option value="mouth"><?php echo lang('mouth'); ?></option>
                                                                </select>
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
                                                            <input class="myrangeslider2" data-extra-classes="irs-outline" name="pain_level" id="pain_level" type="input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" name="patient" hidden value='<?php echo $patient->id; ?>'>
                                                <input type="text" name="id" hidden>
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


                        <!-- //Add Vitals Modal End -->

                        <!-- //Documents Modal Start -->

                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('document'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="addDocumentForm" action="patient/addPatientMaterial" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="encounter_id" value="<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Associate with Encounter?</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <label class="custom-control custom-radio">
                                                                            <input type="radio" class="custom-control-input" name="encounter_check" value="1">
                                                                            <span class="custom-control-label">Yes</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <label class="custom-control custom-radio">
                                                                            <input type="radio" class="custom-control-input" name="encounter_check" value="0">
                                                                            <span class="custom-control-label">No</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" hidden id="encounter_document_div">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('encounter'); ?><span class="text-danger">*</span></label>
                                                                <select class="select2-show-search" name="encounter_id" id="encounter_document">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('title'); ?> <span class="text-red">*</span></label>
                                                            <input type="text" class="form-control" name="title" id="title" placeholder="<?=lang('title');?>" required maxlength="100" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('description'); ?> <span class="text-red">*</span></label>
                                                            <textarea class="form-control" id="documentDescription" name="description" id="description" placeholder="<?=lang('description');?>" rows="2" required maxlength="300" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('category'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="category" id="category" data-placeholder="<?=lang('select').' '.lang('category');?>" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('file'); ?> <span class="text-red">*</span></label>
                                                            <span class="text-muted">(<?php echo lang('upload_less_than_xMB_image_or_pdf');?> and 10K by 10K Max Dimension)</span>
                                                            <input type="file" name="img_url" id="document" class="dropify" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Redirect Area Start -->
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="redirect" value="patient/medicalHistory?encounter_id=<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="redirect" value="<?php echo 'patient/medicalHistory?id=' .$patient->patient_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- Redirect Area End -->
                                                <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <button class="btn btn-primary pull-right" name="submit" id="documentSubmit" type="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- //Documents Modal End -->

                        <!-- //Case History Modal Start -->

                            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('add_case'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="addFormsForm" action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="javascript: return myFunction();">
                                            <div class="modal-body">
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="encounter_id" value="<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('encounter'); ?><span class="text-danger">*</span></label>
                                                                <select class="select2-show-search" name="encounter_id" id="encounter_case">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                            <input class="form-control flatpickr" id="caseDate" readonly name="date" placeholder="MM/DD/YYYY" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?> <span class="text-red">*</span></label>
                                                            <input type="text" class="form-control" id="caseTitle" name="title" placeholder="Name" required maxlength="1000">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('case'); ?> <?php echo lang('summary'); ?> <span class="text-red">*</span></label>
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
                                                            <textarea id="description" name="description" id="caseDescription" readonly="" hidden="" class="form-control" rows="4" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Redirect Area Start -->
                                            <?php if (!empty($encounter_id)) { ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <input type="hidden" name="redirect" value="patient/medicalHistory?encounter_id=<?php echo $encounter_id ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <!-- Redirect Area End -->
                                            <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                                            <input type="hidden" name="id" value=''>
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit" id="caseSubmit" name="submit"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('edit_case'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form  role="form" id="medical_historyEditForm" class="clearfix" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data" onsubmit="javascript: return myFunction2();">
                                            <div class="modal-body">
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="text" name="encounter_id" value="<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('encounter'); ?><span class="text-danger">*</span></label>
                                                                <select class="select2-show-search" name="encounter_id" id="edit_encounter_case">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="redirect" value="patient/medicalHistory?encounter_id=<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                            <input class="form-control flatpickr datetime" readonly name="date" placeholder="MM/DD/YYYY" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?> <span class="text-red">*</span></label>
                                                            <input type="text" name="title" class="form-control" placeholder="Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('case'); ?> <?php echo lang('summary'); ?> <span class="text-red">*</span></label>
                                                            <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                                <div id="quillEditor2" class="bg-white">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="sampleDiv" class="row">
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <textarea id="description2" name="description" readonly="" hidden class="form-control" required rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                                            <input type="hidden" name="id" value=''>
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit" name="EditCase">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- //Case History Modal End -->

                        <?php
                        $current_user = $this->ion_auth->get_user_id();
                        if ($this->ion_auth->in_group('Doctor')) {
                            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
                        }
                        ?>

                        <!-- //Appointment Modal Start -->

                            <div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('add_appointment'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="addAppointmentForm" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search pos_select" id="pos_select" name="patient" data-placeholder="Choose one" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pos_client clearfix">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                                <input type="text" name="p_name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                                <input type="email" name="p_email" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                                <form>
                                                                    <input id="phone" name="p_phone" value="+63" type="tel">
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                                <input type="text" name="p_age" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                                            <select class="form-control select2-show-search" name="p_gender" data-placeholder="Choose one">
                                                                <option value="Male" <?php
                                                                if (!empty($patient->sex)) {
                                                                    if ($patient->sex == 'Male') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > Male </option>   
                                                                <option value="Female" <?php
                                                                if (!empty($patient->sex)) {
                                                                    if ($patient->sex == 'Female') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > Female </option>
                                                                <option value="Others" <?php
                                                                if (!empty($patient->sex)) {
                                                                    if ($patient->sex == 'Others') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > Others </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="doctor" id="adoctors" data-placeholder="Choose one" required>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('service_type'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search service_cat" name="service_category_group" id="service_select" data-placeholder="Choose one (with searchbox)"  required="">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('service'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search sub_service" id="sub_service" name="service" data-placeholder="Choose one (with searchbox)"  required="">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group branch_select">
                                                            <label class="form-label"> <?php echo lang('location'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search branch" name="branch" id="branch_select" data-placeholder="Choose one (with searchbox)">
                                                                <option selected value="">Choose One</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control appointmentFlatpickr" placeholder="MM/DD/YYYY" id="date" name="date" readonly required>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Available Slot <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search aslot" name="time_slot" id="aslots" data-placeholder="Choose one" required>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="status" data-placeholder="Choose one" required>
                                                                <option value="Pending Confirmation" <?php
                                                                    ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                                <option value="Confirmed" <?php
                                                                    ?> > <?php echo lang('confirmed'); ?> </option>
                                                                <option value="Consulted" <?php
                                                                    ?> > <?php echo lang('consulted'); ?> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('complaint'); ?> <span class="text-red">*</span></label>
                                                            <textarea class="form-control mb-4" placeholder="Purpose" name="remarks" rows="3" maxlength="500" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Redirect Area Start -->
                                                <?php if (!empty($encounter_id)) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="hidden" name="redirect" value="patient/medicalHistory?id=<?php echo $patient->id ?>&encounter_id=<?php echo $encounter_id ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- Redirect Area End -->
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('edit_appointment'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="editAppointmentForm" class="clearfix" action="appointment/addNew" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?><span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search pos_select patient" name="patient" id="pos_select" data-placeholder="Choose One" required>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">  <?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search doctor" id="adoctors1" name="doctor" data-placeholder="Choose One" required>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('service_type'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search service_cat1" name="service_category_group" id="service_select1" data-placeholder="Choose one (with searchbox)"  required>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('service'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search sub_service1" id="sub_service1" name="service" data-placeholder="Choose one (with searchbox)"  required>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group branch_select1">
                                                            <label class="form-label"> <?php echo lang('location'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search branch1" name="branch" id="branch_select1" data-placeholder="Choose one (with searchbox)">
                                                                <option selected value="">Choose One</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('date'); ?><span class="text-red">*</span></label>
                                                        <input class="form-control appointmentFlatpickr" name="date" id="date1" placeholder="MM/DD/YYYY" type="text" readonly required>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Available Slot <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="time_slot" id="aslots1" required>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="status" data-placeholder="Choose one" required>
                                                                <option value="Pending Confirmation" <?php
                                                                    ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                                <option value="Confirmed" <?php
                                                                    ?> > <?php echo lang('confirmed'); ?> </option>
                                                                <option value="Consulted" <?php
                                                                    ?> > <?php echo lang('consulted'); ?> </option>
                                                                <option value="Cancelled" <?php
                                                                    ?> > <?php echo lang('cancelled'); ?> </option>
                                                                <option value="Requested" <?php
                                                                    ?> > <?php echo lang('requested'); ?> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('complaint'); ?> <span class="text-red">*</span></label>
                                                            <textarea class="form-control mb-4" name="remarks" placeholder="Purpose" rows="3" maxlength="500" required></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" id="appointment_id" value=''>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <button class="btn btn-primary pull-right" name="EditAppointment" type="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- //Appointment Modal End -->


                        <!-- // Edit Modal Start -->
                        <div class="modal fade" id="patientEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('document'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="editDocumentForm" action="patient/addPatientMaterial" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('editDocumentForm');">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" id="editpatientchoose" name="patient" data-placeholder="<?=lang('select').' '.lang('patient');?>" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Associate with Encounter?</label>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <label class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="yes" name="edit_encounter_check" value="1">
                                                                        <span class="custom-control-label">Yes</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <label class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="no" name="edit_encounter_check" value="0">
                                                                        <span class="custom-control-label">No</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12" id="edit_encounter_div">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('encounter'); ?></label>
                                                            <select class="form-control select2-show-search" name="encounter_id" id="editencounter" data-placeholder="Choose One">
                                                            <option value="0" label="choose one">Choose One</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('category'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="category" id="editcategory" data-placeholder="<?=lang('select').' '.lang('category');?>" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('title'); ?> <span class="text-red">*</span></label>
                                                            <input type="text" class="form-control" name="title" id="edittitle" placeholder="<?=lang('title');?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('description'); ?></label>
                                                            <input type="text" class="form-control" name="description" id="editdescription" required placeholder="<?=lang('description');?>">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="redirect" value='patient/medicalHistory'>
                                                    <input type="hidden" name="id" value=''>
                                                    <div class="col-md-12 col-sm-12">
                                                        <button class="btn btn-primary pull-right" name="submit" id="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- // Edit Modal End -->

                    </div>
                </div>
            </div>

            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            Copyright ?? 2021 <a href="#">Rygel Dash</a>. Deployed by <a href="#">Rygel Technology Solutions</a> All rights reserved.
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

        <!-- WYSIWYG Editor js -->
        <script src="<?php echo base_url('public/assets/plugins/wysiwyag/jquery.richtext.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor.js'); ?>"></script>

        <!-- quill js -->
        <script src="<?php echo base_url('public/assets/plugins/quill/quill.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor2.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- ion.rangeSlider.min js -->
        <script src="<?php echo base_url('public/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/rangeslider.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <!-- <script type="text/javascript">
        $(".myrangeslider1").change(function (){
            var slider = $(".myrangeslider1").val();
            console.log(slider);
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            var patient = "<?php echo $patient->id ?>";
            $("#encounter_vital").select2({
                placeholder: '<?php echo lang('select') . ' ' . lang('encounter'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getEncounterInfoByPatientId?patient='+patient,
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
            var patient = "<?php echo $patient->id ?>";
            $("#encounter_case").select2({
                placeholder: '<?php echo lang('select') . ' ' . lang('encounter'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getEncounterInfoByPatientId?patient='+patient,
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
            var patient = "<?php echo $patient->id ?>";
            $("#encounter_document").select2({
                placeholder: '<?php echo lang('select') . ' ' . lang('encounter'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getEncounterInfoByPatientId?patient='+patient,
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
            $('input[type=radio][name=encounter_check]').change(function() {
                var encounter = this.value;
                if (encounter == 1) {
                    $("#encounter_document_div").attr("hidden", false);
                } else {
                    $("#encounter_document").val(0).change();
                    $("#encounter_document_div").attr("hidden", true);
                }
            });
        })
    </script>

    <script type="text/javascript">
        $("#encounterBanner").on("click", ".startEncounter", function() {
            var iid = $(this).attr('data-id');
            $("#sEncounterForm").find('[name="encounter_id"]').val(iid).end()
            $('#sEncounter').modal('show');
        })
    </script>

    <script type="text/javascript">
        $("#encounterBanner").on("click", ".endEncounter", function() {
            var iid = $(this).attr('data-id');
            $("#eEncounterForm").find('[name="encounter_id"]').val(iid).end()
            $('#eEncounter').modal('show');
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#caseSubmit").click(function () {
                var date = $('#caseDate').parsley();
                var title = $('#caseTitle').parsley();
                var description = $('#caseDescription').parsley();

                if (date.isValid() && title.isValid() && description.isValid()) {
                    return true;
                } else {
                    date.validate();
                    title.validate();
                    description.validate();
                }
            })

            $("#documentSubmit").click(function () {
                var title = $('#title').parsley();
                var category = $('#category').parsley();
                var description = $('#description').parsley();

                if (category.isValid() && title.isValid() && description.isValid()) {
                    return true;
                } else {
                    title.validate();
                    category.validate();
                    description.validate();
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                sessionStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = sessionStorage.getItem('activeTab');
            if(activeTab){
                $('#mytab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#encounterSelect").click(function () {
                var encounter_id = $("#encounter_selection").val();
                var patient_id = $("#patient_id").val();
                window.location.href = 'patient/medicalHistory?encounter_id='+encounter_id;
            })
        });
    </script>

    <script type="text/javascript">
        $("document").ready(function() {
            var patient = '<?php echo $patient->id; ?>';
            $("#encounter_selection").find('option').remove();

            $.ajax({
                url: 'encounter/getEncounterByPatientIdJason?id='+patient,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var encounter = response.encounter;
                    $('#encounter_selection').append($('<option>').text('<?php echo lang('all').' '.lang('encounter'); ?>').val('All')).end();
                    $.each(encounter, function (key, value) {
                        $('#encounter_selection').append($('<option>').text(value.text).val(value.id)).end();
                    });
                }
            })
        });
    </script>

    <script>
        $('#addAppointmentForm').parsley();
        $('#editAppointmentForm').parsley();
        $('#addFormsForm').parsley();
        $('#medical_historyEditForm').parsley();
        $('#addDocumentForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var timenow = "<?php echo date('Y-m-d H:i'); ?>";
            var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
            flatpickr(".flatpickr", {
                disable: [maxdate],
                maxDate: maxdate,
                altInput: true,
                altFormat: "F j, Y h:i K",
                dateFormat: "Y-m-d h:i K",
                disableMobile: "true",
                enableTime: true,
                defaultDate: timenow,
            });
            flatpickr(".appointmentFlatpickr", {
                altInput: true,
                altFormat: "F j, Y",
                disableMobile: true
            });
        });
    </script>

    <script type="text/javascript">
        $('.myrangeslider1').ionRangeSlider({
            grid: false,
            min: 0,
            max: 10,
            from: 0,
            prettify_enabled: true,
            // prettify_separator: ",",
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $("body").delegate(".fc-datepicker", "#addVitals", function() {
                $(this).datepicker();
            });
        });
    </script>

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
        $(document).ready(function () {
            $(document.body).on("click", ".editbutton", function () {
                // e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                console.log(iid);
                var patient = "<?php echo $patient->id; ?>";
                document.getElementById("medical_historyEditForm").reset();
                $('#medical_historyEditForm').trigger("reset");
                // document.getElementById('quillEditor2').children[0].innerHTML = '';
                $('#myModal2').modal('show');
                $.ajax({
                    url: 'patient/editMedicalHistoryByJason?id=' + iid + '&patient=' + patient,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        // var date = new Date(response.medical_history.date * 1000);
                        // var de = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
                        var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
                        var date = response.datetime;
                        console.log(date);

                        $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                        // $('#medical_historyEditForm').find('[name="date"]').val(date).end()
                        $('.datetime').flatpickr({
                            disable: [maxdate],
                            maxDate: maxdate,
                            dateFormat: "F j, Y h:i K",
                            defaultDate: date,
                            enableTime: true,
                        });

                        $.each(response.encounter, function(key, value) {
                            $("#edit_encounter_case").append($('<option>').text("Encounter No. : "+value.encounter_number+" - "+value.display_name+" - "+value.created_at).val(value.id)).end();
                        });

                        // $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).change();
                        $('#medical_historyEditForm').find('[name="encounter_id"]').val(response.medical_history.encounter_id).change();
                        $('#medical_historyEditForm').find('[name="title"]').val(response.medical_history.title).end()
                        document.getElementById('quillEditor2').children[0].innerHTML = response.medical_history.description;

                        // CKEDITOR.instances['editor'].setData(response.medical_history.description)

                    }
                });
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $(".editPrescription").click(function () {
                // e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#myModal5').modal('show');
                $.ajax({
                    url: 'prescription/editPrescriptionByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                        $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                        $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                        CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                        CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                        CKEDITOR.instances['editor3'].setData(response.prescription.note)
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document.body).on("click", ".editVitals", function () {
                
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                var patient = "<?php echo $patient->id; ?>";
                document.getElementById("editVitalForm").reset();
                $('#editVitalForm').trigger("reset");

                $.ajax({
                    url: 'patient/editVitalByJason?id=' + iid + '&patient=' + patient,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var vital = response.vital;
                        var weight_unit = document.getElementById("weight_unit").value;
                        var height_unit = document.getElementById("height_unit").value;
                        var maxdate = "<?php echo date('Y-m-d H:i', strtotime('today midnight') + 86400); ?>";
                        // var date = vital.measured_at.split(" ");
                        console.log(response.datetime);
                        $('#editVitalForm').find('[name="id"]').val(vital.id).end()
                        $('#editVitalForm').find('[name="datetime"]').val(response.datetime).end()

                        $('.datetime').flatpickr({
                            disable: [maxdate],
                            maxDate: maxdate,
                            enableTime: true,
                            dateFormat: "F j, Y h:i K",
                            defaultDate: response.datetime,
                        });

                        $.each(response.encounter, function(key, value) {
                            $("#edit_encounter_vital").append($('<option>').text("Encounter No. : "+value.encounter_number+" - "+value.display_name+" - "+value.created_at).val(value.id)).end();
                        });

                        // $('#editVitalForm').find('[name="time"]').val(response.time).end()
                        $('#editVitalForm').find('[name="weight"]').val(vital.weight_kg).end()
                        $('#editVitalForm').find('[name="height"]').val(vital.height_cm).end()
                        // $('#editVitalForm').find('[name="pain_level"]').val(vital.pain).end()

                        $('#editVitalForm').find('[name="systolic"]').val(vital.systolic).end()
                        $('#editVitalForm').find('[name="diastolic"]').val(vital.diastolic).end()
                        $('#editVitalForm').find('[name="heartrate"]').val(vital.heart_rate).end()
                        $('#editVitalForm').find('[name="blood_sugar"]').val(vital.blood_sugar_mg).end()
                        $('#editVitalForm').find('[name="encounter_id"]').val(vital.encounter_id).change();
                        $('#editVitalForm').find('[name="blood_sugar_timing"]').val(vital.blood_sugar_timing).change()
                        $('#editVitalForm').find('[name="temperature"]').val(vital.temperature_celsius).end()
                        $('#editVitalForm').find('[name="temp_site"]').val(vital.temperature_site).change()
                        $('#editVitalForm').find('[name="spo2"]').val(vital.spo2).end()
                        $('#editVitalForm').find('[name="respiration_rate"]').val(vital.respiration_rate).end()
                        $('#editVitalForm').find('[name="note"]').val(vital.note).end()
                        // $('#edit_encounter_vital').val(vital.encounter_id);
                        $('.myrangeslider2').ionRangeSlider({
                            min: 0,
                            max: 10,
                            from: vital.pain,
                        });

                        console.log($('#editVitalForm').find('[name="encounter_id"]').val(vital.encounter_id).change());
                    }
                });

                $('#editVitalModal').modal('show');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".editAppointmentButton").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                var id = $(this).attr('data-id');
                $('#editAppointmentForm').trigger("reset");
                $('#editAppointmentModal').modal('show');
                $.ajax({
                    url: 'appointment/editAppointmentByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var de = response.appointment.date * 1000;
                        var d = new Date(de);
                        var da = (d.getMonth() + 1) + '/' + d.getDate() + '/' + d.getFullYear();
                        var appointment_date = response.datetime;
                        // Populate the form fields with the data returned from server
                        $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                        $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                        $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                        
                        $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()

                        $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).change();
                        // $('#editAppointmentForm').find('[name="time_slot"]').val(response.appointment.time_slot).change();
                        
                        //$('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                        // $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');
                        var option = new Option(response.patient.name + ' (ID: ' + response.patient.id + ')', response.patient.id, true, true);
                        $('#editAppointmentForm').find('[name="patient"]').append(option).trigger('change');
                        var option1 = new Option(response.doctor.name + ' (ID: ' + response.doctor.id + ')', response.doctor.id, true, true);
                        $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');
                        var option2 = new Option(response.service_category.display_name , response.service_category.id, true, true);
                        $('#editAppointmentForm').find('[name="service_category_group"]').append(option2).trigger('change');
                        var option3 = new Option(response.services.description , response.services.id, true, true);
                        $('#editAppointmentForm').find('[name="service"]').append(option3).trigger('change');
                        if (response.branch != null) {
                            var option4 = new Option(response.branch.display_name , response.branch.id, true, true);
                            $('#editAppointmentForm').find('[name="branch"]').append(option4).trigger('change');
                        }
                        // $('#editAppointmentForm').find('[name="date"]').val(da).end()
                        $('.appointmentFlatpickr').flatpickr({
                            dateFormat: "F j, Y",
                            defaultDate: appointment_date,
                        });

                        var service = response.appointment.service_id;

                        var date = $('#date1').val();
                        var doctorr = $('#adoctors1').val();
                        var appointment_id = $('#appointment_id').val();
                        var branch = $('#branch_select1').val();
                        // $('#default').trigger("reset");

                        $.ajax({
                            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + appointment_id + '&location=' + branch,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                $('#aslots1').find('option').remove();
                                var slots = response.aslots;
                                $.each(slots, function (key, value) {
                                    $('#aslots1').append($('<option>').text(value).val(value)).end();
                                });

                                $("#aslots1").val(response.current_value)
                                        .find("option[value=" + response.current_value + "]").attr('selected', true);
                                //  $('#aslots1 option[value=' + response.current_value + ']').attr("selected", "selected");
                                //   $("#default-step-1 .button-next").trigger("click");
                                if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                                    $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                                }
                                // Populate the form fields with the data returned from server
                                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                            }
                        });
                    }
                });
            });
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type=radio][name=edit_encounter_check]').change(function() {
                var encounter = this.value;
                if (encounter == 1) {
                    $("#edit_encounter_div").attr("hidden", false);
                } else {
                    $("#editencounter").val(0).change();
                    $("#edit_encounter_div").attr("hidden", true);
                }
            });
        })
    </script>

    <script type="text/javascript">
        $(".myDocuments").on("click", ".editDocumentModal", function () {
            $('#editDocumentForm').trigger("reset");
            $('#editencounter').empty();
            var iid = $(this).attr('data-id');
            console.log(iid);
            $.ajax({
                url: 'patient/editPatientMaterialByJason?id='+iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patients = response.patients;
                    var categories = response.categories;
                    var encounters = response.encounters;
                    $('#editDocumentForm').find('[name="id"]').val(response.documents.id).end()
                    $.each(patients, function (key, value) {
                        $('#editpatientchoose').append($('<option>').text(value.name).val(value.id)).end();
                    });
                    $.each(categories, function (key, value) {
                        $('#editcategory').append($('<option>').text(value.display_name).val(value.id)).end();
                    });
                    $.each(encounters, function (key, value) {
                        $('#editencounter').append($('<option>').text(response.encounter_details[key]).val(value.id)).end();
                    });
                    $('#editDocumentForm').find('[name="patient"]').val(response.documents.patient).change()
                    $('#editDocumentForm').find('[name="category"]').val(response.documents.category_id).change()
                    $('#editDocumentForm').find('[name="title"]').val(response.documents.title).end()
                    $('#editDocumentForm').find('[name="description"]').val(response.documents.description).end()
                    $('#editDocumentForm').find('[name="encounter_id"]').val(response.documents.encounter_id).change()


                    if (response.documents.encounter_id) {
                        $("#yes").attr("checked", true);
                    } else {
                        $("#no").attr("checked", true);
                        $("#editDocumentForm").find('[id=edit_encounter_div]').attr("hidden", true);
                    }

                    console.log(response.documents.encounter_id);

                    $('#patientEditModal').modal('show');
                }
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.pos_client').hide();
            $(document.body).on('change', '#pos_select', function () {

                var v = $("select.pos_select option:selected").val()
                if (v == 'add_new') {
                    $('.pos_client').show();
                } else {
                    $('.pos_client').hide();
                }
            });

        });


    </script>

    <!-- jquery for service type, service, location dependencies start-->

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
            });

            $(document).ready(function () {
                $("#branch_select").select2({
                    placeholder: '<?php echo lang('select_branch'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'appointment/getBranchInfo',
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
                $("#service_select").change(function () {
                    var doctor = $("#adoctors").val();
                    var service_type = $("#service_select").val();

                    // console.log(is_virtual);
                    $('#sub_service').find('option').remove();
                    $('#aslots').find('option').remove();
                    $('#date').val('');
                    $('#branch_select').find('option').remove();
                    $.ajax({
                        url: 'appointment/getServicesByServiceCategoryGroupByDoctorHospital?servicecategorygroup=' + service_type + '&doctor=' + doctor,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            // console.log(response.services);
                            $.each(response.services, function (key, value) {
                                $('#sub_service').append($('<option>').text(value.category).val(value.id)).end();
                            });

                        }
                    });

                    var branch = $("branch_select").val;

                    $.ajax({
                        url: 'appointment/getServiceCategoryById?id=' + service_type,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var is_virtual = response.is_virtual;
                            
                            if (is_virtual) {
                                $(".branch_select").prop('hidden', true);
                                console.log(branch);
                            } else {
                                $(".branch_select").attr('hidden', false);
                                console.log('Not hidden');
                            }
                        }
                    });

                });
            });

            $(document).ready(function () {
                $("#branch_select").change(function () {
                    $('#aslots').find('option').remove();
                    $('#date').val('');
                });
            });

            $(document).ready(function () {
                var iid = $('#date').val();
                var doctorr = $('#adoctors').val();
                var branch = $('#branch_select').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var slots = response.aslots;
                        $.each(slots, function (key, value) {
                            $('#aslots').append($('<option>').text(value).val(value)).end();
                        });
                        //   $("#default-step-1 .button-next").trigger("click");
                        if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                            $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                        }
                        // Populate the form fields with the data returned from server
                        //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                    }
                });
            });




            $(document).ready(function () {
                $('#date').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose: true,
                })
                        //Listen for the change even on the input
                        .change(dateChanged)
                        .on('changeDate', dateChanged);
            });

            function dateChanged() {
                // Get the record's ID via attribute  
                var iid = $('#date').val();
                var doctorr = $('#adoctors').val();
                var branch = $('#branch_select').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var slots = response.aslots;
                        $.each(slots, function (key, value) {
                            $('#aslots').append($('<option>').text(value).val(value)).end();
                        });
                        //   $("#default-step-1 .button-next").trigger("click");
                        if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                            $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                        }


                        // Populate the form fields with the data returned from server
                        //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                    }
                });

            }

        </script>


    <!-- jquery for service type, service, location dependencies end-->

    <!-- jquery for edit service type, service, location dependencies start-->

        <script type="text/javascript">
            $(document).ready(function () {
                $("#service_select1").select2({
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
            });

            $(document).ready(function () {
                $("#branch_select1").select2({
                    placeholder: '<?php echo lang('select_branch'); ?>',
                    allowClear: true,
                    ajax: {
                        url: 'appointment/getBranchInfo',
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
                $("#service_select1").change(function () {
                    var doctor = $("#adoctors1").val();
                    var service_type = $("#service_select1").val();

                    // console.log(is_virtual);
                    $('#sub_service1').find('option').remove();
                    $('#aslots1').find('option').remove();
                    $('#date1').val('');
                    $('#branch_select1').find('option').remove();
                    $.ajax({
                        url: 'appointment/getServicesByServiceCategoryGroupByDoctorHospital?servicecategorygroup=' + service_type + '&doctor=' + doctor,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            // console.log(response.services);
                            $.each(response.services, function (key, value) {
                                $('#sub_service1').append($('<option>').text(value.description).val(value.id)).end();
                            });

                        }
                    });

                    var branch = $("#branch_select1").val;

                    $.ajax({
                        url: 'appointment/getServiceCategoryById?id=' + service_type,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var is_virtual = response.is_virtual;
                            
                            if (is_virtual) {
                                $(".branch_select1").prop('hidden', true);
                                console.log(branch);
                            } else {
                                $(".branch_select1").attr('hidden', false);
                                console.log('Not hidden');
                            }
                        }
                    });

                });
            });

            $(document).ready(function () {
                $("#branch_select1").change(function () {
                    $('#aslots1').find('option').remove();
                    $('#date1').val('');
                });
            });

            $(document).ready(function () {
                var iid = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                var branch = $('#branch_select1').val();
                $('#aslots1').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var slots = response.aslots;
                        $.each(slots, function (key, value) {
                            $('#aslots1').append($('<option>').text(value).val(value)).end();
                        });
                        //   $("#default-step-1 .button-next").trigger("click");
                        if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                            $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                        }
                        // Populate the form fields with the data returned from server
                        //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                    }
                });
            });


            $(document).ready(function () {
                $("#date1").change(function () {
                    var iid = $('#date1').val();
                    var doctorr = $('#adoctors1').val();
                    var branch = $('#branch_select1').val();
                    $('#aslots1').find('option').remove();
                    console.log(iid);
                    // $('#default').trigger("reset");
                    $.ajax({
                        url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var slots = response.aslots;
                            $.each(slots, function (key, value) {
                                $('#aslots1').append($('<option>').text(value).val(value)).end();
                            });
                            //   $("#default-step-1 .button-next").trigger("click");
                            if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                                $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                            }


                            // Populate the form fields with the data returned from server
                            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                        }
                    });
                });
            });

        </script>

    <!-- jquery for edit service type, service, location dependencies end-->



    <script>
        $(document).ready(function () {
            $("#pos_select").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getPatientinfoWithAddNewOption',
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
            $(".patient").select2({
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
            $("#adoctors").select2({
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
            $("#adoctors1").select2({
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
            var encounter_id = '<?php echo $encounter_id?$encounter_id:''; ?>';
            var patient_id = '<?php echo $patient?$patient->id:''; ?>';
            $('#editable-sample').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "diagnosis/getDiagnosis?patient_id="+patient_id+"&encounter_id="+encounter_id,
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-2'l><'col-sm-6 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                    extend: 'collection',
                    text: 'Export',        
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                },
                                title: '<?php echo lang('diagnosis') ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                },
                                title: '<?php echo lang('diagnosis') ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                },
                                title: '<?php echo lang('diagnosis') ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                },
                                title: '<?php echo lang('diagnosis') ?>',
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                },
                                title: '<?php echo lang('diagnosis') ?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
            });
            
        });

        $(document).ready(function () {
            var encounter_id = '<?php echo $encounter_id; ?>';
            var patient_id = '<?php echo $patient->id; ?>';
            $('#editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "patient/getVital?patient_id="+patient_id+"&encounter_id="+encounter_id,
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-2'l><'col-sm-6 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                    extend: 'collection',
                    text: 'Export',        
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('vital_signs') ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('vital_signs') ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('vital_signs') ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('vital_signs') ?>',
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('vital_signs') ?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
            });
        });

        $(document).ready(function () {
            var encounter_id = '<?php echo $encounter_id; ?>';
            var patient_id = '<?php echo $patient->id; ?>';
            $('.editable-sample2').DataTable({
                responsive: true,
                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "appointment/getAppointment?patient_id="+patient_id+"&encounter_id="+encounter_id,
                    type: 'POST',
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('appointment'); ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('appointment'); ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('appointment'); ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('appointment'); ?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('appointment'); ?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }


            });
        });


        $(document).ready(function () {
            var patient_id = '<?php echo $patient->id; ?>';
            var table = $('.editable-sample3').DataTable({
                responsive: true,
                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "casenote/getCaseList?patient_id="+patient_id,
                    type: 'POST',
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('case_notes'); ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('case_notes'); ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('case_notes'); ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('case_notes'); ?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('case_notes'); ?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }


            });
            table.buttons().container().appendTo('.custom_buttons');
        });

        $(document).ready(function () {
            var patient_id = '<?php echo $patient->id; ?>';
            $('.editable-sample4').DataTable({
                responsive: true,
                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "prescription/getPrescriptionListByDoctor?patient_id="+patient_id,
                    type: 'POST',
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('prescription'); ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('prescription'); ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('prescription'); ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('prescription'); ?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('prescription'); ?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }


            });
        });

        $(document).ready(function () {
            var patient_id = '<?php echo $patient->id; ?>';
            $('.editable-sample5').DataTable({
                responsive: true,
                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "labrequest/getLabrequest?patient_id="+patient_id,
                    type: 'POST',
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('lab').' '.lang('request')?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('lab').' '.lang('request')?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('lab').' '.lang('request')?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('lab').' '.lang('request')?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                },
                                title: '<?php echo lang('lab').' '.lang('request')?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }


            });
        });

        $(document).ready(function () {
            var patient_id = '<?php echo $patient->id; ?>';
            $('.editable-sample6').DataTable({
                responsive: true,
                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "encounter/getEncounter?patient_id="+patient_id,
                    type: 'POST',
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('encounters'); ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('encounters'); ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('encounters'); ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('encounters'); ?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('encounters'); ?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }


            });
        });

        $(document).ready(function () {
            var patient_id = '<?php echo $patient->id; ?>';
            var encounter_id = '<?php echo $encounter_id; ?>';
            $('.editable-sample7').DataTable({
                responsive: true,
                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "form/getForm?patient_id="+patient_id+'&encounter_id='+encounter_id,
                    type: 'POST',
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                },
                                title: '<?php echo lang('forms')?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                },
                                title: '<?php echo lang('forms')?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                },
                                title: '<?php echo lang('forms')?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                },
                                title: '<?php echo lang('forms')?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4],
                                },
                                title: '<?php echo lang('forms')?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }


            });
        });

        $(document).ready(function () {
            var patient_id = '<?php echo $patient->id; ?>';
            $('.editable-sample8').DataTable({
                responsive: true,
                "processing": true,
                "searchable": true,
                "ajax": {
                    url: "procedure/getProcedures?patient_id="+patient_id,
                    type: 'POST',
                },
                dom : "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                    extend: 'collection',
                    text: 'Export',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('procedure'); ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('procedure'); ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('procedure'); ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('procedure'); ?>',
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                title: '<?php echo lang('procedure'); ?>'
                            },
                        ],
                    }
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 10,
                "order": [[0, "desc"]],
                "language": {
                    "lengthMenu": "_MENU_",
                }
            })
        });
    </script>


    <script>
        $(document).ready(function () {
            $("#adoctors").select2({
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
            $("#adoctors1").select2({
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

        });
    </script>

    <script>
        $(document).ready(function () {

            var error = "<?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>";
            var success = "<?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>";
            var notice = "<?php if(isset($_SESSION['notice'])) echo $_SESSION['notice']; ?>";
            var warning = "<?php if(isset($_SESSION['warning'])) echo $_SESSION['warning']; ?>";

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

            var error = "<?php if(isset($_SESSION['error'])) unset($_SESSION['error']); ?>";
            var success = "<?php if(isset($_SESSION['success'])) unset($_SESSION['success']); ?>";
            var warning = "<?php if(isset($_SESSION['notice'])) unset($_SESSION['warning']); ?>";
            var notice = "<?php if(isset($_SESSION['warning'])) unset($_SESSION['notice']); ?>";

        });
    </script>

    <script type="text/javascript">
            
        var uploadField = document.getElementById("document");

        uploadField.onchange = function() {
            if(this.files[0].size > 5e+6){
               not7();
               this.value = "";
            }else{

            }
        };

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('.searchbox-input').on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".col-xl-3").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>

    </body>
</html>