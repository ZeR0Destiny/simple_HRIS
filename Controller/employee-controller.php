<?php

// Autoload any classes from the Model folder
spl_autoload_register(function ($class) {
    require_once "../HRIS/Model/" . $class . ".class.php";
});

// Only 1 session needed
session_start();

$database = new DB_Manager();

// Retrieve and validate all input when the submit is clicked then call the add function
if (isset($_POST['submit'])) {

    // Verify if a SIN already exists
    $valid = $database->sin_check($_POST['sin']);

    if ($valid == true) {
        $_SESSION['valid'] = true;
    } else {

        $uniq_id;

        do {
            // Generate a unique id
            $letter = chr(rand(65, 90)) . chr(rand(65, 90));
            $number = rand(1000, 999999);
            $uniq_id = $letter . $number;

            // Verify if unique id already exist
            $valid_2 = $database->uid_check($uniq_id);

            if ($valid_2 == false) {
                if (isset($_POST['homephone'])) {
                    $homephone = $_POST['homephone'];
                } else {
                    $homephone = "";
                }

                date_default_timezone_set("America/Toronto");

                $new_emp = array(
                    "firstname" => ucwords($_POST['firstname']),
                    "lastname" => ucwords($_POST['lastname']),
                    "birth_date" => $_POST['dob'],
                    "gender" => $_POST['gender'],
                    "address" => ucwords($_POST['address']),
                    "city" => ucwords($_POST['city']),
                    "province" => ucwords($_POST['province']),
                    "country" => $_POST['country'],
                    "postal_code" => strtoupper($_POST['postalcode']),
                    "email" => $_POST['email'],
                    "mobile" => $_POST['mobile'],
                    "homephone" => $homephone,
                    "sin" => $_POST['sin'],
                    "uid" => $uniq_id,
                    "position" => ucwords($_POST['position']),
                    "pay_class" => $_POST['payclass'],
                    "supervisor" => ucwords($_POST['supervisor']),
                    "region" => ucwords($_POST['region']),
                    "start_date" => date("Y-m-d")
                );

                // Array is store in the employee class
                $employee = new employee($new_emp);
                // var_dump($employee);
                $database->add_employee($employee);
                $_SESSION['success'] = true;
            }
        } while ($valid_2 == true);
    }
}

// Retrieve information from the inputs when the update button is clicked
if (isset($_POST['update'])) {
    $database->update_employee($_GET['employee_id']);
}

// Retrieve the id of the employee and call the update function
if (isset($_GET['employee_status_id'])) {
    $database->update_employee_status();
}

// Retrieve the id of the employee then call the delete and auto_increment function
if (isset($_GET['employee_delete_id'])) {
    $database->delete_employee();
    $database->reset_auto_increment();
}
