<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if(empty($_SESSION['user'])){
        header('Location: ejercicio8.html');
        exit;
      }
     ?>
    <?php
    echo "Nombre de usuario: ".$_SESSION["user"]."<br>";
    ?>
    <a href="pagina1.php">Pagina1</a><br>
    <a href="pagina2.php">Pagina2</a>

  </body>
</html>
