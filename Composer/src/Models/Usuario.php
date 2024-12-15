<?php

namespace Estudiante\Composer\Models;

require_once __DIR__ . '/../config/Database.php';
use PDO;
use PDOException;

class Usuario {
    private static $conn;

    // Obtener conexión de base de datos
    public static function getConnection() {
        if (!self::$conn) {
            $db = new \Estudiante\Composer\Config\Database();
            self::$conn = $db->connect();
        }
        return self::$conn;
    }

    // Obtener todos los usuarios
    public static function obtenerTodos() {
        try {
            $conn = self::getConnection();
            $query = "SELECT * FROM usuarios";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            echo "Error al obtener todos los usuarios: " . $e->getMessage();
            return [];
        }
    }

    // Registrar un nuevo usuario
    public static function registrarUsuario($datos) {
        try {
            $conn = self::getConnection();
            $query = "INSERT INTO usuarios (nombre, numero_documento, tipo, telefono, correo_electronico, contrasena) 
                      VALUES (:nombre, :numero_documento, :tipo, :telefono, :correo_electronico, :contrasena)";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nombre", $datos['nombre']);
            $stmt->bindParam(":numero_documento", $datos['numero_documento']);
            $stmt->bindParam(":tipo", $datos['tipo']);
            $stmt->bindParam(":telefono", $datos['telefono']);
            $stmt->bindParam(":correo_electronico", $datos['correo_electronico']);
            $stmt->bindParam(":contrasena", password_hash($datos['contrasena'], PASSWORD_BCRYPT));

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al registrar usuario: " . $e->getMessage();
            return false;
        }
    }

    // Obtener usuario por ID
    public static function obtenerPorId($id) {
        try {
            $conn = self::getConnection();
            $query = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener usuario por ID: " . $e->getMessage();
            return null;
        }
    }

    // Obtener usuario por correo electrónico
    public static function findByEmail($email) {
        try {
            $conn = self::getConnection();
            $query = "SELECT * FROM usuarios WHERE correo_electronico = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al buscar usuario por correo electrónico: " . $e->getMessage();
            return null;
        }
    }

    public function store() {
        // Obtener datos del formulario
        $datos = [
            'nombre' => $_POST['nombre'],
            'numero_documento' => $_POST['numero_documento'],
            'tipo' => $_POST['tipo'],
            'telefono' => $_POST['telefono'],
            'correo_electronico' => $_POST['correo_electronico'],
            'contrasena' => $_POST['contrasena'],
        ];
    
        // Llamar al modelo para registrar el usuario
        $resultado = Usuario::registrarUsuario($datos);
    
        if ($resultado) {
            // Redirigir a la lista de usuarios
            header('Location: index.php?controller=usuario&action=index');
            exit;
        } else {
            echo "Error al agregar el usuario.";
        }
    }

    public static function update($id, $datos) {
        try {
            $conn = self::getConnection();
            $query = "UPDATE usuarios 
                      SET nombre = :nombre, numero_documento = :numero_documento, tipo = :tipo, correo_electronico = :correo_electronico 
                      WHERE id = :id";
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":nombre", $datos['nombre']);
            $stmt->bindParam(":numero_documento", $datos['numero_documento']);
            $stmt->bindParam(":tipo", $datos['tipo']);
            $stmt->bindParam(":correo_electronico", $datos['correo_electronico']);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar usuario: " . $e->getMessage();
            return false;
        }
    }

    public static function delete($id) {
        try {
            $conn = self::getConnection(); // Obtener conexión
            $query = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute(); // Ejecutar la consulta y devolver el resultado
        } catch (PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage();
            return false;
        }
    }
}