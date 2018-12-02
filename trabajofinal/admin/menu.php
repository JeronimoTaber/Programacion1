<?php
session_start();
if($_SESSION['session'] != "true"){
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
  </head>
  <body>
    <div class="container-fluid" id="top">
      <?php
      if(isset($_GET['Message'])):
        echo "<script>";
        echo "alert('".$_GET['Message']."')";
        echo "</script>";
      endif;
        ?>
      <h1>Admin</h1>
    </div>
    <div class="container-fluid" id="menu">
        <h2>Users</h2><br>
      <div class="row">
          <div class="col-lg-3">
            <form method="POST" action="users.php">
              <button type="submit" class="button">Create</button>
              <input type="hidden" value="create" name="user_menu" />
            </form>
          </div>
          <div class="col-lg-3">
            <form method="POST" action="users.php">
              <button type="submit" class="button">Delete</button>
            </form>
          </div>
          <div class="col-lg-3">
            <form method="POST" action="users.php">
              <button type="submit" class="button">Update</button>
            </form>
          </div>
          <div class="col-lg-3">
            <form method="POST" action="users.php">
              <button type="submit" class="button">Read</button>
            </form>
          </div>
      </div>
              <h2>auditoria</h2><br>
      <div class="row">

          <div class="col-lg-6">
            <form method="POST" action="users.php">
              <button type="submit" class="button">Read</button>
            </form>
          </div>
          <div class="col-lg-6">
            <form method="POST" action="auditorias.php">
              <button type="submit" class="button">File</button>
            </form>
          </div>
      </div>
</div>
  </body>
</html>
