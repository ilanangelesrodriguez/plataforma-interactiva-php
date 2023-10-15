<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="body background">
<header class="header">
    <div class="header__div">
        <img class="header__div-img" src="../public/images/logo-EPISI.png" alt="Logo de la Escuela Porfesional de Ingenieria de Sistemas">
        <h3></h3>
    </div>
    <div class="header__div header__div-poo">
        <h3>Programación Orientada a Objetos (POO) con PHP</h3>
    </div>
    <div class="header__div header__div-course">
        <h3>Aplicaciones Distribuidas I</h3>
    </div>
</header>
<main class="main">
    <nav class="main__nav">
            <a href="#" class="main__nav-a" onclick="seleccionarEstrategia(new Login())">
                Login
            </a>
            <a href="#" class="main__nav-a" onclick="seleccionarEstrategia(new Calculadora())">
                Calculadora
            </a>
            <a href="#" class="main__nav-a" onclick="seleccionarEstrategia(new Ejercicio01)">
                Ejercicio 01
            </a>
            <a href="#" class="main__nav-a" onclick="seleccionarEstrategia(new Ejercicio02)">
                Ejercicio 02
            </a>
            <a href="#" class="main__nav-a" onclick="seleccionarEstrategia(new Ejercicio03)">
                Ejercicio 03
            </a>
    </nav>

    <div id="login" class="main__content">

        <form class="login">
            <div class="login__title">Bienvenido<br><span>Introduce tus datos para continuar</span></div>

            <input required  class="login__input" name="email" placeholder="Correo Electrónico" type="email">
            <input required class="login__input" name="password" placeholder="Contraseña" type="password">

            <button class="login__button" type="submit">Iniciar Sesión →</button>
        </form>

    </div>

    <div id="calculadora" class="main__content">

        <div class="calculadora">

            <div class="calculadora__card">
                <div class="calculadora__title">Calculadora</div>

                <div class="calculadora__nav">
                    <button class="calculadora__nav-item indicator" onclick="showForm('form1', this)">Suma</button>
                    <button class="calculadora__nav-item" onclick="showForm('form2', this)">Resta</button>
                    <button class="calculadora__nav-item" onclick="showForm('form3', this)">Multiplicación</button>
                    <button class="calculadora__nav-item" onclick="showForm('form4', this)">División</button>
                </div>

                <div class="calculadora__main">
                    <?php include './imageMath.php' ?>
                </div>

                <form class="calculadora__card-form calculadora__form" id="form1" action="">
                    <label class="calculadora__label">
                        N° 01:
                        <input class="calculadora__form-input" name="email" placeholder="Número 01" type="number">
                    </label>
                    <label class="calculadora__label">
                        N° 02:
                        <input class="calculadora__form-input" name="password" placeholder="Número 02" type="number">
                    </label>
                    <label class="calculadora__label">
                        N° 03:
                        <input class="calculadora__form-input" name="email" placeholder="Número 03" type="number">
                    </label>
                    <button class="calculadora__button" >
                        <i class="animation"></i>Calcular<i class="animation"></i>
                    </button>
                </form>

                <form class="calculadora__card-form calculadora__form" id="form2" action="">
                    <!-- Contenido del segundo formulario -->
                    <label class="calculadora__label">
                        N° 01:
                        <input class="calculadora__form-input" name="email" placeholder="Número 01" type="number">
                    </label>
                    <label class="calculadora__label">
                        N° 02:
                        <input class="calculadora__form-input" name="password" placeholder="Número 02" type="number">
                    </label>
                    <button class="calculadora__button" data-form-id="form2">
                        <i class="animation"></i>Calcular<i class="animation"></i>
                    </button>
                </form>

                <form class="calculadora__card-form calculadora__form" id="form3" action="">
                    <!-- Contenido del segundo formulario -->
                    <label class="calculadora__label">
                        N° 01:
                        <input class="calculadora__form-input" name="email" placeholder="Número 01" type="number">
                    </label>
                    <label class="calculadora__label">
                        N° 02:
                        <input class="calculadora__form-input" name="password" placeholder="Número 02" type="number">
                    </label>
                    <button class="calculadora__button" data-form-id="form2">
                        <i class="animation"></i>Calcular<i class="animation"></i>
                    </button>
                </form>

                <form class="calculadora__card-form calculadora__form" id="form4" action="">
                    <!-- Contenido del segundo formulario -->
                    <label class="calculadora__label">
                        N° 01:
                        <input class="calculadora__form-input" name="email" placeholder="Número 01" type="number">
                    </label>
                    <label class="calculadora__label">
                        N° 02:
                        <input class="calculadora__form-input" name="password" placeholder="Número 02" type="number">
                    </label>
                    <button class="calculadora__button" data-form-id="form2">
                        <i class="animation"></i>Calcular<i class="animation"></i>
                    </button>
                </form>
            </div>
        </div>

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
<footer class="footer">
    <div class="footer__div footer__div-contact">
        <p class="footer__div-p">
            Correo Electrónico:
            <a class="footer__div-a" href="mailto:202014026@uns.edu.pe?subject=Proyecto PHP&body=Hola, ....">202014026@uns.edu.pe</a>
        </p>
        <p class="footer__div-p">
            Teléfono:
            <a class="footer__div-a" href="tel:+51975596292">(+51) 975-596-292</a>
        </p>
    </div>
    <div class="footer__div">
        © Desarrollado por Ilan Néstor Angeles Rodriguez. Todos Los Derechos Reservados, 2023.
    </div>
</footer>

<script src="../public/js/strategy.js"></script>
<script src="../public/js/calculatorScript.js"></script>

</body>
</html>
