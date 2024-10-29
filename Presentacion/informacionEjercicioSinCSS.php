<?php
    foreach(cargarEjerciciosGuardados2() as $ejercicioA){
        if($ejercicioA->getNombre() == $_GET["NombreEjercicio"]){
            $ejercicio=$ejercicioA;
        }
    }
?>
        <div class="divUp-divLeft">
            <?php
                echo "<img src='../Assets/imagenesEjercicios/".$ejercicio->getNombreImagen()."' alt='Imagen del ejercicio' width='400px' height='400px'>";
            ?>
        </div>
            <div class="divUp-divRight">
            <h2 class="tituloPagina">Datos del Ejercicio: <?php echo $ejercicio->getNombre()?></h2>
                <h2><?php echo $ejercicio->getNombre()?></h2>
                <h3>Descripcion: </h3>
                <p><?php echo $ejercicio->getDescripcion()?></p>
            </div>