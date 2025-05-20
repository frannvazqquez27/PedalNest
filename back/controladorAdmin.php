<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include_once 'clases/usuarios.php';
include_once 'clases/producto.php'; 
include_once 'controladorSesion.php';
include '../front/paginas/admin.php';

$method = $_SERVER['REQUEST_METHOD'];
$operacion= new Producto();
if($method == 'POST') {
    if(isset($_POST["addProduct"])) {
        $operacion->productoReponer($_POST['nombreproducto1'],$_POST['cantidad']);
    }
    if(isset($_POST["delProduct"])) {
        $operacion->productoBorrar($_POST['nombreproducto2'],$_POST['cantidad']);
    }
}

/*
Este script se encarga de gestionar las operaciones de añadir o eliminar stock de productos en la base de datos, según los datos enviados por un formulario vía POST.

Autor: Fco. Manuel Martínez Vázquez
*/