<?php
include_once "Library.php";

// Verificar los permisos
if (!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(), ["gerente", "avanzado", "administrador"]) || 
    ($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["NombreNuevo"], "nombre", "ejercicio") && $_POST["Nombre"] != $_POST["NombreNuevo"])) {
    $_SESSION["Alerta"]="Error de permisos y/o datos.";
    volver();
    echo "Verifiacion de permisos mal";
}

// Inicializa el nuevo nombre de la imagen
$nuevoNombre = null;

// Verifica si el método es POST y si se ha subido un archivo PNG
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['Imagen']) && $_FILES['Imagen']['type'] == 'image/png') {
    $archivo = $_FILES['Imagen'];
    $errorArchivo = $archivo['error'];

    // Verifica si hay algún error al subir el archivo
    if ($errorArchivo !== UPLOAD_ERR_OK) {
        die('Error al subir el archivo: ' . $errorArchivo);
    }

    // Generar un nuevo nombre único para la imagen
    $nuevoNombre = uniqid('imagen_' . $_POST["NombreNuevo"] . '_', true) . '.png';
    $directorioDestino = '../Assets/imagenesEjercicios';
    $rutaDestino = $directorioDestino . '/' . $nuevoNombre;

    // Mover el archivo subido a la carpeta destino
    if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        // Obtener el ejercicio actual
        $arrayEjercicios = cargarEjerciciosGuardados2();
        $ejercicio = null;
        foreach ($arrayEjercicios as $ejercicioA) {
            if ($ejercicioA->getNombre() == $_POST["Nombre"]) {
                $ejercicio = $ejercicioA;
                break;
            }
        }

        // Eliminar la imagen anterior
        if ($ejercicio) {
            foreach (getAllExcercisePictures() as $picture) {
                if ($ejercicio->getNombreImagen() == $picture) {
                    $directorio = "../Assets/imagenesEjercicios/";
                    $rutaArchivo = $directorio . $picture;

                    if (file_exists($rutaArchivo) && $picture != "Default.png") {
                        if (unlink($rutaArchivo)) {
                            echo "El archivo anterior ha sido eliminado correctamente.";
                        } else {
                            echo "No se pudo eliminar el archivo anterior.";
                        }
                    }
                }
            }
        } else {
            echo "Ejercicio no encontrado.";
        }
    } else {
        echo 'Hubo un error al guardar el archivo.';
        volver(); // Salir en caso de error
    }
} else {
    echo 'No se ha subido ningún archivo o el archivo no es un PNG.';
    volver(); // Salir en caso de que no se suba un archivo
}

// Actualizar el ejercicio en la base de datos
if ($nuevoNombre) { // Solo actualizar si el nuevo nombre no es null
    $DBmanager->UpdateEjercicio($_POST["Nombre"], $_POST["NombreNuevo"], $_POST["Descripcion"], $nuevoNombre);
} else {
    echo "No se pudo generar un nuevo nombre de imagen.";
}

header("Location: ../Presentacion/listaEjercicios.php");
exit;
?>
