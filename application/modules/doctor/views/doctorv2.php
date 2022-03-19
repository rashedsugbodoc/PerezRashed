<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                            <!-- <style>
                                .wrapper {
                                    position: relative;
                                    width: 400px;
                                    height: 200px;
                                    -moz-user-select: none;
                                    -webkit-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                    border: solid 1px #ddd;
                                    margin: 10px 0px;
                                }
                                .signature-pad {
                                    position: absolute;
                                    left: 0;
                                    top: 0;
                                    width:400px;
                                    height:200px;
                                }
                            </style> -->

                        <div class="content mt-5">
                            <section id="main-content">
                                <section class="wrapper site-min-height">

                                    <div class="card mt-5">
                                        <div class="card-header">
                                            <div class="card-title"><?php echo lang('list_of').' '.lang('doctors');?></div>
                                            <div class="card-options">
                                                <?php if ($this->ion_auth->in_group(array('admin'))) { ?> 
                                                    <a href="doctor/addNewDoctor">
                                                        <div class="btn-group pull-right">
                                                            <button id="" class="btn btn-primary btn-xs">
                                                                <i class="fa fa-plus"></i> <?php echo lang('add_new'); ?>
                                                            </button>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table id="editable-sample" class="table table-bordered text-nowrap key-buttons">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo lang('doctor'); ?> <?php echo lang('id'); ?></th>
                                                                <th><?php echo lang('name'); ?></th>
                                                                <th><?php echo lang('email'); ?></th>
                                                                <th><?php echo lang('phone'); ?></th>
                                                                <th><?php echo lang('department'); ?></th>
                                                                <th><?php echo lang('profile'); ?></th>
                                                                <th class="no-print"><?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            </section>

                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('add_new_doctor'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="doctor/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('first_name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="f_name" placeholder="First Name" maxlength="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('middle_name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="m_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('last_name'); ?> <span class="text-red">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="l_name" placeholder="Last Name" maxlength="100">
                                                                    <div class="input-group-append br-tl-0 br-bl-0">
                                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
                                                                            <option selected disabled><?php echo lang('none'); ?></option>
                                                                            <option value="jr"><?php echo lang('jr'); ?></option>
                                                                            <option value="sr"><?php echo lang('sr'); ?></option>
                                                                            <option value="i"><?php echo lang('i'); ?></option>
                                                                            <option value="ii"><?php echo lang('ii'); ?></option>
                                                                            <option value="iii"><?php echo lang('iii'); ?></option>
                                                                            <option value="iv"><?php echo lang('iv'); ?></option>
                                                                            <option value="v"><?php echo lang('v'); ?></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('professional_display_name') ?><span class="text-red">*</span></label>
                                                                <input type="text" name="professional_display_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?><span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('password'); ?>: <span class="text-red">*</span></label>
                                                                <input type="password" class="form-control" name="password" placeholder="Password" maxlength="255">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('address'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" placeholder="Address" name="address">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('phone'); ?>: <span class="text-red">*</span></label>
                                                                <form>
                                                                    <input id="phone" name="phone" value="+63" class="form-control" type="tel" maxlength="20">
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="country_id" id="country">
                                                                    <option value="0" disabled selected><?php echo lang('country_placeholder'); ?></option>
                                                                    <?php foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo $country->id; ?>" <?php
                                                                        if (!empty($setval)) {
                                                                            if ($country->id == set_value('country_id')) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        if (!empty($doctors->country_id)) {
                                                                            if ($country->id == $doctors->country_id) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?> > <?php echo $country->name; ?> </option>
                                                                            <?php } ?>
                                                                </select>      
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('state_province'); ?></label>
                                                                <select class="form-control select2-show-search" name="state_id" id="state" value='' disabled>
                                                                    <option value="0" disabled selected><?php echo lang('state_province_placeholder'); ?></option>
                                                                </select>    
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('city_municipality'); ?></label>
                                                                <select class="form-control select2-show-search" name="city_id" id="city" value='' disabled>
                                                                    <option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6" id="barangayDiv" style="display: none;">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                                <select class="form-control select2-show-search" name="barangay_id" id="barangay" value='' disabled>
                                                                    <option value="0" disabled selected><?php echo lang('barangay_placeholder'); ?></option>
                                                                </select>        
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('postal'); ?></label>
                                                                <input type="text" name="postal" class="form-control" placeholder="<?php echo lang('postal_placeholder'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('specialization'); ?>: <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" id="specialtychoose" name="specialization[]" data-placeholder="Choose one" multiple="multiple">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" hidden>
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('profile'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="profile" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('license'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="license" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('tin') ?></label>
                                                                <input type="text" name="tin" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('ptr') ?></label>
                                                                <input type="text" name="ptr" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('s2') ?></label>
                                                                <input type="text" name="s2" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Signature</label>
                                                                        <canvas id="signature-pad" class="signature-pad border border-dark" width=300 height=200></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <button id="clear" class="btn btn-sm btn-secondary">Clear</button>
                                                                        <button id="save" class="btn btn-sm btn-success">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <textarea id='signature-result' class="form-control" name="signature-result" hidden></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label"><?php echo lang('profile_picture'); ?>: <span class="text-red">*</span></label>
                                                            <label class="text-muted"><small>(<?php echo lang('profile_picture_description'); ?>)</small></label>
                                                            <input type="file" name="img_url" id="image" class="dropify"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <button class="btn btn-primary pull-right" name="submit" type="submit">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> <?php echo lang('edit_doctor'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editDoctorForm" class="clearfix" action="doctor/addNew" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('first_name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="f_name" placeholder="First Name" maxlength="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('middle_name'); ?> <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="m_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('last_name'); ?> <span class="text-red">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="l_name" placeholder="Last Name" maxlength="100">
                                                                    <div class="input-group-append br-tl-0 br-bl-0">
                                                                        <select class="form-control select2 br-0 nice-select br-tl-0 br-bl-0" name="suffix">
                                                                            <option selected disabled><?php echo lang('none'); ?></option>
                                                                            <option value="jr"><?php echo lang('jr'); ?></option>
                                                                            <option value="sr"><?php echo lang('sr'); ?></option>
                                                                            <option value="i"><?php echo lang('i'); ?></option>
                                                                            <option value="ii"><?php echo lang('ii'); ?></option>
                                                                            <option value="iii"><?php echo lang('iii'); ?></option>
                                                                            <option value="iv"><?php echo lang('iv'); ?></option>
                                                                            <option value="v"><?php echo lang('v'); ?></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('professional_display_name') ?><span class="text-red">*</span></label>
                                                                <input type="text" name="professional_display_name" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('email'); ?><span class="text-red">*</span></label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('password'); ?>: <span class="text-red">*</span></label>
                                                                <input type="password" class="form-control" name="password" placeholder="Password" maxlength="255">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('address'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" value="V-Road Cebu City" placeholder="Address" name="address">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('phone'); ?>: <span class="text-red">*</span></label>
                                                                <form>
                                                                    <input id="phone2" class="form-control" name="phone" value="+639105233217" type="tel" maxlength="20">
                                                                 </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('country'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" name="country_id" id="edit_country">
                                                                    <option value="0" disabled><?php echo lang('country_placeholder'); ?></option>
                                                                    <?php foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo $country->id; ?>" <?php
                                                                        if (!empty($setval)) {
                                                                            if ($country->id == set_value('country_id')) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        if (!empty($doctors->country_id)) {
                                                                            if ($country->id == $doctors->country_id) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?> > <?php echo $country->name; ?> </option>
                                                                    <?php } ?>
                                                                </select>      
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('state_province'); ?></label>
                                                                <select class="form-control select2-show-search" name="state_id" id="edit_state">
                                                                </select>    
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('city_municipality'); ?></label>
                                                                <select class="form-control select2-show-search" name="city_id" id="edit_city">
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6" id="edit_barangayDiv">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('barangay'); ?></label>
                                                                <select class="form-control select2-show-search" name="barangay_id" id="edit_barangay" value=''>
                                                                </select>        
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('postal'); ?></label>
                                                                <input type="text" name="postal" class="form-control" placeholder="<?php echo lang('postal_placeholder'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('specialization'); ?> <span class="text-red">*</span></label>
                                                                <select class="form-control select2-show-search" id="specialtychoose2" name="specialization[]" data-placeholder="Choose one" multiple="multiple">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12" hidden>
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('profile'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="profile" value="Otorlaryngologist" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('license'); ?>: <span class="text-red">*</span></label>
                                                                <input type="text" name="license" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('tin') ?></label>
                                                                <input type="text" name="tin" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('ptr') ?></label>
                                                                <input type="text" name="ptr" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo lang('s2') ?></label>
                                                                <input type="text" name="s2" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <label class="form-label">Image Upload <span class="text-red">*</span></label>
                                                            <input type="file" name="img_url" id="img" class="dropify"/>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" id="doctor_id" value=''>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <button class="btn btn-primary pull-right" name="AddPatient" type="submit">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> <?php echo lang('doctor'); ?> <?php echo lang('info'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="output" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <img alt="User Avatar" id="img1" style="max-width: 200px; max-height: 200px;" width="auto" height="auto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('department'); ?>: </label>
                                                                <label class="form-label departmentClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('license'); ?>: </label>
                                                                <label class="form-label licenseClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('tin'); ?>: </label>
                                                                <label class="form-label taxNumberClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('ptr'); ?>: </label>
                                                                <label class="form-label taxReceiptNumberClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('professional_display_name'); ?>: </label>
                                                                <label class="form-label professionalDisplayNameClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('name'); ?>: </label>
                                                                <label class="form-label nameClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('email'); ?>: </label>
                                                                <label class="form-label emailClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('address'); ?>: </label>
                                                                <label class="form-label addressClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('country'); ?>: </label>
                                                                <label class="form-label countryClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('state_province'); ?>: </label>
                                                                <label class="form-label stateClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('city'); ?>: </label>
                                                                <label class="form-label cityClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('barangay'); ?>: </label>
                                                                <label class="form-label barangayClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('phone'); ?>: </label>
                                                                <label class="form-label phoneClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-bold"><?php echo lang('profile'); ?>: </label>
                                                                <label class="form-label profileClass"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <script src="<?php echo base_url('public/assets/plugins/signature/signature_plugin.min.js'); ?>"></script>
    <script>
    $(function() {
        // init signaturepad
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
        });

        // get image data and put to hidden input field
        function getSignaturePad() {
            var imageData = signaturePad.toDataURL('image/png');
            // var output = document.getElementById("signature-result");
            // output.value = "";
            // for (i=0; i < imageData.length; i++) {
            //     output.value += imageData[i].charCodeAt(0).toString(2) + " ";
            // }
            $('#signature-result').val(imageData)
        }

        // form action
        $('#save').click(function() {
            getSignaturePad();
            return false; // set true to submits the form.
        });

        // action on click button clea
        $('#clear').click(function(e) {
            e.preventDefault();
            $("#signature-result").val('');
            signaturePad.clear();
        })
    });
    </script>

    <script type="text/javascript">
        // debugger;

            $(".table").on("click", ".editbutton", function () {
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                $("#img").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                $('#specialtychoose2').find('option').remove();
                $('#editDoctorForm').trigger("reset");
                $("#edit_state").find('option').remove();
                $("#edit_city").find('option').remove();
                $("#edit_barangay").find('option').remove();
                $.ajax({
                    url: 'doctor/editDoctorByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                        $('#editDoctorForm').find('[name="professional_display_name"]').val(response.doctor.professional_display_name).end()
                        $('#editDoctorForm').find('[name="name"]').val(response.doctor.name).end()
                        $('#editDoctorForm').find('[name="f_name"]').val(response.doctor.firstname).end()
                        $('#editDoctorForm').find('[name="l_name"]').val(response.doctor.lastname).end()
                        $('#editDoctorForm').find('[name="m_name"]').val(response.doctor.middlename).end()
                        $('#editDoctorForm').find('[name="password"]').val(response.doctor.password).end()
                        $('#editDoctorForm').find('[name="email"]').val(response.doctor.email).end()
                        $('#editDoctorForm').find('[name="address"]').val(response.doctor.address).end()
                        if (response.doctor.country_id == null){
                            $("#edit_state").attr("disabled", true);
                            $('#editDoctorForm').find('[name="country_id"]').val("0").change()
                        } else {
                            $("#edit_state").attr("disabled", false);
                            $('#editDoctorForm').find('[name="country_id"]').val(response.doctor.country_id).change()
                        }
                        // $('#editDoctorForm').find('[name="state_id"]').val(response.doctor.state_id).change();
                        // $('#editDoctorForm').find('[name="city_id"]').val(response.doctor.city_id).change();
                        // $('#editDoctorForm').find('[name="barangay_id"]').val(response.doctor.barangay_id).change()
                        $('#editDoctorForm').find('[name="postal"]').val(response.doctor.postal).end()
                        $('#editDoctorForm').find('[name="phone"]').val(response.doctor.phone).end()
                        // $('#editDoctorForm').find('[name="department"]').val(response.doctor.department).end()
                        $('#editDoctorForm').find('[name="profile"]').val(response.doctor.profile).end()
                        $('#editDoctorForm').find('[name="license"]').val(response.doctor.license).end()
                        $('#editDoctorForm').find('[name="tin"]').val(response.doctor.tax_number).end()
                        $('#editDoctorForm').find('[name="ptr"]').val(response.doctor.tax_receipt_number).end()
                        $('#editDoctorForm').find('[name="s2"]').val(response.doctor.secondary_license_number).end()

                        $.each(response.specialties, function(key, value) {
                            $('#specialtychoose2').append($('<option selected>').text(value.display_name_ph).val(value.id)).end();
                        });

                        var imagenUrl = response.doctor.img_url;
                        var drEvent = $('#img').dropify(
                        {
                          defaultFile: imagenUrl
                        });
                        drEvent = drEvent.data('dropify');
                        drEvent.resetPreview();
                        drEvent.clearElement();
                        drEvent.settings.defaultFile = imagenUrl;
                        drEvent.destroy();
                        drEvent.init();

                        $('.js-example-basic-single.department').val(response.doctor.department).trigger('change');

                        $('#myModal2').modal('show');

                        var country = $("#edit_country").val();
                        var doctor_id = $("#doctor_id").val();
                        var country_id = response.doctor.country_id;
                        var state_id = response.doctor.state_id;
                        var city_id = response.doctor.city_id;
                        var barangay_id = response.doctor.barangay_id;

                        $.ajax({
                            url: 'doctor/getStateByCountryIdByJason?country=' + country + '&doctor=' + doctor_id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                $("#edit_state").find('option').remove();

                                var state = response.state;
                                var doctor_country = response.doctor.country_id;
                                var doctor_state = response.doctor.state_id;

                                $('#edit_state').append($('<option value="0" disabled><?php echo lang("state_province_placeholder"); ?></option>')).end();

                                $.each(state, function (key, value) {
                                    $('#edit_state').append($('<option>').text(value.name).val(value.id)).end();
                                });

                                if (doctor_state == null) {
                                    // document.getElementById('state').value='0';
                                    $("#edit_city").attr("disabled", true);
                                    $("#edit_state").val("0");
                                } else {
                                    // document.getElementById('state').value=state_id;
                                    $("#edit_city").attr("disabled", false);
                                    $("#edit_state").val(doctor_state);
                                }

                                var stateval = $("#edit_state").val();

                                $.ajax({
                                    url: 'doctor/getCityByStateIdByJason?state=' + stateval + '&doctor=' + doctor_id,
                                    method: 'GET',
                                    data: '',
                                    dataType: 'json',
                                    success: function (response) {
                                        // $("#edit_city").find('option').remove();

                                        var city = response.city;
                                        var doctor_city = response.doctor.city_id;

                                        $('#edit_city').append($('<option value="0" disabled><?php echo lang("city_municipality_placeholder"); ?></option>')).end();

                                        $.each(city, function (key, value) {
                                            $('#edit_city').append($('<option>').text(value.name).val(value.id)).end();
                                        });


                                        if (doctor_city == null) {
                                            $("#edit_barangay").attr("disabled", true);
                                            $("#edit_city").val("0");
                                        } else {
                                            $("#edit_city").attr("disabled", false);
                                            $("#edit_city").val(doctor_city);
                                        }

                                        var cityval = $("#edit_city").val();

                                        $.ajax({
                                            url: 'doctor/getBarangayByCityIdByJason?city=' + cityval + '&doctor=' + doctor_id,
                                            method: 'GET',
                                            data: '',
                                            dataType: 'json',
                                            success: function (response) {
                                                var barangay = response.barangay;
                                                var doctor_barangay = response.doctor.barangay_id;

                                                $.each(barangay, function (key, value) {
                                                    $("#edit_barangay").append($('<option>').text(value.name).val(value.id)).end();
                                                });

                                                if (doctor_barangay == null) {
                                                    $("#edit_barangay").val("0");
                                                } else {
                                                    $("#edit_barangay").attr("disabled", false);
                                                    $("#edit_barangay").val(doctor_barangay);
                                                }
                                            }
                                        });
                                    }
                                });

                            }
                        });

                    }

                });
            });

            $("#edit_country").change(function () {
                var country = $("#edit_country").val();
                var barangay = document.getElementById("edit_barangayDiv");
                $("#edit_state").find('option').remove();
                $("#edit_city").find('option').remove();
                $("#edit_barangay").find('option').remove();

                if (country == "174") {
                    barangay.style.display='block';
                    $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                } else {
                    barangay.style.display='none';
                    $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                }

                $.ajax({
                    url: 'settings/getStateByCountryIdByJason?country=' + country,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var state = response.state;

                        $('#edit_state').append($('<option disabled selected><?php echo lang('state_province_placeholder'); ?></option>')).end();
                        $.each(state, function (key, value) {
                            $('#edit_state').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        $("#edit_city").attr("disabled", true);
                        $("#edit_barangay").attr("disabled", true);
                    }
                });
            });

            $("#edit_state").change(function () {
                var state = $("#edit_state").val();
                $("#edit_city").find('option').remove();

                $.ajax({
                    url: 'settings/getCityByStateIdByJason?state=' + state,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var city = response.city;

                        $('#edit_city').append($('<option value="0" disabled selected><?php echo lang('city_municipality_placeholder'); ?></option>')).end();
                        $.each(city, function (key, value) {
                            $('#edit_city').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        $("#edit_city").attr("disabled", false);

                    }
                });
            });

            $("#edit_city").change(function () {
                var city = $("#edit_city").val();
                $("#edit_barangay").find('option').remove();

                $.ajax({
                    url: 'settings/getBarangayByCityIdByJason?city=' + city,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var barangay = response.barangay;

                        $('#edit_barangay').append($('<option disabled selected><?php echo lang('barangay_placeholder'); ?></option>')).end();
                        $.each(barangay, function (key, value) {
                            $('#edit_barangay').append($('<option>').text(value.name).val(value.id)).end();
                        });

                        $("#edit_barangay").attr("disabled", false);
                    }
                });
            });
        
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".inffo", function () {
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');

                $("#img1").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                $('.nameClass').html("").end()
                $('.emailClass').html("").end()
                $('.addressClass').html("").end()
                $('.countryClass').html("").end()
                $('.stateClass').html("").end()
                $('.cityClass').html("").end()
                $('.barangayClass').html("").end()
                $('.phoneClass').html("").end()
                $('.departmentClass').html("").end()
                $('.profileClass').html("").end()
                $('.licenseClass').html("").end()
                $('.professionalDisplayNameClass').html("").end()
                $('.taxNumberClass').html("").end()
                $('.taxReceiptNumberClass').html("").end()
                $.ajax({
                    url: 'doctor/editDoctorByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // Populate the form fields with the data returned from server
                        $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                        $('.nameClass').append(response.doctor.name).end()
                        $('.emailClass').append(response.doctor.email).end()
                        $('.addressClass').append(response.doctor.address).end()
                        $('.phoneClass').append(response.doctor.phone).end()
                        $('.departmentClass').append(response.doctor.department).end()
                        $('.profileClass').append(response.doctor.profile).end()
                        $('.licenseClass').append(response.doctor.license).end()
                        $('.professionalDisplayNameClass').append(response.doctor.professional_display_name).end()
                        $('.taxNumberClass').append(response.doctor.tax_number).end()
                        $('.taxReceiptNumberClass').append(response.doctor.tax_receipt_number).end()

                        if (response.doctor.country_id !== null){
                            $('.countryClass').append(response.country.name).end()
                        } else {
                            $('.countryClass').html("").end()
                        }

                        if (response.doctor.state_id !== null){
                            $('.stateClass').append(response.state.name).end()
                        } else {
                            $('.stateClass').html("").end()
                        }

                        if (response.doctor.city_id !== null){
                            $('.cityClass').append(response.city.name).end()
                        } else {
                            $('.cityClass').html("").end()
                        }

                        if (response.doctor.barangay_id !== null){
                            $('.barangayClass').append(response.barangay.name).end()
                        } else {
                            $('.barangayClass').html("").end()
                        }


                        if (typeof response.doctor.img_url !== 'undefined' && response.doctor.img_url != '') {
                            $("#img1").attr("src", response.doctor.img_url);
                        }


                        $('#infoModal').modal('show');
                        
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#editable-sample').DataTable({
                responsive: true,

                "processing": true,
                "serverSide": true,
                "searchable": true,
                "ajax": {
                    url: "doctor/getDoctor",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },

                dom: "<'row'<'col-sm-4 col-md-12 col-lg-12'f><'col-sm-12 col-md-12 col-lg-2'l><'col-sm-12 col-md-12 col-lg-10 text-right'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                        }
                    },
                ],

                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                iDisplayLength: 100,
                "order": [[0, "desc"]],

                "language": {
                    "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
                }
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
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
                    url: 'settings/getStateByCountryIdByJason?country=' + country,
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
                    url: 'settings/getCityByStateIdByJason?state=' + stateval,
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
                    url: 'settings/getBarangayByCityIdByJason?city=' + cityval,
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
            $("#specialtychoose").select2({
                placeholder: '<?php echo lang('select_specialty'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getSpecialtyinfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        console.log(response);
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

            $("#specialtychoose2").select2({
                placeholder: '<?php echo lang('select_specialty'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getSpecialtyinfo',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        console.log(response);
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
            var error = "<?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>";
            var success = "<?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>";
            var notice = "<?php if(isset($_SESSION['notice'])) echo $_SESSION['notice']; ?>";
            var warning = "<?php if(isset($_SESSION['warning'])) echo $_SESSION['warning']; ?>";

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