<?php
// Takes raw data from the request
$json = file_get_contents('php://input');

if (!$json) {
    echo json_encode(["status" => "false", "msg" => "No se han proporcionado credenciales"]);
    exit;
}

// Converts it into a PHP object
$data = json_decode($json);

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// prepare and bind
$stmt = $link->prepare("SELECT id, role_id FROM usuarios WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $data->email, $data->password);

// execute
$stmt->execute();
$stmt->bind_result($id_usuario, $role_id);
$stmt->fetch();

$stmt->close();
$link->close();

echo json_encode(["status" => "true", "id_usuario" => $id_usuario, "role_id" => $role_id]);
