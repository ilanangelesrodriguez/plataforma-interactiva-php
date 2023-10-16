<?php

namespace Model;

class UsuarioActivo implements EstadoUsuario
{
    private $usuario;

    public function __construct(UsuarioModel $usuario)
    {
        $this->usuario = $usuario;
    }

    public function verificarCredenciales($usuario, $clave)
    {
        if ($this->usuario->getNombre() === $usuario && $this->usuario->verificarCredenciales($clave)) {
            $this->usuario->resetIntentosFallidos();
            return true;
        } else {
            $this->usuario->incrementarIntentosFallidos();
            return false;
        }
    }
}
