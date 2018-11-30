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
                (fecha_acceso,user,response_time,endpoint)
                values
                (NOW(),'pepe',100,'/auditoria')";
      //$query = "INSERT INTO auditoria (fecha_acceso,user,response_time,endpoint) values (NOW(),'lala',23,'/chofer/read')";
      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // sanitize
      $this->user=strip_tags($this->fecha_acceso));
      $this->datos=strip_tags($this->user));
      $this->datos=strip_tags($this->time));
      $this->datos=strip_tags($this->page));
      $this->datos=strip_tags($this->created));

      // bind values
      $stmt->bindParam(":user", $this->user);
      $stmt->bindParam(":datos", $this->datos);

      $stmt->execute();

      return $stmt;
    }

    function read(){

        // select all query
        $query = "INSERT INTO auditoria (fecha_acceso,user,response_time,endpoint) values (NOW(),'pepe',100,'/auditoria') /*ON DUPLICATE KEY UPDATE fecha_acceso=NOW(), response_time=100, endpoint=/chofer/read*/";
        //$query = "INSERT INTO auditoria (fecha_acceso,user,response_time,endpoint) values (NOW(),'lala',23,'/chofer/read')";
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->user=htmlspecialchars(strip_tags($this->user));
        $this->datos=htmlspecialchars(strip_tags($this->datos));

        // bind values
        $stmt->bindParam(":user", $this->user);
        $stmt->bindParam(":datos", $this->datos);

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
