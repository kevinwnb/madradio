<?php
// Agarramos el json de la solicitud recibida
$json = file_get_contents('php://input');

if (empty($json)) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado credenciales"]);
    exit;
}

// Convertimos el json recibido a un objeto PHP
$data = json_decode($json);

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT id, role_id FROM usuarios WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $data->email, $data->password);

// ejecutamos
$stmt->execute();
$stmt->bind_result($id_usuario, $role_id);
$stmt->fetch();

$stmt->close();
$link->close();

echo json_encode(["status" => true, "id_usuario" => $id_usuario, "role_id" => $role_id]);
