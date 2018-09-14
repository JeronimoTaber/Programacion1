<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 9</title>
  </head>
  <body>
    <form action="ejercicio9_2.php" method="POST">
    <input type="hidden" name="dato1" value="<?php echo $_POST['dato1'] ?>">
    <input type="hidden" name="dato2" value="<?php echo $_POST['dato2'] ?>">
    <input type="hidden" name="dato3" value="<?php echo $_POST['dato3'] ?>">
    <input type="hidden" name="dato4" value="<?php echo $_POST['dato4'] ?>">
    <input type="hidden" name="dato5" value="<?php echo $_POST['dato5'] ?>">
    <input type="hidden" name="dato6" value="<?php echo $_POST['dato6'] ?>">
    <?php
    echo 'Dato 1: '.$_POST['dato1'].'<br>';
    echo 'Dato 2: '.$_POST['dato2'].'<br>';
    echo 'Dato 3: '.$_POST['dato3'].'<br>';
    echo 'Dato 4: '.$_POST['dato4'].'<br>';
    echo 'Dato 5: '.$_POST['dato5'].'<br>';
    echo 'Dato 6: '.$_POST['dato6'].'<br>';
    ?>
    <label for="dato7">Dato 7:</label>
    <input type="text" id="dato7" name="dato7"><br>
    <label for="dato8">Dato 8:</label>
    <input type="text" id="dato8" name="dato8"><br>
    <label for="dato9">Dato 9:</label>
    <input type="text" id="dato9" name="dato9"><br>
    <input type="submit" value="Enviar">
    </form>
  </body>
</html>
