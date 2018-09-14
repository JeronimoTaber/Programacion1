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
      echo "<form action='ejercicio8.php' method='GET'>";
      echo "texto 1 : ";
      echo "<input type='text' name='texto1' value='$vartext1'>";
      echo "<br>";
      echo "texto2 : ";
      echo "<input type='text' name='texto1' value='$vartext2'";
      echo "<br>";
      echo "<br>";
      echo "oculto : ";
      echo "<br><input type='hidden' name='oculto' value='$varhidden'";
      echo "<br>";
      echo "clave : ";
      echo "<input type='password' name='clave' value='$varpass'";
      echo "<br>";
        echo "<br>";
      if ($varcheck1==1) {
        echo "check1 : ";
        echo "<input type='checkbox' name='check1' value='$varcheck1' checked>";
      }
      else {
        echo "check1 : ";
        echo "<input type='checkbox' name='check1' value='$varcheck1'>";
      }

      echo "<br>";
      if ($varcheck2==1) {
        echo "check2 : ";
        echo "<input type='checkbox' name='check2' value='$varcheck2' checked>";
      }
      else {
        echo "check2 : ";
        echo "<input type='checkbox' name='check2' value='$varcheck2'>";
      }
      echo "<br>";
      if ($varcheck3==1) {
        echo "check3 : ";
        echo "<input type='checkbox' name='check3' value='$varcheck3' checked>";
      }
      else {
        echo "check3 : ";
        echo "<input type='checkbox' name='check3' value='$varcheck3'>";
      }
      echo "<br>";
      echo "<p>grupo 1</p>";
      if ($vargroup1==1) {
      echo "<input type='radio' name='grupo1' value='1' checked>";
      echo "<input type='radio' name='grupo1' value='2'>";
      echo "<input type='radio' name='grupo1' value='3'>";
      }
      elseif ($vargroup1==2) {
      echo "<input type='radio' name='grupo1' value='1'>";
      echo "<input type='radio' name='grupo1' value='2' checked>";
      echo "<input type='radio' name='grupo1' value='3'>";
      }
      elseif ($vargroup1==3) {
      echo "<input type='radio' name='grupo1' value='1'>";
      echo "<input type='radio' name='grupo1' value='2'>";
      echo "<input type='radio' name='grupo1' value='3' checked>";
      }
      else {
        echo "<input type='radio' name='grupo1' value='1'>";
        echo "<input type='radio' name='grupo1' value='2'>";
        echo "<input type='radio' name='grupo1' value='3'>";
      }
      echo "<br>";
      echo "<p>grupo 2</p>";
      if ($vargroup2==1) {
      echo "<input type='radio' name='grupo2' value='1' checked>";
      echo "<input type='radio' name='grupo2' value='2'>";
      echo "<input type='radio' name='grupo2' value='3'>";
      }
      elseif ($vargroup2==2) {
      echo "<input type='radio' name='grupo2' value='1'>";
      echo "<input type='radio' name='grupo2' value='2' checked>";
      echo "<input type='radio' name='grupo2' value='3'>";
      }
      elseif ($vargroup2==3) {
      echo "<input type='radio' name='grupo2' value='1'>";
      echo "<input type='radio' name='grupo2' value='2'>";
      echo "<input type='radio' name='grupo2' value='3' checked>";
      }
      else {
        echo "<input type='radio' name='grupo2' value='1'>";
        echo "<input type='radio' name='grupo2' value='2'>";
        echo "<input type='radio' name='grupo2' value='3'>";
      }
      echo "<br>";

      echo "lista : ";
      echo "<select class='' name='lista'>";
      if ($varlist=="1") {
        echo "<option selected='selected' value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
      }
      if ($varlist=="2") {
        echo "<option value='1'>1</option>";
        echo "<option selected='selected' value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
      }
      if ($varlist=="3") {
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option selected='selected' value='3'>3</option>";
        echo "<option value='4'>4</option>";
      }
      if ($varlist=="4") {
        echo "<optionvalue='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='3'>3</option>";
        echo "<option selected='selected' value='4'>4</option>";
      }

        echo "</select>";
        echo "<br>";
        echo "<button type='submit' name='button'>Enviar</button>";

        echo "</form>";
      ?>
  </body>
</html>
