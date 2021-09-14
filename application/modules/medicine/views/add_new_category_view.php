<!--sidebar end--> 
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <header class="panel-heading">
                            <?php
                            if (!empty($medicine->id))
                                echo lang('edit_medicine_category');
                            else
                                echo lang('add_medicine_category');
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="medicine/addNewCategory" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1"> <?php  echo lang('category'); ?> <?php  echo lang('name'); ?> </label>
                                    <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='<?php
                                    if (!empty($medicine->category)) {
                                        echo $medicine->category;
                                    }
                                    ?>' placeholder="">    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php  echo lang('description'); ?></label>
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                    if (!empty($medicine->description)) {
                                        echo $medicine->description;
                                    }
                                    ?>' placeholder="">
                                </div>
                                <input type="hidden" name="id" value='<?php
                                if (!empty($medicine->id)) {
                                    echo $medicine->id;
                                }
                                ?>'>
                                <button type="submit" name="submit" class="btn btn-info pull-right"> <?php  echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
