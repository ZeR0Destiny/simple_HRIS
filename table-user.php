<?php
require_once "../HRIS/Controller/account-controller.php";

$database = new Account_DB_Manager();

$get_users = $database->all_users();

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
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="col-lg justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="dataTable-container">
                        <table id="user_table" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($get_users as $a_user) : ?>
                                    <tr name="p_id">
                                        <td width="3%"><?= $a_user['id'] ?></td>
                                        <td><?= $a_user['name'] ?></td>
                                        <td><?= $a_user['username'] ?></td>
                                        <td><?= $a_user['password'] ?></td>
                                        <td>
                                            <div>
                                                <form action="" method="post">
                                                    <button type="button" class="btn btn-outline-dark btn-sm" id="<?= $a_user['id'] ?>" title="View" data-bs-toggle="tooltip"><i class="bi bi-pencil-fill"></i></button>
                                                    <?php if ($a_user['name'] != 'Admin') { ?>
                                                        <a href="table-user.php?user_ID=<?= $a_user['id'] ?>" class="btn btn-outline-danger btn-sm" role="button" title="Delete" data-bs-toggle="tooltip">
                                                        <i class="bi bi-x-circle-fill"></i>
                                                    </a>
                                                    <?php } ?>
                                                </form>
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
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="post" id="uploadForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">New Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="changePassword" class="form-label">New Password</label>
                        <input type="text" class="form-control" id="changePassword" name="changePassword" required>
                    </div>
                    <input type="hidden" name="employeeUID" value="employeeUID" id="employeeUID">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "include/footer.html"; ?>