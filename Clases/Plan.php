<?php

class Plan implements JsonSerializable
{
    private $nombre;
    private $descripcion;
    private $objetivo;
    private $nombreGrilla;

    public function __construct($nombre, $descripcion, $objetivo, $nombreGrilla)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->objetivo = $objetivo;
        $this->nombreGrilla = $nombreGrilla;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getObjetivo()
    {
        return $this->objetivo;
    }
    public function getNombreGrilla()
    {
        return $this->nombreGrilla;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion($desc)
    {
        $this->descripcion = $desc;
    }
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
    }
    public function setNombreGrilla($nombreGrilla)
    {
        $this->nombreGrilla = $nombreGrilla;
    }
     
    public function jsonSerialize()
    {
        return [
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "objetivo" => $this->objetivo,
            "nombreGrilla" => $this->nombreGrilla
        ];
    }
}