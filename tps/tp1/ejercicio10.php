<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
  <table>

<?php
$string = '1,2,3,4;5,6,7,8;9,10,11,12;13,14,15,16;17,18,19,20;21,22,23,24;25,26,27,28';
$result = array();
foreach (explode(';', $string) as $piece) {
    $result[] = explode(',', $piece);
}


$filas = count($result);

$columnas = (count($result, COUNT_RECURSIVE)-$filas);

$div = $columnas/$filas;

for ($i=0; $i < $filas; $i++) {
  echo "<tr>";
  for ($c=0;$c<$div;$c++){
// echo "<td>" $result "</td>";
  //$sumador++;}
  echo "<td>";
   echo $result[$i][$c];
   echo"</td>";
  }
    echo "</tr>";
}
?>

</table>
</body>
</html>
