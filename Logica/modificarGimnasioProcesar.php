<?php
include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])||($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["nombreNuevo"], "nombre", "gimnasio")&&$_POST["nombreNuevo"]!=$_POST["nombre"])){
    $_SESSION["Alerta"]="Error de permisos y/o datos.";
    volver();
}else{

    $DBmanager->UpdateGimnasio($_POST["nombre"],$_POST["nombreNuevo"],$_POST["capacidad"]);
}
volver();
?>