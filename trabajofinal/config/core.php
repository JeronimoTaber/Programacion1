<?php
// show error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// set your default time-zone
date_default_timezone_set('America/Argentina/Mendoza');

// variables used for jwt
$key = "token_key";//nombre secreto para encriptar y desencriptar token
$iss = "http://example.org";//identifica a la pag que creo el token
$aud = "http://example.com";//identifica a la pag que recivio el token
$iat = time();//identifica el tieempo en el cual el token fue creado
$exp = $iat + 300;//identifica el tiempo en el cual el token expira
//el tiempo de nbf es menor al iat para evitar probemas de region
?>
