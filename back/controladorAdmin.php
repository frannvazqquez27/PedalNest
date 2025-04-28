<?php session_start();

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