<?php
header("Content-Type: application/json;charset=utf-8");

// Convertimos el json recibido a un objeto PHP
if (!isset($_GET["id"])) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los parámetros necesarios"]);
    exit;
}

$id = $_GET["id"];

require "../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT * FROM publicaciones WHERE id = ?");
$stmt->bind_param("i", $id);

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $titulo, $descripcion, $etiquetas, $id_categoria, $id_genero, $id_usuario, $url_imagen, $url_audio, $fecha);
$stmt->fetch();

$stmt->close();
$link->close();

echo json_encode(["status" => true, "id" => $id, "titulo" => $titulo, "etiquetas" => $etiquetas, "id_categoria" => $id_categoria, "id_genero" => $id_genero, "id_usuario" => $id_usuario, "id_usuario" => $id_usuario, "url_imagen" => $url_imagen, "url_audio" => $url_audio, "fecha" => $fecha]);
