<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
    <?php
    $sumador=0;
    for ($i=0;$i<5;$i++){
    echo "<tr>";
    for ($c=0;$c<5;$c++){
    echo "<td> $sumador </td>";
    $sumador++;}
    echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>
