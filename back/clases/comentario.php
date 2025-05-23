<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'conexion.php';

class Comentario {
    public function borrarComentario($idComentario, $idUsuario) {
        try {
            $db = getDB();
            
            $stmt = $db->prepare("DELETE FROM Resenas WHERE IDReseñas = :idComentario AND correo = :idUsuario"); 
            $stmt->bindParam("idComentario", $idComentario, PDO::PARAM_STR);
            $stmt->bindParam("idUsuario", $idUsuario, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;    
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function anadirCometario($nombre, $correo, $texto) {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO Resenas(Nombre, Correo, Texto) VALUES (:user, :correo, :texto)");
            $stmt->bindParam("user", $nombre, PDO::PARAM_STR);
            $stmt->bindParam("correo", $correo, PDO::PARAM_STR);
            $stmt->bindParam("texto", $texto, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; 
        }
    }

    public function obtenerComentarios() {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Nombre as nombre, Correo as correo, Texto as texto FROM Resenas ORDER BY IDReseñas DESC LIMIT 3"); 
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_CLASS);
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}

/*
Esta clase gestiona comentarios: permite añadir uno nuevo, borrar uno existente si coincide con el usuario, y obtener los 3 últimos registrados.

Autor: Fco. Manuel Martínez Vázquez
*/