<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-7 col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <?php
                    if (!empty($receptionist->id))
                        echo lang('edit_receptionist');
                    else
                        echo lang('add_receptionist');
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
                    <form role="form" action="receptionist/addNew" method="post" enctype="multipart/form-data">
                        <div class="form-group">


                            <label for="exampleInputEmail1"> <?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('name');
                            }
                            if (!empty($receptionist->name)) {
                                echo $receptionist->name;
                            }
                            ?>' placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('email'); ?></label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('email');
                            }
                            if (!empty($receptionist->email)) {
                                echo $receptionist->email;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('password'); ?></label>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('address'); ?></label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('address');
                            }
                            if (!empty($receptionist->address)) {
                                echo $receptionist->address;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('phone'); ?></label>
                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('phone');
                            }
                            if (!empty($receptionist->phone)) {
                                echo $receptionist->phone;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('image'); ?></label>
                            <input type="file" name="img_url">
                        </div>

                        <input type="hidden" name="id" value='<?php
                        if (!empty($receptionist->id)) {
                            echo $receptionist->id;
                        }
                        ?>'>


                        <button type="submit" name="submit" class="btn btn-primary"> <?php echo lang('submit'); ?></button>
                    </form>

                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editReceptionistForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'receptionist/editReceptionistByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editReceptionistForm').find('[name="id"]').val(response.receptionist.id).end()
                $('#editReceptionistForm').find('[name="name"]').val(response.receptionist.name).end()
                $('#editReceptionistForm').find('[name="password"]').val(response.receptionist.password).end()
                $('#editReceptionistForm').find('[name="email"]').val(response.receptionist.email).end()
                $('#editReceptionistForm').find('[name="address"]').val(response.receptionist.address).end()
                $('#editReceptionistForm').find('[name="phone"]').val(response.receptionist.phone).end()
            });
        });
    });
</script>


