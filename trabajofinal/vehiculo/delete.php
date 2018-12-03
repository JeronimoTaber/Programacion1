<?php
// required headers
if ($_SERVER['HTTP_REFERER'] == "select.php") {

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
//include_once '../objects/sistema_vehiculo.php';
include_once '../objects/vehiculo.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare vehiculo object
//$sistema_vehiculo = new Sistema_vehiculo($db);
$vehiculo = new Vehiculo($db);

// get vehiculo id
$data = json_decode(file_get_contents("php://input"));

// set vehiculo id to be deleted
$vehiculo->vehiculo_id = $data->vehiculo_id;
//$sistema_vehiculo->vehiculo_id = $data->vehiculo_id;

// delete the vehiculo
if($vehiculo->delete()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "vehiculo was deleted."));
}

// if unable to delete the vehiculo
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to delete vehiculo."));
}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
