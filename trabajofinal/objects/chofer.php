<?php
class Chofer{

    // database connection and table name
    private $conn;
    private $table_name = "chofer";

    // object properties
    public $chofer_id;
    public $apellido;
    public $nombre;
    public $documento;
    public $email;
    public $vehiculo_id;
    public $sistema_id;
    public $created;
    public $updated;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function read(){

        // select all query
        $query = "SELECT
               p.chofer_id, p.apellido, p.nombre, p.documento, p.email, c.vehiculo_id, p.sistema_id, p.created, p.updated, c.patente
            FROM
                (" . $this->table_name . " p)
                INNER JOIN
                vehiculo c
                    ON p.vehiculo_id = c.vehiculo_id
                INNER JOIN
                sistema_transporte d
                    ON p.sistema_id = d.sistema_id
            ORDER BY
                p.created DESC";
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create product
    function create(){

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    apellido=:apellido, nombre=:nombre, documento=:documento, email=:email, vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created";
        $query2 = "SELECT
                    *
                  FROM
                    sistema_vehiculo
                  WHERE
                    vehiculo_id=:vehiculo_id AND sistema_id=:sistema_id";
        // prepare query
        $stmt = $this->conn->prepare($query);
        $stmt2 = $this->conn->prepare($query2);

        // sanitize
        $this->apellido=strip_tags($this->apellido);
        $this->nombre=strip_tags($this->nombre);
        $this->documento=strip_tags($this->documento);
        $this->email=strip_tags($this->email);
        $this->vehiculo_id=strip_tags($this->vehiculo_id);
        $this->sistema_id=strip_tags($this->sistema_id);
        $this->created=strip_tags($this->created);

        // bind values
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":documento", $this->documento);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt->bindParam(":sistema_id", $this->sistema_id);
        $stmt->bindParam(":created", $this->created);
        $stmt2->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt2->bindParam(":sistema_id", $this->sistema_id);
        // execute query
        try{
          $this->conn->beginTransaction();
          $stmt2->execute();
          $num = $stmt2->rowCount();

          // check if more than 0 record found
          if($num==0){
            return false;
          }
          $stmt->execute();

          // execute query
          if($this->conn->commit()){
              return true;
          }
        }catch(Exception $e){
          $this->conn->rollBack();
          return false;
        }

    }

    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                apellido=:apellido, nombre=:nombre, documento=:documento, email=:email, vehiculo_id=:vehiculo_id, sistema_id=:sistema_id
                WHERE
                    chofer_id = :chofer_id";
        $query2 = "SELECT
                      *
                    FROM
                      sistema_vehiculo
                    WHERE
                      vehiculo_id=:vehiculo_id AND sistema_id=:sistema_id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt2 = $this->conn->prepare($query2);

        // sanitize
        $this->apellido=strip_tags($this->apellido);
        $this->nombre=strip_tags($this->nombre);
        $this->documento=strip_tags($this->documento);
        $this->email=strip_tags($this->email);
        $this->vehiculo_id=strip_tags($this->vehiculo_id);
        $this->sistema_id=strip_tags($this->sistema_id);
        $this->chofer_id=strip_tags($this->chofer_id);


        // bind new values
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":documento", $this->documento);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt->bindParam(":sistema_id", $this->sistema_id);
        $stmt->bindParam(":chofer_id", $this->chofer_id);
        $stmt2->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt2->bindParam(":sistema_id", $this->sistema_id);

        $stmt2->execute();
        $num = $stmt2->rowCount();

        // check if more than 0 record found
        if($num==0){
          return false;
        }
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    function search($keywords){

        // select all query
        $query = "SELECT
               p.chofer_id, p.apellido, p.nombre, p.documento, p.email, c.vehiculo_id, p.sistema_id, p.created, p.updated, c.patente
            FROM
                (" . $this->table_name . " p)
                INNER JOIN
                vehiculo c
                    ON p.vehiculo_id = c.vehiculo_id
                INNER JOIN
                sistema_transporte d
                    ON p.sistema_id = d.sistema_id
          WHERE
              p.apellido LIKE ? OR p.nombre LIKE ? OR p.documento LIKE ?
          ORDER BY
              created DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords=strip_tags($keywords);
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
      }
    // delete the product
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE chofer_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->chofer_id=strip_tags($this->chofer_id);

        // bind id of record to delete
        $stmt->bindParam(1, $this->chofer_id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

}
