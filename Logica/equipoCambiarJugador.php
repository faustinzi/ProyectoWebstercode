<?php

include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]&&in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"]))){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

if(!(isset($_POST["NombreEquipo"])&&$_POST["NombreEquipo"]&&isset($_POST["NombreJugador"])&&$_POST["NombreJugador"]&&isset($_POST["NombreJugadorAnterior"])&&$_POST["NombreJugadorAnterior"])){
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

$asignaciones=$DBmanager->CargarEstanEnEquipo($_POST["NombreEquipo"]);
$nombres=[];
foreach($asignaciones as $asignacion){
    $nombres[]=$asignacion->nombre_deportista;
}
if(in_array($_POST["NombreJugador"],$nombres)){
    volver();
}

if($_POST["NombreJugadorAnterior"]!="-"){
    $DBmanager->eliminarEstan_BD($_POST["NombreEquipo"],$_POST["NombreJugadorAnterior"]);
}
if($_POST["NombreJugador"]!="-"){
    $DBmanager->insertarEstan_BD($_POST["NombreEquipo"],$_POST["NombreJugador"],"jugador",$_POST["Posicion"]);
}
volver();
?>