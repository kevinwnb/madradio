<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión para eliminar un comentario"]);
    exit;
}

if (!isset($_GET['id'])) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los parámetros necesarios"]);
    exit;
}

require "../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("DELETE FROM comentarios WHERE id = ?");
$stmt->bind_param("i", $id);

$id = $_GET["id"];

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => false, "msg" => "No se ha eliminado el comentario"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Comentario eliminado con éxito"]);
