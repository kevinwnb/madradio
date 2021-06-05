<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

if (!isset($_SESSION["id_usuario"]) && !isset($_SESSION["role_id"])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión"]);
    exit;
}

$id_usuario = $_SESSION["id_usuario"];
$role_id = $_SESSION["role_id"];

echo json_encode(["status" => true, "id_usuario" => $id_usuario, "role_id" => $role_id]);
