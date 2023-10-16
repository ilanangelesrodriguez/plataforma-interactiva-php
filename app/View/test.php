<?php

// test.php

// Incluir el archivo de autoloader (si utilizas autoloading de clases)
// require_once 'path_to_autoloader.php';

// Incluir el controlador de carrito
require_once '../Controller/CarritoController.php';

// Crear una instancia del controlador de carrito
$carritoController = new Controller\CarritoController();

// Manejar la solicitud
$carritoController->handleRequest();


?>



