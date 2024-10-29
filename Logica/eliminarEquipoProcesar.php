<?php
include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

$arrayEquipos = getAllSavedTeams2();

$equipo=null;
foreach($arrayEquipos as $equipoA){
    if($equipoA->nombre==$_GET["Nombre"]){
        $equipo=$equipoA;
    }
}

foreach(getAllTeamPictures() as $picture){
    if($equipo && $equipo->imagen==$picture){
        $directorio="../Assets/imagenesEquipos/";
        $rutaArchivo= $directorio . $picture;

        if(file_exists($rutaArchivo) && $picture != "Default.png"){
            if(unlink($rutaArchivo)){
                echo "El archivo ha sido eliminado correctamente";
            }
        }
    }
}

$DBmanager->EliminarElementoTabla($_GET["Nombre"],"nombre","equipo");

volver();

?>