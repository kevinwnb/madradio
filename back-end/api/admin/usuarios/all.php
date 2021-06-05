<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

if ($_SESSION["role_id"] != 1) {
    echo json_encode(["status" => false, "msg" => "Solo administradores pueden crear o realizar cambios en otras cuentas"]);
    exit;
}

require "../../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT * FROM usuarios");

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $nombre, $email, $role_id);
$usuarios = [];
while ($stmt->fetch()) {
    $usuarios[] = ["id" => $id, "nombre" => $nombre, "email" => $email, "role_id" => $role_id];
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "usuarios" => $usuarios]);
