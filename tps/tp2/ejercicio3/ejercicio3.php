<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $vartext1 = $_GET['texto1'];
      $vartext2 = $_GET['texto2'];
      $varhidden = $_GET['oculto'];
      $varpass = $_GET['clave'];
      $varcheck1 = $_GET['check1'];
      $varcheck2 = $_GET['check2'];
      $varcheck3 = $_GET['check3'];
      $vargroup1 = $_GET['grupo1'];
      $vargroup2 = $_GET['grupo2'];
      $varlist = $_GET['lista'];
      echo "texto 1 : ";
      echo "$vartext1";
      echo "<br>";
      echo "texto2 : ";
      echo "$vartext2";
      echo "<br>";
      echo "oculto : ";
      echo "$varhidden";
      echo "<br>";
      echo "clave : ";
      echo "$varpass";
      echo "<br>";
      echo "check1 : ";
      echo "$varcheck1";
      echo "<br>";
      echo "check2 : ";
      echo "$varcheck2";
      echo "<br>";
      echo "check3 : ";
      echo "$varcheck3";
      echo "<br>";
      echo "grupo1 : ";
      echo "$vargroup1";
      echo "<br>";
      echo "grupo2 : ";
      echo "$vargroup2";
      echo "<br>";
      echo "lista : ";
      echo "$varlist";
      echo "<br>";


      ?>
  </body>
</html>
