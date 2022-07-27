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
                                                    <label class="form-label"><h5>Do you have or have you ever had?</h5></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label class="form-label">Cancer</label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="cancer" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="cancer" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-cancer" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_cancer" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="hypertension" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hypertension" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-hypertension" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_hypertension" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="diabetes" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="diabetes" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-diabetes" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_diabetes" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="heart_disease" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="heart_disease" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-heart-disease" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_heart_disease" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="stroke" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="stroke" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-stroke" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_stroke" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="kidney" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="kidney" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-kidney" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_kidney" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="liver" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="liver" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-liver" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_liver" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="hepatitis" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hepatitis" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-hepatitis" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_hepatitis" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="high_blood_pressure" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="high_blood_pressure" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-high-blood-pressure" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_high_blood_pressure" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="hiv" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="hiv" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-hiv" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_hiv" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="tuberculosis" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="tuberculosis" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-tuberculosis" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_tuberculosis" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="asthma" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="asthma" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-asthma" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_asthma" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="autoimmune" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="autoimmune" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-autoimmune" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_autoimmune" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="epilepsy" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="epilepsy" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-epilepsy" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_epilepsy" class="form-control" minlength="1" maxlength="50">
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
                                                        <input type="radio" class="custom-control-input" name="fibromyalgia" value="1">
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-12">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="fibromyalgia" value="0">
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-5 col-sm-12" id="div-fibromyalgia" hidden>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Specify: </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" name="specify_fibromyalgia" class="form-control" minlength="1" maxlength="50">
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
                                                        <!-- <textarea class="ckeditor form-control" id="editor" name="past" value="" rows="10" required></textarea> -->
                                                        <!-- <div class="row">
                                                            <div class="col-md-2 col-sm-2">
                                                                <?php echo lang('year'); ?>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8">
                                                                <?php echo lang('reason').'/'.lang('diagnosis'); ?>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2">
                                                                <?php echo lang('hospital'); ?>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div id="past_hospitalization"></div> -->
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table nowrap text-nowrap border mt-5">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo lang('year'); ?></th>
                                                                                <th><?php echo lang('reason').'/'.lang('diagnosis'); ?></th>
                                                                                <th><?php echo lang('hospital'); ?></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="past_hospitalization">
                                                                            <?php if(!empty($medical_history->past_hospitalizations)) { ?>
                                                                                <?php foreach($past_hospitalizations as $past_hospitalization) { ?>
                                                                                    <tr>
                                                                                        <td class="w-10">
                                                                                            <input type="hidden" value="<?php echo $past_hospitalization->count; ?>" name="count[]">
                                                                                            <select class="select2-show-search year" name="year[]" id="year<?php echo $past_hospitalization->count; ?>" data-placeholder="Choose one">
                                                                                                <option label="Choose one"></option>
                                                                                                <option value="<?php echo $past_hospitalization->year; ?>" selected><?php echo $past_hospitalization->year;; ?></option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td class="w-80">
                                                                                            <input type="text" name="diagnosis[]" class="form-control diagnosis" value="<?php echo $past_hospitalization->diagnosis; ?>">
                                                                                        </td>
                                                                                        <td class="w-10">
                                                                                            <select class="select2-show-search hospital" name="hospital[]" data-placeholder="Choose one">
                                                                                                <option label="Choose one"></option>
                                                                                                <option value="<?php echo $past_hospitalization->hospital; ?>" selected><?php echo $this->hospital_model->getHospitalById($past_hospitalization->hospital)->name.' (ID: '.$past_hospitalization->hospital.')'; ?></option>
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
                                                                                <td><button type="button" class="btn btn-primary w-100" id="newRecord"><?php echo lang('add_new').' '.lang('record'); ?></button></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- <div class="col-md-12 col-sm-12">
                                                                <button type="button" class="btn btn-primary w-100" id="newRecord"><?php echo lang('add_new').' '.lang('record'); ?></button>
                                                                <input type="text" name="past_hospitalization" id="past_hospitalization_input" class="form-control">
                                                                <button type="button" class="btn btn-success w-100" id="getHTML">Get HTML</button>
                                                            </div> -->
                                                            <div class="col-md-12 col-sm-12" id="past_hospitalization_div">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Current Medication</label>
                                                        <textarea class="ckeditor form-control" id="editor" name="current" value="" rows="10" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Allergies</label>
                                                        <textarea class="ckeditor form-control" id="editor" name="allergies" value="" rows="10" required></textarea>
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
        $(document).ready(function (){
            $("#formDeclaration").on("click", "#newRecord", function () {
                var countYear = $(".year").length;
                $("#past_hospitalization").append('\n\
                    <tr>\n\
                        <td class="w-10">\n\
                            <input type="hidden" value="'+countYear+'" name="count[]">\n\
                            <select class="select2-show-search year" id="year'+countYear+'" name="year[]" data-placeholder="Choose one">\n\
                                <option label="Choose one"></option>\n\
                            </select>\n\
                        </td>\n\
                        <td class="w-80">\n\
                            <input type="text" name="diagnosis[]" class="form-control diagnosis">\n\
                        </td>\n\
                        <td class="w-10">\n\
                            <select class="select2-show-search hospital" name="hospital[]" data-placeholder="Choose one">\n\
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

                // var minOffset = 18,
                //     maxOffset = 100;

                // var selectyear = $('.year');
                // var thisYear = new Date().getFullYear();
                // var select = $('<select>');

                // for (var i = minOffset; i <= maxOffset; i++) {
                //   var year = thisYear - i;
                //   $('<option>', { value: year, text: year }).appendTo(select);
                // }

                // select.appendTo(selectyear);

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

                var pas_hospitalization_result = $("#past_hospitalization").html();

                $("#past_hospitalization_div").text(pas_hospitalization_result);

                // $("#past_hospitalization").html().remove();
            });

            // $("#formDeclaration").on("click", "#getHTML", function(e) {
            //     var diagnosis = $("input[name='diagnosis[]']").map(function(){return $(this).val();}).get();

            //     console.log(diagnosis);
            //     $.ajax({
            //         url: 'patient/getHealthDeclarationPastHistoryInputValues',
            //         type: 'POST',
            //         data: $(this).serialize(),
            //         dataType: 'text',
            //         processData: false,
            //         success: function ( data, textStatus, jQxhr ) {

            //         }
            //     });
            //     // alert($(".diagnosis").val());
            //     // $("#formDeclaration").find('[name=diagnosis]').val('zzzzz');

            //     // var pas_hospitalization_result = $("#past_hospitalization").html();

            //     // $("#past_hospitalization_div").text(pas_hospitalization_result);
            // });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2-show-search").select2();
            var countYear = $(".year").length;
            var count = 0;
            var currentYear = new Date().getFullYear()
            alert(currentYear);
            max = currentYear
            var option = "";
            for (var year = currentYear-100 ; year <= max; year++) {
              
                var option = document.createElement("option");
                option.text = year;
                option.value = year;
                
                document.getElementById("year"+countYear).appendChild(option)
                
            }
            document.getElementById("year"+countYear).value = currentYear;
        })
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