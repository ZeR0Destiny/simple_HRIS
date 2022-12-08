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

    // 
    public function sin_check($sin)
    {
        $query = $this->db->prepare("SELECT * FROM employee WHERE sin = :sin;");
        $query->execute(array("sin" => $sin));

        if ($query->fetch() == true) {
            $valid = true;
        } else {
            $valid = false;
        }

        return $valid;
    }

    public function uid_check($uid)
    {
    }
}
