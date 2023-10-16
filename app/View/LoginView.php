<div class="main__content-login">
    <form class="login" method="post" action="test.php?action=procesarFormulario">
        <input required class="login__input" name="usuario" placeholder="Usuario" type="text">
        <input required class="login__input" name="clave" placeholder="Contraseña" type="password">
        <button class="login__button" type="submit">Iniciar Sesión →</button>
    </form>

    <div class="login__popup" id="mensajeExito">
        <?php
        // Mostrar mensaje de error si las credenciales son incorrectas
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p class="error-message">Credenciales incorrectas. Por favor, intenta de nuevo.</p>';
        }

        if (isset($_COOKIE['usuarioAutenticado'])) {
            echo '<p>Bienvenido, ' . $_COOKIE['usuarioAutenticado'] . '.</p>';
            // Limpiar la cookie después de mostrar el mensaje de bienvenida
            setcookie('usuarioAutenticado', '', time() - 3600);
            // Agregar el formulario para cerrar sesión
            echo '<form method="post" action="test.php?action=cerrarSesion">
                     <button type="submit">Cerrar Sesión</button>
                  </form>';
        }
        ?>
    </div>
</div>

