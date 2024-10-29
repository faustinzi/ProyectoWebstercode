<?php
include_once "../Logica/Library.php";
$equipo=null;

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"])){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
}

if($_SESSION["Usuario"]->getRol()=="seleccionador"){
    if(!in_array($_GET["Nombre"],$DBmanager->obtenerEquiposDeSeleccionador($_SESSION["Usuario"]->getNombreDeUsuario()))){
        header("Location: ../Presentacion/Inicio.php");
        exit();
    }
}

foreach(getAllSavedTeams2() as $equipoA){
    if($equipoA->nombre==$_GET["Nombre"]){
        $equipo=$equipoA;
    }
}
if(!$equipo){
    volver();
}
$asignaciones=$DBmanager->CargarEstanEnEquipo($equipo->nombre);
$jugadores=[];
$suplentes=[];
foreach($asignaciones as $asignacion){
    if($asignacion->tipo=='jugador'){
        $jugadores[$asignacion->posicion]=$asignacion->nombre_deportista;
    }else{
        $suplentes[]=$asignacion->nombre_deportista;
    }
}
$nombres=[];
foreach($jugadores as &$jugador){
    foreach(cargarClientesGuardados2() as $cliente){
        if($cliente->getNombreDeUsuario()==$jugador){
            $jugador=$cliente;
            $nombres[]=$cliente->getNombreDeUsuario();
        }
    }               
}
foreach($suplentes as &$suplente){
    foreach(cargarClientesGuardados2() as $cliente){
        if($cliente->getNombreDeUsuario()==$suplente){
            $suplente=$cliente;
            $nombres[]=$cliente->getNombreDeUsuario();
        }
    }               
}

include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de equipo</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleInformacionEquipo.css">
    <link rel="stylesheet" href="styles/mobile/mobileEquipo.css" media="(max-width: 1199px)">
