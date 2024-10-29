<?php
    include_once "../Logica/Library.php";
    
    if(!isset($_GET["Nombre"])||!$_GET["Nombre"]||!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])){
        $_SESSION["Alerta"]="Error de permisos.";
        header("location:Inicio.php");
        exit();
    }
    foreach(getAllSavedUsers_BD() as $user){
        if($user->getNombreDeUsuario() == $_GET["Nombre"]){
            $usuario=$user;
        }
    }
    if($usuario->getRol()=="cliente"){
        foreach(cargarClientesGuardados2() as $cliente){
            if($cliente->getNombreDeUsuario()==$usuario->getNombreDeUsuario()){
                $usuario=$cliente;
            }
        }
    }
    if($usuario->getRol()=="entrenador"){
        foreach(cargarEntrenadoresGuardados2() as $entrenador){
            if($entrenador->getNombreDeUsuario()==$usuario->getNombreDeUsuario()){
                $usuario=$entrenador;
            }
        }
    }

    $asignaciones = $DBmanager->CargarTabla("tiene_asignado");
    foreach ($asignaciones as $dato) {
        if($dato->nombre_cliente==$usuario->getNombreDeUsuario()){
            $entrenador=$dato->nombre_entrenador;
        }
    }
    $asignacionesPlanes = $DBmanager->CargarTabla("realiza");
    foreach ($asignacionesPlanes as $dato) {
        if($dato->nombre_cliente==$usuario->getNombreDeUsuario()){
            $plan=$dato->nombre_plan;
        }
    }

    $perfil="No tiene perfil especificado.";
    $deportistas = $DBmanager->CargarTabla("deportista");
    foreach ($deportistas as $dato) {
        if($dato->nombre_de_usuario==$usuario->getNombreDeUsuario()){
            $perfil="Deportista";
        }
    }
    $pacientes = $DBmanager->CargarTabla("fisioterapia");
    foreach ($pacientes as $dato){
        if($dato->nombre_de_usuario==$usuario->getNombreDeUsuario()){
            $perfil="Paciente de fisioterapia";
        }
    }
    $estado="Aún no tiene estado.";
    if($_SESSION["Usuario"]->getRol()=="cliente"){
        if($_GET["Nombre"]!=$_SESSION["Usuario"]->getNombreDeUsuario()){
            volver();
        }
    }
    if($usuario->getRol()=="cliente"){
        $estado=$DBmanager->cargarEstadoCliente_BD($usuario->getNombreDeUsuario());
        $gym= "No tiene sucursal asignada";
        if($DBmanager->cargarSucursalCliente_BD($usuario->getNombreDeUsuario())){
            $gym=$DBmanager->cargarSucursalCliente_BD($usuario->getNombreDeUsuario());
        }
    }

    include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Usuario</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/stylesInfoUsuario.css">
    <link rel="stylesheet" href="styles/mobile/mobileInfoUsuario.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>

    <main>
        <section>
            <div class="divUp">
                <div class="divUp-divLeft">
                    <?php
                        echo "<img src='../Assets/imagenesUsuarios/".$usuario->getNombreImagen()."' alt='Foto de Perfil' width='400px' height='400px'>";
                    ?>
                </div>
                <div class="divUp-divRight">
                    <h2 class="tituloPagina">Información del usuario: <?php echo $usuario->getNombreDeUsuario()?></h2>
                    <h3>Rol: <?php echo $usuario->getRol()?></h3>
                    <?php if($usuario->getRol()=="cliente"){ ?>
                    <h1>Nombre Completo: <?php echo implode(" ",getNombreRealCompleto($usuario->getNombreDeUsuario())); }?></h1>
                    <h2>Nombre de Usuario: <?php echo $usuario->getNombreDeUsuario()?></h2>
                    <?php if(in_array($usuario->getRol(),["cliente", "entrenador"])){ ?>
                        <h1>Cédula: <?php echo $usuario->getCedula();} ?></h1>
                    <?php
                        if($usuario->getRol()=="cliente"){
                            echo "<a href='../Logica/RedirigirPlan.php?NombreClientePasado=".$usuario->getNombreDeUsuario()."'class='a'><p class='ap'>Ver Rutina</p></a>
                                <a href='Evolucion.php?Nombre=".$usuario->getNombreDeUsuario()."'class='a'><p class='ap'>Ver Evolucion</p></a>";
                        }
                    ?>
                    <?php if($_SESSION["Usuario"]->getRol() == "administrador"&&!in_array($usuario->getRol(),["cliente", "entrenador"])){ ?>
                        <button id="toggleFormBtn" onclick="toggleForm()"><h3>Modificar</h3></button>
                        <form id="newPlanForm" action="../Logica/modificarUsuarioRolMayor.php" method="POST" enctype="multipart/form-data">
                            <input type="text" name="Nombre" value="<?php echo $usuario->getNombreDeUsuario(); ?>" required hidden>
                            <label>Nombre</label><input type="text" name="NombreNuevo" required>
                            <label>Contrasenia</label><input type="password" name="Password" required>
                            <label>Imagen</label><input type="file" name="Imagen" accept="image/png">
                            <label>Rol</label>
                            <select name="Rol">
                                <?php foreach(array_slice($roles, 1) as $rol){ 
                                    if(!in_array($rol["nombre"], ["cliente", "entrenador"])){ ?>
                                        <option value="<?php echo $rol['nombre']; ?>" 
                                            <?php echo $rol['nombre'] == $usuario->getRol() ? 'selected' : ''; ?>>
                                            <?php echo $rol['nombre']; ?>
                                        </option>
                                <?php }} ?>
                            </select>
                            <button>Modificar</button>
                        </form>
                    <?php } ?>
                    <?php if($_SESSION["Usuario"]->getRol() == "administrador"&&in_array($usuario->getRol(),["entrenador"])){ ?>
                        <form action="../Logica/modificarEntrenador.php" method="POST" enctype="multipart/form-data">
                            <input type="text" name="Nombre" value="<?php echo $usuario->getNombreDeUsuario(); ?>" required hidden>
                            <label>Nombre</label><input type="text" name="NombreNuevo" required>
                            <label>Contrasenia</label><input type="password" name="Password" required>
                            <label>Imagen</label><input type="file" name="Imagen" accept="image/png">
                            <label>Cedula</label><input type="number" name="Cedula" required>
                            <button>Modificar</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
            <div class="divDown">
                <ul>
                    <?php
                        if(in_array($usuario->getRol(),["cliente"])){
                            echo "<li>
                        <p>Sucursal: ".$gym."</p>
                            </li>";
                            echo "<li>";
                            if(is_array($usuario->getTelefonos())){
                        echo "<p>Teléfonos: ".implode(", ",$usuario->getTelefonos())."</p>
                            </li>";}else{
                                echo "<p>Teléfonos: ".$usuario->getTelefonos()."</p>
                            </li>";
                            }
                            echo "<li>
                        <p>Mail: ".$usuario->getEmail()."</p>
                            </li>";
                            echo "<li>
                        <p>Perfil: ".$perfil."</p>
                            </li>";
                            echo "<li>
                        <p>Estado: ".$estado."</p>
                            </li>";
                            if(isset($entrenador)){
                                echo "<li>
                                <p>Entrenador Asignado: ".$entrenador."</p>";
                            }else{
                                echo "<li>
                                <p>Entrenador Asignado: No tiene entrenador asignado</p>";
                            }
                            if(in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){
                                echo "<form action='../Logica/asignarClienteEntrenadorProcesar.php' method='POST'>
                                    <input type='hidden' name='NombreCliente' value='".$usuario->getNombreDeUsuario()."'>
                                    <label>Asignar Entrenador</label>
                                    <select name='NombreEntrenador'>";
                                        echo "<option value='default'>-</option>";
                                        foreach(cargarEntrenadoresGuardados2() as $entrenador){
                                            echo "<option value='".$entrenador->getNombreDeUsuario()."'>".$entrenador->getNombreDeUsuario()."</option>";
                                        }
                                    echo "</select>
                                    <button>Guardar</button>
                                </form>";
                            }
                            echo "</li>";
                            if(isset($plan)){
                                echo "<li>
                                <p>Plan Asignado: ".$plan."</p>";
                            }else{
                                echo "<li>
                                <p>Plan Asignado: No tiene plan asignado</p>";
                            }
                            if(in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","administrador"])){
                                echo "<form action='../Logica/asignarClientePlanProcesar.php' method='POST'>
                                    <input type='hidden' name='NombreCliente' value='".$usuario->getNombreDeUsuario()."'>
                                    <label>Asignar Plan</label>
                                    <select name='NombrePlan'>";
                                        echo "<option value='default'>-</option>";
                                        foreach(cargarPlanesGuardados2() as $planA){
                                            echo "<option value='".$planA->getNombre()."'>".$planA->getNombre()."</option>";
                                        }
                                    echo "</select>
                                    <button>Guardar</button>
                                </form>";
                            }
                        }
                        if($_SESSION["Usuario"]->getNombreDeUsuario()==$_GET["Nombre"]){
                            echo "<li><h3>Otras Opciones:</h3></li>";
                            echo "<li class='liA'><a href='Login.php' class='a'>Iniciar sesión</a></li>";
                            echo "<li class='liA'><a href='RegistrarCliente.php' class='a'>Registro de cliente</a></li>";
                            echo "<li class='liA'><a href='../Logica/Logout.php' class='a'>Cerrar Sesión</a></li>";
                        }
                    ?>
                </ul>
                <?php if($_SESSION["Usuario"]->getRol() == "administrador"&&in_array($usuario->getRol(),["cliente"])){ ?>
                    <button id="toggleFormBtn" onclick="toggleForm()"><h3>Modificar</h3></button>
                    <form id="newPlanForm" action="../Logica/modificarCliente.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="Nombre" value="<?php echo $usuario->getNombreDeUsuario(); ?>" required hidden>
                        <label>Email</label><input type="email" name="Email" required>
                        <label>Nombre de usuario</label><input type="text" name="NombreNuevo" required>
                        <label>Contraseña</label><input type="Password" name="Contrasenia" required>
                        <label>Cédula</label><input type="number" name="Cedula" required>
                        <label>Foto de perfil:</label>        
                        <label for="Imagen">Imágen: </label><input type="file" name="Imagen" accept="image/png">
                        <label>Teléfono</label><input type="number" name="Telefono">
                        <label>Nombre Real</label><input type="text" name="NombreRealNombre">
                        <label>Primer Apellido</label><input type="text" name="NombreRealPrimerApellido">
                        <label>Segundo Apellido</label><input type="text" name="NombreRealSegundoApellido">
                        <button>Modificar</button>
                    </form>
                <?php } ?>
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
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>