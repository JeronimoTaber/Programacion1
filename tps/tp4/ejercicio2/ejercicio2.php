<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include("../conexion.php");
    $sql = 'select * from persona';
    $ejecucionSQL = $conexion->prepare($sql);
    $ejecucionSQL ->execute();
    while ($fila = $ejecucionSQL->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      foreach ($fila as $campo) {
        echo "  <td>$campo</td>";

      }
      echo "<br>";
      echo "</tr>";

    }
    die();
     ?>
  </body>
</html>
