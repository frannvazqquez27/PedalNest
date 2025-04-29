let formulario = document.getElementById("formularioResenas");
let boton = document.getElementById("botonform")
let nombre, correo, texto;

boton.addEventListener('click',validar);
formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    if (asegurar() && validar()) {
        this.submit()
        alert("Reseña creada")
    }
}, false)

function asegurar() {
    return confirm("¿Confirmas la reseña con estos datos?");
}

function validar() {
    nombre = document.getElementById("nombreInput");
    correo = document.getElementById("correoInput");
    texto = document.getElementById('textoInput');
    campos = [nombre, correo, texto]
    for (let i = 0; i < campos.length; i++) {
        campos[i].setCustomValidity('');
    }
    return (validarAPI() && validarJS())
}

function validarJS() {
    return nombreJS() && correoJS() && textoJS();
}

function validarAPI() {
    return nombreAPI() && correoAPI() && textoAPI();
}

function nombreAPI() {
    if (nombre.validity.valueMissing) {
        nombre.setCustomValidity("¿Cómo te llamas?");
        return false;
    } else {
        return true;
    }
}

function nombreJS() {
    let nombreValor = nombre.value;
    if (nombreValor == '') {
        nombre.setCustomValidity("¿Cuál es tu nombre?");
        return false;
    } else {
        return true;
    }
}

function correoAPI() {
    if (correo.validity.valueMissing) {
        correo.setCustomValidity("Introduce tu correo electrónico");
        return false;
    } else if (correo.validity.patternMissmatch) {
        correo.setCustomValidity("Dirección de correo no válida");
        return false;
    } else {
        return true;
    }
}

function correoJS() {
    let correoValor = correo.value;
    let patron = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
    if (!patron.test(correoValor)) {
        correo.setCustomValidity("Dirección de correo no válida");
        return false
    } else {
        return true;
    }
}

function textoAPI() {
    if (texto.validity.valueMissing) {
        texto.setCustomValidity("La reseña no puede estar vacía");
        return false;
    } else {
        return true;
    }
}

function textoJS() {
    let textoValor = texto.value;
    if (textoValor == '') {
        texto.setCustomValidity("¿Por qué quieres enviar una reseña vacía?");
        return false;
    } else {
        return true;
    }
}