<?php
header("Content-Type: application/json;charset=utf-8");

if (!isset($_FILES["audio"])) {
    $msg = "No se ha proporcionado el audio";
}

$target_dir_audio = realpath(dirname(__FILE__)) . "/uploads/audio/";
$target_dir_audio = str_replace('\\', '/', $target_dir_audio);
$target_file_audio = $target_dir_audio . uniqid() . "." . pathinfo($_FILES["audio"]["name"], PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["audio"]["tmp_name"], $target_file_audio)) {
    $msg = "El audio " . htmlspecialchars(basename($_FILES["audio"]["name"])) . " ha sido subido con éxito.";
} else {
    $msg = "El audio no ha sido subido.";
}
