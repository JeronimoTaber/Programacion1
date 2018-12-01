<?php
session_start();
// constructor with $db as database connectionz

$username = $_POST['username'];
$password = $_POST['password'];
// files needed to connect to database
include_once '../config/database.php';

// instantiate vehiculo object
include_once 'object/admin.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate product object
$admin = new Admin($db);

// set product property values
$admin->username = $username;
$admin->password = $password;
$admin_exists = $admin->adminExists();

// check if email exists and if password is correct
if($admin_exists && password_verify($password, $admin->password)){

    // set response code
    $_SESSION["session"] = "true";
      header('Location: menu.php');
      exit;

}

else{

   // set response code
   http_response_code(401);

   // tell the user login failed
   echo json_encode(array("message" => "Login failed."));
}
