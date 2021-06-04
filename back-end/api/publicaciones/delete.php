<?php
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión para eliminar un episodio"]);
    exit;
}

// Agarramos el json de la solicitud recibida
$json = file_get_contents('php://input');

if (empty($json)) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los datos necesarios"]);
    exit;
}

// Convertimos el json recibido a un objeto PHP
$data = json_decode($json);

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("DELETE FROM publicaciones WHERE id = ?");
$stmt->bind_param("i", $data->id);

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => false, "msg" => "No se ha eliminado la publicación"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Publicación eliminada con éxito"]);
