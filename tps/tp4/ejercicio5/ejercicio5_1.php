<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $id = $_GET['id'];
    include("../conexion.php");
    $params= array('id' => $id);

    $sql = "DELETE FROM persona  WHERE `id` = :id";
    $ejecucionSQL = $conexion->prepare($sql);
    $ejecucionSQL ->execute($params);

    header('Location: ejercicio5.php');
    exit;
     ?>
  </body>
</html>
