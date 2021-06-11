<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

if ($_SESSION["role_id"] != 1) {
    echo json_encode(["status" => false, "msg" => "Solo administradores pueden crear o realizar cambios en otras cuentas"]);
    exit;
}

// Agarramos el json de la solicitud recibida
$json = file_get_contents('php://input');

if (empty($json)) {
    echo json_encode(["status" => false, "msg" => "No se han proporcionado los datos necesarios"]);
    exit;
}

// Convertimos el json recibido a un objeto PHP
$data = json_decode($json);

if ($data->password != $data->repeat_password) {
    echo json_encode(["status" => false, "msg" => "Las contraseñas no coinciden"]);
    exit;
}

require "../../../db_conexion.php";

if (!empty($data->password)) {
    // preparamos y adjuntamos los parámetros
    $stmt = $link->prepare("UPDATE usuarios SET nombre = ?, email = ?, password = ?, role_id = ? WHERE id = ?");
    $stmt->bind_param("sssii", $nombre, $email, $password, $role_id, $id);

    $nombre = $data->nombre;
    $email = $data->email;
    $password = password_hash($data->password, PASSWORD_DEFAULT);
    $role_id = $data->role_id;
    $id = $data->id;

    // ejecutamos
    $stmt->execute();

    if ($stmt->affected_rows <= 0 && $stmt->error != "") {
        echo json_encode(["status" => false, "msg" => "No se ha modificado el usuario", "error" => $stmt->error]);
        $stmt->close();
        $link->close();
        exit;
    }

    if ($id == $_SESSION["id_usuario"]) {
        $_SESSION["role_id"] = $role_id;
    }

    $stmt->close();
} else {
    // preparamos y adjuntamos los parámetros
    $stmt = $link->prepare("UPDATE usuarios SET nombre = ?, email = ?, role_id = ? WHERE id = ?");
    $stmt->bind_param("ssii", $nombre, $email, $role_id, $id);

    $nombre = $data->nombre;
    $email = $data->email;
    $role_id = $data->role_id;
    $id = $data->id;

    // ejecutamos
    $stmt->execute();

    if ($stmt->affected_rows <= 0 && $stmt->error != "") {
        echo json_encode(["status" => false, "msg" => "No se ha modificado el usuario", "error" => $stmt->error]);
        $stmt->close();
        $link->close();
        exit;
    }

    if ($id == $_SESSION["id_usuario"]) {
        $_SESSION["role_id"] = $role_id;
    }

    $stmt->close();
}

$link->close();

echo json_encode(["status" => true, "msg" => "Usuario modificado con éxito"]);
