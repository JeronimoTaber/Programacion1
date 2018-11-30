<?php
// required headers
if ($_SERVER['HTTP_REFERER'] == "select.php") {

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here

// include database and object files
include_once '../config/database.php';
include_once '../objects/vehiculo.php';

// instantiate database and vehiculo object
$database = new Database();
$db = $database->getConnection();

// initialize object
$vehiculo = new Vehiculo($db);

// read vehiculos will be here

$stmt = $vehiculo->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // vehiculos array
    $vehiculo_arr=array();
    $vehiculo_arr["vehiculos"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $vehiculo_item=array(
            "vehiculo_id" => $vehiculo_id,
            "patente" => $patente,
            "anho_patente" => $anho_patente,
            "anho_fabricacion" => $anho_fabricacion,
            "marca" => $marca,
            "modelo" => $modelo,
            "created" => $created,
            "updated" => $updated
        );

        array_push($vehiculo_arr["vehiculos"], $vehiculo_item);
    }
    // set response code - 200 OK
      http_response_code(200);
      // show vehiculos data in json format
      echo json_encode($vehiculo_arr);
  }

  // no vehiculos found will be here

  else{

      // set response code - 404 Not found
      http_response_code(404);


      // tell the user no vehiculos found
      echo json_encode(
          array("message" => "No vehiculos found.")
      );
  }
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
