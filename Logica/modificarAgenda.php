<?php

include_once "Library.php";

if(!($_GET["Cliente"]&&$_GET["Mes"]&&$_GET["Pago"]&&($_GET["Creado"]||$_GET["Creado"]==0))){
    $_SESSION["Alerta"]="Error de datos.";
    volver();
}
if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

switch($_GET["Pago"]){
    case 1:
        if($_GET["Creado"]){
            $DBmanager->DesactivarAgendado($_GET["Cliente"], $_GET["Mes"]);
        }
        break; 
    case 2:
        if($_GET["Creado"]){
            $DBmanager->UpdatePagoAgendado($_GET["Cliente"],$_GET["Mes"],0);
        }else{
            $gym=$DBmanager->cargarSucursalCliente_BD($_GET["Cliente"]);
            if($DBmanager->existeAgendamiento($_GET["Cliente"],$_GET["Mes"])){
                $DBmanager->ActivarAgendado($_GET["Cliente"],$_GET["Mes"]);
                $DBmanager->UpdatePagoAgendado($_GET["Cliente"],$_GET["Mes"],0);
            }else{
                $DBmanager->insertarAgendado_BD($_GET["Cliente"],$gym,$_GET["Mes"]."-01",0);
            }
        }
        break;
    case 3:
        if($_GET["Creado"]){
            $DBmanager->UpdatePagoAgendado($_GET["Cliente"],$_GET["Mes"],1);
        }else{
            $gym=$DBmanager->cargarSucursalCliente_BD($_GET["Cliente"]);
            if($DBmanager->existeAgendamiento($_GET["Cliente"],$_GET["Mes"])){
                $DBmanager->ActivarAgendado($_GET["Cliente"],$_GET["Mes"]);
                $DBmanager->UpdatePagoAgendado($_GET["Cliente"],$_GET["Mes"],1);
            }else{
                $DBmanager->insertarAgendado_BD($_GET["Cliente"],$gym,$_GET["Mes"]."-01",1);
            }
        }
        break;
}

volver();

?>   