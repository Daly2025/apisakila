<?php
if(isset($_POST["name"]) && $_POST["lastname"]){

include("../conexiondb.php");
$sql="select actor_id,first_name,last_name from actor where first_name=:first_name";
$stm=$conexion->prepare($sql);
$stm->bindParam(":first_name",$_POST['name']);
$stm->bindParam('',$_POST['last_name']);
$stm->execute();
$actor_id=$conexion_>$conexion->lastInsertId();
$datos=[
"actor_id"=>$actor_id,
"first_name"=>$_POST['name'],
"last_name"=>$_POST['last_name']


];
// Establece la cabecera para indicar que la respuesta es JSON
header('Content-Type: application/json');
echo $json;
}
else{
    $response=[
        'status'=> '200',
        'message'=> 'No se han recibido los datos necesarios'
    ];
    echo json_encode($response);
    include('../Envio.php');

}
header('Content-Type: application/json');
echo $json;

?>

