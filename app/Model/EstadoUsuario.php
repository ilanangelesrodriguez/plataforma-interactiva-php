<?php

namespace Model;

interface EstadoUsuario
{
    public function verificarCredenciales(UsuarioModel $usuario, $clave);

    public function manejarIntentosFallidos(UsuarioModel $usuario, $clave);
}
