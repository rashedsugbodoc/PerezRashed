<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <section class="col-md-7 col-sm-12">
                <div class="panel">
                    <header class="panel-heading">
                        <?php
                        if (!empty($admission->id))
                            echo lang('edit_admission');
                        else
                            echo lang('add_admission');
                        ?>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <?php echo validation_errors(); ?>
                                <form role="form" action="admission/addAdmission" class="clearfix row" method="post" enctype="multipart/form-data">

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1"><?php echo lang('bed_id'); ?></label>
                                        <select class="form-control m-bot15" name="bed_id" value=''>
                                            <?php foreach ($beds as $bed) { ?>
                                                <option value="<?php echo $bed->bed_id; ?>" <?php
                                                if (!empty($admission->bed_id)) {
                                                    if ($admission->bed_id == $bed->bed_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > <?php echo $bed->bed_id; ?> </option>
                                                    <?php } ?> 
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                        <select class="form-control m-bot15" id="patientchoose" name="patient" value=''> 
                                         
                                        </select>
                                    </div>

                                   <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1"><?php echo lang('alloted_time'); ?></label>
                                        <div data-date="" class="input-group date form_datetime-meridian">
                                            <div class="input-group-btn"> 
                                                <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                            </div>
                                            <input type="text" class="form-control" readonly="" name="a_time" id="exampleInputEmail1" value='<?php
                                            if (!empty($admission->a_time)) {
                                                echo $admission->a_time;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1"><?php echo lang('discharge_time'); ?></label>
                                        <div data-date="" class="input-group date form_datetime-meridian">
                                            <div class="input-group-btn"> 
                                                <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                            </div>
                                            <input type="text" class="form-control" name="d_time" id="exampleInputEmail1" value='<?php
                                            if (!empty($admission->d_time)) {
                                                echo $admission->d_time;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($admission->id)) {
                                        echo $admission->id;
                                    }
                                    ?>'>

                                    <div class="form-group col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                    </div>

                                </form>
                            </div>
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
        $("#patientchoose").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
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