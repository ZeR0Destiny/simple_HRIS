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

    public function all_users()
    {
        $stmt = $this->db->query("SELECT * FROM user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to delete the select user
    public function delete_user($user_id)
    {
        $sql = "DELETE FROM user WHERE id = :id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $user_id);
        $result = $stmt->execute();

        if ($result) {
            header("location: table-user.php?user-deleted");
        }
    }

    // Function to reset auto increment of user table
    public function reset_auto_increment()
    {
        $sql = $this->db->prepare('SELECT @num := 0;');
        $sql->execute();

        $sql = $this->db->prepare('UPDATE user SET id = @num := (@num+1);');
        $sql->execute();

        $sql = $this->db->prepare('ALTER TABLE user AUTO_INCREMENT = 1;');
        $sql->execute();
    }
}
