<?php
include_once "Library.php";

if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]){
    header("location: ../Presentacion/Inicio.php");
    exit();
}
if(in_array($_SESSION["Usuario"]->getRol(),["cliente"])){
    $usuarioSession=$_SESSION["Usuario"];
    $plan=$DBmanager->CargarAtributoPrimaryKeyValorTabla('nombre_plan','nombre_cliente',$_SESSION["Usuario"]->getNombreDeUsuario(),'realiza');
    if($plan){
        header("Location: ../Presentacion/informacionPlan.php?NombrePlan=$plan");
        exit();
    }else{
        volver();
    }
}
if(in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","avanzado","seleccionador","administrador"])){
    $plan=$DBmanager->CargarAtributoPrimaryKeyValorTabla('nombre_plan','nombre_cliente',$_GET["NombreClientePasado"],'realiza');
    if($plan){
        header("Location: ../Presentacion/informacionPlan.php?NombrePlan=$plan");
        exit();
    }else{
        volver();
    }
}
header("Location: ../Presentacion/Inicio.php");
exit();

?>