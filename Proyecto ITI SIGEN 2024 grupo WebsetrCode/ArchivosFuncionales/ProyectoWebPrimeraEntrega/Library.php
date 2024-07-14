<?php
    include_once "Clases/Usuario2.php";
    include_once "Clases/Cliente.php";
    include_once "Clases/Entrenador.php";
    session_start();
    function NameExistsInBD($nombreRecibido)
    {
        $returnn=false;
        $usuarios = array_merge(cargarUsuarios2Guardados(),cargarClientesGuardados(),cargarEntrenadoresGuardados());
        foreach($usuarios as $usuario){
            if($usuario->getNombreDeUsuario()==$nombreRecibido){
                $returnn=true;
            }
        }
        return $returnn;
    }
    function IDExistsInBD($IdRecibido)
    {
        $returnn=false;
        $usuarios = array_merge(cargarUsuarios2Guardados(),cargarClientesGuardados(),cargarEntrenadoresGuardados());
        foreach($usuarios as $usuario){
            if($usuario->getContrasenia()==$IdRecibido){
                $returnn=true;
            }
        }
        return $returnn;
    }
    function TeamNameExistsInBD($nombreRecibido)
    {
        $returnn=false;
        $equipos = array_merge(getAllSavedTeams());
        foreach($equipos as $equipo){
            if($equipo->nombre==$nombreRecibido){
                $returnn=true;
            }
        }
        return $returnn;
    }
    function getAllSavedUsers(){
        return array_merge(cargarUsuarios2Guardados(),cargarClientesGuardados(),cargarEntrenadoresGuardados());
    }
    function getAllSavedTeams(){
        $str = file_get_contents("Datos/equipos.json");
        $arrayEquipos = json_decode($str);
        return $arrayEquipos;
    }
    function getAllProfilePictures(){
        $directorio = 'Assets/ImagenesUsuarios/';
        $archivos = glob($directorio . '*.png');
        print_r($archivos);
        $nombresArchivos = array_map('basename', $archivos);
        return $nombresArchivos;
    }
    function getAllTeamPictures(){
        $directorio = 'Assets/ImagenesEquipos/';
        $archivos = glob($directorio . '*.png');
        print_r($archivos);
        $nombresArchivos = array_map('basename', $archivos);
        return $nombresArchivos;
    }
    $Deportes=["Futbol"=>["nombre"=>"Futbol","CantidadDeJugadores"=>"11","Grid"=>[
        "1"=>["column"=>"1","row"=>"5"],
        "2"=>["column"=>"2","row"=>"2"],
        "3"=>["column"=>"2","row"=>"5"],
        "4"=>["column"=>"2","row"=>"8"],
        "5"=>["column"=>"3","row"=>"2"],
        "6"=>["column"=>"3","row"=>"4"],
        "7"=>["column"=>"3","row"=>"6"],
        "8"=>["column"=>"3","row"=>"8"],
        "9"=>["column"=>"4","row"=>"2"],
        "10"=>["column"=>"4","row"=>"5"],
        "11"=>["column"=>"4","row"=>"8"],]],
"Basquetbol"=>["nombre"=>"Basquetbol","CantidadDeJugadores"=>"5","Grid"=>[
    "1"=>["column"=>"1","row"=>"2"],
    "2"=>["column"=>"1","row"=>"8"],
    "3"=>["column"=>"2","row"=>"3"],
    "4"=>["column"=>"2","row"=>"7"],
    "5"=>["column"=>"3","row"=>"5"],
]]];
?>