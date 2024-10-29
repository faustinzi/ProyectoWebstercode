<?php
include_once "Library.php";
if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}
$definida=false;
foreach($DBmanager->CargarTabla("realiza") as $relacion){
    if($relacion->nombre_cliente== $_POST["NombreCliente"]){
        $definida=true;
    }
}

if($definida){
    if($_POST["NombrePlan"]=="default"){
        $DBmanager->DeleteRealizaCliente($_POST["NombreCliente"]);
    }else{
        $DBmanager->UpdateRealizaClientePlan($_POST["NombreCliente"],$_POST["NombrePlan"]);
    }
}else{
    if($_POST["NombrePlan"]!="default"){
        $DBmanager->insertarRealizaClientePlan($_POST["NombreCliente"],$_POST["NombrePlan"]);
    }
}

volver();

?>