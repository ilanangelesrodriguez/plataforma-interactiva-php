<?php

namespace Model\Login\Estado;

use Model\Login\UsuarioModel;

class UsuarioBloqueado implements EstadoUsuario
{
    public function verificarCredenciales(UsuarioModel $usuario, $clave)
    {
        return false;
    }

    public function manejarIntentosFallidos(UsuarioModel $usuario, $clave)
    {

    }
}
