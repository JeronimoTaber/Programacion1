<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $nom = $_POST['nom'];
    $ape = $_POST['ape'];
    $doc = $_POST['doc'];
    $edad = $_POST['edad'];
    include("../conexion.php");
    $sql = 'select * from persona';
    $ejecucionSQL = $conexion->prepare($sql);
    $ejecucionSQL ->execute();
    $params= array('nombre' => $nom,'apellido' => $ape,'documento'=> $doc ,'edad'=> $edad);


    $sql = "INSERT INTO persona (nombre,apellido,documento,edad) VALUES (:nombre,:apellido,:documento,:edad)";
    $ejecucionSQL = $conexion->prepare($sql);
    $ejecucionSQL ->execute($params);

    echo "</pre>";
    header('Location: ejercicio2_1.php');
    exit;
     ?>
  </body>
</html>
