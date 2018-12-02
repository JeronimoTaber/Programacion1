<?php
// get posted data
$start = microtime(true);
include_once '../user/validate_token.php';
$_SERVER['HTTP_REFERER'] = 'select.php';
if($access == "true"){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include 'create.php';
  $page = "/sistema_transporte/create.php";
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (count($_GET)>1) {
    include 'search.php';
    $page = "/sistema_transporte/search.php";
  }
  else{
    include 'read.php';
    $page = "/sistema_transporte/read.php";
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  include 'update.php';
  $page = "/sistema_transporte/update.php";
}
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  include 'delete.php';
  $page = "/sistema_transporte/delete.php";
}
      $time = microtime(true) - $start;
      include_once '../auditoria/create.php';

}
else{
  $page = "sistema_transporte/";
  $user = "Invalid_user";
  $time = microtime(true) - $start;
  include_once '../auditoria/create.php';

}
