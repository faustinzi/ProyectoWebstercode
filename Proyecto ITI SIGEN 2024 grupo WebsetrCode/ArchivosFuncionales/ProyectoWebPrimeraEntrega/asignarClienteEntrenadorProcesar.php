<?php

$str = file_get_contents("datos/tieneAsignado.json");
$arrayAsignaciones = json_decode($str);

$nuevaAsignacion = new stdClass();
$nuevaAsignacion->nombreCliente = $_POST["NombreCliente"];
$nuevaAsignacion->nombreEntrenador = $_POST["NombreEntrenador"];

$arrayAsignacionesA=[];

foreach($arrayAsignaciones as $asignacion){
    if($asignacion->nombreCliente!=$_POST["NombreCliente"]){
        $arrayAsignacionesA[]=$asignacion;
    }
}
$arrayAsignacionesA[]=$nuevaAsignacion;
file_put_contents("Datos/tieneAsignado.json", json_encode($arrayAsignacionesA));

if (isset($_SERVER['HTTP_REFERER'])) {
    $urlAnterior = $_SERVER['HTTP_REFERER'];
    header("Location: $urlAnterior");
    exit();
} else {
    header("Location: Inicio.php");
    exit();
}

?>