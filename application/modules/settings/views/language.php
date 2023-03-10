<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="panel">
                    <header class="panel-heading">
                       <?php echo lang('select'); ?> <?php echo lang('language'); ?>
                    </header>
                    <div class="panel-body">
                        <form role="form" class="clearfix pos form1"  id="editSaleForm" action="settings/changeLanguage" method="post" enctype="multipart/form-data">  
                            <div class="form-group col-md-8"> 
                                <label for="exampleInputEmail1"> </label> 
                                <select class="form-control m-bot15" name="language" value=''>
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
                            <input type="hidden" name="language_settings" value='language_settings'>
                            <input type="hidden" name="id" value='<?php
                            if (!empty($settings->id)) {
                                echo $settings->id;
                            }
                            ?>'>
                            <div class="col-md-12"> 
                                <button type="submit" name="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if ($this->ion_auth->in_group('superadmin')) { ?>
                    <div class="panel">
                        <header class="panel-heading">
                            <?php echo lang('edit'); ?> <?php echo lang('language'); ?>
                        </header>
                        <div class="panel-body" style="background: white;">
                            <div class="adv-table editable-table ">
                                <div class=" panel clearfix"> 

                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">


                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('name'); ?></th>
                                            <th><?php echo lang('options'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody> 

                                        <tr class="">
                                            <td><?php echo '1'; ?></td>
                                            <td><?php echo lang('arabic'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=arabic">   <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '2'; ?></td>
                                            <td><?php echo lang('english'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=english">   <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <td><?php echo '3'; ?></td>
                                            <td><?php echo lang('spanish'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=spanish">   <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '4'; ?></td>
                                            <td><?php echo lang('french'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=french">   <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '5'; ?></td>
                                            <td><?php echo lang('italian'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=italian">   <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><?php echo '6'; ?></td>
                                            <td><?php echo lang('portuguese'); ?> </td>

                                            <td>
                                                <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=portuguese">   <?php echo lang('manage'); ?></a>
                                            </td>
                                        </tr>
                                        <!--  
                                          <tr class="">
                                               <td><?php echo '3'; ?></td>
                                               <td><?php echo lang('chinese'); ?> </td>

                                               <td>
                                                   <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=zh_cn">   <?php echo lang('manage'); ?></a>
                                               </td>
                                           </tr>
                                        <tr class="">
                                               <td><?php echo '8'; ?></td>
                                               <td><?php echo lang('russian'); ?> </td>

                                               <td>
                                                   <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=russian">   <?php echo lang('manage'); ?></a>
                                               </td>
                                           </tr>
                                           <tr class="">
                                               <td><?php echo '9'; ?></td>
                                               <td><?php echo lang('turkish'); ?> </td>

                                               <td>
                                                   <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=turkish">   <?php echo lang('manage'); ?></a>
                                               </td>
                                           </tr>
                                           <tr class="">
                                               <td><?php echo '10'; ?></td>
                                               <td><?php echo lang('indonesian'); ?> </td>

                                               <td>
                                                   <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=indonesian">   <?php echo lang('manage'); ?></a>
                                               </td>
                                           </tr>
                                           <tr class="">
                                               <td><?php echo '11'; ?></td>
                                               <td><?php echo lang('japanese'); ?> </td>

                                               <td>
                                                   <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=japanese">   <?php echo lang('manage'); ?></a>
                                               </td>
                                           </tr>
                                        -->
                                    </tbody>
                            </div>

                            </table>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>


<script src="common/js/coderygel.min.js"></script>


