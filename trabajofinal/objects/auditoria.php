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

    // constructor with $db as database connectionz
    public function __construct($db){
        $this->conn = $db;
    }

    function create(){

      $query = "INSERT INTO
                  " . $this->table_name . "
              SET
                  fecha_acceso=:fecha_acceso, user=:user, response_time=:response_time, endpoint=:endpoint, created=:created";

      //$query = "INSERT INTO auditoria (fecha_acceso,user,response_time,endpoint) values (NOW(),'lala',23,'/chofer/read')";
      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // sanitize
      $this->fecha_acceso=strip_tags($this->fecha_acceso);
      $this->user=strip_tags($this->user);
      $this->response_time=strip_tags($this->response_time);
      $this->endpoint=strip_tags($this->endpoint);
      $this->created=strip_tags($this->created);

      // bind values
      $stmt->bindParam(":fecha_acceso", $this->fecha_acceso);
      $stmt->bindParam(":user", $this->user);
      $stmt->bindParam(":response_time", $this->response_time);
      $stmt->bindParam(":endpoint", $this->endpoint);
      $stmt->bindParam(":created", $this->created);
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
