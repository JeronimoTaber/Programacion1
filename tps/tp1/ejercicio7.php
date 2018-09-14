<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <pre>
    <?php
    $a = 0;
    $array = array();
      do {
        array_push($array,rand(1,30));
        $a ++;
    } while ($a < 10 || end($array) != 30);
    print_r ($array);
    asort($array);
    print_r ($array);
    print_r(array_chunk($array, ($a/2),TRUE));
     ?>
   </pre>
  </body>
</html>
