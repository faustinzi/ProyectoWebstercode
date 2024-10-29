<?php
include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}else{
    $DBmanager->DesactivarElementoTabla($_GET["Nombre"],"nombre","gimnasio");
}
volver();

?>