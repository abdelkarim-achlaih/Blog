<?php
$host = 'localhost';
$username = 'root';
$password = '';

$dsn = 'mysql:host='.$host.';dbname=blog';
try {
  $pdo = new PDO($dsn, $username, $password);
}
catch (Exception $e) {
  die('Error: '.$e->getMessage());
}