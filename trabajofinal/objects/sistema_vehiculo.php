<?php
class Sistema_vehiculo{

    // database connection and table name
    private $conn;
    private $table_name = "sistema_vehiculo";

    // object properties
    public $sistemavehiculo_id;
    public $vehiculo_id;
    public $sistema_id;
    public $created;
    public $updated;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
