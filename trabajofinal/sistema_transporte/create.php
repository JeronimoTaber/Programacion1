<?php
// required headers
if ($_SERVER['HTTP_REFERER'] == "select.php") {
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Argentina/Mendoza');

// get database connection
include_once '../config/database.php';

// instantiate sistema_transporte object
include_once '../objects/sistema_transporte.php';

$database = new Database();
$db = $database->getConnection();

$sistema_transporte = new Sistema_transporte($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->nombre) &&
    !empty($data->pais_procedencia)
){

    // set sistema_transporte property values
    $sistema_transporte->nombre = $data->nombre;
    $sistema_transporte->pais_procedencia = $data->pais_procedencia;
    $sistema_transporte->created = date('Y-m-d H:i:s');

    // create the sistema_transporte
    if($sistema_transporte->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "sistema_transporte was created."));
    }

    // if unable to create the sistema_transporte, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create sistema_transporte."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create sistema_transporte. Data is incomplete."));
}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
