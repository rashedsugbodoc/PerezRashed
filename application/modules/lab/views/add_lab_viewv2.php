<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <style>
                            @media (max-width: 765px) {
                                .header-brand-img-cus{
                                    width: 170px;
                                }
                                .image-mobile{
                                    display: block;
                                }
                                .image-desktop{
                                    display: none;
                                }

                            }
                            @media (min-width: 766px) {
                                .header-brand-img-cus{
                                    width: 170px;
                                }
                                .image-mobile{
                                    display: none;
                                }
                                .image-desktop{
                                    display: block;
                                }
                            }
                        </style>

                        <div class="row mt-5">
                            <div class="col-md-12 col-sm-12 col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php
                                            if (!empty($lab->id))
                                                echo lang('edit_lab_report');
                                            else
                                                echo lang('add_lab_report');
                                            ?>
                                        </div>
                                    </div>
                                    <form role="form" id="editLabForm" class="clearfix" action="lab/addLab" method="post" enctype="multipart/form-data" onsubmit="javascript: return myFunction();">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                        <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text" readonly value="<?php
                                                        if (!empty($lab->date)) {
                                                            echo date('m/d/Y', $lab->lab_date.' UTC');
                                                        } else {
                                                            echo date('m/d/Y');
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('patient'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search pos_select" id="pos_select" name="patient" data-placeholder="Choose one">
                                                            <?php if (!empty($lab->patient)) { ?>
                                                                <option value="<?php echo $lab->patient; ?>" selected="selected"><?php echo $lab->patient_name; ?> - <?php echo $lab->patient; ?></option>  
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pos_client clearfix">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                            <input type="text" name="p_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                            <form>
                                                                <input id="phone" name="p_phone" class="form-control" value="+63" type="tel">
                                                             </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                            <input type="email" name="p_email" class="form-control">
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
                                                        <label class="form-label"><?php echo lang('refd_by_doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search add_doctor" id="add_doctor" name="doctor" data-placeholder="Choose one">
                                                            <?php if (!empty($lab->doctor)) { ?>
                                                                <option value="<?php echo $lab->doctor; ?>" selected="selected"><?php echo $lab->doctor_name; ?> - <?php echo $lab->doctor; ?></option>  
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pos_doctor clearfix">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('doctor'); ?> <?php echo lang('name'); ?></label>
                                                            <input type="text" name="d_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('doctor'); ?> <?php echo lang('phone'); ?></label>
                                                            <form>
                                                                <input id="phone2" name="d_phone" class="form-control" value="+63" type="tel">
                                                             </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('doctor'); ?> <?php echo lang('email'); ?></label>
                                                            <input type="email" name="d_email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" hidden>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering') . ' ' . lang('staff'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="staff" id="staffs" data-placeholder="Choose one">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('report'); ?> <span class="text-red">*</span></label>
                                                        <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                            <div id="quillEditor" class="bg-white">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('name') ?></label>
                                                        <input type="text" name="name" class="form-control" value="<?php
                                                            if (!empty($setval)) {
                                                                echo set_value('name');
                                                            }
                                                            if (!empty($lab_single->name)) {
                                                                echo $lab_single->name;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label for="exampleInputEmail1"> <?php echo lang('report'); ?></label>
                                                    <textarea class="ckeditor form-control" id="editor" name="report" value="" rows="10"><?php
                                                        if (!empty($setval)) {
                                                            echo set_value('report');
                                                        }
                                                        if (!empty($lab_single->report)) {
                                                            echo $lab_single->report;
                                                        }
                                                        ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <textarea id="report" name="report" hidden="" readonly="" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <input type="hidden" name="redirect" value="<?php
                                            if (!empty($lab_single)) {
                                                echo 'lab?id=' . $lab_single->id;
                                            } else {
                                                echo 'lab';
                                            }
                                            ?>">
                                            <input type="hidden" name="id" value='<?php
                                            if (!empty($lab_single->id)) {
                                                echo $lab_single->id;
                                            }
                                            ?>'>
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

                            <div class="col-md-12 col-sm-12 col-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Report</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 header-brand pl-0">
                                                        <div class="row">
                                                            <div class="col-md-12 image-mobile text-center">
                                                                <img src="<?php echo base_url('public/assets/images/brand/logo.png'); ?>" class="header-brand-img-cus"  alt="Rygel Dash logo">
                                                            </div>
                                                            <div class="col-md-12 image-desktop">
                                                                <img src="<?php echo base_url('public/assets/images/brand/logo.png'); ?>" class="header-brand-img-cus"  alt="Rygel Dash logo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-12 text-center">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h4 mb-1"><?php echo $settings->title ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-0"><?php echo $settings->address ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-0">TIN: --</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h6 mb-3">Contact Number: <?php echo $settings->phone ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="h5"><?php echo lang('lab_report') ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 border-top border-dark pb-0 pl-0">
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap mb-1 mt-1">
                                                        <tbody>
                                                            <?php
                                                            if (!empty($lab)) {
                                                                $patient_info = $this->db->get_where('patient', array('id' => $lab->patient))->row();
                                                            }
                                                            ?>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0">Patient Name</td>
                                                                <td class="w-7 p-0">:</td>
                                                                <td class="w-63 p-0">
                                                                    <?php
                                                                    if (!empty($patient_info)) {
                                                                        echo $patient_info->name;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0">Lab Report ID</td>
                                                                <td class="w-7 p-0">:</td>
                                                                <td class="w-63 p-0">
                                                                    <?php
                                                                    if (!empty($lab->id)) {
                                                                        echo $lab->id;
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0">Patient ID</td>
                                                                <td class="w-7 p-0">:</td>
                                                                <td class="w-63 p-0">
                                                                    <?php
                                                                    if (!empty($patient_info)) {
                                                                        echo $patient_info->id;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0">Date</td>
                                                                <td class="w-7 p-0">:</td>
                                                                <td class="w-63 p-0">
                                                                    <?php
                                                                    if (!empty($lab->date)) {
                                                                        echo date('d-m-Y', $lab->date) . ' <br>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0">Address</td>
                                                                <td class="w-7 p-0">:</td>
                                                                <td class="w-63 p-0">
                                                                    <?php
                                                                    if (!empty($patient_info)) {
                                                                        echo $patient_info->address . ' <br>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td class="w-15 p-0">Doctor</td>
                                                                <td class="w-7 p-0">:</td>
                                                                <td class="w-63 p-0">
                                                                    <?php
                                                                    if (!empty($lab->doctor)) {
                                                                        echo $this->doctor_model->getDoctorById($lab->doctor)->name . ' <br>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr class="p-0">
                                                                <td class="w-15 p-0">PHONE</td>
                                                                <td class="w-7 p-0">:</td>
                                                                <td class="w-63 p-0">
                                                                    <?php
                                                                    if (!empty($patient_info)) {
                                                                        echo $patient_info->phone . ' <br>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div><!-- end app-content-->
            </div>
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            20<?php echo date('y'); ?> &copy; <?php echo $this->db->get('settings')->row()->system_vendor; ?> by Rygel Technology Solutions.
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

        <!--intlTelInput js-->
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/intlTelInput.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/country-select.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/utils.js'); ?>"></script>

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

        <script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>
    <!-- INTERNAL JS INDEX END -->

    <script>
        $(document).ready(function () {
            var tot = 0;
            $(".ms-selected").click(function () {
                var id = $(this).data('idd');
                $('#id-div' + id).remove();
                $('#idinput-' + id).remove();
                $('#mediidinput-' + id).remove();

            });
            $.each($('select.multi-select option:selected'), function () {
                var id = $(this).data('idd');
                if ($('#idinput-' + id).length)
                {

                } else {
                    if ($('#id-div' + id).length)
                    {

                    } else {

                        $("#editLabForm .qfloww").append('<div class="remove1 col-md-12" id="id-div' + id + '"> <span class="col-md-3 span1">  ' + $(this).data("cat_name") + '</span><span class="col-md-4 span2">Value: </span><span class="col-md-4 span3">Reference Value:<br> ' + $(this).data('id') + '</span></div>')
                    }
                    var input2 = $('<input>').attr({
                        type: 'text',
                        class: "remove col-md-3",
                        id: 'idinput-' + id,
                        name: 'valuee[]',
                        value: '1',
                    }).appendTo('#editLabForm .qfloww');

                    $('<input>').attr({
                        type: 'hidden',
                        class: "remove",
                        id: 'mediidinput-' + id,
                        name: 'lab_test_id[]',
                        value: id,
                    }).appendTo('#editLabForm .qfloww');
                }


            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.multi-select').change(function () {
                var tot = 0;
                $(".ms-selected").click(function () {
                    var id = $(this).data('idd');
                    $('#id-div' + id).remove();
                    $('#idinput-' + id).remove();
                    $('#mediidinput-' + id).remove();

                });
                $.each($('select.multi-select option:selected'), function () {
                    var id = $(this).data('idd');
                    if ($('#idinput-' + id).length)
                    {

                    } else {
                        if ($('#id-div' + id).length)
                        {

                        } else {

                            $("#editLabForm .qfloww").append('<div class="remove1 col-md-12" id="id-div' + id + '"> <span class="col-md-3 span1">  ' + $(this).data("cat_name") + '</span><span class="col-md-4 span2">Value: </span><span class="col-md-4 span3">Reference Value:<br> ' + $(this).data('id') + '</span></div>')
                        }
                        var input2 = $('<input>').attr({
                            type: 'text',
                            class: "remove col-md-3",
                            id: 'idinput-' + id,
                            name: 'valuee[]',
                            value: '1',
                        }).appendTo('#editLabForm .qfloww');

                        $('<input>').attr({
                            type: 'hidden',
                            class: "remove",
                            id: 'mediidinput-' + id,
                            name: 'lab_test_id[]',
                            value: id,
                        }).appendTo('#editLabForm .qfloww');
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

    <script>
        $(document).ready(function () {
            $('.pos_doctor').hide();
            $(document.body).on('change', '#add_doctor', function () {

                var v = $("select.add_doctor option:selected").val()
                if (v == 'add_new') {
                    $('.pos_doctor').show();
                } else {
                    $('.pos_doctor').hide();
                }
            });

        });


    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $(document.body).on('change', '#template', function () {
                var iid = $("select.template option:selected").val();
                $.ajax({
                    url: 'lab/getTemplateByIdByJason?id=' + iid,
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

            $("#staffs").select2({
                placeholder: '<?php echo lang('select') . ' ' . lang('users'); ?>',
                allowClear: true,
                ajax: {
                    url: 'profile/getUserWithoutAddNewOption',
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

    </body>
</html> 