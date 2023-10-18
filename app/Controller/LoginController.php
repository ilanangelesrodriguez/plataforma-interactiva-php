<?php

namespace Controller;

use Model\Login\LoginModel;

class LoginController
{
    private $loginModel;

    public function __construct(LoginModel $loginModel)
    {
        $this->loginModel = $loginModel;
    }

    public function procesarFormulario()
    {
        $usuario = $_POST['email'];
        $clave = $_POST['password'];

        $usuarioModel = $this->loginModel->getUsuario($usuario);

        if ($usuarioModel !== null) {

            $this->verificarCredenciales($usuarioModel, $clave);

        } else {
            echo "<div class=login__title>Error<br><span>Introduce correctamente el usuario</span></div>";
            echo "<div class='login__response'>Estado no encontrado</div>";
            echo '<button class="login__button" onclick="goBack()">Volver</button>';
        }

    }

    private function verificarCredenciales($usuarioModel, $clave)
    {

        if ($usuarioModel->verificarCredenciales($clave)) {
            echo "<div class=login__title>Bienvenido {$usuarioModel->getNombre()}<br><span>Introduce los datos de prueba para continuar</span></div>";
            echo "<div class='login__response'>Inicio de sesión exitoso</div>";

            setcookie($usuarioModel->getNombre() . '_intentos_fallidos', '', time() - 3600);

            $usuarioModel->resetIntentosFallidos();

            echo '<button class="login__button signout__button" onclick="goBack()">Cerrar Sesión</button>';


        } else {

            $intentosFallidos = isset($_COOKIE[$usuarioModel->getNombre() . '_intentos_fallidos']) ? (int)$_COOKIE[$usuarioModel->getNombre() . '_intentos_fallidos'] : 0;
            $usuarioModel->setIntentosFallidos($intentosFallidos + 1);


            setcookie($usuarioModel->getNombre() . '_intentos_fallidos', $usuarioModel->getIntentosFallidos(), time() + (365 * 24 * 60 * 60));
            echo "<div class=login__title>Clave incorrecta<br><span>Introduce los datos de prueba para continuar</span></div>";
            echo "<div class='login__response'> <b>Credenciales incorrectas.</b> Intentos fallidos: $intentosFallidos</div>";


            if ($intentosFallidos >= 3) {
                $usuarioModel->bloquearUsuario();
                echo "<div class='login__response'> Estado del usuario: " . get_class($usuarioModel->getEstado())."</div>";
            } else {
                echo "<div class='login__response'> Estado del usuario: " . get_class($usuarioModel->getEstado())."</div>";

            }

            echo '<button class="login__button" onclick="goBack()">← Volver</button>';

        }
    }
}
