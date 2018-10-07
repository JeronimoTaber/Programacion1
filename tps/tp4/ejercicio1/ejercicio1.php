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
    echo "<pre>";
    while ($fila = $ejecucionSQL->fetch(PDO::FETCH_ASSOC)) {
      print_r($fila);
    }
    $params=array(array('nombre' => 'martin','apellido' => 'perez','documento'=>'12345678','edad'=>'14'),
                  array('nombre' => 'lucas','apellido' => 'gonzales','documento'=>'23456789','edad'=>'32'),
                  array('nombre' => 'mario','apellido' => 'bros','documento'=>'34567890','edad'=>'67'));

foreach ($params as $key){
    $sql = "INSERT INTO persona (nombre,apellido,documento,edad) VALUES (:nombre,:apellido,:documento,:edad)";
    $ejecucionSQL = $conexion->prepare($sql);
    $ejecucionSQL ->execute($key);
}
    echo "</pre>";
    die();
     ?>
  </body>
</html>
