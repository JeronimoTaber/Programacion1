<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Argentina/Mendoza');

// get database connection
include_once '../config/database.php';

// instantiate vehiculo object
include_once '../objects/vehiculo.php';
//include_once '../objects/sistema_vehiculo.php';

$database = new Database();
$db = $database->getConnection();

$vehiculo = new Vehiculo($db);
//$sistema_vehiculo = new Sistema_vehiculo($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->patente) &&
    !empty($data->anho_patente) &&
    !empty($data->marca) &&
    !empty($data->modelo) &&
    !empty($data->sistema_id)
){
  //$array=array();
  //$array = $data->sistema_id;

    // set vehiculo property values
    $vehiculo->patente = $data->patente;
    $vehiculo->anho_patente = $data->anho_patente;
    $vehiculo->anho_fabricacion = $data->anho_fabricacion;
    $vehiculo->marca = $data->marca;
    $vehiculo->modelo = $data->modelo;
    $vehiculo->created = date('Y-m-d H:i:s');
    //$sistema_vehiculo->patente = $data->patente;
    $vehiculo->sistema_id = $data->sistema_id;
    //$sistema_vehiculo->created = date('Y-m-d H:i:s');
    //echo json_encode($vehiculo->anho_fa);
    // create the vehiculo

  if($vehiculo->create()/* && $sistema_vehiculo->create()*/){
/* */
        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "vehiculo was created."));
    }

    // if unable to create the vehiculo, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create vehiculo."));
    }
}

// tell the user data is incomplete

else{
    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create vehiculo. Data is incomplete."));
}
?>
