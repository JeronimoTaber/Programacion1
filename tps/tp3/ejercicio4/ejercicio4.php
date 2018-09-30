
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="">Imagen</div>
    <?php
      $uploaddir = "imagenes/";
      $uploadfile = $uploaddir . basename($_FILES['userfile']['tmp_name']);

      echo "<p>";

      if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
      } else {
         echo "Upload failed";
      }
      echo "</p>";
$img = scandir("$uploaddir");

?>
<pre>
<?php
print_r($img);
 ?>
</pre>
<?php
$count = count($img);
?>

<table>


<?php
for ($i=2; $i < $count ; $i++) {
echo "<tr>";
      echo "<img src=\"".$uploaddir.$img[$i]."\" height=\"300\" width=\"300\">";
echo "<tr>";

}

     ?>
     </table>
  </body>
</html>
