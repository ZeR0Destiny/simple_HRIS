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

    // Function to insert a new employee to the table
    public function add_employee($employee)
    {
        $query = $this->db->prepare("INSERT INTO employee 
        VALUES (DEFAULT, :firstname, :lastname, :gender, :birthdate, :address, 
        :city, :province, :country, :postalcode, :email, :mobile, :homephone, :SIN, :UID, 
        :position, :payclass, :supervisor, DEFAULT, DEFAULT, :region)");

        $query->execute(array(
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
    }

    // Function to verify an existing SIN and return true or false
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

    // 
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

    public function update_employee($id)
    {

        //query to update database
        unset($_POST['level']);
        $query = $this->db->prepare("UPDATE users SET id= :id, name=:name,lastname=:lastname,username=:username, 
avatar = :avatar, email=:email,password=:password WHERE id = $id;");

        $query = $this->db->prepare("UPDATE employee 
        SET firstname = :firstname, lastname = :lastname, gender = :gender, birthdate = :birthdate, 
        address = :address, city = :city, province = :province, country = :country, postalcode =:postalcode, 
        email = :email, mobile = :mobile, homephone = :homephone, SIN = :SIN, 
        position = :position, payclass = :payclass, supervisor = :supervisor, region = :region WHERE id = $id");

        // $query->execute(array(
        //     "firstname" => $employee->getFirstname(),
        //     "lastname" => $employee->getLastname(),
        //     "gender" => $employee->getGender(),
        //     "birthdate" => $employee->getBirthdate(),
        //     "address" => $employee->getAddress(),
        //     "city" => $employee->getCity(),
        //     "province" => $employee->getProvince(),
        //     "country" => $employee->getCountry(),
        //     "postalcode" => $employee->getPostalcode(),
        //     "email" => $employee->getEmail(),
        //     "mobile" => $employee->getMobile(),
        //     "homephone" => $employee->getHomephone(),
        //     "SIN" => $employee->getSin(),
        //     "UID" => $employee->getUID(),
        //     "position" => $employee->getPosition(),
        //     "payclass" => $employee->getPayclass(),
        //     "supervisor" => $employee->getSupervisor(),
        //     "region" => $employee->getRegion()
        // ));
    }
}
