<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styleLogin.css">
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
            <h2 class="h2titulo">Inicio de Sesión</h2>
            <form action="LoginProcesar.php" method="POST">
                <label>Nombre</label><input type="text" name="Nombre">
                <label>Contraseña</label><input type="text" name="Contrasenia">
                <button>Entrar</button>
            </form>
            <a href="Logout.php">Cerrar Sesión</a>
            <a href='RegistrarCliente.php'>Registrarse como cliente</a>
        </section>
    </section>
</body>
</html>