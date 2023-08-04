<?php
class File_DB_Manager
{
    private $db;

    //Connection to the database
    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "rfbt";

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

    // Join table employee and employee, then select and count the number of files per employee
    public function select_and_count_all_employee_file()
    {
        $stmt = $this->db->query("SELECT employee.id, employee.firstname, employee.lastname, employee.UID, COUNT(employee_files.UID) as count FROM employee 
        LEFT JOIN employee_files ON employee.UID = employee_files.UID GROUP BY employee.UID ORDER BY id;");

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Select file with associated unique id
    public function select_file_with_uid($uid)
    {
        $stmt = $this->db->prepare("SELECT * FROM employee_files WHERE UID = :uid");
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Select file with associated filename
    function check_if_file_exists($filename)
    {
        $sql = "SELECT * FROM employee_files WHERE filename=:filename";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':filename', $filename);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Insert file into the database
    function insert_file_data($display_name, $filename, $filedata, $category)
    {
        $employeeUID = $_POST['employeeUID'];

        $sql = "INSERT INTO employee_files (display_name, filename, filedata, UID, category) VALUES (:display_name, :filename, :filedata, :uid, :category)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':display_name', $display_name);
        $stmt->bindParam(':filename', $filename);
        $stmt->bindParam(':filedata', $filedata, PDO::PARAM_LOB);
        $stmt->bindParam(':uid', $employeeUID);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
    }

    // Select the file with the id
    function select_file($id)
    {
        // get the PDF file data from the database
        $sql = "SELECT * FROM employee_files WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Function to delete file from database
    function delete_file()
    {
        $file_delete_id = $_GET['file_delete_id'];
        $sql = "DELETE FROM employee_files WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $file_delete_id);
        $stmt->execute();
    }

    // Function to reset auto increment of employee_files table
    public function reset_auto_increment_files()
    {
        $sql = $this->db->prepare('SELECT @num := 0;');
        $sql->execute();

        $sql = $this->db->prepare('UPDATE employee_files SET id = @num := (@num+1);');
        $sql->execute();

        $sql = $this->db->prepare('ALTER TABLE employee_files AUTO_INCREMENT = 1;');
        $sql->execute();
    }
}
