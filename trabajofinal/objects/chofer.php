<?php session_start(); ?>
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
                LEFT JOIN
                vehiculo c
                    ON p.vehiculo_id = c.vehiculo_id
                LEFT JOIN
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
    function auditoria(){
        $time = microtime(true) - $_SESSION["start"];
        // select all query
        //echo $time;
        $query = "INSERT INTO auditoria (fecha_acceso,user,response_time,endpoint) values (NOW(),'pepe',100,'/auditoria') /*ON DUPLICATE KEY UPDATE fecha_acceso=NOW(), response_time=100, endpoint=/chofer/read*/";
        //$query = "INSERT INTO auditoria (fecha_acceso,user,response_time,endpoint) values (NOW(),'lala',23,'/chofer/read')";
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

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->apellido=htmlspecialchars(strip_tags($this->apellido));
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->documento=htmlspecialchars(strip_tags($this->documento));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->vehiculo_id=htmlspecialchars(strip_tags($this->vehiculo_id));
        $this->sistema_id=htmlspecialchars(strip_tags($this->sistema_id));
        $this->created=htmlspecialchars(strip_tags($this->created));

        // bind values
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":documento", $this->documento);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt->bindParam(":sistema_id", $this->sistema_id);
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
                apellido=:apellido, nombre=:nombre, documento=:documento, email=:email, vehiculo_id=:vehiculo_id, sistema_id=:sistema_id
                WHERE
                    chofer_id = :chofer_id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->apellido=htmlspecialchars(strip_tags($this->apellido));
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->documento=htmlspecialchars(strip_tags($this->documento));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->vehiculo_id=htmlspecialchars(strip_tags($this->vehiculo_id));
        $this->sistema_id=htmlspecialchars(strip_tags($this->sistema_id));
        $this->chofer_id=htmlspecialchars(strip_tags($this->chofer_id));


        // bind new values
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":documento", $this->documento);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
        $stmt->bindParam(":sistema_id", $this->sistema_id);
        $stmt->bindParam(":chofer_id", $this->chofer_id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // delete the product
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE chofer_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->chofer_id=htmlspecialchars(strip_tags($this->chofer_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->chofer_id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

}
