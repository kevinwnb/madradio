<?php
if (!isset($_FILES["audio"])) {
    echo json_encode(["status" => false, "msg" => "No se ha proporcionado el audio"]);
    exit;
}

$target_dir_audio = "uploads/audio/";
$target_file_audio = $target_dir . basename($_FILES["audio"]["name"]);

if (move_uploaded_file($_FILES["audio"]["tmp_name"], $target_file_audio)) {
    echo json_encode(["status" => true, "msg" => "El audio " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ha sido subido con éxito."]);
} else {
    echo json_encode(["status" => false, "msg" => "El audio no ha sido subido."]);
}
