<?php

namespace Model;

interface EstadoUsuario
{
    public function verificarCredenciales($usuario, $clave);

}
