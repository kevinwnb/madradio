<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión para actualizar un episodio"]);
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
$stmt = $link->prepare("UPDATE publicaciones SET titulo = ?, descripcion = ?, etiquetas = ?, id_categoria = ?, id_genero = ? WHERE id = ?");
$stmt->bind_param("sssiii", $data->titulo, $data->descripcion, $data->etiquetas, $data->id_categoria, $data->id_genero, $data->id);

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => false, "msg" => "No se ha actualizado la publicación"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Publicación actualizada con éxito"]);
