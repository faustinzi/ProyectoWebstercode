<?php
    include_once "../Logica/Library.php";
    if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
        $_SESSION["Alerta"]="Error de permisos.";
        header("Location: Inicio.php");
        exit();
    }
    include_once "alertaAddon.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario entrenador</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleRegistrarCliente.css">
    <link rel="stylesheet" href="styles/mobile/mobileLogin.css" media="(max-width: 1199px)">
</head>
<body>
    <?php

        include_once "nav.php";
    ?>
    <section class="sectionE">
        <section class="section1">
            <div>
                <h2>S.I.G.E.N.</h2>
                <img src="../Assets/imagenes/logo.png" width=100 height=100 title="logo de la empresa" alt="logo de S.I.G.E.N.">
            </div>
            <h2 class="h2titulo">Registro de Entrenador</h2>
            <form action="../Logica/crearEntrenadorProcesar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="Rol" value="entrenador">
                <label>Nombre de usuario</label><input type="text" name="NombreDeUsuario" required>
                <label>Contraseña</label><input type="password" name="Contrasenia" required>  
                <label>Cédula</label><input type="number" name="Cedula" required>
                <label for="NombreImagen">Imágen: </label><input type="file" name="NombreImagen" accept="image/png">
                <button>Registrar</button>
            </form>
            <a class="a" href='Login.php'><p class="ap">Iniciar sesión</p></a>
        </section>
    </section>
</body>
</html>