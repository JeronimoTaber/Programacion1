<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $logfile = "log.txt";
if($logfile) {
header ("Content-Disposition: attachment; filename=$logfile ");
header ("Content-Type: application/force-download");
header ("Content-Length: ".filesize($logfile));
readfile($logfile);
} else {
 echo 'Archivo no encontrado';
 }
    ?>
  </body>
</html>
