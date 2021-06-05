<?php
header("Content-Type: application/json;charset=utf-8");

if (!isset($_FILES["imagen"])) {
    echo json_encode(["status" => false, "msg" => "No se ha proporcionado la imágen"]);
    exit;
}

$target_dir_image = realpath(dirname(__FILE__)) . "/uploads/imagenes/";
$target_dir_image = str_replace('\\', '/', $target_dir_image);
$target_file_image = $target_dir_image . uniqid() . "." . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file_image, PATHINFO_EXTENSION));
$status = false;
$msg = "";

// Comprobamos que la imágen es válida
$check = getimagesize($_FILES["imagen"]["tmp_name"]);
if ($check !== false) {
    $status = true;
    $msg = "La imágen es válida - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    $status = false;
    $msg = "La imágen no es válida.";
    $uploadOk = 0;
}

// Comprobamos si uploadOk es 1 para subir la imágen
if ($uploadOk == 0) {
    $status = false;
    $msg = "La imágen no fue subida debido a errores presentes.";
} else {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file_image)) {
        $status = true;
        $msg = "La imágen " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subida.";
    } else {
        $status = false;
        $msg = "La imágen no fue subida.";
    }
}
