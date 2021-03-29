<?php
require_once("config.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM contact_form WHERE id=$id";
    $result = $conn->query($sql);
    if (!$result = $conn->query($sql)) {
        die('Hubo un error tratando de correr el query [' . $conn->error . ']');
    } else {
        echo "El usuario se eliminó con éxito";
    }
} else {
    echo "Todos los campos obligatorios";
}
$conn->close();
