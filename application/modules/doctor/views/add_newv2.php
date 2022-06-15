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
                                    <form role="form" id="doctorForm" action="doctor/addNew" class="clearfix" method="post" enctype="multipart/form-data">
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
                                                                }
                                                                elseif (!empty($doctors->country_id)) {
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
                                                                    if ($specialty->display_name == set_value('department')) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($doctor->specialties)) {
                                                                    if ($specialty->display_name == $doctor->specialties) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $specialty->display_name; ?> </option>
                                                                    <?php } ?>  -->
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
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('virtual_consultation_fee');?><span class="text-danger"> *</span></label>
                                                        <input type="number" name="virtual_consultation_fee" class="form-control" placeholder="Enter Digit without decimal" value="<?php
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
                                                        <input type="number" name="in_person_consultation_fee" class="form-control" placeholder="Enter Digit without decimal" value="<?php
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
                                                                <button id="save" class="btn btn-sm btn-success">Save</button>
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
    <script>
    $(function() {
        // init signaturepad
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
        });

        // get image data and put to hidden input field
        function getSignaturePad() {
            var imageData = signaturePad.toDataURL('image/png');
            // var output = document.getElementById("signature-result");
            // output.value = "";
            // for (i=0; i < imageData.length; i++) {
            //     output.value += imageData[i].charCodeAt(0).toString(2) + " ";
            // }
            $('#signature-result').val(imageData)
        }

        // form action
        $('#save').click(function() {
            getSignaturePad();
            return false; // set true to submits the form.
        });

        // action on click button clea
        $('#clear').click(function(e) {
            e.preventDefault();
            $("#signature-result").val('');
            signaturePad.clear();
        })
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
                // $('#doctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                var doctor_country = response.doctor.country_id;
                var doctor_id = $("#doctor_id").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                
                console.log('zxzxzxzx');
                if (doctor_country == null) {
                    $("#state").attr("disabled", false);
                } else {
                    $("#state").attr("disabled", true);
                }

                if (doctor_country == null) {
                    $('#doctorForm').find('[name="country_id"]').val("0").change()
                } else {
                    $('#doctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                }

                $.each(response.doctor_specialties, function(key, value) {
                    $('#specialtychoose').append($('<option selected>').text(value.display_name_ph).val(value.id)).end();
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

                        $("#state").find('option').remove();
                        $("#city").find('option').remove();
                        $("#barangay").find('option').remove();

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
        $("#country").change(function () {
            var country = $("#country").val();
            var doctor_id = $("#doctor_id").val();
            var doctor_country = "<?php echo $doctors->country_id; ?>";

            $("#state").find('option').remove();
            $("#city").find('option').remove();
            $("#barangay").find('option').remove();

            $('#state').attr("disabled", false);
            $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();

            $.ajax({
                url: 'doctor/getStateByCountryIdByJason?country=' + country + '&doctor=' + doctor_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var state = response.state;
                    var doctor_state = response.doctor.state_id;
                    var doctor_country = response.doctor.country_id;

                    // if (doctor_country == null) {
                    //     $("#state").attr("disabled", false);
                    // } else {
                    //     $("#state").attr("disabled", true);
                    // }

                    
                    $('#city').attr("disabled", true);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $('#barangay').attr("disabled", true);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(state, function (key, value) {
                        $('#state').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (doctor_state == null) {
                        $("#state").val("0");
                    } else {
                        $("#state").val(doctor_state);
                    }

                    if (doctor_country == country){
                        $("#state").val(doctor_state);
                        // $("#city").val(doctor_city);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#state").val("0");
                        $("#city").val("0");
                        $("#barangay").val("0");
                    }

                }
            });
        });

        $("#state").change(function () {
            var state = $("#state").val();
            var doctor_id = $("#doctor_id").val();

            $.ajax({
                url: 'doctor/getCityByStateIdByJason?state=' + state + '&doctor=' + doctor_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var city = response.city;
                    var doctor_city = response.doctor.city_id;
                    var doctor_state = response.doctor.state_id;

                    $("#city").find('option').remove();
                    $("#barangay").find('option').remove();

                    $('#city').attr("disabled", false);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                    $('#barangay').attr("disabled", true);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(city, function (key, value) {
                        $('#city').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (doctor_city == null) {
                        $("#city").val("0");
                    } else {
                        $("#city").val(doctor_city);
                    }

                    if (doctor_state == state){
                        $("#city").val(doctor_city);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#city").val("0");
                        $("#barangay").val("0");
                    }

                }
            });
        });

        $("#city").change(function () {
            var city = $("#city").val();
            var doctor_id = $("#doctor_id").val();

            $.ajax({
                url: 'doctor/getBarangayByCityIdByJason?city=' + city + '&doctor=' +doctor_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var barangay = response.barangay;
                    var doctor_barangay = response.doctor.barangay_id;
                    var doctor_city = response.doctor.city_id;

                    $("#barangay").find('option').remove();

                    $('#barangay').attr("disabled", false);
                    $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_placeholder"); ?></option>')).end();

                    $.each(barangay, function (key, value) {
                        $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                    });

                    if (doctor_barangay == null) {
                        $("#barangay").val("0");
                    } else {
                        $("#barangay").val(doctor_barangay);
                    }

                    if (doctor_city == city){
                        $("#barangay").val(doctor_barangay);
                        // $("#barangay").val(doctor_barangay);
                    } else {
                        $("#barangay").val("0");
                    }
                    console.log(response.barangay);
                }
            });
        });
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
                    url: 'settings/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;

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
                    url: 'settings/getCityByStateIdByJason?state=' + stateval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;

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
                    url: 'settings/getBarangayByCityIdByJason?city=' + cityval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;

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

    </body>
</html>