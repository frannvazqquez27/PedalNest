<?php session_start();

include_once 'clases/usuarios.php'; 
include_once 'controladorSesion.php';
include_once 'clases/producto.php';

$name = $_GET['nombreProducto'];
$producto = new Producto();
$productoSSS = $producto -> productoPorNombre($name);

include_once '../front/paginas/producto.php';