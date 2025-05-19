<?php session_start();

include_once 'clases/usuarios.php';
include_once 'controladorSesion.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    if (isset($_POST["cerrarSesion"])) {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, null, time() - 3600);
                setcookie($name, null, time() - 3600, '/');
            }
        }
        session_unset();
        session_destroy();
        header("Location: controladorInicio.php");
    } else {
        $actualizarUser = new Usuario();
        $name = $_FILES['Subirimagen']['name'];
        $tmp_name = $_FILES['Subirimagen']['tmp_name'];
        $actualizarUser->actualizarImagen($_SESSION['id'], $name);
        $ruta = '../front/imgs/usuarios/' . $name;
        move_uploaded_file($tmp_name, $ruta);
        $dataCookie = $actualizarUser->detallesUsuario($_SESSION['id']);
        setcookie("UsuarioLogeado", '', time() - 36000);
        setcookie("UsuarioLogeado", serialize($dataCookie), time() + 3600, '/');
        header("Location: controladorPerfil.php");
    }
} else {
    if (validarSesion()) {
        include '../front/paginas/perfil.php';
    } else {
        header('Location: ../front/paginas/index.php');
    }
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/