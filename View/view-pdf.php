<?php
require_once "../Model/file-db-manager.php";

$database = new File_DB_Manager();

if (isset($_GET['id'])) {
    $result = $database->select_file($_GET['id']);

    // set the HTTP headers to display the PDF file in the browser
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=" . $result['filename']);
    header("Content-length: " . strlen($result['filedata']));

    // output the PDF file data
    echo $result['filedata'];
}
