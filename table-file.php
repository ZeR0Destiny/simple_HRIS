<?php
require "include/header.html";

require "../HRIS/Model/file-db-manager.php";

$database = new DB_Manager();

$get_file_employee = $database->get_file_employee();

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form action="" method="post">
            <div class="col-lg justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="dataTable-container">
                            <table id="emp_table" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>UID</th>
                                        <th>Total Files</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_file_employee as $file_employee) : ?>
                                        <tr name="p_id">
                                            <td width="3%"><?= $file_employee['id'] ?></td>
                                            <td><?= $file_employee['firstname'] . ' ' . $file_employee['lastname'] ?></td>
                                            <td><?= $file_employee['UID'] ?></td>
                                            <td width="10%"><?= $file_employee['count'] ?></td>
                                            <td width="12%">
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-outline-dark btn-sm" id="<?= $employee['id'] ?>" title="View" data-bs-toggle="tooltip"><i class="bi bi-person-fill"></i></button>
                                                        <a href="edit-forms-elements.php?employee_id=<?= $employee['id'] ?>" class="btn btn-outline-primary btn-sm" role="button" title="Edit" data-bs-toggle="tooltip">
                                                            <i class="bi bi-person-check-fill">
                                                            </i>
                                                        </a>
                                                        <a href="tables-data.php?employee_status_id=<?= $employee['id'] ?>" class="btn btn-outline-secondary btn-sm" role="button" title="Status" data-bs-toggle="tooltip">
                                                            <i class="bi bi-person-dash-fill"></i>
                                                        </a>
                                                        <a href="tables-data.php?employee_delete_id=<?= $employee['id'] ?>" class="btn btn-outline-danger btn-sm" role="button" title="Delete" data-bs-toggle="tooltip">
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

<?php require "include/footer.html" ?>