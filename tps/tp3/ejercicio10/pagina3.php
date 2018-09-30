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
        $archivo=fopen("log.txt","a+");
        while ($fila =fgets($archivo)) {
          echo $fila;
          echo "<br>";

        }
        fclose($archivo);

    echo "<br>Nombre de usuario: ".$_SESSION["user"]."<br>";
    ?>
    <form action="download.php" method="post">
      <input type="submit" name="submit" value="Download File" />
    </form>
    <a href="pagina1.php">Pagina1</a><br>
    <a href="pagina2.php">Pagina2</a>

  </body>
</html>
