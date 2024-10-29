<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleListaPlanes.css">
    <link rel="stylesheet" href="styles/mobile/mobileListaPlanes.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "../Logica/Library.php";
        include_once "alertaAddon.php";
        include_once "nav.php";
    ?>
    <main>
        <section>
            <div>
                <h1 class="titulo">Lista de los Planes guardados</h1>
            </div>
            <?php 
            if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]){
            if(in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","avanzado","administrador"])){ ?>
            <button id="toggleFormBtn" onclick="toggleForm()"><h3>Agregar Nuevo Plan</h3></button>
                <div class="DivNuevoPlan" id="newPlanForm">
                    <form action="../Logica/nuevoPlanProcesar.php" method="POST" enctype="multipart/form-data">
                        <p><label for="Nombre">Nombre: </label><input type="text" name="Nombre" required></p>
                        <p><label for="Descripcion">Descripción: </label><textarea name="Descripcion" rows="7" cols="50" ></textarea></p>
                        <p><label for="Objetivo">Objetivo: </label><textarea name="Objetivo" rows="7" cols="50" ></textarea></p>
                        <button>Crear</button>
                    </form>
                </div>
            <?php }} ?>
            <?php
                if(cargarPlanesGuardados2()){
                    foreach(cargarPlanesGuardados2() as $planA){
                        echo "<article>
                            <h3>".$planA->getNombre()."</h3>
                            <a class='a' href='informacionPlan.php?NombrePlan=".$planA->getNombre()."'><p class='ap'>Ver</p></a>";
                            if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]){
                                if(in_array($_SESSION["Usuario"]->getRol(),["gerente","avanzado","administrador"])){
                                    echo "<a class='a' href='../Logica/eliminarPlanProcesar.php?Nombre=".$planA->getNombre()."'><p class='ap'>Eliminar</p></a>";
                                }
                            }
                        echo "</article>";
                    }   
                }
            ?>
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