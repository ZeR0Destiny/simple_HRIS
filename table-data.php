<?php
require_once "../HRIS/Model/employee-db-manager.php";
require_once "../HRIS/Controller/employee-controller.php";
require_once "../HRIS/Controller/account-controller.php";

$database = new DB_Manager();

if (!isset($_SESSION['logged_user'])) {
  header('Location: pages-login.php');
  exit;
}

if (isset($_POST['logout'])) {
  logout();
}

include_once "include/header.php";

?>

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
                  <?php
                  $get_employee = $database->select_all_employee();
                  foreach ($get_employee as $employee) : ?>
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
                      <td width="15%">
                        <div class="row">
                          <div class="col">
                            <button type="button" class="btn btn-outline-dark btn-sm" id="<?= $employee['id'] ?>" title="View" data-bs-toggle="tooltip"><i class="bi bi-person-fill"></i></button>
                            <a href="edit-forms-elements.php?firstname=<?= $employee['firstname'] ?>&lastname=<?= $employee['lastname'] ?>&employee_id=<?= $employee['id'] ?>" class="btn btn-outline-primary btn-sm" role="button" title="Edit" data-bs-toggle="tooltip">
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
<div class="modal fade md"  id="exampleModal" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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

<?php include_once "include/footer.html"; ?>