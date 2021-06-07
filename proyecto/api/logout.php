<?php
session_start();
header("Content-Type: application/json;charset=utf-8");

session_unset();
session_destroy();

echo json_encode(["status" => true, "msg" => "Sessión cerrada con éxito"]);
