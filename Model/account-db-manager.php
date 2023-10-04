<?php
class Account_DB_Manager
{
    private $db;

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

    // Function to select user with correct username and password
    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = :username AND password = :password;");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        $result = $stmt->fetch();
    
        if ($result) {
            session_start();
            $_SESSION['logged_user'] = $result;
            return true;
        }
        return false;
    }

    public function register($user)
    {
        $stmt = $this->db->prepare("INSERT INTO user VALUES(DEFAULT, :name, :username, :password);");
        $stmt->execute(array("name" => $user->getName(), "username" => $user->getUsername(), "password" => $user->getPassword()));
    }
}
