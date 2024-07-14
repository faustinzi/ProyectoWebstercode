<?php
$roles = [
"cliente"=>["nombre"=>"cliente","permisos"=>"cliente"],
"gerente"=>["nombre"=>"gerente","permisos"=>"gerente"],
"avanzado"=>["nombre"=>"avanzado","permisos"=>"avanzado"],
"entrenador"=>["nombre"=>"entrenador","permisos"=>"entrendaor"],
"seleccionador"=>["nombre"=>"seleccionador","permisos"=>"seleccionador"],
"administrador"=>["nombre"=>"administrador","permisos"=>"total"]
];
function cargarUsuarios2Guardados()
{
    $str = file_get_contents("Datos/usuarios2.json");
    $datos = json_decode($str);
    $arrayUsuarios;
    foreach ($datos as $dato) {
        $arrayUsuarios[] = new Usuario2($dato->nombreDeUsuario, $dato->nombreImagen, $dato->contrasenia, $dato->rol);
    }
    return $arrayUsuarios;
}
class Usuario2 implements JsonSerializable
{
    private $nombreDeUsuario;
    private $nombreImagen;
    private $contrasenia;
    private $rol;

    public function __construct($nombre, $imagen, $contrasenia, $rol)
    {
        global $roles;
        $this->nombreDeUsuario = $nombre;
        $this->nombreImagen = $imagen;
        $this->contrasenia = $contrasenia;
        $this->rol = null;
        foreach($roles as $rolfor){
            if ($rol==$rolfor["nombre"]) {
                $this->rol = $rol;
            }
        }
    }

    public function getNombreDeUsuario()
    {
        return $this->nombreDeUsuario;
    }
    public function getNombreImagen()
    {
        return $this->nombreImagen;
    }
    public function getContrasenia()
    {
        return $this->contrasenia;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function getPermisos()
    {
        global $roles;
        return $roles[$this->rol]['permisos'];
    }

    public function setNombre($nombre)
    {
        $this->nombreDeUsuario = $nombre;
    }
    public function setNombreImagen($ruta)
    {
        $this->nombreImagen = $ruta;
    }
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }
    public function setRol($rol)
    {
        global $roles;
        $this->rol = null;
        foreach($roles as $rolfor){
            if ($rol==$rolfor["nombre"]) {
                $this->rol = $rol;
            }
        }
    }

    public function jsonSerialize()
    {
        return [
            "nombreDeUsuario" => $this->nombreDeUsuario,
            "nombreImagen" => $this->nombreImagen,
            "contrasenia" => $this->contrasenia,
            "rol" => $this->rol
        ];
    }
}