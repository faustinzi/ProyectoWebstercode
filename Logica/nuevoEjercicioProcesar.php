<?php

include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])&&(in_array($_SESSION["Usuario"]->getRol(),["gerente","avanzado","administrador"]))){
    $_SESSION["Alerta"]="Error de permisos y/o datos";
    volver();
}

if($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["Nombre"],"nombre","ejercicio")){
    $_SESSION["Alerta"]="Error de datos";
    volver();
}

$nuevoNombre="Default.png";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['Imagen']) && $_FILES['Imagen']['type']=='image/png') {
    $archivo = $_FILES['Imagen'];
    $nombreOriginal = $archivo['name'];
    $tipoArchivo = $archivo['type'];
    $rutaTemporal = $archivo['tmp_name'];
    $errorArchivo = $archivo['error'];
    $tamañoArchivo = $archivo['size'];

    if ($errorArchivo !== UPLOAD_ERR_OK) {
        die('Error al subir el archivo.');
    }

    $nuevoNombre = uniqid('imagen_'.$_POST["Nombre"].'_', true) . '.png';
    $directorioDestino = '../Assets/imagenesEjercicios';
    
    $rutaDestino = $directorioDestino . '/' . $nuevoNombre;

    // Mover el archivo subido a la carpeta destino
    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
    } else {
        echo 'Hubo un error al guardar el archivo.';
    }
} else {
    echo 'No se ha subido ningún archivo.';
}

$DBmanager->insertarEjercicio_BD($_POST["Nombre"],$_POST["Descripcion"],$nuevoNombre);

volver();

?>