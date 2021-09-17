<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <section class="col-md-6">
                <div class="panel">
                    <header class="panel-heading">
                        <?php
                        if (!empty($notice->id))
                            echo lang('edit_notice');
                        else
                            echo lang('add_notice');
                        ?>
                    </header>
                    <style>
                        .des{
                            padding-left: 0px !important;
                            padding-right: 0px !important;
                        }
                    </style>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="col-lg-12">
                                    <?php echo validation_errors(); ?>
                                    <?php echo $this->session->flashdata('feedback'); ?>
                                </div>
                                <form role="form" action="notice/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                    <div class="form-group col-md-6">
                                        <div class="row">
                                            <label for="exampleInputEmail1"> <?php echo lang('title'); ?></label>
                                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                            if (!empty($notice->name)) {
                                                echo $notice->name;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="row">
                                            <label for="exampleInputEmail1">Notice For</label>
                                            <select class="form-control m-bot15" name="type" value=''>
                                                <option value="patient" <?php
                                                if (!empty($notice->type)) {
                                                    if ($notice->type == 'patient') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>><?php echo lang('patient'); ?></option>
                                                <option value="staff" <?php
                                                if (!empty($notice->type)) {
                                                    if ($notice->type == 'staff') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>><?php echo lang('staff'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <label for="description"><?php echo lang('description'); ?></label>
                                            <div class="">
                                                <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <label for="date"> <?php echo lang('date'); ?></label>
                                            <input type="text" class="form-control default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="" readonly="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($notice->id)) {
                                        echo $notice->id;
                                    }
                                    ?>'>
                                    <button type="submit" name="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- page end-->
</section>

<!--main content end-->
<!--footer start-->
