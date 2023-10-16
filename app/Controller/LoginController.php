<?php

namespace Controller;

use Model\LoginModel;
use Model\UsuarioBloqueado;

class LoginController
{
    private $modelo;
    private $intentosMaximos = 3;

    public function __construct()
    {
        $this->modelo = new LoginModel();
    }

    public function mostrarFormulario()
    {
        include('../View/LoginView.php');
    }

    public function procesarFormulario()
    {
        // Verificar las credenciales ingresadas en el formulario
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        if ($this->modelo->verificarCredenciales($usuario, $clave)) {
            // Las credenciales son válidas, establecer la cookie de sesión
            setcookie('usuarioAutenticado', $usuario, time() + (365 * 24 * 60 * 60)); // Cookie válida por un año

            // Restablecer el contador de intentos fallidos después de un inicio de sesión exitoso
            $this->modelo->resetearIntentosFallidos($usuario);

            // Redirigir a mostrarFormulario para que el mensaje se muestre en el div login__popup
            header('Location: test.php?action=mostrarFormulario');
            exit();
        } else {
            // Credenciales no válidas, incrementar el contador de intentos fallidos
            $intentosFallidos = $this->modelo->obtenerIntentosFallidos($usuario) + 1;
            $this->modelo->incrementarIntentosFallidos($usuario);

            // Verificar si se superó el número máximo de intentos
            if ($intentosFallidos >= $this->intentosMaximos) {
                $this->modelo->getUsuario($usuario)->setEstado(new UsuarioBloqueado());
            }

            // Redirigir de vuelta al formulario con mensaje de error
            header("Location: test.php?action=mostrarFormulario&error=1&intentos=$intentosFallidos");
            exit();
        }

    }

    public function cerrarSesion()
    {
        // Limpiar la cookie de sesión y redirigir a mostrarFormulario
        setcookie('usuarioAutenticado', '', time() - 3600);
        header('Location: test.php?action=mostrarFormulario');
        exit();
    }
}
