<?php
// 'user' object
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
    public $from;
    public $to;

    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        // select all query
        $query = "SELECT
               *
            FROM
                (" . $this->table_name . ")
            ORDER BY
                created DESC";
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
                (" . $this->table_name . ")
                WHERE
                    auditoria_id LIKE ? OR user LIKE ? OR fecha_acceso LIKE ?
                ORDER BY
                    created DESC";

              // prepare query statement
              $stmt = $this->conn->prepare($query);


              $keywords = "%{$keywords}%";

              // bind
              $stmt->bindParam(1, $keywords);
              $stmt->bindParam(2, $keywords);
              $stmt->bindParam(3, $keywords);


              // execute query
              $stmt->execute();

              return $stmt;
            }
    function date(){
      // select all query
        $query = "SELECT
                       *
                    FROM
                        (" . $this->table_name . ")
                    WHERE
                      fecha_acceso
                    BETWEEN
                      CAST(? AS DATE) AND CAST(? AS DATE)
                    ORDER BY
                        created DESC";
                // prepare query statement
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1, $this->from);
                $stmt->bindParam(2, $this->to);
                // execute query
                $stmt->execute();

                return $stmt;
            }

  }
