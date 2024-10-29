<?php

include_once "Library.php";

if (!$_POST["NombreDeUsuario"] || !$_POST["Tipo"]) {
    header("location:../Presentacion/Inicio.php");
    exit();
}

$arrayUsuarios=cargarUsuarios2Guardados2();
$arrayClientes=cargarClientesGuardados();

$tipoRecibido = $_POST["Tipo"];

switch ($tipoRecibido) {
    case "usuario":
        if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
            $_SESSION["Alerta"]="Error de permisos.";
            volver();
        }
        if(!$DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["NombreDeUsuario"],"nombre_de_usuario","usuario")){
        if(!$_POST["NombreDeUsuario"]||!$_POST["Contrasenia"]||!$_POST["Rol"]){
            $_SESSION["Alerta"]="Error, faltan datos.";
            header("Location: ../Presentacion/RegistrarUsuarioMayor.php");
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
        
            // Mover el archivo subido a la carpeta destino
            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            } else {
                echo 'Hubo un error al guardar el archivo.';
            }
        } else {
            echo 'No se ha subido ningún archivo.';
        }

        $DBmanager->insertarUsuario_BD($_POST["NombreDeUsuario"],$_POST["Contrasenia"],$_POST["Rol"],$nuevoNombre);
        }
        header("location:../Presentacion/Inicio.php");
        exit();
    case "cliente":
        if(!$DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["NombreDeUsuario"],"nombre_de_usuario","usuario")){

            if(!$_POST["NombreDeUsuario"]||!$_POST["Contrasenia"]){
                header("Location: ../Presentacion/RegistrarCliente.php");
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
            
                // Mover el archivo subido a la carpeta destino
                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                } else {
                    echo 'Hubo un error al guardar el archivo.';
                }
            } else {
                echo 'No se ha subido ningún archivo.';
            }
    
            $DBmanager->insertarUsuario_BD($_POST["NombreDeUsuario"],$_POST["Contrasenia"],"cliente",$nuevoNombre);

            $DBmanager->insertarCliente_BD($_POST["NombreDeUsuario"],$_POST["NombreRealNombre"],$_POST["NombreRealPrimerApellido"],$_POST["NombreRealSegundoApellido"],$_POST["Email"],$_POST["Cedula"]);
        
            $DBmanager->insertarTelefonoCliente_BD($_POST["NombreDeUsuario"],$_POST["Telefono"]);

            $DBmanager->insertarAgendado_BD($_POST["NombreDeUsuario"],$_POST["NombreSucursal"],date('Y-m')."-01",0);

            if($_POST["Perfil"]=="Deportista"){
                $DBmanager->insertarDeportista_BD($_POST["NombreDeUsuario"]);
            }elseif($_POST["Perfil"]=="Paciente"){
                $DBmanager->insertarPaciente_BD($_POST["NombreDeUsuario"]);
            }
        }
        header("location:../Presentacion/Login.php");
        exit();
}
?>