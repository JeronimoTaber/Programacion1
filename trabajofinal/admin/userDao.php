<?php
session_start();
if($_SESSION['session'] != "true"){
  header('Location: index.php');
  exit;
}
// constructor with $db as database connectionz
if($_POST['method']=="create") {

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
$user->created = date('Y-m-d H:i:s');

// check if email exists and if password is correct
if($user->create()){
  $Message = urlencode("User Created");
  header("Location:menu.php?Message=".$Message);
  die;

}

else{

  $Message = urlencode("Error: User was not created");
  header("Location:menu.php?Message=".$Message);
  die;
}
}
