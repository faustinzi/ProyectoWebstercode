<?php
include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["gerente","avanzado","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}


$arrayEjercicios = cargarEjerciciosGuardados2();

$ejercicio=null;
foreach($arrayEjercicios as $ejercicioA){
    if($ejercicioA->getNombre()==$_GET["Nombre"]){
        $ejercicio=$ejercicioA;
    }
}

foreach(getAllExcercisePictures() as $picture){
    if($ejercicio && $ejercicio->getNombreImagen()==$picture){
        $directorio="../Assets/imagenesEjercicios/";
        $rutaArchivo= $directorio . $picture;

        if(file_exists($rutaArchivo) && $picture != "Default.png"){
            if(unlink($rutaArchivo)){
                echo "El archivo ha sido eliminado correctamente";
            }
        }
    }
}

$DBmanager->EliminarElementoTabla($_GET["Nombre"],"nombre","ejercicio");

volver();

?>