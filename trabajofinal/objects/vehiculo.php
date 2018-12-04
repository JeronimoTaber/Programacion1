<?php
class Vehiculo{

    // database connection and table name
    private $conn;
    private $table_name = "vehiculo";
    private $table_name_sis = "sistema_vehiculo";

    // object properties
    public $vehiculo_id;
    public $patente;
    public $anho_patente;
    public $anho_fabricacion;
    public $marca;
    public $modelo;
    public $created;
    public $updated;
    public $sistema_id;
    public $old_sistema_id;

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


              $query2 = "SELECT vehiculo_id FROM (" . $this->table_name . ") WHERE patente=:patente";

              // prepare query
              $stmt2 = $this->conn->prepare($query2);

              $stmt2->bindParam(":patente", $this->patente);
                // query to insert record
                $query3 = "INSERT INTO
                            " . $this->table_name_sis . "
                        SET
                            vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created";

                // prepare query
                $stmt3 = $this->conn->prepare($query3);

                // bind values
                $stmt3->bindParam(":vehiculo_id", $this->vehiculo_id);
              //  $stmt3->bindParam(":sistema_id", $this->sistema_id);
                $stmt3->bindParam(":created", $this->created);
      try{
        $this->conn->beginTransaction();
        $stmt->execute();
        $stmt2->execute();
        $data = $stmt2->fetch(PDO::FETCH_ASSOC);
        $this->vehiculo_id = $data["vehiculo_id"];


        for($i=0; $i<count($this->sistema_id); $i++){
                    $aux = $this->sistema_id[$i];
                    $stmt3->bindParam(":sistema_id", $aux);
                    $stmt3->execute();
                }


        // execute query
        if($this->conn->commit()){
            return true;
        };
      }catch(Exception $e){
        echo json_encode($e->getMessage());
        $this->conn->rollBack();
        return false;
      }
    }
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name_sis . " WHERE vehiculo_id=:vehiculo_id";
        $query2 = "DELETE FROM " . $this->table_name . " WHERE vehiculo_id=:vehiculo_id";

        // prepare query
        $stmt = $this->conn->prepare($query);
        $stmt2 = $this->conn->prepare($query2);

        // sanitize
        $this->vehiculo_id=strip_tags($this->vehiculo_id);

        // bind id of record to delete
        $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt2->bindParam(":vehiculo_id", $this->vehiculo_id);
        // execute query
      //    $stmt->execute();
      //  $stmt2->execute();

        try{
          $this->conn->beginTransaction();
          $stmt->execute();
          //

          $this->deletechofer();
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
        $query = "DELETE FROM chofer WHERE vehiculo_id NOT IN (SELECT vehiculo_id FROM sistema_vehiculo)";

        // prepare query
        $stmt = $this->conn->prepare($query);

          $stmt->execute();


    }

    function read(){
    //si se coloca inner en lugar de left muestra solo las compañias que tienen vehiculos regisitrados
        // select all query
        $query = "SELECT
               v.vehiculo_id, v.patente, v.anho_patente, v.anho_fabricacion, v.marca, v.modelo, v.created, v.updated, t.nombre
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
               v.vehiculo_id, v.patente, v.anho_patente, v.anho_fabricacion, v.marca, v.modelo, v.created, v.updated, t.nombre
            FROM
                (" . $this->table_name . " v)
                LEFT JOIN
                sistema_vehiculo s
                    ON v.vehiculo_id = s.vehiculo_id
                LEFT JOIN
                sistema_transporte t
                        ON s.sistema_id = t.sistema_id
                WHERE
              v.vehiculo_id LIKE ? OR v.patente LIKE ? OR t.nombre LIKE ?
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
          $query2 = "UPDATE
                      (" . $this->table_name_sis . ")
                  SET
                  sistema_id = :sistema_id
                  WHERE
                      vehiculo_id=:vehiculo_id AND sistema_id=:old_sistema_id ";

          // prepare query statement
          $stmt = $this->conn->prepare($query);
          $stmt2 = $this->conn->prepare($query2);
          // sanitize
          $this->vehiculo_id=strip_tags($this->vehiculo_id);
          $this->patente=strip_tags($this->patente);
          $this->anho_patente=strip_tags($this->anho_patente);
          $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
          $this->marca=strip_tags($this->marca);
          $this->modelo=strip_tags($this->modelo);
          $this->sistema_id=strip_tags($this->sistema_id);
          $this->old_sistema_id=strip_tags($this->old_sistema_id);
          // bind values
          $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
          $stmt->bindParam(":patente", $this->patente);
          $stmt->bindParam(":anho_patente", $this->anho_patente);
          $stmt->bindParam(":anho_fabricacion", $this->anho_fabricacion);
          $stmt->bindParam(":marca", $this->marca);
          $stmt->bindParam(":modelo", $this->modelo);
          $stmt2->bindParam(":vehiculo_id", $this->vehiculo_id);
          $stmt2->bindParam(":sistema_id", $this->sistema_id);
          $stmt2->bindParam(":old_sistema_id", $this->old_sistema_id);
          // execute the query
          try{
            $this->conn->beginTransaction();
            $stmt->execute();
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
function newrelation(){
    // query to insert record
            $query = "INSERT INTO
                        " . $this->table_name_sis . "
                    SET
                        vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created";

            // prepare query
            $stmt = $this->conn->prepare($query);
            $this->vehiculo_id=strip_tags($this->vehiculo_id);
            $this->created=strip_tags($this->created);

            // bind values
            $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
            $stmt->bindParam(":sistema_id", $this->new_sistema_id);
            $stmt->bindParam(":created", $this->created);
  try{
    $this->conn->beginTransaction();

                //$stmt->bindParam(":sistema_id",$this->sistema_id ;
                $stmt->execute();



    // execute query
    if($this->conn->commit()){
        return true;
    };
  }catch(Exception $e){
    echo json_encode($e->getMessage());
    $this->conn->rollBack();
    return false;
  }
}
}
