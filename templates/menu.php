<?php include './header.php' ?>
<main class="main">
    <?php include './main-nav.php' ?>

    <div id="login" class="main__content">
        <?php include './login.php' ?>

    </div>

    <div id="calculadora" class="main__content">

        <?php include './calculadora.php' ?>

    </div>

    <div id="ejercicio1" class="main__content">

        <form class="signin login">
            <div class="login__title">Registro<br><span>Introduce tus datos para el registro</span></div>
            <input required  class="login__input" name="email" placeholder="Nombres" type="text">
            <input required class="login__input" name="password" placeholder="Apellidos" type="text">
            <input required class="login__input" name="password" placeholder="Correo Electrónico" type="email">
            <input required class="login__input" name="password" placeholder="Contraseña" type="password">
            <input required class="login__input" name="password" placeholder="Contraseña" type="password">
            <button class="login__button" type="submit">Registrar →</button>
        </form>

    </div>

    <div id="ejercicio2" class="main__content">

        <form class="login">
            <div class="login__title">Gestor de tareas<br><span>Introduce tus fichas :v para continuar</span></div>
            <input required  class="login__input" name="email" placeholder="Correo Electrónico" type="email">
            <input required class="login__input" name="password" placeholder="Contraseña" type="password">
            <button class="login__button" type="submit">Iniciar Sesión →</button>
        </form>

    </div>

    <div id="ejercicio3" class="main__content">

        <form class="login">
            <div class="login__title">Carrito de Compras<br><span>Introduce tus fichas :v para continuar</span></div>
            <input required  class="login__input" name="email" placeholder="Correo Electrónico" type="email">
            <input required class="login__input" name="password" placeholder="Contraseña" type="password">
            <button class="login__button" type="submit">Iniciar Sesión →</button>
        </form>

    </div>

</main>

<?php include './footer.php' ?>

<script src="../public/js/strategy.js"></script>
<script src="../public/js/calculatorScript.js"></script>

</body>
</html>