</head>
<body>
    <?php
        include_once "nav.php";
    ?>
    <style>
        .divCourt{
            <?php
            echo "background-image: url('../Assets/imagenes/cancha".$equipo->deporte.".png');";
            ?>
        }
        <?php
            for ($i = 1; $i <= $Deportes[$equipo->deporte]["CantidadDeJugadores"]; $i++) {
                echo ".jugador".$i."{
                        grid-column: ".$Deportes[$equipo->deporte]["Grid"][$i]["column"].";
                        grid-row: ".$Deportes[$equipo->deporte]["Grid"][$i]["row"].";
                }";
            }
        ?>
    </style>
    <main>
        <section>
            <h1>Información del equipo: <?php echo $equipo->nombre?></h1>
            <div class="divUp">
                <img src='../Assets/ImagenesEquipos/<?php echo $equipo->imagen?>' width="150px" height="150px">
                <h3>Nombre: <?php echo $equipo->nombre?></h3>
                <h3>Deporte: <?php echo $equipo->deporte?></h3>
                <button id="toggleFormBtn" onclick="toggleForm()"><h3>Modificar</h3></button>
                <form id="newPlanForm" action="../Logica/modificarEquipoProcesar.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="Nombre" value="<?php echo $equipo->nombre ?>" hidden>
                    <p><label for="Nombre">Nombre: </label><input type="text" name="NombreNuevo" required></p>
                    <p><label for="Imagen">Imágen: </label><input type="file" name="Imagen" accept="image/png"></p>
                    <button class='button1'>Modificar</button>
                    </form>
                </form>
            </div>
            <h2>Jugadores:</h2>
            <div class="divCourtDiv">
            <div class="divCourt">
            <?php
            for ($i = 1; $i <= $Deportes[$equipo->deporte]["CantidadDeJugadores"]; $i++) {
                echo "<article class='jugador".$i."'>";
                if(!isset($jugadores[$i]) || !$jugadores[$i]) {
                    echo "<img src='../Assets/ImagenesUsuarios/Default.png' width=50px height=50px>
                        <h3 class='nombreJug'>No hay</h3>
                        <p class='Pos'>Posición: ".($i)."</p>";
                } else {
                    echo "<img src='../Assets/ImagenesUsuarios/".$jugadores[$i]->getNombreImagen()."' width=50px height=50px>
                        <h3 class='nombreJug'>".$jugadores[$i]->getNombreDeUsuario()."</h3>
                        <p class='Pos'>Posición: ".($i)."</p>";
                }
                ?>
                <form action="../Logica/equipoCambiarJugador.php" method="POST">
                    <input type="text" name="NombreEquipo" value="<?php echo $equipo->nombre; ?>" hidden>
                    <input type="text" name="NombreJugadorAnterior" value="<?php if(isset($jugadores[$i])&&$jugadores[$i]){ echo $jugadores[$i]->getNombreDeUsuario(); }else{echo "-";}  ?>" hidden> 
                    <input type="number" name="Posicion" value="<?php echo $i; ?>" hidden>
                    <select name="NombreJugador">
                        <option value="-">-</option>
                        <?php 
                        foreach($DBmanager->CargarTabla("deportista") as $deportista) {
                            // Comparar el nombre del deportista con el jugador actual para establecer la opción seleccionada
                            $selected = (isset($jugadores[$i]) && $deportista->nombre_de_usuario === $jugadores[$i]->getNombreDeUsuario()) ? 'selected' : '';
                            if($selected=='selected'||!in_array($deportista->nombre_de_usuario,$nombres)){
                        ?>
                            <option value="<?php echo $deportista->nombre_de_usuario; ?>" <?php echo $selected; ?>>
                                <?php echo $deportista->nombre_de_usuario; ?>
                            </option>
                        <?php }} ?>
                    </select>
                    <button class='button2'>🔄</button>
                </form>
                <?php
                echo "</article>";
            }
            ?>

            </div>
            </div>
            <h2>Suplentes:</h2>
            <div class="divDown">
                <form action="../Logica/equipoAgregarSuplente.php" method="POST">
                    <input type="text" name="NombreEquipo" value="<?php echo $equipo->nombre ?>" hidden>
                    <label for="NombreSuplente">Agregar Suplente</label>
                    <select class="selectSuplente" name="NombreSuplente">
                        <option value="-">-</option>
                        <?php foreach($DBmanager->CargarTabla("deportista") as $deportista){ 
                                    if(!in_array($deportista->nombre_de_usuario,$nombres)){ ?>
                            <option value="<?php echo $deportista->nombre_de_usuario; ?>"><?php echo $deportista->nombre_de_usuario; ?></option>
                        <?php }} ?>
                    </select>
                    <button class='button1'>agregar</button>
                </form>
                <?php
                    if(isset($suplentes)&&$suplentes){
                        for($i = 1; $i <= count($suplentes) ; $i++) {
                            echo "<article class='suplente".$i."'>";
                                if($suplentes[$i-1]==null){
                                    echo "<img src='../Assets/ImagenesUsuarios/Default.png' width=50px height=50px>
                                        <h3>Error de carga</h3>";
                                }else{
                                    echo "<img src='../Assets/ImagenesUsuarios/".$suplentes[$i-1]->getNombreImagen()."' width=50px height=50px>
                                        <h3>".$suplentes[$i-1]->getNombreDeUsuario()."</h3>";
                                }
                                echo '<form action="../Logica/equipoEliminarSuplente.php" method="POST">
                                        <input type="text" value="'.$equipo->nombre.'" name="NombreEquipo" hidden>
                                        <input type="text" name="NombreSuplente" value="'.$suplentes[$i-1]->getNombreDeUsuario().'" hidden>
                                        <button class="button1">Eliminar</button>
                                    </form>';
                            echo "</article>";
                        }
                    }
                ?>
            </div>
        </section>

    </main>
    
    <script>
        window.onload = function() {
            document.getElementById("newPlanForm").style.display = "none";
        };

        function toggleForm() {
            // Selecciona el formulario de nuevo plan y el botón
            const form = document.getElementById("newPlanForm");
            const toggleButton = document.getElementById("toggleFormBtn");

            // Alterna la visibilidad del formulario
            if (form.style.display === "none") {
                form.style.display = "grid";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>