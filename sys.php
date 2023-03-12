<?php
ob_start();
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospitalappointmentsystem";

try {
  $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
  print $e->getMessage();
}

?>