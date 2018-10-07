<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if(empty($_SESSION['login'])){
        header('Location: inicio.html');
        exit;
      }
      echo "El Usuario es: ".$_SESSION['user'];
     ?>
  </body>
</html>
