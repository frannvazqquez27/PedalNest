<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include_once 'clases/usuarios.php'; 
include_once 'controladorSesion.php';
include_once 'clases/producto.php';

$name = $_GET['nombreProducto'];
$producto = new Producto();
$productoSSS = $producto -> productoPorNombre($name);

include_once '../front/paginas/producto.php';

/*
Autor: Fco. Manuel Martínez Vázquez
*/