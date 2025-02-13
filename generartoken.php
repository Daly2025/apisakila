<?php
require 'generar_JWT.php';

if(isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    //Consulta a la base de datos para verificar si el usuario y contraseña son correctos
    //Si el usuario y contraseña son correctos, se genera un token
   if($user=="admin" && $password=="admin") {
        $token = generarToken(1);
        echo json_encode(["token" => $token]);
    } else {
        http_response_code(401);
        echo json_encode(["error" => "Usuario o contraseña incorrectos"]);
    }
}else {
    http_response_code(400);
    echo json_encode(["error" => "Faltan parámetros"]);
}