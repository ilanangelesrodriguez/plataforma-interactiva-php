<?php

namespace Model;

class UsuarioBloqueado implements EstadoUsuario
{
    public function verificarCredenciales(UsuarioModel $usuario, $clave)
    {
        // Usuario bloqueado, no se permiten intentos de inicio de sesión
        return false;
    }

    public function manejarIntentosFallidos(UsuarioModel $usuario, $clave)
    {
        // Lógica para manejar intentos fallidos en el estado bloqueado
        // Por ejemplo, no hacer nada, ya que el usuario bloqueado no permite intentos de inicio de sesión.
    }
}
