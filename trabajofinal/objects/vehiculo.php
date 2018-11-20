<?php
class Vehiculo{

    // database connection and table name
    private $conn;
    private $table_name = "product";

    // object properties
    public $vehiculo_id;
    public $patente;
    public $anho_patente;
    public $marca;
    public $modelo;
    public $created;
    public $updated;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
