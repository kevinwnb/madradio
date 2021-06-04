<?php
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["status" => false, "msg" => "Debes iniciar sesión para publicar un episodio"]);
    exit;
}

require "../../img_upload_script.php";

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
$stmt = $link->prepare("INSERT INTO publicaciones VALUES ?, ?, ?, ?, ?, ?, ?");
$stmt->bind_param("sssiiis", $data->titulo, $data->descripcion, $data->etiquetas, $data->id_categoria, $data->id_genero, $_SESSION["id_usuario"], $data->fecha);

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
