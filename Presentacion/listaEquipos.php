<?php
include_once "../Logica/Library.php";
if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"])){
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
    <title>Equipos</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleListaEquipos.css">
    <link rel="stylesheet" href="styles/mobile/mobileListaEquipos.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>
    <main>
        <section>
            <div>
                <h1 class="titulo">Lista de Equipos</h1>
            </div>
            <div>
                <h3>Agregar Nuevo Equipo</h3>
                <form action="../Logica/nuevoEquipoProcesar.php" method="POST">
                    <label for="Nombre">Nombre: </label><input type="text" name="Nombre" required>
                    <label for="Descripcion">Deporte: </label><select name="Deporte" required>
                        <?php
                            foreach($Deportes as $deporte){
                                echo "<option value='".$deporte["nombre"]."'>".$deporte["nombre"]."</option>";
                            }
                        ?>
                    </select>
                    <button>Crear</button>
                </form>
            </div>
            <?php
                foreach(getAllSavedTeams2() as $equipo){
                    if((in_array($_SESSION["Usuario"]->getRol(),["seleccionador"])&&in_array($equipo->nombre,$DBmanager->obtenerEquiposDeSeleccionador($_SESSION["Usuario"]->getNombreDeUsuario())))||$_SESSION["Usuario"]->getRol()=="administrador"){
                        echo "<article>
                            <img src='../Assets/ImagenesEquipos/".$equipo->imagen."' width='100px' height='100px'>
                            <h3>".$equipo->nombre."</h3>
                            <h3>".$equipo->deporte."</h3>
                            <a class='aB' href='InformacionEquipo.php?Nombre=".$equipo->nombre."'><p class='ap'>Ver</p></a>";
                            if(in_array($_SESSION["Usuario"]->getRol(),["administrador"])){
                                echo "<a class='aB' href='../Logica/eliminarEquipoProcesar.php?Nombre=".$equipo->nombre."'><p class='ap'>Eliminar</p></a>";
                            }
                        echo "</article>";
                        
                    }
                }
            ?>
        </section>
    </main>
</body>
</html>