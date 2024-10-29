<?php

class Ejercicio implements JsonSerializable
{
    private $nombre;
    private $descripcion;
    private $nombreImagen;

    public function __construct($nombre, $descripcion, $nombreImagen)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->nombreImagen = $nombreImagen;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getNombreImagen()
    {
        return $this->nombreImagen;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion($desc)
    {
        $this->descripcion = $desc;
    }
    public function setNombreImagen($ruta)
    {
        $this->nombreImagen = $ruta;
    }
     
    public function jsonSerialize()
    {
        return [
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "nombreImagen" => $this->nombreImagen
        ];
    }
}