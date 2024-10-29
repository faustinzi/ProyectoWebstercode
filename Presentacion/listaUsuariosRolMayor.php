<?php
include_once "../Logica/Library.php";

if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]||!in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

$usuarios=cargarUsuarios2Guardados2();

$usuariosFiltrados=[];
foreach($usuarios as $usuario){
    if($usuario->getRol()!="cliente"){
        $usuariosFiltrados[]=$usuario;
    }
}

include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/stylesListaUsuariosEntrenador.css">
    <link rel="stylesheet" href="styles/mobile/mobileListaUsuariosEntrenador.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>
    
    <section class="sectionA">
        <?php 
            echo "<article class='articleTitle'>";
            echo "<h2>Lista de Usuarios de Rol Mayor</h2>";
                echo "</article>";
            echo "<section>";
            foreach($usuariosFiltrados as $usuario){
                echo "<article class='articleD'>
                    <div>
                        <div class='divUp'>
                            <img src='../Assets/ImagenesUsuarios/".$usuario->getNombreImagen()."' alt='' width='75px' height='75px'>
                        </div>
                        <div clas='divUp'>
                            <p>Nombre de Usuario: ".$usuario->getNombreDeUsuario()."</p>
                        </div>
                    </div>
                    <div>
                        <a class='aB' href='informacionUsuario.php?Nombre=".$usuario->getNombreDeUsuario()."'>Datos</a>
                        <a class='aB' href='../Logica/eliminarUsuario.php?Nombre=".$usuario->getNombreDeUsuario()."'>Eliminar</a>
                    </div>
                </article>";
            }
            echo "</section>";
        ?>
    </section>
    
</body>
</html>
