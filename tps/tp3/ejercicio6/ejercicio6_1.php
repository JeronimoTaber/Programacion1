<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    echo "Nombre de usuario: ".$_SESSION["user"]."<br>";
    echo "Password: ".$_SESSION["pass"]."<br>";
    ?>
  </body>
</html>
