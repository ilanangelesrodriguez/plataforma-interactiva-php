<?php

namespace View;

class LoginView
{
    public function mostrarFormulario()
    {
        ?>
        <form method="post" action="?action=procesarFormulario">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required><br>

            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" required><br>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <?php
    }
}
