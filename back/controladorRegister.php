<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include_once 'clases/usuarios.php';

$error = false;
if (isset($_POST['condiciones'])) {
    if ($_POST['correo'] == $_POST['confirmar_correo'] && $_POST['passd'] == $_POST['confirmar_passd']) {
        $notificacion;
        $usuario_registrado = new Usuario();
        if (isset($_POST['notificaciones'])) {
            $notificacion = '1';
        } else {
            $notificacion = '0';
        }
        $usuario_registrado->registerUsuario(
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['correo'],
            $_POST['passd'],
            $_POST['codigo_postal'],
            $_POST['poblacion'],
            $_POST['direccion'],
            $_POST['telefonoFijo'],
            $_POST['telefonomovil'],
            $notificacion
        );
        $dataCookie = $usuario_registrado->detallesUsuario($_SESSION['id']);
        $datos = serialize($dataCookie);
        if (isset($_COOKIE['UsuarioLogeado'])) {
            setcookie("UsuarioLogeado", "", time() - 3600);
        }
        setcookie("UsuarioLogeado", $datos, time() + 3600, '/');
        header('Location: controladorPerfil.php');
    } else {
        $error = true;
    }
} else {
    include_once '../front/paginas/registro.php';
    $error = true;
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/