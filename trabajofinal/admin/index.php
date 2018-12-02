<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

    <form class="" action="index.php" method="POST" enctype="multipart/form-data">

    <div class="box">
    <h1>Login</h1>
    <label for="username">username</label>
    <input type="text" name="username" value="" class="password" />
    <label for="password">password</label>
    <input type="password" name="password" value="" class="password" />

    <input type="submit" name="" value="Sign In" class="btn">
    </div> <!-- End Box -->

    </form>

  </body>
</html>
<?php
session_start();
// constructor with $db as database connectionz
if(!empty($_POST['username']) && !empty($_POST['password'])) {

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
   echo "Login failed.";
}
}
?>
