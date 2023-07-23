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

    // Select all the employee from the table
    public function select_all_employee()
    {
        $query = $this->db->query("SELECT * FROM employee");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Insert a new employee to database
    public function add_employee($employee)
    {
        $query = $this->db->prepare("INSERT INTO employee 
    VALUES (DEFAULT, :firstname, :middlename, :lastname, :preferredname, :gender, :birthdate, 
    :country, :province, :city, :address, 
    :unit, :postalcode, :email, :mobile, :homephone, :SIN, :SIN_expiration, :UID, 
    :position, :payclass, DEFAULT, :region, :home_store, :language, :start_date, DEFAULT)");

        $result = $query->execute(array(
            "firstname" => $employee->getFirstname(),
            "middlename" => $employee->getMiddlename(),
            "lastname" => $employee->getLastname(),
            "preferredname" => $employee->getPreferredname(),
            "gender" => $employee->getGender(),
            "birthdate" => $employee->getBirthdate(),
            "country" => $employee->getCountry(),
            "province" => $employee->getProvince(),
            "city" => $employee->getCity(),
            "address" => $employee->getAddress(),
            "unit" => $employee->getUnit(),
            "postalcode" => $employee->getPostalcode(),
            "email" => $employee->getEmail(),
            "mobile" => $employee->getMobile(),
            "homephone" => $employee->getHomephone(),
            "SIN" => $employee->getSin(),
            "SIN_expiration" => $employee->getSin_expiration(),
            "UID" => $employee->getUID(),
            "position" => $employee->getPosition(),
            "payclass" => $employee->getPayclass(),
            "region" => $employee->getRegion(),
            "home_store" => $employee->getHome_store(),
            "language" => $employee->getLanguage(),
            "start_date" => $employee->getStart_date()
        ));

        if ($result) {
            header("location: table-data.php?employee-created");
        }
    }


    // Select an employee with SIN and validate
    public function check_if_sin_exits($sin)
    {
        $query = $this->db->prepare("SELECT * FROM employee WHERE SIN = :SIN;");
        $query->execute(array("SIN" => $sin));

        if ($query->fetch() == true) {
            return true;
        } else {
            return false;
        }
    }

    // Select an employee with unique id and validate
    public function check_if_uid_exits($uid)
    {
        $query = $this->db->prepare("SELECT * FROM employee WHERE UID = :UID;");
        $query->execute(array("UID" => $uid));

        if ($query->fetch() == true) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    // Select an employee with the id
    public function select_employee($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM employee WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $array = $stmt->fetch(PDO::FETCH_ASSOC);

        return $array;
    }

    // Update the employee at selected id
    public function update_employee($id)
    {
        $sql = "UPDATE employee SET 
        firstname=:firstname, 
        middlename=:middlename,
        lastname=:lastname, 
        preferredname=:preferredname,
        gender=:gender, 
        birthdate=:birthdate,       
        country=:country, 
        province=:province,
        city=:city, 
        address=:address, 
        unit=:unit,       
        postalcode=:postalcode, 
        email=:email, 
        mobile=:mobile, 
        homephone=:homephone, 
        position=:position, 
        payclass=:payclass, 
        status=:status, 
        region=:region, 
        home_store=:home_store, 
        language=:language,
        last_update=NOW() WHERE id=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':firstname', ucwords($_POST['firstname']));
        $stmt->bindParam(':middlename', ucwords($_POST['middlename']));
        $stmt->bindParam(':lastname', ucwords($_POST['lastname']));
        $stmt->bindParam(':preferredname', ucwords($_POST['preferredname']));
        $stmt->bindParam(':gender', $_POST['gender']);
        $stmt->bindParam(':birthdate', $_POST['dob']);
        $stmt->bindParam(':country', $_POST['country']);
        $stmt->bindParam(':province', $_POST['province']);
        $stmt->bindParam(':city', ucwords($_POST['city']));
        $stmt->bindParam(':address', ucwords($_POST['address']));
        $stmt->bindParam(':unit', $_POST['unit']);        
        $stmt->bindParam(':postalcode', $_POST['postalcode']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':mobile', $_POST['mobile']);
        $homephone = isset($_POST['homephone']) ? $_POST['homephone'] : '';
        $stmt->bindParam(':homephone', $homephone);
        $stmt->bindParam(':position', ucwords($_POST['position']));
        $stmt->bindParam(':payclass', $_POST['payclass']);
        $status = isset($_POST['status']) ? 'Active' : 'Inactive';
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':region', ($_POST['region']));
        $stmt->bindParam(':home_store', $_POST['home_store']);

        $selectedLanguages = isset($_POST['language']) ? $_POST['language'] : [];
        $languages = implode(', ', $selectedLanguages);

        $stmt->bindParam(':language', $languages);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();

        if ($result) {
            header("location: table-data.php?employee-information-updated");
        }
    }

    // Function to quickly change the status of the employee
    public function update_employee_status()
    {
        $employee_id = $_GET['employee_status_id'];
        $sql = $this->db->prepare("UPDATE employee SET last_update = IF(status != 'Inactive', NOW(), last_update), status = 'Inactive' WHERE id = :id");
        $sql->bindParam(':id', $employee_id);
        $result = $sql->execute();

        if ($result) {
            header("location: table-data.php?employee-status-changed");
        }
    }

    // Function to delete the select employeee
    public function delete_employee()
    {
        $employee_delete_id = $_GET['employee_delete_id'];
        $sql = "DELETE FROM employee WHERE id = :id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $employee_delete_id);
        $result = $stmt->execute();

        if ($result) {
            header("location: table-data.php?employee-deleted");
        }
    }

    // Function to reset auto increment of employee table
    public function reset_auto_increment()
    {
        $sql = $this->db->prepare('SELECT @num := 0;');
        $sql->execute();

        $sql = $this->db->prepare('UPDATE employee SET id = @num := (@num+1);');
        $sql->execute();

        $sql = $this->db->prepare('ALTER TABLE employee AUTO_INCREMENT = 1;');
        $sql->execute();
    }

    // Function counting and sorting employee per region
    public function employee_per_region()
    {
        $sql = "SELECT region, COUNT(*) AS employee FROM employee GROUP BY region";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function employee_per_position()
    {
        $sql = "SELECT position, COUNT(*) AS employee
        FROM employee
        WHERE position IN ('Cashier/Bartender', 'Store Manager', 'Multi-Unit Manager', 'Regional Manager')
        GROUP BY position";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function employee_per_position_hq()
    {
        $sql = "SELECT position, COUNT(*) AS employee
        FROM employee
        WHERE position NOT IN ('Cashier/Bartender', 'Store Manager', 'Multi-Unit Manager', 'Regional Manager')
        GROUP BY position";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function employee_total()
    {
        $sql = "SELECT COUNT(*) AS employee FROM employee";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function employee_active()
    {
        $sql = "SELECT COUNT(*) AS employee FROM employee WHERE status = 'Active'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function employee_inactive()
    {
        $sql = "SELECT COUNT(*) AS employee FROM employee WHERE status = 'Inactive'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
