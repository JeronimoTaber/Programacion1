<?php
// required headers
if ($_SERVER['HTTP_REFERER'] == "select.php") {

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
//include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/vehiculo.php';

// instantiate database and chofer object
$database = new Database();
$db = $database->getConnection();

// initialize object
$vehiculo = new Vehiculo($db);

// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";

/*--------------------------------*/
//si se deja $keywords=$_GET["s"];
//y en la funcion search de vehiculo.php se deja un solo LIKE y se sacan los bind param que sobran
//se puede hacer una busqueda con 1 solo parametro
/*--------------------------------*/

// query chofers
$stmt = $vehiculo->search($keywords);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // chofers array
    $vehiculo_arr=array();
    $vehiculo_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $vehiculo_item=array(
            "vehiculo_id" => $vehiculo_id,
            "patente" => $patente,
            "anho_patente" => $anho_patente,
            "anho_fabricacion" => $anho_fabricacion,
            "marca" => $marca,
            "modelo" => $modelo,
            "created" => $created,
            "updated" => $updated,
            "nombre" => $nombre
        );


        array_push($vehiculo_arr["records"], $vehiculo_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show chofers data
    echo json_encode($vehiculo_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no chofers found
    echo json_encode(
        array("message" => "No vehiculo found.")
    );
}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
