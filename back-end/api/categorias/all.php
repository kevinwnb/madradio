<?php
header("Content-Type: application/json;charset=utf-8");

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("SELECT * FROM categorias");

// ejecutamos
$stmt->execute();
$stmt->bind_result($id, $nombre);
$categorias = [];
while ($stmt->fetch()) {
    $categorias[] = ["id" => $id, "nombre" => $nombre];
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "categorias" => $categorias]);
