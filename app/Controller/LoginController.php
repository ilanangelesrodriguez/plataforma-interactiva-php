<?php

namespace Controller;

use Model\LoginModel;

class LoginController
{
    private $loginModel;

    public function __construct(LoginModel $loginModel)
    {
        $this->loginModel = $loginModel;
    }

    public function procesarFormulario()
    {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        $usuarioModel = $this->loginModel->getUsuario($usuario);

        if ($usuarioModel !== null && $usuarioModel->getEstado()->verificarCredenciales($usuario, $clave)) {
            echo "Inicio de sesión exitoso";
        } else {
            echo "Credenciales incorrectas";
        }
    }
}


