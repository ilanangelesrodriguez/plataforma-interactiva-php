<?php

namespace Model\Estados;

use Model\UsuarioModel;

interface EstadoCuenta
{
    public function verificarCredenciales(UsuarioModel $usuario, $clave);
    public function obtenerMensaje();
    public function incrementarIntentosFallidos(UsuarioModel $usuario);
    public function resetearIntentosFallidos(UsuarioModel $usuario);
    public function obtenerIntentosFallidos(UsuarioModel $usuario);
}
