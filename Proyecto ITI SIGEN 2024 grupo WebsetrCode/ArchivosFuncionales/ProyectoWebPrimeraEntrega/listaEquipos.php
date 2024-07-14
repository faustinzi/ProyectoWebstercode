<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styleListaEquipos.css">
</head>
<body>
    <?php 
        include_once "Library.php";
        include_once "nav.php";
    ?>
    <main>
        <section>
            <div>
                <h1>Lista de Equipos</h1>
            </div>
            <div>
                <h3>Nuevo Equipo</h3>
                <form action="nuevoEquipoProcesar.php" method="POST">
                    <label for="Nombre">Nombre: </label><input type="text" name="Nombre" required>
                    <label for="Deporte">Deporte: </label><select name="Deporte" required>
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
                foreach(getAllSavedTeams() as $equipo){
                    echo "<article>
                        <img src='Assets/ImagenesEquipos/".$equipo->imagen."' width='100px' height='100px'>
                        <h3>".$equipo->nombre."</h3>
                        <h3>".$equipo->deporte."</h3>
                        <a href='InformacionEquipo.php?Nombre=".$equipo->nombre."'>Ver</a>
                    </article>";
                }
            ?>
        </section>
    </main>
</body>
</html>