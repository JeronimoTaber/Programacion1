<?php
// get posted data
$start = microtime(true);
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$uri_search = explode('&', $_SERVER['REQUEST_URI'], 2);
include_once '../user/validate_token.php';
$_SERVER['HTTP_REFERER'] = 'select.php';
if($access == "true"){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include 'create.php';
  $page=url($uri_parts);
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (count($_GET)>1) {
    include 'search.php';
    $page=url($uri_parts)."/".$uri_search[1];
  }
  else{
    include 'read.php';
    $page=url($uri_parts);
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  include 'update.php';
  $page=url($uri_parts);
}
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  include 'delete.php';
  $page=url($uri_parts);
}
      $time = microtime(true) - $start;
      include_once '../auditoria/create.php';

}
else{
  $page=url($uri_parts);
  $user = "Invalid_user";
  $time = microtime(true) - $start;
  include_once '../auditoria/create.php';

}
function url($uri_parts){
  $page = $_SERVER['HTTP_HOST'].$uri_parts[0]."/".$_SERVER['REQUEST_METHOD'];
  return $page;
}
