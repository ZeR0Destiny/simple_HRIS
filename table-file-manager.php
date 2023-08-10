<?php
require_once "../HRIS/Controller/file-manager-controller.php";

$get_file_employee = $database->select_and_count_all_employee_file();

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
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Employee</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="col-lg justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="dataTable-container">
                        <table id="emp_file_table" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>UID</th>
                                    <th>Files</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($get_file_employee as $file_employee) : ?>
                                    <tr name="p_id" data-uid="<?= $file_employee['UID'] ?>">
                                        <td width="3%"><?= $file_employee['id'] ?></td>
                                        <td><?= $file_employee['firstname'] . ' ' . $file_employee['lastname'] ?></td>
                                        <td><?= $file_employee['UID'] ?></td>
                                        <td width="10%"><?= $file_employee['count'] ?></td>
                                        <td width="10%">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="table-file.php?employee_UID=<?= $file_employee['UID'] ?>" class="btn btn-outline-dark btn-sm" title="View Files" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-diff-fill"></i></a>
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal" data-employee-uid="<?= $file_employee['UID'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload"><i class="bi bi-file-earmark-arrow-up-fill"></i></button>
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
    </section>
</main>

<!-- Modal for file upload -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Select File</label>
                        <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                    </div>
                    <div class="mb-3">
                        <label for="displayName" class="form-label">Display Name</label>
                        <input type="text" class="form-control" id="displayName" name="displayName" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputCategory" class="form-label">Category</label>
                        <select id="inputCategory" class="form-select" name="category" required>
                            <option value="BEN">Benefits</option>
                            <option value="MED">Medical</option>
                            <option value="DCP">Discipline Record</option>
                            <option value="HIR">Hiring</option>
                            <option value="IMG">Immigration</option>
                            <option value="INV">Investigation</option>
                            <option value="PSF">Personal File</option>
                            <option value="TRN">Training Package</option>
                            <option value="UNC">Unclassified</option>
                            <option value="WKE">Work Eligibility</option>
                        </select>
                    </div>
                    <input type="hidden" name="employeeUID" value="employeeUID" id="employeeUID">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="file-manager-controller.php" method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Select File</label>
                        <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                    </div>
                    <div class="mb-3">
                        <label for="displayName" class="form-label">Display Name</label>
                        <input type="text" class="form-control" id="displayName" name="displayName" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputCategory" class="form-label">Category</label>
                        <select id="inputCategory" class="form-select" name="category" required>
                            <option value="BEN">Benefits</option>
                            <option value="MED">Medical</option>
                            <option value="DCP">Discipline Record</option>
                            <option value="HIR">Hiring</option>
                            <option value="IMG">Immigration</option>
                            <option value="INV">Investigation</option>
                            <option value="PSN">Personal File</option>
                            <option value="TRN">Training Package</option>
                            <option value="UNC">Unclassified</option>
                            <option value="WRK">Work Eligibility</option>
                        </select>
                    </div>
                    <input type="hidden" name="employeeUID" value="" id="employeeUID">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<?php require "include/footer.html" ?>