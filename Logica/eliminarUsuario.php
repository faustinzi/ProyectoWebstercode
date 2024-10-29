<?php
include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

$arrayUsuarios = cargarUsuarios2Guardados2();

$usuario=null;
foreach($arrayUsuarios as $usuarioA){
    if($usuarioA->getNombreDeUsuario()==$_GET["Nombre"]){
        $usuario=$usuarioA;
    }
}

foreach(getAllProfilePictures() as $picture){
    if($usuario && $usuario->getNombreImagen()==$picture){
        $directorio="../Assets/imagenesUsuarios/";
        $rutaArchivo= $directorio . $picture;

        if(file_exists($rutaArchivo) && $picture != "Default.png"){
            if(unlink($rutaArchivo)){
                echo "El archivo ha sido eliminado correctamente";
            }
        }
    }
}

$DBmanager->EliminarElementoTabla($_GET["Nombre"],"nombre_de_usuario","usuario");

volver();

?>