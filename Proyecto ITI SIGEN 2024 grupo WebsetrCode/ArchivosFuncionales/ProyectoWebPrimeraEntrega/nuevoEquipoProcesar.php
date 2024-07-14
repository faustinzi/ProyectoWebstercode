<?php

include_once "Library.php";

$arrayEquipos = getAllSavedTeams();

$nuevoEquipo = new stdClass();
if(TeamNameExistsInBD($_POST["Nombre"])){
    if (isset($_SERVER['HTTP_REFERER'])) {
        $urlAnterior = $_SERVER['HTTP_REFERER'];
        header("Location: $urlAnterior");
        exit();
    } else {
        header("Location: Inicio.php");
        exit();
    }
}else{
$nuevoEquipo->nombre = $_POST["Nombre"];
}
$nuevoEquipo->deporte = $_POST["Deporte"];
for ($i = 1; $i <= $Deportes[$_POST["Deporte"]]["CantidadDeJugadores"]; $i++) {
    $jugadores[]=null;
}
$nuevoEquipo->jugadores=$jugadores;
$nuevoEquipo->suplentes=[];
if(!isset($_POST["NombreImagen"])||!$_POST["NombreImagen"]||!in_array($_POST["NombreImagen"],getAllTeamPictures())){
    $_POST["NombreImagen"]="Default.png";
}
$nuevoEquipo->imagen=$_POST["NombreImagen"];

$arrayEquipos[]=$nuevoEquipo;
file_put_contents("Datos/equipos.json", json_encode($arrayEquipos));

if (isset($_SERVER['HTTP_REFERER'])) {
    $urlAnterior = $_SERVER['HTTP_REFERER'];
    header("Location: $urlAnterior");
    exit();
} else {
    header("Location: Inicio.php");
    exit();
}

?>