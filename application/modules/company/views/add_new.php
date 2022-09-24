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
                        if (!empty($company->id))
                            echo lang('edit_account');
                        else
                            echo lang('add_account');
                        ?>
                    </header> 
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php echo validation_errors(); ?>
                                        <?php echo $this->session->flashdata('feedback'); ?> 
                                    </div>
                                </div>
                                <form role="form" action="company/addNew" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('name');
                                        }
                                        if (!empty($company->name)) {
                                            echo $company->name;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('display_name'); ?></label>
                                        <input type="text" class="form-control" name="display_name" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('display_name');
                                        }
                                        if (!empty($company->display_name)) {
                                            echo $company->display_name;
                                        }
                                        ?>' placeholder="">
                                    </div>                       
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('email');
                                        }
                                        if (!empty($company->email)) {
                                            echo $company->email;
                                        }
                                        ?>' placeholder="">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('address');
                                        }
                                        if (!empty($company->address)) {
                                            echo $company->address;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('phone');
                                        }
                                        if (!empty($company->phone)) {
                                            echo $company->phone;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('registration'); ?> <?php echo lang('number'); ?></label>
                                        <input type="text" class="form-control" name="registration_number" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('registration_number');
                                        }
                                        if (!empty($company->registration_number)) {
                                            echo $company->registration_number;
                                        }
                                        ?>' placeholder="">
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('type'); ?></label>
                                        <select class="form-control m-bot15" name="type_id" value=''>
                                            <option value=""><?php echo lang('select');?></option>
                                            <?php foreach ($types as $type) { ?>
                                                <option value="<?php echo $type->id; ?>" <?php
                                                if (!empty($setval)) {
                                                    if ($type->id == set_value('type_id')) {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($company->type_id)) {
                                                    if ($type->id == $company->type_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > <?php echo $type->name; ?> </option>
                                                    <?php } ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('classification'); ?></label>
                                        <select class="form-control m-bot15" name="classification_id" value=''>
                                            <option value=""><?php echo lang('select');?></option>
                                            <?php foreach ($classifications as $classification) { ?>
                                                <option value="<?php echo $classification->id; ?>" <?php
                                                if (!empty($setval)) {
                                                    if ($classification->id == set_value('classification_id')) {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($company->classification_id)) {
                                                    if ($classification->id == $company->classification_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > <?php echo $classification->name; ?> </option>
                                                    <?php } ?> 
                                        </select>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='<?php
                                        if (!empty($setval)) {
                                            echo set_value('profile');
                                        }
                                        if (!empty($company->profile)) {
                                            echo $company->profile;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                        <input type="file" name="img_url">
                                    </div>
                                    <input type="hidden" name="id" value='<?php
                                    if (!empty($company->id)) {
                                        echo $company->id;
                                    }
                                    ?>'>
                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
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
