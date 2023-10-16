<?php

namespace Model;

class UsuarioModel
{
    private $nombre;
    private $clave;
    private $intentosFallidos;
    private $estado;

    public function __construct($nombre, $clave)
    {
        $this->nombre = $nombre;
        $this->clave = password_hash($clave, PASSWORD_DEFAULT);
        $this->intentosFallidos = 0;
        $this->estado = new UsuarioActivo($this);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado(EstadoUsuario $estado)
    {
        $this->estado = $estado;
    }

    public static function crearUsuario($nombre, $clave)
    {
        return new self($nombre, $clave);
    }

    public function incrementarIntentosFallidos()
    {
        $this->intentosFallidos++;

        if ($this->intentosFallidos >= 3) {
            $this->setEstado(new UsuarioBloqueado($this));
        }
    }

    public function resetIntentosFallidos()
    {
        $this->intentosFallidos = 0;
    }

    public function verificarCredenciales($clave)
    {
        return password_verify($clave, $this->clave);
    }
}
