<?php
session_start();
$_SESSION["Usuario"]=null;

header("location:../Presentacion/Inicio.php");
exit();
?>