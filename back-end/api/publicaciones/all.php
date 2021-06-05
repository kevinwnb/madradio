<?php
header("Content-Type: application/json;charset=utf-8");

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT * FROM publicaciones");

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $titulo, $descripcion, $etiquetas, $id_categoria, $id_genero, $id_usuario, $url_imagen, $url_audio, $fecha);
$publicaciones = [];
while ($stmt->fetch()) {
    $publicaciones[] = ["id" => $id, "titulo" => $titulo, "descripcion" => $descripcion, "etiquetas" => $etiquetas, "id_categoria" => $id_categoria, "id_genero" => $id_genero, "id_usuario" => $id_usuario, "url_imagen" => $url_imagen, "url_audio" => $url_audio, "fecha" => $fecha];
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "publicaciones" => $publicaciones]);
