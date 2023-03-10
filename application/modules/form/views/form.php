
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <section class="col-md-5 no-print">
                <div class="panel">
                    <header class="panel-heading no-print">
                        <?php
                        if (!empty($form_single->id))
                            echo lang('edit_form_report');
                        else
                            echo lang('add_form_report');
                        ?>
                    </header>
                    <div class="no-print">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <?php echo validation_errors(); ?>
                                <form role="form" id="editFormForm" class="clearfix" action="form/addForm" method="post" enctype="multipart/form-data">

                                    <div class="">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                            <input type="text" class="form-control pay_in default-date-picker" name="date" value='<?php
                                            if (!empty($form_single->date)) {
                                                echo date('d-m-Y', $form_single->date);
                                            } else {
                                                echo date('d-m-Y');
                                            }
                                            ?>' placeholder="">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                            <select class="form-control m-bot15 pos_select" id="pos_select" name="patient" value=''> 
                                                 <?php if (!empty($form_single->patient)) { ?>
                                                    <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div> 

                                        <div class="pos_client">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_name" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_email" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_phone" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_age" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <select class="form-control m-bot15" name="p_gender" value=''>

                                                            <option value="Male" <?php
                                                            if (!empty($patients->sex)) {
                                                                if ($patients->sex == 'Male') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Male </option>   
                                                            <option value="Female" <?php
                                                            if (!empty($patients->sex)) {
                                                                if ($patients->sex == 'Female') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Female </option>
                                                            <option value="Others" <?php
                                                            if (!empty($patients->sex)) {
                                                                if ($patients->sex == 'Others') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Others </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">
                                                <?php echo lang('template'); ?>
                                            </label>
                                            <select class="form-control m-bot15 js-example-basic-multiple template" id="template" name="template" value=''> 
                                                <option value="">Select .....</option>
                                                <?php foreach ($templates as $template) { ?>
                                                    <option value="<?php echo $template->id; ?>"><?php echo $template->name; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"> <?php echo lang('refd_by_doctor'); ?></label> 
                                            <select class="form-control m-bot15  add_doctor" id="add_doctor" name="doctor" value=''>  
                                              <?php if (!empty($form_single->doctor)) { ?>
                                                    <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="pos_doctor">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('name'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="d_name" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 form_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('email'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="d_email" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('phone'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="d_phone" value='' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                            <input type="text" class="form-control" name="form_name" value='<?php
                                            if (!empty($form_single->name)) {
                                                echo $form_single->name;
                                            }
                                            ?>' placeholder="<?php echo lang('form_report_name'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1"> <?php echo lang('report'); ?></label>
                                        <textarea class="ckeditor form-control" id="editor" name="report" value="" rows="10"><?php
                                            if (!empty($setval)) {
                                                echo set_value('report');
                                            }
                                            if (!empty($form_single->report)) {
                                                echo $form_single->report;
                                            }
                                            ?>
                                        </textarea>
                                    </div>

                                    <input type="hidden" name="redirect" value="<?php
                                    if (!empty($form_single)) {
                                        echo 'form?id=' . $form_single->id;
                                    } else {
                                        echo 'form';
                                    }
                                    ?>">

                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($form_single->id)) {
                                        echo $form_single->id;
                                    }
                                    ?>'>

                                    <div class="col-md-12 form"> 
                                        <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-md-7">
                <div class="panel">
                    <header class="panel-heading">
                        <?php echo lang('form_report'); ?>
                        <div class="col-md-4 no-print pull-right"> 
                            <a href="form/addFormView">
                                <div class="btn-group pull-right">
                                    <button id="" class="btn btn-primary btn-xs">
                                        <i class="fa fa-plus"></i> <?php echo lang('add_form_report'); ?>
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
                                        <th><?php echo lang('report_id'); ?></th>
                                        <th><?php echo lang('name'); ?></th>
                                        <th><?php echo lang('patient'); ?></th>
                                        <th><?php echo lang('date'); ?></th>
                                        <th class=""><?php echo lang('options'); ?></th>
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
                                    .option_th{
                                        width:18%;
                                    }

                                </style>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<script src="common/js/coderygel.min.js"></script>



<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "form/getForm",
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
                        columns: [0, 1, 2],
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
                searchPlaceholder: "Search..."
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
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
                url: 'form/getTemplateByIdByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var data = CKEDITOR.instances.editor.getData();
                if (response.template.template != null) {
                    var data1 = data + response.template.template;
                } else {
                    var data1 = data;
                }
                CKEDITOR.instances['editor'].setData(data1)
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
     
    });
</script>
