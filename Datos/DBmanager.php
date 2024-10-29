<?php

class DBmanager {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", ""); 
        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al usuario
        }
        $this->conexion->select_db("gimnasioDB");
    }

    function cargarUsuarios2Guardados_BD()
    {
        $resultado = $this->conexion->query("SELECT * FROM usuario");
        $retorno=[];
        while($usuario = $resultado->fetch_object()){
            $retorno[]=$usuario;
        }
        return $retorno;
    }

    function insertarUsuario_BD($nombre, $pass, $rol, $imagen){
        $this->conexion->query(
            "INSERT INTO usuario (nombre_de_usuario, password, rol, imagen) VALUES ('$nombre', '$pass', '$rol', '$imagen');"
        );
    }
    function insertarDeportista_BD($nombre){
        $this->conexion->query(
            "INSERT INTO deportista (nombre_de_usuario) VALUES ('$nombre');"
        );
    }
    function insertarPaciente_BD($nombre){
        $this->conexion->query(
            "INSERT INTO fisioterapia (nombre_de_usuario) VALUES ('$nombre');"
        );
    }
    function insertarEjercicio_BD($nombre, $descripcion, $imagen){
        $this->conexion->query(
            "INSERT INTO ejercicio (nombre, descripcion, imagen) VALUES ('$nombre', '$descripcion', '$imagen');"
        );
    }
    function insertarPlan_BD($nombre, $descripcion, $objetivo, $grilla){
        $this->conexion->query(
            "INSERT INTO plan_entrenamiento (nombre, descripcion, objetivo, grilla) VALUES ('$nombre', '$descripcion', '$objetivo', '$grilla');"
        );
    }
    function insertarEquipo_BD($nombre, $deporte, $imagen){
        $this->conexion->query(
            "INSERT INTO equipo (nombre, deporte, imagen) VALUES ('$nombre', '$deporte', '$imagen');"
        );
    }
    function insertarCalificacion_BD($fecha,$nombreDeUsuario, $cumplimientoDeRutina, $resistenciaAnaerobica, $fuerzaMuscular, $resistenciaMuscular, $flexibilidad, $resistenciaALaMonotonia, $resiliencia){
        $this->conexion->query(
            "INSERT INTO calificacion (cumplimientoDeRutina, resistenciaAnaerobica, fuerzaMuscular, resistenciaMuscular, flexibilidad, resistenciaALaMonotonia, resiliencia) VALUES ($cumplimientoDeRutina, $resistenciaAnaerobica, $fuerzaMuscular, $resistenciaMuscular, $flexibilidad,$resistenciaALaMonotonia,$resiliencia);"
        );
        $id=$this->conexion->insert_id;
        $this->conexion->query(
            "INSERT INTO le_corresponde (id, fecha, nombre_de_usuario) VALUES ($id, '$fecha', '$nombreDeUsuario');"
        );
    }
    function UpdateCalificacion_BD($fecha, $nombreDeUsuario, $cumplimientoDeRutina, $resistenciaAnaerobica, $fuerzaMuscular, $resistenciaMuscular, $flexibilidad, $resistenciaALaMonotonia, $resiliencia) {
        $this->conexion->query(
            "INSERT INTO calificacion (cumplimientoDeRutina, resistenciaAnaerobica, fuerzaMuscular, resistenciaMuscular, flexibilidad, resistenciaALaMonotonia, resiliencia) 
            VALUES ($cumplimientoDeRutina, $resistenciaAnaerobica, $fuerzaMuscular, $resistenciaMuscular, $flexibilidad, $resistenciaALaMonotonia, $resiliencia);"
        );
        $id = $this->conexion->insert_id;
        $result = $this->conexion->query(
            "SELECT id FROM le_corresponde WHERE fecha LIKE '$fecha' AND nombre_de_usuario='$nombreDeUsuario';"
        );
    
        if ($result->num_rows > 0) {
            $this->conexion->query(
                "UPDATE le_corresponde 
                SET id = $id 
                WHERE fecha LIKE '$fecha' AND nombre_de_usuario='$nombreDeUsuario';"
            );
        } else {
            $this->conexion->query(
                "INSERT INTO le_corresponde (id, fecha, nombre_de_usuario) 
                VALUES ($id, '$fecha', '$nombreDeUsuario');"
            );
        }
    }
    function insertarCliente_BD($nombre, $nombreReal, $apellidoPaterno, $apellidoMaterno, $correo, $cedula){
        $this->conexion->query(
            "INSERT INTO cliente (nombre_de_usuario, nombre, apellido_paterno, apellido_materno, correo_electronico, cedula) VALUES ('$nombre', '$nombreReal', '$apellidoPaterno', '$apellidoMaterno', '$correo', $cedula);"
        );
    }
    function insertarEntrenador_BD($nombre, $cedula){
        $this->conexion->query(
            "INSERT INTO entrenador (nombre_de_usuario, cedula) VALUES ('$nombre','$cedula');"
        );
    }
    function insertarTelefonoCliente_BD($nombre, $telefono){
        $this->conexion->query(
            "INSERT INTO cliente_telefono (nombre_de_usuario, telefono) VALUES ('$nombre','$telefono');"
        );
    }
    function insertarAsignacionClienteEntrenador($cliente, $entrenador){
        $this->conexion->query(
            "INSERT INTO tiene_asignado (nombre_cliente, nombre_entrenador) VALUES ('$cliente','$entrenador');"
        );
    }
    function insertarEstan_BD($nombreEquipo,$nombreCliente,$tipo,$posicion){
        $this->conexion->query(
            "INSERT INTO estan (nombre_equipo, nombre_deportista, tipo, posicion) VALUES ('$nombreEquipo', '$nombreCliente', '$tipo', $posicion);"
        );
    }
    function insertarPuedeUsar_BD($nombreCliente, $nombreEquipo){
        $this->conexion->query(
            "INSERT INTO puede_usar (nombre_de_usuario, nombre_equipo) VALUES ('$nombreCliente','$nombreEquipo');"
        );
    }
    function insertarGimnasio_BD($nombre, $capacidad){
        $this->conexion->query(
            "INSERT INTO gimnasio (nombre, capacidad) VALUES ('$nombre','$capacidad');"
        );
    }
    function insertarAgendado_BD($nombre,$gym,$mes,$pago){
        $this->conexion->query(
            "INSERT INTO agendado (nombre_cliente, nombre_gimnasio, mes, pago) VALUES ('$nombre', '$gym','$mes',$pago);"
        );
    }
 
    function UpdateAsignacionClienteEntrenador($cliente, $entrenador){
        $this->conexion->query("UPDATE tiene_asignado
            SET nombre_entrenador = '$entrenador'
            WHERE nombre_cliente = '$cliente';");

    }    
    function DeleteAsignacionCliente($cliente){
        $this->conexion->query(
            "DELETE FROM tiene_asignado WHERE nombre_cliente = '$cliente';"
        );
    }
    function eliminarEstan_BD($equipo,$cliente){
        $this->conexion->query(
            "DELETE FROM estan WHERE (nombre_deportista = '$cliente' AND nombre_equipo='$equipo');"
        );
    }
    function insertarRealizaClientePlan($cliente, $plan){
        $this->conexion->query(
            "INSERT INTO realiza (nombre_cliente, nombre_plan) VALUES ('$cliente','$plan');"
        );
    }
    function insertarPasa_BD($nombre, $nombre_estado, $fecha) {
        $this->conexion->query(
            "INSERT INTO pasa (nombre_cliente, nombre_estado, fecha_inicio) VALUES ('$nombre', '$nombre_estado', '$fecha');"
        );

        $this->conexion->query(
            "UPDATE pasa 
             SET fecha_fin = '$fecha' 
             WHERE fecha_fin IS NULL 
             AND nombre_estado != '$nombre_estado';"
        );
    }
    function UpdateRealizaClientePlan($cliente, $plan){
        $this->conexion->query("UPDATE realiza
            SET nombre_plan = '$plan'
            WHERE nombre_cliente = '$cliente';");

    }    
    function UpdateGimnasio($nombre, $nombreNuevo, $capacidad){
        $this->conexion->query(
            "UPDATE gimnasio SET nombre = '$nombreNuevo', capacidad = $capacidad WHERE nombre = '$nombre'"
        );
    }
    function UpdateEjercicio($nombreActual, $nombre,$descripcion,$imagen){
        $this->conexion->query(
            "UPDATE ejercicio SET nombre = '$nombre', descripcion = '$descripcion', imagen = '$imagen' WHERE nombre = '$nombreActual'"
        );
    }
    function UpdateEquipo($nombreActual, $nombre, $imagen){
        $this->conexion->query(
            "UPDATE equipo SET nombre = '$nombre', imagen = '$imagen' WHERE nombre = '$nombreActual'"
        );
    }
    function UpdateUsuarioRolMayor($nombreActual, $nombre, $password, $imagen, $rol){
        $this->conexion->query(
            "UPDATE usuario SET nombre_de_usuario = '$nombre', imagen = '$imagen' , password = '$password' , rol = '$rol' WHERE nombre_de_usuario = '$nombreActual'"
        );
    }
    function UpdatePlan($nombreActual,$nombre,$descripcion,$objetivo){
        $this->conexion->query(
            "UPDATE plan_entrenamiento SET nombre = '$nombre', descripcion = '$descripcion' , objetivo = '$objetivo' WHERE nombre = '$nombreActual'"
        );
    }
    function UpdateEntrenador($nombreActual, $nombre, $pass, $imagen, $cedula){
        $this->conexion->query(
            "UPDATE usuario SET nombre_de_usuario = '$nombre', password = '$pass', imagen = '$imagen' WHERE nombre_de_usuario = '$nombreActual'"
        );
        $this->conexion->query(
            "UPDATE entrenador SET cedula = '$cedula' WHERE nombre_de_usuario = '$nombre'"
        );
    }
    function UpdateCliente($nombreActual, $nombre, $mail,$pass,$cedula,$imagen,$telefono,$nombre1,$nombre2,$nombre3){
        $this->conexion->query(
            "UPDATE usuario SET nombre_de_usuario = '$nombre', password = '$pass', imagen = '$imagen' WHERE nombre_de_usuario = '$nombreActual'"
        );
        $this->conexion->query(
            "UPDATE cliente SET cedula = '$cedula', correo_electronico = '$mail', nombre='$nombre1', apellido_paterno='$nombre2', apellido_materno='$nombre3' WHERE nombre_de_usuario = '$nombre'"
        );
        $this->conexion->query(
            "DELETE FROM cliente_telefono WHERE nombre_de_usuario='$nombre'"
        );
        $this->conexion->query(
            "INSERT INTO cliente_telefono (nombre_de_usuario, telefono) VALUES ('$nombre','$telefono')"
        );
    }
    function DeleteRealizaCliente($cliente){
        $this->conexion->query(
            "DELETE FROM realiza WHERE nombre_cliente = '$cliente';"
        );
    }
    function CargarTabla($tabla){
        $resultado = $this->conexion->query("SELECT * FROM $tabla ");
        $retorno=[];
        while($usuario = $resultado->fetch_object()){
            $retorno[]=$usuario;
        }
        return $retorno;
    }
    function CargarActivosTabla($tabla){
        $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE activo =TRUE ");
        $retorno=[];
        while($usuario = $resultado->fetch_object()){
            $retorno[]=$usuario;
        }
        return $retorno;
    }
    function obtenerEquiposDeSeleccionador($seleccionador){
       $resultado= $this->conexion->query(
            "SELECT nombre_equipo FROM puede_usar WHERE nombre_de_usuario='$seleccionador' AND activo=TRUE ;"
        );
        $retorno=[];
        while($asignacion = $resultado->fetch_object()){
            $retorno[]=$asignacion->nombre_equipo;
        }
        return $retorno;
    }
    function cargarClientesAgendadosUnAnio_BD($anio){
        $anioINT=(int)$anio;
        $resultado= $this->conexion->query(
            "SELECT DISTINCT nombre_cliente FROM agendado WHERE YEAR(mes)=$anioINT AND activo=TRUE;"
        );
        $retorno=[];
        while($asignacion = $resultado->fetch_object()){
            $retorno[]=$asignacion->nombre_cliente;
        }
        $retorno2=array_unique($retorno);
        return $retorno2;
    }
    function cargarEstadoCliente_BD($nombre) {
        $resultado = $this->conexion->query(
            "SELECT nombre_estado 
            FROM pasa 
            WHERE nombre_cliente = '$nombre' 
            ORDER BY id DESC 
            LIMIT 1;"
        );
    
        if ($resultado && $resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc(); 
            return $fila['nombre_estado'];
        } else {
            return null;
        }
    }
    function cargarSucursalCliente_BD($nombre) {
        $resultado = $this->conexion->query(
            "SELECT nombre_gimnasio 
            FROM agendado
            WHERE nombre_cliente = '$nombre';"
        );
    
        if ($resultado && $resultado->num_rows > 0) {
            $respuesta = $resultado->fetch_assoc(); 
            return $respuesta['nombre_gimnasio'];
        } else {
            return null;
        }
    }
    
    function CargarAtributoPrimaryKeyValorTabla($atributo, $primary, $valor, $tabla) {
        $resultado = $this->conexion->query("SELECT $atributo FROM $tabla WHERE $primary = '$valor'");
    
        if ($resultado && $resultado->num_rows > 0) {
            if($resultado->num_rows > 1){
                $resultados = [];
                while ($fila = $resultado->fetch_assoc()) {
                    $resultados[] = $fila[$atributo];
                }
                return $resultados;
            }
            return $resultado->fetch_assoc()[$atributo];
        } else {
            return null;
        }
    }
    function CargarPagoAgendaClienteMesAnioActivo($cliente, $mes, $anio) {
        $fecha = $anio . '-' . str_pad($mes, 2, '0', STR_PAD_LEFT);
    
        $sql = "SELECT pago FROM agendado WHERE nombre_cliente = '$cliente' AND mes LIKE '$fecha%' AND activo = TRUE";
    
        $resultado = $this->conexion->query($sql);
        
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc()['pago'];
        } else {
            return null;
        }
    }
    function UpdatePagoAgendado($cliente,$mes,$pago){
        $this->conexion->query(
            "UPDATE agendado SET pago = '$pago' WHERE mes LIKE '$mes%' AND nombre_cliente='$cliente'"
        );
    }
    function DesactivarAgendado($cliente,$mes){
        $this->conexion->query(
            "UPDATE agendado SET activo = FALSE WHERE mes LIKE '$mes%' AND nombre_cliente='$cliente'"
        );
    }
    function ActivarAgendado($cliente,$mes){
        $this->conexion->query(
            "UPDATE agendado SET activo = TRUE WHERE mes LIKE '$mes%' AND nombre_cliente='$cliente'"
        );
    }
    function EliminarElementoTabla($nombre, $clavePrimaria, $tabla ) {
        $this->conexion->query(
            "DELETE FROM $tabla WHERE $clavePrimaria = '$nombre'"
        );
    }
    function DesactivarElementoTabla($nombre, $clavePrimaria, $tabla ){
        $this->conexion->query(
            "UPDATE $tabla SET activo = FALSE WHERE $clavePrimaria='$nombre'"
        );
    }
    function existeAgendamiento($cliente, $mes){
        $resultado=$this->conexion->query(
            "SELECT * FROM agendado WHERE nombre_cliente = '$cliente' AND mes LIKE '$mes%'"
        );
        if ($resultado && $resultado->num_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    function calificacionExiste($cliente, $mes){
        $resultado=$this->conexion->query(
            "SELECT * FROM le_corresponde WHERE nombre_de_usuario = '$cliente' AND fecha LIKE '$mes%'"
        );
        if ($resultado && $resultado->num_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    function CargarEstanEnEquipo($nombre){
       $resultado= $this->conexion->query(
            "SELECT * FROM estan WHERE nombre_equipo='$nombre' AND activo=TRUE ;"
        );
        $retorno=[];
        while($asignacion = $resultado->fetch_object()){
            $retorno[]=$asignacion;
        }
        return $retorno;
    }

    function ValorDeAtributoDeTablaExisteEnBD($valor, $atributo, $tabla) {
        $retorno = false;
        $resultado = $this->conexion->query("SELECT COUNT(*) as count FROM $tabla WHERE $atributo = '$valor'");
    
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            if ($fila['count'] > 0) { 
                $retorno = true;
            }
        }
    
        return $retorno;
    }
}
