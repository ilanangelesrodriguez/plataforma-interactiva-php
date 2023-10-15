<?php
$response = '';

$cuentas = [
    "estudiante@uns.edu.pe" => "estudiante",
    "docente@uns.edu.pe" => "docente",
    "rector@uns.edu.pe" => "rector",
];


$maxIntentosFallidos = 3;


session_start();
if (!isset($_SESSION['intentos_fallidos'])) {
    $_SESSION['intentos_fallidos'] = 0;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];


    if (array_key_exists($email, $cuentas) && $cuentas[$email] == $password) {

        $_SESSION['intentos_fallidos'] = 0;
        $response = "Inicio de sesión exitoso. <br>¡Bienvenido!";
        echo $response;
    } else {

        $_SESSION['intentos_fallidos']++;


        $response = "<p class='resultado__division-fail'>Error de inicio de sesión. <br>Verifica tus credenciales.</p>";


        if ($_SESSION['intentos_fallidos'] >= $maxIntentosFallidos) {
            $response .= "<p class='resultado__division-fail'>La cuenta está bloqueada. <br>Contacta al administrador.</p>";

        }

        echo $response;
    }
}
?>



