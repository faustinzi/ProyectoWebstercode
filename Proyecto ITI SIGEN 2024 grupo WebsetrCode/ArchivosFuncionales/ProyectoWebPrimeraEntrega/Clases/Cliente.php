<?php
include_once "Clases/Usuario2.php";

function cargarClientesGuardados()
{
    $str = file_get_contents("Datos/clientes.json");
    $datos = json_decode($str);
    $arrayUsuarios;
    foreach ($datos as $dato) {
        $arrayUsuarios[] = new Cliente($dato->nombreDeUsuario, $dato->nombreImagen, $dato->contrasenia, $dato->cedula, $dato->telefonos, $dato->nombreReal, $dato->email);
    }
    return $arrayUsuarios;
}
class Cliente extends Usuario2
{
    private $cedula;
    private $telefonos=[];
    private $nombreReal=[];
    private $email;

    public function __construct($nombre, $imagen, $contrasenia, $cedula, $telefonos, $nombreReal, $email)
    {
        parent::__construct($nombre, $imagen, $contrasenia, "cliente");
        $this->cedula = $cedula;
        $this->telefonos = $telefonos;
        $this->nombreReal = $nombreReal;
        $this->email = $email;
    }

    public function getCedula() {
        return $this->cedula;
    }
    public function getTelefonos() {
        return $this->telefonos;
    }
    public function getNombreReal() {
        return $this->nombreReal;
    }
    public function getEmail() {
        return $this->email;
    }

    public function getUnTelefono() {
        return end($this->telefonos);
    }
    public function getNombreRealNombre() {
        return $this->nombreReal[0];
    }
    public function getNombreRealPrimerApellido() {
        return $this->nombreReal[1];
    }
    public function getNombreRealSegundoApellido() {
        return $this->nombreReal[2];
    }
    public function getNombreRealCompleto() {
        return [$this->nombreReal[0],$this->nombreReal[1],$this->nombreReal[2]];
    }

    public function setCedula($cedula) {
        $this->cedula=$cedula;
    }
    public function setTelefonos($telefonos) {
        $this->telefonos=$telefonos;
    }
    public function setNombreReal($nombreReal) {
        $this->nombreReal=$nombreReal;
    }
    public function setEmail($email) {
        $this->email=$email;
    }

    public function agregarTelefono($telefono){
        $this->telefonos[] = $telefono;
    }
    public function eliminarTelefono($telefono){
        foreach($this->telefonos as $telefonoA){
            if($telefonoA != $telefono){
                $telefonosA[]=$telefonoA;
            }
        }
        $this->telefonos = $telefonosA;
    }
    public function setNombreRealNombre($nombre) {
        $this->nombreReal[0]=$nombre;
    }
    public function setNombreRealPrimerApellido($apellido) {
        $this->nombreReal[1]=$apellido;
    }
    public function setNombreRealSegundoApellido($apellido) {
        $this->nombreReal[2]=$apellido;
    }

    public function jsonSerialize()
    {
        return [
            "nombreDeUsuario" => $this->getNombreDeUsuario(),
            "nombreImagen" => $this->getNombreImagen(),
            "contrasenia" => $this->getContrasenia(),
            "rol" => "cliente",
            "cedula" => $this->cedula,
            "telefonos" => $this->telefonos,
            "nombreReal" => $this->nombreReal,
            "email" => $this->email
        ];
    }
}
?>