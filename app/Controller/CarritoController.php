<?php

namespace Controller;

require_once __DIR__ . '/../View/CarritoView.php';
require_once __DIR__ . '/../Model/Carrito.php';

use Model\Carrito;
use View\CarritoView;

class CarritoController
{
    public function handleRequest()
    {

        $miCarrito = new Carrito();
        $carritoView = new CarritoView();

        $productosDisponibles = array(
            "ProductoA" => "Descripción del Producto A",
            "ProductoB" => "Descripción del Producto B",
            "ProductoC" => "Descripción del Producto C",
        );

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['accion'])) {
                $accion = $_POST['accion'];

                if ($accion === 'agregar') {
                    $producto = $_POST['producto'];
                    $cantidad = $_POST['cantidad'];

                    if (array_key_exists($producto, $productosDisponibles)) {
                        $miCarrito->agregarProducto($producto, $cantidad);
                    } else {
                        echo "Producto no válido";
                    }
                } elseif (strpos($accion, 'quitar') !== false) {
                    $indice = filter_var($accion, FILTER_SANITIZE_NUMBER_INT);
                    $miCarrito->quitarProducto($indice);
                } elseif ($accion === 'vaciar') {
                    $miCarrito->vaciarCarrito();
                }
            }
        }

        // Renderizar la vista
        $carritoView->render($productosDisponibles, $miCarrito);

        // Almacenar el carrito en la sesión
        $_SESSION['carrito'] = $miCarrito->obtenerProductos();
    }
}

$carritoController = new CarritoController();
$carritoController->handleRequest();
