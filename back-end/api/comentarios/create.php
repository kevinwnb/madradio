<?php
header("Content-Type: application/json;charset=utf-8");

if (!isset($_SESSION["id_usuario"])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión para escribir un comentario"]);
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

require "../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("INSERT INTO comentarios VALUES (?, ?, ?, ?)");
$stmt->bind_param("isis", $id_usuario, $comentario, $id_publicacion, $fecha);

$id_usuario = $_SESSION["id_usuario"];
$comentario = $data->comentario;
$id_publicacion = $data->id_publicacion;
$fecha = date('Y-m-d');

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => false, "msg" => "No se ha creado el comentario"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Comentario creado con éxito"]);
