<?php

require_once("config.php");
$id = $_POST['id'];
print_r($id);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if ((isset($_POST['un_nombre']) && $_POST['un_nombre'] != '') &&
        (isset($_POST['un_email']) && $_POST['un_email'] != '') &&
        (isset($_POST['un_telefono']) && $_POST['un_telefono'] != '') &&
        (isset($_POST['un_comentario']) && $_POST['un_comentario'] != '')
    ) {
        $nombre = $_POST['un_nombre'];
        $email = $_POST['un_email'];
        $telefono = $_POST['un_telefono'];
        $comentario = $_POST['un_comentario'];
    }
    $sql = "UPDATE contact_form SET nombre='$nombre',email='$email',telefono='$telefono',comentarios='$comentario' WHERE id=$id";
    $result = $conn->query($sql);

    if (!$result = $conn->query($sql)) {
        die('Hubo un error tratando de correr el query [' . $conn->error . ']');
    } else {
        echo "El usuario se editó con éxito";
    }
} else {
    echo "Todos los campos obligatorios";
}
$conn->close();
