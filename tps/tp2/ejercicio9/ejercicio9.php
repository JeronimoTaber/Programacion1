<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="ejercicio9_1.php" method="POST">
    <input type="hidden" name="dato1" value="<?php echo $_POST['dato1'] ?>">
    <input type="hidden" name="dato2" value="<?php echo $_POST['dato2'] ?>">
    <input type="hidden" name="dato3" value="<?php echo $_POST['dato3'] ?>">
    <?php
    echo 'Dato 1: '.$_POST['dato1'].'<br>';
    echo 'Dato 2: '.$_POST['dato2'].'<br>';
    echo 'Dato 3: '.$_POST['dato3'].'<br>';
    ?>
    <label for="dato4">Dato 4:</label>
    <input type="text" id="dato4" name="dato4"><br>
    <label for="dato5">Dato 5:</label>
    <input type="text" id="dato5" name="dato5"><br>
    <label for="dato6">Dato 6:</label>
    <input type="text" id="dato6" name="dato6"><br>
    <input type="submit" value="Enviar">
    </form>
  </body>
</html>
