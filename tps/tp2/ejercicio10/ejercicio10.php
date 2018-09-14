<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 10</title>
  </head>
  <body>
    <?php
    $valor=$_POST['valor'];
    ?>
    <form action="ejercicio10_1.php" method="POST">
    <?php
    for ($i=1;$i<$valor+1;$i++) {
      echo "<input type=\"checkbox\" name=\"checkbox$i\"";
      echo "<label for=\"prod$i\">Producto $i: </label>";
      echo "<input type=\"text\" name=\"prod$i\">";
      echo "<br>";
    }
      echo "<input type=\"hidden\" name=\"cantidad\" value=\"$valor\">";
        ?>
      <input type="submit" value="Enviar">
  </body>
</html>
