<?php
// show error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// set your default time-zone
date_default_timezone_set('America/Argentina/Mendoza');

// variables used for jwt
$key = "token_key";//nombre secreto para encriptar y desencriptar token
$iat = time();//identifica el tieempo en el cual el token fue creado
$exp = $iat + 10000;//identifica el tiempo en el cual el token expira
//el tiempo de nbf es menor al iat para evitar probemas de region
?>
