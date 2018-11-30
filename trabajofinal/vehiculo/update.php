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
include_once '../objects/vehiculo.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare vehiculo object
$vehiculo = new Vehiculo($db);

// get id of vehiculo to be edited
$data = json_decode(file_get_contents("php://input"));
if(
    !empty($data->vehiculo_id) &&
    !empty($data->patente) &&
    !empty($data->anho_patente) &&
    !empty($data->marca) &&
    !empty($data->modelo) &&
    !empty($data->sistema_id) &&
    !empty($data->old_sistema_id)
){
// set ID property of vehiculo to be edited
$vehiculo->vehiculo_id = $data->vehiculo_id;
$vehiculo->patente = $data->patente;
$vehiculo->anho_patente = $data->anho_patente;
$vehiculo->anho_fabricacion = $data->anho_fabricacion;
$vehiculo->marca = $data->marca;
$vehiculo->modelo = $data->modelo;
$vehiculo->sistema_id = $data->sistema_id;
$vehiculo->old_sistema_id = $data->old_sistema_id;

// update the vehiculo
if($vehiculo->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "vehiculo was updated."));
}

// if unable to update the vehiculo, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update vehiculo."));
}
}
else{
    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to update vehiculo. Data is incomplete."));
}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
