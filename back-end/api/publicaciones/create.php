<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión para publicar un episodio"]);
    exit;
}

$msg = "";

require "../../img_upload_script.php";
require "../../audio_upload_script.php";

// Agarramos el json de la solicitud recibida
$json = $_POST["json"];

if (empty($json)) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los datos necesarios"]);
    exit;
}

// Convertimos el json recibido a un objeto PHP
$data = json_decode($json);

$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("INSERT INTO publicaciones (titulo, descripcion, etiquetas, id_categoria, id_genero, id_usuario, url_imagen, url_audio, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiiisss", $titulo, $descripcion, $etiquetas, $id_categoria, $id_genero, $_SESSION["id_usuario"], $target_file_image, $target_file_audio, $fecha);

$titulo = $data->titulo;
$descripcion = $data->descripcion;
$etiquetas = $data->etiquetas;
$id_categoria = intval($data->id_categoria);
$id_genero = intval($data->id_genero);
$fecha = date('Y-m-d');

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => false, "msg" => "No se ha creado la publicación"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Publicación creada con éxito"]);
