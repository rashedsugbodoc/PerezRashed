<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <style>
                            .ui-datepicker-calendar {
                               display: none;
                            }
                        </style>

                        <div class="row mt-5">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <?php echo lang('edit').' '.lang('health').' '.lang('declaration'); ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form id="formDeclaration" action="patient/addHealthDeclaration" method="post">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="medical_history_number" value="<?php echo $medical_history?$medical_history->medical_history_number:''; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="form-label"><h5>Do you have or have you ever had?</h5></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Cancer</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="cancer" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_cancer:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="cancer" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_cancer:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_cancer:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-cancer" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_cancer:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_cancer:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_cancer:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_cancer" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->cancer_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->cancer_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Hypertension</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hypertension" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_hypertension:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hypertension" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_hypertension:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_hypertension:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-hypertension" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_hypertension:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_hypertension:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_hypertension:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_hypertension" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->hypertension_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->hypertension_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Diabetes</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="diabetes" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_diabetes:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="diabetes" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_diabetes:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_diabetes:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-diabetes" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_diabetes:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_diabetes:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_diabetes:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_diabetes" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->diabetes_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->diabetes_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Heart Disease</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="heart_disease" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_heart_disease:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="heart_disease" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_heart_disease:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_heart_disease:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-heart-disease" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_heart_disease:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_heart_disease:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_heart_disease:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_heart_disease" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->heart_disease_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->heart_disease_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Stroke</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="stroke" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_stroke:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="stroke" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_stroke:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_stroke:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-stroke" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_stroke:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_stroke:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_stroke:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_stroke" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->stroke_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->stroke_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Kidney</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="kidney" value="1" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_kidney_bladder_disease:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="kidney" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_kidney_bladder_disease:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_kidney_bladder_disease:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-kidney" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_kidney_bladder_disease:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_kidney_bladder_disease:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_kidney_bladder_disease:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_kidney" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->kidney_bladder_disease_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->kidney_bladder_disease_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Liver</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="liver" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_liver_gallbladder_disease:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="liver" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_liver_gallbladder_disease:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_liver_gallbladder_disease:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-liver" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_liver_gallbladder_disease:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_liver_gallbladder_disease:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_liver_gallbladder_disease:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_liver" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->liver_gallbladder_disease_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->liver_gallbladder_disease_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Hepatitis</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hepatitis" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_hepatitis:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hepatitis" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_hepatitis:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_hepatitis:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-hepatitis" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_hepatitis:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_hepatitis:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_hepatitis:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_hepatitis" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->hepatitis_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->hepatitis_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">High Blood Pressure</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="high_blood_pressure" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_high_blood_pressure:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="high_blood_pressure" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_high_blood_pressure:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_high_blood_pressure:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-high-blood-pressure" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_high_blood_pressure:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_high_blood_pressure:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_high_blood_pressure:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_high_blood_pressure" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->high_blood_pressure_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->high_blood_pressure_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">AIDS / HIV</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hiv" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_aids_hiv:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hiv" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_aids_hiv:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_aids_hiv:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-hiv" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_aids_hiv:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_aids_hiv:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_aids_hiv:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_hiv" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->aids_hiv_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->aids_hiv_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Tuberculosis</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="tuberculosis" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_tuberculosis:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="tuberculosis" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_tuberculosis:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_tuberculosis:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-tuberculosis" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_tuberculosis:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_tuberculosis:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_tuberculosis:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_tuberculosis" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->tuberculosis_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->tuberculosis_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Asthma</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="asthma" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_asthma:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="asthma" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_asthma:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_asthma:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-asthma" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_asthma:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_asthma:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_asthma:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_asthma" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->asthma_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->asthma_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Autoimmune Disease</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="autoimmune" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_autoimmune_disease:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="autoimmune" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_autoimmune_disease:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_autoimmune_disease:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-autoimmune" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_autoimmune_disease:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_autoimmune_disease:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_autoimmune_disease:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_autoimmune" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->autoimmune_disease_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->autoimmune_disease_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Epilepsy</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="epilepsy" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_epilepsy:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="epilepsy" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_epilepsy:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_epilepsy:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-epilepsy" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_epilepsy:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_epilepsy:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_epilepsy:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_epilepsy" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->epilepsy_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->epilepsy_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Fibromyalgia</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="fibromyalgia" value="1" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_fibromyalgia:'' == 1){
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="fibromyalgia" value="0" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_fibromyalgia:'' == null){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_fibromyalgia:'' == 0) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-fibromyalgia" <?php
                                                        if ($medical_history?$medical_history->is_diagnosed_fibromyalgia:'' == 1){
                                                            echo "";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_fibromyalgia:'' == "0"){
                                                            echo "hidden";
                                                        } elseif ($medical_history?$medical_history->is_diagnosed_fibromyalgia:'' == null) {
                                                            echo "hidden";
                                                        }
                                                        ?>>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_fibromyalgia" class="form-control" minlength="1" maxlength="50" value="<?php
                                                                    if ($medical_history?$medical_history->fibromyalgia_details:'' == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $medical_history?$medical_history->fibromyalgia_details:'';
                                                                    }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Past Hospitalization (Year, Reason, Hospital)</label>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table nowrap text-nowrap border mt-5">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="w-2"></th>
                                                                                <th class="w-8"><?php echo lang('year'); ?></th>
                                                                                <th class="w-60"><?php echo lang('reason').'/'.lang('diagnosis'); ?></th>
                                                                                <th class="w-15"><?php echo lang('hospital'); ?></th>
                                                                                <th class="w-15"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="past_hospitalization">
                                                                            <?php if(!empty($medical_history->past_hospitalizations)) { ?>
                                                                                <?php foreach($past_hospitalizations as $past_hospitalization) { ?>
                                                                                    <tr id="past_medication_list<?php echo $past_hospitalization->count; ?>">
                                                                                        <td>
                                                                                            <button class="btn btn-danger" type="button" id="removePastMedication<?php echo $past_hospitalization->count; ?>" onclick="removePastMedication(<?php echo $past_hospitalization->count; ?>);"><i class="fe fe-trash"></i></button>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="hidden" value="<?php echo $past_hospitalization->count; ?>" name="count[]" id="countHidden<?php echo $past_hospitalization->count; ?>">
                                                                                            <select class="select2-show-search year" name="year[]" id="year<?php echo $past_hospitalization->count; ?>" data-placeholder="Choose one">
                                                                                                <option label="Choose one"></option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" name="diagnosis[]" class="form-control diagnosis" value="<?php echo $past_hospitalization->diagnosis; ?>">
                                                                                        </td>
                                                                                        <td <?php if ($past_hospitalization->hospital === "add_new") { echo ''; } else { echo 'hidden'; } ?> id="specific_hospital<?php echo $past_hospitalization->count; ?>">
                                                                                            <input type="text" name="specific_hospital[]" class="form-control hospital_specific" id="hospital_specific_input<?php echo $past_hospitalization->count; ?>" value="<?php echo $past_hospitalization->specific_hospital; ?>">
                                                                                        </td>
                                                                                        <td class="hospital<?php echo $past_hospitalization->count; ?>Div">
                                                                                            <select class="select2-show-search form-control hospital" data-hospital="hospital<?php echo $past_hospitalization->count; ?>" name="hospital[]" data-placeholder="Choose one" onchange="changeHospital(<?php echo $past_hospitalization->count; ?>)" id="hospital<?php echo $past_hospitalization->count; ?>">
                                                                                                <option label="Choose one"></option>
                                                                                                <option value="add_new" <?php if ($past_hospitalization->hospital === "add_new") { echo 'selected'; } ?>><?php echo lang('specify_name').' ('.' if not listed '.')' ?></option>
                                                                                                <?php foreach($hospitals as $hospital) { ?>
                                                                                                    <?php if ($hospital->id == $past_hospitalization->hospital) { ?>
                                                                                                        <option value="<?php echo $past_hospitalization->hospital; ?>" selected><?php echo $this->hospital_model->getHospitalById($past_hospitalization->hospital)->name.' (ID: '.$past_hospitalization->hospital.')'; ?></option>
                                                                                                    <?php } else { ?>
                                                                                                        <option value="<?php echo $hospital->id ?>">
                                                                                                            <?php echo $hospital->name.' (ID: '.$hospital->id.')'; ?>
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                            <!-- <tr>
                                                                                <td>
                                                                                    <select class="select2-show-search" id="year"></select>
                                                                                </td>
                                                                                <td><input type="text" name="" class="form-control"></td>
                                                                                <td>
                                                                                    <select class="select2-show-search">
                                                                                        <option>Hospital 1</option>
                                                                                        <option>Hospital 2</option>
                                                                                        <option>Hospital 3</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr> -->
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <td><button type="button" class="btn btn-primary w-100" id="newRecord_past_hospitalization"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo lang('past_surgery'); ?></label>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table nowrap text-nowrap border mt-5">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="w-2"></th>
                                                                                <th class="w-8 text-center"><?php echo lang('year'); ?></th>
                                                                                <th class="w-60"><?php echo lang('reason').'/'.lang('diagnosis'); ?></th>
                                                                                <th class="w-15"><?php echo lang('hospital'); ?></th>
                                                                                <th class="w-15"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="past_surgery">
                                                                            <?php if(!empty($medical_history->past_surgeries)) { ?>
                                                                                <?php foreach($past_surgeries as $past_surgery) { ?>
                                                                                    <tr id="past_surgery_list<?php echo $past_surgery->count; ?>">
                                                                                        <td>
                                                                                            <button class="btn btn-danger" type="button" id="removePastSurgery<?php echo $past_surgery->count; ?>" onclick="removePastSurgery(<?php echo $past_surgery->count; ?>);"><i class="fe fe-trash"></i></button>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="hidden" value="<?php echo $past_surgery->count; ?>" name="countSurgery[]" id="countSurgeryHidden<?php echo $past_surgery->count; ?>">
                                                                                            <select class="select2-show-search surgery_year" name="surgery_year[]" id="surgery_year<?php echo $past_surgery->count; ?>" data-placeholder="Choose one">
                                                                                                <option label="Choose one"></option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" name="surgery_diagnosis[]" class="form-control surgery_diagnosis" value="<?php echo $past_surgery->diagnosis; ?>">
                                                                                        </td>
                                                                                        <td <?php if ($past_surgery->hospital === "add_new") { echo ''; } else { echo 'hidden'; } ?> id="surgery_specific_hospital<?php echo $past_surgery->count; ?>">
                                                                                            <input type="text" name="surgery_specific_hospital[]" class="form-control hospital_specific" id="hospital_specific_input<?php echo $past_surgery->count; ?>" value="<?php echo $past_surgery->specific_hospital; ?>">
                                                                                        </td>
                                                                                        <td class="surgery_hospital<?php echo $past_surgery->count; ?>Div">
                                                                                            <select class="select2-show-search form-control surgery_hospital" data-hospital="surgery_hospital<?php echo $past_surgery->count; ?>" name="hospital[]" data-placeholder="Choose one" onchange="changeSurgeryHospital(<?php echo $past_surgery->count; ?>)" id="surgery_hospital<?php echo $past_surgery->count; ?>">
                                                                                                <option label="Choose one"></option>
                                                                                                <option value="add_new" <?php if ($past_surgery->hospital === "add_new") { echo 'selected'; } ?>><?php echo lang('specify_name').' ('.' if not listed '.')' ?></option>
                                                                                                <?php foreach($hospitals as $hospital) { ?>
                                                                                                    <?php if ($hospital->id == $past_surgery->hospital) { ?>
                                                                                                        <option value="<?php echo $past_surgery->hospital; ?>" selected><?php echo $this->hospital_model->getHospitalById($past_surgery->hospital)->name.' (ID: '.$past_surgery->hospital.')'; ?></option>
                                                                                                    <?php } else { ?>
                                                                                                        <option value="<?php echo $hospital->id ?>">
                                                                                                            <?php echo $hospital->name.' (ID: '.$hospital->id.')'; ?>
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <td><button type="button" class="btn btn-primary w-100" id="newRecord_past_surgery"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Current Medication</label>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table nowrap text-nowrap border mt-5">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="w-2"></th>
                                                                                <th class="w-8 text-center">#</th>
                                                                                <th class="w-90"><?php echo lang('medicine').' '.lang('name'); ?></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="current_medication">
                                                                            <?php if(!empty($medical_history->current_medications)) { ?>
                                                                                <?php $medicine_count = 1; ?>
                                                                                <?php foreach($current_medications as $current_medication) { ?>
                                                                                    <tr id="medicine_list<?php echo $medicine_count; ?>">
                                                                                        <td class="w-2"><button type="button" class="btn btn-danger" id="removeMedication<?php echo $medicine_count; ?>" onclick="removeMedicine(<?php echo $medicine_count; ?>);"><i class="fe fe-trash"></i></button></td>
                                                                                        <td class="w-8 text-center">
                                                                                            <label class="h5" id="medicine_count<?php echo $medicine_count ?>"><?php echo $medicine_count; ?></lable>
                                                                                        </td>
                                                                                        <td class="w-90">
                                                                                            <input type="text" class="form-control medicine" name="medicine_name[]" value="<?php echo $current_medication->medicine; ?>">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php $medicine_count++; ?>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <td><button type="button" class="btn btn-primary" id="newRecord_current_medication"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Allergies</label>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table nowrap text-nowrap border mt-5">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="w-2"></th>
                                                                                <th class="w-8 text-center">#</th>
                                                                                <th class="w-90"><?php echo lang('substance').' '.lang('name'); ?></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="allergies">
                                                                            <?php if(!empty($medical_history->allergies)) { ?>
                                                                                <?php $allergy_count = 1; ?>
                                                                                <?php foreach($allergies as $allergy) { ?>
                                                                                    <tr id="allergy_list<?php echo $allergy_count; ?>">
                                                                                        <td class="w-2">
                                                                                            <button class="btn btn-danger" type="button" id="removeAllergy<?php echo $allergy_count; ?>" onclick="removeAllergy(<?php echo $allergy_count; ?>);"><i class="fe fe-trash"></i></button>
                                                                                        </td>
                                                                                        <td class="w-8 text-center">
                                                                                            <label class="h5" id="allergy_count<?php echo $allergy_count ?>"><?php echo $allergy_count; ?></lable>
                                                                                        </td>
                                                                                        <td class="w-90">
                                                                                            <input type="text" class="form-control allergy" name="allergy_name[]" value="<?php echo $allergy->allergy; ?>">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php $allergy_count++; ?>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <td><button type="button" class="btn btn-primary" id="newRecord_allergies"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="hidden" name="id" value="<?php echo $patient->id; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-primary"><?php echo lang('submit'); ?></button>
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

        <!-- WYSIWYG Editor js -->
        <script src="<?php echo base_url('public/assets/plugins/wysiwyag/jquery.richtext.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor.js'); ?>"></script>

        <!-- quill js -->
        <script src="<?php echo base_url('public/assets/plugins/quill/quill.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/js/form-editor2.js'); ?>"></script>

        <script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>

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
        flatpickr(".flatpickr", {
            altInput: true,
            altFormat: "Y",
            dateFormat: "Y",
            maxDate: "today",
            disableMobile: true
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            // var medicine = $("#formDeclaration").find("[name=medicine_name]").val();
            // var medicine = $(".medicine").val();

            // console.log(medicine);
            var titles = $('tr[id^=medicine_list]').map(function(idx, elem) {
                return $(elem).html();
            }).get();

              console.log(titles);
              event.preventDefault();
        });
    </script>

    <script type="text/javascript">
        function changeHospital(hospital_id) {
            if ($("#hospital"+hospital_id).val() === "add_new") {
                $('#specific_hospital'+hospital_id).attr("hidden", false);
                // $('#specific_hospital'+hospital_id).addClass("w-8");
                // $('.hospital'+hospital_id+'Div').removeClass('w-10');
                // $('.hospital'+hospital_id+'Div').addClass('w-2');
                // $('.hospital'+hospital_id+'Div').attr("hidden", true);
            } else {
                $('#specific_hospital'+hospital_id).attr("hidden", true);
                $("#hospital_specific_input"+hospital_id).val('');
            }
            console.log($("#hospital"+hospital_id).val());
        }

        function changeSurgeryHospital(hospital_id) {
            if ($("#surgery_hospital"+hospital_id).val() === "add_new") {
                $('#surgery_specific_hospital'+hospital_id).attr("hidden", false);
                // $('#specific_hospital'+hospital_id).addClass("w-8");
                // $('.hospital'+hospital_id+'Div').removeClass('w-10');
                // $('.hospital'+hospital_id+'Div').addClass('w-2');
                // $('.hospital'+hospital_id+'Div').attr("hidden", true);
            } else {
                $('#surgery_specific_hospital'+hospital_id).attr("hidden", true);
                $("#surgery_hospital_specific_input"+hospital_id).val('');
            }
            console.log($("#hospital"+hospital_id).val());
        }

        function removeMedicine(medicine_count) {
            $("#medicine_list"+medicine_count).remove();

            var titles = $('tr[id^=medicine_list]').map(function(idx, elem) {
                return $(elem).attr("id", "medicine_list"+idx);
            }).get();

            var med_label = $('label[id^=medicine_count]').map(function(idx, elem) {
                // return $('label[class^=medicine_count]').addClass('medicine_count'+idx);
                return [$(elem).attr("id", "medicine_count"+idx), $(elem).text(idx+1)];
            }).get();

            var med_button = $('button[id^=removeMedication]').map(function(idx, elem) {
                // return $('label[class^=medicine_count]').addClass('medicine_count'+idx);
                return [$(elem).attr("id", "removeMedication"+idx), $(elem).attr("onclick", "removeMedicine("+idx+");")];
            }).get();

            // titles.addClass('zzzzz');
            console.log(titles);
            console.log(med_label);
            console.log(med_button);
            event.preventDefault();
        }

        function removeAllergy(allergy_count) {
            $("#allergy_list"+allergy_count).remove();

            var titles = $('tr[id^=allergy_list]').map(function(idx, elem) {
                return $(elem).attr("id", "allergy_list"+idx);
            }).get();

            var allergy_label = $('label[id^=allergy_count]').map(function(idx, elem) {
                // return $('label[class^=medicine_count]').addClass('medicine_count'+idx);
                return [$(elem).attr("id", "allergy_count"+idx), $(elem).text(idx+1)];
            }).get();

            var allergy_button = $('button[id^=removeAllergy]').map(function(idx, elem) {
                // return $('label[class^=medicine_count]').addClass('medicine_count'+idx);
                return [$(elem).attr("id", "removeAllergy"+idx), $(elem).attr("onclick", "removeAllergy("+idx+");")];
            }).get();

            console.log(titles);
            console.log(allergy_label);
            console.log(allergy_button);
            event.preventDefault();
        }

        function removePastSurgery(past_sur_count) {
            $("#past_surgery_list"+past_sur_count).remove();

            var titles = $('tr[id^=past_surgery_list]').map(function(idx, elem) {
                return $(elem).attr("id", "past_surgery_list"+idx);
            }).get();

            var hospital_button = $('button[id^=removePastSurgery]').map(function(idx, elem) {
                // return $('label[class^=medicine_count]').addClass('medicine_count'+idx);
                return [$(elem).attr("id", "removePastSurgery"+idx), $(elem).attr("onclick", "removePastSurgery("+idx+");")];
            }).get();

            var hospital_count = $('input[id^=countSurgeryHidden]').map(function(idx, elem) {
                return [$(elem).attr("id", "countSurgeryHidden"+idx), $(elem).val(idx)];
            }).get();

            var hospital_year = $('select[id^=surgery_year]').map(function(idx, elem) {
                return [$(elem).attr("id", "surgery_year"+idx), $(elem).val(idx)];
            }).get();

            console.log(titles);
            console.log(hospital_button);
            console.log(hospital_count);
            console.log(hospital_year);
            event.preventDefault();
        }

        function removePastMedication(past_med_count) {
            $("#past_medication_list"+past_med_count).remove();

            var titles = $('tr[id^=past_medication_list]').map(function(idx, elem) {
                return $(elem).attr("id", "past_medication_list"+idx);
            }).get();

            var hospital_button = $('button[id^=removePastMedication]').map(function(idx, elem) {
                // return $('label[class^=medicine_count]').addClass('medicine_count'+idx);
                return [$(elem).attr("id", "removePastMedication"+idx), $(elem).attr("onclick", "removePastMedication("+idx+");")];
            }).get();

            var hospital_count = $('input[id^=countHidden]').map(function(idx, elem) {
                return [$(elem).attr("id", "countHidden"+idx), $(elem).val(idx)];
            }).get();

            var hospital_year = $('select[id^=year]').map(function(idx, elem) {
                return [$(elem).attr("id", "year"+idx), $(elem).val(idx)];
            }).get();

            console.log(titles);
            console.log(hospital_button);
            console.log(hospital_count);
            console.log(hospital_year);
            event.preventDefault();
        }

        // function onClick(event) {
        //   var titles = $('input[name^=medicine_name]').map(function(idx, elem) {
        //     return $(elem).val();
        //   }).get();

        //   console.log(titles);
        //   event.preventDefault();
        // }
    </script>

    <script type="text/javascript">
        $(document).ready(function (){
            $("#formDeclaration").on("click", "#newRecord_allergies", function () {
                var allergies_count = $(".allergy").length;
                $("#allergies").append('\n\
                    <tr id="allergy_list'+allergies_count+'">\n\
                        <td class="w-2">\n\
                            <button class="btn btn-danger" type="button" id="removeAllergy'+allergies_count+'" onclick="removeAllergy('+allergies_count+');"><i class="fe fe-trash"></i></button>\n\
                        </td>\n\
                        <td class="w-8 text-center">\n\
                            <label class="h5" id="allergy_count'+allergies_count+'">'+parseInt(allergies_count+1)+'</lable>\n\
                        </td>\n\
                        <td class="w-90">\n\
                            <input type="text" class="form-control allergy" name="allergy_name[]">\n\
                        </td>\n\
                    </tr>\n\
                ');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function (){
            $("#formDeclaration").on("click", "#newRecord_current_medication", function () {
                var medicine_count = $(".medicine").length;
                $("#current_medication").append('\n\
                    <tr id="medicine_list'+medicine_count+'">\n\
                        <td class="w-2">\n\
                            <button class="btn btn-danger" type="button" id="removeMedication'+medicine_count+'" onclick="removeMedicine('+medicine_count+');"><i class="fe fe-trash"></i></button>\n\
                        </td>\n\
                        <td class="w-8 text-center">\n\
                            <label class="h5" id="medicine_count'+medicine_count+'">'+parseInt(medicine_count+1)+'</lable>\n\
                        </td>\n\
                        <td class="w-90">\n\
                            <input type="text" class="form-control medicine" name="medicine_name[]">\n\
                        </td>\n\
                    </tr>\n\
                ');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function (){
            $("#formDeclaration").on("click", "#newRecord_past_surgery", function() {
                var countSurgeryYear = $(".surgery_year").length;
                $("#past_surgery").append('\n\
                    <tr id="past_surgery_list'+countSurgeryYear+'">\n\
                        <td>\n\
                            <button class="btn btn-danger" type="button" id="removePastSurgery'+countSurgeryYear+'" onclick="removePastSurgery('+countSurgeryYear+');"><i class="fe fe-trash"></i></button>\n\
                        </td>\n\
                        <td>\n\
                            <input type="hidden" value="'+countSurgeryYear+'" name="countSurgery[]" id="countSurgeryHidden'+countSurgeryYear+'">\n\
                            <select class="select2-show-search surgery_year" id="surgery_year'+countSurgeryYear+'" name="surgery_year[]" data-placeholder="Choose one">\n\
                                <option label="Choose one"></option>\n\
                            </select>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" name="surgery_diagnosis[]" class="form-control surgery_diagnosis">\n\
                        </td>\n\
                        <td hidden id="surgery_specific_hospital'+countSurgeryYear+'">\n\
                            <input type="text" name="surgery_specific_hospital[]" class="form-control surgery_hospital_specific" id="surgery_hospital_specific_input'+countSurgeryYear+'">\n\
                        </td>\n\
                        <td>\n\
                            <select class="select2-show-search surgery_hospital form-control"onchange="changeSurgeryHospital('+countSurgeryYear+')" name="surgery_hospital[]" id="surgery_hospital'+countSurgeryYear+'" data-placeholder="Choose one">\n\
                                <option label="Choose one"></option>\n\
                            </select>\n\
                        </td>\n\
                    </tr>\n\
                    ');

                var currentYear = new Date().getFullYear()
                max = currentYear
                var option = "";
                for (var year = currentYear-100 ; year <= max; year++) {
                  
                    var option = document.createElement("option");
                    option.text = year;
                    option.value = year;
                    
                    document.getElementById("surgery_year"+countSurgeryYear).appendChild(option)
                    
                }
                document.getElementById("surgery_year"+countSurgeryYear).value = currentYear;

                $(document).ready(function () {
                    $(".surgery_hospital").select2({
                        placeholder: '<?php echo lang('hospitals'); ?>',
                        allowClear: false,
                        ajax: {
                            url: 'patient/getHospitalInfoWithAddNewOption',
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

                $(".select2-show-search").select2();
            })

            $("#formDeclaration").on("click", "#newRecord_past_hospitalization", function () {
                var countYear = $(".year").length;
                var countHospital = $(".hospital").length;
                var countHospitalSpecific = $(".hospital_specific").length;
                $("#past_hospitalization").append('\n\
                    <tr id="past_medication_list'+countYear+'">\n\
                        <td>\n\
                            <button class="btn btn-danger" type="button" id="removePastMedication'+countYear+'" onclick="removePastMedication('+countYear+');"><i class="fe fe-trash"></i></button>\n\
                        </td>\n\
                        <td>\n\
                            <input type="hidden" value="'+countYear+'" name="count[]" id="countHidden'+countYear+'">\n\
                            <select class="select2-show-search year" id="year'+countYear+'" name="year[]" data-placeholder="Choose one">\n\
                                <option label="Choose one"></option>\n\
                            </select>\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" name="diagnosis[]" class="form-control diagnosis">\n\
                        </td>\n\
                        <td hidden id="specific_hospital'+countYear+'">\n\
                            <input type="text" name="specific_hospital[]" class="form-control hospital_specific" id="hospital_specific_input'+countYear+'">\n\
                        </td>\n\
                        <td class="hospital'+countYear+'Div">\n\
                            <select class="select2-show-search hospital form-control"onchange="changeHospital('+countYear+')" name="hospital[]" id="hospital'+countYear+'" data-placeholder="Choose one">\n\
                                <option label="Choose one"></option>\n\
                            </select>\n\
                        </td>\n\
                    </tr>\n\
                    ');

                var currentYear = new Date().getFullYear()
                max = currentYear
                var option = "";
                for (var year = currentYear-100 ; year <= max; year++) {
                  
                    var option = document.createElement("option");
                    option.text = year;
                    option.value = year;
                    
                    document.getElementById("year"+countYear).appendChild(option)
                    
                }
                document.getElementById("year"+countYear).value = currentYear;

                $(document).ready(function () {
                    $(".hospital").select2({
                        placeholder: '<?php echo lang('hospitals'); ?>',
                        allowClear: false,
                        ajax: {
                            url: 'patient/getHospitalInfoWithAddNewOption',
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

                $(".select2-show-search").select2();

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var patient = $("#formDeclaration").find('[name=id]').val();
            $.ajax({
                url: 'patient/editHealthDeclarationByJason?patient='+patient,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    // console.log(response.patient_medical_history);
                    var count = response.patient_medical_history;
                    var surgery_count = response.patient_past_surgeries;
                    $(".select2-show-search").select2();
                    $.each(count, function(key, value) {
                        var countYear = $(".year").length;
                        var count = 0;
                        var currentYear = new Date().getFullYear()
                        // alert(value.year);
                        max = currentYear
                        var option = "";
                        for (var year = currentYear-100 ; year <= max; year++) {
                          
                            var option = document.createElement("option");
                            option.text = year;
                            option.value = year;
                            
                            document.getElementById("year"+value.count).appendChild(option);
                            
                        }
                        document.getElementById("year"+value.count).value = currentYear;

                        $("#year"+value.count).val(value.year);

                    });

                    $.each(surgery_count, function(key, value) {
                        var countYear = $(".surgery_year").length;
                        var surgery_count = 0;
                        var currentYear = new Date().getFullYear()
                        // alert(value.year);
                        max = currentYear
                        var option = "";
                        for (var year = currentYear-100 ; year <= max; year++) {
                          
                            var option = document.createElement("option");
                            option.text = year;
                            option.value = year;
                            
                            document.getElementById("surgery_year"+value.count).appendChild(option);
                            
                        }
                        document.getElementById("surgery_year"+value.count).appendChild(option);

                        $("#surgery_year"+value.count).val(value.year);

                    });
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".hospital").select2({
                placeholder: '<?php echo lang('hospitals'); ?>',
                allowClear: false,
                ajax: {
                    url: 'patient/getHospitalInfoWithAddNewOption',
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

    <script type="text/javascript">
        $(function() {
            $( ".datepicker" ).datepicker({dateFormat: 'yy'});
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type=radio][name=cancer]').change(function() {
                var cancer = this.value;
                if (cancer == 1) {
                    $("#div-cancer").attr("hidden", false);
                } else {
                    $("#div-cancer").attr("hidden", true);
                }
            });
            $('input[type=radio][name=hypertension]').change(function() {
                var hypertension = this.value;
                if (hypertension == 1) {
                    $("#div-hypertension").attr("hidden", false);
                } else {
                    $("#div-hypertension").attr("hidden", true);
                }
            });
            $('input[type=radio][name=diabetes]').change(function() {
                var diabetes = this.value;
                if (diabetes == 1) {
                    $("#div-diabetes").attr("hidden", false);
                } else {
                    $("#div-diabetes").attr("hidden", true);
                }
            });
            $('input[type=radio][name=heart_disease]').change(function() {
                var heart_disease = this.value;
                if (heart_disease == 1) {
                    $("#div-heart-disease").attr("hidden", false);
                } else {
                    $("#div-heart-disease").attr("hidden", true);
                }
            });
            $('input[type=radio][name=stroke]').change(function() {
                var stroke = this.value;
                if (stroke == 1) {
                    $("#div-stroke").attr("hidden", false);
                } else {
                    $("#div-stroke").attr("hidden", true);
                }
            });
            $('input[type=radio][name=kidney]').change(function() {
                var kidney = this.value;
                if (kidney == 1) {
                    $("#div-kidney").attr("hidden", false);
                } else {
                    $("#div-kidney").attr("hidden", true);
                }
            });
            $('input[type=radio][name=liver]').change(function() {
                var liver = this.value;
                if (liver == 1) {
                    $("#div-liver").attr("hidden", false);
                } else {
                    $("#div-liver").attr("hidden", true);
                }
            });
            $('input[type=radio][name=hepatitis]').change(function() {
                var hepatitis = this.value;
                if (hepatitis == 1) {
                    $("#div-hepatitis").attr("hidden", false);
                } else {
                    $("#div-hepatitis").attr("hidden", true);
                }
            });
            $('input[type=radio][name=high_blood_pressure]').change(function() {
                var high_blood_pressure = this.value;
                if (high_blood_pressure == 1) {
                    $("#div-high-blood-pressure").attr("hidden", false);
                } else {
                    $("#div-high-blood-pressure").attr("hidden", true);
                }
            });
            $('input[type=radio][name=hiv]').change(function() {
                var hiv = this.value;
                if (hiv == 1) {
                    $("#div-hiv").attr("hidden", false);
                } else {
                    $("#div-hiv").attr("hidden", true);
                }
            });
            $('input[type=radio][name=tuberculosis]').change(function() {
                var tuberculosis = this.value;
                if (tuberculosis == 1) {
                    $("#div-tuberculosis").attr("hidden", false);
                } else {
                    $("#div-tuberculosis").attr("hidden", true);
                }
            });
            $('input[type=radio][name=asthma]').change(function() {
                var asthma = this.value;
                if (asthma == 1) {
                    $("#div-asthma").attr("hidden", false);
                } else {
                    $("#div-asthma").attr("hidden", true);
                }
            });
            $('input[type=radio][name=autoimmune]').change(function() {
                var autoimmune = this.value;
                if (autoimmune == 1) {
                    $("#div-autoimmune").attr("hidden", false);
                } else {
                    $("#div-autoimmune").attr("hidden", true);
                }
            });
            $('input[type=radio][name=epilepsy]').change(function() {
                var epilepsy = this.value;
                if (epilepsy == 1) {
                    $("#div-epilepsy").attr("hidden", false);
                } else {
                    $("#div-epilepsy").attr("hidden", true);
                }
            });
            $('input[type=radio][name=fibromyalgia]').change(function() {
                var fibromyalgia = this.value;
                if (fibromyalgia == 1) {
                    $("#div-fibromyalgia").attr("hidden", false);
                } else {
                    $("#div-fibromyalgia").attr("hidden", true);
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
    <script>
        $('#patientForm').parsley();
    </script>

    </body>
</html>