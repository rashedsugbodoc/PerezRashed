<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <section id="main-content">
                            <section class="wrapper site-min-height">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php
                                            if (!empty($doctor->id))
                                                echo lang('edit_doctor');
                                            else
                                                echo lang('add_doctor');
                                            ?>
                                        </div>
                                    </div>
                                    <form role="form" id="doctorForm" action="doctor/addNew" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="btnLoading('doctorForm');">
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
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('professional_display_name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="professional_display_name" placeholder="example: John Garcia, MD" class="form-control" value=
                                                        "<?php
                                                            if (!empty($setval)) {
                                                                echo set_value('professional_display_name');
                                                            }
                                                            elseif (!empty($doctor->professional_display_name)) {
                                                                echo $doctor->professional_display_name;
                                                            }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('first_name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="f_name" placeholder="First Name" maxlength="100" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('f_name');
                                                        }
                                                        elseif (!empty($doctor->firstname)) {
                                                            echo $doctor->firstname;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('middle_name'); ?></label>
                                                        <input type="text" class="form-control" name="m_name" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('m_name');
                                                        }
                                                        elseif (!empty($doctor->middlename)) {
                                                            echo $doctor->middlename;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('last_name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" name="l_name" placeholder="Last Name" maxlength="100" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('l_name');
                                                        }
                                                        elseif (!empty($doctor->lastname)) {
                                                            echo $doctor->lastname;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('suffix'); ?></label>
                                                        <div class="input-group-append br-tl-0 br-bl-0">
                                                            <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
                                                                <option value="0" ><?php echo lang('none'); ?></option>
                                                                <option value="Jr." <?php if(set_value('suffix')=='Jr.') { echo 'selected';} elseif ($doctor->suffix ==='Jr.') { echo 'selected'; } ?>><?php echo lang('jr'); ?></option>
                                                                <option value="Sr." <?php if(set_value('suffix')=='Sr.') { echo 'selected';} elseif ($doctor->suffix ==='Sr.') { echo 'selected'; } ?>><?php echo lang('sr'); ?></option>
                                                                <option value="I" <?php if(set_value('suffix')=='I') { echo 'selected';} elseif ($doctor->suffix ==='I') { echo 'selected'; } ?>><?php echo lang('i'); ?></option>
                                                                <option value="II" <?php if(set_value('suffix')=='II') { echo 'selected';} elseif ($doctor->suffix ==='II') { echo 'selected'; } ?>><?php echo lang('ii'); ?></option>
                                                                <option value="III" <?php if(set_value('suffix')=='III') { echo 'selected';} elseif ($doctor->suffix ==='III') { echo 'selected'; } ?>><?php echo lang('iii'); ?></option>
                                                                <option value="IV" <?php if(set_value('suffix')=='IV') { echo 'selected';} elseif ($doctor->suffix ==='IV') { echo 'selected'; } ?>><?php echo lang('iv'); ?></option>
                                                                <option value="V" <?php if(set_value('suffix')=='V') { echo 'selected';} elseif ($doctor->suffix ==='V') { echo 'selected'; } ?>><?php echo lang('v'); ?></option>
                                                                <option value="VI" <?php if(set_value('suffix')=='VI') { echo 'selected';} elseif ($doctor->suffix ==='VI') { echo 'selected'; } ?>><?php echo lang('vi'); ?></option>
                                                                <option value="VII" <?php if(set_value('suffix')=='VII') { echo 'selected';} elseif ($doctor->suffix ==='VII') { echo 'selected'; } ?>><?php echo lang('vii'); ?></option>
                                                                <option value="VIII" <?php if(set_value('suffix')=='VIII') { echo 'selected';} elseif ($doctor->suffix ==='VIII') { echo 'selected'; } ?>><?php echo lang('viii'); ?></option>
                                                                <option value="IX" <?php if(set_value('suffix')=='IX') { echo 'selected';} elseif ($doctor->suffix ==='IX') { echo 'selected'; } ?>><?php echo lang('ix'); ?></option>
                                                                <option value="X" <?php if(set_value('suffix')=='X') { echo 'selected';} elseif ($doctor->suffix ==='X') { echo 'selected'; } ?>><?php echo lang('x'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('email'); ?> <span class="text-red">*</span></label>
                                                        <input type="email" name="email" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('email');
                                                        }
                                                        elseif (!empty($doctor->email)) {
                                                            echo $doctor->email;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('mobile_number'); ?> <span class="text-red">*</span></label>
                                                        
                                                        <input id="mobile" name="mobile" class="form-control" type="tel" required value= 
                                                            "<?php
                                                                if (!empty($setval)) {
                                                                    echo set_value('phone');
                                                                } elseif (!empty($doctor->phone)) {
                                                                    echo $doctor->phone;
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
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('street_address'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="address" placeholder="<?php echo lang('street_address_placeholder');?>" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('address');
                                                        }
                                                        elseif (!empty($doctor->address)) {
                                                            echo $doctor->address;
                                                        }
                                                        ?>" required>
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
                                                                if (!empty($setval)) {
                                                                    if ($country->id == set_value('country_id')) {
                                                                        echo 'selected';
                                                                    }
                                                                } elseif (!empty($doctor->country_id)) {
                                                                    if ($country->id == $doctor->country_id) {
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
                                                        <select class="form-control select2-show-search" name="state_id" id="state" value='' disabled required>
                                                            <option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>
                                                        </select>    
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('city_municipality'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="city_id" id="city" value='' disabled required>
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
                                                        elseif (!empty($doctor->postal)) {
                                                            echo $doctor->postal;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><?php echo lang('specialization'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="specialization[]" id="specialtychoose" multiple="multiple" required>
                                                            <!-- <?php foreach ($specialties as $specialty) { ?>
                                                                <option value="<?php echo $specialty->display_name; ?>" <?php
                                                                if (!empty($setval)) {
                                                                    if ($specialty->display_name == set_value('specialization')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($doctor->specialties)) {
                                                                    if ($specialty->display_name == $doctor->specialties) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $specialty->display_name; ?> </option>
                                                                    <?php } ?> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('license'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="license" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('license');
                                                        }
                                                        elseif (!empty($doctor->license)) {
                                                            echo $doctor->license;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('tin'); ?></label>
                                                        <input type="text" name="tin" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('tin');
                                                        }
                                                        elseif (!empty($doctor->tax_number)) {
                                                            echo $doctor->tax_number;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('ptr'); ?></label>
                                                        <input type="text" name="ptr" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('ptr');
                                                        }
                                                        elseif (!empty($doctor->tax_receipt_number)) {
                                                            echo $doctor->tax_receipt_number;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('s2'); ?></label>
                                                        <input type="text" name="s2" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('s2');
                                                        }
                                                        elseif (!empty($doctor->secondary_license_number)) {
                                                            echo $doctor->secondary_license_number;
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
													<div class="form-label">PhilHealth</div>
													<div class="custom-controls-stacked">
														<label class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" name="is_philhealth_accredited" id="is_philhealth_accredited" value="option1" <?php echo $doctor->accreditation_number ? "checked" : ""; ?>>
															<span class="custom-control-label">PhilHealth Accredited?</span>
														</label>
													</div>
												</div>          
                                            </div>
                                            <div class="row" id="philhealth_accredited">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('virtual_consultation_fee');?><span class="text-danger"> *</span></label>
                                                        <input type="number" name="virtual_consultation_fee" class="form-control" placeholder="Enter Digit without decimal" min="0" oninput="validity.valid||(value='');" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('virtual_consultation_fee');
                                                        }
                                                        elseif (!empty($doctor->virtual_consultation_fee)) {
                                                            echo $doctor->virtual_consultation_fee;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('in_person_consultation_fee');?><span class="text-danger"> *</span></label>
                                                        <input type="number" name="in_person_consultation_fee" class="form-control" placeholder="Enter Digit without decimal" min="0" oninput="validity.valid||(value='');" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('in_person_consultation_fee');
                                                        }
                                                        elseif (!empty($doctor->physical_consultation_fee)) {
                                                            echo $doctor->physical_consultation_fee;
                                                        }
                                                        ?>"
                                                        required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('signature');?> <span class="text-red">*</span></label>
                                                                <canvas id="signature-pad" class="signature-pad border border-dark" width=300 height=200 required></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <button id="clear" class="btn btn-sm btn-secondary">Clear</button>
                                                                <?php if(!empty($signature->signature)){ ?>
                                                                    <button id="confirm" class="btn btn-sm btn-success">Confirm</button>
                                                                    <button id="save" class="btn btn-sm btn-success d-none" hidden>Save</button>
                                                                    <p id="message" class="mt-1"></p>
                                                                <?php } else { ?>
                                                                    <button id="confirm" class="btn btn-sm btn-success d-none" hidden>Confirm</button>
                                                                    <button id="save" class="btn btn-sm btn-success">Save</button>
                                                                    <p id="message" class="mt-1"></p>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <textarea id='signature-result' class="form-control" name="signature-result" hidden required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <label class="form-label"><?php echo lang('profile_picture'); ?>:<span class="text-red"> *</span></label>
                                                    <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                    <input type="file" name="img_url" id="img" class="dropify" data-default-file="<?php if(!empty($doctor->img_url)) echo $doctor->img_url; ?>"/>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="doctor_id" value='<?php
                                            if (!empty($doctor->id)) {
                                                echo $doctor->id;
                                            }
                                            ?>'>
                                            <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </section>

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
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->
    <script src="<?php echo base_url('public/assets/plugins/signature/signature_plugin.min.js'); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var setval = "<?php echo $setval ?>";
            var country = "<?php echo set_value('country_id') ?>";
            var state = "<?php echo set_value('state_id') ?>";
            var city = "<?php echo set_value('city_id') ?>";
            var barangay = "<?php echo set_value('barangay_id') ?>";
            
            if (setval != "") {
                $.ajax({
                    url: 'doctor/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var result_state = response.state;
                        if (country != null) {
                            $("#state").attr("disabled", false);
                        } else {
                            $("#state").attr("disabled", true);
                        }

                        $.each(result_state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        if (state == null) {
                            $('#state').val("0");
                        } else {
                            $('#state').val(state);
                            $('#state').attr("disabled", false);
                        }


                        $.ajax({
                            url: 'doctor/getCityByStateIdByJason?state=' + state,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                var result_city = response.city;
                                if (state != null) {
                                    $("#city").attr("disabled", false);
                                } else {
                                    $("#city").attr("disabled", true);
                                }

                                $.each(result_city, function (key, value) {
                                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (city == null) {
                                    $('#city').val("0");
                                } else {
                                    $('#city').val(city);
                                    $('#city').attr("disabled", false);
                                }

                                $.ajax({
                                    url: 'doctor/getBarangayByCityIdByJason?city=' + city,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        var result_barangay = response.barangay;
                                        if (city != null) {
                                            $("#barangay").attr("disabled", false);
                                        } else {
                                            $("#barangay").attr("disabled", true);
                                        }

                                        $.each(result_barangay, function (key, value) {
                                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                        });

                                        if (barangay == null) {
                                            $('#barangay').val("0");
                                        } else {
                                            $('#barangay').val(barangay);
                                            $('#barangay').attr("disabled", false);
                                        }
                                    }
                                })
                            }
                        })
                    }
                });
            }
        })
    </script>
    <script>
    $(function() {
        // init signaturepad
        const defaultValueOfEmptyDataEncoded = 'EJAAAMAsH';
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
        });

        // get image data and put to hidden input field
        function getSignaturePad() { 
            var imageData = signaturePad.toDataURL('image/png',
            { ratio: 1, width: 400, height: 200, xOffset: 100, yOffset: 50 }); // fixed size on signature view
            // var output = document.getElementById("signature-result");
            // output.value = "";
            // for (i=0; i < imageData.length; i++) {
            //     output.value += imageData[i].charCodeAt(0).toString(2) + " ";
            // }
            $('#signature-result').val(imageData)
            var showMessageSaved =  document.getElementById('message');
            const data = {
                encoded: imageData,
            }
            window.sessionStorage.setItem('b64', JSON.stringify(data));
            var getTheData = data.encoded;
            var valueOfEncodedImageData = getTheData.split(1)[1];
            var getTheCertainValueOfTheImageData = valueOfEncodedImageData.slice(1,10);  
            if(signaturePad.isEmpty() || getTheCertainValueOfTheImageData === defaultValueOfEmptyDataEncoded){
                showMessageSaved.innerText = 'Please add a Signature';
                showMessageSaved.style.color = '#df4759';
            } else {
                showMessageSaved.innerText = 'Signature was Saved';
                showMessageSaved.style.color ='#42ba96';
            }
        }

        function fromSignaturePad() {
            var imageData = signaturePad.fromDataURL('<?php echo $signature->signature; ?>',
            { ratio: 0, width: 300, height: 200, xOffset: 100, yOffset: 50 }); // fixed size on signature view
            $('#signature-result').val(imageData)
        }
        
        function isSetVal(){
            var setvalue = '<?php echo $setval ?>' //contains tha setval from the controller

            if(setvalue.length == 0){ // if the setval is not present
                if(signaturePad.isEmpty()){
                    fromSignaturePad();
                }
            }
        } isSetVal(); //callback

        // form action
        $('#save').click(function() {
            getSignaturePad();
            return false; // set true to submits the form.
            
        });

        $('#confirm').click(function() {
            getSignaturePad();
            return false;
        });

        // action on click button clear
        $('#clear').click(function(e) {
            e.preventDefault();
            $("#signature-result").val('');
            var signatureMessage = document.getElementById('message');
            signatureMessage.innerText = ' ';
            signaturePad.clear();
            window.sessionStorage.removeItem('b64');
        })

        function saveSigState(){
            var b64data = JSON.parse(window.sessionStorage.getItem('b64'));
            const imageData = signaturePad.fromDataURL(`${b64data.encoded}`,
            { ratio: 0, width: 300, height: 200, xOffset: 100, yOffset: 50 }); // fixed size on signature view
            $('#signature-result').val(imageData)
        } saveSigState();

        
    });
    </script>
    <script type="text/javascript">
        var country = $("#country").val();
        var iid = $("#doctor_id").val();

        $.ajax({
            url: 'doctor/editDoctorByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                var doctor_country = response.doctor.country_id;
                var doctor_id = $("#doctor_id").val();
                var barangay = document.getElementById("barangayDiv");
                console.log('Edit Doctor Country');

                $("#state").find('option').remove();
                $("#city").find('option').remove();
                $("#barangay").find('option').remove();
                
                if (doctor_country == null) {
                    $("#state").attr("disabled", false);
                } else {
                    $("#state").attr("disabled", true);
                }

                $.each(response.doctor_specialties, function(key, value) {
                    $('#specialtychoose').append($('<option selected>').text(value.display_name_ph).val(value.id)).end();
                });

                if (doctor_country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'doctor/getStateByCountryIdByJason?country=' + doctor_country + '&doctor=' + doctor_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;
                        var doctor_state = response.doctor.state_id;
                        var doctor_country = response.doctor.country_id;

                        console.log('Edit Doctor - Load State of Country');

                        $('#state').append($('<option value="0" disabled><?php echo lang("state_province_placeholder"); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        if (doctor_country == null) {
                            $('#state').val("0");
                            $('#state').attr("disabled", true);
                        } else {
                            $('#state').attr("disabled", false);
                        }

                        if (doctor_state == null) {
                            $('#state').val("0");
                        } else {
                            $('#state').val(doctor_state);
                            $('#state').attr("disabled", false);
                        }

                        var stateval = $('#state').val();

                        $.ajax({
                            url: 'doctor/getCityByStateIdByJason?state=' + stateval + '&doctor=' + doctor_id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                var city = response.city;
                                var doctor_city = response.doctor.city_id;
                                var doctor_state = response.doctor.state_id;

                                console.log('Edit Doctor - Load City of State');

                                $('#city').append($('<option value="0" disabled><?php echo lang("city_municipality_placeholder"); ?></option>')).end();

                                $.each(city, function (key, value) {
                                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (doctor_state == null) {
                                    $('#city').val("0");
                                    $('#city').attr("disabled", true);
                                } else {
                                    $('#city').attr("disabled", false);
                                }

                                if (doctor_city == null) {
                                    $('#city').val("0");
                                } else {
                                    $('#city').val(doctor_city);
                                    $('#city').attr("disabled", false);
                                }

                                var cityval = $('#city').val();

                                $.ajax({
                                    url: 'doctor/getBarangayByCityIdByJason?city=' + cityval + '&doctor=' + doctor_id,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        var barangay = response.barangay;
                                        var doctor_barangay = response.doctor.barangay_id;
                                        var doctor_city = response.doctor.city_id;

                                        console.log('Edit Doctor - Load Barangay of City');

                                        $('#barangay').append($('<option value="0" disabled><?php echo lang("barangay_placeholder"); ?></option>')).end();

                                        $.each(barangay, function (key, value) {
                                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                        });

                                        if (doctor_city == null) {
                                            $('#barangay').val("0");
                                            $('#barangay').attr("disabled", true);
                                        } else {
                                            $('#barangay').attr("disabled", false);
                                        }

                                        if(doctor_barangay == null) {
                                            $('#barangay').val("0");
                                        } else {
                                            $('#barangay').val(doctor_barangay);
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

        $(document).ready(function () {
            $("#country").change(function () {
                var country = $("#country").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").attr("disabled", false);

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'doctor/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {

                        $("#state").find('option').remove();
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        var state = response.state;

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
                    url: 'doctor/getCityByStateIdByJason?state=' + stateval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {

                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

                        var city = response.city;

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
                    url: 'doctor/getBarangayByCityIdByJason?city=' + cityval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        $("#barangay").find('option').remove();

                        var barangay = response.barangay;

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

    <script type="text/javascript">
        $(document).ready(function () {
            $("#specialtychoose").select2({
                placeholder: '<?php echo lang('select_specialty'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getSpecialtyinfo',
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
    <script>
        $('#doctorForm').parsley();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var input = document.querySelector("#mobile");
            var errorMsg = document.querySelector("#error-msg");
            var validMsg = document.querySelector("#valid-msg");
            var form = document.getElementById("doctorForm");

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
        function accreNumberSetVal(){
            if('<?php echo $setval ?>'){
                var setval = '<?php echo set_value('accreditation_number'); ?>';
            } else if('<?php echo $doctor->accreditation_number ?>'){
                var setval = '<?php echo $doctor->accreditation_number; ?>';
            } else {
                var setval = '';
            }
            return setval; //return the value of setval
        }
        function isPhilHealtAccredited() {
            document.getElementById("philhealth_accredited").innerHTML += 
              '<div class="col-md-12 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('accreditation_number'); ?></label>\n\
                        <input type="text" name="accreditation_number" class="form-control" value="'+ accreNumberSetVal() +'">\n\
                    </div>\n\
                </div>';
        }
        function isNotPhilHealtAccredited() {
            document.getElementById("philhealth_accredited").innerHTML =
              ""; // return empty value
        }

        function validate() {
            if (document.getElementById('is_philhealth_accredited').checked) {
                isPhilHealtAccredited();
            } else {
                isNotPhilHealtAccredited();
            }
        } 
        document.getElementById('is_philhealth_accredited').addEventListener('change', validate);
        $(document).ready(function(){
            $('.card input[type="checkbox"]:checked').each(function(){
                $("#philhealth_accredited").append("<div class=\"col-md-12 col-sm-12\">\n\
                    <div class=\"form-group\">\n\
                        <label class=\"form-label\"><?php echo lang('accreditation_number'); ?></label>\n\
                        <input type=\"text\" name=\"accreditation_number\" class=\"form-control\" value=\""+ accreNumberSetVal() +"\">\n\
                    </div>\n\
                </div>");
            });
        });
        
    </script>

    </body>
</html>