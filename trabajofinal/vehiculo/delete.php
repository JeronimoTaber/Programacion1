<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objects/sistema_vehiculo.php';
include_once '../objects/vehiculo.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare chofer object
$sistema_vehiculo = new Sistema_vehiculo($db);
$vehiculo = new Vehiculo($db);

// get chofer id
$data = json_decode(file_get_contents("php://input"));

// set chofer id to be deleted
$vehiculo->vehiculo_id = $data->vehiculo_id;
$sistema_vehiculo->vehiculo_id = $data->vehiculo_id;

// delete the chofer
if($sistema_vehiculo->delete() && $vehiculo->delete()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "chofer was deleted."));
}

// if unable to delete the chofer
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to delete chofer."));
}
?>
