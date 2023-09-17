<?php
require_once "Controller/file-manager-controller.php";

if (isset($_GET['employee_UID'])) {
    $uid = $_GET['employee_UID'];
} else {
    $uid = 0;
}

include "include/header.html";

?>

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
        <div class="col-lg justify-content-center">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <div class="card-body" style="padding: 5px;">
                            <li>
                                <button class="btn btn-outline-dark" name="SingleUpload" title="Upload" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="bi bi-file-earmark-arrow-up-fill"></i></button>
                            </li>
                        </div>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false"><i class="bi bi-house-door-fill"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="benefit-tab" data-bs-toggle="tab" data-bs-target="#benefit" type="button" role="tab" aria-controls="benefit" aria-selected="false" data-category="BEN">Benefits</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical" type="button" role="tab" aria-controls="medical" aria-selected="false" data-category="MED">Medical</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="discipline-tab" data-bs-toggle="tab" data-bs-target="#discipline" type="button" role="tab" aria-controls="discipline" aria-selected="false" data-category="DCP">Discipline Record</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="hiring-tab" data-bs-toggle="tab" data-bs-target="#hiring" type="button" role="tab" aria-controls="hiring" aria-selected="false" data-category="HIR">Hiring</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="immigration-tab" data-bs-toggle="tab" data-bs-target="#immigration" type="button" role="tab" aria-controls="immigration" aria-selected="false" data-category="IMG">Immigration</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="investigation-tab" data-bs-toggle="tab" data-bs-target="#investigation" type="button" role="tab" aria-controls="investigation" aria-selected="false" data-category="INV">Investigation</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="false" data-category="PSF">Personal File</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="training-tab" data-bs-toggle="tab" data-bs-target="#training" type="button" role="tab" aria-controls="training" aria-selected="false" data-category="TRN">Training Package</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Unclassified-tab" data-bs-toggle="tab" data-bs-target="#unclassified" type="button" role="tab" aria-controls="unclassified" aria-selected="false" data-category="UNC">Unclassified</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="work-tab" data-bs-toggle="tab" data-bs-target="#work" type="button" role="tab" aria-controls="work" aria-selected="false" data-category="WKE">Work Eligibility</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
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
                                            $get_files = $database->select_file_with_uid($uid);
                                            $count = 1;
                                            foreach ($get_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="benefit" role="tabpanel" aria-labelledby="benefit-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_benefit" class="table table-striped table-bordered" width="100%">
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
                                            $benefit_files = $database->benefits($uid);
                                            $count = 1;
                                            foreach ($benefit_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="medical" role="tabpanel" aria-labelledby="medical-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_medical" class="table table-striped table-bordered" width="100%">
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
                                            $medical_files = $database->medical($uid);
                                            $count = 1;
                                            foreach ($medical_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="discipline" role="tabpanel" aria-labelledby="discipline-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_discipline" class="table table-striped table-bordered" width="100%">
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
                                            $discipline_files = $database->discipline($uid);
                                            $count = 1;
                                            foreach ($discipline_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="hiring" role="tabpanel" aria-labelledby="hiring-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_hiring" class="table table-striped table-bordered" width="100%">
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
                                            $hiring_files = $database->hiring($uid);
                                            $count = 1;
                                            foreach ($hiring_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="immigration" role="tabpanel" aria-labelledby="immigration-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_immigration" class="table table-striped table-bordered" width="100%">
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
                                            $immigration_files = $database->immigration($uid);
                                            $count = 1;
                                            foreach ($immigration_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="investigation" role="tabpanel" aria-labelledby="investigation-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_investigation" class="table table-striped table-bordered" width="100%">
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
                                            $investigation_files = $database->investigation($uid);
                                            $count = 1;
                                            foreach ($investigation_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_personal" class="table table-striped table-bordered" width="100%">
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
                                            $personal_files = $database->personal($uid);
                                            $count = 1;
                                            foreach ($personal_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_training" class="table table-striped table-bordered" width="100%">
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
                                            $training_files = $database->training($uid);
                                            $count = 1;
                                            foreach ($training_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="unclassified" role="tabpanel" aria-labelledby="unclassified-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_unclassified" class="table table-striped table-bordered" width="100%">
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
                                            $unclassified_files = $database->unclassified($uid);
                                            $count = 1;
                                            foreach ($unclassified_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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
                        <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
                            <div class="card-body">
                                <div class="dataTable-container">
                                    <table id="file_table_work" class="table table-striped table-bordered" width="100%">
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
                                            $work_files = $database->work($uid);
                                            $count = 1;
                                            foreach ($work_files as $files) : ?>
                                                <tr name="p_id">
                                                    <td width="3%"><?= $count++ ?></td>
                                                    <td><?= $files['display_name'] ?></td>
                                                    <td><?= $files['filename'] ?></td>
                                                    <td width="20%"><?= $files['created_at'] ?></td>
                                                    <td width="15%">
                                                        <div class="row justify-content-center">
                                                            <div class="col-auto" style="padding-right: 5px">
                                                                <a href="View/view-pdf.php?employee_UID=<?= $files['UID'] ?>&id=<?= $files['id'] ?>" target="_blank" role="button" class="btn btn-outline-primary btn-sm" title="View" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-check-fill"></i></a>
                                                                <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_download_id=<?= $files['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Download" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                                            </div>
                                                            <div class="col-auto" style="width: fit-content; padding: 0">
                                                                <form action="" method="post">
                                                                    <a href="table-file.php?employee_UID=<?= $files['UID'] ?>&file_delete_id=<?= $files['id'] ?>" role="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-file-earmark-x-fill"></i></a>
                                                                </form>
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

                </div>
            </div>
        </div>
    </section>
</main>

<script src="js/category.js"></script>
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
                    <div class="row mb-3">
                        <label for="inputCategory" class="form-label">Category</label>
                        <div class="col-sm-9">
                            <select id="inputCategory" class="form-select" name="category">
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

<?php include "include/footer.html" ?>