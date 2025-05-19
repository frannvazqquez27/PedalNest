<?php

include_once 'conexion.php';

class Reserva {
    public function crearReserva($nombre, $dia, $horaEntrada, $horaSalida, $participantes) {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO reservas(Nombre, Dia, HoraEntrada, HoraSalida, Participantes) 
                                  VALUES (:nombre, :dia, :horaEntrada, :horaSalida, :participantes)");
            $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam("dia", $dia, PDO::PARAM_STR);
            $stmt->bindParam("horaEntrada", $horaEntrada, PDO::PARAM_STR);
            $stmt->bindParam("horaSalida", $horaSalida, PDO::PARAM_STR);
            $stmt->bindParam("participantes", $participantes, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; 
        }
    }

    public function borrarReserva($nombre, $dia, $horaEntrada) {
        try {
            $db = getDB();
            $stmt = $db->prepare("DELETE FROM reservas WHERE Nombre = :nombre AND Dia = :dia AND HoraEntrada = :horaEntrada");
            $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam("dia", $dia, PDO::PARAM_STR);
            $stmt->bindParam("horaEntrada", $horaEntrada, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; 
        }
    }

    public function mostrarReserva() {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT Nombre, Dia, HoraEntrada, HoraSalida, Participantes FROM reservas"); 
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}

/*
Esta clase gestiona reservas: permite crear una nueva, eliminar una existente según nombre, día y hora, y mostrar una reserva guardada.

Autor: Fco. Manuel Martínez Vázquez
*/