<?php
require_once "../HRIS/Model/file-db-manager.php";

$database = new File_DB_Manager();

// Verify file type and check if file aleady exist, then upload if all condition are true
if (isset($_FILES['fileUpload'])) {
    // get the uploaded file
    $pdf_file = $_FILES['fileUpload']['name'];
    $pdf_type = $_FILES['fileUpload']['type'];
    $pdf_data = file_get_contents($_FILES['fileUpload']['tmp_name']);
    $display_name = $_POST['displayName'];

    // check for file type
    if ($pdf_type != 'application/pdf') {
        $response = array('success' => false, 'message' => 'File type not supported. Only PDF files are allowed.');
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $result = $database->check_if_file_exists($pdf_file);

    if ($result) {
        $response = array('success' => false, 'message' => 'File already exists in the database.');
    } else {
        $database->insert_file_data($display_name, $pdf_file, $pdf_data);

        $response = array('success' => true, 'message' => 'File uploaded successfully.');
    }

    // set the expected header format as JSON
    header('Content-Type: application/json');
    
    // converts the response to JSON format
    echo json_encode($response); 
    exit;
}

// if (isset($_GET['id'])) {
//     $result = $database->select_file($_GET['id']);

//     // set the HTTP headers to display the PDF file in the browser
//     header("Content-type: application/pdf");
//     header("Content-Disposition: inline; filename=" . $result['filename']);
//     header("Content-length: " . strlen($result['filedata']));

//     // output the PDF file data
//     echo $result['filedata'];
// }

if (isset($_GET['file_delete_id'])) {
    $database->delete_file();
    $database->reset_auto_increment_files();
}
