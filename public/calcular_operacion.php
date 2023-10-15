<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operacion = $_POST["operacion"];

    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                break;
            case 'division':
                $resultado = ($num2 != 0) ? $num1 / $num2 : "<p class=resultado__division-fail>No es posible dividir por cero.</p>";
                break;
            default:
                $resultado = "Operación no válida";
        }

        echo "<p class=resultado__division>Resultado: $resultado</p>";
    } else {
        echo "<p class=resultado__division-fail>Por favor, ingresa números válidos.</p>";
    }
}
?>



