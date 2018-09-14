<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
  $user=$_GET['user'];
    $pass=$_GET['pass'];
    $array =array( '1'=>array('nombre'=>"jeronimo",'cont'=>"1234",'mail'=>"jerotaber@gmail.com"),
                  '2'=>array('nombre'=>"jose",'cont'=>"2345",'mail'=>"jose@gmail.com"),
                  '3'=>array('nombre'=>"juan",'cont'=>"3263",'mail'=>"juan@gmail.com")
                  );

$n=0;
                  foreach ($array as $key => $val) {
                      if ($val['nombre'] == $user && $val['cont'] == $pass) {
                          echo "Contraseña Correcta";
                          echo "<br>";
                          echo $val['nombre'];
                          echo "<br>";
                          echo $val['cont'];
                          echo "<br>";
                          echo $val['mail'];
                          echo "<br>";
                          $n=1;
                      }
                  }
                  if ($n ==0) {
                    echo "Usuario o contraseña incorrecto";
                  }

     ?>
  </body>
</html>
