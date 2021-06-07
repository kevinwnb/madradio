<?php
header("Content-Type: application/json;charset=utf-8");

if (!isset($_GET['id'])) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los parámetros necesarios"]);
    exit;
}

require "../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT comentarios.id, comentarios.comentario, usuarios.nombre, comentarios.fecha FROM publicaciones INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id INNER JOIN comentarios ON publicaciones.id = comentarios.id_publicacion WHERE publicaciones.id = ?");
$stmt->bind_param("i", $_GET["id"]);

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $comentario, $nombre_usuario, $fecha);
$comentarios = [];
while ($stmt->fetch()) {
    $comentarios[] = ["id" => $id, "comentario" => $comentario, "nombre_usuario" => $nombre_usuario, "fecha" => $fecha];
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "comentarios" => $comentarios]);
