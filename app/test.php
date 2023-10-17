<?php

require_once 'Model/UsuarioModel.php';
require_once 'Model/UsuarioActivo.php';
require_once 'Model/UsuarioBloqueado.php';
require_once 'Model/LoginModel.php';
require_once 'Controller/LoginController.php';
require_once 'View/LoginView.php';

use Model\LoginModel;
use Controller\LoginController;
use View\LoginView;

$loginModel = new LoginModel();
$loginController = new LoginController($loginModel);
$loginView = new LoginView();

$action = isset($_GET['action']) ? $_GET['action'] : 'mostrarFormulario';

// Realizar enrutamiento
if ($action === 'mostrarFormulario') {
    $loginView->mostrarFormulario();
} elseif ($action === 'procesarFormulario') {
    $loginController->procesarFormulario();
}

?>

