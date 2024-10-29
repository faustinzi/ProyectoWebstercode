<?php
include_once "../Logica/Library.php";
if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Gimnasios</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleListaGimnasios.css">
    <link rel="stylesheet" href="styles/mobile/mobileListaGimnasios.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 

        include_once "nav.php";
    ?>
    <main>
        <section>
            <div>
                <h1 class="titulo">Lista de Gimnasios</h1>
            </div>
            <div>
                <h3>Agregar Nuevo Gimnasio</h3>
                <form action="../Logica/nuevoGimnasioProcesar.php" method="POST">
                    <label for="Nombre">Nombre: </label><input type="text" name="Nombre" required>
                    <label for="Capacidad">Capacidad: </label><input type="number" name="Capacidad" min="0" value="50" required>
                    <button>Agregar</button>
                </form>
            </div>
            <?php
                foreach(getAllSavedGyms2() as $gym){
                    echo "<article>
                        <h3><b>Nombre:</b> ".$gym->getNombre()."</h3>
                        <h3><b>Capacidad:</b> ".$gym->getCapacidad()."</h3>";
                        if(in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
                            echo "<a class='a' href='../Logica/eliminarGimnasioProcesar.php?Nombre=".$gym->getNombre()."'><p class='ap'>Eliminar</p></a>";
                            echo '<form class="form2" action="../Logica/modificarGimnasioProcesar.php" method="POST"><input type="text" name="nombre" value="'.$gym->getNombre().'" hidden><label>Nombre</label><input type="text" name="nombreNuevo" value="'.$gym->getNombre().'" placeholder="'.$gym->getNombre().'" required><label>Capacidad</label><input type="number" name="capacidad" min="0" value='.$gym->getCapacidad().' placeholder="'.$gym->getCapacidad().'" required><button>Modificar</button></form>';
                        }
                    echo "</article>";
                }
            ?>
        </section>
    </main>
</body>
</html>