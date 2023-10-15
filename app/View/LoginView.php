<?php

namespace View;

class LoginView implements LoginObserver
{
    public function update($username, $password)
    {
        // Actualizar la interfaz de usuario según sea necesario
        echo "Interfaz de usuario actualizada para el usuario: $username";
    }

    public function mostrarFormularioLogin()
    {
        // Lógica para mostrar el formulario de inicio de sesión
        include '../../templates/menu.php';
        include '../../templates/login.php';
    }
}
