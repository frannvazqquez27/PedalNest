<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include_once 'controladorSesion.php';
include_once 'clases/comentario.php';

$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST') {
    $nuevoComentario = new Comentario();
    $nuevoComentario->anadirCometario($_POST['nombre'],$_POST['user'],$_POST['comentario']);
    header('Location: ../index.php');
} else {
    $comentariosMostrados = new Comentario();
    $comentarios = $comentariosMostrados->obtenerComentarios();
    include_once '../front/paginas/index.php';
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/