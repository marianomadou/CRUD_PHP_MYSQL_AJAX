<?php
require_once("config.php");

$sql = "SELECT id, nombre, email, telefono, comentarios FROM contact_form ";
$result_array = array();

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($result_array, $row);
    }
}else{
    print_r($result);
}

if (!$result = $conn->query($sql)) {
    die('Hubo un error tratando de correr el query [' . $conn->error . ']');
} else {
    header('Content-type: application/json');
    echo json_encode($result_array);
}

$conn->close();
