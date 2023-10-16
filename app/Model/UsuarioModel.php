<?php

namespace Model;
use Model\EstadoUsuario;

class UsuarioModel
{
    private $nombreUsuario;
    private $clave;
    private $estado;


    public function __construct($nombreUsuario, $clave, EstadoUsuario $estado)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->clave = $clave;
        $this->estado = $estado;
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado(EstadoUsuario $estado) {
        $this->estado = $estado;
    }
}
