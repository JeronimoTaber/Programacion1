<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objects/sistema_transporte.php';
include_once '../objects/sistema_vehiculo.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare chofer object
$sistema_transporte = new Sistema_transporte($db);
$sistema_vehiculo = new Sistema_vehiculo($db);

// get chofer id
$data = json_decode(file_get_contents("php://input"));

// set chofer id to be deleted
$sistema_transporte->sistema_id = $data->sistema_id;
$sistema_vehiculo->sistema_id = $data->sistema_id;

// delete the chofer
if($sistema_vehiculo->deletesis() && $sistema_transporte->delete()){
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
