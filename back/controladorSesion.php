<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function validarSesion() {
    if (isset($_SESSION['id'])) {
        return true;
    }
    return false;
}

function cerrarSesion() {
    session_unset();
    session_destroy();
    return true;
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/