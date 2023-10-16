<?php

namespace Model;

use Model\LoginModel;

interface EstadoUsuario
{
    public function verificarCredenciales(LoginModel $modelo, $usuario, $clave);
    public function obtenerMensaje();
}
