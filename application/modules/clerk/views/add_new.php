<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-7 col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <?php
                    if (!empty($nurse->id))
                        echo lang('edit_nurse');
                    else
                        echo lang('add_nurse');
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
                    <form role="form" action="nurse/addNew" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('name');
                            }
                            if (!empty($nurse->name)) {
                                echo $nurse->name;
                            }
                            ?>'>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('email');
                            }
                            if (!empty($nurse->email)) {
                                echo $nurse->email;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('address');
                            }
                            if (!empty($nurse->address)) {
                                echo $nurse->address;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('phone');
                            }
                            if (!empty($nurse->phone)) {
                                echo $nurse->phone;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                            <input type="file" name="img_url">
                        </div>

                        <input type="hidden" name="id" value='<?php
                        if (!empty($nurse->id)) {
                            echo $nurse->id;
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
