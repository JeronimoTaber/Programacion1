<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="ejercicio5_3.php" method="POST" enctype="multipart/form-data">


    <?php
    $id = $_GET['id'];
    include("../conexion.php");
    $params= array('id' => $id);

        $sql = "SELECT * FROM persona WHERE `id` = :id";
        $ejecucionSQL = $conexion->prepare($sql);
        $ejecucionSQL ->execute($params);

    while ($fila = $ejecucionSQL->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      foreach ($fila as $x => $x_value) {
        echo "$x   ";
        if ($x == 'id') {
          echo "<td><input type='text' name='$x' value='$x_value' readonly>    </td>";
        }
        else {
        echo "<td><input type='text' name='$x' value='$x_value'>    </td>";
        }
      }
      echo "<br>";
      echo "</tr>";

    }
     ?>
  <input type="submit" name="" value="send">
   </form>
 </div>
</body>
</html>
