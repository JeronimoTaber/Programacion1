<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Database{


    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "transporte";
    private $username = "root";
    private $password = "root";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Tells PDO to throw exceptions
        }catch(PDOException $exception){
           echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
