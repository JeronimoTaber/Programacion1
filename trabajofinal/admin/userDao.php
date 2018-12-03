<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/menus.css">
  </head>
  <body>
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

if($_POST['method']=="read") {

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

  $stmt = $user->read();
  $num = $stmt->rowCount();
  // check if more than 0 record found
  if($num>0){
      ?>
      <table>
      <tr>
      <th>user_id</th>
      <th>Type</th>
      <th>Username</th>
      <th>Created</th>
      <th>Updated</th>
      </tr>
      <?php
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach ($row as $collum) {
          echo "  <td>$collum</td>";

        }
        echo "</tr>";

      }
      echo "</table>";
    }

    else{

        // set response code - 404 Not found
        http_response_code(404);


        // tell the user no users found
        echo json_encode(
            array("message" => "No users found.")
        );
    }
    ?>
      <br><br>
      <button onclick="location.href = 'menu.php';" id="myButton" class="float-left submit-button" >Home</button>
    <?php
}

if($_POST['method']=="search") {

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
  if(
      !empty($_POST['keywords'])
  ){
  // set product property values
  $keywords= $_POST['keywords'];
  $stmt = $user->search($keywords);
  $num = $stmt->rowCount();
  // check if more than 0 record found
  if($num>0){
      ?>
      <table>
      <tr>
      <th>user_id</th>
      <th>Type</th>
      <th>Username</th>
      <th>Created</th>
      <th>Updated</th>
      </tr>
      <?php
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach ($row as $collum) {
          echo "  <td>$collum</td>";

        }
        echo "</tr>";

      }
      echo "</table>";
    }

    else{

        // set response code - 404 Not found
        http_response_code(404);


        // tell the user no users found
        echo json_encode(
            array("message" => "No users found.")
        );
    }
  }else{
    $Message = urlencode("Error: Data is incomplete");
    header("Location:menu.php?Message=".$Message);
    die;
  }
  ?>
    <br><br>
    <button onclick="location.href = 'menu.php';" id="myButton" class="float-left submit-button" >Home</button>
  <?php
}

?>

</body>
</html>
