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
  include_once '../objects/auditoria.php';

  $database = new Database();
  $db = $database->getConnection();

  $auditoria = new Auditoria($db);

  // get posted data
  $data = json_decode(file_get_contents("php://input"));

  // make sure data is not empty

      // set product property values
      $auditoria->fecha_acceso = date('Y-m-d');
      $auditoria->user = $user;
      $auditoria->response_time = $time;
      $auditoria->endpoint = $page;
      $auditoria->created = date('Y-m-d H:i:s');
      // create the product
      if($auditoria->create()){

          // set response code - 201 created
          http_response_code(201);
      }

      // if unable to create the product, tell the user
      else{

          // set response code - 503 service unavailable
          http_response_code(503);

      }



} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
