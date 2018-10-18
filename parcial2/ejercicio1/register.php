<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        include("../conexion.php");

          $params= array('usuario'=>$user,'clave' => $pass,'habilitado'=> '1','rol' => 'usuario');



    $sql = "INSERT INTO usuario (usuario,clave,habilitado,rol) VALUES (:usuario,:clave,:habilitado,:rol)";
    $ejecucionSQL = $conexion->prepare($sql);
    $ejecucionSQL ->execute($params);


            header('Location: inicio.html');
           exit;


         ?>
  </body>
</html>
