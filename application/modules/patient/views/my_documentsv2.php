<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('my'); ?> <?php echo lang('documents'); ?></h4>
                            </div>
                        </div>

                        <div class="row mt-5">
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

                        <div class="row">
                            <?php foreach ($files as $file) { ?>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="todo-widget-header d-flex pb-2 p-4">
                                                <div class="">
                                                    <a class="btn btn-info" href="<?php echo $file->url; ?>" target="_blank"><i class="fe fe-edit"></i></a>
                                                    <a class="btn btn-info" href="<?php echo $file->url; ?>" download><i class="fe fe-download"></i></a>
                                                    <!-- <a class="btn btn-danger" data-target="#Delete" data-toggle="modal" href=""><i class="fe fe-trash-2"></i></a> -->
                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Patient', 'Doctor'))) { ?>
                                                        <a class="btn btn-danger ml-5" data-target="#Delete" data-toggle="modal"  href="patient/deletePatientMaterial?id=<?php echo $file->id; ?>"onclick="return confirm('Are you sure you want to delete this item?');"><i class="fe fe-trash-2"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="px-5 pb-5 text-center">
                                                <!-- <img src="<?php echo base_url('public/assets/images/files/file2.png'); ?>" alt="img" class="w-80 mx-auto"> -->
                                                <?php $ext = pathinfo($file->url, PATHINFO_EXTENSION); ?>
                                                <?php if ($ext === 'pdf'){ ?>
                                                    <div class="panel-body text-center">
                                                        <a class="example-image-link" href="<?php echo $file->url; ?>" target="_blank">
                                                            <img class="example-image" src="uploads/PDF_DefaultImage.png" alt="image-1" width="120" height="120"/>
                                                        </a>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="panel-body text-center">
                                                        <a class="example-image-link" href="<?php echo $file->url; ?>" data-lightbox="example-1" target="_blank">
                                                            <img class="example-image" src="<?php echo $file->url; ?>" alt="image-1" width="120" height="120"/>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                                <h6 class="mb-1 font-weight-bold mt-4">
                                                    <?php
                                                    if (!empty($file->title)) {
                                                        echo $file->title;
                                                    }
                                                    ?>
                                                </h6>
                                                <p class="text-dark">
                                                    <?php echo lang('uploader') . ': '; ?>
                                                    <?php
                                                    if (!empty($file->created_user_id)) {
                                                        echo $this->hospital_model->getIonUserById($file->created_user_id)->username;
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>
                                                </p>
                                                <p class="text-muted">
                                                    <?php
                                                    if (!empty($file->created_at)) {
                                                        $utcdate = date($settings->date_format_long, strtotime($file->created_at.' UTC'));
                                                        echo $utcdate;
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

        <!--File-Uploads Js-->
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.ui.widget.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.iframe-transport.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fancy-fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/fancy-uploader.js'); ?>"></script>

        <!-- File uploads js -->
        <script src="<?php echo base_url('public/assets/plugins/fileupload/js/dropify.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/filupload.js'); ?>"></script>

        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">

        $(document).ready(function () {
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
        });
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