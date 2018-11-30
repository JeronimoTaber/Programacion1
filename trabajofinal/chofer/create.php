<?php
// required headers
//public function CreateChofer($data){
if ($_SERVER['HTTP_REFERER'] == "select.php") {

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  date_default_timezone_set('America/Argentina/Mendoza');

  // get database connection
  include_once '../config/database.php';

  // instantiate product object
  include_once '../objects/chofer.php';

  $database = new Database();
  $db = $database->getConnection();

  $chofer = new Chofer($db);

  // get posted data
  $data = json_decode(file_get_contents("php://input"));

  // make sure data is not empty
  if(
      !empty($data->apellido) &&
      !empty($data->nombre) &&
      !empty($data->documento) &&
      !empty($data->email) &&
      !empty($data->vehiculo_id) &&
      !empty($data->sistema_id)
  ){

      // set product property values
      $chofer->apellido = $data->apellido;
      $chofer->nombre = $data->nombre;
      $chofer->documento = $data->documento;
      $chofer->email = $data->email;
      $chofer->vehiculo_id = $data->vehiculo_id;
      $chofer->sistema_id = $data->sistema_id;
      $chofer->created = date('Y-m-d H:i:s');

      // create the product
      if($chofer->create()){

          // set response code - 201 created
          http_response_code(201);

          // tell the user
          echo json_encode(array("message" => "Chofer was created."));
      }

      // if unable to create the product, tell the user
      else{

          // set response code - 503 service unavailable
          http_response_code(503);

          // tell the user
          echo json_encode(array("message" => "Unable to create chofer."));
      }
  }

  // tell the user data is incomplete
  else{

      // set response code - 400 bad request
      http_response_code(400);

      // tell the user
      echo json_encode(array("message" => "Unable to create chofer. Data is incomplete."));
  }
  //}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
