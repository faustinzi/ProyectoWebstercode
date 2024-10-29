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
    <title>Registro de usuarios de rol mayor</title>
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
            <h2 class="h2titulo">Registro de Usuario de Rol Mayor</h2>
            <form action="../Logica/crearProcesar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="Tipo" value="usuario">
                <label>Rol</label>
                <select name="Rol">
                    <?php foreach(array_slice($roles, 1) as $rol){ 
                        if(!in_array($rol["nombre"],["cliente","entrenador"])){ ?>
                        <option value="<?php echo $rol["nombre"]; ?>"><?php echo $rol["nombre"]; ?></option>
                    <?php }} ?>
                    </select>
                <label>Nombre de usuario</label><input type="text" name="NombreDeUsuario" required>
                <label>Contraseña</label><input type="password" name="Contrasenia" required>  
                <label for="NombreImagen">Imágen: </label><input type="file" name="NombreImagen" accept="image/png">
                <button>Registrar</button>
            </form>
            <a class="a" href='RegistrarEntrenador.php'><p class="ap">Registrar Entrenador</p></a>
            <a class="a" href='listaUsuariosRolMayor.php'><p class="ap">Lista de usuarios de Rol Mayor</p></a>
        </section>
    </section>
</body>
</html>