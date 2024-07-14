<?php
session_start();
$_SESSION["Usuario"]=null;

header("location:Inicio.php");
exit();
?>