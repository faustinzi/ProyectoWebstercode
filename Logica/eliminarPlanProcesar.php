<?php
include_once "Library.php";
if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["gerente","avanzado","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}
$arrayPlanes = cargarPlanesGuardados2();

$plan=null;
foreach($arrayPlanes as $planA){
    if($planA->getNombre()==$_GET["Nombre"]){
        $plan=$planA;
    }
}

foreach(getAllPlanGrids() as $grid){
    if($plan && $plan->getNombreGrilla()==$grid){
        $directorio="../Assets/grillasPlanes/";
        $rutaArchivo= $directorio . $grid;

        if(file_exists($rutaArchivo) && $grid != "Default.png"){
            if(unlink($rutaArchivo)){
                echo "El archivo ha sido eliminado correctamente";
            }
        }
    }
}

$DBmanager->EliminarElementoTabla($_GET["Nombre"],"nombre","plan_entrenamiento");

volver();

?>