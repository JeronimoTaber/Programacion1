<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    $str = "1,2,3,4,5,6,7,8,9";
print_r (explode(",",$str));
echo "<br>";
$arr = array(1,2,3,4,5,6,7,8,9);
echo implode(",",$arr);


      ?>
  </body>
</html>
