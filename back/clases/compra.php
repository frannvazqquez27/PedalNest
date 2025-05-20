<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'conexion.php';

class Compra {
    public function anadirCompra($idUsuario, $Productos_Nombre, $dia, $hora, $precio) {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO Compra(Usuarios_IDUsuarios, Productos_Nombre, Dia, Hora, Precio) 
                                  VALUES (:user, :Productos_Nombre, :dia, :hora, :precio)");
            $stmt->bindParam("user", $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam("Productos_Nombre", $Productos_Nombre, PDO::PARAM_STR);
            $stmt->bindParam("dia", $dia, PDO::PARAM_STR);
            $stmt->bindParam("hora", $hora, PDO::PARAM_STR);
            $stmt->bindParam("precio", $precio, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; 
        }
    }

    public function obtenerCompra($id_compra) {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Usuarios_IDUsuarios, Productos_Nombre, Dia, Hora, Precio 
                                  FROM Compra WHERE IDCompra = :id_compra"); 
            $stmt->bindParam("id_compra", $id_compra, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}

/*
Esta clase, permite registrar una compra en la base de datos y obtener los detalles de una compra a partir de su ID.

Autor: Fco. Manuel Martínez Vázquez
*/