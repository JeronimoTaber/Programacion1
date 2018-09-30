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

    ?>
    <a href="pagina2.php">Pagina2</a><br>
    <a href="pagina3.php">Pagina3</a>
  </body>
</html>
