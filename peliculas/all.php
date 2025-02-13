<?php
include("../conexiondb.php");
$sql="select * from film";
$result=$conexion->query($sql);
$datos=$result->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($datos);
include("../Envio.php");
?>