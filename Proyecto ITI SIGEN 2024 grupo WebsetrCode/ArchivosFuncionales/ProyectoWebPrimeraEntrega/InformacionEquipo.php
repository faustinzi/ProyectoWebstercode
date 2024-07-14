<?php
include_once "Library.php";
$equipo=null;
foreach(getAllSavedTeams() as $equipoA){
    if($equipoA->nombre==$_GET["Nombre"]){
        $equipo=$equipoA;
    }
}
if(!$equipo){
    if (isset($_SERVER['HTTP_REFERER'])) {
        $urlAnterior = $_SERVER['HTTP_REFERER'];
        header("Location: $urlAnterior");
        exit();
    } else {
        header("Location: Inicio.php");
        exit();
    }
}
foreach($equipo->jugadores as $jugador){
    if($jugador==null){
        $jugadoresClientes[]=null;
    }else{
        $nn=null;
        foreach(cargarClientesGuardados() as $clienteA){
            if($clienteA->getNombreDeUsuario()==$jugador){
                $nn=$clienteA;
            }
        }
        $jugadoresClientes[]=$nn;
    }
}
foreach($equipo->suplentes as $suplente){
    if($suplente==null){
        $suplentesClientes[]=null;
    }else{
        $nn=null;
        foreach(cargarClientesGuardados() as $clienteA){
            if($clienteA->getNombreDeUsuario()==$suplente){
                $nn=$clienteA;
            }
        }
        $suplentesClientes[]=$nn;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styleInformacionEquipo.css">
</head>
<body>
    <?php
        include_once "nav.php";
    ?>
    <style>
        .divCourt{
            <?php
            echo "background-image: url('Assets/imagenes/cancha".$equipo->deporte.".png');";
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
            <h1>Informacion del equipo: <?php echo $equipo->nombre?></h1>
            <div class="divUp">
                <img src='Assets/ImagenesEquipos/<?php echo $equipo->imagen?>' width="150px" height="150px">
                <h3><?php echo $equipo->nombre?></h3>
                <h3><?php echo $equipo->deporte?></h3>
            </div>
            <h2>Jugadores:</h2>
            <div class="divCourt">
                <?php
                    for ($i = 1; $i <= $Deportes[$equipo->deporte]["CantidadDeJugadores"]; $i++) {
                        echo "<article class='jugador".$i."'>";
                            if($jugadoresClientes[$i-1]==null){
                                echo "<img src='Assets/ImagenesUsuarios/Default.png' width=50px height=50px>
                                    <h3>No hay</h3>
                                    <p>Posición: ".$i."</p>";
                            }else{
                                echo "<img src='Assets/ImagenesUsuarios/".$jugadoresClientes[$i-1]->getNombreImagen()."' width=50px height=50px>
                                    <h3>".$jugadoresClientes[$i-1]->getNombreDeUsuario()."</h3>
                                    <p>Posición: ".$i."</p>";
                            }
                        echo "</article>";
                    }
                ?>
            </div>
            <h2>Suplentes:</h2>
            <div class="divDown">
                <?php
                    for($i = 1; $i <= count($equipo->suplentes) ; $i++) {
                        echo "<article class='suplente".$i."'>";
                            if($suplentesClientes[$i-1]==null){
                                echo "<img src='Assets/ImagenesUsuarios/Default.png' width=50px height=50px>
                                    <h3>Error de carga</h3>";
                            }else{
                                echo "<img src='Assets/ImagenesUsuarios/".$suplentesClientes[$i-1]->getNombreImagen()."' width=50px height=50px>
                                    <h3>".$suplentesClientes[$i-1]->getNombreDeUsuario()."</h3>";
                            }
                        echo "</article>";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>