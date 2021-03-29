<?php
$host = "localhost";
$userName = "mariano";
$password = "mariano";
$dbName = "form_php";

$conn = new mysqli($host, $userName, $password, $dbName);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}
