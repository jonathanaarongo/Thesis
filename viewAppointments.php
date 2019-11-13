<?php session_start();

$_SESSION['user'] = 'obsample@gmail.com';
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
            <a class="nav-link" href="#0">
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
          <li class="nav-item">
            <a class="nav-link" href="#0">
              <i class="material-icons">pregnant_woman</i>
              <p>Manage Patient</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="labResults.php">
              <i class="material-icons">file_copy</i>
              <p>View Lab Results</p>
            </a>
          </li>
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#pablo">Appointments</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="appointmentAdd.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Appointment</a>
              <span class="pull-right">
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
              </span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h3 class="card-title">List of Appointments</h3>
              </div>

              <div class="card-body">

                <div class="table-responsive text-nowrap">
                  <!--Table-->
                  <table class="table table-striped table-bordered">

                    <!--Table head-->
                    <thead>
                      <tr>
                        <th>Email</th>
                        <th>Appointment Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                      <?php
                      include("includes/db.php");
                      $ref = "appointments";
                      $data = $database->getReference($ref)->getValue();
                      $i = 0;
                      foreach ($data as $data1) {
                        if ($_SESSION['user'] == $data1['ob']) {
                          $i++;
                          ?>
                          <tr>
                            <td><?php echo $data1['email']; ?></td>
                            <td><?php echo $data1['nextAppt']; ?></td>
                            <td>
                              <a type="button" class="btn btn-info" href="patientConsult.php?email=<?php echo $data1['email']; ?>"><i class="material-icons">person</i> Consult</a>
                              <a type="button" class="btn btn-danger" href="update_data.php?key=<?php echo $key; ?>"><i class="fa fa-trash"></i> Delete</a>
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

</html>