<?php
// required headers
if ($_SERVER['HTTP_REFERER'] == "select.php") {
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
//include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/chofer.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$chofer = new Chofer($db);

// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";

/*--------------------------------*/
//si se deja $keywords=$_GET["s"];
//y en la funcion search de chofer.php se deja un solo LIKE y se sacan los bind param que sobran
//se puede hacer una busqueda con 1 solo parametro
/*--------------------------------*/

// query products
$stmt = $chofer->search($keywords);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $chofer_arr=array();
    $chofer_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $chofer_item=array(
            "chofer_id" => $chofer_id,
            "apellido" => $apellido,
            "nombre" => $nombre,
            "documento" => $documento,
            "email" => $email,
            "vehiculo_id" => $vehiculo_id,
            "sistema_id" => $sistema_id,
            "created" => $created,
            "updated" => $updated,
            "patente" => $patente
        );

        array_push($chofer_arr["records"], $chofer_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data
    echo json_encode($chofer_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
} else {
  echo json_encode(array("message" => "Access trough select.php."));
}
