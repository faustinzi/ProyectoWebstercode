<?php

class Calificacion implements JsonSerializable
{
    private $id;
    private $fecha;
    private $cumplimientoDeRutina;
    private $resistenciaAnaerobica;
    private $fuerzaMuscular;
    private $resistenciaMuscular;
    private $flexibilidad;
    private $resistenciaALaMonotonia;
    private $resiliencia;

    public function __construct($id, $fecha, $cumplimientoDeRutina, $resistenciaAnaerobica, $fuerzaMuscular, $resistenciaMuscular, $flexibilidad, $resistenciaALaMonotonia, $resiliencia)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->cumplimientoDeRutina = $cumplimientoDeRutina;
        $this->resistenciaAnaerobica = $resistenciaAnaerobica;
        $this->fuerzaMuscular = $fuerzaMuscular;
        $this->resistenciaMuscular = $resistenciaMuscular;
        $this->flexibilidad = $flexibilidad;
        $this->resistenciaALaMonotonia = $resistenciaALaMonotonia;
        $this->resiliencia = $resiliencia;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCumplimientoDeRutina()
    {
        return $this->cumplimientoDeRutina;
    }

    public function getResistenciaAnaerobica()
    {
        return $this->resistenciaAnaerobica;
    }

    public function getFuerzaMuscular()
    {
        return $this->fuerzaMuscular;
    }

    public function getResistenciaMuscular()
    {
        return $this->resistenciaMuscular;
    }

    public function getFlexibilidad()
    {
        return $this->flexibilidad;
    }

    public function getResistenciaALaMonotonia()
    {
        return $this->resistenciaALaMonotonia;
    }

    public function getResiliencia()
    {
        return $this->resiliencia;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setCumplimientoDeRutina($cumplimientoDeRutina)
    {
        $this->cumplimientoDeRutina = $cumplimientoDeRutina;
    }

    public function setResistenciaAnaerobica($resistenciaAnaerobica)
    {
        $this->resistenciaAnaerobica = $resistenciaAnaerobica;
    }

    public function setFuerzaMuscular($fuerzaMuscular)
    {
        $this->fuerzaMuscular = $fuerzaMuscular;
    }

    public function setResistenciaMuscular($resistenciaMuscular)
    {
        $this->resistenciaMuscular = $resistenciaMuscular;
    }

    public function setFlexibilidad($flexibilidad)
    {
        $this->flexibilidad = $flexibilidad;
    }

    public function setResistenciaALaMonotonia($resistenciaALaMonotonia)
    {
        $this->resistenciaALaMonotonia = $resistenciaALaMonotonia;
    }

    public function setResiliencia($resiliencia)
    {
        $this->resiliencia = $resiliencia;
    }

    // Implementación de JsonSerializable
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'cumplimientoDeRutina' => $this->cumplimientoDeRutina,
            'resistenciaAnaerobica' => $this->resistenciaAnaerobica,
            'fuerzaMuscular' => $this->fuerzaMuscular,
            'resistenciaMuscular' => $this->resistenciaMuscular,
            'flexibilidad' => $this->flexibilidad,
            'resistenciaALaMonotonia' => $this->resistenciaALaMonotonia,
            'resiliencia' => $this->resiliencia,
        ];
    }
}

?>