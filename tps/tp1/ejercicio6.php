<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <pre>
    <?php


$array2 = array();

    for ($i=0; $i < 15; $i++) {
      $array[$i] = rand(1,50);
    }

    for ($i=0; $i < 15; $i++) {
      for ($a=0; $a < $i+1; $a++) {
        if($i != $a){
          if($array[$i] == $array[$a]){
            echo "Tiene los mismos valores en ".$a." y en ".$i. "<br>";
          }
      }
    }
  }

  $array2=array_unique($array);

    print_r ($array);

    print_r ($array2);

     ?>
    </pre>
  </body>
</html>
