<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="styles/stylesInicio.css">
</head>
<body>
    <?php 
        include_once "Library.php";
        include_once "nav.php";
    ?>
    <section>
        <div class="divInicio">
                <div class="inicio-divRight-sectionUp-SliderDiv">
                    <ul>
                        <li><img src="Assets/imagenes/gymimg.png" alt=""></li>
                        <li><img src="Assets/imagenes/gymimg2.png" alt=""></li>
                        <li><img src="Assets/imagenes/gymimg3.png" alt=""></li>
                        <li><img src="Assets/imagenes/gymimg4.png" alt=""></li>
                    </ul>
                </div>
                <div class="InicioDown">
                    <h1>| S.I.G.E.N. | Donde tus metas se convierten en logros</h1>
                </div>
        </div>
        <div class="divInicio">
            <div class="div2">
                <h1 class="Nuestrosh1">Nuestros servicios:</h1>
                <details>
                    <summary>Entrenamiento asistido por un entrenador</summary>
                    <p>El "Entrenamiento asistido por un entrenador" proporciona guía y supervisión profesional durante el ejercicio, asegurando técnica correcta, personalización y motivación para maximizar resultados y minimizar riesgos.</p>
                </details>
                <details>
                    <summary>Recuperación muscular mediante fisioterapia</summary>
                    <p>La "Recuperación muscular mediante fisioterapia" utiliza técnicas especializadas para aliviar el dolor, mejorar la movilidad y acelerar la sanación de músculos lesionados, promoviendo una recuperación eficiente y segura.</p>
                </details>
                <details>
                    <summary>Seguimiento de la evolución física</summary>
                    <p>El "Seguimiento de la evolución física" registra y analiza el progreso de tu condición física a lo largo del tiempo, ayudándote a ajustar tu entrenamiento y alcanzar tus objetivos de manera eficiente.</p>
                </details>
                <details>
                    <summary>Creación y administración de equipos deportivos</summary>
                    <p>La "Creación y administración de equipos deportivos" implica formar y gestionar equipos, seleccionando jugadores según el registro de sus capacidades y logros en la actividad física.</p>
                </details>
            </div>
        </div>
        <div class="divInicio">
            <div class="div3">
                <h1 class="Nuestrosh1">Sucursales:</h1>
                <article>
                    <img src="Assets/imagenes/gymimg2.png" width="500px" height="280px">
                    <p class="p1">Punta Carretas</p>
                </article>
                <article>
                    <img src="Assets/imagenes/sucursal.png" width="500px" height="280px">
                    <p class="p1">Pocitos</p>
                </article>
                <article>
                    <img src="Assets/imagenes/sucursal2.png" width="500px" height="280px">
                    <p class="p1">Palermo</p>
                </article>
            </div>
        </div>
    </section>
    <footer>
        <img src="Assets/imagenes/logoinstagram.png"><h2>@SIGENgym</h2>
        <img src="Assets/imagenes/logofacebook.png"><h2>@SIGENoficial</h2>
        <img src="Assets/imagenes/logotwitter.png"><h2>@SIGEN</h2>
    </footer>
</body>
</html>