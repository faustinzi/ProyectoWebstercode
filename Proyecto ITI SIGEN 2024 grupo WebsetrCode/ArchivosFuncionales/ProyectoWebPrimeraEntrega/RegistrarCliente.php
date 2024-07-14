<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styleRegistrarCliente.css">
</head>
<body>
    <?php
        include_once "Library.php";
        include_once "nav.php";
    ?>
    <section class="sectionE">
        <section>
            <div>
                <h2>S.I.G.E.N.</h2>
                <img src="Assets/imagenes/logo.png" width=100 height=100 title="logo de GolfFL" alt="logo de S.I.G.E.N.">
            </div>
            <h2 class="h2titulo">Registro de Cliente</h2>
            <form action="crearProcesar.php" method="GET">
                <input type="hidden" name="Tipo" value="cliente">
                <label>Email</label><input type="text" name="Email" required>
                <label>Cedula</label><input type="text" name="Cedula" required>
                <label>Nombre de usuario</label><input type="text" name="NombreDeUsuario" required>
                <label>Contraseña</label><input type="text" name="Contrasenia" required>
                <label>Extras:</label>
                <label>Foto de perfil:</label>        
                    <select name="NombreImagen">
                        <?php
                            foreach(getAllProfilePictures() as $imagen){
                                echo "<option value='".$imagen."'>".$imagen."</option>";
                            }
                        ?>
                    </select>
                <label>Telefono</label><input type="text" name="Telefono">
                <label>Nombre Real</label><input type="text" name="NombreRealNombre">
                <label>Primer Apellido</label><input type="text" name="NombreRealPrimerApellido">
                <label>Segundo Apellido</label><input type="text" name="NombreRealSegundoApellido">
                <button>Registrar</button>
            </form>
            <a href='Login.php'>Iniciar sesión</a>
        </section>
    </section>
</body>
</html>