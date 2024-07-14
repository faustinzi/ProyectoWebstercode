<?php
include_once "Library.php";

if(!$_SESSION["Usuario"]||!in_array($_SESSION["Usuario"]->getRol(),["gerente","entrenador","seleccionador"])){
    header("location:Inicio.php");
    exit();
}

$usuarioSession=$_SESSION["Usuario"];
$arrayClientes=[];
$datos = json_decode(file_get_contents("Datos/tieneAsignado.json"));
foreach ($datos as $dato) {
    if($dato->nombreEntrenador==$usuarioSession->getNombreDeUsuario()){
        $arrayClientes[]=$dato->nombreCliente;
    }
}

$clientes=cargarClientesGuardados();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/stylesListaUsuariosEntrenador.css">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>
    
    <section class="sectionA">
        <?php 
            echo "<article>";
            if(in_array($_SESSION["Usuario"]->getRol(),["entrenador"])){
                echo "<h2>Lista de clientes asignados al entrenador:".$_SESSION["Usuario"]->getNombreDeUsuario()."</h2>";
            }
            if(in_array($_SESSION["Usuario"]->getRol(),["gerente","seleccionador"])){
                echo "<h2>Lista de clientes</h2>";
            }
                echo "</article>";
            echo "<section>";
            foreach($clientes as $cliente){
            if(in_array($cliente->getNombreDeUsuario(),$arrayClientes)||in_array($_SESSION["Usuario"]->getRol(),["gerente","seleccionador"])){ 
                echo "<article>
                    <div>
                        <div class='divUp'>
                            <img src='Assets/ImagenesUsuarios/".$cliente->getNombreImagen()."' alt='' width='75px' height='75px'>
                        </div>
                        <div clas='divUp'>
                            <p>".$cliente->getNombreRealNombre()." ".$cliente->getNombreRealPrimerApellido()."</p>
                            <p>Nombre de Usuario: ".$cliente->getNombreDeUsuario()."</p>
                        </div>
                    </div>
                    <div>
                        <a href='informacionUsuario.php?Nombre=".$cliente->getNombreDeUsuario()."'>Datos</a>
                        <a href='Rutina.php'>Rutina</a>
                        <a href='Evolucion.php'>Evolucion</a>
                    </div>
                </article>";
            }
            }
            echo "</section>";
        ?>
    </section>
    
</body>
</html>
