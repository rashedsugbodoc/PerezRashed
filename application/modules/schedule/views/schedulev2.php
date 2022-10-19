<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-title">Time Schedule</div>
                                <div class="card-options">
                                    <a class="btn btn-primary" data-target="#AddAppointment" data-toggle="modal" href=""><i class="fe fe-plus"></i><span class="button-text">Add New</span></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap key-buttons editable-sample" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> <?php echo lang('doctor'); ?></th>
                                                    <th> <?php echo lang('weekday'); ?></th>
                                                    <th> <?php echo lang('start_time'); ?></th>
                                                    <th> <?php echo lang('end_time'); ?></th>
                                                    <th> <?php echo lang('duration'); ?></th>
                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                        <th> <?php echo lang('options'); ?></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($schedules as $schedule) {
                                                    $i = $i + 1;
                                                    if (empty($schedule->location_id)) {
                                                    ?>
                                                    <tr class="">
                                                        <td style=""> <?php echo $i; ?></td> 
                                                        <td> <?php echo $this->doctor_model->getDoctorById($schedule->doctor)->name; ?></td>
                                                        <td> <?php echo $schedule->weekday; ?></td> 
                                                        <td><?php echo $schedule->s_time; ?></td>
                                                        <td><?php echo $schedule->e_time; ?></td>
                                                        <td><?php echo $schedule->duration * 5 . ' ' . lang('minutes'); ?></td>
                                                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                            <td>
                                                                <!--
                                                                <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $schedule->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></button>   
                                                                -->
                                                                <a class="btn btn-danger btn-xs" href="schedule/deleteSchedule?id=<?php echo $schedule->id; ?>&doctor=<?php echo $schedule->doctor; ?>&weekday=<?php echo $schedule->weekday; ?>&all=all" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i> <?php echo lang('delete'); ?></a>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        foreach ($branches as $branch) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <?php echo lang('time_schedule'); ?> (<?php echo $branch->display_name; ?>)
                                    </div>
                                    <div class="card-options">
                                        <a data-toggle="modal" href="#myModal<?php echo $branch->id; ?>">
                                            <div class="btn-group pull-right">
                                                <button id="" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-plus"></i>  <?php echo lang('add_new'); ?> 
                                                </button>
                                            </div>
                                        </a>  
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap key-buttons editable-sample" id="editable-sample">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> <?php echo lang('doctor'); ?></th>
                                                        <th> <?php echo lang('weekday'); ?></th>
                                                        <th> <?php echo lang('start_time'); ?></th>
                                                        <th> <?php echo lang('end_time'); ?></th>
                                                        <th> <?php echo lang('duration'); ?></th>
                                                        <th> <?php echo lang('options'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($schedules as $schedule) {
                                                        $i = $i + 1;
                                                        if ($schedule->location_id == $branch->id) {
                                                        ?>
                                                        <tr class="">
                                                            <td style=""> <?php echo $i; ?></td> 
                                                            <td> <?php echo $this->doctor_model->getDoctorById($schedule->doctor)->name; ?></td>
                                                            <td> <?php echo $schedule->weekday; ?></td> 
                                                            <td><?php echo $schedule->s_time; ?></td>
                                                            <td><?php echo $schedule->e_time; ?></td>
                                                            <td><?php echo $schedule->duration * 5 . ' ' . lang('minutes'); ?></td>
                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                                <td>
                                                                    <!--
                                                                    <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $schedule->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></button>   
                                                                    -->
                                                                    <a class="btn btn-danger btn-xs" href="schedule/deleteSchedule?id=<?php echo $schedule->id; ?>&doctor=<?php echo $schedule->doctor; ?>&weekday=<?php echo $schedule->weekday; ?>&all=all&location=<?php echo $schedule->location_id ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i> <?php echo lang('delete'); ?></a>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="modal" id="AddAppointment">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('add'); ?> <?php echo lang('schedule'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="addOnlineScheduleForm" action="schedule/addSchedule" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('addOnlineScheduleForm');">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="form-label">  <?php echo lang('doctor'); ?></label>
                                                    <div class="form-group">
                                                        <select class="form-control select2-show-search" id="doctorchoose" name="doctor" value='' data-placeholder="Choose one">
                                                            <?php if (!empty($prescription->doctor)) { ?>
                                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
                                                            <?php } ?>
                                                            <?php
                                                            if (!empty($setval)) {
                                                                $doctordetails1 = $this->db->get_where('doctor', array('id' => set_value('doctor')))->row();
                                                                ?>
                                                                <option value="<?php echo $doctordetails1->id; ?>" selected="selected"><?php echo $doctordetails1->name; ?> - <?php echo $doctordetails1->id; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="form-label"> <?php echo lang('weekday'); ?></label>
                                                    <div class="form-group">
                                                        <select class="form-control select2-show-search" id="weekday" name="weekday" value='' data-placeholder="Choose one">
                                                            <option value="Friday"><?php echo lang('friday') ?></option>
                                                            <option value="Saturday"><?php echo lang('saturday') ?></option>
                                                            <option value="Sunday"><?php echo lang('sunday') ?></option>
                                                            <option value="Monday"><?php echo lang('monday') ?></option>
                                                            <option value="Tuesday"><?php echo lang('tuesday') ?></option>
                                                            <option value="Wednesday"><?php echo lang('wednesday') ?></option>
                                                            <option value="Thursday"><?php echo lang('thursday') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12 col-sm-12">
                                                    
                                                    <div class="wd-150 mg-b-30">
                                                        <label> <?php echo lang('start_time'); ?></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                                                </div><!-- input-group-text -->
                                                            </div><!-- input-group-prepend -->
                                                            <input class="form-control" id="tpBasic" placeholder="Set time" name="s_time" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12 col-sm-12">
                                                    
                                                    <div class="wd-150 mg-b-30">
                                                        <label > <?php echo lang('end_time'); ?></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                                                </div><!-- input-group-text -->
                                                            </div><!-- input-group-prepend -->
                                                            <input class="form-control" id="tpBasic2" placeholder="Set time" name="e_time" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('appointment') ?> <?php echo lang('duration') ?> </label>
                                                        <select class="form-control select2-show-search" name="duration" data-placeholder="Choose one">
                                                            <option value="3" <?php
                                                            if (!empty($settings->duration)) {
                                                                if ($settings->duration == '3') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > 15 Minutes </option>

                                                            <option value="4" <?php
                                                            if (!empty($settings->duration)) {
                                                                if ($settings->duration == '4') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > 20 Minutes </option>

                                                            <option value="6" <?php
                                                            if (!empty($settings->duration)) {
                                                                if ($settings->duration == '6') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > 30 Minutes </option>

                                                            <option value="9" <?php
                                                            if (!empty($settings->duration)) {
                                                                if ($settings->duration == '9') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > 45 Minutes </option>

                                                            <option value="12" <?php
                                                            if (!empty($settings->duration)) {
                                                                if ($settings->duration == '12') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > 60 Minutes </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="redirect" value='schedule'>
                                            <input type="hidden" name="id" value=''>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="submit" type="submit"> <?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php foreach ($branches as $branch) { ?>
                            <div class="modal fade" id="myModal<?php echo $branch->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('schedule'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="addPhysicalScheduleForm" action="schedule/addSchedule" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('addPhysicalScheduleForm');">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="form-label"><?php echo lang('location'); ?></label>
                                                        <div class="form-group">
                                                            <select class="form-control select2-show-search branch_select" data-placeholder="Choose one (with searchbox)" disabled>
                                                                <?php if (!empty($branch->id)) { ?>
                                                                    <option value="<?php echo $branch->id; ?>" selected="selected"><?php echo $branch->display_name; ?></option>  
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden"  name="branch" value="<?php echo $branch->id; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="form-label">  <?php echo lang('doctor'); ?></label>
                                                        <div class="form-group">
                                                            <select class="form-control select2-show-search doctorchoose1" name="doctor" data-placeholder="Choose one">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="form-label"><?php echo lang('weekday'); ?></label>
                                                        <div class="form-group">
                                                            <select class="form-control select2-show-search" id="weekday" name="weekday" value='' data-placeholder="Choose one">
                                                                <option value="Friday"><?php echo lang('friday') ?></option>
                                                                <option value="Saturday"><?php echo lang('saturday') ?></option>
                                                                <option value="Sunday"><?php echo lang('sunday') ?></option>
                                                                <option value="Monday"><?php echo lang('monday') ?></option>
                                                                <option value="Tuesday"><?php echo lang('tuesday') ?></option>
                                                                <option value="Wednesday"><?php echo lang('wednesday') ?></option>
                                                                <option value="Thursday"><?php echo lang('thursday') ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="wd-150 mg-b-30">
                                                            <label><?php echo lang('start_time'); ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                                                    </div><!-- input-group-text -->
                                                                </div><!-- input-group-prepend -->
                                                                <input class="form-control myTpBasic" placeholder="Set time" name="s_time" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12 col-sm-12">
                                                        
                                                        <div class="wd-150 mg-b-30">
                                                            <label ><?php echo lang('end_time'); ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                                                    </div><!-- input-group-text -->
                                                                </div><!-- input-group-prepend -->
                                                                <input class="form-control myTpBasic" placeholder="Set time" name="e_time" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('appointment') ?> <?php echo lang('duration') ?></label>
                                                            <select class="form-control select2-show-search" name="duration" data-placeholder="Choose one">
                                                                <option value="3" <?php
                                                                if (!empty($settings->duration)) {
                                                                    if ($settings->duration == '3') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > 15 Minutes </option>

                                                                <option value="4" <?php
                                                                if (!empty($settings->duration)) {
                                                                    if ($settings->duration == '4') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > 20 Minutes </option>

                                                                <option value="6" <?php
                                                                if (!empty($settings->duration)) {
                                                                    if ($settings->duration == '6') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > 30 Minutes </option>

                                                                <option value="9" <?php
                                                                if (!empty($settings->duration)) {
                                                                    if ($settings->duration == '9') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > 45 Minutes </option>

                                                                <option value="12" <?php
                                                                if (!empty($settings->duration)) {
                                                                    if ($settings->duration == '12') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > 60 Minutes </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="redirect" value='schedule'>
                                                <input type="hidden" name="id" value=''>
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
                        <?php } ?>

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

        <script src="common/js/coderygel.min.js"></script>

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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

        <script type="text/javascript">
            $('#addOnlineScheduleForm').parsley();
        </script>

        <script type="text/javascript">
            $('#addPhysicalScheduleForm').parsley();
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

        <script type="text/javascript">
            $(document).ready(function () {
                $(".editbutton").click(function (e) {
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $('#editTimeSlotForm').trigger("reset");
                    $('#myModal2').modal('show');
                    $.ajax({
                        url: 'schedule/editScheduleByJason?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            // Populate the form fields with the data returned from server
                            $('#editTimeSlotForm').find('[name="id"]').val(response.schedule.id).end()
                            $('#editTimeSlotForm').find('[name="s_time"]').val(response.schedule.s_time).end()
                            $('#editTimeSlotForm').find('[name="e_time"]').val(response.schedule.e_time).end()
                            $('#editTimeSlotForm').find('[name="weekday"]').val(response.schedule.weekday).end()    
                        }
                    });
                });
            });
        </script>


        <script>
            $(document).ready(function () {
                var table = $('.editable-sample').DataTable({
                    responsive: true,

                    dom: "<'row'<'col-lg-3 col-md-12 col-sm-12'l><'col-lg-5 col-md-6 col-sm-6 text-center'B><'col-lg-4 col-md-6 col-sm-6'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        {
                            extend: 'collection',
                            text:  'Export',
                            buttons: [
                                {
                                    extend: 'copyHtml5',
                                    title: '<?php echo lang('schedule') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5],
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    title: '<?php echo lang('schedule') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5],
                                    }
                                },
                                {
                                    extend: 'csvHtml5',
                                    title: '<?php echo lang('schedule') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5],
                                    }
                                },
                                {
                                    extend: 'pdfHtml5',
                                    title: '<?php echo lang('schedule') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5],
                                    },
                                    orientation: 'portrait',
                                    pageSize: 'LEGAL'
                                },
                                {
                                    extend: 'print',
                                    title: '<?php echo lang('schedule') . ' ' . lang('list');?>',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5],
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

                });

                table.buttons().container()
                        .appendTo('.custom_buttons');
            });
        </script>


        <script>
            $(document).ready(function () {

                $("#patientchoose").select2({
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
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }

                });
                $(".doctorchoose1").select2({
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

        <script type="text/javascript">
            $(document).ready(function () {
                $(".branch_select").select2({
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
        </script>

        <script type="text/javascript">
            $('.myTpBasic').timepicker({ 'timeFormat': 'h:i A' });
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