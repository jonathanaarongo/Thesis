<?php
session_start();
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
                    <?php echo $_SESSION['user']; ?>
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
            $patientKey = $_GET['key'];
            $_SESSION['key'] = $patientKey;

            //selecting data associated with this particular id
            include("includes/db.php");
            $ref = "patientdata";
            $data = $database->getReference($ref)->getValue();
            foreach ($data as $key => $data1) {
                if ($patientKey == $key) {
                    $f_name = $data1['f_name'];
                    $email = $data1['email'];
                    $l_name = $data1['l_name'];
                    $fdaymens = $data1['fdaymens'];

                    $_SESSION['email'] = $email;
                }
            }
            ?>

            <body>
                <div class="content">
                    <button onclick="myFunction()">Print this page</button>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="patientProfile.php?key=<?php echo $patientKey ?>" class="btn btn-primary"><i class="material-icons">supervisor_account</i> General Data</a>
                                <a href="patientConsult.php?key=<?php echo $patientKey ?>" class="btn btn-primary"><i class="material-icons">face</i> Consultation History</a>
                                <a href="patientVitals.php?key=<?php echo $patientKey ?>" class="btn btn-primary"><i class="material-icons">favorite</i> Patient Vitals</a>
                                <a href="patientMedication.php?key=<?php echo $patientKey ?>" class="btn btn-primary"><i class="material-icons">colorize</i> Medications & Immunizations</a>
                                <a href="labResults.php?key=<?php echo $patientKey ?>" class="btn btn-primary"><i class="material-icons">file_copy</i> Lab Results</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name . ' ' . $l_name ?>'s Medications</h3>
                                    </div>

                                    <div class="card-body">

                                        <div class="table-responsive text-nowrap">
                                            <!--Table-->
                                            <table class="table table-striped table-bordered">

                                                <!--Table head-->
                                                <thead>
                                                    <tr>
                                                        <th>Date Prescribed</th>
                                                        <th>Prescribed Medication</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--Table head-->

                                                <!--Table body-->
                                                <tbody>
                                                    <?php
                                                    include("includes/db.php");
                                                    $ref = "pefindings";
                                                    $data = $database->getReference($ref)->getValue();
                                                    $i = 0;
                                                    foreach ($data as $key => $data1) {
                                                        if ($email == $data1['email'] && $data1['prescription'] != "") {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $data1['date']; ?></td>
                                                                <td><?php echo $data1['prescription']; ?></td>
                                                                <td>
                                                                    <a type="button" class="btn btn-info" href="showpatientfindings.php?key=<?php echo $key; ?>"><i class="material-icons">person</i> View</a>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                                <!--Table body-->


                                            </table>
                                            <!--Table-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <span class="pull-right">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"></i> Add Immunization</button>
                                        </span>
                                        <h3 class="card-title"><?php echo $f_name . ' ' . $l_name ?>'s Immunizations</h3>
                                    </div>

                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Immunization</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="store_immunization.php" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="email">Immunization Name</label>
                                                            <input type="text" class="form-control" name="immunName">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rcommend">Recommendation for Appointment</label>
                                                            <input type="text" class="form-control" name="recommend" placeholder="When is your recommended immunization for the patient?">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select name="status" class="form-control">
                                                                <option value="Not done">Not done</option>
                                                                <option value="done">Done</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" name="push" class="btn btn-primary">Add</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="table-responsive text-nowrap">
                                            <!--Table-->
                                            <table class="table table-striped table-bordered">

                                                <!--Table head-->
                                                <thead>
                                                    <tr>
                                                        <th>Date Updated</th>
                                                        <th>Immunization Name</th>
                                                        <th>Recommended Date of Appointment</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--Table head-->

                                                <!--Table body-->
                                                <tbody>
                                                    <?php
                                                    include("includes/db.php");
                                                    $ref = "immunization";
                                                    $data = $database->getReference($ref)->getValue();
                                                    $i = 0;
                                                    foreach ($data as $key => $data1) {
                                                        if ($email == $data1['email']) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <?php
                                                                        if (!isset($data1['date'])) {
                                                                            ?>
                                                                    <td>N/A</td>
                                                                <?php
                                                                        } else {
                                                                            ?>
                                                                    <td><?php echo $data1['date']; ?></td>
                                                                <?php
                                                                        }
                                                                        ?>
                                                                <td><?php echo $data1['immunName']; ?></td>
                                                                <td><?php echo $data1['recommend']; ?></td>
                                                                <td><?php echo $data1['status']; ?></td>
                                                                <td>
                                                                    <a type="button" class="btn btn-info" href="showpatientfindings.php?key=<?php echo $key; ?>"><i class="material-icons">person</i> View</a>
                                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmodal<?php echo$i; ?>"><i class="material-icons">edit</i> Edit</button>
                                                                    <?php
                                                                            if ($data1['status'] == "Not done") {
                                                                                ?>
                                                                        <a type="button" class="btn btn-success" href="update_immunization.php?key=<?php echo $key; ?>"><i class="material-icons">check</i> Done</a>
                                                                    <?php

                                                                            }  ?>

                                                                    <div class="modal fade" id="editmodal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Immunization</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="update_immunization.php" method="POST" enctype="multipart/form-data">
                                                                                        <div class="form-group">
                                                                                            <label for="email">Immunization Name</label>
                                                                                            <input type="text" class="form-control" name="immunName" value="<?php echo $data1['immunName'];?>">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recommend">Recommendation for Appointment</label>
                                                                                            <input type="text" class="form-control" name="recommend" placeholder="When is your recommended immunization for the patient?" value="<?php echo $data1['recommend'];?>">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="status">Status</label>
                                                                                            <select name="status" class="form-control">
                                                                                                <option value="Not done">Not done</option>
                                                                                                <option value="done">Done</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input type="hidden" name="ref" value="immunization/<?php echo $key; ?>">
                                                                                        <button type="submit" name="update" class="btn btn-primary">Edit</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                                <!--Table body-->


                                            </table>
                                            <!--Table-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

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
                                /*
                                                                            let editDetails = document.getElementById("editDetails")
                                                                            let fname = document.getElementById("f_name");
                                                                            let lname = document.getElementById("l_name");
                                                                            let address = document.getElementById("address");
                                                                            let contact = document.getElementById("contactNo");
                                                                            let patType = document.getElementById("patType");
                                                                            let status = document.getElementById("status");
                                                                            let dateAdded = document.getElementById("dateAdded");
                                                                            let fdaymens = document.getElementById("fdaymens");
                                                                            let lastVisited = document.getElementById("lastVisited");
                                                                            let email = document.getElementById("email");
                                                                            let occupation = document.getElementById("occupation");
                                                                            let medhis = document.getElementById("medicalHistory");
                                                                            let famhis = document.getElementById("familyHistory")
                                                                            editDetails.onclick = function() {
                                                                                if (editDetails.value == 'Edit') {
                                                                                    editDetails.value = 'Submit';
                                                                                    editDetails.setAttribute("name", "update"); 
                                                                                    <?php $buttonvalue = 'Submit';
                                                                                    $buttonname = 'update' ?>
                                                                                    fname.disabled = false;
                                                                                    lname.disabled = false;
                                                                                    address.disabled = false;
                                                                                    contact.disabled = false;
                                                                                    patType.disabled = false;
                                                                                    status.disabled = false;
                                                                                    dateAdded.disabled = false;
                                                                                    fdaymens.disabled = false;
                                                                                    lastVisited.disabled = false;
                                                                                    email.disabled = false;
                                                                                    occupation.disabled = false;
                                                                                    medhis.disabled = false;
                                                                                    famhis.disabled = false;

                                                                                } else {
                                                                                    editDetails.value = 'Edit';
                                                                                    editDetails.setAttribute("name", "change"); 
                                                                                    <?php $buttonvalue = 'Edit';
                                                                                    $buttonname = 'change' ?>
                                                                                    fname.disabled = true;
                                                                                    lname.disabled = true;
                                                                                    address.disabled = true;
                                                                                    contact.disabled = true;
                                                                                    patType.disabled = true;
                                                                                    status.disabled = true;
                                                                                    dateAdded.disabled = true;
                                                                                    fdaymens.disabled = true;
                                                                                    lastVisited.disabled = true;
                                                                                    email.disabled = true;
                                                                                    occupation.disabled = true;
                                                                                    medhis.disabled = true;
                                                                                    famhis.disabled = true;
                                                                                }
                                                                            }
                                                                            */

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