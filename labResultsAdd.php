<?php session_start();
date_default_timezone_set('Asia/Manila'); ?>
<?php
//getting id from url
$patientKey = $_GET['key'];

//selecting data associated with this particular id
include("includes/db.php");
$ref = "patientdata";
$data = $database->getReference($ref)->getValue();
foreach ($data as $key => $data1) {
    if ($patientKey == $key) {
        $f_name = $data1['f_name'];
        $l_name = $data1['l_name'];
        $email = $data1['email'];
        $noOfBaby = $data1['noOfBaby'];
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        AGAPAY
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <style>
        #Transparent {
            background-color: transparent;
        }

        #PaleStrawColour {
            background-color: #fffcdf;
        }

        #TransparentYellow {
            background-color: #fff79a;
        }

        #DarkYellow {
            background-color: #fef200;
        }

        #Amber {
            background-color: #f8cf5b;
        }

        #BrownAle {
            background-color: #be824e;
        }

        #Pink {
            background-color: #f48a8c;
        }

        #Orange {
            background-color: #faaf54;
        }

        #Green {
            background-color: #68be63;
        }

        #Blue {
            background-color: #637fbe;
        }
    </style>
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
                        <a class="nav-link" href="OB_login.php">
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

            <body>


                <div class="content">
                    <div class="container-fluid">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h3 class="card-title">Add <?php echo $f_name, ' ', $l_name; ?>'s Lab Results</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Grid row -->
                                    <form action="store_labresults_encode.php" method="post" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <?php if ($_SESSION['cbc'] == true) { ?>
                                                <!-- Default input -->
                                                <div class="col-md-12">
                                                    <h3>Complete Blood Count</h3>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="rbc">Red Blood Cells (MIL/uL)</label>
                                                    <input type="number" step=".01" class="form-control" id="rbc" name="rbc">
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-2">
                                                    <label for="wbc">White Blood Cells (K/uL) </label>
                                                    <input type="number" step=".01" class="form-control" id="wbc" name="wbc">
                                                </div>

                                                <!-- Default input -->
                                                <div class="col-md-2">
                                                    <label for="hemoglobin">Hemoglobin (G/dL)</label>
                                                    <input type="number" step=".01" class="form-control" id="hemoglobin" name="hemoglobin">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="hematocrit">Hematocrit (%)</label>
                                                    <input type="number" step=".01" class="form-control" id="hematocrit" name="hematocrit">
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-2">
                                                    <label for="platelet">Platelet Count (K/uL)</label>
                                                    <input type="number" step=".01" class="form-control" id="platelet" name="platelet">
                                                </div>
                                            <?php }
                                            if ($_SESSION['urinalysis'] == true) { ?>
                                                <div class="col-md-12">
                                                    <h3>Urinalysis</h3>
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-3">
                                                    <label for="urineColor">Urine Color</label>
                                                    <select name="urineColor" class="form-control">
                                                        <option id="Transparent" value="Transparent">Transparent</option>
                                                        <option id="PaleStrawColour" value="Pale Straw Colour">Pale Straw Colour</option>
                                                        <option id="TransparentYellow" value="Transparent Yellow">Transparent Yellow</option>
                                                        <option id="DarkYellow" value="Dark Yellow">DarkYellow</option>
                                                        <option id="Amber" value="Amber">Amber</option>
                                                        <option id="BrownAle" value="Brown Ale">Brown Ale</option>
                                                        <option id="Pink" value="Pink">Pink</option>
                                                        <option id="Orange" value="Orange">Orange</option>
                                                        <option id="Blue" value="Blue">Blue</option>
                                                        <option id="Green" value="Green">Green</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="urineClarity">Urine Clarity</label>
                                                    <select name="urineClarity" class="form-control">
                                                        <option value="Clear">Clear</option>
                                                        <option value="Hazy">Hazy</option>
                                                        <option value="Cloudy">Cloudy</option>
                                                        <option value="Turbid">Turbid</option>
                                                        <option value="Milky">Milky</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="phlvl">pH Level</label>
                                                    <input type="number" step=".1" class="form-control" id="phlvl" name="phlvl">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="grav">Specific Gravity</label>
                                                    <input type="number" step=".001" class="form-control" id="grav" name="grav">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="leukocytes">Leukocytes (wbc/hpf)</label>
                                                    <input type="number" step=".01" class="form-control" id="leukocytes" name="leukocytes">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="protein">Protein (mg/dL)</label>
                                                    <input type="number" step=".01" class="form-control" id="protein" name="protein">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="glucose">Glucose (mmol/L)</label>
                                                    <input type="number" step=".01" class="form-control" id="glucose" name="glucose">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="urobilinogen">Urobilinogen (mg/dL)</label>
                                                    <input type="number" step=".01" class="form-control" id="urobilinogen" name="urobilinogen">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="hemoPresent">Hemoglobin Present</label>
                                                    <select name="hemoPresent" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="nitritePresent">Nitrite Present</label>
                                                    <select name="nitritePresent" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="ketonesPresent">Ketones Present</label>
                                                    <select name="ketonesPresent" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="bilirubinPresent">Bilirubin Present</label>
                                                    <select name="bilirubinPresent" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                            <?php }
                                            if ($_SESSION['bloodSugar'] == true) { ?>
                                                <div class="col-md-4">
                                                    <h3>Blood Sugar (mg/dL)</h3><br>
                                                    <input type="number" class="form-control" id="bloodSugar" name="bloodSugar">
                                                </div>
                                            <?php }
                                            if ($_SESSION['rubella'] == true) { ?>
                                                <div class="col-md-4">
                                                    <h3>Rubella</h3><br>
                                                    <select name="rubella" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                            <?php }
                                            if ($_SESSION['hepatitisB'] == true) { ?>
                                                <div class="col-md-4">
                                                    <h3>Hepatitis B</h3><br>
                                                    <select name="hepatitisB" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                            <?php }
                                            if ($_SESSION['hepatitisC'] == true) { ?>
                                                <div class="col-md-4">
                                                    <h3>Hepatitis C</h3><br>
                                                    <select name="hepatitisC" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                            <?php }
                                            if ($_SESSION['std'] == true) { ?>
                                                <div class="col-md-4">
                                                    <h3>Sexually Transmitted Disease</h3><br>
                                                    <select name="std" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                            <?php }
                                            if ($_SESSION['hiv'] == true) { ?>
                                                <div class="col-md-4">
                                                    <h3>Human Immunodeficiency Virus</h3><br>
                                                    <select name="hiv" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                            <?php }
                                            if ($_SESSION['tb'] == true) { ?>
                                                <div class="col-md-4">
                                                    <h3>Tuberculosis</h3><br>
                                                    <select name="tb" class="form-control">
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-12">
                                            </div>

                                            <input type="submit" class="btn btn-primary btn-md" style="display: inline-block" id="addPatient" name="push" value="Add">
                                    </form>







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