<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="ejercicio5_3.php" method="POST" enctype="multipart/form-data">


    <?php
    include("../conexion.php");

        $sql = "select	nombre,	apellido	as	Apellido,	concat(apellido,',	',	nombre)	as	nombreCompleto	from	persona";
        $ejecucionSQL = $conexion->prepare($sql);
        $ejecucionSQL ->execute();

    while ($fila = $ejecucionSQL->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      foreach ($fila as $x => $x_value) {
        echo "$x   ";

        echo "<td><input type='text' name='$x' value='$x_value' readonly>    </td>";

      }
      echo "<br>";
      echo "</tr>";

    }
     ?>

   </form>
 </div>
</body>
</html>
