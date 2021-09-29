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
                            <div class="col-xl-9 col-sm-12 col-lg-9">
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
                                                    <div class="row">
                                                        <div class="col mb-4">
                                                            <a class="btn btn-primary" data-target="#addAppointmentModal" data-toggle="modal" href="#addAppointmentModal"><i class="fe fe-plus"></i><?php echo lang('add_new'); ?> </a>
                                                        </div>
                                                    </div>

                                                    <div class="mb-0 border">
                                                        <div class="table-responsive">
                                                            <table class="table card-table table-vcenter text-nowrap mb-0 border">
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
                                                                                        <a class="btn btn-info pull-right" data-target="#EditAppointment" data-toggle="modal" href=""><i class="fe fe-edit"></i></a>
                                                                                    </div>
                                                                                    <div class="btn-group mb-0">
                                                                                        <a class="btn btn-danger" data-toggle="modal" title="<?php echo lang('delete'); ?>" href="appointment/delete?id=<?php echo $todays_appointment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fe fe-trash-2"></i></a>
                                                                                    </div>
                                                                                    <div class="btn-group mb-0">
                                                                                        <a title="<?php echo lang('history'); ?>"  href="patient/medicalHistory?id=<?php echo $todays_appointment->patient; ?>" class="btn btn-lime" aria-haspopup="true" aria-expanded="false"><i class="fa fa-stethoscope mr-2"></i><?php echo lang('patient'); ?> <?php echo lang('history'); ?></a>
                                                                                    </div>
                                                                                    <?php if ($todays_appointment->status == 'Confirmed') { ?>
                                                                                        <div class="btn-group mb-0">
                                                                                            <a title=" <?php echo lang('start_live'); ?>" href="meeting/instantLive?id=<?php echo $todays_appointment->id; ?>" class="btn btn-lime" aria-haspopup="true" aria-expanded="false"><i class="fa fa-headphones mr-2"></i><?php echo lang('live'); ?></a>
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
                                                    <div class="mb-0">
                                                        <div class="table-responsive">
                                                            <?php if (!empty($appointment_patients)) { ?>
                                                                <table id="example" class="table table-bordered text-nowrap key-buttons w-100">
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
                                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                        <div class="row">
                                                            <div class="col mb-4">
                                                                <a class="btn btn-primary" href="prescription/addPrescriptionView"><i class="fe fe-plus"></i><?php echo lang('add_new'); ?></a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="mb-0 border">
                                                        <div class="table-responsive">
                                                            <table class="table card-table table-vcenter text-nowrap mb-0 border">
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
                                                                            <td><?php echo date('m/d/Y', $prescription->date); ?></td>
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
                                                <div class="tab-pane" id="schedule">
                                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                        <div class="row">
                                                            <div class="col mb-4">
                                                                <a class="btn btn-primary" data-target="#addScheduleModal" data-toggle="modal" href=""><i class="fe fe-plus"></i><?php echo lang('add_new'); ?></a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="mb-0 border">
                                                        <div class="table-responsive">
                                                            <table class="table card-table table-vcenter text-nowrap mb-0 border">
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
                                                        <div class="col mb-4">
                                                            <a class="btn btn-primary" data-target="#AddHolidayModal" data-toggle="modal" href=""><i class="fe fe-plus"></i> <?php echo lang('add_new'); ?> </a>
                                                        </div>
                                                    </div>

                                                    <div class="mb-0 border">
                                                        <div class="table-responsive">
                                                            <table class="table card-table table-vcenter text-nowrap mb-0 border">
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
                                                                            <td><?php echo date('d-m-Y', $holiday->date); ?></td>
                                                                            <td>
                                                                                <div class="btn-group mb-0">
                                                                                    <a class="btn btn-info pull-right" data-target="#editHolidayModal" data-toggle="modal" data-id="<?php echo $holiday->id; ?>" href=""><i class="fe fe-edit"></i> <?php echo lang('edit'); ?></a>
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
                            <div class="col-xl-3 col-sm-12 col-lg-3">
                                <div class="row">
                                    <div class="card box-widget widget-user">
                                        <div class="widget-user-image mx-auto mt-5 text-center">
                                            <?php if (!empty($doctor->img_url)) { ?>
                                                <img alt="User Avatar" class="rounded-circle p-1" src="<?php echo $doctor->img_url; ?>">
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
                            </div>
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
                                                            <input class="form-control" id="tp3" placeholder="Set time" type="text" name="e_time" value='' readonly="" required="">
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
                        <div class="modal" id="addAppointmentModal">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_appointment'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="schedule/output" method="post" enctype="multipart/form-data">    
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search pos_select" id="pos_select" name="patient" data-placeholder="Choose one" value=''>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pos_client clearfix">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                            <input type="text" name="p_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                            <input type="email" name="p_email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                            <form>
                                                                <input id="phone" name="p_phone" value="+63" type="tel">
                                                             </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                            <input type="text" name="p_age" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
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
                                                        <label class="form-label"><?php echo lang('doctor'); ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="doctor" id="adoctors" data-placeholder="Choose one">
                                                            <option value=""><?php echo lang('select'); ?> <?php echo lang('doctor'); ?></option>
                                                             <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo lang('date'); ?><span class="text-red"> *</span></label>
                                                    <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" name="date" type="text" readonly>
                                                </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('available_slots'); ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="time_slot" id="aslots" data-placeholder="Choose one">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="status" data-placeholder="Choose one">
                                                            <option value="Pending Confirmation" <?php
                                                                    ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                            <option value="Confirmed" <?php
                                                                    ?> > <?php echo lang('confirmed'); ?> </option>
                                                            <option value="Treated" <?php
                                                                    ?> > <?php echo lang('treated'); ?> </option>
                                                            <option value="Cancelled" <?php
                                                                    ?> > <?php echo lang('cancelled'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('remarks'); ?><span class="text-red"> *</span></label>
                                                        <textarea class="form-control mb-4" placeholder="Purpose" name="remarks" maxlength="500" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input pull-left" name="sms" value="sms">
                                                        <span class="custom-control-label"><?php echo lang('send_sms') ?></span>
                                                    </label>
                                                    
                                                </div>
                                                <input type="hidden" name="redirect" value='doctor/details'>
                                                <div class="col-md-6 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
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


<script type="text/javascript">
    $(document).ready(function () {
        $(".editHoliday").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            dd(iid);
            $('#editHolidayForm').trigger("reset");
            $('#editHolidayModal').modal('show');
            $.ajax({
                url: 'schedule/editHolidayByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                var date = new Date(response.holiday.date * 1000);
                $('#editHolidayForm').find('[name="id"]').val(response.holiday.id).end()
                $('#editHolidayForm').find('[name="date"]').val(date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear()).end()
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
        $("#adoctors").change(function () {
            // Get the record's ID via attribute  
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
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
            });
        });

    });


    $(document).ready(function () {
        var iid = $('#date').val();
        var doctorr = $('#adoctors').val();
        $('#aslots').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function (response) {
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
        $('#aslots').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function (response) {
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
        });

    }
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
<!--Start of old code details.php-->
