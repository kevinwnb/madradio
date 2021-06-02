<?php
// Takes raw data from the request
$json = file_get_contents('php://input');

if (!$json) {
    echo json_encode(["status" => "false", "msg" => "No se han proporcionado los datos necesarios"]);
    exit;
}

// Converts it into a PHP object
$data = json_decode($json);

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// prepare and bind
$stmt = $link->prepare("INSERT INTO usuarios VALUES ?, ?, ?");
$stmt->bind_param("ssi", $data->email, $data->password, $data->role_id);

// execute
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => "false", "msg" => "No se ha completado el registro"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => "true", "msg" => "Usuario registrado con éxito"]);
