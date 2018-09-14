<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 9</title>
  </head>
  <body>
    <?php
    echo 'Dato 1: ' . $_POST['dato1'] . '<br>';
    echo 'Dato 2: ' . $_POST['dato2'] . '<br>';
    echo 'Dato 3: ' . $_POST['dato3'] . '<br>';
    echo 'Dato 4: ' . $_POST['dato4'] . '<br>';
    echo 'Dato 5: ' . $_POST['dato5'] . '<br>';
    echo 'Dato 6: ' . $_POST['dato6'] . '<br>';
    echo 'Dato 7: ' . $_POST['dato7'] . '<br>';
    echo 'Dato 8: ' . $_POST['dato8'] . '<br>';
    echo 'Dato 9: ' . $_POST['dato9'] . '<br>';
    echo "<a href='ejercicio9_3.php?
    dato1=".$_POST['dato1']."&"
    ."dato2=".$_POST['dato2']."&"
    ."dato3=".$_POST['dato3']."&"
    ."dato4=".$_POST['dato4']."&"
    ."dato5=".$_POST['dato5']."&"
    ."dato6=".$_POST['dato6']."&"
    ."dato7=".$_POST['dato7']."&"
    ."dato8=".$_POST['dato8']."&"
    ."dato9=".$_POST['dato9']."&"
    ."'>Enviar datos</a>";
    ?>
  </body>
</html>
