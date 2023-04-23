<?php
require "../HRIS/Model/employee-db-manager.php";
require "../HRIS/Controller/employee-controller.php";

$database = new DB_Manager();

$get_employee = $database->get_all();

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
        <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
                <a href="table-data.php" class="active">
                    <i class="bi bi-circle"></i><span>Employee Table</span>
                </a>
            </li>
        </ul>
    </li><!-- End Tables Nav -->

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
    <h1>Employee Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Employee</li>
      </ol>
    </nav>
  </div>
  <section class="section">
    <form action="" method="post">
      <div class="col-lg justify-content-center">
        <div class="card">
          <div class="card-body">
              <a href="forms-elements.php" class="btn btn-outline-dark" title="Create" data-bs-toggle="tooltip"><i class="bi bi-person-plus-fill"></i></a>
              <a href="table-file-manager.php" class="btn btn-outline-dark" title="File Manager" data-bs-toggle="tooltip"><i class="bi bi-folder-fill"></i></a>
          </div>
          <div class="card-body">            
            <div class="dataTable-container">
              <table id="emp_table" class="table table-striped table-bordered" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>UID</th>
                    <th>Position</th>
                    <th>Region</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($get_employee as $employee) : ?>
                    <tr name="p_id">
                      <td width="3%"><?= $employee['id'] ?></td>
                      <td><?= $employee['firstname'] . ' ' . $employee['lastname'] ?></td>
                      <td><?= $employee['email'] ?></td>
                      <td><?= $employee['UID'] ?></td>
                      <td width="15%"><?= $employee['position'] ?></td>
                      <td width="10%"><?= $employee['region'] ?></td>
                      <td width="5%"> <span class="badge <?php if ($employee['status'] == 'Inactive') {
                                                            echo 'bg-danger';
                                                          } else {
                                                            echo 'bg-success';
                                                          } ?>"><?= $employee['status']; ?></span>
                      </td>
                      <td width="12%">
                        <div class="row">
                          <div class="col">
                            <button type="button" class="btn btn-outline-dark btn-sm" id="<?= $employee['id'] ?>" title="View" data-bs-toggle="tooltip"><i class="bi bi-person-fill"></i></button>
                            <a href="edit-forms-elements.php?employee_id=<?= $employee['id'] ?>" class="btn btn-outline-primary btn-sm" role="button" title="Edit" data-bs-toggle="tooltip">
                              <i class="bi bi-person-check-fill">
                              </i>
                            </a>
                            <a href="table-data.php?employee_status_id=<?= $employee['id'] ?>" class="btn btn-outline-secondary btn-sm" role="button" title="Status" data-bs-toggle="tooltip">
                              <i class="bi bi-person-dash-fill"></i>
                            </a>
                            <a href="table-data.php?employee_delete_id=<?= $employee['id'] ?>" class="btn btn-outline-danger btn-sm" role="button" title="Delete" data-bs-toggle="tooltip">
                              <i class="bi bi-person-x-fill"></i>
                            </a>
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

<!-- Small modal -->
<div class="modal fade md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Employee Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" id="exampleInfo">
        Modal body..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php require "include/footer.html" ?>