<?php

require_once("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contact_form WHERE id=$id";
    $record = $conn->query($sql);
    if ($record->num_rows > 0) {
        $n = mysqli_fetch_array($record);
        $id_recuperado = $n['id'];
        $nombre_recuperado = $n['nombre'];
        $email_recuperado = $n['email'];
        $telefono_recuperado = $n['telefono'];
        $comentario_recuperado = $n['comentarios'];
    } else {
        print_r($record);
    }
    $conn->close();
}
?>