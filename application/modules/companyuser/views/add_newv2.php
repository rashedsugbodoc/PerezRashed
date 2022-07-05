<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <section id="main-content">
                            <section class="wrapper site-min-height">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php
                                            if (!empty($card_header)) {
                                                echo '<i class="fa fa-edit"></i> ' . $card_header;
                                            } else {
                                                if (!empty($companyuser->id)) {
                                                    echo '<i class="fa fa-edit"></i> ' . lang('edit_company_user');
                                                } else {
                                                    echo '<i class="fa fa-plus"></i> ' . lang('add_company_user');
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <form role="form" id="companyuserForm" action="companyuser/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <?php echo validation_errors(); ?>
                                            <?php
                                                $file_error = $this->session->flashdata('fileError');

                                                if(!empty($file_error)) {
                                                    echo $file_error;
                                                }else{

                                                }
                                            ?>
                                            
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('name'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="name" id="name" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('name');
                                                        }
                                                        if (!empty($companyuser->name)) {
                                                            echo $companyuser->name;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('email'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="email" id="email" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('email');
                                                        }
                                                        if (!empty($companyuser->email)) {
                                                            echo $companyuser->email;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('password'); ?></label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('phone'); ?><span class="text-red">*</span></label>
                                                        <form>
                                                            <input id="phone" class="form-control" name="phone" id="phone" value="<?php
                                                            if (!empty($setval)) {
                                                                echo set_value('phone');
                                                            }
                                                            if (!empty($companyuser->phone)) {
                                                                echo $companyuser->phone;
                                                            }
                                                            ?>" type="tel" maxlength="20" required>
                                                         </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('address'); ?> <span class="text-red">*</span></label>
                                                        <input type="text" name="address" id="address" class="form-control" value="<?php
                                                        if (!empty($setval)) {
                                                            echo set_value('address');
                                                        }
                                                        if (!empty($companyuser->address)) {
                                                            echo $companyuser->address;
                                                        }
                                                        ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2" name="country_id" id="country" required data-placeholder="<?php echo lang('country_placeholder'); ?>">
                                                            <option label="<?php echo lang('country_placeholder'); ?>"></option>
                                                            <?php foreach ($countries as $country) { ?>
                                                                <option value="<?php echo $country->id ?>" <?php
                                                                if (!empty($companyuser->country_id)) {
                                                                    if ($country->id == $companyuser->country_id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>><?php echo $country->name ?></option>
                                                            <?php } ?>
                                                        </select>   
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('state_province'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2" name="state_id" id="state" value='' required disabled data-placeholder="<?php echo lang('state_province_placeholder'); ?>">
                                                            <option label="<?php echo lang('state_province_placeholder'); ?>"></option>
                                                        </select>    
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('city_municipality'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2" name="city_id" id="city" value='' required disabled data-placeholder="<?php echo lang('city_municipality_placeholder'); ?>">
                                                            <option label="<?php echo lang('city_municipality_placeholder'); ?>"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6" id="barangayDiv">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                        <select class="form-control select2" name="barangay_id" id="barangay" value='' disabled data-placeholder="<?php echo lang('barangay_placeholder'); ?>">
                                                            <option label="<?php echo lang('barangay_placeholder'); ?>"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('postal'); ?></label>
                                                        <input type="text" name="postal" class="form-control" value="<?php
                                                            if (!empty($companyuser->postal)) {
                                                                echo $companyuser->postal;
                                                            }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"> <?php echo lang('company'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2" name="company_id" id="company" value='' required data-placeholder="<?php echo lang('select').' '.lang('company'); ?>">
                                                            <option label="<?php echo lang('select').' '.lang('company'); ?>"></option>
                                                            <?php foreach ($companies as $company) { ?>
                                                                <option value="<?php echo $company->id ?>" <?php
                                                                if (!empty($companyuser->id)) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $company->display_name ?></option>
                                                            <?php } ?>
                                                        </select>        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Scope Level <span class="text-red">*</span></label>
                                                        <select class="form-control" name="scope_level" id="selectScopeLevel" data-placeholder="Choose one" required>
                                                            <option label="Choose one"></option>
                                                            <option value="country">Country</option>
                                                            <option value="state">State / Province</option>
                                                            <option value="city">City</option>
                                                            <option value="barangay">Barangay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Scope</label>
                                                        <select class="form-control select2" name="scope[]" id="<?php echo $id?'editScope':'selectScope' ?>" multiple>
                                                            <!-- <?php foreach($scopes as $scope) { ?>
                                                                <option value="<?php echo $scope->id ?>" selected><?php echo $scope->statename.' ('.$scope->countryname.')'; ?></option>
                                                            <?php } ?> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <label class="form-label"><?php echo lang('image'); ?></label>
                                                    <input type="file" name="img_url" id="img" class="dropify" data-default-file="<?php if(!empty($companyuser->img_url)) echo $companyuser->img_url; ?>"/>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="companyuser_id" value='<?php
                                            if (!empty($companyuser->id)) {
                                                echo $companyuser->id;
                                            }
                                            ?>'>
                                            <input type="hidden" name="holder" id="holder" value="1">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <button class="btn btn-primary pull-right" name="submit" id="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </section>

                    </div>
                </div>
            </div>

            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            Copyright © 2021 <a href="#">Rygel Dash</a>. Deployed by <a href="#">Rygel Technology Solutions</a> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->
        </div>

        <!-- Back to top -->
        <a href="#top" id="back-to-top">
            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
        </a>

    <!-- INTERNAL JS INDEX START -->

        <!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>

        <!-- Bootstrap4 js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!--Othercharts js-->
        <script src="<?php echo base_url('public/assets/plugins/othercharts/jquery.sparkline.min.js'); ?>"></script>

        <!-- Circle-progress js-->
        <script src="<?php echo base_url('public/assets/js/vendors/circle-progress.min.js'); ?>"></script>

        <!-- Jquery-rating js-->
        <script src="<?php echo base_url('public/assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

        <!--Sidemenu js-->
        <script src="<?php echo base_url('public/assets/plugins/sidemenu/sidemenu.js'); ?>"></script>

        <!-- P-scroll js-->
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scroll1.js'); ?>"></script>

        <!-- Custom js-->
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <!--Moment js-->
        <script src="<?php echo base_url('public/assets/plugins/moment/moment.js') ?>"></script>

        <!-- Daterangepicker js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/js/daterange.js') ?>"></script>

        <!-- Data tables js-->
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/dataTables.bootstrap4.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/dataTables.buttons.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/jszip.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/pdfmake.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/vfs_fonts.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.html5.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.print.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/js/buttons.colVis.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/dataTables.responsive.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/datatable/responsive.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('public/assets/js/datatables.js') ?>"></script>

        <!--Select2 js -->
        <script src="<?php echo base_url('public/assets/plugins/select2/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/select2.js'); ?>"></script>

        <!-- Timepicker js -->
        <script src="<?php echo base_url('public/assets/plugins/time-picker/jquery.timepicker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/time-picker/toggles.min.js'); ?>"></script>

        <!-- Datepicker js -->
        <script src="<?php echo base_url('public/assets/plugins/date-picker/date-picker.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/date-picker/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/input-mask/jquery.maskedinput.js'); ?>"></script>

        <!--File-Uploads Js-->
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.ui.widget.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.iframe-transport.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/jquery.fancy-fileupload.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/fancyuploder/fancy-uploader.js'); ?>"></script>

        <!-- File uploads js -->
        <script src="<?php echo base_url('public/assets/plugins/fileupload/js/dropify.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/filupload.js'); ?>"></script>

        <!-- Multiple select js -->
        <script src="<?php echo base_url('public/assets/plugins/multipleselect/multiple-select.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/multipleselect/multi-select.js'); ?>"></script>

        <!--Sumoselect js-->
        <script src="<?php echo base_url('public/assets/plugins/sumoselect/jquery.sumoselect.js'); ?>"></script>

        <!--intlTelInput js-->
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/intlTelInput.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/country-select.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/intl-tel-input-master/utils.js'); ?>"></script>

        <!--jquery transfer js-->
        <script src="<?php echo base_url('public/assets/plugins/jQuerytransfer/jquery.transfer.js'); ?>"></script>

        <!--multi js-->
        <script src="<?php echo base_url('public/assets/plugins/multi/multi.min.js'); ?>"></script>

        <!-- Form Advanced Element -->
        <script src="<?php echo base_url('public/assets/js/formelementadvnced.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-elements.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/file-upload.js'); ?>"></script>

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {
                var name = $('#name').parsley();
                var email = $('#email').parsley();
                var phone = $('#phone').parsley();
                var address = $('#address').parsley();
                var country = $('#country').parsley();
                var state = $('#state').parsley();
                var city = $('#city').parsley();
                var company = $('#company').parsley();
                var scope_level = $('#selectScopeLevel').parsley();

                if (name.isValid() && email.isValid() && phone.isValid() && address.isValid() && country.isValid() && state.isValid() && city.isValid() && company.isValid() && scope_level.isValid()) {
                    return true;
                } else {
                    name.validate();
                    email.validate();
                    phone.validate();
                    address.validate();
                    country.validate();
                    state.validate();
                    city.validate();
                    company.validate();
                    scope_level.validate();
                }
            })
        })
    </script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //     $("#company_select").select2({
        //         placeholder: '<?php echo lang('select_payer'); ?>',
        //         allowClear: true,
        //         ajax: {
        //             url: 'companyuser/getCompanyInfo',
        //             type: "post",
        //             dataType: 'json',
        //             delay: 250,
        //             data: function (params) {
        //                 return {
        //                     searchTerm: params.term // search term
        //                 };
        //             },
        //             processResults: function (response) {
        //                 return {
        //                     results: response
        //                 };
        //             },
        //             cache: true
        //         }

        //     });
        // });
    </script>

    <script type="text/javascript">
        // $(document).ready(function () {
            $("#selectScopeLevel").change(function() {
                var scope_level = $("#selectScopeLevel").val();
                var country = $("#country").val();
                var holder = parseInt($("#holder").val());

                if (holder > 1) {
                    $("#selectScope").find('option').remove();
                    $("#editScope").find('option').remove();
                }

                if (scope_level == "country") {
                    $("#holder").val(holder+1);
                    $("#selectScope").select2({
                        placeholder: 'Search Country',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getCountryInfo',
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
                    $("#editScope").select2({
                        placeholder: 'Search Country',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getCountryInfo',
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
                } if (scope_level == "state") {
                    $("#holder").val(holder+1);
                    $("#selectScope").select2({
                        placeholder: 'Search State',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getStateInfo?country=' + country,
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
                    $("#editScope").select2({
                        placeholder: 'Search State',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getStateInfo?country=' + country,
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
                } if (scope_level == "city") {
                    $("#holder").val(holder+1);
                    $("#selectScope").select2({
                        placeholder: 'Search City',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getCityInfo?country=' + country,
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
                    $("#editScope").select2({
                        placeholder: 'Search City',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getCityInfo?country=' + country,
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
                } if (scope_level == "barangay") {
                    $("#holder").val(holder+1);
                    $("#selectScope").select2({
                        placeholder: 'Search City',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getBarangayInfo?country=' + country,
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
                    $("#editScope").select2({
                        placeholder: 'Search City',
                        multiple: true,
                        allowClear: true,
                        ajax: {
                            url: 'companyuser/getBarangayInfo?country=' + country,
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
                }

            });
        // });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var country = $("#country").val();
            var iid = $("#companyuser_id").val();

            $.ajax({
                url: 'companyuser/editCompanyUserByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var company_country = response.companyuser.country_id;
                    var company_state = response.companyuser.state_id;
                    var company_city = response.companyuser.city_id;
                    var company_barangay = response.companyuser.barangay_id;

                    $("#companyuserForm").find('[name="scope_level"]').val(response.companyuser.scope_level).change();
                    console.log("State: "+company_state);

                    $.each(response.scopes, function (key, value) {
                        $('#editScope').append($('<option selected>').text(value.primary_location_name+' ('+value.secondary_location_name+')').val(value.primary_location_id)).change();
                    })

                    // $.each(response.scopes, function (key, value) {
                    //     $('#editScope').append($('<option selected>').text(value.statename).val(value.id)).change();
                    //     console.log(value.statename);
                    // });
                    // console.log(response.state);
                    $.each(response.scopeState, function (key, value) {
                        $('#editScope').append($('<option>').text(value.text).val(value.id)).end();
                        // var scope_state = value.id;
                        // console.log(scope_state);
                        // $.each(response.scopes, function (key, value) {
                        //     // console.log(scope_state);
                        //     if (scope_state == value.stateid) {
                        //         // $("#companyuserForm").find('[name="scope"]').val(value.stateid).change();
                        //         $('#editScope').append($('<option selected>').text(value.statename+' ('+value.countryname+')').val(value.stateid)).change();
                        //         // $('#editScope').attr('selected', true).val(value.stateid).end();
                        //         // $("#companyuserForm").find('[name="scope"]').val(value.stateid).change();
                        //     }
                        // })
                        
                    });

                    console.log(company_country);

                    if (company_country == null) {
                        $("#state").attr("disabled", true);
                    } else {
                        $("#state").attr("disabled", false);
                    }

                    $.ajax({
                        url: 'companyuser/getStateByCountryIdByJason?country=' + company_country,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var state = response.state;
                            console.log(state);

                            $.each(state, function (key, value) {
                                if (value.id == company_state) {
                                    $('#state').append($('<option selected>').text(value.name).val(value.id)).end();
                                } else {
                                    $('#state').append($('<option>').text(value.name).val(value.id)).end();
                                }
                            });

                            if (company_state == null) {
                                $("#city").attr("disabled", true);
                            } else {
                                $("#city").attr("disabled", false);
                            }

                            $.ajax({
                                url: 'companyuser/getCityByStateIdByJason?state=' + company_state,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                                success: function (response) {
                                    var city = response.city;

                                    $.each(city, function (key, value) {
                                        if (value.id == company_city) {
                                            $('#city').append($('<option selected>').text(value.name).val(value.id)).end();
                                        } else {
                                            $('#city').append($('<option>').text(value.name).val(value.id)).end();
                                        }
                                    });

                                    if (company_city == null) {
                                        $("#barangay").attr("disabled", true);
                                    } else {
                                        $("#barangay").attr("disabled", false);
                                    }

                                    $.ajax({
                                        url: 'companyuser/getBarangayByCityIdByJason?city=' + company_city,
                                        method: 'GET',
                                        data: '',
                                        dataType: 'json',
                                        success: function (response) {
                                            var barangay = response.barangay;

                                            $.each(barangay, function (key, value) {
                                                if (value.id == company_barangay) {
                                                    $('#barangay').append($('<option selected>').text(value.name).val(value.id)).end();
                                                } else {
                                                    $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                                                }
                                            });
                                        }
                                    });
                                }
                            })
                        }
                    });


                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2").select2({
                allowClear: true,
            });

            $("#selectScopeLevel").select2({
                allowClear: true,
            });
        })
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#country").change(function () {
                var country = $("#country").val();
                var barangay = document.getElementById("barangayDiv");

                $("#state").find('option').remove();
                $("#city").find('option').remove();
                $("#barangay").find('option').remove();

                $("#state").attr("disabled", false);

                if (country == "174") {
                    barangay.style.display='block';
                } else {
                    barangay.style.display='none';
                }

                $.ajax({
                    url: 'companyuser/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;

                        $('#state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                        $("#city").attr("disabled", true).append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $("#barangay").attr("disabled", true).append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();

                        $.each(state, function (key, value) {
                            $('#state').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#state").change(function () {
                var stateval = $("#state").val();
                $("#city").find('option').remove();

                $("#city").attr("disabled", false);

                $.ajax({
                    url: 'companyuser/getCityByStateIdByJason?state=' + stateval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;

                        $('#city').append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $.each(city, function (key, value) {
                            $('#city').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });

            });

            $("#city").change(function () {
                var cityval = $("#city").val();
                $("#barangay").find('option').remove();

                $("#barangay").attr("disabled", false);

                $.ajax({
                    url: 'companyuser/getBarangayByCityIdByJason?city=' + cityval,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;

                        $('#barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        $.each(barangay, function (key, value) {
                            $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                        });


                    }
                });
            });


        });

    </script>

    <script>
        $(document).ready(function () {
            var error = "<?php echo $_SESSION['error'] ?>";
            var success = "<?php echo $_SESSION['success'] ?>";
            var notice = "<?php echo $_SESSION['notice'] ?>";
            var warning = "<?php echo $_SESSION['warning'] ?>";

            if (success) {
                return $.growl.success({
                    message: success
                });
            }
            if (error) {
                return $.growl.error({
                    message: error
                });
            }
            if (warning) {
                return $.growl.warning({
                    message: warning
                });
            }
            if (notice) {
                return $.growl.notice({
                    message: notice
                });
            }

            var error = "<?php unset($_SESSION['error']); ?>";
            var success = "<?php unset($_SESSION['success']); ?>";
            var warning = "<?php unset($_SESSION['warning']); ?>";
            var notice = "<?php unset($_SESSION['notice']); ?>";

        });
    </script>

    </body>
</html>