<?php

session_start();

class Carrito {
    public function agregarProducto($producto, $cantidad) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        // Verificar si el producto ya está en el carrito
        $encontrado = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['producto'] === $producto) {
                $item['cantidad'] += $cantidad;
                $encontrado = true;
                break;
            }
        }

        // Si el producto no está en el carrito, agregarlo
        if (!$encontrado) {
            $_SESSION['carrito'][] = array('producto' => $producto, 'cantidad' => $cantidad);
        }
    }

    public function quitarProducto($indice) {
        if (isset($_SESSION['carrito'][$indice])) {
            unset($_SESSION['carrito'][$indice]);
        }
    }

    public function obtenerProductos() {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        return $_SESSION['carrito'];
    }

    public function vaciarCarrito() {
        $_SESSION['carrito'] = array();
    }
}

$miCarrito = new Carrito();

// Productos predefinidos
$productosDisponibles = array(
    "ProductoA" => "Descripción del Producto A",
    "ProductoB" => "Descripción del Producto B",
    "ProductoC" => "Descripción del Producto C",
);

// Manejar las acciones del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        if ($accion === 'agregar') {
            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidad'];

            // Verificar si el producto existe en los productos disponibles
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

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>

<h1>Carrito de Compras</h1>

<form method="post" action="">
    <label for="producto">Producto:</label>
    <select name="producto">
        <?php
        foreach ($productosDisponibles as $producto => $descripcion) {
            echo "<option value=\"$producto\">$producto - $descripcion</option>";
        }
        ?>
    </select>
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" value="1" required>
    <button type="submit" name="accion" value="agregar">Agregar al carrito</button>
</form>

<h2>Productos en el carrito:</h2>
<ul>
    <?php
    foreach ($miCarrito->obtenerProductos() as $indice => $item) {
        echo "<li>{$item['producto']} - Cantidad: {$item['cantidad']} <button type=\"submit\" name=\"accion\" value=\"quitar$indice\">Quitar</button></li>";
    }
    ?>
</ul>

<form method="post" action="">
    <button type="submit" name="accion" value="vaciar">Vaciar carrito</button>
</form>

</body>
</html>
