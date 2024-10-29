<?php

include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]&&in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"]))){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

if(!(isset($_POST["NombreEquipo"])&&$_POST["NombreEquipo"]&&isset($_POST["NombreSuplente"])&&$_POST["NombreSuplente"])){
    header("Location: ../Presentacion/Inicio.php");
    exit();
}
if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]&&in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"]))){
    header("Location: ../Presentacion/Inicio.php");
    exit();
}
if($_SESSION["Usuario"]->getRol()=="seleccionador"){
    if(!in_array($_POST["NombreEquipo"],$DBmanager->obtenerEquiposDeSeleccionador($_SESSION["Usuario"]->getNombreDeUsuario()))){
        header("Location: ../Presentacion/Inicio.php");
        exit();
    }
}
if($_POST["NombreSuplente"]=="-"){
    volver();
}

$DBmanager->eliminarEstan_BD($_POST["NombreEquipo"],$_POST["NombreSuplente"]);

volver();
?>