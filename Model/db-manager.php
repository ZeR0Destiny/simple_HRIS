<?php
class DB_Manager
{
    private $db;

    //Connection to the database
    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "RFBT";

        //try to connect to the database using the provided credentials
        //if the connection works, it will keep the persistence, else it will throw an error
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            //To see if there is any Mysql errors
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }

    // Function to select all the employee from the table
    public function get_all()
    {
        $query = $this->db->query("SELECT * FROM employee");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    // Function to insert a new employee to database
    public function add_employee($employee)
    {
        $query = $this->db->prepare("INSERT INTO employee 
        VALUES (DEFAULT, :firstname, :lastname, :gender, :birthdate, :address, 
        :city, :province, :country, :postalcode, :email, :mobile, :homephone, :SIN, :UID, 
        :position, :payclass, :supervisor, DEFAULT, DEFAULT, :region)");

        $result = $query->execute(array(
            "firstname" => $employee->getFirstname(),
            "lastname" => $employee->getLastname(),
            "gender" => $employee->getGender(),
            "birthdate" => $employee->getBirthdate(),
            "address" => $employee->getAddress(),
            "city" => $employee->getCity(),
            "province" => $employee->getProvince(),
            "country" => $employee->getCountry(),
            "postalcode" => $employee->getPostalcode(),
            "email" => $employee->getEmail(),
            "mobile" => $employee->getMobile(),
            "homephone" => $employee->getHomephone(),
            "SIN" => $employee->getSin(),
            "UID" => $employee->getUID(),
            "position" => $employee->getPosition(),
            "payclass" => $employee->getPayclass(),
            "supervisor" => $employee->getSupervisor(),
            "region" => $employee->getRegion()
        ));

        if ($result) {
            header("location: forms-elements.php?employee-created");
        }
    }

    // Function to select an existing SIN and return true or false
    public function sin_check($sin)
    {
        $query = $this->db->prepare("SELECT * FROM employee WHERE SIN = :SIN;");
        $query->execute(array("SIN" => $sin));

        if ($query->fetch() == true) {
            $valid = true;
        } else {
            $valid = false;
        }

        return $valid;
    }

    // Function to select an existing unique id and return true or false
    public function uid_check($uid)
    {
        $query = $this->db->prepare("SELECT * FROM employee WHERE UID = :UID;");
        $query->execute(array("UID" => $uid));

        if ($query->fetch() == true) {
            $valid = true;
        } else {
            $valid = false;
        }

        return $valid;
    }

    // Function to select the employee information based on the id
    public function select_employee($id)
    {
        $query = $this->db->query("SELECT * FROM employee WHERE id = $id;");
        $array = $query->fetch(PDO::FETCH_ASSOC);

        return $array;
    }

    // Function to update the information of the employee
    public function update_employee($id)
    {
        $query = $this->db->prepare("UPDATE employee 
        SET firstname = :firstname, lastname = :lastname, gender = :gender, birthdate = :birthdate, 
        address = :address, city = :city, province = :province, country = :country, postalcode =:postalcode, 
        email = :email, mobile = :mobile, homephone = :homephone,
        position = :position, payclass = :payclass, supervisor = :supervisor, region = :region WHERE id = $id");

        if (isset($_POST['homephone'])) {
            $homephone = $_POST['homephone'];
        } else {
            $homephone = "";
        }

        $result = $query->execute(array(
            "firstname" => ucwords($_POST['firstname']),
            "lastname" => ucwords($_POST['lastname']),
            "birthdate" => $_POST['dob'],
            "gender" => $_POST['gender'],
            "address" => ucwords($_POST['address']),
            "city" => ucwords($_POST['city']),
            "province" => ucwords($_POST['province']),
            "country" => $_POST['country'],
            "postalcode" => $_POST['postalcode'],
            "email" => $_POST['email'],
            "mobile" => $_POST['mobile'],
            "homephone" => $homephone,
            "position" => ucwords($_POST['position']),
            "payclass" => $_POST['payclass'],
            "supervisor" => ucwords($_POST['supervisor']),
            "region" => ucwords($_POST['region'])
        ));

        if ($result) {
            header("location: tables-data.php?employee-information-updated");
        }
    }

    // Function to quickly change the status of the employee
    public function update_employee_status()
    {
        $query = $this->db->prepare("UPDATE employee SET status = 'Inactive' WHERE id = ?;");
        $result = $query->execute(array($_GET['employee_status_id']));

        if ($result) {
            header("location: tables-data.php?employee-status-changed");
        }
    }

    public function delete_employee()
    {
        $query = $this->db->prepare("DELETE FROM employee WHERE id = ?; ");
        $result = $query->execute(array($_GET['employee_delete_id']));

        if ($result) {
            header("location: tables-data.php?employee-deleted");
        }
    }

    public function set_auto_increment()
    {
        if (isset($_GET["employee_delete_id"])) {
            // $id = $_GET["employee_delete_id"];
            $sql = 'SET @num := 0; 
            UPDATE employee SET id = @num := (@num+1); 
            ALTER TABLE employee AUTO_INCREMENT = 1;';
            $nu = 0;
            $conn = $this->db->prepare('UPDATE employee SET id = ' . $nu . ':= (' . $nu + 1 . ');');
            $conn->execute();

            // $conn2 = $this->db->query("ALTER TABLE employee AUTO_INCREMENT = 1;");
            // $conn2->fetch();


            //Delete the line
            // $sql = "DELETE FROM user WHERE userid=$id";
            // if ($conn->query($sql) == TRUE) {
            //     echo "Record delete succesfully<br>";
            // } else {
            //     // echo "Error delete record: " . $conn->error;
            // }

            // //Reset and Update line by line start from 1 and increament by 1 at id
            // $query = mysqli_query($conn, "select * from user");
            // $number = 1;
            // while ($row = mysqli_fetch_array($query)) {
            //     $id = $row['userid']; //PLEASE CHANGE ACCORDING TO YOUR DATABASE AUTO-INCREAMENT ID
            //     $sql = "UPDATE user SET userid=$number WHERE userid=$id";
            //     if ($conn->query($sql) == TRUE) {
            //         echo "Record RESET succesfully<br>";
            //     }
            //     $number++;
            // }
            // //Alter the increment to the latest number(bigger number)
            // $sql = "ALTER TABLE user AUTO_INCREMENT =1"; //CHANGE TABLE NAME
            // if ($conn->query($sql) == TRUE) {
            //     echo "Record ALTER succesfully";
            // } else {
            //     // echo "Error ALTER record: " . $conn->error;
            // }
        }
    }
}
