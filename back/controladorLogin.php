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