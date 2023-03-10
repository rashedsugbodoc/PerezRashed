<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-8">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo lang('email_settings'); ?>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="email/addNewSettings" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo lang('admin'); ?> <?php echo lang('email'); ?> <?php echo lang('address'); ?></label>
                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                    if (!empty($settings->admin_email)) {
                                        echo $settings->admin_email;
                                    }
                                    ?>' placeholder="From which you want to send the email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('email_display_name'); ?></label>
                                    <input type="text" class="form-control" name="email_display_name" id="exampleInputEmail1" value='<?php
                                    if (!empty($settings->admin_email_display_name)) {
                                        echo $settings->admin_email_display_name;
                                    }
                                    ?>' placeholder="Name displayed in emails">
                                </div>

                                <code>
                                    <?php echo lang('email_settings_instruction_1')?>
                                     <br>
                                    <?php echo lang('email_settings_instruction_2')?>
                                </code>


                                <input type="hidden" name="id" value='<?php
                                if (!empty($settings->id)) {
                                    echo $settings->id;
                                }
                                ?>'>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                                </div>
                            </form>
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
