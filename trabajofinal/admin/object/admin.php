<?php
// 'user' object
class Admin{

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

function adminExists(){

    $query = "SELECT user_id, username, password
            FROM " . $this->table_name . "
            WHERE username = ?
            LIMIT 0,1";

    // prepare the query
    $stmt = $this->conn->prepare( $query );

    // bind given email value
    $stmt->bindParam(1, $this->username);

    // execute the query
    $stmt->execute();

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

    // return false if email does not exist in the database
    return false;
}

// update() method will be here
}
