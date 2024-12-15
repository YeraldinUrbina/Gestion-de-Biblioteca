<?php

require_once 'BaseModel.php';

class Prestamo extends BaseModel {
    public function registrarPrestamo($datos) {
        $query = "INSERT INTO prestamos (id_usuario, id_libro, fecha_devolucion) 
                  VALUES (:id_usuario, :id_libro, :fecha_devolucion)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_usuario", $datos['id_usuario']);
        $stmt->bindParam(":id_libro", $datos['id_libro']);
        $stmt->bindParam(":fecha_devolucion", $datos['fecha_devolucion']);

        return $stmt->execute();
    }

    public function obtenerPrestamosPorUsuario($idUsuario) {
        $query = "SELECT * FROM prestamos WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}