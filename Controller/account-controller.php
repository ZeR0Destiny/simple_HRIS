<?php
require_once "../HRIS/Model/account-db-manager.php";

// Autoload any classes from the Model folder
spl_autoload_register(function ($class) {
    require_once "../HRIS/Model/" . $class . ".class.php";
});

session_start();

$database = new Account_DB_Manager();

// When the login is clicked, it will verify the result of the login function and redirect to the correct pages
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

// When the register is clicked, it will create a new user if the terms is checked
if (isset($_POST["register"])) {
    if (isset($_POST['terms'])) {
        if ($database->verify_existing($_POST["username"], $_POST["password"]) == false) {
            $new_user = array("name" => ucwords($_POST["name"]), "username" => $_POST["username"], "password" => $_POST["password"]);

            $user = new user($new_user);

            $database->register($user);
        } else {
            header("location: pages-register.php?Failed_to_register");
        }
    }
}

if (isset($_GET['user_ID'])) {
    $database->delete_user($_GET['user_ID']);
    $database->reset_auto_increment();
}

if (isset($_POST['submit'])) {
    $userId = $_POST['userId'];
    $password = $_POST['changePassword'];

    $database->change_password($userId, $password);
}
