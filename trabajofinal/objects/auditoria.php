<?php
class Auditoria{

    // database connection and table name
    private $conn;
    private $table_name = "auditoria";

    // object properties
    public $auditoria_id;
    public $fecha_acceso;
    public $user;
    public $response_time;
    public $endpoint;
    public $created;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function read(){

        // select all query
        $query = "SELECT * FROM " . $this->table_name . "";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function search($keywords){

        // select all query
        $query = "SELECT
              *
          FROM
              " . $this->table_name . "
          WHERE
              user LIKE ? OR fecha_acceso LIKE ? OR endpoint LIKE ?
          ORDER BY
              created DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
      }
}
