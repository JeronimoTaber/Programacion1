<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<table>
    <?php

    $varfila = $_GET['fila'];
    $varcolumna = $_GET['columna'];
    $count=0;
for ($i=0; $i < $varfila; $i++) {
  echo "<tr>";
  for ($a=0; $a < $varcolumna ; $a++) {
    echo "<td>$count</td>";
    $count++;
  }
  echo "</tr>";
}

     ?>
     </table>
  </body>
</html>
