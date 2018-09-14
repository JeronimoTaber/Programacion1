<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <?php
    $count=0;
    $add=0;
    echo "<table>";
foreach($_GET as $num ){

  echo "<tr>";
    echo "<td>";
  echo $num;
    echo "</td>";
  echo "</tr>";

  $add = $add + $num;

  $count++;


}

echo "</table>";

$prom = $add/$count;
echo "<br><p>El valor maximo es ".max($_GET)."</p>";
echo "<br><p>El valor minimo es ".min($_GET)."</p>";
echo "<br><p>El valor promedio es ".$prom."</p>";
     ?>


  </body>
</html>
