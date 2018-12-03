<?php
// required headers
if ($_SERVER['HTTP_REFERER'] == "select.php") {
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here

// include database and object files
include_once '../config/database.php';
include_once '../objects/sistema_transporte.php';

// instantiate database and sistema_transporte object
$database = new Database();
$db = $database->getConnection();

// initialize object
$sistema_transporte = new Sistema_transporte($db);

// read sistema_transportes will be here

$stmt = $sistema_transporte->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // sistema_transportes array
    $sistema_transporte_arr=array();
    $sistema_transporte_arr["sistema_transportes"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $sistema_transporte_item=array(
            "sistema_id" => $sistema_id,
            "nombre" => $nombre,
            "pais_procedencia" => $pais_procedencia,
            "created" => $created,
            "updated" => $updated
        );

        array_push($sistema_transporte_arr["sistema_transportes"], $sistema_transporte_item);
    }
    // set response code - 200 OK
      http_response_code(200);
      // show sistema_transportes data in json format
      echo json_encode($sistema_transporte_arr);
  }

  // no sistema_transportes found will be here

  else{

      // set response code - 404 Not found
      http_response_code(404);


      // tell the user no sistema_transportes found
      echo json_encode(
          array("message" => "No sistema_transportes found.")
      );
  }
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
