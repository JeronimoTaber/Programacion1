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
    <link rel="stylesheet" href="css/menus.css">
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
            <!-- Envia a create de CRUD-->
            <form method="POST" action="crud.php">
              <button type="submit" class="button">Create</button>
              <input type="hidden" value="create" name="user_menu" />

            </form>
          </div>
          <div class="col-lg-3">
            <!-- Envia a delete de CRUD-->
            <form method="POST" action="crud.php">
              <button type="submit" class="button">Delete</button>
              <input type="hidden" value="delete" name="user_menu" />

            </form>
          </div>
          <div class="col-lg-3">
            <!-- Envia a update de CRUD-->
            <form method="POST" action="crud.php">
              <button type="submit" class="button">Update</button>
              <input type="hidden" value="update" name="user_menu" />

            </form>
          </div>
          <div class="col-lg-3">
            <!-- Envia a read y search de CRUD-->
            <form method="POST" action="crud.php">
              <button type="submit" class="button">Read</button>
              <input type="hidden" value="read" name="user_menu" />

            </form>
          </div>
      </div>
              <h2>auditoria</h2><br>
      <div class="row">

          <div class="col-lg-6">
            <form method="POST" action="auditoriaCRUD.php">
              <button type="submit" class="button">Read</button>
              <input type="hidden" value="read" name="user_menu" />
            </form>
          </div>
          <div class="col-lg-6">
            <form method="POST" action="auditoriaCRUD.php">
              <button type="submit" class="button">File</button>
              <input type="hidden" value="file" name="user_menu" />
            </form>
          </div>
      </div>
<br>
<br>
<div class="row">
  <div class="col-lg-6">
    <button id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>

  </div>
</div>
<?php
if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: index.php');
}
?>
</div>
  </body>
</html>
