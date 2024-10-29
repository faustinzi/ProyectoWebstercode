<?php

include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

if($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["Nombre"],"nombre","equipo")||!in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"])){
    volver();
}
if(!isset($_POST["NombreImagen"])||!$_POST["NombreImagen"]){
    $_POST["NombreImagen"]="Default.png";
}

$DBmanager->insertarEquipo_BD($_POST["Nombre"],$_POST["Deporte"],$_POST["NombreImagen"]);

if(in_array($_SESSION["Usuario"]->getRol(),["seleccionador"])){
    $DBmanager->insertarPuedeUsar_BD($_SESSION["Usuario"]->getNombreDeUsuario(),$_POST["Nombre"]);
}

    volver();

?>