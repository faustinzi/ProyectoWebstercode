<?php
class Gimnasio
{
    private $nombre;
    private $capacidad;

    public function __construct($nombre, $capacidad)
    {
        $this->nombre = $nombre;
        $this->capacidad = $capacidad;
    }

    // Getters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }

    // Setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }
}
?>
