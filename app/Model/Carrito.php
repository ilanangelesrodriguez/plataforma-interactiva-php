<?php

namespace Model;

class Carrito
{
    public static function agregarProducto($producto, $cantidad)
    {
        self::verificarSesion();

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        $encontrado = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['producto'] === $producto) {
                $item['cantidad'] += $cantidad;
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            $_SESSION['carrito'][] = array('producto' => $producto, 'cantidad' => $cantidad);
        }
    }

    public static function quitarProducto($indice)
    {
        self::verificarSesion();

        if (isset($_SESSION['carrito'][$indice])) {
            unset($_SESSION['carrito'][$indice]);
        }
    }

    public static function obtenerProductos()
    {
        self::verificarSesion();

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        return $_SESSION['carrito'];
    }

    public static function vaciarCarrito()
    {
        self::verificarSesion();

        $_SESSION['carrito'] = array();
    }

    private static function verificarSesion()
    {
        if (session_status() == PHP_SESSION_NONE) {
        }
    }
}


