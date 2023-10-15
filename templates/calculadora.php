<?php
?>

<div class="calculadora">

    <div class="calculadora__card">
        <div class="calculadora__title">Calculadora</div>

        <div class="calculadora__nav">
            <button class="calculadora__nav-item" onclick="showForm('form1', this)">Suma</button>
            <button class="calculadora__nav-item" onclick="showForm('form2', this)">Resta</button>
            <button class="calculadora__nav-item" onclick="showForm('form3', this)">Multiplicación</button>
            <button class="calculadora__nav-item" onclick="showForm('form4', this)">División</button>
        </div>

        <div class="calculadora__main">
            <?php include './imageMath.php' ?>
            <p class="calculadora__main-p">
                Elige la operación a realizar.
            </p>
        </div>

        <form class="calculadora__card-form calculadora__form" id="form1">
            <label class="calculadora__label">
                N° 01:
                <input class="calculadora__form-input" id="num1_form1" name="num1" placeholder="Número 01" type="number">
            </label>
            <label class="calculadora__label">
                N° 02:
                <input class="calculadora__form-input" id="num2_form1" name="num2" placeholder="Número 02" type="number">
            </label>

            <button class="calculadora__button" onclick="calcular('form1', 'suma')">
                <i class="animation"></i>Calcular<i class="animation"></i>
            </button>
            <div class="calculadora__result">
                <div class="calculadora__result-title">Resultado (suma)</div>
                <div id="resultados_suma" ></div>
            </div>


        </form>


        <form class="calculadora__card-form calculadora__form" id="form2">

            <label class="calculadora__label">
                N° 01:
                <input class="calculadora__form-input" id="num1_form2" name="num1" placeholder="Número 01" type="number">
            </label>
            <label class="calculadora__label">
                N° 02:
                <input class="calculadora__form-input" id="num2_form2" name="num2" placeholder="Número 02" type="number">
            </label>

            <button class="calculadora__button" onclick="calcular('form2', 'resta')">
                <i class="animation"></i>Calcular<i class="animation"></i>
            </button>

            <div class="calculadora__result">
                <div class="calculadora__result-title">Resultado (resta)</div>
                <div id="resultados_resta" ></div>
            </div>

        </form>


        <form class="calculadora__card-form calculadora__form" id="form3" >

            <label class="calculadora__label">
                N° 01:
                <input class="calculadora__form-input" id="num1_form3" name="num1" placeholder="Número 01" type="number">
            </label>
            <label class="calculadora__label">
                N° 02:
                <input class="calculadora__form-input" id="num2_form3" name="num2" placeholder="Número 02" type="number">
            </label>

            <button class="calculadora__button" onclick="calcular('form3', 'multiplicacion')">
                <i class="animation"></i>Calcular<i class="animation"></i>
            </button>

            <div class="calculadora__result">
                <div class="calculadora__result-title">Resultado (multiplicación)</div>
                <div id="resultados_multiplicacion" ></div>
            </div>

        </form>


        <form class="calculadora__card-form calculadora__form" id="form4">
            <!-- Contenido del segundo formulario -->
            <label class="calculadora__label">
                N° 01:
                <input class="calculadora__form-input" id="num1_form4" name="num1" placeholder="Número 01" type="number">
            </label>
            <label class="calculadora__label">
                N° 02:
                <input class="calculadora__form-input" id="num2_form4" name="num2" placeholder="Número 02" type="number">
            </label>

            <button class="calculadora__button" onclick="calcular('form4', 'division')">
                <i class="animation"></i>Calcular<i class="animation"></i>
            </button>
            <div class="calculadora__result">
                <div class="calculadora__result-title">Resultado (division)</div>
                <div id="resultados_division" ></div>
            </div>
        </form>
    </div>
</div>

