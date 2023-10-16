<?php

namespace Model;

use Model\LoginModel;
use Model\EstadoUsuario;

class UsuarioActivo implements EstadoUsuario
{

    public function verificarCredenciales(LoginModel $modelo, $usuario, $clave)
    {
        // TODO: Implement verificarCredenciales() method.
        if ($modelo->verificarCredenciales($usuario, $clave)) {
            // Restablecer el contador si las credenciales son correctas
            $modelo->resetearIntentosFallidos($usuario);
            return true;
        } else {
            // Incrementar el contador de intentos fallidos
            $modelo->incrementarIntentosFallidos($usuario);
            return false;
        }
    }

    public function obtenerMensaje()
    {
        // TODO: Implement obtenerMensaje() method.
        return '';
    }
}