<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include_once 'controladorSesion.php';
include_once 'clases/reserva.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $reserva = new Reserva();
    
    if ($reserva->crearReserva($_POST['user'], $_POST['fecha'], $_POST['entrada'], $_POST['salida'], $_POST['personas'])) {
        echo "Envío correcto";
    } else {
        echo "Error en la inserción";
    }
} else {
    include_once '../front/paginas/reservas.php';
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/