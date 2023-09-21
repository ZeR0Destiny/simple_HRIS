<?php

// Autoload any classes from the Model folder
spl_autoload_register(function ($class) {
    require_once "../HRIS/Model/" . $class . ".class.php";
});

// Only 1 session needed
// session_start();

$database = new DB_Manager();

// Retrieve and validate all input when the submit is clicked then call the add function
if (isset($_POST['submit'])) {

    // verify if a SIN already exists
    $valid = $database->check_if_sin_exits($_POST['sin']);

    if ($valid == true) {
        $_SESSION['valid'] = true;
    } else {

        $uniq_id;

        do {
            // generate a unique id
            $letter = chr(rand(65, 90)) . chr(rand(65, 90));
            $number = rand(1000, 999999);
            $uniq_id = $letter . $number;

            // verify if unique id already exist
            $valid_2 = $database->check_if_uid_exits($uniq_id);

            if ($valid_2 == false) {

                date_default_timezone_set("America/Toronto");

                // Check the language that are checked and store in array
                $selectedLanguages = isset($_POST['language']) ? $_POST['language'] : [];

                $languages = implode(', ', $selectedLanguages);

                if (isset($_POST['sin_expiration_checkbox'])) {
                    if (!empty($_POST['sin_expiration'])) {
                        $date = $_POST['sin_expiration'];
                    } else {
                        $date = 'N/A';
                    }
                } else {
                    $date = 'N/A';
                }


                $new_emp = array(
                    "firstname" => ucwords($_POST['firstname']),
                    "middlename" => ucwords($_POST['middlename']),
                    "lastname" => ucwords($_POST['lastname']),
                    "preferredname" => ucwords($_POST['preferredname']),
                    "gender" => $_POST['gender'],
                    "birth_date" => $_POST['dob'],
                    "country" => $_POST['country'],
                    "province" => $_POST['province'],
                    "city" => ucwords($_POST['city']),
                    "address" => ucwords($_POST['address']),
                    "unit" => $_POST['unit'],
                    "postal_code" => strtoupper($_POST['postalcode']),
                    "email" => $_POST['email'],
                    "mobile" => $_POST['mobile'],
                    "homephone" => $_POST['homephone'],
                    "sin" => $_POST['sin'],
                    "sin_expiration" => $date,
                    "uid" => $uniq_id,
                    "position" => ucwords($_POST['position']),
                    "pay_class" => $_POST['payclass'],
                    "region" => $_POST['region'],
                    "home_store" => $_POST['home_store'],
                    "language" => $languages,
                    "start_date" => date("Y-m-d")
                );

                // array is store in the employee class
                $employee = new employee($new_emp);
                // var_dump($employee);
                $database->add_employee($employee);
                $_SESSION['success'] = true;
            }
        } while ($valid_2 == true);
    }
}

// Retrieve information from the inputs and update the employee information
if (isset($_POST['update'])) {
    $database->update_employee($_GET['employee_id']);
}

// Retrieve the id of the employee and call the update status function
if (isset($_GET['employee_status_id'])) {
    $database->update_employee_status();
}

// Retrieve the id of the employee then call the delete and reset increment function
if (isset($_GET['employee_delete_id'])) {
    $database->delete_employee();
    $database->reset_auto_increment();
}
