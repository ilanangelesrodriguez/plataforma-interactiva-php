<?php

use Controller\TaskController;
use View\TaskView;

include '../templates/header.php';
?>
<main class="main">
    <?php
    include '../templates/main-nav.php';
    ?>

    <div id="login" class="main__content">
        <?php include '../templates/login.php' ?>

    </div>

    <div id="calculadora" class="main__content">

        <?php include '../templates/calculadora.php' ?>

    </div>

    <div id="ejercicio1" class="main__content">

        <form class="signin login" action="../templates/respuesta-formulario.php" method="post">
            <div class="login__title">Registro<br><span>Introduce tus datos para el registro</span></div>
            <input required  class="login__input" name="name" placeholder="Nombres" type="text">
            <input required class="login__input" name="lastname" placeholder="Apellidos" type="text">
            <input required class="login__input" name="email" placeholder="Correo Electrónico" type="email">
            <input required class="login__input" name="password1" placeholder="Contraseña" type="password">
            <input required class="login__input" name="password2" placeholder="Contraseña" type="password">
            <button class="login__button" type="submit">Registrar →</button>


        </form>

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


</main>;

<?php
include '../templates/footer.php';