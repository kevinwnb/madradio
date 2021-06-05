<?php
header("Content-Type: application/json;charset=utf-8");

if ($_SESSION["role_id"] != 1) {
    echo json_encode(["status" => false, "msg" => "Solo administradores pueden crear o realizar cambios en otras cuentas"]);
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

require "../../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("INSERT INTO usuarios (nombre, email, password, role_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nombre, $email, $password, $role_id);

$nombre = $data->nombre;
$email = $data->email;
$password = password_hash($data->password, PASSWORD_DEFAULT);
$role_id = $data->role_id;

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => false, "msg" => "No se ha completado el registro"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Usuario registrado con éxito"]);
