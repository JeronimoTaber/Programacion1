<?php
session_start();
if ($_SESSION['session'] != "true") {
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
    </div>
    <div class="container-fluid">
      <?php
if ($_POST['user_menu'] == "read"):
?>
      <div class="row">
        <div class="col-lg-6">
          <form class="" action="auditoriaDAO.php" method="POST" enctype="multipart/form-data">
            <div class="box">
              <input type="submit" name="" value="Search" class="btn">
              <label for="keywords">Keyword</label>
              <input type="text" name="keywords" value="" placeholder="Keyword" class="password" />
              <input type="hidden" value="search" name="method" />
            </div> <!-- End Box -->
          </form>
              <br><br>
              <button onclick="location.href = 'menu.php';" id="myButton" class="float-left submit-button" >Home</button>
        </div>
        <div class="col-lg-6">
          <form class="" action="auditoriaDAO.php" method="POST" enctype="multipart/form-data">
            <div class="box">
              <input type="hidden" value="read" name="method" />
              <input type="submit" name="" value="Read All" class="btn">
            </div> <!-- End Box -->
          </form>
        </div>
      </div>
      <?php
endif;
?>
      <?php
if ($_POST['user_menu'] == "file"):
?>
      <div class="row">
        <div class="col-lg-12">
          <form class="" action="auditoriaDAO.php" method="POST" enctype="multipart/form-data">
            <div class="box">
              <label for="file">File</label>
              <input type="text" name="file" value="" placeholder="File" class="password" />
              <label for="from">From</label>
              <input type="date" name="from" value="" class="password" />
              <label for="to">To</label>
              <input type="date" name="to" value="" class="password" />
              <input type="hidden" value="file" name="method" />
              <input type="submit" name="" value="Export" class="btn">
            </div> <!-- End Box -->
          </form>
              <br><br>
              <button onclick="location.href = 'menu.php';" id="myButton" class="float-left submit-button" >Home</button>
        </div>
      </div>
      <?php
endif;
?>
</div>
  </body>
</html>
