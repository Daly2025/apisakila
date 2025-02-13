<?php
include("../conexiondb.php");
$sql="select actor_id,first_name,last_name from actor where first_name=:first_name";
$stm=$conexion->prepare($sql);
$stm->bindParam(":first_name",$_GET['name']);
$stm->execute();
$datos=$stm->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($datos);
include('../Envio.php');
?>