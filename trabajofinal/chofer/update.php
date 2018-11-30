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
include_once '../objects/chofer.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$chofer = new Chofer($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of product to be edited
$chofer->chofer_id = $data->chofer_id;
$chofer->apellido = $data->apellido;
$chofer->nombre = $data->nombre;
$chofer->documento = $data->documento;
$chofer->email = $data->email;
$chofer->vehiculo_id = $data->vehiculo_id;
$chofer->sistema_id = $data->sistema_id;

// update the product
if($chofer->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Chofer was updated."));
}

// if unable to update the product, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update chofer."));
}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
