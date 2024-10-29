<?php
include_once "Library.php";

$nombreRecibido=$_POST["Nombre"];
$contraseniaRecibido=$_POST["Contrasenia"];

$str = getAllSavedUsers_BD();

foreach($str as $usuarioA){
    if($usuarioA->getNombreDeUsuario() == $nombreRecibido && $usuarioA->getContrasenia() == $contraseniaRecibido){
        $_SESSION["Usuario"]=$usuarioA;
    }
}
header("location: ../Presentacion/Inicio.php");
exit();
?>