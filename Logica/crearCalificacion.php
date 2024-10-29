<?php

include_once "Library.php";

if (!isset($_POST["Nombre"]) || !isset($_POST["Fecha"]) || !(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(), ["entrenador", "administrador"])) {
    $_SESSION["Alerta"]="Error de permisos o de datos.";
} else {

    if($DBmanager->calificacionExiste($_POST["Nombre"],$_POST["Fecha"])){
        $DBmanager->UpdateCalificacion_BD(
            $_POST["Fecha"], $_POST["Nombre"], $_POST["CumplimientoDeRutina"], 
            $_POST["ResistenciaAnaerobica"], $_POST["FuerzaMuscular"], $_POST["ResistenciaMuscular"], 
            $_POST["Flexibilidad"], $_POST["ResistenciaALaMonotonia"], $_POST["Resiliencia"]
        );
    }else{
        $DBmanager->insertarCalificacion_BD(
            $_POST["Fecha"], $_POST["Nombre"], $_POST["CumplimientoDeRutina"], 
            $_POST["ResistenciaAnaerobica"], $_POST["FuerzaMuscular"], $_POST["ResistenciaMuscular"], 
            $_POST["Flexibilidad"], $_POST["ResistenciaALaMonotonia"], $_POST["Resiliencia"]
        );
    }

    $total = $_POST["CumplimientoDeRutina"] + $_POST["ResistenciaAnaerobica"] + $_POST["FuerzaMuscular"] + 
             $_POST["ResistenciaMuscular"] + $_POST["Flexibilidad"] + $_POST["ResistenciaALaMonotonia"] + $_POST["Resiliencia"];

    // Verifica si es deportista
    $estado=obtenerEstadoDeCalificacion($_POST["Nombre"],$total);

    // Depuración: Verificar si el estado se está obteniendo correctamente
    echo "Estado calculado: " . $estado;
    
    // Verificar si el ID del estado es válido
    $DBmanager->insertarPasa_BD($_POST["Nombre"], $estado, date('Y-m-d'));
    
}

volver();

?>

