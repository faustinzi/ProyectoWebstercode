
<style>
    body{margin: 0px;}
    nav{display: flex;position: fixed;z-index: 10;width: 100%;height: 10vh;background-color: rgba(0,0,0,0.5);align-items: center;}
    .logoClass{margin-left: 10px; margin-right: 0px;}
    .empresaClass{width: 0px;padding-left: 10px;opacity: 0;font-size: 0.5vw; color: white;transition: opacity 0.5s ease-out, width 0.5s ease-out,  font-size 0.5s ease-out;}
    .logoClass:hover + .empresaClass, .empresaClass:hover{width: 50px;opacity: 1;font-size: 1.9vh;}
    .ul-menu{width: 100%;display: flex;list-style: none;justify-content: space-around;font-size: 19px;font-family:Arial, Helvetica, sans-serif;font-weight: light;}
    .aC{text-decoration: none; font-size:1.5rem ; color: white; transition: color 0.5s ease-in-out;}
    .op-menu{padding-right: 23px;padding-left: 23px;padding-top:20px;padding-bottom:20px;transition: background-color 0.5s ease-in-out;}
    .op-menu:hover{background-color: rgba(230, 130, 120, 0.7); }  
    .op-menu:hover .aC{color:black;}  
    .menu-toggle{display:none;}
</style>
<style>
    @media (max-width: 1199px) {
        nav{flex-direction: row-reverse;}
        .menu-toggle{
            display:block;
            cursor: pointer;
            margin-right: auto;
            margin-left: 30px;
        }
        .ul-menu{
            display: none;
        }
        .ul-menu.show {
            display: flex;
            flex-direction: column;
            background-color: rgba(0,0,0,0.8);
            transform: translateY(170px);
            padding-top:280px;
        }
        .logoClass{margin-left: 10px; margin-right: 30px;}
    }
</style>
<header>
    <nav>
    <img class='logoClass' width='45px' height='45px' src='../Assets/imagenes/logo.png' alt='logo Empresa'>
    <h1 class='empresaClass'>S.I.G.E.N.</h1>
    <h2 class="menu-toggle" id="menuToggle">☰</h2>
    <ul class='ul-menu' id='ul-menu'>
    <li class='op-menu'><a class='aC' href='Inicio.php'>Inicio</a></li>
    <?php if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]&&in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){ ?>
        <li class='op-menu'><a class='aC' href='Agenda.php?Anio=<?php echo date("Y"); ?>'>Agenda</a></li>
    <?php } ?>
    <li class='op-menu'><a class='aC' href='listaEjercicios.php'>Ejercicios</a></li>
    <li class='op-menu'><a class='aC' href='listaPlanes.php'>Planes</a></li>
    <?php if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]){ ?>
        <li class='op-menu'><a class='aC' href='Login.php'>Rutina</a></li>
        <li class='op-menu'><a class='aC' href='Login.php'>Evolución</a></li>
    <?php }else{ if(in_array($_SESSION["Usuario"]->getRol(),["cliente"])){ ?>
        <li class='op-menu'><a class='aC' href='../Logica/RedirigirPlan.php'>Rutina</a></li>
        <li class='op-menu'><a class='aC' href='Evolucion.php?Nombre=<?php echo $_SESSION["Usuario"]->getNombreDeUsuario(); ?>'>Evolución</a></li>
    <?php }} ?>
    <?php if(isset($_SESSION["Usuario"]) && in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","seleccionador","administrador"])){ 
        if(in_array($_SESSION["Usuario"]->getRol(),["entrenador"])){ ?>
        <li class='op-menu'><a class='aC' href='listaUsuariosEntrenador.php'>Clientes Asignados</a></li>
        <?php } 
        if(in_array($_SESSION["Usuario"]->getRol(),["gerente","seleccionador","administrador"])){ ?>
        <li class='op-menu'><a class='aC' href='listaUsuariosEntrenador.php'>Ver Clientes</a></li> <?php } } ?>
     <?php if(isset($_SESSION["Usuario"]) && in_array($_SESSION["Usuario"]->getRol(),["seleccionador","administrador"])){ ?>
       <li class='op-menu'><a class='aC' href='listaEquipos.php'>Lista De Equipos</a></li>
    <?php } 
        if(isset($_SESSION["Usuario"]) && in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){ ?>
            <li class='op-menu'><a class='aC' href='listaGimnasios.php'>Gimnasios</a></li>
     <?php } 
    if(isset($_SESSION["Usuario"]) && in_array($_SESSION["Usuario"]->getRol(),["administrador"])){ ?>
       <li class='op-menu'><a class='aC' href='RegistrarUsuarioMayor.php'>Registrar Usuario de Rol Mayor</a></li>
    <?php } ?>
    <?php echo            "<li class='op-menu'><a class='aC' href='";if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]){
                                                                    echo "Login.php";
                                                                }else{
                                                                    echo "informacionUsuario.php?Nombre=".$_SESSION["Usuario"]->getNombreDeUsuario()."";
                                                                }
    echo "' style='padding-right:20px;'> Usuario: ";
    if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]){
        echo "Iniciar Sesión";
    }else{
        echo $_SESSION["Usuario"]->getNombreDeUsuario();
    }
    echo "</a></li>"; ?>
    </ul>
    </nav>
    </header>
    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            const navList = document.getElementById('ul-menu');
            navList.classList.toggle('show');
        });
    </script>