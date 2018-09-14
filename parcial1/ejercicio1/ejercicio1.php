<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="" action="ejercicio1_1.php" method="GET">

<?php
$varnum = $_GET['num'];
if ($varnum >= 5) {


for ($i=1; $i < $varnum+1; $i++) {
  echo "      <p>valore tabla ".$i."</p>";
  echo "<input type='text' name='num".$i."' value=''>";
}
echo "<input type='submit' name='' value='Enviar valor'>";
}
else{
  echo "<h2>Se ingreso un numero menor a 5</h2>";

  for ($i=1; $i < 6; $i++) {
      echo "      <p>valore tabla ".$i."</p>";
      echo "<input type='text' name='num".$i."' value=''>";
    }
    echo "<br><input type='submit' name='' value='Enviar valor'>";
  }


 ?>



    </form>


  </body>
</html>
