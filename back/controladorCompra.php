<?php session_start();

include_once 'controladorSesion.php';
include_once 'clases/producto.php';
include_once 'clases/compra.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $compraNueva = new Compra();
    $dia = date("d-m-Y");
    $hora = date("H:i:s"); 
    $compraNueva->anadirCompra($_SESSION['id'],$_POST['Productos'],$dia,$hora,floatval($_POST['Precios']));
} else {
    $productos=new Producto();
    $Bicicletas = $productos->mostrarProductos('Bicicletas');
    $Accesorios = $productos->mostrarProductos('Accesorios');
    include_once '../front/paginas/tienda.php';
}

/*
Autor: Fco. Manuel Martínez Vázquez
*/