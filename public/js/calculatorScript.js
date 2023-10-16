function showForm(formId, clickedButton) {
    const forms = document.querySelectorAll('.calculadora__card-form');
    forms.forEach(form => form.style.display = 'none');
    const main = document.querySelector('.calculadora__main');
    main.style.display = 'none';
    const targetForm = document.getElementById(formId);
    if (targetForm) {
        targetForm.style.display = 'flex';
    }


    const buttons = document.querySelectorAll('.calculadora__nav-item');
    buttons.forEach(button => button.classList.remove('indicator'));


    clickedButton.classList.add('indicator');
}


function calcular(formId, operacion) {
    let num1 = document.getElementById("num1_" + formId).value;
    let num2 = document.getElementById("num2_" + formId).value;

    if (!isNaN(num1) && !isNaN(num2)) {
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "../public/calcular_operacion.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("resultados_" + operacion).innerHTML = xhr.responseText;
            }
        };

        xhr.send("num1=" + num1 + "&num2=" + num2 + "&operacion=" + operacion);
    } else {
        document.getElementById("resultados_" + operacion).innerHTML = "<p style='color: red;'>Por favor, ingresa números válidos.</p>";

    }

    event.preventDefault();
}



function enviarFormulario() {
    const email = document.querySelector('.login__input[name="email"]').value;
    const password = document.querySelector('.login__input[name="password"]').value;

    // imprime los datos en la consola
    console.log('Correo Electrónico:', email);
    console.log('Contraseña:', password);

    // Prevenir el envío del formulario por defecto
    event.preventDefault();

    // Realizar la solicitud AJAX al servidor
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../templates/login-verificar.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Configurar la función de devolución de llamada
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Mostrar el mensaje en algún lugar de la página
            const mensajeDiv = document.getElementById('mensajeExito');
            mensajeDiv.innerHTML = xhr.responseText;
            mensajeDiv.style.display = 'block';  // Asegurar que el div sea visible
        }
    };

    // Enviar los datos del formulario al servidor
    xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
}

