<?php

namespace Model;

class UsuarioBloqueado implements EstadoUsuario
{
    public function verificarCredenciales($usuario, $clave)
    {
        // Usuario bloqueado, no se permiten intentos de inicio de sesión
        return false;
    }
}
