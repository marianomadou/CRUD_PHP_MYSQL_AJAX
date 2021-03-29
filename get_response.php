<?php
require_once("config.php");
if ((isset($_POST['un_nombre']) && $_POST['un_nombre'] != '') &&
    (isset($_POST['un_email']) && $_POST['un_email'] != '')
) {
    $unNombre = $conn->real_escape_string($_POST['un_nombre']);
    $unEmail = $conn->real_escape_string($_POST['un_email']);
    $unTelefono = $conn->real_escape_string($_POST['un_telefono']);
    $unComentario = $conn->real_escape_string($_POST['un_comentario']);
    $sql = "INSERT INTO contact_form (nombre, email, telefono, comentarios) 
 VALUES ('" . $unNombre . "','" . $unEmail . "', '" . $unTelefono . "', '" . $unComentario . "')";
    if (!$result = $conn->query($sql)) {
        print_r($sql);
        die('Hubo un error tratando de correr el query [' . $conn->error . ']');
    } else {
        echo "El formulario se envió con éxito";
    }
} else {
    echo "Los campos 'nombre' y 'email' son obligatorios";
}
