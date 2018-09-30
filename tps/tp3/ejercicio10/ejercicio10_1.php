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
        $archivo=fopen("log.txt","a+");
            fwrite($archivo, date('Y-m-d H:i:s')." ; ".basename($_SERVER['PHP_SELF'])." ; ".$_SESSION["user"]."FAIL".PHP_EOL);
            fclose($archivo);
        header('Location: ejercicio10.html');
        exit;
      }
     ?>
    <?php
    $archivo=fopen("log.txt","a+");
        fwrite($archivo, date('Y-m-d H:i:s')." ; ".basename($_SERVER['PHP_SELF'])." ; ".$_SESSION["user"].PHP_EOL);
        fclose($archivo);
    echo "Nombre de usuario: ".$_SESSION["user"]."<br>";
    ?>
    <a href="pagina1.php">Pagina1</a><br>
    <a href="pagina2.php">Pagina2</a><br>
    <a href="pagina3.php">Pagina3</a>
  </body>
</html>
