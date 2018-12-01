<?php
session_start();
if($_SESSION['session'] != "true"){
  header('Location: index.html');
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
          <form class="" action="main.php" method="POST" enctype="multipart/form-data">

          <div class="box">
          <label for="username">username</label>
          <input type="text" name="username" value="" placeholder="username" class="password" />
          <br>
          <label for="password">password</label>
          <input type="password" name="password" value="" placeholder="password" class="password" />
          <br>
          <input type="submit" name="" value="Create" class="btn">
          </div> <!-- End Box -->

          </form>
        </div>
    </div>
  <?php endif; ?>

<?php if($_POST['user_menu']=="delete") : ?>
<div class="row">
  <div class="col-lg-12">
    <form class="" action="main.php" method="POST" enctype="multipart/form-data">

    <div class="box">
    <label for="username">username</label>
    <input type="text" name="username" value="" placeholder="username" class="password" />
    <br>
    <label for="password">password</label>
    <input type="password" name="password" value="" placeholder="password" class="password" />
    <br>
    <input type="submit" name="" value="Sign In" class="btn">
    </div> <!-- End Box -->

    </form>
  </div>
</div>
<?php endif; ?>

<?php if($_POST['user_menu']=="update") : ?>
<div class="row">
  <div class="col-lg-12">
    <form class="" action="main.php" method="POST" enctype="multipart/form-data">

    <div class="box">
    <label for="username">username</label>
    <input type="text" name="username" value="" placeholder="username" class="password" />
    <br>
    <label for="password">password</label>
    <input type="password" name="password" value="" placeholder="password" class="password" />
    <br>
    <input type="submit" name="" value="Sign In" class="btn">
    </div> <!-- End Box -->

    </form>
  </div>
</div>
<?php endif; ?>

<?php if($_POST['user_menu']=="read") : ?>
<div class="row">
  <div class="col-lg-12">
    <form class="" action="main.php" method="POST" enctype="multipart/form-data">

    <div class="box">
    <label for="username">username</label>
    <input type="text" name="username" value="" placeholder="username" class="password" />
    <br>
    <label for="password">password</label>
    <input type="password" name="password" value="" placeholder="password" class="password" />
    <br>
    <input type="submit" name="" value="Sign In" class="btn">
    </div> <!-- End Box -->

    </form>
  </div>
</div>
<?php endif; ?>


</div>
  </body>
</html>
