<?php
?>

<div class="main__content-login">
    <form class="login" method="post" onsubmit="return enviarFormulario()">
        <div class="login__title">Bienvenido<br><span>Introduce los datos de prueba para continuar</span></div>

        <input required  class="login__input" name="email" placeholder="Correo Electrónico" type="email">
        <input required class="login__input" name="password" placeholder="Contraseña" type="password">

        <button class="login__button" type="submit" onclick="enviarFormulario()">Iniciar Sesión →</button>
    </form>

    <div class="login__popup" id="mensajeExito">

    </div>

    <div class="test__account">
        <div class="test__account-1 test__account-card red">
            <p class="test__account-title">Cuenta 01</p>
            <p class="test__account-content">
                <span>Correo: </span>
                estudiante@uns.edu.pe
            </p>
            <p class="test__account-content">
                <span>Contraseña: </span>
                estudiante
            </p>
        </div>
        <div class="test__account-2 test__account-card blue">
            <p class="test__account-title">Cuenta 02</p>
            <p class="test__account-content">
                <span>Correo: </span>
                docente@uns.edu.pe
            </p>
            <p class="test__account-content">
                <span>Contraseña: </span>
                docente
            </p>
        </div>
        <div class="test__account-3 test__account-card green">
            <p class="test__account-title">Cuenta 03</p>
            <p class="test__account-content">
                <span>Correo: </span>
                rector@uns.edu.pe
            </p>
            <p class="test__account-content">
                <span>Contraseña: </span>
                rector
            </p>
        </div>
    </div>
</div>

