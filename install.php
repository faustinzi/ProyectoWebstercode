<?php

$conexion = new mysqli("localhost", "root", ""); // Conecto al servidor de base de datos

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (true) {
    // Lee el archivo SQL
    $sql = file_get_contents('install.sql');

    // Ejecuta el script SQL
    if ($conexion->multi_query($sql)) {
        do {
            // Este bloque es necesario para asegurarse de que todas las consultas se ejecuten
            if ($result = $conexion->store_result()) {
                $result->free();
            }
        } while ($conexion->more_results() && $conexion->next_result());

        echo "Base de datos y tablas creadas correctamente<br>";
    } else {
        echo "Error: " . $conexion->error . "<br>";
    }
} else {
    echo "La base de datos ya existe.<br>";
}

// Selecciona la base de datos para futuras consultas
$conexion->select_db("gimnasioDB");

// Ejecuta una consulta en la tabla usuario
$resulta = $conexion->query("SELECT * FROM usuario");
$retorno=[];
while($usuario = $resulta->fetch_object()){
    $retorno[]=$usuario;
}
var_dump($retorno);

$conexion->close();

?>


