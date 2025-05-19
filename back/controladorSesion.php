<?php

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