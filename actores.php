<?php
include("conexiondb.php");
$sql="select actor_id,first_name,last_name from actor";
$result=$conexion->query($sql);
$datos=$result->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($datos);
// Establece la cabecera para indicar que la respuesta es JSON
header('Content-Type: application/json');
echo $json;
?>