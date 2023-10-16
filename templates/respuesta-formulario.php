<?php include './header.php' ?>
<main class="main">

    <div class="card__registro">
        <div class="card__registro-header">
            <div class="card__registro-image">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#000000" d="M20 7L9.00004 18L3.99994 13"></path> </g></svg>
            </div>
            <div class="card__registro-content">
                <p class="card__registro-message">
                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        if (
                            isset($_POST["name"]) &&
                            isset($_POST["lastname"]) &&
                            isset($_POST["email"]) &&
                            isset($_POST["password1"]) &&
                            isset($_POST["password2"])
                        ) {
                            // Verificar si las contraseñas coinciden
                            if ($_POST["password1"] == $_POST["password2"]) {
                                // Registro exitoso
                                echo '<span class="card__registro-title registro-exitoso">Registro Exitoso</span>';
                                echo '<p class="card__registro-message registro-exitoso">¡Bienvenido, ' . $_POST["name"] . '!</p>';
                            } else {
                                // Contraseñas no coinciden
                                echo '<span class="card__registro-title registro-fallido">Error en el Registro</span>';
                                echo '<p class="card__registro-message registro-fallido">Las contraseñas no coinciden. Por favor, inténtalo de nuevo.</p>';
                            }
                        } else {
                            // Campos incompletos
                            echo '<span class="card__registro-title registro-fallido">Error en el Registro</span>';
                            echo '<p class="card__registro-message registro-fallido">Por favor, completa todos los campos.</p>';
                        }
                    } else {
                        header("Location: tu-formulario.php");
                        exit();
                    }
                    ?>

                </p>
            </div>
        </div>
    </div>



</main>

<?php include './footer.php' ?>
</body>
</html>
