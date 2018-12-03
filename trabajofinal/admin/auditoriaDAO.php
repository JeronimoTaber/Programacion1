<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/menus.css">
  </head>
  <body>
<?php
session_start();
if ($_SESSION['session'] != "true") {
    header('Location: index.php');
    exit;
}
include_once '../config/database.php';
// instantiate vehiculo object
include_once 'objects/auditoria.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate auditoria object
$auditoria = new Auditoria($db);

// set auditoria property values


//metodo read de auditoria
if ($_POST['method'] == "read") {
    $stmt = $auditoria->read();
    $num  = $stmt->rowCount();
    // check if more than 0 record found
    if ($num > 0) {
?>
      <table>
      <tr>
      <th>auditoria_id</th>
      <th>fecha_acceso</th>
      <th>user</th>
      <th>response_time</th>
      <th>endpoint</th>
      <th>Created</th>
      </tr>
      <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($row as $collum) {
                echo "  <td>$collum</td>";

            }
            echo "</tr>";

        }
        echo "</table>";
    }

    else {

        // set response code - 404 Not found
        http_response_code(404);
        // tell the user no users found
        echo json_encode(array(
            "message" => "No auditorias found."
        ));
    }
?>
      <br><br>
      <button onclick="location.href = 'menu.php';" id="myButton" class="float-left submit-button" >Home</button>
    <?php
}


//metodo search de auditoria
if ($_POST['method'] == "search") {

    if (!empty($_POST['keywords'])) {
        // set auditoria property values
        $keywords = $_POST['keywords'];
        $stmt     = $auditoria->search($keywords);
        $num      = $stmt->rowCount();
        // check if more than 0 record found
        if ($num > 0) {
?>
      <table>
      <tr>
        <th>auditoria_id</th>
        <th>fecha_acceso</th>
        <th>user</th>
        <th>response_time</th>
        <th>endpoint</th>
        <th>Created</th>
      </tr>
      <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                foreach ($row as $collum) {
                    echo "  <td>$collum</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // set response code - 404 Not found
            http_response_code(404);
            // tell the user no users found
            echo json_encode(array(
                "message" => "No auditorias found."
            ));
        }
    } else {
        $Message = urlencode("Error: Data is incomplete");
        header("Location:menu.php?Message=" . $Message);
        die;
    }
?>
    <br><br>
    <button onclick="location.href = 'menu.php';" id="myButton" class="float-left submit-button" >Home</button>
  <?php
}


//metodo transfer to file de auditoria
if ($_POST['method'] == "file") {
    if (!empty($_POST['file']) && !empty($_POST['from']) && !empty($_POST['to'])) {
        $auditoria->from = $_POST['from'];
        $auditoria->to   = $_POST['to'];
        $stmt            = $auditoria->date();
        $num             = $stmt->rowCount();
        // check if more than 0 record found
        if ($num > 0) {
            $auditoria->from = $_POST['from'];
            $auditoria->to   = $_POST['to'];
            $file            = "../archivos/" . $_POST['file'] . ".txt";
            $archivo         = fopen($file, "w+");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $collum) {
                    fwrite($archivo, $collum);
                    fwrite($archivo, " ");
                }
                fwrite($archivo, ",");
            }
            fclose($archivo);
            $Message = urlencode("File exported");
            header("Location:menu.php?Message=" . $Message);
            die;
        }

        else {
            // set response code - 404 Not found
            http_response_code(404);
            $Message = urlencode("Error exporting file");
            header("Location:menu.php?Message=" . $Message);
            die;
        }
    } else {
        $Message = urlencode("Error: Data is incomplete");
        header("Location:menu.php?Message=" . $Message);
        die;
    }
?>
      <br><br>
      <button onclick="location.href = 'menu.php';" id="myButton" class="float-left submit-button" >Home</button>
    <?php

}
?>

</body>
</html>
