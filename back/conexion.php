<?php

function getDB() {
    $dbhost = "localhost";
    $dbuser = "";
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