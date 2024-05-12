<?php
$host = "localhost";
$username = "root";
$password = "";
$db="tp_gestion_vente_voitures";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
  $pdo = new PDO($dsn, $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($pdo) {
		// echo "Connected to the $db database successfully!";
	}
  return $pdo;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
