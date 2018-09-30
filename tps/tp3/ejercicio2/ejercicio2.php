
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
          while ($fila =fgets($archivo)) {
list ($id, $nombre, $apellido, $email, $observ) = explode(';', $fila);

            echo "<tr>";
            echo "<th>";
            echo $id;
            echo "</th>";
            echo "<th>";
            echo $nombre;
            echo "</th>";
            echo "<th>";
            echo $apellido;
            echo "</th>";
            echo "<th>";
            echo $email;
            echo "</th>";
            echo "<th>";
            echo $observ;
            echo "</th>";

            echo "</tr>";


          }

     ?>

   </table>
  </body>
</html>
