<?php
header("Content-Type: application/json;charset=utf-8");

require "../../db_conexion.php";

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT id, nombre FROM generos");

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $nombre);
$generos = [];
while ($stmt->fetch()) {
    $generos[] = ["id" => $id, "nombre" => $nombre];
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "generos" => $generos]);
