<?php

namespace Controller;

use Model\Login\LoginModel;
use View\RegistroView;

class RegistroController
{

    public function procesarRegistro()
    {
        // Obtén los datos del formulario
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
        $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

        $loginModel = new LoginModel();

        // Verifica si las contraseñas coinciden
        if ($password1 !== $password2) {
            echo '<span class="card__registro-title registro-fallido">Error en el Registro</span>';
            echo '<p class="card__registro-message registro-fallido">Las contraseñas no coinciden. Por favor, inténtalo de nuevo.</p>';
            $mensaje = 'Las contraseñas no coinciden.';
        } else {
            // Intenta registrar al usuario
            if ($loginModel->registrarUsuario($name, $usuario, $password1)) {

                setcookie('username', $usuario, time() + 3600 * 24 * 30, '/');
                setcookie('password', $password1, time() + 3600 * 24 * 30, '/');
                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#000000" d="M20 7L9.00004 18L3.99994 13"></path> </g></svg>';
                echo '<span class="card__registro-title registro-exitoso">Registro Exitoso</span>';
                $mensaje = 'Usuario de '.$name.' '.$lastname.' registrado con éxito.';
            } else {
                echo '<span class="card__registro-title registro-fallido">Error en el Registro</span>';
                $mensaje = '<p class="card__registro-message registro-fallido">Error al registrar el usuario. El nombre de usuario ya está en uso.</p>';

            }
        }

        echo $mensaje;
        echo '<button class="login__button" onclick="retroceder()">Retroceder</button>';
    }

}
