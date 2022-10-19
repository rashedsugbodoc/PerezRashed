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
                                            <?php echo lang('prescription'); ?>
                                        </div>
                                        <div class="card-options">
                                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                                                <a class="btn btn-info" data-toggle="modal" href="#myModa3">
                                                    <i class="fa fa-plus"> </i> <?php echo lang('add_new'); ?> 
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo lang('date'); ?></th>
                                                    <th> <?php echo lang('patient'); ?></th>
                                                    <th> <?php echo lang('medicine'); ?></th>
                                                    <th> <?php echo lang('options'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($prescriptions as $prescription) { ?>
                                                    <tr class="">
                                                        <td><?php echo date('Y-m-d', strtotime($prescription->prescription_date.' UTC')); ?></td>
                                                        <td> <?php echo $this->patient_model->getPatientById($prescription->patient)->name; ?></td>
                                                        <td>

                                                            <?php
                                                            if (!empty($prescription->medicine)) {
                                                                $medicine = explode('###', $prescription->medicine);

                                                                foreach ($medicine as $key => $value) {
                                                                    $medicine_id = explode('***', $value);
                                                                    $medicine_name_with_dosage = $this->medicine_model->getMedicineById($medicine_id[0])->name . ' -' . $medicine_id[1];
                                                                    $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . ' Days<br>';
                                                                    rtrim($medicine_name_with_dosage, ',');
                                                                    echo '<p>' . $medicine_name_with_dosage . '</p>';
                                                                }
                                                            }
                                                            ?>


                                                        </td>
                                                        <td>
                                                            <a class="btn btn-info" href="prescription/viewPrescription?id=<?php echo $prescription->prescription_number; ?>"><i class="fa fa-file-text-o"></i> <?php echo lang('details'); ?></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $current_user = $this->ion_auth->get_user_id();
                        if ($this->ion_auth->in_group('Doctor')) {
                            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
                        }
                        ?>

                        <!-- Add Prescription Modal-->
                        <div class="modal fade" id="myModa3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">  
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title"><i class="fa fa-plus"></i> <?php echo lang('add_prescription'); ?></h4>
                                    </div> 
                                    <div class="modal-body">
                                        <form role="form" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-md-12">
                                                <input type="hidden" class="form-control form-control-inline input-medium default-date-picker" name="doctor" id="exampleInputEmail1" value='<?php
                                                if (!empty($doctor_id)) {
                                                    echo $doctor_id;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                                <select class="form-control m-bot15 js-example-basic-single" name="patient" value=''> 
                                                    <option value="">Select .....</option>
                                                    <?php foreach ($patients as $patientss) { ?>
                                                        <option value="<?php echo $patientss->id; ?>" <?php
                                                        if (!empty($prescription->patient)) {
                                                            if ($prescription->patient == $patientss->id) {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> ><?php echo $patientss->name; ?> </option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo lang('history'); ?></label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="symptom" value="" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo lang('medication'); ?></label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="medicine" value="" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="note" value="" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                                            <input type="hidden" name="id" value=''>
                                            <section class="">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </section>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- Add Prescription Modal-->


                        <!-- Edit Prescription Modal-->
                        <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">  
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title"><i class="fa fa-plus"></i> <?php echo lang('edit_prescription'); ?></h4>
                                    </div> 
                                    <div class="modal-body">
                                        <form role="form" id="prescriptionEditForm" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-md-12">
                                                <input type="hidden" class="form-control form-control-inline input-medium default-date-picker" name="doctor" id="exampleInputEmail1" value='' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                                <select class="form-control m-bot15" name="patient" value=''> 
                                                    <option value="">Select .....</option>
                                                    <?php foreach ($patients as $patientss) { ?>
                                                        <option value="<?php echo $patientss->id; ?>" <?php
                                                        if (!empty($prescription->patient)) {
                                                            if ($prescription->patient == $patientss->id) {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> ><?php echo $patientss->name; ?> </option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo lang('history'); ?></label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" id="editor1" name="symptom" value="" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo lang('medication'); ?></label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" id="editor2" name="medicine" value="" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" id="editor3" name="note" value="" rows="10"></textarea>
                                                </div>
                                            </div>


                                            <input type="hidden" name="id" value=''>
                                            <section class="">
                                                <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                            </section>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- Edit Prescription Modal-->

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

        <!-- INTERNAL JS INDEX END -->
    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".editPrescription").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $('#myModal5').modal('show');
                $.ajax({
                    url: 'prescription/editPrescriptionByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var de = response.prescription.date * 1000;
                        var d = new Date(de);
                        var da = (d.getDate() + 1) + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                        // Populate the form fields with the data returned from server
                        $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                        $('#prescriptionEditForm').find('[name="date"]').val(da).end()
                        // Populate the form fields with the data returned from server
                        $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                        $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                        CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                        CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                        CKEDITOR.instances['editor3'].setData(response.prescription.note)
                    }
                });
            });
        });
    </script>


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
                                    title: '<?php echo lang('prescription'); ?>',
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    title: '<?php echo lang('prescription'); ?>',
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    }
                                },
                                {
                                    extend: 'csvHtml5',
                                    title: '<?php echo lang('prescription'); ?>',
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    }
                                },
                                {
                                    extend: 'pdfHtml5',
                                    title: '<?php echo lang('prescription'); ?>',
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                    orientation: 'portrait',
                                    pageSize: 'LEGAL'
                                },
                                {
                                    extend: 'print',
                                    title: '<?php echo lang('prescription'); ?>',
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

    </body>
</html> 