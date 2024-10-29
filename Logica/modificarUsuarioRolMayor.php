

<?php
include_once "Library.php";

// Verificar los permisos
if (!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(), ["administrador"]) || 
    ($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["NombreNuevo"], "nombre_de_usuario", "usuario") && $_POST["Nombre"] != $_POST["NombreNuevo"])) {
    $_SESSION["Alerta"]="Error de permisos y/o datos";
    volver();
    echo "Verifiacion de permisos mal";
}

// Inicializa el nuevo nombre de la imagen
$nuevoNombre = null;

$arrayUsuarios = cargarUsuarios2Guardados2();
$usuario = null;
foreach ($arrayUsuarios as $usuarioA) {
    if ($usuarioA->getNombreDeUsuario() == $_POST["Nombre"]) {
        $usuario = $usuarioA;
        break;
    }
}

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
    $directorioDestino = '../Assets/imagenesUsuarios';
    $rutaDestino = $directorioDestino . '/' . $nuevoNombre;

    // Mover el archivo subido a la carpeta destino
    if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        // Obtener el usuario actual


        // Eliminar la imagen anterior
        if ($usuario) {
            foreach (getAllProfilePictures() as $picture) {
                if ($usuario->getNombreImagen() == $picture) {
                    $directorio = "../Assets/ImagenesUsuarios/";
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
            echo "Equipo no encontrado.";
        }
    } else {
        echo 'Hubo un error al guardar el archivo.';
        volver(); // Salir en caso de error
    }
} else {
    echo 'No se ha subido ningún archivo o el archivo no es un PNG.';
    $nuevoNombre=$usuario->getNombreImagen();
}

// Actualizar el usuario en la base de datos
if ($nuevoNombre) { // Solo actualizar si el nuevo nombre no es null
    $DBmanager->UpdateUsuarioRolMayor($_POST["Nombre"], $_POST["NombreNuevo"], $_POST["Password"], $nuevoNombre, $_POST["Rol"]);
} else {
    echo "No se pudo generar un nuevo nombre de imagen.";
}

header("Location: ../Presentacion/informacionUsuario.php?Nombre=".$_POST["NombreNuevo"]);
exit;
?>
