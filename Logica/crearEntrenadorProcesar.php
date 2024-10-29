<?php

include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

if (!$_POST["NombreDeUsuario"] || !$_POST["Rol"]) {
    $_SESSION["Alerta"]="Error, faltan datos";
    header("location:../Presentacion/Inicio.php");
    exit();
}


    if(!$DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["NombreDeUsuario"],"nombre_de_usuario","usuario")){

        if(!$_POST["NombreDeUsuario"]||!$_POST["Contrasenia"]){
             header("Location: ../Presentacion/RegistrarEntrenador.php");
            exit();
        }
    
        $nuevoNombre="Default.png";
        if (isset($_FILES['NombreImagen']) && $_FILES['NombreImagen']['type']=='image/png') {
            $archivo = $_FILES['NombreImagen'];
            $nombreOriginal = $archivo['name'];
            $tipoArchivo = $archivo['type'];
            $rutaTemporal = $archivo['tmp_name'];
            $errorArchivo = $archivo['error'];
            $tamañoArchivo = $archivo['size'];
            
            if ($errorArchivo !== UPLOAD_ERR_OK) {
                die('Error al subir el archivo.');
            }
            
            $nuevoNombre = uniqid('imagen_'.$_POST["NombreDeUsuario"].'_', true) . '.png';
            $directorioDestino = '../Assets/imagenesUsuarios';
                
            $rutaDestino = $directorioDestino . '/' . $nuevoNombre;
            
            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            } else {
                echo 'Hubo un error al guardar el archivo.';
            }
        } else {
            echo 'No se ha subido ningún archivo.';
        }
    
        $DBmanager->insertarUsuario_BD($_POST["NombreDeUsuario"],$_POST["Contrasenia"],$_POST["Rol"],$nuevoNombre);

        $DBmanager->insertarEntrenador_BD($_POST["NombreDeUsuario"],$_POST["Cedula"]);
    }
    header("location:../Presentacion/Login.php");
    exit();

?>