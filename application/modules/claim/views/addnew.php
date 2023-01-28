<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <?php
                        // $serverDateTime = "";
                        // //$isPosted = !empty(filter_input(INPUT_POST, 'submit'));
                        // if (isset($_POST['submit'])) {
                        //     try {
                        //         //The following are needed since PECWS is deployed through https or SSL using self-signed certificate
                        //         $context = stream_context_create([
                        //             'ssl' => [
                        //                 // set some SSL/TLS specific options
                        //                 'verify_peer' => false,
                        //                 'verify_peer_name' => false,
                        //                 'allow_self_signed' => true,
                        //                 'user_agent' => 'PHPSoapClient',
                        //                 'cache_wsdl' => WSDL_CACHE_NONE
                        //             ]
                        //         ]);
                        //         // $pecwsWsdlUrl = 'https://eclaimstest2.philhealth.gov.ph:8077/SOAP';
                        //         $pecwsWsdlUrl = 'PECWS.wsdl';

                        //         $client = new SoapClient($pecwsWsdlUrl, ['stream_context' => $context]);
                        //         $serverDateTime = $client->GetServerDateTime();
                        //     } catch (SoapFault $fault) {
                        //         die($fault->faultstring);
                        //     }
                        // }
                        ?>
                        <section id="main-content">
                            <section class="wrapper site-min-height">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php
                                            // if (!empty($doctor->id))
                                            //     echo lang('edit_doctor');
                                            // else
                                            //     echo lang('add_doctor');

                                            echo lang('check_eligibility');
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <!-- Server Date/Time: <b><?php //echo $server_date_time; ?></b> <br/>
                                    Claim result encrypted: <b><?php //echo htmlentities($encryptedOutput); ?></b> <br/>
                                    Claim result decrypted: <b><?php //echo htmlentities($decrypted_output); ?></b> <br/>
                                    Claim result json array:  -->
                                    <!-- <b> -->
                                        <?php
                                        // echo '<pre>';
                                        //     echo print_r($eclaims_array['@attributes']['ISOK']);
                                        // echo '</pre>';
                                         
                                         ?>

                                         <?php
                                            //if ($eclaims_array['@attributes']['ISOK'] === 'YES'){
                                         ?>
                                            <!-- <div class="col-sm-6 col-md-6">
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Eclaim Approved</strong>
                                                    <hr class="message-inner-separator">
                                                    <p>This patient is eligible to PhilHealth Eclaims.</p>
                                                </div>
                                            </div> -->
                                         <?php       
                                            // }
                                         ?>
                                    <!-- </b> <br/> -->     
                                    <form role="form" name="eligibilityForm" id="eligibilityForm" action="" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                        <?php echo $soaperror->detail->PhilhealthException->CODE === '306' ? 
                                        '<div class="row"><div class="col-md-12"><div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-frown-o mr-2" aria-hidden="true"></i>'. $soaperror->detail->PhilhealthException->MESSAGE .'</div></div></div>' 
                                        : null; ?>

                                        <?php echo $eclaims_array['@attributes']['ISOK'] === 'NO' ? 
                                        '<div class="row"><div class="col-md-12"><div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-frown-o mr-2" aria-hidden="true"></i>'. lang('not_eligible') .'</div></div></div>'
                                        : null ?>
                                            <?php echo validation_errors(); ?>
                                            <?php
                                                $file_error = $this->session->flashdata('fileError');

                                                if(!empty($file_error)) {
                                                    echo $file_error;
                                                }else{

                                                }
                                            ?>
                                            <!-- start add mamber -->
                                            <div class="col-lg-12">
                                                <div class="expanel expanel-default">
                                                    <div class="expanel-heading">
                                                        <h3 class="expanel-title">Part I</h3>
                                                    </div>
                                                    <div class="expanel-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo lang('select').' '.lang('patient'); ?></label>
                                                                    <select class="select2-show-search form-control pos_select" id="pos_select" <?php if(!empty($encounter->patient_id)) { echo "disabled"; } ?> required>
                                                                        <option value="selectcard"><?php echo lang('please').' '.lang('select').' '.'a'.' '.lang('member') ?></option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <button type="button" onclick="fun()">test select</button> -->
                                                        <!-- end add member -->
                                                        <!-- start add member pin -->
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group" hidden>
                                                                    <label><?php echo lang('patient_id'); ?> <span class="text-red">*</span></label>
                                                                    <!-- <input type="text" name="professional_display_name" placeholder="example: John Garcia, MD" class="form-control" value=
                                                                    "<?php
                                                                        // if (!empty($setval)) {
                                                                        //     echo set_value('professional_display_name');
                                                                        // }
                                                                        // elseif (!empty($doctor->professional_display_name)) {
                                                                        //     echo $doctor->professional_display_name;
                                                                        // }

                                                                        // echo $patients->national_healthcare_id;
                                                                    ?>" required> -->
                                                                    <input type="text" class="form-control" id="patient_id" name="patient_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label><?php echo lang('philhealth_identification_number_pin').' '.lang('of').' '.strtolower(lang('the')).' '.lang('patient'); ?> <span class="text-red">*</span></label>
                                                                    <!-- <input type="text" name="professional_display_name" placeholder="example: John Garcia, MD" class="form-control" value=
                                                                    "<?php
                                                                        // if (!empty($setval)) {
                                                                        //     echo set_value('professional_display_name');
                                                                        // }
                                                                        // elseif (!empty($doctor->professional_display_name)) {
                                                                        //     echo $doctor->professional_display_name;
                                                                        // }

                                                                        // echo $patients->national_healthcare_id;
                                                                    ?>" required> -->
                                                                    <input type="text" class="form-control" id="p_pin" name="p_pin" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end add member pin -->
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo lang('first_name'); ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="p_first_name" name="p_first_name" placeholder="First Name" maxlength="100" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('f_name');
                                                                    // }
                                                                    // elseif (!empty($doctor->firstname)) {
                                                                    //     echo $doctor->firstname;
                                                                    // }
                                                                    ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm12">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo lang('middle_name'); ?></label>
                                                                    <input type="text" class="form-control" id="p_middle_name" name="p_middle_name" placeholder="Middle Name" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('m_name');
                                                                    // }
                                                                    // elseif (!empty($doctor->middlename)) {
                                                                    //     echo $doctor->middlename;
                                                                    // }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo lang('last_name'); ?> <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" id="p_last_name" name="p_last_name" placeholder="Last Name" maxlength="100" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('l_name');
                                                                    // }
                                                                    // elseif (!empty($doctor->lastname)) {
                                                                    //     echo $doctor->lastname;
                                                                    // }
                                                                    ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo lang('suffix'); ?></label>
                                                                    <input type="text" class="form-control" id="p_suffix" name="p_suffix" placeholder="Suffix" maxlength="100" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('l_name');
                                                                    // }
                                                                    // elseif (!empty($doctor->lastname)) {
                                                                    //     echo $doctor->lastname;
                                                                    // }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label><?php echo lang('birth_date'); ?> <span class="text-red">*</span></label>
                                                                    <!-- <input type="date" id="p_birthdate" name="p_birthdate" data-placeholder="yyyy-dd-mm" class="form-control" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('email');
                                                                    // }
                                                                    // elseif (!empty($doctor->email)) {
                                                                    //     echo $doctor->email;
                                                                    // }
                                                                    ?>" required> -->
                                                                    <input class="form-control flatpickr" placeholder="<?php echo lang('select').' '. lang('date');?>" id="p_birthdate" name="p_birthdate" type="text" maxlength="100" required value="<?php  ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo lang('address'); ?></label>
                                                                    
                                                                    <input id="p_address" name="p_address" class="form-control" value= 
                                                                        "<?php
                                                                            // if (!empty($setval)) {
                                                                            //     echo set_value('phone');
                                                                            // } elseif (!empty($doctor->phone)) {
                                                                            //     echo $doctor->phone;
                                                                            // } else {
                                                                            //     echo '';
                                                                            // }
                                                                        ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label><?php echo lang('zip_code'); ?> </label>
                                                                    <input type="text" id="p_zipcode" name="p_zipcode" placeholder="<?php echo lang('zip_code');?>" class="form-control" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('address');
                                                                    // }
                                                                    // elseif (!empty($doctor->address)) {
                                                                    //     echo $doctor->address;
                                                                    // }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label><?php echo lang('gender'); ?> <span class="text-red">*</span></label>
                                                                    <select class="form-control select2" name="p_sex" id="p_sex" data-placeholder="Choose one" required>
                                                                        <option value="M"><?php echo lang('male'); ?></option>
                                                                        <option value="F"><?php echo lang('female'); ?></option>
                                                                        <option value=" "> <?php echo lang('other'); ?> </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label><?php echo lang('select').' '.lang('encounter'); ?></label>
                                                                    <select class="form-control select2-show-search" id="p_encounter" name="p_encounter" placeholder="<?php echo lang('select').' '.lang('encounter');?>" class="form-control">
                                                                        <option value=""><?php echo lang('please').' '.lang('select').' '.lang('encounter') ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label><?php echo lang('admission').' '.lang('date'); ?> <span class="text-red">*</span></label>
                                                                    <input class="form-control flatpickr" type="text" id="p_admission" name="p_admission" placeholder="<?php echo lang('admission').' '.lang('date');?>" class="form-control" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('address');
                                                                    // }
                                                                    // elseif (!empty($doctor->address)) {
                                                                    //     echo $doctor->address;
                                                                    // }
                                                                    ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label><?php echo lang('discharge').' '.lang('date'); ?></label>
                                                                    <input class="form-control flatpickr" type="text" id="p_discharge" name="p_discharge" placeholder="<?php echo lang('discharge').' '.lang('date');?>" class="form-control" value="<?php
                                                                    // if (!empty($setval)) {
                                                                    //     echo set_value('address');
                                                                    // }
                                                                    // elseif (!empty($doctor->address)) {
                                                                    //     echo $doctor->address;
                                                                    // }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="expanel expanel-default" id="mem_type" hidden>
                                                    <div class="expanel-heading">
                                                        <h3 class="expanel-title">Part II</h3>
                                                    </div>
                                                    <div class="expanel-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"><?php echo lang('patient_is_the_member'); ?> <span class="text-red">*</span></label>
                                                                    <div class="custom-controls-stacked d-flex">
                                                                        <label class="custom-control custom-radio">
                                                                            <input type="radio" class="rad custom-control-input" name="member" id="is_member" value="M">
                                                                            <span class="custom-control-label"><?php echo lang('yes'); ?></span>
                                                                        </label>
                                                                        <label class="custom-control custom-radio ml-2">
                                                                            <input type="radio" class="rad custom-control-input" name="member" id="is_not_member" value=" ">
                                                                            <span class="custom-control-label"><?php echo lang('no'); ?></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="row" id="type_member">
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="sbmt">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary pull-right" id="submit" type="submit" name="submit"><?php echo lang('check_eligibility'); ?></button>
                                                        </div>
                                                    </div>     
                                                </div>
                                                <div id="status_container">
                                                    <!-- append status here -->
                                                </div>
                                                <?php
                                                    // echo '<pre>';
                                                    //     print_r($soaperror);
                                                    // // echo '<br>';
                                                    // //     print_r($soaperror->detail->PhilhealthException->MESSAGE);
                                                    // echo '</pre>';

                                                    // echo $memtype;

                                                    // echo '<pre>';
                                                    //     print_r($eclaims_array);
                                                    // echo '<pre>';
                                                ?>
                                            </div>  
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </section>
                    <!-- </div>
                </div>
            </div> -->

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

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->
    <script src="<?php echo base_url('public/assets/plugins/signature/signature_plugin.min.js'); ?>"></script>

    <script>
        function validate(){
            $('#eligibilityForm').parsley();
        }
    </script>
    <script>
        function flatPicker (){
            flatpickr(".flatpickr", {
                    altInput: true,
                    altFormat: "m-d-Y",
                    maxDate: "today",
                    disableMobile: true
            });
        }
    </script>
    
    <!-- <script type="text/javascript">
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
    </script> -->
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
    <!-- <script type="text/javascript">
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
    </script> -->

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
    <script>
        function enableParsley(){

        }
        // $(document).ready(function(){
            $('#eligibilityForm').parsley();   
            // console.log($('#eligibilityForm').parsley()); 
        // });
    </script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //     var input = document.querySelector("#mobile");
        //     var errorMsg = document.querySelector("#error-msg");
        //     var validMsg = document.querySelector("#valid-msg");
        //     var form = document.getElementById("doctorForm");

        //     // here, the index maps to the error code returned from getValidationError - see readme
        //     var errorMap = ["Invalid mobile number", "Invalid country code", "Too short", "Too long", "Invalid mobile number", "Invalid length"];

        //     // initialise plugin
        //     var iti = window.intlTelInput(input, {
        //         hiddenInput: "full_number",
        //         preferredCountries: ['ph', 'sg', 'us'],
        //         utilsScript: "<?php echo base_url('common/assets/intl-tel-input/build/js/utils.js?1638200991544');?>"
        //     });

        //     var reset = function() {
        //       input.classList.remove("parsley-error");
        //       input.classList.remove("is-valid");
        //       errorMsg.innerHTML = "";
        //       errorMsg.classList.add("hide");
        //       validMsg.classList.add("hide");
        //     };

        //     var execute = function() {
        //       reset();
        //       document.getElementById("phone").value = iti.getNumber();
        //       if (input.value.trim()) {
        //         if (iti.isValidNumber()) {
        //           validMsg.classList.remove("hide");
        //           input.classList.add("is-valid");
        //         } else {
        //           input.classList.add("parsley-error");
        //           input.classList.remove("is-valid");
        //           var errorCode = iti.getValidationError();
        //           errorMsg.innerHTML = errorMap[errorCode];
        //           errorMsg.classList.remove("hide");
        //         }
        //       }
        //     };
        //     // on blur: validate
        //     input.addEventListener('blur', execute);
        //     form.addEventListener('submit', execute);

        //     // on keyup / change flag: reset
        //     input.addEventListener('change', reset);
        //     input.addEventListener('keyup', reset);
        // });
    </script>

    <script>
        // function appendPartTwo(){
        //     document.getElementById("mem_type").innerHTML +=
        //     '<div class="col-sm-12 col-md-12">\n\
        //         <div class="form-group">\n\
        //             <label class="form-label"><?php echo lang('patient_is_the_member'); ?> <span class="text-red">*</span></label>\n\
        //             <div class="custom-controls-stacked d-flex">\n\
        //                 <label class="custom-control custom-radio">\n\
        //                     <input type="radio" class="rad custom-control-input" name="example-radios" id="is_member" value="M">\n\
        //                     <span class="custom-control-label"><?php echo lang('yes'); ?></span>\n\
        //                 </label>\n\
        //                 <label class="custom-control custom-radio ml-2">\n\
        //                     <input type="radio" class="rad custom-control-input" name="example-radios" id="is_not_member" value="option2">\n\
        //                     <span class="custom-control-label"><?php echo lang('no'); ?></span>\n\
        //                 </label>\n\
        //             </div>\n\
        //             <div class="row" id="type_member">\n\
        //                 <!-- rendered elements here -->\n\
        //             </div>\n\
        //         </div>\n\
        //     </div>';
        //     appendItems();
        // }
    </script>

    <script>
        function changePatientSelectionClass() {
            document.getElementById("mem_type").removeAttribute("hidden");
            
            const pin = document.getElementById("p_pin");
            const fname = document.getElementById("p_first_name");
            const mname = document.getElementById("p_middle_name");
            const lname = document.getElementById("p_last_name");
            const suf = document.getElementById("p_suffix");
            const bdate = document.getElementById("p_birthdate");
            const addrr = document.getElementById("p_address");
            const zipc = document.getElementById("p_zipcode");

            switch (true) {
                    case pin.value != 0:
                        document.getElementById("p_pin")
                        .setAttribute("readonly", "");
                        break;
                    default:
                        document.getElementById("p_pin")
                        .removeAttribute("readonly");
            }
            switch (true){
                    case fname.value != 0:
                            document.getElementById("p_first_name")
                            .setAttribute("readonly", "");
                            break;
                    default:
                            document.getElementById("p_first_name")
                            .removeAttribute("readonly");
            }
            switch (true){
                    case mname.value != 0:
                            document.getElementById("p_middle_name")
                            .setAttribute("readonly", "");
                            break;
                    default:
                            document.getElementById("p_middle_name")
                            .removeAttribute("readonly");
            }
            switch (true){
                    case lname.value != 0:
                            document.getElementById("p_last_name")
                            .setAttribute("readonly", "");
                            break;
                    default:
                            document.getElementById("p_last_name")
                            .removeAttribute("readonly");
            }
            switch (true){
                    case suf.value != 0:
                            document.getElementById("p_suffix")
                            .setAttribute("readonly", "");
                            break;
                    default:
                            document.getElementById("p_suffix")
                            .removeAttribute("readonly");
            }
            switch (true){
                    case bdate.value != 0:
                            document.getElementById("p_birthdate")
                            .setAttribute("readonly", "");
                            break;
                    default:
                            document.getElementById("p_birthdate")
                            .removeAttribute("readonly");
            }
            switch (true){
                    case addrr.value != 0:
                            document.getElementById("p_address")
                            .setAttribute("readonly", "");
                            break;
                    default:
                            document.getElementById("p_address")
                            .removeAttribute("readonly");
            }
            switch (true){
                    case zipc.value != 0:
                            document.getElementById("p_zipcode")
                            .setAttribute("readonly", "");
                            break;
                    default:
                            document.getElementById("p_zipcode")
                            .removeAttribute("readonly");
            }

        }

        function patientSelectionIdentifyer(){
            var selector = document.getElementById("pos_select");
            var selectedValue = selector.options[selector.selectedIndex].value;
            if (selectedValue == "selectcard"){
                console.log("No option selected");
            } else {
                changePatientSelectionClass();
            }
        }

    </script>

    <script>
        $('#submit').on('click',function(e){
            document.getElementById("submit").setAttribute('class', 'btn btn-primary btn-loading pull-right');
            // $(this).parsley();
            e.preventDefault();
            var data = $('#eligibilityForm').serialize();
            var base_url='<?php echo base_url(); ?>'
            $.ajax({
                url: base_url + 'claim/checkEligibility',
                type: 'POST',
                data: data,
                success:function(data){
                    document.getElementById("submit").setAttribute('class', 'btn btn-primary pull-right');
                    // console.log(JSON.parse(data))
                    var finaldata = JSON.parse(data);
                    
                    if(finaldata.eclaim_tracking_number === ""){
                        sessionStorage.setItem("message_tracking_number", 'N/A');
                    } else {
                        sessionStorage.setItem("message_tracking_number", finaldata.eclaim_tracking_number);
                    }
                    
                    sessionStorage.setItem("message_head", finaldata.eclaim_message_header);
                    sessionStorage.setItem("message_body", finaldata.eclaim_message_body);
                    sessionStorage.setItem("message_doc", finaldata.document);
                    console.log(finaldata.document)

                    // start object to array conversion
                    var result = [];
                    for(var i in finaldata)
                        result.push([i,finaldata[i]]) 
                    console.log(result);
                    // end object to array conversion

                    if (typeof result[0][1]['detail'] == undefined) { 
                        console.log('ERROR');
                    } else {
                        console.log(result)
                        if (result[0][1]['detail'] != undefined) {
                            if (result[0][1]['detail']['PhilhealthException']['CODE'] === '500') {
                                console.log('is 500');
                                isNotEligible()
                                document.getElementById('message_header').innerHTML = sessionStorage.getItem('message_head')
                                document.getElementById('message_body').innerHTML = sessionStorage.getItem('message_body')
                                autoScroll()
                            }
                        } else if (result[4][1]['@attributes'] != undefined) {
                            if (result[4][1]['@attributes']['ISOK'] === 'YES') {
                                isEligible();
                                document.getElementById('message_header').innerHTML = sessionStorage.getItem('message_head')
                                document.getElementById('message_body').innerHTML = sessionStorage.getItem('message_body')
                                document.getElementById('tracking_number').innerHTML = sessionStorage.getItem('message_tracking_number')
                                autoScroll()
                            } else if (result[4][1]['@attributes']['ISOK'] === 'NO') {
                                isNotEligible()
                                document.getElementById('message_header').innerHTML = sessionStorage.getItem('message_head')
                                document.getElementById('message_body').innerHTML = sessionStorage.getItem('message_body') + '<br>'
                                document.getElementById('message_body').innerHTML += sessionStorage.getItem('message_doc')
                                autoScroll()
                            }
                        }
                    }
                        
                    

                    
                }
            });
        });

    </script>
    <script>
        function autoScroll(){
            var element = document.getElementById('main-content');
            var height = element.clientHeight;
            window.scrollBy(0, height);
        }
    </script>

    <script>
        function isNotEligible(){
            document.getElementById("status_container").innerHTML = 
            '<div class="expanel expanel-default mt-4" id="claim_status">\n\
                <div class="expanel-heading">\n\
                    <h3 class="expanel-title">Eligibility Status</h3>\n\
                </div>\n\
                <div class="expanel-body">\n\
                    <div class="col-xs-12 col-sm-12 col-lg-12">\n\
                        <div class="offer offer-danger">\n\
                            <div class="shape">\n\
                                <div class="shape-text">\n\
                                \n\
                                </div>\n\
                            </div>\n\
                            <div class="offer-content">\n\
                                <div class="d-flex">\n\
                                    <h3 class="lead font-weight-semibold" id="message_header">\n\
                                        \n\
                                    </h3>\n\
                                    <i class="fa fa-exclamation-circle text-danger ml-2 mt-1"></i>\n\
                                </div>\n\
                                <p class="mb-0" id="message_body">\n\
                                    \n\
                                </p>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
            </div>';
        }

        function isEligible(){
            document.getElementById("status_container").innerHTML = 
            '<div class="expanel expanel-default mt-4" id="claim_status">\n\
                <div class="expanel-heading">\n\
                    <h3 class="expanel-title">Eligibility Status</h3>\n\
                </div>\n\
                <div class="expanel-body">\n\
                    <div class="col-xs-12 col-sm-12 col-lg-12">\n\
                        <div class="offer offer-success">\n\
                            <div class="shape">\n\
                                <div class="shape-text">\n\
                                \n\
                                </div>\n\
                            </div>\n\
                            <div class="offer-content">\n\
                                <div class="d-flex">\n\
                                    <h3 class="lead font-weight-semibold" id="message_header">\n\
                                        \n\
                                    </h3>\n\
                                    <i class="fa fa-check-circle text-success ml-2 mt-1"></i>\n\
                                </div>\n\
                                    <p class="mb-0" id="message_body">\n\
                                        \n\
                                    </p>\n\
                                <a href="claim/filePhilHealthClaim" class="btn btn-success mt-3">\n\
                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>\n\
                                    <?php echo lang('file_claim'); ?>\n\
                                </a>\n\
                                <div class="float-right mt-5">\n\
                                    <label for="tracking_number"><strong>Tracking Number:</strong></label>\n\
                                    <span id="tracking_number">\n\
                                    </span>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
            </div>';
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            function encounterDropdown(){
                var formname = eligibilityForm.p_encounter;
                var addmission_date = document.getElementById('p_admission');
                var discharge_date = document.getElementById('p_discharge');

                var fetched_value = String(formname[formname.selectedIndex].value)
                
                var separate_dates = fetched_value.split(", ")

                // console.log(separate_dates[0]+' '+separate_dates[1])

                addmission_date.value = (separate_dates[0])
                discharge_date.value = (separate_dates[1])
            }
            
            $("#pos_select").change(function () {
                var patient_id = $("#pos_select").val();
                $.ajax({
                    url: 'patient/getPatientByJason?id='+patient_id+'&company_id=<?php echo $company_id; ?>',
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.encounter_by_applicable_encounter_type)
                        var encounter = response.encounter_by_applicable_encounter_type;
                        console.log(encounter)

                        $('#patient_id').val(response.patient.id)
                        $('#p_pin').val(response.patient.national_healthcare_id)
                        $('#p_first_name').val(response.patient.firstname)
                        $('#p_middle_name').val(response.patient.middlename)
                        $('#p_last_name').val(response.patient.lastname)
                        $('#p_suffix').val(response.patient.suffix)
                        $('#p_birthdate').val(response.patient.birthdate)
                        $('#p_address').val(response.patient.address)
                        $('#p_zipcode').val(response.patient.postal)

                        

                        encounterDropdown();
                        patientSelectionIdentifyer();
                        flatPicker();

                        $.each(encounter, function(key, value){
                            console.log('hello', value)
                            const started = String(value.started_at);
                            const ended = String(value.ended_at);

                            const remove_time_from_start = started.split(" ");
                            const remove_time_from_end = ended.split(" ");
                            
                            $('#p_encounter').append($('<option>').text('Encounter Number : '+value.encounter_number+' | '+' At : '+value.started_at).val(remove_time_from_start[0] +', '+ remove_time_from_end[0])).end();

                            $('#p_encounter').change(function (){
                                encounterDropdown();
                                flatPicker();
                            });

                            
                            
                        });
                    }
                });
            });

            

            
        });
    </script>

    <script> 
        function memType(){
                $('#membership_type').select2({
                    placeholder: "<?php echo lang('please').' '.lang('select').' '.'a'.' '.lang('membership').' '.lang('type') ?>",
                    allowClear: true
                });

                function memberShipTypeIdentifyer(){
                    var selector = document.getElementById("membership_type");
                    var selectedValue = selector.options[selector.selectedIndex].value;
                    console.log(selectedValue);
                    if (selectedValue === 'S' || selectedValue === 'G'){
                        document.getElementById("emp_num").style.display = "block";
                        document.getElementById("emp_name").style.display = "block";
                    } else {
                        document.getElementById("emp_num").style.display = "none";
                        document.getElementById("emp_name").style.display = "none";
                    }
                }

                $("#membership_type").change(function () {
                    var patient_id = $("#pos_select").val();
                    memberShipTypeIdentifyer();
                    
                });
            }
    </script>

    <script>
        // function appendItems(){
            function isEmpty() {
                document.getElementById("type_member").innerHTML = ''; // return empty value
            }
            function isMember(){
                document.getElementById("type_member").innerHTML += 
                '<div class="col-md-12 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('membership').' '.lang('type'); ?></label>\n\
                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="membership_type" id="membership_type" required>\n\
                            <option value=""></option>\n\
                            <option value="S"><?php echo lang('employed_private'); ?></option>\n\
                            <option value="G"><?php echo lang('employer_government'); ?></option>\n\
                            <option value="I"><?php echo lang('indigent'); ?></option>\n\
                            <option value="NS"><?php echo lang('individually_paying'); ?></option>\n\
                            <option value="NO"><?php echo lang('ofw'); ?></option>\n\
                            <option value="PS"><?php echo lang('non_paying_private'); ?></option>\n\
                            <option value="PG"><?php echo lang('non_paying_government'); ?></option>\n\
                            <option value="P"><?php echo lang('lifetime_member'); ?></option>\n\
                        </select>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="emp_num" style="display: none;">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('philhealth').' '.lang('employer').' '.lang('number'); ?></label>\n\
                        <input type="text" name="p_pen" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="emp_name" style="display: none;">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('philhealth').' '.lang('employer').' '.lang('name'); ?></label>\n\
                        <input type="text" name="p_employer_name" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="rvs_code">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('rvs').' '.lang('code').' '.lang('of').' '.strtolower(lang('the')).' '.lang('surgery'); ?></label>\n\
                        <input type="text" name="p_rvs_code" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="total_hospital_bill">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('total').' '.lang('hospital').' '.lang('bill'); ?></label>\n\
                        <input type="text" name="p_total_hospital_bill" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="total_amount_to_claim">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('total').' '.strtolower(lang('amount')).' '.lang('to').' '.strtolower(explode('s',lang('claims'))[0]).' '.strtolower(lang('from')).' '.lang('philhealth'); ?></label>\n\
                        <input type="text" name="p_total_amount_claim" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-sm-12 col-md-12">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('claim').' '.lang('call'); ?> <span class="text-red">*</span></label>\n\
                        <div class="custom-controls-stacked d-flex">\n\
                            <label class="custom-control custom-radio">\n\
                                <input type="radio" class="rad custom-control-input" name="p_is_final" value="1">\n\
                                <span class="custom-control-label"><?php echo lang('final'); ?></span>\n\
                            </label>\n\
                            <label class="custom-control custom-radio ml-2">\n\
                                <input type="radio" class="rad custom-control-input" name="p_is_final" value="0">\n\
                                <span class="custom-control-label"><?php echo lang('initial'); ?></span>\n\
                            </label>\n\
                        </div>\n\
                    </div>\n\
                </div>';

                
                memType();
                
            }

            function isNotMember() {

                document.getElementById("type_member").innerHTML +=
                '<div class="col-md-12 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('philhealth_identification_number_pin').' '.lang('of').' '.lang('member'); ?></label>\n\
                        <input type="text" name="another_mem_pin" class="pin_dep form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label><?php echo lang('first_name').' '.lang('of').' '.lang('member'); ?> <span class="text-red">*</span></label>\n\
                        <input type="text" id="another_mem_first_name" name="another_mem_first_name" class="p_form form-control" value="<?php  ?>" required>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label><?php echo lang('middle_name').' '.lang('of').' '.lang('member'); ?> <span class="text-red">*</span></label>\n\
                        <input type="text" id="another_mem_middle_name" name="another_mem_middle_name" class="p_form form-control" value="<?php  ?>" required>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label><?php echo lang('last_name').' '.lang('of').' '.lang('member'); ?> <span class="text-red">*</span></label>\n\
                        <input type="text" id="another_mem_last_name" name="another_mem_last_name" class="p_form form-control" value="<?php  ?>" required>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label><?php echo lang('address').' '.lang('of').' '.lang('member'); ?> <span class="text-red">*</span></label>\n\
                        <input type="text" id="another_mem_address" name="another_mem_address" class="p_form form-control" value="<?php  ?>" required>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('suffix').' '.lang('of').' '.lang('member'); ?> <span class="text-red">*</span></label>\n\
                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="another_mem_suffix" id="another_mem_suffix">\n\
                            <option value="" ><?php echo lang('none'); ?></option>\n\
                            <option value="Jr." <?php //if(set_value('suffix')=='Jr.') { echo 'selected';} elseif ($patient->suffix ==='Jr.') { echo 'selected'; } ?>><?php echo lang('jr'); ?></option>\n\
                            <option value="Sr." <?php //if(set_value('suffix')=='Sr.') { echo 'selected';} elseif ($patient->suffix ==='Sr.') { echo 'selected'; } ?>><?php echo lang('sr'); ?></option>\n\
                            <option value="I" <?php //if(set_value('suffix')=='I') { echo 'selected';} elseif ($patient->suffix ==='I') { echo 'selected'; } ?>><?php echo lang('i'); ?></option>\n\
                            <option value="II" <?php //if(set_value('suffix')=='II') { echo 'selected';} elseif ($patient->suffix ==='II') { echo 'selected'; } ?>><?php echo lang('ii'); ?></option>\n\
                            <option value="III" <?php //if(set_value('suffix')=='III') { echo 'selected';} elseif ($patient->suffix ==='III') { echo 'selected'; } ?>><?php echo lang('iii'); ?></option>\n\
                            <option value="IV" <?php //if(set_value('suffix')=='IV') { echo 'selected';} elseif ($patient->suffix ==='IV') { echo 'selected'; } ?>><?php echo lang('iv'); ?></option>\n\
                            <option value="V" <?php //if(set_value('suffix')=='V') { echo 'selected';} elseif ($patient->suffix ==='V') { echo 'selected'; } ?>><?php echo lang('v'); ?></option>\n\
                            <option value="VI" <?php //if(set_value('suffix')=='VI') { echo 'selected';} elseif ($patient->suffix ==='VI') { echo 'selected'; } ?>><?php echo lang('vi'); ?></option>\n\
                            <option value="VII" <?php //if(set_value('suffix')=='VII') { echo 'selected';} elseif ($patient->suffix ==='VII') { echo 'selected'; } ?>><?php echo lang('vii'); ?></option>\n\
                            <option value="VIII" <?php //if(set_value('suffix')=='VIII') { echo 'selected';} elseif ($patient->suffix ==='VIII') { echo 'selected'; } ?>><?php echo lang('viii'); ?></option>\n\
                            <option value="IX" <?php //if(set_value('suffix')=='IX') { echo 'selected';} elseif ($patient->suffix ==='IX') { echo 'selected'; } ?>><?php echo lang('ix'); ?></option>\n\
                            <option value="X" <?php //if(set_value('suffix')=='X') { echo 'selected';} elseif ($patient->suffix ==='X') { echo 'selected'; } ?>><?php echo lang('x'); ?></option>\n\
                        </select>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label><?php echo lang('birth_date').' '.lang('of').' '.lang('member'); ?> <span class="text-red">*</span></label>\n\
                        <input class="form-control flatpickr" placeholder="<?php echo lang('select').' '. lang('date');?>" name="another_mem_birthdate" type="text" maxlength="100" readonly required>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label><?php echo lang('patient').' '.lang('relationship').' '.strtolower(lang('to')).' '.lang('the').' '.lang('member'); ?> <span class="text-red">*</span></label>\n\
                        <div class="custom-controls-stacked d-flex">\n\
                            <label class="custom-control custom-radio">\n\
                                <input type="radio" class="rad2 custom-control-input" name="another_mem_relation" id="is_spouse" value="S">\n\
                                <span class="custom-control-label"><?php echo lang('spouse'); ?></span>\n\
                            </label>\n\
                            <label class="custom-control custom-radio ml-2">\n\
                                <input type="radio" class="rad2 custom-control-input" name="another_mem_relation" id="is_child" value="C">\n\
                                <span class="custom-control-label"><?php echo lang('child'); ?></span>\n\
                            </label>\n\
                            <label class="custom-control custom-radio ml-2">\n\
                                <input type="radio" class="rad2 custom-control-input" name="another_mem_relation" id="is_parent" value="P">\n\
                                <span class="custom-control-label"><?php echo lang('parent'); ?></span>\n\
                            </label>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-12 col-sm-12">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('membership').' '.lang('type'); ?></label>\n\
                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="membership_type" id="membership_type" required>\n\
                            <option value=""></option>\n\
                            <option value="S"><?php echo lang('employed_private'); ?></option>\n\
                            <option value="G"><?php echo lang('employer_government'); ?></option>\n\
                            <option value="I"><?php echo lang('indigent'); ?></option>\n\
                            <option value="NS"><?php echo lang('individually_paying'); ?></option>\n\
                            <option value="NO"><?php echo lang('ofw'); ?></option>\n\
                            <option value="PS"><?php echo lang('non_paying_private'); ?></option>\n\
                            <option value="PG"><?php echo lang('non_paying_government'); ?></option>\n\
                            <option value="P"><?php echo lang('lifetime_member'); ?></option>\n\
                        </select>\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="emp_num" style="display: none;">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('philhealth').' '.lang('employer').' '.lang('number'); ?></label>\n\
                        <input type="text" name="p_pen" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="emp_name" style="display: none;">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('philhealth').' '.lang('employer').' '.lang('name'); ?></label>\n\
                        <input type="text" name="p_employer_name" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="rvs_code">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('rvs').' '.lang('code').' '.lang('of').' '.strtolower(lang('the')).' '.lang('surgery'); ?></label>\n\
                        <input type="text" name="p_rvs_code" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="total_hospital_bill">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('total').' '.lang('hospital').' '.lang('bill'); ?></label>\n\
                        <input type="text" name="p_total_hospital_bill" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-md-6 col-sm-12" id="total_amount_to_claim">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('total').' '.strtolower(lang('amount')).' '.lang('to').' '.strtolower(explode('s',lang('claims'))[0]).' '.strtolower(lang('from')).' '.lang('philhealth'); ?></label>\n\
                        <input type="text" name="p_total_amount_claim" class="form-control">\n\
                    </div>\n\
                </div>\n\
                <div class="col-sm-12 col-md-12">\n\
                    <div class="form-group">\n\
                        <label class="form-label"><?php echo lang('claim').' '.lang('call'); ?> <span class="text-red">*</span></label>\n\
                        <div class="custom-controls-stacked d-flex">\n\
                            <label class="custom-control custom-radio">\n\
                                <input type="radio" class="rad custom-control-input" name="p_is_final" value="1">\n\
                                <span class="custom-control-label"><?php echo lang('final'); ?></span>\n\
                            </label>\n\
                            <label class="custom-control custom-radio ml-2">\n\
                                <input type="radio" class="rad custom-control-input" name="p_is_final" value="0">\n\
                                <span class="custom-control-label"><?php echo lang('initial'); ?></span>\n\
                            </label>\n\
                        </div>\n\
                    </div>\n\
                </div>';
                
                $('#sex').select2();
                $('#suffix').select2();
                flatPicker();
                memType();
            }

            function memberTypeValidate() {
                
                if (document.getElementById('is_member').checked) {
                    const ismemberval = document.getElementById('is_member');
                    console.log(ismemberval.value);
                    isEmpty();
                    isMember();
                    // clearSubmitFormButton();
                    // submitFormButton();
                }else if(document.getElementById('is_not_member').checked) {
                    const isnotmemberval = document.getElementById('is_not_member');
                    console.log(isnotmemberval.value);
                    isEmpty();
                    isNotMember();
                    function relationShipToMember() {
                        if (document.getElementById('is_spouse').checked) {
                            const spouse = document.getElementById('is_spouse');
                            console.log(spouse.value);
                        }else if(document.getElementById('is_child').checked) {
                            const child = document.getElementById('is_child');
                            console.log(child.value);
                        }else if(document.getElementById('is_parent').checked){
                            const parent = document.getElementById('is_parent');
                            console.log(parent.value);
                        }
                    }
                    document.getElementById('is_spouse').addEventListener('change', relationShipToMember);
                    document.getElementById('is_child').addEventListener('change', relationShipToMember);
                    document.getElementById('is_parent').addEventListener('change', relationShipToMember);
                    // clearSubmitFormButton();
                    // submitFormButton();
                    
                }
                
            }
            document.getElementById('is_member').addEventListener('change', memberTypeValidate);
            document.getElementById('is_not_member').addEventListener('change', memberTypeValidate);


            
        // }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#pos_select").select2({
                placeholder: '<?php echo lang('select').' '.lang('member').' '.lang('name'); ?>',
                allowClear: true,
                ajax: {
                    // url: 'patient/getPatientinfo',
                    url: 'patient/getPatientInfoByVisitedProviderId',
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
    </body>
</html>