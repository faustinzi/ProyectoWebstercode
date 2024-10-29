<?php
include_once "Library.php";
if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}
$definida=false;
foreach($DBmanager->CargarTabla("tiene_asignado") as $relacion){
    if($relacion->nombre_cliente== $_POST["NombreCliente"]){
        $definida=true;
    }
}

if($definida){
    if($_POST["NombreEntrenador"]=="default"){
        $DBmanager->DeleteAsignacionCliente($_POST["NombreCliente"]);
    }else{
        $DBmanager->UpdateAsignacionClienteEntrenador($_POST["NombreCliente"],$_POST["NombreEntrenador"]);
    }
}else{
    if($_POST["NombreEntrenador"]!="default"){
        $DBmanager->insertarAsignacionClienteEntrenador($_POST["NombreCliente"],$_POST["NombreEntrenador"]);
    }
}

volver();

?>