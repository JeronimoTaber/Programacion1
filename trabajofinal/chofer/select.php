<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include 'create.php';
exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (empty($_GET)) {
    include 'read.php';
}
  else{
    include 'search.php';
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
