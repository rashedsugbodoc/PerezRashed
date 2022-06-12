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
                                        <div class="card-title"><?php echo lang('medicine'); ?> </div>
                                        <div class="card-options">
                                            <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Doctor'))) { ?>
                                                <a href="medicine/addMedicineView">
                                                    <button id="" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-plus"></i> <?php echo lang('add_medicine'); ?>
                                                    </button>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap key-buttons" id="editable-sample1">
                                                <thead>
                                                    <tr>
                                                        <th> <?php echo lang('id'); ?></th>
                                                        <th> <?php echo lang('generic_name'); ?></th>
                                                        <th> <?php echo lang('name'); ?></th>
                                                        <th> <?php echo lang('form'); ?></th>
                                                        <th> <?php echo lang('category'); ?></th>
                                                        <th> <?php echo lang('store_box'); ?></th>
                                                        <th> <?php echo lang('p_price'); ?></th>
                                                        <th> <?php echo lang('s_price'); ?></th>
                                                        <th> <?php echo lang('quantity'); ?></th>
                                                        <th> <?php echo lang('company'); ?></th>
                                                        <th> <?php echo lang('uses'); ?></th>
                                                        <th> <?php echo lang('side_effects'); ?></th>
                                                        <th> <?php echo lang('expiry_date'); ?></th>
                                                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Doctor'))) { ?>
                                                            <th> <?php echo lang('options'); ?></th>
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

                        

                        <!-- Add Accountant Modal-->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('add_medicine'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="medicine/addNewMedicine" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('generic_name'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="generic" id="generic" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('category'); ?><span class="text-red"> *</span></label>
                                                        <select class="form-control select2-show-search" name="category" id="category" value='' required>
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option value="<?php echo $category->category; ?>" <?php
                                                                if (!empty($medicine->category)) {
                                                                    if ($category->category == $medicine->category) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $category->category; ?> </option>
                                                                    <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('brand_name'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="name" id="brand" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('form'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="form" id="form" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('uses'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="uses" id="uses" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('side_effects'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="effects" id="side_effects" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('p_price'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="price" id="p_price" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('s_price'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="s_price" id="s_price" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('quantity'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="quantity" id="quantity" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="company" id="company" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('store_box'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control" name="box" id="store_box" value='' placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('expiry_date'); ?><span class="text-red"> *</span></label>
                                                        <input type="text" class="form-control flatpickr" name="e_date" id="date" value='' placeholder="" readonly="" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value=''>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Add Accountant Modal-->




                        


                        <!-- Edit Event Modal-->
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('edit_medicine'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editMedicineForm" class="clearfix" action="medicine/addNewMedicine" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('generic_name'); ?></label>
                                                        <input type="text" class="form-control" name="generic" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('category'); ?></label>
                                                        <select class="form-control select2-show-search" name="category" value=''>
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option value="<?php echo $category->category; ?>" <?php
                                                                if (!empty($medicine->category)) {
                                                                    if ($category->category == $medicine->category) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> > <?php echo $category->category; ?> </option>
                                                                    <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('brand_name'); ?></label>
                                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('form'); ?></label>
                                                        <input type="text" class="form-control" name="form">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('uses'); ?></label>
                                                        <input type="text" class="form-control" name="uses" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('side_effects'); ?></label>
                                                        <input type="text" class="form-control" name="effects" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('p_price'); ?></label>
                                                        <input type="text" class="form-control" name="price" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('s_price'); ?></label>
                                                        <input type="text" class="form-control" name="s_price" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('quantity'); ?></label>
                                                        <input type="text" class="form-control" name="quantity" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('company'); ?></label>
                                                        <input type="text" class="form-control" name="company" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('store_box'); ?></label>
                                                        <input type="text" class="form-control" name="box" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('expiry_date'); ?></label>
                                                        <input type="text" class="form-control editflatpickr" name="e_date" value='' placeholder="" readonly="">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value=''>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Event Modal-->



                        <!-- Load Medicine -->
                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('load_medicine'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="loadMedicineForm" class="clearfix" action="medicine/load" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('add_quantity'); ?></label>
                                                        <input type="text" class="form-control" name="qty" id="exampleInputEmail1" value='' placeholder="">
                                                    </div>
                                                    <input type="hidden" name="id" value=''>
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Load Medicine -->


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

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        flatpickr(".flatpickr", {
            altInput: true,
            altFormat: "F j, Y",
            minDate: "today",
            disableMobile: true
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {
                var generic = $('#generic').parsley();
                var category = $('#category').parsley();
                var brand = $('#brand').parsley();
                var form = $('#form').parsley();
                var uses = $('#uses').parsley();
                var side_effects = $('#side_effects').parsley();
                var p_price = $('#p_price').parsley();
                var s_price = $('#s_price').parsley();
                var quantity = $('#quantity').parsley();
                var company = $('#company').parsley();
                var store_box = $('#store_box').parsley();
                var date = $('#date').parsley();

                if (generic.isValid() && category.isValid() && brand.isValid() && form.isValid() && uses.isValid() && side_effects.isValid() && p_price.isValid() && s_price.isValid() && quantity.isValid() && company.isValid() && store_box.isValid() && date.isValid()) {
                    return true;
                } else {
                    generic.validate();
                    category.validate();
                    brand.validate();
                    form.validate();
                    uses.validate();
                    side_effects.validate();
                    p_price.validate();
                    s_price.validate();
                    quantity.validate();
                    company.validate();
                    store_box.validate();
                    date.validate();
                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".editbutton", function () {
              
                var iid = $(this).attr('data-id');
                $('#editMedicineForm').trigger("reset");
                $('#myModal2').modal('show');
                $.ajax({
                    url: 'medicine/editMedicineByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editMedicineForm').find('[name="id"]').val(response.medicine.id).end()
                        $('#editMedicineForm').find('[name="name"]').val(response.medicine.name).end()
                        $('#editMedicineForm').find('[name="box"]').val(response.medicine.box).end()
                        $('#editMedicineForm').find('[name="price"]').val(response.medicine.price).end()
                        $('#editMedicineForm').find('[name="s_price"]').val(response.medicine.s_price).end()
                        $('#editMedicineForm').find('[name="quantity"]').val(response.medicine.quantity).end()
                        $('#editMedicineForm').find('[name="generic"]').val(response.medicine.generic).end()
                        $('#editMedicineForm').find('[name="company"]').val(response.medicine.company).end()
                        $('#editMedicineForm').find('[name="form"]').val(response.medicine.form).end()
                        $('#editMedicineForm').find('[name="uses"]').val(response.medicine.uses).end()
                        $('#editMedicineForm').find('[name="effects"]').val(response.medicine.effects).end()
                        // $('#editMedicineForm').find('[name="e_date"]').val(response.medicine.e_date).end()
                        var expire = response.expire_date;
                        $('.editflatpickr').flatpickr({
                            dateFormat: "F j, Y",
                            defaultDate: expire,
                            altInput: true,
                            altFormat: "F j, Y",
                            disableMobile: true
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".load", function () {

                // e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#loadMedicineForm').trigger("reset");
                $('#myModal3').modal('show');

                console.log(iid);

                //  var id = $(this).data('id');

                // Populate the form fields with the data returned from server
                $('#loadMedicineForm').find('[name="id"]').val(iid).end()
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "medicine/getMedicineList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
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
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('medicine_list'); ?>'
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('medicine_list'); ?>'
                            },
                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('medicine_list'); ?>'
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('medicine_list'); ?>',
                                orientation: 'landscape',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                },
                                title: '<?php echo lang('medicine_list'); ?>'
                            },
                        ],
                    }
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
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

    </body>
</html> 