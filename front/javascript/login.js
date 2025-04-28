let formulario = document.getElementById("formularioLogin");
let boton = document.getElementById("botonenviar");
let correo, pass;

boton.addEventListener('click',validar);
formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    correo = document.getElementById("correoInput");
    pass = document.getElementById("passInput");
    if (validar()) {
        this.submit();
    }
}, false);

function validar() {
    campos = [correo, pass]
    for (let i = 0; i < campos.length; i++) {
        campos[i].setCustomValidity('');
    }
    return (validarAPI() && validarJS())
}

function validarJS() {
    return correoJS() && passJS();
}

function validarAPI() {
    return correoAPI() && passAPI();
}

function correoAPI() {
    if (correo.validity.valueMissing) {
        correo.setCustomValidity("Introduce tu correo electronico");
        return false;
    } else if (correo.validity.patternMissmatch) {
        correo.setCustomValidity("Direccion de correo no valida api");
        return false;
    } else {
        return true;
    }
}

function correoJS() {
    let correoValor = correo.value;
    let patron = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
    if (!patron.test(correoValor)) {
        correo.setCustomValidity("Direccion de correo no valido js ");
        return false
    } else {
        return true;
    }
}

function passAPI() {
    if (pass.validity.valueMissing) {
        pass.setCustomValidity("Hace falta contraseña");
        return false;
    } else {
        return true;
    }
}

function passJS() {
    let passValor = pass.value;
    if (passValor == '') {
        pass.setCustomValidity("Hace falta contraseña");
        return false;
    } else {
        return true;
    }
}