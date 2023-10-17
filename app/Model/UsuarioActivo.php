<?php

namespace Model;
require_once 'EstadoUsuario.php'; // Asegúrate de que la ruta sea correcta

class UsuarioActivo implements EstadoUsuario
{
    public function verificarCredenciales(UsuarioModel $usuario, $clave)
    {

        if ($usuario->getNombre() === $usuario->getNombre() && password_verify($clave, $usuario->getClave())) {
            $usuario->resetIntentosFallidos();
            return true;
        } else {
            $usuario->incrementarIntentosFallidos();
            return false;
        }

    }


    public function manejarIntentosFallidos(UsuarioModel $usuario, $clave)
    {
        if (!$this->verificarCredenciales($usuario, $clave)) {
            $usuario->incrementarIntentosFallidos();
        } else {
            $usuario->resetIntentosFallidos();
        }
    }

}
