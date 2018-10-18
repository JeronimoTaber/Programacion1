<?php session_start(); ?>
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
        $params= array('usuario'=>$user,'clave' => $pass);
        $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND clave = :clave";
        $ejecucionSQL = $conexion->prepare($sql);
        $ejecucionSQL ->execute($params);

        $count = $ejecucionSQL->rowCount();
        $fila = $ejecucionSQL->fetch(PDO::FETCH_ASSOC);


        $params= array('id'=>$fila['id'],'usuario' => $fila['usuario'],'clave' => $fila['clave'],'habilitado'=> $fila['habilitado'],'rol' => $fila['rol']);

        if($params['habilitado'] == 1){
        $_SESSION["user"] = $params["usuario"];
        $_SESSION["login"] = $params['habilitado'];
        $_SESSION["rol"] = $params['rol'];
            if($_SESSION["rol"] == "usuario"){
                echo "hola usuario";
                header('Location: usuario.php');
                exit;
              }
            else{
                header('Location: admin.php');
                exit;
              }
        }
        else{
             header('Location: inicio.html');
             exit;
        }

         ?>
  </body>
</html>
