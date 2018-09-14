<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $var1 = $_GET['dato1'];
    $var2 = $_GET['dato2'];
    $var3 = $_GET['dato3'];
if (isset($var3)) {
  echo "Variable 1: $var1 ";
  echo "<br>";
  echo "Variable 2: $var2 ";
  echo "<br>";
  echo "Variable 3: $var3 ";
  echo "<br>";
}
elseif (isset($var1)) {
  echo "Variable 1: $var1";
}
else {
  echo "No se ingresaron datos";
}
     ?>
  </body>
</html>
