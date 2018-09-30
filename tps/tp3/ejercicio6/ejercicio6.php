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
    $_SESSION["pass"] = $_POST['pass'];
    header('Location: ejercicio6_1.php');
    exit;
    ?>
  </body>
</html>
