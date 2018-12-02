<?php
session_start();
if($_SESSION['session'] != "true"){
  header('Location: index.php');
  exit;
}
// constructor with $db as database connectionz
if($_POST['method']=="create") {

  //$username = $_POST['username'];
  //$password = $_POST['password'];
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
  if(
      !empty($_POST['username']) &&
      !empty($_POST['password']) &&
      !empty($_POST['type'])
  ){
  $user->username = $_POST['username'];
  $user->password = $_POST['password'];
  $user->type = $_POST['type'];
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
  }else{
    $Message = urlencode("Error: Data is incomplete");
    header("Location:menu.php?Message=".$Message);
    die;
  }
}
if($_POST['method']=="delete") {

  //$username = $_POST['user_id'];
  // files needed to connect to database
  include_once '../config/database.php';

  // instantiate vehiculo object
  include_once 'objects/user.php';

  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // instantiate product object
  $user = new User($db);
  if(
      !empty($_POST['user_id'])
  ){
  // set product property values
  $user->user_id = $_POST['user_id'];
  // check if email exists and if password is correct
  if($user->delete()){
    $Message = urlencode("User with id ".$_POST['user_id']." Deleted");
    header("Location:menu.php?Message=".$Message);
    die;
  }

  else{
    $Message = urlencode("Error: User was not deleted");
    header("Location:menu.php?Message=".$Message);
    die;
  }
  }else{
      $Message = urlencode("Error: Data is incomplete");
      header("Location:menu.php?Message=".$Message);
      die;
    }
}

if($_POST['method']=="update") {

  //$username = $_POST['username'];
  //$password = $_POST['password'];
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
  if(
      !empty($_POST['user_id']) &&
      !empty($_POST['username']) &&
      !empty($_POST['password']) &&
      !empty($_POST['type'])
  ){
  $user->user_id = $_POST['user_id'];
  $user->username = $_POST['username'];
  $user->password = $_POST['password'];
  $user->type = $_POST['type'];

  // check if email exists and if password is correct
  if($user->update()){
    $Message = urlencode("User Updated");
    header("Location:menu.php?Message=".$Message);
    die;
  }
  else{
    $Message = urlencode("Error: User was not updated");
    header("Location:menu.php?Message=".$Message);
    die;
    }
  }else{
    $Message = urlencode("Error: Data is incomplete");
    header("Location:menu.php?Message=".$Message);
    die;
  }
}
