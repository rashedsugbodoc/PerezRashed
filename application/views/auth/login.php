<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sugbodoc">
        <meta name="keyword" content="Hospital, Clinic, Management, Software, HIS, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">

        <title>Login - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>

        <!--Favicon -->
        <link rel="icon" href="<?php echo base_url('public/assets/images/brand/favicon.png'); ?>" type="image/x-icon"/>

        <!-- Bootstrap css -->
        <link href="<?php echo base_url('public/assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />

        <!-- Style css -->
        <link href="<?php echo base_url('public/assets/css/style.css'); ?>" rel="stylesheet" />

        <!-- Dark css -->
        <link href="<?php echo base_url('public/assets/css/dark.css'); ?>" rel="stylesheet" />

        <!-- Skins css -->
        <link href="<?php echo base_url('public/assets/css/skins.css'); ?>" rel="stylesheet" />

        <!-- Animate css -->
        <link href="<?php echo base_url('public/assets/css/animated.css'); ?>" rel="stylesheet" />

        <!---Icons css-->
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/icons.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/font-awesome/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/assets/plugins/web-fonts/plugin.css'); ?>" rel="stylesheet" />
    </head>


<!--start of new-->
    <body class="page-style1 page-style2 light-mode default-sidebar">
        <div class="d-md-flex">
            <div class="w-40 bg-style h-100vh page-style">
                <div class="page-content">
                    <div class="page-single-content">
                        <a href="<?php echo base_url('')?>">
                            <img src="<?php echo base_url('uploads/new-sugbodoc-white-logo.png'); ?>" alt="img" class="header-brand-img mb-5">
                        </a>
                        <div class="card-body text-white py-5 px-8 text-center">
                            <img src="<?php echo base_url('public/assets/images/png/5.png'); ?>" alt="img" class="w-100 mx-auto text-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-80 page-content">
                <div class="page-single-content">
                    <div class="card-body p-6">
                        <form method="post" action="<?php echo base_url('auth/login'); ?>">
                            <div class="row">
                                <div class="col-md-8 mx-auto d-block">
                                    <div class="">
                                        <div class="text-white py-1 px-8 text-center">
                                            <a href="<?php echo base_url('')?>">
                                                <img src="<?php echo base_url('uploads/new-sugbodoc-purple-logo.png'); ?>" alt="img" class="header-brand-img mb-5">
                                            </a>
                                        </div>
                                        <?php if($message) { ?>
                                            <div class="alert alert-info"><?php echo $message; ?></div>
                                        <?php } ?>
                                        <h1 class="mb-2"><?php echo lang('login_heading');?></h1>
                                        <p class="text-muted"><?php echo lang('login_subheading');?></p>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/></svg></span>
                                        <input type="email" class="form-control" name="identity" placeholder="<?php echo lang('login_identity_label');?>">
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg></span>
                                        <input type="password" class="form-control" name="password" placeholder="<?php echo lang('login_password_label');?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="<?php echo base_url('auth/forgot_password'); ?>" class="btn btn-link box-shadow-0 px-0"><?php echo lang('login_forgot_password');?></a>
                                        </div>
                                        <input type="hidden" name="<?=$csrf_token_name; ?>" value="<?=$csrf_token_hash;?>">
                                        <div class="col-12">
                                            <button type="submit"class="btn btn-primary btn-block"><?php echo lang('login_submit_btn');?></button>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <div class="font-weight-normal fs-16"><?php echo lang('dont_have_an_account');?> <a class="btn-link font-weight-normal" href="auth/register"><?php echo lang('register_here');?></a></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!--end of new-->



        <!-- js placed at the end of the document so the pages load faster -->
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
    </body>
</html>
