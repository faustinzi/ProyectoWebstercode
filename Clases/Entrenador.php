<?php
include_once "Usuario2.php";


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