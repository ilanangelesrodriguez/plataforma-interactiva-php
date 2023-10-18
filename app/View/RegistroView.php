<?php

namespace View;

class RegistroView
{
    public function mostrarFormulario()
    {
        ?>
        <form class="registro__form" method="post" action="?action=procesarRegistro">

            <div class="login__title">Registro<br><span>Introduce tus datos para el registro</span></div>
            <input required class="login__input" name="name" placeholder="Nombres" type="text">
            <input required class="login__input" name="lastname" placeholder="Apellidos" type="text">
            <input required class="login__input" name="usuario" placeholder="Usuario" type="text">
            <input required class="login__input" name="password1" placeholder="Contraseña" type="password">
            <input required class="login__input" name="password2" placeholder="Confirmar Contraseña" type="password">
            <button class="login__button" type="submit">Registrar →</button>


        </form>
        </body>
        </html>
        <?php
    }
}
