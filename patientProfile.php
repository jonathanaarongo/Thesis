<?php
session_start();
date_default_timezone_set('Asia/Manila'); ?>

<?php
//getting id from url
$patientKey = $_GET['key'];
$_SESSION['key'] = $patientKey;

$_SESSION['user'] = "obsample@gmail.com";

//selecting data associated with this particular id
include("includes/db.php");
$ref = "patientdata";
$data = $database->getReference($ref)->getValue();
foreach ($data as $key => $data1) {
    if ($patientKey == $key) {
        $address = $data1['address'];
        $bdate = $data1['bdate'];
        $contactNo = $data1['contactNo'];
        $dateAdded = $data1['dateAdded'];
        $f_name = $data1['f_name'];
        $familyHistory = $data1['familyHistory'];
        $fdaymens = $data1['fdaymens'];
        $email = $data1['email'];
        $l_name = $data1['l_name'];
        $medicalHistory = $data1['medicalHistory'];
        $noOfBaby = $data1['noOfBaby'];
        $occupation = $data1['occupation'];
        $patType = $data1['patType'];
        $status = $data1['status'];
        $conCounterCard = $data1['conCounterCard'];
        $kickCounterCard = $data1['kickCounterCard'];
        $weightCard = $data1['weightCard'];
        $babyMeasureCard = $data1['babyMeasureCard'];
        $bloodSugarCard = $data1['bloodSugarCard'];
        $bloodPressureCard = $data1['bloodPressureCard'];
        $symptomsCard = $data1['symptomsCard'];

        $_SESSION['email'] = $email;

        $date1 = date_create($data1['fdaymens']);
        $date2 = date_create(date("Y-m-d"));
        $diff = date_diff($date1, $date2);
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



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--CONTRACTION COUNTER CHART FRONT END-->
    <script type="text/javascript">
        <?php
        include("includes/db.php");
        $ref = "ContractionAdd";
        $data = $database->getReference($ref)->getValue();
        $soft = array();
        $mild = array();
        $hard = array();
        foreach ($data as $key => $data1) {

            if ($_SESSION['email'] == $data1['usermail']) {
                if ($data1['contraction'] == "Soft") {
                    array_push($soft, $data1['contraction']);
                } else if ($data1['contraction'] == "Mild") {
                    array_push($mild, $data1['contraction']);
                } else if ($data1['contraction'] == "Hard") {
                    array_push($hard, $data1['contraction']);
                }
            }
        }

        ?>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Contraction Type', 'Contraction Type No.'],
                ['Soft', <?php echo count($soft); ?>],
                ['Hard', <?php echo count($hard); ?>],
                ['Mild', <?php echo count($mild); ?>]
            ]);

            var options = {
                title: ''
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie_contraction'));

            chart.draw(data, options);
        }
    </script>
    <!--KICK COUNTER CHART FRONT END-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Date', 'Kick Counter', 'Total Time (in seconds)'],
                <?php
                //getting id from url
                $patientKey = $_GET['key'];

                //selecting data associated with this particular id
                include("includes/db.php");
                $ref = "KickAdd";
                $data = $database->getReference($ref)->getValue();
                $kickarray = array();
                $timearray = array();
                $startdate = date('Y-m-d');
                function getSecondsFromHMS($time)
                {
                    $timeArr = array_reverse(explode(":", $time));
                    $seconds = 0;
                    foreach ($timeArr as $key => $value) {
                        if ($key > 2)
                            break;
                        $seconds += pow(60, $key) * $value;
                    }
                    return $seconds;
                }

                foreach ($data as $key => $data1) {
                    $date = str_replace('-', '/', $data1['date']);
                    $newDate = date("Y-m-d", strtotime($date));

                    if ($_SESSION['email'] == $data1['usermail']) {

                        if ($startdate == $newDate) {
                            array_push($kickarray, $data1['kick']);
                            array_push($timearray, getSecondsFromHMS($data1['time']));
                        } else {
                            ?>[new Date('<?php echo $startdate; ?>'), <?php echo array_sum($kickarray); ?>, <?php echo array_sum($timearray); ?>],
                <?php
                            $kickarray = array();
                            $timearray = array();
                            array_push($kickarray, $data1['kick']);
                            array_push($timearray, getSecondsFromHMS($data1['time']));
                            $startdate = $newDate;
                        }
                    }
                }
                ?>[new Date('<?php echo $startdate; ?>'), <?php echo array_sum($kickarray); ?>, <?php echo array_sum($timearray); ?>]
            ]);

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_kickcounter'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <!--WEIGHT CHART FRONT END-->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Weight');

            data.addRows([
                <?php
                //getting id from url
                $patientKey = $_GET['key'];

                //selecting data associated with this particular id
                include("includes/db.php");
                $ref = "WeightAdd";
                $data = $database->getReference($ref)->getValue();
                $i = 0;
                foreach ($data as $key => $data1) {

                    if ($_SESSION['email'] == $data1['usermail']) {
                        $date = str_replace('-', '/', $data1['date']);
                        $newDate = date("Y-m-d", strtotime($date));
                        ?>[new Date('<?php echo $newDate; ?>'), <?php echo $data1['weight']; ?>],

                <?php
                    }
                }
                ?>
            ]);


            var options = {
                hAxis: {
                    format: 'MMM/dd/yy',
                    gridlines: {
                        count: 15
                    }
                },
                vAxis: {
                    gridlines: {
                        color: 'none'
                    },
                    minValue: 0
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_weight_x'));

            chart.draw(data, options);
        }
    </script>
    <!--WAIST SIZE CHART FRONT END-->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Waist Size');

            data.addRows([
                <?php
                //getting id from url
                $patientKey = $_GET['key'];

                //selecting data associated with this particular id
                include("includes/db.php");
                $ref = "BabyMeasurementAdd";
                $data = $database->getReference($ref)->getValue();
                foreach ($data as $key => $data1) {

                    if ($_SESSION['email'] == $data1['usermail']) {
                        $date = str_replace('-', '/', $data1['date']);
                        $newDate = date("Y-m-d", strtotime($date));
                        ?>[new Date('<?php echo $newDate; ?>'), <?php echo $data1['measureField']; ?>],

                <?php
                    }
                }
                ?>
            ]);


            var options = {
                hAxis: {
                    format: 'MMM/dd/yy',
                    gridlines: {
                        count: 15
                    }
                },
                vAxis: {
                    gridlines: {
                        color: 'none'
                    },
                    minValue: 0
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_bellysize_x'));

            chart.draw(data, options);
        }
    </script>
    <!--CONTRACTION COUNTER CHART FRONT END-->
    <script type="text/javascript">
        <?php
        include("includes/db.php");
        $ref = "SymptomsAdd";
        $data = $database->getReference($ref)->getValue();
        $headache = array();
        $nauzea = array();
        $fatigue = array();
        $moodswing = array();
        $swollenbreast = array();
        foreach ($data as $key => $data1) {

            if ($_SESSION['email'] == $data1['usermail']) {
                if ($data1['symptoms'] == "Headache") {
                    array_push($headache, $data1['symptoms']);
                } else if ($data1['symptoms'] == "Nauzea") {
                    array_push($nauzea, $data1['symptoms']);
                } else if ($data1['symptoms'] == "Fatigue") {
                    array_push($fatigue, $data1['symptoms']);
                } else if ($data1['symptoms'] == "Mood Swing") {
                    array_push($moodswing, $data1['symptoms']);
                } else if ($data1['symptoms'] == "Swollen Breast") {
                    array_push($swollenbreast, $data1['symptoms']);
                }
            }
        }

        ?>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Symptoms', 'Symptoms No.'],
                ['Headache', <?php echo count($headache); ?>],
                ['Nauzea', <?php echo count($nauzea); ?>],
                ['Fatigue', <?php echo count($fatigue); ?>],
                ['Mood Swing', <?php echo count($moodswing); ?>],
                ['Swollen Breast', <?php echo count($swollenbreast); ?>]
            ]);

            var options = {
                title: ''
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie_symptoms'));

            chart.draw(data, options);
        }
    </script>
    <!--BLOOD PRESSURE CHART FRONT END-->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Systolic');
            data.addColumn('number', 'Diastolic');

            data.addRows([
                <?php
                //getting id from url
                $patientKey = $_GET['key'];

                //selecting data associated with this particular id
                include("includes/db.php");
                $ref = "BloodPressureAdd";
                $data = $database->getReference($ref)->getValue();
                foreach ($data as $key => $data1) {

                    if ($_SESSION['email'] == $data1['usermail']) {
                        $date = str_replace('-', '/', $data1['date']);
                        $newDate = date("Y-m-d", strtotime($date));
                        ?>[new Date('<?php echo $data1['date']; ?>'), <?php echo $data1['systolic']; ?>, <?php echo $data1['diastolic']; ?>],

                <?php
                    }
                }
                ?>
            ]);


            var options = {
                hAxis: {
                    format: 'MMM/dd/yy',
                    gridlines: {
                        count: 15
                    }
                },
                vAxis: {
                    gridlines: {
                        color: 'none'
                    },
                    minValue: 0
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_bloodpressure_x'));

            chart.draw(data, options);
        }
    </script>
    <!--BLOOD SUGAR CHART FRONT END-->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Blood Sugar');

            data.addRows([
                <?php
                //getting id from url
                $patientKey = $_GET['key'];

                //selecting data associated with this particular id
                include("includes/db.php");
                $ref = "BloodSugarAdd";
                $data = $database->getReference($ref)->getValue();
                foreach ($data as $key => $data1) {

                    if ($_SESSION['email'] == $data1['usermail']) {
                        $date = str_replace('-', '/', $data1['date']);
                        $newDate = date("Y-m-d", strtotime($date));
                        ?>[new Date('<?php echo $newDate; ?>'), <?php echo $data1['bsField']; ?>],

                <?php
                    }
                }
                ?>
            ]);


            var options = {
                hAxis: {
                    format: 'MMM/dd/yy',
                    gridlines: {
                        count: 15
                    }
                },
                vAxis: {
                    gridlines: {
                        color: 'none'
                    },
                    minValue: 0
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_bloodsugar_x'));

            chart.draw(data, options);
        }
    </script>

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

            <body>
                <div class="content">
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
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Patient Data</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Grid row -->
                                        <form action="update_patient.php" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <!-- Default input -->
                                                <div class="col-md-12">
                                                    <h1>WEEK <?php echo floor($diff->format("%a") / 7 + 1); ?> OF PREGNANT PATIENT'S PREGNANCY</h1>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="f_name">First Name</label>
                                                    <input type="name" class="form-control" id="f_name" name="f_name" value="<?php echo $f_name ?>">
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="firstname">Last Name</label>
                                                    <input type="name" class="form-control" id="l_name" name="l_name" value="<?php echo $l_name ?>">
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="email">Email Address</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="<?php $_SESSION['email'] = $email;
                                                                                                                            echo $_SESSION['email']; ?>">
                                                </div>

                                                <!-- Default input -->
                                                <div class="col-md-8">
                                                    <label for="adress">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="occupation">Occupation</label>
                                                    <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $occupation ?>">
                                                </div>
                                                <!-- Default input -->
                                                <!-- Grid row-->
                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="contactNo">Contact Number</label>
                                                    <input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo $contactNo ?>">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="patType">Patient Type</label>
                                                    <select name="patType" class="form-control">
                                                        <?php if ($patType == "Normal") {
                                                            ?>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High Risk Patient">High Risk Patient</option>
                                                        <?php
                                                        } else {  ?>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High Risk Patient">High Risk Patient</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="status">Patient Condition</label>
                                                    <select name="status" class="form-control">
                                                        <?php if ($status == "Normal") {
                                                            ?>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Gestational Diabetes">Gestational Diabetes</option>
                                                            <option value="Gestational Hypertension">Gestational Hypertension</option>
                                                            <option value="Others">Others</option>
                                                        <?php
                                                        } else if ($status == "Gestational Diabetes") {
                                                            ?>
                                                            <option value="Gestational Diabetes">Gestational Diabetes</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Gestational Hypertension">Gestational Hypertension</option>
                                                            <option value="Others">Others</option>
                                                        <?php
                                                        } else if ($status == "Gestational Hypertension") {
                                                            ?>
                                                            <option value="Gestational Hypertension">Gestational Hypertension</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Gestational Diabetes">Gestational Diabetes</option>
                                                            <option value="Others">Others</option>
                                                        <?php
                                                        } else {
                                                            ?>
                                                            <option value="Others">Others</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Gestational Diabetes">Gestational Diabetes</option>
                                                            <option value="Gestational Hypertension">Gestational Hypertension</option>
                                                        <?php
                                                        } ?>
                                                    </select>
                                                </div>

                                                <!-- Grid row-->

                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="dateAdded">Date Added</label>
                                                    <input type="text" class="form-control" id="dateAdded" name="dateAdded" value="<?php echo $dateAdded ?>">
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="birthday">Birthday</label>
                                                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $bdate ?>">
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-4">
                                                    <label for="fdaymens">First Day of Last Menstration</label>
                                                    <input type="date" class="form-control" id="fdaymens" name="fdaymens" value="<?php echo $fdaymens ?>">
                                                </div>



                                                <!-- Grid row-->
                                                <!-- Default input -->
                                                <div class="col-md-12">
                                                    <label for="medicalHistory">Medical History</label>
                                                    <textarea class="form-control" id="medicalHistory" name="medicalHistory" rows="3"><?php echo $medicalHistory ?></textarea>
                                                </div>
                                                <!-- Default input -->
                                                <div class="col-md-12">
                                                    <label for="familyHistory">Family History</label>
                                                    <textarea class="form-control" id="familyHistory" name="familyHistory" rows="3"><?php echo $familyHistory ?></textarea>
                                                </div>

                                                <div class="col-md-1">
                                                    <label for="noOfBaby">Number of Babies</label>
                                                    <input type="number" class="form-control" id="noOfBaby" name="noOfBaby" value="<?php echo $noOfBaby; ?>">
                                                </div>

                                                <div class="col-md-12">
                                                    <h3>Assign What to Monitor</h3><br>
                                                    <input type="checkbox" id="conCounterCard" name="conCounterCard" <?php if ($conCounterCard == "true") echo "checked"; ?>> Contraction Counter<br>
                                                    <input type="checkbox" id="kickCounterCard" name="kickCounterCard" <?php if ($kickCounterCard == "true") echo "checked"; ?>> Kick Counter <br>
                                                    <input type="checkbox" id="weightCard" name="weightCard" <?php if ($weightCard == "true") echo "checked"; ?>> Weight<br>
                                                    <input type="checkbox" id="babyMeasureCard" name="babyMeasureCard" <?php if ($babyMeasureCard == "true") echo "checked"; ?>> Baby Measurements<br>
                                                    <input type="checkbox" id="symptomsCard" name="symptomsCard" <?php if ($symptomsCard == "true") echo "checked"; ?>> Symptoms <br>
                                                    <input type="checkbox" id="bloodPressureCard" name="bloodPressureCard" <?php if ($bloodPressureCard == "true") echo "checked"; ?>> Blood Pressure <br>
                                                    <input type="checkbox" id="bloodSugarCard" name="bloodSugarCard" <?php if ($bloodSugarCard == "true") echo "checked"; ?>> Blood Sugar<br>

                                                </div>

                                                <input type="hidden" name="ref" value="patientdata/<?php echo $patientKey; ?>">
                                                <!-- Grid row -->
                                                <input type="submit" class="btn btn-primary btn-md" name="update" style="display: inline-block" id="editDetails" value="Edit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Contraction Counter</h3>
                                    </div>

                                    <div class="card-body">
                                        <!-- PIE CHART FOR CONTRACTION COUNTER -->
                                        <div id="pie_contraction" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Kick Counter</h3>
                                    </div>

                                    <div class="card-body">
                                        <!-- BAR CHART FOR KICK COUNTER -->
                                        <div id="columnchart_kickcounter" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Weight</h3>
                                    </div>

                                    <div class="card-body">
                                        <!-- LINE CHART FOR FETAL WEIGHT -->
                                        <div id="line_weight_x" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Waist Size</h3>
                                    </div>

                                    <div class="card-body">
                                        <!-- LINE CHART FOR WAIST SIZE -->
                                        <div id="line_bellysize_x" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Symptoms</h3>
                                    </div>

                                    <div class="card-body">
                                        <!-- PIE CHART FOR SYMPTOMS-->
                                        <div id="pie_symptoms" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Blood Pressure</h3>
                                    </div>

                                    <div class="card-body">
                                        <!-- LINE CHART FOR BLOOD PRESSURE -->
                                        <div id="line_bloodpressure_x" style="width: 100%; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h3 class="card-title"><?php echo $f_name, ' ', $l_name; ?>'s Blood Sugar</h3>
                                    </div>

                                    <div class="card-body">
                                        <!-- LINE CHART FOR BLOOD SUGAR -->
                                        <div id="line_bloodsugar_x" style="width: 100%; height: 500px;"></div>
                                    </div>
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