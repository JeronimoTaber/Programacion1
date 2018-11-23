<?php
class Vehiculo{

    // database connection and table name
    private $conn;
    private $table_name = "vehiculo";

    // object properties
    public $vehiculo_id;
    public $patente;
    public $anho_patente;
    public $anho_fabricacion;
    public $marca;
    public $modelo;
    public $created;
    public $updated;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function create(){

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    patente=:patente, anho_patente=:anho_patente, anho_fabricacion=:anho_fabricacion, marca=:marca, modelo=:modelo,created=:created";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->patente=strip_tags($this->patente);
        $this->anho_patente=strip_tags($this->anho_patente);
        $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
        $this->marca=strip_tags($this->marca);
        $this->modelo=strip_tags($this->modelo);
        $this->created=strip_tags($this->created);

        // bind values
        $stmt->bindParam(":patente", $this->patente);
        $stmt->bindParam(":anho_patente", $this->anho_patente);
        $stmt->bindParam(":anho_fabricacion", $this->anho_fabricacion);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
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

    function read(){
    //si se coloca inner en lugar de left muestra solo las compañias que tienen vehiculos regisitrados
        // select all query
        $query = "SELECT
               v.vehiculo_id, v.patente, v.anho_patente, v.anho_fabricacion, v.marca, v.modelo, v.created, v.updated
            FROM
                (" . $this->table_name . " v)
               LEFT JOIN
                sistema_vehiculo s
                    ON v.vehiculo_id = s.vehiculo_id
                LEFT JOIN
                sistema_transporte t
                        ON s.sistema_id = t.sistema_id
            ORDER BY
                v.created DESC";
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
              vehiculo_id LIKE ? OR patente LIKE ? OR marca LIKE ?
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
      function update(){

          // update query
          $query = "UPDATE
                      (" . $this->table_name . ")
                  SET
                  patente=:patente, anho_patente=:anho_patente, anho_fabricacion=:anho_fabricacion, marca=:marca, modelo=:modelo
                  WHERE
                      vehiculo_id = :vehiculo_id";

          // prepare query statement
          $stmt = $this->conn->prepare($query);

          // sanitize
          $this->vehiculo_id=strip_tags($this->vehiculo_id);
          $this->patente=strip_tags($this->patente);
          $this->anho_patente=strip_tags($this->anho_patente);
          $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
          $this->marca=strip_tags($this->marca);
          $this->modelo=strip_tags($this->modelo);

          // bind values
          $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
          $stmt->bindParam(":patente", $this->patente);
          $stmt->bindParam(":anho_patente", $this->anho_patente);
          $stmt->bindParam(":anho_fabricacion", $this->anho_fabricacion);
          $stmt->bindParam(":marca", $this->marca);
          $stmt->bindParam(":modelo", $this->modelo);

          // execute the query
          if($stmt->execute()){
              return true;
          }

          return false;
      }

}
