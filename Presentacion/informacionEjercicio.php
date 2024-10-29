<?php
    include_once "../Logica/Library.php";
    if(!isset($_GET["Nombre"])||!$_GET["Nombre"]){
        header("location:Inicio.php");
        exit();
    }
    foreach(cargarEjerciciosGuardados2() as $ejercicioA){
        if($ejercicioA->getNombre() == $_GET["Nombre"]){
            $ejercicio=$ejercicioA;
        }
    }
    
    include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Ejercicio</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/stylesInfoEjercicio.css">
    <link rel="stylesheet" href="styles/mobile/mobileEjercicio.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>

    <main>
        <section>
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
                <?php if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]&&in_array($_SESSION["Usuario"]->getRol(),["gerente","avanzado","administrador"])){ ?>
                <div class="divUp-divForm"  id="newPlanForm">
                    <form action="../Logica/modificarEjercicioProcesar.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="Nombre" value="<?php echo $ejercicio->getNombre() ?>" hidden>
                        <p><label for="Nombre">Nombre: </label><input type="text" name="NombreNuevo" required></p>
                        <p><label for="Descripcion">Descripción: </label><textarea name="Descripcion" rows="5" cols="40" ></textarea></p>
                        <p><label for="Imagen">Imágen: </label><input type="file" name="Imagen" accept="image/png"></p>
                        <button>Modificar</button>
                    </form>
                </div>
                <button id="toggleFormBtn" onclick="toggleForm()"><h3>Modificar</h3></button>
                <?php } ?>
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
                form.style.display = "flex";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>