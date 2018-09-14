<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <pre>
    <?php
    $ran =rand(5,15);
    $suma = 0;
    $num20 = 0;
    echo "La cantidad de numeros es: ".$ran."<br>";
    for ($i=0; $i < $ran; $i++) {
      $array[$i] = rand(1,100);
      $suma += $array[$i];
      if($i==0){
        $max = $array[$i];
        $min = $array[$i];
      }
      else{
        if($array[$i] > $max){
          $max = $array[$i];
        }
        if($array[$i] < $min){
          $min = $array[$i];
        }

      }
      if($array[$i] == 20){

        $num20 ++;
      }
    }
    $promedio = ($suma/$ran);
    print_r ($array);
    echo "El promedio es: ".$promedio."<br>";
    echo "El mayor es el numero: ".$max."<br>";
    echo "El menor es el numero: ".$min."<br>";
    echo "Se encuentran ".$num20." veces el numero 20";


     ?>
   </pre>
  </body>
</html>
