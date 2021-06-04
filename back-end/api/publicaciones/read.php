<?php
// Agarramos el json de la solicitud recibida
$json = file_get_contents('php://input');

if (empty($json)) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los datos necesarios"]);
    exit;
}

// Convertimos el json recibido a un objeto PHP
$id = $_GET["id"];

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT * FROM publicaciones WHERE id = ?");
$stmt->bind_param("i", $id);

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $titulo, $descripcion, $etiquetas, $id_categoria, $id_genero, $id_usuario, $fecha);
$stmt->fetch();

$stmt->close();
$link->close();

echo json_encode(["status" => true, "id" => $id, "titulo" => $titulo, "etiquetas" => $etiquetas, "id_categoria" => $id_categoria, "id_genero" => $id_genero, "id_usuario" => $id_usuario, "fecha" => $fecha]);
