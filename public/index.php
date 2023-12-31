<?php

use Controller\LoginController;
use Controller\RegistroController;
use Controller\TaskController;
use Model\Login\LoginModel;
use View\LoginView;
use View\TaskView;

include '../templates/header.php';
?>
<main class="main">
    <?php
    include '../templates/main-nav.php';
    ?>

    <div id="login" class="main__content main__login">

        <div class="main__content-login">
            <div class="login">

                <?php
                /**
                 * Sección de inicio de sesión
                 *
                 * Este archivo actúa como el punto de entrada para la funcionalidad de inicio de sesión.
                 * Incluye la inicialización de modelos, controladores y vistas necesarios, y realiza el enrutamiento
                 * según la acción especificada en la URL.
                 *
                 * @author Ilan Nestor Angeles Rodriguez
                 */
                require_once '../app/Model/Login/UsuarioModel.php';
                require_once '../app/Model/Login/Estado/UsuarioActivo.php';
                require_once '../app/Model/Login/Estado/UsuarioBloqueado.php';
                require_once '../app/Model/Login/LoginModel.php';
                require_once '../app/Controller/LoginController.php';
                require_once '../app/View/LoginView.php';


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
            </div>

            <?php
            $accounts = [
                ['title' => 'Cuenta 01', 'user' => 'estudiante', 'password' => 'clave1'],
                ['title' => 'Cuenta 02', 'user' => 'docente', 'password' => 'clave2'],
                ['title' => 'Cuenta 03', 'user' => 'rector', 'password' => 'clave3'],
            ];
            ?>

            <div class="test__account">
                <?php foreach ($accounts as $index => $account): ?>
                    <div class="test__account-<?php echo $index + 1; ?> test__account-card">
                        <p class="test__account-title"><?php echo $account['title']; ?></p>
                        <p class="test__account-content">
                            <span>Usuario: </span>
                            <?php echo $account['user']; ?>
                        </p>
                        <p class="test__account-content">
                            <span>Contraseña: </span>
                            <?php echo $account['password']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>



    <div id="calculadora" class="main__content">

        <?php include '../templates/calculadora.php' ?>

    </div>



    <div id="ejercicio1" class="main__content">

        <div class="signin login">

            <?php
            use View\RegistroView;

            require_once '../app/Model/Login/Estado/UsuarioActivo.php';
            require_once '../app/Model/Login/LoginModel.php';
            require_once '../app/Controller/RegistroController.php';  // Asegúrate de ajustar la ruta según tu estructura de archivos
            require_once '../app/View/RegistroView.php';

            $registroController = new RegistroController();

            // Verifica si se ha enviado el formulario (por ejemplo, a través de un botón "Submit")
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $registroController->procesarRegistro();
            } else {

                $view = new RegistroView();
                $view->mostrarFormulario();

            }

            ?>

        </div>

    </div>

    <div id="ejercicio2" class="main__content">

        <form class="gestor__tareas login" method="post" action="">
            <div class="login__title">Gestor de tareas</div>

            <label for="description">Nueva tarea:</label>
            <input class="login__input" type="text" id="description" name="description">
            <button class="login__button" type="submit">Agregar tarea</button>
            <?php

            require_once '../app/Model/TaskModel.php';
            require_once '../app/View/TaskView.php';
            require_once '../app/Controller/TaskController.php';

            $model = new TaskModel();
            $view = new TaskView();
            $controller = new TaskController($model, $view);

            $controller->handleRequest();
            ?>
        </form>


    </div>

    <div id="ejercicio3" class="main__content">

        <div class="carritocompra">
            <div class="carritocompra__title">Carrito de Compras</div>
            <div class="carritocompra__subtitle">
                <?php
                require_once '../app/Controller/CarritoController.php';

                // Crear una instancia del controlador de carrito
                $carritoController = new Controller\CarritoController();


                ?>
            </div>
        </div>


    </div>


</main>

<?php
include '../templates/footer.php';