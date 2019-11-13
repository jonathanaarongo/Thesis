<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Template
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="..assets/img/sidebar-1.jpg">
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    <?php echo $_SESSION['user'];?>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#0">
                            <i class="material-icons">add_box</i>
                            <p>Add Patient</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="viewPatientList.php">
                            <i class="material-icons">pregnant_woman</i>
                            <p>Manage Patient</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#0">
                            <i class="material-icons">file_copy</i>
                            <p>View Lab Results</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#0">
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
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <?php
            //getting id from url
            $email = $_GET['email'];

            //selecting data associated with this particular id
            include("includes/db.php");
            $ref = "patientdata";
            $data = $database->getReference($ref)->getValue();
            foreach ($data as $data1) {
                if ($_SESSION['user'] == $data1['ob'] && $email == $data1['email']) {
                    $f_name = $data1['f_name'];
                    $l_name = $data1['l_name'];

                }
            }
            ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                            <a href="patientProfile.php?email=<?php echo $email ?>" class="btn btn-primary"> General Data</a>
                                <a href="patientConsult.php?email=<?php echo $email?>" class="btn btn-primary"> Consultation History</a>
                                <a href="patientVitals.php?email=<?php echo $email?>" class="btn btn-primary"> Patient Vitals</a>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h3 class="card-title">Input Vitals</h3>
                                </div>
                                <div class="card-body">
                                    <form class="navbar-form" action="store_vital.php" method="post" enctype="multipart/form-data">
                                        <div class="input-group no-border">
                                            <i class="material-icons">opacity</i><input type="number" class="form-control" name="systolic" placeholder="Systolic">
                                            <i class="material-icons">invert_colors</i><input type="number" class="form-control" name="diastolic" placeholder="Diastolic">
                                            <i class="material-icons">speed</i><input type="number" step="0.1" class="form-control" name="weight" placeholder="Weight (in lbs)">
                                            <i class="material-icons">pregnant_woman</i><input type="number" step="0.1" class="form-control" name="waistSize" placeholder="Belly Size (in cm)">
                                            <i class="material-icons">favorite</i><input type="number" class="form-control" name="fetalHeartTone" placeholder="Fetal Heart Tone">
                                        </div>
                                        <button type="submit" name="push" class="btn btn-info"><i class="material-icons">person</i> Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Patient Vitals</h3>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive text-nowrap">
                                        <!--Table-->
                                        <table class="table table-striped table-bordered">

                                            <!--Table head-->
                                            <thead>
                                                <tr>
                                                    <th>Blood Pressure</th>
                                                    <th>Weight</th>
                                                    <th>Belly Size</th>
                                                    <th>Fetal Heart Tone</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <!--Table head-->

                                            <!--Table body-->
                                            <tbody>
                                                <?php
                                                include("includes/db.php");
                                                $email = $_GET['email'];
                                                $ref = "vitals";
                                                $data = $database->getReference($ref)->getValue();
                                                $i = 0;
                                                foreach ($data as $key => $data1) {
                                                    if ($_SESSION['user'] == $data1['ob'] && $email == $data1['email']) {
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $data1['systolic']; ?>/<?php echo $data1['diastolic'] ?> </a></td>
                                                            <td><?php echo $data1['weight']; ?></td>
                                                            <td><?php echo $data1['waistSize']; ?></td>
                                                            <td><?php echo $data1['fetalHeartTone']; ?></td>
                                                            <td><?php echo $data1['date']; ?></td>
                                                            <td><?php echo $data1['time']; ?></td>
                                                            <td>
                                                                <a type="button" class="btn btn-primary" href="showpatientdata.php?key=<?php echo $key; ?>">View</a>
                                                                <a type="button" class="btn btn-danger" href="patientFindingsAdd.php?key=<?php echo $key; ?>">Delete</a>
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
                </div>


                <!-- your content here -->
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>

                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> AGAPAY
                </div>
                <!-- your footer here -->
            </div>
        </footer>
    </div>
    </div>

    <script src="dirPaginate.js"></script>
    <script src="angular.js"></script>
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

</body>

</html>