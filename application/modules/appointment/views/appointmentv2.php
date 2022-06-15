<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        
                        <div class="row mt-5">
                            <div class="col-xl-12 col-sm-12 col-lg-12">
                                <div class="panel panel-primary w-100">
                                    <div class="tab-menu-heading crypto-tabs">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs">
                                                <li class=""><a href="#all" class="active" data-toggle="tab"><?php echo lang('all'); ?></a></li>
                                                <li><a href="#pending" data-toggle="tab" class=""><?php echo lang('pending_confirmation'); ?></a></li>
                                                <li><a href="#confirmed" data-toggle="tab" class=""><?php echo lang('confirmed'); ?></a></li>
                                                <li><a href="#treated" data-toggle="tab" class=""><?php echo lang('consulted'); ?></a></li>
                                                <li><a href="#cancelled" data-toggle="tab" class=""><?php echo lang('cancelled'); ?></a></li>
                                                <li><a href="#requested" data-toggle="tab" class=""><?php echo lang('requested'); ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card panel-body tabs-menu-body br-tl-0 border-top-0 p-6 w-100 shadow2 crypto-content">
                                        <div class="tab-content">
                                            <div class="tab-pane" id="pending">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="h3 pull-left"><?php echo lang('pending'); ?> <?php echo lang('appointments'); ?></label>
                                                        <!-- <a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?> </a> -->
                                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?redirect=appointment"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a>
                                                    </div>
                                                </div>

                                                <div class="mb-0">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample1" class="table table-bordered text-nowrap key-buttons w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('appointment').' '.lang('date'); ?></th>
                                                                    <th> <?php echo lang('patient_id'); ?></th>
                                                                    <th><?php echo lang('patient').' '.lang('name'); ?></th>
                                                                    <th> <?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('appointment').' '.lang('status'); ?></th>
                                                                    <th> <?php echo lang('details'); ?> </th>
                                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                        <th> <?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="confirmed">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="h3 pull-left"><?php echo lang('confirmed'); ?> <?php echo lang('appointments'); ?></label>
                                                        <!-- <a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a> -->
                                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?redirect=appointment"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered text-nowrap key-buttons w-100" id="editable-sample2">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('appointment').' '.lang('date'); ?></th>
                                                                    <th> <?php echo lang('patient_id'); ?></th>
                                                                    <th><?php echo lang('patient').' '.lang('name'); ?></th>
                                                                    <th> <?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('appointment').' '.lang('status'); ?></th>
                                                                    <th> <?php echo lang('details'); ?></th>
                                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                        <th> <?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="treated">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="h3 pull-left"><?php echo lang('consulted'); ?> <?php echo lang('appointments'); ?></label>
                                                        <!-- <a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a> -->
                                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?redirect=appointment"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a>
                                                    </div>
                                                </div>

                                                <div class="mb-0">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample3" class="table table-bordered text-nowrap key-buttons w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('appointment').' '.lang('date'); ?></th>
                                                                    <th><?php echo lang('patient_id'); ?></th>
                                                                    <th><?php echo lang('patient').' '.lang('name'); ?></th>
                                                                    <th><?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('appointment').' '.lang('status'); ?></th>
                                                                    <th><?php echo lang('details'); ?></th>
                                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                        <th> <?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="cancelled">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="h3 pull-left"><?php echo lang('cancelled'); ?> <?php echo lang('appointments'); ?></label>
                                                        <!-- <a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a> -->
                                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?redirect=appointment"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a>
                                                    </div>
                                                </div>

                                                <div class="mb-0">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample4" class="table table-bordered text-nowrap key-buttons w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('appointment').' '.lang('date'); ?></th>
                                                                    <th><?php echo lang('patient_id'); ?></th>
                                                                    <th><?php echo lang('patient').' '.lang('name'); ?></th>
                                                                    <th><?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('appointment').' '.lang('status'); ?></th>
                                                                    <th><?php echo lang('details'); ?></th>
                                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                        <th> <?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane active" id="all">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="h3 pull-left"><?php echo lang('all'); ?> <?php echo lang('appointments'); ?></label>
                                                        <!-- <a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a> -->
                                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?redirect=appointment"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a>
                                                    </div>
                                                </div>

                                                <div class="mb-0">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample5" class="table table-bordered text-nowrap key-buttons w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('appointment').' '.lang('date'); ?></th>
                                                                    <th><?php echo lang('patient_id'); ?></th>
                                                                    <th><?php echo lang('patient').' '.lang('name'); ?></th>
                                                                    <th><?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('appointment').' '.lang('status'); ?></th>
                                                                    <th><?php echo lang('details'); ?></th>
                                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                        <th> <?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="requested">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="h3 pull-left"><?php echo lang('requested'); ?> <?php echo lang('appointments'); ?></label>
                                                        <!-- <a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal"><i class="fe fe-plus"></i><?php echo lang('appointment'); ?></a> -->
                                                        <a class="btn btn-primary pull-right" href="appointment/addNewView?redirect=appointment"><i class="fe fe-plus"></i><?php echo lang('add_appointment'); ?></a>
                                                    </div>
                                                </div>

                                                <div class="mb-0">
                                                    <div class="table-responsive">
                                                        <table id="editable-sample6" class="table table-bordered text-nowrap key-buttons w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('appointment').' '.lang('date'); ?></th>
                                                                    <th><?php echo lang('patient_id'); ?></th>
                                                                    <th><?php echo lang('patient').' '.lang('name'); ?></th>
                                                                    <th><?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('appointment').' '.lang('status'); ?></th>
                                                                    <th><?php echo lang('details'); ?></th>
                                                                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                                                                        <th> <?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('add_appointment'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" action="appointment/addNew" method="post" class="clearfix" enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('patient'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search pos_select" id="pos_select" name="patient" data-placeholder="Choose one">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pos_client clearfix">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                            <input type="text" name="p_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                            <input type="email" name="p_email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                            <form>
                                                                <input id="phone" name="p_phone" value="+63" type="tel">
                                                             </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                            <input type="text" name="p_age" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="form-label"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                                        <select class="form-control select2-show-search" name="p_gender" data-placeholder="Choose one">
                                                            <option value="Male" <?php
                                                            if (!empty($patient->sex)) {
                                                                if ($patient->sex == 'Male') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Male </option>   
                                                            <option value="Female" <?php
                                                            if (!empty($patient->sex)) {
                                                                if ($patient->sex == 'Female') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Female </option>
                                                            <option value="Others" <?php
                                                            if (!empty($patient->sex)) {
                                                                if ($patient->sex == 'Others') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Others </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('doctor'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="doctor" id="adoctors" data-placeholder="Choose one">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" hidden>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering') . ' ' . lang('staff'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="staff" id="staffs" data-placeholder="Choose one">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('service_type'); ?></label>
                                                        <select class="form-control select2-show-search service_cat" name="service_category_group" id="service_select" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('service'); ?></label>
                                                        <select class="form-control select2-show-search sub_service" id="sub_service" name="service" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group branch_select">
                                                        <label class="form-label"> <?php echo lang('location'); ?></label>
                                                        <select class="form-control select2-show-search branch" name="branch" id="branch_select" data-placeholder="Choose one (with searchbox)">
                                                            <option selected value="">Choose One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"> <?php echo lang('date'); ?> <span class="text-red">*</span></label>
                                                    <input class="form-control flatpickr" placeholder="Select Date" id="date" name="date" readonly>
                                                </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Available Slot <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search aslot" name="time_slot" id="aslots" data-placeholder="Choose one">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="status" data-placeholder="Choose one">
                                                            <option value="Pending Confirmation" <?php
                                                                ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                            <option value="Confirmed" <?php
                                                                ?> > <?php echo lang('confirmed'); ?> </option>
                                                            <option value="Consulted" <?php
                                                                ?> > <?php echo lang('consulted'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('complaint'); ?> <span class="text-red">*</span></label>
                                                        <textarea class="form-control mb-4" placeholder="Purpose" name="remarks" rows="3" maxlength="500"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <!-- <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input pull-left" name="sms" value="sms">
                                                        <span class="custom-control-label">Send SMS</span>
                                                    </label> -->
                                                    
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">  <?php echo lang('edit_appointment'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" id="editAppointmentForm" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('patient'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search pos_select patient" name="patient" id="pos_select" data-placeholder="Choose One">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">  <?php echo lang('doctor'); ?> <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search doctor" id="adoctors1" name="doctor" data-placeholder="Choose One">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" hidden>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('rendering') . ' ' . lang('staff'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="staff" id="staffs1" data-placeholder="Choose one">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('service_type'); ?></label>
                                                        <select class="form-control select2-show-search service_cat1" name="service_category_group" id="service_select1" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('service'); ?></label>
                                                        <select class="form-control select2-show-search sub_service1" id="sub_service1" name="service" data-placeholder="Choose one (with searchbox)"  required="">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group branch_select1">
                                                        <label class="form-label"> <?php echo lang('location'); ?></label>
                                                        <select class="form-control select2-show-search branch1" name="branch" id="branch_select1" data-placeholder="Choose one (with searchbox)">
                                                            <option selected value="">Choose One</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('date'); ?><span class="text-red">*</span></label>
                                                        <input class="form-control datetime" name="date" id="date1" placeholder="MM/DD/YYYY" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Available Slot <span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="time_slot" id="aslots1">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?><span class="text-red">*</span></label>
                                                        <select class="form-control select2-show-search" name="status" data-placeholder="Choose one">
                                                            <option value="Pending Confirmation" <?php
                                                                ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                                            <option value="Confirmed" <?php
                                                                ?> > <?php echo lang('confirmed'); ?> </option>
                                                            <option value="Consulted" <?php
                                                                ?> > <?php echo lang('consulted'); ?> </option>
                                                            <option value="Cancelled" <?php
                                                                ?> > <?php echo lang('cancelled'); ?> </option>
                                                            <option value="Requested" <?php
                                                                ?> > <?php echo lang('requested'); ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('complaint'); ?> <span class="text-red">*</span></label>
                                                        <textarea class="form-control mb-4" name="remarks" placeholder="Purpose" rows="3" maxlength="500"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" id="appointment_id" value=''>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">

                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <button class="btn btn-primary pull-right" name="EditAppointment" type="submit"><?php echo lang('submit'); ?></button>
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
        <!-- <script src="<?php echo base_url('public/assets/js/formelementadvnced.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-elements.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/file-upload.js'); ?>"></script> -->

        <!-- popover js -->
        <script src="<?php echo base_url('public/assets/js/popover.js'); ?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

        <!-- Sweet alert js -->
        <script src="<?php echo base_url('public/assets/plugins/sweet-alert/jquery.sweet-modal.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/sweet-alert/sweetalert.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/sweet-alert.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>

    <!-- INTERNAL JS INDEX END -->

    <script type="text/javascript">
        $(document).ready(function () {
            flatpickr(".flatpickr", {
                altInput: true,
                altFormat: "F j, Y",
                disableMobile: true
            });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#editable-sample5").on("click", ".endEncounter", function(){
                var appointment_id = $(this).data('appointment');
                var encounter_id = $(this).data('encounter');
                var patient = $(this).data('patient');
                swal({
                    title: "End Encounter?",
                    text: "This will end encounter for " + patient,
                    showCancelButton: true,
                    confirmButtonText: 'End',
                    cancelButtonText: 'Cancel',
                }, function (isConfirm) {
                    if (!isConfirm) return;
                    $.ajax({
                        url: "encounter/endEncounterById?encounter_id="+encounter_id+"&appointment_id="+appointment_id,
                        type: "GET",
                        data: '',
                        dataType: "json",
                        success: function (response) {
                            swal("Done!", "You Successfully Ended", "success");
                            // console.log(response.encounter_id);
                            $(".endEncounter").remove();
                            $(".endEncounterDiv").append('<a class="btn btn-light btn-md btn-block">Encounter has Ended</a>');
                            $(".confirm").click(function () {
                                location.reload(true);
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error on Ending Encounter!", "Please try again", "error");
                        }
                    });
                });
            });

            $("#editable-sample2").on("click", ".endEncounter", function(){
                var appointment_id = $(this).data('appointment');
                var encounter_id = $(this).data('encounter');
                var patient = $(this).data('patient');
                swal({
                    title: "End Encounter?",
                    text: "This will end encounter for " + patient,
                    showCancelButton: true,
                    confirmButtonText: 'End',
                    cancelButtonText: 'Cancel',
                }, function (isConfirm) {
                    if (!isConfirm) return;
                    $.ajax({
                        url: "encounter/endEncounterById?encounter_id="+encounter_id+"&appointment_id="+appointment_id,
                        type: "GET",
                        data: '',
                        dataType: "json",
                        success: function (response) {
                            swal("Done!", "You Successfully Ended", "success");
                            // console.log(response.encounter_id);
                            $(".endEncounter").remove();
                            $(".endEncounterDiv").append('<a class="btn btn-light btn-md btn-block">Encounter has Ended</a>');
                            $(".confirm").click(function () {
                                location.reload(true);
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error on Ending Encounter!", "Please try again", "error");
                        }
                    });
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".editbutton", function () {
                // e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                var id = $(this).attr('data-id');

                $('#editAppointmentForm').trigger("reset");
                $('#myModal2').modal('show');
                $.ajax({
                    url: 'appointment/editAppointmentByJason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var de = response.appointment.date * 1000;
                        var d = new Date(de);
                        var da = (d.getMonth() + 1) + '/' + d.getDate() + '/' + d.getFullYear();
                        console.log(da);
                        // Populate the form fields with the data returned from server
                        $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                        $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                        $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                        
                        $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()

                        $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).change();
                        // $('#editAppointmentForm').find('[name="time_slot"]').val(response.appointment.time_slot).change();
                        
                        //$('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                        // $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');
                        var option = new Option(response.patient.name + ' (ID: ' + response.patient.id + ')', response.patient.id, true, true);
                        $('#editAppointmentForm').find('[name="patient"]').append(option).trigger('change');
                        var option1 = new Option(response.doctor.name + ' (ID: ' + response.doctor.id + ')', response.doctor.id, true, true);
                        $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');
                        var option2 = new Option(response.service_category.display_name , response.service_category.id, true, true);
                        $('#editAppointmentForm').find('[name="service_category_group"]').append(option2).trigger('change');
                        var option3 = new Option(response.services.description , response.services.id, true, true);
                        $('#editAppointmentForm').find('[name="service"]').append(option3).trigger('change');
                        if (response.branch != null) {
                            var option4 = new Option(response.branch.display_name , response.branch.id, true, true);
                            $('#editAppointmentForm').find('[name="branch"]').append(option4).trigger('change');
                        }
                        // $('#editAppointmentForm').find('[name="date"]').val(da).end()

                        $('.datetime').flatpickr({
                            dateFormat: "F j, Y",
                            defaultDate: response.datetime,
                            altInput: true,
                            altFormat: "F j, Y",
                            disableMobile: true
                        });

                        var service = response.appointment.service_id;

                        var date = $('#date1').val();
                        var doctorr = $('#adoctors1').val();
                        var appointment_id = $('#appointment_id').val();
                        var branch = $('#branch_select1').val();
                        // $('#default').trigger("reset");

                        $.ajax({
                            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + appointment_id + '&location=' + branch,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                            success: function (response) {
                                $('#aslots1').find('option').remove();

                                var slots = response.aslots;
                                console.log(slots);
                                $.each(slots, function (key, value) {
                                    $('#aslots1').append($('<option>').text(value).val(value)).end();
                                });

                                $("#aslots1").val(response.current_value)
                                        .find("option[value=" + response.current_value + "]").attr('selected', true);
                                //  $('#aslots1 option[value=' + response.current_value + ']').attr("selected", "selected");
                                //   $("#default-step-1 .button-next").trigger("click");
                                if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                                    $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                                }
                                
                            }
                        });
                        
                    }
                });
                
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".table").on("click", ".history", function () {

                //e.preventDefault(e);
                // Get the record's ID via attribute   
                var iid = $(this).attr('data-id');
                //var id = $(this).attr('data-id');
                console.log(iid);
                $('#editAppointmentForm').trigger("reset");
                $.ajax({
                    url: 'patient/getMedicalHistoryByjason?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    $('#medical_history').html("");
                    $('#medical_history').append(response.view);

                });
                $('#cmodal').modal('show');
            });
        });
    </script>



    <script>
        $(document).ready(function () {
            $('.pos_client').hide();
            $(document.body).on('change', '#pos_select', function () {

                var v = $("select.pos_select option:selected").val()
                if (v == 'add_new') {
                    $('.pos_client').show();
                } else {
                    $('.pos_client').hide();
                }
            });

        });


    </script>

<!-- jquery for service type, service, location dependencies start-->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#service_select").select2({
                placeholder: '<?php echo lang('select_service_type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getServiceCategoryGroupByEntityType',
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

        $(document).ready(function () {
            $("#branch_select").select2({
                placeholder: '<?php echo lang('select_branch'); ?>',
                allowClear: true,
                ajax: {
                    url: 'appointment/getBranchInfo',
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

        $(document).ready(function () {
            $("#service_select").change(function () {
                var doctor = $("#adoctors").val();
                var service_type = $("#service_select").val();

                // console.log(is_virtual);
                $('#sub_service').find('option').remove();
                $('#aslots').find('option').remove();
                $('#date').val('');
                $('#branch_select').find('option').remove();
                $.ajax({
                    url: 'appointment/getServicesByServiceCategoryGroupByDoctorHospital?servicecategorygroup=' + service_type + '&doctor=' + doctor,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response.services);
                        $.each(response.services, function (key, value) {
                            $('#sub_service').append($('<option>').text(value.description).val(value.id)).end();
                        });

                    }
                });

                var branch = $("branch_select").val;

                $.ajax({
                    url: 'appointment/getServiceCategoryById?id=' + service_type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var is_virtual = response.is_virtual;
                        
                        if (is_virtual) {
                            $(".branch_select").prop('hidden', true);
                            console.log(branch);
                        } else {
                            $(".branch_select").attr('hidden', false);
                            console.log('Not hidden');
                        }
                    }
                });

            });
        });

        $(document).ready(function () {
            $("#branch_select").change(function () {
                $('#aslots').find('option').remove();
                $('#date').val('');
            });
        });

        $(document).ready(function () {
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            var branch = $('#branch_select').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                }
            });
        });

        $(document).ready(function () {
            $('#date').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
            })
                    //Listen for the change even on the input
                    .change(dateChanged)
                    .on('changeDate', dateChanged);
        });

        function dateChanged() {
            // Get the record's ID via attribute  
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            var branch = $('#branch_select').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }


                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                }
            });

        }

    </script>


<!-- jquery for service type, service, location dependencies end-->

    

<!-- jquery for edit service type, service, location dependencies start-->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#service_select1").select2({
                placeholder: '<?php echo lang('select_service_type'); ?>',
                allowClear: true,
                ajax: {
                    url: 'finance/getServiceCategoryGroupByEntityType',
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

        $(document).ready(function () {
            $("#branch_select1").select2({
                placeholder: '<?php echo lang('select_branch'); ?>',
                allowClear: true,
                ajax: {
                    url: 'appointment/getBranchInfo',
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

        $(document).ready(function () {
            $("#service_select1").change(function () {
                var doctor = $("#adoctors1").val();
                var service_type = $("#service_select1").val();

                // console.log(is_virtual);
                $('#sub_service1').find('option').remove();
                $('#aslots1').find('option').remove();
                $('#date1').val('');
                $('#branch_select1').find('option').remove();
                $.ajax({
                    url: 'appointment/getServicesByServiceCategoryGroupByDoctorHospital?servicecategorygroup=' + service_type + '&doctor=' + doctor,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response.services);
                        $.each(response.services, function (key, value) {
                            $('#sub_service1').append($('<option>').text(value.description).val(value.id)).end();
                        });

                    }
                });

                var branch = $("#branch_select1").val;

                $.ajax({
                    url: 'appointment/getServiceCategoryById?id=' + service_type,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var is_virtual = response.is_virtual;
                        
                        if (is_virtual) {
                            $(".branch_select1").prop('hidden', true);
                            console.log(branch);
                        } else {
                            $(".branch_select1").attr('hidden', false);
                            console.log('Not hidden');
                        }
                    }
                });

            });
        });

        $(document).ready(function () {
            $("#branch_select1").change(function () {
                $('#aslots1').find('option').remove();
                $('#date1').val('');
            });
        });

        $(document).ready(function () {
            var iid = $('#date1').val();
            var doctorr = $('#adoctors1').val();
            var branch = $('#branch_select1').val();
            $('#aslots1').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots1').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                }
            });
        });

        $(document).ready(function () {
            $("#date1").change(function () {
                var iid = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                var branch = $('#branch_select1').val();
                $('#aslots1').find('option').remove();
                console.log(iid);
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr + '&location=' + branch,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var slots = response.aslots;
                        $.each(slots, function (key, value) {
                            $('#aslots1').append($('<option>').text(value).val(value)).end();
                        });
                        //   $("#default-step-1 .button-next").trigger("click");
                        if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                            $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                        }


                        // Populate the form fields with the data returned from server
                        //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                    }
                });
            });
        });

    </script>

<!-- jquery for edit service type, service, location dependencies end-->



    <script>
        $(document).ready(function () {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $.fn.dataTable
                        .tables({visible: true, api: true})
                        .columns.adjust()
                        .responsive.recalc();
            });
        });
    </script>


    <script>


        $(document).ready(function () {
            var table = $('#editable-sample5').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "appointment/getAppoinmentList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/english.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>
    <script>


        $(document).ready(function () {
            var table = $('#editable-sample6').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "appointment/getRequestedAppointmentList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/english.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    <script>


        $(document).ready(function () {
            var table = $('#editable-sample1').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "appointment/getPendingAppoinmentList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/english.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>
    <script>


        $(document).ready(function () {
            var table = $('#editable-sample2').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "appointment/getConfirmedAppoinmentList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/english.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    <script>


        $(document).ready(function () {
            var table = $('#editable-sample3').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "appointment/getTreatedAppoinmentList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/english.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    <script>


        $(document).ready(function () {
            var table = $('#editable-sample4').DataTable({
                responsive: true,
                //   dom: 'lfrBtip',

                "ajax": {
                    url: "appointment/getCancelledAppoinmentList",
                    type: 'POST',
                },
                scroller: {
                    loadingIndicator: true
                },
                dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
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
                    searchPlaceholder: "Search...",
                    "url": "common/assets/DataTables/languages/english.json"
                },
            });
            table.buttons().container().appendTo('.custom_buttons');
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#pos_select").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getPatientinfoWithAddNewOption',
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
            $(".patient").select2({
                placeholder: '<?php echo lang('select_patient'); ?>',
                allowClear: true,
                ajax: {
                    url: 'patient/getPatientinfo',
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
            $("#adoctors").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorInfo',
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
            $("#adoctors1").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'doctor/getDoctorInfo',
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
            $("#staffs").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getUserWithoutAddNewOption',
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

            $("#staffs1").select2({
                placeholder: '<?php echo lang('select_doctor'); ?>',
                allowClear: true,
                ajax: {
                    url: 'encounter/getUserWithoutAddNewOption',
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