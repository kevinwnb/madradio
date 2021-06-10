<?php
header("Content-Type: application/json;charset=utf-8");

// Agarramos el json de la solicitud recibida
$json = file_get_contents("php://input");

if (empty($json)) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los datos necesarios"]);
    exit;
}

// Convertimos el json recibido a un objeto PHP
$data = json_decode($json);

require "../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("INSERT INTO contactos (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $telefono, $mensaje);

$nombre = $data->nombre;
$email = $data->email;
$telefono = $data->telefono;
$mensaje = $data->mensaje;

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    echo json_encode(["status" => false, "msg" => "No se ha enviado tu mensaje"]);
    $stmt->close();
    $link->close();
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Mensaje enviado con éxito"]);
