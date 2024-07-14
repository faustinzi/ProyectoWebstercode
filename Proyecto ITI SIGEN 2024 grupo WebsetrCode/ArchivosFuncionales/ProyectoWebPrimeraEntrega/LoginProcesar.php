<?php
include_once "Library.php";

$nombreRecibido=$_POST["Nombre"];
$contraseniaRecibido=$_POST["Contrasenia"];

$str = getAllSavedUsers();

foreach($str as $usuarioA){
    if($usuarioA->getContrasenia() == $contraseniaRecibido){
        $_SESSION["Usuario"]=$usuarioA;
    }
}
header("location:Inicio.php");
exit();
?>