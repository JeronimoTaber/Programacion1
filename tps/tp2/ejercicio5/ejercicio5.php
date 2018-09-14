<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if(isset($_GET['grupo1']) && isset($_GET['grupo2'])){
    echo "Radio grupo 1: {$_GET['grupo1']} <br>";
    echo "Radio grupo 2: {$_GET['grupo2']} <br>";
  }
  if(isset($_GET['check1']) && isset($_GET['check3'])){
    echo "Checkbox 1: {$_GET['check1']} <br>";
    echo "Checkbox 2: {$_GET['check2']} <br>";
    echo "Checkbox 3: {$_GET['check3']} <br>";
}
if(isset($_GET['texto1']) && isset($_GET['texto3'])){
    echo "Textbox 1: {$_GET['texto1']} <br>";
    echo "Textbox 2: {$_GET['texto2']} <br>";
    echo "Hidden: {$_GET['oculto']} <br>";
    echo "Password: {$_GET['clave']} <br>";
    }

    if(isset($_GET['lista'])){
    echo "Lista desplegable: {$_GET['lista']} <br>";
    }
    
     ?>
  </body>
</html>
