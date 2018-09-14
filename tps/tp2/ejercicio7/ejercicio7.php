<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="" action="ejercicio7_1.php" method="GET">

<?php
$varnum = $_GET['num'];

for ($i=0; $i < $varnum; $i++) {
  echo "      <p>valore tabla ".$i."</p>";
  echo "<input type='text' name='num".$i."' value=''>";
}


 ?>
<input type="submit" name="" value="Enviar valor">


    </form>


  </body>
</html>
