<?php
require_once "../HRIS/Model/db-manager.php";

$database = new DB_Manager();

if (isset($_POST["emp_id"])) {

    $output = '';

    // $connect = mysqli_connect("localhost", "root", "", "RFBT");
    // $query = "SELECT * FROM employee WHERE id = '" . $_POST["emp_id"] . "'";
    // $result = mysqli_query($connect, $query);
    $emp = $database->select_employee($_POST["emp_id"]);

    $output .= '  
        <h5>Personal Information</h5>
        <div class="table-responsive">  
            <table class="table table-bordered">';
    // while ($emp = mysqli_fetch_array($result)) {
    $output .= '  
                <tr>  
                    <td><label>First Name</label></td>  
                    <td>' . $emp["firstname"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Last Name</label></td>  
                     <td>' . $emp["lastname"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Gender</label></td>  
                    <td>' . $emp["gender"] . '</td>  
                </tr>
                <tr>  
                    <td><label>Birthdate</label></td>  
                    <td>' . $emp["birthdate"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Address</label></td>  
                    <td>' . $emp["address"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>City</label></td>  
                    <td>' . $emp["city"] . '</td>  
                </tr>
                <tr>  
                    <td><label>Province</label></td>  
                    <td>' . $emp["province"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Country</label></td>  
                    <td>' . $emp["country"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Postal Code</label></td>  
                    <td>' . $emp["postalcode"] . '</td>  
                </tr> 
                <tr>  
                    <td><label>Email</label></td>  
                    <td>' . $emp["email"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Mobile</label></td>  
                    <td>' . $emp["mobile"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Homephone</label></td>  
                    <td>' . $emp["homephone"] . '</td>  
                </tr>';
    $output .= "</table></div>";
    $output .= '  
                <h5>Work Information</h5>
                <div class="table-responsive">  
                    <table class="table table-bordered">';
    $output .= '<tr>  
                    <td><label>SIN</label></td>  
                    <td>' . $emp["SIN"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>UID</label></td>  
                    <td>' . $emp["UID"] . '</td>  
                </tr>  
                <tr>  
                    <td><label>Position</label></td>  
                    <td>' . $emp["position"] . '</td>  
                </tr>
                <tr>  
                      <td><label>Payclass</label></td>  
                      <td>' . $emp["payclass"] . '</td>  
                 </tr>  
                 <tr>  
                      <td><label>Supervisor</label></td>  
                      <td>' . $emp["supervisor"] . '</td>  
                 </tr>  
                 <tr>  
                      <td><label>Status</label></td>  
                      <td>' . $emp["status"] . '</td>  
                 </tr>
                 <tr>  
                      <td><label>Access</label></td>  
                      <td>' . $emp["access"] . '</td>  
                 </tr>  
                 <tr>  
                      <td><label>Region</label></td>  
                      <td>' . $emp["region"] . '</td>  
                 </tr>        
                 ';
    // }
    $output .= "</table></div>";
    echo $output;
}
