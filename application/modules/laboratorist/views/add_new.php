
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-7 col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <?php
                    if (!empty($laboratorist->id))
                        echo lang('edit_laboratorist');
                    else
                        echo lang('add_new_laboratorist');
                    ?>
                </header>
                <div class="panel-body">
                    <?php echo validation_errors(); ?>
                    <?php
                        $file_error = $this->session->flashdata('fileError');

                        if(!empty($file_error)) {
                            echo $file_error;
                        }else{

                        }
                    ?>
                    <form role="form" action="laboratorist/addNew" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('name');
                            }
                            if (!empty($laboratorist->name)) {
                                echo $laboratorist->name;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('email');
                            }
                            if (!empty($laboratorist->email)) {
                                echo $laboratorist->email;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('address');
                            }
                            if (!empty($laboratorist->address)) {
                                echo $laboratorist->address;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('phone');
                            }
                            if (!empty($laboratorist->phone)) {
                                echo $laboratorist->phone;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="img_url">
                        </div>
                        <input type="hidden" name="id" value='<?php
                        if (!empty($laboratorist->id)) {
                            echo $laboratorist->id;
                        }
                        ?>'>
                        <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </form>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
