<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Doctor Dashboard</h4>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!--Row 3 - Income Expenses Bar and Pie Chart -->
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-lg-12">
                                    <div class="panel panel-primary w-100">
                                        <div class="tab-menu-heading crypto-tabs">
                                            <div class="tabs-menu1">
                                                <!-- Tabs -->
                                                <ul class="nav panel-tabs">
                                                    <li class=""><a href="#todays" class="active" data-toggle="tab"><?php echo lang('todays'); ?> <?php echo lang('appointments'); ?></a></li>
                                                    <li><a href="#patient" data-toggle="tab" class=""><?php echo lang('patient'); ?></a></li>
                                                    <li><a href="#prescription" data-toggle="tab" class=""><?php echo lang('prescription'); ?></a></li>
                                                    <li><a href="#schedule" data-toggle="tab" class=""><?php echo lang('schedule'); ?></a></li>
                                                    <li><a href="#holiday" data-toggle="tab" class=""><?php echo lang('holidays'); ?></a></li>
                                                    <li><a href="#calendar" data-toggle="tab" class=""><?php echo lang('calendar'); ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card panel-body tabs-menu-body br-tl-0 border-top-0 p-6 w-100 shadow2 crypto-content">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="todays">
                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <label class="h3 pull-left"><?php echo lang('todays_appointments'); ?></label>
                                                            <a class="btn btn-primary pull-right" data-target="#myModal" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><?php echo lang('add_new'); ?> </a>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0">
                                                        <div class="table-responsive">
                                                            <table id="editable-sample" class="table table-bordered text-nowrap key-buttons w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="wd-lg-10p"><?php echo lang('date'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('patient_id'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('patient'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('status'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('options'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($todays_appointments as $todays_appointment) {
                                                                        $patient_details = $this->patient_model->getPatientById($todays_appointment->patient);
                                                                        if (!empty($patient_details)) {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo date('d-m-Y', $todays_appointment->date); ?></td>
                                                                                <td><?php echo $todays_appointment->patient; ?></td>
                                                                                <td><?php echo $patient_details->name; ?></td>
                                                                                <td><?php echo $todays_appointment->status; ?></td>
                                                                                <td>
                                                                                    <div class="btn-group mb-0">
                                                                                        <button type="button" class="btn btn-info btn-xs editbutton" data-toggle="modal" data-id="<?php echo $todays_appointment->id; ?>"><i class="fe fe-edit"></i></button>
                                                                                    </div>
                                                                                    <div class="btn-group mb-0">
                                                                                        <a class="btn btn-danger btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="appointment/delete?id=<?php echo $todays_appointment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                                    </div>
                                                                                    <div class="btn-group mb-0">
                                                                                        <a title="<?php echo lang('history'); ?>"  href="patient/medicalHistory?id=<?php echo $todays_appointment->patient; ?>" class="btn btn-lime" aria-haspopup="true" aria-expanded="false"><i class="fa fa-stethoscope mr-2"></i><?php echo lang('patient'); ?> <?php echo lang('history'); ?></a>
                                                                                    </div>
                                                                                    <?php if ($todays_appointment->status == 'Confirmed') { ?>
                                                                                        <div class="btn-group mb-0">
                                                                                            <a title=" <?php echo lang('start_video_call'); ?>" href="meeting/instantLive?id=<?php echo $todays_appointment->id; ?>" class="btn btn-lime" aria-haspopup="true" aria-expanded="false"><i class="fa fa-headphones mr-2"></i><?php echo lang('start_video_call'); ?></a>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="patient">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="h3 pull-left"><?php echo lang('all_patient') . ' ' . lang('with') . ' ' . lang('upcoming') . ' ' . lang('appointments');?></label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0">
                                                        <div class="table-responsive">
                                                            <?php if (!empty($appointment_patients)) { ?>
                                                                <table id="editable-sample2" class="table card-table table-vcenter text-nowrap mb-0 border w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="border-bottom-0"><?php echo lang('patient_id'); ?></th>
                                                                            <th class="border-bottom-0"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></th>
                                                                            <th class="border-bottom-0"><?php echo lang('options'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        foreach ($appointment_patients as $appointment_patient) {
                                                                            $appointed_patient = $this->patient_model->getPatientById($appointment_patient);
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $appointed_patient->id; ?></td>
                                                                                <td><?php echo $appointed_patient->name; ?></td>
                                                                                <td>
                                                                                    <div class="btn-group mb-0">
                                                                                        <a href="patient/medicalHistory?id=<?php echo $appointed_patient->id; ?>" class="btn btn-lime" aria-haspopup="true" aria-expanded="false" title="<?php echo lang('history'); ?>"><i class="fa fa-stethoscope mr-2"></i><?php echo lang('history'); ?></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="prescription">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="h3 pull-left"><?php echo lang('prescriptions'); ?></label>
                                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                                <a class="btn btn-primary pull-right" href="prescription/addPrescriptionView"><i class="fe fe-plus"></i><?php echo lang('add_new'); ?></a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table id="editable-sample3" class="table card-table table-vcenter text-nowrap mb-0 border w-100">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-lg-10p"><?php echo lang('date'); ?></th>
                                                                                <th class="wd-lg-20p"><?php echo lang('patient'); ?></th>
                                                                                <th class="wd-lg-20p"><?php echo lang('medicine'); ?></th>
                                                                                <th class="wd-lg-20p"><?php echo lang('options'); ?></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($prescriptions as $prescription) { ?>
                                                                                <tr>
                                                                                    <td><?php echo date('Y/m/d', strtotime($prescription->date)); ?></td>
                                                                                    <td><?php echo $this->patient_model->getPatientById($prescription->patient)->name; ?></td>
                                                                                    <td>
                                                                                        <?php
                                                                                        if (!empty($prescription->medicine)) {
                                                                                            $medicine = explode('###', $prescription->medicine);
                                                                                            foreach ($medicine as $key => $value) {
                                                                                                $medicine_id = explode('***', $value);
                                                                                                $medicine_name_with_dosage = $this->medicine_model->getMedicineById($medicine_id[0])->name . ' -' . $medicine_id[1];
                                                                                                $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . ' Days<br>';
                                                                                                rtrim($medicine_name_with_dosage, ',');
                                                                                                echo '<p>' . $medicine_name_with_dosage . '</p>';
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="btn-group mb-0">
                                                                                            <a href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>" class="btn btn-info" aria-expanded="false"><i class="fe fe-eye"></i> <?php echo lang('view'); ?></a>
                                                                                        </div>
                                                                                        <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                                                            <div class="btn-group mb-0">
                                                                                                <a href="prescription/editPrescription?id=<?php echo $prescription->id; ?>" class="btn btn-info" aria-expanded="false"><i class="fe fe-edit"></i> <?php echo lang('edit'); ?></a>
                                                                                            </div>
                                                                                            <div class="btn-group mb-0">
                                                                                                <a class="btn btn-danger" href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fe fe-trash-2"></i> <?php echo lang('delete'); ?></a>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="schedule">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="h3 pull-left"><?php echo lang('schedule'); ?></label>
                                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                                <a class="btn btn-primary pull-right" data-target="#addScheduleModal" data-toggle="modal" href=""><i class="fe fe-plus"></i><?php echo lang('add_new'); ?></a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0">
                                                        <div class="table-responsive">
                                                            <table id="editable-sample4" class="table card-table table-vcenter text-nowrap mb-0 border w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="wd-lg-10p">#</th>
                                                                        <th class="wd-lg-20p"><?php echo lang('weekday'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('start_time'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('end_time'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('duration'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('options'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 0;
                                                                    foreach ($schedules as $schedule) {
                                                                        $i = $i + 1;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $i; ?></td>
                                                                            <td><?php echo $schedule->weekday; ?></td>
                                                                            <td><?php echo $schedule->s_time; ?></td>
                                                                            <td><?php echo $schedule->e_time; ?></td>
                                                                            <td><?php echo $schedule->duration * 5 . ' ' . lang('minitues'); ?></td>
                                                                            <td>
                                                                                <div class="btn-group mb-0">
                                                                                    <a class="btn btn-danger" href="schedule/deleteSchedule?id=<?php echo $schedule->id; ?>&doctor=<?php echo $schedule->doctor; ?>&weekday=<?php echo $schedule->weekday; ?>&all=all" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fe fe-trash-2"></i> <?php echo lang('delete'); ?></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="holiday">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="h3 pull-left"><?php echo lang('holidays'); ?></label>
                                                            <a class="btn btn-primary pull-right" data-target="#AddHolidayModal" data-toggle="modal" href=""><i class="fe fe-plus"></i> <?php echo lang('add_new'); ?> </a>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0">
                                                        <div class="table-responsive">
                                                            <table id="editable-sample5" class="table card-table table-vcenter text-nowrap mb-0 border w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="wd-lg-10p">#</th>
                                                                        <th class="wd-lg-20p"><?php echo lang('date'); ?></th>
                                                                        <th class="wd-lg-20p"><?php echo lang('options'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 0;
                                                                    foreach ($holidays as $holiday) {
                                                                        $i = $i + 1;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $i; ?></td>
                                                                            <td><?php echo date('Y-m-d', $holiday->date); ?></td>
                                                                            <td>
                                                                                <div class="btn-group mb-0">
                                                                                    <a class="btn btn-info pull-right editHoliday" data-toggle="modal" data-id="<?php echo $holiday->id; ?>" href=""><i class="fe fe-edit"></i> <?php echo lang('edit'); ?></a>
                                                                                </div>
                                                                                <div class="btn-group mb-0">
                                                                                    <a class="btn btn-danger" href="schedule/deleteHoliday?id=<?php echo $holiday->id; ?>&doctor=<?php echo $doctor->id; ?>&redirect=doctor/details" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fe fe-trash-2"></i> <?php echo lang('delete'); ?></a>
                                                                                </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="calendar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- <div class="col-xl-3 col-sm-12 col-lg-3">
                                <div class="row">
                                    <div class="card box-widget widget-user">
                                        <div class="widget-user-image mx-auto mt-5 text-center">
                                            <?php if (!empty($doctor->img_url)) { ?>
                                                <img alt="User Avatar" class="rounded-circle p-1" src="<?php echo $doctor->img_url; ?>" style="width: 150px; height: 150px;" width="auto" height="auto">
                                            <?php } ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="pro-user text-center">
                                                <h4 class="pro-user-username text-dark mb-1 font-weight-bold"><?php echo $doctor->name; ?></h4>
                                                <h6 class="pro-user-desc text-muted"><?php echo $doctor->profile; ?></h6>
                                                <a href="profile" class="btn btn-primary btn-sm mt-3"><?php echo lang('edit'); ?> <?php echo lang('profile'); ?></a>
                                            </div>
                                        </div>
                                        <div class="card-body border-top">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="py-2 px-0">
                                                                <span class="font-weight-semibold w-50"><?php echo lang('doctor'); ?> <?php echo lang('name'); ?> </span>
                                                            </td>
                                                            <td class="py-2 px-0"><?php echo $doctor->name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-2 px-0">
                                                                <span class="font-weight-semibold w-50"><?php echo lang('doctor_id'); ?> </span>
                                                            </td>
                                                            <td class="py-2 px-0"><?php echo $doctor->id; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-2 px-0">
                                                                <span class="font-weight-semibold w-50"><?php echo lang('profile'); ?></span>
                                                            </td>
                                                            <td class="py-2 px-0"><?php echo $doctor->profile; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-2 px-0">
                                                                <span class="font-weight-semibold w-50"><?php echo lang('address'); ?> </span>
                                                            </td>
                                                            <td class="py-2 px-0"><?php echo $doctor->address; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-2 px-0">
                                                                <span class="font-weight-semibold w-50"><?php echo lang('phone'); ?> </span>
                                                            </td>
                                                            <td class="py-2 px-0"><?php echo $doctor->phone; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-2 px-0">
                                                                <span class="font-weight-semibold w-50"><?php echo lang('email'); ?></span>
                                                            </td>
                                                            <td class="py-2 px-0"><?php echo $doctor->email; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <!--copy the modals here from doctor-dashboard.php-->
                        <?php
                        $current_user = $this->ion_auth->get_user_id();
                        if ($this->ion_auth->in_group('Doctor')) {
                            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
                        }
                        ?>
                        <!-- Add Schedule Modal-->
                        <div class="modal" id="addScheduleModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('schedule'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="schedule/addSchedule" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="form-label"><?php echo lang('weekday'); ?></label>
                                                    <div class="form-group">
                                                        <select class="form-control select2-show-search" data-placeholder="Choose one" id="weekday" name="weekday" value=''>
                                                            <option value="Monday"><?php echo lang('monday') ?></option>
                                                            <option value="Tuesday"><?php echo lang('tuesday') ?></option>
                                                            <option value="Wednesday"><?php echo lang('wednesday') ?></option>
                                                            <option value="Thursday"><?php echo lang('thursday') ?></option>
                                                            <option value="Friday"><?php echo lang('friday') ?></option>
                                                            <option value="Saturday"><?php echo lang('saturday') ?></option>
                                                            <option value="Sunday"><?php echo lang('sunday') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="wd-150 mg-b-30">
                                                        <label ><?php echo lang('start_time'); ?></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm4.25 12.15L11 13V7h1.5v5.25l4.5 2.67-.75 1.23z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                                                </div><!-- input-group-text -->
                                                            </div><!-- input-group-prepend -->
                                                            <input class="form-control" id="tpBasic" placeholder="Set time" type="text" name="s_time" value="">
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
                                                            <input class="form-control" id="tpBasic2" placeholder="Set time" type="text" name="e_time" value='' required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('appointment') ?> <?php echo lang('duration') ?></label>
                                                        <select class="form-control select2-show-search" data-placeholder="Choose one" name="duration" value=''>
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
                                        </div>
                                        <input type="hidden" name="doctor" value='<?php echo $doctor_id; ?>'>
                                        <input type="hidden" name="redirect" value='doctor/details'>
                                        <input type="hidden" name="id" value=''>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit" name="submit"><?php echo lang('submit'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End Schedule Modal-->

                        <!--Add Appointment Modal-->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('add_appointment'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="appointment/addNew" method="post" class="clearfix" enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('patient'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search pos_select" id="pos_select" name="patient" data-placeholder="Choose one">
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
                                                        <label class="form-label"><?php echo lang('doctor'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="doctor" id="adoctors" data-placeholder="Choose one">
                                                            <option value="">Select .....</option>
                                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('service_type'); ?></label>
                                                        <select class="form-control select2-show-search service_cat" name="service_category_group" id="service_select" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('service'); ?></label>
                                                        <select class="form-control select2-show-search sub_service" id="sub_service" name="service" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group branch_select">
                                                        <label class="form-label"> <?php echo lang('location'); ?></label>
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
                                                    <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" id="date" name="date" readonly>
                                                </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Available Slot <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search aslot" name="time_slot" id="aslots" data-placeholder="Choose one">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="status" data-placeholder="Choose one">
                                                            <option value="Pending Confirmation" <?php
                                                                ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                            <option value="Confirmed" <?php
                                                                ?> > <?php echo lang('confirmed'); ?> </option>
                                                            <option value="Treated" <?php
                                                                ?> > <?php echo lang('treated'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('complaint'); ?> <span class="text-red">*</span></label>
                                                        <textarea class="form-control mb-4" placeholder="Purpose" name="remarks" rows="3" maxlength="500"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="redirect" value='doctor/details'>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <!-- <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input pull-left" name="sms" value="sms">
                                                        <span class="custom-control-label">Send SMS</span>
                                                    </label> -->
                                                    
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



                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('edit_appointment'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editAppointmentForm" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('patient'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search pos_select patient" name="patient" id="pos_select" data-placeholder="Choose One">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">  <?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search doctor" id="adoctors1" name="doctor" data-placeholder="Choose One">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('service_type'); ?></label>
                                                        <select class="form-control select2-show-search service_cat1" name="service_category_group" id="service_select1" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('service'); ?></label>
                                                        <select class="form-control select2-show-search sub_service1" id="sub_service1" name="service" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group branch_select1">
                                                        <label class="form-label"> <?php echo lang('location'); ?></label>
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
                                                    <input class="form-control fc-datepicker" name="date" id="date1" placeholder="MM/DD/YYYY" type="text" readonly>
                                                </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Available Slot <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="time_slot" id="aslots1">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="status" data-placeholder="Choose one">
                                                            <option value="Pending Confirmation" <?php
                                                                ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                            <option value="Confirmed" <?php
                                                                ?> > <?php echo lang('confirmed'); ?> </option>
                                                            <option value="Treated" <?php
                                                                ?> > <?php echo lang('treated'); ?> </option>
                                                            <option value="Cancelled" <?php
                                                                ?> > <?php echo lang('cancelled'); ?> </option>
                                                            <option value="Requested" <?php
                                                                ?> > <?php echo lang('requested'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('remarks'); ?> <span class="text-red">*</span></label>
                                                        <textarea class="form-control mb-4" name="remarks" placeholder="Purpose" rows="3" maxlength="500"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" id="appointment_id" value=''>
                                                <input type="hidden" name="redirect" value='doctor/details'>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input pull-left" name="sms" value="sms">
                                                        <span class="custom-control-label">Send SMS</span>
                                                    </label>
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
                        <!--End Appointment Modal-->

                        <!--Add Holiday Modal-->
                        <div class="modal" id="AddHolidayModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('holiday'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="schedule/addHoliday" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <label class="form-label"><?php echo lang('date'); ?><span class="text-red"> *</span></label>
                                            <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text" value="" required="" readonly="">

                                            <input type="hidden" name="doctor" value='<?php echo $doctor->id; ?>'>
                                            <input type="hidden" name="redirect" value='doctor/details'>
                                            <input type="hidden" name="id" value=''>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End Holiday Modal-->

                        <!--Edit Holiday Modal-->
                        <div class="modal" id="editHolidayModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('edit'); ?>  <?php echo lang('holiday'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editHolidayForm" action="schedule/addHoliday" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <label class="form-label"><?php echo lang('date'); ?><span class="text-red"> *</span></label>
                                            <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" value="" type="text" readonly="" required="">
                                            <input type="hidden" name="doctor" value='<?php echo $doctor->id; ?>'>
                                            <input type="hidden" name="redirect" value='doctor/details'>
                                            <input type="hidden" name="id" value=''>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" name="submit" type="submit"><?php echo lang('submit'); ?></button>
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

        <!-- Full-calendar js-->
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
        <script src='<?php echo base_url('public/assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
        <!-- <script src="<?php echo base_url('public/assets/js/app-calendar-events.js'); ?>"></script> -->
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

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                lang: 'en',
                events: 'appointment/getAppointmentByJason',
                header:
                        {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,basicWeek,basicDay',
                        },
                /*    timeFormat: {// for event elements
                 'month': 'h:mm TT A {h:mm TT}', // default
                 'week': 'h:mm TT A {h:mm TT}', // default
                 'day': 'h:mm TT A {h:mm TT}'  // default
                 },
                 
                 */
                timeFormat: 'h(:mm) A',
                eventRender: function (event, element) {
                    element.find('.fc-time').html(element.find('.fc-time').text());
                    element.find('.fc-title').html(element.find('.fc-title').text());

                },
                eventClick: function (event) {
                    $('#medical_history').html("");
                    if (event.id) {
                        $.ajax({
                            url: 'patient/getMedicalHistoryByJason?id=' + event.id + '&from_where=calendar',
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                // Populate the form fields with the data returned from server
                                $('#medical_history').html("");
                                $('#medical_history').append(response.view);
                            }
                        });
                        //alert(event.id);

                    }

                    $('#cmodal').modal('show');
                },

                /*   eventMouseover: function (calEvent, domEvent) {
                 var layer = "<div id='events-layer' class='fc-transparent' style='position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100'>Description</div>";
                 $(this).append(layer);
                 },
                 
                 eventMouseout: function (calEvent, domEvent) {
                 $(this).append(layer);
                 },
                 
                 */

                slotDuration: '00:5:00',
                businessHours: false,
                slotEventOverlap: false,
                editable: false,
                selectable: false,
                lazyFetching: true,
                minTime: "6:00:00",
                maxTime: "24:00:00",
                defaultView: 'month',
                allDayDefault: false,
                displayEventEnd: true,
                timezone: false,

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".editScheduleButton").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#editTimeSlotForm').trigger("reset");
                $('#editScheduleModal').modal('show');
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

    <script type="text/javascript">
        $(document).ready(function () {
            $(".editbutton").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#myModal2').modal('show');
                $.ajax({
                    url: 'patient/editMedicalHistoryByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                        $('#medical_historyEditForm').find('[name="date"]').val(response.medical_history.date).end()
                        CKEDITOR.instances['editor'].setData(response.medical_history.description)
                    }
                });
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $(".editPrescription").click(function (e) {
                e.preventDefault(e);
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
            $(".editHoliday").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#editHolidayForm').trigger("reset");
                $('#editHolidayModal').modal('show');
                $.ajax({
                    url: 'schedule/editHolidayByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        var date = new Date(response.holiday.date * 1000);
                        $('#editHolidayForm').find('[name="id"]').val(response.holiday.id).end()
                        $('#editHolidayForm').find('[name="date"]').val(date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear()).end()
                    }
                });
            });
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

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".editbutton", function () {
                // e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                var id = $(this).attr('data-id');

                $('#editAppointmentForm').trigger("reset");
                $('#myModal2').modal('show');
                $.ajax({
                    url: 'appointment/editAppointmentByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var de = response.appointment.date * 1000;
                        var d = new Date(de);
                        var da = (d.getMonth() + 1) + '/' + d.getDate() + '/' + d.getFullYear();
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
                        $('#editAppointmentForm').find('[name="date"]').val(da).end()

                        var service = response.appointment.service_id;

                        var date = $('#date1').val();
                        var doctorr = $('#adoctors1').val();
                        var appointment_id = $('#appointment_id').val();
                        // $('#default').trigger("reset");

                        $.ajax({
                            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + appointment_id,
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
                                
                            }
                        });
                        
                    }
                });
                
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
                            $('#sub_service').append($('<option>').text(value.description).val(value.id)).end();
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
            $('#date1').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
            })
                    //Listen for the change even on the input
                    .change(dateChanged1)
                    .on('changeDate', dateChanged1);
        });

        function dateChanged1() {
            // Get the record's ID via attribute  
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

        }

    </script>

<!-- jquery for edit service type, service, location dependencies end-->


    <script>
        $(document).ready(function () {
            $('#editable-sample').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-2'l><'col-sm-6 text-center'B><'col-sm-4'f>>" +
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
                            columns: [0, 1],
                        }
                    },
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
                    searchPlaceholder: "Search..."
                },
            });

        });

        $(document).ready(function () {
            $('#editable-sample2').DataTable({
                responsive: true,
                dom: "<'row'<'col-md-8 col-sm-12 text-center'B><'col-md-4 col-sm-12'f>>" +
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
                            columns: [0, 1],
                        }
                    },
                    'colvis'
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
                    searchPlaceholder: "Search..."
                },
            });

        });

        $(document).ready(function () {
            $('#editable-sample3').DataTable({
                responsive: true,
                dom: "<'row'<'col-md-8 col-sm-12 text-center'B><'col-md-4 col-sm-12'f>>" +
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
                            columns: [0, 1],
                        }
                    },
                    'colvis'
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
                    searchPlaceholder: "Search..."
                },
            });

        });

        $(document).ready(function () {
            $('#editable-sample4').DataTable({
                responsive: true,
                dom: "<'row'<'col-md-8 col-sm-12 text-center'B><'col-md-4 col-sm-12'f>>" +
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
                            columns: [0, 1],
                        }
                    },
                    'colvis'
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
                    searchPlaceholder: "Search..."
                },
            });

        });

        $(document).ready(function () {
            $('#editable-sample5').DataTable({
                responsive: true,
                dom: "<'row'<'col-md-8 col-sm-12 text-center'B><'col-md-4 col-sm-12'f>>" +
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
                            columns: [0, 1],
                        }
                    },
                    'colvis'
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
                    searchPlaceholder: "Search..."
                },
            });

        });
    </script>


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
            $("#add_doctor").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorWithAddNewOption',
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
    <!--Start of old code details.php-->
    </body>
</html>

