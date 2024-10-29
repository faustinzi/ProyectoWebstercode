<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleLogin.css">
    <link rel="stylesheet" href="styles/mobile/mobileLogin.css" media="(max-width: 1199px)">
</head>
<body>
    <?php
        include_once "../Logica/Library.php";
        include_once "alertaAddon.php";
        include_once "nav.php";
    ?>
    <section class="sectionE">
        <section class="section1">
            <div>
                <h2>S.I.G.E.N.</h2>
                <img src="../Assets/imagenes/logo.png" width=100 height=100 title="logo de GolfFL" alt="logo de S.I.G.E.N.">
            </div>
            <h2 class="h2titulo">Inicio de Sesión</h2>
            <form action="../Logica/LoginProcesar.php" method="POST">
                <label>Nombre</label><input type="text" name="Nombre">
                <label>Contraseña</label><input type="password" name="Contrasenia">
                <button>Entrar</button>
            </form>
            <a href="../Logica/Logout.php" class="a"><p class="ap">Cerrar Sesión</p></a>
            <a href='RegistrarCliente.php' class="a"><p class="ap">Registrarse como cliente</p></a>
        </section>
    </section>
</body>
</html>