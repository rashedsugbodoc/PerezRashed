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
                        if (!empty($service->id))
                            echo lang('edit_service');  
                        else
                            echo lang('add_service');
                        ?>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <?php echo validation_errors(); ?>
                                <form role="form" action="finance/addPaymentCategory" class="clearfix" method="post" enctype="multipart/form-data">
                                    <div class="form-group"> 
                                        <label for="exampleInputEmail1"><?php echo lang('service'); ?> <?php echo lang('name'); ?></label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('name');
                                        }
                                        if (!empty($service->category)) {
                                            echo $service->category;
                                        }
                                        ?>' placeholder="">    
                                    </div> 

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('description');
                                        }
                                        if (!empty($service->description)) {
                                            echo $service->description;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('price'); ?></label>
                                        <input type="text" class="form-control" name="c_price" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('c_price');
                                        }
                                        if (!empty($service->c_price)) {
                                            echo $service->c_price;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('doctors_commission'); ?> <?php echo lang('rate'); ?> (%)</label>
                                        <input type="text" class="form-control" name="d_commission" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('d_commission');
                                        }
                                        if (!empty($service->d_commission)) {
                                            echo $service->d_commission;
                                        }
                                        ?>' placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('category'); ?></label>
                                        <select class="form-control m-bot15 js-example-basic-single" name="category_id" value=''>
                                            <option value=""><?php echo lang('select_category');?></option>
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?php echo $category->id; ?>" <?php
                                                if (!empty($setval)) {
                                                    if ($category->id == set_value('category_id')) {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($service->category_id)) {
                                                    if ($category->id == $service->category_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > <?php echo $category->category; ?> </option>
                                                    <?php } ?> 
                                        </select>
                                    </div>

                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($service->id)) {
                                        echo $service->id;
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
