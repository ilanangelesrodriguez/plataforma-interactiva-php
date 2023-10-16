<?php

namespace Model;

use Model\EstadoUsuario;
use Model\LoginModel;

class UsuarioBloqueado implements EstadoUsuario
{

    public function verificarCredenciales(LoginModel $modelo, $usuario, $clave)
    {
        // TODO: Implement verificarCredenciales() method.
        return false;
    }

    public function obtenerMensaje()
    {
        // TODO: Implement obtenerMensaje() method.
        return 'Cuenta bloqueada. Demasiados intentos fallidos.';
    }
}