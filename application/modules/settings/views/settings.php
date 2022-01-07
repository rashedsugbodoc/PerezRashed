<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('settings'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix row">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="settings/update" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('healthcare_institution_name'); ?></label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->title)) {
                                    echo $settings->title;
                                }
                                ?>' placeholder="<?php echo lang('healthcare_institution_name'); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('healthcare_institution_group_name'); ?></label>
                                <input type="text" class="form-control" name="group_name" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->group_name)) {
                                    echo $settings->group_name;
                                }
                                ?>' placeholder="<?php echo lang('healthcare_institution_group_name'); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('hospital_email'); ?></label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->email)) {
                                    echo $settings->email;
                                }
                                ?>' placeholder="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->phone)) {
                                    echo $settings->phone;
                                }
                                ?>' placeholder="phone">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="companyName"><?php echo lang('company_name');?></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value='<?php
                                if (!empty($settings->company_name)) {
                                    echo $settings->company_name;
                                }
                                ?>' placeholder="<?php echo lang('company_name');?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="companyVATNumber"><?php echo lang('company_vat_number');?></label>
                                <input type="text" class="form-control" name="company_vat_number" id="company_vat_number" value='<?php
                                if (!empty($settings->company_vat_number)) {
                                    echo $settings->company_vat_number;
                                    }
                                    ?>' placeholder="<?php echo lang('company_vat_number');?>">
                            </div>   
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="<?php echo lang('street_address_placeholder'); ?>" value='<?php
                                if (!empty($settings->address)) {
                                    echo $settings->address;
                                }
                                ?>' placeholder="address">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1"><?php echo lang('country'); ?></label>
                                <select class="form-control" name="country_id" id="country" value=''>
                                    <option value="0" disabled><?php echo lang('country_institution_placeholder'); ?></option>
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?php echo $country->id; ?>" <?php
                                        if (!empty($setval)) {
                                            if ($country->id == set_value('country_id')) {
                                                echo 'selected';
                                            }
                                        }
                                        if (!empty($settings->country_id)) {
                                            if ($country->id == $settings->country_id) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $country->name; ?> </option>
                                            <?php } ?>
                                </select>                                      
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1"><?php echo lang('state_province'); ?></label>
                                <select class="form-control" name="state_id" id="state" value=''>
                                    
                                </select>                                      
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1"><?php echo lang('city_municipality'); ?></label>
                                <select class="form-control" name="city_id" id="city" value=''>
                                    <option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>
                                </select>                                      
                            </div>
                            <div class="col-md-6 form-group" id="barangayDiv">
                                <label for="exampleInputEmail1"><?php echo lang('barangay'); ?></label>
                                <select class="form-control" name="barangay_id" id="barangay">
                                    <option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>
                                </select>                                      
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('postal'); ?></label>
                                <input type="text" class="form-control" name="postal" id="exampleInputEmail1" placeholder="<?php echo lang('postal_placeholder'); ?>" value='<?php
                                if (!empty($settings->postal)) {
                                    echo $settings->postal;
                                }
                                ?>'>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('language'); ?></label>
                                <select class="form-control" name="language" value='' disabled="">
                                    <option value="arabic" <?php
                                    if (!empty($settings->language)) {
                                        if ($settings->language == 'arabic') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('arabic'); ?> 
                                    </option>
                                    <option value="english" <?php
                                    if (!empty($settings->language)) {
                                        if ($settings->language == 'english') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('english'); ?> 
                                    </option>
                                    <option value="spanish" <?php
                                    if (!empty($settings->language)) {
                                        if ($settings->language == 'spanish') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('spanish'); ?>
                                    </option>
                                    <option value="french" <?php
                                    if (!empty($settings->language)) {
                                        if ($settings->language == 'french') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('french'); ?>
                                    </option>
                                    <option value="italian" <?php
                                    if (!empty($settings->language)) {
                                        if ($settings->language == 'italian') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('italian'); ?>
                                    </option>
                                    <option value="portuguese" <?php
                                    if (!empty($settings->language)) {
                                        if ($settings->language == 'portuguese') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('portuguese'); ?>
                                    </option>
                                </select>                                        
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="timezone"><?php echo lang('timezone');?></label>
                                <select class="form-control" name="timezone" value=''>
                                    <?php foreach ($zones as $zone) { ?>
                                        <option value="<?php echo $zone; ?>" <?php
                                        if (!empty($setval)) {
                                            if ($zone == set_value('timezone')) {
                                                echo 'selected';
                                            }
                                        }
                                        if (!empty($settings->timezone)) {
                                            if ($zone == $settings->timezone) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $zone; ?> </option>
                                            <?php } ?>
                                </select>  
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="time_format"><?php echo lang('time_format');?></label>
                                <select class="form-control" name="time_format" value=''>
                                    <option value="" selected>
                                        <?php echo lang('select');?>
                                    </option>
                                    <option value="h:i a" <?php
                                    if (!empty($settings->time_format)) {
                                        if ($settings->time_format == 'h:i a') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('time_format_12am'); ?> 
                                    </option>
                                    <option value="h:i A" <?php
                                    if (!empty($settings->time_format)) {
                                        if ($settings->time_format == 'h:i A') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('time_format_12AM'); ?> 
                                    </option>
                                    <option value="H:i" <?php
                                    if (!empty($settings->time_format)) {
                                        if ($settings->time_format == 'H:i') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('time_format_24hr'); ?>
                                    </option>
                                
                                </select>    
                            </div>   
                            <div class="col-md-6 form-group">
                                <label for="date_format"><?php echo lang('date_format');?></label>
                                <select class="form-control" name="date_format" value=''>
                                    <option value="" selected>
                                        <?php echo lang('select');?>
                                    </option>
                                    <option value="d-m-Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'd-m-Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>d-m-Y (example: 25-04-2013)
                                    </option>
                                    <option value="m-d-Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'm-d-Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>m-d-Y (example: 04-25-2013)
                                    </option>
                                    <option value="Y-m-d" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'Y-m-d') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>Y-m-d (example: 2013-04-25)
                                    </option>
                                    <option value="d/m/Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'd/m/Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>d/m/Y (example: 25/04/2013)
                                    </option>
                                    <option value="m/d/Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'm/d/Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>m/d/Y (example: 04/25/2013)
                                    </option>
                                    <option value="Y/m/d" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'Y/m/d') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>Y/m/d (example: 2013/04/25)
                                    </option> 
                                    <option value="d.m.Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'd.m.Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>d.m.Y (example: 25.04.2013)
                                    </option>
                                    <option value="m.d.Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'm.d.Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>m.d.Y (example: 04.25.2013)
                                    </option>
                                    <option value="Y.m.d" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'Y.m.d') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>Y.m.d (example: 2013.04.25)
                                    </option>                                                                                      
                                </select>                                            
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="date_format"><?php echo lang('date_format_long');?></label>
                                <select class="form-control" name="date_format_long" value=''>
                                    <option value="" selected>
                                        <?php echo lang('select');?>
                                    </option>
                                    <option value="F j, Y" <?php
                                    if (!empty($settings->date_format_long)) {
                                        if ($settings->date_format_long == 'F j, Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>August 24, 2013
                                    </option>
                                    <option value="j F Y" <?php
                                    if (!empty($settings->date_format_long)) {
                                        if ($settings->date_format_long == 'j F Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>24 August 2013
                                    </option>
                                </select>                                        
                            </div>                                                     
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo lang('currency_symbol'); ?></label>
                                <input type="text" class="form-control" name="currency" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->currency)) {
                                    echo $settings->currency;
                                }
                                ?>' placeholder="currency">
                            </div>

                            <!--
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('discount_type'); ?></label>
                                <select class="form-control m-bot15" name="discount" value=''>
                                    <option value="percentage" <?php
                            if (!empty($settings->discount)) {
                                if ($settings->discount == 'percentage') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('percentage'); ?> (%)</option>
                                    <option value="flat" <?php
                            if (!empty($settings->discount)) {
                                if ($settings->discount == 'flat') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('flat'); ?></option>
                                </select>
                            </div>
                            
                            -->
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1"><?php echo lang('invoice_logo'); ?></label>
                                <input type="file" class="form-control" name="img_url" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->invoice_logo)) {
                                    echo $settings->invoice_logo;
                                }
                                ?>' placeholder="">
                                <span class="help-block"><?php echo lang('recommended_size'); ?> : 200x100</span>
                            </div>
                            <div class="form-group hidden col-md-3">
                                <label for="exampleInputEmail1">Buyer</label>
                                <input type="hidden" class="form-control" name="buyer" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->codec_username)) {
                                    echo $settings->buyer;
                                }
                                ?>' placeholder="codec_username">
                            </div>
                            <div class="form-group hidden col-md-3">
                                <label for="exampleInputEmail1">Purchase Code</label>
                                <input type="hidden" class="form-control" name="p_code" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->codec_purchase_code)) {
                                    echo $settings->phone;
                                }
                                ?>' placeholder="codec_purchase_code">
                            </div>
                            <input type="hidden" name="id" id="settings_id" value='<?php
                            if (!empty($settings->id)) {
                                echo $settings->id;
                            }
                            ?>'>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo lang('submit'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/coderygel.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $("#country").change(function () {
            var country = $("#country").val();
            var barangay = document.getElementById("barangayDiv");
            $("#state").find('option').remove();
            $("#city").find('option').remove();
            $("#barangay").find('option').remove();
            // alert(country);
            $("#state").attr("disabled", false);
            if (country == "174") {
                barangay.style.display='block';
                $("#barangay").attr("disabled", true);
                $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();
            } else {
                barangay.style.display='none';
            }
            $.ajax({
                url: 'settings/getStateByCountryIdByJason?country='+ country,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var state = response.state;
                var id = $("#id").val();
                
                $('#state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                $("#city").attr("disabled", true);
                $('#city').append($('<option disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                $.each(state, function (key, value) {
                    $('#state').append($('<option>').text(value.name).val(value.id)).end();
                });


                
            });
        });
    });


    

    $(document).ready(function () {
        $("#state").change(function () {
            var state = $("#state").val();
            $("#city").find('option').remove();
            
            $.ajax({
                url: 'settings/getCityByStateIdByJason?state='+ state,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var city = response.city;
                
                $('#city').append($('<option disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
                $("#city").attr("disabled", false);
                $.each(city, function (key, value) {
                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                });

                if ($('#city').has('option').length == 0) {                    //if it is blank. 
                    $('#city').append($('<option>').text('<?php echo lang("city_municipality_institution_placeholder"); ?>').val('Not Selected')).end();
                }
            });
        });
    });

    $(document).ready(function () {
        $("#city").change(function () {
            var city = $("#city").val();
            $("#barangay").find('option').remove();
            
            $.ajax({
                url: 'settings/getBarangayByCityIdByJason?city='+ city,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var barangay = response.barangay;
                
                $('#barangay').append($('<option disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();
                $("#barangay").attr("disabled", false);
                $.each(barangay, function (key, value) {
                    $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                });

                if ($('#barangay').has('option').length == 0) {                    //if it is blank. 
                    $('#barangay').append($('<option>').text('<?php echo lang("barangay_institution_placeholder"); ?>').val('Not Selected')).end();
                }
            });
        });
    });

//code that might be needed start
    // $(document).ready(function () {
    //     var state = $("#state").val();
    //     // alert(state);
    //     $.ajax({
    //         url: 'settings/getCityByStateIdByJason?state='+ state,
    //         method: 'GET',
    //         data: '',
    //         dataType: 'json',
    //     }).success(function (response) {
    //         var city = response.city;
    //         console.log(city);
    //         $('#city').append($('<option disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
    //         $.each(city, function (key, value) {
    //             $('#city').append($('<option>').text(value.name).val(value.id)).end();
    //         });

    //         if ($('#city').has('option').length == 0) {                    //if it is blank. 
    //             $('#city').append($('<option>').text('<?php echo lang("city_municipality_institution_placeholder"); ?>').val('Not Selected')).end();
    //         }
    //     });
    // });

    // $(document).ready(function () {
    //     var city = $("#city").val();
    //     $("#barangay").find('option').remove();
    //     // alert(city);
    //     $.ajax({
    //         url: 'settings/getBarangayByCityIdByJason?city='+ city,
    //         method: 'GET',
    //         data: '',
    //         dataType: 'json',
    //     }).success(function (response) {
    //         var barangay = response.barangay;
    //         console.log(barangay);
    //         $('#barangay').append($('<option disabled selected><?php echo lang('barangay_institution_placeholder'); ?></option>')).end();
    //         $.each(barangay, function (key, value) {
    //             $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
    //         });

    //         if ($('#barangay').has('option').length == 0) {                    //if it is blank. 
    //             $('#barangay').append($('<option>').text('<?php echo lang("barangay_institution_placeholder"); ?>').val('Not Selected')).end();
    //         }
    //     });
    // });
//code that might be needed start

    $(document).ready(function () {
        var country = $("#country").val();
        var barangay = document.getElementById("barangayDiv");
        var settings_id = '<?php echo $settings->id; ?>';

        $("#state").find('option').remove();
        $("#city").find('option').remove();
        $("#barangay").find('option').remove();
        
        
        if (country == "174") {
            barangay.style.display='block';
        } else {
            barangay.style.display='none';
        }
        $.ajax({
            url: 'settings/getStateByCountryIdByJason?country='+ country + '&settings=' + settings_id,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function (response) {
            var state = response.state;
            var state_id = response.settings_state_id.state_id;
            var country_id = response.settings_state_id.country_id;

            if (country_id == null) {
                $("#state").attr("disabled", true);
                $("#country").val("0");
                // $('#country').append($('<option value="0" disabled selected><?php echo lang('country_institution_placeholder'); ?></option>')).end();
            } else {
                $("#state").attr("disabled", false);
            }            

            if (state_id == null) {
                $("#city").attr("disabled", true);
                $('#state').append($('<option value="0" disabled selected><?php echo lang('state_province_institution_placeholder'); ?></option>')).end();
            } else {
                $("#city").attr("disabled", false);
            }
            
            // $("#city").attr("disabled", true);
            $.each(state, function (key, value) {
                $('#state').append($('<option>').text(value.name).val(value.id)).end();
            });

            
            if (state_id == null) {
                // document.getElementById('state').value='0';
                $("#state").val("0");
            } else {
                // document.getElementById('state').value=state_id;
                $("#state").val(state_id);
            }



            var stateval = $("#state").val();
            
            $.ajax({
                url: 'settings/getCityByStateIdByJason?state='+ stateval + '&settings=' + settings_id,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var city = response.city;
                var city_id = response.settings_city_id.city_id;

                if (city_id == null) {
                    $("#barangay").attr("disabled", true);
                    $('#city').append($('<option value="0" disabled selected><?php echo lang("city_municipality_institution_placeholder"); ?></option>')).end();
                } else {
                    $("#barangay").attr("disabled", false);
                }
                
                $.each(city, function (key, value) {
                    $('#city').append($('<option>').text(value.name).val(value.id)).end();
                });

                if (city_id == null) {
                    // document.getElementById('city').value='0';
                    $("#city").val("0");
                } else {
                    document.getElementById('city').value=city_id;
                    $("#city").val(city_id);
                }

                var cityval = $("#city").val();

                $.ajax({
                    url: 'settings/getBarangayByCityIdByJason?city='+ cityval + '&settings=' + settings_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var barangay = response.barangay;
                    var barangay_id = response.settings_barangay_id.barangay_id;

                    if (barangay_id == null) {
                        $('#barangay').append($('<option value="0" disabled selected><?php echo lang("barangay_institution_placeholder"); ?></option>')).end();
                    } else {
                        $("#barangay").attr("disabled", false);
                    }
                    
                    $.each(barangay, function (key, value) {
                        $('#barangay').append($('<option>').text(value.name).val(value.id)).end();
                    });
                    
                    if (barangay_id == null) {
                        // document.getElementById('barangay').value='0';
                        $("#barangay").val("0");
                    } else {
                        // document.getElementById('barangay').value=barangay_id;
                        $("#barangay").val(barangay_id);
                    }

                }); 
            });
            
        });
    });
</script>
