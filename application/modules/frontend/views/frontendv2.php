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
            <?php
            if (!empty($settings->logo)) {
                if (file_exists($settings->logo)) {
                    echo '<img src=' . $settings->logo . '>';
                } else {
                    echo $title;
                }
            } else {
                echo $title;
            }
            ?>
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
  <div class="wrapper">
    <!-- Hero for PRO version -->
    <div class="page-header mt-n5">
      <div class="page-header-image" style="background-image: url('front/img/provider/health_bg_light.jpg');">
      </div>
      <div class="container-fluid shape-container d-flex align-items-center py-lg">
        <div class="col px-0">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 ml-5 text-center">
              <img src="front/img/brand/logo.png" style="width: 300px;" class="img-fluid">
              <p class="lead"><b class="display-3">Access Healthcare Anywhere</b><br /> Bridging Patients, Doctors and Healthcare Providers </p>
              <div class="btn-wrapper mt-5">
                <a href="#request-demo" class="btn btn-primary btn-icon mb-3 mb-sm-0">
                  <span class="btn-inner--icon"><i class="fas fa-shopping-cart"></i></span>
                  <span class="btn-inner--text">Request A Demo</span>
                </a>
                <a href="https://sugbodoc.com" class="btn btn-outline-primary btn-icon mb-3 mb-sm-0" target="_blank">
                  <span class="btn-inner--icon"><i class="fas fa-shopping-cart"></i></span>
                  <span class="btn-inner--text">Login</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
    <div class="section features-6">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="info info-horizontal info-hover-primary">
              <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                <i class="ni ni-single-02 text-info"></i>
              </div>
              <div class="description pl-4">
                <h5 class="title text-primary">For Patients</h5>
                <p>From the Patient Portal, easily book appointments and start video consultations with doctors, view medical history, prescriptions, laboratory results, and pay for Clinic / Hospital Bills using Credit Card from anywhere.</p>
                <a href="#" class="text-info">Learn more</a>
              </div>
            </div>
            <div class="info info-horizontal info-hover-primary">
              <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                <i class="fa fa-user-md text-info"></i>
              </div>
              <div class="description pl-4">
                <h5 class="title text-primary">For Doctors and Clinics</h5>
                <p>Start Video Consultations, Manage Patients' Appointments, Medical History, Issue Prescriptions, Track Invoices and Clinic Financials from anywhere</p>
                <a href="#" class="text-info">Learn more</a>
              </div>
            </div>
            <div class="info info-horizontal info-hover-primary">
              <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                <i class="ni ni-building text-info"></i>
              </div>
              <div class="description pl-4">
                <h5 class="title text-primary">For Healthcare Providers</h5>
                <p>Manage most aspects of a clinic / hospital operations from patient registration, medical staff appointments, invoices, blood donors, pharmacy, medication inventory, financial and operational reports.</p>
                <a href="#" class="text-info">Learn more</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-10 mx-md-auto">
            <img class="ml-lg-5" src="front/img/provider/clinic.png" width="100%">
          </div>
        </div>
      </div>
    </div>    
    <div id="features" class="section features-1 ">
      <div class="container ">
        <div class="row">
          <div class="col-md-8 mt-5 mx-auto text-center">
            <span class="badge badge-primary badge-pill mb-3">On-the-Go</span>
            <h3 class="display-3">Manage Healthcare Anywhere</h3>
            <p class="lead">Healthcare is now easy to access and manage from anywhere, empowering patients, doctors and care providers like never before.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                <i class="ni ni-ui-04"></i>
              </div>
              <h6 class="info-title text-uppercase text-primary">Medication Prescriptions</h6>
              <p class="description opacity-8">e-Prescribe medication to patients which they can view and download from their own Patient Portal.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                <i class="ni ni-laptop"></i>
              </div>
              <h6 class="info-title text-uppercase text-success">Telehealth</h6>
              <p class="description opacity-8">Easily manage your clinic from your mobile device. Enjoy the freedom of seamless telehealth software - access clinical documents or conduct video consultations from anywhere.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                <i class="ni ni-archive-2"></i>
              </div>
              <h6 class="info-title text-uppercase text-warning">Case History</h6>
              <p class="description opacity-8">Case History and other clinical documentation of patients are easily viewable to better provide holistic care and treatment.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                <i class="ni ni-cloud-upload-96"></i>
              </div>
              <h6 class="info-title text-uppercase text-primary">Patient Document Upload</h6>
              <p class="description opacity-8">Patients and Doctors can upload and view various patient documents, medical results from various healthcare facilities.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                <i class="ni ni-circle-08"></i>
              </div>
              <h6 class="info-title text-uppercase text-success">Patient Portal</h6>
              <p class="description opacity-8">Patients have access to their own workspace to view and download their prescriptions, forms, reports, assessments and pay clinic bills using credit card.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                <i class="ni ni-credit-card"></i>
              </div>
              <h6 class="info-title text-uppercase text-warning">Invoices and Payments</h6>
              <p class="description opacity-8">Create and Track Invoices and Patient Payments</p>
            </div>
          </div>
        </div>        
      </div>
    </div>
    <section class="section-basic-components">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-10 mb-md-5">
            <h1 class="display-3">Insights<span class="text-primary"> Information that matters</span></h1>
            <p class="lead">Dashboard and charts to show your clinic's revenue and expenses, number of patients, bills, staff, documents and more.</p>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="image-container">
              <img class="table-img" src="front/img/provider/admin-dashboard.png" alt="">
              <img class="coloured-card-btn-img" src="front/img/provider/doctor-card.png" alt="">
              <img class="coloured-card-img" src="front/img/provider/revenue.png" alt="">
              <img class="linkedin-btn-img" src="front/img/provider/notifs.png" alt="">
              <img class="w-100" src="front/img/provider/dashboard-3.svg">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mt-md-5 order-md-2 order-lg-1">
            <div class="image-container">
              <img class="img shadow rounded img-comments w-100" src="front/img/provider/book-consultation.png">
              <img class="img shadow rounded img-blog mt-5 w-100" src="front/img/provider/patient-portal-dashboard.png">
            </div>
          </div>
          <div class="col-lg-6 mx-auto order-md-1">
            <div class="section-description">
              <h1 class="display-3">Patient Portal<span class="text-danger">Easy Access to Healthcare Data</span></h1>
              <p class="lead">Patients have access to their own health information - from prescriptions, health reports, assessment forms, lab results - and pay bills online, anytime, anywhere</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-patterns">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-10 col-12 mx-auto text-center align">
            <h1 class="display-3">Your Mobile Clinic<span class="text-primary"> Manage your clinic anywhere</span></h1>
            <p class="lead">
              Untether yourself from your office and access patient clinical documents, appointments, and initiate video calls wherever you are. 
            </p>
            <a href="#request-demo" target="_blank" rel="nofollow" class="btn btn-primary">Request A Demo</a>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="w-50 pattern-1 shadow" src="front/img/provider/prescription.jpg" alt="">
            <img class="w-50 pattern-2 shadow" src="front/img/provider/calendar.jpg" alt="">
            <img class="w-50 pattern-3 shadow" src="front/img/provider/form-report.jpg" alt="">
            <img class="w-50 pattern-4 shadow" src="front/img/provider/call.jpg" alt="">
          </div>
        </div>
      </div>
    </section>

    <div class="cd-section" id="features">    
      <section class="section-features bg-secondary">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-12 pt-5">
              <div class="info info-horizontal">
                <div class="icon icon-shape icon-shape-warning rounded-circle text-white">
                  <i class="ni ni-tv-2 text-warning"></i>
                </div>
                <div class="description pl-4 pt-2">
                  <h5 class="title">Video Calls Anywhere</h5>
                  <p>Conduct Video Consultations from anywhere while accessing patient's health records from your mobile device.</p>
                </div>
              </div>
              <div class="info info-horizontal">
                <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                  <i class="ni ni-calendar-grid-58 text-info"></i>
                </div>
                <div class="description pl-4 pt-2">
                  <h5 class="title">Appointment Scheduling</h5>
                  <p>Patients or staff can book appointments for Virtual or in-office consultations.</p>
                </div>
              </div>
              <div class="info info-horizontal">
                <div class="icon icon-shape icon-shape-danger rounded-circle text-white">
                  <i class="ni ni-notification-70 text-danger"></i>
                </div>
                <div class="description pl-4 pt-2">
                  <h5 class="title">Appointment Reminders</h5>
                  <p>Patients are notified of their appointments from the time they are booked, confirmed and when the doctor is on the call.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="image-container">
                <img class="w-100" src="front/img/provider/video-call.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="section-free-demo bg-secondary skew-separator">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-12">
            <div class="section-description">
              <h3 class="display-3">Free Demo</h3>
              <p class="lead mb-4">Do you want to test SugboDoc to see the benefits and ease of use in accessing and managing your patient's records, consulting with them via our integrated Video Call feature and running your healthcare facility from anywhere? Just fill up the form below and we will get back in less than 3 business days with a demo!</p>
              <div class="github-buttons">
                <a href="#request-demo" target="_blank" rel="nofollow" class="btn btn-primary btn-round">Request A Demo</a>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12">
            <div class="github-background-container">
              <i class="fa fa-user-md"></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 pt-5">
            <div class="card card-pricing card-background">
              <div class="card-body">
                <h2 class="card-title text-primary text-left ml-2">Free Demo</h2>
                <ul>
                  <li class="text-left"><strong>1</strong> month free access</li>
                  <li class="text-left"><strong>2</strong> Doctors</li>
                  <li class="text-left"><strong>2</strong> Receptionist</li>
                  <li class="text-left"><strong>1</strong> Accountant</li>
                  <li class="text-left"><strong>20</strong> Free SMS for Notifications</li>
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                    Email Notifications
                  </li>                  
                  <li class="text-left">
                    <div class="badge badge-circle badge-danger">
                      <i class="fas fa-times text-white"></i>
                    </div>
                    Bills Payment for Patients
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pt-5">
            <div class="card card-pricing card-background">
              <div class="card-body">
                <h2 class="card-title text-primary text-left ml-2">Paid Version</h2>
                <ul>
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                    Monthly / Annual Plans
                  </li>
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                    Doctors
                  </li>
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                    Receptionist
                  </li>   
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                    Accountant
                  </li>                                                                      
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                    SMS Notifications
                  </li>  
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                    Email Notifications
                  </li>
                  <li class="text-left">
                    <div class="badge badge-circle badge-success">
                      <i class="ni ni-check-bold text-white"></i>
                    </div>
                     Bills Payment for Patients
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    
    <!--     *********     PRICING     *********      -->
    <div class="cd-section" id="pricing">
      <div class="pricing-4" id="pricing-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mt-7 ml-auto mr-auto text-center">
              <h2 class="title">Pick the best plan for you</h2>
              <h4 class="description">You have regular Updates and Support on each package</h4>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-4">
              <div class="card card-pricing card-coin" style="background-image: url('front/img/">
                <div class="card-header">
                  <img src="front/img/provider/clinic-starter.jpg" class="img-center shadow">
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h5 class="text-uppercase">Clinic Starter</h5>
                      <span>₱ 999 monthly</span>
                      <hr class="bg-info">
                    </div>
                  </div>
                  <div class="row">
                    <ul class="list-group">
                      <li class="list-group-item">Appointment Calendar</li>
                      <li class="list-group-item">Electronic Medical Records</li>
                      <li class="list-group-item">Prescriptions</li>
                      <li class="list-group-item">Invoices</li>
                      <li class="list-group-item">SMS Center</li>
                      <li class="list-group-item">Up to 4 Doctors</li>
                      <li class="list-group-item">2 Receptionists</li>
                      <li class="list-group-item">2 Accountants</li>
                      <li class="list-group-item">Professional Billing</li>
                    </ul>
                  </div>
                </div>
                <div class="card-footer text-center bg-transparent">
                  <a href="#request-demo" class="btn btn-primary mb-3">Request A Demo</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-pricing card-coin" style="background-image: url('front/img/">
                <div class="card-header">
                  <img src="front/img/provider/clinic-pro.jpg" class="img-center shadow">
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h5 class="text-uppercase">Clinic Pro</h5>
                      <span>₱ 2,999 monthly</span>
                      <hr class="bg-info">
                    </div>
                  </div>
                  <div class="row">
                    <ul class="list-group">
                      <li class="list-group-item">Appointment Calendar</li>
                      <li class="list-group-item">Electronic Medical Records</li>
                      <li class="list-group-item">Prescriptions</li>
                      <li class="list-group-item">Invoices</li>
                      <li class="list-group-item">SMS Center</li>
                      <li class="list-group-item">Up to 10 Doctors</li>
                      <li class="list-group-item">4 Receptionists</li>
                      <li class="list-group-item">4 Accountants</li>
                      <li class="list-group-item">Professional Billing</li>
                    </ul>
                  </div>
                </div>
                <div class="card-footer text-center bg-transparent">
                  <a href="#request-demo" class="btn btn-primary mb-3">Request A Demo</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-pricing card-coin" style="background-image: url('front/img/">
                <div class="card-header">
                  <img src="front/img/provider/hospital.png" class="img-center shadow">
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h5 class="text-uppercase">Hospital</h5>
                      <span>Request a Quote</span>
                      <hr class="bg-info">
                    </div>
                  </div>
                  <div class="row">
                    <ul class="list-group">
                      <li class="list-group-item">Appointment Calendar</li>
                      <li class="list-group-item">Electronic Medical Records</li>
                      <li class="list-group-item">Prescriptions</li>
                      <li class="list-group-item">Invoices</li>
                      <li class="list-group-item">SMS Center</li>
                      <li class="list-group-item">Professional Billing</li>
                      <li class="list-group-item">Doctors (as needed)</li>
                      <li class="list-group-item">Receptionists (as needed)</li>
                      <li class="list-group-item">Accountant (as needed)</li>
                      <li class="list-group-item">Lab Technician (as needed)</li>
                      <li class="list-group-item">Nurse (as needed)</li>
                      <li class="list-group-item">Pharmacist (as needed)</li>
                      <li class="list-group-item">Professional Billing</li>
                    </ul>
                  </div>
                </div>
                <div class="card-footer text-center bg-transparent">
                  <a href="#request-demo" class="btn btn-primary mb-3">Request A Demo</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--     *********     END PRICING     *********      -->
    <div class="cd-section" id="request-demo">
      <div class="contactus-4">
        <div id="map-contactus-2" class="map"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <h1 class="title text-white">Request A Demo</h1>
              <h4 class="description text-white">Send us your clinic or hospital information and we will get back to you with a demo in less than 3 business days.</h4>
            </div>
            <div class="col-md-12 m-auto">
              <div class="card card-contact card-raised">
                <div class="row">
                  <div class="col-lg-8 col-md-7 pr-md-0">
                    <form role="form" action="frontend/addNew" class="p-3" id="contact-form" method="post">
                      <div class="card-header">
                        <h4 class="card-title">Send us your Clinic Information Below</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo validation_errors(); ?>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Your Full Name</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                </div>
                                <input type="text" class="form-control" name="contact_name" value="<?php echo set_value('contact_name'); ?>" placeholder="Full Name..." aria-label="Full Name...">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Your Phone Number</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                </div>
                                <input type="text" class="form-control" name="contact_phone" value="<?php echo set_value('contact_phone'); ?>" placeholder="Phone Number..." aria-label="Phone Number...">
                              </div>
                            </div>
                          </div>
                        </div>                        
                        <div class="form-group">
                          <label>Clinic Name</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Name of Clinic or Practice...">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Clinic Address</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                            </div>
                            <input type="text" class="form-control" name="address" value="<?php echo set_value('address'); ?>" placeholder="Address">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Clinic Email</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
                          </div>
                        </div>     
                        <div class="form-group">
                          <label>Clinic Phone</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-collection"></i></span>
                            </div>
                            <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone Number">
                          </div>
                        </div>                                             
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Language</label>
                              <div class="input-group">
                                <select class="form-control" data-trigger name="language" value="" id="choices-single-default">
                                        <option value="english" <?php
                                        if (!empty($settings->language)) {
                                            if ($settings->language == 'english') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?php echo lang('english'); ?> 
                                        </option>                                        
                                        <option value="arabic" <?php
                                        if (!empty($settings->language)) {
                                            if ($settings->language == 'arabic') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?php echo lang('arabic'); ?> 
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
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Package Type</label>
                              <div class="input-group">
                                <select class="form-control" data-trigger name="language" id="choices-single-default">
                                    <?php foreach ($packages as $package) { ?>
                                        <option value="<?php echo $package->id; ?>"><?php echo $package->name; ?> </option>
                                    <?php } ?>
                                </select>                                
                              </div>
                            </div>
                          </div>
                        </div>                                                                            
                        <div class="form-group">
                          <label>Message (Optional)</label>
                          <textarea name="remarks" class="form-control" id="message" rows="6"></textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="custom-control custom-checkbox mb-3">
                              <input class="custom-control-input" id="customCheck2" type="checkbox">
                              <label class="custom-control-label" for="customCheck2">
                                <span>I'm not a robot</span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <input type="hidden" name="request" value=''>
                            <button type="submit" class="btn btn-primary pull-right">Send Request</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-4 col-md-5 pl-md-0">
                    <div class="info text-left bg-primary">
                      <h4 class="card-title text-white">Contact information</h4>
                      <div class="info info-horizontal mt-lg-5">
                        <div class="icon icon-shape bg-white rounded-circle text-primary">
                          <i class="ni ni-square-pin"></i>
                        </div>
                        <div class="description">
                          <p class="info-title text-white mt-2">
                            <?php echo $settings->address; ?>
                          </p>
                        </div>
                      </div>
                      <div class="info info-horizontal">
                        <div class="icon icon-shape bg-white rounded-circle text-primary">
                          <i class="ni ni-mobile-button"></i>
                        </div>
                        <div class="description">
                          <p class="info-title text-white mt-2">
                            <?php echo $settings->phone; ?>
                          </p>
                        </div>
                      </div>
                      <div class="info info-horizontal">
                        <div class="icon icon-shape bg-white rounded-circle text-primary">
                          <i class="ni ni-email-83"></i>
                        </div>
                        <div class="description">
                          <p class="info-title text-white mt-2">
                            <?php echo $settings->email; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--     *********     CONTACT US 3      *********      -->
    <div class="contactus-3">
      <div class="page-header">
        <img class="bg-image" src="front/img/provider/contactus_blue.png" alt="">
      </div>
      <div class="container pt-10" id="contact">
        <div class="row">
          <div class="col-md-12 text-center mb-5">
            <h1 class="display-1">Need more information?</h1>
            <h3 class="lead">Contact us from multiple channels</h3>
            <a href="https://facebook.com/sugbodoc" class="btn btn-icon btn-primary mt-3" type="button">
              <span class="btn-inner--icon"><i class="ni ni-chat-round"></i></span>
              <span class="btn-inner--text">Chat with us</span>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-square-pin"></i>
              </div>
              <h4 class="info-title">Address</h4>
              <p class="description px-0"><?php echo $settings->address; ?></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-email-83"></i>
              </div>
              <h4 class="info-title">Email</h4>
              <p class="description px-0"><?php echo $settings->email; ?></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-mobile-button"></i>
              </div>
              <h4 class="info-title">Phone</h4>
              <p class="description px-0"><?php echo $settings->phone; ?></p>
              <p class="description px-0"><?php echo $settings->support; ?></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="info info-hover">
              <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                <i class="ni ni-circle-08"></i>
              </div>
              <h4 class="info-title">Social Media</h4>
              <p class="description px-0"><?php echo $settings->facebook_id; ?></p>
              <p class="description px-0"><?php echo $settings->twitter_id; ?></p>
              <p class="description px-0"><?php echo $settings->instagram_id; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>   
    <!--     *********     CONTACT US      *********      --> 
    <footer class="footer">
      <div class="container">
        <div class="row row-grid align-items-center mb-5">
          <div class="col-lg-6">
            <h3 class="text-primary font-weight-light mb-2">SugboDoc</h3>
            <h4 class="mb-0 font-weight-light">Manage Healthcare Anywhere</h4>
          </div>
          <div class="col-lg-6 text-lg-center btn-wrapper">
            <button target="_blank" href="https://twitter.com/sugbodoc" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
              <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
            </button>
            <button target="_blank" href="https://www.facebook.com/sugbodoc/" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
              <span class="btn-inner--icon"><i class="fa fa-facebook"></i></span>
            </button>
            <button target="_blank" href="https://instagram.com/sugbodoc" rel="nofollow" class="btn btn-icon-only btn-instagram rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
              <span class="btn-inner--icon"><i class="fa fa-instagram"></i></span>
            </button>
          </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2021 <a href="" target="_blank">SugboDoc</a>.
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-footer justify-content-end">
              <li class="nav-item">
                <a href="https://rygel.biz" class="nav-link" target="_blank">Rygel</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="terms-and-conditions" class="nav-link" target="_blank">Terms and Conditions</a>
              </li>
              <li class="nav-item">
                <a href="privacy-policy" class="nav-link" target="_blank">Privacy Policy</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
    <script src="front/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="front/js/core/popper.min.js" type="text/javascript"></script>
    <script src="front/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="front/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="front/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="front/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the Carousel, full documentation here: http://jedrzejchalubek.com/ -->
    <script src="front/js/plugins/glide.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://flatpickr.js.org/ -->
    <script src="front/js/plugins/moment.min.js"></script>
    <!--  Plugin for Select, full documentation here: https://joshuajohnson.co.uk/Choices/ -->
    <script src="front/js/plugins/choices.min.js" type="text/javascript"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://flatpickr.js.org/ -->
    <script src="front/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="front/js/plugins/jasny-bootstrap.min.js"></script>
    <!-- Plugin for Headrom, full documentation here: https://wicky.nillia.ms/headroom.js/ -->
    <script src="front/js/plugins/headroom.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="front/js/argon-design-system.min.js?v=1.0.3" type="text/javascript"></script>
    <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
    <script>
    // Carousel
    new Glide('.presentation-cards', {
      type: 'carousel',
      startAt: 0,
      focusAt: 2,
      perTouch: 1,
      perView: 5
    }).mount();
    </script>

    <script type="text/javascript">
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });        
    </script>
    <script>
        $(document).ready(function () {
            var error = "<?php echo $this->session->flashdata('error') ?>";
            var success = "<?php echo $this->session->flashdata('success') ?>";
            var notice = "<?php echo $this->session->flashdata('notice') ?>";
            var warning = "<?php echo $this->session->flashdata('warning') ?>";


            if (success) {
                event.preventDefault();
                event.stopPropagation();
                return $.growl.success({
                    message: success
                });
            }
            if (error) {
                event.preventDefault();
                event.stopPropagation();
                return $.growl.error({
                    message: error
                });
            }
            if (warning) {
                event.preventDefault();
                event.stopPropagation();
                return $.growl.warning({
                    message: warning
                });
            }
            if (notice) {
                event.preventDefault();
                event.stopPropagation();
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




