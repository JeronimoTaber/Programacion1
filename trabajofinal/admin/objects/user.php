<?php
// 'user' object
class User{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $user_id;
    public $type;
    public $username;
    public $password;
    public $created;
    public $updated;

    // constructor
    public function __construct($db){
        $this->conn = $db;
    }


    function adminExists(){

        $query = "SELECT user_id, username, password
                FROM (" . $this->table_name . ")
                WHERE username = ? AND type='admin'
                LIMIT 0,1";

        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // bind given email value
        $stmt->bindParam(1, $this->username);

        // execute the query
        try{
          $this->conn->beginTransaction();
          $stmt->execute();
          // execute query
          if($this->conn->commit()){
            // get number of rows
            $num = $stmt->rowCount();

            // if email exists, assign values to object properties for easy access and use for php sessions
            if($num>0){
                // get record details / values
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                // assign values to object properties
                $this->user_id = $row['user_id'];
                $this->username = $row['username'];
                $this->password = $row['password'];
                // return true because email exists in the database
                return true;
            }
          }
        }catch(Exception $e){

          return false;
        }
    }


    function create(){

        // insert query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    type=:type, username=:username, password=:password, created=:created";

        // prepare the query
        $stmt = $this->conn->prepare($query);
        // bind the values
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':created', $this->created);
        $stmt->bindParam(':type', $this->type);

        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        // execute the query, also check if query was successful
        try{
          $this->conn->beginTransaction();
          $stmt->execute();
          // execute query
          if($this->conn->commit()){
              return true;
          }
        }catch(Exception $e){
          //$this->conn->rollBack();
          return false;
        }


    }
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // bind id of record to delete
        $stmt->bindParam(1, $this->user_id);

        // execute query
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count > 0){
            return true;
        }

        return false;

    }
    function update(){

        // insert query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    type=:type, username=:username, password=:password
                WHERE
                    user_id = :user_id";

        // prepare the query
        $stmt = $this->conn->prepare($query);
        // bind the values
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':type', $this->type);

        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        // execute the query, also check if query was successful
        try{
          $this->conn->beginTransaction();
          $stmt->execute();
          // execute query
          if($this->conn->commit()){
              return true;
          }
        }catch(Exception $e){
          //$this->conn->rollBack();
          return false;
        }
    }
    function read(){

        // select all query
        $query = "SELECT
               user_id,type,username,created,updated
            FROM
                (" . $this->table_name . ")
            ORDER BY
                created ASC";
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function search($keywords){

        // select all query
        $query = "SELECT
               user_id,type,username,created,updated
            FROM
                (" . $this->table_name . ")
                WHERE
                    user_id LIKE ? OR username LIKE ?
                ORDER BY
                    created ASC";

              // prepare query statement
              $stmt = $this->conn->prepare($query);


              $keywords = "%{$keywords}%";

              // bind
              $stmt->bindParam(1, $keywords);
              $stmt->bindParam(2, $keywords);


              // execute query
              $stmt->execute();

              return $stmt;
            }

  }
