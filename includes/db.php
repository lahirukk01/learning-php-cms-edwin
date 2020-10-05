<?php

$servername = "localhost";
$username = "homestead";
$password = "secret";

try {
  $conn = new PDO("mysql:host=$servername;dbname=homestead", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}