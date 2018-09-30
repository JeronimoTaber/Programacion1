<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $_SESSION["user"] = $_POST['user'];

    header('Location: ejercicio8_1.php');
    exit;
    ?>
  </body>
</html>
