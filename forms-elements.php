<?php
require "../HRIS/Model/employee-db-manager.php";
require "../HRIS/Controller/employee-controller.php";

$database = new DB_Manager();

$get_employee = $database->select_all_employee();

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

    <!-- Bootstrap 5.2.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

    <style>
        #inputFirstName,
        #inputMiddleName,
        #inputLastName,
        #inputPreferedName,
        #inputAddress,
        #inputCity,
        #inputPosition {
            text-transform: capitalize;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

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
                <a class="nav-link collapsed" href="index.php">
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
                            <i class="bi bi-circle"></i><span>Create Employee</span>
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
                        <a href="table-data.php">
                            <i class="bi bi-circle"></i><span>Employee Table</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="table-file-manager.php">
                    <i class="bi bi-folder"></i>
                    <span>File Manager</span>
                </a>
            </li>

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
            <h1>Employee Form</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Create</li>
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
                <div class="row">
                    <div class="col-lg-6">
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
                                    <label for="inputMiddleName" class="col-sm-3 col-form-label">Middle Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputMiddleName" name="middlename">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputLastName" name="lastname" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPreferedName" class="col-sm-3 col-form-label">Prefered Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPreferedName" name="preferedname" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDob" class="col-sm-3 col-form-label">Date of birth</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="inputDob" name="dob" required>
                                        <div class="invalid-feedback">
                                            Invalid age, cannot be under 16 years old
                                        </div>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="form-check col-sm">
                                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check col-sm">
                                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" required>
                                                <label class="form-check-label" for="gridRadios2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check col-sm">
                                                <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="Other" required>
                                                <label class="form-check-label" for="gridRadios3">
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select id="inputCountry" class="form-select" name="country" onchange="loadProvinces()" required>
                                            <option selected value="">Select a country</option>
                                            <option value="Canada">Canada</option>
                                            <option value="United-States">United-States</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Javascript to load province or state list from selected country -->
                                <script src="js/getProvince.js"></script>
                                <div class="row mb-3">
                                    <label for="inputProvince" class="col-sm-3 col-form-label">Province/State</label>
                                    <div class="col-sm-9">
                                        <select id="inputProvince" class="form-select" name="province" required>
                                            <option selected value="">Select a province</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputCity" name="city" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St (App. Unit)" name="address" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPostalCode" class="col-sm-3 col-form-label">Postal/ZIP Code<Code></Code></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPostalCode" maxlength="7" name="postalcode" required>
                                        <div class="invalid-feedback">
                                            Please provide valid information. (Canada: A1Z-1B2, USA: 12345)
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="example@realfruitbubbletea.com" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
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
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" onclick="allowExpiration()">
                                        <label class="form-check-label" for="gridCheck1">
                                            Expiration Date
                                        </label>
                                        <input type="date" class="form-control" id="inputExpSIN" name="exp_sin" disabled>
                                        <div class="invalid-feedback">
                                            Invalid expiration date
                                        </div>
                                    </div>
                                </div>
                                <script src="js/getSIN-Expiration.js"></script>
                                <!-- End General Form Elements -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                                    <label for="inputRegion" class="col-sm-3 col-form-label">Region</label>
                                    <div class="col-sm-9">
                                        <!-- <input type="text" class="form-control" id="inputRegion" name="region"> -->
                                        <select id="inputRegion" class="form-select" name="region" onchange="loadStores();" required>
                                            <option selected value="">Select a region</option>
                                            <option value="CENTRAL">CENTRAL</option>
                                            <option value="EAST">EAST</option>
                                            <option value="NW">NW</option>
                                            <option value="OTTAWA">OTTAWA</option>
                                            <option value="QUEBEC">QUEBEC</option>
                                            <option value="SOUTH">SOUTH</option>
                                            <option value="SW1">SW1</option>
                                            <option value="SW2">SW2</option>
                                            <option value="USA">USA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputHomeStore" class="col-sm-3 col-form-label">Home Store</label>
                                    <div class="col-sm-9">
                                        <!-- <input type="text" class="form-control" id="inputHomeStore" name="home_store"> -->
                                        <select id="inputHomeStore" class="form-select" name="home_store" required>
                                            <option selected value="">Select a home store</option>
                                        </select>
                                    </div>
                                </div>
                                <script src="js/getStore.js"></script>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-3 col-form-label">Language</label>
                                    <div class="col-sm-9" style="max-width: 150px;">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input class="form-input-checkbox" type="checkbox" id="language1" name="language" value="English">
                                                <label class="form-check-label" for="language1">
                                                    English
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-input-checkbox" type="checkbox" id="language2" name="language" value="French">
                                                <label class="form-check-label" for="language2">
                                                    French
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-input-checkbox" type="checkbox" id="language3" name="language" value="Other">
                                                <label class="form-check-label" for="language3">
                                                    Other
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xs"></div>
                                    <div class="col-sm d-flex justify-content-center">
                                        <div class="btn-group">
                                            <button onclick="checkAge(event); checkPostalCode(event); checkExpiration(event); checkedData();" type="submit" class="btn btn-primary" name="submit">Submit</button>
                                            <a href="table-data.php" type="button" class="btn btn-secondary">Cancel</a>
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

</body>

</html>