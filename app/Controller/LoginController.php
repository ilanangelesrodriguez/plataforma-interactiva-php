<?php

namespace Controller;

use Model\LoginModel;
use View\LoginView;

class LoginController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->model->addObserver($this->view);
    }

    public function mostrarFormularioLogin()
    {
        // Lógica para mostrar el formulario de inicio de sesión
        $this->view->mostrarFormularioLogin();
    }

    public function procesarInicioSesion($username, $password)
    {
        // Lógica para procesar el inicio de sesión
        // ...

        // Llamar al método de autenticación del modelo
        $this->model->authenticate($username, $password);
    }
}

