<?php
$settings = $this->frontend_model->getSettings();
$title = explode(' ', $settings->title);
?>

<!DOCTYPE html>
<html lang="en" <?php if ($this->db->get('settings')->row()->language == 'arabic') { ?> dir="rtl" <?php } ?>>

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="front/img/apple-icon.png">
    <link rel="icon" type="image/png" href="front/img/favicon.png">
    <title><?php echo $settings->title; ?></title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="front/css/nucleo-icons.css" rel="stylesheet" />
    <link href="front/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="front/css/font-awesome.css" rel="stylesheet" />
    <link href="front/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="front/css/argon-design-system.css?v=1.0.3" rel="stylesheet" />
    <!-- Notifications  Css -->
    <link href="<?php echo base_url('public/assets/plugins/notify/css/jquery.growl.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('public/assets/plugins/notify/css/notifIt.css'); ?>" rel="stylesheet" />  
</head>

<body class="presentation-page">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-primary navbar-dark position-sticky top-0  py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="./index.html">
        <img src="<?php echo base_url('public/assets/images/brand/logo1.png'); ?>">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="front/img/brand/logo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a href="https://sugbodoc.com" class="nav-link" role="button">
              <i class="ni ni-app d-lg-none"></i>
              <span class="nav-link-inner--text">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#features" class="nav-link" role="button">
              <i class="ni ni-single-copy-04 d-lg-none"></i>
              <span class="nav-link-inner--text">Features</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#pricing" class="nav-link" role="button">
              <i class="ni ni-tablet-button d-lg-none"></i>
              <span class="nav-link-inner--text">Pricing</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:;" class="nav-link" data-toggle="dropdown" role="button">
              <i class="ni ni-ui-04 d-lg-none"></i>
              <span class="nav-link-inner--text">Company</span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl">
              <div class="dropdown-menu-inner">
                <a href="#" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                    <i class="fa fa-user-md"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-primary mb-md-1">Solution for Doctors</h6>
                    <p class="description d-none d-md-inline-block mb-0">Manage your practice from anywhere</p>
                  </div>
                </a>
                <a href="#" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                    <i class="fa fa-briefcase"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-primary mb-md-1">Solution for Clinics</h6>
                    <p class="description d-none d-md-inline-block mb-0">Manage clinic staff, patients and healthcare data to deliver better care</p>
                  </div>
                </a>
                <a href="#" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-danger rounded-circle text-white">
                    <i class="fa fa-building-o"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-primary mb-md-1">Solution for Hospitals</h6>
                    <p class="description d-none d-md-inline-block mb-0">Total solution for managing your hospital from patient registration to billing</p>
                  </div>
                </a>                
              </div>
              <div class="dropdown-menu-footer">
                <a class="dropdown-item" href="#about">
                  <i class="ni ni-atom"></i>
                  About
                </a>
                <a class="dropdown-item" href="#contact">
                  <i class="ni ni-archive-2"></i>
                  Contact Us
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a href="auth/register" class="nav-link" role="button">
              <i class="ni ni-single-copy-04 d-lg-none"></i>
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>                    
          <li class="nav-item">
            <a href="auth/login" class="btn btn-outline-white btn-primary" target="_blank">
              <i class="ni ni-laptop d-lg-none"></i>
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#request-demo" class="btn btn-white" target="_blank">
              <i class="ni ni-basket d-lg-none"></i>
              <span class="nav-link-inner--text">Request A Demo</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->



