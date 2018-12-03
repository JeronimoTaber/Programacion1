<?php
// required headers
if ($_SERVER['HTTP_REFERER'] == "select.php") {
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/sistema_transporte.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare sistema_transporte object
$sistema_transporte = new Sistema_transporte($db);

// get id of sistema_transporte to be edited
$data = json_decode(file_get_contents("php://input"));
if(
    !empty($data->sistema_id) &&
    !empty($data->nombre) &&
    !empty($data->pais_procedencia)
){
// set ID property of sistema_transporte to be edited
$sistema_transporte->sistema_id = $data->sistema_id;
$sistema_transporte->nombre = $data->nombre;
$sistema_transporte->pais_procedencia = $data->pais_procedencia;

// update the sistema_transporte
if($sistema_transporte->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "sistema_transporte was updated."));
}

// if unable to update the sistema_transporte, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update sistema_transporte."));
}
}
else {
  // set response code - 400 bad request
  http_response_code(400);

  // tell the user
  echo json_encode(array("message" => "Unable to update sistema_transporte. Data is incomplete."));
}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
