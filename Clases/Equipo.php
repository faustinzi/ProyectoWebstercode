<?php

class Equipo implements JsonSerializable
{
    private $nombre;
    private $deporte;
    private $nombreImagen;

    public function __construct()
    {

    }

    // Getters
    

    // Setters
    

    // Implementación de JsonSerializable
    public function jsonSerialize()
    {
        return [
            
        ];
    }
}

?>