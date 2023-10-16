class Estrategia {
    ejecutar() {}
}

class Login extends Estrategia {
    ejecutar() {
        mostrarContenido('login');
    }
}

class Calculadora extends Estrategia {
    ejecutar() {
        mostrarContenido('calculadora');
    }
}

class Ejercicio01 extends Estrategia {
    ejecutar() {
        mostrarContenido('ejercicio1');
    }
}

class Ejercicio02 extends Estrategia {
    ejecutar() {
        mostrarContenido('ejercicio2');
    }
}

class Ejercicio03 extends Estrategia {
    ejecutar() {
        mostrarContenido('ejercicio3');
    }
}

function seleccionarEstrategia(estrategia) {
    estrategia.ejecutar();
}

function mostrarContenido(idContenido) {
    // Ocultar todos los contenidos
    let todosContenidos = document.getElementsByClassName('main__content');
    for (let i = 0; i < todosContenidos.length; i++) {
        todosContenidos[i].style.display = 'none';
    }

    // Mostrar el contenido específico
    let contenido = document.getElementById(idContenido);
    contenido.style.display = 'block';
}

