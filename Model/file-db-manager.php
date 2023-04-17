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

    public function get_file_employee()
    {
        $query = $this->db->query("SELECT employee.id, employee.firstname, employee.lastname, employee.UID, COUNT(pdf_filess.UID) as count FROM employee 
        LEFT JOIN pdf_filess ON employee.UID = pdf_filess.UID GROUP BY employee.UID ORDER BY id;");

        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }
}
