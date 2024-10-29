<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleRegistrarCliente.css">
    <link rel="stylesheet" href="styles/mobile/mobileLogin.css" media="(max-width: 1199px)">
</head>
<body>
    <?php
        include_once "../Logica/Library.php";
        include_once "alertaAddon.php";
        include_once "nav.php";
    ?>
    <section class="sectionE">
        <section class="section22">
            <div>
                <h2>S.I.G.E.N.</h2>
                <img src="../Assets/imagenes/logo.png" width=100 height=100 title="logo de la empresa" alt="logo de S.I.G.E.N.">
            </div>
            <h2 class="h2titulo">Registro de Cliente</h2>
            <form action="../Logica/crearProcesar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="Tipo" value="cliente">
                <label>Email</label><input type="email" name="Email" required>
                <label>Nombre de usuario</label><input type="text" name="NombreDeUsuario" required>
                <label>Contraseña</label><input type="password" name="Contrasenia" required>
                <label>Perfil</label><select name="Perfil" required><option value="Deportista">Deportista</option><option value="Paciente">Paciente de fisioterapia</option></select>
                <label>Cédula</label><input type="number" name="Cedula" required>
                <label>Extras:</label>
                <label>Foto de perfil:</label>        
                <label for="NombreImagen">Imágen: </label><input type="file" name="NombreImagen" accept="image/png">
                <label>Teléfono</label><input type="number" name="Telefono">
                <label>Nombre Real</label><input type="text" name="NombreRealNombre">
                <label>Primer Apellido</label><input type="text" name="NombreRealPrimerApellido">
                <label>Segundo Apellido</label><input type="text" name="NombreRealSegundoApellido">
                <label>Sucursal:</label>
                <select name="NombreSucursal" required>
                    <?php foreach(getAllSavedGyms2() as $gym){ ?>
                        <option value="<?php echo $gym->getNombre(); ?>"><?php echo $gym->getNombre(); ?></option>
                    <?php } ?>
                    </select>
                <button>Registrar</button>
            </form>
            <a class="a" href='Login.php'><p class="ap">Iniciar sesión</p></a>
        </section>
    </section>
</body>
</html>