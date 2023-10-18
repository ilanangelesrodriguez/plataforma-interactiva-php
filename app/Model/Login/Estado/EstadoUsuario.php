<?php

namespace Model\Login\Estado;

use Model\Login\UsuarioModel;

interface EstadoUsuario
{
    public function verificarCredenciales(UsuarioModel $usuario, $clave);

    public function manejarIntentosFallidos(UsuarioModel $usuario, $clave);
}
