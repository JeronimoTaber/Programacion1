<?php
session_start();
// constructor with $db as database connectionz

$username = $_POST['username'];
$password = $_POST['password'];
// files needed to connect to database
include_once '../config/database.php';

// instantiate vehiculo object
include_once 'objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate product object
$user = new User($db);

// set product property values
$user->username = $username;
$user->password = $password;
$admin_exists = $user->adminExists();

// check if email exists and if password is correct
if($admin_exists && password_verify($password, $user->password)){

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
