const ListaProductos = [];
let formulario = document.getElementById("formTarjeta");
let boton = document.getElementById("botonTarjeta");
let selectPago, nombreTarjeta, numeroTarjeta, fechaTarjeta, numeroCVV, nombre, apellidos, fecha, hora;

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

boton.addEventListener('click', validar);
formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    if (validar() && getCookie('UsuarioLogeado')) {
        ListaProductos.length = 0;
        var onRequest = new XMLHttpRequest();
        onRequest.open("POST", "controladorCompra.php", true);
        var datos = new FormData(formulario);
        let precios = document.querySelector('#T-precio').textContent;
        let productos = document.querySelectorAll('#objetos');
        let cantidades = document.querySelectorAll('#cantidad');
        for (let i = 0; i < productos.length; i++) {
            ListaProductos.push(productos[i].textContent + ':' + cantidades[i].textContent);
        }
        datos.append("Productos", ListaProductos.toString());
        datos.append("Precios", precios.slice(7, -1).replace(",", "."));
        onRequest.onload = function (onEvent) {
            if (onRequest.status == 200) {
                alert("Subido!!!");
                window.location.href = window.location.href;
            } else {
                alert("Error: " + onRequest.status);
            }
        }
        onRequest.send(datos);
    } else {
        alert('Se necesita estar logeado');
    }
}, false);

// ... (el resto de tus funciones de validación no cambian)