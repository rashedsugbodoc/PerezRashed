<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <section class="col-md-6 col-sm-12">
                <div class="panel">
                    <header class="panel-heading">
                        <?php
                        if (!empty($category->id))
                            echo lang('edit_service_category');
                        else
                            echo lang('add_service_category');
                        ?>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table "> 
                            <div class="clearfix">
                                <?php echo validation_errors(); ?>
                                <form role="form" action="finance/addServiceCategory" class="clearfix" method="post" enctype="multipart/form-data">
                                    <div class="form-group"> 
                                        <label for="exampleInputEmail1"><?php echo lang('category'); ?></label>
                                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('category');
                                        }
                                        if (!empty($category->category)) {
                                            echo $category->category;
                                        }
                                        ?>' placeholder="">    
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('description');
                                        }
                                        if (!empty($category->description)) {
                                            echo $category->description;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($category->id)) {
                                        echo $category->id;
                                    }
                                    ?>'>
                                    <div class="form-group cl-md-12">
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
