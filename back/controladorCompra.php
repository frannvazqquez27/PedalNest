<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include_once 'controladorSesion.php';
include_once 'clases/producto.php';
include_once 'clases/compra.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $compraNueva = new Compra();
    $dia = date("d-m-Y");
    $hora = date("H:i:s"); 
    $productos = explode(',', $_POST['Productos']);
    $precioTotal = floatval($_POST['Precios']);
    $numProductos = 0;

    foreach ($productos as $producto) {
        list($nombre, $cantidad) = explode(':', $producto);
        $numProductos += intval($cantidad);
    }
    $precioUnitario = $numProductos > 0 ? $precioTotal / $numProductos : 0;

    foreach ($productos as $producto) {
        list($nombre, $cantidad) = explode(':', $producto);
        for ($i = 0; $i < intval($cantidad); $i++) {
            $compraNueva->anadirCompra($_SESSION['id'], $nombre, $dia, $hora, $precioUnitario); 
        }
    }
} else {
    $productos = new Producto();
    $Bicicletas = $productos->mostrarProductos('Bicicletas');
    $Accesorios = $productos->mostrarProductos('Accesorios');
    include_once '../front/paginas/tienda.php';
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/