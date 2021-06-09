<?php
header("Content-Type: application/json;charset=utf-8");

// Convertimos el json recibido a un objeto PHP
if (!isset($_GET["id"])) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los parámetros necesarios"]);
    exit;
}

$id = $_GET["id"];

require "../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT nombre, email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);

// ejecutamos
$stmt->execute();
$stmt->bind_result($nombre, $email);
$stmt->fetch();

$stmt->close();
$link->close();

echo json_encode(["status" => true, "nombre" => $nombre, "email" => $email]);
