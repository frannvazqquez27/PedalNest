const boton = document.getElementById("botonform");
const formulario = document.getElementById("formularioReservas");
let dia, mes, diaCompleto, selectEntrada, horaEntrada, selectSalida, horaSalida, nombre, personas;

boton.addEventListener('click', validar);
formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    if (asegurar() && validar()) {
        const datos = new FormData(formulario);
        datos.append('fecha', diaCompleto);
        const onRequest = new XMLHttpRequest();
        onRequest.open("POST", "controladorReservas.php", true);
        onRequest.onload = function () {
            if (onRequest.status === 200) {
                alert("Subido!!!");
            } else {
                alert("Error: " + onRequest.status);
            }
        };
        onRequest.send(datos);
    }
}, false);

function asegurar() {
    return confirm("¿Confirmas la reserva con estos datos?");
}

function validar() {
    dia = document.getElementsByClassName("cal-day__day--selected")[0].innerHTML;
    mes = document.getElementsByClassName("cal-month__current")[0].innerHTML;
    diaCompleto = `${dia} ${mes}`;
    selectEntrada = document.getElementById('entrada');
    horaEntrada = selectEntrada.options[selectEntrada.selectedIndex];
    selectSalida = document.getElementById('salida');
    horaSalida = selectSalida.options[selectSalida.selectedIndex];
    nombre = document.getElementById('nombreInput');
    personas = document.getElementById('personasInput');
    [nombre, personas].forEach(campo => campo.setCustomValidity(''));
    return validarAPI() && validarJS();
}

function validarJS() {
    return nombreJS() && personasJS();
}

function validarAPI() {
    return nombreAPI() && personasAPI();
}

function nombreAPI() {
    if (nombre.validity.valueMissing) {
        nombre.setCustomValidity("Dinos cómo te llamas");
        return false;
    }
    return true;
}

function nombreJS() {
    const valor = nombre.value;
    if (valor === '') {
        nombre.setCustomValidity("¿Cuál es tu nombre?");
        return false;
    }
    return true;
}

function personasAPI() {
    if (personas.validity.valueMissing) {
        personas.setCustomValidity("¿Cuántas personas vais a ser?");
        return false;
    }
    if (personas.validity.typeMismatch) {
        personas.setCustomValidity("Introduce el número de personas para reservar las bicicletas");
        return false;
    }
    if (personas.validity.rangeUnderflow) {
        personas.setCustomValidity("¿No viene nadie?");
        return false;
    }
    if (personas.validity.rangeOverflow) {
        personas.setCustomValidity("Máximo grupos de 8 personas");
        return false;
    }
    return true;
}

function personasJS() {
    const valor = personas.value;
    if (valor === '') {
        personas.setCustomValidity("¿Cuántas personas vais a ser?");
        return false;
    }
    if (isNaN(valor)) {
        personas.setCustomValidity("Introduce el número de personas para reservar las bicicletas");
        return false;
    }
    if (valor < 1) {
        personas.setCustomValidity("¿No viene nadie?");
        return false;
    }
    if (valor > 8) {
        personas.setCustomValidity("Máximo grupos de 8 personas");
        return false;
    }
    return true;
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/