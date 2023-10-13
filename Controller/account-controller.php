<?php
require_once "../HRIS/Model/account-db-manager.php";

// Autoload any classes from the Model folder
spl_autoload_register(function ($class) {
    require_once "../HRIS/Model/" . $class . ".class.php";
});

session_start();

$database = new Account_DB_Manager();

// When the login is clicked will verify the result of the login function and redirect to the correct pages
if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($database->login($username, $password)) {
        header("Location: index.php");
        exit;
    } else {
        header("Location: pages-login.php");
        exit;
    }
}

// Function to logout and destroy the session
function logout()
{
    session_destroy();
    header('Location: pages-login.php');
    exit;
}

if (isset($_POST["register"])) {
    if (isset($_POST['terms'])) {
        $new_user = array("name" => ucwords($_POST["name"]), "username" => $_POST["username"], "password" => $_POST["password"]);

        $user = new user($new_user);

        $database->register($user);
    }
}
