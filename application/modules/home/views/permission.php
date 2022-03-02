<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="Health Information System Permission Denied" name="description">
        <meta content="Rygel Technology Solutions" name="author">
        <meta name="keywords" content="Hospital Information System, Clinic, Management, Software, Finance"/>

        <!-- Title -->
        <title><?php echo lang('access_is_denied');?></title>

        <!--Favicon -->
        <link rel="icon" href="<?php echo base_url('public/assets/images/brand/favicon.ico'); ?>" type="image/x-icon"/>

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
        <!-- Font Family -->
        <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">
    </head>

    <body class="h-100vh bg-style light-mode default-sidebar">

        <div class="page">
            <div class="page-content">
                <div class="container text-center  relative">
                    <div class="fs-100  mb-5 text-white font-weight-normal h1"><i class="fa fa-lock"></i></div>
                    <h1 class="h1  mb-3 font-weight-bold text-white"><?php echo lang('access_is_denied');?></h1>
                    <p class="h5 font-weight-normal mb-7 leading-normal text-white-80"><?php echo lang('you_do_not_have_enough_permissions');?></p>
                    <a class="btn btn-secondary" href="<?php echo base_url('home'); ?>"><i class="fe fe-arrow-left-circle mr-1"></i><?php echo lang('back_to_home');?></a>
                </div>
            </div>
        </div>
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