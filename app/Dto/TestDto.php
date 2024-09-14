<?php

namespace App\Dto;

class TestDto
{
    public string $nombre;
    public string $descripcion;
    public string $mensajeExito;
    public string $mensajeFallo;
    public ?string $estatus;

    public function __construct(string $nombre, string $descripcion, 
    string $mensajeExito, string $mensajeFallo, ?string $estatus = "")
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->mensajeExito = $mensajeExito;
        $this->mensajeFallo = $mensajeFallo;
        $this->estatus = $estatus;
    }
}
