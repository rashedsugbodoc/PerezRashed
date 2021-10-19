
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('transactions'); ?> <?php echo lang('under'); ?> <strong style="color: #009988; text-transform: capitalize;" ><?php echo lang('all_accounts'); ?></strong> (<?php echo lang('today'); ?>)
            </header>
            <div class="panel-body">
                <header class="panel-heading">
                    <?php echo lang('todays'); ?> <?php echo lang('report'); ?>
                </header>
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th class="option_th" style="width: 20%"><?php echo lang('payer_account'); ?></th>
                                <th class="option_th" style="width: 20%"><?php echo lang('bill_amount'); ?></th>
                                <th class="option_th" style="width: 20%"><?php echo lang('payment_received'); ?></th>
                                <th class="option_th" style="width: 20%"><?php echo lang('due_amount'); ?></th>
                                <th class="option_th no-print" style="width: 20%"><?php echo lang('options'); ?></th>
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
                                width:33%;
                            }
                            .clearfix{
                                margin-bottom: 50px;
                            }
                        </style>
                        <?php foreach ($companies as $company) { ?>
                            <tr class="">
                                <td><?php echo $company->name; ?></td>
                                <td><?php echo $settings->currency; ?><?php
                                    $total = array();
                                    $ot_total = array();

                                    $company_id = $company->id;
                                    foreach ($payments as $payment) {
                                        if ($payment->company_id == $company_id) {
                                            $total[] = $payment->gross_total;
                                        }
                                    }
                                    foreach ($ot_payments as $ot_payment) {
                                        if ($ot_payment->company_id == $company_id) {
                                            $ot_total[] = $ot_payment->gross_total;
                                        }
                                    }

                                    $total = array_sum($total);
                                    if (empty($total)) {
                                        $total = 0;
                                    }

                                    $ot_total = array_sum($ot_total);
                                    if (empty($ot_total)) {
                                        $ot_total = 0;
                                    }

                                    echo $bill_total = $total + $ot_total;
                                    ?>
                                </td>
                                <td><?php echo $settings->currency; ?><?php
                                    $deposit_total = array();
                                    foreach ($deposits as $deposit) {
                                        if ($deposit->user == $accountant_ion_user_id) {
                                            $deposit_total[] = $deposit->deposited_amount;
                                        }
                                    }

                                    $deposit_total = array_sum($deposit_total);
                                    if (empty($deposit_total)) {
                                        $deposit_total = 0;
                                    }
                                    echo $deposit_total;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $bill_total - $deposit_total; ?>
                                </td>
                                <td class="no-print">
                                    <a class="btn btn-info btn-xs" style="width: 100px;" href="finance/allAccountActivityReport?account=<?php echo $company_id; ?>"><i class="fa fa-info"></i> Details</a>
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
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4],
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

<script>
    $(document).ready(function () {
        $('#editable-samplee').DataTable();
    });
</script>




