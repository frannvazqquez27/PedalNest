let formulario = document.getElementById("formularioRegistro");
let boton = document.getElementById("botonenviar");
let nombre, apellidos, correo, correo2, pass, pass2, cp, poblacion, direccion, fijo, movil;

boton.addEventListener('click',validar);
formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    if (validar()) {
        this.submit();
    }
}, false);

function validar() {
    nombre = document.getElementById("nombre");
    apellidos = document.getElementById("apellidos");
    correo = document.getElementById("correo");
    correo2 = document.getElementById("correo2");
    pass = document.getElementById("pass");
    pass2 = document.getElementById("pass2");;
    cp = document.getElementById("cp");
    poblacion = document.getElementById("poblacion");
    direccion = document.getElementById("direccion");
    fijo = document.getElementById("tlfFijo");
    movil = document.getElementById("tlfMovil");
    campos = formulario.elements;
    for (let i = 0; i < campos.length; i++) {
        campos[i].setCustomValidity('');
    }
    return (validarJS() && validarAPI())
}

function validarJS() {
    return nombreJS() && apellidosJS() && correoJS() && passJS()  && cpJS() && poblacionJS() && direccionJS() && fijoJS() && movilJS();
}

function validarAPI() {
    return nombreAPI() && apellidosAPI() && correoAPI() && passAPI()  && cpAPI() && poblacionAPI() && direccionAPI() && fijoAPI() && movilAPI();
}

function nombreJS(){
    let nombreValor = nombre.value;
    if (nombreValor == '') {
        nombre.setCustomValidity("Necesitamos saber tu nombre");
        return false;
    } else {
        return true;
    }
}

function nombreAPI() {
    let nombre = document.getElementById("nombre");
    if (!nombre) {
        console.error("Error: 'nombre' no existe en el DOM.");
        return false;
    }
    if (nombre.validity && nombre.validity.valueMissing) {
        nombre.setCustomValidity("Necesitamos saber tu nombre");
        return false;
    } else {
        return true;
    }
}

function apellidosJS(){
    let apellidosValor = apellidos.value;
    if (apellidosValor == '') {
        apellidos.setCustomValidity("Necesitamos saber tus apellidos");
        return false;
    } else {
        return true;
    }
}

function apellidosAPI(){
    if (apellidos.validity.valueMissing) {
        apellidos.setCustomValidity("Necesitamos saber tus apellidos");
        return false;
    }else{
        return true;
    }
}

function correoJS() {
    let correoValor = correo.value;
    let correoValor2 = correo2.value;
    let patron = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
    if (!patron.test(correoValor)) {
        correo.setCustomValidity("Dirección de correo no válida");
        return false
    } else if(!patron.test(correoValor2)){
        correo2.setCustomValidity("Dirección de correo no válida");
        return false;
    }else if(correoValor != correoValor2){
        correo2.setCustomValidity("Los correos no coinciden");
        return false;
    }else{
        return true;
    }
}

function correoAPI() {
    if (correo.validity.patternMissmatch) {
        correo.setCustomValidity("Dirección de correo no válida");
        return false;
    } else if (correo2.validity.patternMissmatch){
        correo2.setCustomValidity("Dirección de correo no válida");
        return false;
    }else{
        return true;
    }
}

function passJS() {
    let passValor = pass.value;
    let passValor2 = pass2.value;
    if (passValor == '') {
        pass.setCustomValidity("Hace falta contraseña");
        return false;
    } else if (passValor2 == '') {
        pass2.setCustomValidity("Hace falta contraseña");
        return false;
    }else if (passValor != passValor2) {
        pass2.setCustomValidity("Las contraseñas no coinciden");
        return false;
    }{
        return true;
    }
}

function passAPI() {
    if (pass.validity.valueMissing) {
        pass.setCustomValidity("Hace falta contraseña");
        return false;
    } else if (pass2.validity.valueMissing) {
        pass.setCustomValidity("Hace falta contraseña");
        return false;
    } else{
        return true;
    }
}

function cpJS(){
    let cpValor = cp.value;
    let patron = /^\d{5}$/;
    if (!patron.test(cpValor)) {
        correo.setCustomValidity("Código postal no válido");
        return false
    }else{
        return true;
    }
}

function cpAPI(){
    if (cp.validity.patternMissmatch) {
        cp.setCustomValidity("Código postal no válido");
        return false;
    } else{
        return true;
    }
}

function poblacionJS(){
    let poblacionValor = poblacion.value;
    if (poblacionValor == '') {
        poblacion.setCustomValidity("¿Cuál es tu población?");
       return false;
   } else {
       return true;
   }
}

function poblacionAPI(){
    if (poblacion.validity.valueMissing) {
        poblacion.setCustomValidity("¿Cuál es tu población?");
        return false;
    }else{
        return true;
    }
}

function direccionJS(){
    let direccionValor = direccion.value;
    if (direccionValor == '') {
        direccion.setCustomValidity("¿Cual es tu dirección?");
       return false;
   } else {
       return true;
   }
}

function direccionAPI(){
    if (direccion.validity.valueMissing) {
        direccion.setCustomValidity("¿Cual es tu dirección?");
        return false;
    }else{
        return true;
    }
}

function fijoJS(){
    let fijoValor = fijo.value;
    let patron = /^\d{9}$/;
    if (!patron.test(fijoValor)) {
        fijo.setCustomValidity("Necesitamos un teléfono fijo al que contactar");
        return false
    } else{
        return true;
    }
}

function fijoAPI(){
    if (fijo.validity.patternMissmatch) {
        fijo.setCustomValidity("Dirección de correo no válida");
        return false;
    }else{
        return true;
    }
}

function movilJS(){
    let movilValor = movil.value;
    let patron = /^\d{9}$/;
    if (!patron.test(movilValor)) {
        fijo.setCustomValidity("Necesitamos un teléfono móvil al que contactar");
        return false
    } else{
        return true;
    }
}

function movilAPI(){
    if (movil.validity.patternMissmatch) {
        movil.setCustomValidity("Necesitamos un teléfono móvil al que contactar");
        return false;
    }else{
        return true;
    }
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/