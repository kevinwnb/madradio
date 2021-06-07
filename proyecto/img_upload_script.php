<?php
header("Content-Type: application/json;charset=utf-8");

$target_dir_image = "";

if (!isset($_FILES["imagen"]) && !isset($data->id)) {
    $status = false;
    $msg = "No se ha proporcionado la imágen";
} else {
    $target_dir_image = realpath(dirname(__FILE__)) . "/uploads/imagenes/";
    $target_dir_image = str_replace('\\', '/', $target_dir_image);
    $file_name = uniqid() . "." . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
    $target_file_image = $target_dir_image . $file_name;
    $uploadOk = 0;
    $imageFileType = strtolower(pathinfo($target_file_image, PATHINFO_EXTENSION));
    $status = false;

    // Comprobamos que la imágen es válida
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        $status = true;
        $msg = "La imágen es válida - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo json_encode(["status" => false, "msg" => "La imágen no es válida"]);
        exit;
    }

    // Comprobamos si uploadOk es 1 para subir la imágen
    if ($uploadOk == 0) {
        echo json_encode(["status" => false, "msg" => "La imágen no fue subida debido a errores presentes."]);
        exit;
    } else {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file_image)) {
            $status = true;
            $msg = "La imágen " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subida.";
        } else {
            echo json_encode(["status" => false, "msg" => "La imágen no fue subida"]);
            exit;
        }
    }
}

if (!$status) {
    echo json_encode(["status" => $status, "msg" => $msg]);
    exit;
}

$target_file_image = "/uploads/imagenes/" . $file_name;
