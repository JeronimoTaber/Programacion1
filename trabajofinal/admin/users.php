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
    </div>
    <div class="container-fluid">


      <?php if($_POST['user_menu']=="create") : ?>
        <h1>User Create</h1>
    <div class="row">
        <div class="col-lg-12">
          <form class="" action="userDao.php" method="POST" enctype="multipart/form-data">
          <div class="box">
          <label for="username">username</label>
          <input type="text" name="username" value="" placeholder="username" class="password" />
          <br>
          <label for="password">password</label>
          <input type="password" name="password" value="" placeholder="password" class="password" />
          <br>
          <select name="type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
          <br>
          <input type="hidden" value="create" name="method" />
          <input type="submit" name="" value="Create" class="btn">
          </div> <!-- End Box -->

          </form>
        </div>
    </div>
  <?php endif;
   if($_POST['user_menu']=="delete") : ?>
  <h1>User Delete</h1>
<div class="row">
  <div class="col-lg-12">
    <form class="" action="userDao.php" method='POST' enctype="multipart/form-data">
    <div class="box">
    <label for="user_id">user id</label>
    <input type="text" name="user_id" value="" placeholder="user id" class="password" />
    <input type="hidden" value="delete" name="method" />
    <input type="submit" name="" value="Delete" class="btn">
    </div> <!-- End Box -->

    </form>
  </div>
</div>
<?php endif;
if($_POST['user_menu']=="update") : ?>
<h1>User Update</h1>
<div class="row">
<div class="col-lg-12">
  <form class="" action="userDao.php" method="POST" enctype="multipart/form-data">
  <div class="box">
  <label for="username">User id</label>
  <input type="text" name="user_id" value="" placeholder="user_id" class="password" />
  <br>
  <label for="username">username</label>
  <input type="text" name="username" value="" placeholder="username" class="password" />
  <br>
  <label for="password">password</label>
  <input type="password" name="password" value="" placeholder="password" class="password" />
  <br>
  <select name="type">
    <option value="user">User</option>
    <option value="admin">Admin</option>
  </select>
  <br>
  <input type="hidden" value="update" name="method" />
  <input type="submit" name="" value="Create" class="btn">
  </div> <!-- End Box -->

  </form>
</div>
</div>
<?php endif;
if($_POST['user_menu']=="read") : ?>
<div class="row">
  <div class="col-lg-6">
    <form class="" action="userDao.php" method="POST" enctype="multipart/form-data">

    <div class="box">
    <input type="submit" name="" value="Search" class="btn">
    <label for="keywords">Keyword</label>
    <input type="text" name="keywords" value="" placeholder="Keyword" class="password" />
    <input type="hidden" value="search" name="method" />

    </div> <!-- End Box -->

    </form>
  </div>
  <div class="col-lg-6">
    <form class="" action="userDao.php" method="POST" enctype="multipart/form-data">

    <div class="box">

      <input type="hidden" value="read" name="method" />
    <input type="submit" name="" value="Read All" class="btn">
    </div> <!-- End Box -->

    </form>
  </div>
</div>
<?php endif; ?>
</div>
  </body>
</html>
