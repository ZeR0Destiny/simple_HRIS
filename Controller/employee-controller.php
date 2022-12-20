<?php

// Autoload any classes from the Model folder
spl_autoload_register(function ($class) {
    include_once "../HRIS/Model/" . $class . ".class.php";
});

// Only 1 session needed
session_start();

$database = new DB_Manager();

// Retrieve and validate all input when the submit is clicked
if (isset($_POST['submit'])) {

    // Verify if a SIN already exists
    $valid = $database->sin_check($_POST['sin']);

    if ($valid == true) {
        $_SESSION['valid'] = true;
    } else {

        // $a1 = $_POST['address'];
        // $a2 = $_POST['address2'];
        // $address = $a1 . ' ' . $a2;
        $uniq_id;

        do {
            // Generate a unique id
            $letter = chr(rand(65, 90)) . chr(rand(65, 90));
            $number = rand(1000, 999999);
            $uniq_id = $letter . $number;

            // Verify if unique id already exist
            $valid2 = $database->uid_check($uniq_id);

            if ($valid2 == false) {
                if (isset($_POST['homephone'])) {
                    $homephone = $_POST['homephone'];
                } else {
                    $homephone = "";
                }

                $new_emp = array(
                    "first_name" => $_POST['firstname'],
                    "last_name" => $_POST['lastname'],
                    "birth_date" => $_POST['dob'],
                    "gender" => $_POST['gender'],
                    "address" => $_POST['address'],
                    "city" => $_POST['city'],
                    "province" => $_POST['province'],
                    "country" => $_POST['country'],
                    "postal_code" => $_POST['postalcode'],
                    "email" => $_POST['email'],
                    "mobile" => $_POST['mobile'],
                    "homephone" => $homephone,
                    "sin" => $_POST['sin'],
                    "uid" => $uniq_id,
                    "position" => $_POST['position'],
                    "pay_class" => $_POST['payclass'],
                    "supervisor" => $_POST['supervisor'],
                    "region" => $_POST['region'],
                );

                $employee = new employee($new_emp);
                var_dump($employee);
                // $database->add_employee($employee);
                $_SESSION['success'] = true;
            }
        } while ($valid2 == true);
    }
}
