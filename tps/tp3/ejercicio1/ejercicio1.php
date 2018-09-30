
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="">Arreglo $_GET</div>
    <pre><?php print_r($_GET); ?></pre>
    <div class="">Arreglo $_POST</div>
    <pre><?php print_r($_POST); ?></pre>
    <div class="">Arreglo $_FILES</div>
    <pre><?php print_r($_FILES); ?></pre>
    <div class="">Mostrar contenido por pantalla</div>
      <pre><?php
        $archivo=fopen($_FILES['arch']['tmp_name'],"r");
          while ($fila =fgets($archivo)) {
            echo $fila;
          }

     ?></pre>
  </body>
</html>
