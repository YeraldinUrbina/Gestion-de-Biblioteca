<?php

require_once 'BaseModel.php';

class Reserva extends BaseModel {
    public function registrarReserva($datos) {
        $query = "INSERT INTO reservas (id_usuario, id_libro, fecha_reserva, estado) 
                  VALUES (:id_usuario, :id_libro, :fecha_reserva, :estado)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_usuario", $datos['id_usuario']);
        $stmt->bindParam(":id_libro", $datos['id_libro']);
        $stmt->bindParam(":fecha_reserva", $datos['fecha_reserva']);
        $stmt->bindParam(":estado", $datos['estado']);

        return $stmt->execute();
    }

    public function obtenerReservasPorUsuario($idUsuario) {
        $query = "SELECT * FROM reservas WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}