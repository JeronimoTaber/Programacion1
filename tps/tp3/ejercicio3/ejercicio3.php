
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table style="width:100%">
<?php

        $archivo=fopen($_FILES['arch']['tmp_name'],"r");
        $nuevoarchivo=fopen("importados/testfile.txt","a+");

          while ($fila =fgets($archivo)) {
            fwrite($nuevoarchivo, $fila);

          }
          fclose($archivo);
          fclose($nuevoarchivo);
     ?>
<pre>
<?php
  $nuevalectura=fopen("importados/testfile.txt","r");
while ($filanueva =fgets($nuevalectura)) {
  echo $filanueva;

}
fclose($nuevalectura);
 ?>
</pre>
   </table>
  </body>
</html>
