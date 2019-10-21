<!doctype html>
<html lang="en" ng-app="app">

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

<body class="" ng-controller="patientdata" ng-init="fetchAllQuestions()">
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="..assets/img/sidebar-1.jpg">
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
          <li class="nav-item active">
            <a class="nav-link" href="#0">
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

      <div class="content">
        <div class="container-fluid">
          <div class="alert alert-success text-center" ng-show="success">
            <button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check"></i> {{ successMessage }}
          </div>
          <div class="alert alert-danger text-center" ng-show="error">
            <button type="button" class="close" ng-lick="clearMessage()"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-warning"></i> {{ errorMessage }}
          </div>
          <div class="row">
            <div class="col-md-12">
            <button href="" class="btn btn-primary" ng-click="fetchAllQuestions()">All Questions</button>
            <button href="" class="btn btn-primary" ng-click="fetchUnansweredQuestions()">Unanswered Questions</button>
            <button href="" class="btn btn-primary" ng-click="fetchAnsweredQuestions()">Answered Questions</button>
              <span class="pull-right">
                <input type="text" ng-model="search" class="form-control" placeholder="Search">
              </span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h3 class="card-title">Patient Inquiries</h3>
              </div>
              <div class="card-body">

                <div class="table-responsive text-nowrap">
                  <!--Table-->
                  <table class="table table-striped table-bordered">

                    <!--Table head-->
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                      <tr dir-paginate="question in questions|orderBy:sortKey:reverse|filter:search|itemsPerPage:5">
                        <td>{{ question.questionID }}</td>
                        <td>{{ question.pFirstName }}</td>
                        <td>{{ question.pLastName }}</td>
                        <td>{{ question.question }}</td>
                        <td>{{ question.answer }}</td>
                        <td>
                          <button type="button" class="btn btn-info" ng-click="showAnswerModal(); selectQuestion(question);"><i class="fa fa-info"></i> Answer</button>
                          <button type="button" class="btn btn-success" ng-click="showEdit(); selectQuestion(question);"><i class="fa fa-edit"></i> Edit</button>
                          <button type="button" class="btn btn-danger" ng-click="showDelete(); selectQuestion(question);"> <i class="fa fa-trash"></i> Delete</button>
                        </td>

                      </tr>
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
      <?php include('questionModal.php'); ?>
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