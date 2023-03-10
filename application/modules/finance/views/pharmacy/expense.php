<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php  echo lang('pharmacy'); ?> <?php  echo lang('expenses'); ?>  
                 <div class="col-md-4 no-print pull-right"> 
                    <a href="finance/pharmacy/addExpenseView">
                        <div class="btn-group pull-right">
                            <button id="" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> <?php echo lang('add_expense'); ?>
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
                                <th> <?php  echo lang('category'); ?> </th>
                                <th> <?php  echo lang('date'); ?> </th>
                                <th> <?php  echo lang('amount'); ?> </th>
                                <th> <?php  echo lang('options'); ?> </th>
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

                        <?php foreach ($expenses as $expense) { ?>
                            <tr class="">
                                <td><?php echo $expense->category; ?></td>
                                <td> <?php echo date('d/m/y', $expense->date); ?></td>
                                <td><?php echo $settings->currency; ?> <?php echo $expense->amount; ?></td>             
                                    <td>
                                        <a class="btn btn-info btn-xs editbutton" href="finance/pharmacy/editExpense?id=<?php echo $expense->id; ?>"><i class="fa fa-edit"></i>  <?php  echo lang('edit'); ?></a>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                            <a class="btn btn-danger btn-xs" href="finance/pharmacy/deleteExpense?id=<?php echo $expense->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i>  <?php  echo lang('delete'); ?></a>
                                        <?php } ?>
                                    </td>
                            </tr>
                        <?php } ?>

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




<script src="common/js/coderygel.min.js"></script>
<script>
    $(document).ready(function () {
      var table = $('#editable-sample').DataTable({
            responsive: true,

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
                                title: '<?php  echo lang('pharmacy'); ?> <?php  echo lang('expenses'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                title: '<?php  echo lang('pharmacy'); ?> <?php  echo lang('expenses'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                title: '<?php  echo lang('pharmacy'); ?> <?php  echo lang('expenses'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: '<?php  echo lang('pharmacy'); ?> <?php  echo lang('expenses'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                },
                                orientation: 'portrait',
                                pageSize: 'LEGAL'
                            },
                            {
                                extend: 'print',
                                title: '<?php  echo lang('pharmacy'); ?> <?php  echo lang('expenses'); ?>',
                                exportOptions: {
                                    columns: [0, 1, 2],
                                }
                            }
                        ]
                    }
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
<script>
                                    $(document).ready(function () {
                                        $(".flashmessage").delay(3000).fadeOut(100);
                                    });
</script>
