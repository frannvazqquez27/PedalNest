<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "conexion.php";

class Usuario {
    public function loginUsuario($usernameEmail, $password) {
        try {
            $db = getDB();
            $hash_password = hash('sha256', $password);
            $stmt = $db->prepare("SELECT IDUsuarios FROM Usuarios WHERE Correo=:usernameEmail AND Pass=:hash_password"); 
            $stmt->bindParam("usernameEmail", $usernameEmail, PDO::PARAM_STR);
            $stmt->bindParam("hash_password", $hash_password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if ($count) {
                $_SESSION['id'] = $data->IDUsuarios;
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function registerUsuario($nombre, $apellidos, $email, $password, $codigo_postal, $poblacion, $direccion, $telefono_fijo, $telefono_movil, $notificaciones) {
        try {
            $db = getDB();
            $st = $db->prepare("SELECT IDUsuarios FROM Usuarios WHERE Correo=:email"); 
            $st->bindParam("email", $email, PDO::PARAM_STR);
            $st->execute();
            $count = $st->rowCount();
            if ($count < 1) {
                $stmt = $db->prepare("INSERT INTO Usuarios(Nombre, Apellidos, Correo, Pass, CodPos, Poblacion, Direccion, Telefijo, Telemovil, Notificaciones) 
                                      VALUES (:nombre, :apellidos, :email, :hash_password, :codigo_postal, :poblacion, :direccion, :telefono_fijo, :telefono_movil, :notificaciones)");
                $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
                $stmt->bindParam("apellidos", $apellidos, PDO::PARAM_STR);
                $stmt->bindParam("email", $email, PDO::PARAM_STR);
                $hash_password = hash('sha256', $password);
                $stmt->bindParam("hash_password", $hash_password, PDO::PARAM_STR);
                $stmt->bindParam("codigo_postal", $codigo_postal, PDO::PARAM_STR);
                $stmt->bindParam("poblacion", $poblacion, PDO::PARAM_STR);
                $stmt->bindParam("direccion", $direccion, PDO::PARAM_STR);
                $stmt->bindParam("telefono_fijo", $telefono_fijo, PDO::PARAM_STR);
                $stmt->bindParam("telefono_movil", $telefono_movil, PDO::PARAM_STR);
                $stmt->bindParam("notificaciones", $notificaciones, PDO::PARAM_STR);
                $stmt->execute();
                $IDUsuarios = $db->lastInsertId();
                $db = null;
                $_SESSION['id'] = $IDUsuarios;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; 
        }
    }

    public function detallesUsuario($id) {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Nombre, Apellidos, Correo, Pass, CodPos, Poblacion, Direccion, Telefijo, Telemovil, ImagenUsuario FROM Usuarios WHERE IDUsuarios=:id"); 
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function actualizarImagen($id, $img) {
        try {
            $db = getDB();
            $stmt = $db->prepare("UPDATE Usuarios SET ImagenUsuario=:img WHERE IDUsuarios=:id"); 
            $stmt->bindParam("img", $img, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $db = null;
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}

/*
Esta clase gestiona usuarios: permite iniciar sesión, registrarse si el correo no existe, ver los datos de un usuario y actualizar su imagen de perfil.

Autor: Fco. Manuel Martínez Vázquez
*/