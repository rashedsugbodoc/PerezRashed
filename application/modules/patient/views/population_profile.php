<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->

                        <!-- <style>
                            ul li {list-style-type: disc;}
                        </style> -->
                        
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"><?php echo lang('edit').' '.lang('population').' '.lang('health').' '.lang('profile'); ?></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('edit').' '.lang('population').' '.lang('health').' '.lang('profile'); ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form id="populationForm" method="post" action="patient/addPopulationProfile">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('family').' '.lang('profile').' '.lang('id'); ?></label>
                                                        <input type="text" name="family_profile" class="form-control" value="<?php
                                                            if (!empty($patient->family_profile_id)) {
                                                                echo $patient->family_profile_id;
                                                            }
                                                        ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="is_head_banner">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Is Head of Family?</label>
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-12">
                                                                <label class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="family_head_radio" value="1" <?php
                                                                    if ($patient->is_family_head == 1){
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                                                                    <span class="custom-control-label">Yes</span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <label class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="family_head_radio" value="0" <?php
                                                                    $is_family_head = $patient->is_family_head;
                                                                    if ($patient->is_family_head == null){
                                                                        echo "";
                                                                    } elseif ($patient->is_family_head == 0) {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                                                                    <span class="custom-control-label">No</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="search_family_head" hidden>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Specify Head of Family</label>
                                                        <a class="btn btn-primary" data-toggle="modal" id="search_family_head_button"><?php echo lang('select').'/'.lang('search'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="input_family_head" <?php
                                                if (empty($patient->family_head_patient_id)) {
                                                    echo "hidden";
                                                }
                                            ?>>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label class="form-label">Family Head</label>
                                                        <div class="row">
                                                            <div class="col-md-9 col-sm-10">
                                                                <input type="text" name="familyhead" id="familyhead" class="form-control" value="<?php
                                                                if (!empty($patient->family_head_patient_id)) {
                                                                    echo $this->patient_model->getPatientById($patient->family_head_patient_id)->name;
                                                                }
                                                                ?>" readonly>
                                                                <input type="hidden" name="familyhead_id" id="familyhead_id" value="<?php
                                                                if (!empty($patient->family_head_patient_id)) {
                                                                    echo $patient->family_head_patient_id;
                                                                }
                                                                ?>">
                                                            </div>
                                                            <div class="col-md-3 col-sm-2">
                                                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Relation to Family Head</label>
                                                        <select class="select2-show-search form-control" id="relation" name="family_head_relation">
                                                            <?php if(!empty($patient->relation_to_family_head_id)) { ?>
                                                                <option value="<?php echo $patient->relation_to_family_head_id; ?>" selected><?php echo $this->patient_model->getPatientRelationToHeadById($patient->relation_to_family_head_id)->display_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('monthly').' '.lang('family').' '.lang('income') ?></label>
                                                        <select class="select2-show-search form-control" id="monthly_family_income" name="monthly_family_income">
                                                            <?php if(!empty($patient->monthly_family_income_id)) { ?>
                                                                <option value="<?php echo $patient->monthly_family_income_id; ?>" selected><?php echo $this->patient_model->getMonthlyFamilyIncomeById($patient->monthly_family_income_id)->display_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('educational').' '.lang('attainment') ?></label>
                                                        <select class="form-control" id="educational_attainment" name="educational_attainment">
                                                            <?php if(!empty($patient->educational_attainment_id)) { ?>
                                                                <option value="<?php echo $patient->educational_attainment_id; ?>" selected><?php echo $this->patient_model->getEducationalAttainmentById($patient->educational_attainment_id)->display_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('safe').' '.lang('water').' '.lang('supply'); ?></label>
                                                        <div class="row" id="search_safe_water_supply" <?php
                                                            if (!empty($patient->safe_water_supply_level_id)) {
                                                                echo "hidden";
                                                            }
                                                        ?>>
                                                            <div class="col-md-12 col-sm-12">
                                                                <a class="btn btn-primary w-100" data-toggle="modal" data-target="#myModal2"><?php echo lang('select'); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="row" id="input_safe_water_supply" <?php
                                                            if (empty($patient->safe_water_supply_level_id)) {
                                                                echo "hidden";
                                                            }
                                                        ?>>
                                                            <div class="col-md-9 col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" name="safe_water_supply_text" id="safe_water_supply_text" class="form-control" value="<?php
                                                                        if (!empty($patient->safe_water_supply_level_id)) {
                                                                            echo $this->patient_model->getSafeWaterSupplyById($patient->safe_water_supply_level_id)->display_name;
                                                                        }
                                                                    ?>">
                                                                    <input type="hidden" name="safe_water_supply" id="safe_water_supply" class="form-control" value="<?php
                                                                        if (!empty($patient->safe_water_supply_level_id)) {
                                                                            echo $patient->safe_water_supply_level_id;
                                                                        }
                                                                    ?>">
                                                                    <button class="btn btn-light" id="safe_water_description" data-container="body" data-content="<?php
                                                                    if (!empty($patient->safe_water_supply_level_id)) {
                                                                        echo $this->patient_model->getSafeWaterSupplyById($patient->safe_water_supply_level_id)->description;
                                                                    }
                                                                    ?>" data-placement="top" data-popover-color="primary" title="<?php
                                                                    if (!empty($patient->safe_water_supply_level_id)) {
                                                                        echo $this->patient_model->getSafeWaterSupplyById($patient->safe_water_supply_level_id)->display_name;
                                                                    }
                                                                    ?>" type="button"><i class="fa fa-question-circle-o"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-2">
                                                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('sanitary').' '.lang('toilet'); ?></label>
                                                        <select class="form-control" id="sanitary_toilet" name="sanitary_toilet">
                                                            <?php if(!empty($patient->sanitary_toilet_id)) { ?>
                                                                <option value="<?php echo $patient->sanitary_toilet_id; ?>" selected><?php echo $this->patient_model->getSanitaryToiletById($patient->sanitary_toilet_id)->display_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('sexually').' '.lang('active'); ?></label>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <label class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="sexually_active" value="1" <?php
                                                                    if ($patient->is_sexually_active == 1){
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                                                                    <span class="custom-control-label">Yes</span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <label class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="sexually_active" value="0" <?php
                                                                    if ($patient->is_sexually_active == null){
                                                                        echo "";
                                                                    } elseif ($patient->is_sexually_active == 0) {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                                                                    <span class="custom-control-label">No</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('unmet').' '.lang('need'); ?></label>
                                                        <div class="row" id="search_unmet_need" <?php
                                                            if (!empty($patient->unmet_need_id)) {
                                                                echo "hidden";
                                                            }
                                                        ?>>
                                                            <div class="col-md-12 col-sm-12">
                                                                <a class="btn btn-primary w-100" data-toggle="modal" data-target="#myModal3"><?php echo lang('select'); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="row" id="input_unmet_need" <?php
                                                            if (empty($patient->unmet_need_id)) {
                                                                echo "hidden";
                                                            }
                                                        ?>>
                                                            <div class="col-md-9 col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" name="unmet_need_text" id="unmet_need_text" class="form-control" value="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $this->patient_model->getUnmetNeedById($patient->unmet_need_id)->display_name;
                                                                        }
                                                                    ?>">
                                                                    <input type="hidden" name="unmet_need" id="unmet_need" class="form-control" value="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $patient->unmet_need_id;
                                                                        }
                                                                    ?>">
                                                                    <button class="btn btn-light" id="unmet_need_description" data-container="body" data-content="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $this->patient_model->getUnmetNeedById($patient->unmet_need_id)->description;
                                                                        }
                                                                    ?>" data-placement="top" data-popover-color="primary" title="<?php
                                                                        if (!empty($patient->unmet_need_id)) {
                                                                            echo $this->patient_model->getUnmetNeedById($patient->unmet_need_id)->display_name;
                                                                        }
                                                                    ?>" type="button"><i class="fa fa-question-circle-o"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-2">
                                                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal3">Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('nutrition').' '.lang('status'); ?></label>
                                                        <select class="select2-show-search form-control">
                                                            <option>Option1</option>
                                                            <option>Option2</option>
                                                            <option>Option3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Underwent Newborn Screening</label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="newborn-screening" value="Yes" checked>
                                                            <span class="custom-control-label">Yes</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="newborn-screening" value="No">
                                                            <span class="custom-control-label">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('result'); ?></label>
                                                        <input type="text" name="newborn-result" class="form-control">
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Deceased</label>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <label class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="deceased" value="1" <?php
                                                                    if ($patient->is_deceased == 1){
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                                                                    <span class="custom-control-label">Yes</span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <label class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="deceased" value="0" <?php
                                                                    if ($patient->is_deceased == null){
                                                                        echo "";
                                                                    } elseif ($patient->is_deceased == 0) {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>
                                                                    <span class="custom-control-label">No</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12" id="date_of_death" <?php
                                                if (empty($patient->deceased_date)) {
                                                    echo "hidden";
                                                }
                                                ?>>
                                                    <div class="form-group">
                                                        <label class="form-label">Date of Death</label>
                                                        <input type="text" name="date_of_death" class="form-control flatpickr" value="<?php
                                                        if (!empty($patient->deceased_date)) {
                                                            echo date('Y-m-d H:i A', strtotime($patient->deceased_date.' UTC'));
                                                        }
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary pull-right" name="submit" type="submit"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('search').' '.lang('profile'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform1" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('family').' '.lang('profile').' '.lang('id'); ?></label>
                                                        <input type="text" name="profile_id_search" id="profile_id_search" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('first_name'); ?></label>
                                                        <input type="text" name="f_name_search" id="f_name_search" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('middle_name'); ?></label>
                                                        <input type="text" name="m_name_search" id="m_name_search" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('last_name'); ?></label>
                                                        <input type="text" name="l_name_search" id="l_name_search" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <a class="btn btn-primary pull-right" id="search" name="submit"><?php echo lang('search'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="searchResult">

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group" id="result_ok_btn">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('safe').' '.lang('water').' '.lang('supply'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform2" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php foreach($safe_water_supply as $sws) { ?>
                                                <div class="row mb-5 safe_water_item" data-id="<?php echo $sws->id; ?>" data-name="<?php echo $sws->display_name; ?>" data-description="<?php echo $sws->description; ?>">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a class="btn btn-success w-100">
                                                            <div class="row text-left">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="container">
                                                                            <label class="form-label font-weight-bold text-wrap"><?php echo $sws->display_name; ?></label>
                                                                            <label class="form-label text-wrap"><?php echo $sws->description; ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo lang('unmet').' '.lang('need'); ?></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform3" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php foreach($unmet_need as $un) { ?>
                                                <div class="row mb-5 unmet_need_item" data-id="<?php echo $un->id; ?>" data-name="<?php echo $un->display_name; ?>" data-description="<?php echo $un->description; ?>">
                                                    <div class="col-md-12 col-sm-12">
                                                        <a class="btn btn-success w-100">
                                                            <div class="row text-left">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="container">
                                                                            <label class="form-label font-weight-bold text-wrap"><?php echo $un->display_name; ?></label>
                                                                            <label class="form-label text-wrap"><?php echo $un->description; ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">These are family members associated with you as head: </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" name="myform4" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">These are family members associated with you as head: </label>
                                                        <div class="container">
                                                            <ul class="list-group" id="family_member_list">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>They will have to remove you as head first.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>
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
        <script src="<?php echo base_url('common/assets/intl-tel-input/build/js/intlTelInput.js');?>"></script>

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

        <!-- parlsey js -->
        <script src="<?php echo base_url('public/assets/plugins/parsleyjs/parsley.min.js');?>"></script>

        <!-- Notifications js -->
        <script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>

        <!-- flatpickr js -->
        <script src="<?php echo base_url('common/assets/flatpickr/dist/flatpickr.js'); ?>"></script>
        <!-- INTERNAL JS INDEX END -->

    <!-- INTERNAL JS INDEX END -->

    <!-- <script type="text/javascript">
        $(document).ready(function (){
            var family_profile_id = $("#populationForm").find('[name=family_profile]').val();
            $.ajax({
                url: 'patient/getPatientPopulationByJason?profile='+family_profile_id,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var patient_profile = response.patient_profile;

                    $("#monthly_family_income").val(patient_profile.monthly_family_income).change();
                }
            });
        })
    </script> -->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            var family_profile = $("#populationForm").find('[name=family_profile]').val();
            $.ajax({
                url: 'patient/checkFamilyHead?id='+ family_profile,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    if (response.patient_details.is_family_head == 1) {
                        alert(response.family_number_count+' - '+response.patient_details.is_family_head);
                        $("#is_head_banner").attr("hidden", true);
                    }
                }
            })
        });
    </script> -->

    <script type="text/javascript">
        $('#search_family_head_button').click(function() {
            var family_profile = $("#populationForm").find('[name=family_profile]').val();
            $.ajax({
                url: 'patient/checkFamilyHead?id='+ family_profile,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    var family_member_count = response.family_number_count;
                    if (family_member_count <= 1) {
                        $('#myModal1').modal('show');
                    } else {
                        $.each(response.patient_list, function(key, value) {
                            $("#family_member_list").append('\n\
                                <li class="listunorder">'+value.name+' ( Patient ID: ' + value.patient_id + ' ) ' +'</li>\n\
                            ');
                        });
                        $('#myModal4').modal('show');
                    }
                }
            })
        });
    </script>

    <script type="text/javascript">
        flatpickr(".flatpickr", {
            altInput: true,
            altFormat: "F j, Y",
            maxDate: "today",
            disableMobile: true
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#search").click(function() {
                $("#results").remove();
                $("#search_ok_result").remove();
                var profile_id = $("#profile_id_search").val();
                var f_name = $("#f_name_search").val();
                var m_name = $("#m_name_search").val();
                var l_name = $("#l_name_search").val();
                $.ajax({
                    url: 'patient/searchFamilyHead?id='+profile_id+'&f_name='+f_name+'&m_name='+m_name+'&l_name='+l_name,
                    method: 'POST',
                    data: '',
                    dataType: 'json',
                    success: function (response) {
                        var family_head = response.family_head;

                        console.log(family_head);

                        if (family_head == null) {
                            $("#searchResult").append('<div class="row" id="results"><div class="col-md-12"><div class="form-group">\n\
                                <label class="form-label font-weight-bold"><h3>0 Result Found</h3></label>\n\
                            </div></div></div>')
                        } else {
                            $("#searchResult").append('<div class="row" id="results"><div class="col-md-12"><div class="form-group">\n\
                                    <label class="form-label font-weight-bold"><h3>Found: </h3></label>\n\
                                    <label><h5>'+family_head.name+'</h5></label><br>\n\
                                    <label><h5>Family Profile ID: '+family_head.family_profile_id+'<h5></label>\n\
                                </div></div></div>');
                            $("#result_ok_btn").append('<a class="btn btn-primary pull-right" id="search_ok_result">Ok</a>');

                            $("#search_ok_result").click(function() {
                                $("#search_family_head").attr("hidden", true);
                                $('#myModal1').modal('hide');
                                $("#input_family_head").attr("hidden", false);
                                $("#populationForm").find('[name=familyhead]').attr("readonly", true);
                                $("#populationForm").find('[name=familyhead]').val(family_head.name+'('+family_head.family_profile_id+')');
                                $("#populationForm").find('[name=familyhead_id]').val(family_head.id);
                            });
                        }
                    }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type=radio][name=family_head_radio]').change(function() {
                var is_head = this.value;
                console.log(is_head);
                if (is_head == "0") {
                    $("#search_family_head").attr("hidden", false);
                } else {
                    $("#search_family_head").attr("hidden", true);
                    $("#input_family_head").attr("hidden", true);
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type=radio][name=deceased]').change(function() {
                var is_deceased = this.value;
                console.log(is_deceased);
                if (is_deceased == "1") {
                    $("#date_of_death").attr("hidden", false);
                } else {
                    $("#date_of_death").attr("hidden", true);
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(".safe_water_item").click(function () {
            var safe_water_id = $(this).data("id");
            var safe_water_name = $(this).data("name");
            var safe_water_description = $(this).data("description");
            $("#search_safe_water_supply").attr("hidden", true);
            $("#input_safe_water_supply").attr("hidden", false);
            $("#safe_water_supply").attr("readonly", true);
            $("#safe_water_supply").val(safe_water_id);
            $("#safe_water_supply_text").attr("readonly", true);
            $("#safe_water_supply_text").val(safe_water_name);
            $("#safe_water_description").attr("data-content", safe_water_description);
            $("#safe_water_description").attr("data-original-title", safe_water_name);
            $('#myModal2').modal('hide');
        })
    </script>

    <script type="text/javascript">
        $(".unmet_need_item").click(function () {
            var unmet_need_id = $(this).data("id");
            var unmet_need_name = $(this).data("name");
            var unmet_need_description = $(this).data('description');
            $("#search_unmet_need").attr("hidden", true);
            $("#input_unmet_need").attr("hidden", false);
            $("#unmet_need").attr("readonly", true);
            $("#unmet_need").val(unmet_need_id);
            $("#unmet_need_text").attr("readonly", true);
            $("#unmet_need_description").attr("data-content", unmet_need_description);
            $("#unmet_need_description").attr("data-original-title", unmet_need_name);
            $("#unmet_need_text").val(unmet_need_name);
            $('#myModal3').modal('hide');
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#educational_attainment").select2({
                placeholder: 'Search Educational Attainment',
                allowClear: true,
                ajax: {
                    url: 'patient/getEducationalAttainmentInfo',
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

            $("#relation").select2({
                placeholder: 'Search Relation to Family Head',
                allowClear: true,
                ajax: {
                    url: 'patient/getRelationInfo',
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

            $("#sanitary_toilet").select2({
                placeholder: 'Search Sanitary Toilet',
                allowClear: true,
                ajax: {
                    url: 'patient/getSanitaryToiletInfo',
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

            $("#monthly_family_income").select2({
                placeholder: 'Search Sanitary Toilet',
                allowClear: true,
                ajax: {
                    url: 'patient/getMonthlyFamilyIncomeInfo',
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

    </body>
</html>