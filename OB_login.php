<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
  <link href="css/loginstyle.css" rel="stylesheet">
</head>

<body>
  <!--Sign In-->
  <div class="container" id="container">
    <div ng-app="login_app" ng-controller="login_controller" class="container form_style">

    </div>
    <div class="form-container sign-in-container">
      <form method="post" ng-submit="submitLogin()">
        <h1>OB Account</h1>
        <div class="social-container">
        </div>
        <input type="email" placeholder="Email" ng-model="loginData.email" />
        <input type="password" placeholder="Password" ng-model="loginData.password" />
        <button ng-click="submitLogin()" >LOGIN</button>
        <input type="submit" name="login" value="Login" ng-click="submitLogin()" />
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
        </div>
        <div class="overlay-panel overlay-right">
        </div>
      </div>
    </div>
  </div>

  <script src="js/main.js"></script>
  <script>
    var app = angular.module('login_app', []);
    app.controller('login_controller', function($scope, $http) {
      $scope.closeMsg = function() {};

      $scope.login_form = true;

      $scope.showLogin = function() {
        $scope.login_form = true;
      };

      $scope.submitLogin = function() {
        $http({
          method: "POST",
          url: "login.php",
          data: $scope.loginData
        }).success(function(data) {
          if (data.error != '') {
            $scope.alertMsg = true;
            $scope.alertClass = 'alert-danger';
            $scope.alertMessage = data.error;
          } else {
            location.reload();
          }
        });
      };

    });
  </script>
</body>

</html>