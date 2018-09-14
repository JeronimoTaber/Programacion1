<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      echo "Incremento INT<br>";
      for ($i=0; $i < 10; $i++) {
        echo $i;

      }
      echo "<br>";
      echo "Incremento Letra 1<br>";
      $letra="a";
      for ($i=0; $i < 10; $i++) {
        echo $letra;
        $letra++;
      }
      echo "<br>";
      echo "Incremento Letra 2<br>";
    $letra2="r";
    for ($i=0; $i < 10; $i++) {
      echo $letra2;
      $letra2++;
    }
    echo "<br>";
    echo "Incremento Letra y Numero 1<br>";
  $letra3="a1";
  for ($i=0; $i < 10; $i++) {
    echo $letra3;
    $letra3++;
  }
  echo "<br>";
  echo "Incremento Letra y Numero 2<br>";
$letra4="a01";
for ($i=0; $i < 10; $i++) {
  echo $letra4;
  $letra4++;
}
echo "<br>";
echo "Incremento Letra y Numero 3<br>";
$letra5="a90";
for ($i=0; $i < 10; $i++) {
echo $letra5;
$letra5++;
}
echo "<br>";

     ?>
  </body>
</html>
