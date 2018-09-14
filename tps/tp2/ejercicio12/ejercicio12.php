<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="ejercicio12_1.php" method="GET">

      <?php
        echo "Día: ";
            echo "<select name='lista1'>";


              for($i=1;$i<32;$i++){
                $dia=date("j");
                if($dia==$i){
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
                $mes=date("F");
                $mes2 = str_replace($meses_EN, $meses_ES, $mes);
                if($mes2==$month2){
                  echo "<option selected=\"selected\" value=\"$mes2\">$mes2</option>";
                }else{
                  echo "<option value=\"$month2\">$month2</option>";
                }
              }
              echo "</select>";
              echo "Año: ";

              echo "<select name='lista3'>";

              for($i=1900;$i<2101;$i++){
                $año=date("Y");
                if($i==$año){
                  echo "<option selected=\"selected\" value=\"$i\">$año</option>";
                }else{
                  echo "<option value=\"$i\">$i</option>";
                }
              }
              echo "  </select>";
              ?>


            <br><br><input type="submit" name="datos" value="Enviar Datos">
     </form>
  </body>
</html>
