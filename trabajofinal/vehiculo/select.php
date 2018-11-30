<?php
include '../user/validate_token.php';
$_SERVER['HTTP_REFERER'] = 'select.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include 'create.php';
exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (count($_GET)>1) {
    include 'search.php';
  }
  else{
    include 'read.php';
  }
exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  include 'update.php';
exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  include 'delete.php';
exit;
}
