<?php
include_once "../Logica/Library.php";

if(!$_SESSION["Usuario"]||!in_array($_SESSION["Usuario"]->getRol(),["gerente","entrenador","avanzado","seleccionador","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    header("location:Inicio.php");
    exit();
}

$usuarioSession=$_SESSION["Usuario"];
$arrayClientes=[];
$datos = $DBmanager->CargarTabla("tiene_asignado");
foreach ($datos as $dato) {
    if($dato->nombre_entrenador==$usuarioSession->getNombreDeUsuario()){
        $arrayClientes[]=$dato->nombre_cliente;
    }
}

$clientes=cargarClientesGuardados2();


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
            if(in_array($_SESSION["Usuario"]->getRol(),["entrenador"])){
                echo "<h2>Lista de clientes asignados al entrenador:".$_SESSION["Usuario"]->getNombreDeUsuario()."</h2>";
            }
            if(in_array($_SESSION["Usuario"]->getRol(),["gerente","seleccionador","administrador"])){
                echo "<h2>Lista de clientes</h2>";
            }
                echo "</article>";
            echo "<section>";
            foreach($clientes as $cliente){
            if(in_array($cliente->getNombreDeUsuario(),$arrayClientes)||in_array($_SESSION["Usuario"]->getRol(),["gerente","seleccionador","administrador"])){ 
                echo "<article class='articleD'>
                    <div>
                        <div class='divUp'>
                            <img src='../Assets/ImagenesUsuarios/".$cliente->getNombreImagen()."' alt='' width='75px' height='75px'>
                        </div>
                        <div clas='divUp'>
                            <p>".$cliente->getNombreRealNombre()." ".$cliente->getNombreRealPrimerApellido()."</p>
                            <p>Nombre de Usuario: ".$cliente->getNombreDeUsuario()."</p>
                        </div>
                    </div>
                    <div>
                        <a class='aB' href='informacionUsuario.php?Nombre=".$cliente->getNombreDeUsuario()."'>Datos</a>
                        <a class='aB' href='../Logica/RedirigirPlan.php?NombreClientePasado=".$cliente->getNombreDeUsuario()."'>Rutina</a>
                        <a class='aB' href='Evolucion.php?Nombre=".$cliente->getNombreDeUsuario()."'>Evolucion</a>
                        <a class='aB' href='../Logica/eliminarUsuario.php?Nombre=".$cliente->getNombreDeUsuario()."'>Eliminar</a>
                    </div>
                </article>";
            }
            }
            echo "</section>";
        ?>
    </section>
    
</body>
</html>
