<?php session_start();
date_default_timezone_set('Asia/Manila'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Patient Inquiries
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar.png">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          PHIM-PMS
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">language</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="viewPatientList.php">
              <i class="material-icons">pregnant_woman</i>
              <p>Manage Patient</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewAppointments.php">
              <i class="material-icons">event_note</i>
              <p>Manage Appointments</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="patientInquiries.php">
              <i class="material-icons">emoji_people</i>
              <p>Patient Inquiries</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#0">
              <i class="material-icons">power_settings_new</i>
              <p>Logout</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <?php
      //getting id from url
      $consultKey = $_GET['key'];
      $patientKey = $_SESSION['key'];

      //selecting data associated with this particular id
      include("includes/db.php");
      $ref = "patientdata";
      $data = $database->getReference($ref)->getValue();
      foreach ($data as $key => $data1) {
        if ($patientKey == $key) {
          $f_name = $data1['f_name'];
          $l_name = $data1['l_name'];
          $email = $data1['email'];
        }
      }
      ?>
      <?php

      //selecting data associated with this particular id
      include("includes/db.php");
      $ref = "pefindings";
      $data = $database->getReference($ref)->getValue();
      foreach ($data as $key => $data1) {
        if ($email == $data1['email'] && $consultKey == $key) {
          $date = $data1['date'];
          $reason = $data1['reason'];
          $choose = $data1['choose'];
          $chiefComplaint = $data1['chiefComplaint'];
          $peFindings = $data1['peFindings'];
          $diagnosis = $data1['diagnosis'];
          $referral = $data1['referral'];
          $labrequest = $data1['labrequest'];
          $pres = $data1['prescription'];
          if (!isset($data1['nextAppt'])) {
            $nextAppt = "";
          } else {
            $nextAppt = $data1['nextAppt'];
          }
        }
      }
      ?>

      <body>


        <div class="content">
          <button onclick="myFunction()">Print this page</button>
          <div class="container-fluid">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Patient Findings</h3>
                </div>
                <div class="card-body">
                  <!-- Grid row -->
                  <form action="update_pe_findings.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                      <!-- Default input -->
                      <div class="col-md-6">
                        <label for="date">Date Added</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="nextAppt">Next Appointment</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo $nextAppt ?>">
                      </div>
                      <!-- Default input -->
                      <div class="col-md-12">
                        <label for="adress">Reason for Visit</label>
                        <input type="text" class="form-control" id="reason" name="reason" value="<?php echo $reason ?>">
                      </div>
                      <!-- Default input -->
                      <!-- Grid row-->
                      <!-- Default input -->
                      <div class="col-md-12">
                        <label for="chiefComplaint">Chief Complaint</label>
                        <textarea class="form-control" id="chiefComplaint" name="chiefComplaint" rows="3"><?php echo $chiefComplaint ?></textarea>
                      </div>
                      <!-- Default input -->
                      <div class="col-md-12">
                        <label for="peFindings">Physical Examination Findings</label>
                        <textarea class="form-control" id="peFindings" name="peFindings" rows="3"><?php echo $peFindings ?></textarea>
                      </div>
                      <!-- Default input -->
                      <div class="col-md-12">
                        <label for="diagnosis">Diagnosis</label>
                        <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3"><?php echo $diagnosis ?></textarea>
                      </div>
                      <div class="col-md-12">
                        <label for="adress">Decision</label>
                        <input type="text" class="form-control" id="choose" name="choose" value="<?php if ($choose == 'isPrescribed') {
                                                                                                    echo "Prescribed Medications";
                                                                                                  } else if ($choose == 'isReferred') {
                                                                                                    echo "Referred to Another OB";
                                                                                                  } else if ($choose == 'isLab') {
                                                                                                    echo "Requested Lab Results";
                                                                                                  } ?>">
                      </div>
                      <?php if ($choose == 'isPrescribed') {

                        ?>
                        <div class="col-md-12">
                          <label for="diagnosis">Prescription</label>
                          <textarea class="form-control" id="prescription" name="prescription" rows="3"><?php echo $pres ?></textarea>
                        </div>
                      <?php } else if ($choose == 'isReferred') {

                        ?>
                        <div class="col-md-12">
                          <label for="diagnosis">Referred To</label>
                          <input class="form-control" id="referral" name="referral" value="<?php echo $referral; ?>">
                        </div>
                      <?php } else{
                        ?>
                        <div class="col-md-12">
                          <label for="diagnosis">Request Lab Results</label>
                          <input class="form-control" id="labrequest" name="labrequest" value="<?php echo $labrequest; ?>">
                        </div>
                      <?php } ?>
                      <input type="hidden" name="ref" value="questions/<?php echo $key; ?>">
                      <!-- Grid row -->
                      <input type="submit" class="btn btn-primary btn-md" style="display: inline-block" id="editPatient" name="update" value="Edit">
                  </form>


                  <script>
                    function myFunction() {
                      window.print();
                    }
                  </script>




                  <script src="assets/js/core/jquery.min.js"></script>
                  <script src="assets/js/core/popper.min.js"></script>
                  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
                  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

                  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
                  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
                  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
                  <script src="assets/demo/demo.js"></script>

                  <script>
                    $(document).ready(function() {
                      $().ready(function() {
                        $sidebar = $('.sidebar');

                        $sidebar_img_container = $sidebar.find('.sidebar-background');

                        $full_page = $('.full-page');

                        $sidebar_responsive = $('body > .navbar-collapse');

                        window_width = $(window).width();

                        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                            $('.fixed-plugin .dropdown').addClass('open');
                          }

                        }

                        $('.fixed-plugin a').click(function(event) {
                          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                          if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                              event.stopPropagation();
                            } else if (window.event) {
                              window.event.cancelBubble = true;
                            }
                          }
                        });

                        $('.fixed-plugin .active-color span').click(function() {
                          $full_page_background = $('.full-page-background');

                          $(this).siblings().removeClass('active');
                          $(this).addClass('active');

                          var new_color = $(this).data('color');

                          if ($sidebar.length != 0) {
                            $sidebar.attr('data-color', new_color);
                          }

                          if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                          }

                          if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data-color', new_color);
                          }
                        });

                        $('.fixed-plugin .background-color .badge').click(function() {
                          $(this).siblings().removeClass('active');
                          $(this).addClass('active');

                          var new_color = $(this).data('background-color');

                          if ($sidebar.length != 0) {
                            $sidebar.attr('data-background-color', new_color);
                          }
                        });

                        $('.fixed-plugin .img-holder').click(function() {
                          $full_page_background = $('.full-page-background');

                          $(this).parent('li').siblings().removeClass('active');
                          $(this).parent('li').addClass('active');


                          var new_image = $(this).find("img").attr('src');

                          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            $sidebar_img_container.fadeOut('fast', function() {
                              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                              $sidebar_img_container.fadeIn('fast');
                            });
                          }

                          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $full_page_background.fadeOut('fast', function() {
                              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                              $full_page_background.fadeIn('fast');
                            });
                          }

                          if ($('.switch-sidebar-image input:checked').length == 0) {
                            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                          }

                          if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                          }
                        });

                        $('.switch-sidebar-image input').change(function() {
                          $full_page_background = $('.full-page-background');

                          $input = $(this);

                          if ($input.is(':checked')) {
                            if ($sidebar_img_container.length != 0) {
                              $sidebar_img_container.fadeIn('fast');
                              $sidebar.attr('data-image', '#');
                            }

                            if ($full_page_background.length != 0) {
                              $full_page_background.fadeIn('fast');
                              $full_page.attr('data-image', '#');
                            }

                            background_image = true;
                          } else {
                            if ($sidebar_img_container.length != 0) {
                              $sidebar.removeAttr('data-image');
                              $sidebar_img_container.fadeOut('fast');
                            }

                            if ($full_page_background.length != 0) {
                              $full_page.removeAttr('data-image', '#');
                              $full_page_background.fadeOut('fast');
                            }

                            background_image = false;
                          }
                        });

                        $('.switch-sidebar-mini input').change(function() {
                          $body = $('body');

                          $input = $(this);

                          if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                          } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function() {
                              $('body').addClass('sidebar-mini');

                              md.misc.sidebar_mini_active = true;
                            }, 300);
                          }

                          // we simulate the window Resize so the charts will get updated in realtime.
                          var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                          }, 180);

                          // we stop the simulation of Window Resize after the animations are completed
                          setTimeout(function() {
                            clearInterval(simulateWindowResize);
                          }, 1000);

                        });
                      });
                    });
                  </script>

      </body>

</html>