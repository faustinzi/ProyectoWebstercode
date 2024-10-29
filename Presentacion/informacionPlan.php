<?php
include_once "../Logica/Library.php";

$opciones= json_encode(array_merge(["-"],cargarNombresEjerciciosGuardados()));

if(!isset($_GET["modo"]) || !$_GET["modo"]){
    $_GET["modo"]="ver";
}

if(!isset($_GET["NombrePlan"]) || !$_GET["NombrePlan"]){
    header("location: Inicio.php");
    exit();
}
foreach(cargarPlanesGuardados2() as $planA){
    if($planA->getNombre() == $_GET["NombrePlan"]){
        $plan=$planA;
    }
}
if(!isset($plan)){
    header("Location: Inicio.php");
    exit();
}

include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de plan</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <!-- Handsontable CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
    <link rel="stylesheet" href="styles/styleInfoPlan.css">
    <link rel="stylesheet" href="styles/mobile/mobileInfoPlan.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>
    <main>
        <section>
            <div class="SectionDivUp">
                <h2 class="TituloI">Nombre del Plan: <?php echo $plan->getNombre();?></h2>
                <h4 class="DescripcionI">Descripción: <?php echo $plan->getDescripcion();?></h4>
                <h4 class="ObjetivoI">Objetivo: <?php echo $plan->getObjetivo(); ?></h4>
            </div>
            <?php if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]&&in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","avanzado","administrador"])){ ?>
            <button id="toggleFormBtn" onclick="toggleForm()"><h2>Modificar</h2></button>
            <div class="divModificarPlan" id="newPlanForm">
                <form action="../Logica/modificarPlanProcesar.php" method="POST">
                    <input type="text" name="Nombre" value="<?php echo $plan->getNombre() ?>" hidden>
                    <label>Nombre: </label><input type="text" name="NombreNuevo" value="<?php echo $plan->getNombre() ?>" placeholder="<?php echo $plan->getNombre() ?>" required>
                    <label>Descripción: </label><textarea name="Descripcion" value="<?php echo $plan->getDescripcion() ?>" placeholder="<?php echo $plan->getDescripcion() ?>" rows="5" cols="40" required></textarea>
                    <label>Objetivo: </label><textarea name="Objetivo" value="<?php echo $plan->getObjetivo() ?>" placeholder="<?php echo $plan->getObjetivo() ?>" rows="5" cols="40" required></textarea>
                    <button>Modificar</button>
                </form>
            </div>
            <?php } ?>
            <div class="container3434">
            <div class="excelDiv">
            <?php
                if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]) {
                if(in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","avanzado","administrador"])){ ?>
                <div class="DivMenuGrilla"> 
                    <?php if($_GET["modo"]=="editar"){ ?>
                            <div class="MenuBotonModo"><a href="informacionPlan.php?NombrePlan=<?php echo $plan->getNombre() ?>&modo=ver"><button>Ver</button></a></div>
                            <div class="MenuDiv"><button id="newRowButton">AgregarFila</button></div>
                            <div class="MenuBotonEliminarFila"><button id="removeRowButton">Eliminar Ultima Fila</button></div>
                            <div class="MenuDiv"><button id="newColumnButton">AgregarColumna</button></div>
                            <div class="MenuDiv"><button id="removeColumnButton">Eliminar Ultima Columna</button></div>
                            <div class="MenuBotonGuardar"><button id="saveBtn">Guardar</button></div>
                        <?php } else { ?>
                            <div class="MenuBotonModo"><a href="informacionPlan.php?NombrePlan=<?php echo $plan->getNombre() ?>&modo=editar"><button>Editar</button></a></div>
                    <?php } ?>
                </div>
                <?php }} ?>
                <div id="excelGrid" class="hot"></div>
            </div>
            <div class="DivInfoEjercicio" id="DivEjercicio">
                <?php 
                if(!isset($_GET["NombreEjercicio"])||!in_array($_GET["NombreEjercicio"],cargarNombresEjerciciosGuardados())){
                    $_GET["NombreEjercicio"]="Sentadilla";
                }
                include_once "informacionEjercicioSinCSS.php"; ?>
            </div>
            </div>
        </section>
    </main>
</body>
    <!-- Handsontable JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
    <script> 
        const opciones = <?php echo $opciones;?>; 
        const rutaArchivo = "<?php echo '../Assets/grillasPlanes/' . $plan->getNombreGrilla(); ?>";
        const NombrePlan = "<?php echo $_GET["NombrePlan"]; ?>"
    </script>
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
    <?php 
    if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]) {
    if(in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","avanzado","administrador"])&&$_GET["modo"]!="ver"){ ?>
        <script src="../JavaScript/GrillaPlan2.js"></script>
    <?php }else{ ?>
        <script src="../JavaScript/GrillaPlan1.js"></script>
    <?php }}else { ?>
        <script src="../JavaScript/GrillaPlan1.js"></script>
        <?php } ?>
</html>


