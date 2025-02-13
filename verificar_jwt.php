<?php
require 'vendor/autoload.php';
require 'config.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function verificarToken($token) {
    try {
        $clave_secreta = JWT_SECRET_KEY;
        $decoded = JWT::decode($token, new Key($clave_secreta, 'HS256'));
        return (array) $decoded;
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(["error" => "Acceso no autorizado"]);
        exit();
    }
}
/*
// Extraer el token desde la cabecera Authorization
$headers = apache_request_headers();

if (!isset($headers['Authorization'])) {
    http_response_code(401);
    echo json_encode(["error" => "Token no proporcionado"]);
    exit();
}

$token = str_replace("Bearer ", "", $headers['Authorization']);
$datos_usuario = verificarToken($token);

echo json_encode(["mensaje" => "Acceso concedido", "usuario" => $datos_usuario]);
*/