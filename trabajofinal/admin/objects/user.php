<?php
// 'user' object
class User{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $user_id;
    public $username;
    public $password;
    public $created;
    public $updated;

    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // create new user record

    function create(){

        // insert query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, created=:created";

        // prepare the query
        $stmt = $this->conn->prepare($query);
        // bind the values
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':created', $this->created);

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
  }
