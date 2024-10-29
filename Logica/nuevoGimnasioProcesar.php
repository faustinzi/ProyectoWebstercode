<?php

include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

if($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["Nombre"],"nombre","gimnasio")||!in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){
    volver();
}

$DBmanager->insertarGimnasio_BD($_POST["Nombre"],$_POST["Capacidad"]);

volver();

?>