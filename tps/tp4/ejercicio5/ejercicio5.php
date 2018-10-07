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

      echo "<td><a href='ejercicio5_1.php?id=".$fila['id']."'>Eliminar </a></td>";
      echo "<td><a href='ejercicio5_2.php?id=".$fila['id']."'> Modificar</a></td>";
      echo "<br>";
      echo "</tr>";

    }

     ?>
<a href="ejercicio3.html">Ingresar sus datos</a>
  </body>
</html>
