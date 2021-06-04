<?php
if (!isset($_FILES["imagen"])) {
    echo json_encode(["status" => false, "msg" => "No se ha proporcionado la imágen"]);
    exit;
}

$target_dir_image = "uploads/imagenes/";
$target_file_image = $target_dir . uniqid() . basename($_FILES["imagen"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
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

echo json_encode(["status" => $status, "msg" => $msg]);
