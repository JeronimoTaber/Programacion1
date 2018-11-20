<?php
class Sistema_transporte{

    // database connection and table name
    private $conn;
    private $table_name = "sistema_transporte";

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
    // read products
