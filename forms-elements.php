<?php
require "../HRIS/Model/db-manager.php";
require "../HRIS/Controller/employee-controller.php";

$database = new DB_Manager();

$get_employee = $database->get_all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    #inputFirstName,
    #inputLastName,
    #inputAddress,
    #inputAddress2,
    #inputCity,
    #inputProvince,
    #inputPosition,
    #inputSupervisor,
    #inputRegion {
      text-transform: capitalize;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.php" class="active">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-data.php">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Tables Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Elements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Alert boxes -->
    <?php if (isset($_SESSION['success']) == true) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
        <i class="bi bi-check-circle me-1"></i>
        Congratulation! A new employee has been created!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>

    <?php if (isset($_SESSION['valid']) == true) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-danger">
        <i class="bi bi-exclamation-octagon me-1"></i>
        The SIN number already exists!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php }
    // Unset existing session
    session_unset(); ?>

    <!-- Section with all the inputs -->
    <section class="section">
      <form action="#" method="post">
        <div class="col-lg-6 justify-content-center mx-auto">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Personal Informations</h5>

              <!-- General Form Elements -->
              <div class="row mb-3">
                <label for="inputFirstName" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputFirstName" name="firstname" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputLastName" name="lastname" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDob" class="col-sm-3 col-form-label">Date of birth</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="inputDob" name="dob" required>
                  <div class="invalid-feedback">
                    Invalid age, must be 16 and above
                  </div>
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                <div class="col-sm-9">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" required>
                    <label class="form-check-label" for="gridRadios1">
                      Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" required>
                    <label class="form-check-label" for="gridRadios2">
                      Female
                    </label>
                  </div>
                </div>
              </fieldset>
              <div class="row mb-3">
                <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St (App. Unit)" name="address" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputCity" name="city" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputProvince" class="col-sm-3 col-form-label">Province</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputProvince" name="province" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                  <select id="inputCountry" class="form-select" name="country" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="Canada">Canada</option>
                    <option value="United-States">United-States</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPostalcode" class="col-sm-3 col-form-label">Postal Code</label>
                <div class="col-sm-9">
                  <!-- oninvalid="this.setCustomValidity('CAD: K7L-1Z9 \n USA: 52607')" oninput="this.setCustomValidity('')" -->
                  <input type="text" class="form-control" id="inputPostalcode" maxlength="7" name="postalcode" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip. (Canada: A1Z-1B2, USA: 12345)
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail" placeholder="example@realfruitbubbletea.com" name="email" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputMobile" class="col-sm-3 col-form-label">Mobile Phone</label>
                <div class="col-sm-9">
                  <input type="tel" class="form-control" id="inputMobile" placeholder="e.g. 888-888-8888" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="mobile">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputHome" class="col-sm-3 col-form-label">Homephone</label>
                <div class="col-sm-9">
                  <input type="tel" class="form-control" id="inputHome" placeholder="e.g. 888-888-8888" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="home">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputSin" class="col-sm-3 col-form-label">SIN</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputSin" maxlength="9" pattern="[0-9]{9}" name="sin" required oninvalid="this.setCustomValidity('Must be a 9 digits numeric number')" oninput="this.setCustomValidity('')">
                </div>
              </div>
              <!-- End General Form Elements -->
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Other Informations</h5>

                <!-- Advanced Form Elements -->
                <div class="row mb-3">
                  <label for="inputPosition" class="col-sm-3 col-form-label">Hired position</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPosition" name="position">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPayclass" class="col-sm-3 col-form-label">Pay Class</label>
                  <div class="col-sm-9">
                    <select id="inputPayclass" class="form-select" name="payclass">
                      <option value="Hourly">Hourly</option>
                      <option value="Salary">Salary</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputSupervisor" class="col-sm-3 col-form-label">Supervisor</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputSupervisor" name="supervisor">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputRegion" class="col-sm-3 col-form-label">Region</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputRegion" name="region">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-xs"></div>
                  <div class="col-sm d-flex justify-content-center">
                    <div class="btn-group">
                      <button onclick="getDate()">asd</button>
                      <button onclick="getAge(); getPostalcode();" type="submit" class="btn btn-primary" name="submit">Submit</button>
                      <a href="tables-data.php" type="button" class="btn btn-secondary">Cancel</a>
                    </div>
                  </div>
                  <div class="col-xs"></div>
                </div>

                <!-- End Advanced Form Elements -->
              </div>
            </div>
          </div>

        </div>
      </form>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <!-- Javascript for alert popup control  -->
  <script src="js/alert-control.js"></script>

  <!-- Javascript for preventing resubmitting control  -->
  <script src="js/resubmission-control.js"></script>

  <!-- Javascript to load getAge and getPostalCode control  -->
  <script src="js/getAge.js"></script>
  <script src="js/getPostalCode.js"></script>

  <script>
    function getDate() {
      let d = new Date("2023-08-13");
      let today_date = new Date();
      console.log(d);
      console.log(today_date);

      let milisec_diff = today_date - d;
      let year = Math.floor(milisec_diff / (1000 * 60 * 60 * 24 * 365));

      console.log(year + " year(s)");
      // let month = Math.round((milisec_diff / (1000 * 60 * 60 * 24 * 365) - year) * 10);
      let month = Math.abs(d.getMonth() - today_date.getMonth());

      console.log(month + " month(s)");
      let day;
      let diff = 0;
      if (d.getDate() >= today_date.getDate()) {
        diff = d.getDate() - today_date.getDate();
        day = today_date.getDate() + diff;
      } else {
        day = today_date.getDate() - d.getDate();
      }
      // let day = ((milisec_diff / (1000 * 60 * 60 * 24 * 365) - year) * 10);
      console.log(d.getDate())
      console.log(today_date.getDate())
      console.log(diff + " difference");
      console.log(day)
    }
  </script>
</body>

</html>