<?php
    include_once "../Clases/Usuario2.php";
    include_once "../Clases/Cliente.php";
    include_once "../Clases/Entrenador.php";
    include_once "../Clases/Ejercicio.php";
    include_once "../Clases/Plan.php";
    include_once "../Clases/Calificacion.php";
    include_once "../Clases/Gimnasio.php";
    include_once "../Datos/DBmanager.php";
    session_start();
    $DBmanager=new DBmanager();
    function cargarUsuarios2Guardados()
    {
        $str = file_get_contents("../Datos/usuarios2.json");
        $datos = json_decode($str);
        $arrayUsuarios;
        foreach ($datos as $dato) {
            $arrayUsuarios[] = new Usuario2($dato->nombreDeUsuario, $dato->nombreImagen, $dato->contrasenia, $dato->rol);
        }
        return $arrayUsuarios;
    }
    function cargarUsuarios2Guardados2()
    {
        $DBmanager = new DBmanager();
        $datos = $DBmanager->cargarUsuarios2Guardados_BD();
        $arrayUsuarios=[];
        foreach ($datos as $dato) {
            $arrayUsuarios[] = new Usuario2($dato->nombre_de_usuario, $dato->imagen, $dato->password, $dato->rol);
        }
        return $arrayUsuarios;
    }
    function cargarClientesGuardados()
    {
        $str = file_get_contents("../Datos/clientes.json");
        $datos = json_decode($str);
        $arrayUsuarios;
        foreach ($datos as $dato) {
            $arrayUsuarios[] = new Cliente($dato->nombreDeUsuario, $dato->nombreImagen, $dato->contrasenia, $dato->cedula, $dato->telefonos, $dato->nombreReal, $dato->email);
        }
        return $arrayUsuarios;
    }
    function cargarClientesGuardados2()
    {
        $DBmanager = new DBmanager();
        $datos = $DBmanager->CargarTabla("cliente");
        $arrayUsuarios;
        $usuariosA= $DBmanager->CargarTabla("usuario");
        foreach ($datos as $dato) {
            foreach($usuariosA as $usuarioA){
                if($usuarioA->nombre_de_usuario == $dato->nombre_de_usuario){
                    $usuarioD=$usuarioA;
                }
            }
            $telefonos=[];
            $telefonos=$DBmanager->CargarAtributoPrimaryKeyValorTabla("telefono", "nombre_de_usuario", $usuarioD->nombre_de_usuario, "cliente_telefono");
            $arrayUsuarios[] = new Cliente($dato->nombre_de_usuario, $usuarioD->imagen, $usuarioD->password, $dato->cedula, $telefonos, getNombreRealCompleto($dato->nombre_de_usuario), $dato->correo_electronico);
        }
        return $arrayUsuarios;
    }
    function cargarEntrenadoresGuardados()
    {
        $str = file_get_contents("../Datos/entrenadores.json");
        $datos = json_decode($str);
        $arrayUsuarios;
        foreach ($datos as $dato) {
            $arrayUsuarios[] = new Entrenador($dato->nombreDeUsuario, $dato->nombreImagen, $dato->contrasenia, $dato->cedula);
        }
        return $arrayUsuarios;
    }
    function cargarEntrenadoresGuardados2()
    {
        $DBmanager = new DBmanager();
        $datos = $DBmanager->CargarTabla("entrenador");
        $arrayUsuarios;
        $usuariosA= $DBmanager->CargarTabla("usuario");
        foreach ($datos as $dato) {
            foreach($usuariosA as $usuarioA){
                if($usuarioA->nombre_de_usuario == $dato->nombre_de_usuario){
                    $usuarioD=$usuarioA;
                }
            }
            $arrayUsuarios[] = new Entrenador($dato->nombre_de_usuario, $usuarioD->imagen, $usuarioD->password, $dato->cedula);
        }
        return $arrayUsuarios;
    }
    function cargarEjerciciosGuardados()
    {
        $str = file_get_contents("../Datos/ejercicios.json");
        $datos = json_decode($str);
        $arrayEjercicios=null;
        foreach ($datos as $dato) {
            $arrayEjercicios[] = new Ejercicio($dato->nombre, $dato->descripcion, $dato->nombreImagen);
        }
        return $arrayEjercicios;
    }
    function cargarEjerciciosGuardados2()
    {
        $DBmanager = new DBmanager();
        $datos = $DBmanager->CargarTabla("ejercicio");
        $arrayEjercicios=[];
        foreach ($datos as $dato) {
            $arrayEjercicios[] = new Ejercicio($dato->nombre, $dato->descripcion, $dato->imagen);
        }
        return $arrayEjercicios;
    }
    
    function cargarPlanesGuardados()
    {
        $str = file_get_contents("../Datos/planes.json");
        $datos = json_decode($str);
        $arrayPlanes=null;
        foreach ($datos as $dato) {
            $arrayPlanes[] = new Plan($dato->nombre, $dato->descripcion, $dato->objetivo, $dato->nombreGrilla);
        }
        return $arrayPlanes;
    }
    function cargarPlanesGuardados2()
    {
        $DBmanager = new DBmanager();
        $datos = $DBmanager->CargarTabla("plan_entrenamiento");
        $array=[];
        foreach ($datos as $dato) {
            $array[] = new Plan($dato->nombre, $dato->descripcion, $dato->objetivo, $dato->grilla);
        }
        return $array;
    }
    function cargarCalificaciones_BD(){
        $DBmanager = new DBmanager();
        $calificaciones = $DBmanager->CargarTabla("calificacion");
        $fechas = $DBmanager->CargarTabla("le_corresponde");
        $array=[];
        foreach($calificaciones as $calificacion){
            $fecha=$DBmanager->CargarAtributoPrimaryKeyValorTabla("fecha","id",$calificacion->id,"le_corresponde");
            $array[]= new Calificacion($calificacion->id,$fecha,$calificacion->cumplimientoDeRutina,$calificacion->resistenciaAnaerobica,$calificacion->fuerzaMuscular,$calificacion->resistenciaMuscular,$calificacion->flexibilidad,$calificacion->resistenciaALaMonotonia,$calificacion->resiliencia);
        }
        return $array;
    }
    function cargarCalificacionesUsuario($nombre){
        $DBmanager = new DBmanager();
        $calificaciones = $DBmanager->CargarTabla("calificacion");
        $fechas = $DBmanager->CargarTabla("le_corresponde");
        $array=[];
        foreach($calificaciones as $calificacion){
            if($DBmanager->CargarAtributoPrimaryKeyValorTabla("nombre_de_usuario","id",$calificacion->id,"le_corresponde")==$nombre){
                $fecha=$DBmanager->CargarAtributoPrimaryKeyValorTabla("fecha","id",$calificacion->id,"le_corresponde");
                $array[]= new Calificacion($calificacion->id,$fecha,$calificacion->cumplimientoDeRutina,$calificacion->resistenciaAnaerobica,$calificacion->fuerzaMuscular,$calificacion->resistenciaMuscular,$calificacion->flexibilidad,$calificacion->resistenciaALaMonotonia,$calificacion->resiliencia);
            }
        }

        usort($array, function($a, $b) {
            return strtotime($a->getFecha()) - strtotime($b->getFecha());
        });

        return $array;
    }
    function cargarNombresEjerciciosGuardados()
    {
        $datos = cargarEjerciciosGuardados2();
        $arrayEjercicios=[];
        foreach ($datos as $dato) {
            $arrayEjercicios[] = $dato->getNombre();
        }
        return $arrayEjercicios;
    }
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
    function ExerciseNameExistsInBD($nombreRecibido)
    {
        $returnn=false;
        $ejercicios=[];
        if(cargarEjerciciosGuardados()){
            $ejercicios = array_merge(cargarEjerciciosGuardados());
        }
        foreach($ejercicios as $ejercicio){
            if($ejercicio->getNombre()==$nombreRecibido){
                $returnn=true;
            }
        }
        return $returnn;
    }
    function ExerciseNameExistsInBD2($nombreRecibido)
    {
        $returnn=false;
        $ejercicios=[];
        if(cargarEjerciciosGuardados2()){
            $ejercicios = array_merge(cargarEjerciciosGuardados2());
        }
        foreach($ejercicios as $ejercicio){
            if($ejercicio->getNombre()==$nombreRecibido){
                $returnn=true;
            }
        }
        return $returnn;
    }
    function getNombreRealCompleto($nombreCliente){
        $DBmanager = new DBmanager();
        $nombre = $DBmanager->CargarAtributoPrimaryKeyValorTabla("nombre","nombre_de_usuario",$nombreCliente,"cliente");
        $primer_apellido = $DBmanager->CargarAtributoPrimaryKeyValorTabla("apellido_paterno","nombre_de_usuario",$nombreCliente,"cliente");
        $segundo_apellido = $DBmanager->CargarAtributoPrimaryKeyValorTabla("apellido_materno","nombre_de_usuario",$nombreCliente,"cliente");
        $retorno =[$nombre, $primer_apellido, $segundo_apellido];
        return $retorno;
    }
    function PlanNameExistsInBD($nombreRecibido)
    {
        $returnn=false;
        $planes=[];
        if(cargarPlanesGuardados()){
            $planes = array_merge(cargarPlanesGuardados());
        }
        foreach($planes as $plan){
            if($plan->getNombre()==$nombreRecibido){
                $returnn=true;
            }
        }
        return $returnn;
    }
    function getAllSavedUsers(){
        return array_merge(cargarUsuarios2Guardados(),cargarClientesGuardados(),cargarEntrenadoresGuardados());
    }
    function getAllSavedUsers_BD(){
        return array_merge(cargarUsuarios2Guardados2());
    }
    function getAllSavedTeams(){
        $str = file_get_contents("../Datos/equipos.json");
        $arrayEquipos = json_decode($str);
        return $arrayEquipos;
    }    
    function getAllSavedTeams2(){
        $DBmanager = new DBmanager();
        $str = $DBmanager->CargarTabla("equipo");
        return $str;
    }
    function getAllSavedGyms2(){
        $DBmanager=new DBmanager();
        $str = $DBmanager->CargarActivosTabla("gimnasio");
        $array=[];
        foreach ($str as $dato) {
            $array[] = new Gimnasio($dato->nombre, $dato->capacidad);
        }
        return $array;
    }
    function getAllProfilePictures(){
        $directorio = '../Assets/ImagenesUsuarios/';
        $archivos = glob($directorio . '*.png');
        print_r($archivos);
        $nombresArchivos = array_map('basename', $archivos);
        return $nombresArchivos;
    }
    function getAllTeamPictures(){
        $directorio = '../Assets/ImagenesEquipos/';
        $archivos = glob($directorio . '*.png');
        print_r($archivos);
        $nombresArchivos = array_map('basename', $archivos);
        return $nombresArchivos;
    }
    function getAllExcercisePictures(){
        $directorio = '../Assets/ImagenesEjercicios/';
        $archivos = glob($directorio . '*.png');
        print_r($archivos);
        $nombresArchivos = array_map('basename', $archivos);
        return $nombresArchivos;
    }
    function getAllPlanGrids(){
        $directorio = '../Assets/grillasPlanes/';
        $archivos = glob($directorio . '*.csv');
        print_r($archivos);
        $nombresArchivos = array_map('basename', $archivos);
        return $nombresArchivos;
    }

    function volver(){
        if (isset($_SERVER['HTTP_REFERER'])) {
            $urlAnterior = $_SERVER['HTTP_REFERER'];
            header("Location: $urlAnterior");
            exit();
        } else {
            header("Location: ../Presentacion/Inicio.php");
            exit();
        }
    }

    function obtenerEstadoDeCalificacion($nombre,$puntaje){
        $DBmanager = new DBmanager();
        $estado="No hay";
        if ($DBmanager->ValorDeAtributoDeTablaExisteEnBD($nombre,"nombre_de_usuario","deportista")) {
            if ($puntaje < 40) {
                $estado = "Principiante";
            } elseif ($puntaje >= 40 && $puntaje < 80) {
                $estado = "Bajo";
            } elseif ($puntaje >= 80 && $puntaje < 100) {
                $estado = "Medio";
            } elseif ($puntaje >= 100 && $puntaje < 120) {
                $estado = "Alto";
            } else {
                $estado = "Para Seleccionar";
            }
        // Verifica si es fisioterapia
        } elseif ($DBmanager->ValorDeAtributoDeTablaExisteEnBD($nombre,"nombre_de_usuario","fisioterapia")) {
            if ($puntaje < 40) {
                $estado = "Inicio";
            } elseif ($puntaje >= 40 && $puntaje < 80) {
                $estado = "Sin evolución";
            } elseif ($puntaje >= 80 && $puntaje < 100) {
                $estado = "En evolución";
            } else {
                $estado = "Satisfactorio";
            }
        }
        return $estado;
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