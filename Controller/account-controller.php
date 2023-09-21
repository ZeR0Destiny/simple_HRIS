<?php
require_once "../HRIS/Model/account-db-manager.php";

session_start();

$database = new Account_DB_Manager();

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: pages-login.php?Logout");
}