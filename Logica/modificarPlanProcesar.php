<?php
include_once "Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","avanzado","administrador"])||($DBmanager->ValorDeAtributoDeTablaExisteEnBD($_POST["NombreNuevo"], "nombre", "plan_entrenamiento")&&$_POST["NombreNuevo"]!=$_POST["Nombre"])){
    $_SESSION["Alerta"]="Error de permisos y/o datos.";
    volver();
}else{
    $DBmanager->UpdatePlan($_POST["Nombre"],$_POST["NombreNuevo"],$_POST["Descripcion"],$_POST["Objetivo"]);
}
header("Location: ../Presentacion/listaPlanes.php");
exit;
?>