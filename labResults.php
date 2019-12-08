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
    }
}
?>
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
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
 https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-analytics.js"></script>


    <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyAldbmMQg0VdRN7SIlAZkFRlMYRxeZfG0o",
            authDomain: "thesisdb-fe122.firebaseapp.com",
            databaseURL: "https://thesisdb-fe122.firebaseio.com",
            projectId: "thesisdb-fe122",
            storageBucket: "thesisdb-fe122.appspot.com",
            messagingSenderId: "937732663310",
            appId: "1:937732663310:web:58825dfc190e0c020cf45f",
            measurementId: "G-6ZLX16EZPY"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        //firebase.analytics();
    </script>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="..assets/img/sidebar-1.jpg">
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
                        <a class="nav-link" href="#0">
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
                </div>
            </nav>
            <!-- End Navbar -->

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
                                    <span class="pull-right">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"></i> Add Lab Results</button>
                                    </span>
                                    <h3 class="card-title"><?php echo $f_name . ' ' . $l_name; ?>'s Uploaded Lab Results</h3>
                                </div>

                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload Lab Result</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="store_labresults.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <progress value="0" id="uploader" max="100">0%</progress><br><br>
                                                    </div>
                                                    <input id="photo" class="file" type="file" name="mainimage" value="" onchange="getfile()">

                                                    <div class="form-group">
                                                        <label for="labType">Lab Result Type</label>
                                                        <input type="text" class="form-control" name="labType">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment">Comments</label>
                                                        <input type="text" class="form-control" name="comment">
                                                    </div>
                                                    <input type="hidden" id="test" name="image">
                                                    <button id="submit_link" type="submit" name="button">Save</button>
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
                                                    <th>File Name</th>
                                                    <th>Date Added</th>
                                                    <th>Lab Result Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <!--Table head-->

                                            <!--Table body-->
                                            <tbody>
                                                <?php
                                                include("includes/db.php");
                                                $ref = "labresults";
                                                $data = $database->getReference($ref)->getValue();
                                                foreach ($data as $key => $data1) {
                                                    if ($email == $data1['email']) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $data1['fileName']; ?></td>
                                                            <td><?php echo $data1['date']; ?></td>
                                                            <td><?php echo $data1['labType']; ?></td>
                                                            <td>
                                                                <a type="button" class="btn btn-primary" href="<?php echo $data1['filelink']; ?>"><i class="material-icons">rate_review</i> View</a>
                                                                <a type="button" class="btn btn-danger" href="patientFindingsAdd.php?key=<?php echo $key; ?>"><i class="material-icons">delete</i> Delete</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <span class="pull-right">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#enmodal"><i class="fa fa-plus"></i> Encode Lab Results</button>
                                    </span>
                                    <h3 class="card-title"><?php echo $f_name . ' ' . $l_name; ?>'s Encoded Lab Results</h3>
                                </div>



                                <div class="card-body">

                                    <div class="table-responsive text-nowrap">
                                        <!--Table-->
                                        <table class="table table-striped table-bordered">

                                            <!--Table head-->
                                            <thead>
                                                <tr>
                                                    <th>Date Added</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <!--Table head-->

                                            <!--Table body-->
                                            <tbody>
                                                <?php
                                                include("includes/db.php");
                                                $ref = "labresultsencode";
                                                $data = $database->getReference($ref)->getValue();
                                                foreach ($data as $key => $data1) {
                                                    if ($email == $data1['email']) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $data1['date']; ?></td>
                                                            <td><?php echo $data1['time']; ?></td>
                                                            <td>
                                                                <a type="button" class="btn btn-primary" href="labResultsView.php?key=<?php echo $key; ?>"><i class="material-icons">rate_review</i> View</a>
                                                                <a type="button" class="btn btn-danger" href="patientFindingsAdd.php?key=<?php echo $key; ?>"><i class="material-icons">delete</i> Delete</a>
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
                        <div class="modal fade" id="enmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Choose Lab Results to Do</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="process_labs.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="checkbox" id="cbc" name="cbc"> Complete Blood Count<br>
                                                <input type="checkbox" id="urinalysis" name="urinalysis"> Urinalysis <br>
                                                <input type="checkbox" id="rubella" name="rubella"> Rubella<br>
                                                <input type="checkbox" id="hepatitisB" name="hepatitisB"> Hepatitis B<br>
                                                <input type="checkbox" id="hepatitisC" name="hepatitisC"> Hepatitis C <br>
                                                <input type="checkbox" id="std" name="std"> Sexually Transmitted Disease<br>
                                                <input type="checkbox" id="hiv" name="hiv"> Human Immunodeficiency Virus<br>
                                                <input type="checkbox" id="tb" name="tb"> Tuberculosis<br>
                                                <button type="submit" class="btn btn-primary" name="button">Next</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-top:-30px;">
                        <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true">
                        </dir-pagination-controls>
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

<script type="text/javascript">
    var selectedFile;

    function getfile() {
        var pic = document.getElementById("photo");
        var test = document.getElementById("test");

        // selected file is that file which user chosen by html form 
        selectedFile = pic.files[0];

        // make save button disabled for few seconds that has id='submit_link' 
        document.getElementById('submit_link').setAttribute('disabled', 'true');
        myfunction(); // call below written function 
    }

    function myfunction() {
        // select unique name for everytime when image uploaded 
        // Date.now() is function that give current timestamp 
        var name = "123" + Date.now();

        // make ref to your firebase storage and select images folder 
        var storageRef = firebase.storage().ref('/labresults/' + name);

        // put file to firebase  
        var uploadTask = storageRef.put(selectedFile);

        // all working for progress bar that in html 
        // to indicate image uploading... report 
        uploadTask.on('state_changed', function(snapshot) {
            var progress =
                (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            var uploader = document.getElementById('uploader');
            uploader.value = progress;
            switch (snapshot.state) {
                case firebase.storage.TaskState.PAUSED:
                    console.log('Upload is paused');
                    break;
                case firebase.storage.TaskState.RUNNING:
                    console.log('Upload is running');
                    break;
            }
        }, function(error) {
            console.log(error);
        }, function() {

            // get the uploaded image url back 
            uploadTask.snapshot.ref.getDownloadURL().then(
                function(downloadURL) {

                    // You get your url from here 
                    console.log('File available at', downloadURL);
                    // print the image url  
                    console.log(downloadURL);
                    test.value = downloadURL

                    document.getElementById('submit_link').removeAttribute('disabled');
                });
        });
    };
</script>

</html>