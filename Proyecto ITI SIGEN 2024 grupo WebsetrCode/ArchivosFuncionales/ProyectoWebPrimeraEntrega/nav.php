<?php
    echo    "<style>
                body{margin: 0px;}
                nav{display: flex;position: fixed;z-index: 10;width: 100%;height: 4vh;border: red 0.2vh solid;background-color: var(--gris);align-items: center;}
                .logoClass{margin-left: 10px; margin-right: 0px;}
                .empresaClass{width: 0px;padding-left: 10px;opacity: 0;font-size: 0.5vw; color: var(--negro);transition: opacity 0.5s ease-out, width 0.5s ease-out,  font-size 0.5s ease-out;}
                .logoClass:hover + .empresaClass, .empresaClass:hover{width: 50px;opacity: 1;font-size: 1.9vh;}
                .ul-menu{width: 100%;display: flex;list-style: none;justify-content: space-around;font-size: 1.9vh;font-family:Arial, Helvetica, sans-serif;font-weight: bold;}
                .aC{text-decoration: none;color: var(--negro);}
                .op-menu{padding: 7px;}
                .op-menu:hover{background-color: #FBFBFE;}    
            </style>";
    echo    "<header>";
    echo    "<nav>";
    echo        "<img class='logoClass' width='25px' height='25px' src='Assets/imagenes/logo.png' alt='logo Empresa'>";
    echo        "<h1 class='empresaClass'>S.I.G.E.N.</h1>";
    echo        "<ul class='ul-menu'>";
    echo            "<li class='op-menu'><a class='aC' href='Inicio.php'>Inicio</a></li>";
    if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]||in_array($_SESSION["Usuario"]->getRol(),["cliente"])){
        echo            "<li class='op-menu'><a class='aC' href='Rutina.php'>Rutina</a></li>";
        echo            "<li class='op-menu'><a class='aC' href='Evolucion.php'>Evolución</a></li>";
    }
    if(isset($_SESSION["Usuario"]) && in_array($_SESSION["Usuario"]->getRol(),["entrenador","gerente","seleccionador"])){
        if(in_array($_SESSION["Usuario"]->getRol(),["entrenador"])){
        echo            "<li class='op-menu'><a class='aC' href='listaUsuariosEntrenador.php'>Clientes Asignados</a></li>";}
        if(in_array($_SESSION["Usuario"]->getRol(),["gerente","seleccionador"])){
            echo            "<li class='op-menu'><a class='aC' href='listaUsuariosEntrenador.php'>Ver Clientes</a></li>";}
    }
    if(isset($_SESSION["Usuario"]) && in_array($_SESSION["Usuario"]->getRol(),["seleccionador"])){
        echo            "<li class='op-menu'><a class='aC' href='listaEquipos.php'>Lista De Equipos</a></li>";
    }
    echo            "<li class='op-menu'><a class='aC' href='index2.php#Preguntas'>Preguntas</a></li>";

    echo            "<li class='op-menu'><a class='aC' href='";if(!isset($_SESSION["Usuario"])||!$_SESSION["Usuario"]){
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
    echo "</a></li>";
    echo        "</ul>";
    echo    "</nav>";
    echo    "</header>";



?>