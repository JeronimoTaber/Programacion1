<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $_SESSION["texto7"] = $_POST['texto7'];
      $_SESSION["texto8"] = $_POST['texto8'];
      $_SESSION["texto9"] = $_POST['texto9'];
      echo $_SESSION["texto1"]."<br>";
      echo $_SESSION["texto2"]."<br>";
      echo $_SESSION["texto3"]."<br>";
      echo $_SESSION["texto4"]."<br>";
      echo $_SESSION["texto5"]."<br>";
      echo $_SESSION["texto6"]."<br>";
      echo $_SESSION["texto7"]."<br>";
      echo $_SESSION["texto8"]."<br>";
      echo $_SESSION["texto9"]."<br>";
    ?>
    <a href="ejercicio5_3.php">Link ultimo script</a>
  </body>
</html>
