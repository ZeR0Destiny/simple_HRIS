<?php 
require "../HRIS/Model/file-db-manager.php";

$database = new DB_Manager();

$uid = $_GET['employee_UID'];

$get_files = $database->get_files($uid);

require "include/header.html";
?>

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
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.php">
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
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link" href="table-file-manager.php">
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
        <h1>Employee File Manager</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="table-file-manager.php">Tables</a></li>
                <li class="breadcrumb-item active">Employee</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form action="" method="post">
            <div class="col-lg justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                        <button class="btn btn-outline-dark" title="Upload" data-bs-toggle="Upload"><i class="bi bi-file-earmark-arrow-up-fill"></i></button>

                        </div>
                        <div class="dataTable-container">
                            <table id="file_table" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Display Name</th>
                                        <th>File Name</th>
                                        <th>Update On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $count = 1;
                                    foreach ($get_files as $files) : ?>
                                        <tr name="p_id">
                                            <td width="3%"><?= $count++ ?></td>
                                            <td><?= $files['display_name'] ?></td>
                                            <td><?= $files['filename'] ?></td>
                                            <td><?= $files['created_at'] ?></td>
                                            <td width="15%">
                                                <div class="row">
                                                    <div class="col">
                                                        <button class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></button>
                                                        <button class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></button>
                                                        <button class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>

<?php require "include/footer.html" ?>