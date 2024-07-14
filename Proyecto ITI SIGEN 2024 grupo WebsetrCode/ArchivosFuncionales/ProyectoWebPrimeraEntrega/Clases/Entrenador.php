<?php
include_once "Clases/Usuario2.php";

function cargarEntrenadoresGuardados()
{
    $str = file_get_contents("Datos/entrenadores.json");
    $datos = json_decode($str);
    $arrayUsuarios;
    foreach ($datos as $dato) {
        $arrayUsuarios[] = new Entrenador($dato->nombreDeUsuario, $dato->nombreImagen, $dato->contrasenia, $dato->cedula);
    }
    return $arrayUsuarios;
}
class Entrenador extends Usuario2
{
    private $cedula;

    public function __construct($nombre, $imagen, $contrasenia, $cedula)
    {
        parent::__construct($nombre, $imagen, $contrasenia, "entrenador");
        $this->cedula = $cedula;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function setCedula($cedula) {
        $this->cedula=$cedula;
    }

    public function jsonSerialize()
    {
        return [
            "nombreDeUsuario" => $this->nombreDeUsuario,
            "nombreImagen" => $this->nombreImagen,
            "contrasenia" => $this->contrasenia,
            "rol" => $this->rol,
            "cedula" => $this->cedula
        ];
    }
}
?>