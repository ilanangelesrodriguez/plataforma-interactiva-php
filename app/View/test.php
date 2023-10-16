<?php

require_once '../Model/LoginModel.php';
require_once '../Controller/LoginController.php';

use Model\LoginModel;
use Controller\LoginController;

$loginModel = new LoginModel();

$action = isset($_GET['action']) ? $_GET['action'] : 'mostrarFormulario';

$controller = new LoginController();

// Realizar enrutamiento
if ($action === 'mostrarFormulario') {
    $controller->mostrarFormulario();
} elseif ($action === 'procesarFormulario') {
    $controller->procesarFormulario();
} elseif ($action === 'cerrarSesion') {
    $controller->cerrarSesion();
} else {
    echo "Acción no válida";
}

