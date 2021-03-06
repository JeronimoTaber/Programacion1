<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
//include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/auditoria.php';

// instantiate database and auditoria object
$database = new Database();
$db = $database->getConnection();

// initialize object
$auditoria = new Auditoria($db);

// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";

/*--------------------------------*/
//si se deja $keywords=$_GET["s"];
//y en la funcion search de auditoria.php se deja un solo LIKE y se sacan los bind param que sobran
//se puede hacer una busqueda con 1 solo parametro
/*--------------------------------*/

// query auditorias
$stmt = $auditoria->search($keywords);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // auditorias array
    $auditoria_arr=array();
    $auditoria_arr["auditorias"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $auditoria_item=array(
          "auditoria_id" => $auditoria_id,
          "fecha_acceso" => $fecha_acceso,
          "user" => $user,
          "response_time" => $response_time,
          "endpoint" => $endpoint,
          "created" => $created
        );

        array_push($auditoria_arr["auditorias"], $auditoria_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show auditorias data
    echo json_encode($auditoria_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no auditorias found
    echo json_encode(
        array("message" => "No auditorias found.")
    );
}
?>
