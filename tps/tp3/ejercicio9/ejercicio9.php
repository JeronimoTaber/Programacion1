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
    $archivo=fopen("log.txt","w+");
    file_put_contents($archivo, "");
        fwrite($archivo, date('Y-m-d H:i:s')." ; ".basename($_SERVER['PHP_SELF'])." ; ".$_SESSION["user"].PHP_EOL);
        fclose($archivo);
    header('Location: ejercicio9_1.php');
    exit;
    ?>
  </body>
</html>
