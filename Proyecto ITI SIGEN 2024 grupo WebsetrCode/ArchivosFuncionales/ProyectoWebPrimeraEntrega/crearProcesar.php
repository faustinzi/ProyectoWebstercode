<?php

include_once "Library.php";

session_start();

if (!$_GET["NombreDeUsuario"] || !$_GET["Tipo"]) {
    header("location:listaUsuarios.php");
    exit();
}

$arrayUsuarios=cargarUsuariosGuardados();
$arrayClientes=cargarClientesGuardados();

$tipoRecibido = $_GET["Tipo"];

if(!isset($_GET["NombreImagen"])||!$_GET["NombreImagen"]||!in_array($_GET["NombreImagen"],getAllProfilePictures())){
    $_GET["NombreImagen"]="Default.png";
}

switch ($tipoRecibido) {
    case "usuario":
        $arrayUsuarios[]=new Usuario($_GET["Nombre"],$_GET["NombreImagen"],$_GET["Email"],$_GET["Contrasenia"],$_GET["Rol"],null,null);
        file_put_contents("Datos/usuarios.json", json_encode($arrayUsuarios));
        header("location:listaUsuarios.php");
        exit();
    case "cliente":
        if(!NameExistsInBD($_GET["NombreDeUsuario"])){
            $arrayClientes[]=new Cliente($_GET["NombreDeUsuario"],$_GET["NombreImagen"],$_GET["Contrasenia"],$_GET["Cedula"],[$_GET["Telefono"]],[$_GET["NombreRealNombre"],$_GET["NombreRealPrimerApellido"],$_GET["NombreRealSegundoApellido"]],$_GET["Email"]);
            file_put_contents("Datos/clientes.json", json_encode($arrayClientes));
        }
        header("location:Login.php");
        exit();
    case "ejercicio":
        $arrayEjercicios=cargarEjerciciosGuardados();
        $arrayEjercicios[]=new Ejercicio($_GET["Nombre"],$_GET["Descripcion"],$_GET["NombreImagen"]);
        file_put_contents("Datos/ejercicios.json", json_encode($arrayEjercicios));
        if($_SESSION["Usuario"]->getPermisos()=="cliente"){
            foreach($arrayUsuarios as &$usuario){
                if($usuario->getNombre() == $_SESSION["Usuario"]->getNombre()){
                    $usuario->agregarNombreTarea($_GET["Nombre"]);
                    $_SESSION["Usuario"]->agregarNombreTarea($_GET["Nombre"]);
                }
            }
            file_put_contents("Datos/usuarios.json", json_encode($arrayUsuarios));
        }   
        exit();
        break;
}
?>