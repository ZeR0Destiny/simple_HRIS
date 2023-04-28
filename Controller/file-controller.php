<?php 

$database = new DB_Manager();

// if (isset($_FILES['fileUpload'])) {
//     // get the uploaded file
//     $pdf_file = $_FILES['fileUpload']['name'];
//     $pdf_data = file_get_contents($_FILES['fileUpload']['tmp_name']);
//     $display_name = $_POST['displayName'];

//     $result = $database->check_if_file_exists($pdf_file);

//     if ($result) {
//         $response = array('success' => false, 'message' => 'File already exists in the database.');
//     } else {
//         $database->insert_file_data($display_name, $pdf_file, $pdf_data);

//         $response = array('success' => true, 'message' => 'File uploaded successfully.');
//     }

//     // if ($response['success']) {
//     //     echo "<script>toastr.success('{$response['message']}')</script>";
//     // } else {
//     //     echo "<script>toastr.error('{$response['message']}')</script>";
//     // }
//     header('Content-Type: application/json');
//     echo json_encode($response);
// }
if (isset($_FILES['fileUpload'])) {
    // get the uploaded file
    $pdf_file = $_FILES['fileUpload']['name'];
    $pdf_data = file_get_contents($_FILES['fileUpload']['tmp_name']);
    $display_name = $_POST['displayName'];

    $result = $database->check_if_file_exists($pdf_file);

    if ($result) {
        $response = array('success' => false, 'message' => 'File already exists in the database.');
    } else {
        $database->insert_file_data($display_name, $pdf_file, $pdf_data);

        $response = array('success' => true, 'message' => 'File uploaded successfully.');
    }

    header('Content-Type: application/json');

    echo json_encode($response);
    exit;
}


?>
