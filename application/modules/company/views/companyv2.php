<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <div class="row mt-5">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('list_of'); ?> <?php echo lang('payer_accounts'); ?>    
                                        </div>
                                        <div class="card-options">
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a href="company/addNewView">
                                                    <button id="" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-plus"></i> <?php echo lang('add_new'); ?>
                                                    </button>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('company'); ?> <?php echo lang('id'); ?></th>
                                                                    <th><?php echo lang('name'); ?></th>
                                                                    <th><?php echo lang('display_name'); ?></th>                                
                                                                    <th><?php echo lang('email'); ?></th>
                                                                    <th><?php echo lang('phone'); ?></th>
                                                                    <th><?php echo lang('type'); ?></th>
                                                                    <th><?php echo lang('classification'); ?></th>
                                                                    <th><?php echo lang('profile'); ?></th>                                
                                                                    <th><?php echo lang('options'); ?></th>
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
                            </div>
                        </div>

                        <div class="modal" id="myModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_account'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="company/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('name'); ?></label>
                                                        <input type="text" class="form-control" name="name" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('display_name'); ?></label>
                                                        <input type="text" class="form-control" name="display_name" id="exampleInputEmail1" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('email'); ?></label>
                                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('address'); ?></label>
                                                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('phone'); ?></label>
                                                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('registration'); ?></label>
                                                        <input type="text" class="form-control" name="registration_number" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('type'); ?></label>
                                                        <select class="form-control m-bot15 js-example-basic-single select2" name="type_id" value=''>
                                                            <option value=""><?php echo lang('select');?></option>
                                                            <?php foreach ($types as $type) { ?>
                                                                <option value="<?php echo $type->id; ?>"> <?php echo $type->name; ?> </option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('classification'); ?></label>
                                                        <select class="form-control m-bot15 js-example-basic-single select2" name="classification_id" value=''>
                                                            <option value=""><?php echo lang('select');?></option>
                                                            <?php foreach ($classifications as $classification) { ?>
                                                                <option value="<?php echo $classification->id; ?>"> <?php echo $classification->name; ?> </option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('profile'); ?></label>
                                                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company'); ?></label>
                                                        <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                            <input type="file" name="img_url" id="image" class="dropify"/>
                                                    </div>
                                                </div>
                                            </div>
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

                        <div class="modal" id="myModal2">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('edit_company'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editCompanyForm" class="clearfix" action="company/addNew" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('name'); ?></label>
                                                        <input type="text" class="form-control" name="name" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('display_name'); ?></label>
                                                        <input type="text" class="form-control" name="display_name" id="exampleInputEmail1" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('email'); ?></label>
                                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('address'); ?></label>
                                                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('phone'); ?></label>
                                                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('registration'); ?></label>
                                                        <input type="text" class="form-control" name="registration_number" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('type'); ?></label>
                                                        <select class="form-control m-bot15 js-example-basic-single select2" id="editType" name="type_id" value=''>
                                                            <option value=""><?php echo lang('select');?></option>
                                                            <?php foreach ($types as $type) { ?>
                                                                <option value="<?php echo $type->id; ?>"> <?php echo $type->name; ?> </option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('classification'); ?></label>
                                                        <select class="form-control m-bot15 js-example-basic-single select2" id="editClassification" name="classification_id" value=''>
                                                            <option value=""><?php echo lang('select');?></option>
                                                            <?php foreach ($classifications as $classification) { ?>
                                                                <option value="<?php echo $classification->id; ?>"> <?php echo $classification->name; ?> </option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('profile'); ?></label>
                                                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company'); ?></label>
                                                        <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                            <input type="file" name="img_url" id="image" class="dropify"/>
                                                    </div>
                                                </div>
                                            </div>
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

                        <div class="modal" id="infoModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('edit_company'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editCompanyForm" class="clearfix" action="company/addNew" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('name'); ?></label>
                                                        <div class="nameClass"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('display_name'); ?></label>
                                                        <div class="displaynameClass"></div>
                                                    </div>
                                                </div>                    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('email'); ?></label>
                                                        <div class="emailClass"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('address'); ?></label>
                                                        <div class="addressClass"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('phone'); ?></label>
                                                        <div class="phoneClass"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('registration'); ?> <?php echo lang('number'); ?></label>
                                                        <div class="registrationClass"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('type'); ?></label>
                                                        <div class="typeClass"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('classification'); ?></label>
                                                        <div class="classificationClass"></div>
                                                    </div>
                                                </div>                    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('profile'); ?></label>
                                                        <div class="profileClass"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <!-- <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img1" alt="" />
                                                                </div> -->
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                            </div>
                                                        </div>
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
        <!--Moment js-->
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
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".editbutton", function () {
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $("#img").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                $('#editCompanyForm').trigger("reset");
                $.ajax({
                    url: 'company/editCompanyByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        $(".editselect2").select2({
                            allowClear: true,
                        });
                        // Populate the form fields with the data returned from server
                        $('#editCompanyForm').find('[name="id"]').val(response.company.id).end()
                        $('#editCompanyForm').find('[name="name"]').val(response.company.name).end()
                        $('#editCompanyForm').find('[name="display_name"]').val(response.company.display_name).end()
                        $('#editCompanyForm').find('[name="email"]').val(response.company.email).end()
                        $('#editCompanyForm').find('[name="address"]').val(response.company.address).end()
                        $('#editCompanyForm').find('[name="phone"]').val(response.company.phone).end()
                        $('#editCompanyForm').find('[name="type_id"]').val(response.company.type_id).change()
                        $('#editCompanyForm').find('[name="classification_id"]').val(response.company.classification_id).change()
                        $('#editCompanyForm').find('[name="profile"]').val(response.company.profile).end()
                        $('#editCompanyForm').find('[name="registration_number"]').val(response.company.registration_number).end()
                        if (typeof response.company.img_url !== 'undefined' && response.company.img_url != '') {
                            $("#img").attr("src", response.company.img_url);
                        }

                        $('.js-example-basic-single.type').val(response.company.type_id).trigger('change');
                        $('.js-example-basic-single.classification').val(response.company.classification_id).trigger('change');

                        $('#myModal2').modal('show');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".inffo", function () {
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');

                $("#img1").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                $('.nameClass').html("").end()
                $('.displaynameClass').html("").end()
                $('.emailClass').html("").end()
                $('.addressClass').html("").end()
                $('.phoneClass').html("").end()
                $('.registrationClass').html("").end()
                $('.typeClass').html("").end()
                $('.classificationClass').html("").end()
                $('.profileClass').html("").end()
                $.ajax({
                    url: 'company/editCompanyByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editCompanyForm').find('[name="id"]').val(response.company.id).end()
                        $('.nameClass').append(response.company.name).end()
                        $('.displaynameClass').append(response.company.display_name).end()
                        $('.emailClass').append(response.company.email).end()
                        $('.addressClass').append(response.company.address).end()
                        $('.phoneClass').append(response.company.phone).end()
                        $('.registrationClass').append(response.company.registration_number).end()
                        $('.typeClass').append(response.typename).end()
                        $('.classificationClass').append(response.classificationname).end()
                        $('.profileClass').append(response.company.profile).end()

                        if (typeof response.company.img_url !== 'undefined' && response.company.img_url != '') {
                            $("#img1").attr("src", response.company.img_url);
                        }

                        $('#infoModal').modal('show');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2").select2({
                allowClear: true,
            });
        })
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample').DataTable({
                responsive: true,

                "processing": true,
                // "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "company/getCompany",
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
                            columns: [0, 1, 2, 3, 4, 5, 6],
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
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                }
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    </body>
</html>    