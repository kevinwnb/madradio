<?php
$target_dir = "uploads/";
$target_file = $target_dir . uniqid() . basename($_FILES["imagen"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Comprobamos que la imágen es válida
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        echo "La imágen es válida - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "La imágen no es válida.";
        $uploadOk = 0;
    }
}

// Comprobamos si uploadOk es 1 para subir la imágen
if ($uploadOk == 0) {
    echo "La imágen no fue subida debido a errores presentes.";
} else {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        echo "La imágen " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subida.";
    } else {
        echo "La imágen no fue subida.";
    }
}
