<?php
    include_once "Library.php";
    if(!isset($_GET["Nombre"])||!$_GET["Nombre"]){
        header("location:Inicio.php");
        exit();
    }
    foreach(getAllSavedUsers() as $user){
        if($user->getNombreDeUsuario() == $_GET["Nombre"]){
            $usuario=$user;
        }
    }

    $asignaciones = json_decode(file_get_contents("Datos/tieneAsignado.json"));
    foreach ($asignaciones as $dato) {
        if($dato->nombreCliente==$usuario->getNombreDeUsuario()){
            $entrenador=$dato->nombreEntrenador;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Usuario</title>
    <link rel="stylesheet" href="styles/stylesInfoUsuario.css">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>

    <main>
        <section>
            <div class="divUp">
                <div class="divUp-divLeft">
                    <?php
                        echo "<img src='Assets/imagenesUsuarios/".$usuario->getNombreImagen()."' alt='Foto de Perfil' width='400px' height='400px'>";
                    ?>
                </div>
                <div class="divUp-divRight">
                    <h2 class="tituloPagina">Información del usuario: <?php echo $usuario->getNombreDeUsuario()?></h2>
                    <h3><?php echo $usuario->getRol()?></h3>
                    <h1><?php if($usuario->getRol()=="cliente"){echo implode(" ",$usuario->getNombreRealCompleto());}?></h1>
                    <h2><?php echo $usuario->getNombreDeUsuario()?></h2>
                    <h3><?php if(in_array($usuario->getRol(),["cliente", "entrenador"])){echo $usuario->getCedula();}?></h3>
                    <?php
                        if($usuario->getRol()=="cliente"){
                            echo "<a href='Rutina.php'>Ver Rutina</a>
                                <a href='Evolucion.php'>Ver Evolucion</a>";
                        }
                    ?>
                </div>
            </div>
            <div class="divDown">
                <ul>
                    <?php
                        if(in_array($usuario->getRol(),["cliente"])){
                        echo "<li>
                        <p>Nombre Real: ".implode(" ",$usuario->getNombreRealCompleto())."</p>
                            </li>";
                        }
                        if(in_array($usuario->getRol(),["cliente", "entrenador"])){
                            echo "<li>
                        <p>Cédula: ".$usuario->getCedula()."</p>
                            </li>";
                        }
                        if(in_array($usuario->getRol(),["cliente"])){
                            echo "<li>
                        <p>Teléfonos: ".implode(", ",$usuario->getTelefonos())."</p>
                            </li>";
                        }
                        if(in_array($usuario->getRol(),["cliente"])){
                            echo "<li>
                        <p>Mail: ".$usuario->getEmail()."</p>
                            </li>";
                        }
                        if(in_array($usuario->getRol(),["cliente"])){
                            if(isset($entrenador)){
                                echo "<li>
                                <p>Entrenador Asignado: ".$entrenador."</p>";
                            }else{
                                echo "<li>
                                <p>Entrenador Asignado: No tiene entrenador asignado</p>";
                            }
                            if(in_array($_SESSION["Usuario"]->getRol(),["gerente"])){
                                echo "<form action='asignarClienteEntrenadorProcesar.php' method='POST'>
                                    <input type='hidden' name='NombreCliente' value='".$usuario->getNombreDeUsuario()."'>
                                    <label>Asignar Entrenador</label>
                                    <select name='NombreEntrenador'>";
                                        foreach(cargarEntrenadoresGuardados() as $entrenador){
                                            echo "<option value='".$entrenador->getNombreDeUsuario()."'>".$entrenador->getNombreDeUsuario()."</option>";
                                        }
                                    echo "</select>
                                    <button>Guardar</button>
                                </form>";
                            }
                            echo "</li>";
                        }
                        if($_SESSION["Usuario"]->getNombreDeUsuario()==$_GET["Nombre"]){
                            echo "<li><h3>Otras Opciones:</h3></li>";
                            echo "<li><a href='Login.php'>Iniciar sesión</a></li>";
                            echo "<li><a href='RegistrarCliente.php'>Registro de cliente</a></li>";
                            echo "<li><a href='Logout.php'>Cerrar Sesión</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </section>
    </main>
</body>
</html>