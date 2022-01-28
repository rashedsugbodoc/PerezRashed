<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <style>
                            @media screen and (max-width: 500px) {
                                .button-text {
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
                                                    <i class="fa fa-search fa-5x"></i>
                                                    <p style="margin-bottom: 0px;"><label class="form-label">Find Doctors</label></p>
                                                </a>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a data-toggle="modal" href="#addAppointmentModal">
                                                    <i class="fa fa-calendar fa-5x"></i>
                                                    <p style="margin-bottom: 0px;"><label class="form-label">Book Appointment</label></p>
                                                </a>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a>
                                                    <i class="fa fa-home fa-5x"></i>
                                                    <p style="margin-bottom: 0px;"><label class="form-label">Find Hospital/Clinic</label></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!--/app header-->
                        <div class="main-proifle mt-5 d-print-none">
                            <div class="row">
                                <div class="col-lg-10 col-sm-12 col-md-12">
                                    <div class="box-widget widget-user">
                                        <div class="widget-user-image d-lg-flex">
                                            <img alt="User Avatar" class="rounded-circle p-1" src="<?php echo $patient->img_url; ?>" style="width: 150px; height: 150px;" width="auto" height="auto">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-5 pr-0 d-lg-flex">
                                                    <div class="ml-sm-4 ml-md-4 mt-md-4 mt-sm-1 mr-lg-3 mr-mb-0 mr-sm-0">
                                                        <h4 class="pro-user-username mb-3 mt-1 font-weight-bold h-6"><?php echo $patient->name; ?></h4>
                                                        <div class="d-flex mb-1">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5.08 8h2.95c.32-1.25.78-2.45 1.38-3.56-1.84.63-3.37 1.9-4.33 3.56zm2.42 4c0-.68.06-1.34.14-2H4.26c-.16.64-.26 1.31-.26 2s.1 1.36.26 2h3.38c-.08-.66-.14-1.32-.14-2zm-2.42 4c.96 1.66 2.49 2.93 4.33 3.56-.6-1.11-1.06-2.31-1.38-3.56H5.08zM12 4.04c-.83 1.2-1.48 2.53-1.91 3.96h3.82c-.43-1.43-1.08-2.76-1.91-3.96zM18.92 8c-.96-1.65-2.49-2.93-4.33-3.56.6 1.11 1.06 2.31 1.38 3.56h2.95zM12 19.96c.83-1.2 1.48-2.53 1.91-3.96h-3.82c.43 1.43 1.08 2.76 1.91 3.96zm2.59-.4c1.84-.63 3.37-1.91 4.33-3.56h-2.95c-.32 1.25-.78 2.45-1.38 3.56zM19.74 10h-3.38c.08.66.14 1.32.14 2s-.06 1.34-.14 2h3.38c.16-.64.26-1.31.26-2s-.1-1.36-.26-2zM9.66 10c-.09.65-.16 1.32-.16 2s.07 1.34.16 2h4.68c.09-.66.16-1.32.16-2s-.07-1.35-.16-2H9.66z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->id; ?></div>
                                                        </div>
                                                        <div class="d-flex mb-1">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->sex; ?></div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.2 18.21c1.21.41 2.48.67 3.8.76v-1.5c-.88-.07-1.75-.22-2.6-.45l-1.2 1.19zM6.54 5h-1.5c.09 1.32.35 2.59.75 3.79l1.2-1.21c-.24-.83-.39-1.7-.45-2.58zM14 8h5V5h-5z" opacity=".3"/><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.1-.03-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.58l2.2-2.21c.28-.27.36-.66.25-1.01C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM5.03 5h1.5c.07.88.22 1.75.46 2.59L5.79 8.8c-.41-1.21-.67-2.48-.76-3.8zM19 18.97c-1.32-.09-2.6-.35-3.8-.76l1.2-1.2c.85.24 1.72.39 2.6.45v1.51zM12 3v10l3-3h6V3h-9zm7 5h-5V5h5v3z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->birthdate; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-7 mt-md-0 mt-lg-8 pr-0 d-lg-flex">
                                                    <div class="ml-sm-4 mt-md-0 mt-sm-1 mr-lg-0 mr-mb-0 mr-sm-0">
                                                        <div class="d-flex mb-1">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5.08 8h2.95c.32-1.25.78-2.45 1.38-3.56-1.84.63-3.37 1.9-4.33 3.56zm2.42 4c0-.68.06-1.34.14-2H4.26c-.16.64-.26 1.31-.26 2s.1 1.36.26 2h3.38c-.08-.66-.14-1.32-.14-2zm-2.42 4c.96 1.66 2.49 2.93 4.33 3.56-.6-1.11-1.06-2.31-1.38-3.56H5.08zM12 4.04c-.83 1.2-1.48 2.53-1.91 3.96h3.82c-.43-1.43-1.08-2.76-1.91-3.96zM18.92 8c-.96-1.65-2.49-2.93-4.33-3.56.6 1.11 1.06 2.31 1.38 3.56h2.95zM12 19.96c.83-1.2 1.48-2.53 1.91-3.96h-3.82c.43 1.43 1.08 2.76 1.91 3.96zm2.59-.4c1.84-.63 3.37-1.91 4.33-3.56h-2.95c-.32 1.25-.78 2.45-1.38 3.56zM19.74 10h-3.38c.08.66.14 1.32.14 2s-.06 1.34-.14 2h3.38c.16-.64.26-1.31.26-2s-.1-1.36-.26-2zM9.66 10c-.09.65-.16 1.32-.16 2s.07 1.34.16 2h4.68c.09-.66.16-1.32.16-2s-.07-1.35-.16-2H9.66z" opacity=".3"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->phone; ?></div>
                                                        </div>
                                                        <div class="d-flex mb-1 pr-0">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                                                            <div class="h6 mb-0 ml-1 mt-1"><?php echo $patient->email; ?></div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.2 18.21c1.21.41 2.48.67 3.8.76v-1.5c-.88-.07-1.75-.22-2.6-.45l-1.2 1.19zM6.54 5h-1.5c.09 1.32.35 2.59.75 3.79l1.2-1.21c-.24-.83-.39-1.7-.45-2.58zM14 8h5V5h-5z" opacity=".3"/><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.1-.03-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.58l2.2-2.21c.28-.27.36-.66.25-1.01C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM5.03 5h1.5c.07.88.22 1.75.46 2.59L5.79 8.8c-.41-1.21-.67-2.48-.76-3.8zM19 18.97c-1.32-.09-2.6-.35-3.8-.76l1.2-1.2c.85.24 1.72.39 2.6.45v1.51zM12 3v10l3-3h6V3h-9zm7 5h-5V5h5v3z"/></svg>
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
                                            <button type="button" class="btn btn-primary btn-xs btn_width editPatient" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $patient->id; ?>"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></button> 
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-cover">
                                <div class="wideget-user-tab">
                                    <div class="tab-menu-heading p-0">
                                        <div class="tabs-menu1 px-3">
                                            <ul class="nav">
                                                <li><a href="#tab-7" data-toggle="tab" class="active"><?php echo lang('vital_signs'); ?></a></li>
                                                <li><a href="#tab-8" data-toggle="tab" class=""><?php echo lang('appointments'); ?></a></li>
                                                <li><a href="#tab-9" data-toggle="tab" class=""><?php echo lang('case_notes'); ?></a></li>
                                                <li><a href="#tab-10" data-toggle="tab" class=""><?php echo lang('prescription'); ?></a></li>
                                                <li><a href="#tab-11" data-toggle="tab" class=""><?php echo lang('lab'); ?></a></li>
                                                <li><a href="#tab-12" data-toggle="tab" class=""><?php echo lang('documents'); ?></a></li>
                                                <li><a href="#tab-13" data-toggle="tab" class=""><?php echo lang('admissions'); ?></a></li>
                                                <li><a href="#tab-14" data-toggle="tab" class=""><?php echo lang('timeline'); ?></a></li>
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
                                        <div class="tab-pane active" id="tab-7">
                                            <div class="mb-0">
                                                <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-xl-3 col-lg-4">
                                                        <a data-target="#AddVital" data-toggle="modal" href="">
                                                        <div class="card bg-primary">
                                                            <div class="card-body">
                                                                <div class="d-flex no-block align-items-center">
                                                                    <div class="pl-5">
                                                                        <span class="text-white display-5"><i class="fa fa-plus fa-2x"></i></span>
                                                                    </div>
                                                                    <div class="ml-auto pr-5">
                                                                        <h2 class="text-white m-0 font-weight-bold">Add Vitals</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Blood Pressure</p>
                                                                <label class="mb-1 font-weight-bold h2">120 / 80</label> <span class="unit-block">mmHg</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Systolic Blood Pressure</p>
                                                                <label class="mb-1 font-weight-bold h2">120</label> <span>mmHg</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Diastolic Blood Pressure</p>
                                                                <label class="mb-1 font-weight-bold h2">80</label> <span>mmHg</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Heart Rate</p>
                                                                <label class="mb-1 font-weight-bold h2">84</label> <span>bpm</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Breathing</p>
                                                                <label class="mb-1 font-weight-bold h2">21</label> <span>bpm</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Temperature</p>
                                                                <label class="mb-1 font-weight-bold h2">36</label> <span>°C</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">SPO2</p>
                                                                <label class="mb-1 font-weight-bold h2">99</label> <span>%</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Height</p>
                                                                <label class="mb-1 font-weight-bold h2">180</label> <span>cm</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">Weight</p>
                                                                <label class="mb-1 font-weight-bold h2">92</label> <span>kg</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                                    <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                                                                    <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                                                                </svg>
                                                                <p class=" mb-1 font-weight-bold">BMI</p>
                                                                <label class="mb-1 font-weight-bold h2">12</label> <span>kg/㎡</span>
                                                                <p>09/22/1998</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } else { ?>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><?php echo lang('vital_signs') ?></h3>
                                                        <div class="card-options">
                                                            <a data-target="#AddVital" data-toggle="modal" href="" class="btn btn-primary"><?php echo lang('add_new'); ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table id="editable-sample" class="table table-bordered text-nowrap key-buttons w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo lang('measured_at'); ?></th>
                                                                            <th><?php echo lang('heart_rate'); ?></th>
                                                                            <th><?php echo lang('height'); ?></th>
                                                                            <th><?php echo lang('weight'); ?></th>
                                                                            <th><?php echo lang('bmi'); ?></th>
                                                                            <th><?php echo lang('bp'); ?></th>
                                                                            <th><?php echo lang('temperature'); ?></th>
                                                                            <th><?php echo lang('spo2'); ?></th>
                                                                            <th><?php echo lang('respiration_rate'); ?></th>
                                                                            <th><?php echo lang('note'); ?></th>
                                                                            <!-- <th><?php echo lang('actions'); ?></th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($vitals as $vital) { ?>
                                                                            <tr>
                                                                                <td><?php echo $vital->measured_at; ?></td>
                                                                                <td><?php echo $vital->heart_rate; ?></td>
                                                                                <td><?php echo $vital->height_cm; ?></td>
                                                                                <td><?php echo $vital->weight_kg; ?></td>
                                                                                <td><?php echo $vital->bmi; ?></td>
                                                                                <td><?php echo $vital->systolic . ' / ' . $vital->diastolic; ?></td>
                                                                                <td><?php echo $vital->temperature_celsius; ?></td>
                                                                                <td><?php echo $vital->spo2; ?></td>
                                                                                <td><?php echo $vital->respiration_rate; ?></td>
                                                                                <td><?php echo $vital->note; ?></td>
                                                                                <!-- <td>
                                                                                    <button type="button" class="btn btn-info editVital" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $vital->id; ?>"><i class="fa fa-edit"></i> </button>   
                                                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                                </td> -->
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>


                                                <!-- <div class="row">
                                                    
                                                </div>

                                                <div class="row">
                                                    
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-8">
                                            <div class="mb-0">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <?php echo lang('appointment'); ?>
                                                        </div>
                                                        <div class="card-options">
                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                                <div class=" no-print">
                                                                    <a class="btn btn-primary btn_width btn-xs" data-toggle="modal" href="#addAppointmentModal">
                                                                        <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($this->ion_auth->in_group('Patient')) { ?>
                                                                <div class=" no-print">
                                                                    <a class="btn btn-primary btn_width btn-xs" data-toggle="modal" href="#addAppointmentModal">
                                                                        <i class="fa fa-plus"> </i> <?php echo lang('request_a_appointment'); ?> 
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table id="editable-sample2" class="table table-bordered text-nowrap key-buttons w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo lang('date'); ?></th>
                                                                            <th><?php echo lang('time_slot'); ?></th>
                                                                            <th><?php echo lang('doctor'); ?></th>
                                                                            <th><?php echo lang('status'); ?></th>
                                                                            <th><?php echo lang('facility'); ?></th>
                                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                                <th class="no-print"><?php echo lang('options'); ?></th>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($appointments as $appointment) { ?>
                                                                            <tr class="">

                                                                                <td><?php echo date('Y-m-d', $appointment->date); ?></td>
                                                                                <td><?php echo $appointment->time_slot; ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                                                                                    if (!empty($doctor_details)) {
                                                                                        $appointment_doctor = $doctor_details->name;
                                                                                    } else {
                                                                                        $appointment_doctor = '';
                                                                                    }
                                                                                    echo $appointment_doctor;
                                                                                    ?>
                                                                                </td>
                                                                                <td><?php echo $appointment->status; ?></td>
                                                                                <td><?php
                                                                                    $facility = $this->hospital_model->getHospitalById($appointment->hospital_id);
                                                                                    if (!empty($appointment->hospital_id)) {
                                                                                        $appointment_facility = $facility->name;
                                                                                    } else {
                                                                                        $appointment_facility = '';
                                                                                    }
                                                                                    echo $appointment_facility;
                                                                                ?></td>
                                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                                    <td class="no-print">
                                                                                        <button type="button" class="btn btn-info btn-xs btn_width editAppointmentButton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"></i> </button>   
                                                                                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                                                            <a class="btn btn-danger btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="appointment/delete?id=<?php echo $appointment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                <?php } ?>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-9">
                                            <div class="mb-0">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <?php echo lang('case_notes'); ?>
                                                        </div>
                                                        <div class="card-options">
                                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
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
                                                                <table id="editable-sample3" class="table table-bordered w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="w-15"><?php echo lang('date'); ?></th>
                                                                            <th class="w-15"><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?></th>
                                                                            <th class="w-45"><?php echo lang('case'); ?> <?php echo lang('summary'); ?></th>
                                                                            <th class="w-20"><?php echo lang('facility'); ?></th>
                                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                                                                                <th class="no-print w-5"><?php echo lang('options'); ?></th>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($medical_histories as $medical_history) { ?>
                                                                            <tr class="">

                                                                                <td><?php echo date('Y-m-d', $medical_history->date); ?></td>
                                                                                <td><?php echo $medical_history->title; ?></td>
                                                                                <td><?php echo $medical_history->description; ?></td>
                                                                                <td><?php
                                                                                    $facility = $this->hospital_model->getHospitalById($medical_history->hospital_id);
                                                                                    if (!empty($medical_history->hospital_id)) {
                                                                                        $case_facility = $facility->name;
                                                                                    } else {
                                                                                        $case_facility = '';
                                                                                    }
                                                                                    echo $case_facility;
                                                                                ?></td>
                                                                                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                                    <?php if ($this->ion_auth->in_group('Doctor')) { ?> 
                                                                                        <td class="no-print">
                                                                                            <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $medical_history->id; ?>"><i class="fa fa-edit"></i> </button>
                                                                                        </td>
                                                                                    <?php } ?>
                                                                                    <?php if ($this->ion_auth->in_group('admin')) { ?>   
                                                                                        <td class="no-print">
                                                                                            <a class="btn btn-danger btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="patient/deleteCaseHistory?id=<?php echo $medical_history->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                                        </td>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-10">
                                            <div class="mb-0">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <?php echo lang('prescription'); ?>
                                                        </div>
                                                        <div class="card-options">
                                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                                <div class=" no-print">
                                                                    <a class="btn btn-primary btn_width btn-xs" href="prescription/addPrescriptionView">
                                                                        <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table id="editable-sample4" class="table table-bordered text-nowrap key-buttons w-100">
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
                                                                        <?php foreach ($prescriptions as $prescription) { ?>
                                                                            <tr class="">
                                                                                <td><?php echo date('Y-m-d', strtotime($prescription->date)); ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
                                                                                    if (!empty($doctor_details)) {
                                                                                        $prescription_doctor = $doctor_details->name;
                                                                                    } else {
                                                                                        $prescription_doctor = '';
                                                                                    }
                                                                                    echo $prescription_doctor;
                                                                                    ?>

                                                                                </td>
                                                                                <td>

                                                                                    <?php
                                                                                    if (!empty($prescription->medicine)) {
                                                                                        $medicine = explode('###', $prescription->medicine);

                                                                                        foreach ($medicine as $key => $value) {
                                                                                            $medicine_id = explode('***', $value);
                                                                                            $medicine_details = $this->medicine_model->getMedicineById($medicine_id[0]);
                                                                                            if (!empty($medicine_details)) {
                                                                                                $medicine_name_with_dosage = $medicine_details->name . ' -' . $medicine_id[1];
                                                                                                $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                                                                                                rtrim($medicine_name_with_dosage, ',');
                                                                                                echo '<p>' . $medicine_name_with_dosage . '</p>';
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    ?>


                                                                                </td>
                                                                                <td><?php
                                                                                    $facility = $this->hospital_model->getHospitalById($prescription->hospital_id);
                                                                                    if (!empty($prescription->hospital_id)) {
                                                                                        $prescription_facility = $facility->name;
                                                                                    } else {
                                                                                        $prescription_facility = '';
                                                                                    }
                                                                                    echo $prescription_facility;
                                                                                ?></td>
                                                                                <td class="no-print">
                                                                                    <a class="btn btn-info btn-xs" href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-eye"></i></a> 
                                                                                    <?php
                                                                                    if ($this->ion_auth->in_group('Doctor')) {
                                                                                        $current_user = $this->ion_auth->get_user_id();
                                                                                        $doctor_table_id = $this->doctor_model->getDoctorByIonUserId($current_user)->id;
                                                                                        if ($prescription->doctor == $doctor_table_id) {
                                                                                            ?>
                                                                                            <?php if ($this->ion_auth->in_group('Doctor')) { ?> 
                                                                                                <a type="button" class="btn btn-info btn-xs" data-toggle="modal" href="prescription/editPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-edit"></i></a>   
                                                                                            <?php } ?>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                    <?php if ($this->ion_auth->in_group('admin')) { ?> 
                                                                                        <a class="btn btn-danger btn-xs " href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                                                                    <?php } ?>
                                                                                    <a class="btn btn-info btn-xs" title="<?php echo lang('print'); ?>" style="color: #fff;" href="prescription/viewPrescriptionPrint?id=<?php echo $prescription->id; ?>"target="_blank"> <i class="fa fa-print"></i></a>
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
                                        </div>
                                        <div class="tab-pane" id="tab-11">
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
                                                                <table id="editable-sample5" class="table table-bordered text-nowrap key-buttons w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo lang('id'); ?></th>
                                                                            <th><?php echo lang('date'); ?></th>
                                                                            <th><?php echo lang('doctor'); ?></th>
                                                                            <th><?php echo lang('facility'); ?></th>
                                                                            <th class="no-print"><?php echo lang('options'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($labs as $lab) { ?>
                                                                            <tr class="">
                                                                                <td><?php echo $lab->id; ?></td>
                                                                                <td><?php echo date('Y-m-d', $lab->date); ?></td>
                                                                                <td>
                                                                                    <?php
                                                                                    $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
                                                                                    if (!empty($doctor_details)) {
                                                                                        $lab_doctor = $doctor_details->name;
                                                                                    } else {
                                                                                        $lab_doctor = '';
                                                                                    }
                                                                                    echo $lab_doctor;
                                                                                    ?>
                                                                                </td>
                                                                                <td><?php
                                                                                    $facility = $this->hospital_model->getHospitalById($lab->hospital_id);
                                                                                    if (!empty($lab->hospital_id)) {
                                                                                        $lab_facility = $facility->name;
                                                                                    } else {
                                                                                        $lab_facility = '';
                                                                                    }
                                                                                    echo $lab_facility;
                                                                                ?></td>
                                                                                <td class="no-print">
                                                                                    <a class="btn btn-info btn-xs btn_width" href="lab/invoice?id=<?php echo $lab->id; ?>"><i class="fa fa-eye"></i></a>   
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
                                        </div>
                                        <div class="tab-pane" id="tab-12">
                                            <div class="card p-5">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-8 col-sm-5 mb-4">
                                                                <!-- <a  data-target="#AddDocument" data-toggle="modal" href="" class="btn btn-primary"><i class="fe fe-plus"></i> Upload New Document</a> -->
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
                                                    <div class="row">
                                                        <?php foreach ($patient_materials as $patient_material) { ?>
                                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                                <div class="card">
                                                                    <div class="card-body p-0">
                                                                        <div class="todo-widget-header d-flex pb-2 p-4">
                                                                            <div class="">
                                                                                <a class="btn btn-info" href="<?php echo $patient_material->url; ?>"><i class="fe fe-edit"></i></a>
                                                                                <a class="btn btn-info" href="<?php echo $patient_material->url; ?>" download><i class="fe fe-download"></i></a>
                                                                                <!-- <a class="btn btn-danger" data-target="#Delete" data-toggle="modal" href=""><i class="fe fe-trash-2"></i></a> -->
                                                                                <?php if ($this->ion_auth->in_group(array('admin', 'Patient', 'Doctor'))) { ?>
                                                                                    <a class="btn btn-danger ml-5" data-target="#Delete" data-toggle="modal"  href="patient/deletePatientMaterial?id=<?php echo $patient_material->id; ?>"onclick="return confirm('Are you sure you want to delete this item?');"><i class="fe fe-trash-2"></i></a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="px-5 pb-5 text-center">
                                                                            <!-- <img src="<?php echo base_url('public/assets/images/files/file2.png'); ?>" alt="img" class="w-80 mx-auto"> -->
                                                                            <?php $ext = pathinfo($patient_material->url, PATHINFO_EXTENSION); ?>
                                                                            <?php if ($ext === 'pdf'){ ?>
                                                                                <div class="panel-body text-center">
                                                                                    <a class="example-image-link" href="<?php echo $patient_material->url; ?>" target="_blank">
                                                                                        <img class="example-image" src="uploads/PDF_DefaultImage.png" alt="image-1" width="120" height="120"/>
                                                                                    </a>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="panel-body text-center">
                                                                                    <a class="example-image-link" href="<?php echo $patient_material->url; ?>" data-lightbox="example-1" target="_blank">
                                                                                        <img class="example-image" src="<?php echo $patient_material->url; ?>" alt="image-1" width="120" height="120"/>
                                                                                    </a>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <h6 class="mb-1 font-weight-bold mt-4">
                                                                                <?php
                                                                                if (!empty($patient_material->title)) {
                                                                                    echo $patient_material->title;
                                                                                }
                                                                                ?>
                                                                            </h6>
                                                                            <p class="text-dark">
                                                                                <?php echo lang('uploader') . ': '; ?>
                                                                                <?php
                                                                                if (!empty($patient_material->created_user_id)) {
                                                                                    echo $this->hospital_model->getIonUserById($patient_material->created_user_id)->username;
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                            <p class="text-muted">
                                                                                <?php
                                                                                if (!empty($patient_material->created_at)) {
                                                                                    $utcdate = date_create($document->created_at, timezone_open('UTC'));
                                                                                    date_timezone_set($utcdate, timezone_open($this->settings_model->getSettings()->timezone));
                                                                                    echo date_format($utcdate, $settings->date_format . ' ' . $settings->date_format_long) . "\n";
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (in_array('bed', $this->modules)) { ?>
                                        <div class="tab-pane" id="tab-13">
                                            <div class="mb-0 border">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                             <?php echo lang('admissions'); ?>
                                                        </div>
                                                        <div class="card-options">
                                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                                <div class=" no-print">
                                                                    <a class="btn btn-primary btn_width btn-xs" data-toggle="modal" href="#myModa3">
                                                                        <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table id="editable-sample6" class="table table-bordered text-nowrap key-buttons w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo lang('admission_id'); ?></th>
                                                                            <th><?php echo lang('alloted_time'); ?></th>
                                                                            <th><?php echo lang('discharge_time'); ?></th>
                                                                            <th><?php echo lang('facility'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($beds as $bed) { ?>
                                                                            <tr class="">
                                                                                <td><?php echo $bed->bed_id; ?></td>            
                                                                                <td><?php echo $bed->a_time; ?></td>
                                                                                <td><?php echo $bed->d_time; ?></td>
                                                                                <td><?php
                                                                                    $facility = $this->hospital_model->getHospitalById($bed->hospital_id);
                                                                                    if (!empty($bed->hospital_id)) {
                                                                                        $bed_facility = $facility->name;
                                                                                    } else {
                                                                                        $bed_facility = '';
                                                                                    }
                                                                                    echo $bed_facility;
                                                                                ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="tab-pane" id="tab-14">
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- //Add Vitals Modal Start -->

                            <div class="modal" id="AddVital">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('add_vitals'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" action="patient/addVitals" class="clearfix" method="post" enctype="multipart/form-data">
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
                                                            <button class="btn btn-primary pull-right" name="submit"><?php echo lang('submit'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editVitalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('edit_vital'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="editVitalForm" class="clearfix" action="patient/addVital" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    
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
                                            <h6 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('files'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" action="patient/addPatientMaterial" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('title'); ?> <span class="text-red">*</span></label>
                                                            <input type="text" class="form-control" name="title" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('description'); ?> <span class="text-red">*</span></label>
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
                                                            <label class="form-label"><?php echo lang('file'); ?> <span class="text-red">*</span></label>
                                                            <input type="file" name="img_url" id="document" class="dropify"/>
                                                        </div>
                                                    </div>
                                                </div>
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

                        <!-- //Documents Modal End -->

                        <!-- //Case History Modal Start -->

                            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('add_case'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="javascript: return myFunction();">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                            <input class="form-control fc-datepicker" readonly name="date" placeholder="MM/DD/YYYY" type="text">
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
                                            </div>
                                            <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                                            <input type="hidden" name="id" value=''>
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit" name="submit"><?php echo lang('submit'); ?></button>
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
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                            <input class="form-control fc-datepicker" readonly name="date" placeholder="MM/DD/YYYY" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('clinical'); ?> <?php echo lang('impression'); ?></label>
                                                            <input type="text" name="title" class="form-control" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label><?php echo lang('case'); ?> <?php echo lang('summary'); ?></label>
                                                            <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                                <div id="quillEditor2" class="bg-white">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <textarea id="description2" name="description" readonly="" class="form-control" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="sampleDiv" class="row">
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <textarea id="description2" name="description" hidden="" readonly="" class="form-control" rows="4"></textarea>
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
                                        <form role="form" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="patient" data-placeholder="Choose one">
                                                                <option label="Choose one">
                                                                </option>
                                                                <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" id="adoctors" name="doctor" data-placeholder="Choose one">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" readonly id="date" name="date" placeholder="MM/DD/YYYY" type="text">
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('available_slots'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="time_slot" id="aslots" data-placeholder="Choose one">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="status" data-placeholder="Choose one">
                                                                <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                                    <option value="Pending Confirmation" <?php
                                                                    ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                                    <option value="Confirmed" <?php
                                                                    ?> > <?php echo lang('confirmed'); ?> </option>
                                                                    <option value="Treated" <?php
                                                                    ?> > <?php echo lang('treated'); ?> </option>
                                                                    <option value="Cancelled" <?php ?> > <?php echo lang('cancelled'); ?> </option>
                                                                <?php } else { ?>
                                                                    <option value="Requested" <?php ?> > <?php echo lang('requested'); ?> </option> 
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('complaint'); ?> <span class="text-red">*</span></label>
                                                            <textarea class="form-control mb-4" name="remarks" placeholder="Purpose" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <!-- <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input pull-left" name="sms" value="sms">
                                                            <span class="custom-control-label"><?php echo lang('send_sms') ?></span>
                                                        </label> -->
                                                    </div>
                                                    <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>

                                                    <input type="hidden" name="request" value='<?php
                                                    if ($this->ion_auth->in_group(array('Patient'))) {
                                                        echo 'Yes';
                                                    }
                                                    ?>'>
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
                                                            <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search patient" name="patient" >
                                                                <option value="">Select .....</option>
                                                                <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" id="adoctors1" name="doctor">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" readonly placeholder="" id="date1" name="date" type="text">
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('available_slots'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="time_slot" id="aslots1" data-placeholder="No Further Time Slot">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?> <span class="text-red">*</span></label>
                                                            <select class="form-control select2-show-search" name="status" data-placeholder="Choose one">
                                                                <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                                    <option value="Pending Confirmation" <?php ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                                    <option value="Confirmed" <?php
                                                                    ?> > <?php echo lang('confirmed'); ?> </option>
                                                                    <option value="Treated" <?php
                                                                    ?> > <?php echo lang('treated'); ?> </option>
                                                                    <option value="Cancelled" <?php ?> > <?php echo lang('cancelled'); ?> </option>
                                                                <?php } else { ?>
                                                                    <option value="Requested" <?php ?> > <?php echo lang('requested'); ?> </option> 
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo lang('remarks'); ?> <span class="text-red">*</span></label>
                                                            <textarea class="form-control mb-4" placeholder="Purpose" name="remarks" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input pull-left" name="sms" value="sms">
                                                            <span class="custom-control-label">Send SMS</span>
                                                        </label>
                                                    </div>
                                                    <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>
                                                    <input type="hidden" name="id" id="appointment_id" value=''>
                                                    <div class="col-md-6 col-sm-12">
                                                        <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- //Appointment Modal End -->


                            <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title"><?php echo lang('edit_patient'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" id="editPatientForm" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" id="exampleInputEmail1" class="form-control" name="name" placeholder="Name" maxlength="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Email<span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Password <span class="text-red">*</span></label>
                                                            <input type="password" class="form-control" name="password" placeholder="Password" maxlength="255">
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Phone <span class="text-red">*</span></label>
                                                                <input id="phone" name="phone" value="+63" type="tel" maxlength="20" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Address <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="address" placeholder="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="country_id" id="edit_country">
                                                                    <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                                    <?php foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo $country->id; ?>" <?php
                                                                        if (!empty($setval)) {
                                                                            if ($country->id == set_value('country_id')) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        if (!empty($doctors->country_id)) {
                                                                            if ($country->id == $doctors->country_id) {
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
                                                                <label class="form-label"><?php echo lang('state_province'); ?></label>
                                                                <select class="form-control select2-show-search" name="state_id" id="edit_state">
                                                                </select>    
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('city_municipality'); ?></label>
                                                                <select class="form-control select2-show-search" name="city_id" id="edit_city">
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6" id="edit_barangayDiv">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                                <select class="form-control select2-show-search" name="barangay_id" id="edit_barangay" value=''>
                                                                </select>        
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('postal'); ?></label>
                                                                <input type="text" name="postal" class="form-control" placeholder="<?php echo lang('postal_placeholder'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Sex <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="sex" data-placeholder="Choose one">
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
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Birth Date <span class="text-red">*</span></label>
                                                                <input class="form-control fc-datepicker" name="birthdate" placeholder="MM/DD/YYYY" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Blood Group <span class="text-red">*</span></label>
                                                                        <select class="form-control select2-show-search" name="bloodgroup" data-placeholder="Choose one">
                                                                            <?php foreach ($groups as $group) { ?>
                                                                            <option value="<?php echo $group->group; ?>" <?php
                                                                            if (!empty($patient->bloodgroup)) {
                                                                                if ($group->group == $patient->bloodgroup) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?> > <?php echo $group->group; ?> </option>
                                                                                <?php } ?> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Doctor <span class="text-red">*</span></label>
                                                                        <select class="form-control select2" id="doctorchoose" name="doctor[]" data-placeholder="Choose Doctor(s)" multiple="multiple">
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label">Image Upload <span class="text-red">*</span></label>
                                                            <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                            <input type="file" name="img_url" id="img" class="dropify"/>
                                                        </div>
                                                        <input type="hidden" name="id" id="patient_id" value=''>
                                                        <input type="hidden" name="p_id" value='<?php
                                                        if (!empty($patient->patient_id)) {
                                                            echo $patient->patient_id;
                                                        }
                                                        ?>'>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <button class="btn btn-primary pull-right" name="EditPatient" type="submit">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
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
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

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
            $(".editbutton").click(function () {
                // e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                // document.getElementById('quillEditor2').children[0].innerHTML = '';
                $('#myModal2').modal('show');
                $.ajax({
                    url: 'patient/editMedicalHistoryByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        var date = new Date(response.medical_history.date * 1000);
                        var de = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();

                        $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                        $('#medical_historyEditForm').find('[name="date"]').val(de).end()
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
                        var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                        // Populate the form fields with the data returned from server
                        $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                        $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).change()
                        //  $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                        $('#editAppointmentForm').find('[name="date"]').val(da).end()
                        $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).change();
                        $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()
                        var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                        $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');
                        // $('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                        $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');




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
                success: function(response) {
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
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
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


    <script type="text/javascript">
        $(document).ready(function () {
            $("#adoctors1").change(function () {
                // Get the record's ID via attribute 
                var id = $('#appointment_id').val();
                var date = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                $('#aslots1').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
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

        $(document).ready(function () {
            var id = $('#appointment_id').val();
            var date = $('#date1').val();
            var doctorr = $('#adoctors1').val();
            $('#aslots1').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
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
            var id = $('#appointment_id').val();
            var iid = $('#date1').val();
            var doctorr = $('#adoctors1').val();
            $('#aslots1').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + iid + '&doctor=' + doctorr + '&appointment_id=' + id,
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

    <script>
        $(document).ready(function () {
            $('#editable-sample').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('vital_signs'); ?>'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('vital_signs'); ?>'
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
                }


            });
        });

        $(".editVital").click(function () {
                
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            var id = $(this).attr('data-id');

            $('#editVitalForm').trigger("reset");
            $('#editVitalModal').modal('show');
            console.log('a');
        });

        $(document).ready(function () {
            $('#editable-sample2').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('appointments'); ?>'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('appointments'); ?>'
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
                }


            });
        });


        $(document).ready(function () {
            $('#editable-sample3').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('case_history'); ?>'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('case_history'); ?>'
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
                }


            });
        });

        $(document).ready(function () {
            $('#editable-sample4').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('prescriptions'); ?>',
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('prescriptions'); ?>'
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
                }


            });
        });

        $(document).ready(function () {
            $('#editable-sample5').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('lab_reports'); ?>'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('lab_reports'); ?>'
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
                }


            });
        });

        $(document).ready(function () {
            $('#editable-sample6').DataTable({
                responsive: true,
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('bed_list'); ?>'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        title: '<?php echo $patient->name; ?> <?php echo lang('bed_list'); ?>'
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
                }


            });
        });
    </script>



    <script type="text/javascript">

        $(document).ready(function () {
            $(".editPatient").click(function () {
                //    e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#doctorchoose').find('option').remove();
                $('#editPatientForm').trigger("reset");
                $.ajax({
                    url: 'patient/editPatientByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server

                        $('#editPatientForm').find('[name="id"]').val(response.patient.id).end()
                        $('#editPatientForm').find('[name="name"]').val(response.patient.name).end()
                        $('#editPatientForm').find('[name="password"]').val(response.patient.password).end()
                        $('#editPatientForm').find('[name="email"]').val(response.patient.email).end()
                        $('#editPatientForm').find('[name="address"]').val(response.patient.address).end()
                        if (response.patient.country_id == null){
                            $("#edit_state").attr("disabled", true);
                            $('#editPatientForm').find('[name="country_id"]').val("0").change()
                        } else {
                            $("#edit_state").attr("disabled", false);
                            $('#editPatientForm').find('[name="country_id"]').val(response.patient.country_id).change()
                        }
                        $('#editPatientForm').find('[name="postal"]').val(response.patient.postal).end()
                        $('#editPatientForm').find('[name="phone"]').val(response.patient.phone).end()
                        $('#editPatientForm').find('[name="sex"]').val(response.patient.sex).end()
                        $('#editPatientForm').find('[name="birthdate"]').val(response.patient.birthdate).end()
                        $('#editPatientForm').find('[name="bloodgroup"]').val(response.patient.bloodgroup).end()
                        $('#editPatientForm').find('[name="p_id"]').val(response.patient.patient_id).end()


                        if (typeof response.patient.img_url !== 'undefined' && response.patient.img_url != '') {
                            $("#img").attr("src", response.patient.img_url);
                        }


                        $('.js-example-basic-single.doctor').val(response.patient.doctor).trigger('change');

                        var imagenUrl = response.patient.img_url;
                        var drEvent = $('#img').dropify(
                        {
                          defaultFile: imagenUrl
                        });
                        drEvent = drEvent.data('dropify');
                        drEvent.resetPreview();
                        drEvent.clearElement();
                        drEvent.settings.defaultFile = imagenUrl;
                        drEvent.destroy();
                        drEvent.init();

                        
                        $('#editPatientForm').find('[name="sex"]').val(response.patient.sex).change();
                        $('#editPatientForm').find('[name="bloodgroup"]').val(response.patient.bloodgroup).change();

                        
                        $.each(response.doctors, function(key, value) {
                            $('#doctorchoose').append($('<option selected>').text(value.name + ' (' + '<?php echo lang('id') ?>' + ': ' + value.id + ')').val(value.id)).end();
                        });

                        $('#infoModal').modal('show');

                        var country = $("#edit_country").val();
                        var patient_id = $("#patient_id").val();
                        var country_id = response.patient.country_id;
                        var state_id = response.patient.state_id;
                        var city_id = response.patient.city_id;
                        var barangay_id = response.patient.barangay_id;
                        var barangay = document.getElementById("edit_barangayDiv");

                        if (country == "174") {
                            barangay.style.display='block';
                            $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        } else {
                            barangay.style.display='none';
                            $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        }

                        $.ajax({
                            url: 'patient/getStateByCountryIdByJason?country=' + country + '&patient=' + patient_id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                $("#edit_state").find('option').remove();

                                var state = response.state;
                                var patient_country = response.patient.country_id;
                                var patient_state = response.patient.state_id;

                                $('#edit_state').append($('<option value="0" disabled><?php echo lang("state_province_placeholder"); ?></option>')).end();

                                $.each(state, function (key, value) {
                                    $('#edit_state').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (patient_state == null) {
                                    // document.getElementById('state').value='0';
                                    $("#edit_city").attr("disabled", true);
                                    $("#edit_state").val("0");
                                } else {
                                    // document.getElementById('state').value=state_id;
                                    $("#edit_city").attr("disabled", false);
                                    $("#edit_state").val(patient_state);
                                }

                                var stateval = $("#edit_state").val();

                                $.ajax({
                                    url: 'patient/getCityByStateIdByJason?state=' + stateval + '&patient=' + patient_id,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        // $("#edit_city").find('option').remove();

                                        var city = response.city;
                                        var patient_city = response.patient.city_id;

                                        $('#edit_city').append($('<option value="0" disabled><?php echo lang("city_municipality_placeholder"); ?></option>')).end();

                                        $.each(city, function (key, value) {
                                            $('#edit_city').append($('<option>').text(value.name).val(value.id)).end();
                                        });


                                        if (patient_city == null) {
                                            $("#edit_barangay").attr("disabled", true);
                                            $("#edit_city").val("0");
                                        } else {
                                            $("#edit_city").attr("disabled", false);
                                            $("#edit_city").val(patient_city);
                                        }

                                        var cityval = $("#edit_city").val();

                                        $.ajax({
                                            url: 'patient/getBarangayByCityIdByJason?city=' + cityval + '&patient=' + patient_id,
                                            method: 'GET',
                                            data: '',
                                            dataType: 'json',
                                            success: function (response) {
                                                var barangay = response.barangay;
                                                var patient_barangay = response.patient.barangay_id;

                                                $.each(barangay, function (key, value) {
                                                    $("#edit_barangay").append($('<option>').text(value.name).val(value.id)).end();
                                                });

                                                if (patient_barangay == null) {
                                                    $("#edit_barangay").val("0");
                                                } else {
                                                    $("#edit_barangay").attr("disabled", false);
                                                    $("#edit_barangay").val(patient_barangay);
                                                }
                                            }
                                        });
                                    }
                                });

                            }

                        });
                    }
                });
            });

            $("#edit_country").change(function () {
                var country = $("#edit_country").val();
                var barangay = document.getElementById("edit_barangayDiv");
                var patient = $("#patient_id").val();
                $("#edit_state").find('option').remove();
                $("#edit_city").find('option').remove();
                $("#edit_barangay").find('option').remove();

                if (country == "174") {
                    barangay.style.display='block';
                    $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                    $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                } else {
                    barangay.style.display='none';
                    $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                    $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                }

                if (country == null) {
                    $("#edit_state").attr("disabled", true);
                } else {
                    $("#edit_state").attr("disabled", false);
                }



                $.ajax({
                    url: 'patient/getStateByCountryIdByJason?country=' + country + '&patient=' + patient,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;

                        $('#edit_state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                        $.each(state, function (key, value) {
                            $('#edit_state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        $("#edit_city").attr("disabled", true);
                        $("#edit_barangay").attr("disabled", true);
                    }
                });
            });

            $("#edit_state").change(function () {
                var state = $("#edit_state").val();
                $("#edit_city").find('option').remove();

                $.ajax({
                    url: 'patient/getCityByStateIdByJason?state=' + state,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;

                        $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $.each(city, function (key, value) {
                            $('#edit_city').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        $("#edit_city").attr("disabled", false);

                    }
                });
            });

            $("#edit_city").change(function () {
                var city = $("#edit_city").val();
                $("#edit_barangay").find('option').remove();

                $.ajax({
                    url: 'patient/getBarangayByCityIdByJason?city=' + city,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;

                        $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        $.each(barangay, function (key, value) {
                            $('#edit_barangay').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        $("#edit_barangay").attr("disabled", false);
                    }
                });
            });
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
                placeholder: '<?php echo lang('select_doctor'); ?>',
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
            
        var uploadField = document.getElementById("document");

        uploadField.onchange = function() {
            if(this.files[0].size > 2e+6){
               not2();
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