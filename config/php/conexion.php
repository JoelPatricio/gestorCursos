<?php
try {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "gestorcursos";
  $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec('SET NAMES "utf8"');
} catch (PDOexception $e) {
  echo "ERROR: " . $e->getMessage();
}