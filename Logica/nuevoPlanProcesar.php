<?php

include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","avanzado","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

if($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["Nombre"],"nombre","plan_entrenamiento")){
    volver();
}

$nuevoNombre=uniqid('grilla_'.$_POST["Nombre"].'_', true) . '.csv';

$directorioDestino = '../Assets/grillasPlanes/';
$rutaDestino = $directorioDestino . $nuevoNombre;

if (copy("../Assets/grillasPlanes/Default.csv", $rutaDestino)) {
} else {
    header("Location: ../Presentacion/Login.php");
    exit();
}

$DBmanager->insertarPlan_BD($_POST["Nombre"],$_POST["Descripcion"],$_POST["Objetivo"],$nuevoNombre);

volver();

?>