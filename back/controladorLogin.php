<?php session_start();

include_once 'clases/usuarios.php';
include_once 'controladorSesion.php';

$error = false;
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $usuario_logeado = new Usuario();
    if ($usuario_logeado->loginUsuario($_POST['usuario'], $_POST['pass'])) {
        if (validarSesion()) {
            $dataCookie = $usuario_logeado->detallesUsuario($_SESSION['id']);
            if (isset($_COOKIE['UsuarioLogeado'])) {
                setcookie("UsuarioLogeado", '', time() - 36000);
            } else {
                setcookie("UsuarioLogeado", serialize($dataCookie), time() + 3600, '/');
            }
            if ($dataCookie->Correo == "superusuario@gmail.com") {
                header('Location: controladorAdmin.php');
            } else {
                header('Location: controladorPerfil.php');
            }
        } else {
            setcookie("UsuarioLogeado", serialize($dataCookie), time() + 3600, '/');
            header('Location: controladorPerfil.php');
        }
    } else {
        $error = true;
        include_once '../front/paginas/login.php';
    }
} else {
    $error = true;
    include_once '../front/paginas/login.php';
}

/*
En este script si la petición es de tipo POST, crea una instancia de la clase Usuario y llama al método loginUsuario() con los datos enviados desde el formulario, si las credenciales son correctas, comprueba si la sesión es válida. Si la sesión es válida, obtiene los datos del usuario con detallesUsuario() y maneja una cookie llamada “UsuarioLogeado”, si ya existe, la elimina, y si no la crea con los datos serializados y una duración de una hora. Luego redirige al usuario a un controlador distinto según su correo: si es "superusuario@gmail.com", lo envía al panel de administrador, si no, lo redirige a su perfil. Si la sesión no es válida, también crea la cookie y redirige al perfil. En caso de que el login falle, o si la solicitud no fue enviada por POST, se muestra nuevamente la página de login con una variable de error activada.

Autor: Fco. Manuel Martínez Vázquez
*/