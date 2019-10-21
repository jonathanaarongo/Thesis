<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Agapay
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
              <li class="nav-item active">
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

    

          <div class="content">
            <div class="container-fluid">
    
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h3 class="card-title">Lab Tests</h3>
                                </div>
                                <div class="card-body">
                  
<!-- Extended default form grid -->
<form>
     
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="col-md-6">
      <label for="lastname">Last Name</label>
        <input type="name" class="form-control" id="lastname" placeholder="Last Name">
  </div>
    <!-- Default input -->
    <div class="col-md-6">
      <label for="firstname">First Name</label>
      <input type="name" class="form-control" id="firstname" placeholder="First Name">
    </div>

    <!-- Grid row-->
    
    <!-- Default input -->
    <div class="col-md-6">
        <label for="recordNum">Record Number</label>
        <input type="number" class="form-control" id="recordNum" placeholder="Record Number">
      </div>
      <div class="col-md-6">
        <label for="birthdate">Date of Birth</label>
        <input type="date" class="form-control" id="birthdate" placeholder="">
      </div>
     </div>

     <!-- Grid row-->
    <div class="form-row">
        <!-- Default input -->
        <div class="col-md-6">
            <label for="telno">Telephone Number</label>
            <input type="number" class="form-control" id="telno" placeholder="Telephone Number">
          </div>
          <div class="col-md-6">
            <label for="mobileno">Mobile Number</label>
            <input type="number" class="form-control" id="mobileno" placeholder="Mobile Number">
          </div>
          </div>
          
              
          <!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Lab Result Table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success">
        <i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
                <th scope="col">Name of Test</th>
                <th scope="col">Date</th>
                <th scope="col">The Result</th>
                <th scope="col">Conducted By</th>
                <th scope="col">Diagnosis Summary</th>
                <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="false">1</td>
            <td class="pt-3-half" contenteditable="true">UTI Test</td>
            <td class="pt-3-half" contenteditable="true">10/02/2019</td>
            <td class="pt-3-half" contenteditable="true">Minor change</td>
            <td class="pt-3-half" contenteditable="true">Dr. Balbido</td>
            <td class="pt-3-half" contenteditable="true">Drink more water</td>
            
            <td>
              <span class="table-remove"><button type="button"
                  class="btn btn-primary btn-round btn-sm my-0">Remove</button></span>
            </td>
          </tr>
          <!-- This is our clonable table line -->
          <tr>
              <td class="pt-3-half" contenteditable="false">2</td>
              <td class="pt-3-half" contenteditable="true">Ultrasound</td>
              <td class="pt-3-half" contenteditable="true">10/02/2019</td>
              <td class="pt-3-half" contenteditable="true">Clear</td>
              <td class="pt-3-half" contenteditable="true">Dr. Balbido</td>
              <td class="pt-3-half" contenteditable="true">Monitor Belly Size growth</td>
            <td>
              <span class="table-remove"><button type="button"
                  class="btn btn-primary btn-round btn-sm my-0">Remove</button></span>
            </td>
          </tr>
          <!-- This is our clonable table line -->
          <tr>
              <td class="pt-3-half" contenteditable="false">3</td>
              <td class="pt-3-half" contenteditable="true">Papsmear</td>
              <td class="pt-3-half" contenteditable="true">10/02/2019</td>
              <td class="pt-3-half" contenteditable="true">Clear</td>
              <td class="pt-3-half" contenteditable="true">Dr. Balbido</td>
              <td class="pt-3-half" contenteditable="true">No signs of cervical cancer</td>
            <td>
              <span class="table-remove"><button type="button"
                  class="btn btn-primary btn-round btn-sm my-0">Remove</button></span>
            </td>
          </tr>
          <!-- This is our clonable table line -->
          <tr class="hide">
              <td class="pt-3-half" contenteditable="false">4</td>
              <td class="pt-3-half" contenteditable="true">HIV Test</td>
              <td class="pt-3-half" contenteditable="true">10/02/2019</td>
              <td class="pt-3-half" contenteditable="true">Clear</td>
              <td class="pt-3-half" contenteditable="true">Dr. Balbido</td>
              <td class="pt-3-half" contenteditable="true">Avoid unprotected sex</td>
              
            <td>
              <span class="table-remove"><button type="button"
                  class="btn btn-primary btn-round btn-sm my-0">Remove</button></span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->

            </div>
        </div>
      </div>
    </div>
<br>
</body>
 <!-- Grid row -->
 <div style="text-align:right; width: 96.5%;">
 <button type="submit" class="btn btn-primary btn-md" style="display: inline-block">Submit</button>
 </div>
 
 <!-- <div style="text-align:right; width: 92%;">
    <a href="labResult.html" class="btn btn-primary btn-md">List</a>
</div> -->

</form>




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

