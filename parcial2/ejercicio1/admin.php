<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <?php
  if($_SESSION["rol"] == "usuario"){
      header('Location: inicio.html');
      exit;
  }

echo "El Admin es: ".$_SESSION['user'];



   ?>
  </body>
</html>
