
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-8 col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <?php
                    if (!empty($companyuser->id))
                        echo '<i class="fa fa-edit"></i> ' . lang('edit_company_user');
                    else
                        echo '<i class="fa fa-plus"></i> ' . lang('add_company_user');
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
                    <form role="form" action="companyuser/addNew" method="post" enctype="multipart/form-data">
                        <div class="form-group">    
                            <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('name');
                            }
                            if (!empty($companyuser->name)) {
                                echo $companyuser->name;
                            }
                            ?>' placeholder="">   
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('email');
                            }
                            if (!empty($companyuser->email)) {
                                echo $companyuser->email;
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
                            if (!empty($companyuser->address)) {
                                echo $companyuser->address;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                            if (!empty($setval)) {
                                echo set_value('phone');
                            }
                            if (!empty($companyuser->phone)) {
                                echo $companyuser->phone;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('company'); ?></label>
                            <select class="form-control m-bot15  add_payer" id="company" name="company_id" value=''>
                                <?php if (!empty($companyuser)) { ?>
                                    <option value="<?php echo $company->id; ?>" selected="selected"><?php echo format_number_with_digits($company->id, COMPANY_ID_LENGTH). ' - '. $company->display_name; ?></option>  
                                <?php } ?>
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                            <input type="file" name="img_url">
                        </div>
                        <input type="hidden" name="id" value='<?php
                        if (!empty($companyuser->id)) {
                            echo $companyuser->id;
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

<script src="common/js/coderygel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editCompanyUserForm').trigger("reset");
            $.ajax({
                url: 'companyuser/editCompanyUserByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editCompanyUserForm').find('[name="id"]').val(response.companyuser.id).end()
                $('#editCompanyUserForm').find('[name="name"]').val(response.companyuser.name).end()
                $('#editCompanyUserForm').find('[name="password"]').val(response.companyuser.password).end()
                $('#editCompanyUserForm').find('[name="email"]').val(response.companyuser.email).end()
                $('#editCompanyUserForm').find('[name="address"]').val(response.companyuser.address).end()
                $('#editCompanyUserForm').find('[name="phone"]').val(response.companyuser.phone).end()
                
                if (response.company !== null) {
                    var option1 = new Option(response.company.name + '-' + response.company.id, response.company.id, true, true);
                } else {
                    var option1 = new Option(' ' + '-' + '', '', true, true);
                }
                $('#editCompanyUserForm').find('[name="company_id"]').append(option1).trigger('change');

                $('#myModal2').modal('show');
            });
        });
    });

</script>




<script>
    $(document).ready(function () {
        



        $("#company").select2({
            placeholder: '<?php echo lang('select_payer'); ?>',
            allowClear: true,
            ajax: {
                url: 'company/getCompanyWithoutAddNewOption',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });                
    });


</script>


<script>
    $(document).ready(function () {
        $("#company_select").select2({
            placeholder: '<?php echo lang('select_payer'); ?>',
            allowClear: true,
            ajax: {
                url: 'company/getCompanyInfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
    });
</script>
