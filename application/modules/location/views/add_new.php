<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('add_country'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">           
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo validation_errors(); ?>
                                    <form role="form" action="country/addNew" method="post">
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('name'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('name');
                                                }
                                                if (!empty($country->name)) {
                                                    echo $country->name;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-9">

                                            </div>

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('currency_code'); ?></label>
                                            <div class="col-md-9">
                                                <textarea class="ckeditor form-control" name="currency_code" value="" rows="10"><?php
                                                    if (!empty($setval)) {
                                                        echo set_value('currency_code');
                                                    }
                                                    if (!empty($country->currency_code)) {
                                                        echo $country->currency_code;
                                                    }
                                                    ?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($country->id)) {
                                            echo $country->id;
                                        }
                                        ?>'>
                                        <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
