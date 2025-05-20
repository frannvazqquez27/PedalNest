<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getDB() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "PedalNest";
    try {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbConnection->exec("set names utf8");
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    } catch (PDOException $e) {
        include_once '../front/paginas/errorConexion.php';
    }
}

/*
Básicamente, esta función crea y devuelve una conexión a la base de datos MySQL utilizando PDO. Usa UTF-8 y activa las excepciones para errores de base de datos, por si hay un error que lo veamos mediante una página de error. Esta función se utilizará en los archivos que se conecten a la base de datos para hacer las operaciones correspondientes.

Autor: Fco. Manuel Martínez Vázquez
*/