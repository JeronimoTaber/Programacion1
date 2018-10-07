<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <pre>
    <?php
        $id = $_POST['id'];
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $doc = $_POST['documento'];
        $edad = $_POST['edad'];
        include("../conexion.php");
        $params= array('id'=>$id,'nombre' => $nom,'apellido' => $ape,'documento'=> $doc ,'edad'=> $edad);
        print_r($params);
        $sql = "UPDATE persona SET nombre = :nombre, apellido= :apellido , documento= :documento , edad= :edad  WHERE `id` = :id";
        $ejecucionSQL = $conexion->prepare($sql);
        $ejecucionSQL ->execute($params);

        header('Location: ejercicio5.php');
        exit;
         ?>
         </pre>
  </body>
</html>
