
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 11</title>
  </head>
  <body>
    <?php
    $cantidad=$_POST['cantidad'];
    $opcion=$_POST['opcion'];
    if($opcion<$cantidad){
     echo "<select name=\"lista\">";
     echo "<option value=\"$opcion\">Opcion a seleccionar Nro. $opcion</option>";
    for ($i=1;$i<$cantidad+1 ;$i++) {
      if ($i==$opcion) {
      }
      else{
      echo "<option value=\"$i\">Opcion a seleccionar Nro. $i</option>";
    }
    }
  }
    else{
      echo "El segundo valor debe ser menor al primero";
    }
     ?>
  </body>
</html>
