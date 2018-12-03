<?php
class Sistema_vehiculo{

    // database connection and table name
    private $conn;
    private $table_name = "sistema_vehiculo";
    private $table_name_vehi = "vehiculo";

    // object properties
    public $sistemavehiculo_id;
    public $vehiculo_id;
    public $sistema_id;
    public $created;
    public $updated;
    public $patente;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products

    function create(){

      $query2 = "SELECT vehiculo_id FROM (" . $this->table_name_vehi . ") WHERE patente=:patente";
      // prepare query statement

      // prepare query
      $stmt2 = $this->conn->prepare($query2);

      // sanitize
      $this->patente=strip_tags($this->patente);
      echo json_encode($this->patente);
      // bind value
      $stmt2->bindParam(":patente", $this->patente);

      // execute query
      $stmt2->execute();

      $data = $stmt2->fetch(PDO::FETCH_ASSOC);

      $this->vehiculo_id = $data["vehiculo_id"];
      //echo json_encode($data["vehiculo_id"]);


        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        //$this->vehiculo_id=strip_tags($this->vehiculo_id);
        $this->sistema_id=strip_tags($this->sistema_id);
        $this->created=strip_tags($this->created);

        // bind values
        $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt->bindParam(":sistema_id", $this->sistema_id);
        $stmt->bindParam(":created", $this->created);


        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE vehiculo_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->vehiculo_id=strip_tags($this->vehiculo_id);

        // bind id of record to delete
        $stmt->bindParam(1, $this->vehiculo_id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    function deletesis(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE sistema_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->sistema_id=strip_tags($this->sistema_id);

        // bind id of record to delete
        $stmt->bindParam(1, $this->sistema_id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    function update(){

        // update query
        $query = "UPDATE
                    (" . $this->table_name . ")
                SET
                sistema_id = :sistema_id
                WHERE
                    vehiculo_id = :vehiculo_id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->vehiculo_id=strip_tags($this->vehiculo_id);
        $this->sistema_id=strip_tags($this->sistema_id);

        // bind values
        $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt->bindParam(":sistema_id", $this->sistema_id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
