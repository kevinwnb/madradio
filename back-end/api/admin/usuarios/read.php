<?php
header("Content-Type: application/json;charset=utf-8");

if ($_SESSION["role_id"] != 1) {
    echo json_encode(["status" => false, "msg" => "Solo administradores pueden crear o realizar cambios en otras cuentas"]);
    exit;
}

if (!isset($_GET["id"])) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los parámetros necesarios"]);
    exit;
}

$id = $_GET["id"];

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT id, nombre, email, role_id FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $nombre, $email, $role_id);
$stmt->fetch();

$stmt->close();
$link->close();

echo json_encode(["status" => true, "id" => $id, "nombre" => $nombre, "email" => $email, "role_id" => $role_id]);
