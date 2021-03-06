<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

// Agarramos el json de la solicitud recibida
$json = file_get_contents('php://input');

if (empty($json)) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado credenciales"]);
    exit;
}

// Convertimos el json recibido a un objeto PHP
$data = json_decode($json);

require "../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT id, role_id, password FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $data->email);

// ejecutamos
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows <= 0) {
    echo json_encode(["status" => false, "msg" => "Los credenciales son incorrectos"]);
    exit;
}
$stmt->bind_result($id_usuario, $role_id, $password);
$stmt->fetch();

if (!password_verify($data->password, $password)) {
    echo json_encode(["status" => false, "msg" => "Los credenciales son incorrectos"]);
    exit;
}

$stmt->close();
$link->close();

$_SESSION["id_usuario"] = $id_usuario;
$_SESSION["role_id"] = $role_id;

echo json_encode(["status" => true, "msg" => "Has iniciado sesión", "id_usuario" => $id_usuario, "role_id" => $role_id]);
