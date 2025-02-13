<?php
require 'vendor/autoload.php';
require 'config.php';

use Firebase\JWT\JWT;

function generarToken($usuario_id) {
    $clave_secreta = JWT_SECRET_KEY;
    $tiempo_actual = time();
    $expiracion = $tiempo_actual + (60 * 60); // Expira en 1 hora

    $payload = [
        "iss" => "tu-api.com",
        "aud" => "tu-api.com",
        "iat" => $tiempo_actual, 
        "exp" => $expiracion,
        "user_id" => $usuario_id
    ];

    return JWT::encode($payload, $clave_secreta, 'HS256');
}
/*
// Simulación de autenticación de usuario
$usuario_id = 123; // Suponiendo que este usuario inició sesión correctamente
$token = generarToken($usuario_id);

echo json_encode(["token" => $token]);
*/