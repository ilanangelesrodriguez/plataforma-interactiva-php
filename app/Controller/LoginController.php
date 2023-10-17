<?php

namespace Controller;

use Model\LoginModel;
use Model\UsuarioBloqueado;

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

        // Obtener el usuario y verificar si está bloqueado
        $usuarioModel = $this->loginModel->getUsuario($usuario);

        if ($usuarioModel !== null) {
            // Verificar credenciales
            $this->verificarCredenciales($usuarioModel, $clave);
        } else {
            echo "<div class='login__response'>Usuario no encontrado</div>";
            echo '<button class="login__button" onclick="goBack()">Volver</button>';
        }

    }

    private function verificarCredenciales($usuarioModel, $clave)
    {
        // Verificar credenciales llamando al método en UsuarioModel
        if ($usuarioModel->verificarCredenciales($clave)) {
            echo "<div class=login__title>Bienvenido {$usuarioModel->getNombre()}<br><span>Introduce los datos de prueba para continuar</span></div>";
            echo "<div class='login__response'>Inicio de sesión exitoso</div>";

            // Limpiar la cookie si el inicio de sesión es exitoso
            setcookie($usuarioModel->getNombre() . '_intentos_fallidos', '', time() - 3600);

            // Resetear intentos fallidos
            $usuarioModel->resetIntentosFallidos();

            // Agrega un botón para volver a la página anterior
            echo '<button class="login__button signout__button" onclick="goBack()">Cerrar Sesión</button>';


        } else {
            // Incrementar intentos fallidos solo si el usuario no está bloqueado
            //$usuarioModel->incrementarIntentosFallidos();

            $intentosFallidos = isset($_COOKIE[$usuarioModel->getNombre() . '_intentos_fallidos']) ? (int)$_COOKIE[$usuarioModel->getNombre() . '_intentos_fallidos'] : 0;
            $usuarioModel->setIntentosFallidos($intentosFallidos + 1);

            // Obtener el número actual de intentos fallidos del usuario después de incrementar
            //$intentosFallidos = $usuarioModel->getIntentosFallidos();

            // Guardar el número de intentos fallidos en la cookie
            setcookie($usuarioModel->getNombre() . '_intentos_fallidos', $usuarioModel->getIntentosFallidos(), time() + (365 * 24 * 60 * 60));
            echo "<div class=login__title>Clave incorrecta<br><span>Introduce los datos de prueba para continuar</span></div>";
            echo "<div class='login__response'>Credenciales incorrectas. Intentos fallidos: $intentosFallidos</div>";

            if ($intentosFallidos >= 3) {
                $usuarioModel->bloquearUsuario();
                echo "<div class='login__response'> Estado del usuario: " . get_class($usuarioModel->getEstado())."</div>";
            } else {
                echo "<div class='login__response'> Estado del usuario: " . get_class($usuarioModel->getEstado())."</div>";

            }
            // Agrega un botón para volver a la página anterior
            echo '<button class="login__button" onclick="goBack()">← Volver</button>';

        }
    }
}
