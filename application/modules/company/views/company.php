<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('list_of_companies'); ?>    
                <div class="col-md-4 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
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
                                <th class="no-print"><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }

                        </style>



                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


<!-- Add Company Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add_company'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" action="company/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('display_name'); ?></label>
                        <input type="text" class="form-control" name="display_name" id="exampleInputEmail1" placeholder="">
                    </div>                    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('registration'); ?> <?php echo lang('number'); ?></label>
                        <input type="text" class="form-control" name="registration_number" id="exampleInputEmail1" value='' placeholder="">
                    </div>                       
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('type'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single" name="type_id" value=''>
                            <option value=""><?php echo lang('select');?></option>
                            <?php foreach ($types as $type) { ?>
                                <option value="<?php echo $type->id; ?>"> <?php echo $type->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>          
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('classification'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single" name="classification_id" value=''>
                            <option value=""><?php echo lang('select');?></option>
                            <?php foreach ($classifications as $classification) { ?>
                                <option value="<?php echo $classification->id; ?>"> <?php echo $classification->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                    </div>                                                               
                    <div class="form-group col-md-6">
                        <label class="control-label"><?php echo lang('company');?> <?php echo lang('logo');?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Company Modal-->







<!-- Edit Company Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('edit_company'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editCompanyForm" class="clearfix" action="company/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('display_name'); ?></label>
                        <input type="display_name" class="form-control" name="display_name" id="exampleInputEmail1" placeholder="">
                    </div>                    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('registration'); ?> <?php echo lang('number'); ?></label>
                        <input type="text" class="form-control" name="registration_number" id="exampleInputEmail1" value='' placeholder="">
                    </div>                           
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('type'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single type" name="type_id" value=''>
                            <option value=""><?php echo lang('select');?></option>
                            <?php foreach ($types as $type) { ?>
                                <option value="<?php echo $type->id; ?>" <?php
                                if (!empty($setval)) {
                                    if ($type->id == set_value('type_id')) {
                                        echo 'selected';
                                    }
                                }
                                if (!empty($company->type_id)) {
                                    if ($type->id == $company->type_id) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $type->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div> 
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('classification'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single classification" name="classification_id" value=''>
                            <option value=""><?php echo lang('select');?></option>
                            <?php foreach ($classifications as $classification) { ?>
                                <option value="<?php echo $classification->id; ?>" <?php
                                if (!empty($setval)) {
                                    if ($classification->id == set_value('classification_id')) {
                                        echo 'selected';
                                    }
                                }                                
                                if (!empty($company->classification_id)) {
                                    if ($classification->id == $company->classification_id) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $classification->name; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                    </div>            
                    <div class="form-group col-md-6">
                        <label class="control-label"><?php echo lang('company');?> <?php echo lang('logo');?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <input type="hidden" name="id" value=''>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->



<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('company'); ?> <?php echo lang('info'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editCompanyForm" class="clearfix" action="company/addNew" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <div class="nameClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('display_name'); ?></label>
                        <div class="displaynameClass"></div>
                    </div>                    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <div class="emailClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <div class="addressClass"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <div class="phoneClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('registration'); ?> <?php echo lang('number'); ?></label>
                        <div class="registrationClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('type'); ?></label>
                        <div class="typeClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('classification'); ?></label>
                        <div class="classificationClass"></div>
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                        <div class="profileClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img1" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            </div>

                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>






<script src="common/js/coderygel.min.js"></script>
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
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editCompanyForm').find('[name="id"]').val(response.company.id).end()
                $('#editCompanyForm').find('[name="name"]').val(response.company.name).end()
                $('#editCompanyForm').find('[name="display_name"]').val(response.company.display_name).end()
                $('#editCompanyForm').find('[name="email"]').val(response.company.email).end()
                $('#editCompanyForm').find('[name="address"]').val(response.company.address).end()
                $('#editCompanyForm').find('[name="phone"]').val(response.company.phone).end()
                $('#editCompanyForm').find('[name="type_id"]').val(response.company.type_id).end()
                $('#editCompanyForm').find('[name="classification_id"]').val(response.company.classification_id).end()
                $('#editCompanyForm').find('[name="profile"]').val(response.company.profile).end()
                $('#editCompanyForm').find('[name="registration_number"]').val(response.company.registration_number).end()
                if (typeof response.company.img_url !== 'undefined' && response.company.img_url != '') {
                    $("#img").attr("src", response.company.img_url);
                }

                $('.js-example-basic-single.type').val(response.company.type_id).trigger('change');
                $('.js-example-basic-single.classification').val(response.company.classification_id).trigger('change');

                $('#myModal2').modal('show');

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
            }).success(function (response) {
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

            });
        });
    });
</script>





<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,

            "processing": true,
            "serverSide": true,
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






