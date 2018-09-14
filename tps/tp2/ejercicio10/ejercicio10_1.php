<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 10</title>
  </head>
  <body>
    <?php
    $cantidad=$_POST['cantidad'];
    for ($i=0;$i<$cantidad+1;$i++) {
      if ($_POST["checkbox$i"] == on) {
        echo "Se selecciono el producto $i con una cantidad de {$_POST["prod$i"]} elementos <br>";
      }
    }
     ?>

  </body>
</html>
