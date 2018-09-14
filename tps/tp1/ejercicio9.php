
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
    <?php
    $sumador=1;
    $sumador2=1;
    $letra = "A";
    $letras = "A";
    for ($i=0;$i<6;$i++){
      echo "<tr>";
      for ($c=0;$c<6;$c++){
        if($c==0 && $i == 0){
          echo "<td></td>";
        }
      else{
        if($i==0){
          echo "<td> $letra </td>";
          $letra++;

        }
        else if($c==0){
          echo "<td> $sumador </td>";
          $sumador++;}

        else{
          echo "<td> $letras$sumador2</td>";
          $letras++;
          $sumador2++;
        }
      }
    }
    echo "</tr>";
    $letras="A";
    $sumador2=1;
    }
    ?>
    </table>
  </body>
</html>
