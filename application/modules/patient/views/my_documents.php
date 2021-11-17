<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('patient'); ?>  <?php echo lang('documents'); ?> 
                <div class="col-md-4 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal1">
                        <div class="btn-group pull-right">
                            <button id="" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header> 
            <div class="">
                <div class="">
                    <div class="adv-table editable-table panel-body">
                        <?php echo validation_errors(); ?>
                        <?php
                            $file_error = $this->session->flashdata('fileError');

                            if(!empty($file_error)) {
                                echo $file_error;
                            }else{

                            }
                        ?>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('date'); ?></th>
                                    <th><?php echo lang('patient'); ?></th>
                                    <th><?php echo lang('description'); ?></th>
                                    <th style="width: 20%;"><?php echo lang('document'); ?></th>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($files as $file) { ?>
                                    <?php $patient_info = $this->db->get_where('patient', array('id' => $file->patient))->row(); ?>

                                    <tr class="">

                                        <td>
                                            <?php
                                            echo date('d-m-y', $file->date);
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $file->title;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (pathinfo($file->url, PATHINFO_EXTENSION) === 'pdf') {
                                                echo   '<a class="example-image-link" href="'. $file->url .'" data-title="'. $file->title .'" target="_blank">'. '<img class="example-image" src="uploads/PDF_DefaultImage.png" width="auto" height="auto"alt="image-1"style="max-width:150px;max-height:150px">'.'</a>'  ;
                                            } else {
                                                echo   '<a class="example-image-link" href="'. $file->url .'" data-lightbox="example-1" data-title="'. $file->title .'">'. '<img class="example-image" src="' . $file->url . '" width="auto" height="auto"alt="image-1"style="max-width:150px;max-height:150px">'.'</a>'  ;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo '<a class="btn btn-info btn-xs" href="' . $file->url . '" download> ' . lang('download') . ' </a>';
                                            ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->




<!-- Add Patient Material Modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add'); ?> <?php echo lang('files'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addPatientMaterial" class="clearfix" method="post" enctype="multipart/form-data">

                 
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('title'); ?></label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('file'); ?></label>
                        <input type="file" name="img_url">
                        <span class="help-block"><?php echo lang('recommended_size'); ?> : <strong>3000 x 2024</strong></span>
                        <span class="help-block"><?php echo lang('upload_either_types'); ?> <?php echo lang('max_size_of'); ?> <strong>10 MB</strong></span>
                    </div>
                    <input type="hidden" name="redirect" value='patient/myDocuments'>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->


<script src="common/js/coderygel.min.js"></script>






<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,
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
                        columns: [0, 1, 2, 3],
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
               "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            },

        });

        table.buttons().container()
                .appendTo('.custom_buttons');
    });
</script>
