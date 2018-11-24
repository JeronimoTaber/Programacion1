<?php
class Sistema_transporte{

    // database connection and table name
    private $conn;
    private $table_name = "sistema_transporte";
    private $table_name_vehi = "sistema_vehiculo";

    // object properties
    public $sistema_id;
    public $nombre;
    public $pais_procedencia;
    public $created;
    public $updated;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function read(){
//si se coloca inner en lugar de left muestra solo las compañias que tienen vehiculos regisitrados
        // select all query
        $query = "SELECT
               t.sistema_id, t.nombre, t.pais_procedencia, t.created, t.updated
            FROM
                (" . $this->table_name . " t)
                LEFT JOIN
                sistema_vehiculo s
                    ON t.sistema_id = s.sistema_id
                LEFT JOIN
                vehiculo v
                        ON s.vehiculo_id = v.vehiculo_id
            ORDER BY
                t.created DESC";
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
                    nombre=:nombre, pais_procedencia=:pais_procedencia, created=:created";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nombre=strip_tags($this->nombre);
        $this->pais_procedencia=strip_tags($this->pais_procedencia);
        $this->created=strip_tags($this->created);

        // bind values
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":pais_procedencia", $this->pais_procedencia);
        $stmt->bindParam(":created", $this->created);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                nombre=:nombre, pais_procedencia=:pais_procedencia
                WHERE
                    sistema_id = :sistema_id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nombre=strip_tags($this->nombre);
        $this->pais_procedencia=strip_tags($this->pais_procedencia);
        $this->sistema_id=strip_tags($this->sistema_id);



        // bind new values
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":pais_procedencia", $this->pais_procedencia);
        $stmt->bindParam(":sistema_id", $this->sistema_id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    function search($keywords){

        // select all query
        $query = "SELECT
              *
          FROM
              " . $this->table_name . "
          WHERE
              sistema_id LIKE ? OR nombre LIKE ? OR pais_procedencia LIKE ?
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
        $query = "DELETE FROM " . $this->table_name_vehi . " WHERE sistema_id = ?";
        // delete query
        $query2 = "DELETE FROM " . $this->table_name . " WHERE sistema_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);
        $stmt2 = $this->conn->prepare($query2);

        // sanitize
        $this->sistema_id=strip_tags($this->sistema_id);

        // bind id of record to delete
        $stmt->bindParam(1, $this->sistema_id);
        $stmt2->bindParam(1, $this->sistema_id);

        // execute query
        try{
          $this->conn->beginTransaction();
          $stmt->execute();
          $this->deletechofer();
          $this->deletevehiculo();
          $stmt2->execute();
          // execute query
          if($this->conn->commit()){
              return true;
          }
        }catch(Exception $e){
          $this->conn->rollBack();
          return false;
        }

    }
    function deletevehiculo(){

        // delete query
        $query = "DELETE FROM vehiculo WHERE vehiculo_id NOT IN (SELECT vehiculo_id FROM sistema_vehiculo)";

        // prepare query
        $stmt = $this->conn->prepare($query);

          $stmt->execute();


    }
    function deletechofer(){

        // delete query
        $query = "DELETE FROM chofer WHERE sistema_id NOT IN (SELECT sistema_id FROM sistema_vehiculo)";

        // prepare query
        $stmt = $this->conn->prepare($query);

          $stmt->execute();


    }
}
