
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <section class="col-md-12">
                <div class="panel">
                    <header class="panel-heading">
                        <?php echo lang('forms_reports'); ?>
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
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                title: '<?php echo lang('forms_reports'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php echo lang('forms_reports'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php echo lang('forms_reports'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php echo lang('forms_reports'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                },
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php echo lang('forms_reports'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                }
                            }
                        ]
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
