<?php

include_once "conexion.php";

class Producto {
    public function nuevoProducto($nombre, $descripcion, $imagen, $precio, $cantidad, $categoria) {
        try {
            $db = getDB();
            $st = $db->prepare("SELECT Nombre FROM productos WHERE Nombre=:nombre"); 
            $st->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $st->execute();
            $count = $st->rowCount();

            if ($count < 1) {
                $stmt = $db->prepare("INSERT INTO productos(Nombre, Descripcion, Imagen, Precio, Cantidad, Categoria) 
                                      VALUES (:nombre, :descripcion, :imagen, :precio, :cantidad, :categoria)");
                $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
                $stmt->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
                $stmt->bindParam("imagen", $imagen, PDO::PARAM_STR);
                $stmt->bindParam("precio", $precio, PDO::PARAM_INT);
                $stmt->bindParam("cantidad", $cantidad, PDO::PARAM_INT);
                $stmt->bindParam("categoria", $categoria, PDO::PARAM_STR);
                $stmt->execute();
                $id = $db->lastInsertId();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; 
        }
    }

    public function mostrarProductos($categoria) {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Nombre, Descripcion, Imagen, Precio, Cantidad FROM productos WHERE Categoria=:categoria"); 
            $stmt->bindParam("categoria", $categoria, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_CLASS);
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function mostrarTodosProductos() {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Nombre, Imagen, Precio, Cantidad FROM productos"); 
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_CLASS);
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function productoPorNombre($nombre) {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Nombre, Descripcion, Imagen, Precio, Cantidad, Categoria FROM productos WHERE Nombre=:nombre"); 
            $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function productoCompra($nombre, $num) {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Cantidad FROM productos WHERE Nombre=:nombre"); 
            $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $cantidad = $data->Cantidad - $num;
            $stmt2 = $db->prepare("UPDATE productos SET Cantidad = :cantidad WHERE Nombre = :nombre");
            $stmt2->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt2->bindParam("cantidad", $cantidad, PDO::PARAM_STR);
            $stmt2->execute();
            $db = null;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function productoReponer($nombre, $num) {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Cantidad FROM productos WHERE Nombre=:nombre"); 
            $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $cantidad = $data->Cantidad + $num;
            $stmt2 = $db->prepare("UPDATE productos SET Cantidad = :cantidad WHERE Nombre = :nombre");
            $stmt2->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt2->bindParam("cantidad", $cantidad, PDO::PARAM_STR);
            $stmt2->execute();
            $db = null;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function productoBorrar($nombre, $num) {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Cantidad FROM productos WHERE Nombre=:nombre");
            $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            if ($data->Cantidad >= $num) {
                $nuevaCantidad = $data->Cantidad - $num;
                $stmt2 = $db->prepare("UPDATE productos SET Cantidad = :cantidad WHERE Nombre = :nombre");
                $stmt2->bindParam("nombre", $nombre, PDO::PARAM_STR);
                $stmt2->bindParam("cantidad", $nuevaCantidad, PDO::PARAM_INT);
                $stmt2->execute();
            } else {
                echo '{"error":{"text":"No hay suficiente cantidad para eliminar"}}';
            }
            $db = null;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }    
}

/*
Esta clase gestiona productos: permite añadir uno nuevo, obtener todos o por categoría/nombre, reducir o reponer su stock al comprar o reponer, y también restar stock (borrar) si hay cantidad suficiente.

Autor: Fco. Manuel Martínez Vázquez
*/