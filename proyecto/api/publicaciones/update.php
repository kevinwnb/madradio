<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión para actualizar un episodio"]);
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

require "../../db_conexion.php";

$stmt = $link->prepare("SELECT url_imagen, url_audio FROM publicaciones WHERE id = ?");
$stmt->bind_param("i", $id);

$id = $data->id;

// ejecutamos
$stmt->execute();
$stmt->bind_result($url_imagen, $url_audio);
$stmt->fetch();

// preparamos y adjuntamos los parámetros
$stmt = $link->prepare("UPDATE publicaciones SET titulo = ?, descripcion = ?, etiquetas = ?, id_categoria = ?, id_genero = ?, url_imagen = ?, url_audio = ?, WHERE id = ?");
$stmt->bind_param("sssiissi", $titulo, $descripcion, $etiquetas, $id_categoria, $id_genero, $new_url_imagen, $new_url_audio, $id);

$titulo = $data->titulo;
$descripcion = $data->descripcion;
$etiquetas = $data->etiquetas;
$id_categoria = $data->id_categoria;
$id_genero = $data->id_genero;
$new_url_imagen = $target_file_image == "" ? $url_imagen : $target_file_image;
$new_url_audio = $target_file_audio == "" ? $url_audio : $target_file_audio;
$id = $data->id;

// ejecutamos
$stmt->execute();

if ($stmt->affected_rows <= 0) {
    $stmt->close();
    $link->close();
    echo json_encode(["status" => false, "msg" => "No se ha actualizado la publicación"]);
    exit;
}

$stmt->close();
$link->close();

echo json_encode(["status" => true, "msg" => "Publicación actualizada con éxito"]);
