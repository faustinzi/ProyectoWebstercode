<?php

include_once "../Logica/Library.php";

$volver=false;

if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]){
    $_SESSION["Alerta"]="Error de permisos.";
    volver();
    $volver=true;
}

if($_SESSION["Usuario"]->getRol()=="cliente"&&$_SESSION["Usuario"]->getNombreDeUsuario()!=$_GET["Nombre"]){
    $volver=true;
}

if($_SESSION["Usuario"]->getRol()=="entrenador"){
    $arrayClientes=[];
    $datos = $DBmanager->CargarTabla("tiene_asignado");
    foreach ($datos as $dato) {
        if($dato->nombre_entrenador==$_SESSION["Usuario"]->getNombreDeUsuario()){
            $arrayClientes[]=$dato->nombre_cliente;
        }
    }
    if(!in_array($_GET["Nombre"],$arrayClientes)){
        $volver=true;
    }
}

if($volver){
    volver();
}

$imagen=$DBmanager->CargarAtributoPrimaryKeyValorTabla("imagen","nombre_de_usuario",$_GET["Nombre"],"usuario");

include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evolución</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/stylesEvolucion.css">
    <link rel="stylesheet" href="styles/mobile/mobileEvolucion.css" media="(max-width: 1199px)">
</head>
<body>
    <?php include_once "nav.php" ?>
    <main class="main1">
    <main class="main2">
        <section class="sectionUp">
            <h2>Evolución y calificaciones del usuario: <?php echo $_GET["Nombre"] ?></h2>
            <img src="../Assets/imagenesUsuarios/<?php echo $imagen;?>" width=200px height=200px >
        </section>
        <?php if(in_array($_SESSION["Usuario"]->getRol(),["entrenador","administrador"])){?>   
        <h2 class="h2FA2">Agregar calificación</h2>
        <section class='formAdd'>
            <form action='../Logica/crearCalificacion.php' method='POST'>
                <input type='text' name='Nombre' hidden value='<?php echo $_GET["Nombre"] ?>'>
                <input type="text" name="Fecha" hidden value="<?php echo date('Y-m-d'); ?>">
                <label for="CumplimientoDeRutina">Cumplimiento de Rutina</label>
                <input type="number" name="CumplimientoDeRutina" min="0" max="20" required>
                <label for="ResistenciaAnaerobica">Resistencia Anaeróbica</label>
                <input type="number" name="ResistenciaAnaerobica" min="0" max="20" required>
                <label for="FuerzaMuscular">Fuerza Muscular</label>
                <input type="number" name="FuerzaMuscular" min="0" max="20" required>
                <label for="ResistenciaMuscular">Resistencia Muscular</label>
                <input type="number" name="ResistenciaMuscular" min="0" max="20" required>
                <label for="Flexibilidad">Flexibilidad</label>
                <input type="number" name="Flexibilidad" min="0" max="20" required>
                <label for="ResistenciaALaMonotonia">Resistencia a la Monotonía</label>
                <input type="number" name="ResistenciaALaMonotonia" min="0" max="20" required>
                <label for="Resiliencia">Resiliencia</label>
                <input type="number" name="Resiliencia" min="0" max="20" required>
                <button>Agregar</button>
            </form>
        </section>
        <?php } ?>
        <section class="sectionMid">
            <table>
                <tr>
                    <th class="col1">fecha</th>
                    <th>Cumplimiento de rutina</th>
                    <th>Resistencia anaeróbica</th>
                    <th>Fuerza muscular</th>
                    <th>Resistencia muscular</th>
                    <th>Flexibilidad</th>
                    <th>Resistencia a la monotonía</th>
                    <th>Resiliencia</th>
                    <th class="col9">Total</th>
                    <th class="col10">Pasa el mínimo esperado/aceptable?</th>
                    <th>Estado</th>
                </tr>
                <?php foreach(array_reverse(cargarCalificacionesUsuario($_GET["Nombre"])) as $calificacion){ ?>
                    <tr>
                    <td><?php echo $calificacion->getFecha(); ?></td>
                    <td><?php echo $calificacion->getCumplimientoDeRutina(); ?></td>
                    <td><?php echo $calificacion->getResistenciaAnaerobica(); ?></td>
                    <td><?php echo $calificacion->getFuerzaMuscular(); ?></td>
                    <td><?php echo $calificacion->getResistenciaMuscular(); ?></td>
                    <td><?php echo $calificacion->getFlexibilidad(); ?></td>
                    <td><?php echo $calificacion->getResistenciaALaMonotonia(); ?></td>
                    <td><?php echo $calificacion->getResiliencia(); ?></td>
                    <?php $total= $calificacion->getCumplimientoDeRutina()+$calificacion->getResistenciaAnaerobica()
                                +$calificacion->getFuerzaMuscular() + $calificacion->getResistenciaMuscular()
                                +$calificacion->getFlexibilidad() + $calificacion->getResistenciaALaMonotonia()
                                + $calificacion->getResiliencia() ?>
                    <td><?php echo $total ?></td>
                    <?php $minimo="no"; 
                        if($total>=80 && $calificacion->getCumplimientoDeRutina()>=10 && $calificacion->getResistenciaAnaerobica()>=10 && $calificacion->getFuerzaMuscular()>=10 && $calificacion->getResistenciaMuscular()>=10 && $calificacion->getFlexibilidad()>=10 && $calificacion->getResistenciaALaMonotonia()>=10 && $calificacion->getResiliencia()>=10 ){$minimo="si";} 
                        ?>
                    <td><?php echo $minimo; ?></td>    
                    <td class="estadoCelda"><?php echo obtenerEstadoDeCalificacion($_GET["Nombre"],$total); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </section>
        <h2>Criterio de Calificación:</h2>
        <section class="sectionDown">
            <div class="divLeft">
                <h3>Aspectos Calificados:</h3>
                <p>Los aspectos calificados son siete, cada uno con una puntuación mínima de 0 y máxima de 20.</p>
                <ul><li>Cumplimiento de rutina</li><li>Resistencia Anaeróbica</li><li>Fuerza Muscular</li><li>Resistencia Muscular</li>
                    <li>Flexibilidad</li><li>Resistencia a la Monotonía</li><li>Resiliencia</li></ul>
                <h3>Puntaje Total:</h3>
                <p>El puntaje total es la suma de los puntajes de los 7 aspectos calificados, tiene una puntuación mínima de 0 y una máxima de 140.</p>
            </div>
            <div class="divRight">
                <h3>Mínimo Esperado/Aceptable:</h3>
                <p>Se considera como mínimo esperado y/o aceptable una calificación con puntuación total de al menos 80 puntos y puntuación en cada aspecto de al menos 10 puntos.</p>
                <h3>Estado:</h3>
                <p>Según el puntaje total de la calificación se posiciona en un estado. Cada calificación proporciona un estado para el usuario, y el estado actual de un usuario es el estado proporcionado por la última calificación que se le haya hecho. </p>
                <p>Para usuarios deportistas, los estados son: Principiante, Bajo, Medio, Alto, Para seleccionar. Y para usuarios pacientes de fisioterapia, los estados son: Inicio, Sin evolución, En evolución, Satisfactorio.</p>
            </div>
        </section>
    </main>
    </main>
</body>
</html>