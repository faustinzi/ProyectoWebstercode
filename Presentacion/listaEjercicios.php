<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/styleListaEjercicios.css">
    <link rel="stylesheet" href="styles/mobile/mobileListaEjercicios.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "../Logica/Library.php";
        include_once "nav.php";

        $arrayEjercicios=[];
        foreach(cargarEjerciciosGuardados2() as $eje){
            $arrayEjercicios[]=$eje->getNombre();
        }
        
        include_once "alertaAddon.php";
    ?>
    <script> 
        var arregloEjercicios = <?php echo json_encode($arrayEjercicios); ?>; 
    </script>
    <main>
        <section>
            <div>
                <h1 class="titulo">Lista de los Ejercicios guardados</h1>
            </div>
            <div class="divBuscador">
                <p class="listaBusqueda" id="listaBusqueda"></p>
                <input type="text" placeholder="Buscador de Ejercicios" id="buscadorEjercicios">
            </div>
            <?php 
            if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]){
                if(in_array($_SESSION["Usuario"]->getRol(),["gerente","avanzado","administrador"])){ ?>
                <button id="toggleFormBtn" onclick="toggleForm()"><h3>Agregar Nuevo Ejercicio</h3></button>
                    <div class="DivNuevoEjercicio"  id="newPlanForm">
                        <form action="../Logica/nuevoEjercicioProcesar.php" method="POST" enctype="multipart/form-data">
                            <p><label for="Nombre">Nombre: </label><input type="text" name="Nombre" required></p>
                            <p><label for="Descripcion">Descripción: </label><textarea name="Descripcion" rows="7" cols="50" ></textarea></p>
                            <p><label for="Imagen">Imágen: </label><input type="file" name="Imagen" accept="image/png"></p>
                            <button>Crear</button>
                        </form>
                    </div>
            <?php }} ?>
            <?php
                if(cargarEjerciciosGuardados2()){
                    foreach(cargarEjerciciosGuardados2() as $ejercicio){
                        if(true){}
                        echo "<article>
                            <img src='../Assets/ImagenesEjercicios/".$ejercicio->getNombreImagen()."' width='100px' height='100px'>
                            <h3>".$ejercicio->getNombre()."</h3>
                            <a class='a' href='informacionEjercicio.php?Nombre=".$ejercicio->getNombre()."'><p class='ap'>Ver</p></a>";
                            if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]){
                                if(in_array($_SESSION["Usuario"]->getRol(),["gerente","avanzado","administrador"])){
                                    echo "<a class='a' href='../Logica/eliminarEjercicioProcesar.php?Nombre=".$ejercicio->getNombre()."'><p class='ap'>Eliminar</p></a>";
                                }
                            }
                        echo "</article>";
                    }   
                }
            ?>
        </section>
    </main>
    <script src="scripts/buscadorListaEjercicios.js"></script>

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