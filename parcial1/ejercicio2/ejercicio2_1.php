<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <form class="" action="ejercicio2_1.php" method="GET">
  <body>
    <?php
    $d=$_GET['lista1'];
    $m=$_GET['lista2'];
    $y=$_GET['lista3'];
    $ls=$_GET['grupo1'];
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
     $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

          $m2 = str_replace($meses_EN, $meses_ES, $m);
    if($ls == 1){

    echo "Hoy es el $d de $m2 de $y <br>";

    echo "Día: ";
        echo "<select name='lista1'>";


          for($i=1;$i<32;$i++){

            if($d==$i){
              echo "<option selected='selected' value='$i'>$i</option>";
            }else{
              echo "<option value='$i'>$i</option>";
            }
          }


          echo "</select>";
          echo "Mes: ";
          echo "<select name='lista2'>";
          $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

          for($i=1;$i<=12;$i++){

            $month=date("F",mktime(0,0,0,$i,0));
           $month2 = str_replace($meses_EN, $meses_ES, $month);

            if($m==$month){
              echo "<option selected=\"selected\" value=\"$m\">$m2</option>";
            }else{
              echo "<option value=\"$month\">$month2</option>";
            }
          }
          echo "</select>";
          echo "Año: ";

          echo "<select name='lista3'>";

          for($i=1900;$i<2101;$i++){

            if($i==$y){
              echo "<option selected=\"selected\" value=\"$i\">$y</option>";
            }else{
              echo "<option value=\"$i\">$i</option>";
            }
          }
          echo "  </select>";
          echo "Fecha Larga";
          echo "<input type='radio' name='grupo1' value='1' checked>";
          echo "Fecha Corta";
          echo "<input type='radio' name='grupo1' value='2'>";

  }


  else{
    $newm = date("m", strtotime("$m"));
echo "Hoy es el ";
echo date ("d/m/y", mktime (0,0,0,$newm,$d,$y));
echo "<br>";
$ds = date ("d", mktime (0,0,0,0,$d,0));
$ms = date ("m", mktime (0,0,0,$newm,1,0));
$ys = date ("y", mktime (0,0,0,$newm,$d,$y));


echo "Día: ";
    echo "<select name='lista1'>";


      for($i=1;$i<32;$i++){
        $ds2 = date ("d", mktime (0,0,0,0,$i,0));
        if($d==$i){
          echo "<option selected='selected' value='$i'>$ds</option>";
        }else{
          echo "<option value='$i'>$ds2</option>";
        }
      }


      echo "</select>";
      echo "Mes: ";
      echo "<select name='lista2'>";
      $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
      $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

      for($i=1;$i<13;$i++){
        $ms2 = date ("m", mktime (0,0,0,$i,0,0));
        $month=date("F",mktime(0,0,0,$i,0));
       $month2 = str_replace($meses_EN, $meses_ES, $month);

        if($m==$month){
          echo "<option selected=\"selected\" value=\"$month\">$ms</option>";
        }else{
          echo "<option value=\"$month\">$ms2</option>";
        }
      }
      echo "</select>";
      echo "Año: ";

      echo "<select name='lista3'>";

      for($i=1900;$i<2101;$i++){
      $ys2 = date ("y", mktime (0,0,0,$newm,$d,$i));

        if($i==$y){
          echo "<option selected=\"selected\" value=\"$i\">$ys</option>";
        }else{
          echo "<option value=\"$i\">$ys2</option>";
        }
      }
      echo "  </select>";
      echo "Fecha Larga";
      echo "<input type='radio' name='grupo1' value='1'>";
      echo "Fecha Corta";
      echo "<input type='radio' name='grupo1' value='2'checked>";




  }

 ?>
 <br><br><input type="submit" name="datos" value="Enviar Datos">
</form>
  </body>
</html>
